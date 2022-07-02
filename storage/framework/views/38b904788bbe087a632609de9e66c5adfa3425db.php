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
                        <h1>Service Package Tag</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                          <form action="<?php echo e(url('admin/package-tag/add')); ?>" method="POST" id="packageTagForm" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <input type="hidden" id="package_tag_id" name="package_tag_id" value="<?php echo e(($mode == 'edit' ? $packageTag->id : '')); ?>">
                                
                               <div class="col-md-6">
                                 <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Seller Name <span class="require">*</span></label>
                                                    <select class="form-control" id="user_id" name="user_id" required>
                                                        <option value="">-- Please select--</option>
                                                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($vendor->id); ?>" vendor-company-name="<?php echo e($vendor->company_name); ?>"  vendor-email="<?php echo e($vendor->email); ?>" <?php echo e(($mode == 'edit' ? ($packageTag->user_id == $vendor->id ? 'selected' : '') : '')); ?>><?php echo e($vendor->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Seller Company Name <span class="require">*</span></label>
                                                    <input type="text" class="form-control" id="seller_company_name" name="seller_company_name" value="<?php echo e(($mode == 'edit' ? $packageTag->user->company_name : '')); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Seller Email <span class="require">*</span></label>
                                                    <input type="text" class="form-control" id="seller_email" name="seller_email" value="<?php echo e(($mode == 'edit' ? $packageTag->user->email : '')); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Service Package <span class="require">*</span></label>
                                                    <select class="form-control" id="service_provider_id" name="service_provider_id" required>
                                                        <?php $__currentLoopData = $serviceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceProvider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($serviceProvider->id); ?>" <?php echo e(($mode == 'edit' ? ($packageTag->service_provider_id == $serviceProvider->id ? 'selected' : '') : '')); ?>><?php echo e($serviceProvider->provider_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Contract Amount <span class="require">*</span></label>
                                                    <input type="number" class="form-control" id="contract_amount" name="contract_amount" value="<?php echo e(($mode == 'edit' ? $packageTag->contract_amount : '')); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Start Date<span class="require">*</span></label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo e(($mode == 'edit' ? \Carbon\Carbon::parse($packageTag->start_date)->format('Y-m-d') : '')); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Expiry Date <span class="require">*</span></label>
                                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?php echo e(($mode == 'edit' ? \Carbon\Carbon::parse($packageTag->expiry_date)->format('Y-m-d') : '')); ?>">
                                                </div>
                                             </div>
                                        </div>
                                     </div>
                                </div>
                                
                                <div class="col-md-6">
                                 <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Service Details <span class="require">*</span></label>
                                                    <textarea class="control-label mb-1" name="packege_details" row="2"><?php echo e(($mode == 'edit' ? $packageTag->packege_details : '')); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Invoice <span class="require">*</span></label>
                                                    <input type="file" class="form-control" id="packege_invoice" name="packege_invoice" value="">
                                                </div>
                                             </div>
                                        </div>
                                     </div>
                                </div>
                                
                               <div class="col-md-12 no-padding">
                                 <div class="card-footer">
                                     <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
                                 </div>
                             </div>
                           </form>
                        </div> 
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
   <script>
       $('#user_id').change(function () {
           $('#seller_company_name').val($('#user_id :selected').attr('vendor-company-name'));
           $('#seller_email').val($('#user_id :selected').attr('vendor-email'));
       });
   </script>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/add-package-tag.blade.php ENDPATH**/ ?>