<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>{{ Helper::translation(2041,$translate) }} - {{ $allsettings->site_title }}</title>
        @include('style')
    </head>
	<body id="LoginForm">
	    @include('header')
	   <div class="container-fluid">
        {{--<div align="center" class="mt-2 mb-5">
        @if($allsettings->site_logo != '')
    	<a href="{{ URL::to('/') }}" class="navbar-brand">
    	<img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}" class="logo">
    	</a>
    	@endif
        </div>--}}
        <div class="">
           <div class="">
               {{--<div class="panel">
               <h2>{{ Helper::translation(2041,$translate) }}</h2>
                   <p>{{ Helper::translation(2207,$translate) }}</p>
               </div>--}}
               <form action="{{ route('login') }}" method="POST" id="login_form">
                @csrf
                <div class="lgn-body">
           <div class="shadow bg-white mt-5 mb-5 ">
           <div class="row">
           <div class="col-sm-4 col-md-4 col-lg-4 bg-lgn">
               <div class="">
               <h2 class="text-white mb-5">For New Users</h2>
                   <a href="{{ URL::to('/register') }}" class="nw-usr-crt">Create Account</a>
                   <p class="ln-or text-white"><span class="vrt-ln"></span> <span>or</span> <span class="vrt-ln"></span></p>
                   @if($allsettings->display_social_login == 1)
                   <div>
                <a href="{{ url('/login/facebook') }}">
                            <img src="{{ url('/') }}/public/img/fb.png" alt="">
                </a>
                <a href="{{ url('/login/google') }}">
                            <img src="{{ url('/') }}/public/img/gp.png" alt="">
                </a>
                </div>
                   @endif
               </div>
               </div>
               <div class="col-sm-8 col-md-8 col-lg-8">
                   
               <div>
                   @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <span class="alert_icon lnr lnr-checkmark-circle"></span>
                          {{ $message }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close"></i>
                          </button>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                      <span class="alert_icon lnr lnr-warning"></span>
                         {{ $message }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close"></i>
                         </button>
                    </div>
                    @endif
                    @if (!$errors->isEmpty())
                    <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close"></i>
                    </button>
                    </div>
                    @endif
               </div>
                   <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12">
               <div class="float-right">
                   @if($allsettings->site_logo != '')
                   <a href="{{ url('/') }}" class="navbar-brand">
    	<img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}" class="logo">
    	</a>
                   @endif
                   </div>
                   </div>
                       <div class="col-sm-12 col-md-12 col-lg-12">
                   <div align="center" class="mt-2">
                    <h4 class="text-red">Welcome Back!</h4>
    	        </div>
                       </div>
                   <div class="formBox">
						<div class="row">

                            <input type="hidden" name="redirectUrl" id="redirectUrl" value="{{ (\Request::query('redirectTo') == 1 ? \URL::previous() : '') }}">
                            
							<div class="col-sm-12">
								<div class="inputBox focus">
									<div class="inputText">Email / User Name</div>
									<input type="text" class="form-control rounded-0 input" name="email" data-bvalidator="required">
								</div>
							</div>
                            
							<div class="col-sm-12">
								<div class="inputBox focus">
									<div class="inputText">Password</div>
									<input id="password" type="password" class="form-control rounded-0 input" name="password" data-bvalidator="required">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
                                <input type="submit" class="btn nw-usr-login" value="Login">
                            </div>
                                <div class="col-sm-6 mt-2">
                                <a href="{{ URL::to('/forgot') }}" class="text-red">Forgot Password?</a>
							</div>
						</div>
			</div>
                       </div>
               </div>
           </div>
           </div>
               </div>
            </form>
         </div>
        </div>
      </div>
    </div>
    @include('script')
    
    <script>
        $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
    </script>
    
    <style>
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
span.vrt-ln {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(255, 255, 255, 0.9);
    box-sizing: content-box;
    width: 95px;
    overflow: visible;
    display: block;
}
p.ln-or {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 2rem 0;
}
.lgn-body{
    background-image: url({{ url('/') }}/public/img/login-bg.png);
    background-size: cover;
    background-position: right;
    padding: 56px 160px;
    margin: 0 18px;
}
.bg-lgn{
    background-image: url({{ url('/') }}/public/img/crt-usr.jpg);
    background-size: cover;
    background-position: bottom;
    padding: 110px 30px;
    text-align: center;
}
.nw-usr-crt {
    background-color: #0e517b;
    color: #fff;
    padding: 10px 15px;
    border-radius: 20px;
}
.nw-usr-crt:hover{
    color: #fff;
}
.nw-usr-login{
    background-color: #0e517b;
    color: #fff;
    padding: 4px 34px;
    border-radius: 20px;  
        }
.formBox{
	margin-top: 0;
    padding: 35px 100px;
}
.inputBox{
	position: relative;
	box-sizing: border-box;
	margin-bottom: 50px;
}
.inputBox .inputText{
	position: absolute;
    font-size: 18px;
    line-height: 45px;
    transition: .5s;
    opacity: .5;
}
.inputBox .input{
	position: relative;
	width: 100%;
	height: 50px;
	background: transparent;
	border: none;
    outline: none;
    font-size: 24px;
    border-bottom: 1px solid rgba(0,0,0,.5);
}
.focus .inputText{
	transform: translateY(-30px);
	font-size: 18px;
	opacity: 1;
	color: #00000082;
}
.form-control:focus {
    box-shadow: none;
}
input:-internal-autofill-selected {
    appearance: menulist-button;
    background-color: transparent!important;
    background-image: none !important;
    color: -internal-light-dark(black, white) !important;
}
@media (max-width:1200px){
.lgn-body {
    padding: 56px 69px;
    margin: 0px 0px;
}        
}
@media (max-width:992px){
.lgn-body {
    padding:  6px 30px;
    margin: 0px 0px;
}
.bg-lgn {
    padding: 110px 6px;
}
.formBox {
    margin-top: 0;
    padding: 35px 49px;
}
}
</style>
        <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
	 
	 @include('footer')
    @include('javascript')
 </body>
</html>