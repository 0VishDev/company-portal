<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e(Helper::translation(1913,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main role="main" class="main-content">
       
	<section class="headerbg" style="background-image: url('https://www.venicered.com/public/storage/settings/1596614658191.jpg');">
      <div class="container text-left">
        <h2 class="mb-0">GET FREIGHT QUOTES</h2>
      </div>
    </section>
	
	<div class="container mt-3">
		<div class="bg-white shadow pt-4 pb-4">
		<form class="up-leads">	
			<div class="row mt-3">
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
				<h6>GET FREIGHT QUOTES</h6>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
				<form>
    <table width="90%" border="0">
   <tbody>
    <tr>
    <td colspan="2">
     <div align="justify">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tbl-tr table table-striped">
                    <tbody>
                        <tr >
                            <td width="37%" align="right"  class="f4">Freight Mode<span class="astrix">*</span> :</td>
                            <td width="37%"  class="f4">
                                <input name="type" checked="checked" type="radio" value="sea" /> &nbsp;Sea&nbsp;&nbsp; <input type="radio" value="air" name="type" onclick="change_bt(this)" /> &nbsp;Air
                            </td>
                        </tr>
                        <tr >
                            <td align="right"  class="f4">Cargo Type<span class="astrix">*</span> :</td>
                            <td class="f4">
                                <input  name="req_type" value="exp" checked="checked" type="radio" /> &nbsp;Indian Export &nbsp;&nbsp;
                                <input name="req_type" onclick="change_bt(this)" type="radio" value="imp" /> &nbsp;Indian Import
                            </td>
                        </tr>
                        <tr>
                            <td align="right">From &nbsp;<span class="astrix">*</span> :</td>
                            <td>
                                <select name="exp_from">
                                    <option value="">Select a City</option>
                                    <option value="GURGAON">GURGAON</option>
                                    <option value="SECUNDERABAD">SECUNDERABAD</option>
                                    <option value="THANE">THANE</option>
                                    <option value="BANGALORE">BANGALORE</option>
                                    <option value="BHAVNAGAR">BHAVNAGAR</option>
                                    <option value="CHENNAI">CHENNAI</option>
                                    <option value="COIMBATORE">COIMBATORE</option>
                                    <option value="DELHI">DELHI</option>
                                    <option value="HYDERABAD">HYDERABAD</option>
                                    <option value="INDORE">INDORE</option>
                                    <option value="JAIPUR">JAIPUR</option>
                                    <option value="KANDLA">KANDLA</option>
                                    <option value="KANPUR">KANPUR</option>
                                    <option value="KOCHI">KOCHI</option>
                                    <option value="KOLKATA">KOLKATA</option>
                                    <option value="LUDHIANA">LUDHIANA</option>
                                    <option value="MUMBAI">MUMBAI</option>
                                    <option value="MANGALORE">MANGALORE</option>
                                    <option value="NAGPUR">NAGPUR</option>
                                    <option value="PUNE">PUNE</option>
                                    <option value="TUTICORIN">TUTICORIN</option>
                                    <option value="UDAIPUR">UDAIPUR</option>
                                    <option value="VISHAKAPATTANAM">VISHAKAPATTANAM</option>
                                    <option value="GANDHIDHAM">GANDHIDHAM</option>
                                    <option value="AMRITSAR">AMRITSAR</option>
                                    <option value="AHMEDABAD">AHMEDABAD</option>
                                    <option value="JNPT">JNPT</option>
                                    <option value="PARADEEP">PARADEEP</option>
                                    <option value="MARMUGAO">MARMUGAO</option>
                                    <option value="MUNDRA">MUNDRA</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">To&nbsp;<span class="astrix">*</span> :</td>
                            <td>
                               <input name="exp_to" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Tentative Shipment Date<span class="astrix">*</span> :</td>
                            <td class="f4">
                                <select name="dd_shipment_date">
                                    <option value="">DD</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25" selected="selected">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <select name="mm_shipment_date">
                                    <option value="">Mon</option>
                                    <option value="01">Jan</option>
                                    <option value="02">Feb</option>
                                    <option value="03">Mar</option>
                                    <option value="04">Apr</option>
                                    <option value="05">May</option>
                                    <option value="06">Jun</option>
                                    <option selected="selected" value="07">Jul</option>
                                    <option value="08">Aug</option>
                                    <option value="09">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                                <select name="yyyy_shipment_date">
                                    <option value="">Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020" selected="selected">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Commodity Details<span class="astrix">*</span> :</td>
                            <td><input name="comm_det" class="f4" /></td>
                        </tr>
                        <tr >
                            <td align="right" class="f4">Container Size&nbsp;<span class="astrix">*</span> :</td>
                            <td class="f4">
                                <input name="cont_size" type="radio" value="10'" /> 10' 
                                <input name="cont_size" type="radio" value="20'" /> 20' 
								<input value="30'" type="radio" name="cont_size" /> 30' 
								<input value="40'" type="radio" name="cont_size" /> 40' 
								<input type="radio" value="50'" name="cont_size" /> 50'
                                <input value="LCL" type="radio" name="cont_size" /> LCL 
								<input name="cont_size" type="radio" value="Others on Details" /> Others on Details
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Cargo Status&nbsp;<span class="astrix">*</span> :</td>
                            <td class="f4">
                                <input name="optStatus" value="General" type="radio" /> General <input value="Hazards" type="radio" name="optStatus" /> Hazardous 
								<input value="Reefer" type="radio" name="optStatus" /> Reefer <br />
                                <input value="Over Dimension" type="radio" name="optStatus" /> Over Dimension 
								<input name="optStatus" type="radio" value="More on Details" /> Open Top
                                <input type="radio" value="More on Details" name="optStatus" /> More on Details
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Quantity :</td>
                            <td class="f4">
                                <input maxlength="20" name="qty" /> &nbsp;Unit
                                <select name="qty_unit">
                                    <option selected="selected" value="CNTR">CNTR</option>
                                    <option value="BOX">BOX</option>
                                    <option value="EA">EA</option>
                                    <option value="PCS">PCS</option>
                                    <option value="DRUM">DRUM</option>
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td align="right" class="f4">Weight :</td>
                            <td class="f4">
                                <input type=" text" maxlength="20" name="wgt" /> &nbsp;Unit
                                <select name="wgt_unit">
                                    <option selected="selected" value="MT">MT</option>
                                    <option value="KG">KG</option>
                                    <option value="LBS">LBS</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Volume :</td>
                            <td class="f4">
                                <input maxlength="20" type=" text" name="vlm" /> &nbsp;Unit
                                <select name="vlm_unit">
                                    <option value="CBM" selected="selected">CBM</option>
                                    <option value="CBF">CBF</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Payment<span class="astrix">*</span> :</td>
                            <td class="f4">
								<input name="optPay" value="Prepaid" type="radio" /> Prepaid <input value="Collect" type="radio" name="optPay" /> Collect <input type="radio" value="3rd_Port|others" name="optPay" /> Others</td>
                        </tr>
                        <tr>
                            <td align="right" class="f4">Transit time required :</td>
                            <td><input name="trans_time" class="f4" /></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</div>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" height="20" align="center" class="formbglight">
                    <input type="submit" value="Submit" name="submt" class="btn btn-success" />
                    <input type="reset" value="Reset" name="Reset" class="btn btn-danger"/>
                    
                </td>
            </tr>
        </tbody>
    </table>
</form>

				</div>
			</div>
		</form>
			</div>
</div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
<script>
  $(document).ready(function() {
    $(".onGetBestPrice").on("click", function(event) {
      $("input[name='user_id']").val($(this).data("user-id"));
      $("input[name='vendor_id']").val($(this).data("vendor-id"));
      $("input[name='product_id']").val($(this).data("product-id"));

      var product_name = $(this).data("product-name");
      var vendor_name = $(this).data("vendor-name");
      var image_url = $(this).data("image-url");

      $("#popNameTitle").text(product_name);
      $("#popNameSub").text(product_name);
      $("#popImg").attr("src", image_url);
      $("#popVendor").text(vendor_name);
    });
  });
</script>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/freights.blade.php ENDPATH**/ ?>