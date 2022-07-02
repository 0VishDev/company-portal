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
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(url('/')); ?>/public/storage/users/1561460997.jpg" class="user-avatar rounded-circle" alt="admin" /> </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="<?php echo e(url('/')); ?>/admin/edit-profile"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="<?php echo e(url('/')); ?>/admin/general-settings"><i class="fa fa-cog"></i> Settings</a>
                        <a class="nav-link" href="<?php echo e(url('/')); ?>/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="pb-2">Business Profile</h5>
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
        
            <form class="form" action="<?php echo e(url('vendor/business-profile/update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                       
                <div class="row">
                <div class="col-sm-3">
                    <!--left col-->
                    <div class="text-center contact">
                        <h3>Company Logo</h3>
                        <?php if(!empty($user->company_logo)): ?>
                             <img src="<?php echo e(asset('public/storage/company-logo/'.$user->company_logo)); ?>" class="avatar mt-2 img-circle img-thumbnail" alt="avatar" id="companyImage">
                        <?php else: ?>
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar mt-2 img-circle img-thumbnail" alt="avatar" id="companyImage">
                        <?php endif; ?>
                        <h6>Upload company logo</h6>
                        <input type="file" id="company_logo" name="company_logo" class="text-center center-block" accept="image/*" onchange="imageUpload('#company_logo', '#companyImage')">
						<label for="company_logo" class="btn-2">File upload</label>
                    </div>

                </div>
                <!--/col-3-->
                <div class="col-sm-9">
                        <div class="form-group col-sm-6">
                            <div class="">
                                <label for="Company_Name">
                                    <h4> Company Name <small> (As Per Reg. Document)</small></h4>
                                </label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo e($user->company_name); ?>" >
    							<?php if($errors->has('company_Name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('company_Name')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <div class="">
                                <label for="Year_of_Establishment">
                                    <h4>Year of Establishment</h4>
                                </label>
                                <input type="text" class="form-control" name="year_of_establishment" id="year_of_establishment" value="<?php echo e($user->year_of_establishment); ?>" >
                                <?php if($errors->has('year_of_establishment')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('year_of_establishment')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
    						<div class="">
    							<label for="Promoterfirst_name">
    								<h4>Promoter / CEO (First name)</h4>
    							</label>
    							<input type="text" class="form-control" name="promoter_first_name" id="promoter_first_name" value="<?php echo e($user->promoter_first_name); ?>" >
    							<?php if($errors->has('promoter_first_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('promoter_first_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
    						</div>
    					</div>
    					
    					
    					<div class="form-group col-sm-6">
    						<div class="">
    							<label for="Promoterlast_name">
    								<h4>Promoter / CEO (Last name)</h4>
    							</label>
    							<input type="text" class="form-control" name="promoter_last_name" id="promoter_last_name" value="<?php echo e($user->promoter_last_name); ?>" >
    							<?php if($errors->has('promoter_last_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('promoter_last_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
    						</div>
    					</div>

                        <div class="form-group col-sm-12">
                            <div class="">
                                <label for="Additional_Contact_Name">
                                    <h4>Additional Contact Name </h4>
                                </label>
                                <input type="text" class="form-control" name="additional_contact_name" id="additional_contact_name" value="<?php echo e($user->additional_contact_name); ?>" >
                                <?php if($errors->has('additional_contact_name')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('additional_contact_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <div class="">
                                <label for="primary_type">
                                    <h4>Primary Type</h4>
                                </label>
                                <select class="form-control" id="primary_type" name="primary_type" >
                                    <?php $__currentLoopData = $primaryTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $primaryType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($primaryType); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('primary_type')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('primary_type')); ?></strong>
                                  </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-6">
                          <div class="">
                            <label for="Ownership_Type"><h4>Ownership Type</h4></label>
                            <select class="form-control" id="ownership_type" name="ownership_type" >
                               <?php $__currentLoopData = $ownershipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ownershipType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($user->ownership_type == $key ? 'selected' : '')); ?>><?php echo e($ownershipType); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('ownership_type')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('ownership_type')); ?></strong>
                              </span>
                            <?php endif; ?>
                          </div>
                        </div>
                      
                       <div class="form-group col-sm-6">
                          <div class="">
                            <label for="Employees"><h4>Number of Employees</h4></label>
                            <select class="form-control" size="1" id="no_of_employees" name="no_of_employees" >
                               <?php $__currentLoopData = $noOfEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $noOfEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($user->no_of_employees == $key ? 'selected' : '')); ?>><?php echo e($noOfEmployee); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('no_of_employees')): ?>
                              <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('no_of_employees')); ?></strong>
                              </span>
                            <?php endif; ?>
                          </div>
                        </div>
                      
                      <div class="form-group col-sm-6">
                          <div class="">
                            <label for="annual_turnover"><h4>Annual Turnover</h4></label>
                              <select class="form-control" id="annual_turnover" name="annual_turnover" >
                                <?php $__currentLoopData = $annualTurnovers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $annualTurnover): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($user->annual_turnover == $key ? 'selected' : '')); ?>><?php echo e($annualTurnover); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                               <?php if($errors->has('annual_turnover')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('annual_turnover')); ?></strong>
                                  </span>
                                <?php endif; ?>
                          </div>
                      </div>
					  
                      <div class="form-group col-sm-6">
						<div class="">
    							<label for="Website">
    								<h4>Company Website</h4>
    							</label>
    							<input type="text" class="form-control" name="company_website" id="company_website" value="<?php echo e($user->company_website); ?>" >
    							<?php if($errors->has('company_website')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('company_website')); ?></strong>
                                  </span>
                                <?php endif; ?>
    						</div>
    					</div>
    					
    					<div class="form-group col-sm-12">
                           <div class="">
                              <label for="company_about">
    								<h4>Company About</h4>
    							</label>
    							<textarea class="form-control" id="company_about" name="company_about" rows="4" ><?php echo e($user->user_about); ?></textarea>
                            </div>
					    </div>
                      
					    <div class="form-group col-sm-12">
                           <div class="">
                              <hr>
                            </div>
					    </div>
					    
					    <?php $businessArr = explode(',', $user->secondory_business); ?>
					  
					    <div class="form-group col-sm-12">
                          <div class="">
                              <label for="Primary_Mobile"><h4>Secondary Business</h4></label>
                               <ul class="inline-radio clearfix">
                                  <?php $__currentLoopData = $secondoryBusinesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $secondoryBusiness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li><input type="checkbox" class="filled-in " name="secondoryBusiness[]" value="<?php echo e($key); ?>" <?php echo e((in_array($secondoryBusiness, $businessArr) ? 'checked' : '')); ?>/><label for="filled-in-box1"><?php echo e($secondoryBusiness); ?></label></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </ul>
                               <?php if($errors->has('secondoryBusiness')): ?>
                                  <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('secondoryBusiness')); ?></strong>
                                  </span>
                                <?php endif; ?>
                          </div>
                        </div>
                      
					   <div class="form-group col-sm-12">
                           <div class="">
                              <hr>
                            </div>
					    </div>
					  
					    <div class="form-group col-sm-12">
                            <div class="">
                              <label><h4>Business Card</h4></label>
                            </div>
        		        </div>
        		        
                        <div class="form-group col-sm-6">
                           <div class="">
                                <div class="contact">
                            	   <h4>Front View</h4>
                            		<?php if(!empty($user->business_card_front_view)): ?>
                                         <img src="<?php echo e(asset('public/storage/business-card/'.$user->business_card_front_view)); ?>" class="avatar img-thumbnail" alt="avatar" id="businessCardFrontImage">
                                    <?php else: ?>
                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-thumbnail" alt="avatar" id="businessCardFrontImage">
                                    <?php endif; ?>
                                    <input type="file" class="text-center center-block" id="business_card_front_view" name="business_card_front_view" accept="image/*" onchange="imageUpload('#business_card_front_view', '#businessCardFrontImage')">
						<label for="business_card_front_view" class="btn-2">File upload</label>
                                </div>
                            </div>
                        </div>
						   
                      <div class="form-group col-sm-6">
                            <div class="">
                              <div class="contact">
                        		 <h4>Back View</h4>
                                <?php if(!empty($user->business_card_back_view)): ?>
                                     <img src="<?php echo e(asset('public/storage/business-card/'.$user->business_card_back_view)); ?>" class="avatar img-thumbnail" alt="avatar" id="businessCardBackImage">
                                <?php else: ?>
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-thumbnail" alt="avatar" id="businessCardBackImage">
                                <?php endif; ?>
                                <input type="file" class="text-center center-block" id="business_card_back_view" name="business_card_back_view" accept="image/*" onchange="imageUpload('#business_card_back_view', '#businessCardBackImage')">
						<label for="business_card_back_view" class="btn-2">File upload</label>
                              </div>
                          </div>
                      </div>
                      
                      <div class="form-group col-sm-12">
                        <div class="">
                            <br>
                          	<button class="btn btn-lg btn-success" type="submit"> Save</button>
                        </div>
                      </div>
              	   
                  </div><!--/tab-content-->
        
                </div><!--/col-9-->
            </form>
        </div>
    </div>
   <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/business-profile.blade.php ENDPATH**/ ?>