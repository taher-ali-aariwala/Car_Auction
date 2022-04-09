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

						<div class="item2-gl-nav d-flex align-items-center mb-4">

							<a href="<?php echo base_url('Admin/registration_request')?>" class="mb-0 text-left card-active-btn"><i class="fas fa-angle-left text-white mr-3"></i>Back to the request list</a>

						</div>
						
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

                        <div class="row my-5">
							<div class="col-11 m-auto">
								<div class="row detail-card">
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
									<div class="col-lg-6 mb-5">
										<a href="<?php echo base_url('uploads/dealer/documents/')?><?php echo $dealer->identity_card; ?>" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn w-75 justify-content-center">View ID Card <br> presented<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
									</div>
									<div class="col-lg-6 mb-5">
										<a href="<?php echo base_url('uploads/dealer/documents/')?><?php echo $dealer->chamber_commerce; ?>" class="btn btn-blue text-capitalize d-flex align-items-center upload-btn w-75 justify-content-center">View Chamber of Commerce <br> certificate presented<i class="fas fa-download ml-4 upload-icon d-flex justify-content-center align-items-center"></i></a>
									</div>
									<div class="col-lg-6 mb-5">
										<div class="form-group m-0 d-flex align-items-center">
											<span class="fs-20 text-green font-weight-semibold mr-5">Privacy accepted :</span>
											
											    <?php  
											        if($dealer->privacy_policy == 1){
											    ?>
											    <span><i class="far fa-check-square"></i></span>
												<?php 
                                                   }
												?>
												
												
										</div>
									</div>
									<div class="col-lg-6 mb-5">
										<div class="form-group m-0 d-flex align-items-center">
											<span class="fs-20 text-green font-weight-semibold mr-5">Terms and conditions accepted :</span>
											<!--<label class="custom-control custom-checkbox mb-0">-->
												
												<?php  
											        if($dealer->terms_condition == 1){
											    ?>
											    <span><i class="far fa-check-square"></i></span>
												<!--<input type="checkbox" class="custom-control-input radio" name="terms_condition" value="<?php echo $dealer->terms_condition; ?>" checked >-->
												<?php 
                                                   } 
												?>
												
												
												<!--<span class="custom-control-label"></span>-->
											<!--</label>-->
										</div>
									</div>
									<div class="col-lg-6">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-sell max-width-max-content" data-toggle="modal" data-target="#approve-request-model">
										Approve request
										</button>

										<!-- The Modal -->
										<div class="modal fade" id="approve-request-model">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
												
													<!-- Modal Header -->
													<div class="modal-header pb-0 border-0">
														<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
													</div>
													
													<!-- Modal body -->
													<div class="modal-body pt-0 text-center">
														<h4 class="modal-title request-model-title text-green fs-18 mt-4 mb-5 font-weight-semibold">Approve Request</h4>
														<p class="request-model-desc">Do you really want to accept this request ???<i class="far fa-check-circle fs-20 pl-3 text-green"></i></p>
													</div>
													
													<!-- Modal footer -->
													<div class="p-3 popup-btn d-flex justify-content-center">
														<a type="button" href="<?php echo base_url();?>admin/approve_user/<?php echo $dealer->id;?>" class="btn btn-sell max-width-max-content mr-3 d-inline">Yes</a>
														<button type="button" data-dismiss="modal" class="btn btn-buy max-width-max-content">No</button>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-buy max-width-max-content" data-toggle="modal" data-target="#reject-request-model">
										Reject request
										</button>

										<!-- The Modal -->
										<div class="modal fade" id="reject-request-model">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
												
													<!-- Modal Header -->
													<div class="modal-header pb-0 border-0">
														<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
													</div>
													
													<!-- Modal body -->
													<div class="modal-body pt-0 text-center">
														<h4 class="modal-title request-model-title text-green fs-18 mt-4 mb-5 font-weight-semibold">Reject Request</h4>
														<p class="request-model-desc">Do you really want to reject this request ???<i class="far fa-times-circle fs-20 pl-3 text-red"></i></p>
													</div>
													
													<!-- Modal footer -->
													<div class="p-3 popup-btn d-flex justify-content-center">
														<a type="button" href="<?php echo base_url();?>admin/reject_user/<?php echo $dealer->id;?>" class="btn btn-sell max-width-max-content mr-3 d-inline">Yes</a>
														<button type="button" data-dismiss="modal" class="btn btn-buy max-width-max-content">No</button>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
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