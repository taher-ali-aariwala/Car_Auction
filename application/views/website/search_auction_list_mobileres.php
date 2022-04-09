<?php $this->load->view('website/layouts/header_scripts'); ?>


                <?php if(!empty($searchitem) || !empty($selected_filters['carBrand']) || !empty($selected_filters['minRegistrationDate']) || !empty($selected_filters['maxRegistrationData']) || !empty($selected_filters['minMileage']) || !empty($selected_filters['maxMileage']) || !empty($selected_filters['minPrice']) || !empty($selected_filters['maxPrice']) || !empty($selected_filters['carBodyType']) || !empty($selected_filters['carFuelType']) || !empty($selected_filters['carTransmission']) || !empty($selected_filters['carWhereisit'])){ ?>
                <div class="d-flex col-12 align-items-center flex-wrap filter-row" id="filterRow">
			        <ul class="filer_val d-flex align-items-center flex-wrap">
			               <!--         <li class="position-relative">-->
            			   <!--             <span class="filter-list-wrap mb-3" id="filter-list">-->
             			  <!--                  <span class="d-inline-block text-white"><b>Brand:</b>test</span>-->
             			                    
            			   <!--                 <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input wfbrand brandcheckbox ajaxfilter ajaxfilter_cross le-checkbox" data-id="test"  name="test" value="test"  style="opacity:1; z-index:5;" checked></div>-->
        									
        									 <!--<div class="checkdiv position-relative"><input type="checkbox" class="le-checkbox"/></div>-->
        									
            			                    <!--<a href="#" class="brandfilter filter-cross" data-value="test"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a>-->
            			   <!--             </span>-->
            			   <!--         </li>-->
            			   
            			   
            			   
            			   <?php 
			                if(!empty($searchitem)){
			                   ?>
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Search:</b><?= $searchitem; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input   ajaxfilter ajaxfilter_cross  Search_car_cancel le-checkbox" data-id="<?= $searchitem; ?>"  name="<?= $searchitem; ?>" value="<?= $searchitem; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                    <!--<a href="<?php echo base_url('Website/auction_list')?>"  class="brandfilter filter-cross"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a>-->
            			                </span>
            			            </li>
                	        <?php 
    			             
    			               }
    			            ?>
    			            
			                <?php 
			                if(!empty($selected_filters['carBrand'])){
			                   foreach($selected_filters['carBrand'] as $bkey =>$bvalue){ ?>
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Brand:</b><?= $bvalue; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input wfbrand  ajaxfilter ajaxfilter_cross_m le-checkbox" data-id="<?= $bvalue; ?>"  name="<?= $bvalue; ?>" value="<?= $bvalue; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                    <!--<a href="#" class="brandfilter filter-cross" data-value="<?= $bvalue; ?>"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a>-->
            			                </span>
            			            </li>
                	        <?php 
    			             }
    			               }
    			            ?>
    			            
    			            <?php 
			                if(!empty($selected_filters['minRegistrationDate'])){ ?>
			                 
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Min-Year:</b><?= $selected_filters['minRegistrationDate']; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="form-control select2  minyeardropdown_m ajaxfilter ajaxfilter_cross_m le-checkbox" data-dropminyearid="<?= $selected_filters['minRegistrationDate']; ?>"  name="<?= $selected_filters['minRegistrationDate']; ?>" value="<?= $selected_filters['minRegistrationDate']; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			            
    			               }
    			            ?>
    			            
    			            
    			            <?php 
			                if(!empty($selected_filters['maxRegistrationData'])){  ?>
			                 
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Max-Year:</b><?=  $selected_filters['maxRegistrationData']; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="form-control select2  maxyeardropdown_m ajaxfilter ajaxfilter_cross_m le-checkbox" data-dropmaxyearid="<?=  $selected_filters['maxRegistrationData']; ?>"  name="<?=  $selected_filters['maxRegistrationData']; ?>" value="<?=  $selected_filters['maxRegistrationData']; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                    
            			                </span>
            			            </li>
                	        <?php 
    			            
    			               }
    			            ?>
    			            
    			              <?php 
			                if(!empty($selected_filters['minMileage'])){ ?>
			                 
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Min-Mileage:</b><?= $selected_filters['minMileage']; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="form-control select2  minmileagedropdown_m ajaxfilter ajaxfilter_cross_m le-checkbox" data-dropminmileageid="<?= $selected_filters['minMileage']; ?>"  name="<?= $selected_filters['minMileage']; ?>" value="<?= $selected_filters['minMileage']; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			            
    			               }
    			            ?>
    			            
    			            
    			            <?php 
			                if(!empty($selected_filters['maxMileage'])){  ?>
			                 
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Max-Mileage:</b><?=  $selected_filters['maxMileage']; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="form-control select2  maxmileagedropdown_m ajaxfilter ajaxfilter_cross_m le-checkbox" data-dropmaxmileageid="<?=  $selected_filters['maxMileage']; ?>"  name="<?=  $selected_filters['maxMileage']; ?>" value="<?=  $selected_filters['maxMileage']; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                    
            			                </span>
            			            </li>
                	        <?php 
    			            
    			               }
    			            ?>
    			            
    			              <?php 
			                if(!empty($selected_filters['minPrice'])){ ?>
			                 
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Min-Price:</b><?= $selected_filters['minPrice']; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="form-control select2  minpricedropdown_m ajaxfilter ajaxfilter_cross_m le-checkbox" data-dropminpriceid="<?= $selected_filters['minPrice']; ?>"  name="<?= $selected_filters['minPrice']; ?>" value="<?= $selected_filters['minPrice']; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			            
    			               }
    			            ?>
    			            
    			            
    			            <?php 
			                if(!empty($selected_filters['maxPrice'])){  ?>
			                 
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Max-Price:</b><?=  $selected_filters['maxPrice']; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="form-control select2  maxpricedropdown_m ajaxfilter ajaxfilter_cross_m le-checkbox" data-dropmaxpriceid="<?=  $selected_filters['maxPrice']; ?>"  name="<?=  $selected_filters['maxPrice']; ?>" value="<?=  $selected_filters['maxPrice']; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                    
            			                </span>
            			            </li>
                	        <?php 
    			            
    			               }
    			            ?>
    			            
    			            
    			             <?php 
			                if(!empty($selected_filters['carBodyType'])){
			                   foreach($selected_filters['carBodyType'] as $btkey =>$btvalue){ ?>
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Body-Type:</b><?= $btvalue; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input ajaxfilter ajaxfilter_cross_m le-checkbox" data-bodytypeid="<?= $btvalue; ?>"  name="<?= $btvalue; ?>" value="<?= $btvalue; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			             }
    			               }
    			            ?> 
    			            
    			            
    			            <?php 
			                if(!empty($selected_filters['carFuelType'])){
			                   foreach($selected_filters['carFuelType'] as $ftkey =>$ftvalue){ ?>
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Fuel-Type:</b><?= $ftvalue; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input ajaxfilter ajaxfilter_cross_m le-checkbox" data-fueltypeid="<?= $ftvalue; ?>"  name="<?= $ftvalue; ?>" value="<?= $ftvalue; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			             }
    			               }
    			            ?> 
    			            
    			            <?php 
			                if(!empty($selected_filters['carTransmission'])){
			                   foreach($selected_filters['carTransmission'] as $tkey =>$tvalue){ ?>
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Transmission:</b><?= $tvalue; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input ajaxfilter ajaxfilter_cross_m le-checkbox" data-transmissionid="<?= $tvalue; ?>"  name="<?= $tvalue; ?>" value="<?= $tvalue; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			             }
    			               }
    			            ?> 
    			            
    			            <?php 
			                if(!empty($selected_filters['carWhereisit'])){
			                   foreach($selected_filters['carWhereisit'] as $wkey =>$wvalue){ ?>
			                       <li>
            			                <span class="filter-list-wrap mb-3" id="filter-list">
             			                    <span class="d-inline-block text-white"><b>Location:</b><?= $wvalue; ?></span>
             			                    
            			                    <div class="checkdiv position-relative"><input type="checkbox" class="custom-control-input  ajaxfilter_cross_m le-checkbox" data-whereisitid="<?= $wvalue; ?>"  name="<?= $wvalue; ?>" value="<?= $wvalue; ?>"  style="opacity:1; z-index:5;" checked></div>
        									
            			                   
            			                </span>
            			            </li>
                	        <?php 
    			             }
    			               }
    			            ?> 
    			            
    			            <li>
    			                 <a href="<?php echo base_url('Website/auction_list')?>" class="all-filter-remove d-inline-block mb-3" >Remove Filters</a>
    			            </li>
			        </ul>
			    </div>
				<?php } ?>			    
				<?php
                    if(!empty($all_auctions)){
                    foreach($all_auctions as $auction){
                        
                      
                ?>
                
               <?php

                  // Declare and define two dates
                  $date1 = strtotime($auction->auction_time);
                  $date2 = strtotime($auction->end_auction_time);
                 
                  // Formulate the Difference between two dates
                  $diff = abs($date2 - $date1);
                 
                  // To get the year divide the resultant date into
                  // total seconds in a year (365*60*60*24)
                  $years = floor($diff / (365*60*60*24));
                  
                 
                 
                  // To get the month, subtract it with years and
                  // divide the resultant date into
                  // total seconds in a month (30*60*60*24)
                  $months = floor(($diff - $years * 365*60*60*24)
                                               / (30*60*60*24));
                
                 
                  // To get the day, subtract it with years and
                  // months and divide the resultant date into
                  // total seconds in a days (60*60*24)
                  $days = floor(($diff - $years * 365*60*60*24 -
                               $months*30*60*60*24)/ (60*60*24));
                 
                 
                  // To get the hour, subtract it with years,
                  // months & seconds and divide the resultant
                  // date into total seconds in a hours (60*60)
                  $hours = floor(($diff - $years * 365*60*60*24
                         - $months*30*60*60*24 - $days*60*60*24)
                                                     / (60*60));
                 
                  // To get the minutes, subtract it with years,
                  // months, seconds and hours and divide the
                  // resultant date into total seconds i.e. 60
                  $minutes = floor(($diff - $years * 365*60*60*24
                           - $months*30*60*60*24 - $days*60*60*24
                                            - $hours*60*60)/ 60);
                 
                  // To get the minutes, subtract it with years,
                  // months, seconds, hours and minutes
                  $seconds = floor(($diff - $years * 365*60*60*24
                           - $months*30*60*60*24 - $days*60*60*24
                                  - $hours*60*60 - $minutes*60));
                 
               
                ?>
                 
                
                
				<div data-timer="<?=$auction->end_auction_time?>" data-id="demo<?=$auction->id;?>" class="countdownpp col-lg-4 col-md-4 col-xl-4">
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
								
								<div class="item-card7-overlaytext counting-timer" >
									
									<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' style="width: 100% !important; background: none;" ></span>

								</div>
												
								<!--<div class="item-card7-overlaytext">-->
								<!--	<i style="position:absolute; top: 10px; font-size: 19px; left: 0px; color: white;" class="far fa-clock mr-2"></i>-->
								<!--	<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="countdown text-white bg-danger d-flex justify-content-center align-items-center"></span>-->
								<!--</div>-->
								<div class="item-tag min-width-116 max-width-120">
								    
								    <?php
                    				if(!empty($auction_id_latestoffer)){
                    					$array_auc_id = array();
                    					foreach($auction_id_latestoffer as $auctionid_latestoffer){

                    						$array_auc_id[] = $auctionid_latestoffer['auction_id'];

                    						

												if($auctionid_latestoffer['auction_id'] == $auction->id){ 

													if($auctionid_latestoffer['current_offer'] !=  0 ){

													?>

													    <h4 class="mb-0 d-flex justify-content-center align-items-center">$<?= number_format($auctionid_latestoffer['current_offer'] , 0, ',', '.'); ?></h4>
													<?php }else{ ?>

													    <h4 class="mb-0 d-flex justify-content-center align-items-center">$<?= number_format($auction->base_price , 0, ',', '.');?></h4>


													<?php }?>
                    							<?php }else{

                    							}

                    					}
                    					
                    				}else{ ?>

                    					<h4 class="mb-0 d-flex justify-content-center align-items-center">$<?= number_format($auction->base_price , 0, ',', '.');?></h4>

                    				<?php } ?>
								    
								    
								    
								    
									<!--<h4 class="mb-0 d-flex justify-content-center align-items-center">$<?= number_format($auction->base_price , 0, ',', '.');?></h4>-->
								</div>
							  
							</div>
							</a>
							<div class="item-card9-icons" data-id="<?= $auction->id; ?>">
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
								<div class="card-body pt-6">
									<div class="item-card9 text-left mb-3">
										<h3 class="font-weight-semibold mt-1 auction-slider-title fs-20"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h3>
										<p class="mb-0 leading-tight h-36"><?= $auction->engine_power; ?> <?= $auction->fuel_type; ?></p>
									</div>
									<div class="item-card9-footer d-sm-flex">
										<div class="text-left clearfix w-100">
											<span class="mt-1 mb-1 float-left mr-6" title="FuealType"><i class="fas fa-tachometer-alt fa-2x text-muted mr-1"></i><h6 class="mt-3"><?= number_format($auction->mileage , 0, ',', '.');?> Km</h6></span>
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
                    }else{ ?>
                            <div class="no-result-found">
                                <img src="<?=base_url()?>assets/images/media/no-result-found.gif">
                                <h1 class="m-5">No Result Found</h1>
                            </div>
                    <?php } 
                ?>
                
                <?php
                    if(!empty($all_auctions)){
                ?>
                <div class="row col-12 mt-5">           
				<div class="center-block text-center ">
					<ul class="pagination mb-3">
						<li class="page-item page-prev disabled">
							<a class="page-link" href="#" tabindex="-1">Prev</a>
						</li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item page-next">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</div>
				</div> 
				<?php  } ?>
	
		


<script>
$('.ajaxfilter_cross_m').on('click change', function(){    
    
    if($(this).data('id')){
        var vals = $(this).data('id');
     
        $("input[value='" + vals + "']").prop('checked', false);
    } 
    
     if($(this).data('bodytypeid')){
        var valbt = $(this).data('bodytypeid');
     
        $("input[value='" + valbt + "']").prop('checked', false);
    } 
    
    if($(this).data('fueltypeid')){
        var valft = $(this).data('fueltypeid');
     
        $("input[value='" + valft + "']").prop('checked', false);
    } 
    
    if($(this).data('transmissionid')){
        var valt = $(this).data('transmissionid');
     
        $("input[value='" + valt + "']").prop('checked', false);
    } 
    
    if($(this).data('whereisitid')){
        var valw = $(this).data('whereisitid');
     
        $("input[value='" + valw + "']").prop('checked', false);
    } 
    
    if($(this).data('dropminyearid')){
        $(".minyeardropdown_m").val("");
        
    } 
    
    if($(this).data('dropmaxyearid')){
        $(".maxyeardropdown_m").val("");
        
    } 
    
    if($(this).data('dropminmileageid')){
        $(".minmileagedropdown_m").val("");
        
    } 
    
    if($(this).data('dropmaxmileageid')){
        $(".maxmileagedropdown_m").val("");
        
    } 
    
     if($(this).data('dropminpriceid')){
        $(".minpricedropdown_m").val("");
        
    } 
    
    if($(this).data('dropmaxpriceid')){
        $(".maxpricedropdown_m").val("");
        
    } 
    

    var a = [];

        $('.brandcheckbox:checked').each(function() {
            a.push(this.value);
             
            var checkedbrand = this.value;
            
            $("input[value='" + checkedbrand + "']").prop('checked', true);
           
        });

    var quotation_brand = a.filter(function(itm, i, a) {
        return i == a.indexOf(itm);
    });
    
   
    var b = [];
    
    $('.whereisitcheckbox:checked').each(function() {
            b.push(this.value);
             
            var checkedwhereisit = this.value;
            
            $("input[value='" + checkedwhereisit + "']").prop('checked', true);
           
    });
   
    var quotation_whereisit = b.filter(function(itm, i, b) {
        return i == b.indexOf(itm);
    });
    
    
    
    var quotation_bodytype = [];
   
    $('.bodytypecheckbox_m:checked').each(function() {
      quotation_bodytype.push(this.value);
    });
    
    var quotation_transmission = [];
   
    $('.transmissioncheckbox_m:checked').each(function() {
      quotation_transmission.push(this.value);
    });
    
    var quotation_fueltype = [];
   
    $('.fueltypecheckbox_m:checked').each(function() {
      quotation_fueltype.push(this.value);
    });
    
   
    
    var minyear = $( ".minyeardropdown_m option:selected" ).val();
  
    var maxyear = $( ".maxyeardropdown_m option:selected" ).val();
    
    var minprice = $( ".minpricedropdown_m option:selected" ).val();
  
    var maxprice = $( ".maxpricedropdown_m option:selected" ).val();
    
    var minmileage = $( ".minmileagedropdown_m option:selected" ).val();
  
    var maxmileage = $( ".maxmileagedropdown_m option:selected" ).val();
    
    var sort = $("input[name='sortByauction']:checked").val();

    $.ajax({
		url: "<?php echo base_url("Website/search_checkbox_brand_mobile");?>",
		type: "POST",
		cache: false,
		type: "POST",
		data: {
    			quotation_brand: quotation_brand, quotation_bodytype: quotation_bodytype, quotation_transmission: quotation_transmission, quotation_fueltype: quotation_fueltype, quotation_whereisit:quotation_whereisit, minyear:minyear, maxyear:maxyear, minprice:minprice, maxprice:maxprice, minmileage:minmileage, maxmileage:maxmileage, sort:sort 
    		},
		success: function(data){ 

		    if (data != 'error') {
                $('#search_ending_soon').val(""); 
                $("#auc_listing").html(data);
               
            }
		
		}
	});
     
});


</script>

<script>
$('.favoritebtn').click(function(){

    var auc_id = $(this).parent().data('id');

    	
    $.ajax({
		url: "<?php echo base_url("Dealer/add_to_wishlist");?>",
		type: "POST",
		data: {
			auc_id: auc_id,
		},
		cache: false,
		success: function(dataResult){
		   $("#favid"+auc_id).removeClass("favoritebtn");
		   $("#favid"+auc_id).addClass("deletefavoritebtn");
		     $("#favid"+auc_id).load(document.URL +  ' "#favid"+auc_id');
		  // $("#favid"+auc_id).css("background-color", "red");
        //   $("#favid"+auc_id).load(document.URL +  "#favid"+auc_id);
// 		 window.location.reload();	
// 			"color:white; background: #080e1b;"
		}
	});
});
</script>

<script>
$('.deletefavoritebtn').click(function(){

    var auc_id = $(this).parent().data('id');

    	
    $.ajax({
		url: "<?php echo base_url("Dealer/delete_to_wishlist");?>",
		type: "POST",
		data: {
			auc_id: auc_id,
		},
		cache: false,
		success: function(dataResult){
		     $("#favid"+auc_id).removeClass("deletefavoritebtn");
		   $("#favid"+auc_id).addClass("favoritebtn");
		   $("#favid"+auc_id).load(document.URL +  ' "#favid"+auc_id');
		  // $("#favid"+auc_id).css("background-color", "#080e1b");
		  // $("#favid"+auc_id).load(document.URL +  "#favid"+auc_id);
// 		 window.location.reload();	
			
		}
	});
});
</script>
