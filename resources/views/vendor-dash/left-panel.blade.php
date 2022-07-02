<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $allsettings->site_title }}</title>
	@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/selectFX/css/cs-skin-elastic.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/assets/css/style.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/assets/css/vendor-style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/picker/jquery-ui-timepicker-addon.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/picker/jquery-ui.css" />
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/admin/template/picker/jquery-ui.css" />
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/template/css/scratch.css" />
	
</head>

<body>
	<aside id="left-panel" class="left-panel vendor_dashboard">
		<nav class="navbar navbar-expand-sm navbar-default">
			<div class="navbar-header">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
					aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}"><img
						src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"
						alt="{{ $allsettings->site_title }}" width="180" /></a>
				<a class="navbar-brand hidden" href="{{ url('/') }}"><img
						src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}"
						alt="{{ $allsettings->site_title }}" width="24" /></a>
			</div>
			<div id="main-menu" class="main-menu collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="{{ ( ( \Request::is('vendor/dashboard')) ? 'current' : '') }}"><a href="{{url('/')}}/vendor/dashboard" class="toggle"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a></li>
				    
				    <li class="menu-item-has-children dropdown {{ ( ( \Request::is('vendor/contact-profile') || \Request::is('vendor/business-profile') || \Request::is('vendor/statutory-profile') || \Request::is('vendor/bank-details') || \Request::is('vendor/my-drive')) ? 'current show' : '') }}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Company Profile</a>
						<ul class="sub-menu children dropdown-menu {{ ( ( \Request::is('vendor/contact-profile') || \Request::is('vendor/business-profile') || \Request::is('vendor/statutory-profile') || \Request::is('vendor/bank-details') || \Request::is('vendor/my-drive')) ? 'show' : '') }}">
							<li class="{{ ( ( \Request::is('vendor/contact-profile')) ? 'current1' : '') }}"><i class="fa fa-gear"></i><a href="{{url('/')}}/vendor/contact-profile">Contact Profile</a></li>
							<li class="{{ ( ( \Request::is('vendor/business-profile')) ? 'current1' : '') }}"><i class="fa fa-gear"></i><a href="{{url('/')}}/vendor/business-profile">Business Profile</a></li>
							<li class="{{ ( ( \Request::is('vendor/statutory-profile')) ? 'current1' : '') }}"><i class="fa fa-gear"></i><a href="{{url('/')}}/vendor/statutory-profile">Documents Details</a></li>
							{{--<li class="{{ ( ( \Request::is('vendor/my-drive')) ? 'current1' : '') }}"><i class="fa fa-gear"></i><a href="{{url('/')}}/vendor/my-drive">Products Docs</a></li>--}}
							<li class="{{ ( ( \Request::is('vendor/bank-details')) ? 'current1' : '') }}"><i class="fa fa-gear"></i><a href="{{url('/')}}/vendor/bank-details">Bank Details</a></li>
							<li class="{{ ( ( \Request::is('vendor/my-drive')) ? 'current1' : '') }}"><a href="{{url('/')}}/vendor/my-drive"> <i class=" fa fa-shopping-cart"></i> Products Docs</a></li>
						</ul>
					</li>
					
				    <li class="{{ ( ( \Request::is('vendor/premium-services')) ? 'current' : '') }}">
						<a href="{{url('/')}}/vendor/premium-services" class="toggle"> <i class="menu-icon fa fa-envelope"></i>Services Package</a>
					</li>
					
					<li class="{{ ( ( \Request::is('vendor/lead-desk')) ? 'current' : '') }}">
						<a href="{{url('/')}}/vendor/lead-desk" class="toggle"> <i class="menu-icon fa fa-envelope"></i>Lead Desk</a>
					</li>
					
					<li class="menu-item-has-children dropdown {{ ( ( \Request::is('vendor/relevant-leads') || \Request::is('vendor/recent-leads') || \Request::is('vendor/shortlisted-leads') || \Request::is('vendor/consumed-leads') || \Request::is('vendor/transaction-history')) ? 'current show' : '') }}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i> Buy Leads</a>
						<ul class="sub-menu children dropdown-menu {{ ( ( \Request::is('vendor/relevant-leads') || \Request::is('vendor/recent-leads') || \Request::is('vendor/shortlisted-leads') || \Request::is('vendor/consumed-leads')|| \Request::is('vendor/transaction-history')) ? 'show' : '') }}">
							<li class="{{ ( ( \Request::is('vendor/relevant-leads')) ? 'current1' : '') }}"><i class="fa fa-file-text-o"></i><a href="{{url('/')}}/vendor/relevant-leads">Product Relevant Leads</a></li>
							<li class="{{ ( ( \Request::is('vendor/recent-leads')) ? 'current1' : '') }}"><i class="fa fa-file-text-o"></i><a href="{{url('/')}}/vendor/recent-leads">Current Leads</a></li>
							<li class="{{ ( ( \Request::is('vendor/shortlisted-leads')) ? 'current1' : '') }}"><i class="fa fa-file-text-o"></i><a href="{{url('/')}}/vendor/shortlisted-leads">Shortlisted Leads</a></li>
							<li class="{{ ( ( \Request::is('vendor/consumed-leads')) ? 'current1' : '') }}"><i class="fa fa-file-text-o"></i><a href="{{url('/')}}/vendor/consumed-leads">Consumed Leads</a></li>
							<li class="{{ ( ( \Request::is('vendor/transaction-history')) ? 'current1' : '') }}"><i class="fa fa-file-text-o"></i><a href="{{url('/')}}/vendor/transaction-history">Total Lead Records</a></li>
							<li><i class="fa fa-file-text-o"></i><a href="{{ url('vendor/scratch-card') }}">Scratch Card</a></li>
						</ul>
					</li>
					<li class="{{ ( ( \Request::is('vendor/manage-products')) ? 'current' : '') }}"><a href="{{url('/')}}/vendor/manage-products" class="toggle"> <i class="menu-icon fa fa-shopping-cart"></i>Manage Products </a></li>
					
                    <li class="menu-item-has-children dropdown {{ ( ( \Request::is('vendor/notification') || \Request::is('vendor/account') || \Request::is('vendor/location') || \Request::is('vendor/changepassword')) ? 'current show' : '') }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu {{ ( ( \Request::is('vendor/notification') || \Request::is('vendor/account') || \Request::is('vendor/location') || \Request::is('vendor/changepassword')) ? 'show' : '') }}">
                            <li class="{{ ( ( \Request::is('vendor/notification')) ? 'current1' : '') }}"><i class="fa fa-cogs" aria-hidden="true"></i><a href="{{url('/')}}/vendor/notification">Notification Setting</a></li>
                            <li class="{{ ( ( \Request::is('vendor/account')) ? 'current1' : '') }}"><i class="fa fa-cogs" aria-hidden="true"></i><a href="{{url('/')}}/vendor/account">Account Setting</a></li>
							<li class="{{ ( ( \Request::is('vendor/location')) ? 'current1' : '') }}"><i class="fa fa-cogs" aria-hidden="true"></i><a href="{{url('/')}}/vendor/location">Location Preferences</a></li>
							<li class="{{ ( ( \Request::is('vendor/changepassword')) ? 'current1' : '') }}"><i class="fa fa-cogs" aria-hidden="true"></i><a href="{{url('/')}}/vendor/changepassword">Change Password</a></li>
                        </ul>
                    </li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</aside>
	
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
                <div class="user-area dropdown float-right mt-2">
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: uppercase; font-weight: 600;">
                         Welcome {{ Auth::user()->name }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="user-menu dropdown-menu shadow">
                        <a class="nav-link" href="{{  url('/') }}/vendor/contact-profile"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="{{  url('/') }}/vendor/notification"><i class="fa fa-cog"></i> Settings</a>
                        <a class="nav-link" href="{{  url('/') }}/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>