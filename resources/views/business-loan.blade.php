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
        <h2 class="mb-0">BUSINESS LOAN FORM</h2>
      </div>
    </section>
	
	<div class="container mt-3">
		<div class="bg-white shadow pt-4 pb-4">
		<form class="{{ url('business-loan/add') }}" method="POST">
		    @csrf
		    
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
				<h5>BUSINESS LOAN FORM</h5>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
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
                            <label for="loan_amount">Loan Amount</label>
                            <select class="form-control" id="loan_amount" name="loan_amount">
                                <option value="2 Lakh - 5 Lakh">2 Lakh  -  5 Lakh</option>
                                <option value="5 Lakh - 10 Lakh">5 Lakh - 10 Lakh</option>
                                <option value="10 Lakh - 20 Lakh">10 Lakh - 20 Lakh</option>
                                <option value="20 Lakh - 30 Lakh">20 Lakh - 30 Lakh</option>
                                <option value="30 Lakh - 50 Lakh">30 Lakh - 50 Lakh</option>
                                <option value=" 50 Lakh - 1Cr"> 50 Lakh - 1Cr</option>
                                <option value="1Cr And Above">1Cr And Above</option>
                            </select>
                            @if ($errors->has('loan_amount'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('loan_amount') }}</strong>
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
		 				<div class="col-sm-6 pb-3">
                            <label for="loan_Tenure">Loan Tenure</label>
                            <select class="form-control" id="loan_tenure" name="loan_tenure">
                                <option value="1 YEAR">1 YEAR</option>
                                <option value="2 YEAR">2 YEAR</option>
                                <option value="3 YEAR">3 YEAR</option>
                                <option value="4 YEAR">4 YEAR</option>
                                <option value="5 YEAR">5 YEAR</option>
                            </select>
                            @if ($errors->has('loan_tenure'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('loan_tenure') }}</strong>
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
				</div>
			</div>
		</form>
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