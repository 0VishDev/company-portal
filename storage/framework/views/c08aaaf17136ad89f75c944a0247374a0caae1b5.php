<input type="hidden" id="base_path" name="base_path" value="<?php echo e(url('/')); ?>">

<div class="modal fade show" id="download-inq" aria-modal="true">
    <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0 ml-7">Download Inquiries</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pricing">
                <form class="" id="leadDeskDownloadForm">
                    <div class="row">
                        <div class="col-sm-12 text-center mb-3">
                            <h5 style="color:#ff1d25;">Select Dates:</h5>
                        </div>
                        <div class="form-group col-sm-5 ml-4">
                            <label>From:</label>
                            <input type="text" class="form-control shadow" id="lead_desk_from_date" name="lead_desk_from_date" autocomplete="off" required>
                        </div>
                        <div class="form-group col-sm-5 ml-4">
                            <label>To:</label>
                            <input type="text" class="form-control shadow" id="lead_desk_to_date" name="lead_desk_to_date" autocomplete="off" required>
                        </div>
                         <div class="form-group col-sm-12 text-center rpl-btn mt-3">
                            <input type="submit" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="locat-fltr" aria-modal="true">
    <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0"><i class="fa fa-filter" aria-hidden="true"></i> Location</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6 mb-2">
                            <h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Location (1)</h6>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <span class="float-right">
                                <small>You can select only one</small>
                            </span>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Recommended
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Uttar Pradesh
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> India
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Near Noida
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Noida
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Foreign
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> All Locations
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <h6 class="pb-2">Suggested States</h6>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Delhi
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Haryana
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Madhya Pradesh
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Uttarakhand
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="radio" name="location"> Bihar
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="cate-fltr" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0"><i class="fa fa-filter" aria-hidden="true"></i> Categories/Products</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        		<div class="bg-white pt-4 pl-2 pr-2 mb-3">
					<div class="col-sm-6 col-md-4 mb-1">
						<div class="row">
							<div class="col-sm-6 mb-2">
								<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Location (1)</h6>
							</div>
							<!--<div class="col-sm-6 mb-2">-->
							<!--	<span class="float-right">-->
							<!--		<button type="button" class="btn btn-sm" data-target="#locat-fltr" data-toggle="modal">+ More</button>-->
							<!--	</span>-->
							<!--</div>-->
							<div class="col-sm-6 mb-2">
								<input type="radio" name="location"> Recommended
							</div>
							<div class="col-sm-6 mb-2">
								<input type="radio" name="location"> Uttar Pradesh
							</div>
							<div class="col-sm-6 mb-2">
								<input type="radio" name="location"> India
							</div>
							<div class="col-sm-6 mb-2">
								<input type="radio" name="location"> Near Noida
							</div>
							<div class="col-sm-12">
								<div class="fltr-list">
									<ul>
										<li>Near Noida <a href="#"><img src="/public/img/cross.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 mb-1">

						<div class="row">
							<div class="col-sm-7 mb-2">
								<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Categories/Products</h6>
							</div>
							<!--<div class="col-sm-5 mb-2">-->
							<!--	<span class="float-right">-->
							<!--		<button type="button" class="btn btn-sm" data-target="#cate-fltr" data-toggle="modal">+ More</button>-->
							<!--	</span>-->
							<!--</div>-->
							<div class="col-sm-6 mb-2">
								<input type="checkbox" name="product-category"> Designer Kurtis
							</div>
							<div class="col-sm-6 mb-2">
								<input type="checkbox" name="product-category"> Rayon Kurti
							</div>
							<div class="col-sm-6 mb-2">
								<input type="checkbox" name="product-category"> Fancy Kurti
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 mb-1">
						<div class="row">
							<div class="col-sm-6 mb-2">
								<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Order Value</h6>
							</div>
							<div class="col-sm-6 mb-2">
								<h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Lead Type</h6>
							</div>
							<div class="col-sm-6 mb-2">
								<input type="checkbox" name="Order"> > 50,000
							</div>
							<div class="col-sm-6 mb-2">
								<input type="checkbox" name="Lead"> Bulk
							</div>
						</div>
					</div>

					<div class="col-sm-6 mb-1 rec-srch">
						<p><b>Recent Searches :</b> Selfie Kurtis</p>
					</div>
					<div class="col-sm-6 mb-1 rec-srch">
						<p><a href="#">Clear Filter</a></p>
					</div>
		</div>
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <h6 class="pb-2"><i class="fa fa-filter" aria-hidden="true"></i> Categories/Products (1)</h6>-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <span class="float-right">-->
                        <!--        <small>You may select multiple</small>-->
                        <!--    </span>-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="checkbox" name="product-category"> Designer Kurtis-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="checkbox" name="product-category"> Rayon Kurti-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="checkbox" name="product-category"> Fancy Kurti-->
                        <!--</div>-->
                        <!--<div class="col-sm-12 mb-2">-->
                        <!--    <div class="form-group has-search">-->
                        <!--        <span class="fa fa-search form-control-feedback"></span>-->
                        <!--        <input type="text" class="form-control" placeholder="Search">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-sm-12 mb-2">-->
                        <!--    <h6 class="pb-2">Search BuyLeads For More Products</h6>-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="radio" name="Products"> Chiffon Designer Printed Kurti-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="radio" name="Products"> Cottan Kurti-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="radio" name="Products"> Kurti-->
                        <!--</div>-->
                        <!--<div class="col-sm-6 mb-2">-->
                        <!--    <input type="radio" name="Products"> Reyon Kurti-->
                        <!--</div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="iaminterest" aria-modal="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="mb-0 text-white ml-5">Your Buy Lead</small></h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pricing">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h4 class="card-price text-center text-red"><i class="fa fa-inr" aria-hidden="true"></i> 399<span class="period">/lead</span></h4>
                                    
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><img src="/public/img/lead-one.png"></span>Single Buy Lead</li>
                                        <li><span class="fa-li"><img src="/public/img/lead-userverified.png"></span>Verified Buyer</li>
                                        <li><span class="fa-li"><img src="/public/img/lead-phone.png"></span>Support</li>
                                        <li><span class="fa-li"><img src="/public/img/lead-gift.png"></span>Purchase Buy Lead And Get Welcome Gift</li>
                                    </ul>
                                    <a href="#" class="btn btn-block bg-red text-uppercase">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/assets/js/main.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/assets/js/jquery.min.js"></script>
