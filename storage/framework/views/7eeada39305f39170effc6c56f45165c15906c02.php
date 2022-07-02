<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	 <div class="container ven-dash">				 
				 <div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
           <div class="row">
          <div class="col-md-4 col-sm-6">
            <ul id="tabsJustified" class="nav nav-tabs nav-justified">
              <li class="nav-item"><a href="" data-target="#activeproduct" data-toggle="tab" class="nav-link small text-uppercase active">Active <?php echo e(count($activeProducts)); ?></a></li>
              <li class="nav-item"><a href="" data-target="#inactiveproduct" data-toggle="tab" class="nav-link small text-uppercase">Inactive <?php echo e(count($inActiveProducts)); ?></a></li>
            </ul>
			   </div>
			   <div class="col-md-8 col-sm-6">
			   <button type="button" class="btn btn-md btn-info float-right"><a href="<?php echo e(url('/')); ?>/vendor/add-product" style="color:#fff;">Add Product</a></button>
			   </div>
			  <div class="col-md-12">
			        <?php if(session('success')): ?>
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div id="tabsJustifiedContent" class="tab-content pro">
                      <div id="activeproduct" class="tab-pane fade active show">
                        <?php $__currentLoopData = $activeProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        				     <div class="shadow pl-3 pr-3 mb-3">
        				        <div class="row">
                				  <div class="col-sm-4 col-md-4">
                					<img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" class="pro-img">
                				  </div>
                				  <div class="col-sm-8 col-md-8">
                					  <div class="row bg-white pt-3 pr-3 pb-3">
                					<div class="col-sm-9">
                					  <div class="product-name">
                						<h5><span><?php echo e($product->product_name); ?></span> <br><br><small><i class="fa fa-inr" aria-hidden="true"></i> <?php echo (is_numeric($product->product_price) ? ''.$product->product_price : $product->product_price); ?> / <?php echo e($product->product_unit); ?></small></h5>
                						  <p><?php echo (!empty($product->product_short_desc) ? $product->product_short_desc : $product->product_desc); ?></p>
                						</div>
                					  </div>
                					<div class="col-sm-3">
                						<div class="float-right">
                					  <span class="pro-edit"><a href="<?php echo e(url('vendor/product/'.$product->product_id.'/edit')); ?>">Edit</a></span>
                					  <span class="pro-delete"><a href="<?php echo e(url('vendor/product/'.$product->product_id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a></span>
                							</div>
                					  </div>
                						  </div>
                					  <div class="col-sm-3 mt-3">
                					  <h6>Category</h6>
                						  <ul class="pr-cate">
                						  <li><?php echo e($product->subCategory->subcategory_name); ?></li>
                						  </ul>
                					  </div>
                					  <div class="col-sm-9 mt-3">
                					  <h6>Specification/Additional Details <small><a href="#" data-target="#addSpecificationModal<?php echo e($product->product_id); ?>" data-toggle="modal">( +  <?php echo e((count($product->variants) > 0 ? 'Edit' : 'Add')); ?> Specification )</a></small></h6>
                					       <div class="modal fade show" id="addSpecificationModal<?php echo e($product->product_id); ?>" aria-modal="true" >
                                                <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="mb-0">Specification</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(url('vendor/product/variants/add-edit')); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                
                                                                <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>">
                                                                
                                                                <?php if(count($product->variants) > 0): ?>
                                                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="row">
                                                                		<div class="col-md-12 con-bg1">
                                                                			<div class="contact-form">
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Country of Origin</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="checkbox" name="variants[<?php echo e($variant->id); ?>][origin]" value="Made in India" <?php echo e(($variant->origin == 'Made in India' ? 'checked' : '')); ?>> Made in India
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Brand</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][brand]" value="<?php echo e($variant->brand); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Color</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][color]" value="<?php echo e($variant->color); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Style</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][style]" value="<?php echo e($variant->style); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Size</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][size]" value="<?php echo e($variant->size); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Packaging Type</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][package_type]" value="<?php echo e($variant->package_type); ?>">
                                                                				  </div>
                                                                				</div>
                                                                			</div>
                                                                		</div>
                                                                	</div>
                                                                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        					      <?php else: ?>
                                        					        <div class="row">
                                                                		<div class="col-md-12 con-bg1">
                                                                			<div class="contact-form">
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Country of Origin</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="checkbox" name="variants[0][origin]" value="Made in India"> Made in India
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Brand</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][brand]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Color</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][color]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Style</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][style]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Size</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][size]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Packaging Type</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][package_type]">
                                                                				  </div>
                                                                				</div>
                                                                			</div>
                                                                		</div>
                                                                	</div>
                                        					      <?php endif; ?>
                                        					      
                                    					         <div class="row">
                                                				  <div class="col-sm-12 col-md-12">
                                                					<button type="submit" class="btn btn-success float-right">Save</button>
                                                				  </div>
                                                				</div>
                                            		        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                					      
                						  <table class="table tab-bor">
                						    <?php if(count($product->variants) > 0): ?>
                                                <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            						  <tr>
                            							  <td>Country of Origin</td>
                            							  <td><?php echo e($variant->origin); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Packaging Type</td>
                            							  <td><?php echo e($variant->package_type); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Brand</td>
                            							  <td><?php echo e($variant->brand); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Color</td>
                            							  <td><?php echo e($variant->color); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Style</td>
                            							  <td><?php echo e($variant->style); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Size</td>
                            							  <td><?php echo e($variant->size); ?></td>
                        							  </tr>
                        						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        					<?php endif; ?>
                						  </table>
                					  </div>
                					</div>
                				  </div>
        					  </div>
        				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			</div>
                     <div id="inactiveproduct" class="tab-pane fade">
                         <?php $__currentLoopData = $inActiveProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        				     <div class="shadow pl-3 pr-3 mb-3">
        				        <div class="row">
                				  <div class="col-sm-4 col-md-4">
                					<img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" class="pro-img">
                				  </div>
                				  <div class="col-sm-8 col-md-8">
                					  <div class="row bg-white pt-3 pr-3 pb-3">
                					<div class="col-sm-9">
                					  <div class="product-name">
                						<h5><span><?php echo e($product->product_name); ?></span> <small><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->product_price); ?> / <?php echo e($product->product_unit); ?></small></h5>
                						  <p><?php echo (!empty($product->product_short_desc) ? $product->product_short_desc : $product->product_desc); ?></p>
                						</div>
                					  </div>
                					<div class="col-sm-3">
                						<div class="float-right">
                					  <span class="pro-edit"><a href="<?php echo e(url('vendor/product/'.$product->product_id.'/edit')); ?>">Edit</a></span>
                					  <span class="pro-delete"><a href="<?php echo e(url('vendor/product/'.$product->product_id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a></span>
                							</div>
                					  </div>
                						  </div>
                					  <div class="col-sm-3 mt-3">
                					  <h6>Category</h6>
                						  <ul class="pr-cate">
                						  <li><?php echo e($product->subCategory->subcategory_name); ?></li>
                						  </ul>
                					  </div>
                					  <div class="col-sm-9 mt-3">
                					  <h6>Specification/Additional Details <small><a href="#" data-target="#addSpecificationModal<?php echo e($product->product_id); ?>" data-toggle="modal">( +  <?php echo e((count($product->variants) > 0 ? 'Edit' : 'Add')); ?> Specification )</a></small></h6>
                					       <div class="modal fade show" id="addSpecificationModal<?php echo e($product->product_id); ?>" aria-modal="true" >
                                                <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="mb-0">Specification</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(url('vendor/product/variants/add-edit')); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                
                                                                <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>">
                                                                
                                                                <?php if(count($product->variants) > 0): ?>
                                                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="row">
                                                                		<div class="col-md-12 con-bg1">
                                                                			<div class="contact-form">
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Country of Origin</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="checkbox" name="variants[<?php echo e($variant->id); ?>][origin]" value="Made in India" <?php echo e(($variant->origin == 'Made in India' ? 'checked' : '')); ?>> Made in India
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Packaging Type</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="" value="">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Brand</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][brand]" value="<?php echo e($variant->brand); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Color</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][color]" value="<?php echo e($variant->color); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Style</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][style]" value="<?php echo e($variant->style); ?>">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Size</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[<?php echo e($variant->id); ?>][size]" value="<?php echo e($variant->size); ?>">
                                                                				  </div>
                                                                				</div>
                                                                			</div>
                                                                		</div>
                                                                	</div>
                                                                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        					      <?php else: ?>
                                        					        <div class="row">
                                                                		<div class="col-md-12 con-bg1">
                                                                			<div class="contact-form">
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Country of Origin</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="checkbox" name="variants[0][origin]" value="Made in India"> Made in India
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Packaging Type</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="" value="">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Brand</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][brand]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Color</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][color]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Style</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][style]">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Size</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[0][size]">
                                                                				  </div>
                                                                				</div>
                                                                			</div>
                                                                		</div>
                                                                	</div>
                                        					      <?php endif; ?>
                                        					      
                                    					         <div class="row">
                                                				  <div class="col-sm-12 col-md-12">
                                                					<button type="submit" class="btn btn-success float-right">Save</button>
                                                				  </div>
                                                				</div>
                                            		        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                						  <table class="table tab-bor">
                						    <?php if(count($product->variants) > 0): ?>
                                                <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            						  <tr>
                            							  <td>Country of Origin</td>
                            							  <td><?php echo e($variant->origin); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Packaging Type</td>
                            							  <td></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Brand</td>
                            							  <td><?php echo e($variant->brand); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Color</td>
                            							  <td><?php echo e($variant->color); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Style</td>
                            							  <td><?php echo e($variant->style); ?></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Size</td>
                            							  <td><?php echo e($variant->size); ?></td>
                        							  </tr>
                        						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        					<?php endif; ?>
                						  </table>
                					  </div>
                					</div>
                				  </div>
        					  </div>
        				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			</div>
                </div>
              </div>
            </div>
        </div>
       <!-- .content -->
    </div><!-- /#right-panel -->
        <!-- Right Panel -->
<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/vendor-dash/manage-products.blade.php ENDPATH**/ ?>