<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="container ven-dash">
		<div class="bg-white shadow pt-4 pl-2 pr-2">
			<div class="row">
				<div class="col-sm-6 mb-3">
					<h5 class="pb-2">Contact Profile</h5>
					<p>Complete your profile to attract genuine buyers</p>
				</div>
			</div>
		</div>

		<div class="container mt-4">
		    <?php if(session('success')): ?>
               <div class="col-sm-12 col-md-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="col-sm-12 col-md-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
		    <form class="form" action="<?php echo e(url('vendor/company-detail/update')); ?>" method="POST" enctype="multipart/form-data">
		        <?php echo csrf_field(); ?>
			    <div class="row">
				
				<!--/col-3-->
				<div class="col-sm-12">
					<div class="form-group col-sm-6">
						<div class="">
							<label for="first_name">
								<h4>First name</h4>
							</label>
							<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo e($user->first_name); ?>" required>
							<?php if($errors->has('first_name')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('first_name')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					<div class="form-group col-sm-6">

						<div class="">
							<label for="last_name">
								<h4>Last name</h4>
							</label>
							<input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo e($user->last_name); ?>" required>
							<?php if($errors->has('last_name')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('last_name')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>

					
					

					<div class="form-group col-sm-6">
						<div class="">
							<label for="Company_Name">
								<h4> Company Name <small> (As Per Reg. Document)</small></h4>
							</label>
							<input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo e($user->company_name); ?>">
							<?php if($errors->has('company_Name')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('company_Name')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>

					<div class="form-group col-sm-6">
						<div class="">
							<label for="Designation">
								<h4>Designation</h4>
							</label>
							<input type="text" class="form-control" name="designation" id="designation" value="<?php echo e($user->designation); ?>">
							<?php if($errors->has('designation')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('designation')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					<div class="form-group col-sm-6">

						<div class="">
							<label for="Address">
								<h4>Address <small>(Building No. / Floor)</small></h4>
							</label>
							<input type="text" class="form-control" name="address_building_no" id="address_building_no" value="<?php echo e($user->address_building_no); ?>">
							<?php if($errors->has('address_building_no')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('address_building_no')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Area">
								<h4>Address <small>(Area / Street)</small></h4>
							</label>
							<input type="text" class="form-control" id="address_area" name="address_area" value="<?php echo e($user->address_area); ?>">
							<?php if($errors->has('address_area')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('address_area')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Landmark">
								<h4>Landmark</h4>
							</label>
							<input type="text" class="form-control" name="landmark" id="landmark" value="<?php echo e($user->landmark); ?>">
							<?php if($errors->has('landmark')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('landmark')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Locality">
								<h4>Locality</h4>
							</label>
							<input type="text" class="form-control" name="locality" id="locality" value="<?php echo e($user->locality); ?>">
							<?php if($errors->has('locality')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('locality')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Country">
								<h4>Country</h4>
							</label>
							<select  class="form-control" name="country" id="country">
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($country->country_id); ?>" <?php echo e(($user->country_id == $country->country_id ? 'selected' : '')); ?>><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('country')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('country')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					
					<div class="form-group col-sm-6">
						<div class="">
							<label for="State">
								<h4>State</h4>
							</label>
                            <select  class="form-control" name="state" id="state">
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($state->id); ?>" <?php echo e(($user->state_id == $state->id ? 'selected': '')); ?>><?php echo e($state->state_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('state')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('state')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					
					<div class="form-group col-sm-6">
						<div class="">
							<label for="City">
								<h4>City</h4>
							</label>
							<select  class="form-control" name="city" id="city">
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($city->id); ?>" <?php echo e(($user->state_id == $city->id ? 'selected': '')); ?>><?php echo e($city->city_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('city')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Zip_Code">
								<h4>Zip Code</h4>
							</label>
							<input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo e($user->pincode); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <?php if($errors->has('seller_name')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('seller_name')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					
					
					
					
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Primary_Mobile">
								<h4>Mobile No.</h4>
							</label>
							<input type="text" class="form-control" name="primary_mobile" id="primary_mobile" value="<?php echo e($user->mobile); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <?php if($errors->has('primary_mobile')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('primary_mobile')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Primary_email">
								<h4>Email Id</h4>
							</label>
							<input type="email" class="form-control" name="primary_email" id="primary_email"  value="<?php echo e($user->email); ?>" required>
                            <?php if($errors->has('primary_email')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('primary_email')); ?></strong>
                              </span>
                            <?php endif; ?>
						</div>
					</div>
					
					
					<div class="form-group col-sm-12">
						<div class="">
							<br>
							<button class="btn btn-lg btn-success" type="submit"> Save</button>

						</div>
					</div>
				</div>
				<!--/tab-content-->

			</div>
			<!--/col-9-->
			</form>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/contact-profile.blade.php ENDPATH**/ ?>