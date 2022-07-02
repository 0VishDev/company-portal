<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(1973,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
   <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(1973,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(1973,$translate)); ?></span></p>
      </div>
    </section>
  <main role="main" class="main-content">
      <div class="container bg-white">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 mt-1 mb-1 pt-1 pb-1">
                <form class="bst-frm" action="" method="GET" id="">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group has-search shadow rounded1">
                        <button type="submit" class="fa fa-search form-control-feedback"></button>
                        <input type="text" class="form-control" placeholder="Search Your Company Profile" id="best_sesearch" name="search" value="<?php echo e(\Request::query('search')); ?>">
                      </div>
                    </div>
                  </div>
                </form> 
             </div>
           <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php 
                $seller = $seller['vendor']; 
                $userName = (!empty($seller->company_name) ? $seller->company_name : $seller->name);
                
                if (preg_match('/^[\w\s?]+$/si', $userName)) {
                    $userNameSlug = $userName;
                } else {
                    $userNameSlug = $seller->name;
                }
            ?>
           
           <div class="col-lg-3 col-md-4 col-sm-6 mt-1 mb-1 pt-1 pb-1 prod-item">
    		    <div class="card shadow h-100 profile-card-2">
                    <div class="card-img-block">
                      <a href="<?php echo e(URL::to('/bt-'.str_slug($userNameSlug, '-'))); ?>" title="<?php echo e($seller->name); ?>">
                        <?php if(!empty($seller->company_logo)): ?>
                            <img class="img-fluid b-sellers" src="<?php echo e(asset('public/storage/company-logo/'.$seller->company_logo)); ?>" alt="">
                        <?php else: ?>
                            <img class="img-fluid b-sellers" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="">
                        <?php endif; ?>
                      </a> 
                    </div>
                    <div class="card-body pt-2">
                        
                        <h5><a href="<?php echo e(URL::to('/bt-'.str_slug($userNameSlug, '-'))); ?>" class="theme-color1"><?php echo e($userName); ?></a></h5>
                        <p class="card-text"><?php echo e(count($seller->products)); ?> <?php echo e(Helper::translation(1975,$translate)); ?></p>
                        <div><a href="<?php echo e(URL::to('/bt-'.str_slug($userNameSlug, '-'))); ?>" class="btn button-color"><?php echo e(Helper::translation(1977,$translate)); ?></a></div>
                    </div>
                </div>
             </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="float-right">
                    <?php echo e($vendors->appends(request()->query())->links()); ?>

                </div>
              <!--<div class="turn-page" id="itempager"></div>-->
              <!-- </div> -->
         </div>
      </div>
    </main>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 </body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/best-sellers.blade.php ENDPATH**/ ?>