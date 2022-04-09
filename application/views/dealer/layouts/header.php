<!--Topbar-->
<div class="header-main">
<!-- Horizontal Header -->
<div class="horizontal-header clearfix">
<div class="container">
<a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
<a href="<?= base_url(); ?>">
<span class="smllogo">
<img src="<?= base_url(); ?>/assets/images/brand/logo.png" alt="">
</span>
</a>
<a aria-label="Hide Sidebar" style="margin-top: 7px" class="app-sidebar__toggle user-sidemenu-toggle" data-toggle="sidebar" href="#">
    <img src="https://tahir.dbtechserver.online/astemotori//assets/images/users/male/1.png" alt="profile-img" class="avatar avatar-md brround">
</a>
<!--<a href="#" class="nav-link pt-0" data-toggle="sidebar" class="d-inline-block app-sidebar__toggle mt-3"-->
    
<!--</a>-->
</div>
</div>
<!-- /Horizontal Header -->
<!-- Horizontal Main -->
<div class="horizontal-main clearfix">
<div class="horizontal-mainwrapper container clearfix">
<div class="desktoplogo">
<a href="<?= base_url(); ?>">
<img src="<?= base_url(); ?>/assets/images/brand/logo.png" alt="">
</a>
</div>
<div class="desktoplogo-1">
<a href="<?= base_url(); ?>">
<img src="<?= base_url(); ?>/assets/images/brand/logo.png" alt="">
</a>
</div>
<!--Nav-->
<nav class="horizontalMenu clearfix d-md-flex">
<div class="outsidebg">
    <i class="fas fa-times menu-cross-icon text-white fs-22 m-2"></i>
