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
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function index()
    {
        
            // $employees = AttendanceEmployee::get();
            $employees = AttendanceEmployee::select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(date, '%M %Y') new_date"),  DB::raw('YEAR(date) year, MONTH(date) month'))
                    ->groupby('year','month')
                    ->get();

            $d = [];
            
            foreach($employees as $employee) {
                $d['label'][] = $employee->new_date;
                $d['data'][] = $employee->data;
            }

            $d['chart_employee'] = json_encode($d);

            return view('graph.index', $d);
        
    }
}
