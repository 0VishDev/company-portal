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
        <h2 class="mb-0">SELLER PROFILE </h2>
      </div>
    </section>
	
	<div class="container-fluid mt-3">
		<form class="p-3">	
			<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="product-listing bg-orange shadow pt-3 pb-3 pl-1 pr-1 mb-4">
        		<div class="row">
        			<div class="col-sm-12 col-md-3 mb-3 pro-img">
        			<img src="https://cpimg.tistatic.com/01153989/b/10/Biomass-Briquetting-Press.jpg">
        				<div class="sponsored-listing"><span class="spon-text">Sponsored Listing</span> <span class="sponsored-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></div>
        			</div>
        			<div class="col-sm-12 col-md-5 mb-3">
        			<div class="pro-heading">
        				<p><a href="#">Biomass Briquetting Press</a></p>
        				</div>
        				<hr>
        				<p>Packaging Type : </p>
        				<p>Price Range : </p>
        				<p>Product Type : </p>
        				<p>Color : as per order</p>
        				<p>Brand : </p>
        				
        			</div>
        			<div class="col-sm-12 col-md-4 mb-3">
        			<div class="seller-detail">
        				<div class="saller-heading">
        				<p><a href="#">RONAK ENGINEERING</a></p>
        				</div>
        				<p class="seller-locaton"><i class="fa fa-map-marker" aria-hidden="true"></i> Rajkot, India</p>
        				<p>Package Type -</p>
        				<p class="seller-com">
        				<span class="yrs">14 YRS</span>
        				<span><a href="#"><img src="/public/img/leader.png"></a></span>
        				<span><a href="#"> VR Trust</a></span>
        				</p>
        				<p><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true"></i>  Buyer Feedback</p>
        				</div>
        			</div>
        			
        			
        			<div class="col-sm-12 col-md-12 float-right mt-3">
        				<div class="saller-contact">
        					<span class="phone"><a href="tel:99999999999">Call Now: <i class="fa fa-phone" aria-hidden="true"></i> 09999999999</a></span>
        					<span><a href="#sendEnqury" class="btn btn-dark-green" data-target="#sendEnqury" data-toggle="modal">Send Inquiry</a></span>
        				</div>
        			</div>
        		</div>
        	</div>
        	
        	<div class="product-listing bg-orange shadow pt-3 pb-3 pl-1 pr-1 mb-4">
        		<div class="row">
        			<div class="col-sm-12 col-md-3 mb-3 pro-img">
        			<img src="https://cpimg.tistatic.com/01153989/b/10/Biomass-Briquetting-Press.jpg">
        				<div class="sponsored-listing"><span class="spon-text">Sponsored Listing</span> <span class="sponsored-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></div>
        			</div>
        			<div class="col-sm-12 col-md-5 mb-3">
        			<div class="pro-heading">
        				<p><a href="#">Biomass Briquetting Press</a></p>
        				</div>
        				<hr>
        				<p>Packaging Type : </p>
        				<p>Price Range : </p>
        				<p>Product Type : </p>
        				<p>Color : as per order</p>
        				<p>Brand : </p>
        				
        			</div>
        			<div class="col-sm-12 col-md-4 mb-3">
        			<div class="seller-detail">
        				<div class="saller-heading">
        				<p><a href="#">RONAK ENGINEERING</a></p>
        				</div>
        				<p class="seller-locaton"><i class="fa fa-map-marker" aria-hidden="true"></i> Rajkot, India</p>
        				<p>Package Type -</p>
        				<p class="seller-com">
        				<span class="yrs">14 YRS</span>
        				<span><a href="#"><img src="/public/img/leader.png"></a></span>
        				<span><a href="#"> VR Trust</a></span>
        				</p>
        				<p><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#2e8d14;"></i><i class="fa fa-thumbs-up" aria-hidden="true"></i>  Buyer Feedback</p>
        				</div>
        			</div>
        			
        			
        			<div class="col-sm-12 col-md-12 float-right mt-3">
        				<div class="saller-contact">
        					<span class="phone"><a href="tel:99999999999">Call Now: <i class="fa fa-phone" aria-hidden="true"></i> 09999999999</a></span>
        					<span><a href="#sendEnqury" class="btn btn-dark-green" data-target="#sendEnqury" data-toggle="modal">Send Inquiry</a></span>
        				</div>
        			</div>
        		</div>
        	</div>
        		
    		</div>
    	</div>
		</form>
			
</div>



<div class="modal fade show" id="sendEnqury" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Send Enqury</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
	<div class="row mt-3">
  		<div class="col-sm-4"><!--left col-->
      <div class="text-center contact">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail mb-3" alt="avatar">
        <h6>Upload Product Image...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div>
          
        </div>
    	<div class="col-sm-8">
			<div class="row">
                      <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="comoany_name"><h6>Company Name</h6></label>
                              <input type="text" class="form-control" name="comoany_name" id="comoany_name">
                          </div>
                      </div>
          
					  <div class="form-group col-sm-12">
                          
                          <div class="">
                              <label for="describe"><h6>Describe Your Buying Req.</h6></label>
                              <textarea class="form-control" rows="3" id="describe"></textarea>
                          </div>
                      </div>
				<div class="form-group col-sm-12">
                          
                          <div class="">
                              <input type="checkbox"> I agree the terms and condition.
                          </div>
                      </div>
				<div class="form-group col-sm-12">
                           <div class="">
							   <button class="btn btn-md btn-info" type="submit">Send Enqury</button>
                            </div>
                      </div>
			</div>
		</div>
					</div>
		</form>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/seller-profile.blade.php ENDPATH**/ ?>