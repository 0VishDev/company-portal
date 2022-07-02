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
    <?php if(in_array('slideshow',$avilable)): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Image</h1>
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
                       <form action="<?php echo e(route('admin.edit-slideshow')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                        <div class="card">
                         <div class="col-md-8">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        
                                         <div class="form-group">
                                            <label for="cat_id" class="control-label mb-1">Media Type <span class="require">*</span></label>
                                            <select name="media_type" id="media_type" class="form-control" data-bvalidator="required">
                                                <option value="image" <?php echo e(($edit['slide']->media_type == 'image' ? 'selected' : '')); ?>>Image</option>
                                                <option value="video" <?php echo e(($edit['slide']->media_type == 'video' ? 'selected' : '')); ?>>Video</option>
                                            </select>
                                        </div>
                                        
                                       <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Upload File <span class="require">*</span></label>
                                            <input type="file" id="slide_file" name="slide_file" class="form-control-file" data-bvalidator-msg="Please select file." <?php if($edit['slide']->slide_image == ''): ?> data-bvalidator="required" <?php endif; ?> >
                                            
                                            <?php if($edit['slide']->media_type == 'image'): ?>
                                                <img  src="<?php echo e(url('/')); ?>/public/storage/slideshow/<?php echo e($edit['slide']->slide_image); ?>" alt="<?php echo e($edit['slide']->slide_image); ?>" class="image-size" />
                                            <?php else: ?> 
                                                <a href="<?php echo e(url('/')); ?>/public/storage/slideshow/<?php echo e($edit['slide']->slide_image); ?>" target="_blank" style="color: #007bff;"><u>View Video</u></a>
                                            <?php endif; ?>
                                            </div>                                  
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Text Position</label>
                                                <select name="slide_text_position" class="form-control">
                                                <option value="left" <?php if($edit['slide']->slide_text_position == 'left'): ?> selected <?php endif; ?>>Left</option>
                                                <option value="right" <?php if($edit['slide']->slide_text_position == 'right'): ?> selected <?php endif; ?>>Right</option>
                                                <option value="center" <?php if($edit['slide']->slide_text_position == 'center'): ?> selected <?php endif; ?>>Center</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Heading</label>
                                                <input id="slide_title" name="slide_title" type="text" class="form-control" value="<?php echo e($edit['slide']->slide_title); ?>">
                                            </div>     
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Sub Heading</label>
                                                <input id="slide_desc" name="slide_desc" type="text" class="form-control" value="<?php echo e($edit['slide']->slide_desc); ?>">
                                            </div>  
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Button Text</label>
                                                <input id="slide_btn_text" name="slide_btn_text" type="text" class="form-control" value="<?php echo e($edit['slide']->slide_btn_text); ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Button Link</label>
                                                <input id="slide_btn_link" name="slide_btn_link" type="text" class="form-control" data-bvalidator="url" value="<?php echo e($edit['slide']->slide_btn_link); ?>">
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Display Order</label>
                                                <input id="slide_order" name="slide_order" type="text" class="form-control" data-bvalidator="digit,min[0]" value="<?php echo e($edit['slide']->slide_order); ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="slide_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['slide']->slide_status == 1): ?> selected <?php endif; ?>>Active</option>
                                                <option value="0" <?php if($edit['slide']->slide_status == 0): ?> selected <?php endif; ?>>InActive</option>
                                                </select>
                                             </div>   
                                            <input type="hidden" name="save_slide_image" value="<?php echo e($edit['slide']->slide_image); ?>">                                             
                                            <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>">    
                                            <input type="hidden" name="slide_id" value="<?php echo e($edit['slide']->slide_id); ?>">   
                                    </div>
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
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/edit-slideshow.blade.php ENDPATH**/ ?>