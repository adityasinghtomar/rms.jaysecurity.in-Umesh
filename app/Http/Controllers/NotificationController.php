<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Contracts\Validation\Validator;

class NotificationController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function sendNotification(Request $request){
        
        $input = $request->all();
        
        $user = User::find($input['user_id']);
        
        if($user->type == 'Supervisor'){
                
            $employee = Employee::select('id','name','user_id','note','reason','status')->where('created_user_id',$user->id)->where('status','Reject')->get();
            
            $totalNotification = $employee->count();
            
            return response()->json([
                'status' => true,
                'employee' => $employee,
                'total' => $totalNotification
            ],200);
            
        }
    }

    public function index()
    {
        return view('home');
    }

    public function savePushNotificationToken(Request $request)
    {
        return $request;
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }
    
    public function sendPushNotification(Request $request)
    {
        // return csrf_token();
        // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $firebaseToken = User::where('id',$request->user_id)->whereNotNull('device_token')->pluck('device_token')->all();
        
        // return $firebaseToken[0];
          
        $data = array();
        $data['message'] = 'hello';
        $data['body'] = 'wrong entry';
        
        $device_token = $firebaseToken;
        // $device_token = 'cD5RQvqHSXSVnKfrAJYY_t:APA91bHQ-EKa3aEwCydEHMB-XRnTZgIeK_V8YCixAvmMu9idD2eUPX-pJYDiq_Ha0vi86HCVhCrFnavNpC1f4Md-pf7A3fO2rIIRTXk9ZMHnHXT9o32Nq-MxFtCXS13vE_KpeEP2Lm14';
        
        $response = $this->sendFireBasePush($device_token,$data);
        
        dd($response);
    }
    
    
    public function sendFireBasePush($device_token,$data)
    {
        
        $SERVER_API_KEY = 'AAAAQEoZRGc:APA91bGAZgvMUJnpYYHgGSce208S2SiPqQxITjPyKMN9mu06ueOdXkyPuaDriAEkxhuQ6FvymfwF-tAQtgIlvGH0um_r_-mdSuSXCZKKmKFgdXgFWYcKRLI4DequOhvHlzGyvJuVwBHK';
        //  "registration_ids" => $device_token,
        
        $meg = [
                'message'=> $data['message'],
                'name' => 'hkkdasld',
            ];
        
        $data = [
            "to" => $device_token[0],
            // "registration_ids" => $device_token,
            "notification" => [
                "title" => $data['message'],
                "body" => $data['body'],  
            ],
            'data' => $meg,
            'priority' => 'high'
        ];
        
        // print_r($data); die;
        
        $dataString = json_encode($data);
        
        $headers = [
            'Authorization: key='. $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
        return $response;
        
    }
    
    
    
    
    
    
}
