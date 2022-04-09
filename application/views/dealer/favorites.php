<div class="side-app">

	<div class="row">

		<div class="col-md-12">

			<div class="card">

				<div class="card-body">

					<div class="item2-gl">

						<div class="item2-gl-nav d-flex align-items-center mb-4">
		                    <h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">Favorites</h3>
		                </div>

					    <?php
                            if(!empty($all_auctions)){
                            foreach($all_auctions as $auction){
                                $array = array();
                                foreach($all_favorite as $value){
							        $array[] = $value->car_auction_id;
							    }
							     
							    if (in_array($auction->id, $array)){  
                        ?>
                        
						<div data-timer="<?=$auction->end_auction_time?>" data-id="demo<?=$auction->id;?>" class="countdownpp card">

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
    										<img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $allmainimage->media; ?>" alt="img" class="h-220">
    										<?php } ?>
    										<?php } } ?>
										</div>
									</div>

								</div>

								<div class="col-lg-8 col-md-8 col-xl-8 card border-0 mb-0">

									<div class="card-body py-2 px-3">

										<div class="row justify-content-between">

											<div class="col-lg-5 card-content">

												<a href="<?php echo base_url()?>/website/auction_details/<?=$auction->id?>" class="text-dark"><h4 class="fs-20 font-weight-bold mb-3"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4></a>

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

											<div class="col-lg-7 text-center">

												<?php
		                            				if(!empty($auction_id_latestoffer)){
		                            					$array_auc_id = array();
		                            					foreach($auction_id_latestoffer as $auctionid_latestoffer){

		                            						$array_auc_id[] = $auctionid_latestoffer['auction_id'];

		                            						

																if($auctionid_latestoffer['auction_id'] == $auction->id){ 

																	if($auctionid_latestoffer['current_offer'] !=  0 ){

																	?>


		                            								<a href="" class="offer-tagline d-block mb-5"><h5 class="fs-24">Best Current Offer:</h5>
																		<span class="fs-28"><?= number_format($auctionid_latestoffer['current_offer'] , 0, ',', '.'); ?><i class="fas fa-euro-sign pl-2"></i></span>
																	</a>
																	<?php }else{ ?>

																		<a href="" class="offer-tagline d-block mb-5"><h5 class="fs-24">Best Current Offer:</h5>
																		<span class="fs-28"><?= number_format($auction->base_price , 0, ',', '.');?><i class="fas fa-euro-sign pl-2"></i></span>
																			</a>


																	<?php }?>
		                            							<?php }else{

		                            							}

		                            					}
		                            					
		                            				}else{ ?>

		                            					<a href="" class="offer-tagline d-block mb-5"><h5 class="fs-24">Best Current Offer:</h5>
														<span class="fs-28"><?= number_format($auction->base_price , 0, ',', '.');?><i class="fas fa-euro-sign pl-2"></i></span>
															</a>

		                            				<?php } ?>



												<a href="<?= base_url(); ?>Website/auction_details/<?= $auction->id; ?>" class="text-uppercase card-active-btn bg-primary">Offer</a>											</div>
                                            <div class="col-12">
												<span class="fs-16 d-flex justify-content-between align-items-center auction-end">
													<span class="text-white"><i class="fas fa-user-clock mr-3"></i>Express In</span>
													<?php
    													$timestamp = strtotime($auction->end_auction_time);
                                                        $new_date_format = date('d/m/y', $timestamp);
													?>
													<span class="text-white"><i class="fas fa-calendar-check mr-3"></i><?= $new_date_format; ?></span>
													<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="text-white"><i class="far fa-clock mr-3"></i></span>
												</span>
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