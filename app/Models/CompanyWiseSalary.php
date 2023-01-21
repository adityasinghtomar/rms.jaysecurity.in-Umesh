<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyWiseSalary extends Model
{
	protected $table = 'company_wise_salary';
    protected $fillable = [
        'employee_id',
        'branch_id',
        'company_client_id',
        'role_id',
        'salary',
        'hra',
        'washing_allowamces',
        'created_by',
    ];
   public static function get()
    {
        $salary = CompanyWiseSalary::all();

        return $salary;
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function company_client()
    {
        return $this->belongsTo(Client_company::class, 'company_client_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function roles()
    {
        return $this->belongsTo(EmpRole::class, 'role_id', 'id');
    }
}

