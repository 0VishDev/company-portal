@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2197,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2197,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2197,$translate) }}</span></p>
      </div>
    </section>
   <main role="main">
      <div class="container-fluid page-white-box mt-3">
      <div>
                                </div>
         <div class="row">
           <div class="col-md-12 mt-1 mb-1 pt-1 pb-1">
         	    <div class="container-fluid emp-profile">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                            @if(!empty($user->user_photo))
                                <img src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" class="rounded" alt="{{ $user->name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.jpg" class="rounded" alt="{{ $user->name }}">
                            @endif   
                        </div>
                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->user_gender }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ (!empty($user->mobile) ? $user->mobile : (!empty($user->user_phone) ? $user->user_phone : '-')) }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Company</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->company_name }}</p>
                                            </div>
                                        </div>
                        </div> 
                       <div class="col-md-9 ash-bg">
                        <div class="profile-banner">
                          @if(!empty($user->user_banner))
                                <img src="{{ url('/') }}/public/storage/users/{{ $user->user_banner }}" class="" alt="{{ $user->name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.jpg" class="" alt="{{ $user->name }}">
                            @endif 
                         </div>
                        <div class="profile-head">
                            <h4 class="text-white"> {{ (!empty($user->user_address) ? $user->user_address : (!empty($user->address_short) ? $product->user->address_short : '-')) }}</h4>
                            <p class="theme-color">{{ (isset($user->city) && !empty($user->city) ? $user->city->city_name : '') }} {{ (isset($user->state) && !empty($user->state) ? ', '.$user->state->state_name : '') }}, Member since {{ \Carbon\Carbon::parse($user->created_at)->format('F Y') }}</p>
                       </div>
                       <div class="tabnav mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enquiries</a>
                                </li>
                                </ul>
                        </div>    
                        <div class="tab-content profile-tab" id="myTabContent_new">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>S.no</th>
                                            <th>Product Name</th>
                                            <th>Location</th>
                                            <th>Requirement</th>
                                            <th>Date / Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productInquiry as $key => $inquiry)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ (isset($inquiry->product->product_name) ? $inquiry->product->product_name : $inquiry->product_name) }}</td>
                                            <td>{{ $inquiry->location }}</td>
                                            <td>Qty: {{ $inquiry->quantity }}<br>{{ $inquiry->requirement_type }}<br>{{ $inquiry->want_to_buy }}<br>{{ $inquiry->i_want_to_buy }}<br>{{ $inquiry->purpose }}<br>{{ $inquiry->buying_request_description }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
           </div>
         </div>
      </div>
    </main>
    @include('footer')
    @include('javascript')
  </body>
</html>
@else
@include('503')
@endif