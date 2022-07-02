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
                        <h1>Distributorship Metter Sheet</h1>
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
                                <strong class="card-title">Distributorship Metter Sheet</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="distributorshipSheetTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Company Name</th>
                                            <th>Contact Person Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Designation</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($distributorshipSheets as $key => $distributorshipSheet)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $distributorshipSheet->company_name }}</td>
                                                <td>{{ $distributorshipSheet->contact_name }}</td>
                                                <td>{{ $distributorshipSheet->email }}</td>
                                                <td>{{ $distributorshipSheet->mobile }}</td>
                                                <td>{{ $distributorshipSheet->designation }}</td>
                                                <td>{{ \Carbon\Carbon::parse($distributorshipSheet->created_at)->format('d M, Y g:i A') }}</td>
                                                <td>
                                                  <button class="btn btn-danger mb-1" title="Download" data-download-distributorship-metter-sheet sheet="{{ $distributorshipSheet }}"><span class="fa fa-download"></span></button>
                                                  <a href="{{ url('admin/distributorship-sheet/'.$distributorshipSheet->id.'/delete') }}" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
    
     <script>
        $('#distributorshipSheetTable').DataTable();
    </script>
</body>
</html>