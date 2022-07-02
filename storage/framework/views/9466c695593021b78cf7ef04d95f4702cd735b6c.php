<style>
    	
        label {
            font-size: 14px;
            letter-spacing: 0;
            color: #000; 
        }
        .selective
        {
            height:40px;
        }
	    input[type="text"] {
		  width: 100%;
		  color:#000;
		  border-radius: 5px;
		  height:40px;
		  
		  outline: none;
		  padding: 8px;
		  box-sizing: border-box;
		  transition: 0.3s;
		}

		input[type="text"]:focus {
		  border-color: dodgerBlue;
		  box-shadow: 0 0 8px 0 dodgerBlue;
		}

		.inputWithIcon input[type="text"] {
		  padding-left: 40px;
		}

		.inputWithIcon {
		  position: relative;
		}

		.inputWithIcon i {
		  position: absolute;
		  left: 0;
		  bottom: 4px;
		  padding: 9px 8px;
		  color: #aaa;
		  transition: 0.3s;
		}

		.inputWithIcon input[type="text"]:focus + i {
		  color: dodgerBlue;
		}

		.inputWithIcon.inputIconBg i {
		  background-color: #aaa;
		  color: #fff;
		  padding: 9px 4px;
		  border-radius: 4px 0 0 4px;
		}

		.inputWithIcon.inputIconBg input[type="text"]:focus + i {
		  color: #fff;
		  background-color: dodgerBlue;
		}

    </style>

