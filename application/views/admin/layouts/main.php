<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="msapplication-TileColor" content="#162946">
<meta name="theme-color" content="#e67605">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<link rel="icon" href="<?= base_url();?>assets/favicon.ico" type="image/x-icon"/>
<title><?php if(isset($title)){ echo $title; } ?></title>
<!------------------------------------------------------------------->
<!------------------------LOADS HEADER SCRIPTS----------------------->
<!------------------------------------------------------------------->
<?php $this->load->view('admin/layouts/header_scripts'); ?>
</head>
<body class="app sidebar-mini">
<!--Page-->
<div class="page">
<div class="page-main">
<!----------------------------------------------------------->
<!--------------LOADS header--------------------------------->
<!----------------------------------------------------------->
<?php $this->load->view('admin/layouts/header'); ?>
<!----------------------------------------------------------->
<!--------------LOADS menu ---------------------------------->
<!----------------------------------------------------------->
<?php $this->load->view('admin/layouts/menu'); ?>
<div class="app-content sptb">
<!------------------------------------------------------------------->
<!------------------------LOADS PAGE CONTENT------------------------->
<!------------------------------------------------------------------->
<?php $this->load->view($view); ?>
</div>
</div>
<!------------------------------------------------------------------->
<!----------------------LOADS FOOTER -------------------------------->
<!------------------------------------------------------------------->
<?php $this->load->view('admin/layouts/footer'); ?>
<!------------------------------------------------------------------->
<!----------------------LOADS FOOTER SCRIPTS------------------------->
<!------------------------------------------------------------------->
<?php $this->load->view('admin/layouts/footer_scripts'); ?>
</body>
</html>
