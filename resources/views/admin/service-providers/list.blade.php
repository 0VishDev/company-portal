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
                        <h1>Service Packages</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/service-providers/add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Service Provider</a>
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
                                <strong class="card-title">Service Providers</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Total Leads</th>
                                            <th>Image</th>
                                            <th>Small Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 0; @endphp
                                    @foreach($serviceProviders as $serviceProvider)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $serviceProvider->provider_name }}</td>
                                            <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $serviceProvider->service_price }}</td>
                                            <td>{{ $serviceProvider->total_lead }}</td>
                                            <td>
                                                @if(!empty($serviceProvider->provider_image)) 
                                                  <img height="50" src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_image }}" alt="{{ $serviceProvider->provider_name }}" />
                                               @else 
                                                  <img height="50" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $serviceProvider->provider_name }}" />  
                                               @endif
                                            </td>
                                            <td>
                                                @if(!empty($serviceProvider->provider_small_image)) 
                                                  <img height="50" src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_small_image }}" alt="{{ $serviceProvider->provider_small_image }}" />
                                               @else 
                                                  <img height="50" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $serviceProvider->provider_small_image }}" />  
                                               @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/service-providers/'.$serviceProvider->id.'/edit') }}" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a> 
                                                <a href="{{ url('admin/service-providers/'.$serviceProvider->id.'/delete') }}" class="btn btn-danger btn-sm mb-1" onClick="return confirm('Are you sure you want to delete?');" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
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
    
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>