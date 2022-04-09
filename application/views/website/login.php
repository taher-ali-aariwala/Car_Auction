	<section class="sptb">
			<div class="container customerpage sptb">
				<div class="row single-page justify-content-center">
					<div class="col-lg-6 col-xl-7 col-md-6">
						<div class="section-title2 center-block text-left"> 
							<h3>The standard Lorem<br> Ipsum passage </h3> 
							<div class="mt-5 login-step">
								<p><span class="font-weight-semibold"><i class="fa fa-paper-plane mr-3 mb-2"></i></span><a href="#" class="text-body"> Lorem Ipsum passage</a></p>
								<p><span class="font-weight-semibold"><i class="fa fa-paper-plane mr-3 mb-2"></i></span><a href="#" class="text-body"> Lorem Ipsum passage</a></p>
								<p><span class="font-weight-semibold"><i class="fa fa-paper-plane mr-3 mb-2"></i></span><a href="#" class="text-body"> Lorem Ipsum passage</a></p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-xl-5 col-md-6">
						<div class="wrapper wrapper2">
							<!--<form id="login" class="card-body" tabindex="500">-->
							    <?php 
		                            $attributes = array( 'id'=>'login', 'method' =>'post', 'class' => 'card-body'); 
		                            echo form_open('Dealer/auth', $attributes); 
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
                                
								<h3>Login</h3>
								<div class="mail">
									<input type="email" name="email" maxlength="40">
									<label>Mail or Username</label>
								</div>
								<div class="passwd">
									<input type="password" name="password" maxlength="30">
									<label>Password</label>
								</div>
								<div class="submit">
								    <button type="submit" name="login_btn_dealer" value="Submit" class="btn btn-primary btn-block btn-lg">Login</button>
									<!--<a class="btn btn-primary btn-block btn-lg" href="index.php">Login</a>-->
								</div>
								<p class="mb-2"><a href="<?php echo base_url('Website/forget_password')?>" >Forgot Password</a></p>
								<p class="text-dark mb-0">Don't have account?<a href="<?php echo base_url('Website/register')?>" class="text-primary ml-1">Sign UP</a></p>
							<!--</form>-->
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Login-Section-->