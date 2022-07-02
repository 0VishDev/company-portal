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
                        <h1>Post Steps</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/post-steps/add/'.$postId)); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Step</a>
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
                                <strong class="card-title">Post Steps</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="callbackTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Step Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php $__currentLoopData = $postSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postStep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$no); ?></td>
                                                <td><?php echo e($postStep->step_name); ?></td>
                                                <td>
                                                    <?php if(!empty($postStep->step_image)): ?> 
                                                      <img height="50" src="<?php echo e(url('/')); ?>/public/storage/post-steps/<?php echo e($postStep->step_image); ?>" alt="<?php echo e($postStep->step_name); ?>" />
                                                   <?php else: ?> 
                                                      <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($postStep->step_name); ?>" />  
                                                   <?php endif; ?>
                                                </td>
                                                <td><?php echo e($postStep->step_description); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($postStep->created_at)->format('d M, Y g:i A')); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('admin/post-steps/'.$postStep->id.'/edit')); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a> 
                                                    <a href="<?php echo e(url('admin/post-steps/'.$postStep->id.'/delete')); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/post-steps.blade.php ENDPATH**/ ?>