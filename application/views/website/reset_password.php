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
                            echo form_open('Dealer/reset_password_save', $attributes); 
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
                        
						<h3>Reset Password</h3>
						<div class="field">
							<input type="password" id="password" name="password" value="<?php echo set_value('password', $this->session->userdata('password')); ?>">
							<label>Password</label>
							<span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('password'); ?></span>
						</div>
						<div class="field">
							<input type="password" id="repeat_password" name="repeat_password" value="<?php echo set_value('repeat_password', $this->session->userdata('repeat_password')); ?>">
							<label>Repeat Password</label>
							<span id="c_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('repeat_password'); ?></span>
						</div>
					    <?php  $dealer_id = $this->uri->segment(3); ?>
					    <input type="hidden" name="dealer_id" value="<?php echo $dealer_id; ?>">
						<div class="submit">
						    <button type="submit" name="reset_btn" value="Submit" class="btn btn-primary btn-block btn-lg">Login</button>
							<!--<a class="btn btn-primary btn-block btn-lg" href="index.php">Login</a>-->
						</div>
						<p class="mb-2"><a href="<?php echo base_url('Website/login')?>" >Login</a></p>
						<p class="text-dark mb-0">Don't have account?<a href="<?php echo base_url('Website/register')?>" class="text-primary ml-1">Sign UP</a></p>
					<!--</form>-->
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>


