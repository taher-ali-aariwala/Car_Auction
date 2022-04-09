<div class="carousel-inner">
                                            
                                                <div class="carousel-item active">
                                                    <?php if(!empty($auction_media_main)){
                                                        foreach($auction_media_main as $media_main){
                                                            
                                                    ?>
                                                    <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_main->media; ?>" alt="img" class="h-100 w-100"></div>
                                                    <?php } } ?>
                                               
                                                    <?php 
                                                    if(!empty($auction_media)){
                                                        $j =1;
                                                        foreach($auction_media as $auctionmedia){
                                                          
                                                    ?>
                                                    <div data-target="#carousel" data-slide-to="<?= $j; ?>" class="thumb"><img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" alt="img" class="h-100 w-100"></div>
                                                    <?php 
                                                    
                                                       
                                                       $j++;
                                                        } }
                                                    
                                                    ?>
                                                </div>
                                            
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <!--listing-->
<?php
    if(!empty($single_auction_details)){
    foreach($single_auction_details as $auction){
?>

    <section class="sptb pt-9 pb-0">

        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-8 col-lg-8 col-md-12">

                    <!--Classified Description-->

                    <div class="card overflow-hidden">

                        <div class="card-body">

                            <div class="item-det mb-4 clearfix">

                                <a href="#" class="text-dark float-left">
                                    <h3><?= ucfirst($auction->brand); ?> <?= ucfirst($auction->model); ?></h3>
                                </a>

                                <div class="rating-stars float-right">

                                    <div class="rating-stars-container">

                                        <div class="rating-star sm">

                                            <i class="fa fa-heart fs-24"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <?php
                                $slidecount = count($auction_media);
                            ?>
                            
                            <div class="product-slider detail-banner-slider">
                                
                                <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="0">
                                    
                                    <div class="carousel-inner" id="animated-thumbnials">
                                        <div class="carousel-item active detail-banner-carousel" style="width:100% !important">
                                            <a href="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auction_media[0]->media; ?>" class="light-link">
                                                <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auction_media[0]->media; ?>" alt="img" style="width:100% !important" height="100% !important" >
                                            </a>
                                        </div>
                                        <?php 
                                        if(!empty($auction_media)){
                                            foreach($auction_media as $auctionmedia){
                                                
                                        ?>
                                        
                                        <div class="carousel-item detail-banner-carousel"  style="width:100% !important">
                                            <a href="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" class="light-link">
                                                <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" alt="img" style="width:100% !important" height="100% !important">
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
                                            <?php for ($j=0; $j < $slidecount; $j++) { ?>
                                                <div class="carousel-item active">
                                                    <?php 
                                                    if(!empty($auction_media)){
                                                        foreach($auction_media as $auctionmedia){
                                                            
                                                    ?>
                                                    <div data-target="#carousel" data-slide-to="<?= $j; ?>" class="thumb"><img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $auctionmedia->media; ?>" alt="img" class="h-100 w-100"></div>
                                                    <?php } } ?>
                                                </div>
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">MAIN DATA</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="table-responsive table-main">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/1.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold">External Color</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->external_color); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/2.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold"> Interior</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->internal_color); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/3.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold"> Engine/Power</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= $auction->engine_power; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/4.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold"> Mileage</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= $auction->mileage; ?>KM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/5.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold"> Registration Date</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= $auction->registration_date; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive table-main">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/6.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold"> Body Style</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->body_style); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/7.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold"> Previous Owners</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= $auction->previous_owner_no; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/8.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold"> Transmission</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->transmission); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/9.png" class="mr-2">
                                                                    <span class="fs-16 font-weight-semibold"> Fuel Type</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->fuel_type); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="<?= base_url(); ?>assets/images/icons/10.png" class="mr-2"> 
                                                                    <span class="fs-16 font-weight-semibold"> Where is it</span>
                                                                </div>
                                                            </td>
                                                            <td class="fs-16"><?= ucfirst($auction->where_is_it); ?></td>
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">EQUIPMENT AND OPTIONALS</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
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
                        
                        <div class="damage-tab wideget-user-tab wideget-user-tab3">
                            <h3 class="card-title mb-3 font-weight-semibold">KNOWN AND DAMAGED DEFECTS</h3>
                            <div class="tab-menu-heading">

                                <div class="tabs-menu1">

                                    <ul class="nav">

                                        <li>
                                            <a href="#tab-front" class="active" data-toggle="tab">
                                                <h4>Front of the body</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab-left" data-toggle="tab">
                                                <h4>Left side of the body</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon2.png">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab-rear" data-toggle="tab">
                                                <h4>Rear of the body</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon3.png">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab-right" data-toggle="tab">
                                                <h4>Right side of the body</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon4.png">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab-interior" data-toggle="tab">
                                                <h4>Interior the car</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon5.png">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab-engine" data-toggle="tab">
                                                <h4>Engine and transmission</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon6.png">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab-roof" data-toggle="tab">
                                                <h4>Roof of the body</h4>
                                                <img src="<?= base_url(); ?>assets/images/icons/damage_icon7.png">
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                            </div>

                        </div>
                        
                        <div class="tab-content border-left border-right border-top br-tr-3 p-5 bg-white">

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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $front_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $front_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-100">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $front_damage_odd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $front_damage_odd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }   
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php  }  }
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $left_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $left_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $left_damageodd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $left_damageodd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php }  }
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } 
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $right_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $right_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $right_damage_odd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $right_damage_odd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rear_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rear_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-70">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rear_damage_odd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rear_damage_odd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interior_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interior_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interior_damage_odd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interior_damage_odd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $engine_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $engine_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $engine_damage_odd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $engine_damage_odd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roof_damage->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roof_damage->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
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
                                                            <div class="carousel slide" data-ride="carousel" data-interval="0">
                                                                <div class="carousel-inner" id="table-carousel">
                                                                    <div class="carousel-item active w-100 h-52">
                                                                        <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roof_damage_odd->media;?>" class="table-link">
                                                                        <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roof_damage_odd->media;?>" class="d-block w-100 h-100 object-fit-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <!--<a class="carousel-control-prev" href="#table-carousel" role="button" data-slide="prev">-->
                                                                <!--<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
                                                                <!--<a class="carousel-control-next" href="#table-carousel" role="button" data-slide="next">-->
                                                                <!--    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>-->
                                                                <!--</a>-->
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
                            
                        </div>

                    </div>
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">HISTORY OF COUPONS PERFORMED</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">


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
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">TECHNICAL INSPECTION</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">


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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">Photos Service booklet</h3>
                                    <div id="owl-demo2" class="owl-carousel owl-carousel-photos">
                                        <?php
                                            if(!empty($coupon_media)){
                                            foreach($coupon_media as $coup_media){
                                        ?>
                                        <div class="item">
                                            <div class="card m-0">
                                                <div class="card-body p-2">
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">Photos Revisions</h3>
                                    <div id="revisions-carousel" class="owl-carousel owl-carousel-photos">
                                        <?php
                                            if(!empty($technical_media)){
                                            foreach($technical_media as $tech_media){
                                            
                                        ?>
                                        <div class="item">
                                            <div class="card m-0">
                                                <div class="card-body p-2">
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">TEST DRIVE INFORMATION</h3>
                                    <p>LOCATION OF TEST DRIVE ON ROAD <80KM / H (MODERATE SPEED)</p>
                                        <?php if(!empty($test_drive_details)){
                                                foreach($test_drive_details as $testdrive){
                                        ?>
                                        <div class="card">
                                        <div class="card-body">
                                        <div class="w-100 mb-7 m-auto">
                                            <div class="row">
                                                <div class="col-md-6 mb-5">
                                                    
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="speedometer" id="speedometer" class="custom-switch-input" <?php if ($testdrive->speedometer == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Speedometer:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" name="speedometer_issue" id="speedometer_issue" class="form-control" value="<?php echo $testdrive->speedometer_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="gear" id="gear" class="custom-switch-input" <?php if ($testdrive->gear == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Gears:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="gear_issue" id="gear_issue" value="<?php echo $testdrive->gear_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="suspension" id="suspension" class="custom-switch-input" <?php if ($testdrive->suspension == 1) echo 'checked="checked"'; ?>readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Suspensions:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="suspension_issue" id="suspension_issue" value="<?php echo $testdrive->suspension_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="noise_level" id="noise_level" class="custom-switch-input" <?php if ($testdrive->noise_level == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Noise level:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control"  name="noise_level_issue" id="noise_level_issue" value="<?php echo $testdrive->noise_level_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="navigation" id="navigation" class="custom-switch-input" <?php if ($testdrive->navigation == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Navigation:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="navigation_issue" id="navigation_issue" value="<?php echo $testdrive->navigation_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="engin" id="engin" class="custom-switch-input" <?php if ($testdrive->engin == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Engine:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="engin_issue" id="engin_issue" value="<?php echo $testdrive->engin_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="steering" id="steering" class="custom-switch-input" <?php if ($testdrive->steering == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Steering:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="steering_issue" id="steering_issue" value="<?php echo $testdrive->steering_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="brakes" id="brakes" class="custom-switch-input" <?php if ($testdrive->brakes == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Brakes:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="brakes_issue" id="brakes_issue" value="<?php echo $testdrive->brakes_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="air_condition" id="air_condition" class="custom-switch-input" <?php if ($testdrive->air_condition == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Air conditioning:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="air_condition_issue" id="air_condition_issue" value="<?php echo $testdrive->air_condition_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">PAINT THICKNESS</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">


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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">Photos Paint Thickness</h3>
                                    <div id="photos-gallery" class="owl-carousel owl-carousel-photos">
                                        <?php
                                            if(!empty($part_paint_media)){
                                            foreach($part_paint_media as $paint_media){
                                                 $partmediacount = count($part_paint_media);
                                        ?>
                                        
                                        
                                        
                                        <div class="item">
                                            <div class="card">
                                                <div class="card-body p-2 w-100 h-70">
                                                    <a href="<?= base_url(); ?>uploads/auction_car/part_paint_image/<?= $paint_media->media; ?>" class="photos-gallery"><img src="<?= base_url(); ?>uploads/auction_car/part_paint_image/<?= $paint_media->media; ?>" alt="" class="w-100 h-100 object-fit-cover"></a>
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">MAIN WHEELS DETAILS</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">Wheel control images</h3>
                                    <div id="wheel-images" class="owl-carousel owl-carousel-photos">
                                       
                                        <?php
                                            if(!empty($wheel_media)){
                                            foreach($wheel_media as $wh_media){
                                                 $wheel_media_count = count($wheel_media);
                                        ?>
                                        
                                        <div class="item">
                                            <div class="card">
                                                <div class="card-body p-2 w-100 h-70">
                                                    <a href="<?= base_url(); ?>uploads/auction_car/wheel_image/<?= $wh_media->media; ?>" class="wheel-images"><img src="<?= base_url(); ?>uploads/auction_car/wheel_image/<?= $wh_media->media; ?>" alt="" class="w-100 h-100 object-fit-cover"></a>
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">Any Notes from seller</h3>
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
                                <div class="card-body">
                                    <h3 class="card-title mb-3 font-weight-semibold">VIDEO</h3>
                                    <div class="row">
                                        <div class="col-md-12" width="100%" height="500" style="overflow: hidden;">
                                            <?= $auction->main_video; ?>
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

                <div class="col-xl-4 col-lg-4 col-md-12">

                    <div class="card" id="sticky-sidebar-main">

                        <div class="card-body sidebar__inner">

                            <div class="text-center text-white bg-danger mb-4 btn-lg btn-block fs-16 font-weight-bold">
                                <p class="mb-1">AUCTION EXPIRING: THURSDAY, 6.15 PM</p>
                                <i class="far fa-clock"></i> <span class="timer-countdown"></span>

                            </div>
                            <h4 class="bg-primary btn-lg btn-block mb-2 text-white text-center fs-34 font-weight-bold">
                                <div class="mb-0">CURRENT OFFER :</div>
                                <div class="mb-0">€ 18.000</div>
                            </h4>
                            <p class="text-center fs-20 font-weight-bold">Next minimum bid: € 18.200</p>
                            <label>Make a direct offer</label>
                            <div class="input-group sub-input mt-1 mb-4">
                                <input type="text" class="form-control input-lg " placeholder="Enter your offer €..." required>
                                <div class="input-group-append ">
                                    <button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                            Make offer
                                        </button>
                                </div>
                            </div>
                            <label>Make an automatic bid</label>
                            <div class="input-group sub-input mt-1 mb-4">
                                <input type="text" class="form-control input-lg " placeholder="Enter your offer €...">
                                <div class="input-group-append ">
                                    <button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                            Automatic Bidding
                                        </button>
                                </div>
                            </div>
                            <a href="#" class="d-block mb-3 text-dark">Bids exclude "AsteMotori" auction commissions and any costs (click here for details)</a>
                            <a href="#" class="d-block mb-3 text-center text-dark">Auction Commision "AsteMotori": ... % of the winning bid (minimum ... €)</a>
                            <a class="btn btn-success btn-lg btn-block mb-4" href="#">Ask for information</a>

                        </div>

                    </div>

                </div>

                <!--/Right Side Content-->

                <div class="container-fluid px-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-5 mt-6">AUCTIONS EXPIRING</h3>

                        <!--Related Posts-->

                        <div id="" class="owl-carousel owl-carousel-auction-expire">

                            <?php 

                                for ($i=1; $i < 8; $i++) { ?>

                            <div class="item">

                                <div class="card overflow-hidden">
                                    <div class="item-card9-img">
                                        <a href="#">
                                        <div class="item-card7-imgs h-170">
                                            <img src="<?= base_url(); ?>assets/images/media/others/b3.jpg" alt="img" class="cover-image">
                                            <div class="item-card7-overlaytext">
                                                <span class="text-white bg-danger"><i class="far fa-clock"></i> 1:38:29</span>
                                            </div>
                                            <div class="item-tag min-width-116 max-width-120">
                                                <h4 class="mb-0">$398.99</h4>
                                            </div>
                                        </div>
                                        </a>
                                        <div class="item-card9-icons">
                                            <a href="#" class="item-card9-icons1 wishlist"> <i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <a href="#" class="text-dark">
                                        <div class="card border-0 mb-0">
                                            <div class="card-body pt-7">
                                                <div class="item-card9 text-center mb-3">
                                                    <h3 class="font-weight-semibold mt-1 auction-slider-title"> BMW M3</h3>
                                                    <p class="mb-0 leading-tight h-36">3.0 Benzina 530cv Automatica</p>
                                                </div>
                                                <div class="item-card9-footer d-sm-flex">
                                                    <div class="text-center clearfix w-100">
                                                        <span class="w-50 mt-1 mb-1 float-left" title="FuealType"><i class="fas fa-tachometer-alt fa-2x text-muted mr-1"></i><h6 class="mt-3">21.000 Km</h6></span>
                                                        <span class="w-50 mt-1 mb-1 float-left" title="Kilometrs"><i class="fas fa-calendar fa-2x text-muted mr-1 "></i><h6 class="mt-3">02/2021</h6></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <?php }

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































<div class="card">
                                        <div class="card-body">
                                        <div class="w-100 mb-7 m-auto">
                                            <div class="row">
                                                <div class="col-md-6 mb-5">
                                                    
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="speedometer" id="speedometer" class="custom-switch-input" <?php if ($testdrive->speedometer == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Speedometer:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" name="speedometer_issue" id="speedometer_issue" class="form-control" value="<?php echo $testdrive->speedometer_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="gear" id="gear" class="custom-switch-input" <?php if ($testdrive->gear == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Gears:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="gear_issue" id="gear_issue" value="<?php echo $testdrive->gear_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="suspension" id="suspension" class="custom-switch-input" <?php if ($testdrive->suspension == 1) echo 'checked="checked"'; ?>readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Suspensions:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="suspension_issue" id="suspension_issue" value="<?php echo $testdrive->suspension_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="noise_level" id="noise_level" class="custom-switch-input" <?php if ($testdrive->noise_level == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Noise level:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control"  name="noise_level_issue" id="noise_level_issue" value="<?php echo $testdrive->noise_level_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="navigation" id="navigation" class="custom-switch-input" <?php if ($testdrive->navigation == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Navigation:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="navigation_issue" id="navigation_issue" value="<?php echo $testdrive->navigation_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="engin" id="engin" class="custom-switch-input" <?php if ($testdrive->engin == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Engine:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="engin_issue" id="engin_issue" value="<?php echo $testdrive->engin_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="steering" id="steering" class="custom-switch-input" <?php if ($testdrive->steering == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Steering:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="steering_issue" id="steering_issue" value="<?php echo $testdrive->steering_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="brakes" id="brakes" class="custom-switch-input" <?php if ($testdrive->brakes == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Brakes:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="brakes_issue" id="brakes_issue" value="<?php echo $testdrive->brakes_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0 mt-1">
                                                                <label class="custom-switch pl-0">
                                                                    <input type="checkbox" value="1" name="air_condition" id="air_condition" class="custom-switch-input" <?php if ($testdrive->air_condition == 1) echo 'checked="checked"'; ?> readonly>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span style="font-size:14px" class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Air conditioning:</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-0">
                                                                <input style="background:white;" type="text" class="form-control" name="air_condition_issue" id="air_condition_issue" value="<?php echo $testdrive->air_condition_issue; ?>" placeholder=' "No specific results" ' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>