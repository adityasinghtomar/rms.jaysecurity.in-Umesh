<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <?php echo e(Form::model($employee, ['route' => ['employee.update', $employee->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

            <?php echo csrf_field(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header">
                    <h6 class="mb-0"><?php echo e(__('Personal Detail')); ?></h6>
                </div>
                <div class="card-body employee-detail-edit-body">

                    <div class="row">
                        <div class="form-group col-md-12">
                        <?php echo Form::label('aadhar_card_no', __('Aadhar Card No'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>
                        <input type="number" name="aadhar_card_no" value='<?php echo $employee->aadhar_card_no; ?>' class="form-control">
                      </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('name', __('Name'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                        </div>
                        <!--<div class="form-group col-md-6">-->
                        <!--    <?php echo Form::label('phone', __('Phone'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>-->
                        <!--    <?php echo Form::text('phone', null, ['class' => 'form-control']); ?>-->
                        <!--</div>-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo Form::label('dob', __('Date of Birth'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('dob', null, ['class' => 'form-control datepicker']); ?>

                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('gender', __('Gender'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender"
                                            class="custom-control-input" <?php echo e($employee->gender == 'Male' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="g_male"><?php echo e(__('Male')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender"
                                            class="custom-control-input"
                                            <?php echo e($employee->gender == 'Female' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="g_female"><?php echo e(__('Female')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_transgender" value="transgender" name="gender"
                                            class="custom-control-input"
                                            <?php echo e($employee->gender == 'Female' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="g_female"><?php echo e(__('Transgender')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
             <div class="form-group">
              <?php echo Form::label('uan_number', __('UAN Number'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
              <?php echo Form::text('uan_number', old('uan_number'), ['class' => 'form-control']); ?>

             </div>
             <div class="form-group">
              <?php echo Form::label('pf_number', __('PF Number'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
              <?php echo Form::text('pf_number',old('pf_number'), ['class' => 'form-control']); ?>

             </div> 
           
                    <!--<div class="form-group">-->
                    <!--    <?php echo Form::label('address', __('Address'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>-->
                    <!--    <?php echo Form::textarea('address', null, ['class' => 'form-control', 'rows' => 2]); ?>-->
                    <!--</div>-->
                    
                    <?php if(Auth::user()->type == "company"): ?>
                    <div class="form-group">
                        <label for="">Status</label>
                       <select name="status" id="status" class="form-control form-control-sm">
                            <option value="">Select Status</option>
                            <option value="Pending" <?php if($employee->status == 'Pending'): ?> selected <?php endif; ?> >Pending</option>
                            <option value="Active" <?php if($employee->status == 'Active'): ?> selected <?php endif; ?>>Active</option>
                            <option value="Reject" <?php if($employee->status == 'Reject'): ?> selected <?php endif; ?>>Reject</option>
                       </select>
                    </div>
                    <div class="form-group" id="note">
                        <label for="">Note</label>
                        <textarea name="note" id="" cols="5" rows="2" class="form-control"><?php echo e($employee->note); ?></textarea>
                    </div>
                    <?php endif; ?>
                    <?php if(\Auth::user()->type == 'employee'): ?>
                        <?php echo Form::submit('Update', ['class' => 'btn-create btn-xs badge-blue radius-10px float-right']); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(\Auth::user()->type != 'employee'): ?>
            <div class="col-md-6 ">
                <div class="card card-fluid">
                    <div class="card-header">
                        <h6 class="mb-0"><?php echo e(__('Company Detail')); ?></h6>
                    </div>
                    <div class="card-body employee-detail-edit-body">
                        <div class="row">
                            <?php echo csrf_field(); ?>
                            <div class="form-group col-md-12">
                                <?php echo Form::label('employee_id', __('Employee ID'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('employee_id', $employeesId, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                
                     <?php echo Form::label('branch_id', __('Location'),['class'=>'form-control-label']); ?>

                        <select  id="branch" class="form-control" name="branch_id" >
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>">
                                <?php echo e($data->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                     <div class="form-group col-md-6">
                      <?php echo Form::label('company_client_id', __('Company'),['class'=>'form-control-label']); ?>

                        <select id="company" class="form-control" name="company_client_id">
                    
                        </select>
                    </div>
                            <!--<div class="form-group col-md-6">-->
                            <!--    <?php echo e(Form::label('branch_id', __('Branch'), ['class' => 'form-control-label'])); ?>-->
                            <!--    <?php echo e(Form::select('branch_id', $branches, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>-->
                            <!--</div>-->
                            
                            <!--<div class="form-group col-md-6">-->
                            <!--    <?php echo e(Form::label('company_client_id', __('Company Client'), ['class' => 'form-control-label'])); ?>-->
                            <!--    <?php echo e(Form::select('company_client', $company_client, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>-->
                            <!--</div>-->
                            <!--<div class="form-group col-md-6">-->
                            <!--    <?php echo e(Form::label('company_client_unit_id', __('Company Client Unit'), ['class' => 'form-control-label'])); ?>-->
                            <!--    <?php echo e(Form::select('company_client_unit', $company_client_unit, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>-->
                            <!--</div>-->

                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('employee_role', __('Role'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::select('employee_role', $roles,null, array('class' => 'form-control  select2','id'=>'employee_role' ))); ?>

                            </div>

                            <div class="form-group col-md-6">
                                <?php echo Form::label('company_doj', 'Company Date Of Joining', ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('company_doj', null, ['class' => 'form-control datepicker', 'required' => 'required']); ?>

                            </div>
                            <!--Employee Exit Date And  Reason -->

                         <div class="col-md-6">
                             <div class="form-group">
                               <?php echo Form::label('exit_emp', __('Employee Exit Date'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <input type="date" id="exit_emp" name="exit_emp" class="form-control" >
                              </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                            <?php echo Form::label('reason', __('Reason'), ['class' => 'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::text('reason', null, ['class' => 'form-control']); ?>

                           </div>
                       </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-6 ">
                <div class="employee-detail-wrap ">
                    <div class="card card-fluid">
                        <div class="card-header">
                            <h6 class="mb-0"><?php echo e(__('Company Detail')); ?></h6>
                        </div>
                        <div class="card-body employee-detail-edit-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Branch')); ?></strong>
                                        <span><?php echo e(!empty($employee->branch) ? $employee->branch->name : ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Date Of Joining')); ?></strong>
                                        <span><?php echo e(\Auth::user()->dateFormat($employee->company_doj)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if(\Auth::user()->type != 'employee'): ?>
        <div class="row">
            <div class="col-md-6 ">
                <div class="card card-fluid">
                    <div class="card-header">
                        <h6 class="mb-0"><?php echo e(__('Document')); ?></h6>
                    </div>
                    <div class="card-body employee-detail-edit-body">
                        <?php
                            $employeedoc = $employee->documents()->pluck('document_value', __('document_id'));
                        ?>

                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="form-group col-12">
                                    <div class="float-left col-4">
                                        <label for="document"
                                            class="float-left pt-1 form-control-label"><?php echo e($document->name); ?> <?php if($document->is_required == 1): ?>
                                                <span class="text-danger">*</span>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                    <div class="float-right col-8">
                                        <input type="hidden" name="emp_doc_id[<?php echo e($document->id); ?>]" id=""
                                            value="<?php echo e($document->id); ?>">
                                        <div class="choose-file form-group">
                                            <label for="document[<?php echo e($document->id); ?>]">
                                                <div><?php echo e(__('Choose File')); ?></div>
                                                <input
                                                    class="form-control <?php if(!empty($employeedoc[$document->id])): ?> float-left <?php endif; ?> <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0"
                                                    <?php if($document->is_required == 1 && empty($employeedoc[$document->id])): ?> required <?php endif; ?>
                                                    name="document[<?php echo e($document->id); ?>]" type="file"
                                                    id="document[<?php echo e($document->id); ?>]"
                                                    data-filename="<?php echo e($document->id . '_filename'); ?>">
                                            </label>
                                            <p class="<?php echo e($document->id . '_filename'); ?>"></p>
                                        </div>

                                        <?php if(!empty($employeedoc[$document->id])): ?>
                                            <br> <span class="text-xs"><a
                                                    href="<?php echo e(!empty($employeedoc[$document->id]) ? asset(Storage::url('uploads/document')) . '/' . $employeedoc[$document->id] : ''); ?>"
                                                    target="_blank"><?php echo e(!empty($employeedoc[$document->id]) ? $employeedoc[$document->id] : ''); ?></a>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-fluid">
                    <div class="card-header">
                        <h6 class="mb-0"><?php echo e(__('Bank Account Detail')); ?></h6>
                    </div>
                    <div class="card-body employee-detail-edit-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('account_holder_name', __('Account Holder Name'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('account_holder_name', null, ['class' => 'form-control']); ?>


                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('account_number', __('Account Number'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::number('account_number', null, ['class' => 'form-control']); ?>


                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('bank_name', __('Bank Name'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('bank_name', null, ['class' => 'form-control']); ?>


                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('bank_ifsc_code', __('Bank IFSC Code'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('bank_ifsc_code', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('branch_location', __('Branch Location'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('branch_location', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('pan_number', __('PAN Number'), ['class' => 'form-control-label']); ?>

                                <?php echo Form::text('pan_number', null, ['class' => 'form-control']); ?>

                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div> 
       
  
        <div class="row">
            <div class="col-md-12">
                <div class="card card-fluid">
                    <div class="card-header">
                        <h6 class="mb-0">Additional Details</h6>
                    </div>
                    <div class="card-body employee-detail-create-body">
                        <div class="row">
                            <input type="hidden" name="field_count" class="form-control" value="<?php echo count($fields); ?>">
                            <?php foreach ($fields as $value) {
        $field_value='';$field_data_id=0;
        foreach ($emp_field_data as $val) {
            if ($val->field_id==$value->id) {
                $field_data_id=$val->id;
                $field_value=$val->field_value;
            }
        }
      ?>
                            <input type="hidden" name="fields_<?php echo $value->id; ?>" value="<?php echo e($field_data_id); ?>">
                            <div class="form-group col-md-6">

                                <label class="form-control-label" for="fields"><?php echo e($value->field_name); ?></label>
                                <?php 
        $c=0;
        if ($value->type=='file') {
            ?>
                                <div class="choose-file form-group">
                                    <input type="hidden" name="fields[value_old][]" value="<?php echo e($field_value); ?>">
                                    <label for="document" class="form-control-label">
                                        <div>Choose file here</div>
                                        <input type="<?php echo $value->type; ?>" name="files_<?php echo e($c); ?>"
                                            class="form-control">
                                    </label>
                                    <p class="document_create"></p>
                                </div>
                                <!-- <input type="<?php echo $value->type; ?>" name="fields[value][]" class="form-control"> --><?php 
            $c++;
        }
        else if ($value->type=='radio') {
            ?>
                                <div class="row"><?php
            foreach ($fields_atribute as $atribute) {
                if ($atribute->field_id==$value->id) {
                 ?>
                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="<?php echo e($atribute->option_name); ?>"
                                                value="<?php echo e($atribute->option_value); ?>"
                                                name="fields[value_<?php echo e($value->id); ?>]" <?php if ($field_value == $atribute->option_value) {
                                                    echo 'checked';
                                                } ?>
                                                class="custom-control-input">
                                            <label class="custom-control-label"
                                                for="<?php echo e($atribute->option_name); ?>"><?php echo e($atribute->option_name); ?></label>
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
                                            <input type="checkbox" id="<?php echo e($atribute->option_name); ?>"
                                                value="<?php echo e($atribute->option_value); ?>"
                                                name="fields[value_<?php echo e($value->id); ?>]" <?php if ($field_value == $atribute->option_value) {
                                                    echo 'checked';
                                                } ?>
                                                class="custom-control-input">
                                            <label class="custom-control-label"
                                                for="<?php echo e($atribute->option_name); ?>"><?php echo e($atribute->option_name); ?></label>
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
                                    <select class="form-control select2-multiple" id="<?php echo e($atribute->option_name); ?>"
                                        name="fields[value_<?php echo e($value->id); ?>]" data-toggle="select2"
                                        data-placeholder="<?php echo e(__('Select...')); ?>"
                                        style="border-radius: 10px;height: 40px;box-shadow: none;line-height: 40px;font-size: 12px;font-family: 'Montserrat-SemiBold';font-weight: normal;">
                                        <?php
            foreach ($fields_atribute as $atribute) {
                if ($atribute->field_id==$value->id) {
            ?>
                                        <option value="<?php echo e($atribute->option_value); ?>" <?php if ($field_value == $atribute->option_value) {
                                            echo 'selected';
                                        } ?>>
                                            <?php echo e($atribute->option_name); ?></option>

                                        <?php
            }
          }
          ?>
                                    </select>
                                </div><?php 
        }
        else{
            ?>
                                <!-- <input type="<?php echo $value->type; ?>" name="fields[value_][]" value='<?php echo $field_value; ?>' class="form-control"> -->
                                <input type="<?php echo $value->type; ?>" name="fields[value_<?php echo e($value->id); ?>]"
                                    value='<?php echo $field_value; ?>' class="form-control"><?php
        } ?>

                                <input type="hidden" name="fields[id][]" class="form-control"
                                    value="<?php echo $value->id; ?>">
                                <input type="hidden" name="fields[name][]" class="form-control"
                                    value="<?php echo $value->field_name; ?>">
                                <input type="hidden" name="fields[type][]" class="form-control"
                                    value="<?php echo $value->type; ?>">
                                <input type="hidden" name="fields[mandatory][]" class="form-control"
                                    value="<?php echo $value->mandatory; ?>">

                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-6 ">
                <div class="employee-detail-wrap">
                    <div class="card card-fluid">
                        <div class="card-header">
                            <h6 class="mb-0"><?php echo e(__('Document Detail')); ?></h6>
                        </div>
                        <div class="card-body employee-detail-edit-body">
                            <div class="row">
                                <?php
                                    $employeedoc = $employee->documents()->pluck('document_value', __('document_id'));
                                ?>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12">
                                        <div class="info">
                                            <strong><?php echo e($document->name); ?></strong>
                                            <span><a href="<?php echo e(!empty($employeedoc[$document->id]) ? asset(Storage::url('uploads/document')) . '/' . $employeedoc[$document->id] : ''); ?>"
                                                    target="_blank"><?php echo e(!empty($employeedoc[$document->id]) ? $employeedoc[$document->id] : ''); ?></a></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="employee-detail-wrap">
                    <div class="card card-fluid">
                        <div class="card-header">
                            <h6 class="mb-0"><?php echo e(__('Bank Account Detail')); ?></h6>
                        </div>
                        <div class="card-body employee-detail-edit-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Account Holder Name')); ?></strong>
                                        <span><?php echo e($employee->account_holder_name); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info font-style">
                                        <strong><?php echo e(__('Account Number')); ?></strong>
                                        <span><?php echo e($employee->account_number); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info font-style">
                                        <strong><?php echo e(__('Bank Name')); ?></strong>
                                        <span><?php echo e($employee->bank_name); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Bank IFSC Code')); ?></strong>
                                        <span><?php echo e($employee->bank_ifsc_code); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Branch Location')); ?></strong>
                                        <span><?php echo e($employee->branch_location); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('PAN Number')); ?></strong>
                                        <span><?php echo e($employee->pan_number); ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-fluid">
                    <div class="card-header">
                        <h6 class="mb-0">Additional Details</h6>
                    </div>
                    <div class="card-body employee-detail-create-body">
                        <div class="row">
                            <input type="hidden" name="field_count" class="form-control" value="<?php echo count($fields); ?>">
                            <?php foreach ($fields as $value) {
      ?>
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="fields"><?php echo e($value->field_name); ?></label>
                                <?php if ($value->type=='file') {
            ?><input type="<?php echo $value->type; ?>" name="fields[value][]"
                                    class="form-control"><?php
        }
        else{
            ?><input type="<?php echo $value->type; ?>"
                                    name="fields[value_][]" class="form-control"><?php
        } ?>

                                <input type="hidden" name="fields[id][]" class="form-control"
                                    value="<?php echo $value->id; ?>">
                                <input type="hidden" name="fields[name][]" class="form-control"
                                    value="<?php echo $value->field_name; ?>">
                                <input type="hidden" name="fields[type][]" class="form-control"
                                    value="<?php echo $value->type; ?>">
                                <input type="hidden" name="fields[mandatory][]" class="form-control"
                                    value="<?php echo $value->mandatory; ?>">

                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    <?php endif; ?>
    <?php if(\Auth::user()->type != 'employee'): ?>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="<?php echo e(__('Update')); ?>"
                    class="btn-create btn-xs badge-blue radius-10px float-right">
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

// <?php $__env->startPush('script-page'); ?>
//     <script type="text/javascript">
//         function getDesignation(did) {
//             $.ajax({
//                 url: '<?php echo e(route('employee.json')); ?>',
//                 type: 'POST',
//                 data: {
//                     "department_id": did,
//                     "_token": "<?php echo e(csrf_token()); ?>",
//                 },
//                 success: function(data) {
//                     $('#designation_id').empty();
//                     $('#designation_id').append('<option value="">Select any Designation</option>');
//                     $.each(data, function(key, value) {
//                         var select = '';
//                         if (key == '<?php echo e($employee->designation_id); ?>') {
//                             select = 'selected';
//                         }

//                         $('#designation_id').append('<option value="' + key + '"  ' + select + '>' +
//                             value + '</option>');
//                     });
//                 }
//             });
//         }

//         $(document).ready(function() {
//             var d_id = $('#department_id').val();
//             var designation_id = '<?php echo e($employee->designation_id); ?>';
//             getDesignation(d_id);
//         });

//         $(document).on('change', 'select[name=department_id]', function() {
//             var department_id = $(this).val();
//             getDesignation(department_id);
//         });
//     </script>
    <script type="text/javascript">
        function getCompanyUnit(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json_company_unit')); ?>',
                type: 'POST',
                data: {
                    "company_id": did,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#company_client_unit_id').empty();
                    $('#company_client_unit_id').append(
                        '<option value="">Select any Company Client Unit</option>');
                    $.each(data, function(key, value) {
                        var select = '';
                        if (key == '<?php echo e($employee->company_client_unit_id); ?>') {
                            select = 'selected';
                        }

                        $('#company_client_unit_id').append('<option value="' + key + '"  ' + select +
                            '>' + value + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {
            var d_id = $('#department_id').val();
            var company_client_unit_id = '<?php echo e($employee->company_client_unit_id); ?>';
            getCompanyUnit(d_id);
        });

        $(document).on('change', 'select[name=company_client_id]', function() {
            var company_id = $(this).val();
            getCompanyUnit(company_id);
        });
    </script>
    <script>
        $('#note').hide();
        $('#status').on('change', function() {
            if ($(this).val() === 'Reject') {
                $('#note').show();
            } else{
                $('#note').hide();  
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#branch').on('change', function () {
                var branch_id = this.value;
                $("#company").html('');
                console.log('branch_id');
                $.ajax({
                    url: "<?php echo e(url('branch-company')); ?>",
                    type: "POST",
                    data: {
                        branch_id: branch_id,
                        _token: '<?php echo e(csrf_token()); ?>'
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
 
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/jaysecurity/rms.jaysecurity.in/resources/views/employee/edit.blade.php ENDPATH**/ ?>