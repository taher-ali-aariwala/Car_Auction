<div class="side-app">

	<div class="row">

		<div class="col-md-12">

			<div class="card">

				<div class="card-body">

					<div class="item2-gl">

						<div class="item2-gl-nav d-flex align-items-center mb-4">
		                    <h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">Auctions Won</h3>
		                </div>
		                
                        <?php

                            if(!empty($all_awarded_auctions)){

                            foreach($all_awarded_auctions as $auction){

                                $array = array();

                                foreach($all_dealer_awarded_auction as $value){

							        $array[] = $value->id;

							    }

							     

							    if (in_array($auction->id, $array)){  

                        ?>

						<div class="card">

							<div class="d-md-flex align-items-center no-gutters">

								<div class="col-lg-4 col-md-4 col-xl-4 item-card9-img">

                                    <div class="item-card9-imgs">

										<a class="link" href="#"></a>

										<div class="auction-img-box" style="max-height:250px">

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

									<div class="card-body py-2 px-3">

										<div class="row payment-card">

											<div class="col-lg-4 card-content">

												<a href="<?php echo base_url()?>/website/auction_details/<?=$auction->id?>" class="text-dark"><h4 class="font-weight-bold mb-3"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4></a>

												<ul>

													<li class="pb-3">

														<span class="d-flex align-items-center text-dark"><i class="fas fa-car mr-3"></i><?= $auction->engine_power; ?> <?= $auction->fuel_type; ?></span>

													</li>

													<li class="pb-3">

														<span class="d-flex align-items-center text-dark"><i class="fas fa-calendar-alt mr-3"></i><?= $auction->registration_date; ?></span>

													</li>

													<li class="pb-3">

														<span class="d-flex align-items-center text-dark"><i class="fas fa-tachometer-alt mr-3"></i><?= $auction->mileage; ?> KM</span>

													</li>

												</ul>

											</div>

											<div class="col-lg-8">

                                                <div class="row justify-content-end">

													<div class="col-lg-7">

														<div class="user-winner-content text-center d-inline-block">

															<div class="d-flex align-items-center mb-3">

																<p class="mb-0"><i class="fas fa-trophy fs-32 trophy-icon bg-danger mr-2"></i></p>

																<span class="d-block fs-24 text-red font-weight-bold">YOU WON !</span>

															</div>

															<span class="d-block fs-14 font-weight-bold text-red mb-3">YOUR OFFER WAS THE BEST:</span>

															<span class="mb-3 fs-22 text-white bg-dark-blue user-won-price"><?=number_format($auction->dealer_price , 0, ',', '.');?><i class="fas fa-euro-sign"></i></span>

														</div>

                                                    </div>

                                                    <div class="col-lg-5">

														

														<a href="<?= base_url(); ?>Website/auction_details/<?= $auction->id; ?>" class="text-uppercase card-active-btn mb-5 fs-16">see car</a>

                                                        

															<span class="fs-13 d-flex bg-red flex-column Auction-expired justify-content-center auction-end pyment-auction-end mt-0 p-3">

																<span class="text-white d-flex flex-column justify-content-center pb-1 align-items-center fs-14"><span class="fas fa-ban mb-1 fs-20"></span><p class="mb-0">Auction expired</p></span>

															</span>

                                                    </div>

                                                </div>

											</div>

                                            

										</div>

									</div>

								</div>

							</div>

                            

						</div>

                        <?php  } } } ?>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>