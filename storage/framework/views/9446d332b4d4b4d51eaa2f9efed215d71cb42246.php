<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Services Provide - <?php echo e($allsettings->site_title); ?></title>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main role="main" class="main-content">
       
	<section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0">SERVICES PROVIDER </h2>
      </div>
    </section>
	
	<div class="container mt-3">
	<div class="row">
	    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="col-12 col-md-6 col-lg-4 sm-margin-five-bottom mb-3">
                <div class="feature-box bg-white bg-white">
					<a href="#sev-provide">
                        <div class="content medi-box serv-prov">
							<div class="madi-text">
                                <div class="text-medium"><?php echo e($service->service_name); ?></div>
							</div>
                            <?php if(!empty($service->service_image)): ?>
                               <img src="<?php echo e(url('/')); ?>/public/storage/services/<?php echo e($service->service_image); ?>"  />
                            <?php else: ?> 
                                <img = src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  />
                            <?php endif; ?>
                        </div>
					</a>
                </div>
            </div>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>	
</div>
<div  id="sev-provide"></div>
<div class="container mt-3">
<div class="bg-white pt-3">
<form  action="<?php echo e(asset('/deal')); ?>" method="post" class="iso">
    <?php echo csrf_field(); ?>	
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
					<h5>WE ARE DEALING ALL TYPE OF SERVICES :</h5>
						<h6>YOU WANT TO KNOW MORE PLEASE SUBMIT YOUR DETAILS:</h6>
						<?php if($errors->any()): ?>
				    <div class="alert alert-danger">
				        <ul>
				            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                <li><?php echo e($error); ?></li>
				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        </ul>
				    </div>
				  <?php endif; ?>
				  <?php if(session('success')): ?>
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
					</div>
     <div class="form-row mt-4">
                        <div class="col-sm-6 pb-3">
                            <label for="First">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="First" value="<?php echo e(old('first_name')); ?>" required>
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Last">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="Last" value="<?php echo e(old('last_name')); ?>" required>
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Email">Email ID</label>
                            <input type="text" name="email" class="form-control" id="Email" value="<?php echo e(old('email')); ?>" required>
                        </div>
		 				<div class="col-sm-6 pb-3">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo e(old('mobile')); ?>" id="mobile" required>
                        </div>
		 				<div class="col-sm-12 pb-3">
                            <label for="requirement">Your Related Requirement </label>
                            <textarea class="form-control" name="requirment" rows="4" id="requirement"  required></textarea>
                        </div>
		 				<div class="col-sm-12 pb-3">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </div>

				</div>
			</div>
		</form>
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
<?php endif; ?><?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/services-provide.blade.php ENDPATH**/ ?>