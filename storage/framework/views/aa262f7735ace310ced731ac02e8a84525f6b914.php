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
                        <h1>VR Trust</h1>
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
                                <strong class="card-title">VR Trust</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Company Name</th>
                                            <th>Logo</th>
                                            <th>Docs</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no = 1; ?>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->company_name); ?></td>
                                            <td id="vr_trust_icon_html_<?php echo e($user->id); ?>">
                                                <?php if(!empty($user->vr_trust_icon)): ?> 
                                                    <img height="50" src="<?php echo e(url('/')); ?>/public/storage/vr-trust/<?php echo e($user->vr_trust_icon); ?>" alt="<?php echo e($user->name); ?>"/>
                                                <?php else: ?> 
                                                    <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($user->name); ?>"/>  
                                                <?php endif; ?>
                                            </td>
                                            <td id="vr_trust_docs_html_<?php echo e($user->id); ?>">
                                                <?php if(!empty($user->vr_trust_docs)): ?> 
                                                   <a href="<?php echo e(url('/')); ?>/public/storage/vr-trust/<?php echo e($user->vr_trust_docs); ?>" target="_blank" style="color:#007bff;"><u>View Docs</u></a>
                                                <?php else: ?> 
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-vr-trust-edit user-id="<?php echo e($user->id); ?>" vr-icon="<?php echo e((!empty($user->vr_trust_icon) ? url('/').'/public/storage/vr-trust/'.$user->vr_trust_icon : '')); ?>" vr-docs="<?php echo e((!empty($user->vr_trust_docs) ? url('/').'/public/storage/vr-trust/'.$user->vr_trust_docs : '')); ?>">Edit</button>
                                            </td> 
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    
    <div class="modal fade" id="vrTrustModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">VR Trust</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="<?php echo e(url('admin/vr-trust/icon/add')); ?>" method="POST" id="category_form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
              <input type="hidden" id="vr_trust_user_id" name="user_id">
              
              <div class="modal-body">
                  
                <div class="form-group">
                    <label for="customer_earnings" class="control-label mb-1">Icon (size: 128 x 128)</label>
                    <input type="file" id="icon_image" name="icon" class="form-control" accept="image/*" data-bvalidator="" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                    <div id="vr_trust_icon_display">
                        <img height="50" src="" />
                        &emsp;
                        <button type="button" class="btn btn-primary btn-sm mt-2" data-vr-trust-delete file-type="icon">Delete</button>
                    </div>
                    <?php if($errors->has('icon')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('icon')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
            
                <div class="form-group">
                    <label for="customer_earnings" class="control-label mb-1">Upload Docs</label>
                    <input id="icon_docs" name="icon_docs" type="file" class="form-control" accept=".doc,.docx,.txt,.pdf,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png">
                    <div id="vr_trust_docs_display">
                        <a href="" target="_blank"style="color:#007bff;"><u>View Docs</u></a> 
                        
                        &emsp;
                        <button type="button" class="btn btn-primary btn-sm mt-2" data-vr-trust-delete file-type="docs">Delete</button>
                    </div>
                    <?php if($errors->has('icon_docs')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('icon_docs')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/admin/vr-trust-list.blade.php ENDPATH**/ ?>