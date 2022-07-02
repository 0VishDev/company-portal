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
					<a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<img src="<?php echo e(url('/')); ?>/public/storage/users/1561460997.jpg"
							class="user-avatar rounded-circle" alt="admin" /> </a>
					<div class="user-menu dropdown-menu">
						<a class="nav-link" href="<?php echo e(url('/')); ?>/admin/edit-profile"><i
								class="fa fa-user"></i> My Profile</a>

						<a class="nav-link"
							href="<?php echo e(url('/')); ?>/admin/general-settings"><i
								class="fa fa-cog"></i> Settings</a>
						<a class="nav-link" href="<?php echo e(url('/')); ?>/logout"><i
								class="fa fa-power-off"></i> Logout</a>
					</div>
				</div>
			</div>
		</div>
	</header>


	<div class="container ven-dash">
		<div class="row">
			<div class="col-sm-12 mb-3">
				<div class="premium-bg">
					<h5 class="pb-2">Take your business to new heights with our Service Packages</h5>
					<p>Grow your business online and reach out to more buyers across India</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center mb-4">
				<h5>Benefits of our Service Packages</h5>
			</div>
			<div class="col-sm-12 premium-table mb-3">
				<div class="bg-white shadow">
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th></th>
								<th></th>
								<th class="special-price">Silver Package<br>Special Price</th>
							</tr>
							<tr>
								<th></th>
								<th>Free Listing</th>
								<th>Yearly Plan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Visibility</td>
								<td>Lower</td>
								<td>Higher</td>
							</tr>
							<tr>
								<td>BuyLeads </td>
								<td>Upto 5 Buyer</td>
								<td>520 (10 per week)</td>
							</tr>
							<tr>
								<td>Business Enquiries</td>
								<td>Limited</td>
								<td>Much More</td>
							</tr>
							<tr>
								<td>Online Catelog </td>
								<td>No</td>
								<td>Yes</td>
							</tr>
							<tr>
								<td>Payment Gateway<br>
									<small>(To collect payment from your customer)</small></td>
								<td>No</td>
								<td>Yes</td>
							</tr>
							<tr>
								<td>Preferred Number Service</td>
								<td>No</td>
								<td>Yes</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="total-price mb-3">
			<div class="row">
				<div class="col-sm-8 mb-3">
					<span class="title-price">Special offered Price </span>
					<span class="cross-price"><i class="fa fa-inr" aria-hidden="true"></i> 28,000</span>
					<span class="main-price"><i class="fa fa-inr" aria-hidden="true"></i> 25,000</span>
					<br>
					<small>+18% GST as applicable</small>
				</div>
				<div class="col-sm-4 mb-3">
					<button type="submit" class="btn btn-md btn-success">Buy Now</button>
				</div>
			</div>
		</div>
		<div class="row">
		    <div class="col-sm-12 text-center mb-3">
				<a href="/advertise-us"><button type="submit" class="btn btn-md btn-success">More Packages</button></a>
			</div>
			<div class="col-sm-12 text-center mb-3">
				<h5>Want to know more?</h5>
				<p>Call us at 077-0386-6612</p>
			</div>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/premium-services.blade.php ENDPATH**/ ?>