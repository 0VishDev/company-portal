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
                        <h1>Logistics</h1>
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
                                <strong class="card-title">Logistics</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="callbackTable">
                                    <thead>
                                        <tr>
                                            <th>Load Type</th>
                                            <th>Shipment Price</th>
                                            <th>Pickup Date</th>
                                            <th>Pickup Pincode</th>
                                            <th>Delivery Code</th>
                                            <th>Pickup Addrress</th>
                                            <th>Delivery Address</th>
                                            <th>Weight</th>
                                            <th>Types Of Material</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $logistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($logistic->load_type); ?></td>
                                                <td><?php echo e($logistic->shipment_price); ?></td>
                                                <td><?php echo e((!empty($logistic->pickup_date) ? \Carbon\Carbon::parse($logistic->pickup_date)->format('d M, Y g:i A') : '')); ?></td>
                                                <td><?php echo e($logistic->pickup_pincode); ?></td>
                                                <td><?php echo e($logistic->delivery_code); ?></td>
                                                <td><?php echo e($logistic->pickup_addrress); ?></td>
                                                <td><?php echo e($logistic->delivery_address); ?></td>
                                                <td><?php echo e($logistic->weight); ?>(<?php echo e($logistic->weight_type); ?>)</td>
                                                <td><?php echo e($logistic->types_of_material); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($logistic->created_at)->format('d M, Y g:i A')); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-danger" title="Download"><span class="fa fa-download"></span></a>
                                                    <?php if($logistic->is_verify == 0): ?>
                                                        <a href="<?php echo e(url('admin/logistics/'.$logistic->id.'/verify')); ?>" class="btn btn-danger" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(url('admin/logistics/'.$logistic->id.'/delete')); ?>" title="Delete" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/admin/logistics.blade.php ENDPATH**/ ?>