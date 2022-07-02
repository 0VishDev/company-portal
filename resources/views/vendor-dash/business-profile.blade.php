@include('vendor-dash.left-panel')


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="pb-2">Business Profile</h5>
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
        
            <form class="form" action="{{ url('vendor/business-profile/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                       
                <div class="row">
                <div class="col-sm-3">
                    <!--left col-->
                    <div class="text-center contact">
                        <h3>Company Logo</h3>
                        @if(!empty($user->company_logo))
                             <img src="{{ asset('public/storage/company-logo/'.$user->company_logo) }}" class="avatar mt-2 img-thumbnail" alt="avatar" id="companyImage">
                        @else
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar mt-2 img-thumbnail" alt="avatar" id="companyImage">
                        @endif
                        <h6>Upload company logo</h6>
                        <input type="file" id="company_logo" name="company_logo" class="text-center center-block" accept="image/*" onchange="imageUpload('#company_logo', '#companyImage')">
						<label for="company_logo" class="btn-2">File upload</label>
                    </div>

                </div>
                <!--/col-3-->
                <div class="col-sm-9">
                        <div class="form-group col-sm-6">
                            <div class="">
                                <label for="Company_Name">
                                    <h4> Company Name <small> (As Per Reg. Document)</small></h4>
                                </label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $user->company_name }}" >
    							@if ($errors->has('company_Name'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('company_Name') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <div class="">
                                <label for="Year_of_Establishment">
                                    <h4>Year of Establishment</h4>
                                </label>
                                <input type="text" class="form-control" name="year_of_establishment" id="year_of_establishment" value="{{ $user->year_of_establishment }}" >
                                @if ($errors->has('year_of_establishment'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('year_of_establishment') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
    						<div class="">
    							<label for="Promoterfirst_name">
    								<h4>Owner / CEO (First name)</h4>
    							</label>
    							<input type="text" class="form-control" name="promoter_first_name" id="promoter_first_name" value="{{ $user->promoter_first_name }}" >
    							@if ($errors->has('promoter_first_name'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('promoter_first_name') }}</strong>
                                  </span>
                                @endif
    						</div>
    					</div>
    					
    					
    					<div class="form-group col-sm-6">
    						<div class="">
    							<label for="Promoterlast_name">
    								<h4>Owner / CEO (Last name)</h4>
    							</label>
    							<input type="text" class="form-control" name="promoter_last_name" id="promoter_last_name" value="{{ $user->promoter_last_name }}" >
    							@if ($errors->has('promoter_last_name'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('promoter_last_name') }}</strong>
                                  </span>
                                @endif
    						</div>
    					</div>

                        {{--<div class="form-group col-sm-12">
                            <div class="">
                                <label for="Additional_Contact_Name">
                                    <h4>Additional Contact Name </h4>
                                </label>
                                <input type="text" class="form-control" name="additional_contact_name" id="additional_contact_name" value="{{ $user->additional_contact_name }}" >
                                @if ($errors->has('additional_contact_name'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('additional_contact_name') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>--}}
                        <div class="form-group col-sm-6">
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
					</div>
					<div class="form-group col-sm-6">
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
					</div>
                        <div class="form-group col-sm-6">
                            <div class="">
                                <label for="primary_type">
                                    <h4>Business Type</h4>
                                </label>
                                <select class="form-control" id="primary_type" name="primary_type" >
                                    @foreach($primaryTypes as $key => $primaryType)
                                        <option value="{{ $key }}">{{ $primaryType }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('primary_type'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('primary_type') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-6">
                          <div class="">
                            <label for="Ownership_Type"><h4>Ownership Type</h4></label>
                            <select class="form-control" id="ownership_type" name="ownership_type" >
                               @foreach($ownershipTypes as $key => $ownershipType)
                                    <option value="{{ $key }}" {{ ($user->ownership_type == $key ? 'selected' : '') }}>{{ $ownershipType }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('ownership_type'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('ownership_type') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      
                       <div class="form-group col-sm-6">
                          <div class="">
                            <label for="Employees"><h4>Number of Employees</h4></label>
                            <select class="form-control" size="1" id="no_of_employees" name="no_of_employees" >
                               @foreach($noOfEmployees as $key => $noOfEmployee)
                                    <option value="{{ $key }}" {{ ($user->no_of_employees == $key ? 'selected' : '') }}>{{ $noOfEmployee }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('no_of_employees'))
                              <span class="help-block text-danger">
                                <strong>{{ $errors->first('no_of_employees') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      
                      <div class="form-group col-sm-6">
                          <div class="">
                            <label for="annual_turnover"><h4>Annual Turnover</h4></label>
                              <select class="form-control" id="annual_turnover" name="annual_turnover" >
                                @foreach($annualTurnovers as $key => $annualTurnover)
                                    <option value="{{ $key }}" {{ ($user->annual_turnover == $key ? 'selected' : '') }}>{{ $annualTurnover }}</option>
                                @endforeach
                              </select>
                               @if ($errors->has('annual_turnover'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('annual_turnover') }}</strong>
                                  </span>
                                @endif
                          </div>
                      </div>
					  
                      <div class="form-group col-sm-6">
						<div class="">
    							<label for="Website">
    								<h4>Company Website</h4>
    							</label>
    							<input type="url" class="form-control" name="company_website" id="company_website" value="{{ $user->company_website }}" >
    							@if ($errors->has('company_website'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('company_website') }}</strong>
                                  </span>
                                @endif
    						</div>
    					</div>
    					</div>
    					
    					<div class="row">
    					<div class="form-group col-sm-12">
                           <div class="">
                              <label for="company_about">
    								<h4>Company About</h4>
    							</label>
    							<textarea class="form-control" id="company_about" name="company_about" rows="5" >{{ $user->user_about }}</textarea>
                            </div>
					    </div>
                      
					    <div class="form-group col-sm-12">
                           <div class="">
                              <hr>
                            </div>
					    </div>
					    
					    @php $businessArr = explode(',', $user->secondory_business); @endphp
					  
					    <div class="form-group col-sm-12">
                          <div class="">
                              <label for="Primary_Mobile"><h4>Secondary Business</h4></label>
                               <ul class="inline-radio clearfix">
                                  @foreach($secondoryBusinesses as $key => $secondoryBusiness)
                                     <li><input type="checkbox" class="filled-in " name="secondoryBusiness[]" value="{{ $key }}" {{ (in_array($secondoryBusiness, $businessArr) ? 'checked' : '') }}/><label for="filled-in-box1">{{ $secondoryBusiness }}</label></li>
                                  @endforeach
                               </ul>
                               @if ($errors->has('secondoryBusiness'))
                                  <span class="help-block text-danger">
                                    <strong>{{ $errors->first('secondoryBusiness') }}</strong>
                                  </span>
                                @endif
                          </div>
                        </div>
                      
					   <div class="form-group col-sm-12">
                           <div class="">
                              <hr>
                            </div>
					    </div>
					  
					    <div class="form-group col-sm-12">
                            <div class="">
                              <label><h4>Social Links</h4></label>
                            </div>
        		        </div>
        		        
        		        <div class="form-group col-sm-6">
                            <div class="">
                              <label><h4>Facebook Link</h4></label>
                              <input type="url" class="form-control" name="facebook_link" id="facebook_link" value="{{ $user->facebook_link }}" >
                            </div>
        		        </div>
        		        <div class="form-group col-sm-6">
                            <div class="">
                              <label><h4>Linkedin Link</h4></label>
                              <input type="url" class="form-control" name="linkedin_link" id="linkedin_link" value="{{ $user->linkedin_link }}" >
                            </div>
        		        </div>
        		         <div class="form-group col-sm-6">
                            <div class="">
                              <label><h4>Instagram Link</h4></label>
                              <input type="url" class="form-control" name="instagram_link" id="instagram_link" value="{{ $user->instagram_link }}" >
                            </div>
        		        </div>
        		        <div class="form-group col-sm-6">
                            <div class="">
                              <label><h4>Twitter Link</h4></label>
                              <input type="url" class="form-control" name="twitter_link" id="twitter_link" value="{{ $user->twitter_link }}" >
                            </div>
        		        </div>
        		        
                        {{--<div class="form-group col-sm-6">
                           <div class="">
                                <div class="contact">
                            	   <h4>Front View</h4>
                            		@if(!empty($user->business_card_front_view))
                                         <img src="{{ asset('public/storage/business-card/'.$user->business_card_front_view) }}" class="avatar img-thumbnail" alt="avatar" id="businessCardFrontImage">
                                    @else
                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-thumbnail" alt="avatar" id="businessCardFrontImage">
                                    @endif
                                    <input type="file" class="text-center center-block" id="business_card_front_view" name="business_card_front_view" accept="image/*" onchange="imageUpload('#business_card_front_view', '#businessCardFrontImage')">
						<label for="business_card_front_view" class="btn-2">File upload</label>
                                </div>
                            </div>
                        </div>--}}
						   
                      {{--<div class="form-group col-sm-6">
                            <div class="">
                              <div class="contact">
                        		 <h4>Back View</h4>
                                @if(!empty($user->business_card_back_view))
                                     <img src="{{ asset('public/storage/business-card/'.$user->business_card_back_view) }}" class="avatar img-thumbnail" alt="avatar" id="businessCardBackImage">
                                @else
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-thumbnail" alt="avatar" id="businessCardBackImage">
                                @endif
                                <input type="file" class="text-center center-block" id="business_card_back_view" name="business_card_back_view" accept="image/*" onchange="imageUpload('#business_card_back_view', '#businessCardBackImage')">
						<label for="business_card_back_view" class="btn-2">File upload</label>
                              </div>
                          </div>
                      </div>--}}
                      
                      <div class="form-group col-sm-12">
                        <div class="">
                            <br>
                          	<button class="btn btn-lg btn-success" type="submit"> Save</button>
                        </div>
                      </div>
              	   
                  </div><!--/tab-content-->
        
                </div><!--/col-9-->
            </form>
        </div>
    </div>
   <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
@include('vendor-dash.bottom-links')
                         