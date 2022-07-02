@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Advertise  - {{ $allsettings->site_title }}</title>
  @if($view_name != 'product')
<meta name="description" content="{{ $allsettings->site_desc }}">
<meta name="keywords" content="{{ $allsettings->site_keywords }}">
@endif
  @include('style')
</head>

<body>
  @include('header')
  <main role="main" class="main-content">
       
	<section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0"> ADVERTISE WITH US </h2>
      </div>
    </section>
	
	<div class="container mt-3">
	<div class="row packages">
		<div class="col-sm-12 mb-3">
		<h3>PRODUCT AND SERVICES </h3>
		</div>
		@foreach($serviceProviders as $serviceProvider)
    		<div class="col-sm-6 col-md-4 mb-3">
    		    <input type="radio" id="{{ $serviceProvider->provider_name }}" name="serviceProvider" value="{{ $serviceProvider->service_price }}">
                        <label for="{{ $serviceProvider->provider_name }}">
    		    <div class="bg-white shadow pb-1 adv text-center">
            	    <div class="adv-img">
            	        <a href="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->service_docs }}" target="_blank">
        			    @if(!empty($serviceProvider->provider_image))
                           <img src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_image }}" alt="{{ $serviceProvider->provider_name }}"/>
                        @else 
                            <img = src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $serviceProvider->provider_name }}"/>
                        @endif
                        </a>
            		</div>
            		<div class="">
    					<h5><a href="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->service_docs }}" target="_blank">{{ $serviceProvider->provider_name }}</a></h5>
    				
    				</div>
    			</div>
    			</label>
    		</div>
    	@endforeach
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