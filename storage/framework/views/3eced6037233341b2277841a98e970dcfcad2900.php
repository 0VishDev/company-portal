<header id="header">
  <div class="container-fluid">
      
    <div class="row pb-1">
      <div id="logo" class="col-lg-2 col-md-2 col-sm-4 pt-1">
        <?php if($allsettings->site_logo != ''): ?>
        <a href="<?php echo e(URL::to('/')); ?>">
            <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"
            alt="<?php echo e($allsettings->site_title); ?>">
        </a>
        <?php endif; ?>
      </div>
      <div class="col-lg-10 col-md-10 col-sm-12">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 sm-d-none pb-1">
          <div class="topmenu">
        <nav class="pull-right" id="nav-menu-container">
          <ul class="nav-menu">
              <li class="menu-has-children">
              <a class="nav-link" href="#">For Buyers <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil">
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#postBuyerReqModal" data-toggle="modal">Post Buy Requirement</a></li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(url('/best-sellers')); ?>">Search Suppliers</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#rqstcall" data-toggle="modal">Request A Callback</a></li>
              </ul>
            </li>
            
            <li class="menu-has-children">
              <a class="nav-link" href="#">For Supplier <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil">
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/search-leads')); ?>">Search Buy Leads</a></li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/freights')); ?>">Get Freight Quotes</a></li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/logistics')); ?>" target="_blank">Logistics</a></li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/logistics/export')); ?>" target="_blank">Export Bill Discounting</a></li>
                <!--<li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/vrtrust')); ?>" target="_blank">VR Trust Certificate</a></li>-->
              </ul>
            </li>
            
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link" href="<?php echo e(url('/new-releases')); ?>"><?php echo e(Helper::translation(2049,$translate)); ?></a>-->
            <!--</li>-->
            <li class="menu-has-children dis1">
              <a class="nav-link" href="#">Business Loan <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <ul class="has-chil">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/lending/business-loan')); ?>" target="_blank">Business Loan</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/lending/business-insurance')); ?>" target="_blank">Business Insurance</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/lending/iso-certification')); ?>" target="_blank">ISO Certification</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/lending/e-filing')); ?>" target="_blank">E-Filing</a></li>
                        </ul>
            </li>
            
              <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/best-sellers')); ?>"><?php echo e(Helper::translation(1973,$translate)); ?></a>
            </li>
             <li class="menu-has-children d-none-desk">
              <a class="nav-link" href="#">Help Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil help">
                <li class="nav-item"><a class="dropdown-item toolfree" href="tel:93540 65594">Call Us: +91 93540 65594</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#feedback" data-toggle="modal">Send Feedback</a></li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/contact')); ?>">Contact Us</a></li>
              </ul>
            </li>
             
            
            <li class="nav-item all-cate">
              <a class="nav-link" href="<?php echo e(URL::to('/categories')); ?>">All Categories</a>
            </li>
            
            <!--<li> <a href="<?php echo e(URL::to('/contact')); ?>"> <?php echo e(Helper::translation(2012,$translate)); ?> </a></li>-->
            <?php if($allsettings->google_translate == 1): ?>
            <li class="menu-has-children d-none-desk"><a href="javascript:void(0)"><span class="fa fa-language"></span>
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
            <li class="log-reg d-none-desk">
                <p><a href="<?php echo e(url('/login')); ?>" class=""><?php echo e(Helper::translation(2041,$translate)); ?></a></p>
                <p><a class="nav-link" href="<?php echo e(url('/register')); ?>">Register free</a></p>
            </li>
            <?php else: ?>
            <li class="menu-has-children d-none-desk"><a href="javascript:void(0)">Hi <?php echo e(Auth::user()->name); ?></a>
              <ul>
                <?php if(Auth::user()->user_type == 'customer'): ?>
                <li><a href="<?php echo e(url('/buyer')); ?>"><?php echo e(Helper::translation(2043,$translate)); ?></a></li>
                <li><a href="<?php echo e(url('/my-profile')); ?>">Edit Profile</a></li>
               
                <?php endif; ?>
                <?php if(Auth::user()->user_type == 'vendor'): ?>
                <li><a href="<?php echo e(url('vendor/dashboard')); ?>" title="">Dashboard</a></li>
                <li><a href="<?php echo e(url('/user?user_id='.Auth::user()->id.'&user_type='.Auth::user()->user_type)); ?>"><?php echo e(Helper::translation(2043,$translate)); ?></a></li>
                <li><a href="<?php echo e(url('/vendor/manage-products')); ?>"><?php echo e(Helper::translation(2046,$translate)); ?></a></li>
                <!--<li><a href="<?php echo e(url('/vendor/recent-leads')); ?>">My Inquiries</a></li>-->
                <li><a href="<?php echo e(url('/vendor/relevant-leads')); ?>">Relevant Leads</a></li>
                <li><a href="<?php echo e(url('/vendor/recent-leads')); ?>">Current Leads</a></li>
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
      
      <div class="col-lg-8 col-md-8 col-sm-12">
        <form id="search-header" method="GET" action="<?php echo e(route('shop')); ?>"  class="search-form-result">
            <div class="search-form position-relative input-group">
              <select class="" name="city" id="home_city" placeholder="Search city name">
                  <option value="All">All India</option>
              </select>
                
    <input type="text" name="search" class="search-input form-control" id="home_search_box" placeholder="Enter product name or seller name..." autocomplete="off" required>
    <div class="input-group-append">
      <button class="btn btn-blue butt-bor" type="submit">
        <i class="fa fa-search"></i> &nbsp;&nbsp;<span class="sm-d-none md-d-done">Search</span>
      </button>
    </div>
            </div>
          </form>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 mt-2 sm-d-none">
        <nav class="pull-right" id="nav-menu-container">
          <ul class="nav-menu">
        
              <li class="menu-has-children">
              <a class="nav-link" href="#">Help Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil help1">
                <li class="nav-item"><a class="dropdown-item toolfree" href="tel:93540 65594">Call Us: +91 93540 65594</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#feedback" data-toggle="modal">Send Feedback</a></li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo e(URL::to('/contact')); ?>">Contact Us</a></li>
              </ul>
            </li>
             
            
            <li class="nav-item all-cate">
              <a class="nav-link" href="<?php echo e(URL::to('/categories')); ?>">All Categories</a>
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
                <p><a href="<?php echo e(url('/login')); ?>" class="btn"><?php echo e(Helper::translation(2041,$translate)); ?></a>/<a class="nav-link" href="<?php echo e(url('/register')); ?>">Register free</a></p>
            </li>
            <?php else: ?>
            <li class="menu-has-children"><a href="javascript:void(0)">Hi <?php echo e(Auth::user()->name); ?></a>
              <ul>
                <?php if(Auth::user()->user_type == 'customer'): ?>
                <li><a href="<?php echo e(url('/buyer')); ?>"><?php echo e(Helper::translation(2043,$translate)); ?></a></li>
                <li><a href="<?php echo e(url('/my-profile')); ?>">Edit Profile</a></li>
               
                <?php endif; ?>
                <?php if(Auth::user()->user_type == 'vendor'): ?>
                <li><a href="<?php echo e(url('vendor/dashboard')); ?>" title="">Dashboard</a></li>
                <li><a href="<?php echo e(url('/user?user_id='.Auth::user()->id.'&user_type='.Auth::user()->user_type)); ?>"><?php echo e(Helper::translation(2043,$translate)); ?></a></li>
                <li><a href="<?php echo e(url('/vendor/manage-products')); ?>"><?php echo e(Helper::translation(2046,$translate)); ?></a></li>
                <!--<li><a href="<?php echo e(url('/vendor/recent-leads')); ?>">My Inquiries</a></li>-->
                <li><a href="<?php echo e(url('/vendor/relevant-leads')); ?>">Relevant Leads</a></li>
                <li><a href="<?php echo e(url('/vendor/recent-leads')); ?>">Current Leads</a></li>
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
  </div>
</header>

<input type="hidden" id="base_path" name="base_path" value="<?php echo e(url('/')); ?>">

<?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/header.blade.php ENDPATH**/ ?>