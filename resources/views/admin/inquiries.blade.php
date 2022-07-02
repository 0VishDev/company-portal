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
    @if(in_array('inquiries',$avilable))
    <div id="right-panel" class="right-panel">
       @include('admin.header')
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Inquiries</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <button class="btn btn-success btn-sm" data-target="#postBuyerReqModal" data-toggle="modal"><i class="fa fa-plus"></i> Add Inquiry</button>
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
                                <strong class="card-title">Inquiries</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="productInquiryTable">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th style="width:82px;padding: 5px 5px 0 5px;">Name</th>
                                            <th style="padding: 5px 5px 0 5px;">Email</th>
                                            <th style="width:82px;padding: 5px 5px 0 5px;">Mobile</th>
                                            <th style="width:82px;padding: 5px 5px 0 5px;">Location</th>
                                            <th style="padding:5px 5px 0 5px;width:116px;">Product Name</th>
                                            <th style="width:160px;padding: 5px 5px 0 5px;">Requirement</th>
                                            <th style="width:100px;padding: 5px 5px 0 5px;">Date / Time</th>
                                            <th style="padding: 5px 5px 0 5px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0; @endphp
                                    @foreach($productInquiry as $inquiry)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td style="width:82px;padding: 5px 5px 0 5px;">{{ $inquiry->name }}</td>
                                            <td style="padding: 5px 5px 0 5px;">{{ $inquiry->email }}</td>
                                            <td style="width:82px;padding: 5px 5px 0 5px;">{{ $inquiry->mobile }}</td>
                                            <td style="width:82px;padding: 5px 5px 0 5px;">{{ $inquiry->location }}</td>
                                            <td style="width:116px;padding: 5px 5px 0 5px;">{{ (isset($inquiry->product->product_name) ? $inquiry->product->product_name : $inquiry->product_name) }}</td>
                                            <td style="width:160px;padding: 5px 5px 0 5px;">Qty: {{ $inquiry->quantity }}<br>{{ $inquiry->requirement_type }}<br>{{ $inquiry->want_to_buy }}<br>{{ $inquiry->i_want_to_buy }}<br>{{ $inquiry->purpose }}<br>{{ $inquiry->buying_request_description }}</td>
                                            <td style="width:100px;padding: 5px 5px 0 5px;">{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M, Y g:i A') }}</td>
                                            <td style="padding: 5px 5px 0 5px;">
                                                <a href="#" class="btn btn-info btn-sm mb-1" title="Edit" data-inquiry-edit inquiry="{{ $inquiry }}"><span class="fa fa-pencil"></span></a>
                                                <a href="{{ url('admin/inquiries/'.$inquiry->inquiry_id.'/delete') }}" class="btn btn-danger btn-sm mb-1" title="Delete" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                                @if($inquiry->is_verify == 0)
                                                    <a href="{{ url('admin/inquiries/'.$inquiry->inquiry_id.'/verify') }}" class="btn btn-primary btn-sm mb-1" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                @endif
                                                
                                                @if($inquiry->is_send_to_seller == 0)
                                                    <a href="{{ url('admin/inquiries/'.$inquiry->inquiry_id.'/send') }}" class="btn btn-success btn-sm mb-1" title="Send Seller Lead"><span class="fa fa-send-o" style="font-size: 13px;"></span></a>
                                                @else
                                                    <button class="btn btn-secondary btn-sm mb-1" title="View Inquiry Sellers" data-toggle="modal" data-target="#viewInquirySeller{{ $inquiry->inquiry_id }}"><span class="fa fa-eye" style="font-size: 13px;"></span></button>
                                                @endif
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
     
     
     
     <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="{{ url('admin/inquiries/comment/add') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" id="comment_inquiry_id" name="inquiry_id">
              <div class="modal-body">
                <div class="form-group">
                    <label for="comment_message" class="control-label mb-1">Add Comment</label>
                    <input type="text" id="comment_message" name="comment" class="form-control">
                </div>  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
    @include('admin.javascript')
    
    @include('send-inquiry')
    
    <script>
       $(document).ready(function() {
            var table = $('#productInquiryTable').DataTable( {
                lengthChange: false,
                ordering: false,
                buttons: [ 'excel'],
                "bStateSave": true,
                "fnStateSave": function (oSettings, oData) {
                    localStorage.setItem('productInquiryTable', JSON.stringify(oData));
                },
                "fnStateLoad": function (oSettings) {
                    return JSON.parse(localStorage.getItem('productInquiryTable'));
                }
            } );
         
            table.buttons().container()
                .appendTo( '#productInquiryTable_wrapper .col-md-6:eq(0)' );
        } );
        
         $(document).on('click', '[data-comment-add]', function () {
           var inquiryId = $(this).attr('inquiry-id');
           var comment = $(this).attr('comment');
           
           $('#comment_inquiry_id').val(inquiryId);
           $('#comment_message').val(comment);
           
           $('#addCommentModal').modal('show');
        });
    </script>
    <style>
        table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
    position: absolute;
    bottom: 0.9em;
    display: none;
    opacity: 0.3;
}
    </style>
</body>
</html>