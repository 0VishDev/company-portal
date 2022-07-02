<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			
			 <div class="container ven-dash">
				 <div class="bg-white pt-4 pl-2 pr-2 text-center">
				 <div class="row">
					 <div class="col-sm-12 mb-3">
					 <h3 class="pb-2">Change Password</h3>
					 </div>
				   </div>
				 </div>
				 
				 <form class="bg-white p-3 mt-4" action="<?php echo e(url('user/password/update')); ?>" method="POST">
				     <?php echo csrf_field(); ?>
				     
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
				     
                     <div class="container">
                      <div class="row">
                    	<div class="form-group col-sm-6">
                          <div class="">
                              <label for="new_pass"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" required>
                              <?php if($errors->has('password')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="form-group col-sm-6">
                          <div class="">
                            <label for="re_pass"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                              <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block text-danger">
                                  <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                              <?php endif; ?>
                          </div>
                      </div>
        	  		  <div class="form-group col-sm-12 text-center">
                        <button class="btn btn-success mt-2 mb-2" type="submit">Save</button><br>
        				<p>Or</p>
        				<p><a href="#">Request OTP on Mobile</a></p>
        				<p>Or</p>
        				<p><a href="#">Request OTP on Email</a></p>
                      </div>
                    </div>
                </div>
            </form>
		</div>
    </div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/changepassword.blade.php ENDPATH**/ ?>