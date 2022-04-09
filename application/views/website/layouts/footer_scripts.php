

		<!-- JQuery js-->

		<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>-->

		<!-- Bootstrap js -->

		<script src="<?=base_url();?>assets/plugins/bootstrap-4.3.1/js/popper.min.js"></script>

		<script src="<?=base_url();?>assets/plugins/bootstrap-4.3.1/js/bootstrap.min.js"></script>



		<!--JQueryVehiclerkline Js-->

		<script src="<?=base_url();?>assets/js/jquery.sparkline.min.js"></script>



		<!-- Circle Progress Js-->

		<script src="<?=base_url();?>assets/js/circle-progress.min.js"></script>



		<!-- Star Rating Js-->

		<script src="<?=base_url();?>assets/plugins/rating/jquery.rating-stars.js"></script>



		<!--Counters -->

		<script src="<?=base_url();?>assets/plugins/counters/counterup.min.js"></script>

		<script src="<?=base_url();?>assets/plugins/counters/waypoints.min.js"></script>

		<script src="<?=base_url();?>assets/plugins/counters/numeric-counter.js"></script>



		<!--Owl Carousel js -->

		<script src="<?=base_url();?>assets/plugins/owl-carousel/owl.carousel.js"></script>



		<!--Horizontal Menu-->

		<script src="<?=base_url();?>assets/plugins/horizontal-menu/horizontal.js"></script>



		<!--JQuery TouchSwipe js-->

		<script src="<?=base_url();?>assets/js/jquery.touchSwipe.min.js"></script>



		<!--Select2 js -->

		<script src="<?=base_url();?>assets/plugins/select2/select2.full.min.js"></script>

		<script src="<?=base_url();?>assets/js/select2.js"></script>



		<!-- Sticky Js-->

		<script src="<?=base_url();?>assets/js/sticky.js"></script>

        <script src="<?=base_url();?>assets/js/sticky-sidebar.js"></script>



		<!-- Cookie js -->

		<script src="<?=base_url();?>assets/plugins/cookie/jquery.ihavecookies.js"></script>

		<script src="<?=base_url();?>assets/plugins/cookie/cookie.js"></script>



		<!--Showmore Js-->

		<script src="<?=base_url();?>assets/js/jquery.showmore.js"></script>

		<script src="<?=base_url();?>assets/js/showmore.js"></script>



        <!-- Custom scroll bar Js-->

		<script src="<?=base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.js"></script>



		<!-- Swipe Js-->

		<script src="<?=base_url();?>assets/js/swipe.js"></script>







		<!-- Custom Js-->

		<script src="<?=base_url();?>assets/js/custom.js"></script>



		<!-- Owl Carousel Js-->

		<script src="<?=base_url();?>assets/js/owl-carousel.js"></script>
		
		<!---------------------------------------------------------------->
		<!---------------------------------------------------------------->
		
		<!----------------- Form js validation on keyup ------------->

        <script>
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#repeat_password").val();
            if (password != confirmPassword)
                $("#c_error").html("Passwords does not match!");
            else
                $("#c_error").html("Passwords match.");
        }
        $(document).ready(function () {
           $("#repeat_password").keyup(checkPasswordMatch);
           
        });
        
        // --------------------------------------------------
        
        
            
     
        var maxLength = 20;
        $(document).ready(function(){
            $('#name').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > maxLength){
                    $('#name_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, maxLength));
                }else{
                    $('#name_error').text('');
                }
            });
        });
        
     
        $(document).ready(function(){
            $('#surname').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > maxLength){
                    $('#surname_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, maxLength));
                }else{
                    $('#surname_error').text('');
                }
            });
        });
         var maxLengthem = 40;
         $(document).ready(function(){
            $('#email').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > maxLengthem){
                    $('#email_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, maxLengthem));
                }else{
                    $('#email_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#company_name').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#company_name_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#company_name_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#phone').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength < 6){
                    $('#phone_error').text('Length is short, minimum '+6+' required.');
                }else if(charLength > 15){
                    $('#phone_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 15));
                }else{
                    $('#phone_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#address').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 50){
                    $('#address_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 50));
                }else{
                    $('#address_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#city').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#city_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#city_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#province').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
               if(charLength > 30){
                    $('#province_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#province_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#postal_code').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#postal_code_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#postal_code_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#vat_number').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#vat_number_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#vat_number_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#make').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#make_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#make_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#model').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#model_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#model_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#kilometers').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#kilometers_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#kilometers_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#year').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#year_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#year_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#engine').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#engine_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#engine_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#gearbox').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#gearbox_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#gearbox_error').text('');
                }
            });
        });
        
        
        var maxLength = 20;
        $(document).ready(function(){
            $('#sellar_name').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > maxLength){
                    $('#sellar_name_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, maxLength));
                }else{
                    $('#sellar_name_error').text('');
                }
            });
        });
        
     
        $(document).ready(function(){
            $('#sellar_surname').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > maxLength){
                    $('#sellar_surname_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, maxLength));
                }else{
                    $('#sellar_surname_error').text('');
                }
            });
        });
        
        $(document).ready(function(){
            $('#sellar_phone').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength < 6){
                    $('#sellar_phone_error').text('Length is short, minimum '+6+' required.');
                }else if(charLength > 15){
                    $('#sellar_phone_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 15));
                }else{
                    $('#sellar_phone_error').text('');
                }
            });
        });
        $(document).ready(function(){
            $('#sellar_city').on('keydown keyup change', function(){
                var char = $(this).val();
                var charLength = $(this).val().length;
                if(charLength > 30){
                    $('#sellar_city_error').text('You have exceeded the maximum character limit');
                    $(this).val(char.substring(0, 30));
                }else{
                    $('#sellar_city_error').text('');
                }
            });
        });
        </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-----------------------  auction details page js-------------------->
    <!-------------------------------------------------------------------->
    
    
    <script src="<?=base_url();?>assets/plugins/counters/jquery.missofis-countdown.js"></script>

    <script src="<?=base_url();?>assets/plugins/counters/counter.js"></script>

    <script src="<?=base_url();?>assets/js/lightgallery-all.min.js"></script>

    <script>
    
     $('.table_coro_ef').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ef-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_of').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-of-'+id).lightGallery({
                selector: '.table-link'
            })
     });
    //  ------------
      $('.table_coro_el').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-el-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_ol').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ol-'+id).lightGallery({
                selector: '.table-link'
            })
     });
    //  ----------------
     $('.table_coro_eri').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-eri-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_ori').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ori-'+id).lightGallery({
                selector: '.table-link'
            })
     });
    //  ---------------
      $('.table_coro_ere').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ere-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_ore').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ore-'+id).lightGallery({
                selector: '.table-link'
            })
     });
    //  -----------
      $('.table_coro_ei').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ei-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_oi').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-oi-'+id).lightGallery({
                selector: '.table-link'
            })
     });
    //  -----------
      $('.table_coro_ee').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ee-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_oe').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-oe-'+id).lightGallery({
                selector: '.table-link'
            })
     });
    //  -------------
      $('.table_coro_ero').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-ero-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_oro').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-oro-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
    //  ---------------------
    $('.table_coro_eall').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-eall-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     $('.table_coro_oall').each(function(){ 
 
            let id = $(this).data("id"); // 2
             $('#table-carousel-oall-'+id).lightGallery({
                selector: '.table-link'
            })
     });
     
     
     
    
    // $('#table-carousel3').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel4').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel5').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel6').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel7').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel8').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel9').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel10').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel11').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel12').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel13').lightGallery({
    //     selector: '.table-link'
    // })
    
    // $('#table-carousel14').lightGallery({
    //     selector: '.table-link'
    // })
    
    $("#owl-demo2").lightGallery({
       selector: '.carousel-link'
    });

    $("#revisions-carousel").lightGallery({
       selector: '.carousel-link'
    });

    $("#animated-thumbnials").lightGallery({
       selector: '.light-link'
    });

    $("#photos-gallery").lightGallery({
       selector: '.photos-gallery'
    });

    $("#wheel-images").lightGallery({
       selector: '.wheel-images'
    });
   
     //______________sidebar fixed on scrolliing
     var a = new StickySidebar('#sticky-sidebar-main', {
        topSpacing: 85,
        containerSelector: '.col-xl-4',
        innerWrapperSelector: '.sidebar__inner'
    });
    </script>
   
    <!--------------------------------------------------->
    
    <script>
        $(function(){
        	$('.countdown').each(function(){
        		$(this).countdown($(this).attr('value'), function(event) {
            	$(this).text(
              	event.strftime('%D days %H:%M:%S')
              );
        		});
        	});
        });
    </script>
    
    
    
  
