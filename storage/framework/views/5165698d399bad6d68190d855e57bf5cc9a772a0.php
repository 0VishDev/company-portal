<div id="venicered-modal" class="modal fade">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tell Us What You Need!</h2>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            				<span class="popup_inquiry_success"></span>
            				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				  <span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            		</div>
        		</div>
    		
                <form class="row" action="<?php echo e(url('popup/inquiry/add')); ?>" method="POST" id="popupInquiryForm">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control shadow" placeholder="Name" name="user_name" id="user_name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" class="form-control shadow" placeholder="Email Address" name="user_email" id="user_email" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="number" class="form-control shadow" placeholder="Contact No." name="contact_no" id="contact_no" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control shadow" placeholder="Buyer / Seller" name="user_type" id="user_type" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea rows="4" class="form-control shadow" placeholder="Tell Us Your Requirements" name="requirements" id="requirements"></textarea>
                    </div>
                    <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
         setTimeout(function(){ 
            $('#venicered-modal').modal('show');
        }, 10000);
    });
    
    $('#popupInquiryForm').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo e(url('popup/inquiry/add')); ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.code == 200) {
                    var success = $(".popup_inquiry_success");
                    success.html(response.message);
                    success.parent().toggleClass('d-none');
                    
                   $('#popupInquiryForm')[0].reset();
                   
                   setTimeout(function(){ 
                       $('#venicered-modal').modal('hide');
                   }, 3000);
                }
            },
            failure: function(error) {
                console.log(error);
            }
        });
    });
</script><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/popup-inquiry.blade.php ENDPATH**/ ?>