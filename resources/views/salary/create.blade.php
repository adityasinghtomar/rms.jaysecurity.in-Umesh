@extends('layouts.admin')
@section('page-title')
{{__('Create Branch And Comapny ')}}
@endsection
@section('content')
<div class="row">
{{Form::open(array('route'=>array('salary.store'),'method'=>'post','enctype'=>'multipart/form-data'))}}
{{--        <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">--}}
{{--        @csrf--}}
</div>
<div class="row">
<div class="col-md-6 ">
<div class="card card-fluid">
<div class="card-header"><h6 class="mb-0">{{__('Salary Detail')}}</h6></div>
<div class="card-body ">
<div class="row">
 <div class="form-group col-md-6">
                     {!! Form::label('branch_id', __('Location'),['class'=>'form-control-label']) !!}
                        <select  id="branch" class="form-control" name="branch_id">
                            <option value="">Select Branch</option>
                            @foreach ($branch as $data)
                            <option value=" {{$data->id}} ">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                     <div class="form-group col-md-6">
                      {!! Form::label('company_client_id', __('Company'),['class'=>'form-control-label']) !!}
                        <select id="company" class="form-control" name="company_client_id">
                    
                        </select>
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
<!--getDesignation();-->
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

<!--function getDesignation(did) {-->

<!--$.ajax({-->
<!--url: '{{route('employee.designation.json')}}',-->
<!--type: 'POST',-->
<!--data: {-->
<!--"_token": "{{ csrf_token() }}",-->
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

