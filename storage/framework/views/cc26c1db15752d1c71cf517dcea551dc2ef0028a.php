<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Business Insurance- <?php echo e($allsettings->site_title); ?></title>

<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo e(url('/')); ?>/resources/views/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo e(asset('public/css/notifyme.css')); ?>">
</head>
<body>
    <div class="header-main">
        <div class="container-fluid">
            <div class="header clearfix">
                <div class="logo-section">
                     <?php if($allsettings->site_logo != ''): ?>
        <a href="<?php echo e(URL::to('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"
            alt="<?php echo e($allsettings->site_title); ?>">
        </a>
        <?php endif; ?>
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/lending/business-insurance">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/lending/contact-insurance">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:<?php echo e($allsettings->office_phone); ?>"><?php echo e($allsettings->office_phone); ?></a></span>
                        </li>
                    </ul>
				</div>
            </div> 
        </div>
    </div>
	
	<div class="banner-area busin-insur">
                <div class="banner-content">
					<h1>Business <span style="color:#39a6ea;">Insurance</span> for Financial <span style="color:#39a6ea;">Protection</span></h1>
					<p>Protection, Coverege, Growth</p>
                </div>
            </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>About Us</h2>
		<div class="container">
			<div class="mb-3">
				<h5>Protection against loss for which you pay a certain sum periodically in exchange for a guarantee that you'll be compensated under stipulated conditions for any specified loss by fire, accident, death, etc.</h5>
			</div>
		</div>
        </div>
    </div>
	<div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>Business world trade Secure Business Insurance For All SMEs, MSMEs</h2>
		</div>
	</div>
    <div class="process-section-main" id="processSection">
        <div class="container">
            <h3>BENEFITS</h3>
            <div class="row">
			<div class="col-sm-4 mb-2">
				<div class="benifit">
				<p><i class="fa fa-shield" aria-hidden="true"></i></p>
					<h4>PROTECTION</h4>
					<p>Business insurance coverage protects businesses from losses.
					</p>
				</div>
				</div>
				<div class="col-sm-4 mb-2">
				<div class="benifit">
				<p><i class="fa fa-recycle" aria-hidden="true"></i></p>
					<h4>RISK COVERAGE</h4>
					<p>Risk insurance coverage for damages and Financial crisis.
					</p>
				</div>
				</div>
				<div class="col-sm-4 mb-2">
				<div class="benifit">
				<p><i class="fa fa-line-chart" aria-hidden="true"></i></p>
					<h4>BUSINESS GROWTH</h4>
					<p>Business Insurance protect your business from unexpected risk and provide a safety shield to your business and company.
					</p>
				</div>
				</div>
			</div>
        </div>
    </div>
    <div class="benefit-section">
        <div class="container-fluid">
            <h3>DOCUMENTATION REQUIRED </h3>
			<p>You must provide the relevant information related to documents required for business insurance.</p>
            <ul>
                <li class="">ID PROOF </li>
                <li class="">ADDRESS PROOF</li>
                <li class="">BANK STATEMENTS OF 6 MONTHS.</li>
                <li class="">Existing insurance policies Details </li>
                <li class="">Business registration and incorporation documents</li>
                <li class="">Record of Business Assets and Liabilities</li>
            </ul>
        </div>
    </div>
	<div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>BUSINESS LOAN FORM</h2>
		<div class="container">
			<div class="formBox shadow">
			    <?php if(session('success')): ?>
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

				 <form action="<?php echo e(url('business-insuarance/add')); ?>" method="POST">
		            <?php echo csrf_field(); ?>
		            
					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">First Name</div>
								<input type="text" class="input" id="first_name" name="first_name" required>
                                <?php if($errors->has('first_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">Last Name</div>
								<input type="text" class="input" id="last_name" name="last_name" required>
                                <?php if($errors->has('last_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Email Id</div>
								<input type="email" class="input" id="email" name="email" required>
                                <?php if($errors->has('email')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Mobile Number</div>
								<input type="text" class="input" id="mobile" name="mobile"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                <?php if($errors->has('mobile')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('mobile')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Business Name</div>
								<input type="text" class="input" id="business_name" name="business_name">
                                <?php if($errors->has('business_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('business_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
					
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Nature Of Business</div>
								<select class="input" id="nature_business" name="nature_business">
                                    <option value=""></option>
                                    <option value="MANUFACTURER">MANUFACTURER</option>
                                    <option value="WHOLESALER/TRADER">WHOLESALER/TRADER</option>
                                    <option value="SUPPLIER/DISTRIBUTOR">SUPPLIER/DISTRIBUTOR</option>
                                    <option value="RETAILER">RETAILER</option>
                                </select>
                                <?php if($errors->has('nature_business')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('nature_business')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
				
				        <div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">City</div>
								<input type="text" class="input" id="city" name="city" required>
                                <?php if($errors->has('city')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('city')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Type Of Insurance</div>
								<select class="input" id="insurance_type" name="insurance_type" required>
                                    <option value=""></option>
                                    <option value="Home-BASED BUSINESSES INSURANCE">Home-BASED BUSINESSES INSURANCE</option>
                                    <option value="PRODUCT LIABILITY INSURANCE">PRODUCT LIABILITY INSURANCE</option>
                                    <option value="VEHICLE INSURANCE">VEHICLE INSURANCE</option>
                                    <option value="WORKERS'COMPENSATION INSURANCE">WORKERS'COMPENSATION INSURANCE</option>
                                    <option value="BUSINESS INTERRUPTION INSURANCE">BUSINESS INTERRUPTION INSURANCE</option>
                                    <option value="PROPERTY INSURANCE">PROPERTY INSURANCE</option>
                                    <option value="PROFESSIONAL LIABILITY INSURANCE">PROFESSIONAL LIABILITY INSURANCE</option>
                                    <option value="OTHER INSURANCE">OTHER INSURANCE</option>
                                </select>
                                <?php if($errors->has('nature_business')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('nature_business')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
				        <div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">GST</div>
							    <select class="input" id="gst" name="gst">
							        <option value=""></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <?php if($errors->has('gst')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('gst')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
				        <div class="col-sm-6">
							<div class="inputBox">
								<input type="checkbox" name="isAgree" id="isAgree" required><span class="check-busi"> I accept the terma and condition of Business world trade</span>
							</div>
						</div>
						<div class="col-sm-12 text-center">
							<input type="submit" name="" class="button btn btn-lg" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
	
    <div class="know-more-section">
        <div class="container-fluid">
            <strong>TO KNOW MORE ABOUT Business world trade BUSINESS INSURANCE </strong>
            <ul>
                <li>
                    <a href="tel:<?php echo e($allsettings->office_phone); ?>"><?php echo e($allsettings->office_phone); ?></a>
                </li>
                <li>
                <a href="mailto:<?php echo e($allsettings->office_email); ?>"><?php echo e($allsettings->office_email); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <div class="container-fluid clearfix">
            <div class="left-section">
                <div class="social-section">
						    <ul>
						        <li class="title mr-2"><?php echo e(Helper::translation(2022,$translate)); ?></li>
                               <?php if($allsettings->facebook_url != ''): ?>
                                <li class="title mr-2">
                                    <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                        <img src="<?php echo e(url('/')); ?>/public/img/facebook.png" alt="facebook">
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->instagram_url != ''): ?>
                                <li class="title mr-2">
                                    <a href="<?php echo e($allsettings->instagram_url); ?>" target="_blank">
                                        <img src="<?php echo e(url('/')); ?>/public/img/instagram.png" alt="instagram">
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->twitter_url != ''): ?>
                                <li class="title mr-2">
                                    <a href="<?php echo e($allsettings->twitter_url); ?>" target="_blank">
                                        <img src="<?php echo e(url('/')); ?>/public/img/twitter.png" alt="twitter">
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->gplus_url != ''): ?>
                                <li class="title mr-2">
                                    <a href="<?php echo e($allsettings->gplus_url); ?>" target="_blank">
                                        <img src="<?php echo e(url('/')); ?>/public/img/linklen.png" alt="linklen">
                                    </a>
                                </li>
                                <?php endif; ?>
                                
                                
                            </ul>
                </div>
                <div class="other-links">
                    <ul>
                        <li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/lending/contact">Contact us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/page/Terms-and-Conditions">Terms and Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-section">
                    <span>Copyright © 2020. All rights reserved.</span>
                </div>
            </div>
            <div class="right-section">
				<?php if($allsettings->site_logo != ''): ?>
        <a href="<?php echo e(URL::to('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"
            alt="<?php echo e($allsettings->site_title); ?>">
        </a>
        <?php endif; ?>	
            </div>
        </div>
    </div>
	<script src="<?php echo e(asset('public/js/notifyme.js')); ?>"></script>

    <script type="text/javascript">
        <?php if(session('success')): ?>
            notifyme.config({
                showtime: 4000,
                position:"topright" // topleft, bottomleft, bottmright
            });
        
            notifyme.create({
                title: "<?php echo e(session('success')); ?>",
			    text: "",
			    type: "success"
            });
        <?php endif; ?>
        
        <?php if(session('error')): ?>
            notifyme.config({
                showtime: 4000,
                position:"topright" // topleft, bottomleft, bottmright
            });
            
            notifyme.create({
               title: "<?php echo e(session('error')); ?>",
			   text: "",
			   type: "error"
            });
        <?php endif; ?>
        
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
</body>
</html>
<?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/lending/business-insurance.blade.php ENDPATH**/ ?>