<script>
$('.favoritebtn').click(function(){

    var auc_id = $(this).parent().data('id');

    	
    $.ajax({
		url: "<?php echo base_url("Dealer/add_to_wishlist");?>",
		type: "POST",
		data: {
			auc_id: auc_id,
		},
		cache: false,
		success: function(dataResult){
		   $("#favid"+auc_id).removeClass("favoritebtn");
		   $("#favid"+auc_id).addClass("deletefavoritebtn");
		     $("#favid"+auc_id).load(document.URL +  ' "#favid"+auc_id');
		  // $("#favid"+auc_id).css("background-color", "red");
        //   $("#favid"+auc_id).load(document.URL +  "#favid"+auc_id);
// 		 window.location.reload();	
// 			"color:white; background: #080e1b;"
		}
	});
});
</script>

<script>
$('.deletefavoritebtn').click(function(){

    var auc_id = $(this).parent().data('id');

    	
    $.ajax({
		url: "<?php echo base_url("Dealer/delete_to_wishlist");?>",
		type: "POST",
		data: {
			auc_id: auc_id,
		},
		cache: false,
		success: function(dataResult){
		     $("#favid"+auc_id).removeClass("deletefavoritebtn");
		   $("#favid"+auc_id).addClass("favoritebtn");
		   $("#favid"+auc_id).load(document.URL +  ' "#favid"+auc_id');
		  // $("#favid"+auc_id).css("background-color", "#080e1b");
		  // $("#favid"+auc_id).load(document.URL +  "#favid"+auc_id);
// 		 window.location.reload();	
			
		}
	});
});
</script>

