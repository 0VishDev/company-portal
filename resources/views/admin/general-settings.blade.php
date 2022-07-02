<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
@include('admin.stylesheet')
</head>
<body>
@include('admin.navigation')
<!-- Right Panel -->
    @if(in_array('settings',$avilable))
    <div id="right-panel" class="right-panel">
      @include('admin.header')
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>General Settings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
         @if (session('success'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="col-sm-12">
             <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             @foreach ($errors->all() as $error)
             {{$error}}
             @endforeach
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
             </div>
            </div>   
         @endif
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.general-settings') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                           <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Name <span class="require">*</span></label>
                                                <input id="site_title" name="site_title" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_title }}" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Meta Description (max 250 chars) <span class="require">*</span></label>
                                            <textarea name="site_desc" id="site_desc" rows="6" placeholder="site description" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[250]">{{ $setting['setting']->site_desc }}</textarea></div>
                                               <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Meta Keywords (max 950 chars) <span class="require">*</span></label>
                                             <textarea name="site_keywords" id="site_keywords" rows="6" placeholder="separate keywords with commas" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[950]">{{ $setting['setting']->site_keywords }}</textarea>
                                            </div>  
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Header Background (size 1920 x 500) <span class="require">*</span></label>
                                            <input type="file" id="site_header_background" name="site_header_background" class="form-control-file" @if($setting['setting']->site_header_background == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->site_header_background != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_header_background }}" />
                                                @endif
                                            </div>
                                             <div class="form-group">
                                                <label for="site_copyright" class="control-label mb-1">Copyright<span class="require">*</span></label>
                                                <input id="site_copyright" name="site_copyright" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_copyright }}" data-bvalidator="required">
                                            </div>  
                                            <input type="hidden" name="site_multilanguage" value="1">
                                            <?php /*?><div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Multilanguage?<span class="require">*</span></label><br/>
                                               
                                                <select name="site_multilanguage" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->site_multilanguage == 1) selected @endif>ON</option>
                                                <option value="0" @if($setting['setting']->site_multilanguage == 0) selected @endif>OFF</option>
                                                </select>
                                                
                                             </div> <?php */?>
                                            <div class="form-group">
                                                <label for="product_per_page" class="control-label mb-1">Product per page<span class="require">*</span></label>
                                                <input id="product_per_page" name="product_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->product_per_page }}" data-bvalidator="required,min[1]"></div><div class="form-group">
                                                <label for="post_per_page" class="control-label mb-1">Post per page<span class="require">*</span></label>
                                                <input id="post_per_page" name="post_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->post_per_page }}" data-bvalidator="required,min[1]"></div><div class="form-group">
                                                <label for="product_approval" class="control-label mb-1">Product Auto Approval?<span class="require">*</span></label><br/>
                                               <select name="product_approval" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->product_approval == 1) selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->product_approval == 0) selected @endif>No</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Cookie Popup Text <span class="require">*</span></label>
                                             <textarea name="cookie_popup_text" id="cookie_popup_text" rows="5" class="form-control noscroll_textarea" data-bvalidator="required">{{ $setting['setting']->cookie_popup_text }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_copyright" class="control-label mb-1">Google Analytics<span class="require">*</span></label>
                                                <input id="google_analytics" name="google_analytics" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_analytics }}" data-bvalidator="required">
                                                <small>Example : UA-xxxxxx-1</small>
                                            </div>
                                            <div class="form-group">
                                      <label for="product_approval" class="control-label mb-1">Maintenance Mode?<span class="require">*</span></label><br/>
                                       <select name="maintenance_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->maintenance_mode == 1) selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->maintenance_mode == 0) selected @endif>No</option>
                                                </select>
                                                
                                  </div> 
                                    </div>
                                </div>
                            </div>
                            </div>
                           <div class="col-md-6">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">Favicon (max 24 x 24) <span class="require">*</span></label>
                                            <input type="file" id="site_favicon" name="site_favicon" class="form-control-file" @if($setting['setting']->site_favicon == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>
                                            @if($setting['setting']->site_favicon != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_favicon }}" />
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Logo (size 180 x 50) <span class="require">*</span></label>
                                            <input type="file" id="site_logo" name="site_logo" class="form-control-file" @if($setting['setting']->site_logo == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>
                                            @if($setting['setting']->site_logo != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_logo }}" />
                                                @endif
                                            </div>
                                            <div class="form-group d-none">
                                                <label for="site_loader_image" class="control-label mb-1">Page Loader GIF (size 250 x 250)<span class="require">*</span></label>
                                            <input type="file" id="site_loader_image" name="site_loader_image" class="form-control-file" @if($setting['setting']->site_loader_image == '') data-bvalidator="required,extension[gif]" data-bvalidator-msg="Please select file of type .gif" @else data-bvalidator="extension[gif]" data-bvalidator-msg="Please select file of type .gif" @endif>
                                            @if($setting['setting']->site_loader_image != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_loader_image }}" />
                                                @endif
                                            </div>
                                           <div class="form-group d-none">
                                                <label for="site_loader_display" class="control-label mb-1">Page Loader<span class="require">*</span></label><br/>
                                               <select name="site_loader_display" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->site_loader_display == 1) selected @endif>ON</option>
                                                <option value="0" @if($setting['setting']->site_loader_display == 0) selected @endif>OFF</option>
                                                </select>
                                             </div>
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Email <span class="require">*</span></label>
                                                <input id="office_email" name="office_email" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->office_email }}" data-bvalidator="required,email"></div><div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Phone Number <span class="require">*</span></label>
                                                <input id="office_phone" name="office_phone" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->office_phone }}" data-bvalidator="required"></div><div class="form-group">
                                  <label for="site_desc" class="control-label mb-1">Address <span class="require">*</span></label>
                                  <textarea name="office_address" id="office_address" rows="6" class="form-control noscroll_textarea" data-bvalidator="required">{{ $setting['setting']->office_address}}</textarea>
                                  </div> 
                                   <div class="form-group">
                                      <label for="product_approval" class="control-label mb-1">Multi-Language?<span class="require">*</span></label><br/>
                                       <select name="google_translate" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->google_translate == 1) selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->google_translate == 0) selected @endif>No</option>
                                                </select>
                                  </div> 
                                  <div class="form-group">
                                      <label for="product_approval" class="control-label mb-1">Cookie Popup?<span class="require">*</span></label><br/>
                                       <select name="cookie_popup" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->cookie_popup == 1) selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->cookie_popup == 0) selected @endif>No</option>
                                                </select>
                                  </div> 
                                  <div class="form-group">
                                                <label for="site_copyright" class="control-label mb-1">Cookie Button Text<span class="require">*</span></label>
                                                <input id="cookie_popup_button" name="cookie_popup_button" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->cookie_popup_button }}" data-bvalidator="required">
                                 </div>
                                 <div class="form-group">
                                      <label for="product_approval" class="control-label mb-1">External Product?<span class="require">*</span></label><br/>
                                       <select name="display_external_product" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->display_external_product == 1) selected @endif>ON</option>
                                                <option value="0" @if($setting['setting']->display_external_product == 0) selected @endif>OFF</option>
                                                </select>
                                  </div>  
                                  <div class="form-group">
                                      <label for="product_approval" class="control-label mb-1">New Registration For Email Verification?<span class="require">*</span></label><br/>
                                       <select name="email_verification" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->email_verification == 1) selected @endif>ON</option>
                                                <option value="0" @if($setting['setting']->email_verification == 0) selected @endif>OFF</option>
                                                </select>
                                                <small>(If selected "OFF" automatically verified customers / vendors)</small>
                                  </div> 
                              </div>
                             </div>
                             </div>
                            </div>
                           <div class="col-md-12 d-none"><div class="card-body"><h4>Start Sellings</h4></div></div>
                           <div class="col-md-6 d-none">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Header Background Image (size 1920 x 500)<span class="require">*</span></label><br/>
                                               <input type="file" id="selling_background" name="selling_background" class="form-control-file"  @if($setting['setting']->selling_background == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->selling_background != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->selling_background }}" />
                                                @endif
                                              </div>
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Left Side Image (size 500 x 320)<span class="require">*</span></label><br/>
                                               <input type="file" id="selling_image_one" name="selling_image_one" class="form-control-file"  @if($setting['setting']->selling_image_one == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->selling_image_one != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->selling_image_one }}" />
                                                @endif
                                              </div>
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Right Side Image (size 300 x 300)<span class="require">*</span></label><br/>
                                               <input type="file" id="selling_image_two" name="selling_image_two" class="form-control-file"  @if($setting['setting']->selling_image_two == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->selling_image_two != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->selling_image_two }}" />
                                                @endif
                                              </div>
                                       </div>
                                </div>
                             </div>
                            </div>
                            <div class="col-md-6 d-none">
                              <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Icon 1 (size 128 x 128)<span class="require">*</span></label><br/>
                                               <input type="file" id="selling_icon_one" name="selling_icon_one" class="form-control-file"  @if($setting['setting']->selling_icon_one == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->selling_icon_one != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->selling_icon_one }}" />
                                                @endif
                                             </div>
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Icon 2 (size 128 x 128)<span class="require">*</span></label><br/>
                                               <input type="file" id="selling_icon_two" name="selling_icon_two" class="form-control-file"  @if($setting['setting']->selling_icon_two == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->selling_icon_two != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->selling_icon_two }}" />
                                                @endif
                                               </div>
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Icon 3 (size 128 x 128)<span class="require">*</span></label><br/>
                                               <input type="file" id="selling_icon_three" name="selling_icon_three" class="form-control-file"  @if($setting['setting']->selling_icon_three == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($setting['setting']->selling_icon_three != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->selling_icon_three }}" />
                                                @endif
                                              </div>
                                       </div>
                                </div>
                              </div>
                            </div>
                            <input type="hidden" name="save_loader_image" value="{{ $setting['setting']->site_loader_image }}">
                                                <input type="hidden" name="image_size" value="{{ $setting['setting']->site_max_image_size }}">
                                                <input type="hidden" name="save_logo" value="{{ $setting['setting']->site_logo }}">
                                                <input type="hidden" name="save_header_background" value="{{ $setting['setting']->site_header_background }}">
                                                <input type="hidden" name="save_favicon" value="{{ $setting['setting']->site_favicon }}">
                                                <input type="hidden" name="sid" value="1">
                             <input type="hidden" name="save_selling_background" value="{{ $setting['setting']->selling_background }}">
                                        <input type="hidden" name="save_selling_image_one" value="{{ $setting['setting']->selling_image_one }}">
                                        <input type="hidden" name="save_selling_image_two" value="{{ $setting['setting']->selling_image_two }}">
                                        <input type="hidden" name="save_selling_icon_one" value="{{ $setting['setting']->selling_icon_one }}">
                                        <input type="hidden" name="save_selling_icon_two" value="{{ $setting['setting']->selling_icon_two }}">
                                        <input type="hidden" name="save_selling_icon_three" value="{{ $setting['setting']->selling_icon_three }}">
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
                             </div>
                             </div>
                             </form>
                           </div> 
                        </div>
                 </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>