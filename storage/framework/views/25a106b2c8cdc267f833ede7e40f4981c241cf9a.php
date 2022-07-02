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
    <?php if(in_array('products',$avilable)): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Product</h1>
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
                      <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                            <form action="<?php echo e(route('admin.edit-product')); ?>" method="post" id="category_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                           <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="name" class="control-label mb-1">Product Name <span class="require">*</span></label>
                                                <input id="product_name" name="product_name" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->product_name); ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Short Description <span class="require">*</span></label>
                                               <textarea name="product_short_desc" id="product_short_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[960]"><?php echo e($edit['product']->product_short_desc); ?></textarea>
                                            </div> 
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Description<span class="require">*</span></label>
                                            <textarea name="product_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['product']->product_desc)); ?></textarea>
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
                                                <label for="site_title" class="control-label mb-1">Seller <span class="require">*</span></label>
                                                <select name="user_id" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $vendor['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vendor->id); ?>" <?php if($edit['product']->user_id == $vendor->id): ?> selected <?php endif; ?>><?php echo e($vendor->username); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                                              
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Featured <span class="require">*</span></label>
                                                <select name="product_featured" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->product_featured == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($edit['product']->product_featured == 0): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                            </div>
                                             
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Categories <span class="require">*</span></label>
                                                <select name="product_category[]" class="form-control" data-bvalidator="required">
                                                <?php $__currentLoopData = $categories['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $cats = 'cat-'.$menu->cat_id; ?>
                                                <option value="cat-<?php echo e($menu->cat_id); ?>" <?php if(in_array($cats,$product_categories)): ?> selected="selected" <?php endif; ?>><?php echo e($menu->category_name); ?></option>
                                                     <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $subcats = 'subcat-'.$sub_category->subcat_id; ?>
                                                     <option value="subcat-<?php echo e($sub_category->subcat_id); ?>" class="ml-2" <?php if(in_array($subcats,$product_categories)): ?> selected="selected" <?php endif; ?>>- <?php echo e($sub_category->subcategory_name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                               </select>
                                            </div> 
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Upload Featured Image <span class="require">*</span></label>
                                                <input type="file" id="product_image" name="product_image" class="form-control-file" <?php if($edit['product']->product_image == ''): ?> data-bvalidator="required,extension[jpg:png:jpeg]" <?php else: ?> data-bvalidator="extension[jpg:png:jpeg]" <?php endif; ?> data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg"> <?php if($edit['product']->product_image != ''): ?>
                                          <img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($edit['product']->product_image); ?>"  class="image-size" alt="<?php echo e($edit['product']->product_name); ?>"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  class="image-size" alt="<?php echo e($edit['product']->product_name); ?>"/>
                                          <?php endif; ?>      
                                             </div> 
                                             <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Upload Gallery Images</label>
                                                <input type="file" id="product_gallery[]" name="product_gallery[]" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" multiple>
                                                <br/><?php $__currentLoopData = $editimage['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <div class="item-img"><img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_image); ?>" class="item-thumb">
                                                    <a href="<?php echo e(url('/admin/edit-product')); ?>/dropimg/<?php echo e(base64_encode($product->proimg_id)); ?>" onClick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="clearfix"></div>
                                             </div>
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Product Type <span class="require">*</span></label>
                                                <select name="product_type" id="product_type" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $product_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type); ?>" <?php if($edit['product']->product_type == $type): ?> selected <?php endif; ?>><?php echo e($type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                           </div>
                                          <div id="ifphysical_external" <?php if($edit['product']->product_type == 'physical' or $edit['product']->product_type == 'external'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                            
                                            
                                     
                                           
                                           
                                          
                                         </div>
                                         
                                             <div id="ifexternals" <?php if($edit['product']->product_type == 'external'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                 
                                     
                                    </div>
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Hot Products? <span class="require">*</span></label>
                                                <select name="flash_deals" id="flash_deals" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->flash_deals == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($edit['product']->flash_deals == 0): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                          </div>
                                     <div id="ifdeal" <?php if($edit['product']->flash_deals == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                          <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Deal Start Date <span class="require">*</span></label>
                                            <input id="flash_deal_start_date" name="flash_deal_start_date" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->flash_deal_start_date); ?>">
                                            </div><div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Deal End Date <span class="require">*</span></label>
                                      <input id="flash_deal_end_date" name="flash_deal_end_date" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->flash_deal_end_date); ?>">
                                       </div>
                                  </div>     
                                  <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Status <span class="require">*</span></label>
                                                <select name="product_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->product_status == 1): ?> selected <?php endif; ?>>Active</option>
                                                <option value="0" <?php if($edit['product']->product_status == 0): ?> selected <?php endif; ?>>InActive</option>
                                                </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="minimum_order_qty">Minimum Order Quantity</label>
                                       <input type="text" name="minimum_order_qty" class="form-control" value="<?php echo e($edit['product']->minimum_order_qty); ?>">
                                   </div>
                                   <div class="form-group">
                                        <label for="minimum_order_unit">Maximum Order Quantity</label>
                                        <input type="text" name="minimum_order_unit" class="form-control" value="<?php echo e($edit['product']->minimum_order_unit); ?>">
                                    </div>
                                  <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>"> 
                                  <input type="hidden" name="file_size" value="<?php echo e($allsettings->site_max_zip_size); ?>">
                                  <input type="hidden" name="save_product_image" value="<?php echo e($edit['product']->product_image); ?>"> 
                                  <input type="hidden" name="save_product_file" value="<?php echo e($edit['product']->product_file); ?>">            
                                  <input type="hidden" name="product_token" value="<?php echo e($edit['product']->product_token); ?>"> 
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
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/edit-product.blade.php ENDPATH**/ ?>