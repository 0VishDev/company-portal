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
                        <h1>Logistics</h1>
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
                                <strong class="card-title">Logistics</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="logisticsTable">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Load Type</th>
                                            <th>Shipment Price</th>
                                            <th>Pickup Date</th>
                                            <th>Pickup Pincode</th>
                                            <th>Delivery Code</th>
                                            <th>Comment</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php $__currentLoopData = $logistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$no); ?></td>
                                                <td><?php echo e($logistic->user_name); ?></td>
                                                <td><?php echo e($logistic->email); ?></td>
                                                <td><?php echo e($logistic->mobile); ?></td>
                                                <td><?php echo e($logistic->load_type); ?></td>
                                                <td><?php echo e($logistic->shipment_price); ?></td>
                                                <td><?php echo e((!empty($logistic->pickup_date) ? \Carbon\Carbon::parse($logistic->pickup_date)->format('d M, Y g:i A') : '')); ?></td>
                                                <td><?php echo e($logistic->pickup_pincode); ?></td>
                                                <td><?php echo e($logistic->delivery_code); ?></td>
                                                <td><?php echo e($logistic->comment); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($logistic->created_at)->format('d M, Y g:i A')); ?></td>
                                                <td>
                                                    <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="<?php echo e($logistic->id); ?>" comment="<?php echo e($logistic->comment); ?>"><span class="fa fa-commenting-o"></span></button>
                                                    <button class="btn btn-danger mb-1" title="Download" data-download-logistic sheet="<?php echo e($logistic); ?>"><span class="fa fa-download"></span></button>
                                                    <?php if($logistic->is_verify == 0): ?>
                                                        <a href="<?php echo e(url('admin/logistics/'.$logistic->id.'/verify')); ?>" class="btn btn-danger mb-1" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(url('admin/logistics/'.$logistic->id.'/delete')); ?>" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
           <form action="<?php echo e(url('admin/logistics/comment/add')); ?>" method="POST" enctype="multipart/form-data">
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
        $('#logisticsTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('logisticsTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('logisticsTable'));
            }
        });
        
        $('[data-download-logistic]').click(function (){ 
            var sheet = $.parseJSON($(this).attr('sheet'));
            var base_path = '<?php echo e(url('/')); ?>';
            
            var table = '<tr><th>User Name</th><th>Email</th><th>Mobile</th><th>Load Type</th><th>Expected Value of Shipment</th><th>Pickup Date & Time</th><th>Pickup Pincode</th><th>Delivery Pincode</th><th>Pickup Address</th><th>Delivery Address</th><th>Weight</th><th>Type of material</th><th>Product URL</th><th>Image of shipment</th></tr>';
    
            var htmls = "";
            var uri = 'data:application/vnd.ms-excel;charset=UTF-8;base64,'
            var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'; 
            var base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            };
            
            var format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            };
            
            table = table+'<tr><td>'+sheet.user_name+'</td><td>'+sheet.email+'</td><td>'+sheet.mobile+'</td><td>'+sheet.load_type+'</td><td>'+sheet.shipment_price+'</td><td>'+sheet.pickup_date+'</td><td>'+sheet.pickup_pincode+'</td><td>'+sheet.delivery_code+'</td><td>'+sheet.pickup_addrress+'</td><td>'+sheet.delivery_address+'</td><td>'+sheet.weight+'('+sheet.weight_type+')</td><td>'+sheet.types_of_material+'</td><td>'+sheet.product_url+'</td><td>'+(sheet.shipment_image != null ? base_path+'/public/storage/logistics/'+sheet.shipment_image : '')+'</td></tr>';
            
            htmls = table;
    
            var ctx = {
                worksheet : 'Worksheet',
                table : htmls
            }
    
            var link = document.createElement("a");
            link.download = "logistics.xls";
            link.href = uri + base64(format(template, ctx));
            link.click();
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
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/logistics.blade.php ENDPATH**/ ?>