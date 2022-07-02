@include('vendor-dash.left-panel')


	<div class="container ven-dash">				 
				 <div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
					 <form class="form" action="##" method="post">
           <div class="row">
  		<div class="col-sm-6">
			<div class="form-group col-sm-12">
      <div class=" contact">
		  <label for="file" class="control-label mb-1"><h4>Select Product Image</h4></label><br>
        <img src="/public/img/camera.png" class="ava1 img-thumbnail prod-img1" alt="avatar" data-target="#add-imgs" data-toggle="modal">
      </div>
			</div>
			<div class="form-group col-sm-12">
				<label for="file" class="control-label mb-1"><h4>Upload Gallery Images</h4></label><br>
  <label class="btn btn-danger mb-2" data-target="#add-imgs" data-toggle="modal">select Image</label>
    <br>
    <div class="item-img">
        <img src="https://www.venicered.com/public/storage/product/EiX6L-074336-Ycj.jpg" alt="EiX6L-074336-Ycj.jpg" class="item-thumb" />
        <a href="#" onclick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
    </div>
    <div class="item-img">
        <img src="https://www.venicered.com/public/storage/product/KoXe2-074336-Qy1.jpg" alt="KoXe2-074336-Qy1.jpg" class="item-thumb" />
        <a href="#" onclick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
    </div>
    <div class="item-img">
        <img src="https://www.venicered.com/public/storage/product/dsP8e-074336-25F.jpg" alt="dsP8e-074336-25F.jpg" class="item-thumb" />
        <a href="#" onclick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
    </div>
    <div class="item-img">
        <img src="https://www.venicered.com/public/storage/product/vIDEL-074336-X9i.jpg" alt="vIDEL-074336-X9i.jpg" class="item-thumb" />
        <a href="#" onclick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
    </div>
    <div class="clearfix"></div>
</div>

			<div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="Featured"><h4>Packaging Type</h4></label>
                              <input type="text" class="form-control">
                          </div>
                       </div>
			<div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="brand"><h4>Brand</h4></label>
                              <select class="form-control">
							  <option></option>
							  <option>Brand 1</option>
							  <option>Brand 2</option>
							  </select>
                          </div>
                      </div>
			<div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="unit"><h4>Unit</h4></label>
                              <select class="form-control">
							  <option></option>
							  <option>10 ml</option>
							  <option>1 kg</option>
							  </select>
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="status"><h4>Status</h4></label>
                              <select class="form-control">
							  <option></option>
							  <option>Active</option>
							  <option>Inactive</option>
							  </select>
                          </div>
                      </div>
        </div><!--/col-3-->
    	<div class="col-sm-6">
    	    <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="vendor_name"><h4>Vendor Name</h4></label>
                              <input type="text" class="form-control" name="vendor_name" id="vendor_name">
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                          <div class="">
                              <label for="pro_name"><h4>Product Name</h4></label>
                              <input type="text" class="form-control" name="fpro_name" id="pro_name">
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="Price"><h4>Price</h4></label>
                              <input type="text" class="form-control" name="Price" id="Price">
                          </div>
                      </div>
			<div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="Categories"><h4>Categories</h4></label>
                              <select class="form-control">
							  <option></option>
							  <option>Agriculture</option>
							  <option>Food & Beverage</option>
							  </select>
                          </div>
                      </div>
			
			<div class="form-group col-sm-12">                          
                          <div class="">
                              <label for="Product_Type"><h4>Product Type</h4></label>
                              <select class="form-control">
							  <option></option>
							  <option>physical</option>
							  <option>digital</option>
							  <option>external</option>
							  </select>
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="pro-descrip"><h4>Short Description</h4></label>
                              <textarea class="form-control" rows="5" data-bvalidator="required,maxlen[550]"></textarea>
                          </div>
                      </div>
					  <div class="form-group col-sm-12">
                          
                          <div class="">
                            <label for="pro-descrip"><h4>Full Description</h4></label>
                              <textarea class="form-control" rows="5"></textarea>
                          </div>
                      </div>
                      <div class="form-group col-sm-12">
                           <div class="">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"> Update</button>
                               	
                            </div>
                      </div>
              
          </div><!--/tab-content-->

        </div>
					 </form>
</div>
    </div>



	<div class="modal fade show" id="add-imgs" aria-modal="true">
		<div class="modal-dialog modal-xxl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="mb-0">Add Photos</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row flex">
						<div class="col-lg-12 col-sm-12 text-center">
							<button type="button" class="btn btn-info">+ Upload Photos from Computer</button>
						</div>
						<div class="col-lg-12 col-sm-12 mb-2">
							Add from Photos and Docs
						</div>
					</div>
					<div class="over">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img
										src="https://5.imimg.com/data5/QW/ZS/ER/ANDROID-86185690/prod-20200311-1410545957213698768852928-jpg-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img
										src="https://5.imimg.com/data5/XU/TZ/GI/ANDROID-86185690/prod-20200311-1409447290857095243608948-jpg-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img
										src="https://5.imimg.com/data5/BI/CR/CZ/ANDROID-86185690/prod-20200311-1407001782720590178745550-jpg-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img
										src="https://5.imimg.com/data5/ZE/XW/ZF/SELLER-86185690/rayon-kurti-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img src="https://5.imimg.com/data5/KM/NV/KS/SELLER-86185690/shirt-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img src="https://5.imimg.com/data5/WD/GX/CR/SELLER-86185690/kurti-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img
										src="https://5.imimg.com/data5/MC/QD/WT/SELLER-86185690/reyon-kurti-250x250.jpg">
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-2 text-center">
								<div class="thumbnail mod-img">
									<img
										src="https://5.imimg.com/data5/FR/KJ/LL/SELLER-86185690/cottan-kurti-250x250.jpg">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer1">
					<div class="row">
						<div class="col-sm-6">
							<p>0 out of 8 images selected</p>
						</div>
						<div class="col-sm-6">
							<button type="button" class="btn btn-primary float-right">Add Selected</button>
							<button type="button" class="btn btn-secondary float-right mr-2"
								data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@include('vendor-dash.bottom-links')