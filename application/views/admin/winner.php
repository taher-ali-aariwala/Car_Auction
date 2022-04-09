<div class="side-app">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="item2-gl">
						<div class="item2-gl-nav d-flex align-items-center mb-4">
							<h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded"><span class="auction-highlight">Auctions ended !</span> Award the winners</h3>
						</div>
                        <?php
                            if(!empty($all_auctions)){
                            foreach($all_auctions as $auction){
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
											<div class="col-lg-6 card-content">
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
											<div class="col-lg-6">
                                                <div class="position-relative"><button type="button" class="btn w-100 text-uppercase fs-22 font-weight-semibold p-0 drop-btn" data-toggle="collapse"
                                                        data-target="#demo_dealer<?=$auction->id; ?>"
														><i class="fas fa-award pr-3"></i>Award Winners<i class="fas fa-plus pl-3"></i></button></div>
														<div id="demo_dealer<?=$auction->id; ?>" class="collapse drop-table">
															<table class="table m-0 table-bordered winner-table">
																<thead>
																<tr>
																	<th class="table-heading">Dealer Name</th>
																	<th class="table-heading">Offering</th>
																	<th class="table-heading">Time & Date</th>
																</tr>
																</thead>
																<tbody>
															    <?php
                                                                if(!empty($all_auction_autobids)){
                                                                	 $nocount = 1;
                                                                    foreach($all_auction_autobids as $auction_autobid){
                                                                        if($auction_autobid->car_auction_id == $auction->id){ 
                                                                        	if($nocount > 4){
                                                                        		continue;
                                                                        	}else{
                                                                ?>
																<tr class="table-data">
																	<td class="font-weight-semibold"><?= $auction_autobid->dealer_name;?> <?= $auction_autobid->dealer_surname;?></td>
																	<td><?= $auction_autobid->latest_bid;?>  €</td>
																	<td class="text-center" >
																	    <!--"-->
																		<div class="form-group m-0 d-flex justify-content-center align-items-center">
																			<label class="custom-control custom-checkbox mb-0">
																				<input type="radio" data-toggle="modal" data-target="#winnerModal<?=$auction_autobid->dealer_id?><?=$auction_autobid->car_auction_id?>" class=" custom-control-input" name="auction_dealer"  value="<?=$auction_autobid->car_auction_id?>" >
																				<span class="custom-control-label"></span>
																			</label>
																		</div>
																	</td>
																</tr>
																<?php 
                                                                    }
                                                                    $nocount++;
                                                                    }
                                                                    }
                                                                    }
                                                               ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
                                            <div class="col-12">
												<span class="fs-16 d-flex justify-content-between align-items-center auction-end">
													<span class="text-white"><i class="fas fa-user-clock mr-3"></i>Auction ended on:</span>
													<?php
    													$timestamp = strtotime($auction->end_auction_time);
                                                        $new_date_format = date('d/m/y', $timestamp);
													?>
													<span class="text-white"><i class="fas fa-calendar-check mr-3"></i><?= $new_date_format; ?></span>
													<span  id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="text-white"><i class="far fa-clock mr-3"></i></span>
												</span>
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
	
	<?php
        if(!empty($all_auctions)){
        foreach($all_auctions as $auction){
             
    ?>
                        
	<?php
    if(!empty($all_auction_autobids)){
    	 $nocount = 1;
        foreach($all_auction_autobids as $auction_autobid){
            if($auction_autobid->car_auction_id == $auction->id){ 
            	if($nocount > 4){
            		continue;
            	}else{
    ?>    
    <div class="modal fade" id="winnerModal<?=$auction_autobid->dealer_id?><?=$auction_autobid->car_auction_id?>">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header border-0">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body text-center pt-0 fs-16 text-dark">
            <img src="<?= base_url(); ?>uploads/award-winner-gif.gif" alt="img" class="cover-image award-winner-gif">
              <span class="d-block mt-3">Do you really want to award this winner?</span>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
                 <button type="button" data-auction_id="<?=$auction_autobid->car_auction_id?>" data-dealer_id="<?=$auction_autobid->dealer_id?>" data-dealer_price="<?=$auction_autobid->latest_bid?>"  class="auction_dealer btn btn-success" data-dismiss="modal">Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
    </div>    
    <?php 
    }
    $nocount++;
    }
	}
	}
   ?>
<?php  } }  ?>