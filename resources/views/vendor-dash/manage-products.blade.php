@include('vendor-dash.left-panel')

	 <div class="container ven-dash">				 
				 <div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
           <div class="row">
          <div class="col-md-4 col-sm-6">
            <ul id="tabsJustified" class="nav nav-tabs nav-justified">
              <li class="nav-item"><a href="" data-target="#activeproduct" data-toggle="tab" class="nav-link small text-uppercase active">Active {{ count($activeProducts) }}</a></li>
              <li class="nav-item"><a href="" data-target="#inactiveproduct" data-toggle="tab" class="nav-link small text-uppercase">Inactive {{ count($inActiveProducts) }}</a></li>
            </ul>
			   </div>
			   <div class="col-md-8 col-sm-6">
			   <button type="button" class="btn btn-md btn-info float-right"><a href="{{ url('/') }}/vendor/add-product" style="color:#fff;">Add Product</a></button>
			   </div>
			  <div class="col-md-12">
			        @if (session('success'))
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div id="tabsJustifiedContent" class="tab-content pro">
                      <div id="activeproduct" class="tab-pane fade active show">
                        @foreach($activeProducts as $key => $product)
        				     <div class="shadow pl-3 pr-3 mb-3">
        				        <div class="row">
                				  <div class="col-sm-4 col-md-4">
                					<img src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" class="pro-img">
                				  </div>
                				  <div class="col-sm-8 col-md-8">
                					  <div class="row bg-white pt-3 pr-3 pb-3">
                					<div class="col-sm-9">
                					  <div class="product-name">
                						<h5><span>{{ $product->product_name }}</span> <br><br><small><i class="fa fa-inr" aria-hidden="true"></i> {!! (is_numeric($product->product_price) ? ''.$product->product_price : $product->product_price) !!} / {{ $product->product_unit }}</small></h5>
                						  <p>{!! (!empty($product->product_short_desc) ? $product->product_short_desc : $product->product_desc) !!}</p>
                						</div>
                					  </div>
                					<div class="col-sm-3">
                						<div class="float-right">
                					  <span class="pro-edit"><a href="{{ url('vendor/product/'.$product->product_id.'/edit') }}">Edit</a></span>
                					  <span class="pro-delete"><a href="{{ url('vendor/product/'.$product->product_id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a></span>
                							</div>
                					  </div>
                						  </div>
                					  <div class="col-sm-3 mt-3">
                					  <h6>Category</h6>
                						  <ul class="pr-cate">
                						  <li>{{ $product->subCategory->subcategory_name }}</li>
                						  </ul>
                					  </div>
                					  <div class="col-sm-9 mt-3">
                					  <h6>Specification/Additional Details <small><a href="#" data-target="#addSpecificationModal{{ $product->product_id }}" data-toggle="modal">( +  {{ (count($product->variants) > 0 ? 'Edit' : 'Add') }} Specification )</a></small></h6>
                					       <div class="modal fade show" id="addSpecificationModal{{ $product->product_id }}" aria-modal="true" >
                                                <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="mb-0">Specification</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('vendor/product/variants/add-edit') }}" method="POST">
                                                                @csrf
                                                                
                                                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                                
                                                                @if(count($product->variants) > 0)
                                                                    @foreach($product->variants as $variant)
                                                                        <div class="row">
                                                                		<div class="col-md-12 con-bg1">
                                                                			<div class="contact-form">
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Country of Origin</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="checkbox" name="variants[{{ $variant->id }}][origin]" value="Made in India" {{ ($variant->origin == 'Made in India' ? 'checked' : '') }}> Made in India
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Brand</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][brand]" value="{{ $variant->brand }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Color</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][color]" value="{{ $variant->color }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Style</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][style]" value="{{ $variant->style }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Size</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][size]" value="{{ $variant->size }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Packaging Type</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][package_type]" value="{{ $variant->package_type }}">
                                                                				  </div>
                                                                				</div>
                                                                			</div>
                                                                		</div>
                                                                	</div>
                                                                	@endforeach
                                        					      @else
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
                                        					      @endif
                                        					      
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
                						    @if(count($product->variants) > 0)
                                                @foreach($product->variants as $variant)
                            						  <tr>
                            							  <td>Country of Origin</td>
                            							  <td>{{ $variant->origin }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Packaging Type</td>
                            							  <td>{{ $variant->package_type }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Brand</td>
                            							  <td>{{ $variant->brand }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Color</td>
                            							  <td>{{ $variant->color }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Style</td>
                            							  <td>{{ $variant->style }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Size</td>
                            							  <td>{{ $variant->size }}</td>
                        							  </tr>
                        						@endforeach
                        					@endif
                						  </table>
                					  </div>
                					</div>
                				  </div>
        					  </div>
        				@endforeach
        			</div>
                     <div id="inactiveproduct" class="tab-pane fade">
                         @foreach($inActiveProducts as $key => $product)
        				     <div class="shadow pl-3 pr-3 mb-3">
        				        <div class="row">
                				  <div class="col-sm-4 col-md-4">
                					<img src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" class="pro-img">
                				  </div>
                				  <div class="col-sm-8 col-md-8">
                					  <div class="row bg-white pt-3 pr-3 pb-3">
                					<div class="col-sm-9">
                					  <div class="product-name">
                						<h5><span>{{ $product->product_name }}</span> <small><i class="fa fa-inr" aria-hidden="true"></i> {{ $product->product_price }} / {{ $product->product_unit }}</small></h5>
                						  <p>{!! (!empty($product->product_short_desc) ? $product->product_short_desc : $product->product_desc) !!}</p>
                						</div>
                					  </div>
                					<div class="col-sm-3">
                						<div class="float-right">
                					  <span class="pro-edit"><a href="{{ url('vendor/product/'.$product->product_id.'/edit') }}">Edit</a></span>
                					  <span class="pro-delete"><a href="{{ url('vendor/product/'.$product->product_id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a></span>
                							</div>
                					  </div>
                						  </div>
                					  <div class="col-sm-3 mt-3">
                					  <h6>Category</h6>
                						  <ul class="pr-cate">
                						  <li>{{ $product->subCategory->subcategory_name }}</li>
                						  </ul>
                					  </div>
                					  <div class="col-sm-9 mt-3">
                					  <h6>Specification/Additional Details <small><a href="#" data-target="#addSpecificationModal{{ $product->product_id }}" data-toggle="modal">( +  {{ (count($product->variants) > 0 ? 'Edit' : 'Add') }} Specification )</a></small></h6>
                					       <div class="modal fade show" id="addSpecificationModal{{ $product->product_id }}" aria-modal="true" >
                                                <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="mb-0">Specification</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('vendor/product/variants/add-edit') }}" method="POST">
                                                                @csrf
                                                                
                                                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                                
                                                                @if(count($product->variants) > 0)
                                                                    @foreach($product->variants as $variant)
                                                                        <div class="row">
                                                                		<div class="col-md-12 con-bg1">
                                                                			<div class="contact-form">
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Country of Origin</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="checkbox" name="variants[{{ $variant->id }}][origin]" value="Made in India" {{ ($variant->origin == 'Made in India' ? 'checked' : '') }}> Made in India
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
                                                                					<input type="text" name="variants[{{ $variant->id }}][brand]" value="{{ $variant->brand }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Color</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][color]" value="{{ $variant->color }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Style</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][style]" value="{{ $variant->style }}">
                                                                				  </div>
                                                                				</div>
                                                                				<div class="form-group row">
                                                                				  <label class="control-label col-sm-3">Size</label>
                                                                				  <div class="col-sm-9">          
                                                                					<input type="text" name="variants[{{ $variant->id }}][size]" value="{{ $variant->size }}">
                                                                				  </div>
                                                                				</div>
                                                                			</div>
                                                                		</div>
                                                                	</div>
                                                                	@endforeach
                                        					      @else
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
                                        					      @endif
                                        					      
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
                						    @if(count($product->variants) > 0)
                                                @foreach($product->variants as $variant)
                            						  <tr>
                            							  <td>Country of Origin</td>
                            							  <td>{{ $variant->origin }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Packaging Type</td>
                            							  <td></td>
                            							  </tr>
                            							  <tr>
                            							  <td>Brand</td>
                            							  <td>{{ $variant->brand }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Color</td>
                            							  <td>{{ $variant->color }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Style</td>
                            							  <td>{{ $variant->style }}</td>
                            							  </tr>
                            							  <tr>
                            							  <td>Size</td>
                            							  <td>{{ $variant->size }}</td>
                        							  </tr>
                        						@endforeach
                        					@endif
                						  </table>
                					  </div>
                					</div>
                				  </div>
        					  </div>
        				@endforeach
        			</div>
                </div>
              </div>
            </div>
        </div>
       <!-- .content -->
    </div><!-- /#right-panel -->
        <!-- Right Panel -->
@include('vendor-dash.bottom-links')