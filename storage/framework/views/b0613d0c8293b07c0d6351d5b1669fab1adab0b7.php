<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Right Panel -->
    <?php if(Auth::user()->id == 1): ?>
    <div id="right-panel" class="right-panel">
      <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Sellers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-vendor')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Sellers</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php if(session('success')): ?>
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        <?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sellers</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Company</th>
                                            <th>Total leads</th>
                                            <th>Receive leads</th>
                                            <th>Account Manager</th>
                                            <th>Domain URL</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no = 0; ?>
                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$no); ?></td>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->mobile); ?></td>
                                            <td><?php echo e($user->company_name); ?></td>
                                            <td><?php echo e((isset($user->package_tag) ? $user->package_tag->service_provider->total_lead : 0)); ?></td>
                                            <td><?php echo e(count($user->leadDesk())); ?></td>
                                            <td>
                                                <?php echo e($user->account_manager_name); ?>

                                                <br />
                                                <?php echo e($user->account_manager_email); ?>

                                                <br />
                                                <?php echo e($user->account_manager_mobile); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e($user->company_website); ?>" target="_blank"><?php echo e($user->company_website); ?></a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm mb-1" title="Add Account Manager" data-toggle="modal" data-target="#editAccountManager<?php echo e($user->id); ?>"><i class="fa fa-plus"></i></a>
                                                <a href="edit-vendor/<?php echo e($user->user_token); ?>" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a>
                                                <?php if($demo_mode == 'on'): ?> 
                                                <a href="demo-mode" class="btn btn-danger btn-sm mb-1" title="Delete"><i class="fa fa-trash"></i></a>
                                                <?php else: ?> 
                                                <a href="vendor/<?php echo e($user->user_token); ?>" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        
        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal -->
            <div class="modal fade" id="editAccountManager<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form action="<?php echo e(url('admin/vendor/account-manager/add')); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          
                          <input type="hidden" id="user_id" name="user_id" value="<?php echo e($user->id); ?>">
                          
    					  <div class="form-group">
    						<label class="control-label col-sm-12" for="name">Account Manager Name:</label>
    						<div class="col-sm-12">          
    						  <input type="text" class="form-control mb-2" id="account_manager_name" placeholder="Enter your name" name="account_manager_name" value="<?php echo e($user->account_manager_name); ?>">
    						</div>
    					  </div>
    					  <div class="form-group">
    						<label class="control-label col-sm-12" for="email">Account Manager Email:</label>
    						<div class="col-sm-12">          
    						  <input type="email" class="form-control mb-2" id="account_manager_email" placeholder="Enter your email" name="account_manager_email" value="<?php echo e($user->account_manager_email); ?>">
    						</div>
    					  </div>
    						  <div class="form-group">
    						<label class="control-label col-sm-12" for="mobile">Account Manager Mobile No.</label>
    						<div class="col-sm-12">          
    						  <input type="number" class="form-control mb-2" id="account_manager_mobile" placeholder="Enter your Mobile" name="account_manager_mobile" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="<?php echo e($user->account_manager_mobile); ?>">
    						</div>
    					  </div>
    					  <div class="form-group">
    						<label class="control-label col-sm-12" for="mobile">Domian URL.</label>
    						<div class="col-sm-12">          
    						  <input type="url" class="form-control mb-2" id="company_website" placeholder="https://www.venicered.com/" name="company_website" value="<?php echo e($user->company_website); ?>">
    						</div>
    					  </div>
    					  <div class="form-group mb-1">        
    						<div class="col-sm-offset-2 col-sm-10">
    						  <button type="submit" class="btn btn-success">Save</button>
    						</div>
    					  </div>
    				</form>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/admin/vendor.blade.php ENDPATH**/ ?>