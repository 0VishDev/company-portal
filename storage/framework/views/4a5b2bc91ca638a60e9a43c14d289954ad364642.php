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
                        <h1>Delivery Status</h1>
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
                          
                        <form action="<?php echo e(url('admin/delivery-status/add')); ?>" method="POST" enctype="multipart/form-data" id="deliverystatus">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="deliverystatus_user_id" name="user_id">
                            <div class="p-3 shadow">
                                <div class="row">
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Delivery Status</label>
                                            <input type="text" class="form-control shadow" id="delivery_status" name="delivery_status" value=""/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Name</label>
                                            <select class="form-control shadow" id="company_name" name="company_name">
                                               <option value="">- Please select -</option>
                                                <?php $__currentLoopData = $vendorsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $serviceProvider = \ZigKart\Helpers::getPackage($vendor->id); ?>
                                                    <option value="<?php echo e($vendor->company_name); ?>" vendor="<?php echo e($vendor); ?>" serviceProvider="<?php echo e((!empty($serviceProvider) ? $serviceProvider : '')); ?>"><?php echo e($vendor->company_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Customer Name</label>
                                            <input type="text" class="form-control shadow" id="customer_name" name="customer_name" value="" required/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control shadow" id="mobile" name="mobile" value="" required/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Email id</label>
                                            <input type="email" class="form-control shadow" id="email" name="email" value="" required/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Package Name</label>
                                            <select class="form-control shadow" id="package_name" name="package_name">
                                            <option value="">- Please select -</option>
                                                <?php $__currentLoopData = $serviceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceProvider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($serviceProvider->provider_name); ?>"><?php echo e($serviceProvider->provider_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Contract Amount</label>
                                            <input type="text" class="form-control shadow" id="contract_amount" name="contract_amount" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Payment Status</label>
                                            <select class="form-control shadow" id="payment_status" name="payment_status">
                                            <option value=""></option>
                                            <option value="Due">Due</option>
                                            <option value="No Due">No Due</option>
                                            </select>
                                            </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Developer Name</label>
                                            <input type="text" class="form-control shadow" id="developer_name" name="developer_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Project Assign Date</label>
                                            <input type="date" class="form-control shadow" id="project_assign_date" name="project_assign_date" value="" />
                                            </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Remaining Work</label>
                                            <input type="text" class="form-control shadow" id="remaining_work" name="remaining_work" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Project Delivery Date</label>
                                            <input type="date" class="form-control shadow" id="project_delivery_date" name="project_delivery_date" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Domain Status</label>
                                            <select class="form-control shadow" id="domain_status" name="domain_status">
                                                <option value=""></option>
                                                <option value="Booked">Booked</option>
                                                <option value="Not Booked">Not Booked</option>
                                            </select>
                                            </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Domain Name</label>
                                            <input type="text" class="form-control shadow" id="domain_name" name="domain_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Comment</label>
                                            <input type="text" class="form-control shadow" id="comment" name="comment" value="" />
                                        </div>
                                        <div class="col-sm-12 form-group mb-3 text-center">
                                            <input type="submit" class="btn btn-success" value="Submit">
                                        </div>
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
</body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/add-delivery-status.blade.php ENDPATH**/ ?>