<!--<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/chart.js/dist/Chart.bundle.min.js"></script>-->
<!--<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/assets/js/dashboard.js"></script>-->
<!--<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/assets/js/widgets.js"></script>-->
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
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
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/assets/js/init-scripts/data-table/datatables-init.js"></script>
<script src="<?php echo e(url('/')); ?>/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/template/validate/jquery.bvalidator.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/template/validate/themes/presenters/default.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/template/validate/themes/red/red.js"></script>
<link href="<?php echo e(url('/')); ?>/resources/views/template/validate/themes/red/red.css" rel="stylesheet" />
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/picker/jquery-ui.min.js"></script>
<script src="<?php echo e(url('/')); ?>/resources/views/admin/template/picker/jquery-ui-timepicker-addon.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="<?php echo e(URL::to('resources/views/template/autosearch/jquery-ui.js')); ?>"></script>
<script type="text/javascript">
   $(document).ready(function() {
        $("[product-input-search]").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo e(url('vendor/product/search')); ?>',
                    dataType: "json",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);
                       
                    }
                });
            },
            minLength: 1,
        });
   });

    $('#mainCategory').change(function () {
        $('#addProductCategory').empty();
        
        if($(this).val().length > 0){
            var subCategories = $.parseJSON($('#mainCategory :selected').attr('subCategories'));
        
            if(subCategories.length > 0){
                $.each(subCategories, function (k, v) {
                    $('#addProductCategory').append('<option value="'+v.subcat_id+'">'+v.subcategory_name+'</option>');
                })
            }
        }
    });
    
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
      
    function imageUpload(input, section){
         readURL(input, section);
    }
      
    function readURL(input, section) {
        var file = $(input)[0].files[0];
        
        if (file) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $(section).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(file); // convert to base64 string
        }
    }
      
    function isFloat(event){
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    }
  
    var imageCount = 1;
  
    $('#gallery_images').change(function () {
        var fileArr = $(this).prop("files");
        if(fileArr.length > 0 && fileArr.length != undefined){
            $.map(fileArr, function(file) { 
                var reader = new FileReader();
        
                reader.onload = function(e) {
                    var html = '<div class="item-img"><img src="'+e.target.result+'" id="galleryImage'+imageCount+'"  class="item-thumb"></div>';
                    $('#product_gallery_image_row').append(html);
                }
                reader.readAsDataURL(file);
                imageCount = imageCount + 1;
            });
            $('[data-gallery-image-row]').show();
        }else{
            $('[data-gallery-image-row]').hide();
        }
    });
    
    $('[data-file-upload]').change(function () {
        var type = $(this).attr('file-type');
        var fileArr = $(this).prop("files");
        
        if(fileArr.length > 0 && fileArr.length != undefined){
            $('#'+type+'Form').submit();
        }
    });
    
    if($('#company_about').parent().html()){
        CKEDITOR.replace('company_about');   
    }
    
    if($('#product_short_desc').parent().html()){
        CKEDITOR.replace('product_short_desc');   
    }
    
    if($('#product_desc').parent().html()){
        CKEDITOR.replace('product_desc');   
    }
    
    $('[data-product-docs-edit-btn]').click(function (e) {
        e.preventDefault();
        var docsId = $(this).attr('docs-id');
        var fileName = $(this).attr('file-name');
        
        $('#edit_docs_id').val(docsId);
        $('#edit_file_name').val(fileName);
        $('#editFileNameModal').modal('show');
    });
    
     $('[data-service-provider-list]').click(function () {
         
        
        $('[data-service-provider-final-price]').html(Number($(this).attr('final-price')).toFixed(2));
        $('[data-service-provider-discount-price]').html(Number($(this).attr('discount-price')).toFixed(2));
    });

