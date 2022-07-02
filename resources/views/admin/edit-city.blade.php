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
    @if(in_array('city',$avilable))
    <div id="right-panel" class="right-panel">
      @include('admin.header')
      <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit City</h1>
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
                       <form action="{{ route('admin.edit-city') }}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       @endif
                        <div class="card">
                          <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="country">Country <span class="required">*</span></label>
                                            <select class="form-control" name="user_country" data-bvalidator="required">
                                            @foreach($allcountry as $country)
                                            <option value="{{ $country->country_id }}" @if($edit['city']->country_id == $country->country_id) selected @endif>{{ $country->country_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State <span class="required">*</span></label>
                                            <select class="form-control" name="user_state" data-bvalidator="required">
                                            @foreach($allstate as $state)
                                            <option value="{{ $state->id }}" @if($edit['city']->state_id == $state->id) selected @endif>{{ $state->state_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                       <div class="form-group">
                                                <label for="city_name" class="control-label mb-1">Name <span class="require">*</span></label>
                                                <input id="city_name" name="city_name" type="text" class="form-control" value="{{ $edit['city']->city_name }}" required>
                                            </div>
                                           <input type="hidden" name="cid" value="{{ $cid }}">     
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