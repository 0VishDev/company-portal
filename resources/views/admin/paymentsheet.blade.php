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
                        <h1>Payment Sheet</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="#" data-toggle="modal" data-target="#downloadpaymentsheet" class="btn btn-success btn-sm">Download Payment</a>
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
                                <strong class="card-title">Grand Total: <i class="fa fa-inr" aria-hidden="true"></i> <span id="total_received_amount">0.00</span></strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="paymentSheetsTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Manager Name</th>
                                            <th>Executive Name</th>
                                            <th>Company Name</th>
                                            <th>Customer Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email id</th>
                                            <th>Address</th>
                                            <th>GST No</th>
                                            <th>Package Name</th>
                                            <th>Contract Amount</th>
                                            <th>Tatal Received</th>
                                            <th>Transactions</th>
                                            <th>Package Detail</th>
                                            <th>Package Duration</th>
                                            <th>Domain Duration</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                          $count = 0; 
                                          $totalRecievedAmount = 0;
                                        @endphp
                                        
                                        @foreach($paymentSheets as $paymentSheet)
                                           @php 
                                             $payments = $paymentSheet->payments;
                                             $recievedAmount = $payments->sum('received_amount');
                                             
                                             $totalRecievedAmount = $totalRecievedAmount + $recievedAmount;
                                           @endphp
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $paymentSheet->manager_name }}</td>
                                                <td>{{ $paymentSheet->executive_name }}</td>
                                                <td>{{ $paymentSheet->company_name }}</td>
                                                <td>{{ $paymentSheet->customer_name }}</td>
                                                <td>{{ $paymentSheet->mobile }}</td>
                                                <td>{{ $paymentSheet->email }}</td>
                                                <td>{{ $paymentSheet->address }}</td>
                                                <td>{{ $paymentSheet->gst_no }}</td>
                                                <td>{{ $paymentSheet->package_name }}</td>
                                                <td>{{ $paymentSheet->contract_amount }}</td>
                                                <td>{{ number_format($recievedAmount, 2) }}</td>
                                                <td><a href="#" data-toggle="modal" data-target="#paymentSheetsModal{{ $paymentSheet->id }}" style="color:#007bff;"><u>All Transaction</u></a></td>
                                                <td>{{ $paymentSheet->detail_services }}</td>
                                                <td>{{ $paymentSheet->package_duration }}</td>
                                                <td>{{ $paymentSheet->domain_duration }}</td>
                                                <td>{{ \Carbon\Carbon::parse($paymentSheet->created_at)->format('d M, Y g:i A') }}</td>
                                                <td>
                                                    <a href="{{ url('admin/paymentsheets/'.$paymentSheet->id.'/delete') }}" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
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
        
        @foreach($paymentSheets as $paymentSheet)
           @php 
             $payments = $paymentSheet->payments;
           @endphp
            <!-- Modal -->
            <div class="modal fade" id="paymentSheetsModal{{ $paymentSheet->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped table-bordered table-resp">
                      <thead>
                        <tr>
                          <th scope="col">Sno</th>
                          <th scope="col">Sale Date</th>
                          <th scope="col">Received Amount</th>
                          <th scope="col">Balance Amount</th>
                          <th scope="col">Mode Of Payment</th>
                          <th scope="col">Transaction No</th>
                          <th scope="col">Transaction Slip</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                           @php $count = 0; @endphp
                           @foreach($payments as $payment)
                                <tr>
                                  <td>{{ ++$count }}</td>
                                  <td>{{ (!empty($payment->sale_date) ? \Carbon\Carbon::parse($payment->sale_date)->format('d M, Y') : '-') }}</td>
                                  <td>{{ number_format($payment->received_amount, 2) }}</td>
                                  <td>{{ number_format($payment->balance_amount, 2) }}</td>
                                  <td>{{ $payment->mode_of_payment }}</td>
                                  <td>{{ $payment->transaction_no }}</td>
                                  <td>
                                      @if(!empty($payment->attachment))
                                        <a href="{{ asset('public/storage/paymentsheets/'.$payment->attachment) }}" target="_blank" style="color:#007bff;"><u>View Slip</u></a>
                                      @else
                                        -
                                      @endif
                                  </td>
                                  <td>
                                    <a href="{{ url('admin/paymentsheets/transactions/'.$payment->id.'/delete') }}" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                                   </td>
                                </tr>
                            @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
        
        
        <!-- Modal -->
            <div class="modal fade" id="downloadpaymentsheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="row" action="#" method="POST">
                        <div class="form-group col-sm-6">
                            <label>From</label>
                            <input type="date" class="form-control shadow" name="" required="" />
                        </div>
                        <div class="form-group col-sm-6">
                             <label>To</label>
                            <input type="date" class="form-control shadow" required="" />
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
        
        
     </div><!-- /#right-panel -->
   
    <!-- Right Panel -->
    @include('admin.javascript')
    
    <script>
        $('#total_received_amount').html(Number('{{ $totalRecievedAmount }}').toFixed(2));
        
        $('#paymentSheetsTable').DataTable();
    </script>
</body>
</html>