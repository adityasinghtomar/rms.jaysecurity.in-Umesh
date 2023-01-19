<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Show Salary')); ?>

<?php $__env->stopSection(); ?> 



<?php $__env->startSection('content'); ?>

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body py-0">
<div class="table-responsive">
<table class="table table-striped mb-0 dataTable" >
    <thead>
    <tr>
        <th><?php echo e(__('Employee Name')); ?></th>
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
                        if ($key==$sal->role_id) {
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
</div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/jaysecurity/sms.jaysecurity.in/resources/views/salary/view.blade.php ENDPATH**/ ?>