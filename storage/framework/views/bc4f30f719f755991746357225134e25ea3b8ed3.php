<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2049,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2049,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2049,$translate)); ?></span></p>
      </div>
    </section>
  <main role="main">
      <div class="container page-white-box mt-3">
         <div class="row" align="center">
                           <?php $z = 1; ?>
                              <?php $__currentLoopData = $shop['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-2 pb-2 prod-item">
                                   <div class="product-grid2">
                                    <div class="product-image2">
                                    <div class="product-hider">
                               <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$z); ?>" data-type="image" class="quickview">
                               <i class="fa fa-eye"></i>
                               <p><?php echo e(Helper::translation(2060,$translate)); ?><br/><?php echo e(Helper::translation(2061,$translate)); ?></p>
                               </a>
                               <div class="product-images">
                                    <?php $imagecount = count($product->productimages); ?>
                                    <?php if($imagecount != 0): ?>
                                    <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$z); ?>" data-type="image"></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </div>
                                    <div class="product-former">
                                    <h3><?php echo e($product->product_name); ?></h3>
                                    <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock != 0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?> (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?> (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
            <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg = "badge badge-secondary"; } ?>
            <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?> : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                                    
                                              <p class="mt-3">
                                    <?php echo e($product->product_short_desc); ?> 
                                    </p>
                                    <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                                    </div>
                                    </div>
                                    <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                                            <?php if($product->product_image != ""): ?>
                                            <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                                            <?php else: ?>
                                            <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg">
                                            <?php endif; ?>
                                            <?php $imagecount = count($product->productimages); ?>
                                            <?php if($imagecount != 0): ?>
                                            <?php $no = 1; ?>
                                            <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($no == 1): ?>
                                            <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>">
                                            <?php endif; ?>
                                            <?php $no++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                                            <?php endif; ?>
                                            </a>
                                            <?php if($product->flash_deals == 1): ?>
                                            
                                            <?php endif; ?>                                            
                                            
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a></h3>
                                            
                                            <?php if(Auth::guest()): ?>
                                            <p class="fo-txt mt-3 mb-3 d-block"><a href="/login" class="btn btn-blue" class="text-white">Get Best Price</a></p>
                                            <?php else: ?>
                                          <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue text-white onGetBestPrice" data-target="#GetBestPrice" data-toggle="modal" data-product-id="<?php echo e($product->product_id); ?>" data-user-id="<?php if(!Auth::guest()): ?> <?php echo e(Auth::user()->id); ?> <?php endif; ?>" data-vendor-id="<?php echo e($product->user_id); ?>" data-image-url="<?php if($product->product_image != ""): ?> <?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?> <?php endif; ?>" data-vendor-name="<?php echo e(\ZigKart\User::where(["id" => $product->user_id])->first()->name); ?>" data-product-name="<?php echo e($product->product_name); ?>">Get Best Price</button></p>
                                            <?php endif; ?>
                                        </div>
                                        </div>
                                    </div>
                                   <?php $z++; ?>      
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="row">
                           <div class="col-md-12" align="center">
                      <div class="turn-page" id="itempager"></div>
                  </div> 
            </div>
      </div>
    </main>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="modal fade" id="GetBestPrice" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Get the best price for <span id="popNameTitle"></span></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="/request" method="POST" enctype="application/x-www-form-urlencoded">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="vendor_id" value="">
                <input type="hidden" name="product_id" value="">
                <div class="row">
                  <div class="col-md-4 con-bg12">
                    <div class="contact-info">
                      <div class="text-center">
                        <img id="popImg" src="https://via.placeholder.com/300?text='No Image Found'" class="img img-fluid" alt="image">
                        <p id="popNameSub">Product Name</p>
                        <span>Sold By - <span id="popVendor"></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 con-bg1">
                    <div class="contact-form">
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="quantity">Quantity</label>
                        <div class="col-sm-9">
                          <input type="text" name="quantity" id="quantity" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="unit">Unit (Ex.: kg, g, l, units, etc.)</label>
                        <div class="col-sm-9">
                          <input type="text" name="unit" id="unit" value="">
                        </div>
                      </div>
                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <label>Payment Option:</label>
                          <div class="d-flex flex-column flex-wrap">
                            <label for="option_1"><input type="radio" value="Full Advance Payment" name="payment_method" id="option_1"> Full Advance Payment</label>
                            <label for="option_2"><input type="radio" value="Pay on Delivery" name="payment_method" id="option_2"> Pay on Delivery</label>
                            <label for="option_3"><input type="radio" value="50% Advance and 50% on Delivery" name="payment_method" id="option_3" checked> 50% Advance and 50% on Delivery</label>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-blue">Send</button>
                          </div>
                        </div>
                      </div>
                      <?php if(!Auth::guest()): ?>
                      <div class="form-group mt-5">
                        <p class="col-sm-12">Your Contact Information :</p>
                        <p class="col-sm-12">Email Id:<?php echo e(Auth::user()->email); ?></p>
                        <p class="col-sm-12">Mobile Number:<?php echo e(Auth::user()->user_phone); ?></p>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
      $(".onGetBestPrice").on("click", function(event) {
        $("input[name='user_id']").val($(this).data("user-id"));
        $("input[name='vendor_id']").val($(this).data("vendor-id"));
        $("input[name='product_id']").val($(this).data("product-id"));
    
        var product_name = $(this).data("product-name");
        var vendor_name = $(this).data("vendor-name");
        var image_url = $(this).data("image-url");
    
        $("#popNameTitle").text(product_name);
        $("#popNameSub").text(product_name);
        $("#popImg").attr("src", image_url);
        $("#popVendor").text(vendor_name);
      });
    });
</script>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/new-releases.blade.php ENDPATH**/ ?>