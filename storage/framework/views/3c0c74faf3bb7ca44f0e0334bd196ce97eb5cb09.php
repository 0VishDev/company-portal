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


	<div class="container ven-dash fltr-ld leads">
		<!--<div class="bg-white shadow pt-4 pl-2 pr-2 mb-3">-->
		<!--	<form>-->
		<!--		<div class="row">-->
		<!--			<div class="col-sm-6 col-md-4 mb-1">-->
		<!--				<div class="row">-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Location (1)</h6>-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<span class="float-right">-->
		<!--							<button type="button" class="btn btn-sm" data-target="#locat-fltr" data-toggle="modal">+ More</button>-->
		<!--						</span>-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="radio" name="location"> Recommended-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="radio" name="location"> Uttar Pradesh-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="radio" name="location"> India-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="radio" name="location"> Near Noida-->
		<!--					</div>-->
		<!--					<div class="col-sm-12">-->
		<!--						<div class="fltr-list">-->
		<!--							<ul>-->
		<!--								<li>Near Noida <a href="#"><img src="/public/img/cross.png"></a></li>-->
		<!--							</ul>-->
		<!--						</div>-->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="col-sm-6 col-md-4 mb-1">-->

		<!--				<div class="row">-->
		<!--					<div class="col-sm-7 mb-2">-->
		<!--						<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Categories/Products</h6>-->
		<!--					</div>-->
		<!--					<div class="col-sm-5 mb-2">-->
		<!--						<span class="float-right">-->
		<!--							<button type="button" class="btn btn-sm" data-target="#cate-fltr" data-toggle="modal">+ More</button>-->
		<!--						</span>-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="checkbox" name="product-category"> Designer Kurtis-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="checkbox" name="product-category"> Rayon Kurti-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="checkbox" name="product-category"> Fancy Kurti-->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="col-sm-6 col-md-4 mb-1">-->
		<!--				<div class="row">-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Order Value</h6>-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Lead Type</h6>-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="checkbox" name="Order"> > 50,000-->
		<!--					</div>-->
		<!--					<div class="col-sm-6 mb-2">-->
		<!--						<input type="checkbox" name="Lead"> Bulk-->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->

		<!--			<div class="col-sm-6 mb-1 rec-srch">-->
		<!--				<p><b>Recent Searches :</b> Selfie Kurtis</p>-->
		<!--			</div>-->
		<!--			<div class="col-sm-6 mb-1 rec-srch">-->
		<!--				<p><a href="#">Clear Filter</a></p>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</form>-->
		<!--</div>-->

		    <div class="bg-red shadow p-2 mb-2">
    			<div class="row">
    				<div class="col-sm-9">
    					<h5 class="text-white">
    						Showing other Product Relevent Leads for BuyLeads you might be interested.
    					</h5>
    				</div>
    				<div class="col-sm-3">
    					<span class="float-right">
    						<a href="#cate-fltr" class="text-white" data-target="#cate-fltr" data-toggle="modal"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Filter</a>
    					</span>
    				</div>
    			</div>
    		</div>
    		
    		<?php if(session('success')): ?>
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
		
    		<?php $__currentLoopData = $productInquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		    <?php $mobile = (!empty($inquiry->user->mobile) ? $inquiry->user->mobile : (!empty($inquiry->user->user_phone) ? $inquiry->user->user_phone : $inquiry->mobile)); ?>
        	    <div class="shadow bg-white p-3 mt-3">
        			<div class="row mt-3">
        			    <div class="col-sm-12 lead-lst">
        					<h5>
        					    <?php if($inquiry->is_shortlist == 0): ?>
        						    <span><a href="<?php echo e(url('vendor/inquiry/'.$inquiry->inquiry_id.'/shortlist')); ?>" title="Shortlist"><img src="/public/img/view_Sim_leads.png"></a></span>&emsp;<img src="/public/img/shortlist.png">
        						<?php else: ?>
        						    <span><img src="/public/img/shortlistedStar.png"></span>
        						<?php endif; ?>
        					</h5>
        					</div>
        				<div class="col-sm-12 col-md-8">
        					<div class="row">
        				<div class="col-sm-12 col-md-6 col-lg-6 mb-1">
        				<h6><img src="/public/img/lead-flag.png" alt="India" class="country-flag"> <?php echo e((isset($inquiry->product) ? $inquiry->product->product_name : $inquiry->product_name)); ?></h6>
        					<div class="table-responsive-sm">
          					<table class="table">
        	  					<tr>
                                    <td>I Want to Buy</td>
                                    <td><?php echo e($inquiry->i_want_to_buy); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Quantity</td>
                                    <td><?php echo e($inquiry->quantity); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Requirement Type</td>
                                    <td><?php echo e($inquiry->requirement_type); ?></td>
                                  </tr>
        						</table>
        					</div>
        				</div>
        				<div class="col-sm-12 col-md-6 col-lg-6 mb-1">
        				<h6 class="time"><img src="/public/img/lead-watch.png" alt="India" class="country-flag"> 
        					<span><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->diffForHumans()); ?></span>
        					<span><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('d M, y')); ?></span>
        					</h6>
        					<div class="table-responsive-sm">
          					<table class="table">
        	  					<tr>
                                    <td>Purpose</td>
                                    <td><?php echo e($inquiry->purpose); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Preferred Location</td>
                                    <td><?php echo e($inquiry->location); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Want To Buy</td>
                                    <td><?php echo e($inquiry->want_to_buy); ?></td>
                                  </tr>
        						</table>
        					</div>
        				</div>
        				<?php if(!empty($inquiry->buying_request_description)): ?>
                            <div class="col-sm-12 col-md-12 mb-1">
                              <p>Description: <span><?php echo e($inquiry->buying_request_description); ?></span></p>
                            </div>
                        <?php endif; ?>
        				<div class="col-sm-12 col-md-12 text-center">
            				<div class="con-btn mt-3">
            						<a href="tel:<?php echo e($mobile); ?>">Contact Buyer Now</a>
            					</div>
        					</div>	
        				  </div>
        				</div>
        				
        				<div class="col-sm-12 col-md-4">
                          <div class="row">
                            <div class="col-sm-12 col-md-1 col-lg-1 mb-1 d-xs-none">
                              <span class="vr"></span>
                            </div>
                            <div class="col-sm-12 col-md-11 col-lg-11 mb-1">
                              <h5><img src="/public/img/lead-location.png" alt="India" class="country-flag"> 
                                <span><?php echo e((!empty($inquiry->location) ? $inquiry->location : '-')); ?></span>
                              </h5>
                              <p class="text-red">Buyer's details</p>
                              <p><?php echo e((isset($inquiry->user) ? $inquiry->user->name : $inquiry->name)); ?></p>
                              <div class="table-responsive-sm">
                                <table class="table">
                                  <tr>
                                    <td>Member</td>
                                    <td><?php echo e((isset($inquiry->user) ? \Carbon\Carbon::parse($inquiry->user->created_at)->diffForHumans() : '-')); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Buyer</td>
                                    <td><?php echo e((isset($inquiry->user) ? ($inquiry->user->verified == 1 ? 'Verified' : '-') : '-')); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Mobile</td>
                                    <td><?php echo e((!empty($mobile) ? '*****'.substr($mobile, 6, strlen($mobile)) : '-')); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>******<?php echo e(strtolower(substr($inquiry->email, 5, strlen($inquiry->email)))); ?></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
        			</div>
        		</div>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
    	<!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->


<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/relevant-leads.blade.php ENDPATH**/ ?>