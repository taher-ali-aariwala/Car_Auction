<!--Breadcrumbs Section-->
	<div class="bannerimg cover-image bg-background3" data-image-src="<?=base_url();?>assets/images/banners/banner-1.jpg">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white">
					<h2 class="mb-5">The standard Lorem Ipsum passage, used since the 1500s</h2>
					<h4 class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
					<a class="btn btn-blue btn-lg text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
				</div>
			</div>
		</div>
	</div>
	<!--Breadcrumbs Section-->

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

	<!--Section-->
	<section class="sptb pb-0 bg-white">
		<div class="container">
			<div class="section-title center-block text-center"> 
				<h2>The standard Lorem Ipsum passage </h2> 
			</div>
		    <div class="row align-items-center justify-content-center">
		    	<div class="col-md-4 text-center">
		        	<h2>The standard <br> Lorem Ipsum passage</h2>
		        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		        </div>
		        <div class="col-md-4 text-center">
		        	<h2>The standard <br> Lorem Ipsum passage</h2>
		        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		        </div>
		        <div class="col-md-4 text-center">
		        	<h2>The standard <br> Lorem Ipsum passage</h2>
		        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		        </div>
		        <div class="col-md-3 mt-5 text-center">
					<a class="btn btn-blue btn-lg text-white w-100" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
				</div>
		    </div>
		</div>
	</section>
	<!--Section-->

	<!--Section-->
	<section class="sptb bg-white">
		<div class="container">
			<div class="section-title center-block text-center"> 
				<h2>The standard Lorem Ipsum passage </h2> 
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="row align-items-center">
		        <div class="col-md-6 text-center">
		        	<img src="<?=base_url();?>assets/images/media/buy.jpg" class="box-shadow w-75 mb-5">
		        </div>
		        <div class="col-md-6">
		        	<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	<p class="fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		        	<div class="text-center mt-5">
		        		<a class="btn btn-blue btn-lg w-50 text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
		        	</div>
		        </div>
		    </div>
		    <div class="row align-items-center flex-row-reverse sptb">
		        <div class="col-md-6 text-center">
		        	<img src="<?=base_url();?>assets/images/media/buy.jpg" class="box-shadow w-75 mb-5">
		        </div>
		        <div class="col-md-6">
		        	<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	<p class="fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		        	<div class="text-center mt-5">
		        		<a class="btn btn-blue btn-lg w-50 text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
		        	</div>
		        </div>
		    </div>
		    <div class="row align-items-center">
		        <div class="col-md-6 text-center">
		        	<img src="<?=base_url();?>assets/images/media/buy.jpg" class="box-shadow w-75 mb-5">
		        </div>
		        <div class="col-md-6">
		        	<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	<p class="fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		        	<div class="text-center mt-5">
		        		<a class="btn btn-blue btn-lg w-50 text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
		        	</div>
		        </div>
		    </div>
		    <div class="row align-items-center flex-row-reverse sptb">
		        <div class="col-md-6 text-center">
		        	<img src="<?=base_url();?>assets/images/media/buy.jpg" class="box-shadow w-75 mb-5">
		        </div>
		        <div class="col-md-6">
		        	<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	<p class="fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		        	<div class="text-center mt-5">
		        		<a class="btn btn-blue btn-lg w-50 text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
		        	</div>
		        </div>
		    </div>
		    <div class="row align-items-center">
		        <div class="col-md-6 text-center">
		        	<img src="<?=base_url();?>assets/images/media/buy.jpg" class="box-shadow w-75 mb-5">
		        </div>
		        <div class="col-md-6">
		        	<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	<p class="fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		        	<div class="text-center mt-5">
		        		<a class="btn btn-blue btn-lg w-50 text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
		        	</div>
		        </div>
		    </div>
		    <div class="row align-items-center flex-row-reverse pt-9">
		        <div class="col-md-6 text-center">
		        	<img src="<?=base_url();?>assets/images/media/buy.jpg" class="box-shadow w-75 mb-5">
		        </div>
		        <div class="col-md-6">
		        	<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	<p class="fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		        	<div class="text-center mt-5">
		        		<a class="btn btn-blue btn-lg w-50 text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
		        	</div>
		        </div>
		    </div>
		</div>
	</section>
	<!--Section-->

	<!--Faq section-->
	<section class="sptb">
		<div class="container">
			<div class="section-title center-block text-center"> 
				<h2>Frequently Asked Questions</h2> 
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="row">
		        <div class="col-md-6">
					<div class="panel-group1" id="accordion2">
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseone" aria-expanded="false">1. What does it Cost to advertise?</a>
								</h4>
							</div>
							<div id="collapseone" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapsetwo" aria-expanded="false">2. What Cars Categories do you offer?</a>
								</h4>
							</div>
							<div id="collapsetwo" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapsethree" aria-expanded="false">3. How do I pay for my Cars ad?</a>
								</h4>
							</div>
							<div id="collapsethree" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" aria-expanded="false">4. Do you offer frequency Discounts?</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" aria-expanded="false">5. How will I know if people are responding to my Cars ad?</a>
								</h4>
							</div>
							<div id="collapseFive" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel-group1" id="accordion2">
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#twocollapseone" aria-expanded="false">1. What does it Cost to advertise?</a>
								</h4>
							</div>
							<div id="twocollapseone" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#twocollapsetwo" aria-expanded="false">2. What Cars Categories do you offer?</a>
								</h4>
							</div>
							<div id="twocollapsetwo" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#twocollapsethree" aria-expanded="false">3. How do I pay for my Cars ad?</a>
								</h4>
							</div>
							<div id="twocollapsethree" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#twocollapseFour" aria-expanded="false">4. Do you offer frequency Discounts?</a>
								</h4>
							</div>
							<div id="twocollapseFour" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default mb-4 border p-0">
							<div class="panel-heading1">
								<h4 class="panel-title1">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#twocollapseFive" aria-expanded="false">5. How will I know if people are responding to my Cars ad?</a>
								</h4>
							</div>
							<div id="twocollapseFive" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
								<div class="panel-body bg-white">
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
								</div>
							</div>
						</div>
					</div>
				</div>
		    	<div class="col-md-12 mt-5 text-center">
					<a class="btn btn-blue btn-lg text-white" type="button" data-toggle="modal" data-target="#sellModal">SELL YOUR CAR</a>
				</div>
			</div>
		</div>
	</section>
	<!--/Faq section-->