<?php

namespace App\Http\Controllers;
// namespace App\Exports;

use App\Exports\SetsalaryExport;
use App\Models\Allowance;
use App\Models\AllowanceOption;
use App\Models\Commission;
use App\Models\DeductionOption;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\LoanOption;
use App\Models\OtherPayment;
use App\Models\Overtime;
use App\Models\PayslipType;
use App\Models\Salary;
use App\Models\SaturationDeduction;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\EmployeeSalary;
use App\Models\EmployeeSalaryLog;
use App\Models\Client_company;
use App\Models\Client_company_unit;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class SetSalaryController extends Controller
{
    public function index()
    {
        if (\Auth::user()->can('Manage Set Salary')) {
            $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $company = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $company_unit = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
         $employees = Employee::where(['created_by' => \Auth::user()->creatorId(),])->get();
            // $employees = Employee::select('employees.*','client_company.name as client_name','client_company_unit.name as client_unit','branches.name as branch')->join('client_company','client_company.id','=','employees.company_client_id')->join('client_company_unit','client_company_unit.id','=','employees.company_client_unit_id')->join('branches','branches.id','=','employees.branch_id')->get();
            return view('setsalary.index', compact('employees','branch','company','company_unit'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->can('Edit Set Salary')) {

            $payslip_type      = PayslipType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $allowance_options = AllowanceOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $loan_options      = LoanOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $deduction_options = DeductionOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if (\Auth::user()->type == 'employee') {
                $currentEmployee      = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $allowances           = Allowance::where('employee_id', $currentEmployee->id)->get();
                $commissions          = Commission::where('employee_id', $currentEmployee->id)->get();
                $loans                = Loan::where('employee_id', $currentEmployee->id)->get();
                $saturationdeductions = SaturationDeduction::where('employee_id', $currentEmployee->id)->get();
                $otherpayments        = OtherPayment::where('employee_id', $currentEmployee->id)->get();
                $overtimes            = Overtime::where('employee_id', $currentEmployee->id)->get();
                $employee             = Employee::where('user_id', '=', \Auth::user()->id)->first();

                return view('setsalary.employee_salary', compact('employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));
            } else {
                $allowances           = Allowance::where('employee_id', $id)->get();
                $commissions          = Commission::where('employee_id', $id)->get();
                $loans                = Loan::where('employee_id', $id)->get();
                $saturationdeductions = SaturationDeduction::where('employee_id', $id)->get();
                $otherpayments        = OtherPayment::where('employee_id', $id)->get();
                $overtimes            = Overtime::where('employee_id', $id)->get();
                $employee             = Employee::find($id);

                return view('setsalary.edit', compact('employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show($id)
    {


        $payslip_type      = PayslipType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $allowance_options = AllowanceOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $loan_options      = LoanOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $deduction_options = DeductionOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        if (\Auth::user()->type == 'employee') {
            $currentEmployee      = Employee::where('user_id', '=', \Auth::user()->id)->first();
            $allowances           = Allowance::where('employee_id', $currentEmployee->id)->get();
            $commissions          = Commission::where('employee_id', $currentEmployee->id)->get();
            $loans                = Loan::where('employee_id', $currentEmployee->id)->get();
            $saturationdeductions = SaturationDeduction::where('employee_id', $currentEmployee->id)->get();
            $otherpayments        = OtherPayment::where('employee_id', $currentEmployee->id)->get();
            $overtimes            = Overtime::where('employee_id', $currentEmployee->id)->get();
            $employee             = Employee::where('user_id', '=', \Auth::user()->id)->first();

            return view('setsalary.employee_salary', compact('employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));
        } else {
            $allowances           = Allowance::where('employee_id', $id)->get();
            $commissions          = Commission::where('employee_id', $id)->get();
            $loans                = Loan::where('employee_id', $id)->get();
            $saturationdeductions = SaturationDeduction::where('employee_id', $id)->get();
            $otherpayments        = OtherPayment::where('employee_id', $id)->get();
            $overtimes            = Overtime::where('employee_id', $id)->get();
            $employee             = Employee::find($id);

            return view('setsalary.employee_salary', compact('employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));
        }
    }


    public function employeeUpdateSalary(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'salary_type' => 'required',
                'salary' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $employee = Employee::findOrFail($id);
        $input    = $request->all();
        $employee->fill($input)->save();

        return redirect()->back()->with('success', 'Employee Salary Updated.');
    }
    ////
    public function employeeUpdateSalary_(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'salary_type' => 'required',
                'custom_type' => 'required',
                // 'salary' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        if ($request->custom_type == '0') {
            $validator = \Validator::make(
                $request->all(),
                [
                    'salary_amt' => 'required',
                    'salary_id' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
        } else {
            $validator = \Validator::make(
                $request->all(),
                [
                    'salary' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
        }
        $employee = Employee::findOrFail($id);
        $input    = $request->all();
        $employee->fill($input)->save();
        /////insert in EmployeeSalary table
        if ($request->custom_type == '0') {
            $data = array(
                "amt" => $request->salary_amt,
                "salary_id" => $request->salary_id,
                "emp_id" => $id,
            );
        } else {
            $data = array(
                "amt" => $request->salary,
                // "salary_id" => $request->salary_id,
                "emp_id" => $id,
            );
        }
        $EmployeeSalary_data = EmployeeSalary::where('emp_id', $id)->first();
        if (!empty($EmployeeSalary_data)) {
            $EmployeeSalary = EmployeeSalary::where('emp_id', $id)->update($data);
            $EmployeeSalary_id = $EmployeeSalary_data->id;
        } else {
            $EmployeeSalary_id = EmployeeSalary::insertGetId($data);
        }
        ///insert in EmployeeSalarylog
        $emp_salary_log_data = EmployeeSalaryLog::where('emp_salary_id', $EmployeeSalary_id)
            ->first();
        if ($emp_salary_log_data) {
            $emp_salary_log_data->end_date = NOW();
            $emp_salary_log_data->save();
        }

        if ($request->custom_type == '0') {
            $data = array(
                "amt" => $request->salary_amt,
                "salary_id" => $request->salary_id,
                "emp_salary_id" => $EmployeeSalary_id,
                "start_date" => NOW(),
            );
        } else {
            $data = array(
                "amt" => $request->salary,
                // "salary_id" => $request->salary_id,
                "emp_salary_id" => $EmployeeSalary_id,
                "start_date" => NOW(),
            );
        }
        $EmployeeSalaryLog_id = EmployeeSalaryLog::insertGetId($data);
        ////
        return redirect()->back()->with('success', 'Employee Salary Updated.');
    }
    ////
    public function employeeSalary()
    {
        if (\Auth::user()->type == "employee") {
            $employees = Employee::where('user_id', \Auth::user()->id)->get();

            return view('setsalary.index', compact('employees'));
        }
    }

    public function employeeBasicSalary($id)
    {

        $payslip_type = PayslipType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $employee     = Employee::find($id);
        $employee_company_client_id = $employee->company_client_id;
        $employee_designation_id = $employee->designation_id;
        $employee_company_client_unit_id = $employee->company_client_unit_id;
        // $salary = Salary::where('company_client_id',$employee_company_client_id);
        // $salary=$salary->where('designation_id',$designation_id);
        // $salary=$salary->where('company_client_unit_id',$company_client_unit_id);
        $salary = Salary::where('is_active', 1)->where('role_id', 4)
            ->where('company_client_id', $employee_company_client_id)
            ->where('designation_id', $employee_designation_id)
            ->where('company_client_unit_id', $employee_company_client_unit_id)->first();
        // dd($salary);

        return view('setsalary.basic_salary', compact('employee', 'payslip_type', 'salary'));
    }
     public function export()
    {
        $name = 'Salary_' . date('Y-m-d i:h:s');
        $data = Excel::download(new SetsalaryExport(), $name . '.csv');
        // ob_end_clean();

        return $data;
    }
}
