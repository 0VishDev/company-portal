
<footer>
  <div class="content">
    <div class="top">
      <div class="logo-details">
        
        <span class="logo_name">
            <img src="<?php echo e(asset('public/img/new-img/svg-logo.png')); ?>" class="img-fluid" type="image/svg+xml" width="285px" height="55px">
            
            <!--<embed src="<?php echo e(asset('public/img/new-img/svg-logo.svg')); ?>" type="image/svg+xml" alt="<?php echo e($allsettings->site_title); ?>">
        -->
        </span>
      </div>
      <div class="media-icons">
        <a href="https://www.facebook.com/infobizbusinessworldtrade" target="_blank"><i class="fa fa-facebook-f"></i></a>
        <a href="https://twitter.com/BusinessWorldT2" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.instagram.com/businessworldtrade/" target="_blank"><i class="fa fa-instagram"></i></a>
        <a href="https://in.pinterest.com/BusinessWorldTrade/" target="_blank"><i class="fa fa-linkedin-square"></i></a>
        <a href="https://youtu.be/Nz5fcL0oEGY" target="_blank"><i class="fa fa-youtube" ></i></a>
      </div>
    </div>
    <div class="link-boxes">
      <ul class="box">
        <li class="link_name">About Us</li>
        <ul class="list-unstyled">
            <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li> <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e(ucfirst($pages->page_title)); ?> </a></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<li> <a href="<?php echo e(URL::to('/contact')); ?>"> Contact Us </a></li>
			<li> <a href="<?php echo e(URL::to('/blog')); ?>"> Blog </a></li>
		</ul>
        
      </ul>
      <ul class="list-unstyled box">
          <li class="link_name">Our Services</li>
		    <li> <a href="<?php echo e(URL::to('/advertise-us')); ?>">Advertise with Us </a></li>
			<li> <a href="<?php echo e(URL::to('/lending/business-loan')); ?>" target="_blank"> Business Loan</a></li>
            <li> <a href="<?php echo e(URL::to('/lending/business-insurance')); ?>" target="_blank"> Business Insurance </a></li>
            <li> <a href="<?php echo e(URL::to('/lending/iso-certification')); ?>" target="_blank"> ISO Certification </a></li>
            <li> <a href="<?php echo e(URL::to('/lending/e-filing')); ?>" target="_blank"> E-Filing </a></li>
		</ul>
      <ul class="list-unstyled box">
        <li class="link_name">Buyer</li>
	    <li><a href="#" data-target="#postBuyerReqModal" data-toggle="modal">Post by Requirement </a></li>
		<li> <a href="<?php echo e(URL::to('/best-sellers')); ?>"> Search Supplier</a></li>
        <li> <a href="#" data-target="#rqstcall" data-toggle="modal"> Request Callback </a></li>
	 </ul>
      <ul class="list-unstyled box">
          <li class="link_name">Supplier</li>
		<li> <a href="<?php echo e(URL::to('/search-leads')); ?>"> Search Buy Leads</a></li>
        <li> <a href="<?php echo e(URL::to('/freights')); ?>"> Get Frieght Quotes </a></li>
        <li> <a href="<?php echo e(URL::to('/logistics')); ?>" target="_blank"> Logistics </a></li>
        <li> <a href="<?php echo e(URL::to('/logistics/export')); ?>" target="_blank"> Export Bill Discounting </a></li>
	  </ul>
      <ul class="box input-box">
        <li class="link_name">Subscribe</li>
        <li><input type="text" placeholder="Enter your email"></li>
        <li><input type="button" value="Subscribe"></li>
      </ul>
    </div>
  </div>
  <!--<div class="bottom-details">
    <div class="bottom_text">
      <span class="copyright_text">Copyright © 2021 <a href="#">Logo.</a>All rights reserved</span>
      <span class="policy_terms">
        <a href="#">Privacy policy</a>
        <a href="#">Terms & condition</a>
      </span>
    </div>
  </div>-->
