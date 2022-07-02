<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="container ven-dash desk">
		    <div class="bg-white p-2 mb-2">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-borderless">
<thead>
<tr>
  <th scope="col" class="desk-img">
    <span style="color:#ff1d25;">Account Manager:</span> Ratan Srivastava  
    <span><a href="sms:9521508406"><img src="/public/img/desk-sms.png"></a></span>
    <span><a href="mailto:inquiry@venicered.com"><img src="/public/img/desk-email.png"></a></span>
  </th>
</tr>
</thead>
</table>
					</div>
			</div>
        </div>
        
        <?php $mobile = (!empty($inquiry->user->mobile) ? $inquiry->user->mobile : (!empty($inquiry->user->user_phone) ? $inquiry->user->user_phone : $inquiry->mobile)); ?>
        <div class="shadow bg-white p-3 mt-3 ven-dash fltr-ld leads  ">
			<div class="row mt-3">
				<div class="col-sm-12 col-md-8">
					<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 mb-1">
				<h6><img src="/public/img/lead-flag.png" alt="India" class="country-flag">  <?php echo e((isset($inquiry->product) ? $inquiry->product->product_name : $inquiry->product_name)); ?></h6>
					<div class="table-responsive-sm">
  					<table class="table">
	  					<tbody>
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
						</tbody></table>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 mb-1">
				<h6 class="time"><img src="/public/img/lead-watch.png" alt="India" class="country-flag"> 
					<span><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->diffForHumans()); ?></span>
			        <span><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('d M, y')); ?></span>
					</h6>
					<div class="table-responsive-sm">
  					<table class="table">
	  					<tbody>
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
						</tbody></table>
					</div>
				</div>
				    <?php if(!empty($inquiry->buying_request_description)): ?>
                        <div class="col-sm-12 col-md-12 mb-1">
                          <p>Description: <span><?php echo e($inquiry->buying_request_description); ?></span></p>
                        </div>
                    <?php endif; ?>
                        <div class="col-sm-12 col-md-12 text-center">
    				<div class="rpl-btn mt-3">
    						<a href="mailto: <?php echo e($inquiry->email); ?>">Reply</a>
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
                            <td>Member:</td>
                            <td><?php echo e((isset($inquiry->user) ? \Carbon\Carbon::parse($inquiry->user->created_at)->diffForHumans() : 'Venice Red')); ?></td>
                          </tr>
                          <tr>
                            <td>Buyer:</td>
                            <td><?php echo e((isset($inquiry->user) ? ($inquiry->user->verified == 1 ? 'Verified' : '-') : 'Verified')); ?></td>
                          </tr>
                          <tr>
                            <td>Mobile:</td>
                            <td><?php echo e($mobile); ?></td>
                          </tr>
                          <tr>
                            <td>Email:</td>
                            <td><?php echo e($inquiry->email); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
			</div>
		</div>
    </div>
    
    <?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/vendor-dash/view-lead.blade.php ENDPATH**/ ?>