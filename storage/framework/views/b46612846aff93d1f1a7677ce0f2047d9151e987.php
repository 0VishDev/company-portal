<?php
/**
 * Script Name - ZigKart - Multivendor Products Marketplace
 * Version - 5.0
 * Author - Codecanor
 */
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="author" content="<?php echo e($allsettings->site_title); ?>">

<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>

<link rel="canonical" href="<?php echo e(URL::to('/')); ?>">

<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/responsive.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/css/notifyme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/scratch.css')); ?>">

<?php echo $__env->make('dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link href="<?php echo e(URL::to('resources/views/template/css/carousel.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/font-awesome.min.css')); ?>">
<!--- scroller -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/scroller/swiper.css')); ?>">
<!--- scroller -->
<!--- quick-view -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/quick-view/style.css')); ?>">
<!--- quick-view -->
<!--- brands -->
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('resources/views/template/brands/style.css')); ?>">
<!--- brands -->
<!-- pagination -->
<link rel="stylesheet" href="<?php echo e(URL::to('public/css/custom.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/scroller/swiper.css')); ?>">

<!-- picker -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui-timepicker-addon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui.css')); ?>" />
<!-- picker -->

<!--- product slider -->
<link rel="stylesheet"  href="<?php echo e(URL::to('resources/views/template/product-carousel/css/lightslider.css')); ?>">
<!--- product slider -->

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<link href="<?php echo e(URL::to('resources/views/template/css/select2.min.css')); ?>" rel="stylesheet" />

<link href="<?php echo e(URL::to('resources/views/template/css/ion.rangeSlider.min.css')); ?>" rel="stylesheet" />


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K6HJZRS');</script>
<!-- End Google Tag Manager -->

<?php /**PATH /home/a0yq2z3dupoj/public_html/businessworldtrade.in/resources/views/style.blade.php ENDPATH**/ ?>