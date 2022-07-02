@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ Helper::translation(1913,$translate) }} - {{ $allsettings->site_title }}</title>
  @include('style')
</head>

<body>
  @include('header')
  <main role="main" class="main-content">

	<section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">Buy Leads</h2>
        <p class="mb-0 text-white">Buy Leads contains Buying requests (RFQs) from Buyers located Globally.</p>
      </div>
    </section>
	
	<div class="container mt-3">
		<div class="bg-white shadow pt-4 pb-4">
		<form class="up-leads">
			<div class="bg-gray">
	<div class="row">
	<div class="col-sm-12 col-md-2 col-lg-2 mb-3">
		<h6 class="black mt-2">Search Buy Leads </h6>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<input type="search" placeholder="keyword" class="form-control">
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-1">
		<select name="country_code" size="1" class="form-control">
    <option value="" selected="selected">Country</option>
    <option value="IN">Only India</option>
    <option value="only_foreign">Only Foreign</option>
    <option value="AF">Afghanistan</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AS">American Samoa</option>
    <option value="AD">Andorra</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarctica</option>
    <option value="AG">Antigua And Barbuda</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbaijan</option>
    <option value="BS">Bahamas The</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermuda</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Bolivia</option>
    <option value="BA">Bosnia and Herzegovina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Bouvet Island</option>
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
    <option value="BN">Brunei</option>
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="CV">Cape Verde</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CN">China</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo The Democratic Republic Of The</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
    <option value="HR">Croatia (Hrvatska)</option>
    <option value="CU">Cuba</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="TP">East Timor</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Ethiopia</option>
    <option value="XA">External Territories of Australia</option>
    <option value="FK">Falkland Islands</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji Islands</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia The</option>
    <option value="GE">Georgia</option>
    <option value="DE">Germany</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="XU">Guernsey and Alderney</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard and McDonald Islands</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong S.A.R.</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IR">Iran</option>
    <option value="IQ">Iraq</option>
    <option value="IE">Ireland</option>
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JM">Jamaica</option>
    <option value="JP">Japan</option>
    <option value="XJ">Jersey</option>
    <option value="JO">Jordan</option>
    <option value="KZ">Kazakhstan</option>
    <option value="KE">Kenya</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Korea North</option>
    <option value="KR">Korea South</option>
    <option value="KW">Kuwait</option>
    <option value="KG">Kyrgyzstan</option>
    <option value="LA">Laos</option>
    <option value="LV">Latvia</option>
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libya</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    <option value="MO">Macau S.A.R.</option>
    <option value="MK">Macedonia</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="XM">Man (Isle of)</option>
    <option value="MH">Marshall Islands</option>
    <option value="MQ">Martinique</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MX">Mexico</option>
    <option value="FM">Micronesia</option>
    <option value="MD">Moldova</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="AN">Netherlands Antilles</option>
    <option value="NL">Netherlands The</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Norfolk Island</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="NO">Norway</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Palestinian Territory Occupied</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua new Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
    <option value="PN">Pitcairn Island</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
    <option value="RE">Reunion</option>
    <option value="RO">Romania</option>
    <option value="RU">Russia</option>
    <option value="RW">Rwanda</option>
    <option value="SH">Saint Helena</option>
    <option value="KN">Saint Kitts And Nevis</option>
    <option value="LC">Saint Lucia</option>
    <option value="PM">Saint Pierre and Miquelon</option>
    <option value="VC">Saint Vincent And The Grenadines</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Sao Tome and Principe</option>
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    <option value="SK">Slovakia</option>
    <option value="SI">Slovenia</option>
    <option value="XG">Smaller Territories of the UK</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="GS">South Georgia</option>
    <option value="SS">South Sudan</option>
    <option value="ES">Spain</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Suriname</option>
    <option value="SJ">Svalbard And Jan Mayen Islands</option>
    <option value="SZ">Swaziland</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
    <option value="SY">Syria</option>
    <option value="TW">Taiwan</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania</option>
    <option value="TH">Thailand</option>
    <option value="TG">Togo</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad And Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey</option>
    <option value="TM">Turkmenistan</option>
    <option value="TC">Turks And Caicos Islands</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="GB">United Kingdom</option>
    <option value="US">United States</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VA">Vatican City State (Holy See)</option>
    <option value="VE">Venezuela</option>
    <option value="VN">Vietnam</option>
    <option value="VG">Virgin Islands (British)</option>
    <option value="VI">Virgin Islands (US)</option>
    <option value="WF">Wallis And Futuna Islands</option>
    <option value="EH">Western Sahara</option>
    <option value="YE">Yemen</option>
    <option value="YU">Yugoslavia</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>

		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 mb-3">
		<select name="in_last" class="form-control">
    <option value="7">7 days</option>
    <option value="15">15 days</option>
    <option value="30">1 month</option>
    <option value="60">2 months</option>
    <option value="90">3 months</option>
    <option value="180">6 months</option>
    <option selected="selected" value="365">12 months</option>
