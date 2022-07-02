@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ Helper::translation(1913,$translate) }} - {{ $allsettings->site_title }}</title>
  @include('style')
</head>

<body>
  @include('header')
  <main role="main" class="main-content">
       
	<section class="headerbg" style="background-image: url('/public/storage/settings/1596614658191.jpg');">
      <div class="container text-left">
        <h2 class="mb-0">ISO CERTIFICATION </h2>
      </div>
    </section>
	
	<div class="container mt-3">
		<div class="bg-white shadow pt-4 pb-4">
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
				<h5>ISO CERTIFICATION </h5>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
				<form class="{{ url('iso-certification/add') }}" method="POST">
		            @csrf
		            
                    <div class="form-row mt-4">
                        <div class="col-sm-6 pb-3">
                            <label for="First">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                            @if ($errors->has('first_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('first_name') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Last">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                            @if ($errors->has('last_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('last_name') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @if ($errors->has('email'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                        </div>
		 				<div class="col-sm-6 pb-3">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                            @if ($errors->has('mobile'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('mobile') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="business">Business Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name">
                            @if ($errors->has('business_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('business_name') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="type_business">Type Of Business</label>
                            <select class="form-control" id="business_type" name="business_type">
                                <option value="">Select Business</option>
                                <option value="PVT. LTD. COMPANY">PVT. LTD. COMPANY</option>
                                <option value="SOLE PROPRIETORSHIP">SOLE PROPRIETORSHIP</option>
                                <option value="PARTNERSHIP">PARTNERSHIP</option>
                                <option value="OTHER">OTHER</option>
                            </select>
                            @if ($errors->has('business_type'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('business_type') }}</strong>
                              </span>
                            @endif
                        </div>
		 				<div class="col-sm-6 pb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                            @if ($errors->has('city'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('city') }}</strong>
                              </span>
                            @endif
                        </div>
                        
                        <div class="col-sm-6 pb-3">
                            <label for="gst">GST</label>
                            <select class="form-control" id="gst" name="gst">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @if ($errors->has('gst'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('gst') }}</strong>
                              </span>
                            @endif
                        </div>
                        
                        <div class="col-sm-6 pb-3">
                            <label for="pan">PAN Card</label>
                            <input type="text" class="form-control" id="pan_card" name="pan_card">
                            @if ($errors->has('pan_card'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('pan_card') }}</strong>
                              </span>
                            @endif
                        </div>
                    
		 				<div class="col-sm-12 pb-3">
                            <input type="checkbox" name="isAgree" id="isAgree" required> I accept the terma and condition of VeniceRed
                        </div>
		 				
		 				<div class="col-sm-12 pb-3">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('footer')
    @include('javascript')
    </body>
<script>
  $(document).ready(function() {
    $(".onGetBestPrice").on("click", function(event) {
      $("input[name='user_id']").val($(this).data("user-id"));
      $("input[name='vendor_id']").val($(this).data("vendor-id"));
      $("input[name='product_id']").val($(this).data("product-id"));

      var product_name = $(this).data("product-name");
      var vendor_name = $(this).data("vendor-name");
      var image_url = $(this).data("image-url");

      $("#popNameTitle").text(product_name);
      $("#popNameSub").text(product_name);
      $("#popImg").attr("src", image_url);
      $("#popVendor").text(vendor_name);
    });
  });
</script>

</html>
@else
@include('503')
@endif