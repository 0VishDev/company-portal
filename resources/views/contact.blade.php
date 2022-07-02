@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2012,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2012,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2012,$translate) }}</span></p>
      </div>
    </section>
    <main role="main">
      <div class="container page-white-box mt-3">
          <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">1 - B2B</h4>
                  <p>We are a business directory with thousands of products in more than 200 categories. We aim to connect all the buyers and sellers digitally so that they can run their business efficiently. Join us to grow your business in simple and easy steps.</p>
              </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">2 -  Distributorship</h4>
                  <p>We provide a fast and secure distributorship network to our customers in every corner of the world. Our professional distributors will deliver your desired products in the required quantity within the given time or even before. </p>
              </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="shadow p-3 h-100">
                  <h4 class="text-red font-w">3 - E-Filing</h4>
                  <p>We are a 360-degree online portal that offers all the services that are required to run a business. Either you have a startup or a running business, we have all the services in one place, may that be GST, PAN registration, or Income tax return, a solution for every problem is ready.</p>
              </div>
              </div>
          </div>
          </div>
          <div class="container page-white-box mt-3">
         <div class="row">
	    <div class="col-md-12">
	        <h4>{{ Helper::translation(2013,$translate) }}</h4>
		    <hr>
	    </div>
		<div class="col-md-6">
		    <div class="address">
		    <h5>{{ Helper::translation(2003,$translate) }}:</h5>
		    <ul class="list-unstyled">
		        <li> {!! $allsettings->office_address !!}</li>
		       
		    </ul>
		    </div>
		    <div class="email">
		    <h5>{{ Helper::translation(2014,$translate) }}:</h5>
		    <ul class="list-unstyled">
		        <li> {{ $allsettings->office_email }}</li>
		        
		    </ul>
		    </div>
		    <div class="phone">
		        <h5>{{ Helper::translation(2002,$translate) }}:</h5>
		        <ul class="list-unstyled">
		        <li> {{ $allsettings->office_phone }}</li>
		       
		    </ul>
		    </div>
		</div>
		<div class="col-md-6">
            <div>
             @if ($message = Session::get('success'))
               <div class="alert alert-success" role="alert">
                   <span class="alert_icon lnr lnr-checkmark-circle"></span>
                      {{ $message }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                      </button>
               </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span class="fa fa-close" aria-hidden="true"></span>
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
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            @endif
            </div>
		    <div class="card">
		        <div class="card-body">
		             <form action="{{ url('contact-us/add') }}" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="user_name" name="user_name" placeholder="{{ Helper::translation(2015,$translate) }}" class="form-control" type="text" data-bvalidator="required" required>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="inputEmail4" placeholder="{{ Helper::translation(2014,$translate) }}" name="email" id="email" data-bvalidator="email,required" required>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="mobile" name="mobile" placeholder="Mobile No." class="form-control" type="number" required>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" name="location" class="form-control" id="location" placeholder="Location" required>
                            </div>
                          </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                           <textarea class="form-control" cols="20" rows="5" placeholder="Tell Us Your Requirement" name="requirement" id="requirement" data-bvalidator="required"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn button-color">{{ Helper::translation(1919,$translate) }}</button>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
	</div>
   </div>
 </main>
 <style>
     .font-w {
    font-weight: 700;
}
 </style>
@include('footer')
@include('javascript')
</body>
</html>
@else
@include('503')
@endif