<script>
    $(".auclist").on('load', function(){
        alert("window t load");
    });
</script>
<script>
    $('.countdownpp').each(function(){ 
        // alert($(this).attr('value'));
        
            let timer = $(this).data("timer"); //50min
            let id = $(this).data("id"); // 2
            
        // Set the date we're counting down to
            var countDownDate = new Date(timer).getTime();
            
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
            
              // Display the result in the element with id="demo"
              document.getElementById(id).innerHTML = '<div class="d-flex justify-content-center ttimer"><i style="position:absolute; top: 10px; font-size: 19px; left: 0px; color: white;" class="far fa-clock mr-2"></i><span class="countdowns text-white bg-danger d-flex justify-content-center align-items-center">'+hours+':</span><span class="countdowns text-white bg-danger d-flex justify-content-center align-items-center">'+minutes+':</span><span class="countdowns text-white bg-danger d-flex justify-content-center align-items-center">'+seconds+'</span></div>';
              
    //         <div class="d-flex justify-content-center">
    //             <i style="position:absolute; top: 10px; font-size: 19px; left: 0px; color: white;" class="far fa-clock mr-2"></i>
    //             <span class="countdowns text-white bg-danger d-flex justify-content-center align-items-center">01:</span>
				// <span class="countdowns text-white bg-danger d-flex justify-content-center align-items-center">02:</span>
				// <span class="countdowns text-white bg-danger d-flex justify-content-center align-items-center">03</span>
    //         </div>
              
              
            //   document.getElementById('bb'+id).innerHTML = minutes + " : ";
            //   document.getElementById('cc'+id).innerHTML = seconds + "";
            
            //   document.getElementById('hours'+id).innerHTML = hours;
              
            //   document.getElementById('minutes'+id).innerHTML = minutes;
              
            //   document.getElementById('seconds'+id).innerHTML = seconds;
              
              // If the count down is finished, write some text
              if (distance < 0) {
                // clearInterval(x);
                document.getElementById(id).innerHTML = '<div class="d-flex justify-content-center "><i style="position:absolute; top: 10px; font-size: 19px; left: 0px; color: white;" class="far fa-clock mr-2"></i><span class="countdown text-white bg-danger d-flex justify-content-center align-items-center">EXPIRED</span></div>';
              }else if(distance > 86400000){
                  document.getElementById(id).innerHTML = '<div class="d-flex justify-content-center "><i style="position:absolute; top: 10px; font-size: 19px; left: 0px; color: white;" class="far fa-clock mr-2"></i><span class="countdown text-white bg-danger d-flex justify-content-center align-items-center">'+days+' Days</span></div>';
              }
              
            //   if(distance < 86400000)
            //   clearInterval(x);
            //     document.getElementById(id).innerHTML = days + " Days";
            //   }else{
            //       document.getElementById('hours'+id).innerHTML = hours;
            //       document.getElementById('minutes'+id).innerHTML = minutes;
            //       document.getElementById('seconds'+id).innerHTML = seconds;
            //   }
              
            }, 1000);

    });
</script>

<!-------------------------------------->
<script>

setTimeout(function() {
    $('.alert-danger').fadeOut('fast');
}, 8000); 

setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 20000); 
    
</script>

<script>
    function check_current_bid() {
       
        $("#auto_error").html("Please make an offer first, then you can also use automatic bid option too..");
    }    
       
</script>

<script>
    function check_bid_otheruser() {
       
        $("#auto_otheruser_error").html("Only dealer can bid");
    }    
       
</script>

<script>
    function check_makebid_otheruser() {
       
        $("#makebid_otheruser").html("Only dealer can bid");
    }    
       
</script>

<script>
    function check_chat_otheruser() {
       
        $("#chat_otheruser").html("Only dealer can Chat From Here");
    }    
       
</script>



<!------------------------------------->
<!-------------- start ---------------->
<!------ automatic bid autostore ------>

<script>

 
    
        $(document).ready(function() {
        
                $('.autobid_section').each(function(){ 
               
                    var bid_id = $(this).data("bid_id"); //50min
                    var latest_bid = $(this).data("latest_bid"); // 2
                   
                   $.ajax({
                		url: "<?php echo base_url("Website/save_automatic_bids");?>",
                		type: "POST",
                		data: {
                			bid_id: bid_id,
                			latest_bid: latest_bid,
                		},
                		cache: false,
                		success: function(data){
                		       console.log(data);
                		  	
                		}
                	});
                        	
                });	
                
        });
       
       
       
       setInterval(function() {
           let auctionId = $("#auction-id").data("id");
                $.ajax({
            		url: "<?php echo base_url("Website/getLatestBidData");?>",
            		type: "POST",
            		data: {
            		    "auction_id" : auctionId
            		},
            		cache: false,
            		success: function(data){
            		    if (data != 'error') {
            		    $("#ajaxdivsidebar").html(data);    
            		    }
            		    
            		      // console.log(data);
            		  	
            		}
            	});
       }, 100000000); 
  
