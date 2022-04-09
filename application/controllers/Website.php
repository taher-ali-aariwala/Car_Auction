<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	
    /**********************************************************************/
    /**********************************************************************/
    /**************************** Website *******************************/
    /**********************************************************************/
    /**********************************************************************/
    
	public function index(){
	    
	    // Page Specific Information
	    $data['view']='website/index';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Index';
	    
	    $this->load->model('Auction_model');
	    
	    if(isset($_SESSION['dl_logged_in'])){
	        if(!empty($_SESSION['dl_user_id'])){
	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
	        }
	    }
        	    
	    $data['all_auctions'] = $this->Auction_model->get_auctions_publish_eight();
        $data['all_main_images'] = $this->Auction_model->get_all_main_image_eight();
        	    
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
	
	public function about(){
	    
	    // Page Specific Information
	    $data['view']='website/about-us';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | About Us';
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
    public function expert(){
	    
	    // Page Specific Information
	    $data['view']='website/expert';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Become An Expert';
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
	public function contact(){
	    
	    // Page Specific Information
	    $data['view']='website/contact';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Contact Us';
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
	public function privacy(){
	    
	    // Page Specific Information
	    $data['view']='website/privacy-policy';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Privacy Policy';
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
	public function terms(){
	    
	    // Page Specific Information
	    $data['view']='website/terms-&-condition';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Terms & Condition';
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
    public function login(){
	    
	    // Page Specific Information
	    $data['view']='website/login';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Login';
	    
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
	
	
	public function register(){
	    
	    // Page Specific Information
	    $data['view']='website/register';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Register';
	    
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}
	
	public function forget_password(){
	    
	    // Page Specific Information
	    $data['view']='website/forget_password';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Forget Password';
	    
	   // Loads View
		$this->load->view('website/layouts/main',$data);
	       
	}



   public function sellcar_email(){
        include APPPATH . 'sendgrid/sendgrid-php.php';
        // $this->load->config('sendgrid_config');
        
        $this->form_validation->set_rules('name', 'name', 'required|alpha|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('surname', 'surname', 'required|alpha|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required|numeric');
        $this->form_validation->set_rules('city', 'city', 'required|alpha');
        $this->form_validation->set_rules('make', 'make', 'required');
        $this->form_validation->set_rules('model', 'model', 'required');
        $this->form_validation->set_rules('year', 'year', 'required|numeric');
        $this->form_validation->set_rules('kilometers', 'kilometers', 'required|numeric');
        $this->form_validation->set_rules('engine', 'engine', 'required');
        $this->form_validation->set_rules('gearbox', 'gearbox', 'required');
        
    		
    		if($this->form_validation->run() == FALSE){
   
                // Page Specific Information
        	    $data['view']='website/index';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Home';
        	    
        	   // Loads View
        		$this->load->view('website/layouts/main',$data);
    
    		}  
    		else{
        
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                $email->setSubject("Seller Request");
                $email->addTo('astemotoricar@gmail.com', "Astemotori Admin");
                
                $data['name'] = $this->input->post('name');
                $data['surname'] = $this->input->post('surname');
                $data['phone'] = $this->input->post('phone');
                $data['email'] = $this->input->post('email');
                $data['city'] = $this->input->post('city');
                $data['make'] = $this->input->post('make');
                $data['model'] = $this->input->post('model');
                $data['year'] = $this->input->post('year');
                $data['kilometers'] = $this->input->post('kilometers');
                $data['engine'] = $this->input->post('engine');
                $data['gearbox'] = $this->input->post('gearbox');
                $data['sellar_note'] = $this->input->post('sellar_note');
                  
                $content = $this->load->view('mail/sell_car',$data,true);
                $email->addContent(
                    "text/html",$content);
        
                $sendgrid = new \SendGrid(('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'));
                try {
                    $response = $sendgrid->send($email);
                    $this->session->set_flashdata('success_sellcar','Car sell details send Successfully, Astemotori Admin will contact you soon!');
                    redirect('website/index');
                    // print $response->statusCode() . "\n";
                    // print_r($response->headers());
                    // print $response->body() . "\n";
                } catch (Exception $e) {
                    // echo 'Caught exception: '. $e->getMessage() ."\n";
                    $this->session->set_flashdata('error_sellcar','Error in sending Car sell details, Please try again!');
                    redirect('website/index');
                }
    		}
    }
    
    // -----------------------------------------
    // ---------   auction website  ------------
    
      
    
    public function auction_list(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if(($_SESSION['dl_logged_in'])){
	          
        	    $this->load->model('Auction_model');
        	    $this->load->model('Dealer_model');
        	    $this->load->library("pagination");
        	    
        	    $config = array();
                $config["base_url"] = base_url() . "/Website/auction_list/";
                $config["total_rows"] = $this->Auction_model->get_count_auctions();
                $config["per_page"] = 9;
                $config["uri_segment"] = 3;
                // $config["use_page_numbers"] = TRUE;
                
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
                $data["links"] = $this->pagination->create_links();
        
                $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                $data['all_auctions_brandarr'] = $this->Auction_model->get_auctions_publish_brands();
                
        
        	    // Page Specific Information
        	    $data['view']='website/auction_list';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Auction List';
        	   // $data['all_auctions'] = $this->Auction_model->get_auctions_publish();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
                foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
                
        	    $data['brands'] = $this->Dealer_model->get_brands_notfeatured();
        	    $data['featured_brands'] = $this->Dealer_model->get_featured_brands();
        	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it_withoutfeature();
        	    $data['featured_where_is_its'] = $this->Dealer_model->get_featured_where_is_it();
        	    $data['body_types'] = $this->Dealer_model->get_body_type();
        	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
        	    $data['transmissions'] = $this->Dealer_model->get_transmission();
        	    $data['equipments'] = $this->Dealer_model->get_equipments();
        	    $data['years'] = $this->Dealer_model->get_year();
        	    $data['prices'] = $this->Dealer_model->get_price();
        	    $data['mileages'] = $this->Dealer_model->get_mileage();
        	    
        	   // Loads View
        		$this->load->view('website/layouts/main',$data);
		
            }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }
	   // ------------------------------------
	   //--------------admin------------------
	    
	    else if(isset($_SESSION['am_logged_in'])){
    	        if(($_SESSION['am_logged_in'])){
    	          
            	    $this->load->model('Auction_model');
            	    $this->load->model('Dealer_model');
            	    
            	    $this->load->library("pagination");
        	    
            	    $config = array();
                    $config["base_url"] = base_url() . "/Website/auction_list/";
                    $config["total_rows"] = $this->Auction_model->get_count_auctions();
                    $config["per_page"] = 9;
                    $config["uri_segment"] = 3;
                    // $config["use_page_numbers"] = TRUE;
                    
                    $this->pagination->initialize($config);
    
                    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
                    $data["links"] = $this->pagination->create_links();
            
                    $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                    $data['all_auctions_brandarr'] = $this->Auction_model->get_auctions_publish_brands();
            	    // Page Specific Information
            	    $data['view']='website/auction_list';
            	    $data['page'] = 'page';
            	    $data['title'] = 'Astermotori | Auction List';
            	   // $data['all_auctions'] = $this->Auction_model->get_auctions_publish();
            	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
            	    if(isset($_SESSION['dl_logged_in'])){
            	        if(!empty($_SESSION['dl_user_id'])){
            	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
            	        }
            	    }
            	    
            	    $data['brands'] = $this->Dealer_model->get_brands_notfeatured();
            	    $data['featured_brands'] = $this->Dealer_model->get_featured_brands();
            	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it_withoutfeature();
            	    $data['featured_where_is_its'] = $this->Dealer_model->get_featured_where_is_it();
            	    $data['body_types'] = $this->Dealer_model->get_body_type();
            	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
            	    $data['transmissions'] = $this->Dealer_model->get_transmission();
            	    $data['equipments'] = $this->Dealer_model->get_equipments();
            	    $data['years'] = $this->Dealer_model->get_year();
            	    $data['prices'] = $this->Dealer_model->get_price();
            	    $data['mileages'] = $this->Dealer_model->get_mileage();
        	    
            	   // Loads View
            		$this->load->view('website/layouts/main',$data);
    		
                }else{
    	            $this->session->set_flashdata('error','Please Login To Continue');
    	            redirect('website/login');
	        }
	    }
	   // --------------------------------------------
	   //---------------------------------------------
	    else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }   
	}
	
	public function auction_details(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    $this->load->model('Auction_model');
        	   // $this->load->library("pagination");
        	    
        	   // $config = array();
            //     $config["base_url"] = base_url() . "/Website/auction_list/";
            //     $config["total_rows"] = $this->Auction_model->get_count_auctions();
            //     $config["per_page"] = 9;
            //     $config["uri_segment"] = 3;
            //     // $config["use_page_numbers"] = TRUE;
                
            //     $this->pagination->initialize($config);

            //     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
            //     $data["links"] = $this->pagination->create_links();
        
            //     $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                
        	    // Page Specific Information
        	    $data['view']='website/auction_details';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Auction Details';
        	    
        	    $auction_id = $this->uri->segment(3);
        	    $data['all_auctions'] = $this->Auction_model->get_auctions_publish_wp();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    $data['auction_id'] = $auction_id;
        	    
        	    $data['all_bids'] = $this->Auction_model->get_bids($auction_id);
        	    
        	    $data['all_bids_with_automatic'] = $this->Auction_model->get_automatic_bids($auction_id);
        	    
        	    $data['check_exceed_mail'] = $this->Auction_model->get_mail_msg_check();
        	    
        	    foreach($data['all_bids'] as $bid){
                     $array_maxbid[] = $bid->latest_bid; 
                }
                if(!empty($data['all_bids'])){
                 $maxbid = max($array_maxbid);
                
        	    $data['maxbid_dealer_id'] = $this->Auction_model->get_maxbid_dealer_id($maxbid, $auction_id);
                }
                
                if(isset($_SESSION['dl_logged_in'])){
        	        if($_SESSION['dl_logged_in']){
                	    $data['single_dealer_bids'] = $this->Auction_model->get_dealer_bid($auction_id, $_SESSION['dl_user_id']);
        	        }
                }
        	        
        	        
        	    $data['morevideos'] = $this->Auction_model->get_morevideos($auction_id);
        	    
        	    $data['single_auction_details'] = $this->Auction_model->get_single_auction($auction_id);
        	    
        	    $data['auction_media'] = $this->Auction_model->get_auction_media($auction_id);
        	    
        	    $data['auction_media_main'] = $this->Auction_model->get_auction_main_media($auction_id);
        	    
        	    $data['all_equipments'] = $this->Auction_model->get_equipments();
        	    
        	   // -------------damage_defects--------------
        	   $data['all_damage_defects'] = $this->Auction_model->get_all_damage_defect($auction_id);
        	   
        	   $data['left_damage_defects'] = $this->Auction_model->get_left_damage_defect($auction_id);
        	   $data['right_damage_defects'] = $this->Auction_model->get_right_damage_defect($auction_id);
        	   $data['rear_damage_defects'] = $this->Auction_model->get_rear_damage_defect($auction_id);
        	   $data['engine_damage_defects'] = $this->Auction_model->get_engine_damage_defect($auction_id);
        	   $data['interior_damage_defects'] = $this->Auction_model->get_interior_damage_defect($auction_id);
        	   $data['front_damage_defects'] = $this->Auction_model->get_front_damage_defect($auction_id);
        // 	 ------------------------------------
              $data['all_dam_media'] = $this->Auction_model->get_all_damage_defect_photos($auction_id);
         
        	   $data['all_front_dam_media'] = $this->Auction_model->get_front_damage_defect_photos($auction_id);
        	   $data['all_left_dam_media'] = $this->Auction_model->get_left_damage_defect_photos($auction_id);
        	   $data['all_right_dam_media'] = $this->Auction_model->get_right_damage_defect_photos($auction_id);
        	   $data['all_rear_dam_media'] = $this->Auction_model->get_rear_damage_defect_photos($auction_id);
        	   $data['all_engine_dam_media'] = $this->Auction_model->get_engine_damage_defect_photos($auction_id);
        	   $data['all_interior_dam_media'] = $this->Auction_model->get_interior_damage_defect_photos($auction_id);
        	   $data['all_roof_dam_media'] = $this->Auction_model->get_roof_damage_defect_photos($auction_id);
        	   
        	   //  --------------------------
        	   $data['roof_damage_defects'] = $this->Auction_model->get_roof_damage_defect($auction_id);
        	   
        	   
        	   
        	   
        	   // -----part_paint_details------
        	    $data['part_paint_details'] = $this->Auction_model->get_part_paint_details($auction_id);
        	    
        	     $data['part_paint_media'] = $this->Auction_model->get_part_paint_media($auction_id);
        	     
        	   // ----------wheel details------
        	    $data['wheel_details'] = $this->Auction_model->get_wheel_details($auction_id);
        	     foreach($data['wheel_details'] as $tire){
        	         $tire_id = $tire->id;
        	     }
        	     if(!empty($tire_id)){
        	     $data['wheel_media'] = $this->Auction_model->get_wheel_media($tire_id);
        	     }
        	      // ----------coupon details------
        	    $data['coupon_details'] = $this->Auction_model->get_coupon_details($auction_id);
        	     foreach($data['coupon_details'] as $coupon){
        	         $coupon_id = $coupon->id;
        	     }
        	     if(!empty($coupon_id)){
        	     $data['coupon_media'] = $this->Auction_model->get_coupon_media($coupon_id);
        	     }
        	      // ----------technical details------
        	    $data['technical_details'] = $this->Auction_model->get_technical_details($auction_id);
        	     foreach($data['technical_details'] as $technical){
        	         $technical_id = $technical->id;
        	     }
        	     if(!empty($technical_id)){
        	     $data['technical_media'] = $this->Auction_model->get_technical_media($technical_id);
        	     }
        	     
        	   $data['test_drive_details'] = $this->Auction_model->get_test_drive_details($auction_id);
        	   // Loads View
        		$this->load->view('website/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else 
	   // ------------------------------------
	   //-----------------admin----------------
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    $this->load->model('Auction_model');
        	    
        	    // Page Specific Information
        	    $data['view']='website/auction_details';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Auction Details';
        	    
        	    $auction_id = $this->uri->segment(3);
        	    
                $data['auction_id'] = $auction_id;
        	    $data['all_bids'] = $this->Auction_model->get_bids($auction_id);
        	    $data['all_bids_with_automatic'] = $this->Auction_model->get_automatic_bids($auction_id);
        	    $data['check_exceed_mail'] = $this->Auction_model->get_mail_msg_check();
        	    
        	    foreach($data['all_bids'] as $bid){
                     $array_maxbid[] = $bid->latest_bid; 
                }
                if(!empty($data['all_bids'])){
                 $maxbid = max($array_maxbid);
        	    $data['maxbid_dealer_id'] = $this->Auction_model->get_maxbid_dealer_id($maxbid, $auction_id);
                }
	    
	            if(isset($_SESSION['am_logged_in'])){
        	        if($_SESSION['am_logged_in']){
                	    $data['single_dealer_bids'] = $this->Auction_model->get_dealer_bid($auction_id, $_SESSION['am_user_id']);
        	        }
                }
            //     $this->load->library("pagination");
        	    
        	   // $config = array();
            //     $config["base_url"] = base_url() . "/Website/auction_list/";
            //     $config["total_rows"] = $this->Auction_model->get_count_auctions();
            //     $config["per_page"] = 9;
            //     $config["uri_segment"] = 3;
            //     // $config["use_page_numbers"] = TRUE;
                
            //     $this->pagination->initialize($config);

            //     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
            //     $data["links"] = $this->pagination->create_links();
        
            //     $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                
        	    $data['all_auctions'] = $this->Auction_model->get_auctions_publish_wp();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    
        	    $data['morevideos'] = $this->Auction_model->get_morevideos($auction_id);
        	    
        	    $data['single_auction_details'] = $this->Auction_model->get_single_auction($auction_id);
        	    
        	    $data['auction_media'] = $this->Auction_model->get_auction_media($auction_id);
        	    
        	    $data['auction_media_main'] = $this->Auction_model->get_auction_main_media($auction_id);
        	    
        	    $data['all_equipments'] = $this->Auction_model->get_equipments();
        	    
        	   // -------------damage_defects--------------
        	   $data['all_damage_defects'] = $this->Auction_model->get_all_damage_defect($auction_id);
        	    
        	   $data['left_damage_defects'] = $this->Auction_model->get_left_damage_defect($auction_id);
        	   $data['right_damage_defects'] = $this->Auction_model->get_right_damage_defect($auction_id);
        	   $data['rear_damage_defects'] = $this->Auction_model->get_rear_damage_defect($auction_id);
        	   $data['engine_damage_defects'] = $this->Auction_model->get_engine_damage_defect($auction_id);
        	   $data['interior_damage_defects'] = $this->Auction_model->get_interior_damage_defect($auction_id);
        	   $data['front_damage_defects'] = $this->Auction_model->get_front_damage_defect($auction_id);
        // 	 ------------------------------------
                $data['all_dam_media'] = $this->Auction_model->get_all_damage_defect_photos($auction_id);
        
        	   $data['all_front_dam_media'] = $this->Auction_model->get_front_damage_defect_photos($auction_id);
        	   $data['all_left_dam_media'] = $this->Auction_model->get_left_damage_defect_photos($auction_id);
        	   $data['all_right_dam_media'] = $this->Auction_model->get_right_damage_defect_photos($auction_id);
        	   $data['all_rear_dam_media'] = $this->Auction_model->get_rear_damage_defect_photos($auction_id);
        	   $data['all_engine_dam_media'] = $this->Auction_model->get_engine_damage_defect_photos($auction_id);
        	   $data['all_interior_dam_media'] = $this->Auction_model->get_interior_damage_defect_photos($auction_id);
        	   $data['all_roof_dam_media'] = $this->Auction_model->get_roof_damage_defect_photos($auction_id);
        	   
        	   //  --------------------------
        	   $data['roof_damage_defects'] = $this->Auction_model->get_roof_damage_defect($auction_id);
        	   
        	   
        	   
        	   
        	   // -----part_paint_details------
        	    $data['part_paint_details'] = $this->Auction_model->get_part_paint_details($auction_id);
        	    
        	     $data['part_paint_media'] = $this->Auction_model->get_part_paint_media($auction_id);
        	     
        	   // ----------wheel details------
        	    $data['wheel_details'] = $this->Auction_model->get_wheel_details($auction_id);
        	     foreach($data['wheel_details'] as $tire){
        	         $tire_id = $tire->id;
        	     }
        	     if(!empty($tire_id)){
        	     $data['wheel_media'] = $this->Auction_model->get_wheel_media($tire_id);
        	     }
        	      // ----------coupon details------
        	    $data['coupon_details'] = $this->Auction_model->get_coupon_details($auction_id);
        	     foreach($data['coupon_details'] as $coupon){
        	         $coupon_id = $coupon->id;
        	     }
        	     if(!empty($coupon_id)){
        	     $data['coupon_media'] = $this->Auction_model->get_coupon_media($coupon_id);
        	     }
        	      // ----------technical details------
        	    $data['technical_details'] = $this->Auction_model->get_technical_details($auction_id);
        	     foreach($data['technical_details'] as $technical){
        	         $technical_id = $technical->id;
        	     }
        	     if(!empty($technical_id)){
        	     $data['technical_media'] = $this->Auction_model->get_technical_media($technical_id);
        	     }
        	     
        	   $data['test_drive_details'] = $this->Auction_model->get_test_drive_details($auction_id);
        	   // Loads View
        		$this->load->view('website/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }
	    
	    
	   // -------------------------------------
	   //--------------------------------------
	    else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }        
	}

    public function buy(){
	    
	    // Page Specific Information
	    $data['view']='website/buy';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Buy';
	    
	    $this->load->view('website/layouts/main',$data);
	       
	}
	public function sell(){
	    
	    // Page Specific Information
	    $data['view']='website/sell';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Sell';
	    
	    $this->load->view('website/layouts/main',$data);
	       
	}
	public function how_it_works(){
	    
	    // Page Specific Information
	    $data['view']='website/how-it-works';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | How It Wors';
	    
	    $this->load->view('website/layouts/main',$data);
	       
	}
	public function faq(){
	    
	    // Page Specific Information
	    $data['view']='website/faq';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | FAQ';
	    
	    $this->load->view('website/layouts/main',$data);
	       
	}
	
	public function auction_make_bid(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    $this->load->model('Auction_model');
        	    
        	    if(isset($_POST["make_offer_submit"])){
    	    
                    $data['start_bid']=$this->input->post('bid');
                    $data['makeoffer_bid']=$this->input->post('bid');
                    $data['makeoffer_time']=date('Y-m-d H:i:s');
            	    $data['car_auction_id']=$this->input->post('auction_id');
            	    $data['dealer_id'] = $_SESSION['dl_user_id'];
        		    $data['status'] = 'new';
        		    $data['latest_bid'] = $this->input->post('bid');
            		    
                    $this->form_validation->set_rules('bid', 'bid', 'required|numeric|min_length[1]|max_length[9]');
                
                    if($this->form_validation->run() == FALSE){
           
                        $this->session->set_flashdata('error','Bid must be in 1 to 9 digits only, please try again!');
                        redirect('website/auction_details/'.$data['car_auction_id']);
            
            		}  
            		else{
            		    
            		    $bid_id = $this->Auction_model->save_auction_bid($data);
            		    if(!empty($bid_id)){
            		        $this->session->set_flashdata('success','Bid Successfully!');
                            redirect('website/auction_details/'.$data['car_auction_id']);
            		    }else{
            		        $this->session->set_flashdata('error','Bid not Added, please try again!');
                            redirect('website/auction_details/'.$data['car_auction_id']);
            		    }
            		    
            		}
        	    }
	        }   
        }  
	}
	
	public function auction_automatic_bid(){
	    
	    include APPPATH . 'sendgrid/sendgrid-php.php';
	    
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    $this->load->model('Auction_model');
        	    
        	    if(isset($_POST["automatic_submit"])){
    	    
                    $data['automatic_bid'] = $this->input->post('automatic_bid');
                    $data['automaticbid_time']=date('Y-m-d H:i:s');
            	    $bid_id = $this->input->post('bid_id');
            	    $auction_id = $this->input->post('auction_id');  
                    $this->form_validation->set_rules('automatic_bid', 'automatic_bid', 'required|numeric|min_length[1]|max_length[9]');
                
                    if($this->form_validation->run() == FALSE){
           
                        $this->session->set_flashdata('error','Automatic Bid must be in 1 to 9 digits only, please try again!');
                        redirect('website/auction_details/'.$auction_id);
            
            		}  
            		else{
            		    
            		    $bid_id_done = $this->Auction_model->update_auction_automatic_bid($data, $bid_id);
            		    if(!empty($bid_id_done)){
            		        
            		        $bid_details = $this->Auction_model->get_bid_details($bid_id);
            		      //var_dump($bid_details); die;
                            foreach($bid_details as $b_detail){
                                $dealer_id = $b_detail->dealer_id;
                                $automatic_bid = $b_detail->automatic_bid;
                                $auction_id = $b_detail->car_auction_id;
                            }
                           
                    		$dealer_details = $this->Auction_model->get_bid_dealer_detail($dealer_id);
                		    foreach($dealer_details as $d_detail){
                                $dealer_name = $d_detail->name;
                                $dealer_surname = $d_detail->surname;
                                $dealer_email = $d_detail->email;
                            }
                            
                            $single_auction_details = $this->Auction_model->get_single_auction($auction_id);
                            foreach($single_auction_details as $s_detail){
                                $brand = $s_detail->brand;
                                $model = $s_detail->model;
                            }
            
            		       
            		      // ------------------------------------------------------------------ 
            		      // -----------------email to admin about automatic info-------------- 
            		      
            		       //mail function 
                            $email = new \SendGrid\Mail\Mail();
                            $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                            $email->setSubject("Auction Automatic Bid information");
                            $email->addTo('astemotoricar@gmail.com' , 'Astemotori Admin');
                            
                            $d['name'] = $dealer_name;
                            $d['surname'] = $dealer_surname;
                            $d['automatic_bid'] = $automatic_bid;
                            $d['auction_id'] = $auction_id;
                            $d['brand'] = $brand;
                            $d['model'] = $model;
            
                            $content = $this->load->view('mail/automatic_bid_info_admin',$d,true);
                            $email->addContent(
                                "text/html",$content);
                    
                            $sendgrid = new \SendGrid(('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'));
                            try {
                                $response = $sendgrid->send($email);
                                
                                if($response){
                                
                                
                                // ------------------------------------------------------------------ 
            		            //  ------------------email to dealer about automatic bit------------
            		      
                                    //mail function 
                                    $email = new \SendGrid\Mail\Mail();
                                    $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                                    $email->setSubject("Auction Automatic Bid information");
                                    $email->addTo($dealer_email, $dealer_name);
                                    
                                    $d['name'] = $dealer_name;
                                    $d['surname'] = $dealer_surname;
                                    $d['automatic_bid'] = $automatic_bid;
                                    $d['auction_id'] = $auction_id;
                                    $d['brand'] = $brand;
                                    $d['model'] = $model;
                                    
                                    $content = $this->load->view('mail/automatic_bid_info',$d,true);
                                    $email->addContent(
                                        "text/html",$content);
                            
                                    $sendgrid = new \SendGrid(('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'));
                                    try {
                                        $response = $sendgrid->send($email);
                                        
                                        if($response){
                                        
                                        }
                                        
                                    } catch (Exception $e) {
                                       
                                    }
                                
                                
                                
                                }
                                
                            } catch (Exception $e) {
                               
                            }
                            
                            
            		        
            		        $this->session->set_flashdata('success','Automatic Bid Added Successfully!');
                            redirect('website/auction_details/'.$auction_id);
            		    }else{
            		        $this->session->set_flashdata('error','Automatic Bid not Added, please try again!');
                            redirect('website/auction_details/'.$auction_id);
            		    }
            		    
            		}
        	    }
	        }   
        }  
	}
	
	public function auction_make_bid_again(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    $this->load->model('Auction_model');
        	    
        	    if(isset($_POST["make_offer_submit_again"])){
    	    
                    $latest_bid = $this->input->post('latest_bid');
            	    $bid_id = $this->input->post('bid_id');
            	    $auction_id = $this->input->post('auction_id');
        		    $status = 'manual';
            		    
                    $this->form_validation->set_rules('latest_bid', 'latest_bid', 'required|numeric|min_length[1]|max_length[9]');
                
                    if($this->form_validation->run() == FALSE){
           
                        $this->session->set_flashdata('error','Bid must be in 1 to 9 digits only, please try again!');
                        redirect('website/auction_details/'.$auction_id);
            
            		}  
            		else{
            		    
            		    $bid_idd = $this->Auction_model->save_auction_bid_again($latest_bid, $bid_id, $status );
            		    if(!empty($bid_idd)){
                		    $data2['makeoffer_bid']=$latest_bid;
                            $data2['makeoffer_time']=date('Y-m-d H:i:s');
                            $bid_id_done = $this->Auction_model->update_auction_automatic_bid($data2, $bid_id);
                            if(!empty($bid_id_done)){
                		        $this->session->set_flashdata('success','Bid Successfully!');
                                redirect('website/auction_details/'.$auction_id);
                		    }else{
                		        $this->session->set_flashdata('error','Bid not Added, please try again!');
                                redirect('website/auction_details/'.$auction_id);
                		    }
            		    
            		    }else{
            		        $this->session->set_flashdata('error','Bid not Added, please try again!');
                            redirect('website/auction_details/'.$auction_id);
            		    }
            		    
            		}
        	    }
	        }   
        }  
	}
	
	
	public function save_automatic_bids(){
	   
	    $this->load->model('Auction_model');
	    
        $latest_bid = $this->input->post('latest_bid');
	    $bid_id = $this->input->post('bid_id');
	    $status = 'automatic';
		    
		$this->Auction_model->save_auction_bid_again($latest_bid, $bid_id, $status);
		
// 		$this->load->library("pagination");
        	    
//     	    $config = array();
//             $config["base_url"] = base_url() . "/Website/auction_list/";
//             $config["total_rows"] = $this->Auction_model->get_count_auctions();
//             $config["per_page"] = 9;
//             $config["uri_segment"] = 3;
//             // $config["use_page_numbers"] = TRUE;
            
//             $this->pagination->initialize($config);

//             $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
//             $data["links"] = $this->pagination->create_links();
    
//             $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                
		$all_auctions = $this->Auction_model->get_auctions_publish_wp();
		
		$array_all_bids = array();
		$array_automatic_bids = array();
		
		foreach($all_auctions as $auction){ 
		  
		    $auction_id = $auction->id;
		   
    		$dd['ajax_all_bids'] = $this->Auction_model->get_bids($auction_id);
    	    $dd['ajax_all_bids_with_automatic'] = $this->Auction_model->get_automatic_bids($auction_id);
    	    
    	    array_push($array_all_bids,$dd['ajax_all_bids']);
    	    array_push($array_automatic_bids,$dd['ajax_all_bids_with_automatic']);
		}
		
		$data['all_bids'] = $array_all_bids;  
		$data['all_bids_with_automatic'] = $array_automatic_bids;
	    $data['check_exceed_mail'] = $this->Auction_model->get_mail_msg_check();
        
        if(!empty($data['all_bids'])){
                foreach($data['all_bids'] as $bid){
                 $array_maxbid[] = $bid->latest_bid; 
                }
                 $maxbid = max($array_maxbid);
                 
                 if($maxbid <= 10000){
                     $minbid = $maxbid + 100;
                 
                 }else if($maxbid <= 20000){
                     $minbid = $maxbid + 200;
                    
                 }else if($maxbid <= 30000){
                     $minbid = $maxbid + 300;
                    
                 }else if($maxbid <= 40000){
                     $minbid = $maxbid + 400;
                    
                 }else{
                     $minbid = $maxbid + 500;
                   
                 }
            }else{
                $maxbid = $auction->base_price;
                if($auction->base_price <= 10000){
                     $minbid = $auction->base_price + 100;
                   
                 }else if($auction->base_price <= 20000){
                     $minbid = $auction->base_price + 200;
                
                 }else if($auction->base_price <= 30000){
                     $minbid = $auction->base_price + 300;
                 
                 }else if($auction->base_price <= 40000){
                     $minbid = $auction->base_price + 400;
                 
                 }else{
                     $minbid = $auction->base_price + 500;
                   
                 }
            }   	    
        echo $maxbid;
	}
	
	public function exceed_automatic_bids(){
	   
	    include APPPATH . 'sendgrid/sendgrid-php.php';
	    
	    $this->load->model('Auction_model');
	    
        $latest_bid = $this->input->post('latest_bid');
	    $bid_id = $this->input->post('bid_id');
        $mail_test = $this->input->post('mail_test');
		
		
		if($bid_id != NULL){
            
            
            $bid_details = $this->Auction_model->get_bid_details($bid_id);
            foreach($bid_details as $b_detail){
                $dealer_id = $b_detail->dealer_id;
                $automatic_bid = $b_detail->automatic_bid;
                $auction_id = $b_detail->car_auction_id;
            }

    		$dealer_details = $this->Auction_model->get_bid_dealer_detail($dealer_id);
		    foreach($dealer_details as $d_detail){
                $dealer_name = $d_detail->name;
                $dealer_surname = $d_detail->surname;
            }
            
            $single_auction_details = $this->Auction_model->get_single_auction($auction_id);
            foreach($single_auction_details as $s_detail){
                $brand = $s_detail->brand;
                $model = $s_detail->model;
            }
            
             //mail function 
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("dbsharukh@gmail.com", "Astemotori");
            $email->setSubject("Auction exceed information");
            $email->addTo('atulsingh41189@gmail.com' , 'Astemotori Admin');
            
            $d['name'] = $dealer_name;
            $d['surname'] = $dealer_surname;
            $d['automatic_bid'] = $automatic_bid;
            $d['latest_bid'] = $latest_bid;
            $d['auction_id'] = $auction_id;
            $d['brand'] = $brand;
            $d['model'] = $model;
           
            $content = $this->load->view('mail/automatic_bid_exceed',$d,true);
            $email->addContent(
                "text/html",$content);
    
            $sendgrid = new \SendGrid(('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'));
            try {
                $response = $sendgrid->send($email);
                
                if($response){
                    $data = array(
                            'mail_check' =>$mail_test,
                        );
                    $mail_msg_check = $this->Auction_model->insert_mail_msg_check($data);
                }
                
            } catch (Exception $e) {
               
            }
            
        }    
        echo "success";    		
	}
	
	public function getBidData(){
	    $bidId = $_POST['bid-id'];
	    $response = [
                'nextBid' => '$1100',
                'previousBid' => '$1100',
	        ];
	        echo json_encode($response);exit;
	}
	
	public function getLatestBidData(){
	     $this->load->model('Auction_model');
	   // $data['view']='website/latest_bid';
	   // $data['page'] = 'page';
	   // $data['title'] = 'Astermotori | Auction List';
	   	    $auction_id = $_POST['auction_id'];

	    $data['auction'] = $this->Auction_model->get_single_auction_by_id($auction_id);

        // var_dump($data['auction']); die;
	    $data['all_bids'] = $this->Auction_model->get_bids($auction_id);
        	    
	    $data['all_bids_with_automatic'] = $this->Auction_model->get_automatic_bids($auction_id);
	    
	    $data['check_exceed_mail'] = $this->Auction_model->get_mail_msg_check();
	    
	   // $data['single_dealer_bids'] = $this->Auction_model->get_dealer_bid($auction_id, $_SESSION['dl_user_id']);
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    $data['single_dealer_bids'] = $this->Auction_model->get_dealer_bid($auction_id, $_SESSION['am_user_id']);
	        }
        }
         if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
        	    $data['single_dealer_bids'] = $this->Auction_model->get_dealer_bid($auction_id, $_SESSION['dl_user_id']);
	        }
        }
	    foreach($data['all_bids'] as $bid){
             $array_maxbid[] = $bid->latest_bid; 
        }
        if(!empty($data['all_bids'])){
         $maxbid = max($array_maxbid);
	    $data['maxbid_dealer_id'] = $this->Auction_model->get_maxbid_dealer_id($maxbid, $auction_id);
        }
	    
	   // echo "error";die;
	   // Loads View
		$this->load->view('website/latest_bid',$data);
    		
    		
	    
	}
	
	
	public function search_car_brand(){ 

	            
	            $this->load->model('Auction_model');
	            $this->load->model('Dealer_model');
	            
	            $Search_car_brand = trim($this->input->post('Search_car_brand'));
	            
	           // echo $Search_car_brand; die;
        	   	$data['all_auctions'] = $this->Auction_model->Search_car_brand($Search_car_brand);

        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
        	    foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
        	    
        	 
        	     $data['searchitem'] = $Search_car_brand;
        	     $this->load->view('website/search_auction_list', $data);
            	   	
        	   	
	 
	}
	
	public function sort_lowest_price(){ 
	    
	   // if(isset($_SESSION['dl_logged_in'])){
	   //     if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Auction_model');
	            $this->load->model('Dealer_model');
	            
        	   //	$data['all_auctions'] = $this->Auction_model->Search_car_brand($Search_car_brand);
        	   
        	    $data['all_auctions'] = $this->Auction_model->get_auctions_lowest_price();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
        	    foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
        	   
        	     
        	     $this->load->view('website/search_auction_list', $data);
            	   	
        	   	
	   //     }else{
	   //         $this->session->set_flashdata('error','Please Login To Continue');
	   //         redirect('website/login');
	   //     }
	   // }else{
    //         $this->session->set_flashdata('error','Please Login To Continue');
    //         redirect('website/login');
    //     }
	}
	
	public function sort_lowest_mileage(){ 
	    
	   // if(isset($_SESSION['dl_logged_in'])){
	   //     if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Auction_model');
	            $this->load->model('Dealer_model');
	            
        	   //	$data['all_auctions'] = $this->Auction_model->Search_car_brand($Search_car_brand);
        	   
        	    $data['all_auctions'] = $this->Auction_model->get_auctions_lowest_mileage();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
        	    foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
        	   
        	     
        	     $this->load->view('website/search_auction_list', $data);
            	   	
        	   	
	   //     }else{
	   //         $this->session->set_flashdata('error','Please Login To Continue');
	   //         redirect('website/login');
	   //     }
	   // }else{
    //         $this->session->set_flashdata('error','Please Login To Continue');
    //         redirect('website/login');
    //     }
	}
	
	public function sort_ending_soon(){ 
	    
	   // if(isset($_SESSION['dl_logged_in'])){
	   //     if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Auction_model');
	            $this->load->model('Dealer_model');
	            
        	   //	$data['all_auctions'] = $this->Auction_model->Search_car_brand($Search_car_brand);
        	   
        	    $data['all_auctions'] = $this->Auction_model->get_auctions_ending_soon();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
        	    foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
        	   
        	     
        	     $this->load->view('website/search_auction_list', $data);
            	   	
        	   	
	   //     }else{
	   //         $this->session->set_flashdata('error','Please Login To Continue');
	   //         redirect('website/login');
	   //     }
	   // }else{
    //         $this->session->set_flashdata('error','Please Login To Continue');
    //         redirect('website/login');
    //     }
	}
	
	
	public function search_checkbox_brand(){ 
	    
	            $this->load->model('Auction_model');
	            $this->load->model('Dealer_model');
	            $Search_car_brand = array();
	            $Search_car_bodytype = array();
	            $Search_car_transmission = array();
	            $Search_car_fueltype = array();
	            $Search_car_whereisit = array();
	           // $ff = [];
	          
	            $ff['sort'] = $this->input->post('sort') ?? [];
	            $ff['carBrand'] = $this->input->post('quotation_brand') ?? [];
	            $ff['minRegistrationDate'] = $this->input->post('minyear') ?? null;
	            $ff['maxRegistrationData'] = $this->input->post('maxyear') ?? null;
	            
	            $ff['carBodyType'] = $this->input->post('quotation_bodytype') ?? [];
	            $ff['carTransmission'] = $this->input->post('quotation_transmission') ?? [];
	            
	            $ff['carFuelType'] = $this->input->post('quotation_fueltype') ?? [];
	            
	            $ff['carWhereisit'] = $this->input->post('quotation_whereisit') ?? [];
	            
	            $ff['minMileage'] = $this->input->post('minmileage') ?? null;
	            $ff['maxMileage'] = $this->input->post('maxmileage') ?? null;
	            
	            $ff['minPrice'] = $this->input->post('minprice') ?? null;
	            $ff['maxPrice'] = $this->input->post('maxprice') ?? null;
	          
	            
	         
        	   	$data['all_auctions'] = $this->Auction_model->search_checkbox_brand($ff);
        	   
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
        	    foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
        	   
       
        	     $data['selected_filters'] =  $ff;
        	     $this->load->view('website/search_auction_list', $data);
            	 
	}
	
	public function search_checkbox_brand_mobile(){ 
	    
	            $this->load->model('Auction_model');
	            $this->load->model('Dealer_model');
	            $Search_car_brand = array();
	            $Search_car_bodytype = array();
	            $Search_car_transmission = array();
	            $Search_car_fueltype = array();
	            $Search_car_whereisit = array();
	           // $ff = [];
	          
	            $ff['sort'] = $this->input->post('sort') ?? [];
	            $ff['carBrand'] = $this->input->post('quotation_brand') ?? [];
	            $ff['minRegistrationDate'] = $this->input->post('minyear') ?? null;
	            $ff['maxRegistrationData'] = $this->input->post('maxyear') ?? null;
	            
	            $ff['carBodyType'] = $this->input->post('quotation_bodytype') ?? [];
	            $ff['carTransmission'] = $this->input->post('quotation_transmission') ?? [];
	            
	            $ff['carFuelType'] = $this->input->post('quotation_fueltype') ?? [];
	            
	            $ff['carWhereisit'] = $this->input->post('quotation_whereisit') ?? [];
	            
	            $ff['minMileage'] = $this->input->post('minmileage') ?? null;
	            $ff['maxMileage'] = $this->input->post('maxmileage') ?? null;
	            
	            $ff['minPrice'] = $this->input->post('minprice') ?? null;
	            $ff['maxPrice'] = $this->input->post('maxprice') ?? null;
	          
	            
	         
        	   	$data['all_auctions'] = $this->Auction_model->search_checkbox_brand($ff);
        	   
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    if(isset($_SESSION['dl_logged_in'])){
        	        if(!empty($_SESSION['dl_user_id'])){
        	            $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	        }
        	    }
        	    
        	    $data['auction_id_latestoffer'] = array();
        	    foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }
        	   
       
        	     $data['selected_filters'] =  $ff;
        	     $this->load->view('website/search_auction_list_mobileres', $data);
            	 
	}
	
	
}
