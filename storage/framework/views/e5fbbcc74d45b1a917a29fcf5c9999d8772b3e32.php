<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment Sheet</title>

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
    <body style="background-image: radial-gradient(circle, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
    <div class="container">
                <div class="row">
                    <div class="col-md-12 register-left">
                        <?php if($allsettings->site_logo != ''): ?>
    	<img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="logo">
    	<?php endif; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                    <div class="top-heading">
                        <h1>Payment Sheet</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(url('paymentsheet/detail/add')); ?>" method="POST" enctype="multipart/form-data" id="paymentsheet">
                            <?php echo csrf_field(); ?>
                            
                            <input type="hidden" id="paymentsheet_user_id" name="user_id">
                            
                            <div class="register-right mb-3 pl-3 pr-3 shadow">
                                <div class="row register-form">
                                    <div class="col-md-12 text-center mb-2">
                                    <h2>Kindly Read all Details Carefully.</h2>
                                    </div>
                                    <div class="col-sm-6 form-group mb-3">
                                            <label>Manager Name</label>
                                            <input type="text" class="form-control shadow" id="manager_name" name="manager_name" value=""/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Executive Name</label>
                                            <input type="text" class="form-control shadow" id="executive_name" name="executive_name" value=""/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Company Name</label>
                                            <select class="form-control shadow" id="payment_company_name" name="company_name" required>
                                                <option value="">- Please select -</option>
                                                <?php $__currentLoopData = $vendorsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $serviceProvider = \ZigKart\Helpers::getPackage($vendor->id); ?>
                                                    <option value="<?php echo e($vendor->company_name); ?>" vendor="<?php echo e($vendor); ?>" serviceProvider="<?php echo e((!empty($serviceProvider) ? $serviceProvider : '')); ?>"><?php echo e($vendor->company_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Customer Name</label>
                                            <input type="text" class="form-control shadow" id="customer_name" name="customer_name" value="" required readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control shadow" id="mobile" name="mobile" value="" required readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Email id</label>
                                            <input type="email" class="form-control shadow" id="email" name="email" value="" required readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control shadow" id="address" name="address" value=""  readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>GST No</label>
                                            <input type="text" class="form-control shadow" id="gst_no" name="gst_no" value=""  readonly/>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Contract Amount</label>
                                            <input type="text" class="form-control shadow" id="contract_amount" name="contract_amount" value="" />
                                        </div>
                                         <div class="col-sm-6 form-group mb-3">
                                            <label>Payment Type</label>
                                            <select class="form-control shadow" id="payment_type" name="payment_type">
                                            <option value=""></option>
                                            <option value="Fresh">Fresh</option>
                                            <option value="Balance">Balance</option>
                                            <option value="Upgrade">Upgrade</option>
                                            <option value="Upgrade Balance">Upgrade Balance</option>
                                        </select>
                                        </div>
                                        <div class="col-sm-12 form-group mb-3">
                                            <table id="payment-list" class="table table-striped payment-list table-responsive">
                                            <thead>
                                                <tr style="background-color: #ff1d25; color: #fff;">
                                                    <th>S.No.</th>
                                                    <th>Sale Date</th>
                                                    <th>Received Amount</th>
                                                    <th>Balance Amount</th>
                                                    <th>Mode Of Payment</th>
                                                    <th>Transaction No</th>
                                                    <th>Tansaction Slip</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input type="date" class="form-control" name="payment[0][sale_date]">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="payment[0][received_amount]" value="">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="payment[0][balance_amount]" value="">
                                                    </td>
                                                    <td>
                                                    <select class="form-control" id="mode_Of_payment" name="payment[0][mode_of_payment]">
                                                        <option value=""></option>
                                                        <option value="Online">Online</option>
                                                        <option value="NEFT">NEFT</option>
                                                        <option value="RTGS">RTGS</option>
                                                        <option value="Chaeque">Cheque</option>
                                                        <option value="Cash Deposit">Cash Deposit</option>
                                                    </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="payment[0][transaction_no]">
                                                    </td>
                                                    <td>
                                                        <div class="fileUpload">
                                                            <input type="file" class="upload"  name="payment[0][attachment]"/><span>Upload Slip</span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="8" style="text-align: left;">
                                                        <input type="button" class="btn btn-lg btn-block btn-info" id="addpayment" value="Add More Payment" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label>Package Name</label>
                                            <select class="form-control shadow" id="package_name" name="package_name">
                                                <option value="">- Please select -</option>
                                                <?php $__currentLoopData = $serviceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceProvider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($serviceProvider->provider_name); ?>"><?php echo e($serviceProvider->provider_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label class="mt-3">Package Duration</label>
                                            <input type="text" class="form-control shadow" id="Package-Duration" name="package_duration" value="" />
                                            <label class="mt-3">Domain Duration</label>
                                            <input type="text" class="form-control shadow" id="domain-Duration" name="domain_duration" value="" />
                                            <label class="mt-3">Call Recording</label>
                                            <input type="file" class="form-control shadow" id="call" name="call" value="" />
                                        </div> 
            					        <div class="form-group col-sm-6 mb-3">
            						<label class="control-label">Detail of Services:</label><br>
            						<ul>
            						      <li><input type="checkbox" id="srWebsite" name="detail_services[]" value="Website">
                                          <label for="srWebsite"> Website</label></li>
            						      <li><input type="checkbox" id="srDomain" name="detail_services[]" value="Domain">
                                          <label for="srDomain"> Domain</label></li>
            						      <li><input type="checkbox" id="srLanguage-Converter" name="detail_services[]" value="Language Converter">
                                          <label for="srLanguage-Converter"> Language Converter</label></li>
                                          <li><input type="checkbox" id="Leads" name="detail_services[]" value="Leads">
                                          <label for="Leads"> Leads</label></li>
                                          <li><input type="checkbox" id="srMobile-Version" name="detail_services[]" value="Mobile Version">
                                          <label for="srMobile-Version"> Mobile Version</label></li>
                                          <li><input type="checkbox" id="srlogistic-Quotation" name="detail_services[]" value="logistic Quotation">
                                          <label for="srlogistic-Quotation"> logistic Quotation</label></li>
                                         <li> <li><input type="checkbox" id="srFavicon" name="detail_services[]" value="Favicon">
                                          <label for="srFavicon"> Favicon</label></li>
                                          <li><input type="checkbox" id="srVR-Trust" name="detail_services[]" value="VR Trust">
                                          <label for="srVR-Trust"> VR Trust</label></li>
                                          <li><input type="checkbox" id="srGoogle-Ad" name="detail_services[]" value="Google Ad">
                                          <label for="srGoogle-Ad"> Google Ad</label></li>
                                          <li><input type="checkbox" id="srOn-Page-SEO" name="detail_services[]" value="On Page SEO">
                                          <label for="srOn-Page-SEO"> On Page SEO</label></li>
                                          <li><input type="checkbox" id="srSSl-Certificate" name="detail_services[]" value="SSl Certificate">
                                          <label for="srSSl-Certificate"> SSl Certificate</label></li>
                                          <li><input type="checkbox" id="srSponsored-Banner-onkey" name="detail_services[]" value="Sponsored Banner(Onkey)">
                                          <label for="srSponsored-Banner-onkey"> Sponsored Banner(Onkey)</label></li>
                                          <li><input type="checkbox" id="srSponsored-Banner-onCategory" name="detail_services[]" value="Sponsored Banner(OnCategory)">
                                          <label for="srSponsored-Banner-onCategory"> Sponsored Banner(OnCategory)</label></li>
                                          <li><input type="checkbox" id="srOff-Page-SEO" name="detail_services[]" value="Off Page SEO">
                                          <label for="srOff-Page-SEO"> Off Page SEO</label></li>
                                          <li><input type="checkbox" id="Catogery-Banner" name="detail_services[]" value="Catogery Banner">
                                          <label for="Catogery-Banner"> Catogery Banner</label></li>
                                          <li><input type="checkbox" id="srExport-Bill-Discounting" name="detail_services[]" value="Export Bill Discounting">
                                          <label for="srExport-Bill-Discounting"> Export Bill Discounting</label></li>
                                          <li><input type="checkbox" id="Social media campaing" name="detail_services[]" value="Social media campaing">
                                          <label for="Social media campaing"> Social media campaing</label></li>
                                          </ul>
            					  </div>
                                        <div class="col-sm-12 form-group mb-3 text-center">
                                            <input type="submit" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                            </div> 
                    </form>
                </div>
                    </div>
        
        <div class="footer">
        <div class="row">
        <div class="col-sm-12">
            <h2>Infobiz World Trade PVT. LTD.</h2>
            <p><?php echo $allsettings->office_address; ?></p>
            </div>
        </div>
            </div>
            </div>
        
        
        <style>
ul li {
    display: inline-block;
    margin-right: 15px;
}
ul{
    margin: 0;
    padding: 0;
}
</style>
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
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/paymentsheet.blade.php ENDPATH**/ ?>