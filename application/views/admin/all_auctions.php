<div class="side-app">



	<div class="row">



		<div class="col-md-12">



			<div class="card">



				<div class="card-body">



					<div class="item2-gl">



						<div class="item2-gl-nav d-flex align-items-center mb-4">



							<h3 class="mb-0 text-left card-active-btn">View and Edit all Auctions</h3>

							<div style="float: right; width: 70%;">
							<a href="<?php echo base_url("Admin/get_publish_auction");?>" class="inprogress_auction ml-2 btn btn-outline-primary">In Progress</a>
							<a href="<?php echo base_url("Admin/get_awarded_auction");?>" class="finish_auction ml-2 btn btn-outline-primary">Finish</a>
							<a href="<?php echo base_url("Admin/get_new_auction");?>" class="outstanding_auction ml-2 btn btn-outline-primary">Outstanding</a>
							</div>
						</div>

						<div class="table-responsive data-table text-center">
							<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
								<thead>
									<tr class="bg-dark-blue">
										<th class="text-white font-weight-semibold text-uppercase">S.No.</th>

										<th class="text-white font-weight-semibold text-uppercase">Brand</th>

										<th class="text-white font-weight-semibold text-uppercase">Model</th>

										<th class="text-white font-weight-semibold text-uppercase">Auction Price</th>

										<th class="text-white font-weight-semibold text-uppercase">Auction Time</th>

										<th class="text-white font-weight-semibold text-uppercase">Appraiser Name</th>

										<th class="text-white font-weight-semibold text-uppercase">Status</th>

										<th class="text-white font-weight-semibold text-uppercase">Auctions</th>
										
										<th class="text-white font-weight-semibold text-uppercase">Delete</th>
									</tr>
								</thead>
								<tbody>
								    
								    <?php
								        $i = 0;
                                        if(!empty($all_auctions)){
                                        foreach($all_auctions as $auction){
                                    ?>
                                    
									<tr>
                                        <?php  $i++; ?>
										<td><?= $i; ?></td>

										<td><?= $auction->brand; ?></td>

										<td><?= $auction->model; ?></td>

                                        <td>$<?= $auction->base_price;?></td>

                                        <td><?= $auction->auction_time; ?></td>

                                        <td><?= $auction->sales_person; ?></td>

                                        <td><?= $auction->status; ?></td>

										<td class="text-center"><a href="<?=base_url(); ?>admin/enter_car_auction/<?=$auction->id;?>" class="d-inline-block my-1"><span class="table-detail-btn">View/Edit</span></a></td>
                                        
                                        <td class="text-center"><a href="" data-toggle="modal" data-target="#reject-request-model<?=$auction->id;?>" class="ajaxdelete d-inline-block my-1"><span class="table-detail-btn btn-danger">Delete</span></a></td>
                                        
                                        <!-- The Modal -->
            							<div class="modal fade" id="reject-request-model<?=$auction->id;?>">
            								<div class="modal-dialog modal-sm">
            									<div class="modal-content">
            									
            										<!-- Modal Header -->
            										<div class="modal-header pb-0 border-0">
            											<button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">&times;</button>
            										</div>
            										
            										<!-- Modal body -->
            										<div class="modal-body pt-0 text-center">
            											<h4 class="modal-title request-model-title text-green fs-18 mt-4 mb-5 font-weight-semibold">Delete Auction</h4>
            											<p class="request-model-desc">Do you really want to delete this Auction ???<i class="far fa-times-circle fs-20 pl-3 text-red"></i></p>
            										</div>
            										
            										<!-- Modal footer -->
            										<div class="p-3 popup-btn d-flex justify-content-center">
            											<a type="button" href="<?php echo base_url(); ?>admin/delete_auction/<?=$auction->id;?>" class="ajaxdelete btn btn-sell max-width-max-content mr-3 d-inline">Yes</a>
            											<button type="button" data-dismiss="modal" class="btn btn-buy max-width-max-content">No</button>
            										</div>
            
            									</div>
            								</div>
            							</div>
                                       
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