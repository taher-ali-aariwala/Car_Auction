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

                        <div class="item2-gl-nav d-flex align-items-center mb-4">

                            <h3 class="mb-0 text-left card-active-btn">Enter and describe the next car to be auctioned</h3>
                     
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
                                                    <select id="brand" name="brand" class="form-control custom-select select2">
                                                        <!--<option>Choose the Brand</option>-->
                                                        <option value="BMW">BMW</option>
                                                        <option value="Ferrari">Ferrari</option>
                                                        <option value="Ford">Ford</option>
                                                        <option value="Lamborghini">Lamborghini</option>
                                                        <option value="Toyota">Toyota</option>
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('brand'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="model">Model</label>
                                                        <input type="text" class="form-control" id="model" name="model" value="<?php echo set_value('model', $this->session->userdata('model')); ?>" placeholder="Insert the Model Name">
                                                        <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('model'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="mileage">Mileage</label>
                                                    <input type="number" min="0" class="form-control" id="mileage" name="mileage" value="<?php echo set_value('mileage', $this->session->userdata('mileage')); ?>" placeholder="Insert the mileage (KM)">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('mileage'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="body_style">Body Style</label>
                                                    <select name="body_style" id="body_style" class="form-control custom-select select2">
                                                        <!--<option>Choose the Body Style</option>-->
                                                        <option value="Hatchback">Hatchback.</option>
                                                        <option value="Sedan">Sedan</option>
                                                        <option value="Convertible">Convertible</option>
                                                        <option value="Wagon">Wagon</option>
                                                        <option value="Jeep">Jeep</option>
                                                        <option value="MUV/SUV">MUV/SUV</option>
                                                        <option value="Van">Van</option>
                                                        <option value="Coupe">Coupe</option>
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('body_style'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="engine_power">Engine / Power</label>
                                                    <input type="text" name="engine_power" class="form-control" id="engine_power" value="<?php echo set_value('engine_power', $this->session->userdata('engine_power')); ?>" placeholder="Insert Engine / Power">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('engine_power'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="transmission">Choose Transmission</label>
                                                    <select name="transmission" id="transmission" class="form-control custom-select select2">
                                                        <!--<option>Choose the Transmission</option>-->
                                                        <option value="Manual transmission">Manual transmission</option>
                                                        <option value="Automatic transmission">Automatic transmission</option>
                                                        <option value="Continuously variable transmission (CVT)">Continuously variable transmission (CVT)</option>
                                                        <option value="Semi-automatic and dual-clutch transmissions">Semi-automatic and dual-clutch transmissions</option>
                                                        <option value="Automated Manual Transmission (AM)">Automated Manual Transmission (AM)</option>
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('transmission'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="fuel_type">Fuel Type</label>
                                                    <select id="fuel_type"  name="fuel_type" class="form-control custom-select select2">
                                                        <!--<option>Choose the Fuel Type</option>-->
                                                        <option value="Diesel">Diesel</option>
                                                        <option value="Hybrid">Hybrid</option>
                                                        <option value="Gasoline">Gasoline</option>
                                                        <option value="Electric">Electric</option>
                                                        
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('fuel_type'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="external_color">External color</label>
                                                    <input type="text" name="external_color" class="form-control" id="external_color" value="<?php echo set_value('external_color', $this->session->userdata('external_color')); ?>" placeholder="Insert the color">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('external_color'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="internal_color">Interior color</label>
                                                    <input type="text" name="internal_color" class="form-control" id="internal_color" value="<?php echo set_value('internal_color', $this->session->userdata('internal_color')); ?>" placeholder="Insert material and color">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('internal_color'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="registration_date">Registration date</label>
                                                    <input type="date" name="registration_date" max="" class="form-control" id="registration_date" value="<?php echo set_value('registration_date', $this->session->userdata('registration_date')); ?>" placeholder="Insert the date">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('registration_date'); ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="previous_owner_no" class="col-form-label">Previous owners Number</label>
                                                    <input type="number" min="0" name="previous_owner_no" class="form-control" id="previous_owner_no" value="<?php echo set_value('previous_owner_no', $this->session->userdata('previous_owner_no')); ?>" placeholder="Insert the number">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('previous_owner_no'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="where_is_it" class="col-form-label">Where is it</label>
                                                    <input type="text" name="where_is_it" class="form-control" id="where_is_it" value="<?php echo set_value('where_is_it', $this->session->userdata('where_is_it')); ?>" placeholder="Insert the region">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('where_is_it'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="sales_person" class="col-form-label">Salesperson</label>
                                                    <input type="text" name="sales_person" class="form-control" id="sales_person" value="<?php echo set_value('sales_person', $this->session->userdata('sales_person')); ?>" placeholder="Insert the type of seller">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('sales_person'); ?></span>
                                                </div>
                                            </div>
                                            <!--<div class="form-group">-->
                                            <!--    <label class="custom-control custom-checkbox mb-3">-->
                                            <!--        <input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">-->
                                            <!--        <span class="custom-control-label">-->
                                            <!--            <a href="#" class="text-dark">I Agree</a>-->
                                            <!--        </span>-->
                                            <!--    </label>-->
                                            <!--</div>-->
                                            <button type="submit" name="submit_entercar" class="btn btn-primary ">Add Details</button>
                                            <!--<div class="w-100 m-auto row justify-content-center">-->
                                            <!--    <div class="col-md-6">-->
                                            <!--       <button type="submit" name="submit_entercar" class="mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Send <i class="fas fa-paper-plane text-white pl-3"></i></button>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        
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
                                                        <!--<option>Choose the Brand</option>-->
                                                        <option value="BMW" <?php if('BMW' == $auction_details->brand) echo 'selected="selected"'; ?>>BMW</option>
                                                        <option value="Ferrari" <?php if('Ferrari' == $auction_details->brand) echo 'selected="selected"'; ?>>Ferrari</option>
                                                        <option value="Ford" <?php if('Ford' == $auction_details->brand) echo 'selected="selected"'; ?>>Ford</option>
                                                        <option value="Lamborghini" <?php if('Lamborghini' == $auction_details->brand) echo 'selected="selected"'; ?>>Lamborghini</option>
                                                        <option value="Toyota" <?php if('Toyota' == $auction_details->brand) echo 'selected="selected"'; ?>>Toyota</option>
                                                       
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('brand'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="model">Model</label>
                                                        <input type="text" class="form-control" id="model" name="model" value="<?php echo $auction_details->model; ?>" placeholder="Insert the Model Name">
                                                        <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('model'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="mileage">Mileage</label>
                                                    <input type="number" min="0" class="form-control" id="mileage" name="mileage" value="<?php echo $auction_details->mileage; ?>" placeholder="Insert the mileage (KM)">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('mileage'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="body_style">Body Style</label>
                                                    <select name="body_style" id="body_style" class="form-control custom-select select2">
                                                        <!--<option>Choose the Body Style</option>-->
                                                        <option value="Hatchback" <?php if('Hatchback' == $auction_details->body_style) echo 'selected="selected"'; ?>>Hatchback.</option>
                                                        <option value="Sedan" <?php if('Sedan' == $auction_details->body_style) echo 'selected="selected"'; ?>>Sedan</option>
                                                        <option value="Convertible" <?php if('Convertible' == $auction_details->body_style) echo 'selected="selected"'; ?>>Convertible</option>
                                                        <option value="Wagon" <?php if('Wagon' == $auction_details->body_style) echo 'selected="selected"'; ?>>Wagon</option>
                                                        <option value="Jeep" <?php if('Jeep' == $auction_details->body_style) echo 'selected="selected"'; ?>>Jeep</option>
                                                        <option value="MUV/SUV" <?php if('MUV/SUV' == $auction_details->body_style) echo 'selected="selected"'; ?>>MUV/SUV</option>
                                                        <option value="Van" <?php if('Van' == $auction_details->body_style) echo 'selected="selected"'; ?>>Van</option>
                                                        <option value="Coupe" <?php if('Coupe' == $auction_details->body_style) echo 'selected="selected"'; ?>>Coupe</option>
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('body_style'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="engine_power">Engine / Power</label>
                                                    <input type="text" name="engine_power" class="form-control" id="engine_power" value="<?php echo $auction_details->engine_power; ?>" placeholder="Insert Engine / Power">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('engine_power'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="transmission">Choose Transmission</label>
                                                    <select name="transmission" id="transmission" class="form-control custom-select select2">
                                                        <!--<option>Choose the Transmission</option>-->
                                                        <option value="Manual transmission" <?php if('Manual transmission' == $auction_details->transmission) echo 'selected="selected"'; ?>>Manual transmission</option>
                                                        <option value="Automatic transmission" <?php if('Automatic transmission' == $auction_details->transmission) echo 'selected="selected"'; ?>>Automatic transmission</option>
                                                        <option value="Continuously variable transmission (CVT)" <?php if('Continuously variable transmission (CVT)' == $auction_details->transmission) echo 'selected="selected"'; ?>>Continuously variable transmission (CVT)</option>
                                                        <option value="Semi-automatic and dual-clutch transmissions" <?php if('Semi-automatic and dual-clutch transmissions' == $auction_details->transmission) echo 'selected="selected"'; ?>>Semi-automatic and dual-clutch transmissions</option>
                                                        <option value="Automated Manual Transmission (AM)" <?php if('Automated Manual Transmission (AM)' == $auction_details->transmission) echo 'selected="selected"'; ?>>Automated Manual Transmission (AM)</option>
                                                        
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('transmission'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="fuel_type">Fuel Type</label>
                                                    <select id="fuel_type"  name="fuel_type" class="form-control custom-select select2">
                                                        <!--<option>Choose the Fuel Type</option>-->
                                                        <option value="Diesel" <?php if('Diesel' == $auction_details->fuel_type) echo 'selected="selected"'; ?> >Diesel</option>
                                                        <option value="Hybrid" <?php if('Hybrid' == $auction_details->fuel_type) echo 'selected="selected"'; ?> >Hybrid</option>
                                                        <option value="Gasoline" <?php if('Gasoline' == $auction_details->fuel_type) echo 'selected="selected"'; ?> >Gasoline</option>
                                                        <option value="Electric" <?php if('Electric' == $auction_details->fuel_type) echo 'selected="selected"'; ?> >Electric</option>
                                                        
                                                    </select>
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('fuel_type'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="external_color">External color</label>
                                                    <input type="text" name="external_color" class="form-control" id="external_color" value="<?php echo $auction_details->external_color; ?>" placeholder="Insert the color">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('external_color'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="internal_color">Interior color</label>
                                                    <input type="text" name="internal_color" class="form-control" id="internal_color" value="<?php echo $auction_details->internal_color; ?>" placeholder="Insert material and color">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('internal_color'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="form-label" for="registration_date">Registration date</label>
                                                    <input type="date" name="registration_date" max="" class="form-control" id="registration_date" value="<?php echo $auction_details->registration_date; ?>" placeholder="Insert the date">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('registration_date'); ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="previous_owner_no" class="col-form-label">Previous owners Number</label>
                                                    <input type="number" min="0"  name="previous_owner_no" class="form-control" id="previous_owner_no" value="<?php echo $auction_details->previous_owner_no; ?>" placeholder="Insert the number">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('previous_owner_no'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="where_is_it" class="col-form-label">Where is it</label>
                                                    <input type="text" name="where_is_it" class="form-control" id="where_is_it" value="<?php echo $auction_details->where_is_it; ?>" placeholder="Insert the region">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('where_is_it'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="sales_person" class="col-form-label">Salesperson</label>
                                                    <input type="text" name="sales_person" class="form-control" id="sales_person" value="<?php echo $auction_details->sales_person; ?>" placeholder="Insert the type of seller">
                                                    <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('sales_person'); ?></span>
                                                </div>
                                            </div>
                                            <!--<div class="form-group">-->
                                            <!--    <label class="custom-control custom-checkbox mb-3">-->
                                            <!--        <input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">-->
                                            <!--        <span class="custom-control-label">-->
                                            <!--            <a href="#" class="text-dark">I Agree</a>-->
                                            <!--        </span>-->
                                            <!--    </label>-->
                                            <!--</div>-->
                                            <input type="text" name="auction_id" class="form-control" id="auction_id" value="<?php echo $auc_id; ?>" hidden>
                                            <button type="submit" name="submit_entercar" class="btn btn-primary ">Update Details</button>
                                            <!--<div class="w-100 m-auto row justify-content-center">-->
                                            <!--    <div class="col-md-6">-->
                                            <!--       <button type="submit" name="submit_entercar" class="mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Send <i class="fas fa-paper-plane text-white pl-3"></i></button>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('external_photo'); ?></span>
                                
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
                                               <span id="ex_ratio_error" style="color:red"></span>
                                               
                                               
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
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="ex_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="external_photo" class="custom-file-input external_photo" name="external_photo[]" onchange="preview_image();" required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('interior_photo'); ?></span>
                                
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
                                                           
                                                          <!--<div class="show-preview">-->
                                                          <!--   <div id="in_image_preview"></div>-->
                                                          <!--</div>-->
                                                          
                                                          <div class="custom-file">
                                                             <input type="file" id="interior_photo" class="interior_photo custom-file-input" name="interior_photo[]" onchange="preview_image_internal();" required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('document_photo'); ?></span>
                                
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
                                                             <input type="file" id="documents_photo" class="documents_photo custom-file-input" name="documents_photo[]" onchange="preview_image_document();" required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('engine_photo'); ?></span>
                                
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
                                                             <input type="file" id="engine_photo" class="engine_photo custom-file-input" name="engine_photo[]" onchange="preview_image_engine();" required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('transmission_photo'); ?></span>
                                
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
                                                             <input type="file" id="transmission_photo" class="transmission_photo custom-file-input" name="transmission_photo[]" onchange="preview_image_transmission();" required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('roof_photo'); ?></span>
                                
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
                                                             <input type="file" id="roof_photo" class="roof_photo custom-file-input" name="roof_photo[]" onchange="preview_image_roof();" required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('equipment_options'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('service_booklet_details'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('history_appointments'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('last_service_date'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('mileage_last_service'); ?></span>
                                            </div>
                                            
                                            <input type="text" class="form-control" id="coupon_id" name="coupon_id" value="<?= $cou_detail->id; ?>" hidden>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                            if(empty($coupon_media)){
                                        ?>
                                        <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#history-coupon-model">
                                            <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                            <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Photos Service booklet</h3>
                                        </a>
                                        <?php }else{ ?>
                                            <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#history-coupon-model">
                                              <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($coupon_media);?> Images</h5>
                                              <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                              <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Service booklet Photo +</h3>
                                            </a>
                                        <?php } ?>
                                
                                       
                                        <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('coupon_photo'); ?></span>
                                        
                                        <div class="modal fade" id="history-coupon-model" style="display: none;" aria-hidden="true">
                                          <div class="modal-dialog modal-lg col-4">
                                             <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="pb-0 border-0">
                                                   <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Photos Service booklet</h3>
                                                   <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                                </div>
                                                <!-- Modal body -->
                                                
                                             
                                                
                                                <div class="modal-body pt-0 text-center enter-images-field">
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
                                                                     <input type="file" id="coupon_photo" class="custom-file-input" name="coupon_photo[]" onchange="preview_image_coupon();">
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('service_booklet_details'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('history_appointments'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('last_service_date'); ?></span>
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
                                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('mileage_last_service'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#history-coupon-model">
                                            <i class="far fa-address-book fs-54 text-primary mb-4"></i>
                                            <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Photos Service booklet</h3>
                                        </a>
                                        <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('coupon_photo'); ?></span>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="history-coupon-model" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header pb-0 border-0">
                                                        <button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">×</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <div class="modal-body pt-0 text-center enter-images-field">
                                                        <div class="h-290">
                                                            <h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3">Upload Photos Service booklet</h3>
                                                            <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                                            <div class="d-flex justify-content-center">
                                                                <div class="control-group" id="fields">  
        
                                                                    <div class="coupon-controls">  
        
                                                                    <div class="entry input-group upload-input-group mb-4">  
        
                                                                        <div class="custom-file">
                                                                            <input type="file" id="coupon_photo" class="custom-file-input" name="coupon_photo[]" >
                                                                            <label class="custom-file-label text-left"></label>
                                                                        </div>  
        
                                                                        <button class="btn btn-success rounded btn-add-coupon" type="button">  
        
                                                                            <i class="fa fa-plus"> </i>  
        
                                                                        </button>  
        
                                                                    </div></div>  
        
                                                                    </div>
                                                            </div>
                            
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
                                <?php
                                    if(empty($technical_media)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#technical-inspection-model">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload photos technical inspection</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#technical-inspection-model">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($technical_media);?> Images</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More technical inspection Photo +</h3>
                                    </a>
                                <?php } ?>
                        
                               
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('technical_photo'); ?></span>
                                
                                <div class="modal fade" id="technical-inspection-model" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload photos technical inspection</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
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
                                                             <input type="file" id="technical_photo" class="custom-file-input" name="technical_photo[]" onchange="preview_image_technical();">
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
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#technical-inspection-model">
                                    
                                    <i class="fas fa-users-cog fs-54 text-primary mb-4"></i>
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload photos technical inspection</h3>
                                </a>
                                <!-- The Modal -->
                                <div class="modal fade" id="technical-inspection-model" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header pb-0 border-0">
                                                <button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">×</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body pt-0 text-center enter-images-field">
                                                <div class="h-290">
                                                    <h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3">Upload photos technical inspection</h3>
                                                    <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="control-group" id="fields">  

                                                            <div class="technical-controls">  

                                                            <div class="entry input-group upload-input-group mb-4">  

                                                                <div class="custom-file">
                                                                    <input type="file" id="technical_photo" class="custom-file-input" name="technical_photo[]" >
                                                                    <label class="custom-file-label text-left"></label>
                                                                </div>  

                                                                <button class="btn btn-success rounded btn-add-technical" type="button">  

                                                                    <i class="fa fa-plus"> </i>  

                                                                </button>  

                                                            </div></div>  

                                                            </div>
                                                    </div>
                                                    <a data-dismiss="modal" class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3 d-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></a>
                                                    
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
                                                        <input type="text" class="form-control"  id="part_thickness" name="part_thickness[]" value="<?= $part_details->thickness; ?>" placeholder="Paint Thickness..">
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
                                                        <input type="text" class="form-control"  id="part_thickness" name="part_thickness[]" placeholder="Paint Thickness.." required>
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
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('paint_thickness_photo'); ?></span>
                                
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
                                                             <input type="file" id="paint_thickness_photo" class="custom-file-input" name="paint_thickness_photo[]" required>
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

                                        <ul class="nav">

                                            <li>
                                                <a href="#tab-1" class="active" data-toggle="tab">
                                                    <h4>Front of the body</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon1.png">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#tab-2" data-toggle="tab" class="">
                                                    <h4>Left side of the body</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon2.png">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#tab-3" data-toggle="tab" class="">
                                                    <h4>Rear of the body</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon3.png">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#tab-4" data-toggle="tab" class="">
                                                    <h4>Right side of the body</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon4.png">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#tab-5" data-toggle="tab" class="">
                                                    <h4>Interior the car</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon5.png">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#tab-6" data-toggle="tab" class="">
                                                    <h4>Engine and transmission</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon6.png">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#tab-7" data-toggle="tab" class="">
                                                    <h4>Roof of the body</h4>
                                                    <img src="<?=base_url();?>assets/images/icons/damage_icon7.png">
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddfront_damage_located[]" value="<?= $front_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddfront_damage_type[]" value="<?= $front_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $front_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $front_damage->id; ?>/<?= $front_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?> 
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="front_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="front_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="front_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-front" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddleft_damage_located[]" value="<?= $left_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddleft_damage_type[]" value="<?= $left_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $left_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $left_damage->id; ?>/<?= $left_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?> 
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="left_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="left_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="left_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-left" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddrear_damage_located[]" value="<?= $rear_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddrear_damage_type[]" value="<?= $rear_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $rear_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $rear_damage->id; ?>/<?= $rear_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="rear_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="rear_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="rear_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-rear" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddright_damage_located[]" value="<?= $right_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.."readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddright_damage_type[]" value="<?= $right_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $right_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $right_damage->id; ?>/<?= $right_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="right_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="right_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="right_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-right" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddinterior_damage_located[]" value="<?= $interior_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddinterior_damage_type[]" value="<?= $interior_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $interior_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $interior_damage->id; ?>/<?= $interior_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="interior_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="interior_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="interior_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-interior" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddengine_damage_located[]" value="<?= $engine_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddengine_damage_type[]" value="<?= $engine_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $engine_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $engine_damage->id; ?>/<?= $engine_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="engine_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="engine_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="engine_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-engine" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddroof_damage_located[]" value="<?= $roof_damage->damage_located; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="ddroof_damage_type[]" value="<?= $roof_damage->type_of_damage; ?>" style="background-color:white;" placeholder="Type here.." readonly></td>
                                                            <td class="p-0"><div class="custom-file"><img style="width:100px; height:60px" src="<?= base_url(); ?>uploads/auction_car/damage_photo/<?= $roof_damage->media; ?>" alt=""></div></td>
                                                            <td class="p-1"><a href="<?= base_url(); ?>admin/delete_damage_detail/<?= $roof_damage->id; ?>/<?= $roof_damage->car_auction_id; ?>"  class="ajaxdelete btn btn-danger rounded" type="button"><i class="fa fa-trash text-white"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                        <tr class="entry mb-5"> 
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="roof_damage_located[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><input type="text" class="form-control damage-input" name="roof_damage_type[]" placeholder="Type here.."></td>
                                                            <td class="p-0"><div class="custom-file"><input type="file" class="custom-file-input damage-input" name="roof_damage_image[]"><label class="custom-file-label border-0 text-muted"></label></div></td>
                                                            <td class="p-1"><button class="btn btn-success rounded btn-add-dam-roof" type="button"><i class="fa fa-plus"></i></button></td>
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
                            <div class="col-lg-4 mb-3">
                                
                                <?php
                                    if(empty($wheel_media)){
                                ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#wheel-detail-model1">
                                    <img src="<?= base_url();?>assets/images/icons/damage_icon5.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Car Wheel Photo</h3>
                                </a>
                                <?php }else{ ?>
                                    <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#wheel-detail-model1">
                                      <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added <?= count($wheel_media);?> Images</h5>
                                      <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                      <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Car Wheel Photo +</h3>
                                    </a>
                                <?php } ?>
                                <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('tire_photo'); ?></span>
                                        
                               
                               
                                <div class="modal fade" id="wheel-detail-model1" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="pb-0 border-0">
                                           <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload Car Wheel Photo</h3>
                                           <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                        </div>
                                        <!-- Modal body -->
                                        
                                     
                                        
                                        <div class="modal-body pt-0 text-center enter-images-field">
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
                                                             <input type="file" id="tire_photo" class="custom-file-input" name="tire_photo[]" >
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
                            <div class="col-lg-4 mb-3">
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#wheel-detail-model1">
                                    <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                    <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload Car Wheel Photo</h3>
                                </a>
                                <!-- The Modal -->
                                <div class="modal fade" id="wheel-detail-model1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header pb-0 border-0">
                                                <button type="button" class="close p-2 pr-3 fs-28" data-dismiss="modal">×</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body pt-0 text-center enter-images-field">
                                                <div class="h-290">
                                                    <h3 class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3">Upload Car Wheel Photo</h3>
                                                    <img src="<?= base_url(); ?>assets/images/icons/damage_icon1.png" alt="">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="control-group" id="fields">  

                                                            <div class="tire-controls">  

                                                            <div class="entry input-group upload-input-group mb-4">  

                                                                <div class="custom-file">
                                                                    <input type="file" id="tire_photo" class="custom-file-input" name="tire_photo[]" >
                                                                    <label class="custom-file-label text-left"></label>
                                                                </div>  

                                                                <button class="btn btn-success rounded btn-add-tire" type="button">  

                                                                    <i class="fa fa-plus"> </i>  

                                                                </button>  

                                                            </div></div>  

                                                            </div>
                                                    </div>
                                                    <a data-dismiss="modal" class="enter-images-model bg-dark-blue text-white fs-18 p-2 mt-4 mb-3 d-block">Add <i class="fas fa-paper-plane text-white pl-3"></i></a>
                                                    
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
                                    <textarea class="form-control" name="note_from_sellar" id="note_from_sellar" rows="4" placeholder="Enter Text.."><?php if(!empty($auction_details->note_from_sellar)){ echo $auction_details->note_from_sellar; }?></textarea>
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
    <div class="row" id="video_section">

        <div class="col-md-12">

            <div class="card">
                
                <div class="card-body">

                    <div class="item2-gl">
                        
                        <div class="section-title center-block text-center"> 

                            <h2 class="text-green font-weight-semibold mt-3">Insert Videos</h2> 

                        </div>
                        <div class="row mb-5">
                            
                        <div class="col-lg-4 mb-3">
                            <?php
                             if(isset($single_auction_details)){
                             foreach($single_auction_details as $single_details){
                                 if(empty($single_details->main_video)){
                            ?>
                            <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-video-model">
                                <i class="fab fa-youtube fs-54 text-primary mb-4"></i>
                                <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload exterior + interior car videos</h3>
                            </a>
                            <?php }else{ ?>
                                <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-video-model">
                                  <h5 class="text-green font-weight-semibold fs-14 mb-2">You Have Successfully Added Car Video.<br> Click to see preview.</h5>
                                  <div class="image-add-gif m-auto mb-1"><img src="<?= base_url(); ?>assets/images/media/payment-done.gif" alt=""></div>
                                  <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload More Upload exterior + interior car videos +</h3>
                                </a>
                            <?php } } } else{ ?>
                            
                            <a href="" class="enter-auction-card mb-4 d-block text-center" data-toggle="modal" data-target="#enter-video-model">
                                <i class="fab fa-youtube fs-54 text-primary mb-4"></i>
                                <h3 class="mb-0 text-left card-active-btn text-center font-weight-semibold fs-14">Upload exterior + interior car videos</h3>
                            </a>
                            
                            <?php } ?>
                            <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('main_video'); ?></span>
                            
                            <div class="modal fade" id="enter-video-model" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="pb-0 border-0">
                                       <h3 class="bg-dark-blue text-white text-center fs-18 p-3 position-relative mt-5 mr-3 ml-3 mb-5">Upload exterior + interior car videos</h3>
                                       <button type="button" class="close p-2 pr-3 fs-28 model-cross-btn" data-dismiss="modal">×</button>
                                    </div>
                                    <!-- Modal body -->
                                    <?php 
                                        $attributes = array( 'id'=>'enter_car', 'method' =>'post', 'class' => 'card-body'); 
                                        echo form_open_multipart('Admin/update_video_auction_car', $attributes); 
                                    ?>
                                 
                                    
                                    <div class="modal-body pt-0 text-center enter-images-field">
                                       <div class="h-290">
                                           <h6>(Add Youtube Embed Code Only)</h6>
                                           <?php
                                                if(!empty($single_auction_details)){
                                                
                                            ?>
                                          <div class="preview-img-box d-flex flex-wrap justify-content-center align-items-center">
                                            <?php
                                                
                                                foreach($single_auction_details as $single_details){
                                            ?>
                                              <?= $single_details->main_video; ?>
                                              
                                             <!--<div class="preview-img">-->
                                             <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/qbRwwZFPGuE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                                 <!--<iframe width="400" height="100" src="<?= $single_details->main_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                                <!--<img src="<?= base_url(); ?>uploads/auction_car/slider_photo/<?= $media_transmission->media; ?>" alt="">-->
                                                <!--<a href="<?= base_url(); ?>admin/delete_auction_media/<?= $media_transmission->id; ?>/<?= $media_transmission->car_auction_id; ?>"><i class="fas fa-times img-cross-icon text-white fs-12"></i></a>-->
                                             <!--</div>-->
                                             
                                            <?php }  ?> 
                                             
                                          </div>
                                          <?php } ?> 
                                          <div class="d-flex justify-content-center">
                                                <div class="control-group" id="fields">  
                                                    <div class="controls"> 
                                                        <div class="entry input-group upload-input-group mb-4"> 
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" id="main_video" name="main_video" value="<?php echo set_value('main_video', $this->session->userdata('main_video')); ?>" placeholder="Insert the Youtube Embed Video code">
                                                            </div> 
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
                              <!--<div class="form-group mb-5">-->
                              <!--   <div class="row align-items-center">-->
                              <!--      <div class="col-md-6">-->
                              <!--         <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="auction_time">Start Time</label>-->
                              <!--      </div>-->
                              <!--      <div class="col-md-6">-->
                              <!--         <input type="datetime-local" class="form-control" min="" id="auction_time" value="" name="auction_time" placeholder="Enter Start Time">-->
                              <!--      </div>-->
                              <!--   </div>-->
                              <!--</div>-->
                              <div class="form-group mb-5">
                                 <div class="row align-items-center">
                                    <div class="col-md-6">
                                       <label class="form-label mb-0 text-primary fs-19 position-relative service-booklet-label font-weight-semibold" for="end_auction_time">End Time</label>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="datetime-local" class="form-control" min="11-1-2022" id="end_auction_time" value="<?php if(!empty($auction_details->end_auction_time)){ echo $auction_details->end_auction_time;} ?>" name="end_auction_time" placeholder="Enter End Time">
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
                            
                            <span class="error d-flex justify-content-left" style="color:red"><?php echo form_error('type'); ?></span>
                            
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
                                                                
                                                                <input type="file" class="main_image custom-file-input" id="main_image" name="main_image" onchange="preview_image_mainimage();" >
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
                     <!--<div class="row justify-content-center">-->
                     <!--   <div class="col-md-6">-->
                     <!--      <a href="" class="mb-5 text-left card-active-btn text-center text-uppercase font-weight-semibold fs-16">Send <i class="fas fa-paper-plane text-white pl-3"></i></a>-->
                     <!--   </div>-->
                     <!--</div>-->
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




