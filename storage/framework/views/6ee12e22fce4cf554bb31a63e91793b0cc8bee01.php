<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<div class="container ven-dash desk">
		<div class="bg-white p-2 mb-2">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-borderless table-res">
                        <thead>
                        <tr>
                          <th scope="col">Buy Leads: <?php echo e(count($productInquiry)); ?></th>
                          <th scope="col"><?php if(count(\Auth::user()->package_tags) > 0): ?>
                        	     <?php $__currentLoopData = \Auth::user()->package_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($packageTag->service_provider->provider_image); ?>" width="30px" alt="<?php echo e($packageTag->service_provider->provider_name); ?>"> <?php echo e($packageTag->service_provider->provider_name); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?></th>
                          <th scope="col"><a href="#download-inq" style="color:#ff1d25;" data-target="#download-inq" data-toggle="modal" class="dnl-inq">Download Inquiries</a></th>
                          <th scope="col" class="desk-img">
                              <span style="color:#ff1d25;">Account Manager:</span> Ratan Srivastava  
                              <span><a href="sms:9521508406"><img src="/public/img/desk-sms.png" alt="SMS"></a></span>
                              <span><a href="mailto:inquiry@venicered.com"><img src="<?php echo e(url('/')); ?>/public/img/desk-email.png" alt="Email"></a></span>
                              </th>
                        </tr>
                        </thead>
                    </table>
				</div>
			</div>
        </div>
            <div class="lead-list">
            <div class="row">
				<div class="col-sm-12">
					<table class="table table-res">
                        <thead style="background-color: #b1b1b1;">
                        <tr>
                          <th scope="col">Buyer</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Location</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Date/Time</th>
                        </tr>
                        </thead>
                            <tbody>
                                 <?php $__currentLoopData = $productInquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location.href = '<?php echo e(url('/')); ?>/vendor/view-lead/<?php echo e($inquiry->inquiry_id); ?>';" style='cursor: pointer;'>
                                        <td><?php echo e($inquiry->name); ?></td>
                                        <td><?php echo e($inquiry->company_name); ?></td>
                                        <td><?php echo e($inquiry->location); ?></td>
                                        <td><?php echo e($inquiry->product_name); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                        </table>
					</div>
			</div>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<script>
    var inquiries = [];
    <?php $__currentLoopData = $productInquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        var inquiry = {};
        inquiry.name = '<?php echo e($inquiry->name); ?>';
        inquiry.company_name = '<?php echo e($inquiry->company_name); ?>';
        inquiry.location_name = '<?php echo e($inquiry->location); ?>';
        inquiry.product_name = '<?php echo e($inquiry->product_name); ?>';
        inquiry.created_at_formatted = '<?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A')); ?>';
        inquiry.created_at = '<?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('Y-m-d')); ?>';
        
        inquiries.push(inquiry);
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</script>

<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/lead-desk.blade.php ENDPATH**/ ?>