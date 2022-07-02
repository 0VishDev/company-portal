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
            
	<section class="headerbg" style="background-image: url('/public/storage/settings/1595596012191.jpg');">
      <div class="container text-left">
        <h2 class="mb-0">Sub Categories</h2>
        <p class="mb-0"><a href="/">Home</a> <span class="split">&gt;</span> <span>Sub Categories</span></p>
      </div>
    </section>
	
	<div class="container mt-3">
	<!--<div class="row">-->
	<!--	<div class="col-sm-6 col-md-4 mb-3">-->
	<!--	<div class="bg-white shadow p-3 sub-sub text-center">-->
	<!--		<img src="https://cpimg.tistatic.com/03593536/b/4/Natural-Latex-Gloves.jpg">-->
	<!--		<div class="saller-contact1 mt-2">-->
	<!--				<span><a href="#" class="btn btn-dark-green">Send Inquiry</a></span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="sub-sub-txt mt-3">-->
	<!--		<p><a href="#">Natural Latex Gloves</a></p>-->
	<!--		<p class="price">Price : 100 INR</p>-->
	<!--		<p class="com-name">VICTOR IMPORTS</p>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--	<div class="col-sm-6 col-md-4 mb-3">-->
	<!--	<div class="bg-white shadow p-3 sub-sub text-center">-->
	<!--		<img src="https://cpimg.tistatic.com/00182445/b/10/Sawdust-Briquetting-Machine.jpg">-->
	<!--		<div class="saller-contact1 mt-2">-->
	<!--				<span><a href="#" class="btn btn-dark-green">Send Inquiry</a></span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="sub-sub-txt mt-3">-->
	<!--		<p><a href="#">Sawdust Briquetting Machine</a></p>-->
	<!--		<p class="price">Price : 21.0 lakh INR</p>-->
	<!--		<p class="com-name">RONAK ENGINEERING</p>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--	<div class="col-sm-6 col-md-4 mb-3">-->
	<!--	<div class="bg-white shadow p-3 sub-sub text-center">-->
	<!--		<img src="https://cpimg.tistatic.com/05690282/b/7/Instant-Turmeric-Latte.jpg">-->
	<!--		<div class="saller-contact1 mt-2">-->
	<!--				<span><a href="#" class="btn btn-dark-green">Send Inquiry</a></span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="sub-sub-txt mt-3">-->
	<!--		<p><a href="#">Instant Turmeric Latte</a></p>-->
	<!--		<p class="price">Price : 395 Onwards INR</p>-->
	<!--		<p class="com-name">NEEL BEVERAGES PRIVATE LIMITED</p>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--	</div>-->
	</div>
	
    <div class="container mt-3 bg-white shadow sub-pro">
		<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="main-heading text-center">
			<p>EXPLORE MORE CATEGORIES IN <?php echo e(strtoupper($category['category_name'])); ?></p>
				<!--<small>68912 Items</small>-->
			</div>
			</div>
		</div>
		<hr>
        <div class="row jplist-panel">
            <div class="col-md-12">
                <div class="mt-1 mb-1 pt-1 pb-1">
                    <div class="row list" align="center">
                        <?php $__currentLoopData = $category['subCategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $subCategory['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-2 pb-2 list-item">
                                    <div class="product-grid2">
                                        <div class="product-image2">
                                            <div class="product-hider">
                                                <!--<a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product['product_image']); ?>" data-fancybox="quick-view-9OS7kTJigjSQMIQ3Nt4I8hmwB1" data-type="image" class="quickview">-->
                                                <!--    <i class="fa fa-eye"></i>-->
                                                <!--    <p>-->
                                                <!--        Quick<br />-->
                                                <!--        View-->
                                                <!--    </p>-->
                                                <!--</a>-->
                                                <!--<div class="product-images">-->
                                                <!--    <a href="https://tiimg.tistatic.com/categoryimg/v1/1/Rice-781.jpg" data-fancybox="quick-view-9OS7kTJigjSQMIQ3Nt4I8hmwB1" data-type="image"></a>-->
                                                <!--    <a href="https://tiimg.tistatic.com/categoryimg/v1/1/Rice-781.jpg" data-fancybox="quick-view-9OS7kTJigjSQMIQ3Nt4I8hmwB1" data-type="image"></a>-->
                                                <!--    <a href="https://tiimg.tistatic.com/categoryimg/v1/1/Rice-781.jpg" data-fancybox="quick-view-9OS7kTJigjSQMIQ3Nt4I8hmwB1" data-type="image"></a>-->
                                                <!--</div>-->
                                                <div class="product-former">
                                                    <h3><?php echo e($product['product_name']); ?></h3>
                                                    <div class="mt-3">Availability : <span class="red-color"><?php echo e(($product['product_stock'] > 0 ? 'In Stock' : 'Out of Stock')); ?></span></div>
                                                    <div class="mt-2">Condition : <span class="badge badge-warning"><?php echo e($product['product_condition']); ?></span></div>
                                                    <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product['product_slug']); ?>" class="btn button-color">View Details</a></p>
                                                </div>
                                            </div>
                                            <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product['product_slug']); ?>">
                                                <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product['product_image']); ?>" />
                                                <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product['product_image']); ?>" />
                                            </a>
                                            <!--<ul class="social">-->
                                            <!--    <li>-->
                                            <!--        <a href="https://b2bkart.inforidgetechnologyindia.com/login" data-tip="Add to Wishlist"><i class="fa fa-heart"></i></a>-->
                                            <!--    </li>-->
                                            <!--</ul>-->
                                        </div>
                                        <div class="product-content sub-cate-page">
                                            <h3 class="title"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product['product_slug']); ?>"><?php echo e($product['product_name']); ?></a></h3>
        									<!--<small>5226 items</small>-->
        
        									<ul>
                                            `   <li><a href="<?php echo e(URL::to('/shop?subcat_id='.$subCategory['subcat_id'])); ?>">View More</a></li>
        									</ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--<div class="container mt-3 bg-white shadow sub-pro">
        <div class="row">
   <div class="col-md-12 mb-5">
    <h4 class="black mb-2 pb-2 pt-3 text-center">Related Products</h4>
    <div class="row mt-3 pt-3" align="center">
        
        
    </div>
</div>
</div>
</div>-->

<!--  <div class="container  mt-3 bg-white shadow clearfix">-->
<!--    <div class="bottomText">-->
<!--        <h2>About Agriculture in India</h2>-->
<!--        <p>-->
<!--            Agriculture is the largest livelihood provider in India especially in rural areas. It is also the biggest contributing sector to India’s economy. The agricultural practice in India is devoted to the promotion of subsistence-->
<!--            farming methods and their correct implementation. It’s a vast and expansive domain that encompasses three broad verticals, namely:-->
<!--        </p>-->
<!--        <ul>-->
<!--            <li>Agricultural methodologies &amp; techniques</li>-->
<!--            <li>Agricultural resources (fertilizers, equipment, machinery, etc.)</li>-->
<!--            <li>Agricultural food production&nbsp;</li>-->
<!--        </ul>-->
<!--        <div><br /></div>-->
<!--        <p>-->
<!--            Agro products and resources are readily available today thanks to the growing number of agriculture products manufacturers, suppliers, traders and distributors in the market. However, not all manufacturers and suppliers of agro-->
<!--            products are the same. Trade India makes it simple for you to discover and contact these traders online. At Trade India, you get the advantage of comparing various suppliers and dealers of agricultural products side by side to-->
<!--            make an informed decision and choose the right agro product supplier as per your requirements.-->
<!--        </p>-->
<!--        <h2>Agricultural Products</h2>-->
<!--        <p>-->
<!--            While the entire agricultural production industry is too big to be encapsulated into a few broad categories, yet the major agricultural products can be grouped into food, raw materials, fibers, fuels, and prohibited drugs. The-->
<!--            food group is comprised of fruits, cereals, vegetable, and meat, while the fiber group includes wool, yarn, and flax. The raw material category includes bamboo and lumber, etc. Alongside cultivated products, animal husbandry and-->
<!--            plant byproducts are also available.-->
<!--        </p>-->
<!--        <h3>Agricultural Resources, Equipment &amp; Machinery</h3>-->
<!--        <p>-->
<!--            The sole goal behind the intense research and development of agricultural production methods has been to boost productivity, which would lead to a more robust supply-to-demand ratio. Deep integration of mechanics has greatly-->
<!--            aided the agricultural industry, as a majority tasks are now being accomplished using agricultural machinery and equipment. Furthermore, machines are also being extensively used to process raw and natural agricultural products-->
<!--            for mass consumption. Agricultural equipment is therefore in high demand. To choose the right agricultural equipment manufacturers and suppliers, browse through categories like irrigation equipment, greenhouse supplies &amp;-->
<!--            equipment, aquaculture machine &amp; supplies, farm machinery, machine parts and more. <br />-->
<!--        </p>-->
<!--    </div>-->
<!--</div>-->
  
    

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
<?php endif; ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/sub-categories.blade.php ENDPATH**/ ?>