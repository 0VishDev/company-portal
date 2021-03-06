<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>ISO Certification</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.venicered.com/resources/views/template/css/bootstrap.min.css">
	<link rel="shortcut icon" href="https://www.venicered.com/public/storage/settings/1594989826.png">
	<link rel="stylesheet" href="<?php echo e(asset('public/css/notifyme.css')); ?>">
</head>
<body>
    <div class="header-main">
        <div class="container-fluid">
            <div class="header clearfix">
                <div class="logo-section">
                    <a href="/index">
                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/159792035911.png" alt="Venice Red">
                    </a>
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="/venicered-lending/iso-certification">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="/venicered-lending/contact-iso">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:7703866612">7703866612</a></span>
                        </li>
                    </ul>
				</div>
            </div> 
        </div>
    </div>
	
	<div class="banner-area iso-bg">
                <div class="banner-content">
					<h1><span style="color:#ff1d25;">ISO</span> Certification for Product <span style="color:#ff1d25;">Saftey</span></h1>
					<p>Quality, Consistency, Saftey</p>
                </div>
            </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>About Us</h2>
		<div class="container">
			<div class="mb-3">
				<h5>ISO certification certifies that a management system, manufacturing process, service, or documentation procedure has all the requirements for standardization and quality assurance. ... ISO standards are in place to ensure consistency. Each certification has separate standards and criteria and is classified numerically.</h5>
			</div>
		</div>
        </div>
    </div>
	<div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>Venice Red Provides Secure ISO Certification For All SMEs, MSMEs and service provider</h2>
		</div>
	</div>
    <div class="process-section-main" id="iso-benifit">
        <div class="container">
            <h3>BENEFITS</h3>
            <div class="row">
			<div class="col-sm-6 mb-2">
				<ol type="1" start="1">
				<li>IMPROVES YOUR WORKING SYSTEM</li>
				<li> ISO CERTIFICTION REDUCES YOUR  BUSINESS LOSSES</li>
				<li>ISO CERTIFIATION IS VERY HELP FULL IN GETTING OVERSEAS BUSINESS</li>
				</ol>
				</div>
				<div class="col-sm-6 mb-2">
				<ol type="1" start="4">
				<li>ISO CERTIFIATION IS REQUIRED IN DIFFERENT GOVERNMENT AND PRIVATE TENDERS.</li>
				<li>ISO CERTIFIATION IMROVES CORPORATE AND SOCIAL IMAGE OF YOUR ORGANIZATION </li>
				<li>ISO CERTIFICATEION IMPROVED CUSTOMER  RETENTION AND ACQUISITION </li>
				</ol>
				</div>
			</div>
        </div>
    </div>
    <div class="benefit-section">
        <div class="container-fluid">
            <h3>DOCUMENTATION REQUIRED </h3>
			<p>You must provide the relevant information related to documents required for ISO Certification.</p>
            <ul>
                <li class="">COMPANY REGISTRATION  DETAILS</li>
                <li class="">GST NUMBER </li>
                <li class="">PAN CARD NUMBER </li>
                <li class="">CURRENT SELL PURCHASE INVOICE BILL</li>
                <li class="">PROOF OF CONTINUITY OF BUSINESS</li>
            </ul>
        </div>
    </div>
	<div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>ISO Certification FORM</h2>
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
                
				<form action="<?php echo e(url('iso-certification/add')); ?>" method="POST">
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
								<div class="inputText">PAN</div>
								<input type="text" class="input" id="pan_no" name="pan_no">
                                <?php if($errors->has('pan_card')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('pan_card')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Certification Required</div>
								<select class="input" id="certification_required" name="certification_required" required>
                                    <option value=""></option>
                                    <option value="ISO 9001:2015">ISO 9001:2015</option>
                                    <option value="ISO 14001:2015">ISO 14001:2015</option>
                                    <option value="OHAS 18001">OHAS 18001</option>
                                    <option value="ISO 22000:2018">ISO 22000:2018</option>
                                    <option value="ISO 27001:2013">ISO 27001:2013</option>
                                    <option value="ISO 13485:2016">ISO 13485:2016</option>
                                    <option value="ISO 45001: 2018">ISO 45001: 2018</option>
                                </select>
							</div>
						</div>	
				
				        <div class="col-sm-6">
							<div class="inputBox">
								<input type="checkbox" name="isAgree" id="isAgree" required> I accept the terma and condition of VeniceRed</span>
							</div>
						</div>
						
						<div class="col-sm-6 text-center">
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
            <strong>TO KNOW MORE ABOUT VENICERED ISO Certification </strong>
            <ul>
                <li>
                    <a href="tel:7703866612">7703866612</a>
                </li>
                <li>
                <a href="mailto:iso@venicered.com">ISO@VENICERED.COM</a>
                </li>
            </ul>
        </div>
    </div>
   <div class="footer">
        <div class="container-fluid clearfix">
            <div class="left-section">
                <div class="social-section">
                    <ul>
                        <li>
                            <strong>Find Us</strong>
                        </li>
                        <li>
                            <a href="#" target="_blank"  alt="Venice Red on Facebook">
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/fb.png">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" alt="Venice Red on Twitter" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/twitter.jpg">
                            </a>
                        </li>
                        <li>
                             <a href="#" target="_blank" alt="Venice Red on
                             LinkedIn" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/linkedin.jpg">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="other-links">
                    <ul>
                        <li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="/venicered-lending/contact">Contact us</a>
                        </li>
                        <li>
                            <a href="#">Terms and Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-section">
                    <span>Copyright ?? 2020. All rights reserved.</span>
                </div>
            </div>
            <div class="right-section">
				<a href="#">
    	            <img src="<?php echo e(url('/')); ?>/public/storage/settings/159792035911.png" alt="Venice Red">
				</a>	
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
<?php /**PATH /home/inforrmz/venicered.com/resources/views/venicered-lending/iso-certification.blade.php ENDPATH**/ ?>