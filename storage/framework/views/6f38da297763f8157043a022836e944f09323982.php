<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if(Auth::user()->user_type != 'admin'): ?><?php echo e(Helper::translation(2043,$translate)); ?><?php else: ?><?php echo e(Helper::translation(1912,$translate)); ?><?php endif; ?>  - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::user()->user_type != 'admin'): ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2043,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2043,$translate)); ?></span></p>
      </div>
    </section>
    <main role="main">
     <div class="container page-white-box mt-3">
     <div class="row">
	     <div class="col-md-12">
             <?php if($message = Session::get('success')): ?>
             <div class="alert alert-success" role="alert">
                 <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    <?php echo e($message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span class="fa fa-close" aria-hidden="true"></span>
                    </button>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
               <span class="alert_icon lnr lnr-warning"></span>
                  <?php echo e($message); ?>

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-close" aria-hidden="true"></span>
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
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
             <form action="<?php echo e(route('my-profile')); ?>" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
             <?php echo e(csrf_field()); ?>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="name"><?php echo e(Helper::translation(2018,$translate)); ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($edit['profile']->name); ?>" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                        <label for="username"><?php echo e(Helper::translation(2101,$translate)); ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo e($edit['profile']->username); ?>" data-bvalidator="required">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1"><?php echo e(Helper::translation(2014,$translate)); ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo e($edit['profile']->email); ?>" data-bvalidator="required,email">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2"><?php echo e(Helper::translation(2102,$translate)); ?></label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="country"><?php echo e(Helper::translation(2007,$translate)); ?> <span class="required">*</span></label>
                        <select class="form-control" name="user_country" data-bvalidator="required">
                        <?php $__currentLoopData = $allcountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->country_id); ?>" <?php if($edit['profile']->country_id == $country->country_id): ?> selected <?php endif; ?>><?php echo e($country->country_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="state">State <span class="required">*</span></label>
                        <select class="form-control" name="user_state" data-bvalidator="required">
                        <?php $__currentLoopData = $allstate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>" <?php if($edit['profile']->state_id == $state->id): ?> selected <?php endif; ?>><?php echo e($state->state_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="city">City <span class="required">*</span></label>
                        <select class="form-control" name="user_city" data-bvalidator="required">
                        <?php $__currentLoopData = $allcity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>" <?php if($edit['profile']->city_id == $city->id): ?> selected <?php endif; ?>><?php echo e($city->city_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState"><?php echo e(Helper::translation(2103,$translate)); ?></label>
                        <select class="form-control" id="user_gender" name="user_gender">
                            <option value="male" <?php if($edit['profile']->user_gender == "male"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2104,$translate)); ?></option>
                            <option value="female" <?php if($edit['profile']->user_gender == "female"): ?> selected <?php endif; ?>><?php echo e(Helper::translation(2105,$translate)); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber"><?php echo e(Helper::translation(2106,$translate)); ?></label>
                        <input type="file" class="form-control" id="user_banner" name="user_banner">
                        <?php if($edit['profile']->user_banner != ""): ?>
                        <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($edit['profile']->user_banner); ?>" alt="<?php echo e($edit['profile']->name); ?>" class="img-thumb">
                        <?php else: ?>
                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($edit['profile']->name); ?>" class="img-thumb">
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Upload Logo</label>
                        <input type="file" class="form-control" id="user_photo" name="user_photo">
                        <?php if($edit['profile']->user_photo != ""): ?>
                        <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($edit['profile']->user_photo); ?>" alt="<?php echo e($edit['profile']->name); ?>" class="img-thumb">
                        <?php else: ?>
                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($edit['profile']->name); ?>" class="img-thumb">
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(Auth::user()->user_type == 'vendor'): ?>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputState">Brochure</label>
                        <input type="file" class="form-control" id="brochure" name="brochure">
                    </div>
                    <div class="col-sm-6">
                        <label for="certification">Certification</label>
                        <input type="text" class="form-control" id="certification" name="certification" value="<?php echo e($edit['profile']->certification); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="nature_of_business">Nature of Business (eg. Manufacturer)</label>
                        <input type="text" class="form-control" id="nature_of_business" name="nature_of_business" value="<?php echo e($edit['profile']->nature_of_business); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="no_of_employees">Number of Employees</label>
                        <input type="text" class="form-control" id="no_of_employees" name="no_of_employees" value="<?php echo e($edit['profile']->no_of_employees); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="year_of_establishment">Year of Establishment</label>
                        <input type="number" class="form-control" id="year_of_establishment" name="year_of_establishment" value="<?php echo e($edit['profile']->year_of_establishment); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="legal_status_of_firm">Legal Status of Firm</label>
                        <input type="number" class="form-control" id="legal_status_of_firm" name="legal_status_of_firm" value="<?php echo e($edit['profile']->legal_status_of_firm); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="annual_turnover">Annual Turnover</label>
                        <input type="text" class="form-control" id="annual_turnover" name="annual_turnover" value="<?php echo e($edit['profile']->annual_turnover); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="facebook">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo e($edit['profile']->facebook); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="linkedin">LinkedIn Link</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo e($edit['profile']->linkedin); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="annual_turnover">Twitter Link</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo e($edit['profile']->twitter); ?>">
                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group row">
                    <?php if(Auth::user()->user_type == 'vendor'): ?>
                    <div class="col-sm-6 mb-3">
                        <label for="gst_no">GSTIN</label>
                        <input type="text" class="form-control" id="gst_no" name="gst_no" value="<?php echo e($edit['profile']->gst_no); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="certification">Certification</label>
                        <input type="text" class="form-control" id="certification" name="certification" value="<?php echo e($edit['profile']->certification); ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="address_short">Short Address</label>
                        <input type="text" class="form-control" id="address_short" name="adrress_short" value="<?php echo e($edit['profile']->address_short); ?>">
                    </div>
                    <?php endif; ?>
                    <div class="col-sm-6">
                        <label for="inputContactNumber"><?php echo e(Helper::translation(2003,$translate)); ?></label>
                        <input type="text" class="form-control" id="user_address" name="user_address" value="<?php echo e($edit['profile']->user_address); ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState"><?php echo e(Helper::translation(2002,$translate)); ?></label>
                        <input type="text" class="form-control" id="user_phone" name="user_phone" value="<?php echo e($edit['profile']->user_phone); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber"><?php echo e(Helper::translation(2108,$translate)); ?></label>
                        <textarea name="user_about" id="summary-ckeditor" rows="6" class="form-control"><?php echo e(html_entity_decode($edit['profile']->user_about)); ?></textarea>
                    </div>
                    
                </div>
                <input type="hidden" name="save_password" value="<?php echo e($edit['profile']->password); ?>">
                <input type="hidden" name="edit_id" value="<?php echo e($edit['profile']->user_token); ?>">
                <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>">
                <input type="hidden" name="save_photo" value="<?php echo e($edit['profile']->user_photo); ?>">
                <input type="hidden" name="save_brochure" value="<?php echo e($edit['profile']->user_banner); ?>">
                <input type="hidden" name="user_brochure" value="<?php echo e($edit['profile']->brochure_path); ?>">
                <button type="submit" class="btn button-color float-right"><?php echo e(Helper::translation(1919,$translate)); ?></button>
            </form>
        </div>
    </div>
</div>
</main>
<?php else: ?>
<?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/my-profile.blade.php ENDPATH**/ ?>