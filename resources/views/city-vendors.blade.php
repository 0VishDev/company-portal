<?php include ("inc/header1.php"); ?>
       
	<section class="headerbg" style="background-image: url('https://b2bkart.inforidgetechnologyindia.com/public/storage/settings/1594887454191.jpg');">
      <div class="container text-left">
        <h2 class="mb-0">Supplier By Region</h2>
        <p class="mb-0"><a href="https://b2bkart.inforidgetechnologyindia.com">Home</a> <span class="split">&gt;</span> <a href="https://b2bkart.inforidgetechnologyindia.com">Gujarat</a> <span class="split">&gt;</span> <span>Disa</span></p>
      </div>
    </section>
	
<div class="container-fluid mt-3">
<div class="row">
	<div class="col-sm-12">
	<h4 class="black mb-3 pb-3 mt-4 pt-4">Industries & Manufacturing Companies In Disa
	</h4>
	</div>
</div>
</div>	
	
	<div class="container-fluid mt-3">
		<div class="bg-danger rigi-sticky mb-3">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
		<ul>
			<li><a href="#"><img src="images/icon/food.png"> Food & Beverage</a></li>
			<li><a href="#"><img src="images/icon/home.png"> Home Supplies</a></li>
			</ul>
		</div>
	</div>
		</div>
		
		<div class="shadow bg-white pr-3 pl-3 pb-4 mb-3 hub" id="foodbeverage">
	<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
		<h4 class="black pb-2 mt-2 pt-2"><img src="images/icon/food.png"> Food & Beverage(2)</h4>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-3">
			<h6>Health Food(1)</h6>
		<p><a href="#">Soya Chunks In Disa</a></p>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-3">
			<h6>Noodles(1)</h6>
		<p><a href="#">Instant Noodles In Disa</a></p>
		</div>
	</div>
			</div>
		
		<div class="shadow bg-white pr-3 pl-3 pb-4 mb-3 hub" id="homesupplies">
	<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
		<h4 class="black pb-2 mt-2 pt-2"><img src="images/icon/home.png"> Home Supplies(1)</h4>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-3">
			<h6>Safety Matches(1)</h6>
		<p><a href="#">Safety Match Box In Disa</a></p>
		</div>
	</div>
			</div>
</div>


<script>
$(function() {
    $('a.smooth-scroll').click(function() {
        if (
                window.location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&  window.location.hostname == this.hostname
        ) {
            var target = $j(this.hash);
            target = target.length ? target : $j('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 150
                }, 1000);
                return false;
            }
        }
    });
});
</script>
<?php include ("inc/footer1.php"); ?>