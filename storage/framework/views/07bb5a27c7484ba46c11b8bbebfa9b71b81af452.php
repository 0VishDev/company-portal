<?php echo $__env->make('vendor-themes.theme-4.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<section class="popular-deals section bg-gray">
	<div class="container-fluid">
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
			    <?php if(session('success')): ?>
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
				<ul class="trending-ads-slide">
				    <?php $__currentLoopData = $shop['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <?php if($key > 7) { break; } ?>
    					<li>
    						<!-- product card -->
                            <div class="product-item bg-light">
                            	<div class="card text-center">
                            		<div class="thumb-content">
                            		    <?php if(!empty($product->product_image)): ?>
                                            <img class="card-img-top img-fluid" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                                        <?php else: ?>
                                            <img class="card-img-top img-fluid" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($product->product_name); ?>">
                                        <?php endif; ?>
                            		</div>
                            		<div class="card-body">
                            		    <h4 class="card-title"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e($product->product_name); ?></a></h4>
                            		    <p class="card-text"><button class="btn btn-theme4 btn-sm" data-send-inquiry-btn seller="<?php echo e($product->user); ?>" buyer="<?php if(Auth::check()): ?> <?php echo e(Auth::user()); ?> <?php endif; ?>" product="<?php echo e($product); ?>">Send Inquiry</button></p>
                            		</div>
                            	</div>
                            </div>
    					</li>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
	</div>
</section>


<section class="product">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-3">
				<div class="font-weight-bold text-center">
					<h2>Our Products</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 mb-3">
				<div class="row">
					<?php $__currentLoopData = $shop['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-4 col-md-6 mb-3" style="<?php echo e(($key > 8 ? 'display:none;' : '')); ?>" <?php echo e(($key > 8 ? 'data-product-list' : '')); ?>>
						<!-- ad listing list  -->
						<div class="ad-listing-list">
							<div class="row pt-3 pl-2">
								<div class="col-lg-5 align-self-center mb-3">
									<a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" title="<?php echo e($product->product_name); ?>">
										<?php if($product->product_image != ""): ?>
                                            <img class="card-img-top" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                                        <?php else: ?>
                                            <img class="card-img-top" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($product->product_name); ?>">
                                        <?php endif; ?>
									</a>
								</div>
								<div class="col-lg-7">
									<div class="row">
										<div class="col-lg-12 col-md-12 mb-3">
											<div class="ad-listing-content">
												<div>
													<h4><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="font-weight-bold" title="<?php echo e($product->product_name); ?>"><?php echo e($product->product_name); ?></a></h4>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!-- ad listing list  -->
				</div>
			</div>
			
			<?php if(count($shop['product']) > 9): ?>
				<div class="col-sm-12 col-md-12 text-center">
				    <div class="clearfix"></div><br />
				    <button type="button" class="btn btn-sm btn-theme4" id="product_show_more_btn">Show More</button>
				    <button type="button" class="btn btn-sm btn-theme4" id="product_show_less_btn" style="display: none;">Show Less</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="mt-5" id="about_us">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="font-weight-bold text-center">
					<h2>About Us</h2>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="about-content" id="about-content">
                    <?php echo $user_details->user_about; ?>

                </div>
			</div>
		</div>
	</div>
</section>

<style>
    .about-content span{
        color:#23ad6d;
        cursor: pointer;
    }
</style>

<section>
	<div class="container">
		<div class="row">
	        <?php if(count($user_details->package_tags) > 0): ?>
    	     <?php $__currentLoopData = $user_details->package_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            	    <div class="shadow vendor">
            		    <span>
            		       <?php if(!empty($packageTag->service_provider->provider_image)): ?> 
                              <img src="<?php echo e(url('/')); ?>/public/storage/service-providers/<?php echo e($packageTag->service_provider->provider_image); ?>" alt="<?php echo e($packageTag->service_provider->provider_name); ?>" />
                           <?php else: ?> 
                              <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($packageTag->service_provider->provider_name); ?>" />  
                           <?php endif; ?>
            			</span>
            		    <span>Services Package<br><span class="ven-abo"><?php echo e($packageTag->service_provider->provider_name); ?></span></span>
            		</div>
            	</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
				<div class="shadow vendor">
					<span>
						<svg id="natureof" viewBox="0 0 31 31.01">
							<path fill="#23ad6d"
								d="M6.974 30.827l-6.8-6.844a.608.608 0 0 1 0-.855l2.877-2.891a1.831 1.831 0 0 1 1.62-.5 7.5 7.5 0 0 1 6.829-3.869 7.847 7.847 0 0 1 3.036.606h6.744a2.443 2.443 0 0 1 1.885.9L26.74 13.7a2.422 2.422 0 1 1 3.686 3.143c-5.807 6.95-5.443 6.526-5.488 6.564a5.4 5.4 0 0 1-3.8 1.544H13.09a1.817 1.817 0 0 0-1.264.508l-.628.606a1.826 1.826 0 0 1-.432 1.878l-2.937 2.892a.608.608 0 0 1-.855-.008zm-3.058-9.739l-2.462 2.464 5.951 6 2.506-2.469a.608.608 0 0 0 0-.855c-5.446-5.436-5.14-5.162-5.246-5.224a.605.605 0 0 0-.749.083zm1.809-.753l4.752 4.75.515-.5a3.032 3.032 0 0 1 2.1-.849h8.048a4.2 4.2 0 0 0 2.937-1.181l5.436-6.5a1.214 1.214 0 1 0-1.855-1.567c-.023.031-.508.53-3.967 4.081a2.35 2.35 0 0 1 .023.319 2.431 2.431 0 0 1-2.424 2.423h-4.943a.606.606 0 1 1 0-1.211h4.943a1.211 1.211 0 0 0 0-2.423h-6.875a.639.639 0 0 1-.241-.053 6.676 6.676 0 0 0-2.666-.553q-.139-.006-.277-.006a6.276 6.276 0 0 0-5.506 3.27zm5.663-13.673a6.662 6.662 0 1 1 6.662 6.662 6.672 6.672 0 0 1-6.662-6.662zm1.2 0a5.451 5.451 0 1 0 5.45-5.45 5.451 5.451 0 0 0-5.446 5.45zm5.012 4.167a.6.6 0 0 1-.3-.545v-.7a2.522 2.522 0 0 1-1.1-.784.607.607 0 0 1 .931-.779 1.086 1.086 0 0 0 .787.462.606.606 0 0 0 0-1.21 1.816 1.816 0 0 1-.6-3.527v-.717h.005a.6.6 0 1 1 1.2 0v.7a2.47 2.47 0 0 1 .893.56.6.6 0 0 1-.84.871.978.978 0 0 0-.66-.318.606.606 0 0 0 0 1.211 1.816 1.816 0 0 1 .6 3.523v.712a.606.606 0 0 1-.916.545z">
							</path>
						</svg>
					</span>
					<span>Nature of Business<br><span class="ven-abo"><?php echo e($user_details->nature_of_business); ?></span></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
				<div class="shadow vendor">
					<span>
						<svg id="employee" viewBox="0 0 40.23 26.52">
							<path fill="#23ad6d"
								d="M37.55 26.449a.529.529 0 0 1-.212-.239h-4.716a.529.529 0 0 1-.917 0H30.4a.529.529 0 0 1-.961 0h-8.665a.529.529 0 0 1-.958 0h-8.657a.53.53 0 0 1-.962 0H3.229a.527.527 0 0 1-.929 0 .53.53 0 0 1-.065-.251v-3.9a2.223 2.223 0 0 1 1.228-2l1.417-.712a3.987 3.987 0 0 1-2.03-1.634.5.5 0 0 1 0-.472 9.389 9.389 0 0 0 .464-3.284c.014-.373.028-.725.049-1.043a4.593 4.593 0 0 1 4.482-4.442 4.6 4.6 0 0 1 4.484 4.447c.028.318.035.67.049 1.043a9.368 9.368 0 0 0 .465 3.284.51.51 0 0 1 0 .472 3.983 3.983 0 0 1-2.023 1.642l.508.254a2.807 2.807 0 0 1 .654-.345l3.252-1.186a.516.516 0 0 1 .14-.4l.987-1.036v-1.776A6.448 6.448 0 0 1 14.1 9.945V8.753a6.151 6.151 0 0 1-.564-2.572V5.053A5.057 5.057 0 0 1 18.586 0h7.908a.532.532 0 0 1 .529.529v5.645a6.145 6.145 0 0 1-.564 2.572v1.388a6.2 6.2 0 0 1-1.952 4.511c-.1.092-.194.184-.3.268v1.736l.986 1.036a.5.5 0 0 1 .141.4l3.082 1.115 1.065-.3c.437-.12.437-.169.437-.289v-.76a4.125 4.125 0 0 1-1.7-3.334v-.867l-.268-.544a2.763 2.763 0 0 1-.3-1.247v-.028A3.363 3.363 0 0 1 31 8.478h5.087a.532.532 0 0 1 .529.529v2.722a3.362 3.362 0 0 1-.352 1.5l-.211.423v1.008a3.884 3.884 0 0 1-1.191 2.812 4.01 4.01 0 0 1-.507.417v.725a.225.225 0 0 0 .162.212l2.184.626a2.291 2.291 0 0 1 1.648 2.148v4.372a.531.531 0 0 1-.046.239.528.528 0 0 1-.754.239zm-.212-.239a.524.524 0 0 1-.045-.239V21.6a1.169 1.169 0 0 0-.846-1.121l-2.185-.627a1.978 1.978 0 0 1-.226-.092l-1.344 1.34v4.87a.525.525 0 0 1-.069.24zm-5.633 0a.527.527 0 0 1-.07-.24V21.1l-1.343-1.342a3.009 3.009 0 0 1-.493.176l-.134.035a2.771 2.771 0 0 1 .782 1.931v4.067a.532.532 0 0 1-.048.244zm-2.267 0a.526.526 0 0 1-.047-.244V21.9a1.738 1.738 0 0 0-1.148-1.628l-3.433-1.247-1.431 2.143a1.124 1.124 0 0 1-.8.479.527.527 0 0 1-.106.007 1.1 1.1 0 0 1-.775-.317l-.874-.874v5.5a.529.529 0 0 1-.05.247zm-9.621 0a.529.529 0 0 1-.05-.247v-5.5l-.874.874a1.113 1.113 0 0 1-.775.317.527.527 0 0 1-.106-.007 1.071 1.071 0 0 1-.8-.479l-1.431-2.143-3.432 1.247a1.736 1.736 0 0 0-1.142 1.628v4.067a.526.526 0 0 1-.047.244zm-9.619 0a.526.526 0 0 1-.047-.244V21.9a2.822 2.822 0 0 1 .423-1.475L10 20.136l-.614.585a2.212 2.212 0 0 1-3.058 0l-.614-.585-1.768.881a1.155 1.155 0 0 0-.648 1.043v3.9a.53.53 0 0 1-.065.251zm6.237-8.1l1.644 2.467c.007 0 .014.007.028.014s.021 0 .028-.006l1.324-1.326-2.495-1.705zm4.676 1.148l1.325 1.326a.074.074 0 0 0 .028.006c.021 0 .028-.006.028-.014l1.643-2.467-.529-.557zm-14.429-.292a1.063 1.063 0 0 1-.127.514l.494.463a1.163 1.163 0 0 0 1.607 0l.493-.465a1.066 1.066 0 0 1-.128-.514V18.4a3.959 3.959 0 0 1-2.34 0zm24.288-.354a1.384 1.384 0 0 1-.035.317l1.2 1.2 1.2-1.205a1.5 1.5 0 0 1-.035-.311V18.4a4.006 4.006 0 0 1-1.163.176h-.121a3.756 3.756 0 0 1-1.049-.192zm-13.546-2.035l2.861 1.959 2.861-1.957v-.966a6.122 6.122 0 0 1-2.854.7c-.141 0-.275-.007-.417-.014a5.824 5.824 0 0 1-2.452-.71zm-7.352 1.318v.627a3.976 3.976 0 0 0 1.7-1.085 5.472 5.472 0 0 1-.3-1.262 3.929 3.929 0 0 1-1.4 1.72zm-6.145-.469a3.792 3.792 0 0 0 1.7 1.082v-.634a3.927 3.927 0 0 1-1.4-1.72 6.072 6.072 0 0 1-.3 1.272zm.544-3.3a.532.532 0 0 1 .529.531 2.861 2.861 0 0 0 5.688.444c-.852-1.882-3.051-2.136-3.735-2.171l-.8.824a.528.528 0 0 1-.761-.733l.951-.987a.55.55 0 0 1 .365-.162 6.738 6.738 0 0 1 2.01.317 4.791 4.791 0 0 1 2.608 1.911V14c-.006-.366-.021-.7-.041-1a3.964 3.964 0 0 0-1.071-2.467 3.286 3.286 0 0 0-4.722 0A3.923 3.923 0 0 0 4.42 13a14.5 14.5 0 0 0-.028 1 .956.956 0 0 0-.006.135.308.308 0 0 1 .068-.008zm24.244-2.294v.028a1.739 1.739 0 0 0 .183.775l.324.655a.567.567 0 0 1 .056.24v.986a2.955 2.955 0 0 0 2.787 3 2.853 2.853 0 0 0 2.946-2.854v-1.131a.54.54 0 0 1 .056-.239l.268-.536a2.37 2.37 0 0 0 .24-1.029V9.534h-4.56a2.3 2.3 0 0 0-2.3 2.3zM14.6 5.053v1.128a5.1 5.1 0 0 0 .512 2.219.7.7 0 0 1 .05.233v1.312a5.24 5.24 0 0 0 4.785 5.3 5.086 5.086 0 0 0 3.433-1.021l.006-.007c.141-.105.275-.225.41-.345a5.066 5.066 0 0 0 1.621-3.735V8.633a.506.506 0 0 1 .049-.232 4.993 4.993 0 0 0 .519-2.219V1.053H18.6a4 4 0 0 0-4 4z">
							</path>
						</svg>
					</span>
					<span>Total Number of Employees<br><span class="ven-abo"><?php echo e($user_details->no_of_employees); ?></span></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
				<div class="shadow vendor">
					<span>
						<svg id="establish" viewBox="0 0 30 30">
							<path fill="#23ad6d"
								d="M.092 29.908A.311.311 0 0 1 0 29.684v-2.026a.313.313 0 0 1 .316-.316h.7V2.658h-.7A.313.313 0 0 1 0 2.342V.316A.313.313 0 0 1 .316 0h16.2a.313.313 0 0 1 .316.316v2.026a.311.311 0 0 1-.092.224.308.308 0 0 1-.224.092h-.7v4.43h13.868a.313.313 0 0 1 .225.092.309.309 0 0 1 .091.225V9.43a.313.313 0 0 1-.316.316h-.7v17.6h.7a.313.313 0 0 1 .316.316v2.025a.308.308 0 0 1-.092.224.311.311 0 0 1-.224.092H.313a.309.309 0 0 1-.221-.095zm.54-.541h28.735v-1.392H.633zm18.734-2.024H23.8V21.9h-4.43zm-17.722 0h12.533V9.747h-.7a.313.313 0 0 1-.316-.316V7.405a.313.313 0 0 1 .316-.316h1.713V2.658H1.646zm22.693-5.984a.309.309 0 0 1 .092.224v5.759h3.924V9.747H14.81v17.6h3.924v-5.76a.312.312 0 0 1 .316-.316h5.066a.311.311 0 0 1 .221.088zM13.8 9.114h15.57V7.722H13.8zM.633 2.025H16.2V.633H.633zm11.834 23.924H9.429a.312.312 0 0 1-.316-.316V22.6a.313.313 0 0 1 .087-.23.317.317 0 0 1 .225-.092h3.038a.319.319 0 0 1 .225.092.313.313 0 0 1 .091.225v3.038a.312.312 0 0 1-.313.316zm-2.722-.633h2.4v-2.4h-2.4zm-2.34.633H4.367a.313.313 0 0 1-.316-.316V22.6a.313.313 0 0 1 .092-.225.317.317 0 0 1 .224-.092h3.038a.317.317 0 0 1 .224.092.313.313 0 0 1 .092.225v3.038a.313.313 0 0 1-.313.316zm-2.722-.633h2.405v-2.4h-2.4zm20.95-5.442H22.6a.313.313 0 0 1-.317-.316V16.52a.313.313 0 0 1 .317-.32h3.038a.313.313 0 0 1 .316.317v3.038a.313.313 0 0 1-.313.316zm-2.722-.633h2.4v-2.4h-2.4zm-2.343.633h-3.037a.313.313 0 0 1-.316-.316V16.52a.313.313 0 0 1 .316-.317h3.037a.313.313 0 0 1 .317.317v3.038a.313.313 0 0 1-.313.316zm-2.722-.633h2.4v-2.4h-2.4zm-5.38.633H9.429a.312.312 0 0 1-.316-.316V16.52a.313.313 0 0 1 .087-.22.317.317 0 0 1 .225-.092h3.038a.319.319 0 0 1 .225.092.313.313 0 0 1 .091.225v3.038a.311.311 0 0 1-.091.224.315.315 0 0 1-.222.092zm-2.722-.633h2.4v-2.4h-2.4zm-2.34.633H4.367a.313.313 0 0 1-.316-.316V16.52a.313.313 0 0 1 .092-.225.317.317 0 0 1 .224-.092h3.038a.317.317 0 0 1 .224.092.313.313 0 0 1 .092.225v3.038a.313.313 0 0 1-.313.316zm-2.722-.633h2.406v-2.4h-2.4zM22.6 14.81a.313.313 0 0 1-.317-.317v-3.037a.313.313 0 0 1 .317-.316h3.038a.313.313 0 0 1 .316.316v3.037a.313.313 0 0 1-.092.225.317.317 0 0 1-.224.092zm.316-.634h2.4v-2.4h-2.4zm-5.38.634a.313.313 0 0 1-.316-.317v-3.037a.313.313 0 0 1 .316-.316h3.037a.313.313 0 0 1 .317.316v3.037a.313.313 0 0 1-.317.317zm.316-.634h2.4v-2.4h-2.4zm-5.38-.38H9.429a.312.312 0 0 1-.316-.316v-3.037a.312.312 0 0 1 .316-.316h3.038a.312.312 0 0 1 .316.316v3.038a.312.312 0 0 1-.313.316zm-2.722-.633h2.4v-2.404h-2.4zm-2.34.633H4.367a.313.313 0 0 1-.316-.316v-3.037a.313.313 0 0 1 .316-.316h3.038a.313.313 0 0 1 .316.316v3.038a.313.313 0 0 1-.313.316zm-2.722-.633h2.4v-2.404h-2.4zM9.2 7.63a.312.312 0 0 1-.091-.224V4.367a.312.312 0 0 1 .316-.316h3.038a.312.312 0 0 1 .316.316v3.038a.312.312 0 0 1-.316.316H9.426A.313.313 0 0 1 9.2 7.63zm.541-.541h2.4V4.684h-2.4zm-5.6.541a.315.315 0 0 1-.092-.225V4.367a.313.313 0 0 1 .316-.316h3.04a.313.313 0 0 1 .316.316v3.038a.313.313 0 0 1-.316.316H4.363a.313.313 0 0 1-.22-.091zm.54-.541h2.407V4.684h-2.4z">
							</path>
						</svg>
					</span>
					<span>Year of Establishment<br><span class="ven-abo"><?php echo e($user_details->year_of_establishment); ?></span></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
				<div class="shadow vendor">
					<span>
						<svg id="legalstatus" viewBox="0 0 34.74 34.74">
							<path fill="#23ad6d"
								d="M13.894 34.737a.579.579 0 0 1-.58-.58v-2.315a.579.579 0 0 1 .58-.579h1.737V5.211a2.9 2.9 0 0 1-1.093-1.7 15.992 15.992 0 0 0-5.51 2.523 3.56 3.56 0 0 1-1.387.506l4.9 11.987h.772a.579.579 0 0 1 .579.58 6.376 6.376 0 0 1-6.369 6.368H6.369A6.376 6.376 0 0 1 0 19.105a.579.579 0 0 1 .579-.58h.77L6.268 6.5a4.383 4.383 0 0 1-.607-.162 3.264 3.264 0 0 1-2.114-1.96c-.039-.117-.056-.185-.056-.185a.579.579 0 0 1 1.123-.284.769.769 0 0 0 .031.1A2.125 2.125 0 0 0 6.039 5.24a2.787 2.787 0 0 0 2.353-.176c1.752-1.148 4.172-2.5 6.133-2.718a2.9 2.9 0 0 1 5.686 0c1.96.22 4.378 1.57 6.13 2.718a2.793 2.793 0 0 0 2.353.176 2.127 2.127 0 0 0 1.395-1.234.914.914 0 0 0 .03-.1.579.579 0 1 1 1.123.284s-.017.068-.056.185a3.264 3.264 0 0 1-2.11 1.959 4.352 4.352 0 0 1-.608.162l4.92 12.028h.771a.579.579 0 0 1 .58.58 6.376 6.376 0 0 1-6.369 6.368h-1.159a6.375 6.375 0 0 1-6.368-6.368.579.579 0 0 1 .579-.58h.771l4.9-11.987a3.565 3.565 0 0 1-1.393-.505 16.079 16.079 0 0 0-5.5-2.522 2.9 2.9 0 0 1-1.091 1.7v26.053h1.736a.579.579 0 0 1 .579.579v2.316a.579.579 0 0 1-.579.58zm.578-1.158h5.79v-1.158h-5.79zm3.475-2.316V5.731q-.123.025-.25.04a2.789 2.789 0 0 1-.549.011 2.892 2.892 0 0 1-.359-.05v25.531zM6.369 24.316h1.157a5.219 5.219 0 0 0 5.18-4.632h-.476a.529.529 0 0 1-.151 0H1.812a.579.579 0 0 1-.076.005.586.586 0 0 1-.076-.005h-.47a5.219 5.219 0 0 0 5.179 4.632zm20.84 0h1.158a5.218 5.218 0 0 0 5.179-4.632h-.478a.533.533 0 0 1-.068 0 .583.583 0 0 1-.085-.006H22.662a.576.576 0 0 1-.082.006.586.586 0 0 1-.083-.006h-.466a5.219 5.219 0 0 0 5.179 4.637zm4.926-5.79L27.789 7.9l-4.348 10.626zm-20.843 0L6.946 7.9 2.6 18.526zM16.5 4.389a1.681 1.681 0 0 0 1.734 0 .58.58 0 0 1 .085-.041 1.736 1.736 0 0 0 .781-1.391.583.583 0 0 1 0-.125 1.737 1.737 0 0 0-3.473.035v.055a1.735 1.735 0 0 0 .786 1.427.574.574 0 0 1 .087.04z">
							</path>
						</svg>
					</span>
					<span>Legal Status of Firm<br><span class="ven-abo"><?php echo e($user_details->legal_status_of_firm); ?></span></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
				<div class="shadow vendor">
					<span>
						<svg id="anualturn" viewBox="0 0 33.07 33.15">
							<path fill="none" stroke="#23ad6d"
								d="M2.122 32.647a1.621 1.621 0 1 1 0-3.243h28.826a1.621 1.621 0 0 1 0 3.243zm23.4-5.4a.655.655 0 0 1-.654-.655V5.831a.654.654 0 0 1 .654-.654h3.826a.654.654 0 0 1 .653.654v20.76a.655.655 0 0 1-.653.655zm-21.8 0a.654.654 0 0 1-.653-.654v-9.73a.655.655 0 0 1 .653-.655h3.823a.655.655 0 0 1 .655.655v9.725a.655.655 0 0 1-.655.654zm14.534 0a.655.655 0 0 1-.655-.654V11.615a.657.657 0 0 1 .655-.655h3.825a.655.655 0 0 1 .654.655v14.972a.654.654 0 0 1-.654.654zm-7.266 0a.656.656 0 0 1-.655-.655v-6.83a.655.655 0 0 1 .655-.655h3.824a.655.655 0 0 1 .656.655v6.83a.656.656 0 0 1-.656.655zM9.028 13.559l-7.32-3.018a1.082 1.082 0 1 1 .824-2L8.988 11.2l2.985-5.019a1.092 1.092 0 0 1 .454-.418l6.309-3.1L16.679.841a.2.2 0 0 1-.053-.215.2.2 0 0 1 .18-.126l8.288.014a.214.214 0 0 1 .194.122.217.217 0 0 1-.022.23l-5.042 6.571a.2.2 0 0 1-.35-.1L19.687 4.6l-6.016 2.962-3.3 5.549a1.081 1.081 0 0 1-1.343.447z">
							</path>
						</svg>
					</span>
					<span>Annual Turnover<br><span class="ven-abo"><?php echo e($user_details->annual_turnover); ?></span></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
				<div class="shadow vendor">
					<span>
						<svg id="gst" viewBox="0 0 29.15 32.82">
							<path fill="#23ad6d"
								d="M22.119 32.821a7.02 7.02 0 0 1-5.064-2.155h-15.1A1.953 1.953 0 0 1 0 28.719V9.18a.483.483 0 0 1 .481-.48.484.484 0 0 1 .481.48v19.526a.993.993 0 0 0 .994.994h14.32A7.043 7.043 0 0 1 23.5 18.873V8.353h-5.4a2 2 0 0 1-2-1.991v-5.4H1.955a.989.989 0 0 0-.993.993v5.308a.484.484 0 0 1-.482.481.483.483 0 0 1-.48-.481V1.955A1.959 1.959 0 0 1 1.955 0h14.616a.482.482 0 0 1 .341.138l7.4 7.4a.477.477 0 0 1 .141.339v11.279a7.038 7.038 0 0 1 3.173 11.013.481.481 0 0 1-.751-.6 6.117 6.117 0 1 0-1.282 1.2.478.478 0 0 1 .551.782 6.953 6.953 0 0 1-4 1.269zM17.058 6.368A1.031 1.031 0 0 0 18.09 7.4h4.725l-5.757-5.759zm3.968 22.882l-3.167-3.167a.483.483 0 0 1 0-.679l1.59-1.59a.483.483 0 0 1 .679 0l1.238 1.231 2.734-2.731a.486.486 0 0 1 .68 0l1.6 1.589a.483.483 0 0 1 0 .68l-4.674 4.667a.484.484 0 0 1-.68 0zm-2.146-3.506l2.487 2.488 3.975-3.987-.911-.91-2.731 2.73a.483.483 0 0 1-.679 0l-1.231-1.231zm-14.9-2.428a.481.481 0 0 1 0-.962h9.1a.481.481 0 1 1 0 .962zm0-3.469a.481.481 0 0 1 0-.962h9.077a.481.481 0 0 1 0 .962zm0-3.474a.481.481 0 0 1 0-.962H18.2a.481.481 0 1 1 0 .962zm0-3.475a.481.481 0 0 1 0-.962H18.2a.481.481 0 1 1 0 .962zm-.24-5.241c-.131 0-.24-.221-.24-.487s.109-.487.24-.487h7.11c.13 0 .239.22.239.487s-.109.487-.239.487z">
							</path>
						</svg>
					</span>
					<span>GST Number<br><span class="ven-abo"><?php echo e($user_details->gst_no); ?></span></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
		<div class="shadow vendor">
		<span>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 512 512"><path fill="#23ad6d" d="m453.332031 384h-394.664062c-32.363281 0-58.667969-26.304688-58.667969-58.667969v-266.664062c0-32.363281 26.304688-58.667969 58.667969-58.667969h394.664062c32.363281 0 58.667969 26.304688 58.667969 58.667969v266.664062c0 32.363281-26.304688 58.667969-58.667969 58.667969zm-394.664062-352c-14.699219 0-26.667969 11.96875-26.667969 26.667969v266.664062c0 14.699219 11.96875 26.667969 26.667969 26.667969h394.664062c14.699219 0 26.667969-11.96875 26.667969-26.667969v-266.664062c0-14.699219-11.96875-26.667969-26.667969-26.667969zm0 0"/>
			<path fill="#23ad6d" d="m160 192c-29.398438 0-53.332031-23.9375-53.332031-53.332031 0-29.398438 23.933593-53.335938 53.332031-53.335938s53.332031 23.9375 53.332031 53.335938c0 29.394531-23.933593 53.332031-53.332031 53.332031zm0-74.667969c-11.753906 0-21.332031 9.578125-21.332031 21.335938 0 11.753906 9.578125 21.332031 21.332031 21.332031s21.332031-9.578125 21.332031-21.332031c0-11.757813-9.578125-21.335938-21.332031-21.335938zm0 0"/>
			<path fill="#23ad6d" d="m240 298.667969c-8.832031 0-16-7.167969-16-16v-10.667969c0-14.699219-11.96875-26.667969-26.667969-26.667969h-74.664062c-14.699219 0-26.667969 11.96875-26.667969 26.667969v10.667969c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-10.667969c0-32.363281 26.304688-58.667969 58.667969-58.667969h74.664062c32.363281 0 58.667969 26.304688 58.667969 58.667969v10.667969c0 8.832031-7.167969 16-16 16zm0 0"/>
			<path fill="#23ad6d" d="m432 128h-117.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h117.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
			<path fill="#23ad6d" d="m432 213.332031h-117.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h117.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
			<path fill="#23ad6d" d="m432 298.667969h-117.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h117.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
			</span>
		<span>PAN Number<br><span class="ven-abo"><?php echo e($user_details->pan_no); ?></span></span>
		</div>
		</div>
		</div>
	</div>
</section>

<?php echo $__env->make('vendor-themes.theme-4.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a0yq2z3dupoj/public_html/resources/views/vendor-themes/theme-4/index.blade.php ENDPATH**/ ?>