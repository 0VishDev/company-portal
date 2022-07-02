@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
       <title>Onions in India - Manufacturers and Suppliers India </title>
       <meta name="description" content="Find Onions manufacturers, Onions suppliers, exporters, wholesalers and distributors in India - List of Onions selling companies from India with catalogs, phone numbers, addresses & prices for Onions.">
       <meta name="keywords" content="Onions manufacturers in India,Onions suppliers in India,Onions dealers in India,Onions distributors in India,Onions wholesalers in India">
    
  
  @include('style')
</head>

<body>
  @include('header')
  <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
    <div class="container text-left">
      <h2 class="mb-0">{{ Helper::translation(2040,$translate) }}</h2>
      <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2040,$translate) }}</span></p>
    </div>
  </section>
  <main role="main" class="main-content">
    <div class="container-fluid mt-3" id="demo">
      <div class="row jplist-panel">
        <div class="col-md-12 col-lg-3 col-sm-12">
            <div id="cate-flt" class="overlay-cate">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="mt-1 mb-1 pt-1 pb-1 overlay-content-cate">
            @php
                $subCatId = \Request::query('subcat_id');
                $subCatIds = explode(',', \Request::query('subcategory_id'));
                $businessTypes = explode(',', \Request::query('business_type'));
                $productPrice = \Request::query('product_price');
            @endphp
            
            <form action="" method="GET" id="shopForm">
            <input type="hidden" id="url_cat_id" value="{{ $shop['catId'] }}">
            
            <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
              <h5 class="card-header bg-white link-color">Related Categories</h5>
              <div class="card-body subcate-short mb-3">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="jplist-group">
                        @foreach($shop['subcategory'] as $subcategory)
                         @php $subCatName = \ZigKart\Helpers::joinString($subcategory->subcategory_slug); @endphp
                         <input type="checkbox" name="subcategory_ids[]" value="{{ $subCatName }}" data-input-change {{ ($subCatName == $subCatId ? 'checked' : (in_array($subCatName, $subCatIds) == 1 ? 'checked' : '')) }}> {{ $subcategory->subcategory_name }}<br />
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
              <h5 class="card-header bg-white link-color">Business Type</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="jplist-group">
                      <input type="checkbox" name="business_type[]" value="Manufacturer" data-input-change {{ (in_array('Manufacturer', $businessTypes) == 1 ? 'checked' : '') }}> Manufacturer<br />
                      <input type="checkbox" name="business_type[]" value="Supplier" data-input-change {{ (in_array('Supplier', $businessTypes) == 1 ? 'checked' : '') }}> Supplier<br/>
                      <input type="checkbox" name="business_type[]" value="Exporter" data-input-change {{ (in_array('Exporter', $businessTypes) == 1 ? 'checked' : '') }}> Exporter<br/>
                      <input type="checkbox" name="business_type[]" value="Trader" data-input-change {{ (in_array('Trader', $businessTypes) == 1 ? 'checked' : '') }}> Trader<br/>
                      <input type="checkbox" name="business_type[]" value="Wholeseller" data-input-change {{ (in_array('Wholeseller', $businessTypes) == 1 ? 'checked' : '') }}> Wholeseller<br/>
                      <input type="checkbox" name="business_type[]" value="Distributor" data-input-change {{ (in_array('Distributor', $businessTypes) == 1 ? 'checked' : '') }}> Distributor<br/>
                      <input type="checkbox" name="business_type[]" value="Retailer" data-input-change {{ (in_array('Retailer', $businessTypes) == 1 ? 'checked' : '') }}> Retailer<br/>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
              <h5 class="card-header bg-white link-color">Price</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="text" class="js-range-slider" name="product_price" id="product_price" value="{{ $productPrice }}" data-min="0" data-max="50000" onblur="searchFilter()"/>
                  </div>
                </div>
              </div>
            </div>
            
            </form>
            
          </div>
        </div>
        <span class="Categories-filter" onclick="openNav()"><i class="fa fa-filter" aria-hidden="true"></i> Short Results by</span>
        </div>
        
        <div class="col-md-12 col-lg-9 col-sm-12">
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
            <div class="mt-1 mb-1 pt-1 pb-1">
            <div class="row">
                @foreach($shopProducts as $product)
                    @php
                        $product = $product['product'];
                        
                        $productPrice = \Request::query('product_price');
                        
                        if(strlen($productPrice) > 0 && $productPrice > 0){
                            if(!is_numeric($product->product_price) || $product->product_price > $productPrice){
                                continue;
                            }
                        }
                        
                        $serviceProvider = \ZigKart\Helpers::getPackage($product->user->id);
                        
                        $userName = (isset($product->user->company_name) ? $product->user->company_name : '');
                        
                        if (preg_match('/^[\w\s?]+$/si', $userName)) {
                            $userNameSlug = $userName;
                        } else {
                            $userNameSlug = $product->user->name;
                        }
                    @endphp
                <div class="col-sm-12 col-md-12">
                    <div class="product-listing bg-orange shadow pt-3 pl-1 pr-1 mb-4">
            		<div class="row">
            			<div class="col-xs-5 col-sm-12 col-md-3 mb-3 pro-img">
            			    @if(!empty($serviceProvider))
                			   <div class="pack-bg">
                			       <div class="imageInn">
                			           @if(!empty($serviceProvider->provider_small_image)) 
                                          <img src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_small_image }}" class="pack-tag" alt="{{ $serviceProvider->provider_name }}" title="{{ $serviceProvider->provider_name }}"/>
                                       @else 
                                          <img src="{{ url('/') }}/public/img/bronze-icon.png" class="pack-tag" alt="{{ $serviceProvider->provider_name }}" title="{{ $serviceProvider->provider_name }}"/>  
                                       @endif
                            		</div>
                            		<div class="hoverImg">
                            		    @if(!empty($serviceProvider->provider_image)) 
                                          <img src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_image }}" class="pack-tag1" alt="{{ $serviceProvider->provider_name }}" title="{{ $serviceProvider->provider_name }}" />
                                       @else 
                                          <img src="{{ url('/') }}/public/img/BRONZE.png" class="pack-tag1" alt="{{ $serviceProvider->provider_name }}" title="{{ $serviceProvider->provider_name }}"/>  
                                       @endif
                                    </div>
                		        </div>
                		    @endif
            		
            			<a href="{{ URL::to('/product') }}/{{ $product->product_slug }}"><img src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}"  alt="{{ $product->product_name }}"></a>
            				<!--<div class="sponsored-listing"><span class="spon-text">Sponsored Listing</span> <span class="sponsored-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></div>-->
            			</div>
            			<div class="col-xs-7 col-sm-12 col-md-5 mb-1">
            			    <div class="row direction">
            			        <div class="col-sm-12 col-md-2">
            			            <span class="float-right mdi"><img src="/public/img/Seal-Png.png" alt="india tag"></span>
            			        </div>
            			        <div class="col-sm-12 col-md-10 shop-india">
            			            <div class="pro-heading">
            				<p><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ $product->product_name }}</a>
                                        				</p>
            				</div>
            			        </div>
            			    </div>
            			
            				<hr>
            				<p class="pro-d"><span>Price Range : <i class="fa fa-inr" aria-hidden="true"></i> {{ (is_numeric($product->product_price) ? ''.$product->product_price : $product->product_price) }}</span></p>
            				{{--<p class="pro-d"><span>Product Type : {{ ucfirst($product->product_type) }}</span></p>--}}
            				
            				@if(count($product->variants) > 0)
                                @foreach($product->variants as $variant)
                                    <p class="pro-d"><span>Packaging Type : {{ $variant->package_type }}</span></p>
                                    <p class="pro-d"><span>Brand : {{ $variant->brand }}</span></p>
                                    <p class="pro-d"><span>Color : {{ $variant->color }}</span></p>
                                @endforeach
                            @endif
            			</div>
            			<div class="col-sm-12 col-md-4 mb-1">
            			<div class="seller-detail">
            				<div class="saller-heading">
            				    <p class="com-logo">
            				        @if(!empty($product->user->company_logo))
                                        <img src="{{ url('/') }}/public/storage/company-logo/{{ $product->user->company_logo }}" alt="{{ (isset($product->user->company_name) ? $product->user->company_name : '') }}" class="img img-responsive">
                                    @else
                                        <img src="{{ url('/') }}/public/img/no-image.jpg" class="img img-responsive" style="display:none;" alt="{{ (isset($product->user->company_name) ? $product->user->company_name : '') }}">
                                    @endif
                                </p>
            				<p><a href="{{ URL::to('/bt-'.str_slug($userNameSlug, '-')) }}"> {{ $userName }}</a> <small class="text-red"><b>({{ (isset($product->user->primary_type) ? $product->user->primary_type : '') }})</b></small></p>
            				
            				
            				</div>
            				<!--<p class="seller-locaton"><i class="fa fa-map-marker" aria-hidden="true" style="color:#ff1d25;"></i> {{ (!empty($product->user->user_address) ? $product->user->user_address : (!empty($product->user->business_address) ? $product->user->business_address : '')) }}</p>-->
            				<p class="seller-locaton"><i class="fa fa-map-marker" aria-hidden="true" style="color:#ff1d25;"></i> {{ (isset($product->user->city) && !empty($product->user->city) ? $product->user->city->city_name : '') }} {{ (isset($product->user->state) && !empty($product->user->state) ? ', '.$product->user->state->state_name : '') }}</p>
            				<p class="seller-com">
            				<span class="yrs">{{ \Carbon\Carbon::now()->format('Y') - (!empty($product->user->year_of_establishment) ? $product->user->year_of_establishment : '2019')  }} Years</span>
            				@if(!empty($product->user->vr_trust_icon))
            				    <span><a href="{{ (!empty($product->user->vr_trust_docs) ? url('/').'/public/storage/vr-trust/'.$product->user->vr_trust_docs : '#') }}" target="_blank" style="color:#000;" title="VR Trust"><img src="{{ url('/') }}/public/storage/vr-trust/{{ $product->user->vr_trust_icon }}" alt="vr trust"> VR Trust</a></span>
            				@endif
            				</p>
            				<p class="web-site"><a href="{{ (isset($product->user->company_website) ? $product->user->company_website : '') }}" target="_blank"> {{ (isset($product->user->company_website) ? $product->user->company_website : '') }}</a></p>
            				<p class="saller-contact">
            					{{--<span class="phone"><a href="tel:{{ (!empty($product->user->mobile) ? $product->user->mobile : (!empty($product->user->mobile) ? $product->user->mobile : '')) }}"><i class="fa fa-phone" aria-hidden="true"></i> {{ (!empty($product->user->mobile) ? $product->user->mobile : (!empty($product->user->mobile) ? $product->user->mobile : '')) }}</a></span>--}}
            					<span><a class="btn btn-dark-green" data-send-inquiry-btn seller="{{ $product->user }}" buyer="@if(Auth::check()) {{ Auth::user() }} @endif" product="{{ $product }}">Send Inquiry</a></span>
            				</p>
            				</div>
            			</div>
            		</div>
            	 </div>
            	</div>
            @endforeach
          </div>
          
          
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="float-right">
                    {{ $shopProducts->appends(request()->query())->links() }}
                </div>
              <!--<div class="jplist-label customlable" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging">-->
              <!--</div>-->
              <!--<div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-items-per-page="{{ $allsettings->product_per_page }}">-->
              <!--</div>-->
            </div>
          </div>
          
        </div>
      </div>
    </div>
    </div>
  </main>
  @include('footer')
  @include('javascript')
  <script>
  $(document).ready(function() {
    $('[data-input-change]').change(function () { 
        searchFilter();
    });
    
    $("#product_price").on("input blur", function() {
        searchFilter();
    });
    
    function searchFilter(){ 
        $('#shopForm').css('pointer-events', 'none');
        
        var subCatIds = [];
        $('input[name="subcategory_ids[]"]:checked').each(function() {
            subCatIds.push($(this).val());
        });
        
        var businessTypes = [];
        $('input[name="business_type[]"]:checked').each(function() {
            businessTypes.push($(this).val());
        });
        
        var productPrice = $('#product_price').val();
        
        var redirectUrl = '{{ url('/') }}/shop?subcategory_id='+subCatIds.join(',');
        redirectUrl += '&business_type='+businessTypes.join(',');
        redirectUrl += '&product_price='+productPrice;
        
        var catId = $('#url_cat_id').val();
        if(catId.length > 0){
            redirectUrl += '&cat_id='+catId;
        }
        
        window.location.href = redirectUrl;
    }
  });
  
   $('[btn-send-inquiry]').click(function () {
      var productId = $(this).attr('product-id');
      var productImg = $(this).attr('product-img');
      
      $('#productId').val(productId);
      $('#productImage').val(productImg.split('/').pop());
      
      $('#productInquiryImage').attr('src', productImg);
      $('#sendInquiryModal').modal('show');
   });
</script>

<script>
function openNav() {
  document.getElementById("cate-flt").style.height = "100%";
}

function closeNav() {
  document.getElementById("cate-flt").style.height = "0%";
}
</script>
</body>
</html>
@else
@include('503')
@endif