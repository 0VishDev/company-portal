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
                        <h1>Delivery Status</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                          
                        <form action="{{ url('admin/delivery-status/add') }}" method="POST" enctype="multipart/form-data" id="deliverystatus">
                            @csrf
                            <input type="hidden" id="deliverystatus_user_id" name="user_id">
                            <div class="p-3 shadow">
                                <div class="row">
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Name</label>
                                            <select class="form-control shadow" id="deliverystatus_company_name" name="company_name">
                                               <option value="">- Please select -</option>
                                                @foreach($vendorsList as $vendor)
                                                    @php $serviceProvider = \ZigKart\Helpers::getPackage($vendor->id); @endphp
                                                    <option value="{{ $vendor->company_name }}" vendor="{{ $vendor }}" serviceProvider="{{ (!empty($serviceProvider) ? $serviceProvider : '') }}">{{ $vendor->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Customer Name</label>
                                            <input type="text" class="form-control shadow" id="customer_name" name="customer_name" value="" readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control shadow" id="mobile" name="mobile" value="" readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Email id</label>
                                            <input type="email" class="form-control shadow" id="email" name="email" value="" readonly/>
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Delivery Status</label>
                                            <input type="text" class="form-control shadow" id="delivery_status" name="delivery_status" value=""/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Package Name</label>
                                            <select class="form-control shadow" id="package_name" name="package_name">
                                            <option value="">- Please select -</option>
                                                @foreach($serviceProviders as $serviceProvider)
                                                    <option value="{{ $serviceProvider->provider_name }}">{{ $serviceProvider->provider_name }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Contract Amount</label>
                                            <input type="text" class="form-control shadow" id="contract_amount" name="contract_amount" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Payment Status</label>
                                            <select class="form-control shadow" id="payment_status" name="payment_status">
                                            <option value=""></option>
                                            <option value="Due">Due</option>
                                            <option value="No Due">No Due</option>
                                            </select>
                                            </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Developer Name</label>
                                            <input type="text" class="form-control shadow" id="developer_name" name="developer_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Project Assign Date</label>
                                            <input type="date" class="form-control shadow" id="project_assign_date" name="project_assign_date" value="" />
                                            </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Remaining Work</label>
                                            <input type="text" class="form-control shadow" id="remaining_work" name="remaining_work" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Project Delivery Date</label>
                                            <input type="date" class="form-control shadow" id="project_delivery_date" name="project_delivery_date" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Domain Status</label>
                                            <select class="form-control shadow" id="domain_status" name="domain_status">
                                                <option value=""></option>
                                                <option value="Booked">Booked</option>
                                                <option value="Not Booked">Not Booked</option>
                                            </select>
                                            </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Domain Name</label>
                                            <input type="text" class="form-control shadow" id="domain_name" name="domain_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Comment</label>
                                            <input type="text" class="form-control shadow" id="comment" name="comment" value="" />
                                        </div>
                                        <div class="col-sm-12 form-group mb-3 text-center">
                                            <input type="submit" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                            </div> 
                    </form>
                        </div> 
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>