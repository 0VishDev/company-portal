<header id="header">
  <div class="container-fluid">
      
    <div class="row pb-1">
      <div id="logo" class="col-lg-3 col-md-2 col-sm-4 pt-1">
        @if($allsettings->site_logo != '')
        <a href="{{ URL::to('/') }}">
            <img src="{{ asset('public/img/new-img/svg-logo.svg') }}" class="img-fluid" type="image/svg+xml">
            <!--<img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"
            alt="{{ $allsettings->site_title }}">-->
           <!-- <embed src="{{ asset('public/img/new-img/svg-logo.svg') }}" type="image/svg+xml" alt="{{ $allsettings->site_title }}">
        -->
        </a>
        @endif
      </div>
      <div class="col-lg-9 col-md-10 col-sm-12">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 sm-d-none pb-1">
          <div class="topmenu">
        <nav class="pull-right" id="nav-menu-container">
          <ul class="nav-menu">
              <li class="menu-has-children">
              <a class="nav-link" href="#">For Buyers <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil">
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#postBuyerReqModal" data-toggle="modal">Post Buy Requirement</a></li>
                <li class="nav-item"><a class="dropdown-item" href="{{ url('/best-sellers') }}">Search Suppliers</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#rqstcall" data-toggle="modal">Request A Callback</a></li>
               </ul>
            </li>
            
            <li class="menu-has-children">
              <a class="nav-link" href="#">For Supplier <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil">
                <li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/search-leads') }}">Search Buy Leads</a></li>
                <li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/freights') }}">Get Freight Quotes</a></li>
                <li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/logistics') }}" target="_blank">Logistics</a></li>
                <li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/logistics/export') }}" target="_blank">Export Bill Discounting</a></li>
                <!--<li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/vrtrust') }}" target="_blank">VR Trust Certificate</a></li>-->
                <li class="nav-item"><a href="{{ url('wtc-certificate') }}">WTC Certificate</a></li>
                <!--<li class="nav-item"><a href="{{ url('scratch') }}">Share Scratch Card</a></li>
                <li class="nav-item"><a href="{{ url('latest-package') }}">Latest Package</a></li>-->
                <li class="nav-item"><a href="{{ url('export-data') }}">Export Data</a></li>
              </ul>
            </li>
            
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link" href="{{ url('/new-releases') }}">{{ Helper::translation(2049,$translate) }}</a>-->
            <!--</li>-->
            <li class="menu-has-children dis1">
              <a class="nav-link" href="#">Business Loan <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <ul class="has-chil">
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('/lending/business-loan') }}" target="_blank">Business Loan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('/lending/business-insurance') }}" target="_blank">Business Insurance</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('/lending/iso-certification') }}" target="_blank">ISO Certification</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('/lending/e-filing') }}" target="_blank">E-Filing</a></li>
                        </ul>
            </li>
            
              <!--<li class="nav-item">
              <a class="nav-link" href="{{ url('/best-sellers') }}">{{ Helper::translation(1973,$translate) }}</a>
              </li>-->
             <li class="menu-has-children d-none-desk">
              <a class="nav-link" href="#">Help Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil help">
                <li class="nav-item"><a class="dropdown-item toolfree" href="tel:8178503240">Call Us: +91 8178503240</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#feedback" data-toggle="modal">Send Feedback</a></li>
                <li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/contact') }}">Contact Us</a></li>
              </ul>
            </li>
             
            
            <li class="nav-item all-cate">
              <a class="nav-link" href="{{ URL::to('/categories') }}">All Categories</a>
            </li>
            
            <!--<li> <a href="{{ URL::to('/contact') }}"> {{ Helper::translation(2012,$translate) }} </a></li>-->
            @if($allsettings->google_translate == 1)
            <li class="menu-has-children d-none-desk"><a href="javascript:void(0)"><span class="fa fa-language"></span>
                {{ $language_title }}</a>
              <ul>
                @foreach($languages['view'] as $language)
                <li><a
                    href="{{ URL::to('/translate') }}/{{ $language->language_code }}">{{ $language->language_name }}</a>
                </li>
                @endforeach
              </ul>
            </li>
            @endif
            @if(Auth::guest())
            <li class="log-reg d-none-desk">
                <p><a href="{{ url('/login') }}" class="">{{ Helper::translation(2041,$translate) }}</a></p>
                <p><a class="nav-link" href="{{ url('/register') }}">Register free</a></p>
            </li>
            @else
            <li class="menu-has-children d-none-desk"><a href="javascript:void(0)">Hi {{ Auth::user()->name }}</a>
              <ul>
                @if(Auth::user()->user_type == 'customer')
                <li><a href="{{ url('/buyer') }}">{{ Helper::translation(2043,$translate) }}</a></li>
                <li><a href="{{ url('/my-profile') }}">Edit Profile</a></li>
               {{-- <li><a href="{{ url('/my-purchase') }}">{{ Helper::translation(2044,$translate) }}</a></li>
                 <li><a href="{{ url('/my-wallet') }}">{{ Helper::translation(2045,$translate) }}</a></li> --}}
                @endif
                @if(Auth::user()->user_type == 'vendor')
                <li><a href="{{ url('vendor/dashboard') }}" title="">Dashboard</a></li>
                <li><a href="{{ url('/user?user_id='.Auth::user()->id.'&user_type='.Auth::user()->user_type) }}">{{ Helper::translation(2043,$translate) }}</a></li>
                <li><a href="{{ url('/vendor/manage-products') }}">{{ Helper::translation(2046,$translate) }}</a></li>
                <!--<li><a href="{{ url('/vendor/recent-leads') }}">My Inquiries</a></li>-->
                <li><a href="{{ url('/vendor/relevant-leads') }}">Relevant Leads</a></li>
                <li><a href="{{ url('/vendor/recent-leads') }}">Current Leads</a></li>
            </li>
            {{-- <li><a href="{{ url('/my-purchase') }}">{{ Helper::translation(2044,$translate) }}</a></li>
            <li><a href="{{ url('/my-wallet') }}">{{ Helper::translation(2045,$translate) }}</a></li> --}}
            @endif
            <li><a href="{{ url('/logout') }}">{{ Helper::translation(2048,$translate) }}</a></li>
          </ul>
          </li>
          @endif
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
          </div>
      
      <div class="col-lg-8 col-md-8 col-sm-12">
        <form id="search-header" method="GET" action="{{ route('shop') }}"  class="search-form-result">
            <div class="search-form position-relative input-group">
              <select class="" name="city" id="home_city" placeholder="Search city name">
                  <option value="All">All India</option>
              </select>
                
    <input type="text" name="search" class="search-input form-control" id="home_search_box" placeholder="Enter product name or seller name..." autocomplete="off" required>
    <div class="input-group-append">
      <button class="btn btn-blue butt-bor" type="submit">
        <i class="fa fa-search"></i> &nbsp;&nbsp;<span class="sm-d-none md-d-done">Search</span>
      </button>
    </div>
            </div>
          </form>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 mt-2 sm-d-none">
        <nav class="pull-right" id="nav-menu-container">
          <ul class="nav-menu">
        
              <li class="menu-has-children">
              <a class="nav-link" href="#">Help Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="has-chil help1">
                <li class="nav-item"><a class="dropdown-item toolfree" href="tel:8178503240">Call Us: +91 8178503240</a></li>
                <li class="nav-item"><a class="dropdown-item" href="#" data-target="#feedback" data-toggle="modal">Send Feedback</a></li>
                <li class="nav-item"><a class="dropdown-item" href="{{ URL::to('/contact') }}">Contact Us</a></li>
              </ul>
            </li>
             
            
            <li class="nav-item all-cate">
              <a class="nav-link" href="{{ URL::to('/categories') }}">All Categories</a>
            </li>
            
            <!--<li> <a href="{{ URL::to('/contact') }}"> {{ Helper::translation(2012,$translate) }} </a></li>-->
            @if($allsettings->google_translate == 1)
            <li class="menu-has-children"><a href="javascript:void(0)"><span class="fa fa-language"></span>
                {{ $language_title }}</a>
              <ul>
                @foreach($languages['view'] as $language)
                <li><a
                    href="{{ URL::to('/translate') }}/{{ $language->language_code }}">{{ $language->language_name }}</a>
                </li>
                @endforeach
              </ul>
            </li>
            @endif
            @if(Auth::guest())
            <li class="log-reg">
                <p><a href="{{ url('/login') }}" class="btn">{{ Helper::translation(2041,$translate) }}</a>/<a class="nav-link" href="{{ url('/register') }}">Register free</a></p>
            </li>
            @else
            <li class="menu-has-children"><a href="javascript:void(0)">Hi {{ Auth::user()->name }}</a>
              <ul>
                @if(Auth::user()->user_type == 'customer')
                <li><a href="{{ url('/buyer') }}">{{ Helper::translation(2043,$translate) }}</a></li>
                <li><a href="{{ url('/my-profile') }}">Edit Profile</a></li>
               {{-- <li><a href="{{ url('/my-purchase') }}">{{ Helper::translation(2044,$translate) }}</a></li>
                 <li><a href="{{ url('/my-wallet') }}">{{ Helper::translation(2045,$translate) }}</a></li> --}}
                @endif
                @if(Auth::user()->user_type == 'vendor')
                <li><a href="{{ url('vendor/dashboard') }}" title="">Dashboard</a></li>
                <li><a href="{{ url('/user?user_id='.Auth::user()->id.'&user_type='.Auth::user()->user_type) }}">{{ Helper::translation(2043,$translate) }}</a></li>
                <li><a href="{{ url('/vendor/manage-products') }}">{{ Helper::translation(2046,$translate) }}</a></li>
                <!--<li><a href="{{ url('/vendor/recent-leads') }}">My Inquiries</a></li>-->
                <li><a href="{{ url('/vendor/relevant-leads') }}">Relevant Leads</a></li>
                <li><a href="{{ url('/vendor/recent-leads') }}">Current Leads</a></li>
            </li>
            {{-- <li><a href="{{ url('/my-purchase') }}">{{ Helper::translation(2044,$translate) }}</a></li>
            <li><a href="{{ url('/my-wallet') }}">{{ Helper::translation(2045,$translate) }}</a></li> --}}
            @endif
            <li><a href="{{ url('/logout') }}">{{ Helper::translation(2048,$translate) }}</a></li>
          </ul>
          </li>
          @endif
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>
    </div>
  </div>
  </div>