<div class="modal fade" id="sendInquiryModal" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="mb-0"><span data-inquiry-product-name></span></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
        				<span class="send_inquiry_success"></span>
        				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        				  <span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        		</div>
    		</div>
            				
          <form action="<?php echo e(url('request/add')); ?>" method="POST" id="sendInquiryForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_id" id="inquiry_buyer_id" value="">
            <input type="hidden" name="vendor_id" id="inquiry_seller_id" value="">
            <input type="hidden" name="product_id" id="inquiry_product_id" value="">
            <input type="hidden" name="user_name" id="inquiry_user_name" value="">
            <input type="hidden" name="user_email" id="inquiry_user_email" value="">
            <input type="hidden" name="user_mobile" id="inquiry_user_mobile" value="">
            <input type="hidden" name="company_name" id="inquiry_company_name" value="">
            <input type="hidden" name="product_image" id="inquiry_product_image" value="">
            <input type="hidden" name="inquiry_id" id="edit_inquiry_id" value="">
            
            <div class="row" >
              <div class="col-md-12 con-bg12">
                <div class="contact-info">
                    <div class="row">
                        <div class="col-md-4">
                        <div class=" mb-3">
                            <img src="https://via.placeholder.com/300?text='No Image Found'" class="img img-fluid rounded" style="float:left;" alt="image" data-inquiry-product-image>
                            <p data-inquiry-product-name style="font-size:18px;color:000;font-weight:550;"></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <img src="<?php echo e(asset('public/img/new-img/bands.png')); ?>" class="img-fluid" style="width:80%;height:auto;float:center;">
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                          <div class="form-group"  edit-inquiry-product-row>
        				    <label class="control-label ">Want to Buy/Sell:</label>
            				    <select id="want_to_buy" name="want_to_buy" class="form-control selective">
            				      <option value="Select">Select</option>
                                  <option value="Buy">Buy</option>
                                  <option value="Sell">Sell</option>
                                 </select>
            				</div>
                        </div>
                    <div class="col-sm-12 col-md-3">
                   	   <div class="form-group">
        				 <label class="control-label ">Product Name</label>
        				   <input type="text" class="form-control" placeholder="eg:product name" id="i_want_to_buy" name="i_want_to_buy">
        				</div>
                   	</div>
                   	<div class="col-sm-12 col-md-3">
                   	    <div class="form-group">
                            <label class="control-label " for="quantity"> M.O.Q (Kg/Tons) </label>
                            <input type="text" class="form-control" name="quantity" id="quantity" value=""  placeholder="eg:Kg/Ton/Litre/Ml/Piece/Bulk/As per the price">
                        </div>
                   	</div>
                   	<div class="col-sm-12 col-md-3">
                   	    <div class="form-group">
        				    <label class="control-label ">Quality/Size/Specification</label>
            				  <input type="text" class="form-control" placeholder="eg:Quality/Size/Specification" id="quality_size_specification" name="quality_size_specification">
            			</div>
                   	</div>
                   	<div class="col-sm-12 col-md-3">
                   	    <div class="form-group">
        				  <label class="control-label col-sm-12">Sale/Purchase From</label>
        				    <input type="text" class="form-control" placeholder="eg:Sale/Purchase From" id="sale_purchase" name="sale_purchase">
        				</div>
                   	</div>
    				<div class="col-sm-12 col-md-3">
    				    <div class="form-group">
        				  <label class="control-label ">Requirment Frequency</label>
        				    <input type="text" class="form-control" placeholder="eg:Monthly Weekly" id="requirment_frequency" name="requirment_frequency">
        				</div>
                   	</div>
                   	<div class="col-sm-12 col-md-3">
                   	    <div class="form-group">
        				  <label class="control-label col-sm-12">Packaging Size</label>
        				    <input type="text" class="form-control" placeholder="eg:Packaging Size" id="packaging_size" name="packaging_size">
        				</div>
                   	</div>
                   	
                   	
                   	<div class="col-sm-12 col-md-3">
                   	    <div class="form-group">
    				       <label class="control-label col-sm-12">Payment Term</label>
    				         <input type="text" class="form-control" placeholder="eg:Payment Term" id="payment_term" name="payment_term">
    				     </div>
                   	</div>
                   	<div class="col-sm-12 col-md-4">
                   	    <div class="form-group">
        				  <label class="control-label ">Purpose of Req.:</label>
        				    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="eg:Resale/Commerical Use/ Business Use/For Home Use">
        				</div>
					</div>
                   	<div class="col-sm-12 col-md-4">
                   	    <div class="form-group">
                            <label class="control-label" for="quantity">Delivery Place</label>
                            <input type="text" class="form-control" name="Delivery Place" id="place" value=""  placeholder="eg:place">
                         </div>
                   	</div>
                   	<div class="col-sm-12 col-md-4">
                   	    <div class="form-group">
                            <label class="control-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="eg:Anywhere in india/Local">
                        </div>
				    </div>
                   	<div class="col-sm-12 col-md-12">
                   	    <div class="form-group">
        				   <label class="control-label">Description:</label>
        				     <textarea row="3" class="form-control" id="description" name="description"></textarea>
        				</div>
                   	</div>
                   	
                  </div>
                    
                    <div class="form-group" style="display: none;" edit-inquiry-product-row>
    					<label class="control-label col-sm-12" for="product_name">Product Name:</label>
    					<div class="col-sm-12">          
    					  <input type="text" class="form-control" id="edit_inquiry_product_name" name="product_name" placeholder="Enter product name you want to buy" buyer-req-product-search-input>
    					</div>
    				  </div>
    				</div>
               </div>
              <div class="col-md-6 con-bg1">
                <div class="contact-form">
                    
    				
                   
                      
				 
				
				<div class="form-group">
				    <div class="col-sm-12"> 
                    <button class="btn btn-success btn-rounded btn-md" type="submit">Send</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="postBuyerReqModal" aria-modal="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered ui-front " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Post Your Buy Requirement</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            				<span class="send_inquiry_success"></span>
            				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				  <span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            		</div>
        		</div>
	             <div class="row">
                		<div class="col-md-12 con-bg1">
                			<div class="contact-form">
                				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                					<p id="buy-success"></p>
                					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                					  <span aria-hidden="true">&times;</span>
                					</button>
                				</div>
                				<form action="<?php echo e(url('request/add')); ?>" method="POST" id="buyerReqForm">
                					<?php echo csrf_field(); ?>
                					  <div class="form-group">
                						<label class="control-label col-sm-12" for="product_name">Product Name:</label>
                						<div class="col-sm-12">          
                						  <input type="text" class="form-control" id="buyer_req_product_name" name="product_name" placeholder="Enter product name you want to buy" buyer-req-product-search-input required>
                						</div>
                					  </div>
                					  <!--<div class="form-group"  edit-inquiry-product-row>
                    				    <label class="control-label col-sm-12" for="product_name">I want to:</label>
                    					 <div class="col-sm-12">          
                    					    <select name="buy_sell" id="buy_sell" class="form-control">
                    					      <option value="Select">Select</option>
                                              <option value="Buy">Buy</option>
                                              <option value="Sell">Sell</option>
                                              
                                            </select>
                                          </div>
                        				</div>-->
                        			    <div class="form-group">
                        				  <label class="control-label col-sm-12">M.O.Q.</label>
                        				  <div class="col-sm-12">          
                        					<input type="text" class="form-control" placeholder="eg:Minimum Order Quantity" id="moq" name="moq">
                        				  </div>
                        			    </div>
                        			    <div class="form-group">
                                            <label class="control-label col-sm-12" for="quantity">Quantity</label>
                                            <div class="col-sm-12">
                                              <input type="text" class="form-control" name="quantity" id="quantity" value=""  placeholder="eg:Kg/Ton/Litre/Ml/Piece/Bulk/As per the price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="quantity">Requirment Frequency</label>
                                            <div class="col-sm-12">
                                              <input type="text" class="form-control" name="requirment_frequency" id="requirment_frequency" value=""  placeholder="eg:Requirment Frequency">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="quantity">Quality/Size/Specification</label>
                                            <div class="col-sm-12">
                                              <input type="text" class="form-control" name="quality_size" id="quality_size" value=""  placeholder="eg:Quality/Size/Specification">
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-12">Purpose of Req.:</label>
                        				  <div class="col-sm-12">          
                        					<input type="text" class="form-control" id="purpose" name="purpose" placeholder="eg:Resale/Commerical Use/ Business Use/For Home Use">
                        				  </div>
                        				<div class="form-group">
                        				  <label class="control-label col-sm-12">Want to Buy:</label>
                        				  <div class="col-sm-12">          
                        					<input type="text" class="form-control" id="want_to_buy" name="want_to_buy" placeholder="eg:Immediate/After a  week/After a month">
                        				  </div>
                        				</div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="quantity">Packaging Size</label>
                                            <div class="col-sm-12">
                                              <input type="text" class="form-control" name="packaging_size" id="packaging_size" value=""  placeholder="eg:Packaging Size">
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-12">Requirement type:</label>
                        				  <div class="col-sm-12">
                        					<input type="text" class="form-control" id="requirement_type" name="requirement_type" placeholder="eg:Regular Requirement/One time requirement">
                        				  </div>
                					  <div class="form-group">
                						<label class="control-label col-sm-12" for="description">Describe Your BUYING Requirement (minimum 20 characters):</label>
                						<div class="col-sm-12">
                						  <textarea class="form-control" rows="2" id="buyer_req_description" name="description" placeholder="Describe your BUYING Requirement"></textarea>
                						</div>
                					  </div>
                					  <div class="form-group">
                						<label class="control-label col-sm-12" for="name">Name:</label>
                						<div class="col-sm-12">          
                						  <input type="text" class="form-control" id="buyer_req_user_name" placeholder="Enter your name" name="user_name" required>
                						</div>
                					  </div>
                					  <div class="form-group">
                						<label class="control-label col-sm-12" for="email">Email:</label>
                						<div class="col-sm-12">          
                						  <input type="email" class="form-control" id="buyer_req_user_email" placeholder="Enter your email" name="user_email" required>
                						</div>
                					  </div>
                						  <div class="form-group">
                						<label class="control-label col-sm-12" for="mobile">Mobile No.:</label>
                						<div class="col-sm-12">          
                						  <input type="number" class="form-control" id="buyer_req_user_mobile" placeholder="Enter your Mobile" name="user_mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                						</div>
                					  </div>
                					  <div class="form-group">
                						<label class="control-label col-sm-12" for="location">Location:</label>
                						<div class="col-sm-12">          
                						  <input type="text" class="form-control" id="buyer_req_location" placeholder="Enter your location" name="location" >
                						</div>
                					  </div>
                					  <div class="form-group">
                						<div class="col-sm-12">          
                						  <input type="checkbox" id="isAgree" name="isAgree" required> I agree to <a href="/page/TERMS-AND-CONDITIONS" style="color:#ff0000">Terms and Conditions</a>
                						</div>
                					  </div>
                					  <div class="form-group">        
                						<div class="col-sm-offset-2 col-sm-10">
                						  <button type="submit" class="btn btn-success">Post Buy Requirement</button>
                						</div>
                					  </div>
                				</form>
                			</div>
                		</div>
                	</div>
            </div>
        </div>
    </div>
