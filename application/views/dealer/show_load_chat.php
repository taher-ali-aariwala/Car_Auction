<?php $this->load->view('dealer/layouts/header_scripts'); ?>

<?php 
date_default_timezone_set("Asia/Kolkata");
$currnt_time  =  date("Y-m-d H:i:s");
?>


<!-- <div class="wrapper-messages"> -->

  <!-- <div class="spinLoader hidden"></div> -->

   

      <!-- <div id="messages"  style="padding-bottom: 0px;"> -->

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

           <!-- <div class="message from">test<span class="chat-time d-inline-block text-right"><i class="far fa-clock mr-1"></i>11:00 AM</span></div><img src="<?=base_url();?>/assets/images/users/avatar2.png" alt="avatar-img" class="avatar-img"> -->
           <div class="d-flex justify-content-end">
              <div class="message from">
                <?php if(!empty($chat->files)){  $file = new SplFileInfo($chat->files);  $ex = $file->getExtension();  ?>
                        <?php if($ex == 'jpg' || $ex == 'jpeg' || $ex == 'png' || $ex == 'gif' || $ex == 'webp' ){  ?>
                            <p class="mb-0">
                                <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" class="light-link">
                                    <img src="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>"alt="Astemotori" width="auto" height="100px">
                                </a>
                                </p>
                            <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" download="myimage" ><i class="la la-cloud-download text-white"></i></a>
                        <?php }else{ ?>
                            <a href="<?php echo base_url('uploads/chat/')?><?php echo $chat->files; ?>" style="color:white" class=" text-capitalize d-flex align-items-center upload-btn w-100 p-0 justify-content-center">Document<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
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
                <?php if(!empty($chat->files)){   $file = new SplFileInfo($chat->files);  $ex = $file->getExtension();  ?>
                        <?php if($ex == 'jpg' || $ex == 'jpeg' || $ex == 'png' || $ex == 'gif' || $ex == 'webp' ){  ?>
                            <p class="mb-0">
                                <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" class="light-link">
                                    <img src="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>"alt="Astemotori" width="auto" height="100px">
                                </a>
                            </p>
                            <a href="<?php echo base_url();?>uploads/chat/<?php echo $chat->files;?>" download="myimage" ><i class="la la-cloud-download text-white"></i></a>
                        <?php }else{ ?>
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

      <!-- </div> -->

<!-- </div> -->



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



<!-- JQuery js-->
<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>

  

<script src="<?=base_url();?>assets/js/lightgallery-all.min.js"></script>
<script>
    $("#messages").lightGallery({
       selector: '.light-link'
    });
 </script>
<script>


//  function submitmsg_onenter() {
//   if (event.which == 13) { 
//       event.preventDefault();
  
//       var msg_text = $('.msg_text').val();
     
//       if(msg_text !=''){ 
//         $("#form_chat").submit();
//       }
//   }
// }
        
</script>

