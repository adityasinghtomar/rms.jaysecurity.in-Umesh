@extends('layouts.admin')

@section('page-title')

{{__('Create Employee')}}

@endsection

@section('content')

<div class="row">

{{Form::open(array('route'=>array('employee.store'),'method'=>'post','enctype'=>'multipart/form-data'))}}

{{--        <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">--}}

{{--        @csrf--}}

</div>

<div class="row">

<div class="col-md-6 ">

<div class="card card-fluid">

<div class="card-header"><h6 class="mb-0">{{__('Personal Detail')}}</h6></div>

<div class="card-body ">

<div class="row">

    <div class="form-group col-md-6">

        {!! Form::label('aadhar_card_no', __('Aadhar Card No'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>

        <!--{!! Form::text('aadhar_card_no', old('aadhar_card_no'), ['class' => 'form-control','required' => 'required']) !!}-->

         <input id="aadhar_card_no" type="number" class="form-control" name="aadhar_card_no" placeholder="Aadhar Number" onkeyup='check1();'/>

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>

        <!--{!! Form::text('name', old('name'), ['class' => 'form-control','required' => 'required']) !!}-->

        {{-- <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name"  onkeypress="return (event.charCode > 64 &&

event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"/>  --}}
        <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name"/>

    </div>

    <div class="form-group col-md-6">

    <span id='message1'></span>

    </div>

    <div class="form-group col-md-6">

    <span id='message2'></span>

    </div>



    <!--<div class="form-group col-md-6">-->

    <!--    {!! Form::label('phone', __('Phone'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>-->

    <!--    {!! Form::text('phone',old('phone'), ['class' => 'form-control']) !!}-->

    <!--</div>-->

    <div class="col-md-6">

        <div class="form-group">

            {!! Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>

            {!! Form::text('dob', old('dob'), ['class' => 'form-control datedobpicker', 'id' => 'dob']) !!}

        </div>

    </div>



    <div class="col-md-6">

        <div class="form-group ">

            {!! Form::label('gender', __('Gender'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

            <div class="d-flex radio-check">

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="g_male" value="Male" name="gender" class="custom-control-input">

                    <label class="custom-control-label" for="g_male">{{__('Male')}}</label>

                </div>

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input">

                    <label class="custom-control-label" for="g_female">{{__('Female')}}</label>

                </div>

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="g_transgender" value="Female" name="gender" class="custom-control-input">

                    <label class="custom-control-label" for="g_transgender">{{__('Others')}}</label>

                </div>

            </div>

        </div>

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::email('email',old('email'), ['class' => 'form-control']) !!}

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::password('password', ['class' => 'form-control']) !!}

    </div>



    <!--<div class="form-group">-->

    <!--{!! Form::label('address', __('Address'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>-->

    <!--{!! Form::textarea('address',old('address'), ['class' => 'form-control','rows'=>2]) !!}-->

    <!--</div>-->



    <div class="form-group col-md-6">

        {!! Form::label('uan_number', __('UAN Number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::text('uan_number', old('uan_number'), ['class' => 'form-control']) !!}

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('pf_number', __('PF Number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::text('pf_number',old('pf_number'), ['class' => 'form-control']) !!}

    </div>

</div>

</div>

</div>

</div>

<div class="col-md-6 ">

<div class="card card-fluid">

<div class="card-header"><h6 class="mb-0">{{__('Company Detail')}}</h6></div>

<div class="card-body employee-detail-create-body">

<div class="row">

    @csrf

    <div class="form-group col-md-12">

        {!! Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']) !!}

        {!! Form::text('employee_id', $employeesId, ['class' => 'form-control', 'readonly'=>'readonly']) !!}

    </div>

                 <div class="form-group col-md-6">

                     {!! Form::label('branch_id', __('Location'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>

                        <select  id="branch" class="form-control" name="branch_id">

                            <option value="">Select Branch</option>

                            @foreach ($branches as $data)

                            <option value=" {{$data->id}} ">

                                {{$data->name}}

                            </option>

                            @endforeach

                        </select>

                    </div>



                     <div class="form-group col-md-6">

                      {!! Form::label('company_client_id', __('Company'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>

                        <select id="company" class="form-control" name="company_client_id">



                        </select>

                    </div>



    <!--<div class="form-group col-md-6">-->

    <!--    {{ Form::label('branch_id', __('Location'),['class'=>'form-control-label']) }}-->

    <!--    {{ Form::select('branch_id', $branches,null, array('class' => 'form-control  select2')) }}-->

    <!--</div>-->

    <!--<div class="form-group col-md-6">-->

    <!--    {{ Form::label('branch_id', __('Location'),['class'=>'form-control-label']) }}-->

    <!--    <select class="select2 form-control select2-multiple" id="branch_id" name="branch_id" data-toggle="select2" data-placeholder="{{ __('Select Location ...') }}">-->

    <!--        <option value="">{{__('Select location')}}</option>-->

    <!--    </select>-->

    <!--</div>-->







    <!--<div class="form-group col-md-6">-->

    <!--    {{ Form::label('companyclient_id', __('Company Client'),['class'=>'form-control-label']) }}-->

    <!--    {{ Form::select('company_client_id', $company_client,null, array('class' => 'form-control  select2','id'=>'company_client_id' )) }}-->

    <!--</div>-->



    <!--<div class="form-group col-md-6">-->

    <!--    {{ Form::label('company_client_unit_id', __('Company Client Unit'),['class'=>'form-control-label']) }}-->

    <!--    <select class="select2 form-control select2-multiple" id="company_client_unit_id" name="company_client_unit_id" data-toggle="select2" data-placeholder="{{ __('Select Company Unit ...') }}">-->

    <!--        <option value="">{{__('Select any Company Unit')}}</option>-->

    <!--    </select>-->

    <!--</div>-->



    <div class="form-group col-md-6">

        {{ Form::label('employee_role', __('Role'),['class'=>'form-control-label']) }}<span class="text-danger pl-1">*</span>

        {{ Form::select('employee_role', $roles,null, array('class' => 'form-control  select2','id'=>'employee_role','required' => 'required' )) }}

    </div>



    <div class="form-group col-md-6 ">

        {!! Form::label('company_doj', __('Company Date Of Joining'),['class'=>'form-control-label']) !!}

        {!! Form::text('company_doj', null, ['class' => 'form-control datejoinpicker','required' => 'required']) !!}

    </div>

</div>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-md-6 ">

<div class="card card-fluid">

<div class="card-header"><h6 class="mb-0">{{__('Document')}}</h6></div>

<div class="card-body employee-detail-create-body">

@foreach($documents as $key=>$document)

    <div class="row">

        <div class="form-group col-12">

            <div class="float-left col-4">

                <label for="document" class="float-left pt-1 form-control-label">{{ $document->name }} @if($document->is_required == 1) <span class="text-danger">*</span> @endif</label>

            </div>

            <div class="float-right col-8">

                <input type="hidden" name="emp_doc_id[{{ $document->id}}]" id="" value="{{$document->id}}">

                <div class="choose-file form-group">

                    <label for="document[{{ $document->id }}]">

                        <div>{{__('Choose File')}}</div>

                        <input class="form-control  @error('document') is-invalid @enderror border-0" @if($document->is_required == 1) required @endif name="document[{{ $document->id}}]" type="file" id="document[{{ $document->id }}]" data-filename="{{ $document->id.'_filename'}}">

                    </label>

                    <p class="{{ $document->id.'_filename'}}"></p>

                </div>



            </div>



        </div>

    </div>

@endforeach

</div>

</div>

</div>

<div class="col-md-6 ">

<div class="card card-fluid">

<div class="card-header"><h6 class="mb-0">{{__('Bank Account Detail')}}</h6></div>

<div class="card-body employee-detail-create-body">

<div class="row">

    <div class="form-group col-md-6">

        {!! Form::label('account_holder_name', __('Account Holder Name'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control']) !!}



    </div>

    <div class="form-group col-md-6">

        {!! Form::label('bank_name', __('Bank Name'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::text('bank_name', old('bank_name'), ['class' => 'form-control']) !!}

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('account_number', __('Account Number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        <!--{!! Form::number('account_number', old('account_number'), ['class' => 'form-control']) !!}-->

        <input id="account_number" type="number" class="form-control" name="account_number" placeholder="Enter Account Number" onkeyup='check();'/>

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('confirm_account_number', __('Confirm Account Number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        <!--{!! Form::number('confirm_account_number', old('confirm_account_number'), ['class' => 'form-control']) !!}-->

        <input id="confirm_account_number" type="number" class="form-control" name="confirm_account_number" placeholder="Confirm Account Number" onkeyup='check();'/>

    </div>

    <div class="form-group col-md-12">

    <span id='message'></span>

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('bank_ifsc_code', __('Bank IFSC Code'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        {!! Form::text('bank_ifsc_code',old('bank_ifsc_code'), ['class' => 'form-control']) !!}

    </div>

    <div class="form-group col-md-6">

        {!! Form::label('branch_location', __('Branch Location'),['class'=>'form-control-label']) !!}

        {!! Form::text('branch_location',old('branch_location'), ['class' => 'form-control']) !!}

    </div>

    <div class="form-group col-md-12">

        {!! Form::label('pan_number', __('PAN Number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1"></span>

        <!--{!! Form::text('pan_number',old('pan_number'), ['class' => 'form-control']) !!}-->

        <input id="pan_number" type="text" class="form-control" name="pan_number" placeholder="PAN Number" onkeyup='check3();'/>

    </div>



</div>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-md-12">

<div class="card card-fluid">

<div class="card-header"><h6 class="mb-0">Additional Details</h6></div>

<div class="card-body employee-detail-create-body">

<div class="row">

    <input type="hidden" name="field_count" class="form-control" value="<?php echo count($fields); ?>">

    <?php foreach ($fields as $value) {

      ?>

    <div class="form-group col-md-6">

        <label class="form-control-label" for="fields">{{ $value->field_name }}</label>

        <?php if ($value->type=='file') {

            ?>

             <div class="choose-file form-group">



                <label for="document" class="form-control">

                    <!--<div>Choose file here</div>-->

                     <input type="<?php echo $value->type; ?>" name="files_{{ $value->id }}" class="form-control" style="opacity:unset;">

                </label>

                <p class="document_create"></p>

            </div>

          <?php

        }

        else if ($value->type=='radio') {

            ?><div class="row"><?php

            foreach ($fields_atribute as $atribute) {

                if ($atribute->field_id==$value->id) {

                 ?>

            <div class="d-flex radio-check">

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="{{$atribute->option_name}}" value="{{$atribute->option_value}}" name="fields[value_{{ $value->id }}]" class="custom-control-input">

                    <label class="custom-control-label" for="{{$atribute->option_name}}">{{$atribute->option_name}}</label>

                </div>

            </div>



                 <?php

                }

            }

            ?>

            </div><?php

        }

        else if ($value->type=='checkbox') {

            ?>

            <div class="row"><?php

            foreach ($fields_atribute as $atribute) {

                if ($atribute->field_id==$value->id) {

            ?>

            <div class="d-flex radio-check">

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="checkbox" id="{{$atribute->option_name}}" value="{{$atribute->option_value}}" name="fields[value_{{ $value->id }}]" class="custom-control-input">

                    <label class="custom-control-label" for="{{$atribute->option_name}}">{{$atribute->option_name}}</label>

                </div>

            </div>

            <?php

            }

          }

        ?>

        </div>

        <?php

        }

        else if ($value->type=='select') {

            ?>

            <div class="row">

            <select class="form-control select2-multiple" id="{{$atribute->option_name}}" name="fields[value_{{ $value->id }}]" data-toggle="select2" data-placeholder="{{ __('Select...') }}" style="border-radius: 10px;height: 40px;box-shadow: none;line-height: 40px;font-size: 12px;font-family: 'Montserrat-SemiBold';font-weight: normal;">

            <?php

            foreach ($fields_atribute as $atribute) {

                if ($atribute->field_id==$value->id) {

            ?>

            <option value="{{$atribute->option_value}}">{{$atribute->option_name}}</option>



            <?php

            }

          }

          ?>

          </select>

          </div><?php

        }

        else{

            ?><!-- <input type="<?php echo $value->type; ?>" name="fields[value_][]" class="form-control"> -->

            <input type="<?php echo $value->type; ?>" name="fields[value_{{ $value->id }}]" class="form-control"><?php

        } ?>



        <input type="hidden" name="fields[id][]" class="form-control" value="<?php echo $value->id; ?>">

        <input type="hidden" name="fields[name][]" class="form-control" value="<?php echo $value->field_name; ?>">

        <input type="hidden" name="fields[type][]" class="form-control" value="<?php echo $value->type; ?>">

        <input type="hidden" name="fields[mandatory][]" class="form-control" value="<?php echo $value->mandatory; ?>">

       <!--  {!! Form::label('account_holder_name', __('Account Holder Name'),['class'=>'form-control-label']) !!}

        {!! Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control']) !!} -->

    </div>

    <?php } ?>

</div>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-12">

{!! Form::submit('Create', ['class' => 'btn btn-xs badge-blue float-right radius-10px']) !!}

{{--            </form>--}}

{{Form::close()}}

</div>

</div>

@endsection



@push('script-page')





<script>



$(document).ready(function () {

var d_id = $('#department_id').val();

getDesignation(d_id);

});



$(document).on('change', 'select[name=department_id]', function () {

var department_id = $(this).val();

getDesignation(department_id);

});



function getDesignation(did) {



$.ajax({

url: '{{route('employee.json')}}',

type: 'POST',

data: {

"department_id": did, "_token": "{{ csrf_token() }}",

},

success: function (data) {

$('#designation_id').empty();

$('#designation_id').append('<option value="">{{__('Select any Designation')}}</option>');

$.each(data, function (key, value) {

    $('#designation_id').append('<option value="' + key + '">' + value + '</option>');

});

}

});

}

</script>

<script>

    $(document).ready(function () {

    var d_id = $('#company_client_id').val();

    getCompanyUnit(d_id);

    });



    $(document).on('change', 'select[name=company_client_id]', function () {

    var company_id = $(this).val();

    getCompanyUnit(company_id);

    });

    function getCompanyUnit(did) {

        $.ajax({

        url: '{{route('employee.json_company_unit')}}',

        type: 'POST',

        data: {

        "company_id": did, "_token": "{{ csrf_token() }}",

        },

        success: function (data) {

        $('#company_client_unit_id').empty();

        $('#company_client_unit_id').append('<option value="">{{__('Select any Company Unit')}}</option>');

        $.each(data, function (key, value) {

            $('#company_client_unit_id').append('<option value="' + key + '">' + value + '</option>');

        });

        }

        });

    }

</script>

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

    <script>

   var check = function() {

  if (document.getElementById('account_number').value ==

    document.getElementById('confirm_account_number').value) {

    document.getElementById('message').style.color = 'green';

    document.getElementById('message').innerHTML = 'Matching Account Number';

  } else {

    document.getElementById('message').style.color = 'red';

    document.getElementById('message').innerHTML = 'Not Matching Account Number';

  }

}

</script>

<script type="text/javascript">

    function check1() {

        var aadhar = document.getElementById("aadhar_card_no").value;

        var adharcardTwelveDigit = /^\d{12}$/;

        // var adharSixteenDigit = /^\d{16}$/;

        if (aadhar != '') {

            if (aadhar.match(adharcardTwelveDigit)) {

                 document.getElementById('message1').style.color = 'green';

                 document.getElementById('message1').innerHTML = '';

            }

            else {

                document.getElementById('message1').style.color = 'red';

    document.getElementById('message1').innerHTML = 'Please Enter Valid Aadhar Number';

            }

        }

    }

</script>

      <script>

   var check12 = function() {

  var aad = document.getElementById('aadhar_card_no').value ;

  var adharcard = /^\d{12}$/;

   if (aad == adharcard ) {

    document.getElementById('message1').style.color = 'green';

    document.getElementById('message1').innerHTML = 'Matching Account Number';

  } else {

    document.getElementById('message1').style.color = 'red';

    document.getElementById('message1').innerHTML = 'Not Matching Account Number';

  }

}





@endpush
