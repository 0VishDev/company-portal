<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Logistics- <?php echo e($allsettings->site_title); ?></title>

<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/resources/views/template/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(url('/')); ?>/resources/views/template/css/bootstrap.css">
<script src="<?php echo e(url('/')); ?>/resources/views/template/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/template/js/bootstrap.js"></script>
<link rel="stylesheet" href="<?php echo e(asset('public/css/notifyme.css')); ?>">
</head>
<body>
    <div class="header-main">
        <div class="container">
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
                            <a href="<?php echo e(url('/')); ?>/logistics">Home</a>
                        </li>
                        <li>
                            <a href="#" data-target="#logistic" data-toggle="modal">Contact Us</a>
                        </li>
                        <li class="contact-number">
                            <a href="tel:<?php echo e($allsettings->office_phone); ?>"><?php echo e($allsettings->office_phone); ?></a>
                        </li>
                    </ul>
				</div>
            </div>
            <div class="banner-area">
                <div class="banner-content">
                    <h3>We connect logistics with your business</h3>
                    <p>We offer a Business World Trade logistics service to fulfill your organization's essentials. By adopting our logistic service, you can spend more time on your loving business. </p>
                    <div class="btn-section">
                        <a href="#" data-target="#logistic" data-toggle="modal">Get an instant online quote</a>
                    </div>
                </div>
                <div class="banner-image">
                    <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/20450.jpg" alt="Business World Trade">
                </div>
            </div>
            <div class="scroll-btn-section">
                <a href="#aboutSection"></a>
            </div>
        </div>
    </div>
    <div class="about-section" id="aboutSection">
        <div class="container">
            <h3>Services for SME<span>s</span> and MSME<span>s</span></h3>
            <p>Business World Trade has always fulfilled its objective of connecting buyers and suppliers for a long time. In growing and developing its business, Business World Trade has partnered with various leading organizations that provide the best delivery services. It is for all the SMEs where they can easily promote the shipment of goods conveniently and efficiently. The clients can look at the quotations from various renowned transportation providers and then choose the one accordingly. Further, customers can access and track the order through GPS technology with a 24/7 customer care executive. We aim to provide fast and secure transportation services and experience to all our clients.</p>
        </div>
    </div>
    <div class="process-section-main" id="processSection">
        <div class="container-fluid">
            <h3>Delivery Made Fast and Secure</h3>
            <div class="process-list">
                <div class="process">
                    <div class="img-section">
                        <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/icon1.png" alt="Business World Trade Process">
                    </div>
                    <div class="content">
                        <span>Post your Consignment</span>
                    </div>
                </div>
                <div class="process">
                    <div class="img-section">
                        <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/icon2.png" alt="Business World Trade Process">
                    </div>
                    <div class="content">
                        <span>Select the best Quotation</span>
                    </div>
                </div>
                <div class="process">
                    <div class="img-section">
                        <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/icon3.png" alt="Business World Trade Process">
                    </div>
                    <div class="content">
                        <span>Make your shipment ready</span>
                    </div>
                </div>
                <div class="process">
                    <div class="img-section">
                        <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/icon4.png" alt="Business World Trade Process">
                    </div>
                    <div class="content">
                        <span>Payment to the agent</span>
                    </div>
                </div>
                <div class="process">
                    <div class="img-section">
                        <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/icon5.png" alt="Business World Trade Process">
                    </div>
                    <div class="content">
                        <span>Shipment on the way</span>
                    </div>
                </div>
                <div class="process">
                    <div class="img-section">
                        <img src="<?php echo e(url('/')); ?>/resources/views/template/logistics/img/icon6.png" alt="Business World Trade Process">
                    </div>
                    <div class="content">
                        <span>Congrats! your shipment is delivered</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="benefit-section">
        <div class="container">
            <h3>Beneficial Services for Customers</h3>
            <ul>
                <li class="list-icon1">The best quotes for your shipment</li>
                <li class="list-icon2">List of top logistics provider</li>
                <li class="list-icon3">Shipment all across the globe</li>
                <li class="list-icon4">Door to Door services</li>
                <li class="list-icon5">Fast and secure</li>
                <li class="list-icon6">Online tracking of shipment </li>
                <li class="list-icon7">24/7 customer care services</li>
                <li class="list-icon8">365 days availability</li>
            </ul>
        </div>
    </div>
    <div class="know-more-section">
        <div class="container">
            <strong>To Know more about Business World Trade Logistics</strong>
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
        <div class="container clearfix">
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
                            <a href="#aboutSection">About</a>
                        </li>
                        <li>
                            <a href="#" data-target="#logistic" data-toggle="modal">Contact us</a>
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



