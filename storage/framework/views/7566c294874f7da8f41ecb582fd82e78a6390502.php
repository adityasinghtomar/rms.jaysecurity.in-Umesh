<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Manage Employee Salary')); ?>

<?php $__env->stopSection(); ?> 

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Employee')): ?>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                    <a href="<?php echo e(route('salary.create')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                        <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                    </a>
                </div>
            </div>
        <?php endif; ?>
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
        <th><?php echo e(__('Branch')); ?></th>
        <th><?php echo e(__('Company')); ?></th>
         <th width="3%"><?php echo e(__('Action')); ?></th>
    </tr>
    </thead>
    <tbody>
        
    <?php $__currentLoopData = $salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <td>
                <?php 
                foreach ($branch as $key => $value) {
                        if ($key==$sal->branch_id) {
                           echo $value;
                        }
                } 
                ?>
            </td>
            <td>
                <?php 
                foreach ($company_client as $key => $value) {
                        if ($key==$sal->company_client_id) {
                           echo $value;
                        }
                } 
                ?>
            </td>
            
            <td>
                    <a href="<?php echo e(route('salary.edit',$sal->id)); ?>" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="<?php echo e(__('Apply')); ?>">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="<?php echo e(route('salary.show',$sal->id)); ?>" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($sal->id); ?>').submit();"><i class="fas fa-trash"></i></a>
            <?php echo Form::open(['method' => 'DELETE', 'route' => ['salary.destroy', $sal->id],'id'=>'delete-form-'.$sal->id]); ?>

            <?php echo Form::close(); ?>

                </td>
           
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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/progressiveaidat/public_html/rms/resources/views/salary/index.blade.php ENDPATH**/ ?>