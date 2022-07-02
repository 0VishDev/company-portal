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
                        <h1>Service Provider </h1>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/service-providers/add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Service Provider</a>
                        </ol>
                    </div>
                </div>
            </div>-->
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
                                <strong class="card-title">Service Provider</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="serviceTable">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile No.</th>
                                            <th>Requirments</th>
                                            <th>Comment</th>
                                            <th>Date/Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 0; @endphp
                                    @foreach($serviceProviders as $serviceProvider)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $serviceProvider->first_name }} {{ $serviceProvider->last_name }}</td>
                                            
                                            <td>
                                                {{ $serviceProvider->email }}
                                            </td>
                                            <td>
                                                {{ $serviceProvider->mobile }}
                                            </td>
                                            <td>
                                                {{ $serviceProvider->requirments }}
                                            </td>
                                            <td>
                                                {{ $serviceProvider->comment }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($serviceProvider->created_at)->format('d M, Y g:i A') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger mb-1" title="Add Comment" data-comment-add inquiry-id="{{ $serviceProvider->id }}" comment="{{ $serviceProvider->comment }}"><span class="fa fa-commenting-o"></span></button>
                                                
                                                <a href="{{ url('admin/dealing-services-delete/'.$serviceProvider->id.'/delete') }}" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                                            </td>
                                            
                                            <!--<td>
                                                @if(!empty($serviceProvider->provider_image)) 
                                                  <img height="50" src="{{ url('/') }}/public/storage/service-providers/{{ $serviceProvider->provider_image }}" alt="{{ $serviceProvider->provider_name }}" />
                                               @else 
                                                  <img height="50" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $serviceProvider->provider_name }}" />  
                                               @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/service-providers/'.$serviceProvider->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a> 
                                                <a href="{{ url('admin/service-providers/'.$serviceProvider->id.'/delete') }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            </td>-->
                                            
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
           <form action="{{ url('admin/services-dealing/comment/add') }}" method="POST" enctype="multipart/form-data">
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
    
    <!-- Right Panel -->
   @include('admin.javascript')
   
    <script>
        $('#serviceTable').DataTable({
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('serviceTable', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('serviceTable'));
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