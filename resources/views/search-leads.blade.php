@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Buyer Directory - {{ $allsettings->site_title }}</title>
    @include('style')
  </head>
  <body>
    @include('header')
    <main role="main" class="main-content">
    <div class="container-fluid mt-3" id="demo">
      <div class="bg-white leads shadow p-2 jplist-panel">
        <form class="up-leads" action="" method="GET" id="searchLeadForm">
          <div class="row">
              <div class="container text-center">
        <h2 class="mb-1 text-black">Buyer Directory</h2>
         </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group has-search shadow rounded1">
                <button type="submit" class="fa fa-search form-control-feedback"></button>
                <input type="text" class="form-control" placeholder="Search Your Product Name" id="search" name="search" value="{{ \Request::query('search') }}" {{ (empty(\Request::query('search')) ? 'required' : '') }}>
              </div>
            </div>
          </div>
        </form>
        <div class="row list">
            @foreach($productInquiry as $inquiry)
                @php $mobile = (!empty($inquiry->user->mobile) ? $inquiry->user->mobile : (!empty($inquiry->user->user_phone) ? $inquiry->user->user_phone : $inquiry->mobile)); @endphp
                 <div class="col-sm-12 col-md-12 list-item">
                
                    <div class="shadow bg-white p-3 mt-3">
                  <div class="row mt-1">
                    <div class="col-sm-12 col-md-8">
                      <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-1">
                          <h5><img src="{{ url('/') }}/public/img/lead-flag.png" alt="India" class="country-flag"> {{ (isset($inquiry->product) ? $inquiry->product->product_name : $inquiry->product_name) }}</h5>
                          <div class="table-responsive-sm">
                            <table class="table">
                              <tr>
                                <td>I Want </td>
                                <td>{{ $inquiry->want_to_buy }}</td>
                              </tr>
                              
                              <tr>
                                <td>Product Name </td>
                                <td>{{ $inquiry->i_want_to_buy }}</td>
                              </tr>
                              <tr>
                                <td>Quantity</td>
                                <td>{{ $inquiry->quantity }}</td>
                              </tr>
                              <tr>
                                <td>Preferred Location</td>
                                <td>{{ $inquiry->sale_purchase }}</td>
                              </tr>
                              <tr>
                                <td>Packaging Size  </td>
                                <td>{{ $inquiry->packaging_size }}</td>
                              </tr>
                             
                              <!--<tr>
                                <td>Requirement Type</td>
                                <td>{{ $inquiry->requirement_type }}</td>
                              </tr>-->
                            </table>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-1">
                          <h5 class="time"><img src="{{ url('/') }}/public/img/lead-watch.png" alt="India" class="country-flag"> 
                            <span>{{ \Carbon\Carbon::parse($inquiry->created_at)->diffForHumans() }}</span>
    					    <span>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M, y') }}</span>
                          </h5>
                          <div class="table-responsive-sm">
                            <table class="table">
                                <br>
                                 
                                <tr>
                                    <td>Requirment Frequency</td>
                                    <td>{{ $inquiry->requirmeny_frequency }}</td>
                                  </tr>
                              <tr>
                                <td>Purpose</td>
                                <td>{{ $inquiry->purpose }}</td>
                              </tr>
                              <!--<tr>
                                <td>Preferred Location</td>
                                <td>{{ $inquiry->location }}</td>
                              </tr>-->
                              <tr>
                                <td>Payment Term</td>
                                <td>{{ $inquiry->payment_term }}</td>
                              </tr>
                              <tr>
                                <td>Delivery Place  </td>
                                <td>{{ $inquiry->delivery_place }}</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        @if(!empty($inquiry->buying_request_description))
                            <div class="col-sm-12 col-md-12 mb-1">
                              <p>Description: <span>{{ $inquiry->buying_request_description }}</span></p>
                            </div>
                        @endif
                        
                        <div class="col-sm-12 col-md-12 text-center">
                          <div class="con-btn mt-2 mb-2">
                              <a href="#" data-target="#iaminterest" data-toggle="modal">Contact Buyer Now</a>
                            {{--<a href="tel:{{ $mobile }}">Contact Buyer Now</a>--}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <div class="row">
                        <div class="col-sm-12 col-md-1 col-lg-1 mb-1 d-xs-none">
                          <span class="vr"></span>
                        </div>
                        <div class="col-sm-12 col-md-11 col-lg-11 mb-1">
                          <h5><img src="{{ url('/') }}/public/img/lead-location.png" alt="India" class="country-flag"> 
                            <span>{{ (!empty($inquiry->location) ? $inquiry->location : '-') }}</span>
                          </h5>
                          <p class="text-red">Buyer's details</p>
                          <p>{{ (isset($inquiry->user) ? $inquiry->user->name : $inquiry->name) }}</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <td>Member</td>
                                <td>{{ (isset($inquiry->user) ? \Carbon\Carbon::parse($inquiry->user->created_at)->diffForHumans() : '-') }}</td>
                              </tr>
                              <tr>
                                <td>Buyer</td>
                                <td>{{ (isset($inquiry->user) ? ($inquiry->user->verified == 1 ? 'Verified' : '-') : 'Verified') }}</td>
                              </tr>
                              <tr>
                                <td>Mobile</td>
                                <td>{{ (!empty($mobile) ? '*****'.substr($mobile, 6, strlen($mobile)) : '-') }}</td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td>******{{ strtolower(substr($inquiry->email, 5, strlen($inquiry->email))) }}</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            @endforeach
        </div>
        <div class="clearfix"></div><br />
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="float-right">
                    {{ $productInquiry->appends(request()->query())->links() }}
                </div>
              <!--<div class="jplist-label customlable" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging">-->
              <!--</div>-->
              <!--<div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-items-per-page="{{ $allsettings->product_per_page }}">-->
              <!--</div>-->
            </div>
        </div>
      </div>
    </div>
    @include('footer')
    @include('javascript')
    
    
    <div class="modal fade show" id="iaminterest" aria-modal="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="mb-0 text-white ml-5">Your Buy Lead</small></h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pricing">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h4 class="card-price text-center text-red"><i class="fa fa-inr" aria-hidden="true"></i> {{ number_format($siteSettings->site_product_inquiry_fee, 2) }}<span class="period">/lead</span></h4>
                                    
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><img src="/public/img/lead-one.png"></span>Single Buy Lead</li>
                                        <li><span class="fa-li"><img src="/public/img/lead-userverified.png"></span>Verified Buyer</li>
                                        <li><span class="fa-li"><img src="/public/img/lead-phone.png"></span>Support</li>
                                        <li><span class="fa-li"><img src="/public/img/lead-gift.png"></span>Purchase Buy Lead And Get Welcome Gift</li>
                                    </ul>
                                    <a href="{{ url('pay-now') }}" class="btn btn-block bg-red text-uppercase">Buy Now</a>
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
</html>
@else
@include('503')
@endif