 <div class="row" id="video_section">

        <div class="col-md-12">

            <div class="card">
                
                <div class="card-body">

                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 

                            <h2 class="text-green font-weight-semibold mt-3">Insert Videos</h2> 

                        </div>
                        <div class="row mb-5">
                            
                        <div class="col-lg-4 mb-3">
                            <?php
                             if(isset($single_auction_details)){
                             foreach($single_auction_details as $single_details){
                                 if(empty($single_details->main_video)){
                            ?>
                            <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-video-model">
                                <i class="fab fa-youtube fs-54 text-primary mb-4"></i>
                                <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload exterior + interior car videos</h3>
                            </a>
                            <?php }else{ ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-video-model">
                                  <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added Car Video.<br> Click to see preview.</h5>
                                  <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                  <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Upload exterior + interior car videos +</h3>
                                </a>
                            <?php } } } else{ ?>
                            
                            <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-video-model">
                                <i class="fab fa-youtube fs-54 text-primary mb-4"></i>
                                <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload exterior + interior car videos</h3>
                            </a>
                            
                            <?php } ?>
                            <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('main_video'); ?></span>
                            
                            <div class="modal fade" id="enter-video-model" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="pb-0 border-0">
                                       <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload exterior + interior car videos</h3>
                                       <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                    </div>
                                    <!-- Modal body -->
                                    <?php 
                                        $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                        echo form_open_multipart('Admin/update_video_auction_car', $attributes); 
                                    ?>
                                 
                                    
                                    <div class="modal-body pt-0 text-center enter-images-field">
                                       <div class="h-290">
                                           <?php
                                                if(!empty($single_auction_details)){
                                                
                                            ?>
                                          <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                            <?php
                                                
                                                foreach($single_auction_details as $single_details){
                                            ?>
                                              <?= $single_details->main_video; ?>
                                              
                                             <!--<div class="preview-img">-->
                                             <iframe width="560" height="315" src="https://www.youtube.com/embed/qbRwwZFPGuE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                 <!--<iframe width="400" height="100" src="<?= $single_details->main_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                                <!--<img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_transmission->media; ?>" alt="">-->
                                                <!--<a href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_transmission->id; ?>/<?= $media_transmission->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>-->
                                             <!--</div>-->
                                             
                                            <?php }  ?> 
                                             
                                          </div>
                                          <?php } ?> 
                                          <div class="d-flex justify-content-center">
                                                <div class="control-group" id="fields">  
                                                    <div class="controls"> 
                                                        <div class="entry input-group upload-input-group mb-4"> 
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" id="main_video" name="main_video" value="<?php echo set_value('main_video', $this->session->userdata('main_video')); ?>" placeholder="Insert the Youtube Embed Video code">
                                                            </div> 
                                                        </div>
                                                    </div>  
                                                </div>
                                           </div>
                                          <?php  if(isset($auc_id)){
                                                if(!empty($auc_id)){
                                          ?>
                                          <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                
                                          <button type="submit" class="w-100 model-send-btn bg-dark-blue text-white fs-18 p-2 mt-4 mb-3 d-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                         <?php } }else{ ?>
                                         <span style="color:red">Please fill "insert main car data" section first.</span>
                                         <?php } ?>
                                       </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                 </div>
                              </div>
                            </div>
                        </div>
                            
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    














 <div class="row" id="morevideo_section">

        <div class="col-md-12">

            <div class="card">
                
                <div class="card-body">

                    <div class="item2-gl">
                        <div class="section-title center-block text-center"> 

                            <h2 class="text-green font-weight-semibold mt-3">Video</h2> 

                        </div>
                        <?php
                            if($this->session->flashdata('auc_morevideo_error')){
                                echo '<div class="alert alert-danger border-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("auc_morevideo_error")  
                                        .'</div>';
                            }else if($this->session->flashdata('auc_morevideo_success')){
                                echo '<div class="alert alert-success border-success">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("auc_morevideo_success")  
                                        .'</div>';
                            }
                        ?>
                        <div class="row mb-5">
                            
                            <div class="col-lg-4 mb-3">
                            <?php
                                    if(empty($auction_morevideo)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-morevideo-model">
                                    <i class="fab fa-youtube fs-54 text-primary mb-4"></i>
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14 px-1">Upload exterior + interior car videos</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-morevideo-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_morevideo);?> Videos</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More exterior + interior car videos +</h3>
                                    </a>
                                <?php } ?>
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('more_video'); ?></span>
                                
                                <div class="modal fade" id="enter-morevideo-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                         Modal Header 
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload exterior + interior car videos</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                         Modal body 
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_morevideo_auction_car', $attributes); 
                                        ?>
                                        
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                           <div class="h-290">
                                               <?php
                                                    if(!empty($auction_morevideo)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center" >
                                                <?php
                                                    
                                                    foreach($auction_morevideo as $morevideo){
                                                ?>
                                                <div  width="300px" height="300px" >
                                                    <?= $morevideo->video_url; ?>
                                                </div>
                                                  
                                                 <div class="preview-img">
                                                     <iframe width="200" height="150" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                   
                                                    <a style="width:16px; height:20px; position:absolute; background:red; top:10px; margin-left:160px;" class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_morevideo/<?= $morevideo->id; ?>/<?= $morevideo->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 <
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="morevideo-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                           
                                                          <div class="show-preview">
                                                             <div id="document_image_preview"></div>
                                                          </div>
                                                          
                                                          <div class="custom-file">
                                                             <input type="text" class="form-control" id="more_video" name="more_video[]" placeholder="Youtube Embed Video Code..">
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-morevideo" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                          
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="w-100 model-send-btn bg-dark-blue text-white fs-18 p-2 mt-4 mb-3 d-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                     </div>
                                  </div>
                                </div>
                            </div>
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
<script>

    function myTimerFunction(id) {  
        alert(id); 
    var auctiontime = document.getElementById('auctiontime'+id).value;  
        alert(auctiontime);
        // Set the date we're counting down to
        var countDownDate = new Date(auctiontime).getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          // Output the result in an element with id="demo"
          document.getElementById('auction_timer'+id).innerHTML = days + ": " + hours + ": "
          + minutes + ": " + seconds + "";
            
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById('auction_timer'+id).innerHTML = "EXPIRED";
          }
        }, 1000);
    }    
</script>

<?php
        }
    }
?>