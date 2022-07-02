<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e(Helper::translation(1913,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main role="main" class="main-content">
    <?php if(count($slideshow['view']) != 0): ?>
    <div id="myCarousel" class="carousel slide carousel-fade position-relative" data-ride="carousel">
      <div id="search-form" class="position-absolute">
        
          <form id="search-header" method="post" action="<?php echo e(route('shop')); ?>" name="search-header"
            class="search-form-result" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class=" text-center">
              <h3 class="text-white">All You Need Is Here &amp; Classified</h3>
            </div>
            <div class="search-form position-relative">
              <span>
                <select>
                  <option>All India</option>
                </select>
              </span>
              <input type="text" name="search" class="search-input" placeholder="Enter your keywords..."
                autocomplete="off">
              <button type="submit" class="search-button btn btn-blue">Search</button>
            </div>
          </form>
        </div>
        </form>
      </div>
      <ol class="carousel-indicators">
        <?php $k = 1; ?>
        <?php $__currentLoopData = $slideshow['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo e($k); ?>" <?php if($k==1): ?> class="active" <?php endif; ?>></li>
        <?php $k++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ol>
      <div class="carousel-inner">
        <?php $k = 1; ?>
        <?php $__currentLoopData = $slideshow['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php if($k == 1): ?> active <?php endif; ?>">
          <img class="first-slide" src="<?php echo e(url('/')); ?>/public/storage/slideshow/<?php echo e($slide->slide_image); ?>"
            alt="<?php echo e($slide->slide_image); ?>">
          <div class="container">
            <div
              class="carousel-caption <?php if($slide->slide_text_position != ''): ?> text-<?php echo e($slide->slide_text_position); ?> <?php else: ?> text-left <?php endif; ?>">
              <h1><?php echo e($slide->slide_title); ?></h1>
              <p><?php echo e($slide->slide_desc); ?></p>
              <p><?php if($slide->slide_btn_link != ''): ?><a class="btn button-color" href="<?php echo e($slide->slide_btn_link); ?>"
                  role="button" target="_blank"><?php endif; ?> <?php if($slide->slide_btn_text != ''): ?> <?php echo e($slide->slide_btn_text); ?>

                  <?php endif; ?> <?php if($slide->slide_btn_link != ''): ?></a><?php endif; ?></p>
            </div>
          </div>
        </div>
        <?php $k++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"><?php echo e(Helper::translation(2054,$translate)); ?></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"><?php echo e(Helper::translation(2055,$translate)); ?></span>
      </a>
    </div>
    <?php endif; ?>
    <?php if(count($categorybox['view']) != 0): ?>
    <div class="container white-box">
      <h4 class="black mb-2 pb-2"><?php echo e(Helper::translation(2056,$translate)); ?></h4>
      <div class="row">
        <?php $__currentLoopData = $categorybox['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="icon-category pt-2 pb-2 ash-border col-lg-2 col-md-2 col-sm-4  ml-3 mr-3" align="center">
          <a href="<?php echo e(URL::to('/shop/category')); ?>/<?php echo e($category->category_slug); ?>"
            title="<?php echo e($category->category_name); ?>">
            <?php if($category->category_image != ''): ?>
            <img src="<?php echo e(url('/')); ?>/public/storage/category/<?php echo e($category->category_image); ?>"
              alt="<?php echo e($category->category_name); ?>">
            <?php else: ?>
            <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($category->category_name); ?>">
            <?php endif; ?>
          </a>
          <p><a href="<?php echo e(URL::to('/shop/category')); ?>/<?php echo e($category->category_slug); ?>"
              class="link-color fs14"><?php echo e($category->category_name); ?></a></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($categorybox['view']) != 0): ?>
        <div class="icon-category pt-2 pb-2 ash-border col-lg-2 col-md-2 col-sm-4  ml-3 mr-3" align="center">
          <a href="<?php echo e(URL::to('/shop')); ?>" title="More">
            <?php if($allsettings->site_more_category != ''): ?>
            <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_more_category); ?>" alt="More">
            <?php else: ?>
            <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
            <?php endif; ?>
          </a>
          <p><a href="<?php echo e(URL::to('/shop')); ?>" class="link-color fs14"><?php echo e(Helper::translation(2057,$translate)); ?></a></p>
        </div>
        <?php endif; ?>
      </div><!-- /.row -->
    </div>
    <?php endif; ?>
    <?php if($allsettings->site_home_top_banner == 1): ?>
    <div class="container pt-3 mt-3 pb-3 mb-3 p-0">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
          <div class="basic-padding">
            <div class="image-hover">
              <?php if($allsettings->site_banner_one != ''): ?>
              <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner_one); ?>"
                alt="<?php echo e($allsettings->site_banner_one_heading); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
              <?php endif; ?>
              <div class="overlay-pro">
                <h2><?php echo e($allsettings->site_banner_one_heading); ?></h2>
                <?php if($allsettings->site_banner_one_link != ''): ?><a href="<?php echo e($allsettings->site_banner_one_link); ?>"
                  class="btn-hover"><?php echo e(Helper::translation(2058,$translate)); ?></a><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
          <div class="basic-padding">
            <div class="image-hover">
              <?php if($allsettings->site_banner_two != ''): ?>
              <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner_two); ?>"
                alt="<?php echo e($allsettings->site_banner_two_heading); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
              <?php endif; ?>
              <div class="overlay-pro">
                <h2><?php echo e($allsettings->site_banner_two_heading); ?></h2>
                <?php if($allsettings->site_banner_two_link != ''): ?><a href="<?php echo e($allsettings->site_banner_two_link); ?>"
                  class="btn-hover"><?php echo e(Helper::translation(2058,$translate)); ?></a><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(count($physical['product']) != 0): ?>
    <div class="container pt-3 mt-3 pb-3 mb-3">
      <div class="row">
        <h4 class="black mb-2 pb-2"><?php echo e(Helper::translation(2059,$translate)); ?></h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $z = 1; ?>
            <?php $__currentLoopData = $physical['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"
                      data-fancybox="quick-view-<?php echo e($product->product_token.$z); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>"
                        data-fancybox="quick-view-<?php echo e($product->product_token.$z); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span
                          class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      <div class="mt-3"><?php if($product->product_price != 0): ?><span <?php if($product->product_offer_price != 0): ?>
                          class="fs16 offer-price red-color" <?php else: ?> class="fs32"
                          <?php endif; ?>><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span><?php endif; ?>
                        <?php if($product->product_offer_price != 0): ?><span
                          class="fs32"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_offer_price); ?></span><?php endif; ?>
                      </div>
                      <p class="mt-3">
                        <?php echo e($product->product_short_desc); ?>

                      </p>
                      <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"
                          class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                    </div>
                  </div>
                  <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                    <?php if($product->product_image != ""): ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php else: ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg">
                    <?php endif; ?>
                    <?php $imagecount = count($product->productimages); ?>
                    <?php if($imagecount != 0): ?>
                    <?php $no = 1; ?>
                    <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($no == 1): ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>">
                    <?php endif; ?>
                    <?php $no++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php endif; ?>
                  </a>
                  
                  
                </div>
                <div class="product-content">
                  <h3 class="title"><a
                      href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                  </h3>
                  <span class="price"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span>
                  <?php if(Auth::guest()): ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><a href="/login" class="btn btn-blue" class="text-white">Get Best Price</a></p>
                  <?php else: ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue" data-target="#GetBestPrice" data-toggle="modal" class="text-white">Get Best Price</button></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php $z++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(count($external['product']) != 0): ?>
    <div class="container mt-4 mb-4 pt-4 pb-4">
      <div class="row">
        <h4 class="black mb-2 pb-2"><?php echo e(Helper::translation(2068,$translate)); ?></h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $y = 1; ?>
            <?php $__currentLoopData = $external['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"
                      data-fancybox="quick-view-<?php echo e($product->product_token.$y); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>"
                        data-fancybox="quick-view-<?php echo e($product->product_token.$y); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span
                          class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      <div class="mt-3"><?php if($product->product_price != 0): ?><span <?php if($product->product_offer_price != 0): ?>
                          class="fs16 offer-price red-color" <?php else: ?> class="fs32"
                          <?php endif; ?>><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span><?php endif; ?>
                        <?php if($product->product_offer_price != 0): ?><span
                          class="fs32"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_offer_price); ?></span><?php endif; ?>
                      </div>
                      <p class="mt-3">
                        <?php echo e($product->product_short_desc); ?>

                      </p>
                      <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"
                          class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                    </div>
                  </div>
                  <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                    <?php if($product->product_image != ""): ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php else: ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg">
                    <?php endif; ?>
                    <?php $imagecount = count($product->productimages); ?>
                    <?php if($imagecount != 0): ?>
                    <?php $no = 1; ?>
                    <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($no == 1): ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>">
                    <?php endif; ?>
                    <?php $no++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php endif; ?>
                  </a>
                  
                  
                </div>
                <div class="product-content">
                  <h3 class="title"><a
                      href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                  </h3>
                  <span class="price"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span>
                  <?php if(Auth::guest()): ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><a href="/login" class="btn btn-blue" class="text-white">Get Best Price</a></p>
                  <?php else: ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue" data-target="#GetBestPrice" data-toggle="modal" class="text-white">Get Best Price</button></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php $y++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(count($digital['product']) != 0): ?>
    <div class="container mt-4 mb-4 pt-4 pb-4">
      <div class="row">
        <h4 class="black mb-2 pb-2"><?php echo e(Helper::translation(2069,$translate)); ?></h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $x = 1; ?>
            <?php $__currentLoopData = $digital['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"
                      data-fancybox="quick-view-<?php echo e($product->product_token.$x); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>"
                        data-fancybox="quick-view-<?php echo e($product->product_token.$x); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span
                          class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      <div class="mt-3"><?php if($product->product_price != 0): ?><span <?php if($product->product_offer_price != 0): ?>
                          class="fs16 offer-price red-color" <?php else: ?> class="fs32"
                          <?php endif; ?>><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span><?php endif; ?>
                        <?php if($product->product_offer_price != 0): ?><span
                          class="fs32"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_offer_price); ?></span><?php endif; ?>
                      </div>
                      <p class="mt-3">
                        <?php echo e($product->product_short_desc); ?>

                      </p>
                      <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"
                          class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                    </div>
                  </div>
                  <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                    <?php if($product->product_image != ""): ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php else: ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg">
                    <?php endif; ?>
                    <?php $imagecount = count($product->productimages); ?>
                    <?php if($imagecount != 0): ?>
                    <?php $no = 1; ?>
                    <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($no == 1): ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>">
                    <?php endif; ?>
                    <?php $no++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php endif; ?>
                  </a>
                  
                  
                </div>
                <div class="product-content">
                  <h3 class="title"><a
                      href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                  </h3>
                  <span class="price"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span>
                  <?php if(Auth::guest()): ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><a href="/login" class="btn btn-blue" class="text-white">Get Best Price</a></p>
                  <?php else: ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue" data-target="#GetBestPrice" data-toggle="modal" class="text-white">Get Best Price</button></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php $x++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if($allsettings->site_home_bottom_banner == 1): ?>
    <div class="container pt-3 mt-3 pb-3 mb-3 p-0">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
          <div class="basic-padding">
            <div class="image-hover">
              <?php if($allsettings->site_banner_three != ''): ?>
              <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner_three); ?>"
                alt="<?php echo e($allsettings->site_banner_three_heading); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
              <?php endif; ?>
              <div class="overlay-pro">
                <h2><?php echo e($allsettings->site_banner_three_heading); ?></h2>
                <?php if($allsettings->site_banner_three_link != ''): ?><a href="<?php echo e($allsettings->site_banner_three_link); ?>"
                  class="btn-hover"><?php echo e(Helper::translation(2058,$translate)); ?></a><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(count($deal['product']) != 0): ?>
    <div class="container">
      <div class="row">
        <h4 class="black mb-2 pb-2"><?php echo e(Helper::translation(2070,$translate)); ?></h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $cj = 1; ?>
            <?php $__currentLoopData = $deal['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"
                      data-fancybox="quick-view-<?php echo e($product->product_token.$cj); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>"
                        data-fancybox="quick-view-<?php echo e($product->product_token.$cj); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span
                          class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      <div class="mt-3"><?php if($product->product_price != 0): ?><span <?php if($product->product_offer_price != 0): ?>
                          class="fs16 offer-price red-color" <?php else: ?> class="fs32"
                          <?php endif; ?>><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span><?php endif; ?>
                        <?php if($product->product_offer_price != 0): ?><span
                          class="fs32"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_offer_price); ?></span><?php endif; ?>
                      </div>
                      <p class="mt-3">
                        <?php echo e($product->product_short_desc); ?>

                      </p>
                      <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"
                          class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                    </div>
                  </div>
                  <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                    <?php if($product->product_image != ""): ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php else: ?>
                    <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg">
                    <?php endif; ?>
                    <?php $imagecount = count($product->productimages); ?>
                    <?php if($imagecount != 0): ?>
                    <?php $no = 1; ?>
                    <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($no == 1): ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>">
                    <?php endif; ?>
                    <?php $no++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>">
                    <?php endif; ?>
                  </a>
                  <ul class="countdown-<?php echo e($product->product_token); ?>" id="countdown-timer">
                    <li>
                      <span class="days">00</span>
                      <p class="days_ref"><?php echo e(Helper::translation(2071,$translate)); ?></p>
                    </li>
                    <li>
                      <span class="hours">00</span>
                      <p class="hours_ref"><?php echo e(Helper::translation(2072,$translate)); ?></p>
                    </li>
                    <li>
                      <span class="minutes">00</span>
                      <p class="minutes_ref"><?php echo e(Helper::translation(2073,$translate)); ?></p>
                    </li>
                    <li>
                      <span class="seconds last">00</span>
                      <p class="seconds_ref"><?php echo e(Helper::translation(2074,$translate)); ?></p>
                    </li>
                  </ul>
                  
                  
                </div>
                <div class="product-content">
                  <h3 class="title"><a
                      href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                  </h3>
                  <span class="price"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->product_price); ?></span>
                  <?php if(Auth::guest()): ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><a href="/login" class="btn btn-blue" class="text-white">Get Best Price</a></p>
                  <?php else: ?>
                  <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue" data-target="#GetBestPrice" data-toggle="modal" class="text-white">Get Best Price</button></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php $cj++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(count($brand['view']) != 0): ?>
    <div class="container mb-4 pb-4">
      <div class="row">
        <h4 class="black mb-3 pb-3 mt-4 pt-4"><?php echo e(Helper::translation(2075,$translate)); ?></h4>
        <div class="col-md-12">
          <div id="client-logos" class="owl-carousel text-center">
            <?php $__currentLoopData = $brand['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
              <div class="client-inners">
                <img src="<?php echo e(url('/')); ?>/public/storage/brands/<?php echo e($brand->brand_image); ?>"
                  alt="<?php echo e($brand->brand_name); ?>" />
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </main>
  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="modal fade" id="GetBestPrice" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Get the best price for Product Name</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-4 con-bg12">
                    <div class="contact-info">
                      <div class="text-center">
                        <img src="https://via.placeholder.com/300?text=Product Image" class="img img-fluid" alt="image">
                        <p>Product Name</p>
                        <span>$ 35.00 / piece</span><br>
                        <span>Sold By - XYZ Company</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 con-bg1">
                    <div class="contact-form">
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="fname">Order Value:</label>
                        <div class="col-sm-9">
                          <select name="order_value" class="form-control"style="color: rgb(158, 158, 158);"><option value="">Select a Value</option><option value="Upto 1,000" optionid="12906027">Upto 1,000</option><option value="1,000 to 3,000" optionid="12906028">1,000 to 3,000</option><option value="3,000 to 10,000" optionid="12906034">3,000 to 10,000</option><option value="10,000 to 20,000" optionid="12906035">10,000 to 20,000</option><option value="20,000 to 50,000" optionid="12906036">20,000 to 50,000</option><option value="50,000 to 1 Lakh" optionid="12906037">50,000 to 1 Lakh</option><option value="1 to 2 Lakh" optionid="12906038">1 to 2 Lakh</option><option value="2 to 5 Lakh" optionid="12906039">2 to 5 Lakh</option><option value="5 to 10 Lakh" optionid="12906040">5 to 10 Lakh</option><option value="10 to 20 Lakh" optionid="12907082">10 to 20 Lakh</option><option value="20 to 50 Lakh" optionid="12907083">20 to 50 Lakh</option><option value="50 Lakh to 1 Crore" optionid="12907084">50 Lakh to 1 Crore</option><option value="More than 1 Crore" optionid="12907085">More than 1 Crore</option></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="quantity">Quantity:</label>
                        <div class="col-sm-9">
                          <input type="text" name="quantity" id="quantity" value=""> <span class="text-muted">/ Piece</span>
                        </div>
                      </div>
                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <label>Payment Option:</label>
                          <div class="d-flex flex-column flex-wrap">
                            <label for="option_1"><input type="radio" name="payment" id="option_1"> Full Advance Payment</label>
                            <label for="option_2"><input type="radio" name="payment" id="option_2"> Pay on Delivery</label>
                            <label for="option_3"><input type="radio" name="payment" id="option_3"> 50% Advance and 50% on Delivery</label>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-blue">Send</button>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mt-5">
                        <p class="col-sm-12">Your Contact Information :</p>
                        <p class="col-sm-12">+91 958 999 9999</p>
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

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/inforrmz/zigkart.inforidgetechnologyindia.com/resources/views/index.blade.php ENDPATH**/ ?>