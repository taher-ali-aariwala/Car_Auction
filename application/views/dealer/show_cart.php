<div class="side-app">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="item2-gl">
						<div class="item2-gl-nav d-flex align-items-center mb-4">
                        	<h3 class="mb-0 text-left card-active-btn">Cart and Cash desk</h3>
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
						<div class="card mb-7">
							<div class="d-md-flex align-items-center">
								<div class="col-lg-2 col-md-2 col-xl-2 item-card9-img">
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
								<div class="col-lg-10 col-md-10 col-xl-10 card border-0 mb-0">
									<div class="card-body ">
										<div class="row payment-card">
											<div class="col-lg-2 card-content">
												<a href="#" class="text-dark"><h4 class="font-weight-bold fs-12 mb-2"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4></a>
												<ul>
													
													<li class="pb-1">
														<a href="#"><span class="d-flex align-items-center fs-12 text-dark"><?= $auction->registration_date; ?></span></a>
													</li>
													<li class="pb-1">
														<a href="#"><span class="d-flex align-items-center text-dark"><?= $auction->mileage; ?> KM</span></a>
													</li>
												</ul>
											</div>
											
											<div class="col-lg-3 d-flex won-hotline align-items-center">
												<img src="../assets/images/media/won.gif" alt="img" class="cover-image won-gif">
												<h4 class="m-0 fs-14 font-weight-bold text-center text-danger">YOU HAVE WON THE AUCTION!</h4>
											</div>
											<div class="col-lg-6">
												<div class="payment-offer">
													<div class="d-flex justify-content-around">
														<div class="payment-offer-title">
															<span>
																<h2 class="heading fs-20 font-weight-semibold m-0 text-green line-height-24"><i class="far fa-thumbs-up fs-26 pr-2"></i>Now Proceed <br> to Payment :</h2>
															</span>
														</div>
														<div class="">
															<div class="">
																<h3 class="mb-1 fs-24 text-primary"><?=number_format($auction->dealer_price , 0, ',', '.');?><i class="fas fa-euro-sign fs-22"></i></h3>
																<span>
																	<p class="m-0 text-danger font-weight-semibold fs-13">+ commission</p>
																	<p class="m-0 text-danger font-weight-semibold fs-13">+ transfer of ownership</p>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-1">
												<a href="">
													<i class="fas fa-shopping-cart show-cart-icon d-flex"></i>
													<span class="cart-notification-badge bg-green font-weight-semibold d-flex justify-content-center align-items-center fs-12 text-white">1</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <div class="check-payment-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <button type="button" class="btn btn-block d-flex justify-content-around align-items-center text-uppercase fs-22 font-weight-semibold p-0 btn-blue collapsed" data-toggle="collapse" data-target="#collapseExample<?= $auction->id; ?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-angle-down"></i>Proceed to Payment<i class="fas fa-angle-down"></i></button>
                                            <div id="collapseExample<?= $auction->id; ?>" class="collapse" style="">
                                                <div class="row no-gutters">
                                                    <div class="col-lg-6">
                                                        <div class="payment-content-wrap">
															<div class="d-flex flex-column justify-content-center align-items-center  mb-4">
																
																<form method="post" class="w-100 mb-3" action="<?php echo base_url('Dealer/pay');?>">
																	<input type="hidden" name="price" value="<?=number_format($auction->dealer_price , 0, ',', '.');?>">
																	<input type="hidden" name="auction_id" value="<?= $auction->id; ?>">
																	<button type="submit" class="btn btn-primary">PAY THE CAR NOW</button>
																</form>
																<a href="" class="btn btn-blue text-capitalize w-100 d-flex align-items-center justify-content-center fs-18 line-height-24 upload-btn"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download car <br> invoice</a>
															</div>
															<div class="card-bank-payment">
																<div class="row">
																	<div class="col-md-6 devider">
																		<div class="card-payment">
																			<a href="" class="mb-4 d-flex align-items-center">
																				<i class="fas fa-file-invoice-dollar credit-card-icon fs-18"></i><span class="font-weight-semibold fs-18 text-green">By Credit Card</span>
																			</a>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="card-payment">
																			<a href="" class="mb-4 d-flex align-items-center">
																				<i class="fas fa-file-invoice-dollar credit-card-icon fs-18"></i><span class="font-weight-semibold fs-18 text-green">By Bank Transfer</span>
																			</a>
                                                                            <p class="fs-13 font-weight-600 text-danger text-center">BELOW IS OUR IBAN TO MAKE THE TRANSFER:</p>
                                                                            <p class="fs-20 text-center font-weight-600 text-primary iban-number">ET74748738493274</p>
                                                                            <p class="fs-14 font-weight-bold text-center text-green mb-1">Total to be paid</p>
																			<p class="fs-14 font-weight-bold text-center text-green">100.000<i class="fas fa-euro-sign pl-1"></i></p>
																			<span><a href="" class="btn btn-blue text-capitalize mr-4 d-flex align-items-center upload-btn"><i class="fas fa-file-upload mr-2 upload-icon d-flex justify-content-center align-items-center"></i> Accounting <br> transfer made</a></span>
																		</div>
																	</div>
																</div>
															</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
													    <div class="payment-content-wrap">
                                                            <div class="d-flex flex-column justify-content-center align-items-center  mb-4">
																<h2 class="text-uppercase fs-18 mb-5 d-flex justify-content-center w-100 align-items-center">PAY FEES + EXPENSES NOW</h2>
																<a href="" class="btn btn-blue text-capitalize w-100 d-flex align-items-center justify-content-center fs-18 line-height-24 upload-btn"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download car <br> invoice</a>
															
                                                            </div>
															<div class="card-bank-payment">
																<div class="row">
																	<div class="col-md-6 devider">
																		<div class="card-payment">
																			<a href="" class="mb-4 d-flex align-items-center">
																				<i class="fas fa-file-invoice-dollar credit-card-icon fs-18"></i><span class="font-weight-semibold fs-18 text-green">By Credit Card</span>
																			</a>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="card-payment">
																			<a href="" class="mb-4 d-flex align-items-center">
																				<i class="fas fa-file-invoice-dollar credit-card-icon fs-18"></i><span class="font-weight-semibold fs-18 text-green">By Bank Transfer</span>
																			</a>
                                                                            <p class="fs-13 font-weight-600 text-danger text-center">BELOW IS OUR IBAN TO MAKE THE TRANSFER:</p>
                                                                            <p class="fs-20 text-center font-weight-600 text-primary iban-number">ET74748738493274</p>
                                                                            <p class="fs-14 font-weight-bold text-center text-green mb-1">Total to be paid</p>
																			<p class="fs-14 font-weight-bold text-center text-green">(Fees + Expenses) 300.000 <i class="fas fa-euro-sign pl-1"></i></p>
																			<span><a href="" class="btn btn-blue text-capitalize mr-4 d-flex align-items-center upload-btn"><i class="fas fa-file-upload mr-2 upload-icon d-flex justify-content-center align-items-center"></i> Accounting <br> transfer made</a></span>
																		</div>
																	</div>
																</div>
															</div>
                                                        </div>
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