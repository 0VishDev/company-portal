@include('vendor-dash.left-panel')


	<div class="container ven-dash desk">
		<div class="bg-white p-2 mb-2">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-borderless table-res">
                        <thead>
                        <tr>
                          <th scope="col">Buy Leads: {{ count($productInquiry) }}/@if(count(\Auth::user()->package_tags) > 0)@foreach(\Auth::user()->package_tags as $packageTag){{ $packageTag->service_provider->total_lead }}
                                @endforeach
                              @endif</th>
                          <th scope="col">@if(count(\Auth::user()->package_tags) > 0)
                        	     @foreach(\Auth::user()->package_tags as $packageTag)
                                <img src="{{ url('/') }}/public/storage/service-providers/{{ $packageTag->service_provider->provider_image }}" width="30px" alt="{{ $packageTag->service_provider->provider_name }}"> {{ $packageTag->service_provider->provider_name }}
                                @endforeach
                              @endif</th>
                          <th scope="col"><a href="#download-inq" style="color:#0e517b;" data-target="#download-inq" data-toggle="modal" class="dnl-inq">Download Inquiries</a></th>
                          <th scope="col" class="desk-img">
                                @if(isset(Auth::user()->package_tag))
                                  <span style="color:#0e517b;">Account Manager:</span> {{ Auth::user()->account_manager_name }}  
                                  <span><a href="sms:{{ Auth::user()->account_manager_mobile }}"><img src="{{ url('/') }}/public/img/desk-sms.png" alt="SMS"></a></span>
                                  <span><a href="mailto:{{ Auth::user()->account_manager_email }}"><img src="{{ url('/') }}/public/img/desk-email.png" alt="Email"></a></span>
                                @else
                                  <span style="color:#0e517b;">Account Manager:</span> Help Desk
                                  <span><a href="sms:+919354065594"><img src="{{ url('/') }}/public/img/desk-sms.png" alt="SMS"></a></span>
                                  <span><a href="mailto:inquiry@businessworldtrade.com"><img src="{{ url('/') }}/public/img/desk-email.png" alt="Email"></a></span>
                                @endif
                              </th>
                        </tr>
                        </thead>
                    </table>
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
                                    <tr onclick="window.location.href = '{{ url('/') }}/vendor/view-lead/{{ $inquiry->inquiry_id }}';" style='cursor: pointer;'>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->company_name }}</td>
                                        <td>{{ $inquiry->location }}</td>
                                        <td>{{ (isset($inquiry->product) ? $inquiry->product->product_name : $inquiry->product_name) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A') }}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
					</div>
			</div>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<script>
    var inquiries = [];
    @foreach($productInquiry as $inquiry)
        var inquiry = {};
        inquiry.name = '{{ $inquiry->name }}';
        inquiry.company_name = '{{ $inquiry->company_name }}';
        inquiry.location_name = '{{ $inquiry->location }}';
        inquiry.product_name = '{{ $inquiry->product_name }}';
        inquiry.created_at_formatted = '{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A') }}';
        inquiry.created_at = '{{ \Carbon\Carbon::parse($inquiry->created_at)->format('Y-m-d') }}';
        
        inquiries.push(inquiry);
    @endforeach 
</script>

@include('vendor-dash.bottom-links')