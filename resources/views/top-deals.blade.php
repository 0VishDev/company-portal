@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2050,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2050,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2050,$translate) }}</span></p>
      </div>
    </section>
  <main role="main">
      <div class="container page-white-box mt-3">
         <div class="row" align="center">
                           @php $z = 1; @endphp
                              @foreach($deal['product'] as $product) 
                                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-2 pb-2 prod-item">
                                   <div class="product-grid2">
                                    <div class="product-image2">
                                    <div class="product-hider">
                               <a href="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" data-fancybox="quick-view-{{ $product->product_token.$z }}" data-type="image" class="quickview">
                               <i class="fa fa-eye"></i>
                               <p>{{ Helper::translation(2060,$translate) }}<br/>{{ Helper::translation(2061,$translate) }}</p>
                               </a>
                               <div class="product-images">
                                    @php $imagecount = count($product->productimages); @endphp
                                    @if($imagecount != 0)
                                    @foreach($product->productimages as $images)
                                    <a href="{{ url('/') }}/public/storage/product/{{ $images->product_image }}" data-fancybox="quick-view-{{ $product->product_token.$z }}" data-type="image"></a>
                                    @endforeach
                                    @endif
                                    </div>
                                    <div class="product-former">
                                    <h3>{{ $product->product_name }}</h3>
                                    <div class="mt-3">{{ Helper::translation(2062,$translate) }} : @if($product->product_stock != 0)<span class="theme-color">{{ Helper::translation(2063,$translate) }} ({{ $product->product_stock }})</span>@else<span class="red-color">{{ Helper::translation(2064,$translate) }} ({{ $product->product_stock }})</span>@endif</div>
            @php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg = "badge badge-secondary"; } @endphp
            @if($product->product_condition != "")<div class="mt-2">{{ Helper::translation(1950,$translate) }} : <span class="{{ $badg }}">{{ $product->product_condition }}</span></div>@endif
                                    {{-- <div class="mt-3">@if($product->product_price != 0)<span @if($product->product_offer_price != 0) class="fs16 offer-price red-color" @else class="fs32" @endif>{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span>@endif @if($product->product_offer_price != 0)<span class="fs32">{{ $allsettings->site_currency_symbol }}{{ $product->product_offer_price }}</span>@endif</div> --}}
                                                                    <p class="mt-3">
                                    {{ $product->product_short_desc }} 
                                    </p>
                                    <p><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="btn button-color">{{ Helper::translation(2065,$translate) }}</a></p>
                                    </div>
                                    </div>
                                    <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">
                                            @if($product->product_image != "")
                                            <img class="pic-1" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
                                            @else
                                            <img class="pic-1" src="{{ url('/') }}/public/img/no-image.jpg">
                                            @endif
                                            @php $imagecount = count($product->productimages); @endphp
                                            @if($imagecount != 0)
                                            @php $no = 1; @endphp
                                            @foreach($product->productimages as $images)
                                            @if($no == 1)
                                            <img class="pic-2" src="{{ url('/') }}/public/storage/product/{{ $images->product_image }}">
                                            @endif
                                            @php $no++; @endphp
                                            @endforeach
                                            @else
                                            <img class="pic-2" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
                                            @endif
                                            </a>
                                            @if($product->flash_deals == 1)
                                            <ul class="countdown-{{ $product->product_token }}" id="countdown-timer">
                                                <li>
                                                    <span class="days">00</span>
                                                    <p class="days_ref">{{ Helper::translation(2071,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="hours">00</span>
                                                    <p class="hours_ref">{{ Helper::translation(2072,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="minutes">00</span>
                                                    <p class="minutes_ref">{{ Helper::translation(2073,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="seconds last">00</span>
                                                    <p class="seconds_ref">{{ Helper::translation(2074,$translate) }}</p>
                                                </li>
                                            </ul>
                                            @endif
                                            <ul class="social">
                                              @if(Auth::guest())
                                                <li><a href="{{ url('/login') }}" data-tip="{{ Helper::translation(2066,$translate) }}"><i class="fa fa-heart"></i></a></li>
                                              @else
                                                @if(Auth::user()->id != $product->user_id)
                                                <li><a href="{{ url('/wishlist') }}/{{ Auth::user()->id }}/{{ $product->product_token }}"
                                                    data-tip="{{ Helper::translation(2066,$translate) }}"><i class="fa fa-heart"></i></a></li>
                                                @endif
                                              @endif
                                              </ul>
                                            {{-- <a class="add-to-cart" href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ Helper::translation(2067,$translate) }}</a> --}}
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ $product->product_name }}</a></h3>
                                            {{-- <span class="price like">{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span> --}}
                                            @if(Auth::guest())
                                              <p class="fo-txt mt-3 mb-3 d-block"><a href="/login" class="btn btn-blue" class="text-white">Get Best Price</a></p>
                                              @else
                                            <p class="fo-txt mt-3 mb-3 d-block"><button class="btn btn-blue text-white onGetBestPrice" data-target="#GetBestPrice" data-toggle="modal" data-product-id="{{ $product->product_id }}" data-user-id="@if(!Auth::guest()) {{Auth::user()->id}} @endif" data-vendor-id="{{ $product->user_id }}" data-image-url="@if($product->product_image != "") {{ url('/') }}/public/storage/product/{{ $product->product_image }} @endif" data-vendor-name="{{ \ZigKart\User::where(["id" => $product->user_id])->first()->name }}" data-product-name="{{$product->product_name}}">Get Best Price</button></p>
                                              @endif
                                        </div>
                                        </div>
                                    </div>
                                   @php $z++; @endphp      
                            @endforeach
                            </div>
                            <div class="row">
                               <div class="col-md-12" align="center">
                    <div class="turn-page" id="itempager"></div>
                </div> 
            </div>
      </div>
    </main>
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
                          <div class="form-group mt-5">
                            <p class="col-sm-12">Your Contact Information :</p>
                            <p class="col-sm-12">+91 958 999 9999</p>
                          </div>
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