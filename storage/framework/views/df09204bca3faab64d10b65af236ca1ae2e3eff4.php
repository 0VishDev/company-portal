<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2026,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2026,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2026,$translate)); ?></span></p>
      </div>
    </section>
   <main role="main">
      <div class="container page-white-box mt-3">
         <div>
             <?php if($message = Session::get('success')): ?>
              <div class="alert alert-success" role="alert">
                <span class="alert_icon lnr lnr-checkmark-circle"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                    </button>
              </div>
            <?php endif; ?>
           <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
            </div>
            <?php endif; ?>
            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
            <div class="row">
           <div class="col-md-12">
              <div class="table-responsive">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(1964,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2076,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1984,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2077,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2078,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2079,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2080,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2081,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2082,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2083,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2912,$translate)); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $order['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($product->ord_id); ?></td>
                                            <td>
                                            <a href="<?php echo e(url('/product')); ?>/<?php echo e($product->product_slug); ?>">
                                            <?php if($product->product_image != ''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"  class="img-thumb" alt="<?php echo e($product->product_name); ?>"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  class="img-thumb" alt="<?php echo e($product->product_name); ?>"/>  <?php endif; ?>
                                                </a>
                                           </td>
                                            <td><?php echo e($product->purchase_token); ?></td>
                                            <td><?php echo e($product->quantity); ?> X <?php echo e($allsettings->site_currency_symbol); ?><?php echo e($product->price); ?></td>
                                            <td><?php echo e($product->product_attribute_values); ?> </td>
                                            <td><?php echo e($product->payment_type); ?> </td>
                                            <td><?php if($product->order_status == 'completed'): ?> <span class="badge badge-success"><?php echo e(Helper::translation(2084,$translate)); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(2085,$translate)); ?></span> <?php endif; ?></td>
                                            <td><?php if($product->payment_status != ''): ?> <span class="badge badge-success"><?php echo e($product->payment_status); ?></span> <?php else: ?> <span class="badge badge-warning"><?php echo e(Helper::translation(2086,$translate)); ?></span> <?php endif; ?></td>
                                            <td><a href="my-orders-details/<?php echo e($product->ord_id); ?>/<?php echo e($product->purchase_token); ?>" class="btn btn-success btn-sm"><?php echo e(Helper::translation(2061,$translate)); ?></a> </td>
                                            <td>
                                            <?php if($product->payment_status != $payment_status_buyer or $product->payment_status == $payment_status_vendor): ?>
                                            <a href="<?php echo e(url('/conversation-to-buyer')); ?>/<?php echo e($product->username); ?>/<?php echo e($encrypter->encrypt($product->ord_id)); ?>" class="btn btn-primary btn-sm"><?php echo e(Helper::translation(2915,$translate)); ?></a>
                                            <?php else: ?>
                                            <span>---</span>
                                            <?php endif; ?>
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
    </main>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/inforrmz/b2bkart.inforidgetechnologyindia.com/resources/views/my-orders.blade.php ENDPATH**/ ?>