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
                        <h1>Sub Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-subcategory') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Sub Category</a>
                        </ol>
                    </div>
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
                            <div class="card-header">
                                <strong class="card-title">Sub Category</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($subcategoryData['subcategory'] as $category)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->subcategory_name }}</td>
                                            <td>@if($category->subcategory_image != '') <img height="50" src="{{ url('/') }}/public/storage/subcategory/{{ $category->subcategory_image }}" alt="{{ $category->subcategory_name }}" />@else <img height="50" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $category->subcategory_name }}" />  @endif</td>
                                            <td>@if($category->subcategory_status == 1) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">InActive</span> @endif</td>
                                            <td><a href="edit-subcategory/{{ $category->subcat_id }}" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm mb-1" title="Edit"><i class="fa fa-trash"></i></a>
                                            @else 
                                            <a href="sub-category/{{ $category->subcat_id }}" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>@endif</td></tr>@php $no++; @endphp
                                   @endforeach     
                                    </tbody>
                                </table>
                            </div>
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