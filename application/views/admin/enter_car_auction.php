<style>
    .custom-file-input{
        margin-top: 15px !important;
        margin-left: 5px !important;
    }
</style>
<div class="side-app">
 
    <?php if($this->uri->segment(3)){
         $auc_id = $this->uri->segment(3);
         
    }?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="item2-gl">
                        <div class="item2-gl-nav clearfix mb-4">
                            <h3 class="float-left bg-primary text-white mb-0 fs-18 px-4 py-2 rounded">Enter and describe the next car to be auctioned</h3>
                        </div>
                        <?php
                            if(empty($single_auction_details)){   
                        ?>
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/store_auction_car', $attributes); 
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card m-b-20 main-data-card">
                                    <div class="card-header justify-content-center px-2 py-4">
                                        <h3 class="mb-0 text-center card-active-btn w-30 text-uppercase font-weight-normal">insert main car data</h3>
                                    </div>
                                    <div class="card-body">
                                        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="brand">Brand</label>
                                                    
                                                        <select id="brand" name="brand" class="form-control custom-select select2" >
                                                            <?php foreach($brands as $brand){ ?>
                                                            <option <?php echo set_select('brand',  $brand->name); ?> value="<?php echo $brand->name; ?>"><?=$brand->name;?></option>
                                                            
                                                            <?php } ?>
                                                        </select>
                                                    <div class="error text-danger mt-2"><?php echo form_error('brand'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="model">Model</label>
                                                        <input type="text" class="form-control" id="model" name="model" value="<?php echo set_value('model', $this->session->userdata('model')); ?>" placeholder="Insert the Model Name">
                                                        <div class="error text-danger mt-2"><?php echo form_error('model'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="mileage">Mileage</label>
                                                    <input type="number" min="0" class="form-control" id="mileage" name="mileage" value="<?php echo set_value('mileage', $this->session->userdata('mileage')); ?>" placeholder="Insert the mileage (KM)">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('mileage'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="body_style">Body Style</label>
                                                
                                                    <select name="body_style" id="body_style" class="form-control custom-select select2">
                                                        <?php foreach($body_types as $body_style){ ?>
                                                        <option <?php echo set_select('body_style',  $body_style->name); ?> value="<?php echo $body_style->name; ?>"><?=$body_style->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                        
                                                    
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('body_style'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="engine_power">Engine / Power</label>
                                                    <input type="text" name="engine_power" class="form-control" id="engine_power" value="<?php echo set_value('engine_power', $this->session->userdata('engine_power')); ?>" placeholder="Insert Engine / Power">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('engine_power'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="transmission">Choose Transmission</label>
                                                    <select name="transmission" id="transmission" class="form-control custom-select select2">
                                                        <?php foreach($transmissions as $transmission){ ?>
                                                        <option <?php echo set_select('transmission',  $transmission->name); ?> value="<?php echo $transmission->name; ?>"><?=$transmission->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('transmission'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="fuel_type">Fuel Type</label>
                                                    <select id="fuel_type"  name="fuel_type" class="form-control custom-select select2">
                                                        <?php foreach($fuel_types as $fuel_type){ ?>
                                                        <option <?php echo set_select('fuel_type',  $fuel_type->name); ?> value="<?php echo $fuel_type->name; ?>"><?=$fuel_type->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('fuel_type'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="external_color">External color</label>
                                                    <input type="text" name="external_color" class="form-control" id="external_color" value="<?php echo set_value('external_color', $this->session->userdata('external_color')); ?>" placeholder="Insert the color">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('external_color'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="internal_color">Interior color</label>
                                                    <input type="text" name="internal_color" class="form-control" id="internal_color" value="<?php echo set_value('internal_color', $this->session->userdata('internal_color')); ?>" placeholder="Insert material and color">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('internal_color'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="registration_date">Registration date</label>
                                                    <input type="date" name="registration_date" max="" class="form-control" id="registration_date" value="<?php echo set_value('registration_date', $this->session->userdata('registration_date')); ?>" placeholder="Insert the date">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('registration_date'); ?></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="previous_owner_no" class="col-form-label">Previous owners Number</label>
                                                    <input type="number" min="0" name="previous_owner_no" class="form-control" id="previous_owner_no" value="<?php echo set_value('previous_owner_no', $this->session->userdata('previous_owner_no')); ?>" placeholder="Insert the number">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('previous_owner_no'); ?></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="where_is_it" class="col-form-label">Where is it</label>
                                                    <select id="where_is_it" name="where_is_it" class="form-control custom-select select2" >
                                                        <?php foreach($where_is_its as $where_is_it){ ?>
                                                        <option <?php echo set_select('where_is_it',  $where_is_it->name); ?> value="<?php echo $where_is_it->name; ?>"><?=$where_is_it->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                        
                                                    <!--<input type="text" name="where_is_it" class="form-control" id="where_is_it" value="<?php echo set_value('where_is_it', $this->session->userdata('where_is_it')); ?>" placeholder="Insert the region">-->
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('where_is_it'); ?></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="sales_person" class="col-form-label">Salesperson</label>
                                                    <input type="text" name="sales_person" class="form-control" id="sales_person" value="<?php echo set_value('sales_person', $this->session->userdata('sales_person')); ?>" placeholder="Insert the type of seller">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('sales_person'); ?></div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit_entercar" class="btn btn-primary ">Add Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                        
                        <?php
                            }
                            else{            
                            foreach($single_auction_details as $auction_details){
                        ?>
                        
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/store_auction_car', $attributes); 
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card m-b-20 main-data-card">
                                    <div class="card-header justify-content-center px-2 py-4">
                                        <h3 class="mb-0 text-center card-active-btn w-30 text-uppercase font-weight-normal">insert main car data</h3>
                                    </div>
                                    <div class="card-body">
                                        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="brand">Brand</label>
                                                    
                                                    <select id="brand" name="brand" class="form-control custom-select select2" >
                                                        <?php foreach($brands as $brand){ ?>
                                                        <option <?php echo set_select('brand',  $brand->name); ?> value="<?php echo $brand->name; ?>" <?php if($brand->name == $auction_details->brand) echo 'selected="selected"'; ?>><?=$brand->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('brand'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="model">Model</label>
                                                        <input type="text" class="form-control" id="model" name="model" value="<?php echo $auction_details->model; ?>" placeholder="Insert the Model Name">
                                                        <div class="error text-danger mt-2" style="color:red"><?php echo form_error('model'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="mileage">Mileage</label>
                                                    <input type="number" min="0" class="form-control" id="mileage" name="mileage" value="<?php echo $auction_details->mileage; ?>" placeholder="Insert the mileage (KM)">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('mileage'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="body_style">Body Style</label>
                                                    <select name="body_style" id="body_style" class="form-control custom-select select2">
                                                        <?php foreach($body_types as $body_style){ ?>
                                                        <option <?php echo set_select('body_style',  $body_style->name); ?> value="<?php echo $body_style->name; ?>" <?php if($body_style->name == $auction_details->body_style) echo 'selected="selected"'; ?>><?=$body_style->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('body_style'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="engine_power">Engine / Power</label>
                                                    <input type="text" name="engine_power" class="form-control" id="engine_power" value="<?php echo $auction_details->engine_power; ?>" placeholder="Insert Engine / Power">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('engine_power'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="transmission">Choose Transmission</label>
                                                    <select name="transmission" id="transmission" class="form-control custom-select select2">
                                                        <?php foreach($transmissions as $transmission){ ?>
                                                        <option <?php echo set_select('transmission',  $transmission->name); ?> value="<?php echo $transmission->name; ?>" <?php if($transmission->name == $auction_details->transmission) echo 'selected="selected"'; ?>><?=$transmission->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('transmission'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="fuel_type">Fuel Type</label>
                                                    <select id="fuel_type"  name="fuel_type" class="form-control custom-select select2">
                                                        <?php foreach($fuel_types as $fuel_type){ ?>
                                                        <option <?php echo set_select('fuel_type',  $fuel_type->name); ?> value="<?php echo $fuel_type->name; ?>" <?php if($fuel_type->name == $auction_details->fuel_type) echo 'selected="selected"'; ?>><?=$fuel_type->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('fuel_type'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="external_color">External color</label>
                                                    <input type="text" name="external_color" class="form-control" id="external_color" value="<?php echo $auction_details->external_color; ?>" placeholder="Insert the color">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('external_color'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="internal_color">Interior color</label>
                                                    <input type="text" name="internal_color" class="form-control" id="internal_color" value="<?php echo $auction_details->internal_color; ?>" placeholder="Insert material and color">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('internal_color'); ?></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="registration_date">Registration date</label>
                                                    <input type="date" name="registration_date" max="" class="form-control" id="registration_date" value="<?php echo $auction_details->registration_date; ?>" placeholder="Insert the date">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('registration_date'); ?></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="previous_owner_no" class="col-form-label">Previous owners Number</label>
                                                    <input type="number" min="0"  name="previous_owner_no" class="form-control" id="previous_owner_no" value="<?php echo $auction_details->previous_owner_no; ?>" placeholder="Insert the number">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('previous_owner_no'); ?></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="where_is_it" class="col-form-label">Where is it</label>
                                                    <select id="where_is_it" name="where_is_it" class="form-control custom-select select2" >
                                                        <?php foreach($where_is_its as $where_is_it){ ?>
                                                        <option <?php echo set_select('where_is_it',  $where_is_it->name); ?> value="<?php echo $where_is_it->name; ?>" <?php if($where_is_it->name == $auction_details->where_is_it) echo 'selected="selected"'; ?>><?=$where_is_it->name;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <!--<input type="text" name="where_is_it" class="form-control" id="where_is_it" value="<?php echo $auction_details->where_is_it; ?>" placeholder="Insert the region">-->
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('where_is_it'); ?></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="sales_person" class="col-form-label">Salesperson</label>
                                                    <input type="text" name="sales_person" class="form-control" id="sales_person" value="<?php echo $auction_details->sales_person; ?>" placeholder="Insert the type of seller">
                                                    <div class="error text-danger mt-2" style="color:red"><?php echo form_error('sales_person'); ?></div>
                                                </div>
                                            </div>
                                            <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                            <button type="submit" name="submit_entercar" class="btn btn-primary ">Update Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php  if(isset($auc_id)){
            if(!empty($auc_id)){
    ?>
    <div class="row" id="image_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Insert Photos</h2> 
                        </div>
                        <div class="row mb-5">
                            
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($auction_media_exterior)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-model-my">
                                    <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Car Exterior Photo</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-model-my">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_media_exterior);?> Images.<br> Click to see preview.</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Car Exterior Photo +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('external_photo'); ?></div>
                                
                                <div class="modal fade" id="enter-auction-model-my" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg col-4">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Car Exterior Photo</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_exterior_auction_car', $attributes); 
                                        ?>
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                               <span id="ex_ratio_error" class="text-danger"></span>
                                               <?php
                                                    if(!empty($auction_media_exterior)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($auction_media_exterior as $media_exterior){
                                                ?>
                                                 <div class="preview-img">
                                                    <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_exterior->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_exterior->id; ?>/<?= $media_exterior->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="my-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                          <div class="custom-file">
                                                             <input type="file" id="external_photo" class="custom-file-input external_photo" name="external_photo[]" onchange="preview_image();" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp" required>
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-new" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span class="text-danger">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                        </div>
                                        <?php echo form_close(); ?>
                                     </div>
                                  </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($auction_media_interior)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-interior-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Car Interior Photo</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-interior-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_media_interior);?> Images.<br> Click to see preview.</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Car Interior Photo +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('interior_photo'); ?></div>
                                
                                <div class="modal fade" id="enter-auction-interior-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg col-4">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Car Interior Photo</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_interior_auction_car', $attributes); 
                                        ?>
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                         
                                               <span id="in_ratio_error" style="color:red"></span>
                                               <?php
                                                    if(!empty($auction_media_interior)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($auction_media_interior as $media_interior){
                                                ?>
                                                  
                                                 <div class="preview-img">
                                                    <?php if(!empty($media_interior)){ ?>
                                                    <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_interior->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_interior->id; ?>/<?= $media_exterior->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                    <?php } ?>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="inter-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                          <div class="custom-file">
                                                             <input type="file" id="interior_photo" class="interior_photo custom-file-input" name="interior_photo[]" onchange="preview_image_internal();" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp" required>
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-inter" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                        </div>
                                        <?php echo form_close(); ?>
                                     </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($auction_media_document)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-documents-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Car Documents Photo</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-documents-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_media_document);?> Images.<br> Click to see preview.</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Car Documents Photo +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('document_photo'); ?></div>
                                <div class="modal fade" id="enter-auction-documents-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg col-4">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Car Documents Photo</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_document_auction_car', $attributes); 
                                        ?>
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                            <span id="doc_ratio_error" style="color:red"></span>
                                               <?php
                                                    if(!empty($auction_media_document)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($auction_media_document as $media_document){
                                                ?>
                                                  
                                                 <div class="preview-img">
                                                    <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_document->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_document->id; ?>/<?= $media_document->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="document-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="document_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="documents_photo" class="documents_photo custom-file-input" name="documents_photo[]" onchange="preview_image_document();" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp" required>
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-document" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                          
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           
                                        </div>
                                        <?php echo form_close(); ?>
                                     </div>
                                  </div>
                                </div>
                            </div>
                  
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($auction_media_engine)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-engine-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Photo Engine</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-engine-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_media_engine);?> Images.<br> Click to see preview.</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Photo Engine +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('engine_photo'); ?></div>
                                
                                <div class="modal fade" id="enter-auction-engine-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg col-4">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Photo Engine</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_engine_auction_car', $attributes); 
                                        ?>
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                           
                                               <span id="eng_ratio_error" style="color:red"></span>
                                               <?php
                                                    if(!empty($auction_media_engine)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($auction_media_engine as $media_engine){
                                                ?>
                                                  
                                                 <div class="preview-img">
                                                    <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_engine->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_engine->id; ?>/<?= $media_engine->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="engine-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="engine_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="engine_photo" class="engine_photo custom-file-input" name="engine_photo[]" onchange="preview_image_engine();" accept="image/png, image/gif, image/jpeg, image/webp" multiple="multiple" required>
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-engine" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                          
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           
                                        </div>
                                        <?php echo form_close(); ?>
                                     </div>
                                  </div>
                                </div>
                            </div>
                                                           
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($auction_media_transmission)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-transmission-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Engine and transmission</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-transmission-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_media_transmission);?> Images.<br> Click to see preview.</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Engine and transmission +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('transmission_photo'); ?></div>
                                <div class="modal fade" id="enter-auction-transmission-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg col-4">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Engine and transmission</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_transmission_auction_car', $attributes); 
                                        ?>
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                           
                                               <span id="tran_ratio_error" style="color:red"></span>
                                               <?php
                                                    if(!empty($auction_media_transmission)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($auction_media_transmission as $media_transmission){
                                                ?>
                                                  
                                                 <div class="preview-img">
                                                    <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_transmission->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_transmission->id; ?>/<?= $media_transmission->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="transmission-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="transmission_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="transmission_photo" class="transmission_photo custom-file-input" name="transmission_photo[]" onchange="preview_image_transmission();" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp" required>
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-transmission" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                          
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           
                                        </div>
                                        <?php echo form_close(); ?>
                                     </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($auction_media_roof)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-roof-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Roof of the body</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-auction-roof-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_media_roof);?> Images.<br> Click to see preview.</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Roof of the body +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('roof_photo'); ?></div>
                                
                                <div class="modal fade" id="enter-auction-roof-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg col-4">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Roof of the body</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_roof_auction_car', $attributes); 
                                        ?>
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                           
                                               <span id="roof_ratio_error" style="color:red"></span>
                                               <?php
                                                    if(!empty($auction_media_roof)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($auction_media_roof as $media_roof){
                                                ?>
                                                  
                                                 <div class="preview-img">
                                                    <img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_roof->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_roof->id; ?>/<?= $media_roof->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="roof-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="roof_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="roof_photo" class="roof_photo custom-file-input" name="roof_photo[]" onchange="preview_image_roof();" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp" required>
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-roof" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                          
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           
                                        </div>
                                        <?php echo form_close(); ?>
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
   
    <div class="row" id="equip_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Equipment and options</h2> 
                        </div>
                        <div class="w-90 m-auto Equipment-bg">
                            <div id="wwwww" class="w-100  row">
                                
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/update_equip_auction_car', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('equip_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("equip_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('equip_success')){
                                        echo '<div class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("equip_success")  
                                                .'</div>';
                                    }
                                ?>
                                
                                
                                <?php
                                $equipment = [];
                                    if(isset($single_auction_details)){
                                        foreach($single_auction_details as $single_details){
                                            
                                            $equipmentww = explode(",",$single_details->equipment_options);
                                           
                                        }
                                    }
                                    
                                    if(!empty($equipments)){
                                    $equipments = array_chunk($equipments, 2);
                                    
                                    foreach($equipments as $equip){
                                        
                                     
                                ?>
                                
                                <div class="row">                           
                                    <div class="col-md-6 mb-5">
                                        <div class="search-data d-flex align-items-center">
                                            <div class="form-group m-0 d-flex justify-content-center align-items-center">
                                                <label class="custom-control custom-checkbox mb-0">
                                                    <input type="checkbox" class="custom-control-input radio" name="equipment_options[]" value="<?php if(!empty($equip[0])){ echo $equip[0]->id; }?>" <?php if(!empty($equipmentww)){ if (in_array($equip[0]->id, $equipmentww)){ echo 'checked="checked"'; } } ?>>
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            <h2 class="fs-18 text-dark m-0 ml-2"><?php if(!empty($equip[0])){ echo $equip[0]->name; } ?></h2>
                                        </div>
                                    </div>
                                    <?php if(!empty($equip[1])){ ?>
                                    <div class="col-md-6 mb-5">
                                        <div class="search-data d-flex align-items-center">
                                            <div class="form-group m-0 d-flex justify-content-center align-items-center">
                                                <label class="custom-control custom-checkbox mb-0">
                                                    <input type="checkbox" class="custom-control-input radio" name="equipment_options[]" value="<?= $equip[1]->id; ?>" <?php if(!empty($equipmentww)){ if (in_array($equip[1]->id, $equipmentww)){ echo 'checked="checked"';} } ?>>
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            <h2 class="fs-18 text-dark m-0 ml-2"><?= $equip[1]->name; ?></h2>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div> 
                                
                                
                                
                                <?php 
                                    }
                                    }
                                ?>
                                
                                <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                                ?>
                                <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                    
                                <?php } } ?>
                                         
                                <div class="w-100 m-auto row justify-content-center">
                                    <div class="col-md-6">
                                       <button type="submit" id="submit_equipment" class="w-100  mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                    </div>
                                </div>
                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('equipment_options'); ?></span>
                                <?php echo form_close(); ?>
                                
                                
                                <div class="w-100 m-auto">
                                    <div id="equipment_form">
                                        <div class="form-group mb-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="equip_name"  name="equip_name" placeholder="Add more equipments...">
                                                <span class="input-group-append">
                                                    <button id="equip_store" class="btn bg-dark-blue text-white" type="button">Add <i class="fas fa-paper-plane text-white pl-2"></i></button>
                                                </span>
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
    <div class="row" id="cou_history_section">
        <div class="col-md-12">
            <div class="card" >
                
                <div class="card-body">
                    <div class="item2-gl">
                       
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">History of coupons performed</h2> 
                        </div>
                        
                        <?php if(!empty($coupon_details)){
                                foreach($coupon_details as $cou_detail){
                        ?>
                        
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_coupon_auction_car', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('cou_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("cou_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('cou_success')){
                                        echo '<div  class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("cou_success")  
                                                .'</div>';
                                    }
                                ?>
                                <div class="row align-items-center mb-7">
                                    <div class="col-md-8">
                                        <div class="service-booklet-inputs">
                                            <div class="form-group mb-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="service_booklet_details">Service Booklet Details</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="service_booklet_details" name="service_booklet_details" value="<?= $cou_detail->service_booklet_details; ?>" placeholder="Write if available">
                                                    </div>
                                                </div>
                                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('service_booklet_details'); ?></span>
                                            </div>
                                            <div class="form-group mb-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="history_appointments">Historical appointments</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="history_appointments" name="history_appointments" value="<?= $cou_detail->history_appointments; ?>" placeholder="Write if complete">
                                                    </div>
                                                </div>
                                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('history_appointments'); ?></span>
                                            </div>
                                            <div class="form-group mb-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="last_service_date">Last service date</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="date" max="" class="form-control" id="last_service_date" name="last_service_date" value="<?= $cou_detail->last_service_date; ?>" placeholder="Write the date">
                                                    </div>
                                                </div>
                                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('last_service_date'); ?></span>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="mileage_last_service">Mileage last service</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="mileage_last_service" name="mileage_last_service" value="<?= $cou_detail->mileage_last_service; ?>" placeholder="Write the mileage">
                                                    </div>
                                                </div>
                                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('mileage_last_service'); ?></span>
                                            </div>
                                            
                                            <input type="text" class="form-control" id="coupon_id" name="coupon_id" value="<?= $cou_detail->id; ?>" hidden>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <span class="error text-danger mt-2" style="color:red"><?php echo form_error('coupon_photo'); ?></span> 
                                        <div class="h-290">
                                           <?php
                                                if(!empty($coupon_media)){
                                                
                                            ?>
                                          <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                            <?php
                                                
                                                foreach($coupon_media as $coup_media){
                                            ?>
                                              
                                             <div class="preview-img">
                                                <img src="<?= base_url(); ?>uploads/auction_car/coupon_image/<?= $coup_media->media; ?>" alt="">
                                                <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_coupon_media/<?= $coup_media->id; ?>/<?= $auc_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                             </div>
                                             
                                            <?php }  ?> 
                                             
                                          </div>
                                          <?php } ?> 
                                          <div class="d-flex justify-content-center">
                                             <div class="control-group" id="fields">
                                                <div class="coupon-controls">
                                                   <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                       
                                                      <!--<div class="show-preview">-->
                                                      <!--   <div id="coupon_image_preview"></div>-->
                                                      <!--</div>-->
                                                      
                                                      <div class="custom-file">
                                                         <input type="file" id="coupon_photo" class="custom-file-input" name="coupon_photo[]" onchange="preview_image_coupon();" accept="image/png, image/gif, image/jpeg, image/webp" multiple="multiple">
                                                         <label class="custom-file-label text-left"></label>
                                                      </div>
                                                      
                                                      <button class="btn btn-success rounded btn-add-coupon" type="button">  
                                                      <i class="fa fa-plus"> </i>  
                                                      </button> 
                                                      
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                                           
                                        
                                    </div>
                                </div>
                                <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                                  ?>
                                    <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                        
                                <?php } } ?>
                                                 
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                       <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                    </div>
                                </div>
                                
                                <?php echo form_close(); ?>
                        
                        
                        <?php } }else{ ?>
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_coupon_auction_car', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('cou_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('cou_success')){
                                        echo '<div class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("success")  
                                                .'</div>';
                                    }
                                ?>
                                <div class="row align-items-center mb-7">
                                    <div class="col-md-8">
                                        <div class="service-booklet-inputs">
                                            <div class="form-group mb-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="service_booklet_details">Service Booklet Details</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="service_booklet_details" name="service_booklet_details" placeholder="Write if available">
                                                    </div>
                                                </div>
                                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('service_booklet_details'); ?></div>
                                            </div>
                                            <div class="form-group mb-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="history_appointments">Historical appointments</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="history_appointments" name="history_appointments" placeholder="Write if complete">
                                                    </div>
                                                </div>
                                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('history_appointments'); ?></div>
                                            </div>
                                            <div class="form-group mb-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="last_service_date">Last service date</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="date" max="" class="form-control" id="last_service_date" name="last_service_date" placeholder="Write the date">
                                                    </div>
                                                </div>
                                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('last_service_date'); ?></div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="mileage_last_service">Mileage last service</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="mileage_last_service" name="mileage_last_service" placeholder="Write the mileage">
                                                    </div>
                                                </div>
                                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('mileage_last_service'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <div class="error text-danger mt-2" style="color:red"><?php echo form_error('coupon_photo'); ?></div>
                                        <div class="h-290">
                                            <h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3">Upload Photos Service booklet</h3>
                                            <img style="display:flex; margin:auto;" src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                            <div class="d-flex justify-content-center">
                                                <div class="control-group" id="fields">  
                                                    <div class="coupon-controls">  
                                                    <div class="entry input-group upload-input-group mb-4">  
                                                        <div class="custom-file">
                                                            <input type="file" id="coupon_photo" class="custom-file-input" name="coupon_photo[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp">
                                                            <label class="custom-file-label text-left"></label>
                                                        </div>  
                                                        <button class="btn btn-success rounded btn-add-coupon" type="button">  
                                                            <i class="fa fa-plus"> </i>  
                                                        </button>  
                                                    </div>
                                                    
                                                    </div>  
                                                    
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
                                        
                                    <!--</div>-->
                                </div>
                                <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                                  ?>
                                    <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                        
                                <?php } } ?>
                                                 
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                       <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                    </div>
                                </div>
                                
                                <?php echo form_close(); ?>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
    <div class="row" id="tech_history_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                         
                         
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Technical Inspections</h2> 
                        </div>
                        <?php if(!empty($technical_details)){
                                foreach($technical_details as $tech_details){
                        ?>
                        
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_technical_auction_car', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('tech_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("tech_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('tech_success')){
                                        echo '<div  class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("tech_success")  
                                                .'</div>';
                                    }
                                ?>
                        <div class="row align-items-center mb-7">
                            <div class="col-md-4">
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('technical_photo'); ?></div>
                                <div class="h-290">
                                   <?php
                                        if(!empty($technical_media)){
                                        
                                    ?>
                                  <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                    <?php
                                        
                                        foreach($technical_media as $tech_media){
                                    ?>
                                      
                                     <div class="preview-img">
                                        <img src="<?= base_url(); ?>uploads/auction_car/technical_image/<?= $tech_media->media; ?>" alt="">
                                        <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_technical_media/<?= $tech_media->id; ?>/<?= $auc_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                     </div>
                                     
                                    <?php }  ?> 
                                     
                                  </div>
                                  <?php } ?> 
                                  <div class="d-flex justify-content-center">
                                     <div class="control-group" id="fields">
                                        <div class="technical-controls">
                                           <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                               
                                              <!--<div class="show-preview">-->
                                              <!--   <div id="technical_image_preview"></div>-->
                                              <!--</div>-->
                                              
                                              <div class="custom-file">
                                                 <input type="file" id="technical_photo" class="custom-file-input" name="technical_photo[]" onchange="preview_image_technical();" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp">
                                                 <label class="custom-file-label text-left"></label>
                                              </div>
                                              
                                              <button class="btn btn-success rounded btn-add-technical" type="button">  
                                              <i class="fa fa-plus"> </i>  
                                              </button> 
                                              
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  
                                </div>
                                           
                               
                                
                            </div>
                            <div class="col-md-8">
                                <div class="service-booklet-inputs">
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="last_date_technical_inspection">Date last technical inspection</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" max="" class="form-control" id="last_date_technical_inspection"  value="<?= $tech_details->last_date_technical_inspection; ?>" name="last_date_technical_inspection" placeholder="Write the date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="mileage_last_tech_inspection">Mileage last technical inspection</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="mileage_last_tech_inspection"  value="<?= $tech_details->mileage_last_tech_inspection; ?>" name=mileage_last_tech_inspection placeholder="Write the mileage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <input type="text" class="form-control" id="technical_id" name="technical_id" value="<?= $tech_details->id; ?>" hidden>
                         
                        <?php  if(isset($auc_id)){
                            if(!empty($auc_id)){
                        ?>
                            <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                
                        <?php } } ?>
                                         
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                               <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                
                
                <?php } }else{ ?>
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/store_technical_auction_car', $attributes); 
                        ?>
                        <?php
                            if($this->session->flashdata('tech_error')){
                                echo '<div class="alert alert-danger border-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("tech_error")  
                                        .'</div>';
                            }else if($this->session->flashdata('tech_success')){
                                echo '<div class="alert alert-success border-success">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("tech_success")  
                                        .'</div>';
                            }
                        ?>
                        
                        <div class="row align-items-center mb-7">
                            <div class="col-md-4">
                                <div class="h-290">
                                    <h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3 text-center">Upload photos technical inspection</h3>
                                    <img style="margin:auto; display:flex;" src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                    <div class="d-flex justify-content-center">
                                        <div class="control-group" id="fields">  
                                            <div class="technical-controls">  
                                                <div class="entry input-group upload-input-group mb-4">  
    
                                                    <div class="custom-file">
                                                        <input type="file" id="technical_photo" class="custom-file-input" name="technical_photo[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp">
                                                        <label class="custom-file-label text-left"></label>
                                                    </div>  
    
                                                    <button class="btn btn-success rounded btn-add-technical" type="button">  
    
                                                        <i class="fa fa-plus"> </i>  
    
                                                    </button>  
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="service-booklet-inputs">
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="last_date_technical_inspection">Date last technical inspection</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" max="" class="form-control" id="last_date_technical_inspection" name="last_date_technical_inspection" placeholder="Write the date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" id="mileage_last_tech_inspection">Mileage last technical inspection</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="mileage_last_tech_inspection" name=mileage_last_tech_inspection placeholder="Write the mileage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  if(isset($auc_id)){
                            if(!empty($auc_id)){
                        ?>
                            <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                
                        <?php } } ?>
                                         
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                               <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                
                
                <?php } ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="partpaint_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Paint Thickness</h2> 
                        </div>
                        
                        <div class="row align-items-center mb-7">
                            
                            <div class="col-md-8">
                                <?php
                                    if($this->session->flashdata('partpaint_media_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("partpaint_media_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('partpaint_media_success')){
                                        echo '<div class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("partpaint_media_success")  
                                                .'</div>';
                                    }
                                ?>
                                <?php if(!empty($part_paint_details)){
                                    foreach($part_paint_details as $part_details){
                                ?>
                                
                                <div class="control-group mb-3" id="fields">
                                    <div class="part-thickness-controls">  
                                        <div class="">  
                                            <div class="entry form-row justify-content-center">
                                                <div class="form-group mb-0 col-md-5">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control"  id="part_type" name="part_type[]" value="<?= $part_details->part_type; ?>" placeholder="Part Type..">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0 col-md-5">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control"  id="part_thickness" name="part_thickness[]" value="<?= $part_details->thickness; ?>"  >
                                                    </div>
                                                </div>
                                                <a href="<?= base_url(); ?>admin/delete_partpaint_detail/<?= $part_details->id; ?>/<?= $part_details->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button">  
        
                                                    <i class="fa fa-trash text-white"> </i>  
        
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php  } } ?>
                                
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_partpaint_auction_car', $attributes); 
                                ?>
                                <div class="control-group" id="fields">  
                                    <div class="part-thickness-controls">  
                                        <div class="">  
                                            <div class="entry form-row justify-content-center">
                                                <div class="form-group mb-0 col-md-5">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control"  id="part_type" name="part_type[]" placeholder="Part Type.." required>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0 col-md-5">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control"  id="part_thickness" name="part_thickness[]"  required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success rounded btn-add-part-thickness" type="button">  
        
                                                    <i class="fa fa-plus"> </i>  
        
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                                ?>
                                    <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                        
                                <?php } } ?>
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-md-6">
                                       <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                
                            </div>
                            
                            <div class="col-lg-4 mb-3">
                                <?php
                                    if(empty($part_paint_media)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#paint-thickness-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Paint thickness control photo</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#paint-thickness-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($part_paint_media);?> Images</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Paint thickness control photo +</h3>
                                    </a>
                                <?php } ?>
                                <div class="error text-danger mt-2" style="color:red"><?php echo form_error('paint_thickness_photo'); ?></div>
                                
                                <div class="modal fade" id="paint-thickness-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Paint thickness control photo</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_partpaint_media', $attributes); 
                                        ?>
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
                                           <div class="h-290">
                                               <?php
                                                    if(!empty($part_paint_media)){
                                                    
                                                ?>
                                              <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                                <?php
                                                    
                                                    foreach($part_paint_media as $partpaintmedia){
                                                ?>
                                                  
                                                 <div class="preview-img">
                                                    <img src="<?= base_url(); ?>uploads/auction_car/part_paint_image/<?= $partpaintmedia->media; ?>" alt="">
                                                    <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_partpaint_media/<?= $partpaintmedia->id; ?>/<?= $partpaintmedia->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                                 </div>
                                                 
                                                <?php }  ?> 
                                                 
                                              </div>
                                              <?php } ?> 
                                              <div class="d-flex justify-content-center">
                                                 <div class="control-group" id="fields">
                                                    <div class="paint_thickness_media-controls">
                                                       <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="partpaint_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="paint_thickness_photo" class="custom-file-input" name="paint_thickness_photo[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp" required >
                                                             <label class="custom-file-label text-left"></label>
                                                          </div>
                                                          <button class="btn btn-success rounded btn-add-paint_thickness_media" type="button">  
                                                          <i class="fa fa-plus"> </i>  
                                                          </button> 
                                                          
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           </div>
                                        </div>
                                        <?php echo form_close(); ?>
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
    <div class="row" id="damage_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Known and damaged effects</h2> 
                        </div>
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/update_damage_auction_car', $attributes); 
                        ?>
                        <div class="border-0 mb-5">
                            <div class="damage-tab wideget-user-tab wideget-user-tab3">
                                
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <?php 
                                        
                                        $frontno = count($front_damage_defects);  
                                        $leftno = count($left_damage_defects);
                                        $rightno = count($right_damage_defects);
                                        $rearno = count($rear_damage_defects);
                                        $interiorno = count($interior_damage_defects);
                                        $roofno = count($roof_damage_defects);
                                        $engineno = count($engine_damage_defects);
                                        
                                        ?>
                                        <ul class="nav">
                                            <li class="position-relative">
                                                <a href="#tab-1" class="active" data-toggle="tab">
                                                    <h4>Front of the body</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $frontno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon1.png" class="mt-5">
                                                </a>
                                            </li>
                                            <li class="position-relative">
                                                <a href="#tab-2" data-toggle="tab" class="">
                                                    <h4>Left side of the body</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $leftno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon2.png" class="mt-5">
                                                </a>
                                            </li>
                                            <li class="position-relative">
                                                <a href="#tab-3" data-toggle="tab" class="">
                                                    <h4>Rear of the body</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $rearno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon3.png" class="mt-5">
                                                </a>
                                            </li>
                                            <li class="position-relative">
                                                <a href="#tab-4" data-toggle="tab" class="">
                                                    <h4>Right side of the body</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $rightno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon4.png" class="mt-5">
                                                </a>
                                            </li>
                                            <li class="position-relative">
                                                <a href="#tab-5" data-toggle="tab" class="">
                                                    <h4>Interior the car</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $interiorno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon5.png" class="mt-5">
                                                </a>
                                            </li>
                                            <li class="position-relative">
                                                <a href="#tab-6" data-toggle="tab" class="">
                                                    <h4>Engine and transmission</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $engineno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon6.png" class="mt-5">
                                                </a>
                                            </li>
                                            <li class="position-relative">
                                                <a href="#tab-7" data-toggle="tab" class="">
                                                    <h4>Roof of the body</h4>
                                                    <span class="detailpage-notification-badge font-weight-semibold d-flex justify-content-center align-items-center fs-14 text-white"><?= $roofno; ?></span>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon7.png" class="mt-5">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content border-left border-right border-top br-tr-3 p-5 bg-white">
                                <div class="tab-pane active" id="tab-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="damfront-controls">
                                                        <?php if(!empty($front_damage_defects)){
                                                            foreach($front_damage_defects as $front_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddfront_damage_located[]" value="<?= $front_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddfront_damage_type[]" value="<?= $front_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                
                                                                <div  data-id="<?=$front_damage->id;?>" id="table-carousel-ef-<?=$front_damage->id?>" class="table_coro_ef carousel slide" data-ride="carousel" data-interval="0"> 
                                                                    <div class="carousel-inner" >
                                                                       
                                                                        <?php if(!empty($all_front_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_front_dam_media as $frontdammedia){
                                                                                 if($frontdammedia->damage_id == $front_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $frontdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#table-carousel-ef-<?=$front_damage->id?>" role="button" data-slide="prev">
                                                                        <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#table-carousel-ef-<?=$front_damage->id?>" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $front_damage->id; ?>/<?= $front_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?> 
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="front_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="front_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="front_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-front" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-2">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="damleft-controls">
                                                        <?php if(!empty($left_damage_defects)){
                                                            foreach($left_damage_defects as $left_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddleft_damage_located[]" value="<?= $left_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddleft_damage_type[]" value="<?= $left_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                <div data-id="<?=$left_damage->id;?>" id="table-carousel-el-<?=$left_damage->id?>" class="table_coro_el carousel slide" data-ride="carousel" data-interval="0">
                                                                    <div class="carousel-inner" >
                                                                        
                                                                        <?php if(!empty($all_left_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_left_dam_media as $leftdammedia){
                                                                                 if($leftdammedia->damage_id == $left_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $leftdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                        
                                                                       
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#table-carousel-ef-<?=$left_damage->id?>" role="button" data-slide="prev">
                                                                    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#table-carousel-ef-<?=$left_damage->id?>" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $left_damage->id; ?>/<?= $left_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?> 
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="left_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="left_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="left_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-left" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-3">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="damrear-controls">
                                                        <?php if(!empty($rear_damage_defects)){
                                                            foreach($rear_damage_defects as $rear_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddrear_damage_located[]" value="<?= $rear_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddrear_damage_type[]" value="<?= $rear_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                <div data-id="<?=$rear_damage->id;?>" id="table-carousel-ere-<?=$rear_damage->id?>" class="table_coro_ere  carousel slide" data-ride="carousel" data-interval="0">
                                                                    <div class="carousel-inner" >
                                                                        <?php if(!empty($all_rear_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_rear_dam_media as $reardammedia){
                                                                                 if($reardammedia->damage_id == $rear_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $reardammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                        
                                                                        
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#table-carousel-ere-<?=$rear_damage->id?>" role="button" data-slide="prev">
                                                                    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#table-carousel-ere-<?=$rear_damage->id?>" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $rear_damage->id; ?>/<?= $rear_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="rear_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="rear_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="rear_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-rear" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-4">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="damright-controls">
                                                        <?php if(!empty($right_damage_defects)){
                                                            foreach($right_damage_defects as $right_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddright_damage_located[]" value="<?= $right_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.."readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddright_damage_type[]" value="<?= $right_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                <div  data-id="<?=$right_damage->id;?>" id="table-carousel-eri-<?=$right_damage->id?>" class="table_coro_eri carousel slide" data-ride="carousel" data-interval="0">
                                                                    <div class="carousel-inner">
                                                                        <?php if(!empty($all_right_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_right_dam_media as $rightdammedia){
                                                                                 if($rightdammedia->damage_id == $right_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rightdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                        
                                                                    
                                                                </div>
                                                                <a class="carousel-control-prev" href="#table-carousel-eri-<?=$right_damage->id?>" role="button" data-slide="prev">
                                                                <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#table-carousel-eri-<?=$right_damage->id?>" role="button" data-slide="next">
                                                                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                </a></a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $right_damage->id; ?>/<?= $right_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="right_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="right_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="right_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-right" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-5">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="daminterior-controls">
                                                        <?php if(!empty($interior_damage_defects)){
                                                            foreach($interior_damage_defects as $interior_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddinterior_damage_located[]" value="<?= $interior_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddinterior_damage_type[]" value="<?= $interior_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                <div data-id="<?=$interior_damage->id;?>" id="table-carousel-ei-<?=$interior_damage->id?>" class="table_coro_ei carousel slide" data-ride="carousel" data-interval="0">
                                                                    <div class="carousel-inner" >
                                                                        <?php if(!empty($all_interior_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_interior_dam_media as $interiordammedia){
                                                                                 if($interiordammedia->damage_id == $interior_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interiordammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                        
                                                                       
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#table-carousel-ei-<?=$interior_damage->id?>" role="button" data-slide="prev">
                                                                    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#table-carousel-ei-<?=$interior_damage->id?>" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $interior_damage->id; ?>/<?= $interior_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="interior_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="interior_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="interior_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-interior" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-6">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="damengine-controls">
                                                        <?php if(!empty($engine_damage_defects)){
                                                            foreach($engine_damage_defects as $engine_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddengine_damage_located[]" value="<?= $engine_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddengine_damage_type[]" value="<?= $engine_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                <div data-id="<?=$engine_damage->id;?>" id="table-carousel-ee-<?=$engine_damage->id?>" class="table_coro_ee carousel slide" data-ride="carousel" data-interval="0">
                                                                    <div class="carousel-inner" >
                                                                         <?php if(!empty($all_engine_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_engine_dam_media as $enginedammedia){
                                                                                 if($enginedammedia->damage_id == $engine_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $enginedammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                        
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#table-carousel-ee-<?=$engine_damage->id?>" role="button" data-slide="prev">
                                                                    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#table-carousel-ee-<?=$engine_damage->id?>" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $engine_damage->id; ?>/<?= $engine_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="engine_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="engine_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="engine_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-engine" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="tab-7">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Damage Located</th>
                                                            <th>Type of damage</th>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="damroof-controls">
                                                         <?php if(!empty($roof_damage_defects)){
                                                            foreach($roof_damage_defects as $roof_damage){
                                                        ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddroof_damage_located[]" value="<?= $roof_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="ddroof_damage_type[]" value="<?= $roof_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-1 w-140">
                                                                <div data-id="<?=$roof_damage->id;?>" id="table-carousel-ero-<?=$roof_damage->id?>" class="table_coro_ero carousel slide" data-ride="carousel" data-interval="0">
                                                                    <div class="carousel-inner" >
                                                                         <?php if(!empty($all_roof_dam_media)){ 
                                                                            $counter = 0;
                                                                            foreach($all_roof_dam_media as $roofdammedia){
                                                                                 if($roofdammedia->damage_id == $roof_damage->id ){ 
                                                                                     
                                                                        ?>
                                                                        <?php if($counter == 0){ ?>
                                                                        <div class="carousel-item active w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="carousel-item w-100 h-98">
                                                                            <a href="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="table-link">
                                                                            <img src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roofdammedia->media;?>" class="d-block w-100 h-100"></a>
                                                                        </div>
                                                                        
                                                                        <?php } } } } ?>
                                                                        
                                                                        
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#table-carousel-ero-<?=$roof_damage->id?>" role="button" data-slide="prev">
                                                                    <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#table-carousel-ero-<?=$roof_damage->id?>" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="p-1 w100 text-center"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $roof_damage->id; ?>/<?= $roof_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="roof_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input w-324 " name="roof_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="roof_damage_image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1 w100 text-center"><button class="btn btn-success rounded btn-add-dam-roof" type="button"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                              <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                              ?>
                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                             
                             <?php } } ?>
                               <button type="submit"  class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="wheel_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Main Wheels Details</h2> 
                        </div>
                        <?php if(!empty($wheel_details)){
                                foreach($wheel_details as $wh_details){
                        ?>
                        
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_wheel_auction_car', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('wheel_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("wheel_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('wheel_success')){
                                        echo '<div  class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("wheel_success")  
                                                .'</div>';
                                    }
                                ?>
                        <div class="row justify-content-center mb-7">
                            <div class="col-lg-6 mb-3">
                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('tire_photo'); ?></span>
                                <div class="h-290">
                                   <?php
                                        if(!empty($wheel_media)){
                                        
                                    ?>
                                  <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                    <?php
                                        
                                        foreach($wheel_media as $wh_media){
                                    ?>
                                      
                                     <div class="preview-img">
                                        <img src="<?= base_url(); ?>uploads/auction_car/wheel_image/<?= $wh_media->media; ?>" alt="">
                                        <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_tire_media/<?= $wh_media->id; ?>/<?= $auc_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>
                                     </div>
                                     
                                    <?php }  ?> 
                                     
                                  </div>
                                  <?php } ?> 
                                  <div class="d-flex justify-content-center">
                                     <div class="control-group" id="fields">
                                        <div class="tire-controls">
                                           <div class="entry mt-6 input-group align-items-center upload-input-group mb-4">
                                               
                                              <!--<div class="show-preview">-->
                                              <!--   <div id="tire_image_preview"></div>-->
                                              <!--</div>-->
                                              
                                              <div class="custom-file">
                                                 <input type="file" id="tire_photo" class="custom-file-input" name="tire_photo[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp">
                                                 <label class="custom-file-label text-left"></label>
                                              </div>
                                              
                                              <button class="btn btn-success rounded btn-add-tire" type="button">  
                                              <i class="fa fa-plus"> </i>  
                                              </button> 
                                              
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  
                               </div>
                               
                            </div>
                            <div class="col-md-12">
                                <div class="service-booklet-inputs">
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 font-weight-semibold" id="examplenameInputname2">Main Wheels Types<i class="fas fa-arrow-right pl-4"></i></label>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Left Front </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Right Front</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Left Rear</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Right Rear</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">Type of tire</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_left_front" class="form-control" id="tire_type_left_front"  value="<?= $wh_details->tire_type_left_front; ?>" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_right_front" class="form-control" id="tire_type_right_front" value="<?= $wh_details->tire_type_right_front; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_left_rear" class="form-control" id="tire_type_left_rear" value="<?= $wh_details->tire_type_left_rear; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_right_rear" class="form-control" id="tire_type_right_rear" value="<?= $wh_details->tire_type_right_rear; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">Profile depth (mm)</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_left_front" class="form-control" id="profile_depth_left_front" value="<?= $wh_details->profile_depth_left_front; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_right_front" class="form-control" id="profile_depth_right_front" value="<?= $wh_details->profile_depth_right_front; ?>" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_left_rear" class="form-control" id="profile_depth_left_rear" value="<?= $wh_details->profile_depth_left_rear; ?>" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_right_rear" class="form-control" id="profile_depth_right_rear" value="<?= $wh_details->profile_depth_right_rear; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">Rim type</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_left_front" class="form-control" id="rim_type_left_front" value="<?= $wh_details->rim_type_left_front; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_right_front" class="form-control" id="rim_type_right_front" value="<?= $wh_details->rim_type_right_front; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_left_rear" class="form-control" id="rim_type_left_rear" value="<?= $wh_details->rim_type_left_rear; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_right_rear" class="form-control" id="rim_type_right_rear" value="<?= $wh_details->rim_type_right_rear; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">State of the brakes</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_left_front" class="form-control" id="brake_state_left_front" value="<?= $wh_details->brake_state_left_front; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_right_front" class="form-control" id="brake_state_right_front" value="<?= $wh_details->brake_state_right_front; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_left_rear" class="form-control" id="brake_state_left_rear" value="<?= $wh_details->brake_state_left_rear; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_right_rear" class="form-control" id="brake_state_right_rear" value="<?= $wh_details->brake_state_right_rear; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="tire_id" name="tire_id" value="<?= $wh_details->id; ?>" hidden>
                         
                        <?php  if(isset($auc_id)){
                            if(!empty($auc_id)){
                        ?>
                            <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                
                        <?php } } ?>
                                         
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                               <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                
                
                <?php } }else{ ?>
                        <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_wheel_auction_car', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('wheel_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("wheel_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('wheel_success')){
                                        echo '<div  class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("wheel_success")  
                                                .'</div>';
                                    }
                                ?>
                        <div class="row justify-content-center mb-7">
                            <div class="col-lg-6 mb-3">
                                <div class="h-290">
                                    <h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3 text-center">Upload Car Wheel Photo</h3>
                                    <img style="display:flex; margin:auto;" src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                    <div class="d-flex justify-content-center">
                                        <div class="control-group" id="fields">  
                                            <div class="tire-controls">  
                                            <div class="entry input-group upload-input-group mb-4">  
                                                <div class="custom-file">
                                                    <input type="file" id="tire_photo" class="custom-file-input" name="tire_photo[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/webp">
                                                    <label class="custom-file-label text-left"></label>
                                                </div>  
                                                <button class="btn btn-success rounded btn-add-tire" type="button">  
                                                    <i class="fa fa-plus"> </i>  
                                                </button>  
                                            </div>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                                
                            <!--</div>-->
                            <div class="col-md-12">
                                <div class="service-booklet-inputs">
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 font-weight-semibold" id="examplenameInputname2">Main Wheels Types<i class="fas fa-arrow-right pl-4"></i></label>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Left Front </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Right Front</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Left Rear</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="form-label mb-0 text-primary fs-19 text-cetner font-weight-semibold">Right Rear</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">Type of tire</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_left_front" class="form-control" id="tire_type_left_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_right_front" class="form-control" id="tire_type_right_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_left_rear" class="form-control" id="tire_type_left_rear" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="tire_type_right_rear" class="form-control" id="tire_type_right_rear" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">Profile depth (mm)</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_left_front" class="form-control" id="profile_depth_left_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_right_front" class="form-control" id="profile_depth_right_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_left_rear" class="form-control" id="profile_depth_left_rear" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="profile_depth_right_rear" class="form-control" id="profile_depth_right_rear" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">Rim type</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_left_front" class="form-control" id="rim_type_left_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_right_front" class="form-control" id="rim_type_right_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_left_rear" class="form-control" id="rim_type_left_rear" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="rim_type_right_rear" class="form-control" id="rim_type_right_rear" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label class="form-label mb-0 text-primary fs-19 wheels-detail-title bg-dark-blue text-white font-weight-semibold" id="examplenameInputname2">State of the brakes</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_left_front" class="form-control" id="brake_state_left_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_right_front" class="form-control" id="brake_state_right_front" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_left_rear" class="form-control" id="brake_state_left_rear" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="brake_state_right_rear" class="form-control" id="brake_state_right_rear" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php  if(isset($auc_id)){
                            if(!empty($auc_id)){
                        ?>
                            <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                
                        <?php } } ?>
                                         
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                               <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                
                
                <?php }  ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="note_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Any Notes From The Seller</h2> 
                        </div>
                        
                        <?php
                            if(!empty($single_auction_details)){   
                                foreach($single_auction_details as $auction_details){
                        ?>
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/store_auction_car', $attributes); 
                        ?>
                     
                        <?php
                            if($this->session->flashdata('note_error')){
                                echo '<div class="alert alert-danger border-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("note_error")  
                                        .'</div>';
                            }else if($this->session->flashdata('note_success')){
                                echo '<div class="alert alert-success border-success">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("note_success")  
                                        .'</div>';
                            }
                        ?>
                        <div class="row mb-7">
                            <div class="col-12 m-auto">
                                <div class="form-group">
                                    <label class="form-label mb-0 text-primary fs-20 font-weight-semibold mb-4">Type Note For The Seller</label>
                                    <textarea class="form-control" name="note_from_sellar" id="note_from_sellar" rows="4" maxlength="5000" placeholder="Enter Text.."><?php if(!empty($auction_details->note_from_sellar)){ echo $auction_details->note_from_sellar; }?></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                               <button type="submit" name="submit_noteentercar" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="morevideo_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Video</h2> 
                        </div>
                        <?php
                            if($this->session->flashdata('auc_morevideo_error')){
                                echo '<div class="alert alert-danger border-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("auc_morevideo_error")  
                                        .'</div>';
                            }else if($this->session->flashdata('auc_morevideo_success')){
                                echo '<div class="alert alert-success border-success">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("auc_morevideo_success")  
                                        .'</div>';
                            }
                        ?>
                        <div class="row mb-5">
                            
                            <div class="col-lg-4 mb-3">
                            <?php
                                    if(empty($auction_morevideo)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-morevideo-model">
                                    <i class="fab fa-youtube fs-54 text-primary mb-4"></i>
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14 px-1">Upload exterior + interior car videos</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-morevideo-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($auction_morevideo);?> Videos</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More exterior + interior car videos +</h3>
                                    </a>
                                <?php } ?>
                                <span class="error text-danger mt-2" style="color:red"><?php echo form_error('more_video'); ?></span>
                                
                                <div class="modal fade" id="enter-morevideo-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-md">
                                     <div class="modal-content">
                                         <!--Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-primary text-white text-center fs-18 p-3">Upload exterior + interior car videos</h3>
                                           <button type="button" class="close fs-20 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                         <!--Modal body -->
                                        <?php 
                                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                            echo form_open_multipart('Admin/update_morevideo_auction_car', $attributes); 
                                        ?>
                                        
                                        
                                        <div class="modal-body text-center enter-images-field">
                                           <div>
                                               <h6 class="mb-3">(Add youtube embed code only and can upload only 2 videos)</h6>
                                               <?php
                                                    if(!empty($auction_morevideo)){
                                                    
                                                ?>
                                              <div class="row video-box">
                                                <?php
                                                    
                                                    foreach($auction_morevideo as $morevideo){
                                                ?>
                                                <div class="col-6">
                                                    <div class="position-relative">
                                                        <a class="ajaxdelete" href="<?= base_url(); ?>admin/delete_auction_morevideo/<?= $morevideo->id; ?>/<?= $morevideo->car_auction_id; ?>" ><i class="fas fa-times img-cross-icon text-white fs-12"></i>
                                                        </a>
                                                    </div>
                                                <?= $morevideo->video_url; ?>
                                                </div>
                                                <?php }  ?> 
                                              </div>
                                              <?php } ?> 
                                             <div class="control-group" id="fields">
                                                <div class="morevideo-controls">
                                                   <div class="entry mt-2 input-group align-items-center upload-input-group mb-2">
                                                      
                                                      <div class="custom-file">
                                                         <input type="text" class="form-control" id="more_video" name="more_video[]" placeholder="Youtube Embed Video Code..">
                                                      </div>
                                                      <button class="btn btn-success rounded btn-add-morevideo" type="button">  
                                                      <i class="fa fa-plus"> </i>  
                                                      </button> 
                                                      
                                                   </div>
                                                </div>
                                             </div>
                                              <?php  if(isset($auc_id)){
                                                    if(!empty($auc_id)){
                                              ?>
                                              <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                    
                                              <button type="submit" class="model-send-btn btn-block btn btn-primary btn-md">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                             <?php } }else{ ?>
                                             <span style="color:red">Please fill "insert main car data" section first.</span>
                                             <?php } ?>
                                           </div>
                                        </div>
                                        <?php echo form_close(); ?>
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
    <div class="row" id="testdrive_section">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 
                            <h2 class="text-green font-weight-semibold mt-3">Test Drive Information</h2> 
                        </div>
                        
                        <?php if(!empty($test_drive_details)){
                                foreach($test_drive_details as $testdrive){
                        ?>
                        
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/store_test_drive', $attributes); 
                        ?>
                        <?php
                            if($this->session->flashdata('testdrive_error')){
                                echo '<div class="alert alert-danger border-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("testdrive_error")  
                                        .'</div>';
                            }else if($this->session->flashdata('testdrive_success')){
                                echo '<div class="alert alert-success border-success">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("testdrive_success")  
                                        .'</div>';
                            }
                        ?>
                        <div class="w-100 mb-7 m-auto">
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="speedometer" id="speedometer" class="custom-switch-input" <?php if ($testdrive->speedometer == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Speedometer:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" name="speedometer_issue" id="speedometer_issue" class="form-control" value="<?php echo $testdrive->speedometer_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="gear" id="gear" class="custom-switch-input" <?php if ($testdrive->gear == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Gears:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="gear_issue" id="gear_issue" value="<?php echo $testdrive->gear_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="suspension" id="suspension" class="custom-switch-input" <?php if ($testdrive->suspension == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Suspensions:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="suspension_issue" id="suspension_issue" value="<?php echo $testdrive->suspension_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="noise_level" id="noise_level" class="custom-switch-input" <?php if ($testdrive->noise_level == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Noise level:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control"  name="noise_level_issue" id="noise_level_issue" value="<?php echo $testdrive->noise_level_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="navigation" id="navigation" class="custom-switch-input" <?php if ($testdrive->navigation == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Navigation:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="navigation_issue" id="navigation_issue" value="<?php echo $testdrive->navigation_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="engin" id="engin" class="custom-switch-input" <?php if ($testdrive->engin == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Engine:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="engin_issue" id="engin_issue" value="<?php echo $testdrive->engin_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="steering" id="steering" class="custom-switch-input" <?php if ($testdrive->steering == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Steering:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="steering_issue" id="steering_issue" value="<?php echo $testdrive->steering_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="brakes" id="brakes" class="custom-switch-input" <?php if ($testdrive->brakes == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Brakes:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="brakes_issue" id="brakes_issue" value="<?php echo $testdrive->brakes_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0 mt-1">
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" value="1" name="air_condition" id="air_condition" class="custom-switch-input" <?php if ($testdrive->air_condition == 1) echo 'checked="checked"'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Air conditioning:</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" name="air_condition_issue" id="air_condition_issue" value="<?php echo $testdrive->air_condition_issue; ?>" placeholder='Write "No specific results" '>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <input type="text" name="testdrive_id" class="form-control" id="testdrive_id" value="<?php echo $testdrive->id; ?>" hidden>
                        
                        
                        <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                                  ?>
                                    <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                        
                                <?php } } ?>
                                                 
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                       <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                    </div>
                                </div>
                                
                                <?php echo form_close(); ?>
                        
                        
                        <?php } }else{ ?>
                                <?php 
                                    $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                    echo form_open_multipart('Admin/store_test_drive', $attributes); 
                                ?>
                                <?php
                                    if($this->session->flashdata('testdrive_error')){
                                        echo '<div class="alert alert-danger border-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("testdrive_error")  
                                                .'</div>';
                                    }else if($this->session->flashdata('testdrive_success')){
                                        echo '<div class="alert alert-success border-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>'.
                                                  $this->session->flashdata("testdrive_success")  
                                                .'</div>';
                                    }
                                ?>
                                
                                
                                <div class="w-100 mb-7 m-auto">
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="speedometer" id="speedometer" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Speedometer:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" name="speedometer_issue" id="speedometer_issue" class="form-control"  placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="gear" id="gear" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Gears:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="gear_issue" id="gear_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="suspension" id="suspension" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Suspensions:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="suspension_issue" id="suspension_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="noise_level" id="noise_level" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Noise level:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control"  name="noise_level_issue" id="noise_level_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="navigation" id="navigation" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Navigation:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="navigation_issue" id="navigation_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="engin" id="engin" class="custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Engine:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="engin_issue" id="engin_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="steering" id="steering" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Steering:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="steering_issue" id="steering_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="brakes" id="brakes" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Brakes:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="brakes_issue" id="brakes_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="custom-switch pl-0">
                                                            <input type="checkbox" value="1" name="air_condition" id="air_condition" class="custom-switch-input" >
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description fs-20 text-dark m-0 ml-4 font-weight-semibold">Air conditioning:</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name="air_condition_issue" id="air_condition_issue" placeholder='Write "No specific results" '>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                
                                
                                <?php  if(isset($auc_id)){
                                    if(!empty($auc_id)){
                                  ?>
                                    <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                        
                                <?php } } ?>
                                                 
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                       <button type="submit" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                    </div>
                                </div>
                                
                                <?php echo form_close(); ?>
                        
                        
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
                    
                
        </div>
    </div>
    
    <div class="row" id="auc_main_section">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="item2-lg">
                     <div class="section-title center-block text-center">
                        <h2 class="text-green font-weight-semibold mt-3">Auction Details</h2>
                     </div>
                        
                        
                     <div class="row align-items-center mb-7">
                        <?php
                            if(!empty($single_auction_details)){   
                                foreach($single_auction_details as $auction_details){
                        ?>
                        <?php 
                            $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                            echo form_open_multipart('Admin/store_auction_car', $attributes); 
                        ?>
                     
                        <?php
                            if($this->session->flashdata('auc_main_error')){
                                echo '<div class="alert alert-danger border-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("auc_main_error")  
                                        .'</div>';
                            }else if($this->session->flashdata('auc_main_success')){
                                echo '<div class="alert alert-success border-success">
                                            <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>'.
                                          $this->session->flashdata("auc_main_success")  
                                        .'</div>';
                            }
                        ?>
                        <div class="col-md-12">
                           <div class="service-booklet-inputs">
                              <div class="form-group mb-5">
                                 <div class="row align-items-center">
                                    <div class="col-md-6">
                                       <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="reserve_price">Reserve Price</label>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="number" min="0" class="form-control" id="reserve_price" value="<?php if(!empty($auction_details->reserve_price)){ echo $auction_details->reserve_price;} ?>" name="reserve_price" placeholder="Enter Reserce Price">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group mb-5">
                                 <div class="row align-items-center">
                                    <div class="col-md-6">
                                       <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="base_price">Base Price</label>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="number" min="0" class="form-control" id="base_price" name="base_price" value="<?php if(!empty($auction_details->base_price)){ echo $auction_details->base_price;} ?>" placeholder="Enter Base Price">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group mb-5">
                                 <div class="row align-items-center">
                                    <div class="col-md-6">
                                       <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="expenses_price">Expenses Price</label>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="number" min="0"  class="form-control" id="expenses_price" value="<?php if(!empty($auction_details->expences_price)){ echo $auction_details->expences_price;} ?>" name="expenses_price" placeholder="Enter Expenses Price">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group mb-5">
                                 <div class="row align-items-center">
                                    <div class="col-md-6">
                                       <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="end_auction_time">End Time</label>
                                    </div>
                                    <div class="col-md-6">
                                       <!--<input type="datetime-local" class="form-control" min="11-1-2022" id="end_auction_time" value="<?php if(!empty($auction_details->end_auction_time)){ echo $auction_details->end_auction_time;} ?>" name="end_auction_time">-->
                                        <input type="datetime-local" class="form-control" min="11-1-2022" id="mydatetime" value="<?php if(!empty($auction_details->end_auction_time)){ echo $auction_details->end_auction_time;} ?>" name="end_auction_time">
                                    </div>
                                 </div>
                              </div>
                              
                              
                           </div>
                           <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-6">
                                   <button type="submit" name="auc_main_detail" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } } ?>
                        
                        <div class="col-lg-4 mb-3">
                            
                            <?php
                             if(!empty($auction_main_image)){
                             foreach($auction_main_image as $auc_main_media){
                                 if(!empty($auc_main_media->media)){ 
                             ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-main-image-model">
                                  <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added Car Photo</h5>
                                  <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                  <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Update Auction Photos</h3>
                                </a>
                                
                            <?php   } } }  else {  ?>
                            
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-main-image-model">
                                    <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Photos</h3>
                                </a>
                                
                            <?php } ?>
                            
                            <span class="error text-danger mt-2" style="color:red"><?php echo form_error('type'); ?></span>
                            
                            <div class="modal fade" id="enter-main-image-model" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="pb-0 border-0">
                                       <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Photos</h3>
                                       <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                    </div>
                                    <!-- Modal body -->
                                    <?php 
                                        $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                        echo form_open_multipart('Admin/update_mainphoto_auction_car', $attributes); 
                                    ?>
                                 
                                    <div class="modal-body pt-0 text-center enter-images-field">
                                       <div class="h-290">
                                           <span id="mainimage_ratio_error" style="color:red"></span>
                                           <?php
                                                if(!empty($auction_main_image)){
                                                
                                            ?>
                                          <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center" style=" margin: auto;">
                                            <?php
                                                
                                                foreach($auction_main_image as $auc_main_media){
                                            ?>
                                              
                                             <img src="<?= base_url(); ?>uploads/auction_car/main_image/<?= $auc_main_media->media; ?>" style="width:200px; height:150px; " alt="">
                                            <?php }  ?> 
                                          </div>
                                          <?php } ?> 
                                          <div class="d-flex justify-content-center">
                                                <div class="control-group" id="fields">  
                                                    <div class="controls"> 
                                                        <div class="entry input-group upload-input-group mb-4"> 
                                                            <div class="custom-file">
                                                                
                                                                <input type="file" class="main_image custom-file-input" id="main_image" name="main_image" onchange="preview_image_mainimage();" accept="image/png, image/gif, image/jpeg, image/webp">
                                                                <label class="custom-file-label text-left"></label>
                                                            </div> 
                                                        </div>
                                                    </div>  
                                                </div>
                                           </div>
                                          <?php  if(isset($auc_id)){
                                                if(!empty($auc_id)){
                                          ?>
                                            <?php
                                                foreach($auction_main_image as $auc_main_media){
                                            ?>
                                              <input type="text" name="mainimage_id" class="form-control" id="mainimage_id" value="<?php if(!empty($auc_main_media->id)){ echo $auc_main_media->id; } ?>" hidden>
                                          
                                            <?php }  ?>
                                           
                                          <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                                
                                          <button type="submit" class="btn btn-primary btn-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></button>
                                         <?php } }else{ ?>
                                         <span style="color:red">Please fill "insert main car data" section first.</span>
                                         <?php } ?>
                                       </div>
                                    </div>
                                    <?php echo form_close(); ?>
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
    
    <div class="row justify-content-center">
        <div class="col-md-6">
           <a href="<?=base_url();?>Admin/change_status/<?=$auc_id;?>" class="w-100 mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Publish To Website <i class="fas fa-paper-plane text-white pl-3"></i></a>
        </div>
    </div>
    <?php  }
    }
    ?>
</div>
</div>
