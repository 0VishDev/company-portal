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
    @if(in_array('manage-categories',$avilable))
    <div id="right-panel" class="right-panel">
      @include('admin.header')
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Category</h1>
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
                           <form action="{{ route('admin.edit-category') }}" method="post" id="category_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                           <div class="col-md-6">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                            <label for="name" class="control-label mb-1">Name <span class="require">*</span></label>
                                            <input id="category_name" name="category_name" type="text" class="form-control" value="{{ $edit['category']->category_name }}" data-bvalidator="required">
                                        </div>
                                       <div class="form-group">
                                            <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                            <select name="category_status" class="form-control" data-bvalidator="required">
                                            <option value=""></option>
                                            <option value="1" @if($edit['category']->category_status == 1) selected="selected" @endif>Active</option>
                                            <option value="0" @if($edit['category']->category_status == 0) selected="selected" @endif>InActive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">SEO Title <span class="require">*</span></label>
                                            <input id="seo_title" name="seo_title" type="text" class="form-control" value="{{ $edit['category']->seo_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_title" class="control-label mb-1"> SEO Keywords</label>
                                            <textarea name="seo_keywords" id="seo_keywords" class="form-control">{{ $edit['category']->seo_keywords }}</textarea>
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
                                        <label for="name" class="control-label mb-1">Display Order</label>
                                        <input id="display_order" name="display_order" type="text" class="form-control" value="{{ $edit['category']->display_order }}">
                                    </div>  
                                    <div class="form-group">
                                        <label for="customer_earnings" class="control-label mb-1">Upload Icon (size: 128 x 128)</label>
                                        <input type="file" id="category_image" name="category_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg"></div>@if($edit['category']->category_image != '')<img height="50" src="{{ url('/') }}/public/storage/category/{{ $edit['category']->category_image }}"  />@else <img height="50" src="{{ url('/') }}/public/img/no-image.jpg"  />@endif
                                    </div>
                                    <div class="form-group">
                                        <label for="site_title" class="control-label mb-1"> SEO Meta Description</label>
                                        <textarea name="seo_meta_description" id="seo_meta_description" class="form-control">{{ $edit['category']->seo_meta_description }}</textarea>
                                     </div>
                                </div>
                              </div>
                             <input type="hidden" name="save_category_image" value="{{ $edit['category']->category_image }}">
                             <input type="hidden" name="cat_id" value="{{ $edit['category']->cat_id }}">
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
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>