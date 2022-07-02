<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/lending-style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="<?php echo e(url('/')); ?>/resources/views/template/logistics/css/jquery.min.js"></script>
    <title>VR Jobs</title>
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
                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/160439769811.png" alt="Venice Red">
                    </a>
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="<?php echo e(url('/')); ?>/venicered-lending/jobs">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:7703866612">7703866612</a></span>
                        </li>
                    </ul>
				</div>
            </div> 
        </div>
    </div>
	
	<div class="banner-area jobs">
                <div class="banner-content">
					<h1>We provide highly trained professional workers to <span style="color:#ff1d25;">Manufacturers,</span> Supplier, <span style="color:#ff1d25;">Importer,</span> Exporter, <span style="color:#ff1d25;">and Traders.</h1>
					<p>Highly trained, Skilled, Experienced</p>
                </div>
            </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>About Us</h2>
		<div class="container">
			<div class="mb-3">
				<h5>Being a versatile online B2B portal, we, Venice Red has a service of Jobs in which we bring out the highly skilled and experienced workers for manufacturers, traders, suppliers, exporters, importers, etc. Any organization, firm, or individual looking for workers in any of the fields can connect with us and choose the most appropriate candidate for the job profile. We work as a job counselor and present a suitable candidate for the job role. Our main motto is to connect the suitable candidate for the vacant job post.</h5>
			</div>
			</div>
        </div>
    </div>
	<div class="about-section" id="">
        <div class="container-fluid">
            <h2>We offer Job service to all the organizations, firms, enterprises, companies, groups, etc. </h2>
            <p>Our Job service is for all types of organizations and companies irrespective of any job post. We always tend to bring out the best candidate for a specific job.</p>
		</div>
	</div>
    <div class="benefit-section process-section-main">
        <div class="container-fluid">
            <h3>VENICE RED JOBS SERVICE INCLUDES THE FOLLOWING.</h3>
            <ul>
                <li class="">Beautician</li>
                <li class="">BPO/ Tellecaller</li>
                <li class="">Cashier</li>
                <li class="">Cook / Chef</li>
                <li class="">Data Entry / Back Office</li>
                <li class="">Hospitality Executive</li>
                <li class="">Driver</li>
                <li class="">HR / Admin</li>
                <li class="">IT Hardware and Network Engineer</li>
                <li class="">IT Software - Developer</li>
                <li class="">Manufacturer</li>
                <li class="">Exporter</li>
            </ul>
        </div>
    </div>
	<div class="about-section" id="contact">
        <div class="container-fluid">
            <h2>JOBS FORM</h2>
		<div class="container">
			<div class="formBox shadow">  
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
	
    <div class="know-more-section">
        <div class="container-fluid">
            <strong>TO KNOW MORE ABOUT VENICERED JOBS</strong>
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
    	            <img src="<?php echo e(url('/')); ?>/public/storage/settings/160439769811.png" alt="Venice Red">
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
</body>
</html>
<?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/venicered-lending/jobs.blade.php ENDPATH**/ ?>