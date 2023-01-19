<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Meeting;
use App\Models\MeetingEmployee;
use Illuminate\Http\Request;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;

class IdcardController extends Controller
{
    public function index()
    {
        
            $employees = Employee::get();
            //$employees = Employee::join('emp_role','emp_role.id','=','employees.roles')->get();
            //  $employees = Employee::paginate(4);
            // echo $employees ;
            // die;

            return view('idcard.index', compact( 'employees'));
        
    }
}
