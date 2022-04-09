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
<div class="outsidebg"></div>
<ul class="horizontalMenu-list">
<li><a href="<?php echo base_url('Website/index')?>">Home </a></li>
<li><a href="<?php echo base_url('Website/auction_list')?>">Auction </a></li>
<li><a href="<?php echo base_url('Website/buy')?>">Buy </a></li>
<li><a href="<?php echo base_url('Website/sell')?>">Sell </a></li>
<li><a href="<?php echo base_url('Website/how_it_works')?>">How it works </a></li>
<li><a href="<?php echo base_url('Website/faq')?>">Faq </a></li>
<li><div class="dropdown ">
<a href="#" class="nav-link pt-0" data-toggle="dropdown">
<img src="<?=base_url();?>/assets/images/users/male/1.png" alt="profile-img" class="avatar avatar-md brround">
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
<a class="dropdown-item" href="<?php echo base_url('Admin/profile')?>">
<i class="dropdown-icon icon icon-user"></i> My Profile
</a>
<!--<a class="dropdown-item" href="editprofile.html">-->
<!--<i class="dropdown-icon  icon icon-settings"></i> Account Settings-->
<!--</a>-->
<a class="dropdown-item" href="<?=base_url();?>admin/admin_logout">
<i class="dropdown-icon icon icon-power"></i> Log out
</a>
</div>
</div>
</li>
</ul>
</nav>
<!--Nav-->
</div>
</div>
<!-- /Horizontal Main -->
</div>
<!-- Topbar -->