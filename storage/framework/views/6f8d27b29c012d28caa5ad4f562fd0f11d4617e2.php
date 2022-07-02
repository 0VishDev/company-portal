<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Distributorship Matter Sheet</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/resources/views/template/mettersheets/font-awesome-4.7.0/css/font-awesome.min.css">
      <link href="<?php echo e(url('/')); ?>/resources/views/template/mettersheets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/resources/views/template/mettersheets/css/style.css">
    <?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/notifyme.css')); ?>">

  </head>
    <body>
    <div class="container register">
                <div class="row">
                    <div class="col-md-12 register-left">
                            <?php if($allsettings->site_logo != ''): ?>
    	<img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="logo">
    	<?php endif; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                    <div class="top-heading">
                        <h1>Distributorship Profile Sheet</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(url('distributorship/profile/add')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="register-right mb-3">
                                <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Company Contact Information</h2>
                                    </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control shadow" id="company_name" name="company_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Contact Person Name</label>
                                            <input type="text" class="form-control shadow" id="contact_name" name="contact_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Designation</label>
                                            <input type="text" class="form-control shadow" id="designation" name="designation" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Email id</label>
                                            <input type="email" class="form-control shadow" id="email" name="email" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control shadow" id="mobile" name="mobile" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Alternet Mobile Number</label>
                                            <input type="number" class="form-control shadow" id="mobile2" name="mobile2" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Address</label>
                                            <input type="text" class="form-control shadow" id="company_address" name="company_address" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>City</label>
                                            <input type="text" class="form-control shadow"  id="city_id" name="city_id" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>State</label>
                                            <input type="text" class="form-control shadow" id="state_id" name="state_id" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Pin Code</label>
                                            <input type="number" class="form-control shadow" id="pincode" name="pincode" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Country</label>
                                            <input type="text" class="form-control shadow" id="country_id" name="country_id" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Website URL</label>
                                            <input type="url" class="form-control shadow" id="website_url" name="website_url" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Logo</label>
                                            <input type="file" class="form-control shadow" id="company_logo" name="company_logo" value="" />
                                        </div>
                                </div>
                            </div>
                            <div class="register-right mb-3">
                             <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Distributorship Criteria</h2>
                                    </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Establishment Year</label>
                                            <input type="number" class="form-control shadow" id="establishment_year" name="establishment_year" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Annual Sale</label>
                                            <input type="text" class="form-control shadow" id="company_annual_sale" name="company_annual_sale" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Brand Name</label>
                                            <input type="text" class="form-control shadow" id="brand_name" name="brand_name" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>No. of Targeted Distributors </label>
                                            <input type="text" class="form-control shadow" id="no_of_targeted_distributors" name="no_of_targeted_distributors" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Required Space (Sq. Ft.)</label>
                                            <input type="text" class="form-control shadow" id="required_space" name="required_space" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Investment / Security(Amount) required to become a distributor</label>
                                            <input type="text" class="form-control shadow" id="investment_amount" name="investment_amount" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Describe Your Company Details</label>
                                            <input type="text" class="form-control shadow" id="company_detail" name="company_detail" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Where you want to Appoint?</label>
                                            <select class="form-control shadow" id="where_appointment" name="where_appointment">
                                            <option value="">-- Please select --</option>
                                            <option value="Country Wise">Country Wise</option>
                                            <option value="Country Wise">State Wise</option>
                                            <option value="City Wise">City Wise</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Distributors Experience </label>
                                            <select class="form-control shadow" id="distributors_experience" name="distributors_experience">
                                            <option value="">-- Please select --</option>
                                            <option value="Same industry">Same industry </option>
                                            <option value="Other industry">Other industry</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="register-right mb-3 d-none">
                             <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Product Information</h2>
                                 </div>
                                        <div class="col-sm-12 form-group mb-3">
                                            <table id="myTable" class="table table-striped w-auto order-list">
                                            <thead>
                                                <tr style="background-color: #ff1d25; color: #fff;">
                                                    <th>S.No.</th>
                                                    <th>Category</th>
                                                    <th>Product 1</th>
                                                    <th>Product 2</th>
                                                    <th>Product 3</th>
                                                    <th>Product 4</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="category"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="productname1"/>
                                                        <div class="fileUpload"><input type="file" class="upload"  name="productimg1"/><span>Upload image</span></div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="productname2"/><div class="fileUpload"><input type="file" class="upload"  name="productimg2"/><span>Upload image</span></div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="productname3"/><div class="fileUpload"><input type="file" class="upload"  name="productimg3"/><span>Upload image</span></div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="productname4"/><div class="fileUpload"><input type="file" class="upload"  name="productimg4"/><span>Upload image</span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" style="text-align: left;">
                                                        <input type="button" class="btn btn-lg btn-block btn-info" id="addrow" value="Add More Products" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                </div>  
                            </div>
                            
                                 <div class="register-right mb-3">
                                 <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Product Information</h2>
                                 </div>
                                        <div class="col-sm-12 form-group mb-3">
                                            <table id="myTable" class="table table-striped usp-list">
                                            <thead>
                                                <tr style="background-color: #ff1d25; color: #fff;">
                                                    <th>S.No.</th>
                                                    <th>Category</th>
                                                    <th>Products Name</th>
                                                    <th>Product USP</th>
                                                    <th>Product Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="products[1][category_name]" placeholder="Category Name">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="products[1][product_name]" value="" placeholder="products Name">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="products[1][product_usp]" placeholder="e.g. warranty/ after sales service etc">
                                                    </td>
                                                    <td>
                                                        <div class="fileUpload">
                                                            <input type="file" class="upload"  name="products[1][product_image]"/><span>Upload image</span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" style="text-align: left;">
                                                        <input type="button" class="btn btn-lg btn-block btn-info" id="addusp" value="Add More Categories" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                     </div>
                            </div>
                                     
                                     <div class="register-right mb-3">
                                 <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Describe Benefits for become distributors of Your Company?<br><small>E.g.Mention benefits of getting distributorship, ROI/ Margins, Additional benefits you offering to distributor etc (E.g. Margin - Minimum 15%).</small></h2>
                                 </div>
                                        <div class="col-sm-12 form-group mb-3">
                                            <textarea class="form-control shadow" rows="5" id="benefits_of_distributors" name="benefits_of_distributors"></textarea>
                                        </div>
                                         </div>
                            </div>
                                     
                                     <div class="register-right mb-3">
                                 <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Package Details</h2>
                                 </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Package Title</label>
                                            <input type="text" class="form-control shadow" id="package_title" name="package_title" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Package Duration</label>
                                            <input type="text" class="form-control shadow" id="package_duration" name="package_duration" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Package Price</label>
                                            <input type="text" class="form-control shadow" id="package_price" name="package_price" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Category(s) Subscribed</label>
                                            <input type="text" class="form-control shadow" id="category_subscribed" name="category_subscribed" value="" />
                                        </div>
                                         </div>
                            </div>
                                     
                                     
                                     <div class="register-right mb-3">
                                 <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>You Payment Terms for Distributor </h2>
                                 </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Payment Mode</label><br>
                                            <input type="checkbox" name="payment_mode[]" value="Cheque" id="cheque" > Cheque
                                            <input type="checkbox" name="payment_mode[]" value="Online" id="online" class="ml-4"> Online
                                            <input type="checkbox" name="payment_mode[]" value="Cash" id="cash" class="ml-4"> Cash
                                            <input type="checkbox" name="payment_mode[]" value="RTGS / NEFT" id="RTGS_NEFT" class="ml-4"> RTGS / NEFT
                                        </div>
                                     <div class="col-sm-6 form-group mb-3">
                                     <input type="submit" class="btn btn-md float-right btn-success mt-4" value="Submit">
                                     </div>
                                    </div>
                            </div>
                    </form>
                </div>
                    </div>
        
        <div class="footer">
        <div class="row">
        <div class="col-sm-12">
            <h2>Business World Trade PVT. LTD.</h2>
            <p><?php echo $allsettings->office_address; ?></p>
            </div>
        </div>
            </div>
            </div>
        
        
        
    <script src="<?php echo e(url('/')); ?>/resources/views/template/mettersheets/js/bootstrap.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/resources/views/template/mettersheets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/resources/views/template/mettersheets/js/custom.js"></script> 
    
     <script src="<?php echo e(asset('public/js/notifyme.js')); ?>"></script>

    <script type="text/javascript">
        <?php if(session('success')): ?>
            notifyme.config({
                showtime: 4000,
                position:"topright" // topleft, bottomleft, bottmright
            });
        
            notifyme.create({
                title: "<?php echo e(session('success')); ?>",
    		    text: "",
    		    type: "success"
            });
        <?php endif; ?>
        
        <?php if(session('error')): ?>
            notifyme.config({
                showtime: 4000,
                position:"topright" // topleft, bottomleft, bottmright
            });
            
            notifyme.create({
               title: "<?php echo e(session('error')); ?>",
    		   text: "",
    		   type: "error"
            });
        <?php endif; ?>
    </script>
    </body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/profilesheet/distributorship.blade.php ENDPATH**/ ?>