</footer>
<!--<footer class="section-footer pt-3 mt-3" id="footer">
	<div class="container pt-3">
		<section class="footer-top padding-top">
			<div class="row">
				<aside class="col-sm-4 col-md-2 col-lg-2 white">
					<h2 class="title">About Us</h2>
					<ul class="list-unstyled">
                        <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li> <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e(ucfirst($pages->page_title)); ?> </a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<li> <a href="<?php echo e(URL::to('/contact')); ?>"> Contact Us </a></li>
						<li> <a href="<?php echo e(URL::to('/blog')); ?>"> Blog </a></li>
					</ul>
                </aside>
				<aside class="col-sm-4 col-md-2 col-lg-2 white">
				    <h2 class="title">Our Services </h2>
					<ul class="list-unstyled">
					    <li> <a href="<?php echo e(URL::to('/advertise-us')); ?>">Advertise with Us </a></li>
						<li> <a href="<?php echo e(URL::to('/lending/business-loan')); ?>" target="_blank"> Business Loan</a></li>
                        <li> <a href="<?php echo e(URL::to('/lending/business-insurance')); ?>" target="_blank"> Business Insurance </a></li>
                        <li> <a href="<?php echo e(URL::to('/lending/iso-certification')); ?>" target="_blank"> ISO Certification </a></li>
                        <li> <a href="<?php echo e(URL::to('/lending/e-filing')); ?>" target="_blank"> E-Filing </a></li>
					</ul>
				</aside>
				<aside class="col-sm-4 col-md-2 col-lg-2 white">
				    <h2 class="title">Buyer </h2>
					<ul class="list-unstyled">
					    <li><a href="#" data-target="#postBuyerReqModal" data-toggle="modal">Post by Requirement </a></li>
						<li> <a href="<?php echo e(URL::to('/best-sellers')); ?>"> Search Supplier</a></li>
                        <li> <a href="#" data-target="#rqstcall" data-toggle="modal"> Request Callback </a></li>
					</ul>
				</aside>
					<aside class="col-sm-4 col-md-3 col-lg-3 white">
					    <h2 class="title">Supplier </h2>
					<ul class="list-unstyled">
						<li> <a href="<?php echo e(URL::to('/search-leads')); ?>"> Search Buy Leads</a></li>
                        <li> <a href="<?php echo e(URL::to('/freights')); ?>"> Get Frieght Quotes </a></li>
                        <li> <a href="<?php echo e(URL::to('/logistics')); ?>" target="_blank"> Logistics </a></li>
                        <li> <a href="<?php echo e(URL::to('/logistics/export')); ?>" target="_blank"> Export Bill Discounting </a></li>
					</ul>
				</aside>
					<aside class="col-sm-4 col-md-3 col-lg-3 white">
					<h2 class="title">Business Directory </h2>
					<ul class="list-unstyled">
					    <li><a href="<?php echo e(URL::to('/best-sellers')); ?>">Manufacturer </a></li>
						<li> <a href="<?php echo e(URL::to('/services-provide')); ?>"> Service Provider</a></li>
                        <li> <a href="<?php echo e(URL::to('/locations')); ?>"> Find Supplier by Region  </a></li>
                        <li> <a href="<?php echo e(URL::to('/services-provide')); ?>"> Business Service </a></li>
                        <li> <a  href="<?php echo e(URL::to('/search-leads')); ?>"> Buy Trade Leads </a></li>
					</ul>
				</aside>
			</div> 
			<br> 
		</section>
	</div>
</footer>-->


