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
use App\Models\AttendanceEmployee;
class GraphController extends Controller
{
    public function index()
    {
        
            $employees = AttendanceEmployee::get();

            return view('graph.index', compact( 'employees'));
        
    }
}
