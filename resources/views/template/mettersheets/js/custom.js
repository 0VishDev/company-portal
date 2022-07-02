/*
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
*/ 

$(document).ready(function () {
    var counter = 2;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td>'+ counter +'</td>';
        cols += '<td><input type="text" class="form-control" name="category' + counter + '"/></td>';
        
        cols += '<td><input type="text" class="form-control" name="productname1-' + counter + '"/><div class="fileUpload"><input type="file" class="upload"  name="productimg1-' + counter + '"/><span>Upload image</span></div></td>';
        
        cols += '<td><input type="text" class="form-control" name="productname2-' + counter + '"/><div class="fileUpload"><input type="file" class="upload"  name="productimg2-' + counter + '"/><span>Upload image</span></div></td>';
        
        cols += '<td><input type="text" class="form-control" name="productname3-' + counter + '"/><div class="fileUpload"><input type="file" class="upload"  name="productimg3-' + counter + '"/><span>Upload image</span></div></td>';
        
        cols += '<td><input type="text" class="form-control" name="productname4-' + counter + '"/><div class="fileUpload"><input type="file" class="upload"  name="productimg4-' + counter + '"/><span>Upload image</span></div></td>';

        cols += '<td><span class="ibtnDel btn btn-md btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></span></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});

/* PRoduct USP */
$(document).ready(function () {
    var counterusp = 2;

    $("#addusp").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td>'+ counterusp +'</td>';
        
        cols += '<td><input type="text" class="form-control" name="products['+counterusp+'][category_name]" placeholder="Category Name"/></td>';
        
        cols += '<td><input type="text" class="form-control" name="products['+counterusp+'][product_name]" placeholder="products Name"></td>';
        
        cols += '<td><input type="text" class="form-control" name="products['+counterusp+'][product_usp]"  placeholder="e.g. warranty/ after sales service etc"/></td>';
        
        cols += '<td><div class="fileUpload"><input type="file" class="upload"  name="products['+counterusp+'][product_image]"/><span>Upload image</span></div></td>';

        cols += '<td><span class="uspDel btn btn-md btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></span></td>';
        newRow.append(cols);
        $("table.usp-list").append(newRow);
        counterusp++;
    });



    $("table.usp-list").on("click", ".uspDel", function (event) {
        $(this).closest("tr").remove();       
        counterusp -= 1
    });


});

  $(function() {
  $('#package_name').change(function(){
    $('.Detail-Services').hide();
    $('#' + $(this).val()).show();
  });
});



/* Payment */
$(document).ready(function () {
    var counterpay = 1;

    $("#addpayment").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td>'+ counterpay +'</td>';
        
        cols += '<td><input type="date" class="form-control" name="payment['+counterpay+'][sale_date]"></td>';
        
        cols += '<td><input type="text" class="form-control" name="payment['+counterpay+'][received_amount]"></td>';
        
        cols += '<td><input type="text" class="form-control" name="payment['+counterpay+'][balance_amount]"/></td>';
        
        cols += '<td><select class="form-control" id="mode_Of_payment" name="payment['+counterpay+'][mode_of_payment]"><option value=""></option><option value="Online">Online</option><option value="NEFT">NEFT</option><option value="RTGS">RTGS</option><option value="Chaeque">Cheque</option><option value="Cash Deposit">Cash Deposit</option></select></td>';
        
        cols += '<td><input type="text" class="form-control" name="payment['+counterpay+'][transaction_no]"/></td>';
        
        cols += '<td><div class="fileUpload"><input type="file" class="upload"  name="payment['+counterpay+'][attachment]"/><span>Upload Slip</span></div></td>';

        cols += '<td><span class="payDel btn btn-md btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></span></td>';
        newRow.append(cols);
        $("table.payment-list").append(newRow);
        counterpay++;
    });



    $("table.payment-list").on("click", ".payDel", function (event) {
        $(this).closest("tr").remove();       
    });
    
    $('#payment_company_name').change(function (){
        var vendorDetail = $('#payment_company_name option:selected').attr('vendor');
        
        $('#paymentsheet_user_id').val('');
        $('#executive_name').val('');
        $('#customer_name').val('');
        $('#address').val('');
        $('#mobile').val('');
        $('#email').val('');
        $('#gst_no').val('');
        $('#package_name').val('');    
        
        if(vendorDetail.length > 0){
            var vendor = $.parseJSON(vendorDetail);
            var serviceProviderDetail = $('#payment_company_name option:selected').attr('serviceProvider');
        
            $('#paymentsheet_user_id').val(vendor.id);
            $('#executive_name').val(vendor.account_manager_name);
            $('#customer_name').val(vendor.name);
            $('#address').val((vendor.business_address != null ? vendor.business_address : vendor.user_address));
            $('#mobile').val((vendor.mobile != null ? vendor.mobile : vendor.mobile2));
            $('#email').val(vendor.email);
            $('#gst_no').val(vendor.gst_no);
            
            if(serviceProviderDetail.length > 0){
                var serviceProvider = $.parseJSON(serviceProviderDetail);
                
                $('#package_name').val(serviceProvider.provider_name); 
            }
        }
    });
});