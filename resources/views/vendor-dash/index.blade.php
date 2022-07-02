@include('vendor-dash.left-panel')


  <div class="container ven-dash">
     <div class="row">
      <div class="col-sm-12 text-center mb-3">
        <img src="/public/img/seller1.png" class="img img-responsive">
      </div>
    </div>

    <div class="row d-none">
      <div class="col-sm-12">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link {{ (empty(session('type')) ? 'active' : '') }}" id="nav-Basic-tab" data-toggle="tab" href="#nav-Basic" role="tab" aria-controls="nav-Basic" aria-selected="true">Basic Seller details</a>
            <a class="nav-item nav-link {{ (session('type') == 'document' ? 'active' : '') }}" id="nav-GST-tab" data-toggle="tab" href="#nav-GST" role="tab" aria-controls="nav-GST" aria-selected="false">Add Documents</a>
            <a class="nav-item nav-link {{ (session('type') == 'verify' ? 'active' : '') }}" id="nav-Verify-tab" data-toggle="tab" href="#nav-Verify" role="tab" aria-controls="nav-Verify" aria-selected="false">Verify on Call Or Email</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade {{ (empty(session('type')) ? 'show active' : '') }}" id="nav-Basic" role="tabpanel" aria-labelledby="nav-Basic-tab">
            <form class="form row p-3" action="{{ url('vendor/business-detail/update') }}" method="POST">
               @csrf
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Seller_Name">
                    <h4>Seller Name</h4>
                  </label>
                  <input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Seller Name" value="{{ $user->name }}" >
                    @if ($errors->has('seller_name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('seller_name') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Company_Name">
                    <h4>Company Name</h4>
                  </label>
                  <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" title="Company Name" value="{{ $user->company_name }}" >
                   @if ($errors->has('company_Name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('company_Name') }}</strong>
                      </span>
                    @endif
                </div>
              </div>

              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Business_Address">
                    <h4>Business Address</h4>
                  </label>
                  <input type="text" class="form-control" name="business_address" id="business_address" placeholder="Business Address" title="Business Address" value="{{ $user->business_address }}" >
                   @if ($errors->has('business_address'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('business_address') }}</strong>
                      </span>
                    @endif
                </div>
              </div>

              <div class="form-group col-sm-6">
                <div class=" ">
                  <label for="Locality">
                    <h4>Locality</h4>
                  </label>
                  <input type="text" class="form-control" name="locality" id="locality" placeholder="Locality" title="Locality" value="{{ $user->locality }}" >
                   @if ($errors->has('locality'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('locality') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Primary_Mobile">
                    <h4>Primary Mobile No.</h4>
                  </label>
                  <input type="text" class="form-control" name="primary_mobile" id="primary_mobile" placeholder="Primary Mobile No." title="Primary Mobile" value="{{ $user->mobile }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                   @if ($errors->has('primary_mobile'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('primary_mobile') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Primary_email">
                    <h4>Primary Email</h4>
                  </label>
                  <input type="email" class="form-control" name="primary_email" id="primary_email" placeholder="you@email.com" title="Primary Email" value="{{ $user->email }}">
                   @if ($errors->has('primary_email'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('primary_email') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Alternate_Mobile">
                    <h4>Alternate Mobile No.</h4>
                  </label>
                  <input type="text" class="form-control" name="alternate_mobile" id="alternate_mobile" placeholder="Alternate Mobile No." title="Alternate Mobile" value="{{ $user->mobile2 }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                   @if ($errors->has('alternate_mobile'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('alternate_mobile') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Alternate_email">
                    <h4>Alternate Email</h4>
                  </label>
                  <input type="email" class="form-control" id="alternate_email" name="alternate_email" placeholder="Alternate Email" title="Alternate Email" value="{{ $user->email2 }}">
                   @if ($errors->has('alternate_email'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('alternate_email') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Country">
                    <h4>Country</h4>
                  </label>
                  <select  class="form-control" name="country" id="country" >
                    @foreach($countries as $key => $country)
                      <option value="{{ $country->country_id }}" {{ ($user->country_id == $country->country_id ? 'selected' : '') }}>{{ $country->country_name }}</option>
                    @endforeach
                  </select>
                   @if ($errors->has('country'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('country') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="State">
                    <h4>State</h4>
                  </label>
                   <select  class="form-control" name="state" id="state" >
                    @foreach($states as $state)
                      <option value="{{ $state->id }}" {{ ($user->state_id == $state->id ? 'selected': '') }}>{{ $state->state_name }}</option>
                    @endforeach
                  </select>
                   @if ($errors->has('state'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('state') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="City">
                    <h4>City</h4>
                  </label>
                  <select  class="form-control" name="city" id="city" >
                    @foreach($cities as $city)
                      <option value="{{ $city->id }}" {{ ($user->state_id == $city->id ? 'selected': '') }}>{{ $city->city_name }}</option>
                    @endforeach
                  </select>
                   @if ($errors->has('city'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('city') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="Pin_code">
                    <h4>Pin code</h4>
                  </label>
                  <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pin Code" title="Pin Code" value="{{ $user->pincode }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                   @if ($errors->has('seller_name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('seller_name') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
               <div class="form-group col-sm-12 text-center">
                <br>
                <div class="">
                  <button class="btn btn-md mt-1 btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade {{ (session('type') == 'document' ? 'show active' : '') }}" id="nav-GST" role="tabpanel" aria-labelledby="nav-GST-tab">
            @if (session('success'))
               <div class="col-sm-12 col-md-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="col-sm-12 col-md-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
                    
            <form class="form row p-3" action="{{ url('vendor/document-detail/update') }}" method="POST">
              @csrf
              <div class="col-sm-12 mb-3">
                <h3>Add PAN</h3>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="PAN">
                    <h4>PAN</h4>
                  </label>
                  <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="PAN No" title="PAN No" value="{{ $user->pan_no }}" >
                   @if ($errors->has('pan_no'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('pan_no') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">

                <div class="">
                  <label for="gst">
                    <h4>GST No.</h4>
                  </label>
                  <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="GST No" title="GST No" value="{{ $user->gst_no }}" >
                   @if ($errors->has('gst_no'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('gst_no') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group col-sm-6">
                <br>
                <div class="">
                  <button class="btn btn-md mt-1 btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade {{ (session('type') == 'verify' ? 'show active' : '') }} p-3" id="nav-Verify" role="tabpanel" aria-labelledby="nav-Verify-tab">
            @if (session('success'))
               <div class="col-sm-12 col-md-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="col-sm-12 col-md-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            
            <div class="bg-white shadow p-4">
              <div class="row">
                <div class="col-sm-12 col-md-1 mb-2">
                  <img src="/public/img/call-1.png">
                </div>
                <div class="col-sm-12 col-md-7 mb-2">
                  <h5>Call verification pending</h5>
                  <p>Get your business details verified with us and receive 2X more enquiries!</p>
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                  <button type="button" class="btn btn-info" data-target="#rqstcall" data-toggle="modal">Request A Callback</button><br><br>
                  <button type="button" class="btn btn-info" data-target="#rqstcall" data-toggle="modal">Request A Email</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->


@include('vendor-dash.bottom-links')