</script>

<!------------------------------------------------->
<!------------- exceed automatic bid -------------->
<script>

        $(document).ready(function() {
        
            $('.autobid_exceed_section').each(function(){ 
           
                var bid_id = $(this).data("bid_id"); //50min
                var latest_bid = $(this).data("latest_bid"); // 2 
                var mail_test = $(this).data("mail_test");
               
               $.ajax({
            		url: "<?php echo base_url("Website/exceed_automatic_bids");?>",
            		type: "POST",
            		data: {
            			bid_id: bid_id,
            			latest_bid: latest_bid,
            			mail_test: mail_test,
            		},
            		cache: false,
            		success: function(data){
            		       console.log(data);
            		  	
            		}
            	});
                    	
            });	
                
        });
    
</script>

<script>
    $(document).ready(function() {
        $('#tab-all').addClass( "active" );
        $('#show_all_damage').addClass( "active_all_damage" );
     
          $('#show_all_damage').on('click', function(){
            //  $( "p" ).removeClass( "active" );
             $('#tab-left').removeClass( "active" );
             $('#tab-right').removeClass( "active" );
             $('#tab-front').removeClass( "active" );
             $('#tab-rear').removeClass( "active" );
             $('#tab-interior').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-engine').removeClass( "active" );
             $('.tabs-menu1 ul li a').removeClass( "active" );
             $('#tab-all').addClass( "active" );
             $('#show_all_damage').addClass( "active_all_damage" );
          });  
          
           $('#front_damage').on('click', function(){
             $('#tab-all').removeClass( "active" );
             $('#tab-left').removeClass( "active" );
             $('#tab-right').removeClass( "active" );
             $('#tab-rear').removeClass( "active" );
             $('#tab-interior').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-engine').removeClass( "active" );
             $('#show_all_damage').removeClass( "active_all_damage" );
             $('#tab-front').addClass( "active" );
          });
          
          $('#left_damage').on('click', function(){
             $('#tab-right').removeClass( "active" );
             $('#tab-front').removeClass( "active" );
             $('#tab-rear').removeClass( "active" );
             $('#tab-interior').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-engine').removeClass( "active" );
             $('#tab-all').removeClass( "active" );
             $('#show_all_damage').removeClass( "active_all_damage" );
             $('#tab-left').addClass( "active" );
          });
          
          $('#right_damage').on('click', function(){
             $('#tab-left').removeClass( "active" );
             $('#tab-front').removeClass( "active" );
             $('#tab-rear').removeClass( "active" );
             $('#tab-interior').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-engine').removeClass( "active" );
             $('#tab-all').removeClass( "active" );
             $('#show_all_damage').removeClass( "active_all_damage" );
             $('#tab-right').addClass( "active" );
          });
          
          $('#rear_damage').on('click', function(){
             $('#tab-left').removeClass( "active" );
             $('#tab-right').removeClass( "active" );
             $('#tab-front').removeClass( "active" );
             $('#tab-interior').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-engine').removeClass( "active" );
             $('#tab-all').removeClass( "active" );
             $('#show_all_damage').removeClass( "active_all_damage" );
             $('#tab-rear').addClass( "active" );
          });
          
          $('#engine_damage').on('click', function(){
             $('#tab-left').removeClass( "active" );
             $('#tab-right').removeClass( "active" );
             $('#tab-front').removeClass( "active" );
             $('#tab-rear').removeClass( "active" );
             $('#tab-interior').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-all').removeClass( "active" );
             $('#show_all_damage').removeClass( "active_all_damage" );
             $('#tab-engine').addClass( "active" );
          });
          
           $('#interior_damage').on('click', function(){
             $('#tab-left').removeClass( "active" );
             $('#tab-right').removeClass( "active" );
             $('#tab-front').removeClass( "active" );
             $('#tab-rear').removeClass( "active" );
             $('#tab-roof').removeClass( "active" );
             $('#tab-engine').removeClass( "active" );
             $('#tab-all').removeClass( "active" );
             $('#show_all_damage').removeClass( "active_all_damage" );
             $('#tab-interior').addClass( "active" );
          });
      
    });  
    $(function() {
    $("#thumbcarousel").find(".thumb:first").addClass("active");
    $("#carousel").find(".carousel-item:first").addClass("active");

    var getIndex = $("#thumbcarousel").find(".active").index();

    $(".controls").each(function() {
        $(this).find(".next").click(function() {
            getIndex = $("#thumbcarousel").find(".active").index();
            getIndex += 1;
            if (getIndex > ($("#thumbcarousel").find(".thumb").length - 1)) {
                getIndex = 0;
            }
            setActiveImage(getIndex);
        });
        $(this).find(".prev").click(function() {
            getIndex -= 1;
            if (getIndex < 0) {
                getIndex = $("#thumbcarousel").find(".thumb").length - 1;
            }
            setActiveImage(getIndex); //Set/Show Active Image
        });
    });

});

$("#thumbcarousel .thumb").on('click',function(){
	var index=$(this).index();
  setActiveImage(index);
})

