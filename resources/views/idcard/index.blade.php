<head>

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
       <style>
           @media print {
  #printPageButton {
    display: none; 
    a[href]:after {
        content: none !important;
    }
  }
       </style>
<button onclick="window.print();" id="printPageButton"><i class="fa fa-print">Print</i></button>
    @foreach($employees as $user)
    
<div class="container-main" style=" margin-bottom: 26px; margin-top: 24px; height:240px;width: 736px;margin-left: 64px;"> 
     <div class="container" style="border: 2px solid black;font-size: 10px;height:198.98px; width: 340px;margin-left:42px">
               <a href="#" onclick="window.print();" target="_blank"></a>
           <h3 style="font-family: 'Inter', sans-serif;  margin-top: 12px;font-size: 17px;color: red; text-align: center;"> <img src="https://progressiveaidata.in/rms/storage/uploads/logo/logo1.png" width="30px" height="25px">  <b>JAY SECURITY SERVICES</b></h3>
              <b> <p style="font-family: 'Noto Sans TC', sans-serif;   font-size: 13px;  margin-left: 16px;margin-top: -7px;">
                OFFICE :- 1ST Floor Above deep Super Store,Sai Kripa -02 Nani Daman – 396210 (U.T)</p></b>  
                
              <b><p style="margin-left: 60px;margin-top: -10px;font-size: 12px; font-family: 'Noto Sans TC', sans-serif;">Mobile No :- 8155933331/8155933337</p></b> 
          
                      
          
         <img style="width: 76px; margin: -12px 0;" src="https://www.w3schools.com/howto/img_avatar.png" />
          <ul style="margin-left: 54px;font-size: 11px;margin-top: -21%;">
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b> Name Of Emp : {{ $user->name }}</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Emp. Code No : {{ $user->employee_id }}</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Designation :Security Guard</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Date of Birth : {{ $user->dob }}</b>
              </li>
              <li style="list-style: none; font-weight: 50 font-family: 'Noto Sans TC', sans-serif;">
              <b>Valid up to :31/03/2023</b>
              </li>
           
          </ul>
             <p style="position: relative;text-align: right; bottom: 31px;">  Authorized Signature </p>
    </div>
    <div class="container1" style="position: relative;bottom: 199px;border: 2px solid black;font-size: 10px;margin-left:389px;height: 198.98px;width: 340px;padding: 29px;">
           <b> <h5 style=" position: relative;bottom: 27px;margin-left: 22px;font-size: 17px;margin-top: 4px;color: #36a8f9 ">Instruction........</h5></b>
        <ol style="position: relative; bottom:36px;">
            <b><li>This card relates to individual identity only.</li></b>
            <b><li>The card should be used only on duty.</li></b>
            <b><li>charge will be imposed for issue of Duplicate card</li></b>
            <b>  <li style="list-style: none;"></b>
            <b><h6 style=" font-size: 13px; margin-top: 6px; margin-left: -11px;font-size: 13px;margin-top: 3px;color: #36a8f9;">Residence Address</h6></b></li>
            <b><p style="    margin-top: -9px;margin-left: -12px; font-size:9px">Room No-11 SukhlajikiChawlSayli DNH Silvassa-396230</p>
        </ol>
     
        <ul style=" margin-left: -11px;position: relative;margin-left: -11px;bottom: 50px">
        <b><li style="list-style: none; font-weight: 50">
            <b> Fire     : 2253209/2252666
            </b></li></b>
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
@endforeach





<script>

     $('#printme').printme() {
      window.print();
    }
</script>
