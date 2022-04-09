<?php 
date_default_timezone_set("Asia/Kolkata");
$currnt_time  =  date("Y-m-d H:i:s");
?>


<div class="side-app">

   <div class="page-header">

      <h4 class="page-title py-3">Chat</h4>
      
      
      
      <div class="d-flex align-items-center">
            <?php if(!empty($chats)){ ?>
            <?php if($chats[0]->auction_id != 0){ ?>
                <a href="<?= base_url();?>Website/auction_details/<?=$chats[0]->auction_id?>" class="btn btn-outline-primary mr-4">Go To Auction</a>
            <?php } } ?>
      
            <a href="<?php echo base_url("Dealer/Chat_list");?>"  style="float: right;" class="position-relative inprogress_auction ml-2 btn btn-outline-primary">Auction/Car Chat List
                <?php if(count($chat_all_auction_notification) != 0){?>
                    <span class="chat-notification font-weight-semibold d-flex justify-content-center align-items-center fs-12 text-white"><?= count($chat_all_auction_notification); ?></span>
                <?php } ?>
            </a>
      </div>

   </div>

   <div class="row">

      <div class="col-md-12">

         <div class="card">

            <div class="card-body p-6">

               <div data-id='<?php echo $chat_id; ?>' id="chat-id">

                  <div class="vertical-align">

                     <div class="p-0">

                        <div class="row">

                           <div class="col-sm-12">

                              <div class="no-border">

                                 <div id="chat" class="conv-form-wrapper">

                                    <div class="load_chat" >

                                        <div class="wrapper-messages">

                                          <div class="spinLoader hidden"></div>

                                           

                                              <div id="messages" class=""  style="padding-bottom: 0px;">

                                                <?php

                                                    if(!empty($chats)){
                                                    $a = array();
                                                    foreach($chats as $chat){

                                                        // time function
                                                      $t_time   = strtotime($chat->created_at);
                                                      $datenew=date_create("$chat->created_at");
                                                      $fordate = date_format($datenew,"d/m/Y");
                                                     // current date
                                                     $f_time = strtotime($currnt_time);

                                                     $tim_mn = round(($f_time - $t_time) / 60). "minute ago";
                                                     @$ti_sc = $tim_mn * 60 ;

                                                     $t_elapsd = timeAgo($ti_sc); 
                                                        
                                                   
                                                            $today = date("d/m/Y");
                                                            $yes = date('d/m/Y',strtotime("-1 days"));
                                                            
                                                            if(in_array($fordate, $a)){
                                                                
                                                            }else{ 
                                                            array_push($a, $fordate); 
                                                            ?> 
                                                                 <?php  if($today == $fordate){  ?> 
                                                                 
                                                                        <span class="d-flex justify-content-center"><span style="background:aliceblue; padding:0 10px;">Today</span></span> 
                                                                        
                                                                <?php   
                                                                }else if($yes == $fordate){
                                                                ?>
                                                                        <span class="d-flex justify-content-center"><span style="background:aliceblue; padding:0 10px;">Yesterday</span></span>
                                                                
                                                                 <?php } else{ ?>
                                                                        <span class="d-flex justify-content-center"><span style="background:aliceblue; padding:0 10px;"><?= $fordate;?></span></span> 
                                                                
                                                                <?php } ?>
                                                            <?php  
                                                                
                                                            } 
                                                        
                                                    
                                                    if($chat->sender_id == $_SESSION['dl_user_id']){  



                                                      

                                                ?>

                                                 
                                                   <div class="d-flex justify-content-end" >
                                                      <div class="message from">
                                                        <?php if(!empty($chat->files)){ $file = new SplFileInfo($chat->files);  $ex = $file->getExtension();  ?>
                                                                <?php if($ex == 'jpg' || $ex == 'jpeg' || $ex == 'png' || $ex == 'gif' || $ex == 'webp' ){  ?>
                                                                    <p class="mb-0">
                                                                        <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" class="light-link">
                                                                            <img src="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>"alt="Astemotori" width="auto" height="100px">
                                                                        </a>
                                                                    </p>
                                                                    <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" download="myimage" ><i class="la la-cloud-download text-white"></i></a>
                                                                <?php }else{ ?>
                                                                    <a href="<?php echo base_url('uploads/chat/')?><?php echo $chat->files; ?>"  style="color:white" class=" text-capitalize d-flex align-items-center upload-btn w-100 p-0 justify-content-center">Document<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                         <p class="mb-0"><?= nl2br($chat->message);?></p>
                                                         <span class="chat-time d-inline-block text-right"><?php  echo date('h:i A', strtotime($chat->created_at)); ?></span>
                                                      </div>
                                                      <img src="<?=base_url();?>/assets/images/users/avatar2.png" alt="avatar-img" class="avatar-img">
                                                   </div>
                                                        

                                                    <?php 
                                                    }else{ 
                                                    ?>

                                                    

                                                   <div class="d-flex justify-content-start">
                                                      <img src="<?=base_url();?>/assets/images/users/avatar.jpg" alt="avatar2-img" class="avatar2-img">
                                                      <div class="message to ready">
                                                        <?php if(!empty($chat->files)){ $file = new SplFileInfo($chat->files); $ex = $file->getExtension();  ?>
                                                                    <?php if($ex == 'jpg' || $ex == 'jpeg' || $ex == 'png' || $ex == 'gif' || $ex == 'webp' ){  ?>
                                                                        <p class="mb-0">
                                                                            <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" class="light-link">
                                                                                <img src="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" alt="Astemotori" width="auto" height="100px">
                                                                            </a>
                                                                            
                                                                        </p>
                                                                        <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" download="myimage" ><i class="la la-cloud-download text-white"></i></a>
                                                                    <?php }else{  ?>
                                                                            <a href="<?php echo base_url('uploads/chat/')?><?php echo $chat->files; ?>"  class=" text-capitalize d-flex align-items-center upload-btn w-100 p-0 justify-content-center">Document<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
                                                                    <?php } ?>
                                                            <?php } ?>
                                                         <p class="mb-0"><?= nl2br($chat->message);?></p>
                                                         <span class="chat-time d-inline-block text-right text-black"><?php  echo date('h:i A', strtotime($chat->created_at)); ?></span>
                                                      </div>
                                                   </div>
                                                        

                                                    <?php 
                                                    }
                                                    ?>

                                                <?php   

                                                    } 

                                                    } 

                                                ?>

                                              </div>

                                        </div>

                                    </div>

                                    <div class="input-group mt-5">

                                       <form id="form_chat" name="form_chat" method="post" class="w-100">

                                          <input type="hidden" name="chat_id" value="<?php echo $chat_id;?>">

                                          <div class="input-group mt-3 mb-3 w-100">
                                                <!--<div class="preview" style="width:50px">-->
                                                <!--   <img class="previewimg" id="file-ip-1-preview">-->
                                                <!--</div>-->
                                                <div class="upload upload-doc">
                                                   <label class="upload-area mb-0 mt-3">
                                                       <label for="file-upload" class="custom-file-upload">
                                                        <i class="fa fa-cloud-upload"></i> Select File
                                                      </label>
                                                      <input type="file" name="files" class="files" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp, .pdf,.doc,.docx" onchange="showPreview(event);">
                                                      <span class="upload-button">
                                                         <i class="fas fa-paperclip file-upload-chat"></i>
                                                      </span>
                                                   </label>
                                                </div>

                                                
                                             <textarea name="msg_text"  style="width: 80%; resize: none; overflow: hidden;" class="form-control msg_text chat-textarea" placeholder="Write a message here" onkeydown="submitmsg_onenter()"></textarea>
                                              <!-- -->
                                             <div class="input-group-prepend align-items-center">
                                                

                                                <button type="submit" id="chat_btn" style="padding: 9px; height:90%; margin-left:15px;" class="btn btn-primary" type="button"><i class="fas fa-paper-plane text-white fs-18"></i></button>
                                             </div>
                                          </div>

                                       </form>

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

      </div>

   </div>

</div>





<?php

function timeAgo($time_sec)
{
    $time_elapsed   = $time_sec;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}
?>


<script>

// function showPreview(event){
//   if(event.target.files.length > 0){
//     var src = URL.createObjectURL(event.target.files[0]); 
//     var preview = document.getElementById("file-ip-1-preview");
//     preview.src = src;
//     preview.style.display = "block";
//   }
// }


 function submitmsg_onenter() {
  if (event.which == 13) { 
      event.preventDefault();
  
      var msg_text = $('.msg_text').val();
     
      if(msg_text !=''){ 
        $("#form_chat").submit();
      }
  }
}
        
</script>