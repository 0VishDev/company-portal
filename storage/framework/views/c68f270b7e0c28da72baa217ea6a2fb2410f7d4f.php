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
                        <h1>Service Package Tags</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-package-tag')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Service Package Tag</a>
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
                                <strong class="card-title">Service Package Tags</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="servicePackageTagTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Seller</th>
                                            <th>Company</th>
                                            <th>Email Id</th>
                                            <th>Package</th>
                                            <th>Contract Amount</th>
                                            <th>Service Details</th>
                                            <th>Package Tag</th>
                                            <th>Invoice</th>
                                            <th>Start Date</th>
                                            <th>Expiry Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php $__currentLoopData = $packageTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$no); ?></td>
                                                <td><?php echo e($packageTag->user->name); ?></td>
                                                <td><?php echo e($packageTag->user->company_name); ?></td>
                                                <td><?php echo e($packageTag->user->email); ?></td>
                                                <td><?php echo e($packageTag->service_provider->provider_name); ?></td>
                                                <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($packageTag->contract_amount); ?></td>
                                                <td><?php echo $packageTag->packege_details; ?></td>
                                                <td>
                                                    <?php if(!empty($packageTag->service_provider->provider_image)): ?> 
                                                      <img width="100%" src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($packageTag->service_provider->provider_image); ?>" alt="<?php echo e($packageTag->service_provider->provider_name); ?>" />
                                                   <?php else: ?> 
                                                      <img width="100%" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($packageTag->service_provider->provider_name); ?>" />  
                                                   <?php endif; ?>
                                                </td>
                                                <td><a href="#" data-toggle="modal" data-target="#packageTagInvoice<?php echo e($packageTag->id); ?>" style="color:#007bff;"><u>View Invoice</u></a></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($packageTag->start_date)->format('d M, Y')); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($packageTag->expiry_date)->format('d M, Y')); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('admin/package-tag/'.$packageTag->id.'/edit')); ?>" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a> 
                                                    <a href="<?php echo e(url('admin/package-tag/'.$packageTag->id.'/delete')); ?>" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
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
        
        <?php $__currentLoopData = $packageTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Modal -->
            <div class="modal fade" id="packageTagInvoice<?php echo e($packageTag->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Sno</th>
                          <th scope="col">Invoice</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($packageTag->packege_invoice)): ?>
                            <?php $packageInvoice = explode(',', $packageTag->packege_invoice); ?>
                            <?php $__currentLoopData = $packageInvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <th scope="row"><?php echo e(++$key1); ?></th>
                                  <td><a href="<?php echo e(url('public/storage/service-providers/'.$invoice)); ?>" target="_blank" style="color:#007bff;"><u>View Invoice</u></a></td>
                                  <td>
                                    <a href="<?php echo e(url('admin/package-tag/invoice/'.$packageTag->id.'/delete?invoice='.$invoice)); ?>" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                                   </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
     </div><!-- /#right-panel -->
   
    <!-- Right Panel -->
    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <script>
        $('#servicePackageTagTable').DataTable();
    </script>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/package-tag.blade.php ENDPATH**/ ?>