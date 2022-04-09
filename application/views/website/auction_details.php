<!--listing-->
<?php
    if(!empty($single_auction_details)){
    foreach($single_auction_details as $auction){
       
?>

    <section class="auction-details">

        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-8 col-lg-8 col-md-12">

                    <!--Classified Description-->

                    <div class="card overflow-hidden">

                        <div class="card-body px-0 px-md-5">

                            <div class="item-det mb-4 clearfix px-4 px-md-0">
                                <div style="display:none" data-id='<?php echo $auction_id; ?>' id="auction-id"></div>
                                <a href="#" class="text-dark float-left">
                                    <h3><?= ucfirst($auction->brand); ?> <?= ucfirst($auction->model); ?></h3>
                                </a>

                                    <?php 
								    if(!empty($all_favorite)){
								    foreach($all_favorite as $value){
								        $array[] = $value->car_auction_id;
								    }
								     
    								    if (in_array($auction->id, $array)){  ?>
    								    
    									<div class="rating-stars float-right">
    
                                            <div class="rating-stars-container">
        
                                                <div data-id="<?= $auction->id; ?>" class="rating-star sm">
				 
													<a class="deletefavoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" ></i></a>
												
												</div>
        
                                            </div>
        
                                        </div>
                                        
    									<?php }else{ ?>
    									
    									<div class="rating-stars float-right">
    
                                            <div class="rating-stars-container">
        
                                                <div data-id="<?= $auction->id; ?>" class="rating-star sm">
				
													<a class="favoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" ></i></a>
		
												</div>
        
                                            </div>
        
                                        </div>
                                        
    									<?php } ?>
    									
                                    <?php } else { ?>
                                    
                                    	<div class="rating-stars float-right">
    
                                            <div class="rating-stars-container">
        
                                                <div data-id="<?= $auction->id; ?>" class="rating-star sm">
				
													<a class="favoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" style="color:black;"></i></a>
		
												</div>
        
                                            </div>
        
                                        </div>
                                    <?php } ?>

                            </div>
                            <?php
                                $slidecount = count($auction_media);
                            ?>
                            
                            <div class="product-slider detail-banner-slider">
                                  
                                <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="0">
                                    
                                    <div class="carousel-inner" id="animated-thumbnials">
                                        <?php 
                                        if(!empty($auction_media_main)){
                                            foreach($auction_media_main as $media_main){
                                                
                                        ?>
                                        
                                        <div class="carousel-item active h-auto overflow-hidden"  style="width:100% !important">
                                            <a href="<?= base_url(); ?>uploads/auction_car/main_image/<?= $media_main->media; ?>" class="light-link">
                                                <img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $media_main->media; ?>" alt="img" style="width:100% !important" class="h-100">
                                            </a>
                                        </div> 
                                        <?php } }   ?>
                                        
                                        <?php 
                                        if(!empty($auction_media)){
                                            foreach($auction_media as $auctionmedia){
                                                
                                        ?>
                                        
                                        <div class="carousel-item h-auto overflow-hidden"  style="width:100% !important">
                                            <a href="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" class="light-link">
                                                <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" alt="img" style="width:100% !important" class="h-100">
                                            </a>
                                        </div> 
                                        <?php } }   ?>
                                    </div>
                                    
                                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">

                                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                                    </a>

                                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">

                                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                                    </a>

                                </div>
                                
                                <div class="clearfix">

                                    <div id="thumbcarousel" class="carousel thumbcarousel slide slider-scroll" data-interval="false">

                                        <div class="carousel-inner">
                                            
                                                <div class="carousel-item active table-scroll-inner smaller-scrollbar">
                                                    <?php if(!empty($auction_media_main)){
                                                        foreach($auction_media_main as $media_main){
                                                            
                                                    ?>
                                                    <button data-target="#carousel" data-slide-to="0" class="thumb"><img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $media_main->media; ?>" alt="img" class="img-fluid h-100"></button>
                                                    <?php } } ?>
                                               
                                                    <?php 
                                                    if(!empty($auction_media)){
                                                        $j =1;
                                                        foreach($auction_media as $auctionmedia){
                                                          
                                                    ?>
                                                    <button data-target="#carousel" data-slide-to="<?= $j; ?>" class="thumb"><img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" alt="img" class="img-fluid h-100"></button>
                                                    <?php 
                                                    
                                                       
                                                       $j++;
                                                        } }
                                                    
                                                    ?>
                                                </div>
                                            
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">MAIN DATA</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="table-responsive table-main mt-3">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/1.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold word-break">External Color</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->external_color); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/2.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold word-break"> Interior</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->internal_color); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/3.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold word-break"> Engine/Power</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= $auction->engine_power; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/4.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold word-break"> Mileage</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= number_format($auction->mileage , 0, ',', '.');?> KM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/5.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold word-break"> Registration Date</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= $auction->registration_date; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive table-main mt-3">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/6.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold word-break"> Body Style</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16 auction-slider-title w-150"><?= ucfirst($auction->body_style); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/7.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold word-break"> Previous Owners</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16 auction-slider-title w-150"><?= $auction->previous_owner_no; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/8.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold word-break"> Transmission</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16 auction-slider-title w-150"><?= ucfirst($auction->transmission); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/9.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold word-break"> Fuel Type</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16 auction-slider-title w-150"><?= ucfirst($auction->fuel_type); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/10.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold word-break"> Where is it</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16 auction-slider-title max-w-150"><?= ucfirst($auction->where_is_it); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">EQUIPMENT AND OPTIONALS</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive mt-3 table-scroll-inner">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        
                                                        
                                                        <tr class="row m-3">
                                                            <?php 
                                                                $equipments = explode(",",$auction->equipment_options);
                                                                $counteq = count($equipments);
                                                                
                                                                foreach($all_equipments as $equip){
                                                                    // for($j=0; $j < $counteq; $j++){
                                                                        if (in_array($equip->id, $equipments)){
                                                                    
                                                            ?>
                                                            <td class="col-md-4"><i class="icon icon-check text-primary mr-3"></i><?= $equip->name; ?></td>
                                                            <?php
                                                                
                                                                } } 
                                                            ?>
                                                        </tr>
                                                        
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="border-0 mb-5">
                        <?php $allno = count($all_damage_defects);   ?>
                        <div class="damage-tab wideget-user-tab wideget-user-tab3">
                            <h3 class="card-title mb-3 font-weight-semibold float-left">KNOWN AND DAMAGED DEFECTS <span class="text-primary">(<?= $allno; ?>)</span> </h3><div class="float-right"><a id="show_all_damage" href="#tab-all" data-toggle="tab">Show all</a> </div>
                            <div class="tab-menu-heading">

                                <div class="tabs-menu1 table-scroll-inner">
                                    <?php 
                                        $frontno = count($front_damage_defects);  
                                        $leftno = count($left_damage_defects);
                                        $rightno = count($right_damage_defects);
                                        $rearno = count($rear_damage_defects);
                                        $interiorno = count($interior_damage_defects);
                                        $roofno = count($roof_damage_defects);
                                        $engineno = count($engine_damage_defects);
                                    ?>
                                    <ul class="nav">

                                        <li class="position-relative">
                                            <a id="front_damage" href="#tab-front"  data-toggle="tab">
                                                <h4>Front of the body</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $frontno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" class="mt-5">
                                            </a>
                                        </li>

                                        <li class="position-relative">
                                            <a id="left_damage" href="#tab-left" data-toggle="tab">
                                                <h4>Left side of the body</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $leftno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon2.png" class="mt-5">
                                            </a>
                                        </li>

                                        <li class="position-relative">
                                            <a id="rear_damage" href="#tab-rear" data-toggle="tab">
                                                <h4>Rear of the body</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $rearno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon3.png" class="mt-5">
                                            </a>
                                        </li>

                                        <li class="position-relative">
                                            <a id="right_damage" href="#tab-right" data-toggle="tab">
                                                <h4>Right side of the body</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $rightno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon4.png" class="mt-5">
                                            </a>
                                        </li>

                                        <li class="position-relative">
                                            <a id="interior_damage" href="#tab-interior" data-toggle="tab">
                                                <h4>Interior the car</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $interiorno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon5.png" class="mt-5">
                                            </a>
                                        </li>

                                        <li class="position-relative">
                                            <a id="engine_damage" href="#tab-engine" data-toggle="tab">
                                                <h4>Engine and transmission</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $engineno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon6.png" class="mt-5">
                                            </a>
                                        </li>

                                        <li class="position-relative">
                                            <a id="roof_damage" href="#tab-roof" data-toggle="tab">
                                                <h4>Roof of the body</h4>
                                                <span class="detailpage-notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $roofno;?></span>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon7.png" class="mt-5">
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                            </div>

                        </div>
                        
                        <div class="tab-content border-left border-right border-top br-tr-3 bg-white px-1 py-4 px-md-5">

                            <div class="tab-pane active" id="tab-front">

                                <div class="row">
                                    <?php 
                                    if(!empty($front_damage_defects)){
                                    $frontdamagecount = count($front_damage_defects);
                                    
                                    $odd = array();
                                    $even = array();
                                    foreach ($front_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $even[] = $v;
                                        }
                                        else {
                                            $odd[] = $v;
                                        }
                                    }

                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($even as $front_damage){
                                                            
                                                    ?>
                                                    <tr>
                                                        <td><?= $front_damage->damage_located; ?></td>
                                                        <td><?= $front_damage->type_of_damage; ?></td>
                                                        <td class="p-1">

                                                            <div  data-id="<?=$front_damage->id;?>" id="table-carousel-ef-<?=$front_damage->id?>" class="table_coro_ef carousel slide" data-ride="carousel" data-interval="0"> 
                                                                <div class="carousel-inner" >
                                                                    
                                                                    <?php if(!empty($all_front_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_front_dam_media as $frontdammedia){
                                                                             if($frontdammedia->damage_id == $front_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++;  } } } ?>
                                                                      
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ef-<?=$front_damage->id?>" role="button" data-slide="prev">
                                                                    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ef-<?=$front_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }   
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($odd)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($odd as $front_damage_odd){
                                                            
                                                    ?>
                                                    <tr>
                                                        <td><?= $front_damage_odd->damage_located; ?></td>
                                                        <td><?= $front_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            
                                                            <div data-id="<?=$front_damage_odd->id;?>" id="table-carousel-of-<?=$front_damage_odd->id?>" class="table_coro_of carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    
                                                                    <?php if(!empty($all_front_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_front_dam_media as $frontdammedia){
                                                                             if($frontdammedia->damage_id == $front_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                    
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-of-<?=$front_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-of-<?=$front_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }   
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php  } }
                                    ?>
                                </div>

                            </div>

                            <div class="tab-pane" id="tab-left">

                                <div class="row">
                                    <?php 
                                    if(!empty($left_damage_defects)){
                                    $leftdamagecount = count($left_damage_defects);
                                    
                                    $evenleft = array();
                                    $oddleft = array();
                                    foreach ($left_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $evenleft[] = $v;
                                        }
                                        else {
                                            $oddleft[] = $v;
                                        }
                                    }
                                    
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($evenleft as $left_damage){
                                                    ?>
                                                    <tr>
                                                        <td><?= $left_damage->damage_located; ?></td>
                                                        <td><?= $left_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$left_damage->id;?>" id="table-carousel-el-<?=$left_damage->id?>" class="table_coro_el carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_left_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_left_dam_media as $leftdammedia){
                                                                             if($leftdammedia->damage_id == $left_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                     
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ef-<?=$left_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ef-<?=$left_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddleft)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($oddleft as $left_damageodd){
                                                    ?>
                                                    <tr>
                                                        <td><?= $left_damageodd->damage_located; ?></td>
                                                        <td><?= $left_damageodd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$left_damageodd->id;?>" id="table-carousel-of-<?=$left_damageodd->id?>" class="table_coro_ol carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_left_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_left_dam_media as $leftdammedia){
                                                                             if($leftdammedia->damage_id == $left_damageodd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                    
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-of-<?=$left_damageodd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-of-<?=$left_damageodd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            
                            <div class="tab-pane" id="tab-right">

                                <div class="row">
                                    <?php 
                                    if(!empty($right_damage_defects)){
                                    $rightdamagecount = count($right_damage_defects);
                                    
                                    $evenright = array();
                                    $oddright = array();
                                    foreach ($right_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $evenright[] = $v;
                                        }
                                        else {
                                            $oddright[] = $v;
                                        }
                                    }
                                    
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($evenright as $right_damage){
                                                    ?>
                                                    <tr>
                                                        <td><?= $right_damage->damage_located; ?></td>
                                                        <td><?= $right_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div  data-id="<?=$right_damage->id;?>" id="table-carousel-eri-<?=$right_damage->id?>" class="table_coro_eri carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner">
                                                                    <?php if(!empty($all_right_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_right_dam_media as $rightdammedia){
                                                                             if($rightdammedia->damage_id == $right_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                      
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-eri-<?=$right_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-eri-<?=$right_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddright)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                       
                                                        foreach($oddright as $right_damage_odd){
                                                    ?>
                                                    <tr>
                                                        <td><?= $right_damage_odd->damage_located; ?></td>
                                                        <td><?= $right_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div  data-id="<?=$right_damage_odd->id;?>" id="table-carousel-ori-<?=$right_damage_odd->id?>" class="table_coro_ori carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_right_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_right_dam_media as $rightdammedia){
                                                                             if($rightdammedia->damage_id == $right_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                    
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ori-<?=$right_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ori-<?=$right_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div> 
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            
                            
                            <div class="tab-pane" id="tab-rear">

                                <div class="row">
                                    <?php 
                                    if(!empty($rear_damage_defects)){
                                    $reardamagecount = count($rear_damage_defects);
                                    $evenrear = array();
                                    $oddrear = array();
                                    foreach ($rear_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $evenrear[] = $v;
                                        }
                                        else {
                                            $oddrear[] = $v;
                                        }
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($evenrear as $rear_damage){
                                                    ?>
                                                    <tr>
                                                        <td><?= $rear_damage->damage_located; ?></td>
                                                        <td><?= $rear_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$rear_damage->id;?>" id="table-carousel-ere-<?=$rear_damage->id?>" class="table_coro_ere  carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_rear_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_rear_dam_media as $reardammedia){
                                                                             if($reardammedia->damage_id == $rear_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                     
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ere-<?=$rear_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ere-<?=$rear_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddrear)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($oddrear as $rear_damage_odd){
                                                    ?>
                                                    <tr>
                                                        <td><?= $rear_damage_odd->damage_located; ?></td>
                                                        <td><?= $rear_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$rear_damage_odd->id;?>" id="table-carousel-ore-<?=$rear_damage_odd->id?>" class="table_coro_ore carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_rear_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_rear_dam_media as $reardammedia){
                                                                             if($reardammedia->damage_id == $rear_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                    
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ore-<?=$rear_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ore-<?=$rear_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            
                            <div class="tab-pane" id="tab-interior">

                                <div class="row">
                                    <?php 
                                    if(!empty($interior_damage_defects)){
                                    $interiordamagecount = count($interior_damage_defects);
                                    $eveninterior = array();
                                    $oddinterior = array();
                                    foreach ($interior_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $eveninterior[] = $v;
                                        }
                                        else {
                                            $oddinterior[] = $v;
                                        }
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($eveninterior as $interior_damage){
                                                    ?>
                                                    <tr>
                                                        <td><?= $interior_damage->damage_located; ?></td>
                                                        <td><?= $interior_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$interior_damage->id;?>" id="table-carousel-ei-<?=$interior_damage->id?>" class="table_coro_ei carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_interior_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_interior_dam_media as $interiordammedia){
                                                                             if($interiordammedia->damage_id == $interior_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                     
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ei-<?=$interior_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ei-<?=$interior_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddinterior)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($oddinterior as $interior_damage_odd){
                                                    ?>
                                                    <tr>
                                                        <td><?= $interior_damage_odd->damage_located; ?></td>
                                                        <td><?= $interior_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$interior_damage_odd->id;?>" id="table-carousel-oi-<?=$interior_damage_odd->id?>" class="table_coro_oi carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner">
                                                                    <?php if(!empty($all_interior_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_interior_dam_media as $interiordammedia){
                                                                             if($interiordammedia->damage_id == $interior_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-oi-<?=$interior_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-oi-<?=$interior_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            
                            <div class="tab-pane" id="tab-engine">

                                <div class="row">
                                    <?php 
                                    if(!empty($engine_damage_defects)){
                                    $enginedamagecount = count($engine_damage_defects);
                                    
                                    $evenengine = array();
                                    $oddengine = array();
                                    foreach ($engine_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $evenengine[] = $v;
                                        }
                                        else {
                                            $oddengine[] = $v;
                                        }
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($evenengine as $engine_damage){
                                                    ?>
                                                    <tr>
                                                        <td><?= $engine_damage->damage_located; ?></td>
                                                        <td><?= $engine_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$engine_damage->id;?>" id="table-carousel-ee-<?=$engine_damage->id?>" class="table_coro_ee carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_engine_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_engine_dam_media as $enginedammedia){
                                                                             if($enginedammedia->damage_id == $engine_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ee-<?=$engine_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ee-<?=$engine_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddengine)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($oddengine as $engine_damage_odd){
                                                    ?>
                                                    <tr>
                                                        <td><?= $engine_damage_odd->damage_located; ?></td>
                                                        <td><?= $engine_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$engine_damage_odd->id;?>" id="table-carousel-oe-<?=$engine_damage_odd->id?>" class="table_coro_oe carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner">
                                                                    <?php if(!empty($all_engine_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_engine_dam_media as $enginedammedia){
                                                                             if($enginedammedia->damage_id == $engine_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-oe-<?=$engine_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-oe-<?=$engine_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            
                            <div class="tab-pane" id="tab-roof">

                                <div class="row">
                                    <?php 
                                    if(!empty($roof_damage_defects)){
                                    $roofdamagecount = count($roof_damage_defects);
                                    $evenroof = array();
                                    $oddroof = array();
                                    foreach ($roof_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $evenroof[] = $v;
                                        }
                                        else {
                                            $oddroof[] = $v;
                                        }
                                    }
                                    
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($evenroof as $roof_damage){
                                                            $roofdamagecount
                                                    ?>
                                                    <tr>
                                                        <td><?= $roof_damage->damage_located; ?></td>
                                                        <td><?= $roof_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$roof_damage->id;?>" id="table-carousel-ero-<?=$roof_damage->id?>" class="table_coro_ero carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_roof_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_roof_dam_media as $roofdammedia){
                                                                             if($roofdammedia->damage_id == $roof_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-ero-<?=$roof_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-ero-<?=$roof_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddroof)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($oddroof as $roof_damage_odd){
                                                            $roofdamagecount
                                                    ?>
                                                    <tr>
                                                        <td><?= $roof_damage_odd->damage_located; ?></td>
                                                        <td><?= $roof_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div  data-id="<?=$roof_damage_odd->id;?>" id="table-carousel-oro-<?=$roof_damage_odd->id?>" class="table_coro_oro carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner">
                                                                    <?php if(!empty($all_roof_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_roof_dam_media as $roofdammedia){
                                                                             if($roofdammedia->damage_id == $roof_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-oro-<?=$roof_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-oro-<?=$roof_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            
                            
                            <!--all-->
                            <div class="tab-pane" id="tab-all">

                                <div class="row">
                                    <?php 
                                    if(!empty($all_damage_defects)){
                                    $alldamagecount = count($all_damage_defects);
                                    $evenall = array();
                                    $oddall = array();
                                    foreach ($all_damage_defects as $k => $v) {
                                        if ($k % 2 == 0) {
                                            $evenall[] = $v;
                                        }
                                        else {
                                            $oddall[] = $v;
                                        }
                                    }
                                    
                                    ?>
                                    <div class="col-md-6" >
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($evenall as $all_damage){
                                                            // $roofdamagecount
                                                    ?>
                                                    <tr>
                                                        <td><?= $all_damage->damage_located; ?></td>
                                                        <td><?= $all_damage->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div data-id="<?=$all_damage->id;?>" id="table-carousel-eall-<?=$all_damage->id?>" class="table_coro_eall carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" >
                                                                    <?php if(!empty($all_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_dam_media as $alldammedia){
                                                                             if($alldammedia->damage_id == $all_damage->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-eall-<?=$all_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-eall-<?=$all_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                        if(!empty($oddall)){
                                            
                                    ?>
                                    <div class="col-md-6">
                                        <div class="table-responsive mt-3 table-scroll-inner">
                                            <table class="table table-bordered border-top mb-0 direction-rtl">
                                                <tbody>
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        
                                                        foreach($oddall as $all_damage_odd){
                                                            // $roofdamagecount
                                                    ?>
                                                    <tr>
                                                        <td><?= $all_damage_odd->damage_located; ?></td>
                                                        <td><?= $all_damage_odd->type_of_damage; ?></td>
                                                        <td class="p-1">
                                                            <div  data-id="<?=$all_damage_odd->id;?>" id="table-carousel-oall-<?=$all_damage_odd->id?>" class="table_coro_oall carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner">
                                                                    <?php if(!empty($all_dam_media)){ 
                                                                        $counter = 0;
                                                                        foreach($all_dam_media as $alldammedia){
                                                                             if($alldammedia->damage_id == $all_damage_odd->id ){ 
                                                                                 
                                                                    ?>
                                                                    <?php if($counter == 0){ ?>
                                                                    <div class="carousel-item active w-100 h100 w100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                    <div class="carousel-item w-100 h-auto">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $alldammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                    </div>
                                                                    
                                                                    <?php } $counter++; } } } ?>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-oall-<?=$all_damage_odd->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-oall-<?=$all_damage_odd->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } }
                                    ?>
                                </div>

                            </div>
                            <!---->
                        </div>

                    </div>
                    
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">HISTORY OF COUPONS PERFORMED</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive mt-3 table-scroll-inner">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <?php
                                                            if(!empty($coupon_details)){
                                                            foreach($coupon_details as $coupon){
                                                        ?>
                                                        <tr>
                                                            <td>Service booklet details</td>
                                                            <td><?= $coupon->service_booklet_details; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Historical appointments</td>
                                                            <td><?= $coupon->history_appointments; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last service date</td>
                                                            <td><?= $coupon->last_service_date; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mileage last service</td>
                                                            <td><?= $coupon->mileage_last_service; ?></td>
                                                        </tr>
                                                        
                                                        <?php
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

                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">Photos Service booklet</h3>
                                    <div id="owl-demo2" class="owl-carousel owl-carousel-photos">
                                        <?php
                                            if(!empty($coupon_media)){
                                            foreach($coupon_media as $coup_media){
                                        ?>
                                        <div class="item">
                                            <div class="card m-0">
                                                <div class="card-body p-2 img-small">
                                                    <a href="<?= base_url(); ?>uploads/auction_car/coupon_image/<?= $coup_media->media; ?>" class="carousel-link"><img src="<?= base_url(); ?>uploads/auction_car/coupon_image/<?= $coup_media->media; ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">TECHNICAL INSPECTION</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive mt-3 table-scroll-inner">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <?php
                                                            if(!empty($technical_details)){
                                                            foreach($technical_details as $technical){
                                                        ?>
                                                        <tr>
                                                            <td>Lastdate Technical Inspection</td>
                                                            <td><?= $technical->last_date_technical_inspection; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mileage Last Tech Inspection</td>
                                                            <td><?= $technical->mileage_last_tech_inspection; ?></td>
                                                        </tr>
                                                        <?php
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
                            <div class="empty-space"></div>
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">Photos Revisions</h3>
                                    <div id="revisions-carousel" class="owl-carousel owl-carousel-photos">
                                        <?php
                                            if(!empty($technical_media)){
                                            foreach($technical_media as $tech_media){
                                            
                                        ?>
                                        <div class="item">
                                            <div class="card m-0">
                                                <div class="card-body p-2 img-small">
                                                    <a href="<?= base_url(); ?>uploads/auction_car/technical_image/<?= $tech_media->media; ?>" class="carousel-link"><img src="<?= base_url(); ?>uploads/auction_car/technical_image/<?= $tech_media->media; ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php } }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">TEST DRIVE INFORMATION</h3>
                                    <p>LOCATION OF TEST DRIVE ON ROAD <80KM / H (MODERATE SPEED)</p>
                                        <?php if(!empty($test_drive_details)){
                                                foreach($test_drive_details as $testdrive){
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="table-responsive mt-3 table-scroll-inner">
                                                    <table class="table table-bordered border-top mb-0">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td><?php if ($testdrive->speedometer == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Speedometer</td>
                                                                <td><?php echo $testdrive->speedometer_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->gear == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Gears</td>
                                                                <td><?php echo $testdrive->gear_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->suspension == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Suspensions</td>
                                                                <td><?php echo $testdrive->suspension_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->noise_level == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Noise level</td>
                                                                <td><?php echo $testdrive->noise_level_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->navigation == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Navigation</td>
                                                                <td><?php echo $testdrive->navigation_issue; ?></td>
                                                            </tr>
                                                            
                                                        </tbody>
    
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive mt-3 table-scroll-inner">
                                                    <table class="table table-bordered border-top mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td><?php if ($testdrive->engin == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Engine</td>
                                                                <td><?php echo $testdrive->engin_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->steering == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Steering</td>
                                                                <td><?php echo $testdrive->steering_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->brakes == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Brakes</td>
                                                                <td><?php echo $testdrive->brakes_issue; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php if ($testdrive->air_condition == 1){ ?><i class="icon icon-check text-primary mr-3"></i><?php }else{ ?><i class="icon-close text-danger text-primary mr-3"></i> <?php } ?> Air Conditioning</td>
                                                                <td><?php echo $testdrive->air_condition_issue; ?></td>
                                                            </tr>
                                                            
                                                        </tbody>
    
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>                    
                                    
                        
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">PAINT THICKNESS</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive mt-3">


                                                <table class="table table-bordered border-top mb-0">

                                                    <tbody>
                                                         <?php
                                                            if(!empty($part_paint_details)){
                                                                foreach($part_paint_details as $get_part_paint){
                                                        ?>
                                                            <tr>
    
                                                                <td><?= $get_part_paint->part_type; ?></td>
    
                                                                <td><?= $get_part_paint->thickness; ?></td>
    
                                                            </tr>
                                                        <?php 
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
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">Photos Paint Thickness</h3>
                                    <div id="photos-gallery" class="owl-carousel owl-carousel-photos">
                                        <?php
                                            if(!empty($part_paint_media)){
                                            foreach($part_paint_media as $paint_media){
                                                 $partmediacount = count($part_paint_media);
                                        ?>
                                        
                                        
                                        
                                        <div class="item">
                                            <div class="card">
                                                <div class="card-body p-2 img-small">
                                                    <a href="<?= base_url(); ?>uploads/auction_car/part_paint_image/<?= $paint_media->media; ?>" class="photos-gallery"><img src="<?= base_url(); ?>uploads/auction_car/part_paint_image/<?= $paint_media->media; ?>" alt="" class="w-100 h-100"></a>
                                                    <!--<p class="fs-12">Lorem Ipsum</p>-->
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            
                                            }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        if(!empty($wheel_details)){
                        foreach($wheel_details as $wheel){
                    ?>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">MAIN WHEELS DETAILS</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive mt-3 table-scroll-inner">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Left front</th>
                                                                <th>Right front</th>
                                                                <th>Left rear</th>
                                                                <th>Right rear</th>
                                                            </tr>
                                                        </thead>
                                                        <tr>
                                                            <td><b>Type of tire</b></td>
                                                            <td><?= $wheel->tire_type_left_front; ?></td>
                                                            <td><?= $wheel->tire_type_right_front; ?></td>
                                                            <td><?= $wheel->tire_type_left_rear; ?></td>
                                                            <td><?= $wheel->tire_type_right_rear; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Profile depth (mm)</b></td>
                                                            <td><?= $wheel->profile_depth_left_front; ?></td>
                                                            <td><?= $wheel->profile_depth_right_front; ?></td>
                                                            <td><?= $wheel->profile_depth_left_rear; ?></td>
                                                            <td><?= $wheel->profile_depth_right_rear; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Rim type</b></td>
                                                            <td><?= $wheel->rim_type_left_front; ?></td>
                                                            <td><?= $wheel->rim_type_right_front; ?></td>
                                                            <td><?= $wheel->rim_type_left_rear; ?></td>
                                                            <td><?= $wheel->rim_type_right_rear; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>State of the brakes</b></td>
                                                            <td><?= $wheel->brake_state_left_front; ?></td>
                                                            <td><?= $wheel->brake_state_right_front; ?></td>
                                                            <td><?= $wheel->brake_state_left_rear; ?></td>
                                                            <td><?= $wheel->brake_state_right_rear; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">Wheel control images</h3>
                                    <div id="wheel-images" class="owl-carousel owl-carousel-photos">
                                       
                                        <?php
                                            if(!empty($wheel_media)){
                                            foreach($wheel_media as $wh_media){
                                                 $wheel_media_count = count($wheel_media);
                                        ?>
                                        
                                        <div class="item">
                                            <div class="card">
                                                <div class="card-body p-2 w-100 h-auto">
                                                    <a href="<?= base_url(); ?>uploads/auction_car/wheel_image/<?= $wh_media->media; ?>" class="wheel-images"><img src="<?= base_url(); ?>uploads/auction_car/wheel_image/<?= $wh_media->media; ?>" alt="" class="w-100 h-100"></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php 
                                            
                                            }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                            }
                        }
                    ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">Any Notes from seller</h3>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p>
                                                <?= substr($auction->note_from_sellar, 0, 200); ?>
                                            </p>
                                            
                                            <?php $maxcount = strlen($auction->note_from_sellar);?>
                                            
                                            <?php if($maxcount > 200){ ?>
                                                <div class="collapse" id="admin_notes">
                                                    <?= substr($auction->note_from_sellar, 200, $maxcount) . '.'; ?>
                                                </div>
                                            <?php } ?>
                                            
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <?php if($maxcount > 200){ ?>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#admin_notes" aria-expanded="false" aria-controls="admin_notes"><i class="fas fa-arrow-down"></i></button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body px-1 px-md-5">
                                    <h3 class="card-title mb-3 font-weight-semibold px-4 px-md-0">VIDEO</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="">
                                       
                                                <?php
                                                    if(!empty($morevideos)){
                                                        if(count($morevideos) == 1){
                                                    foreach($morevideos as $video){  
                                                ?>
                                                <div class="item w-100">
                                                    <div class="card">
                                                        <div class="card-body p-2 w-100">
                                                            <?= $video->video_url;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php 
                                                    }
                                                    }
                                                    }
                                                ?>
                                                
                                                <?php
                                                    if(!empty($morevideos)){
                                                        if(count($morevideos) >= 2){
                                                      
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="home-video">
                                                         <?= $morevideos[0]->video_url;?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="home-video">
                                                          <?= $morevideos[1]->video_url;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php 
                                                   
                                                    }
                                                    }
                                                ?>
                                                
                                            </div>
                                            
                                            <!--<iframe width="100%" height="500" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                        </div>   
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Classified Description-->

                </div>

                <!--Right Side Content-->
                
                
                <div class="col-xl-4 col-lg-4 col-md-12 d-none d-md-block" id="auction_area">

                    <div class="card" id="sticky-sidebar-main">

                        <div class="card-body sidebar__inner">

                            <div data-timer="<?=$auction->end_auction_time?>" data-id="demo<?=$auction->id;?>" class="countdownpp text-center text-white bg-danger mb-4 btn-lg btn-block fs-16 font-weight-bold">
                                <?php          
                                    $timestamp = strtotime($auction->end_auction_time);
                                    $new_date_format = date('l, h:i:s A', $timestamp);
                                ?>
                                <p class="mb-1">AUCTION EXPIRING: <?= $new_date_format; ?> </p>
                                <i class="mr-2 far fa-clock"></i><span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="timer-countdown-rr"> </span>

                            </div>
                            
                            <?php
                                if(!empty($all_bids)){
                                foreach($all_bids as $bid){
                                 $array_maxbid[] = $bid->latest_bid; 
                                }
                                 $maxbid = max($array_maxbid);
                                 
                                 if($maxbid <= 10000){
                                     $minbid = $maxbid + 100;
                                 }else if($maxbid <= 20000){
                                     $minbid = $maxbid + 200;
                                 }else if($maxbid <= 30000){
                                     $minbid = $maxbid + 300;
                                 }else if($maxbid <= 40000){
                                     $minbid = $maxbid + 400;
                                 }else{
                                     $minbid = $maxbid + 500;
                                 }
                            ?>
                            
                            
                            <div class="ajaxdivsidebar">
                            
                            
                            
                            <h4 class="bg-primary btn-lg btn-block mb-2 text-white text-center fs-34 font-weight-bold">
                                <div class="mb-0">CURRENT OFFER :</div>
                                <div class="mb-0">€ <?=number_format($maxbid , 0, ',', '.');?></div>
                            </h4>
                            <p class="text-center fs-20 font-weight-bold">Next minimum bid: € <?=number_format($minbid , 0, ',', '.');?></p>
                            <?php }else{ ?>
                            <?php 
                                if($auction->base_price <= 10000){
                                     $minbid = $auction->base_price + 100;
                                 }else if($auction->base_price <= 20000){
                                     $minbid = $auction->base_price + 200;
                                 }else if($auction->base_price <= 30000){
                                     $minbid = $auction->base_price + 300;
                                 }else if($auction->base_price <= 40000){
                                     $minbid = $auction->base_price + 400;
                                 }else{
                                     $minbid = $auction->base_price + 500;
                                 }
                            ?>
                            <h4 class="bg-primary btn-lg btn-block mb-2 text-white text-center fs-34 font-weight-bold">
                                <div class="mb-0">CURRENT OFFER :</div>
                                
                                <div class="mb-0">€ <?=number_format($auction->base_price , 0, ',', '.');?></div>
                                
                            </h4>
                            <p class="text-center fs-20 font-weight-bold">Next minimum bid: € <?=number_format($minbid , 0, ',', '.');?></p>
                            <?php } ?>
                            <label>Make a direct offer</label>
                            
                            
                            <?php
                            if(isset($_SESSION['dl_logged_in'])){
	                          if($_SESSION['dl_logged_in']){
                            ?>
                            
                            
                                        <?php
                                            if(!empty($single_dealer_bids)){
                                            foreach($single_dealer_bids as $sbid){
                                        ?>
                                        <?php  if(($sbid->dealer_id) == $_SESSION['dl_logged_in']){
                                                    $dealer_bid_id = $sbid->id;
                                                    $dealer_latest_bid = $sbid->latest_bid;
                                                   
                                        ?>
                                            <?php 
                                                $attributes = array( 'id'=>'bid', 'method' =>'post'); 
                                                echo form_open_multipart('Website/auction_make_bid_again', $attributes); 
                                            ?>
                                         
                                            <?php
                                                if($this->session->flashdata('error')){
                                                    echo '<div class="alert alert-danger border-danger">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("error")  
                                                            .'</div>';
                                                }else if($this->session->flashdata('success')){
                                                    echo '<div class="alert alert-success border-success">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("success")  
                                                            .'</div>';
                                                }
                                            ?>
                                            
                                            <?php
                                                if(!empty($all_bids)){
                                                    foreach($all_bids as $bid){
                                                     $array_maxbid[] = $bid->latest_bid; 
                                                    }
                                                     $maxbid = max($array_maxbid);
                                                     
                                                     if($maxbid <= 10000){
                                                         $minbid = $maxbid + 100;
                                                     
                                                     }else if($maxbid <= 20000){
                                                         $minbid = $maxbid + 200;
                                                        
                                                     }else if($maxbid <= 30000){
                                                         $minbid = $maxbid + 300;
                                                        
                                                     }else if($maxbid <= 40000){
                                                         $minbid = $maxbid + 400;
                                                        
                                                     }else{
                                                         $minbid = $maxbid + 500;
                                                       
                                                     }
                                            ?>
                                                <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                                    <span class="input_currency">€</span>
                                                    <input type="number" name="latest_bid" step="100"  class="form-control input-lg " min="<?=$minbid; ?>" value="<?=number_format($minbid , 0, ',', '.');?>" style="padding-left:30px" required>
                                                    <input type="text" name="bid_id" value="<?=$dealer_bid_id; ?>" hidden>
                                                    <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                                    <div class="input-group-append">
                                                        <button type="submit" name="make_offer_submit_again" class="btn btn-primary btn-lg br-tr-3  br-br-3 ">
                                                                Make offer
                                                            </button>
                                                    </div>
                                                </div>
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('bid'); ?></span>
                                                
                                                <?php } ?>
                                            <?php echo form_close(); ?>
                                        
                                        <?php  } } }else{ ?>
                                        
                                            <?php 
                                                $attributes = array( 'id'=>'bid', 'method' =>'post'); 
                                                echo form_open_multipart('Website/auction_make_bid', $attributes); 
                                            ?>
                                         
                                            <?php
                                                if($this->session->flashdata('error')){
                                                    echo '<div class="alert alert-danger border-danger">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("error")  
                                                            .'</div>';
                                                }else if($this->session->flashdata('success')){
                                                    echo '<div class="alert alert-success border-success">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("success")  
                                                            .'</div>';
                                                }
                                            ?>
                                            
                                            <?php 
                                            
                                            // -------------------------------
                                            // -------------min bid ratio-----
                                            
                                            if(!empty($all_bids)){
                                                foreach($all_bids as $bid){
                                                 $array_maxbid[] = $bid->latest_bid; 
                                                }
                                                 $maxbid = max($array_maxbid);
                                                 
                                                 if($maxbid <= 10000){
                                                     $minbid = $maxbid + 100;
                                                 }else if($maxbid <= 20000){
                                                     $minbid = $maxbid + 200;
                                                 }else if($maxbid <= 30000){
                                                     $minbid = $maxbid + 300;
                                                 }else if($maxbid <= 40000){
                                                     $minbid = $maxbid + 400;
                                                 }else{
                                                     $minbid = $maxbid + 500;
                                                 }
                                            }else{
                                                if($auction->base_price <= 10000){
                                                     $minbid = $auction->base_price + 100;
                                                   
                                                 }else if($auction->base_price <= 20000){
                                                     $minbid = $auction->base_price + 200;
                                                
                                                 }else if($auction->base_price <= 30000){
                                                     $minbid = $auction->base_price + 300;
                                                 
                                                 }else if($auction->base_price <= 40000){
                                                     $minbid = $auction->base_price + 400;
                                                 
                                                 }else{
                                                     $minbid = $auction->base_price + 500;
                                                   
                                                 }
                                            }
                                             
                                            ?>
                                                <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                                    <span class="input_currency">€</span>
                                                    <input type="number" name="bid" class="form-control input-lg" step="100" min="<?=$minbid; ?>" value="<?=$minbid; ?>" style="padding-left:30px" required>
                                                    <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                                    <div class="input-group-append">
                                                        <button type="submit" name="make_offer_submit" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                                                Make offer
                                                            </button>
                                                    </div>
                                                </div>
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('bid'); ?></span>
                                            <?php echo form_close(); ?>
                                        <?php } ?>
                                        
                            <?php } } else{ ?>
                            
                                    <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                        <span class="input_currency">€</span>
                                        <input type="number" name="bid" class="form-control input-lg" step="100" min="<?=$minbid; ?>" value="<?=$minbid; ?>" style="padding-left:30px" required>
                                        <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                        <div class="input-group-append ">
                                            <button name="make_offer_submit_check"  onclick="check_makebid_otheruser()" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                                    Make offer
                                                </button>
                                        </div>
                                    </div>
                                    <span id="makebid_otheruser" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('bid'); ?></span>
                                                
                            <?php } ?>
                            
                            <!------------------------------------------------->
                            <!------------------------------------------------->
                            <!------  automatic bid system start -------------->
                            <!------------------------------------------------->
                            
                            <?php 
                                if(!empty($all_bids)){
                                    foreach($all_bids as $bid){
                                         $array_maxbid[] = $bid->latest_bid; 
                                        //  $array_maxautomaticbid[] = $bid->automatic_bid; 
                                    }
                                     $maxbid = max($array_maxbid);
                                     if(!empty($all_bids_with_automatic)){
                                     $maxautomaticbid = max($all_bids_with_automatic);
                                     }
                                     $count_automatic_bid_no = count($all_bids_with_automatic);
                                     
                                     if($count_automatic_bid_no > 0)
                                         if($maxautomaticbid > $maxbid){
                                              foreach($all_bids_with_automatic as $autobid){
                                                 if($maxbid <= 10000){
                                                     $new_auto_bid = $maxbid + 250;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                         
                                                          if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                         } else{  
                                                              ?>
                                                            <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                            <?php
                                                         }
                                     
                                                     }else{
                                                        
                                                        
                                                        if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                          
                                                          
                                                     }
                                                 }else if($maxbid <= 20000){
                                                     $new_auto_bid = $maxbid + 400;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                          
                                                           if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                             } else{  
                                                                  ?>
                                                                <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                                <?php
                                                            }
                                                          
                                                     }else{
                                                        
                                                        
                                                        
                                                        if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                        
                                                        
                                                     }
                                                 }else if($maxbid <= 30000){
                                                     $new_auto_bid = $maxbid + 500;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                          
                                                           if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                             } else{  
                                                                  ?>
                                                                <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                                <?php
                                                             }
                                                          
                                                          
                                                          
                                                     }else{
                                                        
                                                        
                                                        if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                        
                                                        
                                                     }
                                                 }else if($maxbid <= 40000){
                                                     $new_auto_bid = $maxbid + 600;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                          
                                                           if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                             } else{  
                                                                  ?>
                                                                <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                                <?php
                                                             }
                                                          
                                                          
                                                     }else{
                                                         
                                                         
                                                         if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                                             
                                                         
                                                     }
                                                 }else {
                                                     $new_auto_bid = $maxbid + 800;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                         if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                         } else{  
                                                              ?>
                                                            <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                            <?php
                                                         } 
                                                          
                                                          
                                                     }else{
                                                        
                                                         if($autobid->automatic_bid < $maxbid ){
                                                             
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                        
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }  
                                                          
                                                        ?>
                                                            
                                                        <?php 
                                                     }
                                             }
                                         }
                                    }
                                }
                            ?>
                            
                            <label class="d-flex"><span class="mr-2">Make an automatic bid</span> <span href="#" data-toggle="tooltip" title="In publishing and graph ypeface without relying on meaningful content.!" class="bid-tooltip">i</span></label> 
                            
                            <?php
                            if(isset($_SESSION['dl_logged_in'])){
	                          if($_SESSION['dl_logged_in']){
                            ?>
                            
                                    <?php
                                        if(!empty($single_dealer_bids)){
                                        foreach($single_dealer_bids as $sbid){
                                    ?>
                                    <?php  if(($sbid->dealer_id) == $_SESSION['dl_logged_in']){
                                                $dealer_bid_id = $sbid->id;
                                                $dealer_latest_bid = $sbid->latest_bid;
                                               
                                    ?>
                                        <?php 
                                            $attributes = array( 'id'=>'bid', 'method' =>'post'); 
                                            echo form_open_multipart('Website/auction_automatic_bid', $attributes); 
                                        ?>
                                         
                                        <?php
                                            if(!empty($all_bids)){
                                                foreach($all_bids as $bid){
                                                 $array_maxbid[] = $bid->latest_bid; 
                                                }
                                                 $maxbid = max($array_maxbid);
                                                 
                                                 if($maxbid <= 10000){
                                                     $minbid = $maxbid +250;
                                                 
                                                 }else if($maxbid <= 20000){
                                                     $minbid = $maxbid + 400;
                                                    
                                                 }else if($maxbid <= 30000){
                                                     $minbid = $maxbid + 500;
                                                    
                                                 }else if($maxbid <= 40000){
                                                     $minbid = $maxbid + 600;
                                                    
                                                 }else{
                                                     $minbid = $maxbid + 800;
                                                   
                                                 }
                                        ?> 
                                        <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                            <span class="input_currency">€</span>
                                            <input type="number" value="<?=number_format($minbid , 0, ',', '.');?>" name="automatic_bid" step="50" class="form-control input-lg " min="<?=$dealer_latest_bid; ?>"  style="padding-left:30px"  required>
                                            
                                            <input type="text" name="bid_id" value="<?=$dealer_bid_id; ?>" required hidden>
                                            <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                            <div class="input-group-append auto-bid-btn">
                                                <button type="submit" name="automatic_submit" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                                        Automatic Bidding
                                                    </button>
                                            </div>
                                        </div>
                                        
                                        <?php echo form_close(); ?>
                                    
                                    <?php } } } }else{ ?>
                                    
                                        <?php
                                            if(!empty($all_bids)){
                                                foreach($all_bids as $bid){
                                                 $array_maxbid[] = $bid->latest_bid; 
                                                }
                                                 $maxbid = max($array_maxbid);
                                                 
                                                 if($maxbid <= 10000){
                                                     $minbid = $maxbid + 250;
                                                 
                                                 }else if($maxbid <= 20000){
                                                     $minbid = $maxbid + 400;
                                                    
                                                 }else if($maxbid <= 30000){
                                                     $minbid = $maxbid + 500;
                                                    
                                                 }else if($maxbid <= 40000){
                                                     $minbid = $maxbid + 600;
                                                    
                                                 }else{
                                                     $minbid = $maxbid + 800;
                                                   
                                                 }
                                        ?>
                                        
                                        <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                            <span class="input_currency">€</span>
                                            
                                            <input type="number" value="<?= $minbid; ?>" step="50" class="form-control input-lg"  style="padding-left:30px"  required>
                                           
                                            <div class="input-group-append ">
                                                <button type="submit" name="automatic_submit_check" onclick="check_current_bid()" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                                        Automatic Bidding
                                                    </button>
                                            </div>
                                        </div>
                                        <span id="auto_error" style="color:red;" class="error"></span>
                                    <?php }else{   ?>
                                    
                                     <?php 
                                        
                                        // -------------------------------
                                        // -------------min bid ratio-----
                                        
                                        if($auction->base_price <= 10000){
                                             $minbid = $auction->base_price + 250;
                                           
                                         }else if($auction->base_price <= 20000){
                                             $minbid = $auction->base_price + 400;
                                        
                                         }else if($auction->base_price <= 30000){
                                             $minbid = $auction->base_price + 500;
                                         
                                         }else if($auction->base_price <= 40000){
                                             $minbid = $auction->base_price + 600;
                                         
                                         }else{
                                             $minbid = $auction->base_price + 800;
                                           
                                         }
                                         
                                        ?>
                                    
                                    
                                    
                                        <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                            <span class="input_currency">€</span>
                                            
                                            <input type="number" value="<?= $minbid; ?>" step="50" class="form-control input-lg"  style="padding-left:30px"  required>
                                           
                                            <div class="input-group-append ">
                                                <button type="submit" name="automatic_submit_check" onclick="check_current_bid()" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                                        Automatic Bidding
                                                    </button>
                                            </div>
                                        </div>
                                        <span id="auto_error" style="color:red;" class="error"></span>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <?php } } ?>
                            
                           <?php } }else{ ?> 
                           
                            <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                <span class="input_currency">€</span>
                                
                                <input type="number" value="<?= $minbid; ?>" step="50" class="form-control input-lg"  style="padding-left:30px"  required>
                               
                                <div class="input-group-append ">
                                    <button type="submit" name="automatic_submit_check_otherUser" onclick="check_bid_otheruser()" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                            Automatic Bidding
                                        </button>
                                </div>
                            </div>
                            <span id="auto_otheruser_error" style="color:red;" class="error"></span>
                           
                           <?php } ?>
                            <!------------------------------------------------->
                            <!------------------------------------------------->
                            <!------  automatic bid system end   -------------->
                            <!------------------------------------------------->
                            
                            
                            
                            
                            </div>
                            
                             <label class="text-center w-100">
                                <span class="d-inline mr-2">Bids exclude "AsteMotori" auction commissions <br> and any costs (click here for details)</span> 
                                <span href="#" data-toggle="tooltip" title="" class="bid-tooltip d-inline-flex" data-original-title="In publishing and graph ypeface without relying on meaningful content.!">i</span>
                            </label>
                            <!--<a href="#" class="d-block mb-3 text-dark offer-modal-desc1">Bids exclude "AsteMotori" auction commissions and any costs (click here for details)</a>-->
                            <a href="#" class="d-block mb-3 text-center text-dark offer-modal-desc1">Auction Commision "AsteMotori": ... % of the winning bid (minimum ... €)</a>
                            <?php
                            if(isset($_SESSION['dl_logged_in'])){
	                          if($_SESSION['dl_logged_in']){
                            ?>
                            <a class="btn btn-success btn-lg btn-block mb-4" href="<?= base_url(); ?>chat/start_chat/<?= $auction->id; ?>">Chat With Us</a>
                            
                            <?php }}else{ ?>
                            <a class="btn btn-success btn-lg btn-block mb-4" id="check_chat_otheruser" href="">Chat With Us</a>
                            <?php } ?>
                        </div>

                    </div>

                </div>
                
                <!--/Right Side Content-->

                <div class="container-fluid px-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-5 mt-6">AUCTIONS EXPIRING</h3>

                        <!--Related Posts-->

                        <div id="" class="owl-carousel owl-theme owl-carousel-auction-expire">

                            <?php
                                if(!empty($all_auctions)){
                                foreach($all_auctions as $auction){
                            ?>

                            <div data-timer="<?=$auction->end_auction_time?>" data-id="demos<?=$auction->id;?>" class="countdownpp item">

                                <div class="card overflow-hidden">
                                    <div class="item-card9-img">
                                        <a href="<?php echo base_url('Website/auction_details/'.$auction->id)?>">
                                        <div class="item-card7-imgs h-auto">
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
                                                <h4 class="mb-0 d-flex justify-content-center align-items-center">$<?= $auction->base_price; ?></h4>
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
                                                        <span class="mt-1 mb-1 float-left mr-6" title="FuealType"><i class="fas fa-tachometer-alt fa-2x text-muted mr-1"></i><h6 class="mt-3"><?= number_format($auction->mileage , 0, ',', '.');?>  Km</h6></span>
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

                        </div>

                        <!--/Related Posts-->
                        </div>
                    </div>
                </div>
   
            </div>

        </div>

    </section>
    
<?php
    }
}
?>


<?php
    if(!empty($single_auction_details)){
    foreach($single_auction_details as $auction){
       
?>

<!-- Popup Make Offer-->
    
	<div id="makeoffer<?=$auction->id;?>" class="modal fade">
		<div class="modal-dialog col-md-4 make-bid-popup" role="document">
			<div class="modal-content offer-modal">
			    <div class="border-0 mb-2">
					<button type="button" class="close btn btn-primary btn-lg" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="cross-icon">×</span>
					</button>
				</div>   
				<div class="modal-body p-2 mt-5">
					<div class="" id="auction_area">

                    <div class="" id="sticky-sidebar-main">

                        <div class="sidebar__inner">

                            <div data-timer="<?=$auction->end_auction_time?>" data-id="demoss<?=$auction->id;?>" class="countdownpp text-center text-white bg-danger mb-4 btn-lg btn-block fs-16 font-weight-bold offer-model-time">
                                <?php          
                                    $timestamp = strtotime($auction->end_auction_time);
                                    $new_date_format = date('l, h:i:s A', $timestamp);
                                ?>
                                
                                <p class="mb-1">AUCTION EXPIRING: <?= $new_date_format; ?> </p>
                                <i class="mr-2 far fa-clock"></i>
                                <span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="timer-countdown-rr"> </span>

                            </div>
                            
                            <?php
                                if(!empty($all_bids)){
                                foreach($all_bids as $bid){
                                 $array_maxbid[] = $bid->latest_bid; 
                                }
                                 $maxbid = max($array_maxbid);
                                 
                                 if($maxbid <= 10000){
                                     $minbid = $maxbid + 100;
                                 }else if($maxbid <= 20000){
                                     $minbid = $maxbid + 200;
                                 }else if($maxbid <= 30000){
                                     $minbid = $maxbid + 300;
                                 }else if($maxbid <= 40000){
                                     $minbid = $maxbid + 400;
                                 }else{
                                     $minbid = $maxbid + 500;
                                 }
                            ?>
                            
                            <div class="ajaxdivsidebar">
                            
                            
                            <h4 class="bg-primary btn-lg btn-block mb-2 text-white text-center fs-34 font-weight-bold current-offer">
                                <div class="mb-0">CURRENT OFFER :</div>
                                <div class="mb-0 fs-26 mt-2">€ <?=number_format($maxbid , 0, ',', '.');?></div>
                            </h4>
                            <p class="text-center fs-20 font-weight-bold minimum-bid">Next minimum bid: € <?=number_format($minbid , 0, ',', '.');?></p>
                            <?php }else{ ?>
                            <?php 
                                if($auction->base_price <= 10000){
                                     $minbid = $auction->base_price + 100;
                                 }else if($auction->base_price <= 20000){
                                     $minbid = $auction->base_price + 200;
                                 }else if($auction->base_price <= 30000){
                                     $minbid = $auction->base_price + 300;
                                 }else if($auction->base_price <= 40000){
                                     $minbid = $auction->base_price + 400;
                                 }else{
                                     $minbid = $auction->base_price + 500;
                                 }
                            ?>
                            <h4 class="bg-primary btn-lg btn-block mb-2 text-white text-center fs-34 font-weight-bold">
                                <div class="mb-0">CURRENT OFFER :</div>
                                
                                <div class="mb-0">€ <?=number_format($auction->base_price , 0, ',', '.');?></div>
                                
                            </h4>
                            <p class="text-center fs-20 font-weight-bold">Next minimum bid: € <?=number_format($minbid , 0, ',', '.');?></p>
                            <?php } ?>
                            <label class="direct-offer-label">Make a direct offer</label>
                            
                            
                            <?php
                            if(isset($_SESSION['dl_logged_in'])){
	                          if($_SESSION['dl_logged_in']){
                            ?>
                            
                            
                                        <?php
                                            if(!empty($single_dealer_bids)){
                                            foreach($single_dealer_bids as $sbid){
                                        ?>
                                        <?php  if(($sbid->dealer_id) == $_SESSION['dl_logged_in']){
                                                    $dealer_bid_id = $sbid->id;
                                                    $dealer_latest_bid = $sbid->latest_bid;
                                                   
                                        ?>
                                            <?php 
                                                $attributes = array( 'id'=>'bid', 'method' =>'post'); 
                                                echo form_open_multipart('Website/auction_make_bid_again', $attributes); 
                                            ?>
                                         
                                            <?php
                                                if($this->session->flashdata('error')){
                                                    echo '<div class="alert alert-danger border-danger">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("error")  
                                                            .'</div>';
                                                }else if($this->session->flashdata('success')){
                                                    echo '<div class="alert alert-success border-success">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("success")  
                                                            .'</div>';
                                                }
                                            ?>
                                            
                                            <?php
                                                if(!empty($all_bids)){
                                                    foreach($all_bids as $bid){
                                                     $array_maxbid[] = $bid->latest_bid; 
                                                    }
                                                     $maxbid = max($array_maxbid);
                                                     
                                                     if($maxbid <= 10000){
                                                         $minbid = $maxbid + 100;
                                                     
                                                     }else if($maxbid <= 20000){
                                                         $minbid = $maxbid + 200;
                                                        
                                                     }else if($maxbid <= 30000){
                                                         $minbid = $maxbid + 300;
                                                        
                                                     }else if($maxbid <= 40000){
                                                         $minbid = $maxbid + 400;
                                                        
                                                     }else{
                                                         $minbid = $maxbid + 500;
                                                       
                                                     }
                                            ?>
                                                <div class="input-group sub-input mt-1 mb-4 model-make-offer" style="position:relative;">
                                                    <span class="input_currency">€</span>
                                                    <input type="number" name="latest_bid" step="100"  class="form-control input-lg" min="<?=$minbid; ?>" value="<?=number_format($minbid , 0, ',', '.');?>" style="padding-left:30px" required>
                                                    <input type="text" name="bid_id" value="<?=$dealer_bid_id; ?>" hidden>
                                                    <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                                    <div class="input-group-append offer-make-btn">
                                                        <button type="submit" name="make_offer_submit_again" class="btn btn-primary btn-lg br-tr-3 br-br-3 d-flex justify-content-center align-items-center">
                                                                Make offer
                                                            </button>
                                                    </div>
                                                </div>
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('bid'); ?></span>
                                                
                                                <?php } ?>
                                            <?php echo form_close(); ?>
                                        
                                        <?php  } } }else{ ?>
                                        
                                            <?php 
                                                $attributes = array( 'id'=>'bid', 'method' =>'post'); 
                                                echo form_open_multipart('Website/auction_make_bid', $attributes); 
                                            ?>
                                         
                                            <?php
                                                if($this->session->flashdata('error')){
                                                    echo '<div class="alert alert-danger border-danger">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("error")  
                                                            .'</div>';
                                                }else if($this->session->flashdata('success')){
                                                    echo '<div class="alert alert-success border-success">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled"></i>
                                                                </button>'.
                                                              $this->session->flashdata("success")  
                                                            .'</div>';
                                                }
                                            ?>
                                            
                                            <?php 
                                            
                                            // -------------------------------
                                            // -------------min bid ratio-----
                                            
                                            if(!empty($all_bids)){
                                                foreach($all_bids as $bid){
                                                 $array_maxbid[] = $bid->latest_bid; 
                                                }
                                                 $maxbid = max($array_maxbid);
                                                 
                                                 if($maxbid <= 10000){
                                                     $minbid = $maxbid + 100;
                                                 }else if($maxbid <= 20000){
                                                     $minbid = $maxbid + 200;
                                                 }else if($maxbid <= 30000){
                                                     $minbid = $maxbid + 300;
                                                 }else if($maxbid <= 40000){
                                                     $minbid = $maxbid + 400;
                                                 }else{
                                                     $minbid = $maxbid + 500;
                                                 }
                                            }else{
                                                if($auction->base_price <= 10000){
                                                     $minbid = $auction->base_price + 100;
                                                   
                                                 }else if($auction->base_price <= 20000){
                                                     $minbid = $auction->base_price + 200;
                                                
                                                 }else if($auction->base_price <= 30000){
                                                     $minbid = $auction->base_price + 300;
                                                 
                                                 }else if($auction->base_price <= 40000){
                                                     $minbid = $auction->base_price + 400;
                                                 
                                                 }else{
                                                     $minbid = $auction->base_price + 500;
                                                   
                                                 }
                                            }
                                             
                                            ?>
                                                <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                                    <span class="input_currency">€</span>
                                                    <input type="number" name="bid" class="form-control input-lg" step="100" min="<?=$minbid; ?>" value="<?=$minbid; ?>" style="padding-left:30px" required>
                                                    <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                                    <div class="input-group-append offer-make-btn">
                                                        <button type="submit" name="make_offer_submit" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                                            Make offer
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('bid'); ?></span>
                                            <?php echo form_close(); ?>
                                        <?php } ?>
                                        
                            <?php } } else{ ?>
                            
                                    <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                        <span class="input_currency">€</span>
                                        <input type="number" name="bid" class="form-control input-lg" step="100" min="<?=$minbid; ?>" value="<?=$minbid; ?>" style="padding-left:30px" required>
                                        <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                        <div class="input-group-append offer-make-btn">
                                            <button name="make_offer_submit_check"  onclick="check_makebid_otheruser()" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                                    Make offer
                                                </button>
                                        </div>
                                    </div>
                                    <span id="makebid_otheruser" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('bid'); ?></span>
                                                
                            <?php } ?>
                            
                            <!------------------------------------------------->
                            <!------------------------------------------------->
                            <!------  automatic bid system start -------------->
                            <!------------------------------------------------->
                            
                            <?php 
                                if(!empty($all_bids)){
                                    foreach($all_bids as $bid){
                                         $array_maxbid[] = $bid->latest_bid; 
                                        //  $array_maxautomaticbid[] = $bid->automatic_bid; 
                                    }
                                     $maxbid = max($array_maxbid);
                                     if(!empty($all_bids_with_automatic)){
                                     $maxautomaticbid = max($all_bids_with_automatic);
                                     }
                                     $count_automatic_bid_no = count($all_bids_with_automatic);
                                     
                                     if($count_automatic_bid_no > 0)
                                         if($maxautomaticbid > $maxbid){
                                              foreach($all_bids_with_automatic as $autobid){
                                                 if($maxbid <= 10000){
                                                     $new_auto_bid = $maxbid + 250;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                         
                                                          if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                         } else{  
                                                              ?>
                                                            <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                            <?php
                                                         }
                                     
                                                     }else{
                                                        
                                                        
                                                        if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                          
                                                          
                                                     }
                                                 }else if($maxbid <= 20000){
                                                     $new_auto_bid = $maxbid + 400;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                          
                                                           if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                             } else{  
                                                                  ?>
                                                                <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                                <?php
                                                            }
                                                          
                                                     }else{
                                                        
                                                        
                                                        
                                                        if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                        
                                                        
                                                     }
                                                 }else if($maxbid <= 30000){
                                                     $new_auto_bid = $maxbid + 500;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                          
                                                           if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                             } else{  
                                                                  ?>
                                                                <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                                <?php
                                                             }
                                                          
                                                          
                                                          
                                                     }else{
                                                        
                                                        
                                                        if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                        
                                                        
                                                     }
                                                 }else if($maxbid <= 40000){
                                                     $new_auto_bid = $maxbid + 600;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                          
                                                           if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                             } else{  
                                                                  ?>
                                                                <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                                <?php
                                                             }
                                                          
                                                          
                                                     }else{
                                                         
                                                         
                                                         if($autobid->automatic_bid < $maxbid ){
                                         
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                                            
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }
                                                                             
                                                         
                                                     }
                                                 }else {
                                                     $new_auto_bid = $maxbid + 800;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          
                                                         if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                 
                                                         } else{  
                                                              ?>
                                                            <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                            <?php
                                                         } 
                                                          
                                                          
                                                     }else{
                                                        
                                                         if($autobid->automatic_bid < $maxbid ){
                                                             
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                // var_dump($array_check); die;
                                                                if (in_array($emailtest, $array_check)){ 
                                                                   
                                                                }else{ 
                                                                    ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                         } else{ 
                                        
                                                                if($autobid->dealer_id == $maxbid_dealer_id->dealer_id){
                                                                     
                                                                 } else{  
                                                                      ?>
                                                                    <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$autobid->automatic_bid;?>" class="autobid_section item"></div>
                                                                    <?php
                                                                 } 
                                                            
                                                          }  
                                                          
                                                        ?>
                                                            
                                                        <?php 
                                                     }
                                             }
                                         }
                                    }
                                }
                            ?>
                            
                            <label class="d-flex"><span class="mr-2 direct-offer-label">Make an automatic bid</span> <span href="#" data-toggle="tooltip" title="In publishing and graph ypeface without relying on meaningful content.!" class="bid-tooltip">i</span></label> 
                            
                            <?php
                            if(isset($_SESSION['dl_logged_in'])){
	                          if($_SESSION['dl_logged_in']){
                            ?>
                            
                                    <?php
                                        if(!empty($single_dealer_bids)){
                                        foreach($single_dealer_bids as $sbid){
                                    ?>
                                    <?php  if(($sbid->dealer_id) == $_SESSION['dl_logged_in']){
                                                $dealer_bid_id = $sbid->id;
                                                $dealer_latest_bid = $sbid->latest_bid;
                                               
                                    ?>
                                        <?php 
                                            $attributes = array( 'id'=>'bid', 'method' =>'post'); 
                                            echo form_open_multipart('Website/auction_automatic_bid', $attributes); 
                                        ?>
                                         
                                        <?php
                                            if(!empty($all_bids)){
                                                foreach($all_bids as $bid){
                                                 $array_maxbid[] = $bid->latest_bid; 
                                                }
                                                 $maxbid = max($array_maxbid);
                                                 
                                                 if($maxbid <= 10000){
                                                     $minbid = $maxbid +250;
                                                 
                                                 }else if($maxbid <= 20000){
                                                     $minbid = $maxbid + 400;
                                                    
                                                 }else if($maxbid <= 30000){
                                                     $minbid = $maxbid + 500;
                                                    
                                                 }else if($maxbid <= 40000){
                                                     $minbid = $maxbid + 600;
                                                    
                                                 }else{
                                                     $minbid = $maxbid + 800;
                                                   
                                                 }
                                        ?> 
                                        <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                            <span class="input_currency">€</span>
                                            <input type="number" value="<?=number_format($minbid , 0, ',', '.');?>" name="automatic_bid" step="50" class="form-control input-lg " min="<?=$dealer_latest_bid; ?>"  style="padding-left:30px"  required>
                                            
                                            <input type="text" name="bid_id" value="<?=$dealer_bid_id; ?>" required hidden>
                                            <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                                            <div class="input-group-append auto-bid-btn">
                                                <button type="submit" name="automatic_submit" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                                        Automatic Bidding
                                                    </button>
                                            </div>
                                        </div>
                                        
                                        <?php echo form_close(); ?>
                                    
                                    <?php } } } }else{ ?>
                                    
                                        <?php
                                            if(!empty($all_bids)){
                                                foreach($all_bids as $bid){
                                                 $array_maxbid[] = $bid->latest_bid; 
                                                }
                                                 $maxbid = max($array_maxbid);
                                                 
                                                 if($maxbid <= 10000){
                                                     $minbid = $maxbid + 250;
                                                 
                                                 }else if($maxbid <= 20000){
                                                     $minbid = $maxbid + 400;
                                                    
                                                 }else if($maxbid <= 30000){
                                                     $minbid = $maxbid + 500;
                                                    
                                                 }else if($maxbid <= 40000){
                                                     $minbid = $maxbid + 600;
                                                    
                                                 }else{
                                                     $minbid = $maxbid + 800;
                                                   
                                                 }
                                        ?>
                                        
                                        <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                            <span class="input_currency">€</span>
                                            
                                            <input type="number" value="<?= $minbid; ?>" step="50" class="form-control input-lg"  style="padding-left:30px"  required>
                                           
                                            <div class="input-group-append auto-bid-btn">
                                                <button type="submit" name="automatic_submit_check" onclick="check_current_bid()" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                                        Automatic Bidding
                                                    </button>
                                            </div>
                                        </div>
                                        <span id="auto_error" style="color:red;" class="error"></span>
                                    <?php }else{   ?>
                                    
                                     <?php 
                                        
                                        // -------------------------------
                                        // -------------min bid ratio-----
                                        
                                        if($auction->base_price <= 10000){
                                             $minbid = $auction->base_price + 250;
                                           
                                         }else if($auction->base_price <= 20000){
                                             $minbid = $auction->base_price + 400;
                                        
                                         }else if($auction->base_price <= 30000){
                                             $minbid = $auction->base_price + 500;
                                         
                                         }else if($auction->base_price <= 40000){
                                             $minbid = $auction->base_price + 600;
                                         
                                         }else{
                                             $minbid = $auction->base_price + 800;
                                           
                                         }
                                         
                                        ?>
                                    
                                    
                                    
                                        <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                            <span class="input_currency">€</span>
                                            
                                            <input type="number" value="<?=number_format($minbid , 0, ',', '.');?>" step="50" class="form-control input-lg"  style="padding-left:30px"  required>
                                           
                                            <div class="input-group-append auto-bid-btn">
                                                <button type="submit" name="automatic_submit_check" onclick="check_current_bid()" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                                        Automatic Bidding
                                                    </button>
                                            </div>
                                        </div>
                                        <span id="auto_error" style="color:red;" class="error"></span>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <?php } } ?>
                            
                           <?php } }else{ ?> 
                           
                            <div class="input-group sub-input mt-1 mb-4" style="position:relative;">
                                <span class="input_currency">€</span>
                                
                                <input type="number" value="<?= $minbid; ?>" step="50" class="form-control input-lg"  style="padding-left:30px"  required>
                               
                                <div class="input-group-append auto-bid-btn">
                                    <button type="submit" name="automatic_submit_check_otherUser" onclick="check_bid_otheruser()" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                            Automatic Bidding
                                        </button>
                                </div>
                            </div>
                            <span id="auto_otheruser_error" style="color:red;" class="error"></span>
                           
                           <?php } ?>
                            <!------------------------------------------------->
                            <!------------------------------------------------->
                            <!------  automatic bid system end   -------------->
                            <!------------------------------------------------->
                            
                            
                            
                            </div>
                            
                            <label class="text-center w-100">
                                <span class="d-inline mr-2">Bids exclude "AsteMotori" auction commissions and any costs (click here for details)</span> 
                                <span href="#" data-toggle="tooltip" title="" class="bid-tooltip d-inline-flex" data-original-title="In publishing and graph ypeface without relying on meaningful content.!">i</span>
                            </label>
                            <!--<a href="#" class="d-block mb-3 text-dark offer-modal-desc1">Bids exclude "AsteMotori" auction commissions and any costs (click here for details)</a>-->
                            <a href="#" class="d-block mb-3 text-center text-dark offer-modal-desc1">Auction Commision "AsteMotori": ... % of the winning bid (minimum ... €)</a>
                            <?php
                            if(isset($_SESSION['dl_logged_in'])){
	                          if($_SESSION['dl_logged_in']){
                            ?>
                            <a class="btn btn-success btn-lg btn-block mb-4" href="<?= base_url(); ?>chat/start_chat/<?= $auction->id; ?>">Chat With Us</a>
                            
                            <?php }}else{ ?>
                            <a class="btn btn-success btn-lg btn-block mb-4" id="check_chat_otheruser" href="">Chat With Us</a>
                            <?php } ?>
                        </div>

                    </div>

                </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Popup Make Offer-->

    <section class="maker-offer-sticky d-block d-md-none">
        <div class="container">
            <div class="row m-auto align-items-center">
				<!--<div class="col">-->
				<!--    <div data-timer="<?=$auction->end_auction_time?>" data-id="demox<?=$auction->id;?>" class="countdownpp text-danger fs-18 font-weight-bold">-->
                        
    <!--                    <span id="demox<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="timer-countdown-rr"><i class="text-danger far fa-clock"></i> </span>-->

    <!--                </div>-->
                    <!--<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="timer-countdown-rr"><i class="far fa-clock"></i> </span>-->
    <!--            </div>-->
    <!--            <div class="col text-right">-->
    <!--            	<a class="btn btn-blue btn-lg text-white" type="button" data-toggle="modal" data-target="#makeoffer<?=$auction->id;?>">Make Offer</a>-->
    <!--            </div>-->
                <div class="col-6 text-center">
                    <p class="text-red fs-14 font-weight-semibold mb-1">Current Offer:</p>
                    <p class="font-weight-bold fs-16 text-red mb-2">&euro; 70.000</p>
                </div>
                <div class="col-6 text-center">
                    <p class="text-red fs-14 font-weight-semibold mb-1">End in:</p>
                    <p class="font-weight-bold fs-16 text-red mb-2"><i class="mr-2 far fa-clock"></i><span>1D 3H 27M 19S</span></p>
                </div>
                <a class="btn btn-blue btn-lg text-white w-100" type="button" data-toggle="modal" data-target="#makeoffer<?=$auction->id;?>">MAKE AN OFFER</a>
            </div>
        </div>
    </section>



<?php
    }
}
?>
