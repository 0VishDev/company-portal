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
       
	<section class="headerbg" style="background-image: url('/public/storage/settings/1596614658191.jpg');">
      <div class="container text-left">
        <h2 class="mb-0"> ADVERTISE WITH US </h2>
      </div>
    </section>
	
	<div class="container mt-3">
	<div class="row">
		<div class="col-sm-12 mb-3">
		<h3>PRODUCT AND SERVICES </h3>
			<p>VENICERED OFFERS NUMBERS OF MEMBERSHIP FOR YOUR BUSINESS REQUIREMENT. <i>YOU CAN CHOOSE ANY OF THEM RELATED TO YOR SECTOR.</i></p>
		</div>
		<?php $__currentLoopData = $serviceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceProvider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<div class="col-sm-6 col-md-4 mb-3">
    		    <div class="bg-white shadow p-3 adv text-center">
            	    <div class="adv-img">
        			    <?php if(!empty($serviceProvider->provider_image)): ?>
                           <img src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($serviceProvider->provider_image); ?>"  />
                        <?php else: ?> 
                            <img = src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  />
                        <?php endif; ?>
            		</div>
            		<div class="mt-4">
    					<h5><a href="#"><?php echo e($serviceProvider->provider_name); ?></a></h5>
    				</div>
    			</div>
    		</div>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/advertise-us.blade.php ENDPATH**/ ?>