</div>
<ul class="horizontalMenu-list">
<li><a href="<?php echo base_url('Website/index')?>">Home </a></li>
<li><a href="<?php echo base_url('Website/auction_list')?>">Auction </a></li>
<li><a href="<?php echo base_url('Website/buy')?>">Buy </a></li>
<li><a href="<?php echo base_url('Website/sell')?>">Sell </a></li>
<li><a href="<?php echo base_url('Website/how_it_works')?>">How it works </a></li>
<li><a href="<?php echo base_url('Website/faq')?>">Faq </a></li>
<li class="d-block d-lg-none"><a href="<?php echo base_url('Dealer/profile')?>">My Profile </a></li>
<li class="d-block d-lg-none"><a href="editprofile.html">Account Setting</a></li>
<li><div>
<a href="<?php echo base_url('Dealer/my_documents')?>" class="nav-link pt-0 d-none d-lg-block" >
<img src="<?=base_url();?>/assets/images/users/male/1.png" alt="profile-img" class="avatar avatar-md brround">
</a>
<!--<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">-->
<!--<a class="dropdown-item" href="<?php echo base_url('Dealer/my_documents')?>">-->
<!--<i class="dropdown-icon icon icon-user"></i> My Dashboard-->
<!--</a>-->
<!--<a class="dropdown-item" href="<?php echo base_url('Dealer/profile')?>">-->
<!--<i class="dropdown-icon icon icon-user"></i> My Profile-->
<!--</a>-->
<!--<a class="dropdown-item" href="editprofile.html">-->
<!--<i class="dropdown-icon  icon icon-settings"></i> Account Settings-->
<!--</a>-->
<!--<a class="dropdown-item" href="<?=base_url();?>dealer/dealer_logout">-->
<!--<i class="dropdown-icon icon icon-power"></i> Log out-->
<!--</a>-->
<!--</div>-->
<!--</div>-->
</li>
</ul>
<ul class="mb-0">
<li aria-haspopup="true" class="ml-2 mt-5 d-none d-lg-block ">
<span><a class="btn btn-blue ad-post " type="button" data-toggle="modal" data-target="#sellModal"><i class="fa fa-car text-white mr-1"></i> Sell Your Car</a></span>
</li>
</ul>
</nav>
<!--Nav-->
</div>
</div>
<!-- /Horizontal Main -->
</div>
<!-- Topbar -->
<!-- Popup SELL YOUR CAR-->
<div id="sellModal" class="modal fade">
<div class="modal-dialog col-md-8" role="document">
<div class="modal-content ">
<div class="modal-header">
<h2 class="modal-title" id="exampleModalLabel">Enter the following data to sell your car</h2>
<button type="button" class="close btn btn-primary btn-lg" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="single-page customerpage">
<div class="wrapper wrapper2 box-shadow-0">
<!--<form id="login" class="card-body row" tabindex="500">-->
<?php 
$attributes = array( 'id'=>'login', 'method' =>'post', 'class' => 'card-body row', 'tabindex' => '500'); 
echo form_open('Website/sellcar_email', $attributes); 
?>
<?php
if($this->session->flashdata('error_sellcar')){
echo '<div class="alert alert-danger border-danger">
<button type="button" class="close"
data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled"></i>
</button>'.
$this->session->flashdata("error_sellcar")  
.'</div>';
}else if($this->session->flashdata('success_sellcar')){
echo '<div class="alert alert-success border-success">
<button type="button" class="close"
data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled"></i>
</button>'.
$this->session->flashdata("success_sellcar")  
.'</div>';
}
?>
<div class="col-md-6">
<input type="text" name="name" id="sellar_name" value="<?php echo set_value('name', $this->session->userdata('name')); ?>">
<label>Name</label>
<span id="sellar_name_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('name'); ?></span>
</div>
<div class="col-md-6">
<input type="text" name="surname" id="sellar_surname" value="<?php echo set_value('surname', $this->session->userdata('surname')); ?>">
<label>Surname</label>
<span id="sellar_surname_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('surname'); ?></span>
</div>
<div class="col-md-6">
<input type="email" name="email" id="email" value="<?php echo set_value('email', $this->session->userdata('email')); ?>">
<label>Email</label>
<span id="email_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('email'); ?></span>
</div>
<div class="col-md-6">
<input type="text" name="phone" id="sellar_phone" value="<?php echo set_value('phone', $this->session->userdata('phone')); ?>">
<label>Phone Number</label>
<span id="sellar_phone_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('phone'); ?></span>
</div>
<div class="col-md-12">
<input type="text" name="city" id="sellar_city" value="<?php echo set_value('city', $this->session->userdata('city')); ?>">
<label>City</label>
<span id="sellar_city_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('city'); ?></span>
</div>
<div class="col-md-4">
<input type="text" name="make" id="make" value="<?php echo set_value('make', $this->session->userdata('make')); ?>">
<label>Make</label>
<span id="make_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('make'); ?></span>
</div>
<div class="col-md-4">
<input type="text" name="model" id="model" value="<?php echo set_value('model', $this->session->userdata('model')); ?>">
<label>Model </label>
<span id="model_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('model'); ?></span>
</div>
<div class="col-md-4">
<input type="text" name="year" id="year" value="<?php echo set_value('year', $this->session->userdata('year')); ?>">
<label>Year </label>
<span id="year_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('year'); ?></span>
</div>
<div class="col-md-4">
<input type="text" name="kilometers" id="kilometers" value="<?php echo set_value('kilometers', $this->session->userdata('kilometers')); ?>">
<label>Kilometers </label>
<span id="kilometers_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('kilometers'); ?></span>
</div>
<div class="col-md-4">
<input type="text" name="engine" id="engine" value="<?php echo set_value('engine', $this->session->userdata('engine')); ?>">
<label>Engine </label>
<span id="engine_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('engine'); ?></span>
</div>
<div class="col-md-4">
<input type="text" name="gearbox" id="gearbox" value="<?php echo set_value('gearbox', $this->session->userdata('gearbox')); ?>">
<label>Gearbox </label>
<span id="gearbox_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('gearbox'); ?></span>
</div>
<div class="col-md-12">
<textarea class="form-control" id="sellar_note" name="sellar_note" value="<?php echo set_value('sellar_note', $this->session->userdata('sellar_note')); ?>"></textarea>
<label>Any notes or defects to be highlighted </label>
<span id="sellar_note_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('sellar_note'); ?></span>
</div>
<div class="col-md-12 submit">
<button class="btn btn-primary btn-block btn-lg" name="submit" type="submit">Submit</button>
</div>
 </form> 
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Popup SELL YOUR CAR-->