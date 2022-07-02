<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e(Helper::translation(1913,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

    <body class="bg-white">
  <header id="header1" class="p-1">
  <div class="container">
    <div class="row">
      <div id="logo" class="col-lg-12 col-md-12 col-sm-12 text-center">
                <?php if($allsettings->site_logo != ''): ?>
        <a href="<?php echo e(URL::to('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"
            alt="<?php echo e($allsettings->site_title); ?>">
        </a>
        <?php endif; ?>
              </div>
    </div>
  </div>
</header>
<div class="container mt-3">
<div class="row">
	<div class="col-sm-12 text-center">
	<h1 class="black pt-3">VR Trust Certificate</h1>
	</div>
</div>
</div>	
	
	<div class="container p-5">
		<div class="bg-gray mb-3">
	<div class="row">
		<div class="col-sm-12 col-md-4 col-lg-4 pr-5">
		<img src="/public/img/vr-trust.png" class="img img-responsive pb-3">
		</div>
		<div class="col-sm-12 col-md-8 col-lg-8 pt-5 pr-5">
		<h3>What is VR Trust certificate?</h3>
			<p>A VR Trust certificate is a service offered by Venice Red India Private Limited that ensures that the supplier working with us is a reliable and ethical supplier. Further, this certificate maintains the record of authenticity and credibility of the supplier, business or the firm. </p>
		</div>
	</div>
		</div>
		
	<div class="row mt-5">
	<div class="col-sm-12 col-md-4 col-lg-4 mb-3">
		<img src="/public/img/VeniceRedCertificate.jpg" class="img img-responsive mb-2" width="100%"  id="myImg">
		</div>
		<div class="col-sm-12 col-md-8 col-lg-8 mt-3">
			<h3>Benefits of VR Trust Certificate.</h3>
			<p>You may once ignore the VR Certificate but trust us we will represent your business in such a way that soon you will be the most trusted supplier of all time. In this digital world where frauds are common happenings, you should not choose a chance of being uncertified so, have a VR Certificate and be a trusted supplier.</p>
			<p>Meanwhile, the buyers will have trust in you and soon you will become a brand in the market. Moreover, while representing you as a trusted supplier we Venice Red.com will also increase our outreach and visibility among the rest of the market.</p>
			<h3>Why VR Trust?</h3>
			<p>A VR Trust is much important as you get verified as a certified business along with your firm details. You cannot just do the business by selling goods and services; you need also need to attract genuine buyers for which you need a certified company profile. Further, you will become a trusted supplier of Venicered.com and we will be happy to work with you and for you.</p>
		</div>
	</div>
</div>

	<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- start footer --> 
        <footer class="footer-standard-dark bg-gray p-3"> 
            <div class="">
                <div class="container">
                    <div class="row">
                        <!-- start copyright -->
                        <div class="col-md-6">
						<?php if($allsettings->site_logo != ''): ?>
        <a href="<?php echo e(URL::to('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"
            alt="<?php echo e($allsettings->site_title); ?>">
        </a>
        <?php endif; ?>
						</div>
                        <div class="col-md-6 mt-3">
                            &copy; Venice Red India Pvt. Ltd. copyright 2020
                        </div>
                        <!-- end copyright -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
<style>
		#header1 {
    background-color: #fff;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes  zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media  only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
	
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/vr-trust.blade.php ENDPATH**/ ?>