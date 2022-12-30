<!DOCTYPE html>
<html lang="en">
 

  <head>
     <title>I Card</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"rel="stylesheet"/> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Noto+Sans+TC:wght@400&family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Noto+Sans+TC:wght@700&family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
  </head>
           <button onclick="window.print();"><i class="fa fa-print">Print</i></button>
<body>

    <?php 
    //   echo $emp_field_data ;die;
    // echo $emp_field_data->field_id;die();
    if(count($emp_field_data) == 0){
        //  echo $emp_field_data; die();
     $field_value=" ";
    } else{
        foreach($emp_field_data as $var){}
    $data = json_decode($var);
    // echo $data->field_id;die();
            if (isset($data->field_id)&&($data->field_id=='22')) {
                // $field_data_id=$val->field_value;
                $field_value=$data->field_value;
              //echo   $field_value;
            }
           else{
               $field_value=" ";
                }
              
                }
        //   echo $field_value;
        //  die();
      ?>
      <?php
      if(count($image) == 0){
        //  echo $emp_field_data; die();
    $photo="uu";
    } else{
      foreach($image as $var1){}
    $data1 = json_decode($var1);
            if (isset($data1->field_id)&&($data1->field_id=='8')) {
                // $field_data_id=$val->field_value;
                $photo=$data1->field_value;
            }
             else{
                $photo="gaurd.jpg";
                }
    }
        // echo $photo;
      ?>
            <?php 
             if(count($local_dist) == 0){
        //  echo $emp_field_data; die();
    $dist=" ";
    } else{
         foreach($local_dist as $var2){}
    $data2 = json_decode($var2);
            if (isset($data2->field_id)&&($data2->field_id=='40')) {
                // $field_data_id=$val->field_value;
                $dist=$data2->field_value;
            }
            else{
                $dist="";
                }
    }
            //   echo $dist; 
      ?>
            <?php 
              if(count($local_state) == 0){
        //  echo $emp_field_data; die();
   $localstate1=" ";
    } else{
        foreach($local_state as $var3){}
    $data3 = json_decode($var3);
            if (isset($data3->field_id)&&($data3->field_id=='20')) {
                // $field_data_id=$val->field_value;
                $localstate1=$data3->field_value;
            }
           else{
                $localstate1=" ";
                }
    }
        // echo $localstate1;
      ?>
            <?php 
             if(count($local_pin) == 0){
        //  echo $emp_field_data; die();
  $local_pin1="";
    } else{
           foreach($local_pin as $var4){}
    $data4 = json_decode($var4);
        if (isset($data4->field_id)&&($data4->field_id=='17')) {
                // $field_data_id=$val->field_value;
                $local_pin1=$data4->field_value;
            }
            else{
                $local_pin1="";
                }
    }
        //       echo $local_pin1 ; 
        //  die();
      ?>
<div class="container-main" style=" margin-bottom: 26px; margin-top: 15px;height:215px;width: 736px;margin-left: 64px;"> 
     <div class="container" style="border: 2px solid black;font-size: 10px;height:229.98px; width:366px;margin-left:42px">
               <a href="#" onclick="window.print();" target="_blank"></a>
           <h3 style="font-family: 'Inter', sans-serif;  margin-top: 12px;font-size: 17px;color: red; text-align: center;"> <img src="{{url('public/uploads/logo/logo1.png')}}" width="30px" height="25px">  <b>JAY SECURITY SERVICES</b></h3>
              <b> <p style="font-family: 'Noto Sans TC', sans-serif;   font-size: 13px;  margin-left: 16px;margin-top: -7px;">
                OFFICE :- 1ST Floor Above deep Super Store,Sai Kripa -02 Nani Daman – 396210 (U.T)</p></b>  
              <b><p style="margin-left: 60px;margin-top: -10px;font-size: 12px; font-family: 'Noto Sans TC', sans-serif;">Mobile No :- 8155933331/8155933337</p></b> 
          <img style="width: 76px; margin: -12px 0;" src="{{url('public/uploads/')}}/{{$photo}}" />
          <ul style="margin-left: 54px;font-size: 13px;margin-top: -13%;"></br>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b> Name Of Emp : {{ $employee->name }}</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Emp. Code No : {{ $employee->employee_id }}</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Designation :Security Guard</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Date of Birth : {{ $employee->dob }}</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Valid up to :31/03/2023</b>
              </li>
           
          </ul>
             <p style="position: relative;text-align: right; bottom: 31px;">  Authorized Signature </p>
    </div>
    <div class="container1" style="position: relative;bottom: 229px;border: 2px solid black;font-size: 11px;margin-left:412px; height: 229.98px;width: 366px;padding: 29px;">
           <b> <h5 style=" position: relative;bottom: 27px;margin-left: 22px;font-size: 17px;margin-top: 4px;color: #36a8f9 ">Instruction........</h5></b>
        <ol style="position: relative; bottom:36px;">
            <b><li>This card relates to individual identity only.</li></b>
            <b><li>The card should be used only on duty.</li></b>
            <b><li>charge will be imposed for issue of Duplicate card</li></b>
            <b>  <li style="list-style: none;"></b>
            <b><h6 style=" font-size: 13px; margin-top: 6px; margin-left: -11px;font-size: 13px;margin-top: 3px;color: #36a8f9;">Residence Address</h6></b></li>
            <b><p style="margin-top: -9px;margin-left: -12px;">Address : {{$field_value}},{{$dist}},{{$localstate1}},{{$local_pin1}}</p></b>
        </ol>
     
        <ul style=" margin-left: -11px;position: relative;margin-left: -11px;bottom: 52px">
           <b><li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
             Fire     : 2253209/2252666 
            <b></li><b>
           <b> <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
             Police   : 2254999/2254100
            <b></li><b>
            <b><li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
             Hospital : 9909943025/2230470
            <b></li><b>
            <b><li style="list-style: none; font-weight: 50font-family: 'Noto Sans TC', sans-serif;">
             Ambulance : 108
            </li>
             <b><p style="color: #36a8f9; font-family: 'Noto Sans TC', sans-serif;">IF FOUND PLEASE RETURNE TO COMPANY ADDRESS</p>
        </ul>
     </div>
</div> 

</body>

  <div style="width:100%; height:100px; margin:20px;">
  {{--  {!! $employees->links() !!}--}}
  </div>
     
      
     
</html>

<script>

     $('#printme').printme() {
      window.print();
    }
</script>
