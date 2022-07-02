<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="pb-2">Bank Details</h5>
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
                    <form class="form" action="<?php echo e(url('vendor/bank-detail/update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="IFSC">
                                    <h4> IFSC Code</h4>
                                </label>
                                <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="<?php echo e($user->ifsc_code); ?>">
                                <?php if($errors->has('ifsc_code')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('ifsc_code')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="Bank">
                                    <h4>Bank Name <small>(As per IFSC Code)</small></h4>
                                </label>
                                <input type="text" class="form-control" name="bank_name" id="bank_name" value="<?php echo e($user->bank_name); ?>">
                                <?php if($errors->has('bank_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('bank_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="Account_no">
                                    <h4>Account No.</h4>
                                </label>
                                <input type="text" class="form-control" name="account_no" id="account_no" value="<?php echo e($user->account_no); ?>">
                                 <?php if($errors->has('account_no')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('account_no')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="Account_type">
                                    <h4>Account type</h4>
                                </label>
                                <input type="text" class="form-control" name="account_type" id="account_type" value="<?php echo e($user->account_type); ?>">
                                <?php if($errors->has('account_type')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('account_type')); ?></strong>
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
            </div>
        </div>
    </div>
    <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/bank-details.blade.php ENDPATH**/ ?>