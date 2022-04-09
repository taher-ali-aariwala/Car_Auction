        <!--Register-Section-->
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
		                            $attributes = array( 'id'=>'login', 'method' =>'post', 'class' => 'card-body', 'tabindex' => '500'); 
		                            echo form_open_multipart('Dealer/register', $attributes); 
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
                                
								<h3>Register</h3>
								   
								<div class="field">
									<input type="text" name="name" id="name" value="<?php echo set_value('name', $this->session->userdata('name')); ?>">
									<label>Name</label>
									<span id="name_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('name'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="surname" id="surname" value="<?php echo set_value('surname', $this->session->userdata('surname')); ?>">
									<label>Surname</label>
									<span id="surname_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('surname'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="company_name" id="company_name" value="<?php echo set_value('company_name', $this->session->userdata('company_name')); ?>">
									<label>Company/Dealer name</label>
									<span id="company_name_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('company_name'); ?></span>
								</div>
								
								<div class="field">
									<input type="text" name="phone" id="phone" value="<?php echo set_value('phone', $this->session->userdata('phone')); ?>">
									<label>Telephone</label>
									<span id="phone_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('phone'); ?></span>
								</div>
								<div class="field">
									<input type="email" name="email" id="email" value="<?php echo set_value('email', $this->session->userdata('email')); ?>">
									<label>Email address</label>
									<span id="email_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('email'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="vat_number" id="vat_number" value="<?php echo set_value('vat_number', $this->session->userdata('vat_number')); ?>">
									<label>VAT number</label>
									<span id="vat_number_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('vat_number'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="address" id="address" value="<?php echo set_value('address', $this->session->userdata('address')); ?>">
									<label>Address</label>
									<span id="address_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('address'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="city" id="city" value="<?php echo set_value('city', $this->session->userdata('city')); ?>">
									<label>City</label>
									<span id="city_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('city'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="postal_code" id="postal_code" value="<?php echo set_value('postal_code', $this->session->userdata('postal_code')); ?>">
									<label>Post Code</label>
									<span id="postal_code_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('postal_code'); ?></span>
								</div>
								<div class="field">
									<input type="text" name="province" id="province" value="<?php echo set_value('province', $this->session->userdata('province')); ?>">
									<label>Province</label>
									<span id="province_error" class="error d-flex justify-content-left" style="color:red"><?php echo form_error('province'); ?></span>
								</div>
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
								
								<div class="field" style="color:black">
									<input type="file" name="identity_card" size="20" >
									<label>Identity card of the legal representative</label>
									<span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('identity_card'); ?></span>
								</div>
								<div class="field" style="color:black">
									<input type="file" name="chamber_commerce" size="20"  />
									<label>Chamber of Commerce Registration</label>
									<span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('chamber_commerce'); ?></span>
								
								</div>
								
								<!--<div class="field">-->
								<!--	<input type="text" name="">-->
								<!--	<label>Chamber of Commerce</label>-->
								<!--</div>-->
							
								<!--<div class="field">-->
								<!--	<input type="text" name="">-->
								<!--	<label>Identity card of the legal representative</label>-->
								<!--</div>-->
								
								<div class="field pb-2">
                                    <input type="checkbox" value="1" name="privacy_policy" class="form-check-input" id="privacy_policy">
                                    <label for="privacy_policy">Privacy Policies accepted</label><a href="" class="label_type_css"  data-toggle="modal" data-target="#privacy-model">( View )</a>
                                    <span class="error d-flex justify-content-left" id="privacy-text" style="color:red"><?php echo form_error('privacy_policy'); ?></span>
								</div>
								
								
								<div class="field pb-2">
                                    <input type="checkbox"  value="1" name="terms_condition" class="form-check-input" id="terms_condition">
                                    <label for="terms_condition">Terms and condition accepted</label><a href="" class="label_type_css"  data-toggle="modal" data-target="#terms-model">( View )</a>
                                    <span class="error d-flex justify-content-left" id="privacy-text-error"  style="color:red"><?php echo form_error('terms_condition'); ?></span>
								</div>
								
								<!--<div class="form-group">-->
        <!--                            <label class="custom-control custom-checkbox mb-3">-->
        <!--                                <span class="custom-control-label">-->
        <!--                                    <a href="#" class="text-dark">Privacy Policies accepted</a>-->
        <!--                                </span>-->
        <!--                                <input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">-->
        <!--                            </label>-->
        <!--                        </div>-->
        <!--                        <div class="form-group">-->
        <!--                            <label class="custom-control custom-checkbox mb-3">-->
        <!--                                <span class="custom-control-label">-->
        <!--                                    <a href="#" class="text-dark">Terms and condition accepted</a>-->
        <!--                                </span>-->
        <!--                                <input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">-->
        <!--                            </label>-->
        <!--                        </div>-->
								
								
								<div class="submit">
									<button name="submit" class="btn btn-primary btn-block btn-lg" onClick="validatePassword();" type="submit">Register</button>
								</div>
								<p class="mb-2"><a href="forgot.php" >Forgot Password</a></p>
								<p class="text-dark mb-0">Already have an account?<a href="<?php echo base_url('Website/login')?>" class="text-primary ml-1">Sign In</a></p>
							<!--</form>-->
							<?php echo form_close(); ?>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Register-Section-->
		
		<!--------- privacy policy---------->
		<div class="modal fade" id="privacy-model">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
				
					<!-- Modal Header -->
					<div class="modal-header pb-0 border-0">
					    <h4 class="modal-title request-model-title text-green fs-18 mt-4 mb-5 font-weight-semibold">Privacy Policies</h4>
						
						<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body pt-0 text-center" style="height:70vh; overflow-y:scroll;">
						<p class="request-model-desc" style="text-align:justify;">What is Lorem Ipsum?

                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Why do we use it?
                        
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        
                        Where does it come from?
                        
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Why do we use it?
                        
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        
                        Where does it come from?
                        
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Why do we use it?
                        
                        Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        
                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        </p>
					</div>
					
					

				</div>
			</div>
		</div>
		
		
		<!---------terms and condition --------->
		<div class="modal fade" id="terms-model">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
				
					<!-- Modal Header -->
					<div class="modal-header pb-0 border-0">
					    <h4 class="modal-title request-model-title text-green fs-18 mt-4 mb-5 font-weight-semibold">Terms and condition</h4>
						
						<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body pt-0 text-center" style="height:70vh; overflow-y:scroll;">
						<p class="request-model-desc" style="text-align:justify;">What is Lorem Ipsum?

                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Why do we use it?
                        
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        
                        Where does it come from?
                        
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Why do we use it?
                        
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        
                        Where does it come from?
                        
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Why do we use it?
                        
                        Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        
                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        </p>
					</div>
					
					

				</div>
			</div>
		</div>
		
		
    