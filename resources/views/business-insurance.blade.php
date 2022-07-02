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
        <h2 class="mb-0">  BUSINESS INSURANCE </h2>
      </div>
    </section>
	
	<div class="container mt-3">
		<div class="bg-white shadow pt-4 pb-4">
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
				<h5>  BUSINESS INSURANCE </h5>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
				    
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
                    
                    @if ($errors->any())
                        <div class="col-sm-12">
                         <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                         @foreach ($errors->all() as $error)
                          {{$error}}
                         @endforeach
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                         </div>
                        </div>   
                     @endif
            
				  <form class="{{ url('business-insuarance/add') }}" method="POST">
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
                            <label for="nature_business">Nature Of Business</label>
                            <select class="form-control" id="nature_business" id="nature_business">
                                <option value="">Select Business</option>
                                <option value="MANUFACTURER">MANUFACTURER</option>
                                <option value="WHOLESALER/TRADER">WHOLESALER/TRADER</option>
                                <option value="SUPPLIER/DISTRIBUTOR">SUPPLIER/DISTRIBUTOR</option>
                                <option value="RETAILER">RETAILER</option>
                            </select>
                            @if ($errors->has('nature_business'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('nature_business') }}</strong>
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
                            <label for="type_Insurance">Type Of Insurance</label>
                            <select class="form-control" id="insurance_type" name="insurance_type">
                                <option value="">Select Insurance</option>
                                <option value="Home-BASED BUSINESSES INSURANCE">Home-BASED BUSINESSES INSURANCE</option>
                                <option value="PRODUCT LIABILITY INSURANCE">PRODUCT LIABILITY INSURANCE</option>
                                <option value="VEHICLE INSURANCE">VEHICLE INSURANCE</option>
                                <option value="WORKERS'COMPENSATION INSURANCE">WORKERS'COMPENSATION INSURANCE</option>
                                <option value="BUSINESS INTERRUPTION INSURANCE">BUSINESS INTERRUPTION INSURANCE</option>
                                <option value="PROPERTY INSURANCE">PROPERTY INSURANCE</option>
                                <option value="PROFESSIONAL LIABILITY INSURANCE">PROFESSIONAL LIABILITY INSURANCE</option>
                                <option value="OTHER INSURANCE">OTHER INSURANCE</option>
                            </select>
                            @if ($errors->has('nature_business'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('nature_business') }}</strong>
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