function setActiveImage(index) {
    if (typeof(index) == "undefined" || index == "" || index == null) index = 0;

    $("#thumbcarousel").find(".thumb").removeClass("active");
    $("#thumbcarousel").find(".thumb:eq(" + index + ")").addClass("active");
    $("#carousel").find(".carousel-item").removeClass("active");
    $("#carousel").find(".carousel-item:eq(" + index + ")").addClass("active");
}  
</script>

<script>

// -----------------------------------
// -------------------------------------
// ---------auction search -----------
$('#Search_car').click(function(){

    var Search_car_brand = $('#Search_car_brand').val();
   
      if(Search_car_brand =='' ){
      
      }else{
          	
            $.ajax({
        		url: "<?php echo base_url("Website/search_car_brand");?>",
        		type: "POST",
        		data: {
        			Search_car_brand: Search_car_brand,
        		},
        		cache: false,
        		success: function(data){ 
        		    
        		    if (data != 'error') {
                        $('#Search_car_brand').val(""); 
                        $("#auc_listing").html(data);
                        
            
                    }
        		
        		}
        	});
    }
});


$('#Search_car_cancel').click(function(){

    window.location.reload();
});


// ------------------------
// ------------------------
// ---sorrt by lowest price


$('#search_lowest_price_').click(function(){

    
    $.ajax({
		url: "<?php echo base_url("Website/sort_lowest_price");?>",
		type: "GET",
		cache: false,
		success: function(data){ 
		    alert(data);
		    if (data != 'error') {
                $('#search_lowest_price').val(""); 
                $("#auc_listing").html(data);
    
            }
		
		}
	});
    
});



// ------------------------
// ---sorrt by lowest mileage


$('#search_lowest_mileage').click(function(){
  
    $.ajax({
		url: "<?php echo base_url("Website/sort_lowest_mileage");?>",
		type: "GET",
		cache: false,
		type: "GET",
		
		success: function(data){ 
		   
		    if (data != 'error') {
                $('#search_lowest_mileage').val(""); 
                $("#auc_listing").html(data);
    
            }
		
		}
	});
     
});

// ------------------------
// ---sorrt by lowest mileage


$('#search_ending_soon').click(function(){
  
    $.ajax({
		url: "<?php echo base_url("Website/sort_ending_soon");?>",
		type: "GET",
		cache: false,
		type: "GET",
		
		success: function(data){ 
		   
		    if (data != 'error') {
                $('#search_ending_soon').val(""); 
                $("#auc_listing").html(data);
    
            }
		
		}
	});
     
});


