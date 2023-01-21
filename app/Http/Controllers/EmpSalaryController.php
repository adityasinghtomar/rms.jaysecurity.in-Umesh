<?php

namespace App\Http\Controllers;
use App\Models\CompanyWiseSalary;
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
use App\Models\SetSalary;

use App\Models\SaturationDeduction;
use Illuminate\Http\Request;
use App\Models\EmpRole;
use App\Models\Branch;
use App\Models\EmployeeSalary;
use App\Models\EmployeeSalaryLog;
use App\Models\Client_company;
use App\Models\Client_company_unit;
use App\Exports\SetsalaryExport;
use Maatwebsite\Excel\Facades\Excel;

class EmpSalaryController extends Controller
{
    public function index(Request $request)
    {
        if (\Auth::user()->can('Manage Set Salary')) {
            $company_wise_salary = CompanyWiseSalary::query();
            if($request->branch) {
                $company_wise_salary = $company_wise_salary->where('branch_id', $request->branch);
            }
            if($request->company) {
                $company_wise_salary = $company_wise_salary->where('company_client_id', $request->company);
            }
            $company_wise_salary = $company_wise_salary->get();
            $branch   = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            // $company_settings = Utility::settings();
            $company_client   = Client_company::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        //   print $company_wise_salary;die;
            $company_client_unit  = Client_company_unit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $roles = EmpRole::get()->pluck('name', 'id');
            $employee = Employee::get()->pluck('name', 'employee_id');
            $month = array("January" => "1","February" => "2","March" => "3","April" => "4","May" => "5","June" => "6","July" => "7","August" => "8","September" => "9","October" => "10","November" => "11","December" => "12");
            return view('emp_salary.index', compact('employee','branch','company_client','company_client_unit','company_wise_salary','roles', 'month'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    
    //  Import File 
    public function importFile()
    {
        return view('setsalary.import');
    }
    // Export File 
    public function export()
    {
        $name = 'Salary_' . date('Y-m-d i:h:s');
        $data = Excel::download(new SetsalaryExport(), $name . '.csv');
        // ob_end_clean();

        return $data;
    }
    // Import Data In CSV Formate 
}
