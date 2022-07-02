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
                        <h1>Freights Enquiries</h1>
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
                                <strong class="card-title">Freights Enquiries</strong>
                            </div>
                            <div class="card-body tab-resp">
                                <table class="table table-striped table-bordered table-responsive" id="freightsTable">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                           <th>User Name</th>
                                           <th>Email</th>
                                           <th>Mobile</th>
                                           <th>Freight Mode</th>
                                           <th>From</th>
                                           <th>To</th>
                                           <th>Shipment Date</th>
                                           <th>Payment</th>
                                           <th>Comment</th>
                                           <th>Date / Time</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $freights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e((!empty($freight->user_name) ? $freight->user_name : '-')); ?></td>
                                            <td><?php echo e((!empty($freight->email) ? $freight->email : '-')); ?></td>
                                            <td><?php echo e((!empty($freight->mobile) ? $freight->mobile : '-')); ?></td>
                                            <td><?php echo e(ucfirst($freight->freights_type)); ?></td>
                                            <td><?php echo e((!empty($freight->exp_from) ? $freight->exp_from : '-')); ?></td>
                                            <td><?php echo e((!empty($freight->exp_to) ? $freight->exp_to : '-')); ?></td>
                                            <td><?php echo e((!empty($freight->shipment_date) ? \Carbon\Carbon::parse($freight->shipment_date)->format('d M, Y') : '-')); ?></td>
                                            <td><?php echo e((!empty($freight->payment) ? $freight->payment : '-')); ?></td>
                                            <td><?php echo e((!empty($freight->comment) ? $freight->comment : '-')); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($freight->created_at)->format('d M, Y g:i A')); ?></td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="<?php echo e($freight->id); ?>" comment="<?php echo e($freight->comment); ?>"><span class="fa fa-commenting-o"></span></button>
                                                
                                                <a href="#" class="btn btn-danger mb-1" title="Veiw" data-target="#freightModal<?php echo e($freight->id); ?>" data-toggle="modal"><span class="fa fa-eye"></span></a>
                                                <?php if($freight->is_verify == 0): ?>
                                                    <a href="<?php echo e(url('admin/freights/'.$freight->id.'/verify')); ?>" class="btn btn-danger mb-1" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(url('admin/freights/'.$freight->id.'/delete')); ?>" class="btn btn-danger mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
    
    <!-- Right Panel -->
    <?php $__currentLoopData = $freights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="freightModal<?php echo e($freight->id); ?>" aria-modal="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <h3 class="mb-0">Freights Enquiries</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    	<div class="row">
                    		<div class="col-md-12 con-bg1">
                    			<div class="contact-form">
                    				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    					  <span aria-hidden="true">&times;</span>
                    					</button>
                    				</div>
                    				<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <tbody>
                                                <tr>
                                                    <th>User Name</th>
                                                    <td><?php echo e((!empty($freight->user_name) ? $freight->user_name : '-')); ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?php echo e((!empty($freight->email) ? $freight->email : '-')); ?></td>
                                                </tr>
                                                
                                                <tr>
                                                  <th>Mobile</th>
                                                  <td><?php echo e((!empty($freight->mobile) ? $freight->mobile : '-')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Freight Mode</th>
                                                    <td><?php echo e(ucfirst($freight->freights_type)); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Cargo Type</th>
                                                    <td><?php echo e((!empty($freight->req_type) ? $freight->req_type : '-')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>From</th>
                                                    <td><?php echo e((!empty($freight->exp_from) ? $freight->exp_from : '-')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>To</th>
                                                    <td><?php echo e((!empty($freight->exp_to) ? $freight->exp_to : '-')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipment Date</th>
                                                    <td><?php echo e((!empty($freight->shipment_date) ? \Carbon\Carbon::parse($freight->shipment_date)->format('d M, Y') : '-')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Payment</th>
                                                    <td><?php echo e((!empty($freight->payment) ? $freight->payment : '-')); ?></td>
                                                </tr>
                                                <?php if($freight->freights_type == 'sea'): ?>
                                                    <tr>
                                                        <th>Commodity Details</th>
                                                        <td><?php echo e((!empty($freight->commodity_detail) ? $freight->commodity_detail : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th>Container Size </th>
                                                        <td><?php echo e((!empty($freight->container_size) ? $freight->container_size : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cargo Status </th>
                                                        <td><?php echo e((!empty($freight->cargo_status) ? $freight->cargo_status : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quantity</th>
                                                        <td><?php echo e((!empty($freight->quantity) ? $freight->quantity : '-')); ?>(<?php echo e((!empty($freight->quantity_unit) ? $freight->quantity_unit : '-')); ?>)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Weight</th>
                                                        <td><?php echo e((!empty($freight->weight) ? $freight->weight : '-')); ?>(<?php echo e((!empty($freight->weight_unit) ? $freight->weight_unit : '-')); ?>)</td>
                                                    </tr>
                                                    <tr>
                                                    <th>Volume</th>
                                                        <td><?php echo e((!empty($freight->exp_to) ? $freight->volume : '-')); ?>(<?php echo e((!empty($freight->exp_to) ? $freight->volume_unit : '-')); ?>)</td>
                                                    </tr>
                                                     <th>Transit time required</th>
                                                        <td><?php echo e((!empty($freight->transit_time) ? $freight->transit_time : '-')); ?></td>
                                                    </tr>
                                                <?php else: ?>
                                                     <tr>
                                                        <th>Preferred Airline</th>
                                                        <td><?php echo e((!empty($freight->preferred_airline) ? $freight->preferred_airline : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Description </th>
                                                        <td><?php echo e((!empty($freight->product_desc) ? $freight->product_desc : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Average Dimensions/per cubic foot </th>
                                                        <td><?php echo e((!empty($freight->dimension_l) ? $freight->dimension_l : '-')); ?>(L)-<?php echo e((!empty($freight->dimension_w) ? $freight->dimension_w : '-')); ?>(W)-<?php echo e((!empty($freight->dimension_h) ? $freight->dimension_h : '-')); ?>(H)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>No. of Pieces</th>
                                                        <td><?php echo e((!empty($freight->no_of_pieces) ? $freight->no_of_pieces : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Weight</th>
                                                        <td><?php echo e((!empty($freight->weight) ? $freight->weight : '-')); ?>(<?php echo e((!empty($freight->weight_unit) ? $freight->weight_unit : '-')); ?>)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Are goods temperature controlled?	</th>
                                                        <td><?php echo e((!empty($freight->goods_temperature_controlled) ? $freight->goods_temperature_controlled : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Offer Validity</th>
                                                        <td><?php echo e((!empty($freight->offer_validity_date) ? \Carbon\Carbon::parse($freight->offer_validity_date)->format('d M, Y') : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Aiming Freight</th>
                                                        <td><?php echo e((!empty($freight->aiming_freight) ? $freight->aiming_freight : '-')); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <th>Date / Time</th>
                                                    <td><?php echo e(\Carbon\Carbon::parse($freight->created_at)->format('d M, Y g:i A')); ?></td>
                                            </tr>
                                       </tbody>
                                    </table>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
     <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="<?php echo e(url('admin/freights/comment/add')); ?>" method="POST" enctype="multipart/form-data">
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
   
        $('#freightsTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('freightsTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('freightsTable'));
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
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/freights.blade.php ENDPATH**/ ?>