$('.ajaxfilter').on('click change', function(){    

     if($(this).data('id')){
        var vals = $(this).data('id');
     
        $("input[value='" + vals + "']").prop('checked', false);
    } 
    
     if($(this).data('bodytypeid')){
        var valbt = $(this).data('bodytypeid');
     
        $("input[value='" + valbt + "']").prop('checked', false);
    } 
    
    if($(this).data('fueltypeid')){
        var valft = $(this).data('fueltypeid');
     
        $("input[value='" + valft + "']").prop('checked', false);
    } 
    
    if($(this).data('transmissionid')){
        var valt = $(this).data('transmissionid');
     
        $("input[value='" + valt + "']").prop('checked', false);
    } 
    
    if($(this).data('whereisitid')){
        var valw = $(this).data('whereisitid');
     
        $("input[value='" + valw + "']").prop('checked', false);
    } 
    
    if($(this).data('dropminyearid')){
        $(".minyeardropdown").val("");
        
    } 
    
    if($(this).data('dropmaxyearid')){
        $(".maxyeardropdown").val("");
        
    } 
    
    if($(this).data('dropminmileageid')){
        $(".minmileagedropdown").val("");
        
    } 
    
    if($(this).data('dropmaxmileageid')){
        $(".maxmileagedropdown").val("");
        
    } 
    
     if($(this).data('dropminpriceid')){
        $(".minpricedropdown").val("");
        
    } 
    
    if($(this).data('dropmaxpriceid')){
        $(".maxpricedropdown").val("");
        
    } 

    var a = [];

        // if(a.indexOf(this.value) > -1){
        //     a = jQuery.grep(a, function(value) {
        //       return value != this.value;
        //     });
        // }else{
        //     a.push(this.value);
        // }
        
    $('.brandcheckbox:checked').each(function() {
         a.push(this.value);
    });

    var quotation_brand = a.filter(function(itm, i, a) {
        return i == a.indexOf(itm);
    });
   
  
    var b = [];
    
    $('.whereisitcheckbox:checked').each(function() {
            b.push(this.value);
             
            // var checkedwhereisit = this.value;
            
            // $("input[value='" + checkedwhereisit + "']").prop('checked', true);
           
    });
   
    var quotation_whereisit = b.filter(function(itm, i, b) {
        return i == b.indexOf(itm);
    });
  
  
    
    // var unique = a.filter(onlyUnique);
    
    
    // $('input:checkbox[name=checkme]').attr('checked',false);
    // $('input:checkbox[name=checkme]').is(':checked');
    // var chk1 = $(".fbrand").val();
    // var chk2 = $(".wfbrand").val();
    // alert(chk1);
    // chk1.on('change', function(){
    //     chk2.prop('checked',this.checked);
    // });
    
    var quotation_bodytype = [];
   
    $('.bodytypecheckbox:checked').each(function() {
       quotation_bodytype.push(this.value);
    });
    
    var quotation_transmission = [];
   
    $('.transmissioncheckbox:checked').each(function() {
       quotation_transmission.push(this.value);
    });
    
    var quotation_fueltype = [];
   
    $('.fueltypecheckbox:checked').each(function() {
       quotation_fueltype.push(this.value);
    });
    
    
   
    // $('.whereisitcheckbox:checked').each(function() {
    //   quotation_whereisit.push(this.value);
    // });
    
    var minyear = $( ".minyeardropdown option:selected" ).val();
  
    var maxyear = $( ".maxyeardropdown option:selected" ).val();
    
    var minprice = $( ".minpricedropdown option:selected" ).val();
  
    var maxprice = $( ".maxpricedropdown option:selected" ).val();
    
    var minmileage = $( ".minmileagedropdown option:selected" ).val();
  
    var maxmileage = $( ".maxmileagedropdown option:selected" ).val();
    
    var sort = $("input[name='sortByauction']:checked").val();

    $.ajax({
		url: "<?php echo base_url("Website/search_checkbox_brand");?>",
		type: "POST",
		cache: false,
		type: "POST",
		data: {
    			quotation_brand: quotation_brand, quotation_bodytype: quotation_bodytype, quotation_transmission: quotation_transmission, quotation_fueltype: quotation_fueltype, quotation_whereisit:quotation_whereisit, minyear:minyear, maxyear:maxyear, minprice:minprice, maxprice:maxprice, minmileage:minmileage, maxmileage:maxmileage, sort:sort 
    		},
		success: function(data){ 
		  // alert(data);
		    if (data != 'error') {
                $('#search_ending_soon').val(""); 
                $("#auc_listing").html(data);
               
                // $.each( quotation_brand, function( key, value ) { 
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Brand:</b> '+value+'</span><a href="#"  data-id="BMW" class="bbb filter-cross" onclick="removeFilters()" ><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_bodytype, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Body-Type:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_transmission, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Transmission:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_fueltype, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Fuel-Type:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_whereisit, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Where-Is-It:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
               
                // if(minyear){
                //   $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Year: </b> '+minyear+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
               
                // if(maxyear){
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Year: </b> '+maxyear+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
                
                // if(minprice){
                //   $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Price: </b> '+minprice+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
               
                // if(maxprice){
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Price: </b> '+maxprice+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
                
                // if(minmileage){
                //     var mkm = minmileage * 1000;
                //     var minm = mkm.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                //   $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Mileage: </b> '+minm+'KM</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
               
                // if(maxmileage){
                //     var mkmm = maxmileage * 1000;
                //     var maxm = mkmm.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Mileage: </b> '+maxm+'KM</span><a href="#" class="filter-cross" onclick="removeFilter()" ><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
                // $(".filer_val_t").html(quotation_transmission);
           
            }
		
		}
	});
     
});








// -------------------------------
// ---------------------------
// ---mobile responsive-----

