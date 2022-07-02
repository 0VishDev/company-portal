<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2197,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2197,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2197,$translate)); ?></span></p>
      </div>
    </section>
   <main role="main">
      <div class="container page-white-box mt-3">
      <div>
                                </div>
         <div class="row">
           <div class="col-md-12 mt-1 mb-1 pt-1 pb-1">
         	    <div class="container emp-profile">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                        <a href="https://codecanor.com/demo/zigkart/user/vendor" title="vendor">
                            <?php if(!empty($user->user_photo)): ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>" class="rounded">
                            <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" class="rounded">
                            <?php endif; ?>
                         </a>   
                        </div>
                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo e($user->name); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo e($user->email); ?></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo e($user->user_gender); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo e((!empty($user->mobile) ? $user->mobile : (!empty($user->user_phone) ? $user->user_phone : '-'))); ?></p>
                                            </div>
                                        </div>
                        </div> 
                       <div class="col-md-9 ash-bg">
                        <div class="profile-banner">
                          <img src="https://codecanor.com/demo/zigkart/public/storage/users/157848453345.jpg" alt="" class="rounded">
                         </div>
                        <div class="profile-head">
                            <h4 class="text-white"> <?php echo e((!empty($user->user_address) ? $user->user_address : (!empty($user->address_short) ? $product->user->address_short : '-'))); ?></h4>
                            <p class="theme-color"><?php echo e((isset($user->city) && !empty($user->city) ? $user->city->city_name : '')); ?> <?php echo e((isset($user->state) && !empty($user->state) ? ', '.$user->state->state_name : '')); ?>, Member since <?php echo e(\Carbon\Carbon::parse($user->created_at)->format('F Y')); ?></p>
                       </div>
                       <div class="tabnav mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enquiries</a>
                                </li>
                                </ul>
                        </div>    
                        <div class="tab-content profile-tab" id="myTabContent_new">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>S.no</th>
                                            <th>Product Name</th>
                                            <th>Location</th>
                                            <th>Requirement</th>
                                            <th>Date / Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $productInquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$key); ?></td>
                                            <td><?php echo e((isset($inquiry->product->product_name) ? $inquiry->product->product_name : $inquiry->product_name)); ?></td>
                                            <td><?php echo e($inquiry->location); ?></td>
                                            <td>Qty: <?php echo e($inquiry->quantity); ?><br><?php echo e($inquiry->requirement_type); ?><br><?php echo e($inquiry->want_to_buy); ?><br><?php echo e($inquiry->i_want_to_buy); ?><br><?php echo e($inquiry->purpose); ?><br><?php echo e($inquiry->buying_request_description); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A')); ?></td>
                                        </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>   
                            </div>
                        </div>
                    </div>
                </div>
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
<?php endif; ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/buyer.blade.php ENDPATH**/ ?>