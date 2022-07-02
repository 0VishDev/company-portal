@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Get Freight Quotes - {{ $allsettings->site_title }}</title>
    @include('style')
  </head>
  <body>
    @include('header')
    <main role="main" class="main-content">
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">GET FREIGHT QUOTES</h2>
      </div>
    </section>
    <div class="container-fluid mt-3">
      <div class="bg-white shadow pt-4 pb-4">
        <form class="up-leads11" action="{{ url('freights/add') }}" method="POST" id="freightsForm">
          @csrf
          
          <div class="row mt-3">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
              <h4 class="text-red">GET FREIGHT QUOTES</h4>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <div class="shadow h-100">
                <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tbl-tr table tbl-get">
                  <tbody>
                    <tr>
                      <td class="f6">Freight Mode</td>
                      <td class="">
                        <input name="freights_type" type="radio" value="sea" onclick="sea()" required> &nbsp;Sea
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div id="sea">
                  <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tbl-tr table tbl-get">
                    <tbody>
                      <tr>
                        <td class="f5">Cargo Type</td>
                        <td class="">
                          <input name="freights[sea][req_type]" value="exp" type="radio" data-sea-input> &nbsp;Indian Export &nbsp;&nbsp;
                          <input name="freights[sea][req_type]" type="radio" value="imp"> &nbsp;Indian Import
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">From &nbsp;</td>
                        <td>
                          <input name="freights[sea][exp_from]" type="text" data-sea-input>
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">To&nbsp;</td>
                        <td>
                          <input name="freights[sea][exp_to]" type="text">
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Tentative Shipment Date</td>
                        <td class="">
                          <select name="freights[sea][shipment_day]" data-sea-input>
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
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                          <select name="freights[sea][shipment_month]" data-sea-input>
                            <option value="">Mon</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                          </select>
                          <select name="freights[sea][shipment_year]" data-sea-input>
                            <option value="">Year</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
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
                        <td class="f5">Commodity Details</td>
                        <td><input name="freights[sea][commodity_detail]" class="f4" data-sea-input></td>
                      </tr>
                      <tr>
                        <td class="f5">Container Size&nbsp;</td>
                        <td class="">
                          <input name="freights[sea][container_size]" type="radio" value="10'" data-sea-input> 10' 
                          <input name="freights[sea][container_size]" type="radio" value="20'"> 20' 
                          <input name="freights[sea][container_size]" type="radio" value="30'"> 30' 
                          <input name="freights[sea][container_size]" type="radio" value="40'"> 40' 
                          <input name="freights[sea][container_size]" type="radio" value="50'"> 50'
                          <input name="freights[sea][container_size]" type="radio" value="LCL"> LCL 
                          <input name="freights[sea][container_size]" type="radio" value="Others on Details"> Others on Details
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Cargo Status&nbsp;</td>
                        <td class="">
                          <input name="freights[sea][cargo_status]" type="radio" value="General" data-sea-input> General 
                          <input name="freights[sea][cargo_status]" type="radio" value="Hazards"> Hazardous 
                          <input name="freights[sea][cargo_status]" type="radio" value="Reefer"> Reefer <br>
                          <input name="freights[sea][cargo_status]" type="radio" value="Over Dimension"> Over Dimension 
                          <input name="freights[sea][cargo_status]" type="radio" value="Open Top"> Open Top
                          <input name="freights[sea][cargo_status]" type="radio" value="More on Details"> More on Details
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Quantity</td>
                        <td class="">
                          <input name="freights[sea][quantity]" type="text"  maxlength="20" data-sea-input>Unit
                          <select name="freights[sea][quantity_unit]" data-sea-input>
                            <option selected="selected" value="CNTR">CNTR</option>
                            <option value="BOX">BOX</option>
                            <option value="EA">EA</option>
                            <option value="PCS">PCS</option>
                            <option value="DRUM">DRUM</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Weight</td>
                        <td class="">
                          <input name="freights[sea][weight]" type="text" maxlength="20" data-sea-input>Unit
                          <select name="freights[sea][weight_unit]" data-sea-input>
                            <option selected="selected" value="MT">MT</option>
                            <option value="KG">KG</option>
                            <option value="LBS">LBS</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Volume</td>
                        <td class="">
                          <input name="freights[sea][volume]" maxlength="20" type="text" data-sea-input>Unit
                          <select name="freights[sea][volume_unit]" data-sea-input>
                            <option value="CBM" selected="selected">CBM</option>
                            <option value="CBF">CBF</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Payment</td>
                        <td class="">
                          <input name="freights[sea][payment]" type="radio" value="Prepaid" data-sea-input> Prepaid 
                          <input name="freights[sea][payment]" type="radio" value="Collect" > Collect 
                          <input  name="freights[sea][payment]" type="radio" value="others"> Others
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Transit time required</td>
                        <td><input name="freights[sea][transit_time]" type="text" data-sea-input></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <div class="shadow h-100">
                <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tbl-tr table tbl-get">
                  <tbody>
                    <tr>
                      <td class="f4">Freight Mode</td>
                      <td class="">
                        <input type="radio" value="air" name="freights_type" onclick="air()"> &nbsp;Air
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div id="air">
                  <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tbl-tr table tbl-get">
                    <tbody>
                      <tr>
                        <td class="f5">Cargo Type</td>
                        <td class="">
                          <input name="freights[air][req_type]" value="exp" type="radio" data-air-input> &nbsp;Indian Export &nbsp;&nbsp;
                          <input name="freights[air][req_type]" type="radio" value="imp"> &nbsp;Indian Import
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">From &nbsp;</td>
                        <td>
                          <input name="freights[air][exp_from]" type="text" data-air-input>
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">To&nbsp;</td>
                        <td>
                          <input name="freights[air][exp_to]" type="text">
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Tentative Shipment Date</td>
                        <td class="">
                          <select name="freights[air][shipment_day]" data-air-input>
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
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                          <select name="freights[air][shipment_month]" data-air-input>
                            <option value="">Mon</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                          </select>
                          <select name="freights[air][shipment_year]" data-air-input>
                            <option value="">Year</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
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
                        <td class="f4">Preferred Airline</td>
                        <td><input type="text" name="freights[air][preferred_airline]" data-air-input></td>
                      </tr>
                      <tr>
                        <td class="f4">Product Description&nbsp;</td>
                        <td class="">
                          <textarea rows="2" name="freights[air][product_desc]" data-air-input></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td class="f4">Average Dimensions/per cubic foot&nbsp;</td>
                        <td class="">
                          <input name="freights[air][dimension_l]" type="text" class="cub-w" data-air-input> L 
                          <input name="freights[air][dimension_w]" type="text" class="cub-w" data-air-input> W
                          <input name="freights[air][dimension_h]" type="text" class="cub-w" data-air-input> H
                        </td>
                      </tr>
                      <tr>
                        <td class="f4">No. of Pieces</td>
                        <td class="">
                          <input type="text" name="freights[air][no_of_pieces]" data-air-input>
                        </td>
                      </tr>
                      <tr>
                        <td class="f5">Weight</td>
                        <td class="">
                          <input name="freights[air][weight]" type="text" maxlength="20" data-sea-input>Unit
                          <select name="freights[air][weight_unit]" data-sea-input>
                            <option selected="selected" value="MT">MT</option>
                            <option value="KG">KG</option>
                            <option value="LBS">LBS</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="f4">Are goods temperature controlled?</td>
                        <td class="">
                          <input type="radio" name="freights[air][goods_temperature_controlled]" value="Yes" data-sea-input> Yes 
                          <input type="radio"  name="freights[air][goods_temperature_controlled]" value="No"> No
                        </td>
                      </tr>
                      <tr>
                        <td class="f4">Offer Validity</td>
                        <td class="">
                          <select name="freights[air][offer_validity_day]" data-air-input>
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
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                          <select name="freights[air][offer_validity_month]" data-air-input>
                            <option value="">Mon</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                          </select>
                          <select name="freights[air][offer_validity_year]" data-air-input>
                            <option value="">Year</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
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
                        <td class="f5">Payment</td>
                        <td class="">
                          <input name="freights[air][payment]" type="radio" value="Prepaid" data-air-input> Prepaid 
                          <input name="freights[air][payment]" type="radio" value="Collect" > Collect 
                          <input  name="freights[air][payment]" type="radio" value="others"> Others
                        </td>
                      </tr>
                      <tr>
                        <td class="f4">Aiming Freight</td>
                        <td><input type="text" name="freights[air][aiming_freight]" data-air-input></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3 text-center">
              <button type="submit" class="btn btn-success">Save</button>
              <button type="button" class="btn btn-danger">Reset</button>
              
              <div id="userDetailModal" class="modal fade">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User Detail</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control shadow" placeholder="Name" name="user_name" id="freights_user_name" data-freights-user>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control shadow" placeholder="Email Address" name="user_email" id="freights_user_email" data-freights-user>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="number" class="form-control shadow" placeholder="Contact No." name="contact_no" id="freights_contact_no" data-freights-user>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-default" data-user-detail-close-btn>Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    @include('footer')
    @include('javascript')
  </body>
  <script>
    var isLogin = '{{ (Auth::check() ? 1 : 0) }}';
    var isModalOpen = 0;
    
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
    
    function sea() {  
        $("#air :input").prop("disabled", true); 
        $("#sea :input").prop("disabled", false); 
    }
    
    function air() {  
        $("#sea :input").prop("disabled", true); 
        $("#air :input").prop("disabled", false); 
    } 
    
    $('[data-user-detail-close-btn]').click(function() {
        isModalOpen = 0;
        $('#userDetailModal').modal('hide');
    });
    
    $('#freightsForm').submit(function(e) {
        e.preventDefault();
        $('[data-freights-user]').prop('required', false);
        
        if(isModalOpen == 0 && isLogin == 0){
            $('[data-freights-user]').prop('required', true);
            $('#userDetailModal').modal('show');
            isModalOpen = 1;
        }else{
            $('#freightsForm').unbind().submit();
        }
    });
  </script>
</html>
@else
@include('503')
@endif