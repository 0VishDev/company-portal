<?php if($allsettings->maintenance_mode == 0): ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo e(Helper::translation(2212,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
        <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo NoCaptcha::renderJs(); ?>

    </head>
	<body id="LoginForm">
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
                 <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(Helper::translation(2034,$translate)); ?>"  autocomplete="email" data-bvalidator="email,required">                     <?php if ($errors->has('email')) :
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
                  <input type="text" name="phone" value="" id="phone" class="form-control">
               </div>
                <div class="form-group">
                <label for="email_ad"><?php echo e(Helper::translation(2219,$translate)); ?> <span class="required">*</span></label>
                   <select id="user_type" class="form-control" name="user_type" data-bvalidator="required">
                      <option value=""></option>
                      <option value="customer"><?php echo e(Helper::translation(2220,$translate)); ?></option>
                      <option value="vendor"><?php echo e(Helper::translation(2112,$translate)); ?></option>
                   </select>
                </div>
                <div class="form-group" style="display: none" id="vendorThemes">
                  <label for="theme">Theme <span class="required">*</span></label><br>
                     <label for="theme_1"><input type="radio" name="theme" value="vendor-theme-1" id="theme_1"> Theme 1</label>
                     <label for="theme_2"><input type="radio" name="theme" value="vendor-theme-2" id="theme_2"> Theme 2</label>
                     <label for="theme_3"><input type="radio" name="theme" value="vendor-theme-3" id="theme_3"> Theme 3</label>
                     <label for="theme_4"><input type="radio" name="theme" value="vendor-theme-4" id="theme_4"> Theme 4</label>
                  </div>
                <div class="form-group">
                <label for="email_ad"><?php echo e(Helper::translation(2007,$translate)); ?> <span class="required">*</span></label>
                   <select id="user_country" class="form-control" name="user_country" data-bvalidator="required">
                      <option value=""></option>
                      <?php $__currentLoopData = $allcountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($country->country_id); ?>"><?php echo e($country->country_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </select>
                </div>
                <div class="form-group">
                    <label for="password"><?php echo e(Helper::translation(2102,$translate)); ?> <span class="required">*</span></label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter your password')); ?>" autocomplete="new-password" data-bvalidator="required">
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
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(Helper::translation(2221,$translate)); ?>" data-bvalidator="equal[password],required" autocomplete="new-password"></div>
                 <div class="form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                <label for="con_pass"><?php echo e(Helper::translation(2222,$translate)); ?><span class="required">*</span></label>
                <?php echo app('captcha')->display(); ?>

                <?php if($errors->has('g-recaptcha-response')): ?>
                  <span class="help-block">
                     <strong class="red"><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                  </span>
                <?php endif; ?>
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
</body>
<script>
$(document).ready(function() {
   $("#user_type").on("change", function() {
      if($(this).val() == "vendor") {
         $("#vendorThemes").toggle();
      }
   });
});
</script>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/inforrmz/b2bkart.inforidgetechnologyindia.com/resources/views/auth/register.blade.php ENDPATH**/ ?>