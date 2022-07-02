@include('vendor-dash.left-panel')


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="pb-2">Additional Contact Details</h5>
                    <p>Add Additional Contact Details to your Online Catalog</p>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="float-right mt-3">
                        <button class="btn btn-md btn-info">Add Contact Details</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-12">
                    <form class="addition-detail">
                        <div class="form-group row">
                            <label for="Division" class="col-sm-2 col-form-label">Division</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option value="Select Division">Select Division</option>
                                    <option value="Branch Office">Branch Office</option>
                                    <option value="Corporate Office">Corporate Office</option>
                                    <option value="Corporate Office / Regd. Office">Corporate Office / Regd. Office</option>
                                    <option value="Customer Care">Customer Care</option>
                                    <option value="Distributor">Distributor</option>
                                    <option value="Factory">Factory</option>
                                    <option value="Head Office">Head Office</option>
                                    <option value="International Office">International Office</option>
                                    <option value="Manufacturing Unit">Manufacturing Unit</option>
                                    <option value="Regd. Office">Regd. Office</option>
                                    <option value="Sales Enquiry">Sales Enquiry</option>
                                    <option value="Showroom">Showroom</option>
                                    <option value="Sister Concern">Sister Concern</option>
                                    <option value="Store">Store</option>
                                    <option value="Technical Support">Technical Support</option>
                                    <option value="Trading Division">Trading Division</option>
                                    <option value="Warehouse">Warehouse</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Contact_Person" class="col-sm-2 col-form-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Contact_Person">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-2" id="Address">
                                <input type="text" class="form-control" id="Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Country" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Country">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="E-mail" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="E-mail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Contact_No" class="col-sm-2 col-form-label">Contact No.</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Contact_No">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-md btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/tab-content-->

            </div>
            <!--/col-9-->
        </div>
    </div>
    <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

@include('vendor-dash.bottom-links')