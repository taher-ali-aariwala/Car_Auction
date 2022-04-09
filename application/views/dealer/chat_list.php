<div class="side-app">


    <div class="row">



        <div class="col-md-12">



            <div class="card">



                <div class="card-body">



                    <div class="item2-gl">



                        <div class="item2-gl-nav d-flex align-items-center mb-4">



                            <h3 class="mb-0 text-left card-active-btn">Auction/Car Chat</h3>
                            <!--<a href="<?= base_url(); ?>chat/start_chat" id="new_chatwith_team_btn"  class="mb-0 text-left card-active-btn">New Chat With Team +</a>-->
                            <div style="float:right; width:80%;">
                                <a href="<?php echo base_url("chat/start_chat");?>"  class="position-relative inprogress_auction ml-2 btn btn-outline-primary">New Chat With Team +
                                    <?php if(count($chat_notification_team_msg) != 0){?>
                                        <span class="chat-notification font-weight-semibold d-flex justify-content-center align-items-center fs-12 text-white"><?= count($chat_notification_team_msg); ?></span>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>

                        <div class="data-table text-center">
                            <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                <thead>
                                    <tr class="bg-dark-blue">
                                        <th class="text-white font-weight-semibold text-uppercase">Car Name</th>

                                        <th class="text-white font-weight-semibold text-uppercase">Auction Link</th>

                                        <th class="text-white font-weight-semibold text-uppercase">View Chats</th>
                                        
                                        <th class="text-white font-weight-semibold text-uppercase">Last Message Date</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($auction_chat)){
                                    foreach($auction_chat as $auctionchat){
                                        
                                    ?>

                                    <tr>

                                        <td><div class="d-flex align-items-center"><span class="profile-name"><?php echo strtoupper(substr($auctionchat->brand, 0, 1)); echo strtoupper(substr($auctionchat->model, 0, 1)); ?></span><span><?= ucfirst($auctionchat->brand).' '.ucfirst($auctionchat->model); ?></span></div></td>

                                        <td class="text-center"><a href="<?=base_url();?>Website/auction_details/<?=$auctionchat->auction_id;?>"><span class="table-detail-btn">Go To Auction</span></a></td>


                                        <?php
                                        if(!empty($chat_notification)){ 
                                        foreach($chat_notification as $chatnot){
                                         if($chatnot['chat_id'] == $auctionchat->chat_id){  
                                              
                                        ?>

                                        <td class="text-center"><a class="position-relative" href="<?= base_url(); ?>chat/start_chat/<?= $auctionchat->auction_id; ?>"><span class="table-detail-btn">Open Chat<i class="far fa-eye pl-3"></i></span>
                                            <?php if($chatnot['not_count'] != 0){?>
                                        <span class="chat-notification font-weight-semibold d-flex justify-content-center align-items-center fs-12 text-white"><?= $chatnot['not_count'];?></span>
                                        <?php } ?>
                                        </a></td>

                                        <?php }else{?>

                                        <?php } } } ?>
                                        
                                        
                                        <?php
                                        if(!empty($last_chatmsg)){
                                        foreach($last_chatmsg as $lastchatmsg){
                                             if(!empty($lastchatmsg)){
                                         if($lastchatmsg[0]->chat_id == $auctionchat->chat_id){   
                                        ?>
                                        <td>
                                            <div>
                                                <span class="fs-16 d-block font"><?= $lastchatmsg[0]->created_at; ?></span>
                                            </div>
                                        </td>
                                        <?php } }else{?> 

                                        <?php } } } ?>


                                        
                                    </tr>
                                    
                                    <?php } } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>



        </div>



    </div>


</div>