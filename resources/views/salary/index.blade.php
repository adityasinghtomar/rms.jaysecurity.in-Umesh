@extends('layouts.admin')
@section('page-title')
{{__('Manage Employee Salary')}}
@endsection 

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Employee')
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                    <a href="{{ route('salary.create') }}" class="btn btn-xs btn-white btn-icon-only width-auto">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            </div>
        @endcan
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
        <th>{{__('Branch')}}</th>
        <th>{{__('Company')}}</th>
         <th width="3%">{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
        
    @foreach ($salary as $sal)

            <td>
                <?php 
                foreach ($branch as $key => $value) {
                        if ($key==$sal->branch_id) {
                           echo $value;
                        }
                } 
                ?>
            </td>
            <td>
                <?php 
                foreach ($company_client as $key => $value) {
                        if ($key==$sal->company_client_id) {
                           echo $value;
                        }
                } 
                ?>
            </td>
            
            <td>
                    <a href="{{route('salary.edit',$sal->id)}}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('Apply')}}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="{{route('salary.show',$sal->id)}}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$sal->id}}').submit();"><i class="fas fa-trash"></i></a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['salary.destroy', $sal->id],'id'=>'delete-form-'.$sal->id]) !!}
            {!! Form::close() !!}
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


