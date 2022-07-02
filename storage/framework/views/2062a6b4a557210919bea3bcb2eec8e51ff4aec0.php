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
                        <h1>Service Provider </h1>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/service-providers/add')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Service Provider</a>
                        </ol>
                    </div>
                </div>
            </div>-->
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
                                <strong class="card-title">Service Provider</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                            <th>Name</th>
                                            
                                            <th>Email</th>
                                            <th>Mobile No.</th>
                                            <th>Requirments</th>
                                            <th>Date/Time</th>
                                            <th>Delete</th>
                                            <!--<th>Image</th>
                                            <th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0; ?>
                                    <?php $__currentLoopData = $serviceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceProvider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$no); ?></td>
                                            <td><?php echo e($serviceProvider->first_name); ?> <?php echo e($serviceProvider->last_name); ?></td>
                                            
                                            <td>
                                                <?php echo e($serviceProvider->email); ?>

                                            </td>
                                            <td>
                                                <?php echo e($serviceProvider->mobile); ?>

                                            </td>
                                            <td>
                                                <?php echo e($serviceProvider->requirments); ?>

                                            </td>
                                            <td>
                                                <?php echo e($serviceProvider->created_at); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('admin/dealing-services-delete/'.$serviceProvider->id.'/delete')); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            </td>
                                            
                                            <!--<td>
                                                <?php if(!empty($serviceProvider->provider_image)): ?> 
                                                  <img height="50" src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($serviceProvider->provider_image); ?>" alt="<?php echo e($serviceProvider->provider_name); ?>" />
                                               <?php else: ?> 
                                                  <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($serviceProvider->provider_name); ?>" />  
                                               <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('admin/service-providers/'.$serviceProvider->id.'/edit')); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a> 
                                                <a href="<?php echo e(url('admin/service-providers/'.$serviceProvider->id.'/delete')); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            </td>-->
                                            
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
</html><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/admin/service-providers/dealing.blade.php ENDPATH**/ ?>