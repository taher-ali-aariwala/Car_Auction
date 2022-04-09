<div class="side-app">


    <div class="row">



        <div class="col-md-12">



            <div class="card">



                <div class="card-body">



                    <div class="item2-gl">



                        <div class="item2-gl-nav d-flex align-items-center mb-4">



                            <h3 class="mb-0 text-left card-active-btn">Auction/Car Chat</h3>
                            
                           

                        </div>

                        <div class="data-table text-center">
                            <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                <thead>
                                    <tr class="bg-dark-blue">
                                        <th class="text-white font-weight-semibold text-uppercase">Dealer Name</th>

                                        <th class="text-white font-weight-semibold text-uppercase">Email</th>

                                        <th class="text-white font-weight-semibold text-uppercase">Last Message Date</th>

                                        <th class="text-white font-weight-semibold text-uppercase">View Chats</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($auction_chat_dealers)){
                                    foreach($auction_chat_dealers as $auctionchat){
                                        
                                    ?>

                                    <tr>

                                        <?php if($auctionchat->dealer_user_status == 'active'){ ?>

                                            <td><div class="d-flex align-items-center"><span class="profile-name user-active-status  position-relative"><?php echo strtoupper(substr($auctionchat->dealer_name, 0, 1)); echo strtoupper(substr($auctionchat->dealer_surname, 0, 1)); ?></span><span><?= ucfirst($auctionchat->dealer_name).' '.ucfirst($auctionchat->dealer_surname); ?></span></div></td>

                                        <?php }else{ ?>

                                            <td><div class="d-flex align-items-center"><span class="profile-name"><?php echo strtoupper(substr($auctionchat->dealer_name, 0, 1)); echo strtoupper(substr($auctionchat->dealer_surname, 0, 1)); ?></span><span><?= ucfirst($auctionchat->dealer_name).' '.ucfirst($auctionchat->dealer_surname); ?></span></div></td>

                                        <?php } ?>

                                        <td class="text-center"><?=$auctionchat->dealer_email;?></a></td>

                                        <td>
                                            <div>
                                                <span class="fs-16 d-block font">03/12/2021</span>
                                                <span class="fs-15">15:24:42</span>
                                            </div>
                                        </td>

                                        <td class="text-center"><a href="<?= base_url(); ?>chat/start_chat/<?= $auctionchat->auction_id; ?>/<?= $auctionchat->dealer_id; ?>"><span class="table-detail-btn">Open Chat<i class="far fa-eye pl-3"></i></span></a></td>

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