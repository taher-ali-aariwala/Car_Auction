<!-- Sidebar menu-->
<aside class="app-sidebar doc-sidebar">
<ul class="side-menu">
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/index')?>"><img src="<?=base_url();?>/assets/images/media/side-menu1.png" alt=""><span class="side-menu__label">Active Auctions</span></a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/winner')?>"><img src="<?=base_url();?>/assets/images/media/side-menu2.png" alt=""><span class="side-menu__label">Award Winners</span></a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/cash_payments')?>"><img src="<?=base_url();?>/assets/images/media/side-menu3.png" alt=""><span class="side-menu__label">Cash +Payments</span></a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/enter_car_auction')?>"><img src="<?=base_url();?>/assets/images/media/side-menu4.png" alt=""><span class="side-menu__label">Enter Car Auction</span></a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/registered_dealer')?>"><img src="<?=base_url();?>/assets/images/media/side-menu5.png" alt=""><span class="side-menu__label">Registered dealer list</span></a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/registration_request')?>"><img src="<?=base_url();?>/assets/images/media/side-menu6.png" alt=""><span class="side-menu__label">Registration requests</span><span class="notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= count($all_dealers); ?></span></a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/get_publish_auction')?>"><img src="<?=base_url();?>/assets/images/media/side-menu1.png" alt=""><span class="side-menu__label">View All Auctions</span></a>
</li>
<li>
<a class="position-relative side-menu__item" href="<?php echo base_url('Admin/get_admin_auction_chat')?>"><img src="<?=base_url();?>assets/images/media/side-menu5.png" alt=""><span class="side-menu__label">Chat</span>
<?php if(count($chat_notification_total) != 0){?>
<span class="notification-badge bg-dark-red font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= count($chat_notification_total); ?></span>
<?php } ?>
</a>
</li>
<li>
<a class="side-menu__item" href="<?php echo base_url('Admin/master_data')?>"><img src="<?=base_url();?>/assets/images/media/side-menu1.png" alt=""><span class="side-menu__label">Master Data</span></a>
</li>
<li>
    <a class="side-menu__item" href="<?=base_url();?>admin/admin_logout"><i class="fas fa-power-off text-danger fs-24 mr-2 ml-1"></i><span class="side-menu__label">Log Out</span></a>
</li>
</ul>
</aside>
<!--/Sidebar menu-->