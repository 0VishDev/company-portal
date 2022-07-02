<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="pb-2">Documents Profile</h5>
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
            
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <form class="form" action="<?php echo e(url('vendor/document-detail/update')); ?>" method="POST">
		                <?php echo csrf_field(); ?>
		                
		                <input type="hidden" name="mode" id="mode" value="document">
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="GSTIN">
                                    <h4> GSTIN</h4>
                                </label> <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="GSTIN is important for all business transactions. Buyers trust sellers with GSTIN to ensure quick and transparent deals."></i>
                                  <input type="text" class="form-control" name="gstin" id="gstin" value="<?php echo e($user->gst_no); ?>">
        							<?php if($errors->has('gstin')): ?>
                                      <span class="help-block text-danger">
                                        <strong><?php echo e($errors->first('gstin')); ?></strong>
                                      </span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="PAN_No">
                                    <h4>PAN No.</h4>
                                </label> <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="PAN No. is mandatory for all financial transactions. It validates your tax information and confirms your status as a trusted seller."></i>
                                   <input type="text" class="form-control" name="pan_no" id="pan_no" value="<?php echo e($user->pan_no); ?>">
        							<?php if($errors->has('pan_no')): ?>
                                      <span class="help-block text-danger">
                                        <strong><?php echo e($errors->first('pan_no')); ?></strong>
                                      </span>
                                    <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="TAN">
                                    <h4>TAN No.</h4>
                                </label> <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="TAN is needed for persons who have to collect or deduct tax on payments made by them. It is needed to ensure easy tax deduction."></i>
                                <input type="text" class="form-control" name="tan_no" id="tan_no" value="<?php echo e($user->tan_no); ?>">
                                <?php if($errors->has('tan_no')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('tan_no')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="CIN">
                                    <h4>CIN No./LLPIN</h4>
                                </label> <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="CIN contains all important details about your company. With this information, the buyer will know that your business is registered with the government and will be more confident to deal with you."></i>
                                <input type="text" class="form-control" name="cin_no" id="cin_no" value="<?php echo e($user->cin_no); ?>">
                                <?php if($errors->has('cin_no')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('cin_no')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="form-group col-sm-12">
                            <div class="">
                                <label for="DGFT">
                                    <h4>DGFT/IE Code </h4>
                                </label> <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="IE Code is a must if you deal in imports or exports. This information will ensure smooth transactions with any foreign buyers."></i>
                                <input type="text" class="form-control" name="dgft_code" id="dgft_code" value="<?php echo e($user->dgft_code); ?>">
                                <?php if($errors->has('dgft_code')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('dgft_code')); ?></strong>
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
                    </form>

                </div>

                <div class="col-sm-6 mb-2">
                </div>
            </div>
        </div>
    </div>
    <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/vendor-dash/statutory-profile.blade.php ENDPATH**/ ?>