<div class="copyright">
   <div class="container pt-4">
      <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12"> 
				<p class="text-white"><?php echo $allsettings->site_copyright; ?></p>
			</div>
			<aside class="col-sm-12 col-md-6 col-lg-6 text-center">
				<div class="footer-box-info">
				    <p class="text-white" style="float:right;">Terms And Conditions</p>
					<!--<ul>
					        
					        <li>
                                <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                    <a href="https://youtu.be/Nz5fcL0oEGY" target="_blank"><img src="<?php echo e(url('/')); ?>/public/img/new-img/youtube.png" alt="facebook"></a>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                    <a href="https://twitter.com/BusinessWorldT2" target="_blank"><img src="<?php echo e(url('/')); ?>/public/img/new-img/twitter.png" alt="facebook"></a>
                                </a>
                            </li>
					        <li>
                                <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                    <a href="https://in.pinterest.com/BusinessWorldTrade/" target="_blank"><img src="<?php echo e(url('/')); ?>/public/img/new-img/pinterest.png" alt="facebook"></a>
                                </a>
                            </li>
					         <?php if($allsettings->facebook_url != ''): ?>
                            <li>
                                <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                    <img src="<?php echo e(url('/')); ?>/public/img/facebook.png" alt="facebook">
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if($allsettings->instagram_url != ''): ?>
                            <li>
                                <a href="<?php echo e($allsettings->instagram_url); ?>" target="_blank">
                                    <img src="<?php echo e(url('/')); ?>/public/img/instagram.png" alt="instagram">
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if($allsettings->gplus_url != ''): ?>
                            <li>
                                <a href="<?php echo e($allsettings->gplus_url); ?>" target="_blank">
                                    <img src="<?php echo e(url('/')); ?>/public/img/linklen.png" alt="linklen">
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            
                        </ul>-->
				</div>
            </aside>
			
            
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
<button class="callbck" data-target="#rqstcall" data-toggle="modal"><img src="<?php echo e(url('/')); ?>/public/img/lead-phone.png" alt="Call Back" title="CallBack Request"></button>
</div>

<div class="modal fade show" id="rqstcall" aria-modal="true" >
    <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
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
            						  <input type="name" class="form-control shadow" id="name" placeholder="Enter your name" name="request-name" required>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						<label class="control-label col-sm-3" for="email">Email:</label>
            						<div class="col-sm-9">          
            						  <input type="email" class="form-control shadow" id="email" placeholder="Enter your email" name="request-email" required>
            						</div>
            					  </div>
            						  <div class="form-group row">
            						<label class="control-label col-sm-3" for="mobile">Mobile No:</label>
            						<div class="col-sm-9">          
            						  <input type="number" class="form-control shadow" id="mobile" placeholder="Enter your Mobile" name="request-mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
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


<div class="modal fade show" id="feedback" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h3 class="mb-0">Feedback</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            					  <span aria-hidden="true">&times;</span>
            					</button>
            				</div>
            				<form action="<?php echo e(url('request-feedback')); ?>" method="POST" id="feedbackform">
            				    <?php echo csrf_field(); ?>
            					<div class="form-group row">
            						<label class="control-label col-sm-3" for="first-name">First Name:</label>
            						<div class="col-sm-9">          
            						  <input type="name" class="form-control shadow" id="first-name" placeholder="Enter your First name" name="feed-first-name" required>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						<label class="control-label col-sm-3" for="last-name">Last Name:</label>
            						<div class="col-sm-9">          
            						  <input type="name" class="form-control shadow" id="last-name" placeholder="Enter your Last name" name="feed-last-name" required>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						<label class="control-label col-sm-3" for="email">Email:</label>
            						<div class="col-sm-9">          
            						  <input type="email" class="form-control shadow" id="email" placeholder="Enter your email" name="feed-email" required>
            						</div>
            					  </div>
            						  <div class="form-group row">
            						<label class="control-label col-sm-3" for="mobile">Mobile No:</label>
            						<div class="col-sm-9">          
            						  <input type="number" class="form-control shadow" id="mobile" placeholder="Enter your Mobile" name="feed-mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            						</div>
            					  </div>
            					   <div class="form-group row">
            						<label class="control-label col-sm-3" for="purpose">Your Purpose:</label>
            						<div class="col-sm-9">          
            						  <select class="form-control shadow" id="purpose" name="feed-purpose">
            						      <option value=""></option>
            						      <option value="Buying Requirement">Buying Requirement</option>
            						      <option value="Sale Requirement">Sale Requirement</option>
            						      <option value="General Enquiry">General Enquiry</option>
            						  </select>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						<label class="control-label col-sm-3" for="detail">Your FeedBack Details:</label>
            						<div class="col-sm-9">          
            						  <textarea class="form-control shadow" id="detail" rows="4" name="feed-detail"></textarea>
            						</div>
            					  </div>
            					  <div class="form-group row">
            						  <label class="control-label col-sm-3"></label>
            						<div class="col-sm-9">
            						  <button type="submit" class="btn btn-success" id="request-feedback">Submit Details</button>
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

