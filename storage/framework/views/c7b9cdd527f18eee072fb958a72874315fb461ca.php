<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <div class="container ven-dash">
     <div class="row">
      <div class="col-sm-12 text-center mb-3">
        <img src="/public/img/seller1.png" class="img img-responsive">
      </div>
    </div>

    <div class="row d-none">
      <div class="col-sm-12">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link <?php echo e((empty(session('type')) ? 'active' : '')); ?>" id="nav-Basic-tab" data-toggle="tab" href="#nav-Basic" role="tab" aria-controls="nav-Basic" aria-selected="true">Basic Seller details</a>
            <a class="nav-item nav-link <?php echo e((session('type') == 'document' ? 'active' : '')); ?>" id="nav-GST-tab" data-toggle="tab" href="#nav-GST" role="tab" aria-controls="nav-GST" aria-selected="false">Add Documents</a>
            <a class="nav-item nav-link <?php echo e((session('type') == 'verify' ? 'active' : '')); ?>" id="nav-Verify-tab" data-toggle="tab" href="#nav-Verify" role="tab" aria-controls="nav-Verify" aria-selected="false">Verify on Call Or Email</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade <?php echo e((empty(session('type')) ? 'show active' : '')); ?>" id="nav-Basic" role="tabpanel" aria-labelledby="nav-Basic-tab">
            <form class="form row p-3" action="<?php echo e(url('vendor/business-detail/update')); ?>" method="POST">
               <?php echo csrf_field(); ?>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Seller_Name">
                    <h4>Seller Name</h4>
                  </label>
                  <input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Seller Name" value="<?php echo e($user->name); ?>" >
                    <?php if($errors->has('seller_name')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('seller_name')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Company_Name">
                    <h4>Company Name</h4>
                  </label>
                  <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" title="Company Name" value="<?php echo e($user->company_name); ?>" >
                   <?php if($errors->has('company_Name')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('company_Name')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>

              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Business_Address">
                    <h4>Business Address</h4>
                  </label>
                  <input type="text" class="form-control" name="business_address" id="business_address" placeholder="Business Address" title="Business Address" value="<?php echo e($user->business_address); ?>" >
                   <?php if($errors->has('business_address')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('business_address')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>

              <div class="form-group col-sm-6">
                <div class=" ">
                  <label for="Locality">
                    <h4>Locality</h4>
                  </label>
                  <input type="text" class="form-control" name="locality" id="locality" placeholder="Locality" title="Locality" value="<?php echo e($user->locality); ?>" >
                   <?php if($errors->has('locality')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('locality')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Primary_Mobile">
                    <h4>Primary Mobile No.</h4>
                  </label>
                  <input type="text" class="form-control" name="primary_mobile" id="primary_mobile" placeholder="Primary Mobile No." title="Primary Mobile" value="<?php echo e($user->mobile); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
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
                    <h4>Primary Email</h4>
                  </label>
                  <input type="email" class="form-control" name="primary_email" id="primary_email" placeholder="you@email.com" title="Primary Email" value="<?php echo e($user->email); ?>">
                   <?php if($errors->has('primary_email')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('primary_email')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Alternate_Mobile">
                    <h4>Alternate Mobile No.</h4>
                  </label>
                  <input type="text" class="form-control" name="alternate_mobile" id="alternate_mobile" placeholder="Alternate Mobile No." title="Alternate Mobile" value="<?php echo e($user->mobile2); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                   <?php if($errors->has('alternate_mobile')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('alternate_mobile')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Alternate_email">
                    <h4>Alternate Email</h4>
                  </label>
                  <input type="email" class="form-control" id="alternate_email" name="alternate_email" placeholder="Alternate Email" title="Alternate Email" value="<?php echo e($user->email2); ?>">
                   <?php if($errors->has('alternate_email')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('alternate_email')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Country">
                    <h4>Country</h4>
                  </label>
                  <select  class="form-control" name="country" id="country" >
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
                   <select  class="form-control" name="state" id="state" >
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
                  <select  class="form-control" name="city" id="city" >
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
                  <label for="Pin_code">
                    <h4>Pin code</h4>
                  </label>
                  <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pin Code" title="Pin Code" value="<?php echo e($user->pincode); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                   <?php if($errors->has('seller_name')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('seller_name')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
               <div class="form-group col-sm-12 text-center">
                <br>
                <div class="">
                  <button class="btn btn-md mt-1 btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade <?php echo e((session('type') == 'document' ? 'show active' : '')); ?>" id="nav-GST" role="tabpanel" aria-labelledby="nav-GST-tab">
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
                    
            <form class="form row p-3" action="<?php echo e(url('vendor/document-detail/update')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="col-sm-12 mb-3">
                <h3>Add PAN</h3>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="PAN">
                    <h4>PAN</h4>
                  </label>
                  <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="PAN No" title="PAN No" value="<?php echo e($user->pan_no); ?>" >
                   <?php if($errors->has('pan_no')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('pan_no')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="gst">
                    <h4>GST No.</h4>
                  </label>
                  <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="GST No" title="GST No" value="<?php echo e($user->gst_no); ?>" >
                   <?php if($errors->has('gst_no')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('gst_no')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
              </div>
              <div class="form-group col-sm-6">
                <br>
                <div class="">
                  <button class="btn btn-md mt-1 btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade <?php echo e((session('type') == 'verify' ? 'show active' : '')); ?> p-3" id="nav-Verify" role="tabpanel" aria-labelledby="nav-Verify-tab">
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
            
            <div class="bg-white shadow p-4">
              <div class="row">
                <div class="col-sm-12 col-md-1 mb-2">
                  <img src="/public/img/call-1.png">
                </div>
                <div class="col-sm-12 col-md-7 mb-2">
                  <h5>Call verification pending</h5>
                  <p>Get your business details verified with us and receive 2X more enquiries!</p>
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                  <button type="button" class="btn btn-info" data-target="#rqstcall" data-toggle="modal">Request A Callback</button><br><br>
                  <button type="button" class="btn btn-info" data-target="#rqstcall" data-toggle="modal">Request A Email</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->


<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/vendor-dash/index.blade.php ENDPATH**/ ?>