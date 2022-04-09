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
                                     $maxautomaticbid = max($all_bids_with_automatic);
                                     
                                     $count_automatic_bid_no = count($all_bids_with_automatic);
                                     
                                     if($count_automatic_bid_no > 0)
                                         if($maxautomaticbid > $maxbid){
                                              foreach($all_bids_with_automatic as $autobid){
                                                 if($maxbid <= 10000){
                                                     $new_auto_bid = $maxbid + 250;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                         ?>
                                                        <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                        <?php
                                                     }else{
                                                        if($autobid->automatic_bid < $maxbid){   //($autobid->automatic_bid >0 ) && ($autobid->automatic_bid <= 10000 )
                                                            
                                                            $emailtest = $autobid->automatic_bid . $autobid->id;
                                                            $array_check= array();
                                                            foreach($check_exceed_mail as $check_mail){
                                                               $array_check[] =  $check_mail->mail_check;
                                                            }
                                                            
                                                            if (in_array($emailtest, $array_check)){ 
                                                                
                                                            }else{ 
                                                                ?>
                                                                <!--echo "1";-->
                                                                <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                            
                                                            <?php
                                                            }
                                                                
                                                            ?>
                                                                
                                                            <?php 
                                                            
                                                        } 
                                                     }
                                                 }else if($maxbid <= 20000){
                                                     $new_auto_bid = $maxbid + 400;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          ?>
                                                        <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                        <?php
                                                     }else{
                                                        if($autobid->automatic_bid < $maxbid ){    // ($autobid->automatic_bid >10000 ) && ($autobid->automatic_bid <= 20000 )
                                                            
                                                            
                                                            $emailtest = $autobid->automatic_bid . $autobid->id;
                                                            $array_check= array();
                                                            foreach($check_exceed_mail as $check_mail){
                                                               $array_check[] =  $check_mail->mail_check;
                                                            }
                                                            
                                                            if (in_array($emailtest, $array_check)){ 
                                                                
                                                            }else{ 
                                                                ?>
                                                                 <!--echo "2";-->
                                                                <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                            
                                                            <?php
                                                            }
                                                                
                                                            ?>
                                                                
                                                            <?php 
                                                             
                                                         }
                                                     }
                                                 }else if($maxbid <= 30000){
                                                     $new_auto_bid = $maxbid + 500;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          ?>
                                                        <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                        <?php
                                                     }else{
                                                        if($autobid->automatic_bid < $maxbid){    //($autobid->automatic_bid >20000 ) && ($autobid->automatic_bid <= 30000 )
                                                            
                                                            $emailtest = $autobid->automatic_bid . $autobid->id;
                                                            $array_check= array();
                                                            foreach($check_exceed_mail as $check_mail){
                                                               $array_check[] =  $check_mail->mail_check;
                                                            }
                                                            
                                                            if (in_array($emailtest, $array_check)){ 
                                                                
                                                            }else{ 
                                                                ?>
                                                                 <!--echo "3";-->
                                                                <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                            
                                                            <?php
                                                            }
                                                                
                                                            ?>
                                                                
                                                            <?php 
                                                            
                                                         } 
                                                     }
                                                 }else if($maxbid <= 40000){
                                                     $new_auto_bid = $maxbid + 600;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          ?>
                                                        <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                        <?php
                                                     }else{
                                                         if($autobid->automatic_bid < $maxbid  ){     //($autobid->automatic_bid >30000 ) && ($autobid->automatic_bid <= 40000 )
                                                            
                                                                $emailtest = $autobid->automatic_bid . $autobid->id;
                                                                $array_check= array();
                                                                foreach($check_exceed_mail as $check_mail){
                                                                   $array_check[] =  $check_mail->mail_check;
                                                                }
                                                                
                                                                if (in_array($emailtest, $array_check)){ 
                                                                     
                                                                }else{ 
                                                                    ?>
                                                                     <!--echo "4";-->
                                                                    <div data-bid_id="<?=$autobid->id?>" data-mail_test="<?=$emailtest?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_exceed_section item"></div>
                                                                
                                                                <?php
                                                                }
                                                                    
                                                                ?>
                                                                    
                                                                <?php 
                                                        
                                                         }
                                                     }
                                                 }else {
                                                     $new_auto_bid = $maxbid + 800;
                                                     if(($new_auto_bid) < ($autobid->automatic_bid)){
                                                        //  echo $new_auto_bid;
                                                          ?>
                                                        <div data-bid_id="<?=$autobid->id?>" data-latest_bid="<?=$new_auto_bid;?>" class="autobid_section item"></div>
                                                        <?php
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
                                                         }   
                                                        ?>
                                                            
                                                        <?php 
                                                     }
                                             }
                                         }
                                    }
                                }
                            ?>