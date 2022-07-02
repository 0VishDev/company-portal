<!--<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jquery/dist/jquery.min.js')); ?>"></script>-->
<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/main.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/popper.js/dist/umd/popper.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!--<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/chart.js/dist/Chart.bundle.min.js')); ?>"></script>-->
<!--<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/init-scripts/chart-js/chartjs-init.js')); ?>"></script>-->
<!--<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/dashboard.js')); ?>"></script>-->
<!--<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/widgets.js')); ?>"></script>-->
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jqvmap/dist/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
<script>
        // (function($) {
        //     "use strict";

        //     jQuery('#vmap').vectorMap({
        //         map: 'world_en',
        //         backgroundColor: null,
        //         color: '#ffffff',
        //         hoverOpacity: 0.7,
        //         selectedColor: '#1de9b6',
        //         enableZoom: true,
        //         showTooltip: true,
        //         values: sample_data,
        //         scaleColors: ['#1de9b6', '#03a9f5'],
        //         normalizeFunction: 'polynomial'
        //     });
        // })(jQuery);
</script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jszip/dist/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/init-scripts/data-table/datatables-init.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">

    $("textarea").each(function(){
        CKEDITOR.replace( this );
    });

    // CKEDITOR.replace( 'summary-ckeditor' );
    
    $('#country').change(function () {
        var countryId = $(this).val();
        $('#state').empty();
        $('#city').empty();
    
        var base_path = $('#base_path').val();
        $.ajax({
          type:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: base_path+'/states/get',
          data : {'country_id': countryId},
          success:function(data){
            if(data.states.length > 0){
              $.each(data.states, function( k, v ) {
                var option = '<option value="'+v.id+'">'+v.state_name+'</option>';
                $('#state').append(option);
              });
            }
    
            if(data.cities.length > 0){
              $.each(data.cities, function( k, v ) {
                var option = '<option value="'+v.id+'">'+v.city_name+'</option>';
                $('#city').append(option);
              });
            }
          }
        });
    });
    
    $('#state').change(function () {
        var stateId = $(this).val();
        $('#city').empty();
    
        var base_path = $('#base_path').val();
        $.ajax({
          type:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: base_path+'/cities/get',
          data : {'state_id': stateId},
          success:function(data){
            if(data.cities.length > 0){
              $.each(data.cities, function( k, v ) {
                var option = '<option value="'+v.id+'">'+v.city_name+'</option>';
                $('#city').append(option);
              });
            }
          }
        });
    });
    
    
    $( "body" ).on( "click", "[data-vr-trust-edit]", function() {
        var userId = $(this).attr('user-id');
        var icon = $(this).attr('vr-icon');
        var docs = $(this).attr('vr-docs');
        
        if(icon.length > 0){ $('#vr_trust_icon_display').show(); $('#vr_trust_icon_display').find('img').attr('src', icon);  } else { $('#vr_trust_icon_display').hide(); $('#vr_trust_icon_display').find('img').attr('src', ''); }
        if(docs.length > 0){ $('#vr_trust_docs_display').show(); $('#vr_trust_docs_display').find('a').attr('href', docs);  } else { $('#vr_trust_docs_display').hide(); $('#vr_trust_docs_display').find('a').attr('href', ''); }
        
        $('#vr_trust_user_id').val(userId);
        
        $('#vrTrustModal').modal('show');
    });
    
    $( "body" ).on( "click", "[data-vr-trust-delete]", function() {
        var userId = $('#vr_trust_user_id').val();
        var type = $(this).attr('file-type');
        
        if(confirm('Are you sure you want to delete?')){
            var base_path = $('#base_path').val();
            $.ajax({
              type:"POST",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: base_path+'/admin/vr-trust/icon/delete',
              data : {'user_id': userId, 'type' : type},
              success:function(data){
                  if(type == 'icon'){
                      $('#vr_trust_icon_display').hide(); $('#vr_trust_icon_display').find('img').attr('src', '');
                      $('#vr_trust_icon_html_'+userId).empty().html('-');
                  }
                  
                  if(type == 'docs'){
                      $('#vr_trust_docs_display').hide(); $('#vr_trust_docs_display').find('a').attr('href', '');
                      $('#vr_trust_docs_html_'+userId).empty().html('-');
                  }
              }
            });   
        }
    });
    
    $(document).ready(function () {
       
		var options = {
		
		offset:              {x:5, y:-2},
		position:            {x:'left', y:'center'},
        themes: {
            'red': {
                 showClose: true
            },
		
        }
    };
    
    $('#item_form').bValidator(options);
	$('#profile_form').bValidator(options);
	$('#comment_form').bValidator(options);
	$('#support_form').bValidator(options);
	$('#order_form').bValidator(options);
	$('#checkout_form').bValidator(options);
	$('#setting_form').bValidator(options);
	$('#category_form').bValidator(options);
    });
	$(function () {
	     
        $("#product_allow_seo").change(function () {
            if ($(this).val() == "1") {
                $("#ifseo").show();
            } else {
                $("#ifseo").hide();
            }
        });
		
		$("#flash_deals").change(function () {
            if ($(this).val() == "1") {
                $("#ifdeal").show();
            } else {
                $("#ifdeal").hide();
            }
        });
		
		$("#post_media_type").change(function () {
            if ($(this).val() == "image") 
			{
                $("#ifImage").show();
				$("#ifVideo").hide();
            } 
			else if($(this).val() == "video")
			{
			   $("#ifImage").hide();
			   $("#ifVideo").show();
			}
			else 
			{
                $("#ifImage").hide();
				$("#ifVideo").hide();
            }
        });
		
    });
	$(function () {
	    
        $("#product_type").change(function () {
            if ($(this).val() == "physical") 
			{
                $("#ifphysical_external").show();
				$("#ifphysical").show();
				$("#ifdigital").hide();
				$("#ifexternal").hide();
            } 
			else if($(this).val() == "external") 
			{
                 $("#ifphysical_external").show();
				 $("#ifphysical").hide();
				 $("#ifdigital").hide();
				 $("#ifexternal").show();
            }
			else if($(this).val() == "digital")
			{
			   $("#ifphysical_external").hide();
			   $("#ifphysical").hide();
			   $("#ifdigital").show();
			   $("#ifexternal").hide();
			}
			else
			{
			   $("#ifphysical_external").hide();
			   $("#ifphysical").hide();
			   $("#ifdigital").hide();
			   $("#ifexternal").hide();
			}
        });
    });
