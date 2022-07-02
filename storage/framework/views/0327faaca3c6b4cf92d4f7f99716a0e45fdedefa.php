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
    
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>E-Filings</h1>
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
                                <strong class="card-title">E-Filings</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="E-FilingTable">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Registration</th>
                                            <th>Detail Of Dervices</th>
                                            <th>Description</th>
                                            <th>Comment</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php $__currentLoopData = $eFilings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eFiling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <td><?php echo e(++$no); ?></td>
                                                <td><?php echo e($eFiling->user_name); ?></td>
                                                <td><?php echo e($eFiling->email); ?></td>
                                                <td><?php echo e($eFiling->mobile); ?></td>
                                                
                                                <td><?php echo e((isset($eFiling->state) ? $eFiling->state->state_name : '')); ?></td>
                                                <td><?php echo e((isset($eFiling->city) ? $eFiling->city->city_name : '')); ?></td>
                                                
                                                <td><?php echo e($eFiling->registration); ?></td>
                                                <td><?php echo e($eFiling->detail_of_services); ?></td>
                                                <td><?php echo e($eFiling->description); ?></td>
                                                <td><?php echo e($eFiling->comment); ?></td>
                                                
                                                <td><?php echo e(\Carbon\Carbon::parse($eFiling->created_at)->format('d M, Y g:i A')); ?></td>
                                                <td>
                                                    <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="<?php echo e($eFiling->id); ?>" comment="<?php echo e($eFiling->comment); ?>"><span class="fa fa-commenting-o"></span></button>
                                                    
                                                    <?php if($eFiling->is_verify == 0): ?>
                                                        <a href="<?php echo e(url('admin/e-filings/'.$eFiling->id.'/verify')); ?>" class="btn btn-danger mb-1" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(url('admin/e-filings/'.$eFiling->id.'/delete')); ?>" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
     </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="<?php echo e(url('admin/e-filings/comment/add')); ?>" method="POST" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <input type="hidden" id="comment_inquiry_id" name="inquiry_id">
              <div class="modal-body">
                <div class="form-group">
                    <label for="comment_message" class="control-label mb-1">Add Comment</label>
                    <input type="text" id="comment_message" name="comment" class="form-control">
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
    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <script>
        $('#E-FilingTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('E-FilingTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('E-FilingTable'));
            }
        });
        
        $(document).on('click', '[data-comment-add]', function () {
           var inquiryId = $(this).attr('inquiry-id');
           var comment = $(this).attr('comment');
           
           $('#comment_inquiry_id').val(inquiryId);
           $('#comment_message').val(comment);
           
           $('#addCommentModal').modal('show');
        });
    </script>
</body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/e-filings.blade.php ENDPATH**/ ?>