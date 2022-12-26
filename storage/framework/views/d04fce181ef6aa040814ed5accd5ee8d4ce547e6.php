
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Manage Employee Salary')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-12">
    
<div class="card-body py-0">
    
                <div class="row">
                    <div class="col-sm-3"> 
                     <?php echo e(Form::open(array('route' => array('setsalary.index'),'method'=>'get','id'=>'setsalary_filter'))); ?>

                        <?php if(\Auth::user()->type != 'setsalary'): ?>
                            
                                    <?php echo e(Form::label('branch', __('Branch'),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::select('branch', $branch,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2'))); ?>

                                    
                     </div>
                     <div class="col-sm-3">
                        <?php endif; ?>
                            <?php echo e(Form::open(array('route' => array('setsalary.index'),'method'=>'get','id'=>'setsalary_filter'))); ?>

                        <?php if(\Auth::user()->type != 'setsalary'): ?>
                            
                                        <?php echo e(Form::label('company', __('Company'),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::select('company', $company_client,isset($_GET['company'])?$_GET['company']:'', array('class' => 'form-control select2'))); ?>

                                    
                      </div>
                            
                        <?php endif; ?>
                    <div class="col-sm-2">
                            <a href="#" class="apply-btn" onclick="document.getElementById('setsalary_filter').submit(); return false;">
                                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="<?php echo e(route('setsalary.index')); ?>" class="reset-btn">
                                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                            </a>
                    </div>

                    <div class="col-sm-2">
                        <a href="<?php echo e(route('setsalary.export')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                        <i class="fa fa-file-excel"></i> <?php echo e(__('Export')); ?>

                        </a>
                    </div>
        
                 </div>
        </div>
                    <?php echo e(Form::close()); ?>


<div class="table-responsive">
    <table class="table table-striped mb-0 dataTable" >
    <thead>
    <tr><th><?php echo e(__('Employee Name')); ?></th>
        <th><?php echo e(__('Branch')); ?></th>
        <th><?php echo e(__('Company ')); ?></th>
        <th><?php echo e(__('Role')); ?></th>
        <th><?php echo e(__('Salary')); ?></th>
        <th><?php echo e(__('HRA / day')); ?></th>
        <th><?php echo e(__('Washing Allowances / day')); ?></th>
       
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $company_wise_salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <td><?php echo e($sal->salary); ?></td>
            <td><?php echo e($sal->hra); ?></td>
            <td><?php echo e($sal->washing_allowances); ?></td>
            
           
            
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/progressiveaidat/public_html/rms/resources/views/emp_salary/index.blade.php ENDPATH**/ ?>