<input type="hidden" id="base_path" name="base_path" value="<?php echo e(url('/')); ?>">

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
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">BuyLead Balance: 0<br><small>To view buyer's contact details, please purchase BuyLead using any of the following packages:</small></h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pricing">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">Single BuyLead</h5>
                                    <h6 class="card-price text-center"><i class="fa fa-inr" aria-hidden="true"></i> 299<span class="period"> /per BuyLead</span></h6>
                                    <hr>
                                    <div class="mb-1">
                                        <input type="text" class="form-control" placeholder="Enter GSTIN">
                                    </div>
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User1 BuyLead</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Get Buyer Contact details via e-mail and SMS</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Higher Listing on Venice Red</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Receive Payments online(via Debit Card/Credit Card)</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Comprehensive Lead Management System on Desktop & App</li>
                                    </ul>
                                    <a href="#" class="btn btn-block btn-primary text-uppercase">Buy Now</a>
                                    <div class="text-center mt-2"><a href="#"><small>+18% GST as applicable</small></a></div>
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

<script type="text/javascript">
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

    $(document).ready(function() {
        $('#bologna-list a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
        $("#flash_deal_start_date").datetimepicker({
            timeFormat: "hh:mm tt",
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

</html><?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/bottom-links.blade.php ENDPATH**/ ?>