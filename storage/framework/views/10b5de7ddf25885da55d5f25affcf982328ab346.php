
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
                            
                                    <?php echo e(Form::label('company_unit', __('Company Unit '),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::select('company_unit', $company_unit,isset($_GET['company_unit'])?$_GET['company_unit']:'', array('class' => 'form-control select2'))); ?>

                                    
                            </div>
                            <div class="col-sm-3">
                        <?php endif; ?>
                            <?php echo e(Form::open(array('route' => array('setsalary.index'),'method'=>'get','id'=>'setsalary_filter'))); ?>

                        <?php if(\Auth::user()->type != 'setsalary'): ?>
                            
                                        <?php echo e(Form::label('company', __('Company'),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::select('company', $company,isset($_GET['company'])?$_GET['company']:'', array('class' => 'form-control select2'))); ?>

                                    
                            </div>
                            
                        <?php endif; ?>
                        <div class="col-sm-3">
                            <a href="#" class="apply-btn" onclick="document.getElementById('setsalary_filter').submit(); return false;">
                                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="<?php echo e(route('setsalary.index')); ?>" class="reset-btn">
                                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                            </a>
                        </div>
             </div>
                    <?php echo e(Form::close()); ?>


<div class="table-responsive">
    <table class="table table-striped mb-0 dataTable" >
        <thead>
        <tr>
            <th><?php echo e(__('Employee Id')); ?></th>
            <th><?php echo e(__('Name')); ?></th>
            <th><?php echo e(__('Branch')); ?></th>
            <th><?php echo e(__('Company')); ?></th>
            <th><?php echo e(__('Company Unit')); ?></th>
            <th><?php echo e(__('Payroll Type')); ?></th>
            <th><?php echo e(__('Salary')); ?></th>
            <th><?php echo e(__('Net Salary')); ?></th>
             <th width="3%"><?php echo e(__('Action')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="Id">
                    <a href="<?php echo e(route('setsalary.show',$employee->id)); ?>"  data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                        <?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?>

                    </a>
                </td>
                <td><?php echo e($employee->name); ?></td>
                <td> <?php 
                foreach ($branch as $key => $value) {
                        if ($key==$employee->branch_id) {
                           echo $value;
                        }
                } 
                ?></td>
                <td><?php echo e($employee->client_name); ?></td>
                <td><?php echo e($employee->client_unit); ?></td>
                <td><?php echo e($employee->salary_type()); ?></td>
                <td><?php echo e(\Auth::user()->priceFormat($employee->salary)); ?></td>
                <td><?php echo e(!empty($employee->get_net_salary()) ?\Auth::user()->priceFormat($employee->get_net_salary()):''); ?></td>
                <td>
                    <a href="<?php echo e(route('setsalary.show',$employee->id)); ?>" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                        <i class="fas fa-eye"></i>
                    </a>
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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/progressiveaidat/public_html/rms/resources/views/setsalary/index.blade.php ENDPATH**/ ?>