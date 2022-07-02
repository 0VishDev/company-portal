<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<div class="container ven-dash desk">
		<div class="bg-white pl-2 pt-4 pb-4 pr-4 mb-2">
			<div class="row">
				<div class="col-sm-12">
				<div class="row">
				    <div class="col-sm-9">
				        <h4>Buy Leads: 500</h4>
				    </div>
				    <div class="col-sm-3 pl-5">
				        <h4>Consumed Lead: <?php echo e(count($productInquiry)); ?></h4>
				    </div>
				</div>
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
                                    <tr>
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
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->


<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/consumed-leads.blade.php ENDPATH**/ ?>