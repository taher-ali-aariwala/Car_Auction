 <?php
    if(!empty($dealers)){
    foreach($dealers as $dealer){
?>

<div class="side-app">

	<div class="row">

		<div class="col-md-12">

			<div class="card">

				<div class="card-body">

					<div class="item2-gl">
                        <div class="row justify-content-center">
							<div class="col-11">
								<div class="row detail-card mt-5 justify-content-center">
									<div class="col-lg-6">
										<div class="mb-5">
											<div class="row">
												<div class="col-6">
													<h3 class="text-primary fs-18 detail-title mb-0">First & Last Name :</h3>
												</div>
												<div class="col-6">
													<span class="font-weight-semibold text-muted fs-18"><?= ucfirst($dealer->name).' '.ucfirst($dealer->surname); ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-5">
											<div class="row">
												<div class="col-6">
													<h3 class="text-primary fs-18 detail-title mb-0">Dealer Name :</h3>
												</div>
												<div class="col-6">
													<span class="font-weight-semibold text-muted fs-18"><?= ucfirst($dealer->company_name); ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-5">
											<div class="row">
												<div class="col-6">
													<h3 class="text-primary fs-18 detail-title mb-0">Delivery address :</h3>
												</div>
												<div class="col-6">
													<span class="font-weight-semibold text-muted fs-18"><?= $dealer->city.', '.$dealer->province; ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-5">
											<div class="row">
												<div class="col-6">
													<h3 class="text-primary fs-18 detail-title mb-0">VAT number :</h3>
												</div>
												<div class="col-6">
													<span class="font-weight-semibold text-muted fs-18"><?= $dealer->vat_number; ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-5">
											<div class="row">
												<div class="col-6">
													<h3 class="text-primary fs-18 detail-title mb-0">Telephone :</h3>
												</div>
												<div class="col-6">
													<span class="font-weight-semibold text-muted fs-18"><?= $dealer->phone; ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-5">
											<div class="row">
												<div class="col-6">
													<h3 class="text-primary fs-18 detail-title mb-0">Email address :</h3>
												</div>
												<div class="col-6">
													<span class="font-weight-semibold text-muted fs-18"><?= $dealer->email; ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-5 mb-3">
										<a href="<?php echo base_url('uploads/dealer/documents/')?><?php echo $dealer->identity_card; ?>" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn justify-content-center">View ID Cart <br> presented<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
									</div>
									<div class="col-lg-5 mb-3">
										<a href="<?php echo base_url('uploads/dealer/documents/')?><?php echo $dealer->chamber_commerce; ?>" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn justify-content-center">View Chamber of Commerce <br> certificate presented<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
									</div>
								</div>
							</div>
						</div>
                        
                        
                        <div class="section-title document-contact-title center-block text-center mt-6"> 

                            <h2 class="text-green text-capitalize font-weight-semibol">Do you want to change your data?</h2> 
                            <div class="text-center mt-5">
                                <a href="<?php echo base_url('Dealer/profile')?>" class="max-width-max-content mb-0 d-inline-block card-active-btn font-weight-semibold m-auto bg-primary fs-16 py-3 mt-5">Edit Profile</a>
                            </div>
                        </div>
                        
                        <div class="section-title document-contact-title center-block text-center"> 

                            <h2 class="text-green text-capitalize font-weight-semibold">Have Query ?</h2> 
                            <p class="mb-5">Do you have any questions or request please contact with us. We would love to here from you.</p>
                            <div class="text-center">
                                <a href="#" class="max-width-max-content mb-0 card-active-btn font-weight-semibold m-auto bg-primary">Contact Us</a>
                            </div>
                        </div>
                        
					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<?php
        }
    }
?>