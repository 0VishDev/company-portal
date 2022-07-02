@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Supplier By Region - {{ $allsettings->site_title }}</title>
  @include('style')
</head>

<body>
  @include('header')
  <main role="main" class="main-content">

    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">Supplier By Region</h2>
      </div>
    </section>

    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="black mb-3 pb-3 mt-4 pt-4">India's Manufacturing & Industry Hubs</h4>
        </div>
      </div>

      <div class="shadow bg-white hub p-3">
        <div class="row">
          @foreach($allstate as $state)
          <div class="col-sm-6 col-md-3 col-lg-2 mb-4">
            <h6><a href="{{ url('regions/'.\ZigKart\Helpers::joinString($state->state_name)) }}">{{ $state->state_name }}</a></h6>
            @foreach($state->cities as $key => $city)
                @php if($key > 4){ break; } @endphp
                <p><a href="{{ url('city/'.\ZigKart\Helpers::joinString($city->city_name)) }}">{{ $city->city_name }}</a></p>
            @endforeach
            
            @if(count($state->cities) > 5)
                <p><a href="{{ url('regions/'.\ZigKart\Helpers::joinString($state->state_name)) }}"><u>View More</u></a></p>
            @endif
          </div>
          @endforeach
        </div>
      </div>
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