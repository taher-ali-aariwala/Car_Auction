<div class="side-app">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <div class="item2-gl">
                  <div class="item2-gl-nav d-flex align-items-center mb-4">
                     <h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">Active Auctions</h3>
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
                              <div class="row justify-content-center align-items-center">
                                 <div class="col-lg-4 card-content">
                                    <a href="<?php echo base_url()?>/website/auction_details/<?=$auction->id?>" class="text-dark">
                                       <h4 class="font-weight-bold mb-3"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4>
                                    </a>
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
                                 <div class="col-lg-3">
                                    <a href="" class="exprss-content">
                                       <h5>EXPRESS IN</h5>
                                       <span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="d-block mb-2"></span>
                                       <i class="far fa-clock"></i>
                                    </a>
                                 </div>
                                 <div class="col-lg-5">
                                    <div class="row">
                                       <div class="col-12">
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
                                 
                                       </div>
                                       <div class="col-12">
                                          <a href="<?=base_url() ?>/Website/auction_details/<?= $auction->id;?>" class="text-uppercase btn btn-primary btn-md btn-block fs-16">see car</a>
                                       </div>
                                       <div class="col-12">
                                          <div class="position-relative"><button type="button" style="margin: 10px 0; padding: 5px !important;" class="btn btn-success btn-block text-uppercase fs-14 font-weight-semibold" data-toggle="collapse"
                                             data-target="#demodealer<?= $auction->id;?>"
                                             >see all offers<i class="fas fa-plus pl-3"></i></button></div>
                                          <div id="demodealer<?= $auction->id;?>" class="collapse drop-table">
                                             <table class="table m-0 table-bordered">
                                                <thead>
                                                   <tr>
                                                      <th class="table-heading">Dealer Name</th>
                                                      <th class="table-heading">Offering</th>
                                                      <th class="table-heading">Time & Date</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                                                        if(!empty($all_auction_makeoffer)){
                                                            foreach($all_auction_makeoffer as $auction_makeoffer){
                                                                if($auction_makeoffer->car_auction_id == $auction->id){
                                                    ?>
                                                   <tr class="table-data">
                                                      <td class="font-weight-semibold"><?= $auction_makeoffer->dealer_name;?> <?= $auction_makeoffer->dealer_surname;?></td>
                                                      <td><?= $auction_makeoffer->makeoffer_bid;?> €</td>
                                                      <?php $old_date_timestamp = strtotime($auction_makeoffer->makeoffer_time); ?>
                                                      <td class="text-center"><span class="d-block"><?= date('d/m/y', $old_date_timestamp); ?></span><span><?= date('H:i:s', $old_date_timestamp); ?></span></td>
                                                   </tr>
                                                   <?php 
                                                                }
                                                            }
                                                        }
                                                   ?>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="position-relative">
                                             <button style="margin: 10px 0; padding: 5px !important;" type="button" class="btn btn-danger btn-block text-uppercase fs-14 font-weight-semibold" data-toggle="collapse" data-target="#autodealer<?= $auction->id;?>">See all automatic offers <i class="fas fa-plus pl-3"></i></button>
                                          </div>
                                          <div id="autodealer<?= $auction->id;?>" class="collapse drop-table">
                                             <table class="table m-0 table-bordered">
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
                                                            foreach($all_auction_autobids as $auction_autobid){
                                                                if($auction_autobid->car_auction_id == $auction->id){
                                                    ?>
                                                   <tr class="table-data">
                                                      <td class="font-weight-semibold"><?= $auction_autobid->dealer_name;?> <?= $auction_autobid->dealer_surname;?></td>
                                                      <td><?= $auction_autobid->automatic_bid;?> €</td>
                                                      <?php $old_date_timestamp = strtotime($auction_autobid->automaticbid_time); ?>
                                                      <td class="text-center"><span class="d-block"><?= date('d/m/y', $old_date_timestamp); ?></span><span><?= date('H:i:s', $old_date_timestamp); ?></span></td>
                                                   </tr>
                                                   <?php 
                                                                }
                                                            }
                                                        }
                                                   ?>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
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
         
     