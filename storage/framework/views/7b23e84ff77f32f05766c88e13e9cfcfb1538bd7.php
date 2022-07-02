<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<div class="container ven-dash">				 
		<div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
		    <form class="form" action="<?php echo e(($mode == 'add' ? url('vendor/product/add') :  url('vendor/product/'.$product->product_id.'/update'))); ?>" method="POST" enctype="multipart/form-data">
		        <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-6">
                		<div class="form-group col-sm-12">
                            <div class="contact text-center">
                        		<?php if($mode == 'add' || empty($product->product_image)): ?>
                                    <img src="/public/img/camera.png" class="ava1 img-thumbnail prod-img1" alt="avatar" id="productImage">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('public/storage/product/'.$product->product_image)); ?>" class="ava1 img-thumbnail prod-img1" alt="avatar" id="productImage">
                                <?php endif; ?>
                                <h6>Upload product Image</h6>
                                <input type="file" name="product_image" id="product_image" accept="image/*" onchange="imageUpload('#product_image', '#productImage')">
            					<label for="product_image" class="btn-2">upload Image</label>
                            </div>
                            <?php if($errors->has('product_image')): ?>
                                <span class="help-block text-danger col-sm-12 text-center">
                                    <strong><?php echo e($errors->first('product_image')); ?></strong>
                                </span>
                            <?php endif; ?>
        			    </div>
            			
            			<div class="form-group col-sm-12">
            			    <label class="control-label">Upload gallery images</label>
                            <div class="contact">
                                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
        						<label for="gallery_images" class="btn-2">Upload photos</label>
                            </div>
                        </div>
                        
					    <div class="form-group col-sm-12" id="product_gallery_image_row">
					        <?php if($mode == 'edit' && count($galleryImages) > 0): ?>
                                <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-img">
                                        <img src="<?php echo e(asset('public/storage/product/'.$galleryImage->product_image)); ?>" alt="<?php echo e($galleryImage->product_image); ?>" class="item-thumb" />
                                        <a href="<?php echo e(url('vendor/product/image/'.$galleryImage->proimg_id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

			      <!--      <div class="form-group col-sm-12">                          -->
         <!--                 <div class="">-->
         <!--                     <label for="Featured"><h4>Featured</h4></label>-->
         <!--                     <select class="form-control" name="product_featured" id="product_featured" required>-->
							  <!--  <option value="1" <?php echo e(($mode == 'edit' ? ($product->product_featured == 1 ? 'selected' : '') : '')); ?>>Yes</option>-->
         <!--                       <option value="0" <?php echo e(($mode == 'edit' ? ($product->product_featured == 0 ? 'selected' : '') : '')); ?>>No</option>-->
							  <!--</select>-->
							  <!--<?php if($errors->has('product_featured')): ?>-->
         <!--                       <span class="help-block text-danger">-->
         <!--                           <strong><?php echo e($errors->first('product_featured')); ?></strong>-->
         <!--                       </span>-->
         <!--                     <?php endif; ?>-->
         <!--                 </div>-->
         <!--              </div>-->
                      
                       <?php $__currentLoopData = $attribute['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="form-group col-sm-12">
                             <div class="">
                                    <label for="site_title" class="control-label mb-1"><?php echo e($attribute->attribute_name); ?></label>
                                    <select name="product_attribute[]" class="form-control">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $attribute->attributevalue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $attrVal = $product_value->attribute_value_id.'-'.$attribute->attribute_id; ?>
                                            <option value="<?php echo e($attrVal); ?>" <?php echo e(($mode == 'edit' ? (in_array($attrVal, $productAttributes) ? 'selected' : '') : '')); ?>><?php echo e($product_value->attribute_value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                        <div class="form-group col-sm-12">
                          <div class="">
                            <label for="status"><h4>Status</h4></label>
                              <select class="form-control" name="product_status" id="product_status" required>
                                <option value="1" <?php echo e(($mode == 'edit' ? ($product->product_status == 1 ? 'selected' : '') : '')); ?>>Active</option>
                                <option value="0" <?php echo e(($mode == 'edit' ? ($product->product_status == 0 ? 'selected' : '') : '')); ?>>Inactive</option>
							  </select>
							  <?php if($errors->has('status')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                          </div>
                          					  <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="product_desc"><h4>Full Description</h4></label>
                              <textarea class="form-control" rows="5" name="product_desc" id="product_desc" required><?php echo e(($mode == 'edit' ? $product->product_desc : '')); ?></textarea>
                              <?php if($errors->has('product_desc')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('product_desc')); ?></strong>
                                 </span>
                              <?php endif; ?>
                          </div>
                      </div>
                        </div><!--/col-3-->
                        
    	                <div class="col-sm-6">
    	                    <div class="form-group col-sm-12">                           
                              <div class="">
                                  <label for="Categories"><h4>Main Categories</h4></label>
                                  <select class="form-control" id="mainCategory" name="mainCategory" required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->cat_id); ?>" subCategories="<?php echo e($category->SubCategory); ?>" <?php echo e(($mode == 'edit' ? ($subCategory->cat_id == $category->cat_id ? 'selected' : '') : '')); ?>><?php echo e($category->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    							   </select>
    							  <?php if($errors->has('mainCategory')): ?>
                                    <span class="help-block text-danger">
                                        <strong><?php echo e($errors->first('mainCategory')); ?></strong>
                                     </span>
                                  <?php endif; ?>
                              </div>
                          </div>
    	                     <div class="form-group col-sm-12">                           
                              <div class="">
                                  <label for="Categories"><h4>Sub Categories</h4></label>
                                  <select class="form-control" id="addProductCategory" name="category" required>
                                    <?php if($mode == 'edit'): ?>
                                        <?php $__currentLoopData = $subCategory->Category->SubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($subCategory1->subcat_id); ?>" <?php echo e(($mode == 'edit' ? ($subCategory->subcat_id == $subCategory1->subcat_id ? 'selected' : '') : '')); ?>><?php echo e($subCategory1->subcategory_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
    							   </select>
    							  <?php if($errors->has('category')): ?>
                                    <span class="help-block text-danger">
                                        <strong><?php echo e($errors->first('category')); ?></strong>
                                     </span>
                                  <?php endif; ?>
                              </div>
                          </div>
                            <div class="form-group col-sm-12">
                            <div class="">
                                <label for="pro_name"><h4>Product Name</h4></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo e(($mode == 'edit' ? $product->product_name : '')); ?>" required>
                                <?php if($errors->has('product_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('product_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
                          </div>
                       </div>
                       
                       <div class="form-group col-sm-12">
                          <div class="">
                            <label for="Price"><h4>Price</h4></label>
                            <input type="text" class="form-control" name="price" id="price" value="<?php echo e(($mode == 'edit' ? $product->product_price : '')); ?>" required>
                            <?php if($errors->has('price')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('price')); ?></strong>
                              </span>
                            <?php endif; ?>
                          </div>
                       </div>
                       
                       <div class="form-group col-sm-12">
                           <div class="">
                                <label for="minimum_order_qty">Minimum Order Quantity</label>
                                <input type="text" name="minimum_order_qty" id="minimum_order_qty" class="form-control"  value="<?php echo e(($mode == 'edit' ? $product->minimum_order_qty : '')); ?>" required>
                                <?php if($errors->has('minimum_order_qty')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('minimum_order_qty')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                            
                        <div class="form-group col-sm-12">
                             <label for="minimum_order_unit">Maximum Order Quantity</label>
                             <input type="text" name="minimum_order_unit" id="minimum_order_unit" class="form-control" value="<?php echo e(($mode == 'edit' ? $product->minimum_order_unit : '')); ?>" required>
                             <?php if($errors->has('minimum_order_unit')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('minimum_order_unit')); ?></strong>
                              </span>
                            <?php endif; ?>
                         </div>
                       
			            <div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="product_type"><h4>Product Type</h4></label>
                              <select class="form-control" name="product_type" id="product_type" required>
							    <?php $__currentLoopData = $product_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type); ?>" <?php echo e(($mode == 'edit' ? ($product->product_type == $type ? 'selected' : '') : '')); ?>><?php echo e($type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  </select>
							  <?php if($errors->has('product_type')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('product_type')); ?></strong>
                                 </span>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                          <div class="">
                              <label for="product_short_desc"><h4>Short Description</h4></label>
                              <textarea class="form-control" rows="5" name="product_short_desc" id="product_short_desc" data-bvalidator="required,maxlen[350]"><?php echo e(($mode == 'edit' ? $product->product_short_desc : '')); ?></textarea>
                              <?php if($errors->has('product_short_desc')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('product_short_desc')); ?></strong>
                                 </span>
                              <?php endif; ?>
                          </div>
                      </div>

                      <div class="form-group col-sm-12">
                           <div class="">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"> Save</button>
                               	
                            </div>
                      </div>
              
          </div><!--/tab-content-->

        </div>
			</form>
        </div>
    </div>

	<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/add-product.blade.php ENDPATH**/ ?>