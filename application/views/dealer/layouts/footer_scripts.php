<!-- JQuery js-->
<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
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
<!--Horizontal Menu-->
<script src="<?=base_url();?>assets/plugins/horizontal-menu/horizontal.js"></script>
<!-- Fullside-menu Js-->
<script src="<?=base_url();?>assets/plugins/sidemenu/sidemenu.js"></script>
<!-- P-scroll js-->
<script src="<?=base_url();?>assets/plugins/p-scrollbar/p-scrollbar.js"></script>
<script src="<?=base_url();?>assets/plugins/p-scrollbar/p-scroll1.js"></script>
<!-- Custom Js-->
<script src="<?=base_url();?>assets/js/admin-custom.js"></script>
<!-- Sticky Js-->
<script src="<?=base_url();?>assets/js/sticky.js"></script>
<!-- Dropify & Fileupload Js-->
<script src="<?=base_url();?>assets/plugins/fileuploads/js/fileupload.min.js"></script>
<script src="<?=base_url();?>assets/plugins/fileuploads/js/dropify.min.js"></script>
<!-- select2 -->
<script src="<?=base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<script src="<?=base_url();?>assets/js/select2.js"></script>
<!-- Timepicker js -->
<script src="<?=base_url();?>assets/plugins/time-picker/jquery.timepicker.js"></script>
<script src="<?=base_url();?>assets/plugins/time-picker/toggles.min.js"></script>
<!-- Datepicker js -->
<script src="<?=base_url();?>assets/plugins/date-picker/spectrum.js"></script>
<script src="<?=base_url();?>assets/plugins/date-picker/jquery-ui.js"></script>
<script src="<?=base_url();?>assets/plugins/input-mask/jquery.maskedinput.js"></script>
<!-- Inline js -->
<script src="<?=base_url();?>assets/js/formelements.js"></script>
<!--InputMask Js-->
<script src="<?=base_url();?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<!-- Data Table -->
<script src="<?=base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/js/datatable.js"></script>
<script>
// Toggle field step form
$(function() {
$(document).on('click', '.btn-add-ex', function(e) {
e.preventDefault();
var controlForm = $('.controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-ex')
.removeClass('btn-add-ex').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
});
</script>
<!--------------------------------equipment store------------->
<!------------------------------------------------------------>
<script>
$(document).ready(function() {
$('#equip_store').on('click', function() {
var name = $('#equip_name').val();
if(name!=""){
$("#equip_store").attr("disabled", "disabled");
$.ajax({
url: "<?php echo base_url("admin/save_equipment");?>",
type: "POST",
data: {
type: 1,
name: name,
},
cache: false,
success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){
$("#equip_store").removeAttr("disabled");
$('#equip_name').val('');
$('.success_equip').html('Data added successfully !'); 						
}
else if(dataResult.statusCode==201){
alert("Error occured !");
}
}
});
}
else{
alert('Please fill equipment name!');
}
});
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
document.getElementById(id).innerHTML = days + "d " + hours + ":"
+ minutes + ":" + seconds + "";
// If the count down is finished, write some text
if (distance < 0) {
clearInterval(x);
document.getElementById(id).innerHTML = "EXPIRED";
}
}, 1000);
});
</script>
<!--------------------------------------------------------->
<!--------------------------------------------------------->
<!---------------------  chat system  -------------------->
<!--------------------------------------------------------->
<script>
var hei = document.getElementById('messages').scrollHeight ;
$(".load_chat").mouseenter(function(){
$(".load_chat").addClass("active");
});
$(".load_chat").mouseleave(function(){
$(".load_chat").removeClass("active");
});
$(document).ready(function (e) {
if(!$('.load_chat').hasClass('active')){
$( "#messages" ).scrollTop( hei );     
}
$("#form_chat").on('submit',(function(e) {
  
e.preventDefault();
var msg_text = $('.msg_text').val();
var files = $('.files').val();
if(msg_text =='' && files ==''){
}else{
play_notify();
$.ajax({
url: "<?php echo base_url();?>chat/do_chat",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend : function()
{
//$("#preview").fadeOut();
//$("#err").fadeOut();
},
success: function(data)
{
if (data != 'error') {
$('#form_chat').trigger('reset');
$("#messages").html(data);
$('.custom-file-upload').text('Select File');
//  $('.custom-file-upload').trigger('reset');
if(!$('.load_chat').hasClass('active')){
$( "#messages" ).scrollTop( hei );     
}
}
// console.log(data);
},
});
}
}));
});
function play_notify() {
const audio = new Audio("<?php echo base_url();?>assets/msg_alert.mp3");
audio.play();
}
</script>
<script> 
setInterval(function() {
// scrollToBottom();
let chatId = $("#chat-id").data("id");
$.ajax({
url: "<?php echo base_url("Chat/show_load_chat_fun");?>",
type: "POST",
data: {
"chat_id" : chatId
},
cache: false,
success: function(data){
if (data != 'error') {
$("#messages").html(data);  
if(!$('.load_chat').hasClass('active')){
$( "#messages" ).scrollTop( hei );     
}
}
// console.log(data);
}
});
}, 6000); 
</script> 
<script>
// $("msg_text").keypress(function(event) {
//     if (event.which == 13) {
//   alert("Submit!");
//         event.preventDefault();
//         $("form_chat").submit();
//     }
// });
$('.files').change(function() {
var i = $(this).prev('label').clone();
var file = $('.files')[0].files[0].name;
$(this).prev('label').text(file);
});
</script>
<!--------------------------------------------------------->
<!--------------------------------------------------------->
<!--------------------------------------------------------->
<script src="<?=base_url();?>assets/js/lightgallery-all.min.js"></script>
<script>
$("#messages").lightGallery({
selector: '.light-link'
});
</script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
      $(".user-sidemenu-toggle").click(function(){
        $(".user-sidemenu").addClass("is-active");
        $("body").addClass("overflow-hidden");
        $(".body-overlay").addClass("overlay-active"); 
      });
      $(".body-overlay").click(function(){
        $("body").removeClass("overflow-hidden");
        $(".user-sidemenu").removeClass("is-active");  
        $(this).removeClass("overlay-active"); 
      });
        
</script>
