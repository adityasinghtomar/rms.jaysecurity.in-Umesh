<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_company extends Model
{
    protected $table = 'client_company';
    protected $fillable = [
        'name', 'city', 'branch_id', 'created_by','id'
    ];

    public function getBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function getCompany()
    {
        return $this->belongsTo(Client_company::class, 'company_client_id', 'id');
    }
}
