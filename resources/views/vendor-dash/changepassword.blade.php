@include('vendor-dash.left-panel')
			
			
			 <div class="container ven-dash">
				 <div class="bg-white pt-4 pl-2 pr-2 text-center">
				 <div class="row">
					 <div class="col-sm-12 mb-3">
					 <h3 class="pb-2">Change Password</h3>
					 </div>
				   </div>
				 </div>
				 
				 <form class="bg-white p-3 mt-4" action="{{ url('user/password/update') }}" method="POST">
				     @csrf
				     
				     @if (session('success'))
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
				     
                     <div class="container">
                      <div class="row">
                    	<div class="form-group col-sm-6">
                          <div class="">
                              <label for="new_pass"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" required>
                              @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group col-sm-6">
                          <div class="">
                            <label for="re_pass"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                              @if ($errors->has('password_confirmation'))
                                <span class="help-block text-danger">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                              @endif
                          </div>
                      </div>
        	  		  <div class="form-group col-sm-12 text-center">
                        <button class="btn btn-success mt-2 mb-2" type="submit">Save</button>
                      </div>
                    </div>
                </div>
            </form>
		</div>
    </div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('vendor-dash.bottom-links')