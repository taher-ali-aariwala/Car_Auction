<?php $this->load->view('website/layouts/header_scripts'); ?>


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
        <h4 class="bg-primary btn-lg btn-block mb-2 text-white text-center fs-34 font-weight-bold current-offer">
            <div class="mb-0">CURRENT OFFER :</div>
            <div class="mb-0">€ <?=number_format($maxbid , 0, ',', '.');?></div>
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
                                    <button type="submit" name="make_offer_submit_again" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
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
                                <input type="number" name="bid" class="form-control input-lg model-make-offer" step="100" min="<?=$minbid; ?>" value="<?=$minbid; ?>" style="padding-left:30px" required>
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
                        <input type="number" value="<?=number_format($minbid , 0, ',', '.');?>" name="automatic_bid" step="100" class="form-control input-lg " min="<?=$dealer_latest_bid; ?>"  style="padding-left:30px"  required>
                        
                        <input type="text" name="bid_id" value="<?=$dealer_bid_id; ?>" required hidden>
                        <input type="text" name="auction_id" value="<?=$auction->id; ?>" hidden>
                        <div class="input-group-append ">
                            <button type="submit" name="automatic_submit" class="btn btn-primary btn-lg br-tr-3  br-br-3">
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
                        
                        <input type="number" value="<?= $minbid; ?>" step="100" class="form-control input-lg"  style="padding-left:30px"  required>
                       
                        <div class="input-group-append auto-bid-btn">
                            <button type="submit" name="automatic_submit_check" onclick="check_current_bid()" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center align-items-center">
                                    Automatic Bidding
                                </button>
                        </div>
                    </div>
                    <span id="auto_error" style="color:red;" class="error"></span>
                <?php }else{  ?> 
                
                
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
                           
                            <div class="input-group-append auto-bid-btn">
                                <button type="submit" name="automatic_submit_check" onclick="check_current_bid()" class="btn btn-primary btn-lg br-tr-3  br-br-3 d-flex justify-content-center">
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
        
        
        
        


<?php $this->load->view('website/layouts/footer_scripts'); ?>