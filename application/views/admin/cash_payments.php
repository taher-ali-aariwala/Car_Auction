<div class="side-app">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">
<div class="item2-gl">
<div class="item2-gl-nav d-flex align-items-center mb-4">
<h3 class="bg-primary text-white mb-0 fs-18 px-4 py-2 rounded"><span class="auction-highlight">Winner Awarded!</span> Check Your Payments</h3>
</div>
<?php
if(!empty($all_awarded_auctions)){
foreach($all_awarded_auctions as $auction){
?>
<div data-timer="<?=$auction->end_auction_time?>" data-id="demo<?=$auction->id;?>" class="countdownpp card">
<div class="d-md-flex align-items-center">
<div class="col-lg-3 col-md-3 col-xl-3 item-card9-img">
<div class="item-card9-imgs">
<a class="link" href="#"></a>
<div class="auction-img-box" style="max-height:250px">
<?php
if(!empty($all_main_images)){
foreach($all_main_images as $allmainimage){
?>
<?php if(($allmainimage->car_auction_id) == ($auction->id) ){ ?> 
<img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $allmainimage->media; ?>" alt="img" class="cover-image">
<?php } ?>
<?php } } ?>
</div>
</div>
</div>
<div class="col-lg-9 col-md-9 col-xl-9 card border-0 mb-0">
<div class="card-body ">
<div class="row payment-card">
<div class="col-lg-4 card-content">
<a href="#" class="text-dark"><h4 class="font-weight-bold mb-3"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h4></a>
<ul>
<li class="pb-3">
<a href="#"><span class="d-flex align-items-center text-dark"><i class="fas fa-car mr-3"></i><?= $auction->engine_power; ?> <?= $auction->fuel_type; ?></span></a>
</li>
<li class="pb-3">
<a href="#"><span class="d-flex align-items-center text-dark"><i class="fas fa-calendar-alt mr-3"></i><?= $auction->registration_date; ?></span></a>
</li>
<li class="pb-3">
<a href="#"><span class="d-flex align-items-center text-dark"><i class="fas fa-tachometer-alt mr-3"></i><?= $auction->mileage; ?> KM</span></a>
</li>
</ul>
</div>
<div class="col-lg-8">
<div class="row justify-content-end">
<div class="col-lg-5">
<div>
<span class="fs-13 d-flex flex-column justify-content-between auction-end pyment-auction-end mt-0">
<span class="text-white d-flex pb-1 align-items-center"><i class="fas fa-user-clock mr-3"></i><span>Auction ended on:</span></span>
<!--<span class="text-white d-flex pb-1 align-items-center"><i class="fas fa-calendar-check mr-3"></i><span>3/11/2021</span></span>-->
<?php
$timestamp = strtotime($auction->end_auction_time);
$new_date_format = date('d/m/y', $timestamp);
?>
<span class="text-white d-flex pb-1 align-items-center"><i class="fas fa-calendar-check mr-3"></i><?= $new_date_format; ?></span>
<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' class="text-white d-flex pb-1 align-items-center"><i class="far fa-clock mr-3"></i><span></span></span>
</span>
</div>
</div>
<div class="col-lg-7">
<div class="position-relative">
<h2 type="button" class="btn btn-primary w-100 text-uppercase fs-14 font-weight-semibold p-0 drop-btn">
<div class="d-flex justify-content-between align-items-center">
<i class="fas fa-trophy fs-32 trophy-icon bg-danger"></i>
<span class="pr-2">
<span class="d-block text-capitalize">Winner awarded:</span>
<h3 class="text-uppercase fs-24 m-0 font-weight-semibold">"<?= strtoupper($auction->dealer_name); ?> <?= strtoupper($auction->dealer_surname); ?>"</h3>
</span>
</div>
</h2>
</div>
</div>
</div>
</div>
<div class="col-lg-10">
<div class="payment-offer">
<div class="row mt-4">
<div class="col-md-6 payment-offer-title ">
<div class="d-flex align-items-center">
<span class="d-flex">
<i class="fas fa-thumbs-up thumb-icon bg-danger"></i>
<span>
<h2 class="heading fs-22 font-weight-bold m-0 text-danger">Winning Offer =</h2>
<span class="fs-12 text-primary">(price to pay)</span>
</span>
</span>
</div>
</div>
<div class="col-md-6">
<div class="">
<h3 class="mb-3 fs-30 text-primary won-offer-price"><?= number_format($auction->dealer_price , 0, ',', '.'); ?> <i class="fas fa-euro-sign"></i></h3>
<span>
<p class="m-0 text-danger font-weight-semibold">+ FEES = 200 €</p>
<p class="m-0 text-danger font-weight-semibold">+ Change of owership = <?= $auction->expences_price; ?> €</p>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="check-payment-content">
<div class="row">
<div class="col-lg-12">
<div>
<button type="button" class="btn btn-block d-flex justify-content-around align-items-center text-uppercase fs-22 font-weight-semibold p-0 btn-blue" data-toggle="collapse" data-target="#collapseExample<?=$auction->id; ?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-angle-down"></i>Check your payments<i class="fas fa-angle-down"></i></button>
<div id="collapseExample<?=$auction->id; ?>" class="collapse">
<div class="row no-gutters">
<div class="col-lg-12">
<div class="payment-content-wrap">
<div class="d-flex flex-column justify-content-center align-items-center  mb-4">
<?php if($auction->status =='awarded'){ ?>
<!-- when auction is awarded then shohw to paid buton for manual pay -->
<!--<a href="<?php echo base_url();?>admin/paid_acution/<?php echo $auction->id;?>" onclick="return confirm('Are you sure you want to do paid?')" class="text-uppercase card-active-btn bg-success border-0 mb-3">Paid</a><span class="text-dark-red"></span>-->
<a href="<?php echo base_url();?>admin/paid_acution/<?php echo $auction->id;?>" class="text-uppercase card-active-btn bg-success border-0 mb-3" data-toggle="modal" data-target="#paid-btn-model">Paid</a><span class="text-dark-red"></span>
<?php }?>

<div class="dropify-wrapper dropify-btn">
<div class="dropify-message">
<a href="#" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn" data-toggle="modal" data-target="#inv_<?php echo $auction->id;?>"><i class="fas fa-cloud-upload-alt mr-3 upload-icon d-flex justify-content-center align-items-center"></i>Upload <br> Document</a>
<p class="dropify-error">Ooops, something wrong appended.</p>
</div>
<div class="dropify-loader"></div>
<div class="dropify-errors-container"><ul></ul></div>
<input type="file" class="dropify" data-height="180"><button type="button" class="dropify-clear">Remove</button>
<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos">
<div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p>
</div>
</div>
</div>
</div>
</div>
<!-- check paid or not auction status -->
<?php if($auction->status =='payment_done'){ ?>
<h4 class="text-center text-primary d-flex align-items-center justify-content-center mb-3">Payment Received<i class="far fa-check-circle fs-28 text-green pl-3"></i></h4>
<?php }else{ ?>
<h4 class="text-center text-primary d-flex align-items-center justify-content-center mb-3">Payment Not Received<i class="far fa-times-circle fs-28 text-red pl-3"></i></h4>
<?php } ?>
<!-- check paid or not auction status -->
<span class="error d-flex justify-content-left" style="color:red"></span>
<div class="modal fade" id="inv_<?php echo $auction->id;?>" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg col-4">
<div class="modal-content">
<!-- Modal Header -->
<div class="pb-0 border-0">
<h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Document</h3>
<button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
</div>
<!-- Modal body -->
<form action="<?php echo base_url();?>admin/upload_document" id="enter_car" method="post" class="card-body" enctype="multipart/form-data" accept-charset="utf-8">
<div class="modal-body pt-0 enter-images-field">
<span id="eng_ratio_error" style="color:red"></span>
<div class="row">
<div class="col-12 mb-2">
<div class="d-flex justify-content-center">
<div class="control-group" id="fields">
<div class="engine-controls">
<label>Upload Change of ownership </label>
<div class="d-flex">
<input type="file" id="change_of_ownership" class="form-control change_of_ownership" name="change_of_ownership" accept="image/png,image/jpeg,application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation">
<?php 
$auc_id = $auction->id;
$chk_doc = $this->Auction_model->CountWhereRecord('auction_car', array('id'=>$auc_id,'change_of_ownership'=>'null'));
if($chk_doc =='0'){
?>
<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->change_of_ownership;?>" class="text-uppercase card-active-btn d-block fs-13 ml-3" target="_blank">View</a>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 mb-2">
<div class="d-flex justify-content-center">
<div class="control-group" id="fields">
<div class="engine-controls">
<label>Upload Collection Authorization / Delivery Document </label>
<div class="d-flex">
<input type="file" id="autherization_documents" class="form-control autherization_documents" name="autherization_documents" accept="image/png,image/jpeg,application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation">
<?php 
$chk_doc2 = $this->Auction_model->CountWhereRecord('auction_car', array('id'=>$auc_id,'autherization_documents'=>'null'));
if($chk_doc2 =='0'){
?>
<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->autherization_documents;?>" class="text-uppercase card-active-btn d-block fs-13 ml-3" target="_blank">View</a>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 mb-2">
<div class="d-flex justify-content-center">
<div class="control-group" id="fields">
<div class="engine-controls">
<label>Upload report of delivery </label>
<div class="d-flex">
<input type="file" id="report_of_delivery" class="form-control report_of_delivery" name="report_of_delivery" accept="image/png,image/jpeg,application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation">
<?php 
$chk_doc3 = $this->Auction_model->CountWhereRecord('auction_car', array('id'=>$auc_id,'report_of_delivery'=>'null'));
if($chk_doc3 =='0'){
?>
<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->report_of_delivery;?>" class="text-uppercase card-active-btn d-block fs-13 ml-3" target="_blank">View</a>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 mb-2">
<div class="d-flex justify-content-center">
<div class="control-group" id="fields">
<div class="engine-controls">
<label>Upload Invoice </label>
<div class="d-flex">
<input type="file" id="invocie" class="form-control invocie" name="invocie" accept="image/png,image/jpeg,application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation">
<?php 
$chk_doc4 = $this->Auction_model->CountWhereRecord('auction_car', array('id'=>$auc_id,'invocie'=>'null'));
if($chk_doc4 =='0'){

?>
<a href="<?php echo base_url();?>uploads/auction_car/inv_doc/<?php echo $auction->invocie;?>" class="text-uppercase card-active-btn d-block fs-13 ml-3" target="_blank">View</a>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" name="auction_id" class="auction_id" id="auction_id" value="<?php echo $auction->id;?>">
<button type="submit" class="btn btn-primary btn-block">Submit <i class="fas fa-paper-plane text-white pl-3"></i></button>
</div>
</form>                                    
</div>
</div>
<div class="card-bank-payment">
<div class="row">
<!-- <div class="col-md-6 devider">
<div class="card-payment">
<a href="" class="mb-4 d-flex align-items-center">
<i class="far fa-credit-card credit-card-icon fs-18"></i><span class="font-weight-semibold fs-16 text-green">With Credit Card</span>
</a>
<a href="" class="btn btn-blue text-capitalize mt-4 d-flex align-items-center upload-btn"><i class="fas fa-eye mr-3 upload-icon d-flex justify-content-center align-items-center"></i> See <br> Payments</a>
</div>
</div> -->
<!-- <div class="col-md-6">
<div class="card-payment">
<a href="" class="mb-4 d-flex align-items-center">
<i class="fas fa-file-invoice-dollar credit-card-icon fs-18"></i><span class="font-weight-semibold fs-16 text-green">By Bank Transfer</span>
</a>
<span><a href="" class="btn btn-blue text-capitalize mr-4 d-flex align-items-center upload-btn"><i class="fas fa-download mr-2 upload-icon d-flex justify-content-center align-items-center"></i> Download bank <br> accountant</a></span>
</div>
</div> -->
</div>
</div>
</div>
</div>
<!--<div class="col-lg-6">-->
<!--<div class="payment-content-wrap">-->
<!--<div class="mb-4">-->
<!--<h2 class="text-uppercase fs-18 mb-3 d-flex align-items-center justify-content-center">fees + expences payment = <span class="text-dark-red"> 200 € + 100 € </span></h2>-->
<!--<span class="text-center d-flex justify-content-center ">-->
<!--<span class="mr-5">-->
<!--<div class="dropify-wrapper dropify-btn">-->
<!--<div class="dropify-message">-->
<!--<a href="" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn"><i class="fas fa-cloud-upload-alt mr-3 upload-icon d-flex justify-content-center align-items-center"></i>Upload Car <br> Invoice</a>-->
<!--<p class="dropify-error">Ooops, something wrong appended.</p>-->
<!--</div>-->
<!--<div class="dropify-loader"></div>-->
<!--<div class="dropify-errors-container"><ul></ul></div>-->
<!--<input type="file" class="dropify" data-height="180"><button type="button" class="dropify-clear">Remove</button>-->
<!--<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos">-->
<!--<div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</span>-->
<!--<span>-->
<!--<div class="dropify-wrapper dropify-btn">-->
<!--<div class="dropify-message">-->
<!--<a href="" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn"><i class="fas fa-cloud-upload-alt mr-3 upload-icon d-flex justify-content-center align-items-center"></i>View ID Cart <br> presented</a>-->
<!--<p class="dropify-error">Ooops, something wrong appended.</p>-->
<!--</div>-->
<!--<div class="dropify-loader"></div>-->
<!--<div class="dropify-errors-container"><ul></ul></div>-->
<!--<input type="file" class="dropify" data-height="180"><button type="button" class="dropify-clear">Remove</button>-->
<!--<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos">-->
<!--<div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</span>-->
<!--</span>-->
<!--</div>-->
<!--<h4 class="text-center text-primary d-flex align-items-center justify-content-center mb-3">Payment Received<i class="far fa-check-circle fs-28 text-green pl-3"></i></h4>-->
<!--<h4 class="text-center text-primary d-flex align-items-center justify-content-center mb-3">Payment Not Received<i class="far fa-times-circle fs-28 text-red pl-3"></i></h4>-->
<!--<div class="card-bank-payment">-->
<!--<div class="row">-->
<!--<div class="col-md-6 devider">-->
<!--<div class="card-payment">-->
<!--<a href="" class="mb-4 d-flex align-items-center">-->
<!--<i class="far fa-credit-card credit-card-icon fs-18"></i><span class="font-weight-semibold fs-16 text-green">With Credit Card</span>-->
<!--</a>-->
<!--<a href="" class="btn btn-blue text-capitalize mt-4 d-flex align-items-center upload-btn"><i class="fas fa-eye mr-3 upload-icon d-flex justify-content-center align-items-center"></i> See <br> Payments</a>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-md-6">-->
<!--<div class="card-payment">-->
<!--<a href="" class="mb-4 d-flex align-items-center">-->
<!--<i class="fas fa-file-invoice-dollar credit-card-icon fs-18"></i><span class="font-weight-semibold fs-16 text-green">By Bank Transfer</span>-->
<!--</a>-->
<!--<span><a href="" class="btn btn-blue text-capitalize mr-4 d-flex align-items-center upload-btn"><i class="fas fa-download mr-2 upload-icon d-flex justify-content-center align-items-center"></i> Download bank <br> accountant</a></span>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } } ?>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="paid-btn-model" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg col-4">
<div class="modal-content">
<!-- Modal Header -->
<div class="">
<button type="button" class="close p-3" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body text-center">
<h5>Are you sure you want to do paid?</h5>
</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<script>
function preview_image_chng_owner() 
{
var total_file=document.getElementById("change_of_ownership").files.length;
for(var i=0;i<total_file;i++)
{
var oImg=new Image();
oImg.src=URL.createObjectURL(event.target.files[i]);
oImg.onload=function(){
let ratio = oImg.width/oImg.height;

if ((oImg.width < 1500)) {
$('#eng_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');

$('.change_of_ownership').val('');    
return false;

if((ratio < 1.5)){
$('#eng_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.change_of_ownership').val('');    
return false;

}

if((oImg.height < 900)){
$('#eng_ratio_error').text("image should be more than (ratio 1.5, width: 1500 and height:900) "+' Your image (ratio:'+(oImg.width/oImg.height) + ' width:'+oImg.width+' height:'+oImg.height+')');
$('.change_of_ownership').val('');    
return false;

}
}
};

}
}
</script>