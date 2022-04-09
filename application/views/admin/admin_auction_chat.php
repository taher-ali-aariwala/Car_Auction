<div class="side-app">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="item2-gl">
                        <div class="item2-gl-nav clearfix mb-4">
                            <h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">Auction/Car Chat</h3>
                            <div class="float-right">
                                <a href="<?php echo base_url("Admin/get_admin_auction_chat");?>" class="position-relative inprogress_auction ml-2 btn btn-primary">Auction Chat
                                    <?php if(count($chat_notification_total_auction_msg) != 0){?>
                                        <span class="chat-notification font-weight-semibold d-flex justify-content-center align-items-center fs-12 text-white"><?= count($chat_notification_total_auction_msg); ?></span>
                                    <?php } ?>
                                </a> 
                                <a href="<?php echo base_url("Admin/get_direct_dealer_chat");?>" class="position-relative inprogress_auction ml-2 btn btn-outline-primary">Direct Dealer Chat
                                    <?php if(count($chat_notification_total_direct_msg) != 0){?>
                                        <span class="chat-notification font-weight-semibold d-flex justify-content-center align-items-center fs-12 text-white"><?= count($chat_notification_total_direct_msg); ?></span>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                        <div class="data-table text-center">
                            <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                <thead>
                                    <tr class="bg-dark-blue">
                                        <th class="text-white font-weight-semibold text-uppercase">Auction Name</th>
                                        <th class="text-white font-weight-semibold text-uppercase">Auction Link</th>
                                        <th class="text-white font-weight-semibold text-uppercase">Dealer Name</th>
                                        <th class="text-white font-weight-semibold text-uppercase">Email</th>
                                        <th class="text-white font-weight-semibold text-uppercase">Last Message Date</th>
                                        <th class="text-white font-weight-semibold text-uppercase">View Chats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($admin_auction_chat)){
                                    foreach($admin_auction_chat as $auctionchat){
                                    ?>
                                    <tr>
                                        <td><div class="d-flex align-items-center"><span class="profile-name"><?php echo strtoupper(substr($auctionchat->brand, 0, 1)); echo strtoupper(substr($auctionchat->model, 0, 1)); ?></span><span class="fs-12"><?= ucfirst($auctionchat->brand).' '.ucfirst($auctionchat->model); ?></span></div></td>
                                        <td class="text-center"><a href="<?=base_url();?>Website/auction_details/<?=$auctionchat->auction_id;?>" class="btn btn-outline-primary btn-sm"><i class="far fa-eye"></i> View Auction</a></td>
                                        <?php if($auctionchat->dealer_user_status == 'active'){ ?>
                                            <td class="position-relative"><div class="d-flex align-items-center"><span><?= ucfirst($auctionchat->dealer_name).' '.ucfirst($auctionchat->dealer_surname); ?></span>
                                                <span class="active-user">online</span>
                                            </div></td>
                                        <?php }else{ ?>
                                            <td><div class="d-flex align-items-center"><span><?= ucfirst($auctionchat->dealer_name).' '.ucfirst($auctionchat->dealer_surname); ?></span></div></td>
                                        <?php } ?>
                                        <td class="text-center"><?=$auctionchat->dealer_email;?></a></td>
                                        <?php
                                        if(!empty($chat_notification)){ 
                                        foreach($chat_notification as $chatnot){
                                         if($chatnot['chat_id'] == $auctionchat->chat_id){  
                                        ?>
                                        <td class="text-center"><a class="position-relative btn btn-warning btn-sm" href="<?= base_url(); ?>chat/start_chat/<?= $auctionchat->auction_id; ?>/<?= $auctionchat->dealer_id; ?>"><i class="far fa-eye pl-3"></i> Open Chat
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
                                            <div class="fs-15 d-block font"><?= $lastchatmsg[0]->created_at; ?></div>
                                        </td>
                                        <?php }}else{?>
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