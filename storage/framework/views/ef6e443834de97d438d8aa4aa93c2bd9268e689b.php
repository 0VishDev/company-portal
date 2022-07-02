<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e(Helper::translation(1913,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main role="main" class="main-content">
            
	<section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0">Sub Categories</h2>
        <p class="mb-0"><a href="/">Home</a> <span class="split">&gt;</span> <span>Sub Categories</span></p>
      </div>
    </section>
    
    <div class="container mt-3 bg-white shadow sub-pro">
		<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="main-heading text-center">
			<p>EXPLORE MORE PRODUCTS IN <?php echo e(strtoupper($subCategory->subcategory_name)); ?></p>
			</div>
			</div>
		</div>
		<hr>
        <div class="row jplist-panel">
            <div class="col-md-12">
                <div class="mt-1 mb-1 pt-1 pb-1">
                    <div class="row list" align="center">
                        <?php if(!empty($subCategory->products)): ?>
                            <?php $__currentLoopData = $subCategory->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 mb-2 pb-2 list-item">
                                    <div class="product-grid2">
                                        <div class="sub-product-image">
                                            <a href="<?php echo e(url('shop?product='.$product['product_slug'])); ?>">
                                                <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product['product_image']); ?>" alt="<?php echo e($product['product_name']); ?>" />
                                            </a>
                                        </div>
                                        <div class="product-content sub-cate-page">
                                            <h3 class="title"><a href="<?php echo e(url('shop?product='.$product['product_slug'])); ?>"><?php echo e($product['product_name']); ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
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
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/sub-products.blade.php ENDPATH**/ ?>