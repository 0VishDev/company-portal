<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/resources/views/template/logistics/css/lending-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="{{ url('/') }}/resources/views/template/logistics/css/jquery.min.js"></script>
<title>ISO Certification Contact- {{ $allsettings->site_title }}</title>

@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('public/css/notifyme.css') }}">
</head>
<body>
    <div class="header-main">
        <div class="container-fluid">
            <div class="header clearfix">
                <div class="logo-section">
                    @if($allsettings->site_logo != '')
                    <a href="{{ URL::to('/') }}">
                      <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}">
                    </a>
                    @endif
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="{{url('/')}}/lending/iso-certification">Home</a>
                        </li>
						<li>
                            <a href="{{url('/')}}/lending/iso-certification#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/lending/contact-iso">Contact Us</a>
                        </li>
                        <li class="contact-number">
							<span><a href="tel:{{ $allsettings->office_phone }}">{{ $allsettings->office_phone }}</a></span>
                        </li>
                    </ul>
				</div>
            </div> 
        </div>
    </div>
	
	<div class="banner-area bg-red">
                <div class="banner-content">
					<h1>Contact Us</h1>
                </div>
            </div>
	<div class="container">
			<div class="formBox shadow">
				<h3 class="text-center mb-4">REGISTERED OFFICE </h3>
				<h5>Infobiz world trade Pvt. Ltd.</h5>
				<p>{!! $allsettings->office_address !!}</p>
				<p>CONTACT NUMBER: +91-{{ $allsettings->office_phone }}</p>
			</div>
		</div>
	<div class="about-section">
        <div class="container-fluid">
		<div class="container">
			<div class="formBox shadow">
				<form action="{{ url('business-inquiry/add') }}" method="POST">
				    @csrf
				    <input type="hidden" name="type" id="type" value="ISO-CERTIFICATION">
				    
					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">First Name</div>
								<input type="text" name="first_name" id="first_name" class="input" required>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">Last Name</div>
								<input type="text" name="first_name" id="first_name" class="input" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Email Id</div>
								<input type="email" name="email" id="email" class="input" required>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Mobile Number</div>
								<input type="number" name="mobile" id="mobile" class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Requirement</div>
								<textarea rows="5" id="requirement" name="requirement" class="input"></textarea>
							</div>
						</div>
						<div class="col-sm-6 text-center">
							<input type="submit" name="" class="button btn btn-lg" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
        </div>
    </div>
	
    <div class="know-more-section">
        <div class="container-fluid">
            <strong>TO KNOW MORE ABOUT Infobiz world trade BUSINESS LOAN</strong>
            <ul>
                <li>
                    <a href="tel:{{ $allsettings->office_phone }}">{{ $allsettings->office_phone }}</a>
                </li>
                <li>
                    <a href="mailto:{{ $allsettings->office_email }}">{{ $allsettings->office_email }}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <div class="container-fluid clearfix">
            <div class="left-section">
                <div class="social-section">
						    <ul>
						        <li class="title mr-2">{{ Helper::translation(2022,$translate) }}</li>
                               @if($allsettings->facebook_url != '')
                                <li class="title mr-2">
                                    <a href="{{ $allsettings->facebook_url }}" target="_blank">
                                        <img src="{{ url('/') }}/public/img/facebook.png" alt="facebook">
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->instagram_url != '')
                                <li class="title mr-2">
                                    <a href="{{ $allsettings->instagram_url }}" target="_blank">
                                        <img src="{{ url('/') }}/public/img/instagram.png" alt="instagram">
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->twitter_url != '')
                                <li class="title mr-2">
                                    <a href="{{ $allsettings->twitter_url }}" target="_blank">
                                        <img src="{{ url('/') }}/public/img/twitter.png" alt="twitter">
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->gplus_url != '')
                                <li class="title mr-2">
                                    <a href="{{ $allsettings->gplus_url }}" target="_blank">
                                        <img src="{{ url('/') }}/public/img/linklen.png" alt="linklen">
                                    </a>
                                </li>
                                @endif
                                {{--@if($allsettings->pinterest_url != '')
                                <li class="title mr-2">
                                    <a href="{{ $allsettings->pinterest_url }}" target="_blank">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                @endif--}}
                                
                            </ul>
                </div>
                <div class="other-links">
                    <ul>
                        <li>
                            <a href="{{url('/')}}/lending/iso-certification#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/lending/contact-iso">Contact us</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/page/Terms-and-Conditions">Terms and Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-section">
                    <span>Copyright © 2020. All rights reserved.</span>
                </div>
            </div>
            <div class="right-section">
			@if($allsettings->site_logo != '')
        <a href="{{ URL::to('/') }}">
          <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"
            alt="{{ $allsettings->site_title }}">
        </a>
        @endif	
            </div>
        </div>
    </div>
    <script src="{{ asset('public/js/notifyme.js') }}"></script>

    <script type="text/javascript">
        @if (session('success'))
            notifyme.config({
                showtime: 4000,
                position:"topright" // topleft, bottomleft, bottmright
            });
        
            notifyme.create({
                title: "{{ session('success') }}",
    		    text: "",
    		    type: "success"
            });
        @endif
        
        @if (session('error'))
            notifyme.config({
                showtime: 4000,
                position:"topright" // topleft, bottomleft, bottmright
            });
            
            notifyme.create({
               title: "{{ session('error') }}",
    		   text: "",
    		   type: "error"
            });
        @endif
        
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
</body>
</html>
