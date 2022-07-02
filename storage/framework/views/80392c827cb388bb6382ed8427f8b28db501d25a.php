<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Right Panel -->
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                        <a href="<?php echo e(url('/admin/add-delivery-status')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Delivery Status</a>
                        </ol>
                        </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php if(session('success')): ?>
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
       <?php endif; ?>
       <?php if(session('error')): ?>
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        <?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Delivery Status</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="DeliveryStatusTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Delivery Status</th>
                                            <th>Company Name</th>
                                            <th>Customer Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email id</th>
                                            <th>Package Name</th>
                                            <th>Contract Amount</th>
                                            <th>Payment Status</th>
                                            <th>Developer Name</th>
                                            <th>Project Assign Date</th>
                                            <th>Project Delivery Date</th>
                                            <th>Remaining Work</th>
                                            <th>Domain Status</th>
                                            <th>Domain Name</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $count = 0; ?>
                                        
                                        <?php $__currentLoopData = $deliverystatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverystatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$count); ?></td>
                                                <td><?php echo e($deliverystatus->delivery_status); ?></td>
                                                <td><?php echo e($deliverystatus->company_name); ?></td>
                                                <td><?php echo e($deliverystatus->customer_name); ?></td>
                                                <td><?php echo e($deliverystatus->mobile); ?></td>
                                                <td><?php echo e($deliverystatus->email); ?></td>
                                                <td><?php echo e($deliverystatus->package_name); ?></td>
                                                <td><?php echo e($deliverystatus->contract_amount); ?></td>
                                                <td><?php echo e($deliverystatus->payment_status); ?></td>
                                                <td><?php echo e($deliverystatus->developer_name); ?></td>
                                                <td><?php echo e($deliverystatus->project_assign_date); ?></td>
                                                <td><?php echo e($deliverystatus->project_delivery_date); ?></td>
                                                <td><?php echo e($deliverystatus->remaining_work); ?></td>
                                                <td><?php echo e($deliverystatus->domain_status); ?></td>
                                                <td><?php echo e($deliverystatus->domain_name); ?></td>
                                                <td><?php echo e($deliverystatus->comment); ?></td>
                                                <td>
                                                    <a href="edit-delivery-status/<?php echo e($deliverystatus->id); ?>" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a> 
                                                    <a href="<?php echo e(url('admin/delivery-status/'.$deliverystatus->id.'/delete')); ?>" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        
        
     </div><!-- /#right-panel -->
   
    <!-- Right Panel -->
    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $('#DeliveryStatusTable').DataTable();
    </script>
</body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/delivery-status.blade.php ENDPATH**/ ?>