<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Client_company;
use App\Models\Department;
use App\Models\Employee;
use App\Mail\TransferSend;
use App\Models\Transfer;
use Carbon\Carbon;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransferController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Transfer'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp       = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $transfers = Transfer::where('created_by', '=', \Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $transfers = Transfer::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('transfer.index', compact('transfers'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Transfer'))
        {
            $departments = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $company     = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
              $branches = Branch::get(["name", "id"]);
            $employees   = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('transfer.create', compact('employees', 'departments', 'branches','company'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Transfer'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'branch_id' => 'required',
                                   'company_client_id' => 'required',
                                   'transfer_date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            // Working Day Count Start
                      $day = Transfer::where('employee_id',$request->employee_id)->latest()->first();
                    //   $day2 = $day->transfer_date;
                      if(!empty($day->transfer_date)){
                      $day2 = $day->transfer_date;
                      $day1 = Carbon::now();
                      $diff = strtotime($day2)-strtotime($day1);
                      $result= abs(round($diff/86400));
                      $day->working_day   = $result;
                      $day->save();
                        $transfer                = new Transfer();
                        $transfer->employee_id   = $request->employee_id;
                        $transfer->branch_id     = $request->branch_id;
                        $transfer->company_client_id = $request->company_client_id;
                        $transfer->transfer_date = $request->transfer_date;
                        $transfer->description   = $request->description;
                        $transfer->created_by    = \Auth::user()->creatorId();
                        $transfer->save();
                        
                          $employee = Employee::where('id', $request->employee_id)->first();
                        //   return $employee;
                          $employee->branch_id = $request->branch_id;
                          $employee->company_client_id = $request->company_client_id;
                          $employee->date_of_exit = $request->transfer_date;
                          $employee->save();
                    //   print $result; die; 
                      }else {
                         $day = Transfer::where('employee_id',$request->employee_id)->latest()->first();
                         $company_date_joining = Employee::where('id',$request->employee_id)->first();
                        //   print $company_date_joining;die;
                          $day2 = $company_date_joining->company_doj;
                          $day1 = Carbon::now();
                          $diff = strtotime($day2)-strtotime($day1);
                          $total= abs(round($diff/86400));
                        //   $day->working_day   = $result;
                        //   $day->save();
                            $transfer                = new Transfer();
                            $transfer->employee_id   = $request->employee_id;
                            $transfer->branch_id     = $request->branch_id;
                            $transfer->company_client_id = $request->company_client_id;
                            $transfer->transfer_date = $request->transfer_date;
                            $transfer->description   = $request->description;
                            $transfer->working_day   = $total;
                            $transfer->created_by    = \Auth::user()->creatorId();
                            $transfer->save();
                            
                              $employee = Employee::where('id', $request->employee_id)->first();
                            //   return $employee;
                              $employee->branch_id = $request->branch_id;
                              $employee->company_client_id = $request->company_client_id;
                              $employee->date_of_exit = $request->transfer_date;
                              $employee->save();
            //   $employee->company_client_unit_id = $request->company_client_unit_id;

                      }
                      
            // Worling Day End 

           
            $setings = Utility::settings();
            if($setings['employee_transfer'] == 1)
            {
                $employee             = Employee::find($transfer->employee_id);
                $branch               = Branch::find($transfer->branch_id);
                $company              = Client_company::find($transfer->company_client_id);
                $transfer->name       = $employee->name;
                $transfer->email      = $employee->email;
                $transfer->branch     = $branch->name;
                $transfer->company    = $company->name;
                try
                {
                    Mail::to($transfer->email)->send(new TransferSend($transfer));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('transfer.index')->with('success', __('Transfer  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));
            }

            return redirect()->route('transfer.index')->with('success', __('Transfer  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Transfer $transfer)
    {
        return redirect()->route('transfer.index');
    }

    public function edit(Transfer $transfer)
    {
        if(\Auth::user()->can('Edit Transfer'))
        {   
            $company     = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branches    = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees   = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                return view('transfer.edit', compact('transfer', 'employees', 'departments', 'branches','company'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Transfer $transfer)
    {
        if(\Auth::user()->can('Edit Transfer'))
        {
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'employee_id' => 'required',
                                       'branch_id' => 'required',
                                       'company_client_id' => 'required',
                                       'transfer_date' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $transfer->employee_id   = $request->employee_id;
                $transfer->branch_id     = $request->branch_id;
                $transfer->company_client_id = $request->company_client_id;
                $transfer->transfer_date = $request->transfer_date;
                $transfer->description   = $request->description;
                $transfer->save();

                return redirect()->route('transfer.index')->with('success', __('Transfer successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Transfer $transfer)
    {
        if(\Auth::user()->can('Delete Transfer'))
        {
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                $transfer->delete();

                return redirect()->route('transfer.index')->with('success', __('Transfer successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
