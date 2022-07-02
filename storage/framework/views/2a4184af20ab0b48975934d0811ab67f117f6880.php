<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(url('/')); ?>/public/storage/users/1561460997.jpg" class="user-avatar rounded-circle" alt="admin" /> </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="<?php echo e(url('/')); ?>/admin/edit-profile"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="<?php echo e(url('/')); ?>/admin/general-settings"><i class="fa fa-cog"></i> Settings</a>
                        <a class="nav-link" href="<?php echo e(url('/')); ?>/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
			
			
			 <div class="container ven-dash">
				 <div class="bg-white pt-4 pl-2 pr-2 text-center">
				 <div class="row">
					 <div class="col-sm-12 mb-3">
					 <h3 class="pb-2">Location Preferences</h3>
						 
					 </div>
						 </div>
				 </div>
				 
				 <form class="bg-white p-3 mt-4 noti">
              <div class="container">
    <div class="row">
    	<div class="col-sm-12 mb-4">
         <div class="heading">
			<h6>Buy leads location Preferences</h6>
			</div>
			<input type="radio" name="location_preferences"> Internation<br>
			<input type="radio" name="location_preferences"> All India<br>
			<input type="radio" name="location_preferences"> Your Preferred Location
          </div>
		<div class="col-sm-12 mb-4">
         <div class="heading">
			<h6>Need Assistance ? 7703866612</h6>
			</div>
          </div>
        </div>
    </div>
</form>
				 </div>
    </div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/location.blade.php ENDPATH**/ ?>