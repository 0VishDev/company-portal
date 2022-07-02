@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(1973,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
   @include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(1973,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(1973,$translate) }}</span></p>
      </div>
    </section>
  <main role="main" class="main-content">
      <div class="container bg-white">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 mt-1 mb-1 pt-1 pb-1">
                <form class="bst-frm" action="" method="GET" id="">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group has-search shadow rounded1">
                        <button type="submit" class="fa fa-search form-control-feedback"></button>
                        <input type="text" class="form-control" placeholder="Search Your Company Profile" id="best_sesearch" name="search" value="{{ \Request::query('search') }}">
                      </div>
                    </div>
                  </div>
                </form> 
             </div>
           @foreach($vendors as $seller)
           @php 
                $seller = $seller['vendor']; 
                $userName = (!empty($seller->company_name) ? $seller->company_name : $seller->name);
                
                if (preg_match('/^[\w\s?]+$/si', $userName)) {
                    $userNameSlug = $userName;
                } else {
                    $userNameSlug = $seller->name;
                }
            @endphp
           
           <div class="col-lg-3 col-md-4 col-sm-6 mt-1 mb-1 pt-1 pb-1 prod-item">
    		    <div class="card shadow h-100 profile-card-2">
                    <div class="card-img-block">
                      <a href="{{ URL::to('/bt-'.str_slug($userNameSlug, '-')) }}" title="{{ $seller->name }}">
                        @if(!empty($seller->company_logo))
                            <img class="img-fluid b-sellers" src="{{ asset('public/storage/company-logo/'.$seller->company_logo) }}" alt="">
                        @else
                            <img class="img-fluid b-sellers" src="{{ url('/') }}/public/img/no-image.jpg" alt="">
                        @endif
                      </a> 
                    </div>
                    <div class="card-body pt-2">
                        {{--<a href="{{ URL::to('/bt-'.str_slug($userNameSlug, '-')) }}" title="{{ $seller->name }}">
                        @if(!empty($seller->user_photo))
                            <img src="{{ url('/') }}/public/storage/users/{{ $seller->user_photo }}" alt="avatar" class="profile">
                        @else
                            <img src="{{ url('/') }}/public/img/no-image.jpg" alt="avatar" class="profile">
                        @endif
                        </a>--}}
                        <h5><a href="{{ URL::to('/bt-'.str_slug($userNameSlug, '-')) }}" class="theme-color1">{{ $userName }}</a></h5>
                        <p class="card-text">{{ count($seller->products) }} {{ Helper::translation(1975,$translate) }}</p>
                        <div><a href="{{ URL::to('/bt-'.str_slug($userNameSlug, '-')) }}" class="btn button-color">{{ Helper::translation(1977,$translate) }}</a></div>
                    </div>
                </div>
             </div>
           @endforeach
         </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="float-right">
                    {{ $vendors->appends(request()->query())->links() }}
                </div>
              <!--<div class="turn-page" id="itempager"></div>-->
              <!-- </div> -->
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
