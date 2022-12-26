<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'employee_id',
        'branch_id',
        'company_client_id',
        'transfer_date',
        'description',
        'created_by',
    ];

    public function company()
    {
        return $this->hasMany('App\Models\Client_company', 'id', 'company_client_id')->first();
    }

    public function branch()
    {
        return $this->hasMany('App\Models\Branch', 'id', 'branch_id')->first();
    }


    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id')->first();
    }
}
