<?php
    // if($this->session->flashdata('error')){
    //     echo '<script>alert("'.$this->session->flashdata('error').'");</script>';
    // }
?>
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
		<link rel="icon" href="<?=base_url(); ?>assets/favicon.ico" type="image/x-icon"/>
		<!-- Title -->
		<title>Astemotori Website | Design by Developer Bazaar Technologies</title>
		<!-- Dashboard Css -->
		<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" />
		<link href="<?=base_url();?>assets/css/admin-custom.css" rel="stylesheet" />
		<!-- Sidemenu Css -->
		<link href="<?=base_url();?>assets/css/sidemenu.css" rel="stylesheet" />
		<!-- P-scroll bar css-->
		<link href="<?=base_url();?>assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />
		<!---Font icons-->
		<link href="<?=base_url();?>assets/css/icons.css" rel="stylesheet"/>
	</head>
	<body>
		<!--Page-->
		<div class="page page-h login-image">
			<div class="page-content z-index-10">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-xl-4 col-md-12 col-md-12">
							<h2>Login to your Account</h2>
							<div class="login-card">
								<?php 
		                            $attributes = array( 'id'=>'loginform', 'method' =>'post', 'class' => 'md-float-material form-material'); 
		                            echo form_open('Authenticate/auth', $attributes); 
		                        ?>
		                        <?php
                                    if($this->session->flashdata('error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('success')){
                                        echo '<div class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("success")  
                                                .'</div>';
                                    }
                                ?>
								<div class="form-group">
									<label class="form-label text-dark">Email address</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" maxlength="40">
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Password</label>
									<input type="password" name="password" class="form-control" maxlength="25" id="exampleInputPassword1" placeholder="Enter Your Password">
								</div>
								<button type="submit" name="login_btn" value="Submit" class="btn btn-blue btn-block">Sign In</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Page-->
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
		<!-- P-scroll js-->
		<script src="<?=base_url();?>assets/plugins/p-scrollbar/p-scrollbar.js"></script>
		<script src="<?=base_url();?>assets/plugins/p-scrollbar/p-scroll1.js"></script>
		<!-- Fullside-menu Js-->
		<script src="<?=base_url();?>assets/plugins/sidemenu/sidemenu.js"></script>
		<!--Counters -->
		<script src="<?=base_url();?>assets/plugins/counters/counterup.min.js"></script>
		<script src="<?=base_url();?>assets/plugins/counters/waypoints.min.js"></script>
		<!-- Custom Js-->
		<script src="<?=base_url();?>assets/js/admin-custom.js"></script>
	</body>
</html>