<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
          <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php if($allsettings->site_logo != ''): ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="180"/></a>
                <?php else: ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,10)); ?></a>
                <?php endif; ?>
                <?php if($allsettings->site_favicon != ''): ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="24"/></a>
                <?php else: ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,1)); ?></a>
                <?php endif; ?>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   <?php if(in_array('dashboard',$avilable)): ?>
                   <li>
                        <a href="<?php echo e(url('/admin')); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/admin/callbacks')); ?>"> <i class="menu-icon fa fa-envelope"></i>Callbacks </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/admin/inquiries')); ?>"> <i class="menu-icon fa fa-envelope"></i>Inquiries </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/admin/leads')); ?>"> <i class="menu-icon fa fa-envelope"></i>Seller Leads </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('settings',$avilable)): ?>                 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/general-settings')); ?>">General Settings</a></li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('block-section',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Block Section</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/home-section')); ?>">Homepage Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/footer-section')); ?>">Footer Section</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->id == 1): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>User Roles</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/customer')); ?>">Buyer</a></li>
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/vendor')); ?>">Seller</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('settings',$avilable)): ?>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-flag"></i>Locations</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-flag"></i><a href="<?php echo e(url('/admin/country-settings')); ?>"> Country</a></li>
                                <li><i class="fa fa-flag"></i><a href="<?php echo e(url('/admin/state-settings')); ?>"> State</a></li>
                                <li><i class="fa fa-flag"></i><a href="<?php echo e(url('/admin/city-settings')); ?>"> City</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(in_array('manage-categories',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Manage Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/category')); ?>">Category</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/sub-category')); ?>">Sub Category</a></li>
                         </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('products',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/products')); ?>">Manage Products</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/attribute-type')); ?>">Attribute Type</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/attribute-value')); ?>">Attribute Value</a></li>
                             
                         </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($allsettings->site_blog_display == 1): ?>
                    <?php if(in_array('blog',$avilable)): ?> 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Blog</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/blog-category')); ?>">Category</a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/post')); ?>">Post</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(in_array('pages',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/pages')); ?>"> <i class="menu-icon fa fa-file-text-o"></i>Pages </a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(url('/admin/business-enquiries')); ?>"> <i class="menu-icon fa fa-file-text-o"></i>Business Enquiries</a>
                    </li>
                    <?php if(in_array('slideshow',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/slideshow')); ?>"> <i class="menu-icon fa fa-image"></i>Slideshow </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('contact',$avilable)): ?>                                      
                    <li>
                        <a href="<?php echo e(url('/admin/contact')); ?>"> <i class="menu-icon fa fa-address-book-o"></i>Contact </a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(url('/admin/service-providers')); ?>"> <i class="menu-icon fa fa-list"></i>Advertise </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/admin/services')); ?>"> <i class="menu-icon fa fa-list"></i> Services Providers</a>
                    </li>
                    
                    </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    
    <input type="hidden" id="base_path" name="base_path" value="<?php echo e(url('/')); ?>"><?php /**PATH /home/inforrmz/venicered.com/resources/views/admin/navigation.blade.php ENDPATH**/ ?>