//   $(document).ready(function() {
        

        // var options = {

        //     offset: {
        //         x: 5,
        //         y: -2
        //     },
        //     position: {
        //         x: 'left',
        //         y: 'center'
        //     },
        //     themes: {
        //         'red': {
        //             showClose: true
        //         },

        //     }
        // };

        // $('#item_form').bValidator(options);
        // $('#profile_form').bValidator(options);
        // $('#comment_form').bValidator(options);
        // $('#support_form').bValidator(options);
        // $('#order_form').bValidator(options);
        // $('#checkout_form').bValidator(options);
        // $('#setting_form').bValidator(options);
        // $('#category_form').bValidator(options);
    // });
    
    $(function() {
        $("#product_allow_seo").change(function() {
            if ($(this).val() == "1") {
                $("#ifseo").show();
            } else {
                $("#ifseo").hide();
            }
        });

        $("#flash_deals").change(function() {
            if ($(this).val() == "1") {
                $("#ifdeal").show();
            } else {
                $("#ifdeal").hide();
            }
        });

        $("#post_media_type").change(function() {
            if ($(this).val() == "image") {
                $("#ifImage").show();
                $("#ifVideo").hide();
            } else if ($(this).val() == "video") {
                $("#ifImage").hide();
                $("#ifVideo").show();
            } else {
                $("#ifImage").hide();
                $("#ifVideo").hide();
            }
        });

        $("#product_type").change(function() {
            if ($(this).val() == "physical") {
                $("#ifphysical_external").show();
                $("#ifphysical").show();
                $("#ifdigital").hide();
                $("#ifexternal").hide();
            } else if ($(this).val() == "external") {
                $("#ifphysical_external").show();
                $("#ifphysical").hide();
                $("#ifdigital").hide();
                $("#ifexternal").show();
            } else if ($(this).val() == "digital") {
                $("#ifphysical_external").hide();
                $("#ifphysical").hide();
                $("#ifdigital").show();
                $("#ifexternal").hide();
            } else {
                $("#ifphysical_external").hide();
                $("#ifphysical").hide();
                $("#ifdigital").hide();
                $("#ifexternal").hide();
            }
        });
    });
    
    //option A
    $("#leadDeskDownloadForm").submit(function(e){
        e.preventDefault();
        
        var fromDate = moment(new Date($('#lead_desk_from_date').val()));
        var toDate = moment(new Date($('#lead_desk_to_date').val()));
        
        var table = '<tr><th>Buyer</th><th>Company Name</th><th>Location</th><th>Product Name</th><th>Date/Time</th></tr>';

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

        if(inquiries.length > 0){
            $.each(inquiries, function (k, v){
                var createdAt = moment(new Date(v.created_at));  
                if(createdAt >= fromDate && createdAt <= toDate){
                    table = table+'<tr><td>'+v.name+'</td><td>'+v.company_name+'</td><td>'+v.location_name+'</td><td>'+v.product_name+'</td><td>'+v.created_at_formatted+'</td></tr>';
                }
            });
        }
        
        htmls = table;

        var ctx = {
            worksheet : 'Worksheet',
            table : htmls
        }

        var link = document.createElement("a");
        link.download = "leadDesk.xls";
        link.href = uri + base64(format(template, ctx));
        link.click();
    });

    $(document).ready(function() {
        $('#bologna-list a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        });
        
        $("#lead_desk_from_date").datepicker({
           dateFormat: 'yy-mm-dd'
        });
        
        $("#lead_desk_to_date").datepicker({
           dateFormat: 'yy-mm-dd'
        });
        
        $("#flash_deal_start_date").datetimepicker({
            timeFormat: "yy-mm-dd",
            minDate: 0,
            dateFormat: 'yy-mm-dd',
            onSelect: function(selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() + 1);
                $("#flash_deal_end_date").datetimepicker("option", "minDate", dt);
            }
        });
        $("#flash_deal_end_date").datetimepicker({
            timeFormat: "hh:mm tt",
            minDate: 0,
            dateFormat: 'yy-mm-dd',
            onSelect: function(selected) {
                var dt1 = new Date(selected);
                dt1.setDate(dt1.getDate() - 1);
                $("#flash_deal_start_date").datetimepicker("option", "maxDate", dt1);
            }
        });
    });

    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip();
        
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });

    // $(document).ready(function() {
    //     "use strict";
    //     var ctx = document.getElementById("team-chart");
    //     ctx.height = 150;
    //     var myChart = new Chart(ctx, {
    //         type: 'line',
    //         data: {
    //             labels: ["19 July 2020", "20 July 2020", "21 July 2020", "22 July 2020", "23 July 2020", "24 July 2020", "25 July 2020"],
    //             type: 'line',
    //             defaultFontFamily: 'Montserrat',
    //             datasets: [{
    //                 data: [0, 0, 0, 0, 0, 0, 0],
    //                 label: "sale",
    //                 backgroundColor: 'rgba(0,103,255,.15)',
    //                 borderColor: 'rgba(0,103,255,0.5)',
    //                 borderWidth: 3.5,
    //                 pointStyle: 'circle',
    //                 pointRadius: 5,
    //                 pointBorderColor: 'transparent',
    //                 pointBackgroundColor: 'rgba(0,103,255,0.5)',
    //             }, ]
    //         },
    //         options: {
    //             responsive: true,
    //             tooltips: {
    //                 mode: 'index',
    //                 titleFontSize: 12,
    //                 titleFontColor: '#000',
    //                 bodyFontColor: '#000',
    //                 backgroundColor: '#fff',
    //                 titleFontFamily: 'Montserrat',
    //                 bodyFontFamily: 'Montserrat',
    //                 cornerRadius: 3,
    //                 intersect: false,
    //             },
    //             legend: {
    //                 display: false,
    //                 position: 'top',
    //                 labels: {
    //                     usePointStyle: true,
    //                     fontFamily: 'Montserrat',
    //                 },


    //             },
    //             scales: {
    //                 xAxes: [{
    //                     display: true,
    //                     gridLines: {
    //                         display: false,
    //                         drawBorder: false
    //                     },
    //                     scaleLabel: {
    //                         display: false,
    //                         labelString: 'Month'
    //                     }
    //                 }],
    //                 yAxes: [{
    //                     display: true,
    //                     gridLines: {
    //                         display: false,
    //                         drawBorder: false
    //                     },
    //                     scaleLabel: {
    //                         display: true,
    //                         labelString: 'Sales'
    //                     }
    //                 }]
    //             },
    //             title: {
    //                 display: false,
    //             }
    //         }
    //     });
    //     var ctx = document.getElementById("pieChart");
    //     ctx.height = 300;
    //     var myChart = new Chart(ctx, {
    //         type: 'pie',
    //         data: {
    //             datasets: [{
    //                 data: [23, 0],
    //                 backgroundColor: [
    //                     "rgba(6, 163, 61, 1)",
    //                     "rgba(226, 27, 26, 1)"


    //                 ],
    //                 hoverBackgroundColor: [
    //                     "rgba(6, 163, 61, 0.7)",
    //                     "rgba(226, 27, 26, 0.7)"


    //                 ]

    //             }],
    //             labels: [
    //                 "Approved",
    //                 "Unapproved"

    //             ]
    //         },
    //         options: {
    //             responsive: true
    //         }
    //     });


    // });
</script>
</body>

</html><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/vendor-dash/bottom-links.blade.php ENDPATH**/ ?>