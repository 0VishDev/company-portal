@include('vendor-dash.left-panel')


	<div class="container ven-dash">				 
		<div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
		    <form class="form" action="{{ ($mode == 'add' ? url('vendor/product/add') :  url('vendor/product/'.$product->product_id.'/update')) }}" method="POST" enctype="multipart/form-data">
		        @csrf
                <div class="row">
                    <div class="col-sm-6">
                		<div class="form-group col-sm-12">
                            <div class="contact text-center">
                        		@if($mode == 'add' || empty($product->product_image))
                                    <img src="/public/img/camera.png" class="ava1 img-thumbnail prod-img1" alt="avatar" id="productImage">
                                @else
                                    <img src="{{ asset('public/storage/product/'.$product->product_image) }}" class="ava1 img-thumbnail prod-img1" alt="avatar" id="productImage">
                                @endif
                                <h6>Upload product Image</h6>
                                <input type="file" name="product_image" id="product_image" accept="image/*" onchange="imageUpload('#product_image', '#productImage')">
            					<label for="product_image" class="btn-2">upload Image</label>
                            </div>
                            @if ($errors->has('product_image'))
                                <span class="help-block text-danger col-sm-12 text-center">
                                    <strong>{{ $errors->first('product_image') }}</strong>
                                </span>
                            @endif
        			    </div>
            			
            			<div class="form-group col-sm-12">
            			    <label class="control-label">Upload gallery images</label>
                            <div class="contact">
                                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
        						<label for="gallery_images" class="btn-2">Upload photos</label>
                            </div>
                        </div>
                        
					    <div class="form-group col-sm-12" id="product_gallery_image_row">
					        @if($mode == 'edit' && count($galleryImages) > 0)
                                @foreach($galleryImages as $galleryImage)
                                    <div class="item-img">
                                        <img src="{{ asset('public/storage/product/'.$galleryImage->product_image) }}" alt="{{ $galleryImage->product_image }}" class="item-thumb" />
                                        <a href="{{ url('vendor/product/image/'.$galleryImage->proimg_id.'/delete') }}" onclick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

			      <!--      <div class="form-group col-sm-12">                          -->
         <!--                 <div class="">-->
         <!--                     <label for="Featured"><h4>Featured</h4></label>-->
         <!--                     <select class="form-control" name="product_featured" id="product_featured" required>-->
							  <!--  <option value="1" {{ ($mode == 'edit' ? ($product->product_featured == 1 ? 'selected' : '') : '') }}>Yes</option>-->
         <!--                       <option value="0" {{ ($mode == 'edit' ? ($product->product_featured == 0 ? 'selected' : '') : '') }}>No</option>-->
							  <!--</select>-->
							  <!--@if ($errors->has('product_featured'))-->
         <!--                       <span class="help-block text-danger">-->
         <!--                           <strong>{{ $errors->first('product_featured') }}</strong>-->
         <!--                       </span>-->
         <!--                     @endif-->
         <!--                 </div>-->
         <!--              </div>-->
                      
                       @foreach($attribute['display'] as $attribute)
                           <div class="form-group col-sm-12">
                             <div class="">
                                    <label for="site_title" class="control-label mb-1">{{ $attribute->attribute_name }}</label>
                                    <select name="product_attribute[]" class="form-control">
                                        <option value=""></option>
                                        @foreach($attribute->attributevalue as $product_value)
                                            @php $attrVal = $product_value->attribute_value_id.'-'.$attribute->attribute_id; @endphp
                                            <option value="{{ $attrVal }}" {{ ($mode == 'edit' ? (in_array($attrVal, $productAttributes) ? 'selected' : '') : '') }}>{{ $product_value->attribute_value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                                     
                        <div class="form-group col-sm-12">
                          <div class="">
                            <label for="status"><h4>Status</h4></label>
                              <select class="form-control" name="product_status" id="product_status" required>
                                <option value="1" {{ ($mode == 'edit' ? ($product->product_status == 1 ? 'selected' : '') : '') }}>Active</option>
                                <option value="0" {{ ($mode == 'edit' ? ($product->product_status == 0 ? 'selected' : '') : '') }}>Inactive</option>
							  </select>
							  @if ($errors->has('status'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                                @endif
                            </div>
                          </div>
                          					  <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="product_desc"><h4>Full Description</h4></label>
                              <textarea class="form-control" rows="5" name="product_desc" id="product_desc" required>{{ ($mode == 'edit' ? $product->product_desc : '') }}</textarea>
                              @if ($errors->has('product_desc'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('product_desc') }}</strong>
                                 </span>
                              @endif
                          </div>
                      </div>
                        </div><!--/col-3-->
                        
    	                <div class="col-sm-6">
    	                    <div class="form-group col-sm-12">                           
                              <div class="">
                                  <label for="Categories"><h4>Main Categories</h4></label>
                                  <select class="form-control" id="mainCategory" name="mainCategory" required>
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->cat_id }}" subCategories="{{ $category->SubCategory }}" {{ ($mode == 'edit' ? ($subCategory->cat_id == $category->cat_id ? 'selected' : '') : '') }}>{{ $category->category_name }}</option>
                                    @endforeach
    							   </select>
    							  @if ($errors->has('mainCategory'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('mainCategory') }}</strong>
                                     </span>
                                  @endif
                              </div>
                          </div>
    	                     <div class="form-group col-sm-12">                           
                              <div class="">
                                  <label for="Categories"><h4>Sub Categories</h4></label>
                                  <select class="form-control" id="addProductCategory" name="category" required>
                                    @if($mode == 'edit')
                                        @foreach($subCategory->Category->SubCategory as $subCategory1)
                                           <option value="{{ $subCategory1->subcat_id }}" {{ ($mode == 'edit' ? ($subCategory->subcat_id == $subCategory1->subcat_id ? 'selected' : '') : '') }}>{{ $subCategory1->subcategory_name }}</option>
                                        @endforeach
                                    @endif
    							   </select>
    							  @if ($errors->has('category'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('category') }}</strong>
                                     </span>
                                  @endif
                              </div>
                          </div>
                            <div class="form-group col-sm-12">
                            <div class="">
                                <label for="pro_name"><h4>Product Name</h4></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ ($mode == 'edit' ? $product->product_name : '') }}" product-input-search required>
                                @if ($errors->has('product_name'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('product_name') }}</strong>
                                  </span>
                                @endif
                          </div>
                       </div>
                       
                       <div class="form-group col-sm-12">
                          <div class="">
                            <label for="Price"><h4>Price</h4></label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ ($mode == 'edit' ? $product->product_price : '') }}" >
                            @if ($errors->has('price'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('price') }}</strong>
                              </span>
                            @endif
                          </div>
                       </div>
                       
                       <div class="form-group col-sm-12">
                           <div class="">
                                <label for="minimum_order_qty">Minimum Order Quantity</label>
                                <input type="text" name="minimum_order_qty" id="minimum_order_qty" class="form-control"  value="{{ ($mode == 'edit' ? $product->minimum_order_qty : '') }}" >
                                @if ($errors->has('minimum_order_qty'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('minimum_order_qty') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="form-group col-sm-12">
                             <label for="minimum_order_unit">Maximum Order Quantity</label>
                             <input type="text" name="minimum_order_unit" id="minimum_order_unit" class="form-control" value="{{ ($mode == 'edit' ? $product->minimum_order_unit : '') }}" >
                             @if ($errors->has('minimum_order_unit'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('minimum_order_unit') }}</strong>
                              </span>
                            @endif
                         </div>
                       
			            <div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="product_type"><h4>Product Type</h4></label>
                              <select class="form-control" name="product_type" id="product_type" required>
							    @foreach($product_type as $type)
                                    <option value="{{ $type }}" {{ ($mode == 'edit' ? ($product->product_type == $type ? 'selected' : '') : '') }}>{{ $type }}</option>
                                @endforeach
							  </select>
							  @if ($errors->has('product_type'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('product_type') }}</strong>
                                 </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                          <div class="">
                              <label for="product_short_desc"><h4>Short Description</h4></label>
                              <textarea class="form-control" rows="5" name="product_short_desc" id="product_short_desc" data-bvalidator="required,maxlen[350]">{{ ($mode == 'edit' ? $product->product_short_desc : '') }}</textarea>
                              @if ($errors->has('product_short_desc'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('product_short_desc') }}</strong>
                                 </span>
                              @endif
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

	@include('vendor-dash.bottom-links')