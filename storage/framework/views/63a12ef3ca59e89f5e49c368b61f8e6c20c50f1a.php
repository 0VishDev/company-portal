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
                        <h1>Business Enquiries</h1>
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
                                <strong class="card-title">Business Enquiries</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="businessTable">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Location</th>
                                            <th>Requirement Type</th>
                                            <th>Business Type/Insurance Type /Iso Type</th>
                                            <th>Comment</th>
                                            <th>Date / Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $isoCertifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isoCertification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($isoCertification->first_name); ?> <?php echo e($isoCertification->last_name); ?></td>
                                            <td><?php echo e($isoCertification->email); ?></td>
                                            <td><?php echo e($isoCertification->mobile); ?></td>
                                            <td><?php echo e($isoCertification->city); ?></td>
                                            <td>ISO Certification</td>
                                            <td><?php echo e($isoCertification->certification_required); ?></td>
                                            <td><?php echo e($isoCertification->comment); ?></td>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($isoCertification->created_at)->format('d M, Y g:i A')); ?>

                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="<?php echo e($isoCertification->id); ?>" comment="<?php echo e($isoCertification->comment); ?>" type="isoCertification"><span class="fa fa-commenting-o"></span></button>
                                                <a href="<?php echo e(url('admin/business-enquiries/'.$isoCertification->id.'/delete?type=isoCertification')); ?>" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php $__currentLoopData = $businessInsurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $businessInsurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($businessInsurance->first_name); ?> <?php echo e($businessInsurance->last_name); ?></td>
                                            <td><?php echo e($businessInsurance->email); ?></td>
                                            <td><?php echo e($businessInsurance->mobile); ?></td>
                                            <td><?php echo e($businessInsurance->city); ?></td>
                                            <td>Business Insurance</td>
                                            <td><?php echo e($businessInsurance->insurance_type); ?></td>
                                            <td><?php echo e($businessInsurance->comment); ?></td>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($businessInsurance->created_at)->format('d M, Y g:i A')); ?>

                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="<?php echo e($businessInsurance->id); ?>" comment="<?php echo e($businessInsurance->comment); ?>" type="businessInsurance"><span class="fa fa-commenting-o"></span></button>
                                                <a href="<?php echo e(url('admin/business-enquiries/'.$businessInsurance->id.'/delete?type=businessInsurance')); ?>" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php $__currentLoopData = $businessLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $businessLoan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($businessLoan->first_name); ?> <?php echo e($businessLoan->last_name); ?></td>
                                            <td><?php echo e($businessLoan->email); ?></td>
                                            <td><?php echo e($businessLoan->mobile); ?></td>
                                            <td><?php echo e($businessLoan->city); ?></td>
                                            <td>Business Loan</td>
                                            <td><?php echo e($businessLoan->business_type); ?></td>
                                             <td><?php echo e($businessLoan->comment); ?></td>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($businessLoan->created_at)->format('d M, Y g:i A')); ?>

                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="<?php echo e($businessLoan->id); ?>" comment="<?php echo e($businessLoan->comment); ?>" type="businessLoan"><span class="fa fa-commenting-o"></span></button>
                                                <a href="<?php echo e(url('admin/business-enquiries/'.$businessLoan->id.'/delete?type=businessLoan')); ?>" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
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
    <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="<?php echo e(url('admin/business-enquiries/comment/add')); ?>" method="POST" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <input type="hidden" id="comment_inquiry_id" name="inquiry_id">
               <input type="hidden" id="comment_inquiry_type" name="inquiry_type">
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
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    <script>
        $('#businessTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('businessTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('businessTable'));
            }
        });
        
        $(document).on('click', '[data-comment-add]', function () {
           var inquiryId = $(this).attr('inquiry-id');
           var comment = $(this).attr('comment');
           var type = $(this).attr('type');
           
           $('#comment_inquiry_id').val(inquiryId);
           $('#comment_inquiry_type').val(type);
           $('#comment_message').val(comment);
           
           $('#addCommentModal').modal('show');
        });
    </script>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/business-enquiries.blade.php ENDPATH**/ ?>