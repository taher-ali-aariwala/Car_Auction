<!--Section-->
<?php
    if($this->session->flashdata('error_sellcar')){
         echo '<script>alert("'.$this->session->flashdata('error_sellcar').'");</script>';
    }
    if($this->session->flashdata('success_sellcar')){
         echo '<script>alert("'.$this->session->flashdata('success_sellcar').'");</script>';
    }
?>                    
		<section class="home-slider position-relative">
			<div class="container-fluid p-0">
				<div class="row justify-content-center">
                    <!-- <img src="<?= base_url(); ?>uploads/home-banner-img.jpg"  alt="img" class="w-100 img-fluid"> -->
					<div class="slider-text col-md-6 text-white mt-lg-8 mb-5">
						<h1 class="mb-3 display-3">Lets <span class="font-weight-bold">Buy</span><br> or <span class="font-weight-bold">Sell</span> your car</h1>
						<p class="fs-18">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
						<div class="row">
							<div class="col-md-6">
								<a href="<?php echo base_url('Website/buy')?>" class="btn-buy">Buy</a>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url('Website/sell')?>" class="btn-sell">Sell</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Section-->
		<!--Section-->
		<section class="sptb border-top">
			<div class="container">
				<div class="section-title center-block text-center"> 
					<h2>How it works </h2> 
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo base_url('Website/how_it_works')?>">
							<div class="bg-white p-0 border box-shadow2">
								<div class="card-body text-center">
									<div class="bg-primary-transparent icon-bg icon-service">
										<i class="fas fa-shield-alt fs-40 text-primary"></i>
									</div>
									<h6 class="fs-18 mt-4 mb-4">Do You Want to sell A Car?</h6>
									<hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
									<p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="<?php echo base_url('Website/how_it_works')?>">
							<div class="bg-white p-0 mt-5 mt-md-0 border box-shadow2">
								<div class="card-body text-center">
									<div class="bg-primary-transparent icon-bg icon-service">
										<i class="fas fa-shield-alt fs-40 text-primary"></i>
									</div>
									<h6 class="fs-18 mt-4 mb-4">Are You Looking For A Car?</h6>
									<hr class="deep-purple  accent-2 border-success mb-4 mt-0 d-inline-block mx-auto">
									<p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-12 mt-5 text-center">
						<a href="<?php echo base_url('Website/how_it_works')?>" class="btn btn-blue btn-lg">HOW IT WORKS </a>
					</div>
				</div>
			</div>
		</section>
		<!--Section-->
		<!--Section-->
		<section class="sptb bg-patterns bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>Most Popular </h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="bid-section">
					<div class="row">
						        <?php
                                    if(!empty($all_auctions)){
                                    foreach($all_auctions as $auction){
                                ?>
                                
                               
								<div data-timer="<?=$auction->end_auction_time?>" data-id="demo<?=$auction->id;?>" class="countdownpp col-lg-3 col-md-3 col-xl-3">
									<div class="card overflow-hidden">
										<div class="item-card9-img auction-list-img-box">
											<a href="<?php echo base_url('Website/auction_details/'.$auction->id)?>">
											<div class="item-card7-imgs auction-img-box">
											    <?php
                                                    if(!empty($all_main_images)){
                                                    foreach($all_main_images as $allmainimage){
                                                ?>
                                                <?php if(($allmainimage->car_auction_id) == ($auction->id) ){ ?> 
												<img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $allmainimage->media; ?>" alt="img" class="cover-image">
												<?php } ?>
												<?php } } ?>
												<div class="item-card7-overlaytext">
												    
												    
													<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="countdown text-white bg-danger d-flex justify-content-center align-items-center"><i class="far fa-clock mr-2"></i>
												
                                               </span>
												</div>
												<div class="item-tag min-width-116 max-width-120">
													<h4 class="mb-0 d-flex justify-content-center align-items-center"><?=number_format($auction->latest_bid , 0, ',', '.');?>
													    </h4>
												</div>
											 
											</div>
											</a>
											<div class="item-card9-icons" data-id="<?= $auction->id; ?>" style="bottom: -83px; right: 5px;" >
											    <?php 
											    if(!empty($all_favorite)){
    											    foreach($all_favorite as $value){
    											        $array[] = $value->car_auction_id;
    											    }
    											     
    											    if (in_array($auction->id, $array)){  ?>
    											    
													<div class="rating-stars-container">
        
														<div data-id="<?= $auction->id; ?>" class="rating-star sm">
				 
															<a class="deletefavoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" ></i></a>
															<!-- <a id="favid<?=$auction->id;?>"   style="color:white; background-color:red;" class="item-card9-icons1 deletefavoritebtn"> <i class="far fa-heart"></i></a> -->
														</div>
				
													</div>
    												<?php }else{ ?>
    												<!-- <a id="favid<?=$auction->id;?>"  style="color:white; background: #080e1b;"  class="item-card9-icons1 favoritebtn"> <i class="far fa-heart"></i></a> -->
													<div class="rating-stars-container">
        
														<div data-id="<?= $auction->id; ?>" class="rating-star sm">
				
															<a class="favoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" ></i></a>
				
														</div>
				
													</div>
    												<?php } ?>
    											<?php }else{  ?>
    											    <!-- <a id="favid<?=$auction->id;?>"  style="color:white; background: #080e1b;"  class="item-card9-icons1 favoritebtn"> <i class="far fa-heart"></i></a> -->
													<div class="rating-stars-container">
        
														<div data-id="<?= $auction->id; ?>" class="rating-star sm">
				
															<a class="favoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" style="color:black;"></i></a>
				
														</div>
				
													</div>
    											<?php } ?>
											</div>
										</div>
										<a href="<?php echo base_url('Website/auction_details/'.$auction->id)?>" class="text-dark">
											<div class="card border-0 mb-0">
												<div class="card-body pt-7">
													<div class="item-card9 text-left mb-3">
														<h3 class="font-weight-semibold mt-1 auction-slider-title fs-20"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h3>
														<p class="mb-0 leading-tight h-36"><?= $auction->engine_power; ?> <?= $auction->fuel_type; ?></p>
													</div>
													<div class="item-card9-footer d-sm-flex">
														<div class="text-left clearfix w-100">
															<span class="mt-1 mb-1 float-left mr-6" title="FuealType"><i class="fas fa-tachometer-alt fa-2x text-muted mr-1"></i><h6 class="mt-3"><?=number_format($auction->mileage , 0, ',', '.');?> Km</h6></span>
															<span class="mt-1 mb-1 float-left" title="Kilometrs"><i class="fas fa-calendar fa-2x text-muted mr-1 "></i><h6 class="mt-3"><?= $auction->registration_date; ?></h6></span>
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								
                               
								<?php
                                        }
                                    }
                                ?>
						<div class="col-md-12 mt-5 text-center">
						<a href="<?php echo base_url('Website/auction_list')?>" class="btn btn-blue btn-lg">DISCOVER ALL AUCTION</a>
					</div>
					</div>
				</div>
			</div>
		</section>
		<!--Section-->
		<!--Section-->
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block">
					<h2 class="position-relative">What they say about us</h2>
					<p class="position-relative">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="myCarousel" class="owl-carousel testimonial-owl-carousel">
							<?php 
							for ($i=1; $i < 7; $i++) { ?>
							<div class="item">
								<div class="testimonial">
									<p><i class="fa fa-quote-left"></i>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
									<div class="row">
										<div class="col">
											<h4 class="title">Lorem Ipsum</h4>
											<span class="post"></span>
											<div class="rating-stars">
												<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
												<div class="rating-stars-container">
													<div class="rating-star sm is--active">
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-star sm is--active">
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-star sm">
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-star sm">
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-star sm">
														<i class="fa fa-star"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="testimonia-img mb-3">
												<img src="<?= base_url(); ?>assets/images/users/female/11.jpg" class="img-thumbnail rounded-circle w-50" alt="">
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php }
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="text-center mt-5">
							<a class="btn btn-blue btn-lg" href="reviews.php">READ OTHER REVIEWS</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Section-->
		<!--Section-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block">
					<h2>Our company</h2>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6 col-md-6 col-6">
						<div class="company-block">
							<div class="service-card">
								<div class="servic-data mt-3">
									<h1 class="font-weight-bold mb-2">10000</h1>
									<p>Lorem Ipsum is simply dummy text </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 col-6">
						<div class="company-block border-right">
							<div class="service-card">
								<div class="servic-data mt-3">
									<h1 class="font-weight-bold mb-2">500</h1>
									<p>Lorem Ipsum is simply dummy text </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 col-6">
						<div class="company-block">
							<div class="service-card">
								<div class="servic-data mt-3">
									<h1 class="font-weight-bold mb-2">1500</h1>
									<p>Lorem Ipsum is simply dummy text </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 col-6">
						<div class="company-block">
							<div class="service-card">
								<div class="servic-data mt-3">
									<h1 class="font-weight-bold mb-2">2000</h1>
									<p>Lorem Ipsum is simply dummy text </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Section-->
		<!--Section-->
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block">
					<h2>The standard Lorem Ipsum passage</h2>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<a class="btn-sell" href="<?php echo base_url('Website/sell')?>">SELL YOUR CAR</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<a class="btn-buy" href="<?php echo base_url('Website/buy')?>">BUY</a>
					</div>
				</div>
			</div>
		</section>