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
                        <h1>Service Packages</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/service-providers/add')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Service Provider</a>
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
                                <strong class="card-title">Service Providers</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Total Leads</th>
                                            <th>Image</th>
                                            <th>Small Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0; ?>
                                    <?php $__currentLoopData = $serviceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceProvider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$no); ?></td>
                                            <td><?php echo e($serviceProvider->provider_name); ?></td>
                                            <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($serviceProvider->service_price); ?></td>
                                            <td><?php echo e($serviceProvider->total_lead); ?></td>
                                            <td>
                                                <?php if(!empty($serviceProvider->provider_image)): ?> 
                                                  <img height="50" src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($serviceProvider->provider_image); ?>" alt="<?php echo e($serviceProvider->provider_name); ?>" />
                                               <?php else: ?> 
                                                  <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($serviceProvider->provider_name); ?>" />  
                                               <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($serviceProvider->provider_small_image)): ?> 
                                                  <img height="50" src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($serviceProvider->provider_small_image); ?>" alt="<?php echo e($serviceProvider->provider_name); ?>" />
                                               <?php else: ?> 
                                                  <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($serviceProvider->provider_name); ?>" />  
                                               <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('admin/service-providers/'.$serviceProvider->id.'/edit')); ?>" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a> 
                                                <a href="<?php echo e(url('admin/service-providers/'.$serviceProvider->id.'/delete')); ?>" class="btn btn-danger btn-sm mb-1" onClick="return confirm('Are you sure you want to delete?');" title="Delete"><i class="fa fa-trash"></i></a>
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
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/service-providers/list.blade.php ENDPATH**/ ?>