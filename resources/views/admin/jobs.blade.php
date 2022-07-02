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
                        <h1>Jobs</h1>
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
                                <strong class="card-title">Jobs</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive" id="jobsTable">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Categories</th>
                                            <th>Description</th>
                                            <th>Resume</th>
                                            <th>Comment</th>
                                            <th>Date / Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0; @endphp
                                        @foreach($jobs as $job)
                                            <tr>
                                            <td>{{ ++$no }}</td>
                                                <td>{{ $job->user_name }}</td>
                                                <td>{{ $job->email }}</td>
                                                <td>{{ $job->mobile }}</td>
                                                
                                                <td>{{ (isset($job->state) ? $job->state->state_name : '') }}</td>
                                                <td>{{ (isset($job->city) ? $job->city->city_name : '') }}</td>
                                                
                                                <td>{{ $job->categories }}</td>
                                                <td>{{ $job->description }}</td>
                                                
                                                <td>{!! (!empty($job->resume) ? '<a href="'.asset('public/storage/resumes/'.$job->resume).'" style="color:#007bff;" target="_blank"><u>View Resume</u></a>' : '-') !!}</td>
                                                <td>{{ $job->comment }}</td>
                                                
                                                <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y g:i A') }}</td>
                                                <td>
                                                    <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="{{ $job->id }}" comment="{{ $job->comment }}"><span class="fa fa-commenting-o"></span></button>
                                                    
                                                    @if($job->is_verify == 0)
                                                        <a href="{{ url('admin/jobs/'.$job->id.'/verify') }}" class="btn btn-danger mb-1" title="Verify"><span class="fa fa-stop-circle-o"></span></a>
                                                    @endif
                                                    <a href="{{ url('admin/jobs/'.$job->id.'/delete') }}" title="Delete" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><span class="fa fa-trash"></span></a>
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
    <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="{{ url('admin/jobs/comment/add') }}" method="POST" enctype="multipart/form-data">
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
    @include('admin.javascript')
    
     <script>
        $('#jobsTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('jobsTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('jobsTable'));
            }
        });
        
        $(document).on('click', '[data-comment-add]', function () {
           var inquiryId = $(this).attr('inquiry-id');
           var comment = $(this).attr('comment');
           
           $('#comment_inquiry_id').val(inquiryId);
           $('#comment_message').val(comment);
           
           $('#addCommentModal').modal('show');
        });
    </script>
</body>
</html>