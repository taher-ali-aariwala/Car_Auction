<div class="side-app">

	<div class="row">

		<div class="col-md-12">

			<div class="card">

				<div class="card-body">

					<div class="item2-gl">

						<div class="item2-gl-nav d-flex align-items-center mb-4">
		                    <h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">My Purchases</h3>
		                </div>
		                
						<?php

						if(!empty($all_awarded_auctions)){

						foreach($all_awarded_auctions as $auction){

						$array = array();

						foreach($all_dealer_purchase as $value){

						$array[] = $value->id;

						}

						if (in_array($auction->id, $array)){  

						?>

						<div class="card">

							<div class="d-md-flex align-items-center">

								<div class="item-card9-img">

									<div class="item-card9-imgs">

										<a class="link" href="#"></a>

										<?php

											if(!empty($all_main_images)){

											foreach($all_main_images as $allmainimage){

                                            ?>

                                        <?php if(($allmainimage->car_auction_id) == ($auction->id) ){ ?> 

										<img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $allmainimage->media; ?>" alt="img" class="cover-image show-cart-img">

										<?php } ?>

    								    <?php } } ?>

									</div>

								</div>

								<div class="card border-0 mb-0">

									<div class="card-body ">

										<div class="row payment-card align-items-center">

											<div class="col-lg-2 card-content">

												<a href="<?php echo base_url()?>/website/auction_details/<?=$auction->id?>" class="text-dark"><h4 class="font-weight-bold fs-12 mb-2"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4></a>

												<ul>

													<li class="pb-1">

														<span class="d-flex align-items-center fs-12 text-dark"><?= $auction->registration_date; ?></span>

													</li>

													<li class="pb-1">

														<span class="d-flex align-items-center text-dark"><?= $auction->mileage; ?> KM</span>

													</li>

												</ul>

											</div>

											

											<div class="col-lg-5 d-flex won-hotline justify-content-around align-items-center">

												

												<h4 class="m-0 fs-20 font-weight-bold text-center payment-done-heading text-green">WELL DONE! <br>PAYMENT COMPLETED!<br> </h4>

                                                <img src="../assets/images/media/payment-done.gif" alt="img" class="cover-image pyment-gif">

											</div>

                                            <div class="col-lg-3">

                                                <div class="d-flex align-items-center justify-content-center p-2 won-date">

                                                    <i class="fas fa-calendar-check mr-3 fs-28 text-danger"></i><span class="font-weight-semibold fs-20 text-dark">08/12/2021</span>

                                                </div>

                                            </div>

                                            <div class="col-lg-2">

                                                <a href="<?php echo base_url();?>Website/auction_details/<?php echo $auction->id;?>" class="text-uppercase px-2 btn bg-primary btn-block text-white"><i class="far fa-eye"></i> see details</a>

                                            </div>

										</div>

									</div>

								</div>

							</div>

                            <div class="check-payment-content">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div>

                                            <button type="button" class="btn btn-block d-flex justify-content-around align-items-center text-uppercase fs-22 font-weight-semibold p-0 btn-blue collapsed" data-toggle="collapse" data-target="#collapseExample<?php echo $auction->id;?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-angle-down"></i>Proceed to Payment<i class="fas fa-angle-down"></i></button>

                                            <div id="collapseExample<?php echo $auction->id;?>" class="collapse" style="">

                                                <div class="row no-gutters">

                                                    <div class="col-lg-6">

														<div class="payment-content-wrap">

															

                                                    <?php

													 $invce = $auction->invocie; 

													 if($invce !='null'){

													 ?>

													<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->invocie;?>" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn" download="<?php echo $auction->invocie;?>"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download Invoice</a>

                                                    <?php } else { ?>

                                                     

													<a href="javascript:void(0);" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download Invoice Not Available</a>

                                                    <?php } ?>

													<?php

													 $ownership = $auction->change_of_ownership; 

													 if($ownership !='null'){

													 ?>

													

													<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->change_of_ownership;?>" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn" download="<?php echo $auction->change_of_ownership;?>"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download Change of <br> ownership completed</a>

                                                    <?php } else { ?>

												

													<a href="javascript:void(0);" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download Change of <br> ownership completed Not Available</a>

												    <?php } ?>

												

													<a href="#" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-shuttle-van mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Request transportation</a>

															<!-- The Modal -->

															<div class="modal fade" id="myModal">

																<div class="modal-dialog modal-md">

																	<div class="modal-content">

																		<!-- Modal Header -->

																		<div class="modal-header pb-0 border-0">

																			<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">×</button>

																		</div>

																		

																		<!-- Modal body -->

																		<div class="modal-body pt-0 text-center enter-images-field">

																			<div>

																				<h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-5">A Car Transport Quote</h3>

																				

																				<form action="">

																					<div class="form-group ">

																						<div class="row align-items-center">

																							<div class="col-md-5">

																								<label class="form-label font-weight-semibold mb-0 fs-16 text-primary text-left" id="examplenameInputname2">Company Name :</label>

																							</div>

																							<div class="col-md-7">

																								<input type="text" class="form-control" id="examplenameInputname3" placeholder="Enter Name">

																							</div>

																						</div>

																					</div>

																					<div class="form-group ">

																						<div class="row align-items-center">

																							<div class="col-md-5">

																								<label class="form-label font-weight-semibold mb-0 fs-16 text-primary text-left" id="examplenameInputname2">Email Address :</label>

																							</div>

																							<div class="col-md-7">

																								<input type="text" class="form-control" id="examplenameInputname3" placeholder="Enter Email">

																							</div>

																						</div>

																					</div>

																					<div class="form-group ">

																						<div class="row align-items-center">

																							<div class="col-md-5">

																								<label class="form-label font-weight-semibold mb-0 fs-16 text-primary text-left" id="examplenameInputname2">Telephone :</label>

																							</div>

																							<div class="col-md-7">

																								<input type="text" class="form-control" id="examplenameInputname3" placeholder="Enter Telephone">

																							</div>

																						</div>

																					</div>

																					<div class="form-group mb-5">

																						<div class="row align-items-center">

																							<div class="col-md-5">

																								<label class="form-label font-weight-semibold mb-0 fs-16 text-primary text-left" id="examplenameInputname2">Address :</label>

																							</div>

																							<div class="col-md-7">

																								<input type="text" class="form-control" id="examplenameInputname3" placeholder="Enter Address">

																							</div>

																						</div>

																					</div>

																				</form>

																				<a href="" class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-5 d-block">Send <i class="fas fa-paper-plane text-white pl-3"></i></a>

																				

																				</div>

																			</div>

																	</div>

																</div>

															</div>

														</div>

														

                                                    </div>

                                                    <div class="col-lg-6">

														<div class="payment-content-wrap">

															<?php

															$authr = $auction->autherization_documents; 

															if($authr !='null'){

															?>

														

															<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->autherization_documents;?>" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn" download="<?php echo $auction->autherization_documents;?>"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download Collection <br>  Authorization / Delivery Document</a>

															

															<?php } else {?>

															

															<a href="javascript:void(0);" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Collection Authorization/Delivery<br> Document Not Available</a>

                                                            <?php } ?>

														

															<?php

															$reposrtd = $auction->report_of_delivery; 

															if($reposrtd !='null'){

															?>

															<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->report_of_delivery;?>" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn" download="<?php echo $auction->report_of_delivery;?>"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download report of delivery</a>

															<?php } else { ?>

																<a href="javascript:void(0);" class="bg-primary text-white text-capitalize d-flex align-items-center justify-content-center upload-btn"><i class="fas fa-cloud-download-alt mr-4 upload-icon d-flex justify-content-center align-items-center"></i>Download report of delivery Not Available</a>

															

															<?php } ?>

														</div>

                                                    </div>

                                                </div>

												<div class="row">

													<div class="col-md-6 m-auto">

														<div class="text-center">

															<a class="btn-sell fs-16 text-capitalize d-flex align-items-center justify-content-center" href="<?php echo base_url();?>Website/auction_details/<?php echo $auction->id;?>">Look at the details and <br> photos of the car purchased</a>

														</div>

													</div>

												</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

								

                            </div>

                            

						</div>

						<?php } } }?>

					</div>

				</div>

            </div>

		

		</div>

	</div>

</div>