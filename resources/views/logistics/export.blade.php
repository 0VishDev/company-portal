<!DOCTYPE php>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/resources/views/template/logistics/css/export-style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<script src="{{ url('/') }}/resources/views/template/logistics/css/jquery.min.js"></script>
<title>Export- {{ $allsettings->site_title }}</title>

@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/resources/views/template/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ url('/') }}/resources/views/template/css/bootstrap.css">
<script src="{{ url('/') }}/resources/views/template/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/resources/views/template/js/bootstrap.js"></script>
<link rel="stylesheet" href="{{ asset('public/css/notifyme.css') }}">
</head>
<body>
    <div class="header-main">
        <div class="container">
            <div class="header clearfix">
                <div class="logo-section">
                     @if($allsettings->site_logo != '')
        <a href="{{ URL::to('/') }}">
          <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"
            alt="{{ $allsettings->site_title }}">
        </a>
        @endif
                </div>
                <div class="menu-section">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
						<li>
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact Us</a>
                        </li>
                        <li class="contact-number">
                            <a href="tel:{{ $allsettings->office_phone }}">{{ $allsettings->office_phone }}</a>
                        </li>
                    </ul>
				</div>
            </div>
            <div class="banner-area">
                <div class="banner-content">
					<h1>We have perfect financial resolutions for Indian  <span style="color:#0e517b;">EXPORTERS</span></h1>
                </div>
                <div class="banner-image">
                    <img src="{{ url('/') }}/resources/views/template/logistics/img/export.jpg" alt="Infobiz world trade">
                </div>
            </div>
        </div>
    </div>
    <div class="about-section" id="aboutSection">
        <div class="container-fluid">
            <h2>Zero deposit and security</h2>
			<p class="fa-icon"><i class="fa fa-braille" aria-hidden="true"></i></p>
            <h3>Discounted Bills for Exporters</h3>
			<p>Our lending associates render the short-term term finance to Indian Exporters at zero collateral and security. </p>
			<p>Export bill discounting is a global trade term and practice. Export bill discounting is intended to support businesses faster payment for the goods they have shipped to the buyer. Export bill discounting befalls when a business deals with a buyer for their goods on credit. In international trade, this can be called a letter of credit, and a third-party financing company applies this agreement to determine the export bill discount amount. </p>
			<p>When a business and a buyer consent to the terms of an export contract, their particular financial mediators issue the proper payments when the contract requirements are met. This means initial payment for the exporter issued by their financial delegate, who then collects payment from the buyer’s bank at a succeeding date based on the agreed-upon payment terms. A business is, therefore, entirely able to settle with a buyer and promote the payment process through export bill discounting. With this agreement, the financial agents of the export business and the buyer work together.
</p>
			
			
		<div class="container">
		    <!--@if (session('success'))
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif-->
                    @if (session('success'))
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                @if (session('error'))
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
			<div class="formBox shadow">
				<form action="{{ url('savedata') }}" method="post">
				     @csrf
						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText"> Name </div>
									<input type="text" name="name"   class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Email</div>
									<input type="text" name="email" class="input" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Mobile</div>
									<input type="text" name="mobile" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Company Name</div>
									<input type="text" name="companyname" class="input" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">IEC Number</div>
									<input type="text" name="iecno" class="input" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Products you export</div>
									<input type="text" name="productexport" class="input" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 text-center">
								<input type="submit" name="" class="button btn btn-lg" value="Submit">
							</div>
						</div>
				</form>
			</div>
		</div>
        </div>
    </div>
    <div class="process-section-main" id="processSection">
        <div class="container-fluid">
            <h3>BENEFITS</h3>
            <div class="process-list">
                <div class="process">
                    <div class="content">
                        <span>Zero deposit and security </span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>Credit limit as per exporter demand</span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>80 % bill in the front, quickly after the specific goods get dispatched. </span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>Competing rates (0.7 – 0.9% per month)</span>
                    </div>
                </div>
                <div class="process">
                    <div class="content">
                        <span>Quick approval, least paperwork, convenient.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="know-more-section mt-5" id="contact">
        <div class="container-fluid">
            <strong>TO KNOW MORE ABOUT EXPORT BILL DISCOUNTING</strong>
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
                            <a href="#aboutSection">About Us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact us</a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/page/Terms-and-Conditions">Terms and Conditions</a>
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

<div class="notifyme_wrap topright"></div>
<script>
    $(document).ready(function () {
        $(".scroll-btn-section a").click(function () {
            $('html, body').animate({
                scrollTop: $("#aboutSection").offset().top
            }, 1000);
        });
    });

</script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
	 
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
