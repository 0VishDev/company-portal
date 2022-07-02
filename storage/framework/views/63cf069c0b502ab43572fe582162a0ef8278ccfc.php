<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo e($allsettings->site_title); ?></title>
  <style>
      th {
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td {
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}
  </style>
  <?php if($view_name != 'product'): ?>
<meta name="description" content="<?php echo e($allsettings->site_desc); ?>">
<meta name="keywords" content="<?php echo e($allsettings->site_keywords); ?>">
<?php endif; ?>
  <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <style>
  
    .goog-te-combo {
    color: #fff;
    margin: 4px 0;
    width: 80%;
    border-radius: 20px;
    background-color: gray;
    padding-left: 10px;
    margin:-7px;
    }
    .goog-logo-link {
    display:none !important;
    } 
        
    .goog-te-gadget{
        color: transparent !important;
    }

  </style>
  <script>
    function myFunction1(event) {
      document.getElementById("myDropdown1").classList.toggle("show1");
      event.preventDefault()
    }
  </script> 
  <!--Facebook Open graph starts-->
    <meta property="og:title" content="Infobiz world trade Exporters, Manufacturers, Suppliers Directory, B2B Business Directory"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=" https://www.businessworldtrade.com"/>
    <meta property="og:site_name" content=" BusinessWorldTrade"/>
<meta property="article:publisher" content=" https://www.facebook.com/BusinessWorldTrade " />
<meta property="article:modified_time" content="2020-12-01T08:20:59+00:00" />
    <meta property="og:image" content="https://www.businessworldtrade.com/public/storage/slideshow/1603859644.jpg"/>
    <meta property="og:description" content=" businessworldtrade.com is the largest B2B platform in India. The marketplace serves as a forum for buying goods in India, trading with Indian producers, suppliers, exporters and service providers, and helping to expand their business worldwide."/>
    <meta property="fb:app_id" content="948338049022975"/>
    <!--Facebook Open graph Close -->
	
	<!--Twitter Card Starts-->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@ BusinessWorldTrade"/>
	<meta name="twitter:title" content=" Infobiz world trade Exporters, Manufacturers, Suppliers Directory, B2B Business Directory"/>
	<meta name="twitter:description" content="businessworldtrade.com is the largest B2B platform in India. The marketplace serves as a forum for buying goods in India, trading with Indian producers, suppliers, exporters and service providers, and helping to expand their business worldwide."/>
	<meta name="twitter:image" content=" https://www.businessworldtrade.com/public/storage/slideshow/1603859644.jpg "/>
	<meta name="twitter:url" content=" https://www.businessworldtrade.com "/>
	<!--End Twitter card tag -->
</head>

<body>
     <br><br><br><br>
     <div class="container d-none d-md-block">
         <div class="row">
             <div class="col-sm-12 col-md-12">
                 <h4 class="text-center user_register line-1 anim-typewriter">Displaying Export Data </h4>
             </div>
         </div>
     </div>
     
     <section style="overflow-x:auto;" class="export-table export-table-space d-none d-md-block">
          <!--for demo wrap-->
          <div class="row" style="padding:20px;">
              <div class="col-sm-12 col-md-5">
                  <h2 style="color:#fff;" class="">Show Export Data Table</h2>
                  
              </div>
              <div class="col-sm-12 col-md-4">
                  <a href="<?php echo e(url('export_filter')); ?>" style="float:right;padding-left:10px;" type="btn" class="btn btn-success btn-md">Back After Search</a>
             </div>
              <div class="col-sm-12 col-md-3">
                  <form class="example" action="<?php echo e(url('export_filter')); ?>" method="get">
                      <?php echo e(csrf_field()); ?>

                  <input type="search" placeholder="Search..by line serial no." class="form-control" name="search">
                  <!--<button type="submit"><i class="fa fa-search"></i></button>-->
                </form>
              </div>
          </div>
          
          <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
              <thead>
                <tr>
                  <th class="exportth">SB Date</th>
                  <th class="exportth">Container No</th>
                  <th class="exportth">Line Serial No</th>
                  <th class="exportth">Gross Weight/Kg</th>
                  <th class="exportth">Net_weight</th>
                  <th class="exportth">VGM Weight</th>
                  <th class="exportth">Shb No.</th>
                  <th class="exportth">Invoice Date</th>
                  <th class="exportth">Consinee Name</th>
                  <th class="exportth">Shipper Name</th>
                  <th class="exportth">POD</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
              <tbody>
                <?php $__currentLoopData = $export_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $export): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td><?php echo e($export->sb_date); ?></td>
                  <td><?php echo e($export->container_no); ?></td>
                  <td><?php echo e($export->line_serial_no); ?></td>
                  <td><?php echo e($export->gross_weight_kg); ?></td>
                  <td><?php echo e($export->net_weight_kg); ?></td>
                  <td><?php echo e($export->vgm_weight); ?></td>
                  <td><?php echo e($export->shb_no); ?></td>
                  <td><?php echo e($export->invoice_date); ?></td>
                  <td><?php echo e($export->consinee_name); ?></td>
                  <td><?php echo e($export->shipper_name); ?></td>
                  <td><?php echo e($export->pod); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
    </section>
    
    <script type="text/javascript">
      window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
        	theme: "dark2", // "light2", "dark1", "dark2"
        	animationEnabled: true,
        	 // change to true		
        	title:{
        		text: "Export Data Graph (With VGM Weight)"
        	},
        	data: [
        	{
        		// Change type to "bar", "area", "spline", "pie",etc.
        		type: "column",
        		indexLabel:" V.W. ({y}) ",
        		dataPoints: <?php echo json_encode($chart, JSON_NUMERIC_CHECK); ?>
        	}
        	]
        });
        chart.render();
        
        }
   </script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
    <script>
window.onload = function() {

var dataPoints = [];

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2",
	title: {
		text: "Export Data Graph (Exports Users)"
	},
	data: [{
		type: "spline",
		dataPoints: dataPoints
	}]
});
updateData();

// Initial Values
var xValue = 0;
var yValue = 10;
var newDataCount = 6;

function addData(data) {
	if(newDataCount != 1) {
		$.each(data, function(key, value) {
			dataPoints.push({x: value[0], y: parseInt(value[1])});
			xValue++;
			yValue = parseInt(value[1]);
		});
	} else {
		//dataPoints.shift();
		dataPoints.push({x: data[0][0], y: parseInt(data[0][1])});
		xValue++;
		yValue = parseInt(data[0][1]);
	}
	
	newDataCount = 1;
	chart.render();
	setTimeout(updateData, 1500);
}

function updateData() {
	$.getJSON("https://canvasjs.com/services/data/datapoints.php?xstart="+xValue+"&ystart="+yValue+"&length="+newDataCount+"type=json", addData);
}

}
</script>
     <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/latest-package/export-data.blade.php ENDPATH**/ ?>