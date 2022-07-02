@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $allsettings->site_title }}</title>
  @if($view_name != 'product')
<meta name="description" content="{{ $allsettings->site_desc }}">
<meta name="keywords" content="{{ $allsettings->site_keywords }}">
@endif
  @include('style')
  <style>
  
    .goog-te-combo {
    color: #fff;
    margin: 4px 0;
    width: 80%;
    border-radius: 20px;
    background-color: gray;
    padding-left: 10px;
    margin:-7px;
    }
    .goog-logo-link {
    display:none !important;
    } 
        
    .goog-te-gadget{
        color: transparent !important;
    }
    .purchs-btn
    {
     border-radius:20px;
     background-color:#0e517b;
     color:#fff;
     border:1px solid gray;
    }
    
    
    th {
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td {
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}
  
  </style>
  <script>
    function myFunction1(event) {
      document.getElementById("myDropdown1").classList.toggle("show1");
      event.preventDefault()
    }
  </script> 
  <!--Facebook Open graph starts-->
    <meta property="og:title" content="Infobiz world trade Exporters, Manufacturers, Suppliers Directory, B2B Business Directory"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=" https://www.businessworldtrade.com"/>
    <meta property="og:site_name" content=" BusinessWorldTrade"/>
<meta property="article:publisher" content=" https://www.facebook.com/BusinessWorldTrade " />
<meta property="article:modified_time" content="2020-12-01T08:20:59+00:00" />
    <meta property="og:image" content="https://www.businessworldtrade.com/public/storage/slideshow/1603859644.jpg"/>
    <meta property="og:description" content=" businessworldtrade.com is the largest B2B platform in India. The marketplace serves as a forum for buying goods in India, trading with Indian producers, suppliers, exporters and service providers, and helping to expand their business worldwide."/>
    <meta property="fb:app_id" content="948338049022975"/>
    <!--Facebook Open graph Close -->
	
	<!--Twitter Card Starts-->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@ BusinessWorldTrade"/>
	<meta name="twitter:title" content=" Infobiz world trade Exporters, Manufacturers, Suppliers Directory, B2B Business Directory"/>
	<meta name="twitter:description" content="businessworldtrade.com is the largest B2B platform in India. The marketplace serves as a forum for buying goods in India, trading with Indian producers, suppliers, exporters and service providers, and helping to expand their business worldwide."/>
	<meta name="twitter:image" content=" https://www.businessworldtrade.com/public/storage/slideshow/1603859644.jpg "/>
	<meta name="twitter:url" content=" https://www.businessworldtrade.com "/>
	<!--End Twitter card tag -->
</head>

<body style="height:400px;background-repeat:no-repeat;background-image:url('public/img/gif/background.jpg')">
    <br><br><br><br>
    <section class="mb-4 mt-4">
      <div class="container-fluid">
        <div class="bg-white p-3 shadow">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="main-heading text-center ">
                <p><img src="{{ asset('public/img/gif/sound.gif') }}" style="width:70px;height:70px;" alt="Agriculture"> 24*7 Services</p>
              </div>
            </div>
          </div>
          <div class="row" >
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                  
                
                 <!-- feature box item-->
                <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5 sm-margin-five-bottom mb-3">
                  <div class="feature-box">
                    <a href="https://www.businessworldtrade.com/shop?subcat_id=Vegetables">
                      <div class="content medi-box">
                        <div class="madi-text">
                          <div class="text-medium">Vegetables</div>
                        </div>
                        <img src="https://www.businessworldtrade.com/public/storage/subcategory/1602248336.jpg" alt="Vegetables">
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7  mb-3">
                  
                     <h3>Make Your Website <b style="color:red;">Free Free!</b> With Us</h3><br>
                     <p class="text-center">Lorem Ipsum is simply dummy text of the printing 
                     and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                     when an unknown printer took a galley of type and scrambled it to make a type specimen book<br><br>
                     <button type="btn" class="btn btn-success btn-md text-center">Make Website</button>
                     </p>
                     <br>
                     <div class="vertical-center">
                         
                     </div>
                     
                  
                </div>
                <!-- end feature box item-->
                 
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <div class="container">
        <div class="row">
            <div >
                
            </div>
        </div>
    </div>
    <div class="container d-none d-md-block">
         <div class="row">
             <div class="col-sm-12 col-md-12">
                 <h4 class="text-center user_register line-1 anim-typewriter">Hey Growww Your Business </h4>
             </div>
         </div>
     </div>
     <section class="choose-package">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2" id="price">
                            
                            <h1 class="text-center">Package</h1>
                            <p class="text-center big">Get ready for more potential, more opportunity and more of everything you expect from internet provider</p>
                        </div>
                    </div>
                    <div class="divider-45 d-none d-lg-block"></div>
                    <div class="row c-gutter-60">
                        <div class="col-lg-4 col-12">
                            <div class="pricing-plan hero-bg rounded">
                                <div class="plan-name text-uppercase bg-maincolor">
                                    <h4 class="package-head">
                                        Platinum Package
                                    </h4>
                                </div>
                                <div class="plan-desc">
                                    <div class="">
                                        <p>Paid 1 Year Services Take<br> 2 Year Services</p>
                                        
                                        
                                    </div>
                                    <div class="price-icon">
                                        <img src="{{asset('public/img/gif/buy1g1.gif')}}" class="latest_package" alt="" width="145px" height="70px">
                                    </div>
                                </div>
                                <div class="plan-features">
                                    <ul class="list-bordered">
                                        <li>100 Leads</li>
                                        <li>Website + SEO</li>
                                        <li>Peofessional Email</li>
                                        <li>24/7 Support</li>
                                        <li>1 Year Services</li>
                                        
                                    </ul>
                                </div>
                                <div class="price-wrap d-flex">
                                    <span class="plan-sign small-text">Rs</span>
                                    <span class="plan-price color-main2">99</span>
                                    <span class="plan-decimals small-text">/mo</span>
                                </div>
                                <div class="plan-button">
                                    <a href="#" type="btn" class="btn  purchs-btn"><span>Contact Us</span></a>
                                </div>
                            </div>
                            <div class="divider-45 d-block d-lg-none"></div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="pricing-plan hero-bg rounded">
                                <div class="plan-name text-uppercase bg-maincolor2">
                                    <h3>
                                        Silver Package
                                    </h3>
                                </div>
                                <div class="plan-desc">
                                    <div class="plan-content">
                                        <h4 class="color-main3">200</h4>
                                        <p class="small-text">
                                            <i class="color-main3 fa fa-angle-down" aria-hidden="true"></i>
                                            mb/s
                                        </p>
                                        <h4 class="color-main4">150</h4>
                                        <p class="small-text">
                                            <i class="color-main4 fa fa-angle-up" aria-hidden="true"></i>
                                            mb/s
                                        </p>
                                    </div>
                                    <div class="price-icon">
                                        <img src="{{asset('public/img/gif/30per3.jpg')}}" class="latest_package" width="120px" height="40px" alt="">
                                    </div>
                                </div>
                                <div class="plan-features">
                                    <ul class="list-bordered">
                                        <li>150 Leads</li>
                                        <li>Website + SEO</li>
                                        <li>Peofessional Email</li>
                                        <li>24/7 Support</li>
                                        <li>1.5 Year Services</li>
                                        
                                    </ul>
                                </div>
                                <div class="price-wrap d-flex">
                                    <span class="plan-sign small-text">Rs</span>
                                    <span class="plan-price color-main3">79</span>
                                    <span class="plan-decimals small-text">/mo</span>
                                </div>
                                <div class="plan-button">
                                    <a href="#" type="btn" class="btn  purchs-btn"><span>Contact Us</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="divider-20 d-block d-md-none"></div>
                        <div class="col-lg-4 col-12">
                            <div class="pricing-plan hero-bg rounded">
                                <div class="plan-name text-uppercase bg-maincolor3">
                                    <h3>
                                        Gold Package
                                    </h3>
                                </div>
                                <div class="plan-desc">
                                    <div class="plan-content">
                                        <h4 class="color-main5">100</h4>
                                        <p class="small-text">
                                            <i class="color-main5 fa fa-angle-down" aria-hidden="true"></i>
                                            mb/s
                                        </p>
                                        <h4 class="color-main6">50</h4>
                                        <p class="small-text">
                                            <i class="color-main6 fa fa-angle-up" aria-hidden="true"></i>
                                            mb/s
                                        </p>
                                    </div>
                                    <div class="price-icon">
                                        <img src="{{asset('public/img/gif/50per.gif')}}" class="latest_package" width="120px" height="40px" alt="">
                                    </div>
                                </div>
                                <div class="plan-features">
                                    <ul class="list-bordered">
                                        <li>180 Leads</li>
                                        <li>Website + SEO</li>
                                        <li>Peofessional Email</li>
                                        <li>24/7 Support</li>
                                        <li>2 Year Services</li>
                                    </ul>
                                </div>
                                <div class="price-wrap d-flex">
                                    <span class="plan-sign small-text">Rs</span>
                                    <span class="plan-price color-main5">49</span>
                                    <span class="plan-decimals small-text">/mo</span>
                                </div>
                                <div class="plan-button">
                                    <a href="#" type="btn" class="btn  purchs-btn"><span>Contact Us</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
     @include('footer')
  @include('javascript')
</html>
@else
@include('503')
@endif
  @include('header')