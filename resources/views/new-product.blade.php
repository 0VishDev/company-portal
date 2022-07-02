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
       
	<section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">Upload Product</h2>
        <p class="mb-0"><a href="https://b2bkart.inforidgetechnologyindia.com">Home</a>  <span class="split">&gt;</span> <span>Upload Product</span></p>
      </div>
    </section>
	
<div class="container-fluid mt-3">
<div class="row">
	<div class="col-sm-12 text-center">
	<h4 class="black mb-3 pb-3 mt-4 pt-4">Upload and Promote Products at NO COST!
	</h4>
	</div>
</div>
</div>	
	
	<div class="container mt-3">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3 text-center">
			<div class="bg-upload">
		 <p><i class="fa fa-camera-retro" aria-hidden="true"></i></p>
		 <p>Post upto 50 products with photographs for free</p>
		</div>
			</div>
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3 text-center">
			<div class="bg-upload">
		 <p><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
		 <p>Modify or delete anytime from My VeniceRed section.</p>
		</div>
			</div>
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3 text-center">
			<div class="bg-upload">
		 <p><i class="fa fa-desktop" aria-hidden="true"></i></p>
		 <p>Service free for a year</p>
		</div>
			</div>
	</div>
		
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
				<div class="bg-white text-black pt-3 pb-1">
			<p>The Fields Marked (*) are Mandatory. Please do not put html in form fields.</p>
			</div>
				</div>
		</div>
		<form class="mb-3 up-form">
	<div class="row">
	<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<h6 class="black">Your Email </h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-3">
		<input type="email" placeholder="Enter your email" name="email" class="form-control">
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-1">
		<h6 class="black">Choose Category </h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-1">
		<select class="form-control">
			<option>------- Search keywords --------	</option>
			</select>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<h6 class="black">Product Name</h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-3">
		<input type="text" placeholder="Product Name" name="Product-Name" class="form-control">
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<h6 class="black">Product Code</h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-3">
		<input type="text" placeholder="Product Code" name="Product-Code" class="form-control">
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<h6 class="black">Product Description</h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-3">
		<textarea placeholder="Product Description" class="form-control" rows="6"> </textarea>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<h6 class="black">Upload Picture  <br><small>(Accepts gif, jpeg, jpg, tif, png, bmp only)</small></h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-3">
		<input type="file" accept="image/jpeg">
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<h6 class="black"></h6>
		</div>
		<div class="col-sm-12 col-md-9 col-lg-9 mb-3">
		<button type="submit" class="btn btn-success">Upload Product</button> <button type="button" class="btn btn-skip">Skip</button>
		</div>
	</div>
		</form>
</div>

@include('footer')
  @include('javascript')
  <div class="modal fade" id="GetBestPrice" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Get the best price for <span id="popNameTitle"></span></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="/request" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="vendor_id" value="">
                <input type="hidden" name="product_id" value="">
                <div class="row">
                  <div class="col-md-4 con-bg12">
                    <div class="contact-info">
                      <div class="text-center">
                        <img id="popImg" src="https://via.placeholder.com/300?text='No Image Found'" class="img img-fluid" alt="image">
                        <p id="popNameSub">Product Name</p>
                        <span>Sold By - <span id="popVendor"></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 con-bg1">
                    <div class="contact-form">
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="quantity">Quantity</label>
                        <div class="col-sm-9">
                          <input type="text" name="quantity" id="quantity" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="unit">Unit (Ex.: kg, g, l, units, etc.)</label>
                        <div class="col-sm-9">
                          <input type="text" name="unit" id="unit" value="">
                        </div>
                      </div>
                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <label>Payment Option:</label>
                          <div class="d-flex flex-column flex-wrap">
                            <label for="option_1"><input type="radio" value="Full Advance Payment" name="payment_method" id="option_1"> Full Advance Payment</label>
                            <label for="option_2"><input type="radio" value="Pay on Delivery" name="payment_method" id="option_2"> Pay on Delivery</label>
                            <label for="option_3"><input type="radio" value="50% Advance and 50% on Delivery" name="payment_method" id="option_3" checked> 50% Advance and 50% on Delivery</label>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-blue">Send</button>
                          </div>
                        </div>
                      </div>
                      @if(!Auth::guest())
                      <div class="form-group mt-5">
                        <p class="col-sm-12">Your Contact Information :</p>
                        <p class="col-sm-12">Email Id:{{ Auth::user()->email }}</p>
                        <p class="col-sm-12">Mobile Number:{{ Auth::user()->user_phone }}</p>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
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