<div class="modal fade show" id="9" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h3 class="mb-0">VRdistributorship Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            					  <span aria-hidden="true">&times;</span>
            					</button>
            				</div>
            				<form action="<?php echo e(url('distributorship/detail/add')); ?>" method="POST" id="eFilingForm" enctype="multipart/form-data">
            				    <?php echo csrf_field(); ?> 
            				    <div class="row">
            					<div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">First Name:</label>        
            						  <input type="text" class="form-control shadow" name="first_name" id="distributorship_first_name" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Last Name:</label>        
            						  <input type="text" class="form-control shadow" name="last_name" id="distributorship_last_name" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<div class=""> 
            						<label class="control-label">Email:</label>         
            						  <input type="email" class="form-control shadow" name="email" id="distributorship_email" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Mobile No:</label>
            						<div class="">          
            						  <input type="number" class="form-control shadow" name="mobile" id="distributorship_mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">State:</label>
            						<select class="form-control shadow" name="state" id="distributorship_state" state-list>
            						    <option value="">-- Please select --</option>
            						    <?php $__currentLoopData = $allstate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            						      <option value="<?php echo e($state->id); ?>"><?php echo e($state->state_name); ?></option>
            						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            						 </select>
            					  </div>
            					  <div class="form-group col-sm-6">
            						 <label class="control-label">City:</label>
            						 <select class="form-control shadow" name="city" id="distributorship_city" city-list>
            						      <option value="">-- Please select --</option>
            						 </select>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label" for="purpose">Your Option:</label>
            						<div class="">          
            						  <select class="form-control shadow" id="distributorship_purpose" name="purpose">
            						      <option value=""></option>
            						      <option value="Appoint Distributors">I want to appoint Distributors </option>
            						      <option value="Become a Distributor">I want to become a Distributor </option>
            						      <option value="Appoint Franchisee">I want to appoint Franchisee </option>
            						      <option value="Become a Franchisee">I want to become a Franchisee </option>
            						      <option value="Appoint Sales Agents">I want to appoint Sales Agents </option>
            						      <option value="Become a Sales Agents">I want to become a Sales Agent </option>
            						  </select>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label" for="purpose">Categories:</label>
            						<div class="">          
            						  <select class="form-control shadow" id="distributorship_categories" name="categories">
            						       <option value=""></option>
            						       <option value="Agriculture">Agriculture</option>
            						       <option value="Apparel & Fashion">Apparel & Fashion</option>
            						       <option value="Automobile">Automobile</option>
            						       <option value="Brass Hardware & Components">Brass Hardware & Components</option>
            						       <option value="Business Services">Business Services</option>
            						       <option value="Chemicals">Chemicals</option>
            						       <option value="Computer Hardware & Software">Computer Hardware & Software</option>
            						       <option value="Construction & Real Estate">Construction & Real Estate</option>
            						       <option value="Consumer Electronics">Consumer Electronics</option>
            						       <option value="Electronics & Electrical Supplies">Electronics & Electrical Supplies</option>
            						       <option value="Energy & Power">Energy & Power</option>
            						       <option value="Environment & Pollution">Environment & Pollution</option>
            						       <option value="Environment & Pollution">Food & Beverage</option>
            						       <option value="Furniture">Furniture</option>
            						       <option value="Gifts & Crafts">Gifts & Crafts</option>
            						       <option value="Health & Beauty">Health & Beauty</option>
            						       <option value="Home Supplies">Home Supplies</option>
            						       <option value="Home Textiles & Furnishings">Home Textiles & Furnishings</option>
            						       <option value="Hospital & Medical Supplies">Hospital & Medical Supplies</option>
            						       <option value="Hotel Supplies & Equipment">Hotel Supplies & Equipment</option>
            						       <option value="Industrial Supplies">Industrial Supplies</option>
            						       <option value="Jewelry & Gemstones">Jewelry & Gemstones</option>
            						       <option value="Leather & Leather Products">Leather & Leather Products</option>
            						       <option value="Machinery">Machinery</option>
            						       <option value="Mineral & Metals">Mineral & Metals</option>
            						       <option value="Office & School Supplies">Office & School Supplies</option>
            						       <option value="Packaging & Paper">Packaging & Paper</option>
            						       <option value="Pharmaceuticals">Pharmaceuticals</option>
            						       <option value="Pipes, Tubes & Fittings">Pipes, Tubes & Fittings</option>
            						       <option value="Plastics & Products">Plastics & Products</option>
            						       <option value="Printing & Publishing">Printing & Publishing</option>
            						       <option value="Scientific & Laboratory Instruments">Scientific & Laboratory Instruments</option>
            						       <option value="Security & Protection">Security & Protection</option>
            						       <option value="Sports & Entertainment">Sports & Entertainment</option>
            						       <option value="Telecommunications">Telecommunications</option>
            						       <option value="Textiles & Fabrics">Textiles & Fabrics</option>
            						       <option value="Toys">Toys</option>
            						       <option value="Transportation">Transportation</option>
            						  </select>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-12">
            						<label class="control-label">Description:</label>
            						<div class="">          
            						  <textarea class="form-control shadow" rows="3" id="distributorship_description" name="description"></textarea>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-12">
            						  <label class="control-label"></label>
            						<div class="">
            						  <button type="submit" class="btn btn-success">Submit</button>
            						</div>
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

