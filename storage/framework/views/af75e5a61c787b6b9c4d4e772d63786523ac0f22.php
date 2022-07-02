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

        <?php if(in_array('dashboard',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin')); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
	        </li>
        <?php endif; ?>

        <?php if(in_array('inquiries',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown <?php echo e(( ( \Request::is('admin/callbacks') || \Request::is('admin/inquiries') || \Request::is('admin/leads') || \Request::is('admin/business-enquiries') || \Request::is('admin/modal_enquiries') || \Request::is('admin/freights') || \Request::is('admin/business-contact') || \Request::is('admin/seller-contact') || \Request::is('admin/contact') || \Request::is('admin/feedback') || \Request::is('admin/distributorships') || \Request::is('admin/jobs') || \Request::is('admin/e-filings') || \Request::is('admin/logistics') || \Request::is('admin/export-billing') || \Request::is('admin/services-dealing')) ? 'current show' : '')); ?>">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>All Inquiries</a>
	          <ul class="sub-menu children dropdown-menu <?php echo e(( ( \Request::is('admin/callbacks') || \Request::is('admin/inquiries') || \Request::is('admin/leads') || \Request::is('admin/business-enquiries') || \Request::is('admin/modal_enquiries') || \Request::is('admin/freights') || \Request::is('admin/business-contact') || \Request::is('admin/seller-contact') || \Request::is('admin/contact') || \Request::is('admin/feedback') || \Request::is('admin/distributorships') || \Request::is('admin/jobs') || \Request::is('admin/e-filings') || \Request::is('admin/logistics') || \Request::is('admin/export-billing') || \Request::is('admin/services-dealing')) ? 'show' : '')); ?>">
	            <li class="<?php echo e(( ( \Request::is('admin/callbacks')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/callbacks')); ?>"> Callbacks </a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/inquiries')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/inquiries')); ?>">Inquiries </a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/leads')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/leads')); ?>"> Seller Leads </a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/business-enquiries')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/business-enquiries')); ?>"> Business Enquiries</a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/modal_enquiries')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/modal_enquiries')); ?>"> Popup Enquiries</a>
	            <li class="<?php echo e(( ( \Request::is('admin/freights')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/freights')); ?>"> Freights Enquiries</a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/business-contact')) ? 'current1' : '')); ?>">
	              <i class="menu-icon fa fa-address-book-o"></i><a href="<?php echo e(url('/admin/business-contact')); ?>"> Business Contact Enquiries</a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/seller-contact')) ? 'current1' : '')); ?>">
	              <i class="menu-icon fa fa-address-book-o"></i><a href="<?php echo e(url('/admin/seller-contact')); ?>"> Seller Contact Enquiries</a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/contact')) ? 'current1' : '')); ?>">
	              <i class="menu-icon fa fa-address-book-o"></i><a href="<?php echo e(url('/admin/contact')); ?>"> Contact Enquiries</a>
	            </li>
	            <li class="<?php echo e(( ( \Request::is('admin/feedback')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/feedback')); ?>"> FeedBack Enquiries</a></li>
	            <li class="<?php echo e(( ( \Request::is('admin/distributorships')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/distributorships')); ?>"> Distributorships Enquiries</a></li>
	            <li class="<?php echo e(( ( \Request::is('admin/jobs')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/jobs')); ?>"> Jobs Enquiries</a></li>
	            <li class="<?php echo e(( ( \Request::is('admin/e-filings')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/e-filings')); ?>"> E-Filings Enquiries</a></li>
	            <li class="<?php echo e(( ( \Request::is('admin/logistics')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/logistics')); ?>"> Logistics Enquiries</a></li>
	            <li class="<?php echo e(( ( \Request::is('admin/export-billing')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/export-billing')); ?>"> Export Enquiries</a></li>
	            <li class="<?php echo e(( ( \Request::is('admin/services-dealing')) ? 'current1' : '')); ?>"><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/services-dealing')); ?>"> Services Provider</a></li>
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('settings', $avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Settings</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/general-settings')); ?>">General Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/social-settings')); ?>">Social Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/email-settings')); ?>">Email Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/payment-settings')); ?>">Payment Settings</a></li>
	            
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/color-settings')); ?>">Color Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/media-settings')); ?>">Media Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/currency-settings')); ?>">Currency Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/payment-settings')); ?>">Payment Settings</a></li>
	            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/preferred-settings')); ?>">Preferred Settings</a></li>
	            
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('block-section',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Block Section</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/home-section')); ?>">Homepage Section</a></li>
	            <li><i class="fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/footer-section')); ?>">Footer Section</a></li>
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('user-roles',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>User Roles</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/sub-administrator')); ?>">Sub Administrator</a></li>
	            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/customer')); ?>">Buyer</a></li>
	            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/vendor')); ?>">Seller</a></li>
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('locations',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-flag"></i>Locations</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="fa fa-flag"></i><a href="<?php echo e(url('/admin/country-settings')); ?>"> Country</a></li>
	            <li><i class="fa fa-flag"></i><a href="<?php echo e(url('/admin/state-settings')); ?>"> State</a></li>
	            <li><i class="fa fa-flag"></i><a href="<?php echo e(url('/admin/city-settings')); ?>"> City</a></li>
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('manage-categories',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Manage Categories</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/category')); ?>">Category</a></li>
	            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/sub-category')); ?>">Sub Category</a></li>
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('products',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Products</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/products')); ?>">Manage Products</a></li>
	            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/attribute-type')); ?>">Attribute Type</a></li>
	            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/attribute-value')); ?>">Attribute Value</a></li>
	            
	          </ul>
	        </li>
        <?php endif; ?>
        
        <?php if(in_array('blog',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Blog</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/blog-category')); ?>">Category</a></li>
	            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/post')); ?>">Post</a></li>
	          </ul>
	        </li>
        <?php endif; ?>

        <?php if(in_array('pages',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin/pages')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/pages')); ?>"> <i class="menu-icon fa fa-file-text-o"></i>Pages </a>
	        </li>
        <?php endif; ?>

        <?php if(in_array('visitors',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin/visitors')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/visitors')); ?>"> <i class="menu-icon fa fa-user-o"></i>Visitors </a>
	        </li>
	    <?php endif; ?>

        <?php if(in_array('slideshow',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin/slideshow')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/slideshow')); ?>"> <i class="menu-icon fa fa-image"></i>Slideshow </a>
	        </li>
	    <?php endif; ?>

        <?php if(in_array('package-tags',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/package-tag')); ?>"> <i class="menu-icon fa fa-list"></i>Package Tag </a>
	        </li>
	    <?php endif; ?>

        <?php if(in_array('advertise',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin/service-providers')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/service-providers')); ?>"> <i class="menu-icon fa fa-list"></i>Advertise </a>
	        </li>
	    <?php endif; ?>

	    <?php if(in_array('service-providers',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin/services')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/services')); ?>"> <i class="menu-icon fa fa-list"></i> Services Providers</a>
	        </li>
	    <?php endif; ?>

	    <?php if(in_array('vr-trust',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="<?php echo e(( ( \Request::is('/admin/vr-trust')) ? 'current' : '')); ?>">
	          <a href="<?php echo e(url('/admin/vr-trust')); ?>"> <i class="menu-icon fa fa-list"></i> VR Trust</a>
	        </li>
	    <?php endif; ?>

	    <?php if(in_array('profile-sheet',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i> Profile Sheet</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="menu-icon fa fa-list"></i><a href="<?php echo e(url('/admin/b2b-sheet')); ?>"> B2B</a></li>
	            <li><i class="menu-icon fa fa-list"></i><a href="<?php echo e(url('/admin/distributorship-sheet')); ?>">  Distributorship</a></li>
	          </ul>
	        </li>
        <?php endif; ?>
        
         <?php if(in_array('project-status',$avilable) || Auth::user()->user_type == 'admin'): ?>
	        <li class="menu-item-has-children dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i> Project Status</a>
	          <ul class="sub-menu children dropdown-menu">
	            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo e(url('/admin/paymentsheet')); ?>"> Paymentsheet</a></li>
	            <li><i class="menu-icon fa fa-deaf"></i><a href="<?php echo e(url('/admin/delivery-status')); ?>"> Delivery Status</a></li>
	          </ul>
	        </li>
        <?php endif; ?>
        
        
        
        
        
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
</aside>
<input type="hidden" id="base_path" name="base_path" value="<?php echo e(url('/')); ?>"><?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/admin/navigation.blade.php ENDPATH**/ ?>