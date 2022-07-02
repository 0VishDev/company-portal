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
                        <h1><?php echo e(($mode == 'add' ? 'Add' : 'Edit')); ?> Post Step</h1>
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
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                           
                          <form action="<?php echo e(url('admin/post-steps/add')); ?>" method="post" id="category_form" enctype="multipart/form-data">
                           <?php echo csrf_field(); ?>
                           
                           <input type="hidden" name="post_id" id="post_id" value="<?php echo e($postId); ?>">
                           <input type="hidden" name="post_step_id" id="post_step_id" value="<?php echo e(($mode == 'edit' ? $postStep->id : '')); ?>">
                           
                           <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Step Name <span class="require">*</span></label>
                                                <input id="step_name" name="step_name" type="text" class="form-control" data-bvalidator="required" value="<?php echo e(($mode == 'edit' ? $postStep->step_name : '')); ?>">
                                                <?php if($errors->has('step_name')): ?>
                                                  <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('step_name')); ?></strong>
                                                  </span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Step Image (size: 128 x 128) <span class="require">*</span></label>
                                                <input type="file" id="step_image" name="step_image" class="form-control" accept="image/*" data-bvalidator="<?php echo e(($mode == 'edit' ? '' : 'required')); ?>" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                <?php if($mode == 'edit'): ?>
                                                    <?php if(!empty($postStep->step_image)): ?>
                                                       <img height="50" src="<?php echo e(url('/')); ?>/public/storage/post-steps/<?php echo e($postStep->step_image); ?>"  />
                                                    <?php else: ?> 
                                                        <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  />
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                
                                                <?php if($errors->has('step_image')): ?>
                                                  <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('step_image')); ?></strong>
                                                  </span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Description <span class="require">*</span></label>
                                                <textarea id="description" name="description" class="form-control" data-bvalidator="required"><?php echo e(($mode == 'edit' ? $postStep->step_description : '')); ?></textarea>
                                                <?php if($errors->has('description')): ?>
                                                  <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                                  </span>
                                                <?php endif; ?>
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
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/admin/add-post-steps.blade.php ENDPATH**/ ?>