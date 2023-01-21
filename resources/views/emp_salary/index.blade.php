@extends('layouts.admin')
@section('page-title')
{{__('Manage Employee Salary')}}
@endsection
@section('content')
<div class="row">
<div class="col-12">
    
<div class="card-body py-0">
    
                <div class="row">
                    <div class="col-sm-2"> 
                     {{ Form::open(array('route' => array('emp_salary.index'),'method'=>'get','id'=>'salary_filter')) }}
                        @if(\Auth::user()->type != 'setsalary')
                            
                                    {{ Form::label('branch', __('Branch'),['class'=>'text-type'])}}
                                        {{-- {{ Form::select('branch', $branch,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2')) }} --}}
                                        <select name="branch" id="branch" class="form-control select2">
                                            <option value="">--Selected One---</option>
                                            @foreach ($branch as $key => $value)
                                                <option value="{{ $key }}" @if(request()->branch == $key) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    
                     </div>
                     <div class="col-sm-2">
                        @endif
                            {{ Form::open(array('route' => array('emp_salary.index'),'method'=>'get','id'=>'salary_filter')) }}
                        @if(\Auth::user()->type != 'setsalary')
                            
                                        {{ Form::label('company', __('Company'),['class'=>'text-type'])}}
                                        <select name="company" id="company" class="form-control select2">
                                            <option value="">--Selected One---</option>
                                            @foreach ($company_client as $key => $value)
                                                <option value="{{ $key }}" @if(request()->company == $key) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    
                      </div>
                            
                        @endif
                    <div class="col-sm-2">
                        {{ Form::label('month', __('Month'),['class'=>'text-type'])}}
                        <select name="month" id="month" class="form-control select2">
                            <option value="">--Selected One---</option>
                            @foreach ($month as $key => $value)
                                <option value="{{ $value }}" @if(request()->month == $value) selected @endif>{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        {{ Form::label('year', __('Year'),['class'=>'text-type'])}}
                        <select name="years" id="years" class="form-control select2">
                            <option value="">--Selected One---</option>
                            @for($y=date("Y")-10; $y<=date("Y"); $y++)
                                <option value="{{ $y }}" @if(request()->years == $y) selected @endif>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-sm-2">
                            <a href="#" class="apply-btn" onclick="document.getElementById('salary_filter').submit(); return false;">
                                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="{{route('setsalary.index')}}" class="reset-btn">
                                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                            </a>
                    </div>

                    <div class="col-sm-2">
                        <a href="{{route('setsalary.export')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                        <i class="fa fa-file-excel"></i> {{ __('Export') }}
                        </a>
                    </div>
        
                 </div>
        </div>
                    {{ Form::close() }}

<div class="table-responsive">
    <table class="table table-striped mb-0 dataTable" >
    <thead>
    <tr><th>{{__('Employee Name')}}</th>
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
                        if ($key==$sal->company_client_id) {
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
@endsection


