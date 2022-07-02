
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Buyer Directory - {{ $allsettings->site_title }}</title>
    @include('style')
  </head>
  <body>
     @include('header')
     <br><br><br><br>
        <div class="container">
            <div class="row">
                 <div class="col-sm-12 col-md-2">
                     
                 </div>
                 <div class="col-sm-12 col-md-7">
                     <img src="{{ ('public/img/0001.jpg') }}" width="700px" height="400px">
                 </div>
                 <div class="col-sm-12 col-md-3">
                     
                 </div>
            </div>
        </div>
       
       
       
       <br><br><br>
     @include('footer')
    @include('javascript')
</body>
</html>