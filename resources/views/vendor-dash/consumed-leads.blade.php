@include('vendor-dash.left-panel')


	<div class="container ven-dash desk">
		<div class="bg-white pl-2 pt-4 pb-4 pr-4 mb-2">
			<div class="row">
				<div class="col-sm-12">
				<div class="row">
				    <div class="col-sm-9">
				        <h4>Buy Leads: @if(count(\Auth::user()->package_tags) > 0)
                        	     @foreach(\Auth::user()->package_tags as $packageTag){{ $packageTag->service_provider->total_lead }}
                                @endforeach
                              @endif</h4>
				    </div>
				    <div class="col-sm-3 pl-5">
				        <h4>Consumed Lead: {{ count($productInquiry) }}</h4>
				    </div>
				</div>
					</div>
			</div>
        </div>
            <div class="lead-list">
            <div class="row">
				<div class="col-sm-12">
                    <table class="table table-res">
                        <thead style="background-color: #b1b1b1;">
                        <tr>
                          <th scope="col">Buyer</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Location</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Date/Time</th>
                        </tr>
                        </thead>
                            <tbody>
                                 @foreach($productInquiry as $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->company_name }}</td>
                                        <td>{{ $inquiry->location }}</td>
                                        <td>{{ (isset($inquiry->product) ? $inquiry->product->product_name : $inquiry->product_name) }}</td>
                                        {{--<td>Qty: {{ $inquiry->quantity }}<br>{{ $inquiry->requirement_type }}<br>{{ $inquiry->want_to_buy }}<br>{{ $inquiry->i_want_to_buy }}<br>{{ $inquiry->purpose }}<br>{{ $inquiry->buying_request_description }}</td>--}}
                                        <td>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A') }}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->


@include('vendor-dash.bottom-links')