</div>
  
  <script type="text/javascript">
  
    var isAdminLogin = '<?php echo e((\Request::is('admin/inquiries') ? 1 : 0)); ?>';
    
    $("[data-send-inquiry-btn]").on("click", function() {
        if($(this).attr("buyer").length > 0){
            var buyer = $.parseJSON($(this).attr("buyer"));
            
            $("#inquiry_buyer_id").val(buyer['id']);
            
            $('#inquiry_user_name').val(buyer['name']);
            $('#inquiry_user_email').val(buyer['email']);
            $('#inquiry_user_mobile').val((buyer['mobile'] != null && buyer['mobile'].length > 0 ? buyer['mobile'] : buyer['user_phone']));
            $('#inquiry_company_name').val(buyer['company_name']);
            
            clearInput();
            
            if(isAdminLogin == 0){
                var seller = $.parseJSON($(this).attr("seller"));
                var product = $.parseJSON($(this).attr('product'));
                
                showProduct(seller, product);
            }
            
            $('#sendInquiryModal').modal('show');
        }else{
            window.location.href = $('#base_path').val()+'/login?redirectTo=1';
        }
    });
    
    $('#products').change(function () {
        if($(this).val().length > 0){
            var product = $.parseJSON($(this).val());
        
            showProduct(product['user'], product);
        }else{
            clearInput();   
        }
    });
    
    function clearInput()
    {
        $('[data-inquiry-product-name]').html('');
        $('#edit_inquiry_id').val('');
        $('#products').val('');
        $('[data-inquiry-product-image]').attr('src', "https://via.placeholder.com/300?text='No Image Found'");
    }
    
    function showProduct(seller, product)
    {
        $("#inquiry_seller_id").val(seller['id']);
        $("#inquiry_product_id").val(product['product_id']);
        $('[data-inquiry-seller-name]').html(seller['name']);
        
        $('#inquiry_product_image').val(product['product_image']);
    
        $('[data-inquiry-product-name]').html(product['product_name']);
        $('[data-inquiry-product-image]').attr('src', $('#base_path').val()+'/public/storage/product/'+product['product_image']);
        
        $('[data-inquiry-seller-name]').html(seller['name']);
        $('[data-inquiry-seller-email]').html(seller['email']);
        $('[data-inquiry-seller-mobile]').html((seller['mobile'] != null && seller['mobile'].length > 0 ? seller['mobile'] : seller['user_phone']));
    }
    
    $('[data-inquiry-edit]').click(function (){ 
        var inquiry = $.parseJSON($(this).attr("inquiry"));
        
        clearInput();
        
        $('#edit_inquiry_id').val(inquiry['inquiry_id']);
        
        if(inquiry['product_id'] != null){
            $('#edit_inquiry_product_name').val('');
            $('[edit-inquiry-product-row]').hide(); 
            $('#edit_inquiry_product_name').prop('required', false);
        }else{
            $('#edit_inquiry_product_name').val(inquiry['product_name']);
            $('[edit-inquiry-product-row]').show();
            $('#edit_inquiry_product_name').prop('required', true);
        }
        
        if(inquiry['product'] != null){
            $('[data-inquiry-product-image]').attr('src', $('#base_path').val()+'/public/storage/product/'+inquiry['product']['product_image']);        
        }
    
        $('#location').val(inquiry['location']);
        $('#want_to_buy').val(inquiry['want_to_buy']);
        $('#i_want_to_buy').val(inquiry['i_want_to_buy']);
        $('#quantity').val(inquiry['quantity']);
        
        $('#purpose').val(inquiry['purpose']);
        $('#description').val(inquiry['buying_request_description']);
        
        $('#buy_sell').val(inquiry['buy_sell']);
       
        $('#sale_purchase').val(inquiry['sale_purchase']);
        $('#payment_term').val(inquiry['payment_term']);
        $('#delivery_place').val(inquiry['delivery_place']);
        
        $('#requirment_frequency').val(inquiry['requirment_frequency']);
        $('#quality_size').val(inquiry['quality_size']);
        $('#packaging_size').val(inquiry['packaging_size']);
        
        
        
        $('#sendInquiryModal').modal('show');
    });
    
    $('#sendInquiryForm').submit(function(e) {
        e.preventDefault();
        
        saveProductInquiry('sendInquiryForm');
    });
    
    $('#buyerReqForm').submit(function(e) {
        e.preventDefault();
        
        saveProductInquiry('buyerReqForm');
    });
    
    function saveProductInquiry(formId){
        $.ajax({
            url: '<?php echo e(url('product/inquiry/add')); ?>',
            type: 'POST',
            data: $('#'+formId).serialize(),
            success: function(response) {
                if(response.code == 200) {
                    var success = $(".send_inquiry_success");
                    success.html(response.message);
                    success.parent().toggleClass('d-none');
                    
                    $('#'+formId)[0].reset();
                        
                    setTimeout(function(){ 
                        window.location.reload();
                    }, 1000);
                    
                    // if(isAdminLogin == 0 && response.is_edit == 0){
                    //     $('#'+formId)[0].reset();   
                    // }else{
                    //     setTimeout(function(){ 
                    //         window.location.reload();
                    //     }, 1000);
                    // }
                }
            },
            failure: function(error) {
                console.log(error);
            }
        });
    }
    
    
        $("[buyer-req-product-search-input]").autocomplete({
            appendTo: "#postBuyerReqModal",
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo e(route('searchajax')); ?>',
                    dataType: "json",
                    data: {
                        term : request.term,
                        type: 'Product'
                    },
                    success: function(data) {
                        response(data);
                       
                    }
                });
            },
            minLength: 1,
        });
    
  </script>
  
  <style>
    .contact-info img {
        width: 209px;
        height: 150px;
          }
    .modal-body .form-control::-webkit-input-placeholder { /* Edge */
      color: #49505766 !important;
          font-size: 12px !important;
    }
    
    .modal-body .form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: #49505766 !important;
          font-size: 12px !important;
    }
    
    .modal-body .form-control::placeholder {
      color: #49505766 !important;
      font-size: 12px !important;
    }
  </style><?php /**PATH /home/a0yq2z3dupoj/public_html/businessworldtrade.in/resources/views/send-inquiry.blade.php ENDPATH**/ ?>