<div class="modal fade" id="logistic" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h3 class="mb-0">Business World Trade logistics Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<form action="<?php echo e(url('logistics/add')); ?>" method="POST" enctype="multipart/form-data" id="logisticsForm">
            				    <?php echo csrf_field(); ?>
            				    
            				    <input type="hidden" class="form-control shadow" name="user_name" id="user_name">
            				    <input type="hidden" class="form-control shadow" name="email" id="email">
            				    <input type="hidden" class="form-control shadow" name="mobile" id="mobile">
            				    
            				    <div class="row">
            				        <div class="form-group col-sm-6">
            						<label class="control-label">Load Type:</label>
            						<select class="form-control shadow load" name="load_type" id="load_type" required>
            						      <option value="">-- Please select --</option>
            						      <option value="Less than Truckload(LTL)">Less than Truckload(LTL)</option>
            						      <option value="Full Truckload(FTL)">Full Truckload(FTL)</option>
            						 </select>
            					  </div>
            				    <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Expected Value of Shipment (in Rs.):</label>        
            						  <input type="number" class="form-control shadow" name="shipment_price" id="shipment_price">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Pickup Date & Time:</label>        
            						  <input type="datetime-local" class="form-control shadow" name="pickup_date" id="pickup_date">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<div class=""> 
            						<label class="control-label">Pickup Pincode:</label>         
            						  <input type="number" class="form-control shadow" name="pickup_pincode" id="pickup_pincode">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Delivery Pincode:</label>
            						<div class="">          
            						  <input type="number" class="form-control shadow" name="delivery_code" id="delivery_code">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Pickup Address:</label>
            						<div class="">          
            						  <textarea class="form-control shadow" row="4" id="pickup_addrress" name="pickup_address"></textarea>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Delivery Address:</label>
            						<div class="">          
            						  <textarea class="form-control shadow" row="4" id="delivery_address" name="delivery_address"></textarea>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Weight (Kgs, Tons):</label>
            						<div class="row"> 
            						<div class="col-sm-8">
            						  <input type="number" class="form-control shadow" name="weight" id="weight">
            						  </div>
            						  <div class="col-sm-4">
            						  <select class="form-control shadow kgs" id="weight_type" name="weight_type">
            						      <option value="">Select</option>
            						      <option value="Kgs">Kgs</option>
            						      <option value="Tons">Tons</option>
            						  </select>
            						  </div>
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Type of material:</label>
            						<div class="">          
            						  <input type="text" class="form-control shadow" name="types_of_material" id="types_of_material">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Product URL:</label>
            						<div class="">          
            						  <input type="url" class="form-control shadow" name="product_url" id="product_url">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						<label class="control-label">Image of shipment:</label>
            						<div class="">          
            						  <input type="file" class="form-control shadow" name="shipment_image" id="shipment_image">
            						</div>
            					  </div>
            					  <div class="form-group col-sm-6">
            						  <label class="control-label"></label>
            						<div class="mt-4 pt-2 float-right">
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

<div class="modal fade" id="logisticUserDetail" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h3 class="mb-0">Business World Trade logistics Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12 con-bg1">
            			<div class="contact-form">
            				<form action="<?php echo e(url('logistics/user-detail/add')); ?>" method="POST" enctype="multipart/form-data" id="userDetailForm">
            				    <?php echo csrf_field(); ?>
            				    
            				    <div class="row">
            				     <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">User Name</label>        
            						  <input type="text" class="form-control shadow" name="user_name" id="logistics_user_name" required>
            						</div>
            					  </div>
            					  
            					  <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Email</label>        
            						  <input type="text" class="form-control shadow" name="email" id="logistics_email" required>
            						</div>
            					  </div>
            					  
            					  <div class="form-group col-sm-6">
            					    <div class="">
            						<label class="control-label">Mobile</label>        
            						  <input type="text" class="form-control shadow" name="mobile" id="logistics_mobile" required>
            						</div>
            					  </div>
            					  
            					  <div class="form-group col-sm-6">
            						  <label class="control-label"></label>
            						<div class="mt-4 pt-2 float-right">
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
        
    $(document).ready(function () {
        $(".scroll-btn-section a").click(function () {
            $('html, body').animate({
                scrollTop: $("#aboutSection").offset().top
            }, 1000);
        });
    });
    
    $('#logisticsForm').submit(function(e){
        e.preventDefault();
        
        $('#logisticUserDetail').modal('show');
    });
    
    $('#userDetailForm').submit(function(e){
        e.preventDefault();
        
        $('#user_name').val($('#logistics_user_name').val());
        $('#email').val($('#logistics_email').val());
        $('#mobile').val($('#logistics_mobile').val());
        
        $('#logisticsForm').unbind().submit();
    });
</script>
</body>
</html>
<?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/logistics/index.blade.php ENDPATH**/ ?>