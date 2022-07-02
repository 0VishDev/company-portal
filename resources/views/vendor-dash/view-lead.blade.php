@include('vendor-dash.left-panel')
    
    <div class="container ven-dash desk">
		    <div class="bg-white p-2 mb-2">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-borderless">
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
        
        @php $mobile = (!empty($inquiry->user->mobile) ? $inquiry->user->mobile : (!empty($inquiry->user->user_phone) ? $inquiry->user->user_phone : $inquiry->mobile)); @endphp
        <div class="shadow bg-white p-3 mt-3 ven-dash fltr-ld leads  ">
			<div class="row mt-3">
				<div class="col-sm-12 col-md-8">
					<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 mb-1">
				<h6><img src="/public/img/lead-flag.png" alt="India" class="country-flag">  {{ (isset($inquiry->product) ? $inquiry->product->product_name : $inquiry->product_name) }}</h6>
					<div class="table-responsive-sm">
  					<table class="table">
	  					<tbody>
	  					  <tr>
                            <td>I Want to Buy</td>
                            <td>{{ $inquiry->i_want_to_buy }}</td>
                          </tr>
                          <tr>
                            <td>Quantity</td>
                            <td>{{ $inquiry->quantity }}</td>
                          </tr>
                          <tr>
                            <td>Requirement Type</td>
                            <td>{{ $inquiry->requirement_type }}</td>
                          </tr>
						</tbody></table>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 mb-1">
				<h6 class="time"><img src="/public/img/lead-watch.png" alt="India" class="country-flag"> 
					<span>{{ \Carbon\Carbon::parse($inquiry->created_at)->diffForHumans() }}</span>
			        <span>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M, y') }}</span>
					</h6>
					<div class="table-responsive-sm">
  					<table class="table">
	  					<tbody>
	  					    <tr>
                                <td>Purpose</td>
                                <td>{{ $inquiry->purpose }}</td>
                            </tr>
                            <tr>
                                <td>Preferred Location</td>
                                <td>{{ $inquiry->location }}</td>
                            </tr>
                            <tr>
                                <td>Want To Buy</td>
                                <td>{{ $inquiry->want_to_buy }}</td>
                            </tr>
						</tbody></table>
					</div>
				</div>
				    @if(!empty($inquiry->buying_request_description))
                        <div class="col-sm-12 col-md-12 mb-1">
                          <p>Description: <span>{{ $inquiry->buying_request_description }}</span></p>
                        </div>
                    @endif
                        <div class="col-sm-12 col-md-12 text-center">
    				<div class="rpl-btn mt-3">
    						<a href="mailto: {{ $inquiry->email }}">Reply</a>
    					</div>
					</div>	
				  </div>
				</div>
				
				<div class="col-sm-12 col-md-4">
                  <div class="row">
                    <div class="col-sm-12 col-md-1 col-lg-1 mb-1 d-xs-none">
                      <span class="vr"></span>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lg-10 mb-1">
                      <h5><img src="/public/img/lead-location.png" alt="India" class="country-flag"> 
                        <span>{{ (!empty($inquiry->location) ? $inquiry->location : '-') }}</span>
                      </h5>
                      <p class="text-red">Buyer's details</p>
                      <p>{{ (isset($inquiry->user) ? $inquiry->user->name : $inquiry->name) }}</p>
                      <div class="table-responsive-sm">
                        <table class="table">
                          <tr>
                            <td>Member:</td>
                            <td>{{ (isset($inquiry->user) ? \Carbon\Carbon::parse($inquiry->user->created_at)->diffForHumans() : 'Venice Red') }}</td>
                          </tr>
                          <tr>
                            <td>Buyer:</td>
                            <td>{{ (isset($inquiry->user) ? ($inquiry->user->verified == 1 ? 'Verified' : '-') : 'Verified') }}</td>
                          </tr>
                          <tr>
                            <td>Mobile:</td>
                            <td>{{ $mobile }}</td>
                          </tr>
                          <tr>
                            <td>Email:</td>
                            <td>{{ $inquiry->email }}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
			</div>
		</div>
    </div>
    
    @include('vendor-dash.bottom-links')