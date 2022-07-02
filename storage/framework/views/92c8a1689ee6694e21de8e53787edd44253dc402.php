<script type="text/javascript" src="<?php echo e(URL::to('resources/views/template/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/js/ion.rangeSlider.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/template/validate/jquery.bvalidator.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/notifyme.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.js"></script>
<script src="<?php echo e(URL::to('resources/views/template/autosearch/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui-timepicker-addon.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/product-carousel/js/lightslider.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/js/navigation.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/menu/menu.js')); ?>"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>

<script src="<?php echo e(URL::to('resources/views/template/js/scratch.js')); ?>"></script>
<?php if(\Request::route()->getName() == 'index'): ?>
    <script src="<?php echo e(URL::to('resources/views/template/scroller/swiper.js')); ?>"></script>
<?php endif; ?>

<?php echo $__env->make('send-inquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('popup-inquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    $(document).on( "click", ".jplist-pagesbox button", function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    
    $(document).on( "click", ".turn-ul li", function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    
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
        "use strict";
    		var options = {
    		
    		offset:              {x:5, y:-2},
    		position:            {x:'left', y:'center'},
            themes: {
                'red': {
                     showClose: true
                },
    	
            }
        };
        $('#login_form').bValidator(options);
    	$('#contact_form').bValidator(options);
    	$('#message_form').bValidator(options);
    	$('#comment_form').bValidator(options);
    	$('#search_form').bValidator(options);
    	$('#footer_form').bValidator(options);
    	$('#cart_form').bValidator(options);
    	$('#coupon_form').bValidator(options);
    	$('#checkout_form').bValidator(options);
    	$('#refund_form').bValidator(options);
    	$('#newsample_form').bValidator(options);
    	$('#seller_form').bValidator(options);
    	$('#track_form').bValidator(options);
    	$('#reset_form').bValidator(options);
    	$('#subscribe_form').bValidator(options);
    	$('#conversation_form').bValidator(options);
    
        $('.select2').select2();
        $(".js-range-slider").ionRangeSlider();
        
        $('#image-gallery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin: 0,
            speed:500,
            auto:true,
            loop:true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }  
        });
        
        $('#home_city').select2({
            placeholder: "Search City",
            ajax: {
                url: function (params) {
                    return $('#base_path').val()+'/search/cities/' + params.term;
                }
            }
        });

        $('#buy-requirement').on("click", function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                url: '/post-buy-requirement',
                type: 'POST',
                data: {
                    '_token': "<?php echo e(csrf_token()); ?>",
                    'product_name': $("input[name='buy-name']").val(),
                    'requirement': $("input[name='buy-requirement']").val(),
                    'email': $("input[name='buy-email']").val(),
                    'mobile_no': $("input[name='buy-mobile']").val(),
                },
                success: function(response) {
                    if(response.code == 200) {
                        var success = $("#buy-success");
                        success.html(response.message);
                        success.parent().toggleClass('d-none');
                    }
                    
                    setTimeout(function(){ 
                        window.location.reload();
                    }, 1000);
                },
                failure: function(error) {
                    console.log(error);
                }
            });

            return false;
        });

        $('#requestCallbackForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                url: '<?php echo e(url('/request-callback')); ?>',
                type: 'POST',
                data: {
                    'name': $("input[name='request-name']").val(),
                    'email': $("input[name='request-email']").val(),
                    'mobile_no': $("input[name='request-mobile']").val(),
                },
                success: function(response) {
                    if(response.code == 200) {
                        var success = $("#callback-success");
                        success.html(response.message);
                        success.parent().toggleClass('d-none');
                        $('#requestCallbackForm')[0].reset();
                    }
                    
                    setTimeout(function(){ 
                        window.location.reload();
                    }, 1000);
                },
                failure: function(error) {
                    console.log(error);
                }
            });
        });
    
        var src = "<?php echo e(route('searchajax')); ?>";
    
        $("#search_text").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: src,
                    dataType: "json",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);
                       
                    }
                });
            },
            minLength: 1,
        });
        
        $('#home_search_box').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: src,
                    dataType: "json",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);
                       
                    }
                });
            },
            minLength: 1,
        });
          
            
             $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            // Close sidebar if click anywhere
            $('main').on("click", function() {
                if($('#sidebar').hasClass('active')) {
                    $('#sidebar').removeClass('active');
                }
            });

            $('.headerbg').on("click", function() {
                if($('#sidebar').hasClass('active')) {
                    $('#sidebar').removeClass('active');
                }
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
        
        if($('#summary-ckeditor').html() != undefined){  CKEDITOR.replace( 'summary-ckeditor' ); }

            $('#country').change(function () {
                var countryId = $(this).val();
                $('#state').empty();
                $('#city').empty();
            
                var base_path = $('#base_path').val();
                $.ajax({
                  type:"POST",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: base_path+'/states/get',
                  data : {'country_id': countryId},
                  success:function(data){
                    if(data.states.length > 0){
                      $.each(data.states, function( k, v ) {
                        var option = '<option value="'+v.id+'">'+v.state_name+'</option>';
                        $('#state').append(option);
                      });
                    }
            
                    if(data.cities.length > 0){
                      $.each(data.cities, function( k, v ) {
                        var option = '<option value="'+v.id+'">'+v.city_name+'</option>';
                        $('#city').append(option);
                      });
                    }
                  }
                });
            });
            
            $('#state').change(function () {
                var stateId = $(this).val();
                $('#city').empty();
            
                var base_path = $('#base_path').val();
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
                        $('#city').append(option);
                      });
                    }
                  }
                });
            });
            
            $('[state-list]').change(function () {
                var stateId = $(this).val();
                $('[city-list]').empty();
            
                var base_path = $('#base_path').val();
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
            
    $(function () {
	     
        $("#product_allow_seo").change(function () {
            if ($(this).val() == "1") {
                $("#ifseo").show();
            } else {
                $("#ifseo").hide();
            }
        });
		
		$("#flash_deals").change(function () {
            if ($(this).val() == "1") {
                $("#ifdeal").show();
            } else {
                $("#ifdeal").hide();
            }
        });
	    
        $("#product_type").change(function () {
            if ($(this).val() == "physical") 
			{
                $("#ifphysical_external").show();
				$("#ifphysical").show();
				$("#ifdigital").hide();
				$("#ifexternal").hide();
            } 
			else if($(this).val() == "external") 
			{
                 $("#ifphysical_external").show();
				 $("#ifphysical").hide();
				 $("#ifdigital").hide();
				 $("#ifexternal").show();
            }
			else if($(this).val() == "digital")
			{
			   $("#ifphysical_external").hide();
			   $("#ifphysical").hide();
			   $("#ifdigital").show();
			   $("#ifexternal").hide();
			}
			else
			{
			   $("#ifphysical_external").hide();
			   $("#ifphysical").hide();
			   $("#ifdigital").hide();
			   $("#ifexternal").hide();
			}
        });
    
      $('#e_filing_registration').change(function(){
        $('.Detail-Services').hide();
        $('#' + $(this).val()).show();
      });
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<?php if($allsettings->google_analytics!= ""): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($allsettings->google_analytics); ?>"></script>
<script>
window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo e($allsettings->google_analytics); ?>');
</script>
<?php endif; ?>
<!-- google analytics -->
<?php /**PATH /home/a0yq2z3dupoj/public_html/businessworldtrade.in/resources/views/javascript.blade.php ENDPATH**/ ?>