<div class="modal fade show" id="#" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h3 class="mb-0">VRjobs Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            					  <span aria-hidden="true">&times;</span>
            					</button>
            				</div>
            				<form action="<?php echo e(url('jobs/detail/add')); ?>" method="POST" id="jobsForm" enctype="multipart/form-data">
            				    <?php echo csrf_field(); ?> 
            				    <div class="row">
            				    <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">First Name:</label>        
            						  <input type="text" class="form-control shadow" name="first_name" id="jobs_first_name" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Last Name:</label>        
            						  <input type="text" class="form-control shadow" name="last_name" id="jobs_last_name" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<div class=""> 
            						<label class="control-label">Email:</label>         
            						  <input type="email" class="form-control shadow" name="email" id="jobs_email" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Mobile No:</label>
            						<div class="">          
            						  <input type="number" class="form-control shadow" name="mobile" id="jobs_mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">State:</label>
            						<select class="form-control shadow" name="state" id="jobs_state" state-list>
            						    <option value="">-- Please select --</option>
            						    <?php $__currentLoopData = $allstate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            						      <option value="<?php echo e($state->id); ?>"><?php echo e($state->state_name); ?></option>
            						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            						 </select>
            					  </div>
            					  <div class="form-group col-sm-6">
            						 <label class="control-label">City:</label>
            						 <select class="form-control shadow" name="city" id="jobs_city" city-list>
            						      <option value="">-- Please select --</option>
            						 </select>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label" for="purpose">Categories:</label>
            						<div class="">          
            						  <select class="form-control shadow" id="jobs_categories" name="categories">
            						       <option value=""></option>
            						       <option value="Beautician">Beautician </option>
            						       <option value="BPO/  Telecaller">BPO/  Telecaller </option>
            						       <option value="Cashier">Cashier </option>
            						       <option value="Cook/ Chef">Cook/ Chef </option>
            						       <option value="Data Entry / Back Office">Data Entry / Back Office </option>
            						       <option value="Hospitality Executive">Hospitality Executive</option>
            						       <option value="Driver">Driver </option>
            						       <option value="HR/ Admin">HR/ Admin</option>
            						       <option value="IT Hardware & Network Engineer">IT Hardware & Network Engineer </option>
            						       <option value="IT Software - Developer">IT Software - Developer </option>
            						       <option value="Manufacturer">Manufacturer</option>
            						       <option value="Exporter">Exporter</option>
            						  </select>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Attach CV:</label>
            						<div class="">          
            						  <input type="file" class="form-control shadow" name="file" id="jobs_cv" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-12">
            						<label class="control-label">Description:</label>
            						<div class="">          
            						  <textarea class="form-control shadow" rows="3" name="description" id="jobs_description"></textarea>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-12">
            						  <label class="control-label"></label>
            						<div class="">
            						  <button type="submit" class="btn btn-success">Submit</button>
            						</div>
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

