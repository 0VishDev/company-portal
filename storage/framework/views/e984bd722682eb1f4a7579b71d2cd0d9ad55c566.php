<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>B2B Matter Sheet</title>

    <!-- Global Stylesheets -->
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
                        <h1>B2B Profile Sheet</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(url('b2b-profile/detail/add')); ?>" method="POST" enctype="multipart/form-data" id="b2bProfileForm">
                            <?php echo csrf_field(); ?>
                            
                            <div class="register-right mb-3">
                                <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Kindly Read all Details carefully & Fill that for Create Your Website.</h2>
                                    </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control shadow" id="company_name" name="company_name" value=""/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Contact Person Name</label>
                                            <input type="text" class="form-control shadow" id="contact_name" name="contact_name" value="" required/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control shadow" id="mobile" name="mobile" value="" required/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Email id</label>
                                            <input type="email" class="form-control shadow" id="email" name="email" value="" required/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control shadow" id="address" name="address" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Nature Of Business</label>
                                            <input type="text" class="form-control shadow" id="nature_of_address" name="nature_of_address" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>No. Of  Production Unit</label>
                                            <input type="number" class="form-control shadow" id="production_unit" name="production_unit" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Monthly Production Capacity</label>
                                            <input type="text" class="form-control shadow"  id="production_capacity" name="production_capacity" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Export Market</label>
                                            <input type="text" class="form-control shadow" id="export_market" name="export_market" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Import Market</label>
                                            <input type="text" class="form-control shadow" id="import_market" name="import_market" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Some Major Clients</label>
                                            <input type="text" class="form-control shadow" id="major_clients" name="major_clients" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>No. Of Designers</label>
                                            <input type="number" class="form-control shadow" id="no_of_designers" name="no_of_designers" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>No. Of Engineers</label>
                                            <input type="number" class="form-control shadow" id="no_of_engineers" name="no_of_engineers" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Capital In Dollars / INR</label>
                                            <input type="text" class="form-control shadow" id="capital_amount" name="capital_amount" value="" />
                                        </div>


                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Export Percentage</label>
                                            <input type="text" class="form-control shadow" id="export_percentage" name="export_percentage" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Import Percentage</label>
                                            <input type="text" class="form-control shadow" id="import_percentage" name="import_percentage" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>GST No.</label>
                                            <input type="text" class="form-control shadow" id="gst_no" name="gst_no" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Pan No.</label>
                                            <input type="text" class="form-control shadow" id="pan_no" name="pan_no" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Warehousing Facility</label>
                                            <input type="text" class="form-control shadow" id="warehousing_facility" name="warehousing_facility" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Annual Turnover</label>
                                            <input type="text" class="form-control shadow" id="annual_turnover" name="annual_turnover" value="" />
                                        </div>
                                        
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Import / Export Code</label>
                                            <input type="text" class="form-control shadow" id="import_export_code" name="import_export_code" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Year Of Establishment</label>
                                            <input type="text" class="form-control shadow" id="year_of_establishment" name="year_of_establishment" value="" />
                                        </div>


                                    <div class="col-sm-6 form-group mb-3">
                                            <label>No. Of Employees</label>
                                            <input type="text" class="form-control shadow" id="no_of_employees" name="no_of_employees" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Keywords</label>
                                            <input type="text" class="form-control shadow" id="keywords" name="keywords" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Products Manufacturing</label>
                                            <input type="text" class="form-control shadow" id="products_manufacturing" name="products_manufacturing" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Products Exporting</label>
                                            <input type="text" class="form-control shadow" id="products_exporting" name="products_exporting" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Products Importing</label>
                                            <input type="text" class="form-control shadow" id="products_importing" name="products_importing" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Products Supplying</label>
                                            <input type="text" class="form-control shadow" id="products_supplying" name="products_supplying" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Raw Material Used</label>
                                            <input type="text" class="form-control shadow" id="raw_material_used" name="raw_material_used" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Applications Of Products</label>
                                            <input type="text" class="form-control shadow" id="applications_of_products" name="applications_of_products" value="" />
                                        </div>


                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Quality Checking Process</label>
                                            <input type="text" class="form-control shadow" id="quality_checking_process" name="quality_checking_process" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Product Specialization</label>
                                            <input type="text" class="form-control shadow" id="product_specialization" name="product_specialization" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Customized Products</label>
                                            <input type="text" class="form-control shadow" id="customized_products" name="customized_products" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Minimum Order Quantity</label>
                                            <input type="text" class="form-control shadow" id="minimum_order_quantity" name="minimum_order_quantity" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Maximum Supply Capacity</label>
                                            <input type="text" class="form-control shadow" id="maximum_supply_capacity" name="maximum_supply_capacity" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Price Range ( With Product Name)</label>
                                            <input type="text" class="form-control shadow" id="price_range" name="price_range" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Sample Policy</label>
                                            <input type="text" class="form-control shadow" id="sample_policy" name="sample_policy" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Payment Terms</label>
                                            <input type="text" class="form-control shadow" id="payment_terms" name="payment_terms" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Target Location</label>
                                            <input type="text" class="form-control shadow" id="target_location" name="target_location" value="" />
                                        </div>


                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Main Products</label>
                                            <input type="text" class="form-control shadow" id="main_products" name="main_products" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Package Name(Offered By Business World Trade)</label>
                                            <input type="text" class="form-control shadow" id="package_name" name="package_name" value="" />
                                        </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Package Details </label>
                                            <input type="text" class="form-control shadow" id="package_details" name="package_details" value="" />
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company History</label>
                                            <textarea class="form-control shadow" rows="4" id="company_history" name="company_history"></textarea>
                                        </div>

                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Branches</label>
                                            <input type="text" class="form-control shadow" id="company_branches" name="company_branches" accept="image/*"/>
                                            
                                            <input type="submit" class="btn mt-4 ml-5 btn-md btn-success" value="Submit" />
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
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/profilesheet/b2b.blade.php ENDPATH**/ ?>