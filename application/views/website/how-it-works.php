<!--Breadcrumbs Section-->
	<div class="bannerimg cover-image bg-background3 z-inex-1" data-image-src="assets/images/banners/banner-1.jpg">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white ">
					<h1 class="">How it works</h1>
				</div>
			</div>
		</div>
	</div>
	<!--Breadcrumbs Section-->

	<!--Section-->
	<section class="border-top bg-white works-section">
		<div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="tabbable-panel">
		                <div class="tabbable-line">
		                    <ul class="nav nav-tabs justify-content-center">
		                        <li class="active box-shadow bg-white">
		                            <a href="#car_tab1" data-toggle="tab" class="btn btn-toggle active">Buy </a>
		                        </li>
		                        <li class="box-shadow bg-white">
		                            <a href="#car_tab2" data-toggle="tab" class="btn btn-toggle">Sell </a>
		                        </li>
		                    </ul>
		                    <div class="tab-content sptb">
		                        <div class="tab-pane active" id="car_tab1">
		                            <div class="row">
		                                <?php 
												for ($i=1; $i < 4; $i++) { ?>
		                                <div class="col-md-4">
		                               		<div class="card">
		                                        <div class="card-body">
		                                        	<h3 class="card-title mb-3 font-weight-bold">Where does it come from?</h3>
													<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
													<a href="#" class="btn btn-blue btn-sm ml-auto py-2 px-4 fs-15">Read More </a>
												</div>
		                                    </div>
		                                </div>
		                                <?php }

												?>
		                                <div class="col-md-12 mt-5 text-center">
		                                    <a href="<?php echo base_url('Website/buy')?>" class="btn btn-blue btn-lg">Find out how to buy</a>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="tab-pane" id="car_tab2">
		                        	<div class="row">
		                                <?php 
												for ($i=1; $i < 4; $i++) { ?>
		                                <div class="col-md-4">
		                                    <div class="card">
		                                        <div class="card-body">
		                                        	<h3 class="card-title mb-3 font-weight-bold">Where can I get some?</h3>
													<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary. </p>
													<a href="#" class="btn btn-blue btn-sm ml-auto py-2 px-4 fs-15">Read More </a>
												</div>
		                                    </div>
		                                </div>
		                                <?php }

												?>
		                                <div class="col-md-12 mt-5 text-center">
		                                    <a href="<?php echo base_url('Website/sell')?>" class="btn btn-blue btn-lg">Find out how to sell</a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
	<!--Section-->