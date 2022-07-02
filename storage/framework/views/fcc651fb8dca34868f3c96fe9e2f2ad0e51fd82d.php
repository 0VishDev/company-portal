<footer class="section-footer pt-3 pb-2 mt-3" id="footer">
	<div class="container pt-3 pb-3">
		<section class="footer-top padding-top">
			<div class="row">
			    <!--<aside class="col-sm-12 col-md-1 col-lg-1 white"></aside>-->
				<aside class="col-sm-4 col-md-3 col-lg-2 white">
					<h5 class="title">About Us</h5>
					<ul class="list-unstyled">
                        <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li> <a class="text-uppercase" href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e(ucfirst($pages->page_title)); ?> </a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<li> <a class="text-uppercase" href="/contact"> Contact Us </a></li>
					</ul>
                </aside>
				<aside class="col-sm-4 col-md-3 col-lg-2 white">
				    <h5 class="title">Our Services </h5>
					<ul class="list-unstyled">
					    <li><a class="text-uppercase" href="/advertise-us">Advertise with Us </a></li>
						<li> <a class="text-uppercase" href="/venicered-lending/business-loan" target="_blank"> Business Loan</a></li>
                        <li> <a class="text-uppercase" href="/venicered-lending/business-insurance" target="_blank"> Business Insurance </a></li>
                        <li> <a class="text-uppercase" href="/venicered-lending/iso-certification" target="_blank"> ISO Certification </a></li>
                        <li> <a class="text-uppercase" href="/logistics" target="_blank"> VR Logistics </a></li>
					</ul>
					
					<!--<h5 class="title"><?php echo e(Helper::translation(2023,$translate)); ?></h5>-->
					<!--<ul class="list-unstyled">-->
     <!--                   <?php if($allsettings->site_blog_display == 1): ?>-->
					<!--	<li> <a href="<?php echo e(URL::to('/blog')); ?>"> <?php echo e(Helper::translation(1978,$translate)); ?> </a></li>-->
     <!--                   <?php endif; ?>-->
					<!--	<li> <a href="<?php echo e(URL::to('/register')); ?>"> <?php echo e(Helper::translation(2024,$translate)); ?> </a></li>-->
					<!--	<li> <a href="<?php echo e(URL::to('/my-profile')); ?>"> <?php echo e(Helper::translation(2025,$translate)); ?> </a></li>-->
					<!--	-->
					<!--	<li> <a href="<?php echo e(URL::to('/wishlist')); ?>"> <?php echo e(Helper::translation(2027,$translate)); ?> </a></li>-->
					<!--</ul>-->
				</aside>
				<aside class="col-sm-4 col-md-3 col-lg-2 white">
				    <h5 class="title">Buyer </h5>
					<ul class="list-unstyled">
					    <li><a class="text-uppercase" href="#" data-target="#postbuyreq" data-toggle="modal">Post by Requirement </a></li>
						<li> <a class="text-uppercase" href="#"> Search Supplier</a></li>
                        <li> <a  class="text-uppercase" href="#" data-target="#rqstcall" data-toggle="modal"> Request Callback </a></li>
					</ul>
					
					<!--<h5 class="title"><?php echo e(Helper::translation(2028,$translate)); ?></h5>-->
					<!--<ul class="list-unstyled">-->
					<!--    <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a></li>-->
     <!--                   <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
					<!--	<li> <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e($pages->page_title); ?> </a></li>-->
					<!--	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
     <!--                   <li> <a href="<?php echo e(URL::to('/contact')); ?>"> <?php echo e(Helper::translation(2012,$translate)); ?> </a></li>-->
					<!--</ul>-->
				</aside>
					<aside class="col-sm-4 col-md-3 col-lg-3 white">
					    <h5 class="title">Supplier </h5>
					<ul class="list-unstyled">
					    <li><a class="text-uppercase" href="/shop">Display New Product </a></li>
						<li> <a class="text-uppercase" href="/search-leads"> Search Buy Leads</a></li>
                        <li> <a class="text-uppercase" href="/freights"> Get Frieght Quotes </a></li>
                        <li> <a class="text-uppercase" href="/logistics" target="_blank"> VR Logistics </a></li>
                        <li> <a class="text-uppercase" href="/logistics/export" target="_blank"> Export Bill Discounting </a></li>
                        <li> <a class="text-uppercase" href="/vr-trust"> VR Trust Certificate</a></li>
					</ul>
					    
					<!--<h5 class="title"><?php echo e(Helper::translation(2028,$translate)); ?></h5>-->
					<!--<ul class="list-unstyled">-->
					<!--    <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a></li>-->
     <!--                   <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
					<!--	<li> <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e($pages->page_title); ?> </a></li>-->
					<!--	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
     <!--                   <li> <a href="<?php echo e(URL::to('/contact')); ?>"> <?php echo e(Helper::translation(2012,$translate)); ?> </a></li>-->
					<!--</ul>-->
				</aside>
					<aside class="col-sm-4 col-md-3 col-lg-3 white">
					<h5 class="title">Business Directory </h5>
					<ul class="list-unstyled">
					    <li><a class="text-uppercase" href="/best-sellers">Manufacturer </a></li>
						<li> <a class="text-uppercase" href="/services-provide"> Service Provider</a></li>
                        <li> <a class="text-uppercase" href="/locations"> Find Supplier by Region  </a></li>
                        <li> <a class="text-uppercase" href="/services-provide"> Business Service </a></li>
                        <li> <a class="text-uppercase" href="#"> Sitemap  </a></li>
                        <li> <a  class="text-uppercase" href="/search-leads"> Buy Trade Leads </a></li>
					</ul>
					
					<!--<h5 class="title"><?php echo e(Helper::translation(2028,$translate)); ?></h5>-->
					<!--<ul class="list-unstyled">-->
					<!--    <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a></li>-->
     <!--                   <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
					<!--	<li> <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e($pages->page_title); ?> </a></li>-->
					<!--	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
     <!--                   <li> <a href="<?php echo e(URL::to('/contact')); ?>"> <?php echo e(Helper::translation(2012,$translate)); ?> </a></li>-->
					<!--</ul>-->
				</aside>
				
				
    <!--            <?php if($allsettings->site_newsletter_display == 1): ?>-->
				<!--<aside class="col-sm-4 col-md-3 col-lg-2">-->
				<!--	<article class="white">-->
				<!--		<h5 class="title"><?php echo e(Helper::translation(2029,$translate)); ?></h5>-->
				<!--		<p class="pb-2"><?php echo e($allsettings->site_subscribe_text); ?></p>-->
    <!--                    <div>-->
    <!--                    <?php if($message = Session::get('news-success')): ?>-->
    <!--                    <div class="alert alert-success" role="alert">-->
    <!--                       <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="fa fa-close close" aria-hidden="true"></span></a>-->
    <!--                       <?php echo e($message); ?>-->
    <!--                    </div>-->
    <!--                    <?php endif; ?>-->
    <!--                    <?php if($message = Session::get('news-error')): ?>-->
    <!--                    <div class="alert alert-danger" role="alert">-->
    <!--                     <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="fa fa-close close" aria-hidden="true"></span></a>-->
    <!--                          <?php echo e($message); ?>-->
    <!--                    </div>-->
    <!--                   <?php endif; ?> -->
    <!--                 </div>-->
    <!--                 <form action="<?php echo e(route('newsletter')); ?>" id="footer_form" method="post" class="row-sm form-noborder" enctype="multipart/form-data">-->
    <!--                    <?php echo e(csrf_field()); ?>-->
    <!--                    <div class="col-md-8 padding-off float-left">-->
    <!--                    <input class="form-control rounded-0" placeholder="<?php echo e(Helper::translation(2030,$translate)); ?>" type="text" name="news_email" data-bvalidator="required,email">-->
    <!--                    </div>-->
    <!--                    <div class="col-md-4 padding-off float-left">-->
    <!--                    <button type="submit" class="btn btn-block button-color rounded-0"><?php echo e(Helper::translation(2031,$translate)); ?> </button>-->
    <!--                    </div>-->
    <!--                 </form>-->
				<!--	</article>-->
				<!--</aside>-->
    <!--            <?php endif; ?>-->
			</div> <!-- row.// -->
			<br> 
		</section>
	</div><!-- //container -->
