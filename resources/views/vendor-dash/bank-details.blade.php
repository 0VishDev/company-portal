@include('vendor-dash.left-panel')


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="pb-2">Bank Details</h5>
                    <p>Complete your profile to attract genuine buyers</p>
                </div>
                {{-- <div class="col-sm-6 mb-3">
                    <div class="user-area dropdown float-right mt-3">
                        <a href="javascript:void();" class="dropdown-toggle shadow p-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More Options <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div class="user-menu1 dropdown-menu">
                            <a class="nav-link" href="personalizedurl.php">Create Catalog URL</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="container mt-4">
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
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <form class="form" action="{{ url('vendor/bank-detail/update') }}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="IFSC">
                                    <h4> IFSC Code</h4>
                                </label>
                                <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="{{ $user->ifsc_code }}">
                                @if ($errors->has('ifsc_code'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('ifsc_code') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="Bank">
                                    <h4>Bank Name <small>(As per IFSC Code)</small></h4>
                                </label>
                                <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ $user->bank_name }}">
                                @if ($errors->has('bank_name'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="Account_no">
                                    <h4>Account No.</h4>
                                </label>
                                <input type="text" class="form-control" name="account_no" id="account_no" value="{{ $user->account_no }}">
                                 @if ($errors->has('account_no'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('account_no') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-sm-12">

                            <div class="">
                                <label for="Account_type">
                                    <h4>Account type</h4>
                                </label>
                                <input type="text" class="form-control" name="account_type" id="account_type" value="{{ $user->account_type }}">
                                @if ($errors->has('account_type'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('account_type') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"> Save</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
@include('vendor-dash.bottom-links')