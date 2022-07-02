<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e($user_details->name); ?> | Venicered</title>
  
  <!-- FAVICON -->
  <link href="https://www.venicered.com/public/storage/settings/1594989826.png" rel="shortcut icon">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/bootstrap/css/bootstrap-slider.css')); ?>">
  <!-- Font Awesome -->
  <link href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/slick-carousel/slick/slick.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/slick-carousel/slick/slick-theme.css')); ?>" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/fancybox/jquery.fancybox.pack.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/plugins/jquery-nice-select/css/nice-select.css')); ?>" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="<?php echo e(asset('resources/views/template/vendor-themes/theme-3/css/style.css')); ?>" rel="stylesheet">

</head>

<body class="body-wrapper">


<section class="nav-bg">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="/best-sellers">
						<?php if(!empty($user_details->company_logo)): ?>
						    <img src="<?php echo e(url('/')); ?>/public/storage/company-logo/<?php echo e($user_details->company_logo); ?>" alt="<?php echo e($user_details->company_name); ?>">
						<?php else: ?>
                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($user_details->company_name); ?>">
                        <?php endif; ?>
					</a>
					<h2 class="text-white"><?php echo e($user_details->company_name); ?>

					<br><small><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 18 18">
        			        <g data-name="Group 2198" transform="translate(-172 -287)">
        				     <circle data-name="Ellipse 103" cx="9" cy="9" r="9" transform="translate(173 287)" fill="#777"></circle>
        				     <path data-name="Path 1044" d="M5.71,1.679a3.286,3.286,0,0,0-4.728,0A3.762,3.762,0,0,0,.714,6.407L3.39,10.243,6.067,6.407A4.036,4.036,0,0,0,5.71,1.679ZM3.39,5.158a1.071,1.071,0,0,1,0-2.141A.984.984,0,0,1,4.461,4.087,1.085,1.085,0,0,1,3.39,5.158Zm0,0" transform="translate(178.59 291.182)" fill="#fff"></path>
        			        </g>
			            </svg> <?php echo e((isset($user_details->city) ? $user_details->city->city_name : '')); ?>, <?php echo e((isset($user_details->state) ? $user_details->state->state_name : '')); ?></small>
					</h2>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item">
								<a class="nav-link" href="#">Home</a>
							</li>
							<li class="nav-item dropdown mega">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Our Products <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <div class="container">
                                <div class="row">
                                    <?php $catCount = 0; ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($catCount >= 4) { break; } $catCount += 1; ?>
                                      <div class="col-md-3">
                                        <span class="text-uppercase"><?php echo e($category['category_name']); ?></span>
                                        <ul class="nav flex-column">
                                            <?php $__currentLoopData = $category['subCategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#"><?php echo e($subCategory['subcategory_name']); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                      </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                              </div>
                              <!--  /.container  -->
                             </div>
                           </li>
							<li class="nav-item">
								<a class="nav-link" href="#about_us">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#contact">Contact Us</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

<input type="hidden" name="base_path" id="base_path" value="<?php echo e(url('/')); ?>"><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-themes/theme-3/includes/header.blade.php ENDPATH**/ ?>