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


  <div class="container ven-dash fltr-ld">
    <div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
      <div class="row">
        <div class="col-sm-12">
          <div class="table-responsive text-nowrap">
            <!--Table-->
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <thead>
                  <tr style="background:#ff0000; color:#fff;">
                    <th>S.No.</th>
                    <th>Date</th>
                    <th>Product Detail</th>
                    <th>Amount Paid</th>
                    <th>Balance Amount</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="8">No data Found for year 2020</td>
                </tr>
              </tbody>
          </table>
            <!--Table-->
          </div>
        </div>
      </div>
    </div>
    <!-- .content -->
  </div><!-- /#right-panel -->
  <!-- Right Panel -->


  <?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/transaction-history.blade.php ENDPATH**/ ?>