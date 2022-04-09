<?php if(isset($all_auctions_brandarr)){  
    foreach ($all_auctions_brandarr as $childArray) 
    { 
        foreach ($childArray as $value) 
        { 
           $singleArray[] = $value; 
           $newArray = array_values($singleArray);
        } 
    }
    $vals = array_count_values($newArray);   
    
} ?>
				
<!-- Popup filter-->
<div id="filter_modal" class="modal fade">
    <div class="apply-filter-btn" data-dismiss="modal" aria-label="Close">
        <a href="#" class="btn btn-blue btn-lg px-7">Apply Filters</a>
    </div>
	<div class="modal-dialog w-100 mt-0" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="filterModalLabel">Please Select Filter Type</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<!--<span aria-hidden="true">×</span>-->
					<span aria-hidden="true" class="cross-icon mt-0">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="filter-modal">
					<div class="wrapper wrapper2 box-shadow-0">
						<div class="card overflow-hidden">
					<div class="px-4 py-3 border-bottom">
						<h4 class="mb-0">Brand</h4>
					</div>
					<div class="card-body">
						<div class="" id="container___">
						    <h5 class="mb-4" id="heading_brand">Marche più cercate</h5>
							<div class="filter-product-checkboxs brand_featured collapse show " id="democolQQ_m">
								<?php
							    if(isset($featured_brands)){
							        $i = 1;
							     //   $brnd = array();
							        foreach($vals as $key=>$v){
							            $brnd[] = $key;
							        }
                        				     
                                    foreach($featured_brands as $f_brand)
                                    { 
                                            if ($i > 10)             //                                |
                                            {                           //                                |
                                                continue;   // Skip the remainder of this iteration. -----+
                                            }
                                            
                                            if (in_array($f_brand->name, $brnd)){
                                                
                                                foreach($vals as $key=>$v){
                                                 
                                                          if($key == $f_brand->name ){
                                    				    
                                                ?>
                                                    
                                                            <label class="custom-control custom-checkbox mb-3">
                            									<input type="checkbox" class="fbrand custom-control-input brandcheckbox ajaxfilter_m" name="<?=$f_brand->name?>" value="<?=$f_brand->name?>">
                            									<span class="custom-control-label">
                            										<span class="text-dark"><?=$f_brand->name?><span class="label label-secondary float-right"><?= $v; ?></span></span>
                            									</span>
                        								    </label>
                								<?php 
                                    				       }else{ 
                                    				           
                                    				       }
                                    				       
                                                }
                                        
                                            }else{ ?>
                                                <label class="custom-control custom-checkbox mb-3">
                									<input type="checkbox" class="fbrand custom-control-input brandcheckbox ajaxfilter_m" name="<?=$f_brand->name?>" value="<?=$f_brand->name?>">
                									<span class="custom-control-label">
                										<span class="text-dark"><?=$f_brand->name?><span class="label label-secondary float-right">0</span></span>
                									</span>
            								    </label>
            								<?php
                                            }
                                        $i++;
                                        
                                    }
                                }
                                ?>
								
							</div>
							
							<div class="filter-product-checkboxs collapse"  id="democol_m">
								<?php
							    if(isset($brands)){
							        
							        foreach($vals as $key=>$v){
							            $brnds[] = $key;
							        }
							        
                                        foreach($brands as $brand)
                                        { 
                                            if (in_array($brand->name, $brnds)){
                                                
                                                foreach($vals as $key=>$v){
                                                   
                                                        if($key == $brand->name ){
                                                        ?>
                                                        
                                                        <label class="custom-control custom-checkbox mb-3">
                        									<input type="checkbox" class="custom-control-input wfbrand brandcheckbox ajaxfilter_m" name="<?=$brand->name?>" value="<?=$brand->name?>">
                        									<span class="custom-control-label">
                        										<span class="text-dark"><?=$brand->name?><span class="label label-secondary float-right"><?= $v ?></span></span>
                        									</span>
                    								    </label>
                    								    <?php 
                                                         }else{ 
                                                             
                                                         }
                                                }
                                            }else{ ?>
                                                <label class="custom-control custom-checkbox mb-3">
                									<input type="checkbox" class="custom-control-input wfbrand brandcheckbox ajaxfilter_m" name="<?=$brand->name?>" value="<?=$brand->name?>">
                									<span class="custom-control-label">
                										<span class="text-dark"><?=$brand->name?><span class="label label-secondary float-right">0</span></span>
                									</span>
            								    </label>
            								   <?php
                                            }
                                        
							            }
                                }
                                ?>
								
							</div>
							
							<a href="" id="show_all_brand_filter" style="color: #0093f5;" data-toggle="collapse" data-target="#democol_m" class="d-flex justify-content-center align-items-center mt-4">Mostra tutte le marche</a>
						    
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Year</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 mb-0">
								<label for="inputState1_m" class="col-form-label">Min</label>
								<select id="inputState1_m"  class="form-control select2  minyeardropdown_m ajaxfilter_m">
									<option value="">DA</option>
									<?php
    							    if(isset($years)){
                                        foreach($years as $year)
                                        { ?>
                                            <option value="<?= $year->name;?>"><?= $year->name;?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6 mb-0">
								<label for="inputState2_m" class="col-form-label">Max</label>
								<select id="inputState2_m" class="form-control select2 maxyeardropdown_m ajaxfilter_m">
									<option value="">A</option>
									<?php
    							    if(isset($years)){
                                        foreach($years as $year)
                                        { ?>
                                            <option value="<?= $year->name;?>"><?= $year->name;?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Mileage</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 mb-0">
								<label for="inputState3_m" class="col-form-label">Min</label>
								<select id="inputState3_m" class="form-control select2 minmileagedropdown_m ajaxfilter_m">
									<option value="">DA</option>
									<?php
    							    if(isset($mileages)){
                                        foreach($mileages as $mileage)
                                        { ?>
                                        <?php $mkm = ($mileage->name);?>
                                            <option value="<?= $mileage->name;?>"><?= number_format($mkm , 0, ',', '.');?> KM</option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6 mb-0">
								<label for="inputState4_m" class="col-form-label">Max</label>
								<select id="inputState4_m" class="form-control select2 maxmileagedropdown_m ajaxfilter_m">
									<option value="">A</option>
									<?php
    							    if(isset($mileages)){
                                        foreach($mileages as $mileage)
                                        { ?>
                                        <?php $mkm = ($mileage->name);?>
                                        
                                            <option value="<?= $mileage->name;?>"> <?= number_format($mkm , 0, ',', '.');?> KM</option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Body Type</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs">
							<?php
						    if(isset($body_types)){
                                foreach($body_types as $body_type)
                                { ?>
								    <label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter_m bodytypecheckbox_m" name="<?=$body_type->name?>" value="<?=$body_type->name?>">
        								<span class="custom-control-label">
        									<?=$body_type->name?>
        								</span>
        							</label>
								<?php
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Price Range</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 mb-0">
								<label for="inputState5_m" class="col-form-label">Min</label>
								<select id="inputState5_m" class="form-control select2 ajaxfilter_m minpricedropdown_m">
									<option value="">DA</option>
									<?php
    							    if(isset($prices)){
                                        foreach($prices as $price)
                                        { ?>
                                            <option value="<?= $price->name;?>">€ <?= number_format($price->name , 0, ',', '.');?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6 mb-0">
								<label for="inputState6" class="col-form-label">Max</label>
								<select id="inputState6" class="form-control select2 ajaxfilter_m maxpricedropdown_m">
									<option value="">A</option>
									<?php
									if(isset($prices)){
                                        foreach($prices as $price)
                                        { ?>
                                            <option value="<?= $price->name;?>">€ <?= number_format($price->name , 0, ',', '.');?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Transmission</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs">
							<?php
						    if(isset($transmissions)){
                                foreach($transmissions as $transmission)
                                { ?>
								    
        							<label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter_m transmissioncheckbox_m" name="<?=$transmission->name?>" value="<?=$transmission->name?>">
        								<span class="custom-control-label">
        									<?=$transmission->name?>
        								</span>
        							</label>
								<?php
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Fuel Type</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs">
							<?php
						    if(isset($fuel_types)){
                                foreach($fuel_types as $fuel_type)
                                { ?>
        							<label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter_m fueltypecheckbox_m" name="<?=$fuel_type->name?>" value="<?=$fuel_type->name?>">
        								<span class="custom-control-label">
        									<?=$fuel_type->name?>
        								</span>
        							</label>
								<?php
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Where is it </h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs collapse show" >
							<?php
						    if(isset($featured_where_is_its)){
						        $i=1;
                                foreach($featured_where_is_its as $f_where_is_it)
                                { 
                                        if ($i > 10)             //                                |
                                        {                           //                                |
                                            continue;   // Skip the remainder of this iteration. -----+
                                        }
                                
                                ?>
								    <label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter_m whereisitcheckbox" name="<?=$f_where_is_it->name?>" value="<?=$f_where_is_it->name?>">
        								<span class="custom-control-label">
        									<?=$f_where_is_it->name?>
        								</span>
        							</label>
								<?php  $i++;
                                }
                            }
                            ?>
						</div>
						
						<div class="filter-product-checkboxs collapse"  id="demo_whereisit_m">
							<?php
						    if(isset($where_is_its)){
						     //   $i = 1;
                                foreach($where_is_its as $where_is_it)
                                { 
                                    // if ($i < 11)           
                                    // {                         
                                    //     continue;   
                                    // }
                                ?>
                                    
                                    <label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter_m whereisitcheckbox" name="<?=$where_is_it->name?>" value="<?=$where_is_it->name?>">
        								<span class="custom-control-label">
        									<?=$where_is_it->name?>
        								</span>
        							</label>
								<?php 
								// $i++;
                                }
                            }
                            ?>
							
						</div>
						
						<a href="" id="show_all_whereisit_filter" style="color: #0093f5;" data-toggle="collapse" data-target="#demo_whereisit_m" class="d-flex justify-content-center align-items-center mt-4">Mostra tutte le regioni</a>
						
						
					</div>
					<!--<div class="card-footer">-->
					<!--	<a href="#" class="btn btn-secondary btn-block">Apply Filter</a>-->
					<!--</div>-->
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--<button>Hello</button>-->
</div>
<!-- End Popup filter-->
<!--listing-->

<section class="sptb-1">
	<div class="mx-4">
		<div class="row">
			<!--Left Side Content-->
			<div class="col-xl-3 col-lg-3 col-md-12">
				<div class="card d-none d-md-block d-lg-block">
					<div class="px-4 py-5 border-bottom text-center">
						<h4 class="mb-0">Select filters</h4>
					</div>
				</div>
				<div class="card d-block d-sm-none" data-toggle="modal" data-target="#filter_modal">
					<div class="px-4 py-3 border-bottom text-center clearfix">
						<h4 class="mt-2 float-left">Select filters</h4>
						<img src="<?= base_url(); ?>assets/images/icons/filter.png" class="float-right">
					</div>
				</div>
				
				<div class="card overflow-hidden d-none d-lg-block d-xl-block">
					<div class="px-4 py-3 border-bottom">
						<h4 class="mb-0">Brand</h4>
					</div>
					<div class="card-body">
						<div class="" id="container__">
						    <h5 class="mb-4" id="heading_brand">Marche più cercate</h5>
							<div class="filter-product-checkboxs brand_featured collapse show " id="democolQQ">
								<?php
							    if(isset($featured_brands)){
							        $i = 1;
							     //   $brnd = array();
							        foreach($vals as $key=>$v){
							            $brnd[] = $key;
							        }
                        				     
                                    foreach($featured_brands as $f_brand)
                                    { 
                                            if ($i > 10)             //                                |
                                            {                           //                                |
                                                continue;   // Skip the remainder of this iteration. -----+
                                            }
                                            
                                            if (in_array($f_brand->name, $brnd)){
                                                
                                                foreach($vals as $key=>$v){
                                                 
                                                          if($key == $f_brand->name ){
                                    				    
                                                ?>
                                                    
                                                            <label class="custom-control custom-checkbox mb-3">
                            									<input type="checkbox" class="fbrand custom-control-input brandcheckbox ajaxfilter" name="<?=$f_brand->name?>" value="<?=$f_brand->name?>">
                            									<span class="custom-control-label">
                            										<span class="text-dark"><?=$f_brand->name?><span class="label label-secondary float-right"><?= $v; ?></span></span>
                            									</span>
                        								    </label>
                								<?php 
                                    				       }else{ 
                                    				           
                                    				       }
                                    				       
                                                }
                                        
                                            }else{ ?>
                                                <label class="custom-control custom-checkbox mb-3">
                									<input type="checkbox" class="fbrand custom-control-input brandcheckbox ajaxfilter" name="<?=$f_brand->name?>" value="<?=$f_brand->name?>">
                									<span class="custom-control-label">
                										<span class="text-dark"><?=$f_brand->name?><span class="label label-secondary float-right">0</span></span>
                									</span>
            								    </label>
            								<?php
                                            }
                                        $i++;
                                        
                                    }
                                }
                                ?>
								
							</div>
							
							<div class="filter-product-checkboxs collapse"  id="democol">
								<?php
							    if(isset($brands)){
							        
							        foreach($vals as $key=>$v){
							            $brnds[] = $key;
							        }
							        
                                        foreach($brands as $brand)
                                        { 
                                            if (in_array($brand->name, $brnds)){
                                                
                                                foreach($vals as $key=>$v){
                                                   
                                                        if($key == $brand->name ){
                                                        ?>
                                                        
                                                        <label class="custom-control custom-checkbox mb-3">
                        									<input type="checkbox" class="custom-control-input wfbrand brandcheckbox ajaxfilter" name="<?=$brand->name?>" value="<?=$brand->name?>">
                        									<span class="custom-control-label">
                        										<span class="text-dark"><?=$brand->name?><span class="label label-secondary float-right"><?= $v ?></span></span>
                        									</span>
                    								    </label>
                    								    <?php 
                                                         }else{ 
                                                             
                                                         }
                                                }
                                            }else{ ?>
                                                <label class="custom-control custom-checkbox mb-3">
                									<input type="checkbox" class="custom-control-input wfbrand brandcheckbox ajaxfilter" name="<?=$brand->name?>" value="<?=$brand->name?>">
                									<span class="custom-control-label">
                										<span class="text-dark"><?=$brand->name?><span class="label label-secondary float-right">0</span></span>
                									</span>
            								    </label>
            								   <?php
                                            }
                                        
							            }
                                }
                                ?>
								
							</div>
							
							<a href="" id="show_all_brand_filter" style="color: #0093f5;" data-toggle="collapse" data-target="#democol" class="d-flex justify-content-center align-items-center mt-4">Mostra tutte le marche</a>
						    
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Year</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 mb-0">
								<label for="inputState1" class="col-form-label">Min</label>
								<select id="inputState1"  class="form-control select2  minyeardropdown ajaxfilter">
									<option value="">DA</option>
									<?php
    							    if(isset($years)){
                                        foreach($years as $year)
                                        { ?>
                                            <option value="<?= $year->name;?>"><?= $year->name;?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6 mb-0">
								<label for="inputState2" class="col-form-label">Max</label>
								<select id="inputState2" class="form-control select2 maxyeardropdown ajaxfilter">
									<option value="">A</option>
									<?php
    							    if(isset($years)){
                                        foreach($years as $year)
                                        { ?>
                                            <option value="<?= $year->name;?>"><?= $year->name;?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Mileage</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 mb-0">
								<label for="inputState3" class="col-form-label">Min</label>
								<select id="inputState3" class="form-control select2 minmileagedropdown ajaxfilter">
									<option value="">DA</option>
									<?php
    							    if(isset($mileages)){
                                        foreach($mileages as $mileage)
                                        { ?>
                                        <?php $mkm = ($mileage->name);?>
                                            <option value="<?= $mileage->name;?>"><?= number_format($mkm , 0, ',', '.');?> KM</option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6 mb-0">
								<label for="inputState4" class="col-form-label">Max</label>
								<select id="inputState4" class="form-control select2 maxmileagedropdown ajaxfilter">
									<option value="">A</option>
									<?php
    							    if(isset($mileages)){
                                        foreach($mileages as $mileage)
                                        { ?>
                                        <?php $mkm = ($mileage->name);?>
                                        
                                            <option value="<?= $mileage->name;?>"> <?= number_format($mkm , 0, ',', '.');?> KM</option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Body Type</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs">
							<?php
						    if(isset($body_types)){
                                foreach($body_types as $body_type)
                                { ?>
								    <label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter bodytypecheckbox" name="<?=$body_type->name?>" value="<?=$body_type->name?>">
        								<span class="custom-control-label">
        									<?=$body_type->name?>
        								</span>
        							</label>
								<?php
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Price Range</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 mb-0">
								<label for="inputState5" class="col-form-label">Min</label>
								<select id="inputState5" class="form-control select2 ajaxfilter minpricedropdown">
									<option value="">DA</option>
									<?php
    							    if(isset($prices)){
                                        foreach($prices as $price)
                                        { ?>
                                            <option value="<?= $price->name;?>">€ <?= number_format($price->name , 0, ',', '.');?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6 mb-0">
								<label for="inputState6" class="col-form-label">Max</label>
								<select id="inputState6" class="form-control select2 ajaxfilter maxpricedropdown">
									<option value="">A</option>
									<?php
									if(isset($prices)){
                                        foreach($prices as $price)
                                        { ?>
                                            <option value="<?= $price->name;?>">€ <?= number_format($price->name , 0, ',', '.');?></option>
        								<?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Transmission</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs">
							<?php
						    if(isset($transmissions)){
                                foreach($transmissions as $transmission)
                                { ?>
								    
        							<label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter transmissioncheckbox" name="<?=$transmission->name?>" value="<?=$transmission->name?>">
        								<span class="custom-control-label">
        									<?=$transmission->name?>
        								</span>
        							</label>
								<?php
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Fuel Type</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs">
							<?php
						    if(isset($fuel_types)){
                                foreach($fuel_types as $fuel_type)
                                { ?>
        							<label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter fueltypecheckbox" name="<?=$fuel_type->name?>" value="<?=$fuel_type->name?>">
        								<span class="custom-control-label">
        									<?=$fuel_type->name?>
        								</span>
        							</label>
								<?php
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="px-4 py-3 border-bottom border-top">
						<h4 class="mb-0">Where is it</h4>
					</div>
					<div class="card-body">
						<div class="filter-product-checkboxs collapse show" >
							<?php
						    if(isset($featured_where_is_its)){
						        $i=1;
                                foreach($featured_where_is_its as $f_where_is_it)
                                { 
                                        if ($i > 10)             //                                |
                                        {                           //                                |
                                            continue;   // Skip the remainder of this iteration. -----+
                                        }
                                
                                ?>
								    <label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter whereisitcheckbox" name="<?=$f_where_is_it->name?>" value="<?=$f_where_is_it->name?>">
        								<span class="custom-control-label">
        									<?=$f_where_is_it->name?>
        								</span>
        							</label>
								<?php  $i++;
                                }
                            }
                            ?>
						</div>
						
						<div class="filter-product-checkboxs collapse"  id="demo_whereisit">
							<?php
						    if(isset($where_is_its)){
						     //   $i = 1;
                                foreach($where_is_its as $where_is_it)
                                { 
                                    // if ($i < 11)           
                                    // {                         
                                    //     continue;   
                                    // }
                                ?>
                                    
                                    <label class="custom-control custom-checkbox mb-2">
        								<input type="checkbox" class="custom-control-input ajaxfilter whereisitcheckbox" name="<?=$where_is_it->name?>" value="<?=$where_is_it->name?>">
        								<span class="custom-control-label">
        									<?=$where_is_it->name?>
        								</span>
        							</label>
								<?php 
								// $i++;
                                }
                            }
                            ?>
							
						</div>
						
						<a href="" id="show_all_whereisit_filter" style="color: #0093f5;" data-toggle="collapse" data-target="#demo_whereisit" class="d-flex justify-content-center align-items-center mt-4">Mostra tutte le regioni</a>
						
						
					</div>
					<!--<div class="card-footer">-->
					<!--	<a href="#" class="btn btn-secondary btn-block">Apply Filter</a>-->
					<!--</div>-->
				</div>
			</div>
			<!--/Left Side Content-->

			<div class="col-xl-9 col-lg-9 col-md-12">
				<!--Lists-->
				<div class="auction-list mb-0">
					<div class="item2-gl">
						<div class="bg-white row align-items-center p-4">
							<div class="col-xl-5 col-lg-5 col-12">
								<div class="input-group">
								    
									<input type="text" class="form-control br-tl-3 br-bl-3" name="Search_car_brand" id="Search_car_brand" placeholder="Search for car (ex. BMV etc..)">
									<div class="input-group-append ">
										<button type="button" id="Search_car"  class="btn btn-primary br-tr-3  br-br-3">
											Search
										</button>
									</div>
								</div>
							</div>
							<div class="col-xl-7 col-lg-7 col-12">
								<label class="mr-2 mt-2 mb-sm-1">Sort By:</label>
								<div class="selectgroup">
									<label class="selectgroup-item mb-md-0">
										<input type="radio" id="search_ending_soon_" name="sortByauction" value="endtime" class="ajaxfilter selectgroup-input" checked>
										<span class="selectgroup-button">Ending soon</span>
									</label>
									<label class="selectgroup-item mb-md-0">
										<input type="radio" id="search_lowest_price__" name="sortByauction" value="price" class="ajaxfilter selectgroup-input">
										<span class="selectgroup-button">Lowest price</span>
									</label>
									<label class="selectgroup-item mb-0">
										<input type="radio" id="search_lowest_mileage_" name="sortByauction" value="mileage" class="ajaxfilter selectgroup-input">
										<span class="selectgroup-button">Lowest mileage</span>
									</label>
								</div>
							</div>
						</div>
						
						<div class="mt-5">
						    
							<div class="row" id="auc_listing">
							    
								<?php
                                    if(!empty($all_auctions)){
                                    foreach($all_auctions as $auction){
                                        
                                      
                                ?>
                                
                               <?php
 
                                  // Declare and define two dates
                                  $date1 = strtotime($auction->auction_time);
                                  $date2 = strtotime($auction->end_auction_time);
                                 
                                  // Formulate the Difference between two dates
                                  $diff = abs($date2 - $date1);
                                 
                                  // To get the year divide the resultant date into
                                  // total seconds in a year (365*60*60*24)
                                  $years = floor($diff / (365*60*60*24));
                                  
                                 
                                 
                                  // To get the month, subtract it with years and
                                  // divide the resultant date into
                                  // total seconds in a month (30*60*60*24)
                                  $months = floor(($diff - $years * 365*60*60*24)
                                                               / (30*60*60*24));
                                
                                 
                                  // To get the day, subtract it with years and
                                  // months and divide the resultant date into
                                  // total seconds in a days (60*60*24)
                                  $days = floor(($diff - $years * 365*60*60*24 -
                                               $months*30*60*60*24)/ (60*60*24));
                                 
                                 
                                  // To get the hour, subtract it with years,
                                  // months & seconds and divide the resultant
                                  // date into total seconds in a hours (60*60)
                                  $hours = floor(($diff - $years * 365*60*60*24
                                         - $months*30*60*60*24 - $days*60*60*24)
                                                                     / (60*60));
                                 
                                  // To get the minutes, subtract it with years,
                                  // months, seconds and hours and divide the
                                  // resultant date into total seconds i.e. 60
                                  $minutes = floor(($diff - $years * 365*60*60*24
                                           - $months*30*60*60*24 - $days*60*60*24
                                                            - $hours*60*60)/ 60);
                                 
                                  // To get the minutes, subtract it with years,
                                  // months, seconds, hours and minutes
                                  $seconds = floor(($diff - $years * 365*60*60*24
                                           - $months*30*60*60*24 - $days*60*60*24
                                                  - $hours*60*60 - $minutes*60));
                                 
                                ?>
                                 
								<div data-timer="<?=$auction->end_auction_time?>" data-id="demo<?=$auction->id;?>" class="countdownpp col-lg-4 col-md-4 col-xl-4">
									<div class="card overflow-hidden">
										<div class="item-card9-img auction-list-img-box">
											<a href="<?php echo base_url('Website/auction_details/'.$auction->id)?>">
											<div class="item-card7-imgs auction-img-box">
											    <?php
                                                    if(!empty($all_main_images)){
                                                    foreach($all_main_images as $allmainimage){
                                                ?>
                                                <?php if(($allmainimage->car_auction_id) == ($auction->id) ){ ?> 
												<img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $allmainimage->media; ?>" alt="img" class="cover-image">
												<?php } ?>
												<?php } } ?>
												<div class="item-card7-overlaytext counting-timer" >
													
													<span id="demo<?=$auction->id;?>"  value='<?php echo $auction->end_auction_time;?>' style="width: 100% !important; background: none;" ></span>
               
												</div>
												<div class="item-tag min-width-116 max-width-120">
												    
												    <?php
		                            				if(!empty($auction_id_latestoffer)){
		                            					$array_auc_id = array();
		                            					foreach($auction_id_latestoffer as $auctionid_latestoffer){

		                            						$array_auc_id[] = $auctionid_latestoffer['auction_id'];

		                            						

																if($auctionid_latestoffer['auction_id'] == $auction->id){ 

																	if($auctionid_latestoffer['current_offer'] !=  0 ){

																	?>

																	    <h4 class="mb-0 d-flex justify-content-center align-items-center">€ <?= number_format($auctionid_latestoffer['current_offer'] , 0, ',', '.'); ?></h4>
																	<?php }else{ ?>

																	    <h4 class="mb-0 d-flex justify-content-center align-items-center">€ <?= number_format($auction->base_price , 0, ',', '.');?></h4>


																	<?php }?>
		                            							<?php }else{

		                            							}

		                            					}
		                            					
		                            				}else{ ?>

		                            					<h4 class="mb-0 d-flex justify-content-center align-items-center">€ <?= number_format($auction->base_price , 0, ',', '.');?></h4>

		                            				<?php } ?>
												    
												    
												    
												    
													<!--<h4 class="mb-0 d-flex justify-content-center align-items-center">€ <?= number_format($auction->base_price , 0, ',', '.');?></h4>-->
												</div>
											  
											</div>
											</a>
											<div class="item-card9-icons" data-id="<?= $auction->id; ?>">
											    <?php 
											    if(!empty($all_favorite)){
    											    foreach($all_favorite as $value){
    											        $array[] = $value->car_auction_id;
    											    }
    											     
    											    if (in_array($auction->id, $array)){  ?>
    											    
													<div class="rating-stars-container">
        
														<div data-id="<?= $auction->id; ?>" class="rating-star sm">
				 
															<a class="deletefavoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" ></i></a>
															<!-- <a id="favid<?=$auction->id;?>"   style="color:white; background-color:red;" class="item-card9-icons1 deletefavoritebtn"> <i class="far fa-heart"></i></a> -->

														</div>
				
													</div>
    												<?php }else{ ?>
    												<!-- <a id="favid<?=$auction->id;?>"  style="color:white; background: #080e1b;"  class="item-card9-icons1 favoritebtn"> <i class="far fa-heart"></i></a> -->
													<div class="rating-stars-container">
        
														<div data-id="<?= $auction->id; ?>" class="rating-star sm">
				
															<a class="favoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" ></i></a>
				
														</div>
				
													</div>
    												<?php } ?>
    											<?php }else{  ?>
    											    <!-- <a id="favid<?=$auction->id;?>"  style="color:white; background: #080e1b;"  class="item-card9-icons1 favoritebtn"> <i class="far fa-heart"></i></a> -->
													<div class="rating-stars-container">
        
														<div data-id="<?= $auction->id; ?>" class="rating-star sm">
				
															<a class="favoritebtn" id="favid<?=$auction->id;?>"><i class="fa fa-heart fs-24 pointer" style="color:black;"></i></a>
				
														</div>
				
													</div>
    											<?php } ?>
											</div>
										</div>
										<a href="<?php echo base_url('Website/auction_details/'.$auction->id)?>" class="text-dark">
											<div class="card border-0 mb-0">
												<div class="card-body pt-6">
													<div class="item-card9 text-left mb-3">
														<h3 class="font-weight-semibold mt-1 auction-slider-title fs-20"><?= strtoupper($auction->brand); ?> <?= strtoupper($auction->model); ?></h3>
														<p class="mb-0 leading-tight h-36"><?= $auction->engine_power; ?> <?= $auction->fuel_type; ?></p>
													</div>
													<div class="item-card9-footer d-sm-flex">
														<div class="text-left clearfix w-100">
															<span class="mt-1 mb-1 float-left mr-6" title="FuealType"><i class="fas fa-tachometer-alt fa-2x text-muted mr-1"></i><h6 class="mt-3"><?= number_format($auction->mileage , 0, ',', '.');?> Km</h6></span>
															<span class="mt-1 mb-1 float-left" title="Kilometrs"><i class="fas fa-calendar fa-2x text-muted mr-1 "></i><h6 class="mt-3"><?= $auction->registration_date; ?></h6></span>
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								
                               
								<?php
                                            
                                        }
                                    }
                                ?>
                                
                                <?php
                                    if(!empty($all_auctions)){
                                ?>
                                
                                <div class="row col-12 mt-5 justify-content-center">     
                                 <p><?php echo $links; ?></p>
            					<!--<div class="center-block text-center ">-->
            					<!--	<ul class="pagination mb-3">-->
            					<!--		<li class="page-item page-prev disabled">-->
            					<!--			<a class="page-link" href="#" tabindex="-1">Prev</a>-->
            					<!--		</li>-->
            					<!--		<li class="page-item active"><a class="page-link" href="#">1</a></li>-->
            					<!--		<li class="page-item"><a class="page-link" href="#">2</a></li>-->
            					<!--		<li class="page-item"><a class="page-link" href="#">3</a></li>-->
            					<!--		<li class="page-item page-next">-->
            					<!--			<a class="page-link" href="#">Next</a>-->
            					<!--		</li>-->
            					<!--	</ul>-->
            					<!--</div>-->
            					</div> 
            					<?php  } ?>
					
							</div>
						</div>
					</div>
					
					
				</div>
				<!--/Lists-->
			</div>
		</div>
	</div>
</section>

<!--/Listing-->
<?php
    if(!empty($all_auctions)){
    foreach($all_auctions as $auction){
?>
<script>

function myFunctionyy(){ alert("sss");
// Set the date we're counting down to
    var countDownDate = new Date("Jan 22, 2022 15:37:25").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
}
</script>
<?php
        }
    }
?>

