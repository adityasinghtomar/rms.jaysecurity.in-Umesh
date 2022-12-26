<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'trainer','method'=>'post'))); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('branch',__('Branch'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('branch',$branches,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('firstname',__('First Name'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('firstname',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('lastname',__('Last Name'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('lastname',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('contact',__('Contact'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('contact',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('email',__('Email'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('email',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('expertise',__('Expertise'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('expertise',null,array('class'=>'form-control','placeholder'=>__('Expertise')))); ?>

        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('address',__('Address'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('address',null,array('class'=>'form-control','placeholder'=>__('Address')))); ?>

        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /home/progressiveaidat/public_html/rms/resources/views/trainer/create.blade.php ENDPATH**/ ?>