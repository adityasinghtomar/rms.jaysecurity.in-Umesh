<?php
 
namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BranchController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Branch'))
        {
            $branches = Branch::where('created_by', '=', \Auth::user()->creatorId())->get();
            // $data['branches'] = Branch::get(["name", "id"]);
            return view('branch.index', compact('branches'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Branch'))
        {
            return view('branch.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Branch'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $branch             = new Branch();
            $branch->name       = $request->name;
            $branch->created_by = \Auth::user()->creatorId();
            $branch->save();

            return redirect()->route('branch.index')->with('success', __('Branch  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Branch $branch)
    {
        return redirect()->route('branch.index');
    }

    public function edit(Branch $branch)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($branch->created_by == \Auth::user()->creatorId())
            {

                return view('branch.edit', compact('branch'));
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

    public function update(Request $request, Branch $branch)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($branch->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $branch->name = $request->name;
                $branch->save();

                return redirect()->route('branch.index')->with('success', __('Branch successfully updated.'));
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

    public function destroy(Branch $branch)
    {
        if(\Auth::user()->can('Delete Branch'))
        {
            if($branch->created_by == \Auth::user()->creatorId())
            {
                $branch->delete();

                return redirect()->route('branch.index')->with('success', __('Branch successfully deleted.'));
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

    public function getdepartment(Request $request)
    {

        if($request->branch_id == 0)
        {
            $departments = Department::get()->pluck('name', 'id')->toArray();
        }
        else
        {
            $departments = Department::where('branch_id', $request->branch_id)->get()->pluck('name', 'id')->toArray();
        }

        return response()->json($departments);
    }
    
    // Select Branch/Lcation By Company  
    
    //  public function fetchCompany(Request $request)
    // {
    //     $data['company'] = Client_company::where("branch_id",$request->branch_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }
    
    public function getemployee(Request $request)
    {
        if(in_array('0', $request->department_id))
        {
            $employees = Employee::get()->pluck('name', 'id')->toArray();
        }
        else
        {
            $employees = Employee::whereIn('department_id', $request->department_id)->get()->pluck('name', 'id')->toArray();
        }

        return response()->json($employees);
    }
  public function add_division(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString(); 
        $validator = \Validator::make(
                $request->all(), [
                               'name' => 'required',
                               'created_by'=>'required',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            $res=[
                 'status' =>400,
                 'timestamp'=>$current_date_time,
                 'responseMessage' =>  'error',
                 'error' => $messages,
                 'path' => '/add_division',
                ]; 
                return response()->json(
                    $res, 400);
        }

        $branch             = new Branch();
        $branch->name       = $request->name;
        $branch->created_by = $request->created_by;
        $branch->save();

        $res=[
                 'status' =>200,
                 'timestamp'=>$current_date_time,
                 'responseMessage' =>'Division  successfully created.',
                 'path' => '/add_division'
                ]; 
        return response()->json($res, 200);

    }  
}
