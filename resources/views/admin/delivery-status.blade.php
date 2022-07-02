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
                        <ol class="breadcrumb text-left">
                        <a href="{{ url('/admin/add-delivery-status') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Delivery Status</a>
                        </ol>
                        </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
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
                                <strong class="card-title">Delivery Status</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="DeliveryStatusTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Delivery Status</th>
                                            <th>Company Name</th>
                                            <th>Customer Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email id</th>
                                            <th>Package Name</th>
                                            <th>Contract Amount</th>
                                            <th>Payment Status</th>
                                            <th>Developer Name</th>
                                            <th>Project Assign Date</th>
                                            <th>Project Delivery Date</th>
                                            <th>Remaining Work</th>
                                            <th>Domain Status</th>
                                            <th>Domain Name</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php $count = 0; @endphp
                                        
                                        @foreach($deliverystatus as $deliverystatus)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $deliverystatus->delivery_status }}</td>
                                                <td>{{ $deliverystatus->company_name }}</td>
                                                <td>{{ $deliverystatus->customer_name }}</td>
                                                <td>{{ $deliverystatus->mobile }}</td>
                                                <td>{{ $deliverystatus->email }}</td>
                                                <td>{{ $deliverystatus->package_name }}</td>
                                                <td>{{ $deliverystatus->contract_amount }}</td>
                                                <td>{{ $deliverystatus->payment_status }}</td>
                                                <td>{{ $deliverystatus->developer_name }}</td>
                                                <td>{{ $deliverystatus->project_assign_date }}</td>
                                                <td>{{ $deliverystatus->project_delivery_date }}</td>
                                                <td>{{ $deliverystatus->remaining_work }}</td>
                                                <td>{{ $deliverystatus->domain_status }}</td>
                                                <td>{{ $deliverystatus->domain_name }}</td>
                                                <td>{{ $deliverystatus->comment }}</td>
                                                <td>
                                                    <a href="edit-delivery-status/{{ $deliverystatus->id }}" class="btn btn-success btn-sm mb-1" title="Edit"><i class="fa fa-edit"></i></a> 
                                                    <a href="{{ url('admin/delivery-status/'.$deliverystatus->id.'/delete') }}" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
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
        $('#DeliveryStatusTable').DataTable();
    </script>
</body>
</html>