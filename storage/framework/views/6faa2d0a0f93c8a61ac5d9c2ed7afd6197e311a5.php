<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Venice Red</title>
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
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/business-loan#aboutSection">About Us</a>
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
	
	<div class="banner-area bg-red">
                <div class="banner-content">
					<h1>Contact Us</h1>
                </div>
            </div>
	<div class="container">
			<div class="formBox shadow">
				<h3 class="text-center mb-4">REGISTERED OFFICE </h3>
				<h5>VENICE RED INDIA PVT. LTD.</h5>
				<p>C-125,GROUND FLOOR ,SECTOR 2 NOIDA, </p>
				<p>GAUTAM BUDDHA NAGAR (UP-201301)</p>
				<p>CIN:  U74910UP2020PTC129891</p>
				<p>CONTACT NUMBER: +91-77038-66612</p>
			</div>
		</div>
	<div class="about-section">
        <div class="container-fluid">
		<div class="container">
			<div class="formBox shadow">
				<form action="<?php echo e(url('business-inquiry/add')); ?>" method="POST">
				    <?php echo csrf_field(); ?>
				    <input type="hidden" name="type" id="type" value="ISO-CERTIFICATION">
				    
					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">First Name</div>
								<input type="text" name="first_name" id="first_name" class="input" required>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">Last Name</div>
								<input type="text" name="first_name" id="first_name" class="input" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Email Id</div>
								<input type="email" name="email" id="email" class="input" required>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Mobile Number</div>
								<input type="number" name="mobile" id="mobile" class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Requirement</div>
								<textarea rows="5" id="requirement" name="requirement" class="input"></textarea>
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
            <strong>TO KNOW MORE ABOUT VENICERED BUSINESS LOAN</strong>
            <ul>
                <li>
                    <a href="tel:7703866612">7703866612</a>
                </li>
                <li>
                    <a href="mailto:info@venicered.com">INFO@VENICERED.COM</a>
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
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/business-loan#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/contact-loan">Contact us</a>
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

    <script>
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
	 	});
	 </script>
</body>
</html>
<?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/venicered-lending/contact-loan.blade.php ENDPATH**/ ?>