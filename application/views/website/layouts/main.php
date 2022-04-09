<!doctype html>

<html lang="en" dir="ltr">

<head>

<meta charset="UTF-8">

<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta name="msapplication-TileColor" content="#0093f5">
<meta name="theme-color" content="#0093f5">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">

<title><?php if(isset($title)){ echo $title; } ?></title>

<!------------------------------------------------------------------->
<!------------------------LOADS HEADER SCRIPTS----------------------->
<!------------------------------------------------------------------->
<?php $this->load->view('website/layouts/header_scripts'); ?>

</head>

<body class="app sidebar-mini">

<!----------------------------------------------------------->
<!--------------LOADS header--------------------------------->
<!----------------------------------------------------------->
<?php $this->load->view('website/layouts/header'); ?>
<?php $this->load->view('website/layouts/menu'); ?>

<!------------------------------------------------------------------->
<!------------------------LOADS PAGE CONTENT------------------------->
<!------------------------------------------------------------------->
<?php $this->load->view($view); ?>

<!------------------------------------------------------------------->
<!----------------------LOADS FOOTER -------------------------------->
<!------------------------------------------------------------------->
<?php $this->load->view('website/layouts/footer'); ?>

<!------------------------------------------------------------------->
<!----------------------LOADS FOOTER SCRIPTS------------------------->
<!------------------------------------------------------------------->
<?php $this->load->view('website/layouts/footer_scripts'); ?>


</body>
</html>
