<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e($allsettings->site_title); ?></title>
  <?php if($view_name != 'product'): ?>
<meta name="description" content="<?php echo e($allsettings->site_desc); ?>">
<meta name="keywords" content="<?php echo e($allsettings->site_keywords); ?>">
<?php endif; ?>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script>
    function myFunction1(event) {
      document.getElementById("myDropdown1").classList.toggle("show1");
      event.preventDefault()
    }
  </script>
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main role="main" class="main-content">
<section class="bg-adver pt-2 pb-2 sm-d-none">
    <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <h3 class="float-right mt-2">COVID-19 </h3>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 text-center ad-cnt">
                        <h2>Find the Covid-19 products products from manufacturers and suppliers.</h2>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="register-now">
                            <a href="<?php echo e(url('/')); ?>/register">Register Now</a>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <section class="mt-2">
    <div class="container-fluid">
        <div class=" bg-white shadow">
        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-2 sm-d-none md-d-done">
                <nav id="maga-menu" class="bg-black">
                    <div>
                    <h1 class="text-black pl-2 text-uppercase">Main Market</h1>
                    </div>
  <ul class="menu">
    <?php $catCount = 0; ?>
    <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $catCount += 1; if($catCount > 7) { break; } ?>
    <li>
        <a href="<?php echo e(url('shop?cat_id='.\ZigKart\Helpers::joinString($category->category_slug))); ?>">
            
            <?php echo e($category->category_name); ?></a>
      <div class="megadrop">
     <div class="row">
        <?php $subCatCount = 0; ?>
        <?php $__currentLoopData = $category->SubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $subCatCount += 1; if($subCatCount > 9) { break; } ?>
          <div class="col-sm-12 col-md-4 mb-3">
          <ul>
            <li><a href="<?php echo e(url('shop?subcat_id='.\ZigKart\Helpers::joinString($subcategory->subcategory_slug))); ?>"><h6><?php echo e($subcategory->subcategory_name); ?></h6></a></li>
            <?php $productCount = 0; ?>
            <?php $__currentLoopData = $subcategory->products(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $productCount += 1; if($productCount > 4) { break; } ?>
                <li><a href="<?php echo e(url('product/'.$product->product_slug)); ?>"><?php echo e($product->product_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(url('shop?subcat_id='.\ZigKart\Helpers::joinString($subcategory->subcategory_slug))); ?>" class="view-more-btn">View More</a></li>
          </ul>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <li> <a href="<?php echo e(URL::to('/categories')); ?>">All Categories <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
  </ul>
       </nav>         
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7">
                  <?php if(count($slideshow['view']) != 0): ?>
    <div id="myCarousel" class="carousel slide carousel-fade position-relative" data-ride="carousel">
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
        <div class="carousel-item <?php if($k == 1): ?> active <?php endif; ?>" data-target="#<?php echo e($slide->slide_id); ?>" data-toggle="modal">
          <img class="first-slide" src="<?php echo e(url('/')); ?>/public/storage/slideshow/<?php echo e($slide->slide_image); ?>" alt="<?php echo e($slide->slide_image); ?>">
          <div class="container">
            <div class="carousel-caption <?php if($slide->slide_text_position != ''): ?> text-<?php echo e($slide->slide_text_position); ?> <?php else: ?> text-left <?php endif; ?>">
              <h1><?php echo e($slide->slide_title); ?></h1>
              <p><?php echo e($slide->slide_desc); ?></p>
              <p><?php if($slide->slide_btn_link != ''): ?><a class="btn button-color button fire float-right" href="<?php echo e($slide->slide_btn_link); ?>" role="button" target="_blank"><?php endif; ?> <?php if($slide->slide_btn_text != ''): ?> <?php echo e($slide->slide_btn_text); ?>

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

            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 sm-d-none md-d-done">
                <div class="may-like">
                    <h2 class="text-black pl-2 text-uppercase">Products You May Like</h2>
                    <?php $__currentLoopData = $likeSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="img-subcate">
                       <a href="<?php echo e(url('shop?subcat_id='.\ZigKart\Helpers::joinString($subcategory->subcategory_slug))); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/subcategory/<?php echo e($subcategory->subcategory_image); ?>" alt="<?php echo e($subcategory->subcategory_name); ?>"></a> 
                       <a href="<?php echo e(url('shop?subcat_id='.\ZigKart\Helpers::joinString($subcategory->subcategory_slug))); ?>"><?php echo e($subcategory->subcategory_name); ?></a> 
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="img-subcate1">
                       <a class="post-by" href="#" data-target="#postBuyerReqModal" data-toggle="modal">Post Buy Requirement</a>
                    </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
</section>

    <?php if(count($categorybox['view']) != 0): ?>
    <div class="container white-box mt-4">
      <h4 class="black mb-2 pb-2"><?php echo e(Helper::translation(2056,$translate)); ?></h4>
      <div class="row">
        <?php $catCount = 0; ?>
        <?php $__currentLoopData = $categorybox['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $catCount += 1; if($catCount > 20) { break; } ?>
        
        <div class="icon-category pt-2 pb-2 col-lg-2 col-md-2 col-sm-4  ml-3 mr-3" align="center">
            <div class="ash-border">
          <a href="<?php echo e(URL::to('/categories')); ?>#<?php echo e($category->category_slug); ?>" title="<?php echo e($category->category_name); ?>">
            <?php if($category->category_image != ''): ?>
            <img src="<?php echo e(url('/')); ?>/public/storage/category/<?php echo e($category->category_image); ?>" alt="<?php echo e($category->category_name); ?>">
            <?php else: ?>
            <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($category->category_name); ?>">
            <?php endif; ?>
          </a>
          </div>
          <p><a href="<?php echo e(URL::to('/categories')); ?>#<?php echo e($category->category_slug); ?>" class="link-color fs14"><?php echo e($category->category_name); ?></a></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if(count($categorybox['view']) != 0): ?>
        <div class="icon-category pt-2 pb-2 col-lg-2 col-md-2 col-sm-4  ml-3 mr-3" align="center">
            <div class="ash-border">
          <a href="<?php echo e(URL::to('/categories')); ?>" title="More">
            <?php if($allsettings->site_more_category != ''): ?>
            <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_more_category); ?>" alt="More">
            <?php else: ?>
            <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
            <?php endif; ?>
          </a>
          </div>
          <p><a href="<?php echo e(URL::to('/categories')); ?>" class="link-color fs14"><?php echo e(Helper::translation(2057,$translate)); ?></a></p>
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
              <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner_one); ?>" alt="<?php echo e($allsettings->site_banner_one_heading); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
              <?php endif; ?>
              <div class="overlay-pro">
                <h2><?php echo e($allsettings->site_banner_one_heading); ?></h2>
                <?php if($allsettings->site_banner_one_link != ''): ?><a href="<?php echo e($allsettings->site_banner_one_link); ?>" class="btn-hover"><?php echo e(Helper::translation(2058,$translate)); ?></a><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
          <div class="basic-padding">
            <div class="image-hover">
              <?php if($allsettings->site_banner_two != ''): ?>
              <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner_two); ?>" alt="<?php echo e($allsettings->site_banner_two_heading); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
              <?php endif; ?>
              <div class="overlay-pro">
                <h2><?php echo e($allsettings->site_banner_two_heading); ?></h2>
                <?php if($allsettings->site_banner_two_link != ''): ?><a href="<?php echo e($allsettings->site_banner_two_link); ?>" class="btn-hover"><?php echo e(Helper::translation(2058,$translate)); ?></a><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
    <div class="col-sm-12">
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="col-sm-12">
      <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <?php endif; ?>
    
     <?php if(count($digital['product']) != 0): ?>
    <div class="container mt-4 mb-4 pt-4 pb-4">
      <div class="row">
        <h4 class="black mb-2 pb-2">Trending Products</h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $x = 1; ?>
            <?php $__currentLoopData = $digital['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$x); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$x); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      
                    <p class="mt-3">
                      <?php echo e($product->product_short_desc); ?>

                    </p>
                    <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                  </div>
                </div>
                <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                  <?php if($product->product_image != ""): ?>
                  <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php else: ?>
                  <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                  <?php $imagecount = count($product->productimages); ?>
                  <?php if($imagecount != 0): ?>
                  <?php $no = 1; ?>
                  <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($no == 1): ?>
                  <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                  <?php $no++; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                </a>
                
                
              </div>
              <div class="product-content">
                <h3 class="title"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                </h3>
                
                <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue text-white" data-send-inquiry-btn seller="<?php echo e($product->user); ?>" buyer="<?php if(Auth::check()): ?> <?php echo e(Auth::user()); ?> <?php endif; ?>" product="<?php echo e($product); ?>">Send Inquiry</button></p>
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
    
    
    <?php if(count($physical['product']) != 0): ?>
    <div class="container pt-3 mt-3 pb-3 mb-3">
      <div class="row">
        <h4 class="black mb-2 pb-2">Recommend Products</h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $z = 1; ?>
            <?php $__currentLoopData = $physical['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$z); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$z); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      
                    <p class="mt-3">
                      <?php echo e($product->product_short_desc); ?>

                    </p>
                    <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                  </div>
                </div>
                <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                  <?php if($product->product_image != ""): ?>
                  <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php else: ?>
                  <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                  <?php $imagecount = count($product->productimages); ?>
                  <?php if($imagecount != 0): ?>
                  <?php $no = 1; ?>
                  <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($no == 1): ?>
                  <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                  <?php $no++; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                </a>
                
                
              </div>
              <div class="product-content">
                <h3 class="title"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                </h3>
                
                <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue text-white" data-send-inquiry-btn seller="<?php echo e($product->user); ?>" buyer="<?php if(Auth::check()): ?> <?php echo e(Auth::user()); ?> <?php endif; ?>" product="<?php echo e($product); ?>">Send Inquiry</button></p>
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
    
   
    <?php if($allsettings->site_home_bottom_banner == 1): ?>
    <div class="container pt-3 mt-3 pb-3 mb-3 p-0">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
          <div class="basic-padding">
            <div class="image-hover">
              <?php if($allsettings->site_banner_three != ''): ?>
              <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner_three); ?>" alt="<?php echo e($allsettings->site_banner_three_heading); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="More">
              <?php endif; ?>
              <div class="overlay-pro">
                <h2><?php echo e($allsettings->site_banner_three_heading); ?></h2>
                <?php if($allsettings->site_banner_three_link != ''): ?><a href="<?php echo e($allsettings->site_banner_three_link); ?>" class="btn-hover"><?php echo e(Helper::translation(2058,$translate)); ?></a><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(count($deal['product']) != 0): ?>
    <div class="container la">
      <div class="row">
        
        <h4 class="black mb-2 pb-2">Hot Products</h4>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php $cj = 1; ?>
            <?php $__currentLoopData = $deal['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="product-grid2">
                <div class="product-image2">
                  <div class="product-hider">
                    <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$cj); ?>" data-type="image" class="quickview">
                      <i class="fa fa-eye"></i>
                      <p><?php echo e(Helper::translation(2060,$translate)); ?><br /><?php echo e(Helper::translation(2061,$translate)); ?></p>
                    </a>
                    <div class="product-images">
                      <?php $imagecount = count($product->productimages); ?>
                      <?php if($imagecount != 0): ?>
                      <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" data-fancybox="quick-view-<?php echo e($product->product_token.$cj); ?>" data-type="image"></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <div class="product-former">
                      <h3><?php echo e($product->product_name); ?></h3>
                      <div class="mt-3"><?php echo e(Helper::translation(2062,$translate)); ?> : <?php if($product->product_stock !=
                        0): ?><span class="theme-color"><?php echo e(Helper::translation(2063,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php else: ?><span class="red-color"><?php echo e(Helper::translation(2064,$translate)); ?>

                          (<?php echo e($product->product_stock); ?>)</span><?php endif; ?></div>
                      <?php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg =
                      "badge badge-secondary"; } ?>
                      <?php if($product->product_condition != ""): ?><div class="mt-2"><?php echo e(Helper::translation(1950,$translate)); ?>

                        : <span class="<?php echo e($badg); ?>"><?php echo e($product->product_condition); ?></span></div><?php endif; ?>
                      
                    <p class="mt-3">
                      <?php echo e($product->product_short_desc); ?>

                    </p>
                    <p><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="btn button-color"><?php echo e(Helper::translation(2065,$translate)); ?></a></p>
                  </div>
                </div>
                <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                  <?php if($product->product_image != ""): ?>
                  <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php else: ?>
                  <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                  <?php $imagecount = count($product->productimages); ?>
                  <?php if($imagecount != 0): ?>
                  <?php $no = 1; ?>
                  <?php $__currentLoopData = $product->productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($no == 1): ?>
                  <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($images->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                  <?php $no++; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                  <?php endif; ?>
                </a>
                
                
                
                
              </div>
              <div class="product-content">
                <h3 class="title"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a>
                </h3>
                
                <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue text-white" data-send-inquiry-btn seller="<?php echo e($product->user); ?>" buyer="<?php if(Auth::check()): ?> <?php echo e(Auth::user()); ?> <?php endif; ?>" product="<?php echo e($product); ?>">Send Inquiry</button></p>
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

<?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyT1 => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($keyT1 > 4) { break; } ?>
    <section class="mb-4 mt-4">
      <div class="container-fluid">
        <div class="bg-white p-3 shadow">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="main-heading text-center">
                <p><?php echo e($category->category_name); ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
              <!-- feature box item-->
              <div class="sm-margin-five-bottom last-paragraph-no-margin text-center">
                <a href="<?php echo e(url('/')); ?>/shop?cat_id=<?php echo e(\ZigKart\Helpers::joinString($category->category_slug)); ?>">
                  <div class="feature-box" style="background:#ff1d25; height: 430px; box-shadow: inset 0 0 50px #963a3a!important;">
                    <div class="direc">
                      <img src="<?php echo e(url('/')); ?>/public/storage/category/<?php echo e($category->category_image); ?>" alt="<?php echo e($category->category_name); ?>">
                      <p><?php echo e($category->category_name); ?></p>
                      <p>View All</p>
                    </div>
                  </div>
                </a>
              </div>
              <!-- end feature box item-->
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9">
              <div class="row">
                  
                <?php 
                     $subCategories = $category->SubCategory->toArray();
                     
                     array_multisort(array_column($subCategories, 'subcategory_name'), SORT_ASC, $subCategories); 
                ?>

                <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- feature box item-->
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 sm-margin-five-bottom mb-3">
                  <div class="feature-box">
                    <a href="<?php echo e(url('/')); ?>/shop?subcat_id=<?php echo e(\ZigKart\Helpers::joinString($subcategory['subcategory_slug'])); ?>">
                      <div class="content medi-box">
                        <div class="madi-text">
                          <div class="text-medium"><?php echo e($subcategory['subcategory_name']); ?></div>
                        </div>
                        <img src="<?php echo e(url('/')); ?>/public/storage/subcategory/<?php echo e($subcategory['subcategory_image']); ?>" alt="<?php echo e($subcategory['subcategory_name']); ?>">
                      </div>
                    </a>
                  </div>
                </div>
                <!-- end feature box item-->
                <?php if($loop->index == 4): ?>
                  <?php break; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- feature box item-->
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 sm-margin-five-bottom mb-3">
                  <div class="feature-box">
                    <a href="<?php echo e(url('sub-category/'.\ZigKart\Helpers::joinString($category->category_slug))); ?>">
                      <div class="content medi-box all">
                        <img src="<?php echo e(url('/')); ?>/public/storage/product/arrow.png" alt="arrow">
                      </div>
                    </a>
                  </div>
                </div>
                <!-- end feature box item-->
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<section class="testimonial text-center">
        <div class="container">
            <h4 class="text-white mb-2 pb-2">Client Testimonials</h4>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="/public/img/ratan.jpeg" class="img-circle img-responsive mb-3"  alt="ratan"/>
                            <p>Venice Red is the best online B2B portal.  It's a company that fulfills all its promises and gives the best services. We have been them for a long time, and they have proved themselves to be the best among all.</p>
                            <h4>Ratan Sriwastawa</h4>
                            <p><i>R.S Trader - Sitamarhi, Bihar</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="/public/img/alight.jpeg" class="img-circle img-responsive mb-3" alt="alight"/>
                            <p>Other companies took a huge amount from us and delivered nothing. But Venice Red provided each and everything that they committed. We are happy to have them as our business consultant, no doubt they are the best in the market.</p>
                            <h4>Amar Jafar</h4>
                            <p><i>A Light - Pune, Maharastra</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="/public/img/jass.jpeg" class="img-circle img-responsive mb-3" alt="jass"/>
                            <p>In our hard times, when we started our business, we were looking for someone to help us in growing our business. Finally, we found Venice Red, trust us; it is the best B2B portal with their low-cost and premium quality services.</p>
                            <h4>Sahil</h4>
                            <p><i>Jass - Badli, Haryana</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="/public/img/raki.jpeg" class="img-circle img-responsive mb-3" alt="raki"/>
                            <p>Venice Red is the best place to run your business. Here you can get all the manufacturers, retailers, suppliers, etc. From GST, PAN, and Income Tax services they offer various services at affordable rates.</p>
                            <h4>Rakibul Molla</h4>
                            <p><i>Rohit Molla Nursery - Kolkata , West Bengal</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="/public/img/ranu.jpeg" class="img-circle img-responsive mb-3" alt="ranu"/>
                            <p>It's amazing to work with Venice Red India. We have been with them for a long and suggested others to try them. No doubt, their services are great, and their staff is very kind and helpful.</p>
                            <h4>Sheikh Mohammad</h4>
                            <p><i>SK traders - Suri , West Bengal</i></p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>

    <div class="container mb-4 pb-4">
      <div class="row">
        <h4 class="black mb-3 pb-3 mt-4 pt-4">Find Supplier By Region</h4>
        <div class="col-md-12">
          <div class="ind-hub">
            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('/')); ?>/regions/<?php echo e(\ZigKart\Helpers::joinString($state->state_name)); ?>" class="ind-hub-items d-flex flex-wrap justify-content-center">
              <div class="ind-hub-img wd100 center">
                <img src="/public/<?php echo e($state->state_image); ?>" alt="<?php echo e($state->state_name); ?>"/>
              </div>
              <div class="ind-hub-title"><?php echo e($state->state_name); ?></div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('/')); ?>/locations" class="ind-hub-items d-flex flex-wrap justify-content-center">
              <div class="ind-hub-img wd100 center">
                <img src="/public/img/more_region.png" alt="more region"/>
              </div>
              <div class="ind-hub-title">View More</div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </main>
  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/index.blade.php ENDPATH**/ ?>