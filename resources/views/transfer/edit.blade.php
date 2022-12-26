<div class="card bg-none card-box">
    {{Form::model($transfer,array('route' => array('transfer.update', $transfer->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="form-group col-lg-6 col-md-6 ">
            {{ Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])}}
            {{ Form::select('employee_id', $employees,null, array('class' => 'form-control select2','disabled' => 'disabled')) }}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('branch_id',__('Branch'),['class'=>'form-control-label'])}}
            {{Form::select('branch_id',$branches,null,array('class'=>'form-control select2', 'disabled' => 'disabled'))}}
        </div>
        <!--<div class="form-group col-lg-6 col-md-6">-->
        <!--    {{Form::label('department_id',__('Department'),['class'=>'form-control-label'])}}-->
        <!--    {{Form::select('department_id',$departments,null,array('class'=>'form-control select2'))}}-->
        <!--</div>-->
        
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('company_client_id',__('Company'),['class'=>'form-control-label'])}}
            {{Form::select('company_client_id',$company,null,array('class'=>'form-control select2', 'disabled' => 'disabled'))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('transfer_date',__('Transfer Date'),['class'=>'form-control-label', 'disabled' => 'disabled'])}}
            {{Form::text('transfer_date',null,array('class'=>'form-control datepicker' , 'disabled' => 'disabled'))}}
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('description',__('Reason'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
</div>
