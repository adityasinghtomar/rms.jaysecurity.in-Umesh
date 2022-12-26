<div class="card bg-none card-box">
    {{Form::open(array('url'=>'transfer','method'=>'post'))}}
    <div class="row">
        <div class="form-group col-lg-6 col-md-6">
            {{ Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])}}
            {{ Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required')) }}
        </div>
                 <div class="form-group col-md-6">
                     {!! Form::label('branch_id', __('Location'),['class'=>'form-control-label']) !!}
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
                      {!! Form::label('company_client_id', __('Company'),['class'=>'form-control-label']) !!}
                        <select id="company" class="form-control" name="company_client_id">
                    
                        </select>
                    </div>
        <!--<div class="form-group col-lg-6 col-md-6">-->
        <!--    {{Form::label('branch_id',__('Branch'),['class'=>'form-control-label'])}}-->
        <!--    {{Form::select('branch_id',$branches,null,array('class'=>'form-control select2'))}}-->
        <!--</div>-->
        <!--<div class="form-group col-lg-6 col-md-6">-->
        <!--    {{Form::label('department_id',__('Department'),['class'=>'form-control-label'])}}-->
        <!--    {{Form::select('department_id',$departments,null,array('class'=>'form-control select2'))}}-->
        <!--</div>-->
        <!-- <div class="form-group col-lg-6 col-md-6">-->
        <!--    {{Form::label('company_client_id',__('Company'),['class'=>'form-control-label'])}}-->
        <!--    {{Form::select('company_client_id',$company,null,array('class'=>'form-control select2'))}}-->
        <!--</div>-->
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('transfer_date',__('Transfer Date'),['class'=>'form-control-label'])}}
            {{Form::text('transfer_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('description',__('Reason'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
</div>
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