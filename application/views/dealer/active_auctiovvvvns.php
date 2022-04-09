<div class="side-app">

	<div class="row">

		<div class="col-md-12">

			<div class="card">

				<div class="card-body">

					<div class="item2-gl">

						<div class="item2-gl-nav d-flex align-items-center mb-4">

							<h3 class="mb-0 text-left card-active-btn">Active auctions</h3>

						</div>

					
						<?php
                            if(!empty($all_auctions)){
                            foreach($all_auctions as $auction){
                                 
                        ?>
                        
						<div class="card">

							<div class="d-md-flex align-items-center">

								<div class="col-lg-4 col-md-4 col-xl-4 item-card9-img">

									<div class="item-card9-imgs">

										<a class="link" href="#"></a>
										<div class="auction-img-box" >
                                            <?php
                                                if(!empty($all_main_images)){
                                                foreach($all_main_images as $allmainimage){
                                            ?>
                                            <?php if(($allmainimage->car_auction_id) == ($auction->id) ){ ?> 
    										<img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $allmainimage->media; ?>" alt="img" class="cover-image">
    										<?php } ?>
    										<?php } } ?>
										</div>
									</div>

								</div>

								<div class="col-lg-8 col-md-8 col-xl-8 card border-0 mb-0">

									<div class="card-body ">

										<div class="row justify-content-between">

											<div class="col-lg-5 card-content">

												<a href="#" class="text-dark"><h4 class="fs-20 font-weight-bold mb-3"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4></a>

												<ul>

													<li class="pb-3">

														<a href="#"><span class="d-flex align-items-center text-dark"><i class="fas fa-car mr-3"></i><?= $auction->engine_power; ?> <?= $auction->fuel_type; ?></span></a>

													</li>

													<li class="pb-3">

														<a href="#"><span class="d-flex align-items-center text-dark"><i class="fas fa-calendar-alt mr-3"></i><?= $auction->registration_date; ?></span></a>

													</li>

													<li class="pb-3">

														<a href="#"><span class="d-flex align-items-center text-dark"><i class="fas fa-tachometer-alt mr-3"></i><?= $auction->mileage; ?> KM</span></a>

													</li>
												</ul>

											</div>

											<div class="col-lg-7 text-center">
												<a href="" class="offer-tagline d-block mb-5"><h5 class="fs-24">Best Current Offer:</h5>
													<span class="fs-28">98.500<i class="fas fa-euro-sign pl-2"></i></span>
												</a>
												<a href="" class="text-uppercase card-active-btn mb-5 fs-16">Offer</a>
												<!--<a href="" class="text-uppercase drop-btn card-active-btn mb-5 fs-16 border-0">Offer Ended</a>-->
											</div>
                                            <div class="col-12">
												<span class="fs-16 d-flex justify-content-between align-items-center auction-end">
													<span class="text-white"><i class="fas fa-user-clock mr-3"></i>Express In</span>
													<span class="text-white"><i class="fas fa-calendar-check mr-3"></i>3/11/2021</span>
													<span class="text-white"><i class="far fa-clock mr-3"></i>18:52:36</span>
												</span>
                                            </div>
										</div>

									</div>

								</div>

							</div>

						</div>
                        <?php  } }  ?>

						
					</div>

				</div>

			</div>

		</div>

	</div>

</div>