$('.ajaxfilter_m').on('click change', function(){    

     if($(this).data('id')){
        var vals = $(this).data('id');
     
        $("input[value='" + vals + "']").prop('checked', false);
    } 
    
     if($(this).data('bodytypeid')){
        var valbt = $(this).data('bodytypeid');
     
        $("input[value='" + valbt + "']").prop('checked', false);
    } 
    
    if($(this).data('fueltypeid')){
        var valft = $(this).data('fueltypeid');
     
        $("input[value='" + valft + "']").prop('checked', false);
    } 
    
    if($(this).data('transmissionid')){
        var valt = $(this).data('transmissionid');
     
        $("input[value='" + valt + "']").prop('checked', false);
    } 
    
    if($(this).data('whereisitid')){
        var valw = $(this).data('whereisitid');
     
        $("input[value='" + valw + "']").prop('checked', false);
    } 
    
    if($(this).data('dropminyearid')){
        $(".minyeardropdown").val("");
        
    } 
    
    if($(this).data('dropmaxyearid')){
        $(".maxyeardropdown").val("");
        
    } 
    
    if($(this).data('dropminmileageid')){
        $(".minmileagedropdown").val("");
        
    } 
    
    if($(this).data('dropmaxmileageid')){
        $(".maxmileagedropdown").val("");
        
    } 
    
     if($(this).data('dropminpriceid')){
        $(".minpricedropdown").val("");
        
    } 
    
    if($(this).data('dropmaxpriceid')){
        $(".maxpricedropdown").val("");
        
    } 

    var a = [];

        // if(a.indexOf(this.value) > -1){
        //     a = jQuery.grep(a, function(value) {
        //       return value != this.value;
        //     });
        // }else{
        //     a.push(this.value);
        // }
        
    $('.brandcheckbox:checked').each(function() {
         a.push(this.value);
    });

    var quotation_brand = a.filter(function(itm, i, a) {
        return i == a.indexOf(itm);
    });
   
  
    var b = [];
    
    $('.whereisitcheckbox:checked').each(function() {
            b.push(this.value);
             
            // var checkedwhereisit = this.value;
            
            // $("input[value='" + checkedwhereisit + "']").prop('checked', true);
           
    });
   
    var quotation_whereisit = b.filter(function(itm, i, b) {
        return i == b.indexOf(itm);
    });
  
  
    
    // var unique = a.filter(onlyUnique);
    
    
    // $('input:checkbox[name=checkme]').attr('checked',false);
    // $('input:checkbox[name=checkme]').is(':checked');
    // var chk1 = $(".fbrand").val();
    // var chk2 = $(".wfbrand").val();
    // alert(chk1);
    // chk1.on('change', function(){
    //     chk2.prop('checked',this.checked);
    // });
    
    var quotation_bodytype = [];
   
    $('.bodytypecheckbox_m:checked').each(function() {
       quotation_bodytype.push(this.value);
    });
    
    var quotation_transmission = [];
   
    $('.transmissioncheckbox_m:checked').each(function() {
       quotation_transmission.push(this.value);
    });
    
    var quotation_fueltype = [];
   
    $('.fueltypecheckbox_m:checked').each(function() {
       quotation_fueltype.push(this.value);
    });
    
    
   
    // $('.whereisitcheckbox:checked').each(function() {
    //   quotation_whereisit.push(this.value);
    // });
    
    var minyear = $( ".minyeardropdown_m option:selected" ).val();
  
    var maxyear = $( ".maxyeardropdown_m option:selected" ).val();
    
    var minprice = $( ".minpricedropdown_m option:selected" ).val();
  
    var maxprice = $( ".maxpricedropdown_m option:selected" ).val();
    
    var minmileage = $( ".minmileagedropdown_m option:selected" ).val();
  
    var maxmileage = $( ".maxmileagedropdown_m option:selected" ).val();
    
    var sort = $("input[name='sortByauction']:checked").val();

    $.ajax({
		url: "<?php echo base_url("Website/search_checkbox_brand_mobile");?>",
		type: "POST",
		cache: false,
		type: "POST",
		data: {
    			quotation_brand: quotation_brand, quotation_bodytype: quotation_bodytype, quotation_transmission: quotation_transmission, quotation_fueltype: quotation_fueltype, quotation_whereisit:quotation_whereisit, minyear:minyear, maxyear:maxyear, minprice:minprice, maxprice:maxprice, minmileage:minmileage, maxmileage:maxmileage, sort:sort 
    		},
		success: function(data){ 
		  // alert(data);
		    if (data != 'error') {
                $('#search_ending_soon').val(""); 
                $("#auc_listing").html(data);
               
                // $.each( quotation_brand, function( key, value ) { 
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Brand:</b> '+value+'</span><a href="#"  data-id="BMW" class="bbb filter-cross" onclick="removeFilters()" ><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_bodytype, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Body-Type:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_transmission, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Transmission:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_fueltype, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Fuel-Type:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
                
                // $.each( quotation_whereisit, function( key, value ) {
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Where-Is-It:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // });
               
                // if(minyear){
                //   $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Year: </b> '+minyear+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
               
                // if(maxyear){
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Year: </b> '+maxyear+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
                
                // if(minprice){
                //   $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Price: </b> '+minprice+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
               
                // if(maxprice){
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Price: </b> '+maxprice+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
                
                // if(minmileage){
                //     var mkm = minmileage * 1000;
                //     var minm = mkm.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                //   $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Mileage: </b> '+minm+'KM</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
               
                // if(maxmileage){
                //     var mkmm = maxmileage * 1000;
                //     var maxm = mkmm.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    
                //     $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Mileage: </b> '+maxm+'KM</span><a href="#" class="filter-cross" onclick="removeFilter()" ><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                // }
                // $(".filer_val_t").html(quotation_transmission);
           
            }
		
		}
	});
     
});



    function removeFilters() {
      var id = $('.bbb').attr("data-id");
       alert(id);
        var a = [];
        $('.brandcheckbox:checked').each(function() {
            $("input[value='" + id  + "']").prop('checked', false);
            
        });
        
        $('.brandcheckbox:checked').each(function() {
            a.push(this.value);
             
        });
        
        
        var quotation_brand = a.filter(function(itm, i, a) {
            return i == a.indexOf(itm);
        });
    
  
        
        var quotation_bodytype = [];
       
        $('.bodytypecheckbox:checked').each(function() {
           quotation_bodytype.push(this.value);
        });
        
        var quotation_transmission = [];
       
        $('.transmissioncheckbox:checked').each(function() {
           quotation_transmission.push(this.value);
        });
        
        var quotation_fueltype = [];
       
        $('.fueltypecheckbox:checked').each(function() {
           quotation_fueltype.push(this.value);
        });
        
        
        
        var minyear = $( ".minyeardropdown option:selected" ).val();
      
        var maxyear = $( ".maxyeardropdown option:selected" ).val();
        
        var minprice = $( ".minpricedropdown option:selected" ).val();
      
        var maxprice = $( ".maxpricedropdown option:selected" ).val();
        
        var minmileage = $( ".minmileagedropdown option:selected" ).val();
      
        var maxmileage = $( ".maxmileagedropdown option:selected" ).val();
        
        var sort = $("input[name='sortByauction']:checked").val();
    
        $.ajax({
    		url: "<?php echo base_url("Website/search_checkbox_brand");?>",
    		type: "POST",
    		cache: false,
    		type: "POST",
    		data: {
        			quotation_brand: quotation_brand, quotation_bodytype: quotation_bodytype, quotation_transmission: quotation_transmission, quotation_fueltype: quotation_fueltype, quotation_whereisit:quotation_whereisit, minyear:minyear, maxyear:maxyear, minprice:minprice, maxprice:maxprice, minmileage:minmileage, maxmileage:maxmileage, sort:sort 
        		},
    		success: function(data){ 
    		  // alert(data);
    		    if (data != 'error') {
                    $('#search_ending_soon').val(""); 
                    $("#auc_listing").html(data);
                   
                    $.each( quotation_brand, function( key, value ) {
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Brand:</b> '+value+'</span><a href="#"  data-id="BMW" class="bbb filter-cross" onclick="removeFilters()" ><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    });
                    
                    $.each( quotation_bodytype, function( key, value ) {
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Body-Type:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    });
                    
                    $.each( quotation_transmission, function( key, value ) {
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Transmission:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    });
                    
                    $.each( quotation_fueltype, function( key, value ) {
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Fuel-Type:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    });
                    
                    $.each( quotation_whereisit, function( key, value ) {
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Where-Is-It:</b> '+value+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    });
                   
                    if(minyear){
                       $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Year: </b> '+minyear+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    }
                   
                    if(maxyear){
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Year: </b> '+maxyear+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    }
                    
                    if(minprice){
                       $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Price: </b> '+minprice+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    }
                   
                    if(maxprice){
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Price: </b> '+maxprice+'</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    }
                    
                    if(minmileage){
                        var mkm = minmileage * 1000;
                        var minm = mkm.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                       $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Min-Mileage: </b> '+minm+'KM</span><a href="#" class="filter-cross" onclick="removeFilter()"><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    }
                   
                    if(maxmileage){
                        var mkmm = maxmileage * 1000;
                        var maxm = mkmm.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        
                        $(".filer_val").append('<li><span class="filter-list-wrap mb-3" ="filter-list"><span class="d-inline-block text-white"><b>Max-Mileage: </b> '+maxm+'KM</span><a href="#" class="filter-cross" onclick="removeFilter()" ><i class="far fa-times-circle text-white mt-1 ml-2 fs-16"></i></a></span></li>');
                    }
                    // $(".filer_val_t").html(quotation_transmission);
               
                }
    		
    		}
    	});
        
        
    }

</script>

<script>
    $('#show_all_brand_filter').click(function(){
        if($("#democol").hasClass("show")){
            $("#show_all_brand_filter").html("Mostra meno");
            $("#heading_brand").html("Tutte le marche");
        }else{
            $("#show_all_brand_filter").html("Mostra tutte le marche");
            $("#heading_brand").html("Marche più cercate");
        }
     
    });
    
    $('#show_all_whereisit_filter').click(function(){
        if($("#demo_whereisit").hasClass("show")){
            $("#show_all_whereisit_filter").html("Mostra meno");
        }else{
            $("#show_all_whereisit_filter").html("Mostra tutte le regioni");
        }
     
    });

</script>

<script>
function removeAll() {
   var element = document.getElementById("filterRow");
   element.classList.add("filter-remove-all"); 
}
</script>
<!------------------------------------->
<!--------------- end  ---------------->
<!------ automatic bid autostore ------>
<script>
$('.brandfilter').on('click', function(){   

   alert('value');

        	
});	
</script>
<script>
    // You can modify the upload files to pdf's, docs etc
//Currently it will upload only images

$(document).ready(function($) {

  // Upload btn on change call function
  $(".uploadlogo").change(function() {
    var filename = readURL(this);
    $(this).parent().children('span').html(filename);
  });

  // Read File and return value  
  function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (
      ext == "png" || ext == "jpeg" || ext == "jpg" || ext == "gif" || ext == "pdf"
      )) {
      var path = $(input).val();
      var filename = path.replace(/^.*\\/, "");
      // $('.fileUpload span').html('Uploaded Proof : ' + filename);
      return "Uploaded file : "+filename;
    } else {
      $(input).val("");
      return "Only image/pdf formats are allowed!";
    }
  }
  // Upload btn end

});
</script>
<script>  
      $(".sidemenu-toggle").click(function(){
        $(".home-sidemenu").addClass("is-active");  
        $(".body-overlay").addClass("overlay-active"); 
      });
      $(".body-overlay").click(function(){
        $(".home-sidemenu").removeClass("is-active");  
        $(this).removeClass("overlay-active"); 
      });
</script>
<script>
    $(document).ready(function(){
      $(".sidemenu-toggle-admin").click(function(){
        $(".home-sidemenu-admin").toggleClass("is-active");
      });
    });
</script>