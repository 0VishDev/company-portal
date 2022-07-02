@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>@if(Auth::user()->user_type == 'vendor'){{ Helper::translation(2046,$translate) }}@else{{ Helper::translation(1912,$translate) }}@endif  - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
@if(Auth::user()->user_type == 'vendor')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">My Notifications</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>My Notifications</span></p>
      </div>
    </section>
    <main role="main">
     <div class="container page-white-box mt-3">
     <div class="row">
	     <div class="col-md-12">
             @if ($message = Session::get('success'))
              <div class="alert alert-success" role="alert">
                 <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                       </button>
                    </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
               <span class="alert_icon lnr lnr-warning"></span>
                  {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span class="fa fa-close" aria-hidden="true"></span>
                  </button>
            </div>
            @endif
            @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            @endif
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Request Details</th>
                                            <th>User Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($notifications as $notification)
                                    @php 
                                        $product = \ZigKart\Models\Product::where(["product_id" => $notification->product_id])->first();
                                        $user = \ZigKart\User::where(["id" => $notification->user_id])->first();
                                    @endphp
                                        <tr>
                                            <td>
                                                @if($product->product_image != "")
                                                <img style="width: 150px; height: auto;" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" alt="">
                                                @else
                                                <img style="width: 150px; height: auto;" src="https://via.placeholder.com/300?text=No Image Found" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                Product: <span>{{ $product->product_name }}</span><br>
                                                Quantity: <span>{{ $notification->quantity . " " . $notification->unit }}</span><br>
                                                Payment Method: <span>{{ $notification->payment_method }}</span>
                                            </td>
                                            <td>
                                                <span>Name: {{ $user->name }}</span><br>
                                                <span>Email: {{ $user->email }}</span><br>
                                                <span>Mobile Number: {{ $user->user_phone }}</span><br>
                                            </td>
                                            <td>
                                                <a href="{{ route("notification.delete", ["id" => $notification->id]) }}" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                       @php $no++; @endphp
                                   @endforeach     
                                   </tbody>
                                </table>
               </div>
        </div>
    </div>
</div>
</main>
@else
@include('not-found')
@endif
@include('footer')
@include('javascript')
</body>
</html>
@else
@include('503')
@endif