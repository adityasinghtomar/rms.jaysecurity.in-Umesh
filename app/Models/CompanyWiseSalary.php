<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyWiseSalary extends Model
{
	protected $table = 'company_wise_salary';
    protected $fillable = [
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
}

