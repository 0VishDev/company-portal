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
    @if(Auth::user()->id == 1)
    <div id="right-panel" class="right-panel">
     @include('admin.header')
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Vendor</h1>
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
                       @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                       <form action="{{ route('admin.edit-vendor') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @endif
                        <div class="card">
                          <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name <span class="require">*</span></label>
                                                <input id="name" name="name" type="text" class="form-control" value="{{ $edit['userdata']->name }}" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Username <span class="require">*</span></label>
                                                <input id="username" name="username" type="text" class="form-control" value="{{ $edit['userdata']->username }}" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                    <label for="email" class="control-label mb-1">Email <span class="require">*</span></label>
                                                    <input id="email" name="email" type="email" class="form-control" value="{{ $edit['userdata']->email }}" data-bvalidator="email,required">
                                                </div>
                                                 <div class="form-group">
                                                <label for="name" class="control-label mb-1">Mobile <span class="require">*</span></label>
                                                <input id="username" name="mobile" type="number" class="form-control" value="{{ $edit['userdata']->mobile }}" data-bvalidator="required">
                                            </div>
                                                <input type="hidden" name="user_type" value="vendor">
                                                <div class="form-group">
                                                    <label for="password" class="control-label mb-1">Password</label>
                                                    <input id="password" name="password" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <label for="password" class="control-label mb-1">City <span class="require">*</span></label>
                                                        <select class="form-control" id="city" name="city" data-bvalidator="required">
                                                            @foreach($cities as $city)
                                                                <option value="{{ $city->id }}" {{ ($edit['userdata']->city_id == $city->id ? 'selected' : '') }}>{{ $city->city_name }}</option>
                                                            @endforeach
                                                        </select>
                                                 </div>
                                                <div class="form-group">
                                                    <label for="theme">Theme <span class="require">*</span></label><br>
                                                    <label for="theme_1"><input type="radio" name="theme" value="theme-1" id="theme_1" {{ ($edit['userdata']->vendor_theme == 'theme-1' ? 'checked' : '') }}> Theme 1</label>
                                                    <label for="theme_2"><input type="radio" name="theme" value="theme-2" id="theme_2" {{ ($edit['userdata']->vendor_theme == 'theme-2' ? 'checked' : '') }}> Theme 2</label>
                                                    <label for="theme_3"><input type="radio" name="theme" value="theme-3" id="theme_3" {{ ($edit['userdata']->vendor_theme == 'theme-3' ? 'checked' : '') }}> Theme 3</label>
                                                    <label for="theme_4"><input type="radio" name="theme" value="theme-4" id="theme_4" {{ ($edit['userdata']->vendor_theme == 'theme-4' ? 'checked' : '') }}> Theme 4</label>
                                                </div>
                                                {{--<div class="form-group">
                                                    <label for="earnings" class="control-label mb-1">Earnings ({{ $allsettings->site_currency_symbol }})</label>
                                                    <input id="earnings" name="earnings" type="text" class="form-control" value="{{ $edit['userdata']->earnings }}" data-bvalidator="min[0]">
                                                </div>--}}
                                                <div class="form-group">
                                                                    <label for="customer_earnings" class="control-label mb-1">Upload Photo</label>
                                                                    <input type="file" id="user_photo" name="user_photo" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg"></div>
                                                @if($edit['userdata']->company_logo != '')
                                                <img width="100" src="{{ url('/') }}/public/storage/company-logo/{{ $edit['userdata']->company_logo }}"  class="userphoto"/>
                                                @else 
                                                <img width="100" src="{{ url('/') }}/public/img/no-user.png"  class="userphoto"/>  @endif
                                                <input type="hidden" name="save_photo" value="{{ $edit['userdata']->user_photo }}">
                                                <input type="hidden" name="save_password" value="{{ $edit['userdata']->password }}">
                                                <input type="hidden" name="edit_id" value="{{ $token }}">
                                    </div>
                                </div>
                             </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                          <div class="card-footer">
                                  <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                      <i class="fa fa-dot-circle-o"></i> Submit
                                  </button>
                                  <button type="reset" class="btn btn-danger btn-sm">
                                       <i class="fa fa-ban"></i> Reset
                                  </button>
                            </div>
                          </div> 
                       </form> 
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