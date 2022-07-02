<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2012,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2012,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2012,$translate)); ?></span></p>
      </div>
    </section>
    <main role="main">
      <div class="container page-white-box mt-3">
          <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">1 - B2B</h4>
                  <p>We are a business directory with thousands of products in more than 200 categories. We aim to connect all the buyers and sellers digitally so that they can run their business efficiently. Join us to grow your business in simple and easy steps.</p>
              </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">2 -  Distributorship</h4>
                  <p>We provide a fast and secure distributorship network to our customers in every corner of the world. Our professional distributors will deliver your desired products in the required quantity within the given time or even before. </p>
              </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">3 - E-Filing</h4>
                  <p>We are a 360-degree online portal that offers all the services that are required to run a business. Either you have a startup or a running business, we have all the services in one place, may that be GST, PAN registration, or Income tax return, a solution for every problem is ready.</p>
              </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">4 - Jobs</h4>
                  <p>We bring our highly experienced professional employees at the door-step of your business. Likewise, as a job consultant, we counsel and deliver the best suitable jobs to the eligible candidates.</p>
              </div>
              </div>
          </div>
          </div>
          <div class="container page-white-box mt-3">
         <div class="row">
	    <div class="col-md-12">
	        <h4><?php echo e(Helper::translation(2013,$translate)); ?></h4>
		    <hr>
	    </div>
		<div class="col-md-6">
		    <div class="address">
		    <h5><?php echo e(Helper::translation(2003,$translate)); ?>:</h5>
		    <ul class="list-unstyled">
		        <li> <?php echo $allsettings->office_address; ?></li>
		       
		    </ul>
		    </div>
		    <div class="email">
		    <h5><?php echo e(Helper::translation(2014,$translate)); ?>:</h5>
		    <ul class="list-unstyled">
		        <li> <?php echo e($allsettings->office_email); ?></li>
		        
		    </ul>
		    </div>
		    <div class="phone">
		        <h5><?php echo e(Helper::translation(2002,$translate)); ?>:</h5>
		        <ul class="list-unstyled">
		        <li> <?php echo e($allsettings->office_phone); ?></li>
		       
		    </ul>
		    </div>
		</div>
		<div class="col-md-6">
            <div>
             <?php if($message = Session::get('success')): ?>
               <div class="alert alert-success" role="alert">
                   <span class="alert_icon lnr lnr-checkmark-circle"></span>
                      <?php echo e($message); ?>

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                      </button>
               </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                    <?php echo e($message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span class="fa fa-close" aria-hidden="true"></span>
                    </button>
            </div>
            <?php endif; ?>
            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
		    <div class="card">
		        <div class="card-body">
		             <form action="<?php echo e(url('contact-us/add')); ?>" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="user_name" name="user_name" placeholder="<?php echo e(Helper::translation(2015,$translate)); ?>" class="form-control" type="text" data-bvalidator="required" required>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo e(Helper::translation(2014,$translate)); ?>" name="email" id="email" data-bvalidator="email,required" required>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="mobile" name="mobile" placeholder="Mobile No." class="form-control" type="number" required>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" name="location" class="form-control" id="location" placeholder="Location" required>
                            </div>
                          </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                           <textarea class="form-control" cols="20" rows="5" placeholder="Tell Us Your Requirement" name="requirement" id="requirement" data-bvalidator="required"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn button-color"><?php echo e(Helper::translation(1919,$translate)); ?></button>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
	</div>
   </div>
 </main>
 <style>
     .font-w {
    font-weight: 700;
}
 </style>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/contact.blade.php ENDPATH**/ ?>