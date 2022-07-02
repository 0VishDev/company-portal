<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
    <title>E Filing- <?php echo e($allsettings->site_title); ?></title>

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
                            <a href="<?php echo e(url('/')); ?>/lending/e-filing">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:<?php echo e($allsettings->office_phone); ?>"><?php echo e($allsettings->office_phone); ?></a></span>
                        </li>
                    </ul>
				</div>
            </div> 
        </div>
    </div>
	
	<div class="banner-area e-filing">
                <div class="banner-content">
					<h1>E-Filing for all the  <span style="color:#39a6ea;">Manufacturers,</span> Exporter, <span style="color:#39a6ea;">Importer,</span> Traders, <span style="color:#39a6ea;"> Supplier,</span> and Retailer.</span></h1>
					<p>Quick, convenient, low cost</p>
                </div>
            </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>About Us</h2>
		<div class="container">
			<div class="mb-3">
				<h5>Business World Trade offers E-filing services to individuals, businesses, and organizations in India. E-filing is now made more secure and convenient with Business World Trade. One can easily e-file income tax returns from salary, business, house property, and income from other sources. Besides, you file a TDS return, create form-16, and use the Tax calculator, claim HRA, review refund status, and form rent slips for Income Tax Filing. We are among the fastest e-filer in the market that provides a safe and secure e-filing service. From PAN, GST to Income Tax return, we have all the services in our pocket. We provide all the basic facilities that are required to run a legal business. </h5>
			</div>
			</div>
        </div>
    </div>
	<div class="about-section" id="">
        <div class="container-fluid">
            <h2>We have e-filing services for all SMEs and MSMEs.</h2>
            <p>As we are a 360-degree portal, we also provide all the services including e-filing for Small and Medium Enterprises (SMEs) and Micro, Small, and Medium Enterprises (MSMEs) at an affordable rate.</p>
		</div>
	</div>
    <div class="benefit-section process-section-main">
        <div class="container-fluid">
            <h3>Business World Trade E- filing service includes the following.</h3>
            <ul>
                <li class="">Proprietorship Registration  </li>
                <li class="">Partnership Registration</li>
                <li class="">Limited Liability Partnership Registration</li>
                <li class="">One Person Company Registration</li>
                <li class="">Private Limited Company Registration</li>
                <li class="">Public Limited Company Registration </li>
                <li class="">Section - 8 Company Registrations (NGO)</li>
                <li class="">FSSAI Registration</li>
                <li class="">Import Export Code Registration</li>
                <li class="">Digital Signature </li>
                <li class="">Udyog Adhaar Registration / MSME </li>
                <li class="">Professional Tax Registration</li>
            </ul>
        </div>
    </div>
	<div class="about-section" id="contact">
        <div class="container-fluid">
            <h2>E-FILING FORM</h2>
		<div class="container">
			<div class="formBox shadow">  
			
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
            						      <option value="ICICI Bank Zero-Balance Current Account, Share certificates, Commencement of business certificate">ICICI Bank Zero-Balance Current Account, Share certificates, Commencement of business certificate</option>
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
            						      <option value="ICICI Bank Zero-Balance Current Account, Share certificates, Commencement of business certificate">ICICI Bank Zero-Balance Current Account, Share certificates, Commencement of business certificate</option>
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
	
    <div class="know-more-section">
        <div class="container-fluid">
            <strong>TO KNOW MORE ABOUT Business World Trade E-FILING</strong>
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
        
        $('[state-list]').change(function () {
            var stateId = $(this).val();
            $('[city-list]').empty();
        
            var base_path = "<?php echo e(url('/')); ?>";
            console.log(base_path);
            $.ajax({
              type:"POST",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: base_path+'/cities/get',
              data : {'state_id': stateId},
              success:function(data){
                if(data.cities.length > 0){
                  $.each(data.cities, function( k, v ) {
                    var option = '<option value="'+v.id+'">'+v.city_name+'</option>';
                    $('[city-list]').append(option);
                  });
                }
              }
            });
        });
</script>
<script>
    $(function() {
  $('#e_filing_registration').change(function(){
    $('.Detail-Services').hide();
    $('#' + $(this).val()).show();
  });
});
</script>
</body>
</html>
<?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/lending/e-filing.blade.php ENDPATH**/ ?>