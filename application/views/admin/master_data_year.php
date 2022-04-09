
<div class="side-app">



	<div class="row">



		<div class="col-md-12">

            <!--------------------->
            <!----year start ----->
			<div class="card">



				<div class="card-body">



					<div class="item2-gl">



						<div class="item2-gl-nav d-flex align-items-center mb-4">



							<h3 class="mb-0 text-left card-active-btn">Year</h3>
							<div style="float:right; width:85%;">
                                <a href="" data-toggle="modal" data-target="#save-request-model" class="position-relative inprogress_auction ml-2 btn btn-outline-primary">Add year+
                                    
                                </a>
                                <a href="<?php echo base_url('Admin/master_data')?>" class="btn btn-blue d-inline-block ad-post text-white font-weight-bold ml-4">Back</a>
                            </div>
                            
                            <!-- The Modal -->
							<div class="modal fade" id="save-request-model">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
									    <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/edit_year', $attributes); 
                                        ?>
										<!-- Modal Header -->
										<div class="modal-header pb-0 border-0">
											<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
										</div>
										
										<!-- Modal body -->
										<div class="modal-body pt-0 text-center">
											<div id="equipment_form">
                                                <div class="form-group mb-0">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="year" name="year" min="1900" max="2050" value="<?php echo set_value('year', $this->session->userdata('year')); ?>" placeholder="year Name">
                                                        <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('year'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										
										<!-- Modal footer -->
										<div class="p-3 popup-btn d-flex justify-content-center">
											<button type="submit" name="edit_year_submit" class="btn btn-sell max-width-max-content mr-3 d-inline">Add</button>
											<button type="button" data-dismiss="modal" class="btn btn-buy max-width-max-content">No</button>
										</div>
                                        <?php echo form_close(); ?>
									</div>
								</div>
							</div>
				

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
						<div class="table-responsive data-table text-center">
							<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
								<thead>
									<tr class="bg-dark-blue">
										<th class="text-white font-weight-semibold text-uppercase">S.No</th>

										<th class="text-white font-weight-semibold text-uppercase">Name</th>

										<th class="text-white font-weight-semibold text-uppercase">Update</th>

										<th class="text-white font-weight-semibold text-uppercase">Delete</th>
	
									</tr>
								</thead>
								<tbody>
								    
								    <?php
                                        if(!empty($years)){
                                            $i = 1;
                                        foreach($years as $year){
                                    ?>
								                  
									<tr>
									    <td><?= $i; ?></td>

										<td><div class="d-flex align-items-center"><span><?= ucfirst($year->name)?></span></div></td>
                              
										<td class="text-center"><a href="" data-toggle="modal" data-target="#edit-request-model<?=$year->id;?>" class="d-inline-block my-1"><span class="table-detail-btn btn-danger">Edit</span></a></td>
                                        
                                        <!-- The Modal -->
            							<div class="modal fade" id="edit-request-model<?=$year->id;?>">
            								<div class="modal-dialog modal-sm">
            									<div class="modal-content">
            									    <?php 
                                                        $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                                        echo form_open_multipart('Admin/edit_year', $attributes); 
                                                    ?>
            										<!-- Modal Header -->
            										<div class="modal-header pb-0 border-0">
            											<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
            										</div>
            										
            										<!-- Modal body -->
            										<div class="modal-body pt-0 text-center">
            											<div id="equipment_form">
                                                            <div class="form-group mb-0">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="year" name="year" min="1900" max="2050" value="<?php echo $year->name; ?>" placeholder="year Name">
                                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('year'); ?></span>
                                                                    <input type="hidden" class="form-control" id="year_id" name="year_id" value="<?php echo $year->id; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
            										</div>
            										
            										<!-- Modal footer -->
            										<div class="p-3 popup-btn d-flex justify-content-center">
            											<button type="submit" name="edit_year_submit" class="btn btn-sell max-width-max-content mr-3 d-inline">Edit</button>
            											<button type="button" data-dismiss="modal" class="btn btn-buy max-width-max-content">No</button>
            										</div>
                                                    <?php echo form_close(); ?>
            									</div>
            								</div>
            							</div>

										<td class="text-center"><a href="" data-toggle="modal" data-target="#reject-request-model<?=$year->id;?>" class="ajaxdelete d-inline-block my-1"><span class="table-detail-btn btn-danger">Delete</span></a></td>
                                        
                                        <!-- The Modal -->
            							<div class="modal fade" id="reject-request-model<?=$year->id;?>">
            								<div class="modal-dialog modal-sm">
            									<div class="modal-content">
            									
            										<!-- Modal Header -->
            										<div class="modal-header pb-0 border-0">
            											<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
            										</div>
            										
            										<!-- Modal body -->
            										<div class="modal-body pt-0 text-center">
            											<h4 class="modal-title request-model-title text-green fs-18 mt-4 mb-5 font-weight-semibold">Delete year</h4>
            											<p class="request-model-desc">Do you really want to delete this year ???<i class="far fa-times-circle fs-20 pl-3 text-red"></i></p>
            										</div>
            										
            										<!-- Modal footer -->
            										<div class="p-3 popup-btn d-flex justify-content-center">
            											<a type="button" href="<?php echo base_url(); ?>admin/delete_year/<?=$year->id;?>" class="ajaxdelete btn btn-sell max-width-max-content mr-3 d-inline">Yes</a>
            											<button type="button" data-dismiss="modal" class="btn btn-buy max-width-max-content">No</button>
            										</div>
            
            									</div>
            								</div>
            							</div>
            							
									</tr>
									
									<?php
									        $i++;
                                            }
                                        }
                                    ?>
                                                        
									
									
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</div>
			<!--------------------->
            <!----year end ----->
			
			
			
		</div>



	</div>



</div>










