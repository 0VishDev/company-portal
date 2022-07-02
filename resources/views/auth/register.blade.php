@if($allsettings->maintenance_mode == 0)
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>{{ Helper::translation(2212,$translate) }} - {{ $allsettings->site_title }}</title>
        @include('style')
        {!! NoCaptcha::renderJs() !!}
        
        <style>
            .field-icon {
              float: right;
              margin-left: -25px;
              margin-top: -25px;
              position: relative;
              z-index: 2;
            }
            .d-n {
               display: none !important;
            }
        </style>
    </head>
	<body id="LoginForm">
	    @include('header')
	   <input type="hidden" name="base_path" id="base_path" value="{{ url('/') }}">
	   
	   <div class="container-fluid">
        <div class="">
           <div class="">
              <form method="POST" action="{{ route('register') }}" id="login_form">
               @csrf
               <div  class="lgn-body">
                   <div class="shadow bg-white mt-5 mb-5 ">
                   <div class="row">
                   <div class="col-sm-4 col-md-4 col-lg-4 bg-lgn sm-d-none">
                       <div class="d-none">
                       <h2 class="text-white mb-5">For New Users</h2>
                           <a href="#" class="nw-usr-crt">Create Account</a>
                           <p class="ln-or text-white"><span class="vrt-ln"></span> <span>or</span> <span class="vrt-ln"></span></p>
                           
                           <a href="#">
                                    <img src="{{ url('/') }}/public/img/gp.png" alt="">
                        </a>
                           <a href="#">
                                    <img src="{{ url('/') }}/public/img/fb.png" alt="">
                        </a>
                       </div>
                       </div>   
                       <div class="col-sm-8 col-md-8 col-lg-8">
                   
                       @if ($message = Session::get('success'))
                          <div class="clearfix"></div><br />
                         <div class="alert alert-success" role="alert">
                            <span class="alert_icon lnr lnr-checkmark-circle"></span>
                               {{ $message }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <i class="fa fa-close"></i>
                               </button>
                         </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="clearfix"></div><br />
                            <div class="alert alert-danger" role="alert">
                               <span class="alert_icon lnr lnr-warning"></span>
                                 {{ $message }}
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close"></i>
                                 </button>
                            </div>
                        @endif
                        @if (!$errors->isEmpty())
                            <div class="clearfix"></div><br />
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
                    
                   <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="float-right">
                   @if($allsettings->site_logo != '')
                	<a href="{{ URL::to('/') }}" class="navbar-brand">
                	<img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}" class="logo">
                	</a>
                	@endif
                   </div>
                   </div>
                   <div class="formBox">
                       
                       <input type="hidden" id="provider_id" name="provider_id" value="{{ \Request::query('provider_id') }}">
                       <input type="hidden" id="provider" name="provider" value="{{ \Request::query('provider') }}">
                       
						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Your Name</div>
									<input id="name" type="text" class="form-control rounded-0 input" name="name" value="{{ \Request::query('name') }}" data-bvalidator="required" autocomplete="name">
                                     @error('name')
                         <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                         @enderror
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Username</div>
									<input id="username" type="text" name="username" class="form-control rounded-0 input"  data-bvalidator="required">
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Email Address</div>
									<input id="email" type="email" class="form-control rounded-0 input" name="email" value="{{ \Request::query('email') }}" autocomplete="email" data-bvalidator="email,required">
                                     @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Mobile Number</div>
									<input type="number" name="phone" value="" id="phone" class="form-control rounded-0 input">
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">User Type</div>
									<select id="user_type" class="form-control rounded-0 input" name="user_type" data-bvalidator="required">
                                        <option value=""></option>
                                        <option value="customer">Buyer</option>
                                        <option value="vendor">Seller</option>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Country</div>
									<select class="form-control rounded-0 input" name="country" id="country" data-bvalidator="required">
                            @foreach($allcountry as $key => $country)
                          <option value="{{ $country->country_id }}" {{ ($country->country_name == 'India' ? 'selected' : '') }}>{{ $country->country_name }}</option>
                        @endforeach
                                            </select>
                                    @if ($errors->has('country'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('country') }}</strong>
                      </span>
                    @endif
                                   
								</div>
							</div>
                            <div class="col-sm-12 d-n" id="vendorThemes">
								<div class="inputBox focus">
									<div class="">Theme</div>
									<label for="theme_1">
                     <input type="radio" name="theme" value="theme-1" id="theme_1" checked> 
                     <img class="img-thumb" src="{{ url('/') }}/public/storage/vendor-template/theme-1.jpg" alt="Theme 1">
                     <span class="mr-3">Theme 1</span>
                  </label>
                  <label for="theme_2">
                     <input type="radio" name="theme" value="theme-2" id="theme_2">
                     <img class="img-thumb" src="{{ url('/') }}/public/storage/vendor-template/theme-2.jpg" alt="Theme 2">
                     <span class="mr-3">Theme 2</span>
                  </label>
                  <label for="theme_3">
                     <input type="radio" name="theme" value="theme-3" id="theme_3">
                     <img class="img-thumb" src="{{ url('/') }}/public/storage/vendor-template/theme-3.jpg" alt="Theme 3">
                     <span class="mr-3">Theme 3</span>
                  </label>
                  <label for="theme_4">
                     <input type="radio" name="theme" value="theme-4" id="theme_4">
                     <img class="img-thumb" src="{{ url('/') }}/public/storage/vendor-template/theme-4.jpg" alt="Theme 4">
                     <span>Theme 4</span>
                  </label>
								</div>
							</div>
                            
                            <div class="col-sm-6 d-n" data-buyer-row>
								<div class="inputBox focus">
									<div class="inputText">State</div>
									<select class="form-control rounded-0 input" name="state" id="state">
                                @foreach($registerStates as $state)
                          <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                        @endforeach
                                            </select>
                                    @if ($errors->has('state'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('state') }}</strong>
                      </span>
                    @endif
								</div>
							</div>
                            
                            <div class="col-sm-6 d-n" data-buyer-row>
								<div class="inputBox focus">
									<div class="inputText">City</div>
									<select class="form-control rounded-0 input" name="city" id="city">
                                        @foreach($registercities as $city)
                          <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                   @if ($errors->has('city'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('city') }}</strong>
                      </span>
                    @endif
								</div>
							</div>
							
							<div class="col-sm-6 d-n" data-buyer-row>
								<div class="inputBox focus">
									<div class="inputText">Company Name</div>
									<input type="text" class="form-control rounded-0 input" name="company_name" id="company_name">
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Password</div>
									<input id="password" type="password" class="form-control rounded-0 input" name="password" autocomplete="new-password" data-bvalidator="required">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="inputBox focus">
									<div class="inputText">Confirm Password</div>
									<input id="password-confirm" type="password" class="form-control rounded-0 input" name="password_confirmation" data-bvalidator="equal[password],required" autocomplete="new-password">
                                    <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 text-center">
                                <input type="submit" class="btn nw-usr-login" value="Register">
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
            $(document).ready(function() {
               $("#user_type").on("change", function() {
                  if($(this).val() == 'vendor') {
                    $("#vendorThemes").removeClass('d-n');
                  }else{
                    $("#vendorThemes").addClass('d-n');
                  }
                  
                  if($(this).val() == 'customer') {
                    $('[data-buyer-row]').removeClass('d-n');
                    $('#state').prop('required', true);
                    $('#city').prop('required', true);
                  }else{
                    $('[data-buyer-row]').addClass('d-n'); 
                    $('#state').prop('required', false);
                    $('#city').prop('required', false);
                  }
               });
            });
            
            $(".toggle-password").click(function() {
              $(this).toggleClass("fa-eye fa-eye-slash");
              var input = $($(this).attr("toggle"));
              if (input.attr("type") == "password") {
                input.attr("type", "text");
              } else {
                input.attr("type", "password");
              }
            });
    
            $('#country').change(function () {
                var countryId = $(this).val();
                $('#state').empty();
                $('#city').empty();
            
                var base_path = $('#base_path').val();
                $.ajax({
                  type:"POST",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: base_path+'/states/get',
                  data : {'country_id': countryId},
                  success:function(data){
                    if(data.states.length > 0){
                      $.each(data.states, function( k, v ) {
                        var option = '<option value="'+v.id+'">'+v.state_name+'</option>';
                        $('#state').append(option);
                      });
                    }
            
                    if(data.cities.length > 0){
                      $.each(data.cities, function( k, v ) {
                        var option = '<option value="'+v.id+'">'+v.city_name+'</option>';
                        $('#city').append(option);
                      });
                    }
                  }
                });
            });
            
              $('#state').change(function () {
        var stateId = $(this).val();
        $('#city').empty();
    
        var base_path = $('#base_path').val();
        $.ajax({
          type:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: base_path+'/cities/get',
          data : {'state_id': stateId},
          success:function(data){
            if(data.cities.length > 0){
              $.each(data.cities, function( k, v ) {
                var option = '<option value="'+v.id+'">'+v.city_name+'</option>';
                $('#city').append(option);
              });
            }
          }
        });
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
    padding: 56px 122px;
}
.bg-lgn{
    background-image: url({{ url('/') }}/public/img/crt-usr.jpg);
    background-size: cover;
    background-position: bottom;
    padding: 110px 50px;
    text-align: center;
}
.nw-usr-crt {
    background-color: #0e517b;
    color: #fff;
    padding: 10px 15px;
    border-radius: 20px;
}
.nw-usr-login{
    background-color: #0e517b;
    color: #fff;
    padding: 4px 34px;
    border-radius: 20px;  
        }
.formBox{
	margin-top: 0;
    padding: 0px 48px 20px 48px;
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
    font-size: 18px;
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
@else
@include('503')
@endif