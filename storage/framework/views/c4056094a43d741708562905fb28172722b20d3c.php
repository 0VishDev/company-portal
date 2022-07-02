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
    <?php if(Auth::user()->id == 1): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Vendor</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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
        <?php if($errors->any()): ?>
            <div class="col-sm-12">
             <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($error); ?>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                       <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                       <form action="<?php echo e(route('admin.add-vendor')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                        <div class="card">
                           <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name <span class="require">*</span></label>
                                                <input id="name" name="name" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Username <span class="require">*</span></label>
                                                <input id="username" name="username" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                    <label for="email" class="control-label mb-1">Email <span class="require">*</span></label>
                                                    <input id="email" name="email" type="text" class="form-control" data-bvalidator="email,required">
                                            </div>
                                            <input type="hidden" name="user_type" value="vendor">
                                            <div class="form-group">
                                                    <label for="password" class="control-label mb-1">Password <span class="require">*</span></label>
                                                    <input id="password" name="password" type="text" class="form-control" data-bvalidator="required">
                                             </div>
                                              <div class="form-group">
                                                    <label for="password" class="control-label mb-1">City <span class="require">*</span></label>
                                                    <select class="form-control" id="city" name="city" data-bvalidator="required">
                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($city->id); ?>"><?php echo e($city->city_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="theme">Theme <span class="require">*</span></label><br>
                                                <label for="theme_1">
                                                    <input type="radio" name="theme" value="theme-1" id="theme_1"> 
                                                    <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-1.jpg" alt="Theme 1">
                                                    <span>Theme 1</span>
                                                 </label><br>
                                                 <label for="theme_2">
                                                    <input type="radio" name="theme" value="theme-2" id="theme_2">
                                                    <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-2.jpg" alt="Theme 2">
                                                    <span>Theme 2</span>
                                                 </label><br>
                                                 <label for="theme_3">
                                                    <input type="radio" name="theme" value="theme-3" id="theme_3">
                                                    <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-3.jpg" alt="Theme 3">
                                                    <span>Theme 3</span>
                                                 </label><br>
                                                 <label for="theme_4">
                                                    <input type="radio" name="theme" value="theme-4" id="theme_4">
                                                    <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-4.jpg" alt="Theme 4">
                                                    <span>Theme 4</span>
                                                 </label>
                                            </div>
                                            <div class="form-group">
                                                    <label for="earnings" class="control-label mb-1">Earnings (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                                                    <input id="earnings" name="earnings" type="text" class="form-control" data-bvalidator="min[0]">
                                            </div>
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Upload Photo</label>
                                                    <input type="file" id="user_photo" name="user_photo" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg"></div></div>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                     <i class="fa fa-dot-circle-o"></i> Submit
                                 </button>
                                 <button type="reset" class="btn btn-danger btn-sm">
                                     <i class="fa fa-ban"></i> Reset
                                  </button>
                           </div>
                          </div> 
                       </form> 
                    </div>
                  </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/inforrmz/venicered.com/resources/views/admin/add-vendor.blade.php ENDPATH**/ ?>