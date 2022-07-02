<?php if($allsettings->maintenance_mode == 0): ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo e(Helper::translation(2212,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
        <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo NoCaptcha::renderJs(); ?>

        
        <style>
            .field-icon {
              float: right;
              margin-left: -25px;
              margin-top: -25px;
              position: relative;
              z-index: 2;
            }
            .d-n {
               display: none !important;
            }
        </style>
    </head>
	<body id="LoginForm">
	    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	   <input type="hidden" name="base_path" id="base_path" value="<?php echo e(url('/')); ?>">
	   
	   <div class="container">
        <div class="">
           <div class="">
               <div>
                    <?php if($message = Session::get('success')): ?>
                     <div class="alert alert-success" role="alert">
                        <span class="alert_icon lnr lnr-checkmark-circle"></span>
                           <?php echo e($message); ?>

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="fa fa-close"></i>
                           </button>
                     </div>
                    <?php endif; ?>
                    <?php if($message = Session::get('error')): ?>
                    <div class="alert alert-danger" role="alert">
                       <span class="alert_icon lnr lnr-warning"></span>
                         <?php echo e($message); ?>

                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close"></i>
                         </button>
                    </div>
                    <?php endif; ?>
                    <?php if(!$errors->isEmpty()): ?>
                    <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close"></i>
                    </button>
                    </div>
                    <?php endif; ?>
               </div>
              <form method="POST" action="<?php echo e(route('register')); ?>" id="login_form">
               <?php echo csrf_field(); ?>
               <div  class="lgn-body">
           <div class="shadow bg-white mt-5 mb-5 ">
           <div class="row">
           <div class="col-sm-4 col-md-4 col-lg-4 bg-lgn sm-d-none">
               <div class="d-none">
               <h2 class="text-white mb-5">For New Users</h2>
                   <a href="#" class="nw-usr-crt">Create Account</a>
                   <p class="ln-or text-white"><span class="vrt-ln"></span> <span>or</span> <span class="vrt-ln"></span></p>
                   
                   <a href="#">
                            <img src="https://www.venicered.com/public/img/gp.png" alt="">
                </a>
                   <a href="#">
                            <img src="https://www.venicered.com/public/img/fb.png" alt="">
                </a>
               </div>
               </div>
               <div class="col-sm-8 col-md-8 col-lg-8">
                   <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12">
               <div class="float-right">
                   <?php if($allsettings->site_logo != ''): ?>
    	<a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand">
    	<img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="logo">
    	</a>
    	<?php endif; ?>
                   </div>
                   </div>
                   <div class="formBox">
						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Your Name</div>
									<input id="name" type="text" class="form-control rounded-0 input" name="name" value="" data-bvalidator="required" autocomplete="name">
                                     <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                         <span class="invalid-feedback" role="alert">
                         <strong><?php echo e($message); ?></strong>
                         </span>
                         <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Username</div>
									<input id="username" type="text" name="username" class="form-control rounded-0 input"  data-bvalidator="required">
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Email Address</div>
									<input id="email" type="email" class="form-control rounded-0 input" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" data-bvalidator="email,required">
                                     <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                     <span class="invalid-feedback" role="alert">
                     <strong><?php echo e($message); ?></strong>
                     </span>
                     <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Mobile Number</div>
									<input type="number" name="phone" value="" id="phone" class="form-control rounded-0 input">
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">User Type</div>
									<select id="user_type" class="form-control rounded-0 input" name="user_type" data-bvalidator="required">
                                        <option value=""></option>
                                        <option value="customer">Buyer</option>
                                        <option value="vendor">Seller</option>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Country</div>
									<select class="form-control rounded-0 input" name="country" id="country" data-bvalidator="required">
                            <?php $__currentLoopData = $allcountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->country_id); ?>" <?php echo e(($country->country_name == 'India' ? 'selected' : '')); ?>><?php echo e($country->country_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    <?php if($errors->has('country')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('country')); ?></strong>
                      </span>
                    <?php endif; ?>
                                   
								</div>
							</div>
                            <div class="col-sm-12 d-n" id="vendorThemes">
								<div class="inputBox focus">
									<div class="">Theme</div>
									<label for="theme_1">
                     <input type="radio" name="theme" value="theme-1" id="theme_1"> 
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-1.jpg" alt="Theme 1">
                     <span class="mr-3">Theme 1</span>
                  </label>
                  <label for="theme_2">
                     <input type="radio" name="theme" value="theme-2" id="theme_2">
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-2.jpg" alt="Theme 2">
                     <span class="mr-3">Theme 2</span>
                  </label>
                  <label for="theme_3">
                     <input type="radio" name="theme" value="theme-3" id="theme_3">
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-3.jpg" alt="Theme 3">
                     <span class="mr-3">Theme 3</span>
                  </label>
                  <label for="theme_4">
                     <input type="radio" name="theme" value="theme-4" id="theme_4">
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-4.jpg" alt="Theme 4">
                     <span>Theme 4</span>
                  </label>
								</div>
							</div>
                            
                            <div class="col-sm-6 d-n" data-buyer-row>
								<div class="inputBox focus">
									<div class="inputText">State</div>
									<select class="form-control rounded-0 input" name="state" id="state">
                                <?php $__currentLoopData = $registerStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($state->id); ?>"><?php echo e($state->state_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    <?php if($errors->has('state')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('state')); ?></strong>
                      </span>
                    <?php endif; ?>
								</div>
							</div>
                            
                            <div class="col-sm-6 d-n" data-buyer-row>
								<div class="inputBox focus">
									<div class="inputText">City</div>
									<select class="form-control rounded-0 input" name="city" id="city">
                                        <?php $__currentLoopData = $registercities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($city->id); ?>"><?php echo e($city->city_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                   <?php if($errors->has('city')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('city')); ?></strong>
                      </span>
                    <?php endif; ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Password</div>
									<input id="password" type="password" class="form-control rounded-0 input" name="password" autocomplete="new-password" data-bvalidator="required">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                       <span class="invalid-feedback" role="alert">
                       <strong><?php echo e($message); ?></strong>
                       </span>
                       <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Confirm Password</div>
									<input id="password-confirm" type="password" class="form-control rounded-0 input" name="password_confirmation" data-bvalidator="equal[password],required" autocomplete="new-password">
                                    <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 text-center">
                                <input type="submit" class="btn nw-usr-login" value="Register">
                            </div>
						</div>
			</div>
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
    <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>
            $(document).ready(function() {
               $("#user_type").on("change", function() {
                  if($(this).val() == 'vendor') {
                    $("#vendorThemes").removeClass('d-n');
                  }else{
                    $("#vendorThemes").addClass('d-n');
                  }
                  
                  if($(this).val() == 'customer') {
                    $('[data-buyer-row]').removeClass('d-n');
                    $('#state').prop('required', true);
                    $('#city').prop('required', true);
                  }else{
                    $('[data-buyer-row]').addClass('d-n'); 
                    $('#state').prop('required', false);
                    $('#city').prop('required', false);
                  }
               });
            });
            
            $(".toggle-password").click(function() {
              $(this).toggleClass("fa-eye fa-eye-slash");
              var input = $($(this).attr("toggle"));
              if (input.attr("type") == "password") {
                input.attr("type", "text");
              } else {
                input.attr("type", "password");
              }
            });
    
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
        </script>
        
        <style>
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
span.vrt-ln {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(255, 255, 255, 0.9);
    box-sizing: content-box;
    width: 95px;
    overflow: visible;
    display: block;
}
p.ln-or {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 2rem 0;
}
.lgn-body{
    background-image: url(/public/img/login-bg.png);
    background-size: cover;
    background-position: right;
    padding: 56px 122px;
}
.bg-lgn{
    background-image: url(/public/img/crt-usr.jpg);
    background-size: cover;
    background-position: bottom;
    padding: 110px 50px;
    text-align: center;
}
.nw-usr-crt {
    background-color: #ff1d25;
    color: #fff;
    padding: 10px 15px;
    border-radius: 20px;
}
.nw-usr-login{
    background-color: #ff1d25;
    color: #fff;
    padding: 4px 34px;
    border-radius: 20px;  
        }
.formBox{
	margin-top: 0;
    padding: 0px 48px 20px 48px;
}
.inputBox{
	position: relative;
	box-sizing: border-box;
	margin-bottom: 50px;
}
.inputBox .inputText{
	position: absolute;
    font-size: 18px;
    line-height: 45px;
    transition: .5s;
    opacity: .5;
}
.inputBox .input{
	position: relative;
	width: 100%;
	height: 50px;
	background: transparent;
	border: none;
    outline: none;
    font-size: 18px;
    border-bottom: 1px solid rgba(0,0,0,.5);
}
.focus .inputText{
	transform: translateY(-30px);
	font-size: 18px;
	opacity: 1;
	color: #00000082;
}
.form-control:focus {
    box-shadow: none;
}
input:-internal-autofill-selected {
    appearance: menulist-button;
    background-color: transparent!important;
    background-image: none !important;
    color: -internal-light-dark(black, white) !important;
}
@media (max-width:1200px){
.lgn-body {
    padding: 56px 69px;
    margin: 0px 0px;
}        
}
@media (max-width:992px){
.lgn-body {
    padding:  6px 30px;
    margin: 0px 0px;
}
.bg-lgn {
    padding: 110px 6px;
}
.formBox {
    margin-top: 0;
    padding: 35px 49px;
}
}
</style>
        <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
	 <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/auth/register.blade.php ENDPATH**/ ?>