<div class="modal fade show" id="14" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h3 class="mb-0">VR E-filing Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            					  <span aria-hidden="true">&times;</span>
            					</button>
            				</div>
            				<form action="<?php echo e(url('e-filing/detail/add')); ?>" method="POST" id="e-FilingForm" enctype="multipart/form-data">
            				    <?php echo csrf_field(); ?> 
            				    <div class="row">
            					<div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">First Name:</label>        
            						  <input type="text" class="form-control shadow" name="first_name" id="e_filing_first_name" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Last Name:</label>        
            						  <input type="text" class="form-control shadow" name="last_name" id="e_filing_last_name" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<div class=""> 
            						<label class="control-label">Email:</label>         
            						  <input type="email" class="form-control shadow" name="email" id="e_filing_email" required>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Mobile No:</label>
            						<div class="">          
            						  <input type="number" class="form-control shadow" name="mobile" id="e_filing_mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            						</div>
            					  </div>
            					  <div id="google_translate_element"></div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">State:</label>
            						<select class="form-control shadow" name="state" id="e_filing_state" state-list>
            						    <option value="">-- Please select --</option>
            						    <?php $__currentLoopData = $allstate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            						      <option value="<?php echo e($state->id); ?>"><?php echo e($state->state_name); ?></option>
            						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            						 </select>
            					  </div>
            					  <div class="form-group col-sm-6">
            						 <label class="control-label">City:</label>
            						 <select class="form-control shadow" name="city" id="e_filing_city" city-list>
            						      <option value="">-- Please select --</option>
            						 </select>
            					  </div>
            					  
            					  <div class="form-group col-sm-6">
            						<label class="control-label" for="purpose">Registration:</label>
            						<div class="">          
            						  <select class="form-control shadow" name="registration" id="e_filing_registration">
            						       <option value=""></option>
            						       <option value="Proprietorship-Registration">Proprietorship Registration</option>
            						       <option value="Partnership-Registration">Partnership Registration </option>
            						       <option value="Limited-Liability-Partnership-Registration">Limited Liability Partnership Registration </option>
            						       <option value="One-Person-Company-Registration">One Person Company Registration</option>
            						       <option value="Private-Limited-Company-Registration">Private Limited Company Registration</option>
            						       <option value="Public-Limited-Company-Registration">Public Limited Company Registration</option>
            						       <option value="Section-8-Company-Registration-NGO">Section-8 Company Registration (NGO)</option>
            						       <option value="Fssai-Registration">Fssai Registration</option>
            						       <option value="Import-Export-Code-Registration">Import Export Code Registration</option>
            						       <option value="Digital-Signature">Digital Signature</option>
            						       <option value="Udyog-Aadhaar-MSME">Udyog Aadhaar/MSME</option>
            						       <option value="Professional-Tax-Registration">Professional Tax Registration</option>
            						  </select>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Proprietorship-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Proprietorship-Registration]">
            						      <option value=""></option>
            						      <option value="MSME Registration">MSME Registration</option>
            						      <option value="GST Registration">GST Registration</option>
            						      <option value="Eway bill Login creation">Eway bill Login creation</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Partnership-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Partnership-Registration]">
            						      <option value=""></option>
            						      <option value="Partnersheep Deed Drafting">Partnersheep Deed Drafting</option>
            						      <option value="GST Registration">GST Registration</option>
            						      <option value="MSME registration">MSME registration</option>
            						      <option value="Eway bill Login creation">Eway bill Login creation</option>
            						      <option value="PAN card">PAN card</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Limited-Liability-Partnership-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Limited-Liability-Partnership-Registration]">
            						      <option value=""></option>
            						      <option value="LLP Registration">LLP Registration</option>
            						      <option value="2 DIN">2 DIN</option>
            						      <option value="2 DSC">2 DSC</option>
            						      <option value="LLP Deed Drafting">LLP Deed Drafting</option>
            						      <option value="1 RUN name approval">1 RUN name approval</option>
            						      <option value="GST registration">GST registration</option>
            						      <option value="PAN Card">PAN Card</option>
            						      <option value="TAN Card">TAN Card</option>
            						  </select>
            					  </div>
            					   <div class="form-group col-sm-6 Detail-Services" id="One-Person-Company-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[One-Person-Company-Registration]">
            						      <option value=""></option>
            						      <option value="One Person Company Registration">One Person Company Registration</option>
            						      <option value="2 DIN">2 DIN</option>
            						      <option value="2 DSC">2 DSC</option>
            						      <option value="1 Lacs Authorisation Capital">1 Lacs Authorisation Capital</option>
            						      <option value="Incorporation fees">Incorporation fees</option>
            						      <option value="MOA, AOA drafting">MOA, AOA drafting</option>
            						      <option value="Incorporation certificate">Incorporation certificate</option>
            						      <option value="ICICI Bank Zero-Balance Current Account, Share certificates,
