<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
    
    
    function notification(){
        
        if(Auth::check())
        {
            $user = Auth::user();
            
            // return $user;
            
            if($user->type == 'Supervisor'){
                
                $employee = Employee::where('created_user_id',$user->id)->where('status','Reject')->get();
                
                return $employee;
                
            }
        }
        
        
        
    }

?>