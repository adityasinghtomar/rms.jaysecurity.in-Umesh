<?php

namespace App\Http\Controllers;
use App\Models\CompanyWiseSalary;
use App\Models\Allowance;
use App\Models\AllowanceOption;
use App\Models\Commission;
use App\Models\DeductionOption;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Loan;
use App\Models\LoanOption;
use App\Models\EmpRole;
use App\Models\OtherPayment;
use App\Models\Overtime;
use App\Models\PayslipType;
use App\Models\SaturationDeduction;
use Illuminate\Http\Request;

use App\Models\Salary;
use App\Models\SetSalaryData;
use App\Models\Utility;
use App\Models\Client_company;
use App\Models\Client_company_unit;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
class SalaryController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Set Salary'))
        {
            $company_client   = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch   = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            
            $company_client_unit  = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations     = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $roles = Role::get();
            $salary = Salary::
            // where(
            //     [
            //         'created_by' => \Auth::user()->creatorId(),
            //     ]
            // )->
            get();

            return view('salary.index', compact('salary','company_client','company_client_unit','roles','designations','branch'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
////Add salary
public function create()
    {   
        if (\Auth::user()->can('Create Employee')) {
            $company_settings = Utility::settings();
            $company_client   = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch   = Branch::get();
            $company_client_unit  = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $salary_data = Salary::get();
            // $roles = Role::get();
            $roles = Role::get()->pluck('name', 'id');
            return view('salary.create', compact('salary_data','company_settings','company_client','company_client_unit','roles','branch'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    } 
 public function store(Request $request)
    {  //dd($request);
        if(\Auth::user()->can('Create Company'))
        {

            $validator = \Validator::make(
                $request->all(), 
                [
                //  'name' => 'required',
                //  'role' => 'required',
                //  'amt'  => 'required',
                //  // 'start_date' => 'required|date',
                //  'company_client_id'      => 'required',
                //  'company_client_unit_id' =>'required',
                //  'designation_id' =>'required'
                 ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $salary             = new Salary();
            
            $salary->branch_id  = $request->branch_id;
            $salary->company_client_id  = $request->company_client_id;
            $salary->created_by = \Auth::user()->creatorId();
            $salary->save(); 
            // $salary->name       = $request->name;
            // $salary->amt        = $request->amt;
            // $salary->company_client_id  = $request->company_client_id;
            // $salary->company_client_unit_id  = $request->company_client_unit_id;
            // $salary->designation_id       = $request->designation_id;
            // $salary->role_id       = $request->role;
            // $salary->is_active  = $request->is_active;
            // // $salary->start_date = $request->start_date;
            // $salary->start_date = NOW();
            // $salary->created_by = \Auth::user()->creatorId();
            // $salary->save();
            // dd($salary->id);
            // $salary_log  = new SetSalaryData();
            // $salary_log->salary_id     = $salary->id;
            // $salary_log->amt      = $request->amt;
            // $salary_log->role_id       = $request->role;
            // $salary_log->company_client_id  = $request->company_client_id;
            // $salary_log->company_client_unit_id  = $request->company_client_unit_id;
            // // $salary_log->start_date = $request->start_date;
            // $salary_log->start_date = NOW();
            // $salary_log->created_by = \Auth::user()->creatorId();
            // $salary_log->save();
            return redirect()->route('salary.index')->with('success', __('Company  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

///// end salary   
public function edit(Salary $salary)
    {
        if(\Auth::user()->can('Edit Company'))
        {  //dd($company->created_by);
            // if($company->created_by == \Auth::user()->creatorId())
            // {
            $company_settings = Utility::settings();
            $company_client   = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch   = Branch::get();
            
            $company_client_unit  = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $roles = EmpRole::get()->pluck('name', 'id');
            $employee = Employee::get()->pluck('name', 'employee_id');
                return view('salary.edit', compact('salary','employee','company_settings','roles','company_client','company_client_unit','branch'));
            // }
            // else
            // {
            //     return response()->json(['error' => __('Permission denied.')], 401);
            // }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }
 public function update(Request $request)
    { 

        if(\Auth::user()->can('Edit Company'))
        {
            // if($company->created_by == \Auth::user()->creatorId())
            // {
                $validator = \Validator::make(
                    $request->all(),
                 [
                //  'name' => 'required',
                //  'role' => 'required',
                //  'amt'  => 'required',
                //  'start_date' => 'required|date',
                //  'company_client_id'      => 'required',
                //  'company_client_unit_id' =>'required',
                //  'designation_id' =>'required'
                 ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
            $company_wise_salary             = new CompanyWiseSalary();
            $company_wise_salary->salary_id  = $request->salary_id;
            $company_wise_salary->branch_id  = $request->branch_id;
            $company_wise_salary->company_client_id  = $request->company_client_id;
            $company_wise_salary->role_id  = $request->employee_role;
            $company_wise_salary->employee_id  = $request->employee_id;
            $company_wise_salary->salary  = $request->salary;
            $company_wise_salary->hra  = $request->hra;
            $company_wise_salary->washing_allowances  = $request->washing_allowances;
            $company_wise_salary->created_by = \Auth::user()->creatorId();
            $company_wise_salary->save(); 
                return redirect()->route('salary.index')->with('success', __('Salary successfully updated.'));
            // }
            // else
            // {
            //     return redirect()->back()->with('error', __('Permission denied.'));
            // }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function destroy(Salary $salary)
    { //dd($company);
        if(\Auth::user()->can('Delete Company'))
        {
            // if($company->created_by == \Auth::user()->creatorId())
            // {
                $salary->delete();

                return redirect()->route('salary.index')->with('success', __('salary successfully deleted.'));
            // }
            // else
            // {
            //     return redirect()->back()->with('error', __('Permission denied.'));
            // }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
public function show(Salary $salary)
    {
        if(\Auth::user()->can('Edit Company'))
        {  //dd($company->created_by);
            // if($company->created_by == \Auth::user()->creatorId())
            // {
            
            $branch   = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $company_settings = Utility::settings();
            $company_client   = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $company_wise_salary = CompanyWiseSalary::where('salary_id', $salary->id)->get();
            $company_client_unit  = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $roles = EmpRole::get()->pluck('name', 'id');
            $employee = Employee::get()->pluck('name', 'employee_id');
            return view('salary.view', compact('company_settings','employee','roles','company_client','company_client_unit','company_wise_salary','branch'));
            // }
            // else
            // {
            //     return response()->json(['error' => __('Permission denied.')], 401);
            // }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

 public function add(){
     
            $company_settings = Utility::settings();
            $company_client   = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch   = Branch::get();
            $company_client_unit  = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $salary_data = Salary::get();
            // $roles = Role::get();
            $roles            = EmpRole::get()->pluck('name','id');
            return view('salary.add', compact('salary_data','company_settings','company_client','company_client_unit','roles','branch'));
 }
//  public function add_salary(Request $request)
//     {  //dd($request);
        

//             $company_wise_salary             = new CompanyWiseSalary();
//             $company_wise_salary->branch_id  = $request->branch_id;
//             $company_wise_salary->company_client_id  = $request->company_client_id;
//             $company_wise_salary->role_id  = $request->employee_role;
//             $company_wise_salary->salary  = $request->salary;
//             $company_wise_salary->hra  = $request->hra;
//             $company_wise_salary->washing_allowances  = $request->washing_allowances;
//             $company_wise_salary->created_by = \Auth::user()->creatorId();
//             $company_wise_salary->save(); 
//             return redirect()->route('salary.index')->with('success', __('Salary  successfully created.'));
        
//     }
}