</script>
<script src="<?php echo e(URL::to('resources/views/template/validate/jquery.bvalidator.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/validate/themes/presenters/default.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/template/validate/themes/red/red.js')); ?>"></script>
<link href="<?php echo e(URL::to('resources/views/template/validate/themes/red/red.css')); ?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui-timepicker-addon.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#flash_deal_start_date").datetimepicker({
    timeFormat: "hh:mm tt", minDate: 0, dateFormat: 'yy-mm-dd',
    onSelect: function (selected) {
      var dt = new Date(selected);
      dt.setDate(dt.getDate() + 1);
 $("#flash_deal_end_date").datetimepicker("option", "minDate", dt);
}                                 
});
  $("#flash_deal_end_date").datetimepicker({
    timeFormat: "hh:mm tt", minDate: 0, dateFormat: 'yy-mm-dd',
    onSelect: function (selected) {
      var dt1 = new Date(selected);
      dt1.setDate(dt1.getDate() - 1);
      $("#flash_deal_start_date").datetimepicker("option", "maxDate", dt1);
    }
  });
});

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
    
    $('[data-download-b2b-metter-sheet]').click(function (){ 
        var sheet = $.parseJSON($(this).attr('sheet'));
        
        var table = '<tr><th>Company Name</th><th>Contact Person Name</th><th>Mobile Number</th><th>Email</th><th>Address</th><th>Nature Of Business</th><th>No. Of  Production Unit</th><th>Monthly Production Capacity</th><th>Export Market</th><th>Import Market</th><th>Some Major Clients</th><th>No. Of Designers</th><th>No. Of Engineers</th><th>Capital In Dollars / INR</th><th>Export Percentage</th><th>Import Percentage</th><th>GST No</th><th>Pan No</th><th>Warehousing Facility</th><th>Annual Turnover</th><th>Import / Export Code</th><th>Year Of Establishment</th><th>No. Of Employees</th><th>Keywords</th><th>Products Manufacturing</th><th>Products Exporting</th><th>Products Importing</th><th>Products Supplying</th><th>Raw Material Used</th><th>Applications Of Products</th><th>Quality Checking Process</th><th>Product Specialization</th><th>Customized Products</th><th>Minimum Order Quantity</th><th>Maximum Supply Capacity</th><th>Price Range</th><th>Sample Policy</th><th>Payment Terms</th><th>Target Location</th><th>Main Products</th><th>Package Name</th><th>Package Details</th><th>Company History</th><th>Company Branches</th></tr>';

        var htmls = "";
        var uri = 'data:application/vnd.ms-excel;charset=UTF-8;base64,'
        var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'; 
        var base64 = function(s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        };

        var format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
                return c[p];
            })
        };

        table = table+'<tr><td>'+sheet.company_name+'</td><td>'+sheet.contact_name+'</td><td>'+sheet.mobile+'</td><td>'+sheet.email+'</td><td>'+sheet.address+'</td><td>'+sheet.nature_of_address+'</td><td>'+sheet.production_unit+'</td><td>'+sheet.production_capacity+'</td><td>'+sheet.export_market+'</td><td>'+sheet.import_market+'</td><td>'+sheet.major_clients+'</td><td>'+sheet.no_of_designers+'</td><td>'+sheet.no_of_engineers+'</td><td>'+sheet.capital_amount+'</td><td>'+sheet.export_percentage+'</td><td>'+sheet.import_percentage+'</td><td>'+sheet.gst_no+'</td><td>'+sheet.pan_no+'</td><td>'+sheet.warehousing_facility+'</td><td>'+sheet.annual_turnover+'</td><td>'+sheet.import_export_code+'</td><td>'+sheet.year_of_establishment+'</td><td>'+sheet.no_of_employees+'</td><td>'+sheet.keywords+'</td><td>'+sheet.products_manufacturing+'</td><td>'+sheet.products_exporting+'</td><td>'+sheet.products_importing+'</td><td>'+sheet.products_supplying+'</td><td>'+sheet.raw_material_used+'</td><td>'+sheet.applications_of_products+'</td><td>'+sheet.quality_checking_process+'</td><td>'+sheet.product_specialization+'</td><td>'+sheet.customized_products+'</td><td>'+sheet.minimum_order_quantity+'</td><td>'+sheet.maximum_supply_capacity+'</td><td>'+sheet.price_range+'</td><td>'+sheet.sample_policy+'</td><td>'+sheet.payment_terms+'</td><td>'+sheet.target_location+'</td><td>'+sheet.main_products+'</td><td>'+sheet.package_name+'</td><td>'+sheet.package_details+'</td><td>'+sheet.company_history+'</td><td>'+sheet.company_branches+'</td></tr>';
           
        htmls = table;

        var ctx = {
            worksheet : 'Worksheet',
            table : htmls
        }

        var link = document.createElement("a");
        link.download = "B2BSheet.xls";
        link.href = uri + base64(format(template, ctx));
        link.click();
    });
    
    $('[data-download-distributorship-metter-sheet]').click(function (){ 
        var sheet = $.parseJSON($(this).attr('sheet'));
        var base_path = '<?php echo e(url('/')); ?>';
        
        var table = '<tr><th>Company Name</th><th>Contact Person Name</th><th>Designation</th><th>Email</th><th>Mobile Number</th><th>Alternet Mobile Number</th><th>Company Address</th><th>City</th><th>State</th><th>Pin Code</th><th>Country</th><th>Website URL</th><th>Company Logo</th><th>Establishment Year</th><th>Company Annual Sale</th><th>Brand Name</th><th>No. of Targeted Distributors</th><th>Required Space (Sq. Ft.)</th><th>Investment / Security(Amount)</th><th>Describe Your Company Details</th><th>Where you want to Appoint?</th><th>Distributors Experience</th><th>Describe Benefits for become distributors of Your Company?</th><th>Package Title</th><th>Package Duration</th><th>Package Price</th><th>Category(s) Subscribed</th><th>Payment Mode</th></tr>';

        var htmls = "";
        var uri = 'data:application/vnd.ms-excel;charset=UTF-8;base64,'
        var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'; 
        var base64 = function(s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        };
        
        var format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
                return c[p];
            })
        };
        
        table = table+'<tr><td>'+sheet.company_name+'</td><td>'+sheet.contact_name+'</td><td>'+sheet.designation+'</td><td>'+sheet.email+'</td><td>'+sheet.mobile+'</td><td>'+sheet.mobile2+'</td><td>'+sheet.company_address+'</td><td>'+sheet.city_id+'</td><td>'+sheet.state_id+'</td><td>'+sheet.pincode+'</td><td>'+sheet.country_id+'</td><td>'+sheet.website_url+'</td><td>'+(sheet.company_logo != null ? base_path+'/public/storage/company/'+sheet.company_logo : '')+'</td><td>'+sheet.establishment_year+'</td><td>'+sheet.company_annual_sale+'</td><td>'+sheet.brand_name+'</td><td>'+sheet.no_of_targeted_distributors+'</td><td>'+sheet.required_space+'</td><td>'+sheet.investment_amount+'</td><td>'+sheet.company_detail+'</td><td>'+sheet.where_appointment+'</td><td>'+sheet.distributors_experience+'</td><td>'+sheet.benefits_of_distributors+'</td><td>'+sheet.package_title+'</td><td>'+sheet.package_duration+'</td><td>'+sheet.package_price+'</td><td>'+sheet.category_subscribed+'</td><td>'+sheet.payment_mode+'</td></tr>';
                 
        table = table+'<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        table = table+'<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        table = table+'<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        
        if(sheet.products.length > 0){
            table = table+'<tr><th>S.No.</th><th>Category</th><th>Products Name</th><th>Product USP</th><th>Product Image</th></tr>';
            
            $.each(sheet.products, function (k, v){
                table = table+'<tr><td>'+(k+1)+'</td><td>'+v.category_name+'</td><td>'+v.product_name+'</td><td>'+v.product_usp+'</td><td>'+(v.product_image != null ? base_path+'/public/storage/distributorships/'+v.product_image : '')+'</td></tr>';
            });
        }
        
        htmls = table;

        var ctx = {
            worksheet : 'Worksheet',
            table : htmls
        }

        var link = document.createElement("a");
        link.download = "DistributorshipSheet.xls";
        link.href = uri + base64(format(template, ctx));
        link.click();
    });
});


    $('#deliverystatus_company_name').change(function (){
        var vendorDetail = $('#deliverystatus_company_name option:selected').attr('vendor');
        
        $('#deliverystatus_user_id').val('');
        $('#executive_name').val('');
        $('#customer_name').val('');
        $('#address').val('');
        $('#mobile').val('');
        $('#email').val('');
        $('#gst_no').val('');
        $('#package_name').val('');    
        
        if(vendorDetail.length > 0){
            var vendor = $.parseJSON(vendorDetail);
            var serviceProviderDetail = $('#deliverystatus_company_name option:selected').attr('serviceProvider');
        
            $('#deliverystatus_user_id').val(vendor.id);
            $('#executive_name').val(vendor.account_manager_name);
            $('#customer_name').val(vendor.name);
            $('#address').val((vendor.business_address != null ? vendor.business_address : vendor.user_address));
            $('#mobile').val(vendor.mobile);
            $('#email').val(vendor.email);
            $('#gst_no').val(vendor.gst_no);
            
            if(serviceProviderDetail.length > 0){
                var serviceProvider = $.parseJSON(serviceProviderDetail);
                
                $('#package_name').val(serviceProvider.provider_name); 
            }
        }
    });

</script><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/admin/javascript.blade.php ENDPATH**/ ?>