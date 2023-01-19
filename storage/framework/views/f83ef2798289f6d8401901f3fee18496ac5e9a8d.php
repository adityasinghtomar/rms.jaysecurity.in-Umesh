<div class="card bg-none card-box">
    <?php echo e(Form::model($transfer,array('route' => array('transfer.update', $transfer->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="form-group col-lg-6 col-md-6 ">
            <?php echo e(Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('employee_id', $employees,null, array('class' => 'form-control select2','disabled' => 'disabled'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('branch_id',__('Branch'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('branch_id',$branches,null,array('class'=>'form-control select2', 'disabled' => 'disabled'))); ?>

        </div>
        <!--<div class="form-group col-lg-6 col-md-6">-->
        <!--    <?php echo e(Form::label('department_id',__('Department'),['class'=>'form-control-label'])); ?>-->
        <!--    <?php echo e(Form::select('department_id',$departments,null,array('class'=>'form-control select2'))); ?>-->
        <!--</div>-->
        
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('company_client_id',__('Company'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('company_client_id',$company,null,array('class'=>'form-control select2', 'disabled' => 'disabled'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('transfer_date',__('Transfer Date'),['class'=>'form-control-label', 'disabled' => 'disabled'])); ?>

            <?php echo e(Form::text('transfer_date',null,array('class'=>'form-control datepicker' , 'disabled' => 'disabled'))); ?>

        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Reason'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /home3/jaysecurity/sms.jaysecurity.in/resources/views/transfer/edit.blade.php ENDPATH**/ ?>