<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Business Loan Contact- <?php echo e($allsettings->site_title); ?></title>

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
                      <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>">
                    </a>
                    <?php endif; ?>
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/lending/business-loan">Home</a>
                        </li>
						<li>
                            <a href="<?php echo e(url('/')); ?>/lending/business-loan#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/lending/contact-loan">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:<?php echo e($allsettings->office_phone); ?>"><?php echo e($allsettings->office_phone); ?></a></span>
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
				<h5>Infobiz world trade Pvt. Ltd.</h5>
				<p><?php echo $allsettings->office_address; ?></p>
				<p>CONTACT NUMBER: +91-<?php echo e($allsettings->office_phone); ?></p>
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
            <strong>TO KNOW MORE ABOUT Infobiz world trade BUSINESS LOAN</strong>
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
                            <a href="<?php echo e(url('/')); ?>/lending/business-loan#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/lending/contact-loan">Contact us</a>
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
                      <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>">
                    </a>
                    <?php endif; ?>	
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
<?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/lending/contact-loan.blade.php ENDPATH**/ ?>