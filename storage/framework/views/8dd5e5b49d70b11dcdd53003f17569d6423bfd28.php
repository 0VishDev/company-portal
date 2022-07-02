<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<div class="container ven-dash fltr-ld leads">
		    <div class="bg-red shadow p-2 mb-2">
    			<div class="row">
    				<div class="col-sm-9">
    					<h5 class="text-white">
    						Showing other Product Relevent Leads for BuyLeads you might be interested.
    					</h5>
    				</div>
    				<!--<div class="col-sm-3">-->
    				<!--	<span class="float-right">-->
    				<!--		<a href="#cate-fltr" class="text-white" data-target="#cate-fltr" data-toggle="modal"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Filter</a>-->
    				<!--	</span>-->
    				<!--</div>-->
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
        					    <?php if(!isset($inquiry->buy_inquiry_seller) || $inquiry->buy_inquiry_seller->is_shortlist == 0): ?>
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
            					    <?php if(isset($inquiry->product) && $inquiry->product->user_id == Auth::user()->id): ?>
            				            <a href="#" data-target="#viewLeadModal<?php echo e($inquiry->inquiry_id); ?>" data-toggle="modal">View Buyer Detail</a>
            				        <?php else: ?>
            				            <a href="#" data-target="#viewLeadModal<?php echo e($inquiry->inquiry_id); ?>" data-toggle="modal">Contact Buyer Now</a>
            				        <?php endif; ?>
            					</div>
        					</div>	
        				  </div>
        				</div>
        				
        				<div class="col-sm-12 col-md-4">
                          <div class="row">
                            <div class="col-sm-12 col-md-1 col-lg-1 mb-1 d-xs-none">
                              <span class="vr"></span>
                            </div>
                            <div class="col-sm-12 col-md-10 col-lg-10 mb-1">
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
        		
        		<div class="modal fade show" id="viewLeadModal<?php echo e($inquiry->inquiry_id); ?>" aria-modal="true">
                    <div class="modal-dialog <?php echo e((isset($inquiry->product) && $inquiry->product->user_id == Auth::user()->id ? 'modal-md' : 'modal-sm')); ?> modal-dialog-centered " role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-red">
                                <h4 class="mb-0 text-white ml-5">Your Buy Lead</small></h4>
                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body pricing">
                                <?php if(isset($inquiry->product) && $inquiry->product->user_id == Auth::user()->id): ?>
                                    <div class="row">
                            		    <div class="col-md-12">
                            				<table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                      <td>Buyer Name</td>
                                                        <td><?php echo e((isset($inquiry->user) ? $inquiry->user->name : $inquiry->name)); ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Buyer</td>
                                                        <td><?php echo e((isset($inquiry->user) ? ($inquiry->user->verified == 1 ? 'Verified' : '-') : '-')); ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Mobile</td>
                                                        <td><?php echo e((!empty($mobile) ? $mobile : '-')); ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Email</td>
                                                        <td><?php echo e($inquiry->email); ?></td>
                                                     </tr>
                                                     <td>Company Name</td>
                                                        <td><?php echo e((isset($inquiry->user) ? $inquiry->user->company_name : $inquiry->company_name)); ?></td>
                                                      </tr>
                                               </tbody>
                                            </table>
                            			</div>
                            		</div>
                                <?php else: ?>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-5 mb-lg-0">
                                                    <div class="card-body">
                                                        <h4 class="card-price text-center text-red"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e(number_format($siteSetting->site_product_inquiry_fee, 2)); ?><span class="period">/lead</span></h4>
                                                        
                                                        <ul class="fa-ul">
                                                            <li><span class="fa-li"><img src="/public/img/lead-one.png"></span>Single Buy Lead</li>
                                                            <li><span class="fa-li"><img src="/public/img/lead-userverified.png"></span>Verified Buyer</li>
                                                            <li><span class="fa-li"><img src="/public/img/lead-phone.png"></span>Support</li>
                                                            <li><span class="fa-li"><img src="/public/img/lead-gift.png"></span>Purchase Buy Lead And Get Welcome Gift</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-block bg-red text-uppercase">Buy Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
    	<!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->


<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/vendor-dash/relevant-leads.blade.php ENDPATH**/ ?>