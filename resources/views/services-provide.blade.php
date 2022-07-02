@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Services Provide - {{ $allsettings->site_title }}</title>
  @include('style')
</head>

<body>
  @include('header')
  <main role="main" class="main-content">
       
	<section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">SERVICES PROVIDER </h2>
      </div>
    </section>
	
	<div class="container mt-3">
	<div class="row">
	    @foreach($services as $service)
	        <div class="col-12 col-md-6 col-lg-4 sm-margin-five-bottom mb-3">
                <div class="feature-box bg-white bg-white">
					<a href="#sev-provide">
                        <div class="content medi-box serv-prov">
							<div class="madi-text">
                                <div class="text-medium">{{ $service->service_name }}</div>
							</div>
                            @if(!empty($service->service_image))
                               <img src="{{ url('/') }}/public/storage/services/{{ $service->service_image }}"  />
                            @else 
                                <img = src="{{ url('/') }}/public/img/no-image.jpg"  />
                            @endif
                        </div>
					</a>
                </div>
            </div>
    	@endforeach
	</div>	
</div>
<div  id="sev-provide"></div>
<div class="container mt-3">
<div class="bg-white pt-3">
<form  action="{{ asset('/deal') }}" method="post" class="iso">
    @csrf	
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
					<h5>WE ARE DEALING ALL TYPE OF SERVICES :</h5>
						<h6>YOU WANT TO KNOW MORE PLEASE SUBMIT YOUR DETAILS:</h6>
						@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				  @endif
				  @if (session('success'))
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
					</div>
     <div class="form-row mt-4">
                        <div class="col-sm-6 pb-3">
                            <label for="First">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="First" value="{{old('first_name')}}" required>
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Last">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="Last" value="{{old('last_name')}}" required>
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Email">Email ID</label>
                            <input type="text" name="email" class="form-control" id="Email" value="{{old('email')}}" required>
                        </div>
		 				<div class="col-sm-6 pb-3">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}" id="mobile" required>
                        </div>
		 				<div class="col-sm-12 pb-3">
                            <label for="requirement">Your Related Requirement </label>
                            <textarea class="form-control" name="requirment" rows="4" id="requirement"  required></textarea>
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