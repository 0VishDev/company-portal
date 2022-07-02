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
                        <h1>E-Filings</h1>
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
                                <strong class="card-title">E-Filings</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="callbackTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Registration</th>
                                            <th>Detail Of Dervices</th>
                                            <th>description</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $eFilings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eFiling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($eFiling->user_name); ?></td>
                                                <td><?php echo e($eFiling->email); ?></td>
                                                <td><?php echo e($eFiling->mobile); ?></td>
                                                
                                                <td><?php echo e((isset($eFiling->state) ? $eFiling->state->state_name : '')); ?></td>
                                                <td><?php echo e((isset($eFiling->city) ? $eFiling->city->city_name : '')); ?></td>
                                                
                                                <td><?php echo e($eFiling->registration); ?></td>
                                                <td><?php echo e($eFiling->detail_of_services); ?></td>
                                                <td><?php echo e($eFiling->description); ?></td>
                                                
                                                <td><?php echo e(\Carbon\Carbon::parse($eFiling->created_at)->format('d M, Y g:i A')); ?></td>
                                                <td>
                                                    <?php if($eFiling->is_verify == 0): ?>
                                                        <a href="<?php echo e(url('admin/e-filings/'.$eFiling->id.'/verify')); ?>" class="btn btn-danger" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(url('admin/e-filings/'.$eFiling->id.'/delete')); ?>" title="Delete" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
</html><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/admin/e-filings.blade.php ENDPATH**/ ?>