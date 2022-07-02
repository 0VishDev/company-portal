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
                        <h1>Distributorship Metter Sheet</h1>
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
                                <strong class="card-title">Distributorship Metter Sheet</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="distributorshipSheetTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Company Name</th>
                                            <th>Contact Person Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Designation</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $distributorshipSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $distributorshipSheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$key); ?></td>
                                                <td><?php echo e($distributorshipSheet->company_name); ?></td>
                                                <td><?php echo e($distributorshipSheet->contact_name); ?></td>
                                                <td><?php echo e($distributorshipSheet->email); ?></td>
                                                <td><?php echo e($distributorshipSheet->mobile); ?></td>
                                                <td><?php echo e($distributorshipSheet->designation); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($distributorshipSheet->created_at)->format('d M, Y g:i A')); ?></td>
                                                <td>
                                                  <button class="btn btn-danger mb-1" title="Download" data-download-distributorship-metter-sheet sheet="<?php echo e($distributorshipSheet); ?>"><span class="fa fa-download"></span></button>
                                                  <a href="<?php echo e(url('admin/distributorship-sheet/'.$distributorshipSheet->id.'/delete')); ?>" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
        $('#distributorshipSheetTable').DataTable();
    </script>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/distributorship-sheet.blade.php ENDPATH**/ ?>