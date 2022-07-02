<header id="header">
  <div class="container-fluid">
    <div class="row">
      <div id="logo" class="col-lg-2 col-md-2 col-sm-4 mt-1">
        <?php if($allsettings->site_logo != ''): ?>
        <a href="<?php echo e(URL::to('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"
            alt="<?php echo e($allsettings->site_title); ?>">
        </a>
        <?php endif; ?>
      </div>
      <!--<div class="col-lg-2 col-md-2 col-sm-4 mt-2 pt-1">-->
      <!--  -->
      <!--</div>-->
      <div class="col-lg-10 col-md-10 col-sm-4 mt-4 sm-d-none">
        <nav class="pull-right" id="nav-menu-container">
          <ul class="nav-menu">
            <!--   <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a></li>-->
            <!---->
            <!--<?php $__currentLoopData = $mainmenu['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
            <!--<li> <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"> <?php echo e($pages->page_title); ?> </a></li>-->
            <!--<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
              <li class="menu-has-children">
              <a class="nav-link" href="#">For Buyers </a>
              <ul class="has-chil">
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#postBuyerReqModal" data-toggle="modal">Post Buy Requirement</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#">Search Suppliers</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#rqstcall" data-toggle="modal">Request A Callback</a></li>
              </ul>
            </li>
            
            <li class="menu-has-children">
              <a class="nav-link" href="#">For Supplier</a>
              <ul class="has-chil">
                <li class="nav-item"><a class="dropdown-item" href="/shop">Display New Products</a></li>
                <li class="nav-item"><a class="dropdown-item" href="/search-leads">Search Buy Leads</a></li>
                <li class="nav-item"><a class="dropdown-item" href="/freights">Get Freight Quotes</a></li>
                <li class="nav-item"><a class="dropdown-item" href="/logistics" target="_blank">Venicered Logistics</a></li>
                <li class="nav-item"><a class="dropdown-item" href="/logistics/export" target="_blank">Export Bill Discounting</a></li>
                <li class="nav-item"><a class="dropdown-item" href="/vr-trust">VR Trust Certificate</a></li>
              </ul>
            </li>
            
              <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/best-sellers')); ?>"><?php echo e(Helper::translation(1973,$translate)); ?></a>
            </li>
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link" href="<?php echo e(url('/new-releases')); ?>"><?php echo e(Helper::translation(2049,$translate)); ?></a>-->
            <!--</li>-->
            <li class="menu-has-children dis">
              <a class="nav-link" href="#">Business Loan</a>
                      <ul class="has-chil">
                        <li class="nav-item"><a class="nav-link" href="/venicered-lending/business-loan" target="_blank">Business Loan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/venicered-lending/business-insurance" target="_blank">Business Insurance</a></li>
                        <li class="nav-item"><a class="nav-link" href="/venicered-lending/iso-certification" target="_blank">ISO Certification</a></li>
                        </ul>
            </li>
            
            <!--<?php if($allsettings->site_blog_display == 1): ?>-->
            <!--<li class="nav-item"> <a class="nav-link" href="<?php echo e(URL::to('/blog')); ?>"> <?php echo e(Helper::translation(1978,$translate)); ?> </a></li>-->
            <!--<?php endif; ?>-->
              
              
           
            <!--<li class=""> <a href="<?php echo e(URL::to('/distributorships')); ?>"> Distributorships </a></li>-->
            
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link" href="<?php echo e(url('/start-sellings')); ?>"><span style="color:#ff0000;font-weight: 600;">S</span>tart Selling</a>-->
            <!--</li>-->
        
              <li class="menu-has-children">
              <a class="nav-link" href="#">Help Us </a>
              <ul class="has-chil help">
                <li class="nav-item"><a class="dropdown-item" href="tel:18008893978">Call Us: +91 1800 889 3978</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#">Send Feedback</a></li>
                <li class="nav-item"><a class="dropdown-item" href="/contact">Contact Us</a></li>
              </ul>
            </li>
             
            
            <li class="nav-item all-cate">
              <a class="nav-link" href="/categories">All Categories</a>
            </li>
            
            <!--<li> <a href="<?php echo e(URL::to('/contact')); ?>"> <?php echo e(Helper::translation(2012,$translate)); ?> </a></li>-->
            <?php if($allsettings->google_translate == 1): ?>
            <li class="menu-has-children"><a href="javascript:void(0)"><span class="fa fa-language"></span>
                <?php echo e($language_title); ?></a>
              <ul>
                <?php $__currentLoopData = $languages['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a
                    href="<?php echo e(URL::to('/translate')); ?>/<?php echo e($language->language_code); ?>"><?php echo e($language->language_name); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(Auth::guest()): ?>
            <li class="log-reg">
                <p><a href="<?php echo e(url('/login')); ?>" class="btn"><?php echo e(Helper::translation(2041,$translate)); ?></a></p>
                <p><a class="nav-link" href="<?php echo e(url('/register')); ?>">Register free</a></p>
            </li>
            <?php else: ?>
            <li class="menu-has-children"><a href="javascript:void(0)">Hi <?php echo e(Auth::user()->name); ?></a>
              <ul>
                <?php if(Auth::user()->user_type == 'customer'): ?>
                <li><a href="<?php echo e(url('/my-profile')); ?>"><?php echo e(Helper::translation(2043,$translate)); ?></a></li>
               
                <?php endif; ?>
                <?php if(Auth::user()->user_type == 'vendor'): ?>
                <li><a href="<?php echo e(url('vendor/dashboard')); ?>" title="">Dashboard</a></li>
                <li><a href="<?php echo e(url('/user?user_id='.Auth::user()->id.'&user_type='.Auth::user()->user_type)); ?>"><?php echo e(Helper::translation(2043,$translate)); ?></a></li>
                <li><a href="<?php echo e(url('/vendor/manage-products')); ?>"><?php echo e(Helper::translation(2046,$translate)); ?></a></li>
                <!--<li><a href="<?php echo e(url('/vendor/recent-leads')); ?>">My Inquiries</a></li>-->
                <li><a href="<?php echo e(url('/vendor/relevant-leads')); ?>">Post buy Leads</a></li>
                <li><a href="<?php echo e(url('/vendor/recent-leads')); ?>">New buy Leads</a></li>
            </li>
            
            <?php endif; ?>
            <li><a href="<?php echo e(url('/logout')); ?>"><?php echo e(Helper::translation(2048,$translate)); ?></a></li>
          </ul>
          </li>
          <?php endif; ?>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>
  </div>
  <div class="navbar navbar-expand-lg category-bar row">
    <div class="container-fluid">
      <div class="col-lg-2 col-md-12 col-sm-12">
        <button type="button" id="sidebarCollapse" class="btn btn-cate">
          <i class="fa fa-bars"></i>
          <span><?php echo e(Helper::translation(1932,$translate)); ?></span>
        </button>
        <!--<button class="btn button-color d-inline-block d-lg-none ml-auto pull-right" type="button"-->
        <!--  data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"-->
        <!--  aria-expanded="false" aria-label="Toggle navigation">-->
        <!--  <i class="fa fa-bars"></i>-->
        <!--</button>-->
        <!--<button class="btn btn-cate d-inline-block d-lg-none ml-auto mmiddle pull-right" type="button"-->
        <!--  data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"-->
        <!--  aria-expanded="false" aria-label="Toggle navigation">-->
        <!--  <i class="fa fa-bars"></i>-->
        <!--</button>-->
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent2">-->
        <!--  <ul class="nav navbar-nav">-->
        <!--    <li class="nav-item active">-->
        <!--      <a class="nav-link" href="<?php echo e(url('/best-sellers')); ?>"><?php echo e(Helper::translation(1973,$translate)); ?></a>-->
        <!--    </li>-->
        <!--    <li class="nav-item">-->
        <!--      <a class="nav-link" href="<?php echo e(url('/new-releases')); ?>"><?php echo e(Helper::translation(2049,$translate)); ?></a>-->
        <!--    </li>-->
        <!--    <li class="nav-item">-->
        <!--      <a class="nav-link" href="<?php echo e(url('/top-deals')); ?>"><?php echo e(Helper::translation(2050,$translate)); ?></a>-->
        <!--    </li>-->
        <!--    <li class="nav-item">-->
        <!--      <a class="nav-link" href="<?php echo e(url('/start-sellings')); ?>"><?php echo e(Helper::translation(2051,$translate)); ?></a>-->
        <!--    </li>-->
        <!--    <?php if($allsettings->site_blog_display == 1): ?>-->
        <!--    <li class="nav-item"> <a class="nav-link" href="<?php echo e(URL::to('/blog')); ?>"> <?php echo e(Helper::translation(1978,$translate)); ?> </a></li>-->
        <!--    <?php endif; ?>-->
        <!--  </ul>-->
        <!--</div>-->
      </div>
      
    </div>
    </nav>
    <nav id="sidebar">
      <div id="dismiss">
        <i class="fa fa-arrow-left"></i>
      </div>
      <div class="sidebar-header">
        <h3><?php echo e(Helper::translation(1932,$translate)); ?></h3>
      </div>
      
  <ul class="menu">
    <?php $catCount = 0; ?>
    <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $catCount += 1; if($catCount > 6) { break; } ?>
    <li>
        <a href="<?php echo e(url('categories/'.$category->cat_id)); ?>">
            <?php if($category->category_image != ''): ?>
        <img src="<?php echo e(url('/')); ?>/public/storage/category/<?php echo e($category->category_image); ?>" alt="<?php echo e($category->category_name); ?>" >
        <?php else: ?>
        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($category->category_name); ?>">
        <?php endif; ?>
            <?php echo e($category->category_name); ?></a>
      <div class="megadrop">
     <div class="row">
        <?php $subCatCount = 0; ?>
        <?php $__currentLoopData = $category->SubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $subCatCount += 1; if($subCatCount > 6) { break; } ?>
          <div class="col-sm-12 col-md-6 mb-3">
          <ul>
            <li><a href="<?php echo e(url('shop?subcat_id='.$subcategory->subcat_id)); ?>"><h6><?php echo e($subcategory->subcategory_name); ?></h6></a></li>
            <?php $productCount = 0; ?>
            <?php $__currentLoopData = $subcategory->products(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $productCount += 1; if($productCount > 4) { break; } ?>
                <li><a href="<?php echo e(url('product/'.$product->product_slug)); ?>"><?php echo e($product->product_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(url('shop?cat_id='.$subcategory->cat_id)); ?>" class="view-more-btn">View More</a></li>
          </ul>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <li> <a href="/categories">All Categories</a></li>
  </ul>
      
      
      <!--<ul class="list-unstyled components">-->
      <!--  <?php $__currentLoopData = $categories['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
      <!--  <li>-->
      <!--    <a <?php if(count($menu->subcategory) != 0): ?> href="#menu-<?php echo e($menu->cat_id); ?>" data-toggle="collapse"-->
      <!--      aria-expanded="false" class="dropdown-toggle" <?php else: ?>-->
      <!--      href="<?php echo e(URL::to('/shop/category')); ?>/<?php echo e($menu->category_slug); ?>" <?php endif; ?>>-->
      <!--      <?php if($menu->category_image != ''): ?>-->
      <!--      <img src="<?php echo e(url('/')); ?>/public/storage/category/<?php echo e($menu->category_image); ?>"-->
      <!--        alt="<?php echo e($menu->category_name); ?>" class="menu-icon">-->
      <!--      <?php else: ?>-->
      <!--      <i class="fa fa-paper-plane"></i>-->
      <!--      <?php endif; ?>-->
      <!--      <span-->
      <!--        onclick="window.location.href='<?php echo e(URL::to('/shop/category')); ?>/<?php echo e($menu->category_slug); ?>'"><?php echo e($menu->category_name); ?></span>-->
      <!--    </a>-->
      <!--    <?php if(count($menu->subcategory) != 0): ?>-->
      <!--    <ul class="collapse list-unstyled" id="menu-<?php echo e($menu->cat_id); ?>">-->
      <!--      <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
      <!--      <li>-->
      <!--        <a-->
      <!--          href="<?php echo e(URL::to('/shop/subcategory')); ?>/<?php echo e($sub_category->subcategory_slug); ?>"><?php echo e($sub_category->subcategory_name); ?></a>-->
      <!--      </li>-->
      <!--      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
      <!--    </ul>-->
      <!--    <?php endif; ?>-->
      <!--  </li>-->
      <!--  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
      <!--</ul>-->
  </div>
</header>

<input type="hidden" id="base_path" name="base_path" value="<?php echo e(url('/')); ?>">

<?php /**PATH /home/inforrmz/venicered.com/resources/views/header.blade.php ENDPATH**/ ?>