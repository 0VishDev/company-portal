@include('vendor-dash.left-panel')


	<div class="container ven-dash">
		<div class="row">
			<div class="col-sm-12 mb-3">
				<div class="premium-bg">
					<h5 class="pb-2">Take your business to new heights with our Service Packages</h5>
					<p>Grow your business online and reach out to more buyers across India</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center mb-4">
				<h5>Benefits of our Service Packages</h5>
			</div>
			<div class="col-sm-12 premium-table mb-3">
				<div class="bg-white shadow">
					<table class="table table-bordered">
						<thead>
							<tr>
							    <th class="special-price">{{ (isset(Auth::user()->package_tag) ? Auth::user()->package_tag->service_provider->provider_name : '') }}</th>
								<th>Visibility</th>
								<th>Buy Leads</th>
								<th>Enquiries</th>
								<th>Online Catalog</th>
								<th>Free Profile</th>
								<th>Preferred Number Service</th>
							</tr>
						</thead>
						<tbody>
						    @if(isset(Auth::user()->package_tag))
						        <tr>
    							    <th>Yearly</th>
    								<td>Yes</td>
    								<td>{{ Auth::user()->package_tag->service_provider->total_lead }}</td>
    								<td>Unlimited</td>
    								<td>Yes</td>
    								<td>Yes</td>
    								<td>No</td>
    							</tr>
						    @else
    							<tr>
    							    <th>Free Listing</th>
    								<td>No</td>
    								<td>No</td>
    								<td>No</td>
    								<td>No</td>
    								<td>Yes</td>
    								<td>No</td>
    							</tr>
    						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>

	    <div class="row packages">
	        @foreach($serviceProviders as $serviceProvider)
	            @php $discountPrice = (strlen($serviceProvider->service_price) > 0 ? str_replace( ',', '', $serviceProvider->service_price) : 0); @endphp
	            
        		<div class="col-sm-6 col-md-3 mb-3" data-service-provider-list discount-price="{{ $discountPrice }}" final-price="0">
        		    <input type="radio" id="{{ $serviceProvider->provider_name }}" name="serviceProvider" value="{{ $discountPrice }}">
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
    		
		<div class="total-price mb-3 d-none">
			<div class="row">
				<div class="col-sm-8 mb-3">
					<span class="title-price">Special offered Price </span>
					<span class="cross-price" data-service-provider-final-price><i class="fa fa-inr" aria-hidden="true"></i> 0.00</span>
					<span class="main-price" data-service-provider-discount-price><i class="fa fa-inr" aria-hidden="true"></i> 0.00</span>
					<br>
					<small>+18% GST as applicable</small>
				</div>
				<div class="col-sm-4 mb-3">
					<button type="submit" class="btn btn-md btn-success">Buy Now</button>
				</div>
			</div>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

@include('vendor-dash.bottom-links')