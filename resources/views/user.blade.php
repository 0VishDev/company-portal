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
      <div class="container page-white-box mt-3">
         <div class="row">
           <div class="col-md-12 mt-1 mb-1 pt-1 pb-1">
         	    <div class="container emp-profile">
                  <div class="row">
                    <div class="col-md-3 white-bg">
                        <div class="profile-img">
                        <a href="{{ URL::to('/user') }}/{{ $user_details->username }}" title="{{ $user_details->name }}">
                        @if($user_details->user_photo != "")
                        <img src="{{ url('/') }}/public/storage/users/{{ $user_details->user_photo }}" alt="" class="rounded">
                        @else
                        <img src="{{ url('/') }}/public/img/no-user.png" alt="" class="rounded">
                        @endif
                        </a>   
                        </div>
                        <div align="center">
                            <div class="info mt-2">
                        <div class="title">
                            <a href="{{ URL::to('/user') }}/{{ $user_details->username }}" title="{{ $user_details->username }}" class="theme-color">{{ $user_details->name }}</a>
                        </div>
                        </div>
                        </div>
                        </div> 
                       <div class="col-md-9 ash-bg">
                        <div class="profile-banner">
                         @if($user_details->user_banner != "")
                           <img src="{{ url('/') }}/public/storage/users/{{ $user_details->user_banner }}" alt="" class="rounded">
                         @else
                         <img src="{{ url('/') }}/public/img/no-image.jpg" alt="" class="rounded">
                         @endif  
                        </div>
                        <div class="profile-head">
                                    @if($user_details->user_address != "")
                                    <h4 class="text-white">
                                        {{ $user_details->user_address }}
                                    </h4>
                                    @endif
                       </div>
                       <div class="tabnav mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ Helper::translation(2108,$translate) }}</a>
                                </li>
                               <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{ Helper::translation(2198,$translate) }}</a>
                                </li>
                                </ul>
                        </div>    
                        <div class="tab-content profile-tab" id="myTabContent_new">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      <div class="row">
                                            <div class="col-md-3">
                                                <label>{{ Helper::translation(2018,$translate) }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{ $user_details->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>{{ Helper::translation(2014,$translate) }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{ $user_details->email }}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-3">
                                                <label>{{ Helper::translation(2103,$translate) }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{ $user_details->user_gender }}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-3">
                                                <label>{{ Helper::translation(2199,$translate) }}</label>
                                            </div>
                                            <div class="col-md-9">
                                               @php echo nl2br($user_details->user_about); @endphp
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>{{ Helper::translation(2200,$translate) }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{ $user_details->user_phone }}</p>
                                            </div>
                                        </div>
                            </div>
                           <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                           <form action="{{ route('user') }}" class="seller_form" id="seller_form" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                      <label class="font-weight-bold" for="fullname">{{ Helper::translation(2015,$translate) }}</label>
                                      <input type="text" id="from_name" class="form-control" name="from_name" placeholder="{{ Helper::translation(2015,$translate) }}" data-bvalidator="required">
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <label class="font-weight-bold" for="email">{{ Helper::translation(2014,$translate) }}</label>
                                      <input type="text" id="email" class="form-control" name="from_email" placeholder="{{ Helper::translation(2001,$translate) }}" data-bvalidator="required,email">
                                    </div>
                                  </div>
                                 <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                      <label class="font-weight-bold" for="phone">{{ Helper::translation(2002,$translate) }}</label>
                                      <input type="text" id="phone" class="form-control" name="phone" placeholder="{{ Helper::translation(2200,$translate) }}" data-bvalidator="required">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                  <div class="col-md-12">
                                      <label class="font-weight-bold" for="message">{{ Helper::translation(2126,$translate) }}</label> 
                                      <textarea name="message_text" id="message" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea>
                                    </div>
                                  </div>  
                                  <input type="hidden" name="to_email" value="{{ $user_details->email }}">
                                  <input type="hidden" name="to_name" value="{{ $user_details->name }}">
                                  <div class="row form-group">
                                    <div class="col-md-12">
                                      <input type="submit" value="{{ Helper::translation(2201,$translate) }}" class="btn button-color">
                                    </div>
                                  </div>
                                </form>
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