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
                        <h1>Business Enquiries</h1>
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
                                <strong class="card-title">Business Enquiries</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="businessTable">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Location</th>
                                            <th>Requirement Type</th>
                                            <th>Business Type/Insurance Type /Iso Type</th>
                                            <th>Comment</th>
                                            <th>Date / Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($isoCertifications as $isoCertification)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $isoCertification->first_name }} {{ $isoCertification->last_name }}</td>
                                            <td>{{ $isoCertification->email }}</td>
                                            <td>{{ $isoCertification->mobile }}</td>
                                            <td>{{ $isoCertification->city }}</td>
                                            <td>ISO Certification</td>
                                            <td>{{ $isoCertification->certification_required }}</td>
                                            <td>{{ $isoCertification->comment }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($isoCertification->created_at)->format('d M, Y g:i A') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="{{ $isoCertification->id }}" comment="{{ $isoCertification->comment }}" type="isoCertification"><span class="fa fa-commenting-o"></span></button>
                                                <a href="{{ url('admin/business-enquiries/'.$isoCertification->id.'/delete?type=isoCertification') }}" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach
                                   @foreach($businessInsurances as $businessInsurance)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $businessInsurance->first_name }} {{ $businessInsurance->last_name }}</td>
                                            <td>{{ $businessInsurance->email }}</td>
                                            <td>{{ $businessInsurance->mobile }}</td>
                                            <td>{{ $businessInsurance->city }}</td>
                                            <td>Business Insurance</td>
                                            <td>{{ $businessInsurance->insurance_type }}</td>
                                            <td>{{ $businessInsurance->comment }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($businessInsurance->created_at)->format('d M, Y g:i A') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="{{ $businessInsurance->id }}" comment="{{ $businessInsurance->comment }}" type="businessInsurance"><span class="fa fa-commenting-o"></span></button>
                                                <a href="{{ url('admin/business-enquiries/'.$businessInsurance->id.'/delete?type=businessInsurance') }}" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach
                                   @foreach($businessLoans as $businessLoan)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $businessLoan->first_name }} {{ $businessLoan->last_name }}</td>
                                            <td>{{ $businessLoan->email }}</td>
                                            <td>{{ $businessLoan->mobile }}</td>
                                            <td>{{ $businessLoan->city }}</td>
                                            <td>Business Loan</td>
                                            <td>{{ $businessLoan->business_type }}</td>
                                             <td>{{ $businessLoan->comment }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($businessLoan->created_at)->format('d M, Y g:i A') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="{{ $businessLoan->id }}" comment="{{ $businessLoan->comment }}" type="businessLoan"><span class="fa fa-commenting-o"></span></button>
                                                <a href="{{ url('admin/business-enquiries/'.$businessLoan->id.'/delete?type=businessLoan') }}" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
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
           <form action="{{ url('admin/business-enquiries/comment/add') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" id="comment_inquiry_id" name="inquiry_id">
               <input type="hidden" id="comment_inquiry_type" name="inquiry_type">
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
    <!-- Right Panel -->
   @include('admin.javascript')
   
    <script>
        $('#businessTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('businessTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('businessTable'));
            }
        });
        
        $(document).on('click', '[data-comment-add]', function () {
           var inquiryId = $(this).attr('inquiry-id');
           var comment = $(this).attr('comment');
           var type = $(this).attr('type');
           
           $('#comment_inquiry_id').val(inquiryId);
           $('#comment_inquiry_type').val(type);
           $('#comment_message').val(comment);
           
           $('#addCommentModal').modal('show');
        });
    </script>
</body>
</html>