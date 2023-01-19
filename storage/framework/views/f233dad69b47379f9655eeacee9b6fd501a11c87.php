<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Account Statement')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/jszip.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/pdfmake.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/dataTables.buttons.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/buttons.html5.js')); ?>"></script>


    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>
        var filename = $('#filename').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A4'}
            };
            html2pdf().set(opt).from(element).save();

        }


        $(document).ready(function () {
            var filename = $('#filename').val();
            $('#report-dataTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        title: filename
                    },
                    {
                        extend: 'excel',
                        title: filename
                    }, {
                        extend: 'csv',
                        title: filename
                    }
                ]
            });
        });


    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="row d-flex justify-content-end">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <?php echo e(Form::open(array('route' => array('report.account.statement'),'method'=>'get','id'=>'report_acc_filter'))); ?>

            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('start_month',__('Start Month'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::month('start_month',isset($_GET['start_month'])?$_GET['start_month']:'',array('class'=>'month-btn form-control'))); ?>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('end_month',__('End Month'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::month('end_month',isset($_GET['end_month'])?$_GET['end_month']:'',array('class'=>'month-btn form-control'))); ?>

                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('account', __('Account'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::select('account', $accountList,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control select2'))); ?>

                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('type', __('Type'),['class'=>'text-type'])); ?>

                    <select class="form-control select2" id="type" name="type">
                        <option value="income" <?php echo e((isset($_GET['account']) && $_GET['type']=='income')?'selected':''); ?>><?php echo e(__('Income')); ?></option>
                        <option value="expense" <?php echo e((isset($_GET['account']) && $_GET['type']=='expense')?'selected':''); ?>><?php echo e(__('Expense')); ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-auto my-custom">
            <a href="#" class="apply-btn" onclick="document.getElementById('report_acc_filter').submit(); return false;" data-toggle="tooltip" data-original-title="<?php echo e(__('apply')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
            </a>
            <a href="<?php echo e(route('report.account.statement')); ?>" class="reset-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Reset')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
            </a>
            <a href="#" class="action-btn" onclick="saveAsPDF()" data-toggle="tooltip" data-original-title="<?php echo e(__('Download')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-download"></i></span>
            </a>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="printableArea" class="mt-4">
        <div class="row mt-3">
            <div class="col">
                <input type="hidden" value="<?php echo e(__('Account Statement').' '. $filterYear['type'].' '.'Report of'.' '.$filterYear['startDateRange'].' to '.$filterYear['endDateRange']); ?>" id="filename">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0"><?php echo e(__('Report')); ?> :</h5>
                    <h5 class="report-text mb-0"><?php echo e(__('Account Statement Summary')); ?></h5>
                </div>
            </div>
            <?php if($filterYear['type']!='All'): ?>
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0"><?php echo e(__('Transaction Type')); ?> :</h5>
                        <h5 class="report-text mb-0"><?php echo e($filterYear['type']); ?></h5>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0"><?php echo e(__('Duration')); ?> :</h5>
                    <h5 class="report-text mb-0"><?php echo e($filterYear['startDateRange'].' to '.$filterYear['endDateRange']); ?></h5>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0"><?php echo e($account->account_name); ?></h5>
                        <h5 class="report-text mb-0">
                            <?php if(isset($_GET['type']) && $_GET['type'] =='expense'): ?>
                                <?php echo e(__('Total Debit')); ?> :
                            <?php else: ?>
                                <?php echo e(__('Total Credit')); ?> :
                            <?php endif; ?> :
                            <?php echo e(\Auth::user()->priceFormat($account->total)); ?>

                        </h5>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table table-striped mb-0" id="report-dataTable">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Account')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $accountData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(!empty($account->accounts)?$account->accounts->account_name:''); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($account->date)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($account->amount)); ?></td>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/jaysecurity/sms.jaysecurity.in/resources/views/report/account_statement.blade.php ENDPATH**/ ?>