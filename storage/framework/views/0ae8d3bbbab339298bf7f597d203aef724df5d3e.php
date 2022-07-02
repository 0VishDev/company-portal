<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Supplier By City - <?php echo e($allsettings->site_title); ?></title>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <link href="/public/css/slick.css" rel="stylesheet">
  <link href="/public/css/slick-theme.css" rel="stylesheet">
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main role="main" class="main-content">

	<section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0">Supplier By Region</h2>
        <p class="mb-0"><a href="/">Home</a> <span class="split">&gt;</span> <span><?php echo e($city->city_name); ?></span></p>
      </div>
    </section>
	
    <div class="container-fluid mt-3">
        <div class="row">
        	<div class="col-sm-12">
        	<h4 class="black mb-2 pb-3 mt-2 pt-4">Industries & Manufacturing Companies In <?php echo e($city->city_name); ?>

        	</h4>
        	</div>
        </div>
    </div>	
	
	<div class="container-fluid">
		
    
        <?php $__currentLoopData = $categoryAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<div class="shadow bg-white pr-3 pl-3 pb-4 mb-3 hub" id="<?php echo e($category['category_slug']); ?>">
              <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                <h4 class="black mt-2 pt-2 cate-rgn-img"><img src="<?php echo e(url('/')); ?>/public/storage/category/<?php echo e($category['category_image']); ?>" alt="<?php echo e($category['category_name']); ?>"> <?php echo e($category['category_name']); ?></h4>
                </div>
                
                <?php $__currentLoopData = $category['subCategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3 subcate-img">
                        <h6><img src="<?php echo e(url('/')); ?>/public/storage/subcategory/<?php echo e($subcategory['subcategory_image']); ?>" alt="<?php echo e($subcategory['subcategory_name']); ?>"> <?php echo e($subcategory['subcategory_name']); ?></h6>
                         <?php $__currentLoopData = $subcategory['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="ml-3"><a href="<?php echo e(url('product/'.$product['product_slug'])); ?>"><?php echo e($product['product_name']); ?></a></p>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
<script>
$(function() {
    $('a.smooth-scroll').click(function() {
        if (
                window.location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&  window.location.hostname == this.hostname
        ) {
            var target = $j(this.hash);
            target = target.length ? target : $j('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 350
                }, 1000);
                return false;
            }
        }
    });
});
</script>

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
<?php endif; ?><?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/region.blade.php ENDPATH**/ ?>