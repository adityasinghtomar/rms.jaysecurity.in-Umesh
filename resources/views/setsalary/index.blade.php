@extends('layouts.admin')
@section('page-title')
{{__('Manage Employee Salary')}}
@endsection
@section('content')
<div class="row">
<div class="col-12">
    
<div class="card-body py-0">
    
                <div class="row">
                    <div class="col-sm-3"> 
                     {{ Form::open(array('route' => array('setsalary.index'),'method'=>'get','id'=>'setsalary_filter')) }}
                        @if(\Auth::user()->type != 'setsalary')
                            
                                    {{ Form::label('branch', __('Branch'),['class'=>'text-type'])}}
                                        {{ Form::select('branch', $branch,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2')) }}
                                    
                             </div>
                            <div class="col-sm-3">
                        @endif
                            {{ Form::open(array('route' => array('setsalary.index'),'method'=>'get','id'=>'setsalary_filter')) }}
                        @if(\Auth::user()->type != 'setsalary')
                            
                                    {{ Form::label('company_unit', __('Company Unit '),['class'=>'text-type'])}}
                                        {{ Form::select('company_unit', $company_unit,isset($_GET['company_unit'])?$_GET['company_unit']:'', array('class' => 'form-control select2')) }}
                                    
                            </div>
                            <div class="col-sm-3">
                        @endif
                            {{ Form::open(array('route' => array('setsalary.index'),'method'=>'get','id'=>'setsalary_filter')) }}
                        @if(\Auth::user()->type != 'setsalary')
                            
                                        {{ Form::label('company', __('Company'),['class'=>'text-type'])}}
                                        {{ Form::select('company', $company,isset($_GET['company'])?$_GET['company']:'', array('class' => 'form-control select2')) }}
                                    
                            </div>
                            
                        @endif
                        <div class="col-sm-3">
                            <a href="#" class="apply-btn" onclick="document.getElementById('setsalary_filter').submit(); return false;">
                                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="{{route('setsalary.index')}}" class="reset-btn">
                                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                            </a>
                        </div>
             </div>
                    {{ Form::close() }}

<div class="table-responsive">
    <table class="table table-striped mb-0 dataTable" >
        <thead>
        <tr>
            <th>{{__('Employee Id')}}</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Branch')}}</th>
            <th>{{__('Company')}}</th>
            <th>{{__('Company Unit')}}</th>
            <th>{{__('Payroll Type') }}</th>
            <th>{{__('Salary') }}</th>
            <th>{{__('Net Salary') }}</th>
             <th width="3%">{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td class="Id">
                    <a href="{{route('setsalary.show',$employee->id)}}"  data-toggle="tooltip" data-original-title="{{__('View')}}">
                        {{ \Auth::user()->employeeIdFormat($employee->employee_id) }}
                    </a>
                </td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->branch }}</td>
                <td>{{ $employee->client_name }}</td>
                <td>{{ $employee->client_unit }}</td>
                <td>{{ $employee->salary_type() }}</td>
                <td>{{  \Auth::user()->priceFormat($employee->salary) }}</td>
                <td>{{  !empty($employee->get_net_salary()) ?\Auth::user()->priceFormat($employee->get_net_salary()):'' }}</td>
                <td>
                    <a href="{{route('setsalary.show',$employee->id)}}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('View')}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
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


