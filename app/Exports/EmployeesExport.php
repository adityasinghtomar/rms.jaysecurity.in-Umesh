<?php

namespace App\Exports;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Employee::select('employees.*','client_company.name as client_name','emp_role.name as emp_name')->join('client_company','client_company.id','=','employees.company_client_id')->join('emp_role','emp_role.id','=','employees.roles')->get();
        

        foreach ($data as $k => $employees) {
            $data[$k]["branch_id"] = !empty($employees->branch) ? $employees->branch->name : '-';
            $data[$k]["roles"] =  $employees->role_name ;
             $data[$k]["company_client_id"] = $employees->client_name;
            //  $data[$k]["company_unit_name"] = $employees->company_unit_name;
            
            // $data[$k]["department_id"] = !empty($employees->department) ? $employees->department->name : '-';
            // $data[$k]["designation_id"] = !empty($employees->designation) ? $employees->designation->name : '-';
            // $data[$k]["salary_type"] = !empty($employees->salary_type) ? $employees->salaryType->name : '-';
            $data[$k]["salary"] = Employee::employee_salary($employees->salary);
            $data[$k]["created_by"] = Employee::login_user($employees->created_by);
            unset($employees->id, $employees->user_id, $employees->documents, $employees->tax_payer_id, $employees->is_active, $employee->department, $employee->designation, $employees->created_at, $employees->updated_at ,$employees->company_unit_name,$employees->client_name,$employee->emp_exit_date,$employee->reason);
       }

        return $data;
    }

    public function headings(): array
    {
        return [
            
            "Name",
            "Father Name",
            "Adhar Card No",
            "Date Of Birth",
            "Gender",
            "Phone",
            "Address",
            "Email",
            "Password",
            "Employee ID",
            "Branch",
            "Company",
            "Company Unit",
            "Date Of Joining",
            "Account Holder Name",
            "Account Number",
            "Bank Name",
            "Bank IFSC Code",
            "Branch Location",
            "Pan Number",
            "Salary Type",
            "Salary",
            "Is Active",
            "created_user_id",
            "Note",
            "Status",
            "PF Number",
            "UAN Number",
            "Employee Roles ID",
            "Exit Date",
            "emp_exit_date",
            "Reason",
            "Employee Roles",
        ];
    }
}
