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
	   <input type="hidden" name="base_path" id="base_path" value="<?php echo e(url('/')); ?>">
	   
	   <div class="container">
        <div align="center" class="mt-2 mb-5">
        <?php if($allsettings->site_logo != ''): ?>
    	<a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand">
    	<img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="logo">
    	</a>
    	<?php endif; ?>
        </div>
        <div class="login-form mt-5">
           <div class="main-div loginform col-md-5 mx-auto">
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
               <div class="panel">
               <h2><?php echo e(Helper::translation(2213,$translate)); ?></h2>
                   <p><?php echo e(Helper::translation(2214,$translate)); ?> <br/> <?php echo e(Helper::translation(2215,$translate)); ?></p>
               </div>
              <form method="POST" action="<?php echo e(route('register')); ?>" id="login_form">
               <?php echo csrf_field(); ?>
               <div class="form-group">
                    <label for="urname"><?php echo e(Helper::translation(2216,$translate)); ?><span class="required">*</span></label>
                       <input id="name" type="text" class="form-control" name="name" placeholder="<?php echo e(Helper::translation(2217,$translate)); ?>" value="<?php echo e(old('name')); ?>" data-bvalidator="required" autocomplete="name" autofocus>                         <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                         <span class="invalid-feedback" role="alert">
                         <strong><?php echo e($message); ?></strong>
                         </span>
                         <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                      </div>
                  <div class="form-group">
                    <label for="user_name"><?php echo e(Helper::translation(2101,$translate)); ?><span class="required">*</span></label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="<?php echo e(Helper::translation(2218,$translate)); ?>" data-bvalidator="required">
                  </div>
                 <div class="form-group">
                 <label for="email_ad"><?php echo e(Helper::translation(2001,$translate)); ?> <span class="required">*</span></label>
                 <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(Helper::translation(2034,$translate)); ?>"  autocomplete="email" data-bvalidator="email,required">                     <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                     <span class="invalid-feedback" role="alert">
                     <strong><?php echo e($message); ?></strong>
                     </span>
                     <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
                <div class="form-group">
                  <label for="phone">Mobile Number <span class="required">*</span></label>
                  <input type="number" name="phone" value="" id="phone" class="form-control">
               </div>
                <div class="form-group">
                <label for="email_ad"><?php echo e(Helper::translation(2219,$translate)); ?> <span class="required">*</span></label>
                   <select id="user_type" class="form-control" name="user_type" data-bvalidator="required">
                      <option value=""></option>
                      <option value="customer"><?php echo e(Helper::translation(2220,$translate)); ?></option>
                      <option value="vendor"><?php echo e(Helper::translation(2112,$translate)); ?></option>
                   </select>
                </div>
                
                <div class="form-group d-n" id="vendorThemes">
                  <label for="theme">Theme <span class="required">*</span></label><br>
                  <label for="theme_1">
                     <input type="radio" name="theme" value="theme-1" id="theme_1"> 
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-1.jpg" alt="Theme 1">
                     <span>Theme 1</span>
                  </label><br>
                  <label for="theme_2">
                     <input type="radio" name="theme" value="theme-2" id="theme_2">
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-2.jpg" alt="Theme 2">
                     <span>Theme 2</span>
                  </label><br>
                  <label for="theme_3">
                     <input type="radio" name="theme" value="theme-3" id="theme_3">
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-3.jpg" alt="Theme 3">
                     <span>Theme 3</span>
                  </label><br>
                  <label for="theme_4">
                     <input type="radio" name="theme" value="theme-4" id="theme_4">
                     <img class="img-thumb" src="<?php echo e(url('/')); ?>/public/storage/vendor-template/theme-4.jpg" alt="Theme 4">
                     <span>Theme 4</span>
                  </label>
               </div>
               
                <div class="form-group">
                   <label for="country"><?php echo e(Helper::translation(2007,$translate)); ?> <span class="required">*</span></label>
                    <select class="form-control" name="country" id="country" data-bvalidator="required">
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
                
                <div class="form-group d-n" data-buyer-row>
                    <label for="state">State <span class="required">*</span></label>
                    <select class="form-control" name="state" id="state" >
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
                
                <div class="form-group d-n" data-buyer-row>
                    <label for="city">City <span class="required">*</span></label>
                    <select class="form-control" name="city" id="city" >
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
                
                <div class="form-group">
                    <label for="password"><?php echo e(Helper::translation(2102,$translate)); ?> <span class="required">*</span></label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter your password')); ?>" autocomplete="new-password" data-bvalidator="required">
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
                <div class="form-group">
                    <label for="con_pass"> <?php echo e(Helper::translation(2162,$translate)); ?> <span class="required">*</span></label>
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(Helper::translation(2221,$translate)); ?>" data-bvalidator="equal[password],required" autocomplete="new-password">
                       <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                       </div>
                       
                 
             <button type="submit" class="btn button-color btn-block rounded button-off"><?php echo e(Helper::translation(2212,$translate)); ?></button>
             <div class="d-flex justify-content-between forgot">
             <div>
             </div>
             <div>
             <a href="<?php echo e(URL::to('/login')); ?>" class="link-color"><?php echo e(Helper::translation(2223,$translate)); ?></a>
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
    </body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/auth/register.blade.php ENDPATH**/ ?>