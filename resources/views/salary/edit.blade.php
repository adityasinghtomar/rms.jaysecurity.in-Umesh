@extends('layouts.admin')
@section('page-title')
{{__('Add Salary')}}
@endsection
@section('content')
<div class="row">
{{ Form::model($salary, array('route' => array('salary.update', $salary->branch_id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data')) }}
@csrf
</div>
<div class="row">
<div class="col-md-6 ">
<div class="card card">
<div class="card-header"><h6 class="mb-0">{{__('Salary Detail')}}</h6></div>
<div class="card-body ">
<div class="row">
                        <input type="text" name="salary_id" value="{{$salary->id}}" readonly style="display:none;">
                       <input type="text" name="branch_id" value="{{$salary->branch_id}}" readonly style="display:none;">
                       <input type="text" id="country" name="company_client_id" value="{{$salary->company_client_id}}" style="display:none;" readonly>
                    <div class="form-group col-md-12">
                         {{ Form::label('employee_id', __('Employee Name '),['class'=>'form-control-label']) }}
                         {{ Form::select('employee_id', $employee,null, array('class' => 'form-control  select2','id'=>'employee_id' )) }}
                     </div>
                    <div class="form-group col-md-6">
                         {{ Form::label('employee_role', __('Role'),['class'=>'form-control-label']) }}
                         {{ Form::select('employee_role', $roles,null, array('class' => 'form-control  select2','id'=>'employee_role' )) }}
                     </div>
   
                    <div class="form-group col-md-6">
                        {!! Form::label('salary', __('Salary'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::text('salary', old('salary'), ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('hra', __('HRA / day'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::text('hra', old('hra'), ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('washing_allowances', __('Washing Allowances / day'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::text('washing_allowances', old('washing_allowances'), ['class' => 'form-control','required' => 'required']) !!}
                    </div>
</div>
</div>
 
{!! Form::submit('Create', ['class' => 'btn btn-xs badge-blue float-right radius-10px']) !!}
{{--            </form>--}}
{{Form::close()}}
</div>
</div>
@endsection

@push('script-page')

<!--<script>-->

<!--$(document).ready(function () {-->
<!--var d_id = $('#department_id').val();-->
<!--getDesignation(d_id);-->
<!--});-->

<!--$(document).on('change', 'select[name=department_id]', function () {-->
<!--var department_id = $(this).val();-->
<!--getDesignation(department_id);-->
<!--});-->

<!--function getDesignation(did) {-->

<!--$.ajax({-->
<!--url: '{{route('employee.json')}}',-->
<!--type: 'POST',-->
<!--data: {-->
<!--"department_id": did, "_token": "{{ csrf_token() }}",-->
<!--},-->
<!--success: function (data) {-->
<!--$('#designation_id').empty();-->
<!--$('#designation_id').append('<option value="">{{__('Select any Designation')}}</option>');-->
<!--$.each(data, function (key, value) {-->
<!--    $('#designation_id').append('<option value="' + key + '">' + value + '</option>');-->
<!--});-->
<!--}-->
<!--});-->
<!--}-->
<!--</script>-->
<!--<script>-->

<!--$(document).ready(function () {-->
<!--var d_id = $('#company_client_id').val();-->
<!--getCompanyUnit(d_id);-->
<!--get_designation();-->
<!--});-->

<!--$(document).on('change', 'select[name=company_client_id]', function () {-->

<!--var company_id = $(this).val();-->
<!--getCompanyUnit(company_id);-->
<!--});-->

<!--function getCompanyUnit(did) {-->
<!--$.ajax({-->
<!--url: '{{route('employee.json_company_unit')}}',-->
<!--type: 'POST',-->
<!--data: {-->
<!--"company_id": did, "_token": "{{ csrf_token() }}",-->
<!--},-->
<!--success: function (data) {-->
<!--$('#company_client_unit_id').empty();-->
<!--$('#company_client_unit_id').append('<option value="">{{__('Select any Company Unit')}}</option>');-->
<!--$.each(data, function (key, value) {-->
<!--    $('#company_client_unit_id').append('<option value="' + key + '">' + value + '</option>');-->
<!--});-->
<!--}-->
<!--});-->
<!--}-->
<!--function get_designation() {-->
<!--$.ajax({-->
<!--url: '{{route('employee.designation.json')}}',-->
<!--type: 'POST',-->
<!--data: {-->
<!-- "_token": "{{ csrf_token() }}",-->
<!--},-->
<!--success: function (data) {-->
<!--$('#designation_id').empty();-->
<!--$('#designation_id').append('<option value="">Select any Designation</option>');-->
<!--$.each(data, function (key, value) {-->
<!--var select = '';-->
<!--if (key == '{{ $salary->designation_id }}') {-->
<!--select = 'selected';-->
<!--}-->

<!--$('#designation_id').append('<option value="' + key + '"  ' + select + '>' + value + '</option>');-->
<!--});-->
<!--}-->
<!--});-->
<!--}-->
<script>
        $(document).ready(function () {
            $('#branch').on('change', function () {
                var branch_id = this.value;
                $("#company").html('');
                console.log('branch_id');
                $.ajax({
                    url: "{{url('branch-company')}}",
                    type: "POST",
                    data: {
                        branch_id: branch_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (response) {
                        
                        $("#company").html('<option value="">Select Company</option>');
                        $.each(response.company, function (index, value) {
                            console.log(value)
                            $("#company").append('<option value="' +value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            
        });
    </script>

@endpush
