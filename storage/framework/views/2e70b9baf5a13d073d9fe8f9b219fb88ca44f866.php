<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php if(!empty($pageSEO)): ?>
        <title><?php echo e((isset($pageSEO['title']) ? $pageSEO['title'] : '')); ?></title>
        <meta charset="UTF-8">
        <meta name="keywords" content="<?php echo e((isset($pageSEO['keywords']) ? $pageSEO['keywords'] : '')); ?>">
        <meta name="description" content="<?php echo e((isset($pageSEO['description']) ? $pageSEO['description'] : '')); ?>">
      <?php else: ?>
        <title><?php echo e(Helper::translation(2040,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
      <?php endif; ?>
  
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
    <div class="container text-left">
      <h2 class="mb-0"><?php echo e(Helper::translation(2040,$translate)); ?></h2>
      <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2040,$translate)); ?></span></p>
    </div>
  </section>
  <main role="main" class="main-content">
    <div class="container-fluid mt-3" id="demo">
      <div class="row jplist-panel">
        <div class="col-md-12 col-lg-3 col-sm-12">
            <div id="cate-flt" class="overlay-cate">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="mt-1 mb-1 pt-1 pb-1 overlay-content-cate">
            <?php
                $subCatId = \Request::query('subcat_id');
                $subCatIds = explode(',', \Request::query('subcategory_id'));
                $businessTypes = explode(',', \Request::query('business_type'));
                $productPrice = \Request::query('product_price');
            ?>
            
            <form action="" method="GET" id="shopForm">
            <input type="hidden" id="url_cat_id" value="<?php echo e($shop['catId']); ?>">
            
            <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
              <h5 class="card-header bg-white link-color">Related Categories</h5>
              <div class="card-body subcate-short mb-3">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="jplist-group">
                        <?php $__currentLoopData = $shop['subcategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php $subCatName = \ZigKart\Helpers::joinString($subcategory->subcategory_slug); ?>
                         <input type="checkbox" name="subcategory_ids[]" value="<?php echo e($subCatName); ?>" data-input-change <?php echo e(($subCatName == $subCatId ? 'checked' : (in_array($subCatName, $subCatIds) == 1 ? 'checked' : ''))); ?>> <?php echo e($subcategory->subcategory_name); ?><br />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
              <h5 class="card-header bg-white link-color">Business Type</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="jplist-group">
                      <input type="checkbox" name="business_type[]" value="Manufacturer" data-input-change <?php echo e((in_array('Manufacturer', $businessTypes) == 1 ? 'checked' : '')); ?>> Manufacturer<br />
                      <input type="checkbox" name="business_type[]" value="Supplier" data-input-change <?php echo e((in_array('Supplier', $businessTypes) == 1 ? 'checked' : '')); ?>> Supplier<br/>
                      <input type="checkbox" name="business_type[]" value="Exporter" data-input-change <?php echo e((in_array('Exporter', $businessTypes) == 1 ? 'checked' : '')); ?>> Exporter<br/>
                      <input type="checkbox" name="business_type[]" value="Trader" data-input-change <?php echo e((in_array('Trader', $businessTypes) == 1 ? 'checked' : '')); ?>> Trader<br/>
                      <input type="checkbox" name="business_type[]" value="Wholeseller" data-input-change <?php echo e((in_array('Wholeseller', $businessTypes) == 1 ? 'checked' : '')); ?>> Wholeseller<br/>
                      <input type="checkbox" name="business_type[]" value="Distributor" data-input-change <?php echo e((in_array('Distributor', $businessTypes) == 1 ? 'checked' : '')); ?>> Distributor<br/>
                      <input type="checkbox" name="business_type[]" value="Retailer" data-input-change <?php echo e((in_array('Retailer', $businessTypes) == 1 ? 'checked' : '')); ?>> Retailer<br/>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
              <h5 class="card-header bg-white link-color">Price</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="text" class="js-range-slider" name="product_price" id="product_price" value="<?php echo e($productPrice); ?>" data-min="0" data-max="50000" onblur="searchFilter()"/>
                  </div>
                </div>
              </div>
            </div>
            
            </form>
            
          </div>
        </div>
        <span class="Categories-filter" onclick="openNav()"><i class="fa fa-filter" aria-hidden="true"></i> Short Results by</span>
        </div>
        
        <div class="col-md-12 col-lg-9 col-sm-12">
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
            <div class="mt-1 mb-1 pt-1 pb-1">
            <div class="row">
                <?php $__currentLoopData = $shopProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = $product['product'];
                        
                        $productPrice = \Request::query('product_price');
                        
                        if(strlen($productPrice) > 0 && $productPrice > 0){
                            if(!is_numeric($product->product_price) || $product->product_price > $productPrice){
                                continue;
                            }
                        }
                        
                        $serviceProvider = \ZigKart\Helpers::getPackage($product->user->id);
                        
                        $userName = (isset($product->user->company_name) ? $product->user->company_name : '');
                        
                        if (preg_match('/^[\w\s?]+$/si', $userName)) {
                            $userNameSlug = $userName;
                        } else {
                            $userNameSlug = $product->user->name;
                        }
                    ?>
                <div class="col-sm-12 col-md-12">
                    <div class="product-listing bg-orange shadow pt-3 pl-1 pr-1 mb-4">
            		<div class="row">
            			<div class="col-xs-5 col-sm-12 col-md-3 mb-3 pro-img">
            			    <?php if(!empty($serviceProvider)): ?>
                			   <div class="pack-bg">
                			       <div class="imageInn">
                			           <?php if(!empty($serviceProvider->provider_small_image)): ?> 
                                          <img src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($serviceProvider->provider_small_image); ?>" class="pack-tag" alt="<?php echo e($serviceProvider->provider_name); ?>" title="<?php echo e($serviceProvider->provider_name); ?>"/>
                                       <?php else: ?> 
                                          <img src="<?php echo e(url('/')); ?>/public/img/bronze-icon.png" class="pack-tag" alt="<?php echo e($serviceProvider->provider_name); ?>" title="<?php echo e($serviceProvider->provider_name); ?>"/>  
                                       <?php endif; ?>
                            		</div>
                            		<div class="hoverImg">
                            		    <?php if(!empty($serviceProvider->provider_image)): ?> 
                                          <img src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($serviceProvider->provider_image); ?>" class="pack-tag1" alt="<?php echo e($serviceProvider->provider_name); ?>" title="<?php echo e($serviceProvider->provider_name); ?>" />
                                       <?php else: ?> 
                                          <img src="<?php echo e(url('/')); ?>/public/img/BRONZE.png" class="pack-tag1" alt="<?php echo e($serviceProvider->provider_name); ?>" title="<?php echo e($serviceProvider->provider_name); ?>"/>  
                                       <?php endif; ?>
                                    </div>
                		        </div>
                		    <?php endif; ?>
            		
            			<a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"  alt="<?php echo e($product->product_name); ?>"></a>
            				<!--<div class="sponsored-listing"><span class="spon-text">Sponsored Listing</span> <span class="sponsored-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></div>-->
            			</div>
            			<div class="col-xs-7 col-sm-12 col-md-5 mb-1">
            			    <div class="row direction">
            			        <div class="col-sm-12 col-md-2">
            			            <span class="float-right mdi"><img src="/public/img/Seal-Png.png" alt="india tag"></span>
            			        </div>
            			        <div class="col-sm-12 col-md-10 shop-india">
            			            <div class="pro-heading">
            				<p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                                        				</p>
            				</div>
            			        </div>
            			    </div>
            			
            				<hr>
            				<p class="pro-d"><span>Price Range : <i class="fa fa-inr" aria-hidden="true"></i> <?php echo e((is_numeric($product->product_price) ? ''.$product->product_price : $product->product_price)); ?></span></p>
            				
            				
            				<?php if(count($product->variants) > 0): ?>
                                <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="pro-d"><span>Packaging Type : <?php echo e($variant->package_type); ?></span></p>
                                    <p class="pro-d"><span>Brand : <?php echo e($variant->brand); ?></span></p>
                                    <p class="pro-d"><span>Color : <?php echo e($variant->color); ?></span></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
            			</div>
            			<div class="col-sm-12 col-md-4 mb-1">
            			<div class="seller-detail">
            				<div class="saller-heading">
            				    <p class="com-logo">
            				        <?php if(!empty($product->user->company_logo)): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/company-logo/<?php echo e($product->user->company_logo); ?>" alt="<?php echo e((isset($product->user->company_name) ? $product->user->company_name : '')); ?>" class="img img-responsive">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" class="img img-responsive" style="display:none;" alt="<?php echo e((isset($product->user->company_name) ? $product->user->company_name : '')); ?>">
                                    <?php endif; ?>
                                </p>
            				<p><a href="<?php echo e(URL::to('/vr-'.str_slug($userNameSlug, '-'))); ?>"> <?php echo e($userName); ?></a> <small class="text-red"><b>(<?php echo e((isset($product->user->primary_type) ? $product->user->primary_type : '')); ?>)</b></small></p>
            				
            				
            				</div>
            				<!--<p class="seller-locaton"><i class="fa fa-map-marker" aria-hidden="true" style="color:#ff1d25;"></i> <?php echo e((!empty($product->user->user_address) ? $product->user->user_address : (!empty($product->user->business_address) ? $product->user->business_address : ''))); ?></p>-->
            				<p class="seller-locaton"><i class="fa fa-map-marker" aria-hidden="true" style="color:#ff1d25;"></i> <?php echo e((isset($product->user->city) && !empty($product->user->city) ? $product->user->city->city_name : '')); ?> <?php echo e((isset($product->user->state) && !empty($product->user->state) ? ', '.$product->user->state->state_name : '')); ?></p>
            				<p class="seller-com">
            				<span class="yrs"><?php echo e(\Carbon\Carbon::now()->format('Y') - (!empty($product->user->year_of_establishment) ? $product->user->year_of_establishment : '2019')); ?> Years</span>
            				<?php if(!empty($product->user->vr_trust_icon)): ?>
            				    <span><a href="<?php echo e((!empty($product->user->vr_trust_docs) ? url('/').'/public/storage/vr-trust/'.$product->user->vr_trust_docs : '#')); ?>" target="_blank" style="color:#000;" title="VR Trust"><img src="<?php echo e(url('/')); ?>/public/storage/vr-trust/<?php echo e($product->user->vr_trust_icon); ?>" alt="vr trust"> VR Trust</a></span>
            				<?php endif; ?>
            				</p>
            				<p class="web-site"><a href="<?php echo e((isset($product->user->company_website) ? $product->user->company_website : '')); ?>" target="_blank"> <?php echo e((isset($product->user->company_website) ? $product->user->company_website : '')); ?></a></p>
            				<p class="saller-contact">
            					
            					<span><a class="btn btn-dark-green" data-send-inquiry-btn seller="<?php echo e($product->user); ?>" buyer="<?php if(Auth::check()): ?> <?php echo e(Auth::user()); ?> <?php endif; ?>" product="<?php echo e($product); ?>">Send Inquiry</a></span>
            				</p>
            				</div>
            			</div>
            		</div>
            	 </div>
            	</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
          
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="float-right">
                    <?php echo e($shopProducts->appends(request()->query())->links()); ?>

                </div>
              <!--<div class="jplist-label customlable" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging">-->
              <!--</div>-->
              <!--<div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-items-per-page="<?php echo e($allsettings->product_per_page); ?>">-->
              <!--</div>-->
            </div>
          </div>
          
        </div>
      </div>
    </div>
    </div>
  </main>
  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script>
  $(document).ready(function() {
    $('[data-input-change]').change(function () { 
        searchFilter();
    });
    
    $("#product_price").on("input blur", function() {
        searchFilter();
    });
    
    function searchFilter(){ 
        $('#shopForm').css('pointer-events', 'none');
        
        var subCatIds = [];
        $('input[name="subcategory_ids[]"]:checked').each(function() {
            subCatIds.push($(this).val());
        });
        
        var businessTypes = [];
        $('input[name="business_type[]"]:checked').each(function() {
            businessTypes.push($(this).val());
        });
        
        var productPrice = $('#product_price').val();
        
        var redirectUrl = '<?php echo e(url('/')); ?>/shop?subcategory_id='+subCatIds.join(',');
        redirectUrl += '&business_type='+businessTypes.join(',');
        redirectUrl += '&product_price='+productPrice;
        
        var catId = $('#url_cat_id').val();
        if(catId.length > 0){
            redirectUrl += '&cat_id='+catId;
        }
        
        window.location.href = redirectUrl;
    }
  });
  
   $('[btn-send-inquiry]').click(function () {
      var productId = $(this).attr('product-id');
      var productImg = $(this).attr('product-img');
      
      $('#productId').val(productId);
      $('#productImage').val(productImg.split('/').pop());
      
      $('#productInquiryImage').attr('src', productImg);
      $('#sendInquiryModal').modal('show');
   });
</script>

<script>
function openNav() {
  document.getElementById("cate-flt").style.height = "100%";
}

function closeNav() {
  document.getElementById("cate-flt").style.height = "0%";
}
</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/shop.blade.php ENDPATH**/ ?>