@php
/**
 * Script Name - ZigKart - Multivendor Products Marketplace
 * Version - 5.0
 * Author - Codecanor
 */
@endphp
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{ $allsettings->site_title }}">

@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif

<link rel="canonical" href="{{ URL::to('/') }}">

<link rel="stylesheet" href="{{ URL::to('resources/views/template/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('resources/views/template/css/style.css') }}">
<link rel="stylesheet" href="{{ URL::to('resources/views/template/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/notifyme.css') }}">
<link rel="stylesheet" href="{{ URL::to('resources/views/template/css/scratch.css') }}">

@include('dynamic')

<link href="{{ URL::to('resources/views/template/css/carousel.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::to('resources/views/template/css/font-awesome.min.css') }}">
<!--- scroller -->
<link rel="stylesheet" href="{{ URL::to('resources/views/template/scroller/swiper.css') }}">
<!--- scroller -->
<!--- quick-view -->
<link rel="stylesheet" href="{{ URL::to('resources/views/template/quick-view/style.css') }}">
<!--- quick-view -->
<!--- brands -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('resources/views/template/brands/style.css') }}">
<!--- brands -->
<!-- pagination -->
<link rel="stylesheet" href="{{ URL::to('public/css/custom.css') }}">
<link rel="stylesheet" href="{{ URL::to('resources/views/template/scroller/swiper.css') }}">

<!-- picker -->
<link rel="stylesheet" href="{{ URL::to('resources/views/admin/template/picker/jquery-ui-timepicker-addon.css') }}">
<link rel="stylesheet" href="{{ URL::to('resources/views/admin/template/picker/jquery-ui.css') }}" />
<!-- picker -->

<!--- product slider -->
<link rel="stylesheet"  href="{{ URL::to('resources/views/template/product-carousel/css/lightslider.css') }}">
<!--- product slider -->

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<link href="{{ URL::to('resources/views/template/css/select2.min.css') }}" rel="stylesheet" />

<link href="{{ URL::to('resources/views/template/css/ion.rangeSlider.min.css') }}" rel="stylesheet" />


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K6HJZRS');</script>
<!-- End Google Tag Manager -->

