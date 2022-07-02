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
    @if(in_array('pages',$avilable))
    <div id="right-panel" class="right-panel">
       @include('admin.header')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Visitors</h1>
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
                                <strong class="card-title">Visitors</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="visitorsTable">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Seller Name</th>
                                            <th>Company Name</th>
          	                                <th>Email</th>
          	                                <th>Mobile</th>
          	                                <th>Visit Count<small><strong>(Pages)</strong></small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 0; @endphp
                                    @foreach($visitors as $visitor)
                                        <tr>
                                            <td>{{ ++$no }}</td> 
                                            <td>{{ $visitor->user->name }}</td>
                                            <td>{{ $visitor->user->company_name }}</td>
                                            <td>{{ $visitor->user->email }}</td>
                                            <td>{{ $visitor->user->mobile }}</td>
                                            <td>{{ $visitor->total_visit_count }}</td>
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
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
   @include('admin.javascript')
   
   <script>
       $('#visitorsTable').dataTable({
        "bStateSave": true,
        "fnStateSave": function (oSettings, oData) {
            localStorage.setItem('visitorsTable', JSON.stringify(oData));
        },
        "fnStateLoad": function (oSettings) {
            return JSON.parse(localStorage.getItem('visitorsTable'));
        }
    });
   </script>
</body>
</html>