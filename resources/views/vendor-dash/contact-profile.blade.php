@include('vendor-dash.left-panel')

	<div class="container ven-dash">
		<div class="bg-white shadow pt-4 pl-2 pr-2">
			<div class="row">
				<div class="col-sm-6 mb-3">
					<h5 class="pb-2">Contact Profile</h5>
					<p>Complete your profile to attract genuine buyers</p>
				</div>
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
		    <form class="form" action="{{ url('vendor/company-detail/update') }}" method="POST" enctype="multipart/form-data">
		        @csrf
			    <div class="row">
				{{--<div class="col-sm-3">
					<!--left col-->
					<div class="text-center contact">
					    @if(!empty($user->user_photo))
                            <img src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" class="avatar img-circle img-thumbnail" alt="avatar" id="userImage">
                        @else
                            <img src="{{ url('/') }}/public/img/no-image.jpg" class="avatar img-circle img-thumbnail" alt="avatar" id="userImage">
                        @endif
						<h6>Upload Profile photo...</h6>
						<input type="file" id="user_photo" class="text-center center-block" name="file" accept="image/*" onchange="imageUpload('#user_photo', '#userImage')">
						<label for="user_photo" class="btn-2">Image upload</label>
					</div>

				</div>--}}
				<!--/col-3-->
				<div class="col-sm-12">
					<div class="form-group col-sm-6">
						<div class="">
							<label for="first_name">
								<h4>First name</h4>
							</label>
							<input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}" required>
							@if ($errors->has('first_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('first_name') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					<div class="form-group col-sm-6">

						<div class="">
							<label for="last_name">
								<h4>Last name</h4>
							</label>
							<input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}" required>
							@if ($errors->has('last_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('last_name') }}</strong>
                              </span>
                            @endif
						</div>
					</div>

					{{--<div class="form-group col-sm-6">
						<div class="">
							<label for="Promoterfirst_name">
								<h4>Promoter / CEO (First name)</h4>
							</label>
							<input type="text" class="form-control" name="promoter_first_name" id="promoter_first_name" value="{{ $user->promoter_first_name }}">
							@if ($errors->has('promoter_first_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('promoter_first_name') }}</strong>
                              </span>
                            @endif
						</div>
					</div>--}}
					{{--<div class="form-group col-sm-6">
						<div class="">
							<label for="Promoterlast_name">
								<h4>Promoter / CEO (Last name)</h4>
							</label>
							<input type="text" class="form-control" name="promoter_last_name" id="promoter_last_name" value="{{ $user->promoter_last_name }}">
							@if ($errors->has('promoter_last_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('promoter_last_name') }}</strong>
                              </span>
                            @endif
						</div>
					</div>--}}

					<div class="form-group col-sm-6">
						<div class="">
							<label for="Company_Name">
								<h4> Company Name <small> (As Per Reg. Document)</small></h4>
							</label>
							<input type="text" class="form-control" name="company_name" id="company_name" value="{{ $user->company_name }}">
							@if ($errors->has('company_Name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('company_Name') }}</strong>
                              </span>
                            @endif
						</div>
					</div>

					<div class="form-group col-sm-6">
						<div class="">
							<label for="Designation">
								<h4>Designation</h4>
							</label>
							<input type="text" class="form-control" name="designation" id="designation" value="{{ $user->designation }}">
							@if ($errors->has('designation'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('designation') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					<div class="form-group col-sm-6">

						<div class="">
							<label for="Address">
								<h4>Address <small>(Building No. / Floor)</small></h4>
							</label>
							<input type="text" class="form-control" name="address_building_no" id="address_building_no" value="{{ $user->address_building_no }}">
							@if ($errors->has('address_building_no'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('address_building_no') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Area">
								<h4>Address <small>(Area / Street)</small></h4>
							</label>
							<input type="text" class="form-control" id="address_area" name="address_area" value="{{ $user->address_area }}">
							@if ($errors->has('address_area'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('address_area') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Landmark">
								<h4>Landmark</h4>
							</label>
							<input type="text" class="form-control" name="landmark" id="landmark" value="{{ $user->landmark }}">
							@if ($errors->has('landmark'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('landmark') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Locality">
								<h4>Locality</h4>
							</label>
							<input type="text" class="form-control" name="locality" id="locality" value="{{ $user->locality }}">
							@if ($errors->has('locality'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('locality') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Country">
								<h4>Country</h4>
							</label>
							<select  class="form-control" name="country" id="country">
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
                            <select  class="form-control" name="state" id="state">
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
							<select  class="form-control" name="city" id="city">
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
							<label for="Zip_Code">
								<h4>Zip Code</h4>
							</label>
							<input type="text" class="form-control" name="pincode" id="pincode" value="{{ $user->pincode }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            @if ($errors->has('seller_name'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('seller_name') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					{{--<div class="form-group col-sm-6">
						<div class="">
							<label for="GSTIN">
								<h4>GSTIN</h4>
							</label>
							<input type="text" class="form-control" name="gstin" id="gstin" value="{{ $user->gst_no }}">
							@if ($errors->has('gstin'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('gstin') }}</strong>
                              </span>
                            @endif
						</div>
					</div>--}}
					
					{{--<div class="form-group col-sm-6">
						<div class="">
							<label for="Website">
								<h4>Company Website</h4>
							</label>
							<input type="text" class="form-control" name="company_website" id="company_website" value="{{ $user->company_website }}">
							@if ($errors->has('company_website'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('company_website') }}</strong>
                              </span>
                            @endif
						</div>
					</div>--}}
					
					<div class="form-group col-sm-6">
						<div class="">
							<label for="Primary_Mobile">
								<h4>Mobile No.</h4>
							</label>
							<input type="text" class="form-control" name="primary_mobile" id="primary_mobile" value="{{ $user->mobile }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
								<h4>Email Id</h4>
							</label>
							<input type="email" class="form-control" name="primary_email" id="primary_email"  value="{{ $user->email }}" required>
                            @if ($errors->has('primary_email'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('primary_email') }}</strong>
                              </span>
                            @endif
						</div>
					</div>
					{{--<div class="form-group col-sm-6">
						<div class="">
							<label for="Alternate_Mobile">
								<h4>Alternate Mobile No.</h4>
							</label>
							<input type="text" class="form-control" name="alternate_mobile" id="alternate_mobile" value="{{ $user->mobile2 }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            @if ($errors->has('alternate_mobile'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('alternate_mobile') }}</strong>
                              </span>
                            @endif
						</div>
					</div>--}}
					{{--<div class="form-group col-sm-6">
						<div class="">
							<label for="Alternate_email">
								<h4>Alternate Email</h4>
							</label>
							<input type="email" class="form-control" id="alternate_email" name="alternate_email"  value="{{ $user->email2 }}">
                            @if ($errors->has('alternate_email'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('alternate_email') }}</strong>
                              </span>
                            @endif
						</div>
					</div>--}}
					<div class="form-group col-sm-12">
						<div class="">
							<br>
							<button class="btn btn-lg btn-success" type="submit"> Save</button>

						</div>
					</div>
				</div>
				<!--/tab-content-->

			</div>
			<!--/col-9-->
			</form>
		</div>
	</div>
	<!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

@include('vendor-dash.bottom-links')