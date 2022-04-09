<div class="side-app">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="item2-gl">
						<div class="item2-gl-nav clearfix mb-4">
							<h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">Registration Request</h3>
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
										<th class="text-white font-weight-semibold text-uppercase">Dealer Name</th>
										<th class="text-white font-weight-semibold text-uppercase">Email</th>
										<th class="text-white font-weight-semibold text-uppercase">Telephone</th>
										<th class="text-white font-weight-semibold text-uppercase">Requested date</th>
										<th class="text-white font-weight-semibold text-uppercase">Watch Details</th>
									</tr>
								</thead>
								<tbody>
								    <?php
                                        if(!empty($all_dealers)){
                                        foreach($all_dealers as $dealer){
                                    ?>
									<tr>
										<td><div class="d-flex align-items-center"><span class="profile-name"><?php echo strtoupper(substr($dealer->name, 0, 1)); echo strtoupper(substr($dealer->surname, 0, 1)); ?></span><span><?= ucfirst($dealer->name).' '.ucfirst($dealer->surname); ?></span></div></td>
                              
										<td><?php if(strlen($dealer->email) > 40){ echo substr($dealer->email, 0, 40) . '...';}else{ echo $dealer->email; } ?></td>
										<td><?= $dealer->phone; ?></td>
										<td><p class="m-0"><?= $dealer->created_at; ?></p></td>
										<td class="text-center"><a href="<?php echo base_url('Admin/registration_request_details/'.$dealer->id)?>" class="btn btn-outline-info btn-sm">See Details<i class="far fa-eye pl-3"></i></a></td>
									</tr>
									<?php
                                            }
                                        }
                                    ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