</header>

<input type="hidden" id="base_path" name="base_path" value="{{ url('/') }}">

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6048b66f385de407571e9b73/1f0e0h98m';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <!--  Language Converter Function Start -->

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>



<script type="text/javascript">
  (function(){var gtConstEvalStartTime = new Date();/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var h=this||self,l=/^[\w+/_-]+[=]{0,2}$/,m=null;function n(a){return(a=a.querySelector&&a.querySelector("script[nonce]"))&&(a=a.nonce||a.getAttribute("nonce"))&&l.test(a)?a:""}function p(a,b){function c(){}c.prototype=b.prototype;a.i=b.prototype;a.prototype=new c;a.prototype.constructor=a;a.h=function(g,f,k){for(var e=Array(arguments.length-2),d=2;d<arguments.length;d++)e[d-2]=arguments[d];return b.prototype[f].apply(g,e)}}function q(a){return a};function r(a){if(Error.captureStackTrace)Error.captureStackTrace(this,r);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}p(r,Error);r.prototype.name="CustomError";function u(a,b){a=a.split("%s");for(var c="",g=a.length-1,f=0;f<g;f++)c+=a[f]+(f<b.length?b[f]:"%s");r.call(this,c+a[g])}p(u,r);u.prototype.name="AssertionError";function v(a,b){throw new u("Failure"+(a?": "+a:""),Array.prototype.slice.call(arguments,1));};var w;function x(a,b){this.g=b===y?a:""}x.prototype.toString=function(){return this.g+""};var y={};function z(a){var b=document.getElementsByTagName("head")[0];b||(b=document.body.parentNode.appendChild(document.createElement("head")));b.appendChild(a)}
function _loadJs(a){var b=document;var c="SCRIPT";"application/xhtml+xml"===b.contentType&&(c=c.toLowerCase());c=b.createElement(c);c.type="text/javascript";c.charset="UTF-8";if(void 0===w){b=null;var g=h.trustedTypes;if(g&&g.createPolicy){try{b=g.createPolicy("goog#html",{createHTML:q,createScript:q,createScriptURL:q})}catch(t){h.console&&h.console.error(t.message)}w=b}else w=b}a=(b=w)?b.createScriptURL(a):a;a=new x(a,y);a:{try{var f=c&&c.ownerDocument,k=f&&(f.defaultView||f.parentWindow);k=k||h;
if(k.Element&&k.Location){var e=k;break a}}catch(t){}e=null}if(e&&"undefined"!=typeof e.HTMLScriptElement&&(!c||!(c instanceof e.HTMLScriptElement)&&(c instanceof e.Location||c instanceof e.Element))){e=typeof c;if("object"==e&&null!=c||"function"==e)try{var d=c.constructor.displayName||c.constructor.name||Object.prototype.toString.call(c)}catch(t){d="<object could not be stringified>"}else d=void 0===c?"undefined":null===c?"null":typeof c;v("Argument is not a %s (or a non-Element, non-Location mock); got: %s",
"HTMLScriptElement",d)}a instanceof x&&a.constructor===x?d=a.g:(d=typeof a,v("expected object of type TrustedResourceUrl, got '"+a+"' of type "+("object"!=d?d:a?Array.isArray(a)?"array":d:"null")),d="type_error:TrustedResourceUrl");c.src=d;(d=c.ownerDocument&&c.ownerDocument.defaultView)&&d!=h?d=n(d.document):(null===m&&(m=n(h.document)),d=m);d&&c.setAttribute("nonce",d);z(c)}
function _loadCss(a){var b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.charset="UTF-8";b.href=a;z(b)}function _isNS(a){a=a.split(".");for(var b=window,c=0;c<a.length;++c)if(!(b=b[a[c]]))return!1;return!0}function _setupNS(a){a=a.split(".");for(var b=window,c=0;c<a.length;++c)b.hasOwnProperty?b.hasOwnProperty(a[c])?b=b[a[c]]:b=b[a[c]]={}:b=b[a[c]]||(b[a[c]]={});return b}
window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='449532.3786053938';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
</script>
<!-- Language Converter Function End  -->

<!--whats app icon -->
<div id="mybutton">
    <a href="https://api.whatsapp.com/send?phone=917011224810" class="whatsapp" target="_blank"><img class="feedback" src="{{ asset('public/img/whatsapp.png') }}" width="60px" height="60px"></a> 
 </div>
<!--whats app chat icon end -->
   
<!-- Fixed Side Socials -->
<div class="menu-container">
  <div class="collapse-icon">
    <span class="fa fa-chevron-right"></span>
  </div>
  <div class="menu-item">
    <a href="https://www.instagram.com/businessworldtrade/" target="_blank" ><span class="fa fa-instagram text-white"></span></a>
    <div class="menu-item-text">Instagram</div>
  </div>
  <div class="menu-item">
    <a href="https://twitter.com/BusinessWorldT2" target="_blank" ><span class="fa fa-twitter text-white"></span></a>
    <div class="menu-item-text">Twitter</div>
  </div>
  <div class="menu-item">
    <a href="https://www.facebook.com/infobizbusinessworldtrade" target="_blank" ><span class="fa fa-facebook text-white"></span></a>
    <div class="menu-item-text">Facebook</div>
  </div>
   <div class="menu-item">
    <a href="https://youtu.be/Nz5fcL0oEGY" target="_blank" ><span class="fa fa-youtube text-white"></span></a>
    <div class="menu-item-text">YouTube</div>
   </div>
   <div class="menu-item">
    <a href="https://in.pinterest.com/BusinessWorldTrade/" target="_blank" ><span class="fa fa-pinterest text-white"></span></a>
    <div class="menu-item-text">Pinterest</div>
   </div>
</div>

<!-- Fixed Side Socials -->

<div class="quote animated rotatePulses infinite slower"> <a href="{{ url('advertise-us') }}"  title="Infobiz World Trade"> <span>Premium Packages</span></a> </div>
