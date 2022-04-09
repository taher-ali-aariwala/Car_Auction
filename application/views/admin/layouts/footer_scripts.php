<!-- JQuery js-->
<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<!--Horizontal Menu-->
<script src="<?=base_url();?>assets/plugins/horizontal-menu/horizontal.js"></script>
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
<!-- Fullside-menu Js-->
<script src="<?=base_url();?>assets/plugins/sidemenu/sidemenu.js"></script>
<!-- CHARTJS CHART -->
<script src="<?=base_url();?>assets/plugins/chart/chart.bundle.js"></script>
<script src="<?=base_url();?>assets/plugins/chart/utils.js"></script>
<!-- P-scroll js-->
<script src="<?=base_url();?>assets/plugins/p-scrollbar/p-scrollbar.js"></script>
<script src="<?=base_url();?>assets/plugins/p-scrollbar/p-scroll1.js"></script>
<!-- ECharts Plugin -->
<script src="<?=base_url();?>assets/plugins/echarts/echarts.js"></script>
<script src="<?=base_url();?>assets/plugins/echarts/echarts.js"></script>
<script src="<?=base_url();?>assets/js/index1.js"></script>
<!-- Custom Js-->
<script src="<?=base_url();?>assets/js/admin-custom.js"></script>
<!-- Sticky Js-->
<script src="<?=base_url();?>assets/js/sticky.js"></script>
<script src="<?=base_url();?>assets/js/sticky-sidebar.js"></script>
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
window.location.reload();					
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
<!---------------------------------------->
<script>
// --------------------------exterior-----------------
$(document).on('click', '.btn-add-new', function(e) {
e.preventDefault();
var controlForm = $('.my-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-new')
.removeClass('btn-add-new').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------interior-----------------
$(document).on('click', '.btn-add-inter', function(e) {
e.preventDefault();
var controlForm = $('.inter-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-inter')
.removeClass('btn-add-inter').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------document-----------------
$(document).on('click', '.btn-add-document', function(e) {
e.preventDefault();
var controlForm = $('.document-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-document')
.removeClass('btn-add-document').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------engine-----------------
$(document).on('click', '.btn-add-engine', function(e) {
e.preventDefault();
var controlForm = $('.engine-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-engine')
.removeClass('btn-add-engine').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------roof-----------------
$(document).on('click', '.btn-add-roof', function(e) {
e.preventDefault();
var controlForm = $('.roof-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-roof')
.removeClass('btn-add-roof').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------transmission-----------------
$(document).on('click', '.btn-add-transmission', function(e) {
e.preventDefault();
var controlForm = $('.transmission-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-transmission')
.removeClass('btn-add-transmission').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------front- damage-----------------
$(document).on('click', '.btn-add-dam-front', function(e) {
e.preventDefault();
var controlForm = $('.damfront-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-front')
.removeClass('btn-add-dam-front').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------left- damage-----------------
$(document).on('click', '.btn-add-dam-left', function(e) {
e.preventDefault();
var controlForm = $('.damleft-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-left')
.removeClass('btn-add-dam-left').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------rear- damage-----------------
$(document).on('click', '.btn-add-dam-rear', function(e) {
e.preventDefault();
var controlForm = $('.damrear-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-rear')
.removeClass('btn-add-dam-rear').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------right- damage-----------------
$(document).on('click', '.btn-add-dam-right', function(e) {
e.preventDefault();
var controlForm = $('.damright-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-right')
.removeClass('btn-add-dam-right').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------interior- damage-----------------
$(document).on('click', '.btn-add-dam-interior', function(e) {
e.preventDefault();
var controlForm = $('.daminterior-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-interior')
.removeClass('btn-add-dam-interior').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------engine- damage-----------------
$(document).on('click', '.btn-add-dam-engine', function(e) {
e.preventDefault();
var controlForm = $('.damengine-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-engine')
.removeClass('btn-add-dam-engine').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------roof- damage-----------------
$(document).on('click', '.btn-add-dam-roof', function(e) {
e.preventDefault();
var controlForm = $('.damroof-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-dam-roof')
.removeClass('btn-add-dam-roof').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------coupan-----------------
$(document).on('click', '.btn-add-coupon', function(e) {
e.preventDefault();
var controlForm = $('.coupon-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-coupon')
.removeClass('btn-add-coupon').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------technical-----------------
$(document).on('click', '.btn-add-technical', function(e) {
e.preventDefault();
var controlForm = $('.technical-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-technical')
.removeClass('btn-add-technical').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------part- thickness-----------------
$(document).on('click', '.btn-add-part-thickness', function(e) {
e.preventDefault();
var controlForm = $('.part-thickness-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-part-thickness')
.removeClass('btn-add-part-thickness').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------part- thickness-----------------
$(document).on('click', '.btn-add-paint_thickness_media', function(e) {
e.preventDefault();
var controlForm = $('.paint_thickness_media-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-paint_thickness_media')
.removeClass('btn-add-paint_thickness_media').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------tire- thickness-----------------
$(document).on('click', '.btn-add-tire', function(e) {
e.preventDefault();
var controlForm = $('.tire-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-tire')
.removeClass('btn-add-tire').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------morevideo- thickness-----------------
$(document).on('click', '.btn-add-morevideo', function(e) {
e.preventDefault();
var controlForm = $('.morevideo-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-morevideo')
.removeClass('btn-add-morevideo').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
// --------------------------detail- auction-----------------
$(document).on('click', '.btn-add-detail', function(e) {
e.preventDefault();
var controlForm = $('.detail-controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add-detail')
.removeClass('btn-add-detail').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
</script>
<script>
function myimg(id){ alert(id); 
var oImg=new Image();
oImg.src='https://static-secure.guim.co.uk/sys-images/Guardian/Pix/pictures/2014/9/24/1411574454561/03085543-87de-47ab-a4eb-58e7e39d022e-620x372.jpeg'
oImg.onload=function(){
alert('width:'+oImg.width+' height:'+oImg.height +' ratio:'+(oImg.width/oImg.height));
};
}
</script>
<script>
function preview_image() 
{
var total_file=document.getElementById("external_photo").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
//  console.log(oImg.height);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#ex_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.external_photo').val('');    
return false;
if((ratio < 1.5)){
$('#ex_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.external_photo').val('');    
return false;
}
if((oImg.height < 900)){
$('#ex_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.external_photo').val('');    
return false;
}
}
};
}
}
function preview_image_internal() 
{
var total_file=document.getElementById("interior_photo").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#in_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.interior_photo').val('');    
return false;
if((ratio < 1.5)){
$('#in_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.interior_photo').val('');    
return false;
}
if((oImg.height < 900)){
$('#in_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.interior_photo').val('');    
return false;
}
}
};
}
}
function preview_image_document() 
{
var total_file=document.getElementById("documents_photo").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#doc_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.documents_photo').val('');    
return false;
if((ratio < 1.5)){
$('#doc_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.documents_photo').val('');    
return false;
}
if((oImg.height < 900)){
$('#doc_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.documents_photo').val('');    
return false;
}
}
};
}
}
function preview_image_engine() 
{
var total_file=document.getElementById("engine_photo").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#eng_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.engine_photo').val('');    
return false;
if((ratio < 1.5)){
$('#eng_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.engine_photo').val('');    
return false;
}
if((oImg.height < 900)){
$('#eng_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.engine_photo').val('');    
return false;
}
}
};
}
}
function preview_image_transmission() 
{
var total_file=document.getElementById("transmission_photo").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#tran_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.transmission_photo').val('');    
return false;
if((ratio < 1.5)){
$('#tran_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.transmission_photo').val('');    
return false;
}
if((oImg.height < 900)){
$('#tran_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.transmission_photo').val('');    
return false;
}
}
};
}
}
function preview_image_roof() 
{
var total_file=document.getElementById("roof_photo").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#roof_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.roof_photo').val('');    
return false;
if((ratio < 1.5)){
$('#roof_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.roof_photo').val('');    
return false;
}
if((oImg.height < 900)){
$('#roof_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.roof_photo').val('');    
return false;
}
}
};
}
}
function preview_image_mainimage() 
{
var total_file=document.getElementById("main_image").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;
if ((oImg.width < 1500)) {
$('#mainimage_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.main_image').val('');    
return false;
if((ratio < 1.5)){
$('#mainimage_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.main_image').val('');    
return false;
}
if((oImg.height < 900)){
$('#mainimage_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.main_image').val('');    
return false;
}
}
};
}
}
</script>
<script>
$(document).ready(function(){
$(".ajaxdelete").click(function(event){
//  alert("Delete?");
var href = $(this).attr("href")
var btn = this;
$.ajax({
type: "GET",
url: href,
success: function(dataResult) {
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){
window.location.reload();
// 	 $('#enter-auction-model-my').modal('show');
}
else if(dataResult.statusCode==201){
alert("Error occured !");
}
}
});
event.preventDefault();
})
});
</script>
<script>
// $(document).ready(function(){
// $(".ajaxfeatured").click(function(event){
// //  alert("Delete?");
// let f_status = $(this).data("f_status");
// let b_id = $(this).data("b_id");
// $.ajax({
// type: "POST",
// url: "<?php echo base_url("Admin/featured_brand");?>",
// data:{f_status:f_status, b_id:b_id },
// success: function(dataResult) {
// var dataResult = JSON.parse(dataResult);
// if(dataResult.statusCode==200){ 
// // window.location.reload();
// if($("#ajaxfeatured"+b_id).hasClass("active")){
// // $(this).data("f_status").val('0');
// $("#ajaxfeatured"+b_id).data('f_status','0');
// $("#ajaxfeatured"+b_id).removeClass("active");
// }else{
// $("#ajaxfeatured"+b_id).data('f_status','1')
// $("#ajaxfeatured"+b_id).addClass("active");
// }
// // 	 window.location.reload();
// // 	 $('#enter-auction-model-my').modal('show');
// }
// else if(dataResult.statusCode==201){
// alert("Error occured !");
// }
// }
// });
// event.preventDefault();
// })
// });
</script>
<script>
// $(document).ready(function(){
// $(".ajaxfeaturedloc").click(function(event){
// //  alert("Delete?");
// let f_status = $(this).data("f_status");
// let b_id = $(this).data("b_id");
// $.ajax({
// type: "POST",
// url: "<?php echo base_url("Admin/featured_where_is_it");?>",
// data:{f_status:f_status, b_id:b_id },
// success: function(dataResult) {
// var dataResult = JSON.parse(dataResult);
// if(dataResult.statusCode==200){ 
// // window.location.reload();
// if($("#ajaxfeaturedloc"+b_id).hasClass("active")){
// // $(this).data("f_status").val('0');
// $("#ajaxfeaturedloc"+b_id).data('f_status','0');
// $("#ajaxfeaturedloc"+b_id).removeClass("active");
// }else{
// $("#ajaxfeaturedloc"+b_id).data('f_status','1')
// $("#ajaxfeaturedloc"+b_id).addClass("active");
// }
// // 	 window.location.reload();
// // 	 $('#enter-auction-model-my').modal('show');
// }
// else if(dataResult.statusCode==201){
// alert("Error occured !");
// }
// }
// });
// event.preventDefault();
// })
// });
</script>
<?php
if($this->session->flashdata('mediaex_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#image_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('mediain_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#image_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('mediadoc_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#image_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('mediaeng_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#image_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('mediatran_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#image_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('mediaroof_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#image_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('mediavid_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#video_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('cou_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#cou_history_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('tech_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#tech_history_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('note_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#note_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('auc_main_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#auc_main_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('auc_main_error')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#auc_main_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('auc_morevideo_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#morevideo_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('auc_wheel_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#wheel_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('partpaint_media_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#partpaint_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('dama_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#damage_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('testdrive_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#testdrive_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('equip_success')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#equip_section").offset().top
}, 1000);
</script>
<?php
}
?>
<?php
if($this->session->flashdata('equip_error')){
?>
<script>
jQuery('html, body').animate({
scrollTop: jQuery("#equip_section").offset().top
}, 1000);
</script>
<?php
}
?>
<!----------------- calander future date restrick -------->
<script>
$(function(){
var dtToday = new Date();
var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if(month < 10)
month = '0' + month.toString();
if(day < 10)
day = '0' + day.toString();
var maxDate = year + '-' + month + '-' + day;  
$('#registration_date').attr('max', maxDate);
$('#last_service_date').attr('max', maxDate);
$('#last_date_technical_inspection').attr('max', maxDate);
$('#end_auction_time').attr('min', maxDate);
});
</script>
<!------------------------------------------------------>
<!------------------------------------------------------->
<script>
setTimeout(function() {
$('.alert-danger').fadeOut('fast');
}, 8000); 
setTimeout(function() {
$('.alert-success').fadeOut('fast');
}, 20000); 
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
<script src="<?=base_url();?>assets/js/lightgallery-all.min.js"></script>
<script>
$('.table_coro_ef').each(function(){ 
let id = $(this).data("id"); // 2
$('#table-carousel-ef-'+id).lightGallery({
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
//  ----------------
$('.table_coro_eri').each(function(){ 
let id = $(this).data("id"); // 2
$('#table-carousel-eri-'+id).lightGallery({
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
//  -----------
$('.table_coro_ei').each(function(){ 
let id = $(this).data("id"); // 2
$('#table-carousel-ei-'+id).lightGallery({
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
//  -------------
$('.table_coro_ero').each(function(){ 
let id = $(this).data("id"); // 2
$('#table-carousel-ero-'+id).lightGallery({
selector: '.table-link'
})
});
</script>
<script>
$('.auction_dealer').click(function(){
var auction_id = $(this).data("auction_id");
var dealer_id = $(this).data("dealer_id");
var dealer_price = $(this).data("dealer_price");
// 	alert(dealer_id);
$.ajax({
url: "<?php echo base_url("Admin/award_winner");?>",
type: "POST",
data: {
auction_id: auction_id,
dealer_id: dealer_id,
dealer_price: dealer_price,
},
cache: false,
success: function(dataResult){
window.location.reload();	
}
});
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
url: "<?php echo base_url();?>chat/do_chat_admin",
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
// $(".previewimg").hide();
$('.custom-file-upload').text('');
if($('.load_chat').hasClass('active')){
}else{
$( "#messages" ).scrollTop( hei );
}
}
//   console.log(data);
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
url: "<?php echo base_url("Chat/show_load_chat_fun_admin");?>",
type: "POST",
data: {
"chat_id" : chatId
},
cache: false,
success: function(data){
if (data != 'error') {
$("#messages").html(data);  
if($('.load_chat').hasClass('active')){
}else{
$( "#messages" ).scrollTop( hei );
}
}
//   console.log(data);
}
});
}, 6000); 
</script> 
<script>
$("#animated-thumbnials").lightGallery({
selector: '.light-link'
});
</script>
<script>
$('.files').change(function() {
var i = $(this).prev('label').clone();
var file = $('.files')[0].files[0].name;
$(this).prev('label').text(file);
});
</script>
<!--------------------------------------------------------->
<!--------------------------------------------------------->
<!--------------------------------------------------------->
<script>
$("#messages").lightGallery({
selector: '.light-link'
});
</script>
<script>
autosize();
function autosize(){
var text = $('.msg_text');
text.each(function(){
$(this).attr('rows',1);
resize($(this));
});
text.on('input', function(){
resize($(this));
});
function resize ($text) {
$text.css('height', 'auto');
$text.css('height', $text[0].scrollHeight+'px');
}
}
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
</script>
