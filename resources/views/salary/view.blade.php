@extends('layouts.admin')
@section('page-title')
{{__('Show Salary')}}
@endsection 



@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body py-0">
<div class="table-responsive">
<table class="table table-striped mb-0 dataTable" >
    <thead>
    <tr>
        <th>{{__('Employee Name')}}</th>
        <th>{{__('Branch')}}</th>
        <th>{{__('Company ')}}</th>
        <th>{{__('Role')}}</th>
        <th>{{__('Salary')}}</th>
        <th>{{__('HRA / day')}}</th>
        <th>{{__('Washing Allowances / day')}}</th>
       
    </tr>
    </thead>
    <tbody>
    @foreach ($company_wise_salary as $sal)
        <tr>
            <td> <?php 
                foreach ($employee as $key => $value) {
                        if ($key==$sal->employee_id) {
                           echo $value;
                        }
                } 
                ?>
                </td>
            <td> <?php 
                foreach ($branch as $key => $value) {
                        if ($key==$sal->branch_id) {
                           echo $value;
                        }
                } 
                ?>
                </td>
                <td> <?php 
                foreach ($company_client as $key => $value) {
                        if ($key==$sal->role_id) {
                           echo $value;
                        }
                } 
                ?>
                </td>
            <td> <?php 
                foreach ($roles as $key => $value) {
                        if ($key==$sal->role_id) {
                           echo $value;
                        }
                } 
                ?>
                </td>
            <td>{{ $sal->salary }}</td>
            <td>{{ $sal->hra }}</td>
            <td>{{ $sal->washing_allowances }}</td>
            
           
            
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>

</div>
</div>
</div>
@endsection


