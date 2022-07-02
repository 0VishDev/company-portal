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
                        <h1>Post Steps</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/post-steps/add/'.$postId) }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Step</a>
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
                                <strong class="card-title">Post Steps</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="callbackTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Step Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0; @endphp
                                        @foreach($postSteps as $postStep)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td>{{ $postStep->step_name }}</td>
                                                <td>
                                                    @if(!empty($postStep->step_image)) 
                                                      <img height="50" src="{{ url('/') }}/public/storage/post-steps/{{ $postStep->step_image }}" alt="{{ $postStep->step_name }}" />
                                                   @else 
                                                      <img height="50" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $postStep->step_name }}" />  
                                                   @endif
                                                </td>
                                                <td>{{ $postStep->step_description }}</td>
                                                <td>{{ \Carbon\Carbon::parse($postStep->created_at)->format('d M, Y g:i A') }}</td>
                                                <td>
                                                    <a href="{{ url('admin/post-steps/'.$postStep->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a> 
                                                    <a href="{{ url('admin/post-steps/'.$postStep->id.'/delete') }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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