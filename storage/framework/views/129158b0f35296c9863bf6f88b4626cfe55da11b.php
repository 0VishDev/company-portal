<!--============================
=            Footer            =
=============================-->
<!-- contact us start-->
<section class="mt-5 bg-gray p-5" id="contact">
    <div class="container">
        <div class="row">
			<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="contact-us-content p-4">
					      <h2><strong>Leave a Message,</strong> we will call you back!</h2>
                </div>
            </div>
			<div class="col-md-3"></div>
			
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
    				<span class="send_inquiry_success"></span>
    				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				  <span aria-hidden="true">&times;</span>
    				</button>
    			</div>
        		
                <form action="<?php echo e(url('vendor/contact-inquiry/add')); ?>" method="POST" id="contactInquiryForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="contact_user_id" name="user_id" value="<?php echo e($user_details->id); ?>">
                    
                    <fieldset class="p-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 py-2">
                                    <input type="text" placeholder="Name *" name="user_name" id="contact_user_name" class="form-control" required>
                                </div>
                                <div class="col-lg-12 py-2">
                                    <input type="email" placeholder="Email *" name="email" id="contact_email" class="form-control" required>
                                </div>
                                <div class="col-lg-12 py-2">
                                    <input type="number" placeholder="Phone *" name="mobile" id="contact_mobile" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        <textarea name="message" id="contact_message"  placeholder="Message *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                        
                        <div class="btn-grounp">
                            <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            
			<div class="col-md-6">
			    <fieldset class="p-4">
			    <img src="<?php echo e(url('/')); ?>/public/img/theme-contact.jpg" class="img img-responsive" width="100%" alt="contact">
			                            </fieldset>
			</div>
        </div>
    </div>
</section>
<!-- contact us end -->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
		<div class="col-sm-12 col-md-6 col-lg-1 mb-3 md-none"></div>
      <div class="col-lg-3 col-md-3 mb-3">
        <div class="block">
          <h4>Our Company</h4>
          <ul>
            <li><a href="#about_us">About Us</a></li>
            <li><a href="#">Our Product</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="<?php echo e((!empty($productDocs) ? url('public/storage/product-docs/'.$productDocs->upload_file_name) : '#')); ?>" target="_blank">Download Brochure</a></li>
            <li><a href="<?php echo e($user_details->company_website); ?>" target="_blank"><?php echo e($user_details->company_website); ?></a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-4 col-md-3 mb-3">
        <div class="block">
          <h4>Reach Us</h4>
          <ul>
			  <li><b><?php echo e($user_details->name); ?></b>
				  <br><?php echo e($user_details->user_address); ?><br>
				  </li>
            <li><?php echo e($user_details->name); ?></li>
            <li>Call <?php echo e($user_details->mobile); ?></li>
          </ul>
			<div class="download-btn d-flex my-3">
            <a href="sms:<?php echo e($user_details->mobile); ?>"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</button></a>
            <a href="mailto:<?php echo e($user_details->email); ?>" class=" ml-3"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-envelope" aria-hidden="true"></i> Send Email</button></a>
          </div>
        </div>
      </div>
		
      <!-- Link list -->
      <div class="col-lg-4 col-md-3 mb-3">
        <div class="block">
          <h4>Share us via</h4>
          <div class="download-btn d-flex mb-4">
            <a href="#"><img src="<?php echo e(url('/')); ?>/public/img/facebook.png" alt="facebook"></a>
            <a href="#" class=" ml-3"><img src="<?php echo e(url('/')); ?>/public/img/linklen.png" alt="linklen"></a>
			  <a href="#" class=" ml-3"><img src="<?php echo e(url('/')); ?>/public/img/instagram.png" alt="instagram"></a>
			  <a href="#" class=" ml-3"><img src="<?php echo e(url('/')); ?>/public/img/twitter.png" alt="twitter"></a>
          </div>
          <?php if(!empty($user_details->vr_trust_icon)): ?>
            <h4>VR Trust Certificate</h4>
            <a href="<?php echo e((!empty($user_details->vr_trust_docs) ? url('/').'/public/storage/vr-trust/'.$user_details->vr_trust_docs : '#')); ?>" target="_blank" class="vr-trust"><img src="<?php echo e(url('/')); ?>/public/storage/vr-trust/<?php echo e($user_details->vr_trust_icon); ?>" alt="vr trust"></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p><?php echo e($user_details->name); ?>. All Rights Reserved (Terms of Use)</p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons float-right">
          <li>Managed and Developed by <a href="<?php echo e(url('/')); ?>">Venice Red</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/jQuery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/bootstrap/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/bootstrap/js/bootstrap-slider.js')); ?>"></script>
  <!-- tether js -->
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/tether/js/tether.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/raty/jquery.raty-fa.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/slick-carousel/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/jquery-nice-select/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/fancybox/jquery.fancybox.pack.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/smoothscroll/SmoothScroll.min.js')); ?>"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/plugins/google-map/gmap.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/vendor-themes/theme-1/js/script.js')); ?>"></script>

