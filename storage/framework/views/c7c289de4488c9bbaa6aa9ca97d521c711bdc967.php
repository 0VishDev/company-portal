<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Business Loan</title>
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
                    <a href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/159792035911.png" alt="Venice Red">
                    </a>
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/business-loan">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/contact-loan">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:7703866612">7703866612</a></span>
                        </li>
                    </ul>
				</div>
            </div> 
        </div>
    </div>
	
	<div class="banner-area busin-loan">
                <div class="banner-content">
					<h1>Business <span style="color:#ff1d25;">Loan</span> for Business <span style="color:#ff1d25;">Growth</span></h1>
					<p>Fast, Valuable, Collateral Free</p>
                </div>
            </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>About Us</h2>
		<div class="container">
			<div class="mb-3">
				<h5><b>Business loans</b> is a loan specifically intended for business purposes. The primary aim of these is to support the urgent needs of your growing <b>business</b>. Most financial institutions offer term <b>loans</b> and flexi <b>loans</b> to cater to the <b>business</b> needs of a <b>Company</b>.</h5>
			</div>
			<h4>WHY NEED BUSINESS LOAN:</h4>
			<h5>To Increase Working  Growth: Small businesses may take out a loan to satisfy operational costs until their earnings reach a certain volume.</h5>
		</div>
        </div>
    </div>
	<div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>Venice Red Secure Business Loans For SMEs, MSMEs</h2>
		</div>
	</div>
    <div class="process-section-main" id="processSection">
        <div class="container">
            <h3>BENEFITS</h3>
            <div class="row">
			<div class="col-sm-4 mb-2">
				<div class="benifit">
				<p><i class="fa fa-bar-chart" aria-hidden="true"></i></p>
					<h4>FLEXI LOAN </h4>
					<p>Withdraw Money when you need, We will Identify a single account manager who can best fulfill your Requirement.
					</p>
				</div>
				</div>
				<div class="col-sm-4 mb-2">
				<div class="benifit">
				<p><i class="fa fa-asterisk" aria-hidden="true"></i></p>
					<h4>QUICK DISBURSAL </h4>
					<p>Instant Approval. Loan amount will be credited to your account after the Documentation collection.
					</p>
				</div>
				</div>
				<div class="col-sm-4 mb-2">
				<div class="benifit">
				<p><i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i></p>
					<h4>COLLATERAL FREE LOAN </h4>
					<p>You do not need to pledge and collateral to avail Financing.
					</p>
				</div>
				</div>
			</div>
        </div>
    </div>
    <div class="benefit-section">
        <div class="container-fluid">
            <h3>DOCUMENTATION REQUIRED </h3>
			<p>You must provide the relevant information related to documents required for business loan.</p>
            <ul>
                <li class="">ID PROOF </li>
                <li class="">ADDRESS PROOF</li>
                <li class="">BANK STATEMENTS OF 6 MONTHS.</li>
                <li class="">LATEST ITR OF CO-APPLICANTS FOR LAST TWO YEARS.</li>
                <li class="">ITR & STATEMENT OF COMPUTATION OF INCOME - FOR LAST TWO YEARS.</li>
                <li class="">COMPLETE TWO YEARS  FINENCIAL SET (FOR LOANS>15 LAKHS)</li>
                <li class="">PROOF OF CONTINUITY OF BUSINESS </li>
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
                
				<form action="<?php echo e(url('business-loan/add')); ?>" method="POST">
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
								<div class="inputText">Type of Business</div>
								<select class="input" id="business_type" name="business_type" required>
                                    <option value=""></option>
                                    <option value="PVT. LTD. COMPANY">PVT. LTD. COMPANY</option>
                                    <option value="SOLE PROPRIETORSHIP">SOLE PROPRIETORSHIP</option>
                                    <option value="PARTNERSHIP">PARTNERSHIP</option>
                                    <option value="OTHER">OTHER</option>
                                </select>
                                <?php if($errors->has('business_type')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('business_type')); ?></strong>
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
								<div class="inputText">Loan Amount</div>
							    <select class="input" id="loan_amount" name="loan_amount">
							        <option value=""></option>
                                    <option value="2 Lakh - 5 Lakh">2 Lakh  -  5 Lakh</option>
                                    <option value="5 Lakh - 10 Lakh">5 Lakh - 10 Lakh</option>
                                    <option value="10 Lakh - 20 Lakh">10 Lakh - 20 Lakh</option>
                                    <option value="20 Lakh - 30 Lakh">20 Lakh - 30 Lakh</option>
                                    <option value="30 Lakh - 50 Lakh">30 Lakh - 50 Lakh</option>
                                    <option value=" 50 Lakh - 1Cr"> 50 Lakh - 1Cr</option>
                                    <option value="1Cr And Above">1Cr And Above</option>
                                </select>
                                <?php if($errors->has('loan_amount')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('loan_amount')); ?></strong>
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
								<div class="inputText">Loan Tenure</div>
								<select class="input" id="loan_tenure" name="loan_tenure">
								    <option value=""></option>
                                    <option value="1 YEAR">1 YEAR</option>
                                    <option value="2 YEAR">2 YEAR</option>
                                    <option value="3 YEAR">3 YEAR</option>
                                    <option value="4 YEAR">4 YEAR</option>
                                    <option value="5 YEAR">5 YEAR</option>
                                </select>
                                <?php if($errors->has('loan_tenure')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('loan_tenure')); ?></strong>
                                  </span>
                                <?php endif; ?>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox">
								<input type="checkbox" name="isAgree" id="isAgree" required> I accept the terma and condition of VeniceRed</span>
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
            <strong>TO KNOW MORE ABOUT VENICERED BUSINESS LOAN</strong>
            <ul>
                <li>
                    <a href="tel:7703866612">7703866612</a>
                </li>
                <li>
                <a href="mailto:info@venicered.com">info@venicered.com</a>
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
                            <a href="https://www.facebook.com/veniceredindia" target="_blank"  alt="Venice Red on Facebook">
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/fb.png">
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/veniceredindia" target="_blank" alt="Venice Red on Twitter" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/twitter.jpg">
                            </a>
                        </li>
                        <li>
                             <a href="https://www.linkedin.com/in/venice-red-753a951b4/" target="_blank" alt="Venice Red on
                             LinkedIn" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/linkedin.jpg">
                            </a>
                        </li>
                        <li>
                             <a href="https://www.instagram.com/veniceredindia/" target="_blank" alt="Venice Red on
                             Instagram" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/instagram.png">
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
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/contact">Contact us</a>
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
				<a href="<?php echo e(url('/')); ?>">
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
<?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/venicered-lending/business-loan.blade.php ENDPATH**/ ?>