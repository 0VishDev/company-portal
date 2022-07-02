<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/export-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Export</title>
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
                    <a href="/">
                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/159792035911.png" alt="Venice Red">
                    </a>
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/index">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact Us</a>
                        </li>
                        <li class="contact-number">
                            <span>7703866612</span>
                        </li>
                    </ul>
				</div>
            </div>
            <div class="banner-area">
                <div class="banner-content">
					<h1>We have perfect financial resolutions for Indian  <span style="color:#ff1d25;">EXPORTERS</span></h1>
                </div>
                <div class="banner-image">
                    <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/export.jpg" alt="Venice Red">
                </div>
            </div>
        </div>
    </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>Zero deposit and security</h2>
			<p class="fa-icon"><i class="fa fa-braille" aria-hidden="true"></i></p>
            <h3>Discounted Bills for Exporters</h3>
			<p>Our lending associates render the short-term term finance to Indian Exporters at zero collateral and security. </p>
			<p>Export bill discounting is a global trade term and practice. Export bill discounting is intended to support businesses faster payment for the goods they have shipped to the buyer. Export bill discounting befalls when a business deals with a buyer for their goods on credit. In international trade, this can be called a letter of credit, and a third-party financing company applies this agreement to determine the export bill discount amount. </p>
			<p>When a business and a buyer consent to the terms of an export contract, their particular financial mediators issue the proper payments when the contract requirements are met. This means initial payment for the exporter issued by their financial delegate, who then collects payment from the buyer’s bank at a succeeding date based on the agreed-upon payment terms. A business is, therefore, entirely able to settle with a buyer and promote the payment process through export bill discounting. With this agreement, the financial agents of the export business and the buyer work together.
</p>
			
			
		<div class="container">
		    <!--<?php if(session('success')): ?>
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>-->
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
			<div class="formBox shadow">
				<form action="<?php echo e(url('savedata')); ?>" method="post">
				     <?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText"> Name </div>
									<input type="text" name="name"   class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Email</div>
									<input type="text" name="email" class="input" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Mobile</div>
									<input type="text" name="mobile" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Company Name</div>
									<input type="text" name="companyname" class="input" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">IEC Number</div>
									<input type="text" name="iecno" class="input" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Products you export</div>
									<input type="text" name="productexport" class="input" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 text-center">
								<input type="submit" name="" class="button btn btn-lg" value="Submit">
							</div>
						</div>
				</form>
			</div>
		</div>
        </div>
    </div>
    <div class="process-section-main" id="processSection">
        <div class="container-fluid">
            <h3>BENEFITS</h3>
            <div class="process-list">
                <div class="process">
                    <div class="content">
                        <span>Zero deposit and security </span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>Credit limit as per exporter demand</span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>80 % bill in the front, quickly after the specific goods get dispatched. </span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>Competing rates (0.7 – 0.9% per month)</span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>Quick approval, least paperwork, convenient.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="know-more-section mt-5" id="contact">
        <div class="container-fluid">
            <strong>TO KNOW MORE ABOUT EXPORT BILL DISCOUNTING</strong>
            <ul>
                <li>
                    <a href="tel:7703866612">7703866612</a>
                </li>
                <li>
                    <a href="mailto:info@venicered.com">Info@venicered.com</a>
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
                            <a href="https://www.facebook.com/veniceredindia" target="_blank">
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/fb.png"  alt="Venice Red on Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/veniceredindia?s=08" target="_blank" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/twitter.jpg" alt="Venice Red on Twitter">
                            </a>
                        </li>
                        <li>
                             <a href="https://www.linkedin.com/in/venice-red-5321121a9" target="_blank" >
                                <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/linkedin.jpg" alt="Venice Red on
                             LinkedIn">
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
                            <a href="#contact">Contact us</a>
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

<div class="notifyme_wrap topright"></div>
<script>
    $(document).ready(function () {
        $(".scroll-btn-section a").click(function () {
            $('html, body').animate({
                scrollTop: $("#aboutSection").offset().top
            }, 1000);
        });
    });

</script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
	 
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
<?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/logistics/export.blade.php ENDPATH**/ ?>