</select>
		</div>
		<div class="col-sm-12 col-md-1 col-lg-1 mb-3"><button type="submit" class="btn btn-danger">Go</button></div>
	</div>
		</div>	
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
				<h6>Latest Buy Leads</h6>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
				<div class="table-responsive-sm">
  <table class="table">
    <thead>
      <tr>
        <th class="th-lg">Product Name</th>
        <th class="th-lg">Country / Region</th>
        <th class="th-lg">Posted on</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
      <tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
      <tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
		<tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
		<tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
		<tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
		<tr>
        <td><a href="#">Edible Oil</a></td>
        <td><img src="http://tiimg.tistatic.com/new_website1/ti-design-2017/images/countries-flags/in.jpg" alt="India" class="country-flag"> India</td>
        <td>25 July 2020</td>
      </tr>
    </tbody>
  </table>
</div>
				</div>
			</div>
			
			<div class="bg-gray">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
		<h5>All Categories</h5>
		</div>
	<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://static.thenounproject.com/png/4221-200.png"> Agriculture</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://www.downloadclipart.net/medium/48601-fashion-designer-silhouette-images.png"> Apparel & Fashion</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://img.icons8.com/plasticine/2x/car.png"> Automobile</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://tiimg.tistatic.com/new_website1/trade-shows/images/cat-icons-large/brass-hardware-components.png"> Brass Hardware & Components</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://i.dlpng.com/static/png/6373218_preview.png"> Chemicals</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://icons.iconarchive.com/icons/awicons/vista-artistic/256/1-Normal-Computer-icon.png"> Computer Hardware & Software</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://cdn.onlinewebfonts.com/svg/img_127197.png"> Construction & Real Estate</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://static.thenounproject.com/png/68356-200.png"> Consumer Electronics</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://cdn1.iconfinder.com/data/icons/climate-change-15/64/plug-socket-power_socket-supply-outlet-electronics-electrical-electricity_-512.png"> Electronics & Electrical Supplies</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://cdn2.iconfinder.com/data/icons/electricity-colored-outline/64/b_1-512.png"> Energy & Power</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://www.freepngimg.com/download/natural_environment/71213-natural-sustainability-recycling-environment-environmentalism-recycle-pollution.png"> Environment & Pollution</div></a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-3">
		<a href="#">
			<div class="lead-name"><img src="https://lh3.googleusercontent.com/proxy/DTbQtharMorre8fsI7R0OvkeioYDaSf8YMWBsx4dn0wiOTG3fG-RTb_kKVQRgCNo-tS-2-IZ1AN4B-yRaQbDG7T4GIFRL8uS_AbtE2PJ-BzoaKWWAiyjSztAXFL-Lq8VaYJXhocvfyo9MvRqyq7QV-XOwuJ60BiT"> Food & Beverage</div></a>
		</div>
	</div>
			</div>
		</form>
			</div>
</div>

@include('footer')
  @include('javascript')
  <div class="modal fade" id="GetBestPrice" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Get the best price for <span id="popNameTitle"></span></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="/request" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="vendor_id" value="">
                <input type="hidden" name="product_id" value="">
                <div class="row">
                  <div class="col-md-4 con-bg12">
                    <div class="contact-info">
                      <div class="text-center">
                        <img id="popImg" src="https://via.placeholder.com/300?text='No Image Found'" class="img img-fluid" alt="image">
                        <p id="popNameSub">Product Name</p>
                        <span>Sold By - <span id="popVendor"></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 con-bg1">
                    <div class="contact-form">
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="quantity">Quantity</label>
                        <div class="col-sm-9">
                          <input type="text" name="quantity" id="quantity" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-12" for="unit">Unit (Ex.: kg, g, l, units, etc.)</label>
                        <div class="col-sm-9">
                          <input type="text" name="unit" id="unit" value="">
                        </div>
                      </div>
                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <label>Payment Option:</label>
                          <div class="d-flex flex-column flex-wrap">
                            <label for="option_1"><input type="radio" value="Full Advance Payment" name="payment_method" id="option_1"> Full Advance Payment</label>
                            <label for="option_2"><input type="radio" value="Pay on Delivery" name="payment_method" id="option_2"> Pay on Delivery</label>
                            <label for="option_3"><input type="radio" value="50% Advance and 50% on Delivery" name="payment_method" id="option_3" checked> 50% Advance and 50% on Delivery</label>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-blue">Send</button>
                          </div>
                        </div>
                      </div>
                      @if(!Auth::guest())
                      <div class="form-group mt-5">
                        <p class="col-sm-12">Your Contact Information :</p>
                        <p class="col-sm-12">Email Id:{{ Auth::user()->email }}</p>
                        <p class="col-sm-12">Mobile Number:{{ Auth::user()->user_phone }}</p>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
$(document).ready(function() {
  $(".onGetBestPrice").on("click", function(event) {
    $("input[name='user_id']").val($(this).data("user-id"));
    $("input[name='vendor_id']").val($(this).data("vendor-id"));
    $("input[name='product_id']").val($(this).data("product-id"));

    var product_name = $(this).data("product-name");
    var vendor_name = $(this).data("vendor-name");
    var image_url = $(this).data("image-url");

    $("#popNameTitle").text(product_name);
    $("#popNameSub").text(product_name);
    $("#popImg").attr("src", image_url);
    $("#popVendor").text(vendor_name);
  });
});
</script>
</html>
@else
@include('503')
@endif