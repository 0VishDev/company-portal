<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e(Helper::translation(2036,$translate)); ?></title>
</head>
<body class="preload dashboard-upload">
<div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2><?php echo e(Helper::translation(2036,$translate)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <?php echo e(Helper::translation(2037,$translate)); ?>

                        <br/>
                        <a href="<?php echo e(url('/reset')); ?>/<?php echo e($user_token); ?>"><?php echo e(Helper::translation(2038,$translate)); ?></a>    
                     </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html><?php /**PATH /home/inforrmz/venicered.com/resources/views/forgot_mail.blade.php ENDPATH**/ ?>