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
                        <h1>Payment Sheet</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="#" data-toggle="modal" data-target="#downloadpaymentsheet" class="btn btn-success btn-sm">Download Payment</a>
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
                                <strong class="card-title">Payment Sheet</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="servicePackageTagTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Manager Name</th>
                                            <th>Executive Name</th>
                                            <th>Company Name</th>
                                            <th>Customer Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email id</th>
                                            <th>Address</th>
                                            <th>GST No</th>
                                            <th>Contract Amount</th>
                                            <th>Payment Type</th>
                                            <th>Transactions</th>
                                            <th>Package Name</th>
                                            <th>Detail of Services</th>
                                            <th>Package Duration</th>
                                            <th>Domain Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href="#" data-toggle="modal" data-target="#paymentsheet" style="color:#007bff;"><u>View Transaction</u></a></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        
            <!-- Modal -->
            <div class="modal fade" id="paymentsheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped table-responsive">
                      <thead>
                        <tr>
                          <th scope="col">Sno</th>
                          <th scope="col">Sale Date</th>
                          <th scope="col">Received Amount</th>
                          <th scope="col">Balance Amount</th>
                          <th scope="col">Mode Of Payment</th>
                          <th scope="col">Transaction No</th>
                          <th scope="col">Tansaction Slip</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td><a href="#" target="_blank" style="color:#007bff;"><u>View Slip</u></a></td>
                                  <td>
                                    <a href="#" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                                   </td>
                                </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        
        
        <!-- Modal -->
            <div class="modal fade" id="downloadpaymentsheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="row" action="#" method="POST">
                        <div class="form-group col-sm-6">
                            <label>From</label>
                            <input type="date" class="form-control shadow" name="" required="" />
                        </div>
                        <div class="form-group col-sm-6">
                             <label>To</label>
                            <input type="date" class="form-control shadow" required="" />
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
        
        
     </div><!-- /#right-panel -->
   
    <!-- Right Panel -->
    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <script>
        $('#servicePackageTagTable').DataTable();
    </script>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/admin/paymentsheet.blade.php ENDPATH**/ ?>