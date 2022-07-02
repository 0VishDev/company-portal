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
    @if(Auth::user()->id == 1)
    <div id="right-panel" class="right-panel">
      @include('admin.header')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>VR Trust</h1>
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
                                <strong class="card-title">VR Trust</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-responsive table-striped table-bordered" id="vrTrustTable">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Company Name</th>
                                            <th>Logo</th>
                                            <th>Docs</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @php $no = 0; @endphp
                                    @foreach($vendors as $user)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->company_name }}</td>
                                            <td id="vr_trust_icon_html_{{ $user->id }}">
                                                @if(!empty($user->vr_trust_icon)) 
                                                    <img height="50" src="{{ url('/') }}/public/storage/vr-trust/{{ $user->vr_trust_icon }}" alt="{{ $user->name }}"/>
                                                @else 
                                                    <img height="50" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $user->name }}"/>  
                                                @endif
                                            </td>
                                            <td id="vr_trust_docs_html_{{ $user->id }}">
                                                @if(!empty($user->vr_trust_docs)) 
                                                   <a href="{{ url('/') }}/public/storage/vr-trust/{{ $user->vr_trust_docs }}" target="_blank" style="color:#007bff;"><u>View Docs</u></a>
                                                @else 
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-vr-trust-edit user-id="{{ $user->id }}" vr-icon="{{ (!empty($user->vr_trust_icon) ? url('/').'/public/storage/vr-trust/'.$user->vr_trust_icon : '') }}" vr-docs="{{ (!empty($user->vr_trust_docs) ? url('/').'/public/storage/vr-trust/'.$user->vr_trust_docs : '') }}">Edit</button>
                                            </td> 
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
    
    <div class="modal fade" id="vrTrustModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">VR Trust</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form action="{{ url('admin/vr-trust/icon/add') }}" method="POST" id="category_form" enctype="multipart/form-data">
            @csrf
            
              <input type="hidden" id="vr_trust_user_id" name="user_id">
              
              <div class="modal-body">
                  
                <div class="form-group">
                    <label for="customer_earnings" class="control-label mb-1">Icon (size: 128 x 128)</label>
                    <input type="file" id="icon_image" name="icon" class="form-control" accept="image/*" data-bvalidator="" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                    <div id="vr_trust_icon_display">
                        <img height="50" src="" />
                        &emsp;
                        <button type="button" class="btn btn-primary btn-sm mt-2" data-vr-trust-delete file-type="icon">Delete</button>
                    </div>
                    @if ($errors->has('icon'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('icon') }}</strong>
                      </span>
                    @endif
                </div>
            
                <div class="form-group">
                    <label for="customer_earnings" class="control-label mb-1">Upload Docs</label>
                    <input id="icon_docs" name="icon_docs" type="file" class="form-control" accept=".doc,.docx,.txt,.pdf,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png">
                    <div id="vr_trust_docs_display">
                        <a href="" target="_blank"style="color:#007bff;"><u>View Docs</u></a> 
                        
                        &emsp;
                        <button type="button" class="btn btn-primary btn-sm mt-2" data-vr-trust-delete file-type="docs">Delete</button>
                    </div>
                    @if ($errors->has('icon_docs'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('icon_docs') }}</strong>
                      </span>
                    @endif
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
   
   <script>
       $('#vrTrustTable').DataTable();
   </script>
</body>
</html>