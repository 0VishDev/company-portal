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
    <div id="right-panel" class="right-panel">
      @include('admin.header')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ ($mode == 'add' ? 'Add' : 'Edit') }} Service Packages</h1>
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
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                           
                          <form action="{{ ($mode == 'add' ? url('admin/service-providers/add') : url('admin/service-providers/'.$serviceProvider->id.'/update')) }}" method="post" id="category_form" enctype="multipart/form-data">
                           @csrf
                           
                           <div class="col-md-12">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Packages Name <span class="require">*</span></label>
                                                <input id="provider_name" name="provider_name" type="text" class="form-control" data-bvalidator="required" value="{{ ($mode == 'edit' ? $serviceProvider->provider_name : '') }}">
                                                @if ($errors->has('provider_name'))
                                                  <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('provider_name') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Packages Image (size: 640 x 360)</label>
                                                <input type="file" id="provider_image" name="provider_image" class="form-control" accept="image/*" data-bvalidator="{{ ($mode == 'edit' ? '' : 'required') }}" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                @if($mode == 'edit')
                                                    @if(!empty($serviceProvider->provider_image))
                                                       <img height="50" src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_image }}"  />
                                                    @else 
                                                        <img height="50" src="{{ url('/') }}/public/img/no-image.jpg"  />
                                                    @endif
                                                @endif
                                                
                                                @if ($errors->has('provider_image'))
                                                  <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('provider_image') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Packages Small Image (size: 128 x 128)</label>
                                                <input type="file" id="provider_small_image" name="provider_small_image" class="form-control" accept="image/*" data-bvalidator="{{ ($mode == 'edit' ? '' : 'required') }}" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                @if($mode == 'edit')
                                                    @if(!empty($serviceProvider->provider_small_image))
                                                       <img height="50" src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_small_image }}"  />
                                                    @else 
                                                        <img height="50" src="{{ url('/') }}/public/img/no-image.jpg"  />
                                                    @endif
                                                @endif
                                                
                                                @if ($errors->has('provider_small_image'))
                                                  <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('provider_small_image') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                          
                                            </div>
                                            
                                            <div class="col-md-6">  
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Upload Docs</label>
                                                <input id="service_docs" name="service_docs" type="file" class="form-control" accept=".doc,.docx,.txt,.pdf,.xls,.xlsx,.ppt,.pptx">
                                                @if($mode == 'edit')
                                                    @if(!empty($serviceProvider->service_docs))
                                                       <div class="clearfix"></div>
                                                       <a href="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->service_docs }}" target="_blank" style="color: #007bff;">View Current Docs</a>
                                                    @endif
                                                @endif
                                                
                                                @if ($errors->has('service_docs'))
                                                  <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('service_docs') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="service_price" class="control-label mb-1">Price</label>
                                                <input type="text"  id="service_price" name="service_price" class="form-control" value="{{ ($mode == 'edit' ? $serviceProvider->service_price : '') }}">
                                            @if ($errors->has('service_price'))
                                                  <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('service_price') }}</strong>
                                                  </span>
                                                @endif                                       
                                                </div>
                                                <div class="form-group">
                                                <label for="total_lead" class="control-label mb-1">Total Leads</label>
                                                <input type="text"  id="total_lead" name="total_lead" class="form-control" value="{{ ($mode == 'edit' ? $serviceProvider->total_lead : '') }}">
                                            @if ($errors->has('total_lead'))
                                                  <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('total_lead') }}</strong>
                                                  </span>
                                                @endif                                       
                                                </div>
                                         </div>
                                    </div>
                                 </div>
                            </div>
                            
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
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>