</footer>
<div class="copyright">
   <div class="container pt-4">
      <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12"> 
				<p class="text-white"><?php echo $allsettings->site_copyright; ?> <?php echo e($allsettings->site_title); ?></p>
			</div>
			<aside class="col-sm-12 col-md-4 text-center">
					<h5 class="title text-white"><?php echo e(Helper::translation(2022,$translate)); ?></h5>
					<div class="footer-box-info">
						    <ul>
                               <?php if($allsettings->facebook_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                        <img src="/public/img/facebook.png">
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->instagram_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->instagram_url); ?>" target="_blank">
                                        <img src="/public/img/instagram.png">
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->twitter_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->twitter_url); ?>" target="_blank">
                                        <img src="/public/img/twitter.png">
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->gplus_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->gplus_url); ?>" target="_blank">
                                        <img src="/public/img/linklen.png">
                                    </a>
                                </li>
                                <?php endif; ?>
                                
                                
                            </ul>
						</div>
                </aside>
			
            <?php if($allsettings->site_footer_payment != ''): ?>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<p class="text-md-right text-white-50">
	               <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_footer_payment); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="payment-icon">
				</p>
			</div>
           <?php endif; ?>
       </div>
    </div>      
</div>
<?php if($allsettings->cookie_popup == 1): ?>
<div class="alert text-center cookiealert" role="alert">
    <?php echo e($allsettings->cookie_popup_text); ?>


    <button type="button" class="btn button-color btn-sm acceptcookies" aria-label="Close">
        <?php echo e($allsettings->cookie_popup_button); ?>

    </button>
</div>
<?php endif; ?>

<div class="rstcall">
<button type="button" class="btn btn-red" data-target="#rqstcall" data-toggle="modal">Request A Callback</button>
</div>

<div class="modal fade show" id="rqstcall" aria-modal="true" >
    <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Request A Callback</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            					<soan id="callback-success"></span>
            					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            					  <span aria-hidden="true">&times;</span>
            					</button>
            				</div>
            				<form action="<?php echo e(url('request-callback')); ?>" method="POST" id="requestCallbackForm">
            					<?php echo csrf_field(); ?>
            					<div class="form-group row">
            						<label class="control-label col-sm-3" for="name">Name:</label>
            						<div class="col-sm-9">          
            						  <input type="name" class="form-control" id="name" placeholder="Enter your name" name="request-name" required>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						<label class="control-label col-sm-3" for="email">Email:</label>
            						<div class="col-sm-9">          
            						  <input type="email" class="form-control" id="email" placeholder="Enter your email" name="request-email" required>
            						</div>
            					  </div>
            						  <div class="form-group row">
            						<label class="control-label col-sm-3" for="mobile">Mobile No:</label>
            						<div class="col-sm-9">          
            						  <input type="text" class="form-control" id="mobile" placeholder="Enter your Mobile" name="request-mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						  <label class="control-label col-sm-3"></label>
            						<div class="col-sm-9">
            						  <button type="submit" class="btn btn-success" id="request-callback">Submit</button>
            						</div>
            					  </div>
            				</form>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script><?php /**PATH /home/ltqh13w2vszk/public_html/venicered.com/resources/views/footer.blade.php ENDPATH**/ ?>