<?php echo $__env->make('send-inquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#product_show_more_btn').click(function () {
        $('#product_show_more_btn').hide();
        $('#product_show_less_btn').show();
        
        $('[data-product-list]').show();
    });
    
    $('#product_show_less_btn').click(function () {
       $('#product_show_less_btn').hide();
       $('#product_show_more_btn').show();
       
       $('[data-product-list]').hide();
    });
    
    $('#about_show_more_btn').click(function () {
        $('#about_show_more_btn').hide();
        $('#about_show_less_btn').show();
        
        $('#about_show_less_html').hide();
        $('#about_show_more_html').show();
    });
    
    $('#about_show_less_btn').click(function () {
        $('#about_show_less_btn').hide();
        $('#about_show_more_btn').show();
        
        $('#about_show_more_html').hide();
        $('#about_show_less_html').show();
    });

	var textEl = document.querySelector('#about-content');
	var textfull = textEl.innerHTML;
	var charLength = 300;
	
	if(textfull.length > charLength){
		var textLess = textfull.substr(0, charLength);
		textLess = textLess.substr(0, textLess.lastIndexOf(" ") + 1);
		var textMore = textfull.substr(textLess.length, textfull.length);
		textEl.innerHTML = textLess;
		
		var button = document.createElement('span');
		var buttonText = document.createTextNode('Show More');
		button.setAttribute('class', 'show-more');
		button.setAttribute('id', 'about_show_more');
		button.appendChild(buttonText);
		
		textEl.append(button);
		
		document.querySelector('#about_show_more').onclick = function(){
			if(this.className.indexOf('show-more') > -1){
				textEl.innerHTML = textLess + textMore;
				this.innerText = "Show Less";
				this.classList.remove('show-more');
			}else{
				textEl.innerHTML = textLess;
				this.innerText = "Show More";
				this.classList.add('show-more');
			}
			textEl.append(this);
		}
	}
	
	$('#contactInquiryForm').submit(function (e){
	    e.preventDefault();
	    
	    $.ajax({
            url: '<?php echo e(url('vendor/contact-inquiry/add')); ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.code == 200) {
                    var success = $(".send_inquiry_success");
                    success.html(response.message);
                    success.parent().toggleClass('d-none');
                    
                    $('#contactInquiryForm')[0].reset();   
                }
            },
            failure: function(error) {
                console.log(error);
            }
        });
	});
</script>

<div class="modal fade" id="Enquiry_Form">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Distributor Enquiry Form</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                  <div class="row">
                    <div class="col-md-12 con-bg1">
                      <div class="contact-form">
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="fname">Name:</label>
                          <div class="col-sm-12">          
                          <input type="text" class="form-control" id="fname" placeholder="Name" name="fname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="mobile">Mobile No:</label>
                          <div class="col-sm-12">          
                          <input type="number" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="email">Email id:</label>
                          <div class="col-sm-12">          
                          <input type="email" class="form-control" id="email" placeholder="Email id" name="email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="comment">Enquiry:</label>
                          <div class="col-sm-12">
                          <textarea class="form-control" rows="3" id="comment"></textarea>
                          </div>
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
		          </form>
            </div>
        </div>
    </div>
</div>


</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-themes/theme-1/includes/footer.blade.php ENDPATH**/ ?>