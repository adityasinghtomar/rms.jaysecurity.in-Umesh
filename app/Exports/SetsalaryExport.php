<?php
use App\Models\CompanyWiseSalary;
use App\Models\SetSalary;
namespace App\Exports;
use App\Models\Salary;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SetsalaryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        
        $data = Employee::get();
        // $data =Employee::select('company_wise_salary.*','client_company.name as client_name','emp_role.name as emp_name')->join('client_company','client_company.id','=','company_wise_salary.company_client_id')->join('emp_role','emp_role.id','=','company_wise_salary.roles')->get();
        

        foreach ($data as $k => $employees) {
            $data[$k]["branch_id"] = !empty($employees->branch) ? $employees->branch->name : '-';
            // $data[$k]["roles"] =  $employees->role_name ;
            //  $data[$k]["company_client_id"] = $employees->client_name;
            //  $data[$k]["company_unit_name"] = $employees->company_unit_name;
            
            // $data[$k]["department_id"] = !empty($employees->department) ? $employees->department->name : '-';
            // $data[$k]["designation_id"] = !empty($employees->designation) ? $employees->designation->name : '-';
            // $data[$k]["salary_type"] = !empty($employees->salary_type) ? $employees->salaryType->name : '-';
       
            unset($employees->id, $employees->user_id, $employees->father_name,$employees->documents, $employees->tax_payer_id, $employees->is_active, $employee->department, $employee->designation, $employees->created_at, $employees->updated_at ,$employees->company_unit_name,$employees->client_name,$employee->emp_exit_date,$employee->reason,$employees->aadhar_card_no,$employees->dob,$employees->gender,$employees->phone,
            $employees->address,$employees->email,$employees->password,$employees->branch_id,$employees->client_company_id,$employees->company_doj,$employees->roles,$employees->emp_exit_date,$employees->account_holder_name,$employees->account_number,$employees->bank_name,$employees->bank_ifsc_code,$employees->branch_location,$employees->pan_number,$employees->salary_type,$employees->created_user_id,$employees->date_of_exit,$employees->pf_number,$employees->uan_number,$employees->status,$employees->note,$employees->created_by,$employees->salary,$employees->company_client_id,$employees->employee_id,$employees->company_client_unit_id,$employees->name);
      }

        return $data;
    }

    public function headings(): array
    {
        return [
            "Employee ID",
            "Name of Employee's",
            "UAN No",
            "PF No",
            "Designation",
            "Rate",
            "DUTY",
            "Gross Salary",
            "Ded",
            "Net Salary",
            "HDFC",
            "Paid Days",
            "Fixed Basic",
            "Earn Basic",
            "HRA",
            "ING Allow",
            "Total Earnd",
            "PF",
            "Advance",
            "Other /Ded",
            "ICICI",
            "Account Number",
            "IFSC Code",
            "Remarks",
            
            
            
        ];
    }
}