Commencement of business certificate">ICICI Bank Zero-Balance Current Account, Share certificates,
Commencement of business certificate</option>
            						      <option value="ESI, EPF Registration">ESI, EPF Registration</option>
            						      <option value="1 RUN name approval">1 RUN name approval</option>
            						      <option value="GST registration">GST registration</option>
            						      <option value="PAN Card">PAN Card</option>
            						      <option value="TAN Card">TAN Card</option>
            						  </select>
            					  </div>
            					   <div class="form-group col-sm-6 Detail-Services" id="Private-Limited-Company-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Private-Limited-Company-Registration]">
            						      <option value=""></option>
            						      <option value="Private Limited Company Registration">Private Limited Company Registration</option>
            						      <option value="2 DIN">2 DIN</option>
            						      <option value="2 DSC">2 DSC</option>
            						      <option value="10 Lacs Authorisation Capital">10 Lacs Authorisation Capital</option>
            						      <option value="Incorporation fees">Incorporation fees</option>
            						      <option value="MOA, AOA drafting">MOA, AOA drafting</option>
            						      <option value="Incorporation certificate">Incorporation certificate</option>
            						      <option value="ICICI Bank Zero-Balance Current Account, Share certificates,
Commencement of business certificate">ICICI Bank Zero-Balance Current Account, Share certificates,
Commencement of business certificate</option>
            						      <option value="ESI, EPF Registration">ESI, EPF Registration</option>
            						      <option value="1 RUN name approval">1 RUN name approval</option>
            						      <option value="GST registration">GST registration</option>
            						      <option value="PAN Card">PAN Card</option>
            						      <option value="TAN Card">TAN Card</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Public-Limited-Company-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Public-Limited-Company-Registration]">
            						      <option value=""></option>
            						      <option value="Private Limited Company Registration">Private Limited Company Registration</option>
            						      <option value="3 DIN">3 DIN</option>
            						      <option value="3 DSC">3 DSC</option>
            						      <option value="10 Lacs Authorisation Capital">10 Lacs Authorisation Capital</option>
            						      <option value="Incorporation fees">Incorporation fees</option>
            						      <option value="MOA, AOA drafting">MOA, AOA drafting</option>
            						      <option value="Incorporation certificate">Incorporation certificate</option>
            						      <option value="ICICI Bank Zero-Balance Current Account, Share certificates">ICICI Bank Zero-Balance Current Account, Share certificates</option>
            						      <option value="ESI, EPF Registration">ESI, EPF Registration</option>
            						      <option value="1 RUN name approval">1 RUN name approval</option>
            						      <option value="GST registration">GST registration</option>
            						      <option value="PAN Card">PAN Card</option>
            						      <option value="TAN Card">TAN Card</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Section-8-Company-Registration-NGO">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Section-8-Company-Registration-NGO]">
            						      <option value=""></option>
            						      <option value="Company Registration">Company Registration</option>
            						      <option value="2 DIN">2 DIN</option>
            						      <option value="2 DSC">2 DSC</option>
            						      <option value="Incorporation fees">Incorporation fees</option>
            						      <option value="MOA, AOA drafting">MOA, AOA drafting</option>
            						      <option value="Incorporation certificate">Incorporation certificate</option>
            						      <option value="ICICI Bank Zero-Balance Current Account">ICICI Bank Zero-Balance Current Account</option>
            						      <option value="ESI, EPF Registration">ESI, EPF Registration</option>
            						      <option value="1 RUN name approval">1 RUN name approval</option>
            						      <option value="GST registration">GST registration</option>
            						      <option value="PAN Card">PAN Card</option>
            						      <option value="TAN Card">TAN Card</option>
            						  </select>
            					  </div>
            					   <div class="form-group col-sm-6 Detail-Services" id="Fssai-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Fssai-Registration]">
            						      <option value=""></option>
            						      <option value="Fssai Registration Certificate">Fssai Registration Certificate</option>
            						  </select>
            					  </div>
            					   <div class="form-group col-sm-6 Detail-Services" id="Import-Export-Code-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Import-Export-Code-Registration]">
            						      <option value=""></option>
            						      <option value="Import Export Code Registration">Import Export Code Registration</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Digital-Signature">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Digital-Signature]">
            						      <option value=""></option>
            						      <option value="Class 2 (For 2 Year validity)">Class 2 (For 2 Year validity)</option>
            						      <option value="Class 2 (For 3 Year validity)">Class 2 (For 3 Year validity)</option>
            						      <option value="Class 3 (For 2 Year validity)">Class 3 (For 2 Year validity)</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Udyog-Aadhaar-MSME">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Udyog-Aadhaar-MSME]">
            						      <option value=""></option>
            						      <option value="Udyog Aadhaar/MSME Registration">Udyog Aadhaar/MSME Registration</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-6 Detail-Services" id="Professional-Tax-Registration">
            						<label class="control-label">Detail of Services:</label>
            						<select class="form-control shadow" name="detail_services[Professional-Tax-Registration]">
            						      <option value=""></option>
            						      <option value="Professional Tax Registration">Professional Tax Registration</option>
            						  </select>
            					  </div>
            					  <div class="form-group col-sm-12">
            						<label class="control-label">Description:</label>
            						<div class="">          
            						  <textarea class="form-control shadow" rows="3" name="description" id="e_filing_description"></textarea>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-12">
            						  <label class="control-label"></label>
            						<div class="">
            						  <button type="submit" class="btn btn-success">Submit</button>
            						</div>
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

<style>
    .Detail-Services{
        display:none;
    }
</style>
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
</script>


<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "Busines World Trade Pvt. Ltd.",
 "url" : "https://www.businesworldtrade.com/",
 "sameAs" : [
   "https://www.facebook.com/infobizbusinessworldtrade/",
   "https://www.linkedin.com/in/businessworldtrade/", 
   "https://www.instagram.com/businessworldtrade/"
   ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "4th Floor Sharma Market, Above PNB Bank",
    "addressRegion": "Sector 51, Noida, Uttar Pradesh",
    "postalCode": "201301",
    "addressCountry": "India"
  }
}
</script>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6HJZRS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php /**PATH /home/a0yq2z3dupoj/public_html/my/resources/views/footer.blade.php ENDPATH**/ ?>