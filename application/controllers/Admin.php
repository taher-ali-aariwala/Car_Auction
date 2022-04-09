<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function admin_logout(){
	    $this->session->unset_userdata('am_user_name');
	    $this->session->unset_userdata('am_user_id');
	    $this->session->unset_userdata('am_logged_in');
	   
	    $user_id = array(
           'name'   => 'am_user_id',
           'value'  => $this->input->cookie('am_user_id'),
           'expire' => '-36000',
        );
        $user_name = array(
           'name'   => 'am_user_name',
           'value'  => $this->input->cookie('am_user_name'),
           'expire' => '-36000',
        );
        $password = array(
           'name'   => 'am_pass_key',
           'value'  => $this->input->cookie('am_pass_key'),
           'expire' => '-36000',
        );
        
        $this->input->set_cookie($user_id);
        $this->input->set_cookie($user_name);
        $this->input->set_cookie($password);
       
	    $this->session->set_flashdata('success', 'Admin Logged Out Successfuly!');
        redirect('authenticate');
	}
	
    /**********************************************************************/
    /**********************************************************************/
    /**************************** DASHBOARD *******************************/
    /**********************************************************************/
    /**********************************************************************/
    
	public function index(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    
        	    $this->load->model('Auction_model');
        	    
        	    // Page Specific Information
        	    $data['view']='admin/index';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Dashboard';
        	    
        	   // notification count
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	   
        	   $this->load->library("pagination");
        	    
        	    $config = array();
                $config["base_url"] = base_url() . "/Admin/index/";
                $config["total_rows"] = $this->Auction_model->get_count_auctions();
                $config["per_page"] = 9;
                $config["uri_segment"] = 3;
                // $config["use_page_numbers"] = TRUE;
                
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
                $data["links"] = $this->pagination->create_links();
        
                $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                
        	   // $data['all_auctions'] = $this->Auction_model->get_auctions_publish();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    
                $data['auction_id_latestoffer'] = array();
                foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }

        	    $data['all_auction_autobids'] = $this->Auction_model->get_auction_autobids();
        	    $data['all_auction_makeoffer'] = $this->Auction_model->get_auction_makeofffer();
        	    
        	   // $data['all_auction_makeofferbids'] = $this->Auction_model->get_auction_makeofferbids();
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	public function profile(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
            	    // Page Specific Information
            	    $data['view']='admin/profile';
            	    $data['page'] = 'page';
            	    $data['title'] = 'Astermotori | Profile';
            	    
            	    // notification count----- get new dealer
            	    $this->load->model('Dealer_model');
            	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
            	    
            	    // notification total  msg
            	    $this->load->model('Chat_model');
                    $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                    	    
                    	   
                    	   
            	    $this->load->view('admin/layouts/main',$data);
            	    
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	       
	}

    public function registration_request(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/registration_request';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Registration Request';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	 public function all_auctions(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
	            $this->load->model('Auction_model');
        	    
        	    // Page Specific Information
        	    $data['view']='admin/all_auctions';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | All Auctions List';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	     $data['all_auctions'] = $this->Auction_model->get_all_status_auction();
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}

    public function get_publish_auction(){
        if(isset($_SESSION['am_logged_in'])){
            if($_SESSION['am_logged_in']){
                
                $this->load->model('Auction_model');
                
                // Page Specific Information
                $data['view']='admin/publish_auctions';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | All Publish Auctions List';
               
               // notification count----- get new dealer
                $this->load->model('Dealer_model');
                $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                
                // notification total  msg
                $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                
                $data['all_auctions'] = $this->Auction_model->get_publish_auction();

                $data['auction_id_latestoffer'] = array();
                foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }

               // Loads View
                $this->load->view('admin/layouts/main',$data);
            }else{
               // $this->session->set_flashdata('error','Please Login To Continue');
                redirect('authenticate');
            }
        }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    }

    public function get_awarded_auction(){
        if(isset($_SESSION['am_logged_in'])){
            if($_SESSION['am_logged_in']){
                
                $this->load->model('Auction_model');
                
                // Page Specific Information
                $data['view']='admin/awarded_auction';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | All Awarded Auctions List';
               
               // notification count----- get new dealer
                $this->load->model('Dealer_model');
                $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                
                // notification total  msg
                $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                
                $data['all_auctions'] = $this->Auction_model->get_awarded_auction();

                $data['auction_id_latestoffer'] = array();
                foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }

               // Loads View
                $this->load->view('admin/layouts/main',$data);
            }else{
               // $this->session->set_flashdata('error','Please Login To Continue');
                redirect('authenticate');
            }
        }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    }

    public function get_new_auction(){
        if(isset($_SESSION['am_logged_in'])){
            if($_SESSION['am_logged_in']){
                
                $this->load->model('Auction_model');
                
                // Page Specific Information
                $data['view']='admin/new_auction';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | All Outstanding Auctions List';
               
               // notification count----- get new dealer
                $this->load->model('Dealer_model');
                $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                
                // notification total  msg
                $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                
                $data['all_auctions'] = $this->Auction_model->get_new_auction();
                $data['auction_id_latestoffer'] = array();
                foreach($data['all_auctions'] as $auction){
                    $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
                    $data1['auction_id_latestoffer'] = array(
                        'current_offer' => $data1['max_current_offer'],
                        'auction_id' =>$auction->id,
                        );
                    array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
                }

               // Loads View
                $this->load->view('admin/layouts/main',$data);
            }else{
               // $this->session->set_flashdata('error','Please Login To Continue');
                redirect('authenticate');
            }
        }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    }
    public function registration_request_details(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
	            $dealer_id = $this->uri->segment(3);
        	    $this->load->model('Dealer_model');
        	    $data['dealers'] = $this->Dealer_model->get_dealer($dealer_id);
        	    
        	    // Page Specific Information
        	    $data['view']='admin/registration_request_details';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Registration Request Details';
        	   
        	   // notification count
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                 $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    public function approve_user()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                include APPPATH . 'sendgrid/sendgrid-php.php';
            	$this->load->model('Dealer_model');
            	$user_id = $this->uri->segment(3); 
            	if(isset($user_id)){
            
                            $dealer = $this->Dealer_model->dealer_login_data($user_id);
                			$insert_id = $this->Dealer_model->approve_dealer($user_id);
                			
                            if($insert_id != NULL){
                                
                                //mail function 
                                $email = new \SendGrid\Mail\Mail();
                                $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                                $email->setSubject("Account Approve");
                                $email->addTo($dealer->email , $dealer->name);
                                
                                $d['name'] = $dealer->name;
                                $d['surname'] = $dealer->surname;
                                
                                $content = $this->load->view('mail/approval',$d,true);
                                $email->addContent(
                                    "text/html",$content);
                        
                                $sendgrid = new \SendGrid(('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'));
                                try {
                                    $response = $sendgrid->send($email);
                                    $this->session->set_flashdata('success','Dealer approved');
                                    redirect('admin/registration_request');
                                    // print $response->statusCode() . "\n";
                                    // print_r($response->headers());
                                    // print $response->body() . "\n";
                                } catch (Exception $e) {
                                    // echo 'Caught exception: '. $e->getMessage() ."\n";
                                    $this->session->set_flashdata('error', 'Unable To Approve The dealer!');
                                    redirect('admin/registration_request');
                                }
                                
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Approve The dealer!');
                                redirect('admin/registration_request');
                            }
                		
                }else{
                    $this->session->set_flashdata('error','Please Try again!');
                    redirect('admin/registration_request');
                }
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    	 
	}
	
	public function reject_user()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
                include APPPATH . 'sendgrid/sendgrid-php.php';
                
            	$this->load->model('Dealer_model');
            	$user_id = $this->uri->segment(3); 
            	if(isset($user_id)){
                            
                            $user_data = $this->Dealer_model->dealer_login_data($user_id);
                            
                			$insert_id = $this->Dealer_model->reject_dealer($user_id);
                			
                            if($insert_id != NULL){
                               
                               //mail function 
                                $email = new \SendGrid\Mail\Mail();
                                $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                                $email->setSubject("Account Rejected");
                                $email->addTo($user_data->email , $user_data->name);
                                
                                $d['name'] = $user_data->name;
                                $d['surname'] = $user_data->surname;
                                
                                $content = $this->load->view('mail/rejection',$d,true);
                                $email->addContent(
                                    "text/html",$content);
                        
                                $sendgrid = new \SendGrid(('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'));
                                try {
                                    $response = $sendgrid->send($email);
                                    $this->session->set_flashdata('success','Dealer Rejected Successfully');
                                    redirect('admin/registration_request');
                                    // print $response->statusCode() . "\n";
                                    // print_r($response->headers());
                                    // print $response->body() . "\n";
                                } catch (Exception $e) {
                                    // echo 'Caught exception: '. $e->getMessage() ."\n";
                                    $this->session->set_flashdata('error', 'Unable To Reject The dealer!');
                                    redirect('admin/registration_request');
                                }
                               
                               
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Reject The dealer!');
                                redirect('admin/registration_request');
                            }
                		
                }else{
                    $this->session->set_flashdata('error','Please Try again!');
                    redirect('admin/registration_request');
                }
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    	 
	}
	
	
	public function registered_dealer(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    // Page Specific Information
        	    $data['view']='admin/registered_dealer';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Registered Dealer';
        	    
        	    // notification count-------get user new
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    $data['all_reg_dealers'] = $this->Dealer_model->get_registered_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	public function online_dealer_list(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    // Page Specific Information
        	    $data['view']='admin/online_dealer_list';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Online Dealer';
        	    
        	    // notification count-------get user new
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    $data['all_reg_dealers'] = $this->Dealer_model->get_online_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	 public function registered_dealer_details(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
	            $dealer_id = $this->uri->segment(3);
        	    $this->load->model('Dealer_model');
        	    $data['dealers'] = $this->Dealer_model->get_dealer($dealer_id);
        	    
        	    // Page Specific Information
        	    $data['view']='admin/registered_dealer_details';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Registered Dealer Details';
        	   
        	   // notification count
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	public function delete_dealer()
	{
    
     if(isset($_SESSION['am_logged_in'])){
	   if($_SESSION['am_logged_in']){
        	$this->load->model('Dealer_model');
        	$user_id = $this->uri->segment(3); 
        	if(isset($user_id)){
        
            			$insert_id = $this->Dealer_model->delete_dealer($user_id);
            			
                        if($insert_id != NULL){
                            $this->session->set_flashdata('success','Dealer Profile Deleted Successfully');
                            redirect('admin/registered_dealer');
                        }else{
                            $this->session->set_flashdata('error', 'Unable To Delete The dealer!');
                            redirect('admin/registered_dealer');
                        }
            		
            }else{
                $this->session->set_flashdata('error','Please Try again!');
                redirect('admin/registered_dealer');
            }
	   }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
     } 
     
	}
	
	
// 	----------------------------------------------
// ----------- enter car auction -----------------

    public function enter_car_auction(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    $auction_id = $this->uri->segment(3);
        	    if(empty($auction_id)){
        	        
                	    // Page Specific Information
                	    $data['view']='admin/enter_car_auction';
                	    $data['page'] = 'page';
                	    $data['title'] = 'Astermotori | Enter Car Auction';
                	    
                	    // notification count
                	    $this->load->model('Dealer_model');
                	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                	    
                	    // notification total  msg
                	    $this->load->model('Chat_model');
                        $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                	    
                	    $this->load->model('Auction_model');
                	    $data['equipments'] = $this->Auction_model->get_equipment();
                	    
                	    $data['brands'] = $this->Dealer_model->get_brands();
                	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
                	    $data['body_types'] = $this->Dealer_model->get_body_type();
                	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
                	    $data['transmissions'] = $this->Dealer_model->get_transmission();
                	    
                	    
                	   // Loads View
                		$this->load->view('admin/layouts/main',$data);
	            }else{
	                
	                    // Page Specific Information
                	    $data['view']='admin/enter_car_auction';
                	    $data['page'] = 'page';
                	    $data['title'] = 'Astermotori | Enter Car Auction';
                	    
                	    // notification count
                	    $this->load->model('Dealer_model');
                	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                	    
                	    // notification total  msg
                	    $this->load->model('Chat_model');
                        $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	    $this->load->model('Auction_model');
                	    $data['equipments'] = $this->Auction_model->get_equipment();
                	    
                	    $data['brands'] = $this->Dealer_model->get_brands();
                	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
                	    $data['body_types'] = $this->Dealer_model->get_body_type();
                	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
                	    $data['transmissions'] = $this->Dealer_model->get_transmission();
                	    
                	   // -----------------------------------
                	   //------------------------------------
                	   //------------------------------------
                	   //  ---------- edit-------------------
                	   //------------------------------------
                	   $this->load->model('Auction_model');
                	   
                	   $data['single_auction_details'] = $this->Auction_model->get_single_auction($auction_id);
	                   $data['auction_media'] = $this->Auction_model->get_auction_media($auction_id);
	                   $data['auction_main_image'] = $this->Auction_model->get_main_image($auction_id);
	                   $data['auction_morevideo'] = $this->Auction_model->get_morevideo($auction_id);
	                   
                	   $data['auction_media_exterior'] = $this->Auction_model->get_auction_media_exterior($auction_id);
                	   
                	   $data['auction_media_interior'] = $this->Auction_model->get_auction_media_interior($auction_id);
                	   $data['auction_media_document'] = $this->Auction_model->get_auction_media_document($auction_id);
                	   $data['auction_media_engine'] = $this->Auction_model->get_auction_media_engine($auction_id);
                	   $data['auction_media_transmission'] = $this->Auction_model->get_auction_media_transmission($auction_id);
                	   $data['auction_media_roof'] = $this->Auction_model->get_auction_media_roof($auction_id);
                	    
                	   // -------------damage_defects--------------
                	   $data['left_damage_defects'] = $this->Auction_model->get_left_damage_defect($auction_id);
                	   $data['right_damage_defects'] = $this->Auction_model->get_right_damage_defect($auction_id);
                	   $data['rear_damage_defects'] = $this->Auction_model->get_rear_damage_defect($auction_id);
                	   $data['engine_damage_defects'] = $this->Auction_model->get_engine_damage_defect($auction_id);
                	   $data['interior_damage_defects'] = $this->Auction_model->get_interior_damage_defect($auction_id);
                	   $data['front_damage_defects'] = $this->Auction_model->get_front_damage_defect($auction_id);
                	   $data['roof_damage_defects'] = $this->Auction_model->get_roof_damage_defect($auction_id);
                	   
                	   
                	   // ------------------------------------
                	   
                	   $data['all_front_dam_media'] = $this->Auction_model->get_front_damage_defect_photos($auction_id);
                	   $data['all_left_dam_media'] = $this->Auction_model->get_left_damage_defect_photos($auction_id);
                	   $data['all_right_dam_media'] = $this->Auction_model->get_right_damage_defect_photos($auction_id);
                	   $data['all_rear_dam_media'] = $this->Auction_model->get_rear_damage_defect_photos($auction_id);
                	   $data['all_engine_dam_media'] = $this->Auction_model->get_engine_damage_defect_photos($auction_id);
                	   $data['all_interior_dam_media'] = $this->Auction_model->get_interior_damage_defect_photos($auction_id);
                	   $data['all_roof_dam_media'] = $this->Auction_model->get_roof_damage_defect_photos($auction_id);
        	   
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
                	     
                	   //  --------testdrive-------------
                	      $data['test_drive_details'] = $this->Auction_model->get_test_drive_details($auction_id);
                	     
                	     
                	   // Loads View
                		$this->load->view('admin/layouts/main',$data);
	                
	                
	                
	                
	                
	            }
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}


	private function set_upload_invdoc(){   
		if(isset($_SESSION['am_logged_in'])){
		   if($_SESSION['am_logged_in']){
			   //upload an image options
			   $config = array();
			   $config['upload_path'] = './uploads/auction_car/inv_doc/';
			   $config['allowed_types'] = 'pdf|jpg|png|webp|jpeg|doc|docx';
			   $config['max_size']      = '0';
			   $config['overwrite']     = FALSE;
		   
			   return $config;
		   }else{
			   redirect('authenticate');
		   }
	   }else{
		   redirect('authenticate');
	   }
   }
	
    private function set_upload_options(){   
         if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                //upload an image options
                $config = array();
                $config['upload_path'] = './uploads/auction_car/slider_photo/';
                $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;
            
                return $config;
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
    }
    
    private function set_upload_options_damage(){   
         if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                //upload an image options
                $config = array();
                $config['upload_path'] = './uploads/auction_car/damage_photo/';
                $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;
            
                return $config;
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
    }
    
     private function set_upload_options_coupon(){   
         if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                //upload an image options
                $config = array();
                $config['upload_path'] = './uploads/auction_car/coupon_image/';
                $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;
            
                return $config;
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
    }
    
    private function set_upload_options_technical(){   
         if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                //upload an image options
                $config = array();
                $config['upload_path'] = './uploads/auction_car/technical_image/';
                $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;
            
                return $config;
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
    }
    
    private function set_upload_options_paint_thickness(){   
         if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                //upload an image options
                $config = array();
                $config['upload_path'] = './uploads/auction_car/part_paint_image/';
                $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;
            
                return $config;
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
    }
    
    private function set_upload_options_tire(){   
         if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
                //upload an image options
                $config = array();
                $config['upload_path'] = './uploads/auction_car/wheel_image/';
                $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;
            
                return $config;
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
    }
    
    // ---------------------------------------------------------------
    // --------------------------------------------------------------
    // ---------------------------------------------------------------
    // ------------------------------------------------------------------
	
	public function save_equipment()
	{
	     if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    $this->load->model('Auction_model');
        	    
        		if($this->input->post('type')==1)
        		{
        			$dataequip['name'] = $this->input->post('name');
        			$this->Auction_model->save_equipment($dataequip);
        			
        	        $data['equipments'] = $this->Auction_model->get_equipment();
        			
        			echo json_encode(array(
        				"statusCode"=>200
        			));
        		} 
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }
	}



// -----------------------------------------------
// ----------------------------------------------
// -----------------------------------------------
// ----------------------------------------------
// -----------------------------------------------
// ----------------------------------------------

    public function store_auction_car()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Auction_model');
            
            	if(isset($_POST["submit_entercar"])){
            	    
                    $data['brand']=$this->input->post('brand');
            		$data['model']=$this->input->post('model');
            		$data['mileage']=$this->input->post('mileage');
            		$data['body_style']=$this->input->post('body_style');
            		$data['engine_power']=$this->input->post('engine_power');
            		$data['transmission']=$this->input->post('transmission');
            		$data['fuel_type']=$this->input->post('fuel_type');
            		$data['external_color']=$this->input->post('external_color');
            		$data['internal_color']=$this->input->post('internal_color');
            		$data['registration_date']= $this->input->post('registration_date');
            		$data['previous_owner_no']=$this->input->post('previous_owner_no');
            		$data['where_is_it']=$this->input->post('where_is_it');
            		$data['sales_person']=$this->input->post('sales_person');
            	    
            	    
            	
                    $this->form_validation->set_rules('brand', 'brand', 'required');
                    $this->form_validation->set_rules('model', 'model', 'required|min_length[1]|max_length[20]');
                    $this->form_validation->set_rules('mileage', 'mileage', 'required|numeric|min_length[1]|max_length[20]');
                    $this->form_validation->set_rules('body_style', 'body_style', 'required');
                    $this->form_validation->set_rules('engine_power', 'engine power', 'required|min_length[1]|max_length[30]');
                    $this->form_validation->set_rules('transmission', 'transmission', 'required');
                    $this->form_validation->set_rules('fuel_type', 'fuel type', 'required');
                    $this->form_validation->set_rules('external_color', 'external color', 'required|min_length[1]|max_length[20]');
                    $this->form_validation->set_rules('internal_color', 'internal_color', 'required|min_length[1]|max_length[20]');
                    $this->form_validation->set_rules('registration_date', 'registration date', 'required');
                    $this->form_validation->set_rules('previous_owner_no', 'previous owner no', 'required|numeric|min_length[1]|max_length[20]');
                    $this->form_validation->set_rules('where_is_it', 'where is it', 'required|min_length[1]|max_length[100]');
                    $this->form_validation->set_rules('sales_person', 'sales person', 'required|min_length[1]|max_length[20]');
                   
                   
                    
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/enter_car_auction';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Enter Car Auction';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	        $data['equipments'] = $this->Auction_model->get_equipment();
                	       // $data['equipments'] = $this->Auction_model->get_equipment();
                	    
                    	    $data['brands'] = $this->Dealer_model->get_brands();
                    	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
                    	    $data['body_types'] = $this->Dealer_model->get_body_type();
                    	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
                    	    $data['transmissions'] = $this->Dealer_model->get_transmission();
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			
                			if($this->input->post('auction_id')){
                			    $auction_id = $this->input->post('auction_id');
                			    $auction_detail = $this->Auction_model->update_auction_car_general($data, $auction_id);
                			}else{
                			    $auction_id = $this->Auction_model->store_auction_car($data);
                			}
                			
                            if($auction_id != NULL){
                                
                                $this->session->set_flashdata('success','Registered Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The Car Auction details!');
                                redirect('admin/enter_car_auction');
                            }
                		}
                }
                
                if(isset($_POST["submit_noteentercar"])){
                    $data['note_from_sellar']=$this->input->post('note_from_sellar');
                    
                    if($this->input->post('auction_id')){
        			    $auction_id = $this->input->post('auction_id');
        			    $auction_detail = $this->Auction_model->update_auction_car_general($data, $auction_id);
        			}else{
        			    $auction_id = $this->Auction_model->store_auction_car($data);
        			}
        			
                    if($auction_id != NULL){
                        
                        $this->session->set_flashdata('note_success','Car Auction Sellar Note added Successfully!');
                        redirect('admin/enter_car_auction/'.$auction_id);
                           
                    }else{
                        $this->session->set_flashdata('note_error', 'Unable To Insert The Sellar Note!');
                        redirect('admin/enter_car_auction');
                    }
                            
                }
                
                if(isset($_POST["auc_main_detail"])){
                    $data['reserve_price']=$this->input->post('reserve_price');
                    $data['base_price']=$this->input->post('base_price');
                    $data['latest_bid']=$this->input->post('base_price');
                    $data['expences_price']=$this->input->post('expenses_price');
                    $data['auction_time']=$this->input->post('auction_time');
                    $data['end_auction_time']=$this->input->post('end_auction_time');
                    
                    
                    if($this->input->post('auction_id')){
        			    $auction_id = $this->input->post('auction_id');
        			    $auction_detail = $this->Auction_model->update_auction_car_general($data, $auction_id);
        			}else{
        			    $auction_id = $this->Auction_model->store_auction_car($data);
        			}
        			
                    if($auction_id != NULL){
                        
                        $this->session->set_flashdata('auc_main_success','Car Auction General Auction Details added Successfully!');
                        redirect('admin/enter_car_auction/'.$auction_id);
                           
                    }else{
                        $this->session->set_flashdata('auc_main_error', 'Unable To Insert General Auction Details!');
                        redirect('admin/enter_car_auction');
                    }
                            
                }
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}

	
	public function update_damage_auction_car(){
	   
	   if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
        	        
            	    // -------------damage front _photo upload-----
                    // ---------------------------------------
                    $imageName1 = $_FILES['front_damage_image']['name'][0];
                    if(!empty($_FILES['front_damage_image']['name']) && $imageName1 != ''){
                        $data_damfrontphoto = array();
                        $files = $_FILES;
                        $front_damage_located = $this->input->post('front_damage_located');
                        $front_damage_type = $this->input->post('front_damage_type');
                        $damcount1 = count($front_damage_located);
                        $damfrontp = count($_FILES['front_damage_image']['name']);
                        
                        if($damcount1 != 0){
                            for ($d = 0; $d < $damcount1; $d++) {
                                $data_damfront_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'front',
                                    'damage_located ' => $front_damage_located[$d],
                                    'type_of_damage' => $front_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_damfront_photo);
                            }
                        }
                        
                        if(!empty($result_id)){
                                for($i=0; $i<$damfrontp; $i++)
                                {           
                                    $_FILES['front_damage_image']['name']= $files['front_damage_image']['name'][$i];
                                    $_FILES['front_damage_image']['type']= $files['front_damage_image']['type'][$i];
                                    $_FILES['front_damage_image']['tmp_name']= $files['front_damage_image']['tmp_name'][$i];
                                    $_FILES['front_damage_image']['error']= $files['front_damage_image']['error'][$i];
                                    $_FILES['front_damage_image']['size']= $files['front_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('front_damage_image');
                                    $data_damfrontphoto[] = $this->upload->data();
                                }
                                
                                if(!empty($data_damfrontphoto)){
                    	        $countdamfront  =   1;
                    	            for ($r = 0; $r < $damfrontp; $r++) {
                                        $data_damfront_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_damfrontphoto[$r]['file_name'],
                                            'type' => 'front',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_damfront_photo1);
                                    }
                                }   
                                
                        }
                    }
                    // ------------------------------------------------
                    // ------------------------------------------------
                    
                     // -------------damage left _photo upload-----
                    // ---------------------------------------
                    $imageName2 = $_FILES['left_damage_image']['name'][0];
                    if(!empty($_FILES['left_damage_image']['name']) && $imageName2 != ''){
                   
                        $data_damleftphoto = array();
                        $files = $_FILES;
                        $left_damage_located = $this->input->post('left_damage_located');
                        $left_damage_type = $this->input->post('left_damage_type');
                        $damcount1 = count($left_damage_type);
                        $damleftp = count($_FILES['left_damage_image']['name']);
                        
                        
                        if(!empty($damcount1)){
            	        $countdamleft  =   1;
            	            for ($d = 0; $d < $damcount1; $d++) {
                                $data_damleft_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'left',
                                    'damage_located ' => $left_damage_located[$d],
                                    'type_of_damage' => $left_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_damleft_photo);
                            }
                        } 
                        
                        
                        
                        if(!empty($result_id)){
                                for($i=0; $i<$damleftp; $i++)
                                {           
                                    $_FILES['left_damage_image']['name']= $files['left_damage_image']['name'][$i];
                                    $_FILES['left_damage_image']['type']= $files['left_damage_image']['type'][$i];
                                    $_FILES['left_damage_image']['tmp_name']= $files['left_damage_image']['tmp_name'][$i];
                                    $_FILES['left_damage_image']['error']= $files['left_damage_image']['error'][$i];
                                    $_FILES['left_damage_image']['size']= $files['left_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('left_damage_image');
                                    $data_damleftphoto[] = $this->upload->data();
                                }
                                
                                if(!empty($data_damleftphoto)){
                    	        $countdamleft  =   1;
                    	            for ($r = 0; $r < $damleftp; $r++) {
                                        $data_damleft_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_damleftphoto[$r]['file_name'],
                                            'type' => 'left',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_damleft_photo1);
                                    }
                                }   
                                
                        }
                        
                    }
                    // ------------------------------------------------
                    // ------------------------------------------------
                    
                     // -------------damage rear _photo upload-----
                    // ---------------------------------------
                    $imageName3 = $_FILES['rear_damage_image']['name'][0];
                    if(!empty($_FILES['rear_damage_image']['name']) && $imageName3 != ''){
                   
                        $data_damrearphoto = array();
                        $files = $_FILES;
                        $rear_damage_located = $this->input->post('rear_damage_located');
                        $rear_damage_type = $this->input->post('rear_damage_type');
                        $damcount1 = count($rear_damage_type);
                        $damrearp = count($_FILES['rear_damage_image']['name']);
                        
                        
                        if(!empty($damcount1)){
            	        $countdamrear  =   1;
            	            for ($d = 0; $d < $damcount1; $d++) {
                                $data_damrear_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'rear',
                                    'damage_located ' => $rear_damage_located[$d],
                                    'type_of_damage' => $rear_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_damrear_photo);
                            }
                        }   
                        if(!empty($result_id)){
                                for($i=0; $i<$damrearp; $i++)
                                {           
                                    $_FILES['rear_damage_image']['name']= $files['rear_damage_image']['name'][$i];
                                    $_FILES['rear_damage_image']['type']= $files['rear_damage_image']['type'][$i];
                                    $_FILES['rear_damage_image']['tmp_name']= $files['rear_damage_image']['tmp_name'][$i];
                                    $_FILES['rear_damage_image']['error']= $files['rear_damage_image']['error'][$i];
                                    $_FILES['rear_damage_image']['size']= $files['rear_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('rear_damage_image');
                                    $data_damrearphoto[] = $this->upload->data();
                                }
                                
                                if(!empty($data_damrearphoto)){
                    	        $countdamleft  =   1;
                    	            for ($r = 0; $r < $damrearp; $r++) {
                                        $data_damrear_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_damrearphoto[$r]['file_name'],
                                            'type' => 'rear',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_damrear_photo1);
                                    }
                                }   
                                
                        }
                        
                    }
                    // ------------------------------------------------
                    // ------------------------------------------------
                    
                     // -------------damage right _photo upload-----
                    // ---------------------------------------
                    $imageName4 = $_FILES['right_damage_image']['name'][0];
                    if(!empty($_FILES['right_damage_image']['name']) && $imageName4 != ''){
                   
                        $data_damrightphoto = array();
                        $files = $_FILES;
                        $right_damage_located = $this->input->post('right_damage_located');
                        $right_damage_type = $this->input->post('right_damage_type');
                        $damcount1 = count($right_damage_type);
                        $damrightp = count($_FILES['right_damage_image']['name']);
                        
                        
                        if(!empty($damcount1)){
            	        $countdamright  =   1;
            	            for ($d = 0; $d < $damcount1; $d++) {
                                $data_damright_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'right',
                                    'damage_located ' => $right_damage_located[$d],
                                    'type_of_damage' => $right_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_damright_photo);
                            }
                        } 
                        
                        if(!empty($result_id)){
                                for($i=0; $i<$damrightp; $i++)
                                {           
                                    $_FILES['right_damage_image']['name']= $files['right_damage_image']['name'][$i];
                                    $_FILES['right_damage_image']['type']= $files['right_damage_image']['type'][$i];
                                    $_FILES['right_damage_image']['tmp_name']= $files['right_damage_image']['tmp_name'][$i];
                                    $_FILES['right_damage_image']['error']= $files['right_damage_image']['error'][$i];
                                    $_FILES['right_damage_image']['size']= $files['right_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('right_damage_image');
                                    $data_damrightphoto[] = $this->upload->data();
                                }
                                
                                if(!empty($data_damrightphoto)){
                    	        $countdamleft  =   1;
                    	            for ($r = 0; $r < $damrightp; $r++) {
                                        $data_damright_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_damrightphoto[$r]['file_name'],
                                            'type' => 'right',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_damright_photo1);
                                    }
                                }   
                                
                        }
                        
                        
                    }
                    // ------------------------------------------------
                    // ------------------------------------------------
                    
                     // -------------damage interior _photo upload-----
                    // ---------------------------------------
                    $imageName5 = $_FILES['interior_damage_image']['name'][0];
                    if(!empty($_FILES['interior_damage_image']['name']) && $imageName5 != ''){
                    
                        $data_daminteriorphoto = array();
                        $files = $_FILES;
                        $interior_damage_located = $this->input->post('interior_damage_located');
                        $interior_damage_type = $this->input->post('interior_damage_type');
                        $damcount1 = count($interior_damage_type);
                        $daminteriorp = count($_FILES['interior_damage_image']['name']);
                        
                        
                        if(!empty($damcount1)){
            	        $countdaminterior  =   1;
            	            for ($d = 0; $d < $damcount1; $d++) {
                                $data_daminterior_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'interior',
                                    'damage_located ' => $interior_damage_located[$d],
                                    'type_of_damage' => $interior_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_daminterior_photo);
                            }
                        }
                        if(!empty($result_id)){
                                for($i=0; $i<$daminteriorp; $i++)
                                {           
                                    $_FILES['interior_damage_image']['name']= $files['interior_damage_image']['name'][$i];
                                    $_FILES['interior_damage_image']['type']= $files['interior_damage_image']['type'][$i];
                                    $_FILES['interior_damage_image']['tmp_name']= $files['interior_damage_image']['tmp_name'][$i];
                                    $_FILES['interior_damage_image']['error']= $files['interior_damage_image']['error'][$i];
                                    $_FILES['interior_damage_image']['size']= $files['interior_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('interior_damage_image');
                                    $data_daminteriorphoto[] = $this->upload->data();
                                }
                                
                                if(!empty($data_daminteriorphoto)){
                    	        $countdamleft  =   1;
                    	            for ($r = 0; $r < $daminteriorp; $r++) {
                                        $data_daminterior_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_daminteriorphoto[$r]['file_name'],
                                            'type' => 'interior',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_daminterior_photo1);
                                    }
                                }   
                                
                        }
                        
                    }
                    // ------------------------------------------------
                    // ------------------------------------------------
                    
                     // -------------damage engine _photo upload-----
                    // ---------------------------------------
                    $imageName6 = $_FILES['engine_damage_image']['name'][0];
                    if(!empty($_FILES['engine_damage_image']['name']) && $imageName6 != ''){
                
                        $data_damenginephoto = array();
                        $files = $_FILES;
                        $engine_damage_located = $this->input->post('engine_damage_located');
                        $engine_damage_type = $this->input->post('engine_damage_type');
                        $damcount1 = count($engine_damage_type);
                        $damenginep = count($_FILES['engine_damage_image']['name']);
                        
                        
                        if(!empty($damcount1)){
            	        $countdamengine  =   1;
            	            for ($d = 0; $d < $damcount1; $d++) {
                                $data_damengine_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'engine',
                                    'damage_located ' => $engine_damage_located[$d],
                                    'type_of_damage' => $engine_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_damengine_photo);
                            }
                        } 
                        
                        if(!empty($result_id)){
                                for($i=0; $i<$damenginep; $i++)
                                {           
                                    $_FILES['engine_damage_image']['name']= $files['engine_damage_image']['name'][$i];
                                    $_FILES['engine_damage_image']['type']= $files['engine_damage_image']['type'][$i];
                                    $_FILES['engine_damage_image']['tmp_name']= $files['engine_damage_image']['tmp_name'][$i];
                                    $_FILES['engine_damage_image']['error']= $files['engine_damage_image']['error'][$i];
                                    $_FILES['engine_damage_image']['size']= $files['engine_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('engine_damage_image');
                                    $data_damenginephoto[] = $this->upload->data();
                                }
                                
                                if(!empty($data_damenginephoto)){
                    	        $countdamleft  =   1;
                    	            for ($r = 0; $r < $damenginep; $r++) {
                                        $data_damengine_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_damenginephoto[$r]['file_name'],
                                            'type' => 'engine',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_damengine_photo1);
                                    }
                                }   
                                
                        }
                        
                        
                    }
                    // ------------------------------------------------
                    // ------------------------------------------------
                    
                     // -------------damage roof _photo upload-----
                    // ---------------------------------------
                    $imageName7 = $_FILES['roof_damage_image']['name'][0];
                    if(!empty($_FILES['roof_damage_image']['name']) && $imageName7 != ''){
                    
                        $data_damroofphoto = array();
                        $files = $_FILES;
                        $roof_damage_located = $this->input->post('roof_damage_located');
                        $roof_damage_type = $this->input->post('roof_damage_type');
                        $damcount1 = count($roof_damage_type);
                        $damroofp = count($_FILES['roof_damage_image']['name']);
                        
                        
                        if(!empty($damcount1)){
            	        $countdamroof  =   1;
            	            for ($d = 0; $d < $damcount1; $d++) {
                                $data_damroof_photo   =   array(
                                    'car_auction_id' => $auction_id,
                                    'type' => 'roof',
                                    'damage_located ' => $roof_damage_located[$d],
                                    'type_of_damage' => $roof_damage_type[$d],
                                      
                                );
                                $result_id = $this->Media_model->insert_damage_media($data_damroof_photo);
                            }
                        } 
                        
                        if(!empty($result_id)){
                                for($i=0; $i<$damroofp; $i++)
                                {           
                                    $_FILES['roof_damage_image']['name']= $files['roof_damage_image']['name'][$i];
                                    $_FILES['roof_damage_image']['type']= $files['roof_damage_image']['type'][$i];
                                    $_FILES['roof_damage_image']['tmp_name']= $files['roof_damage_image']['tmp_name'][$i];
                                    $_FILES['roof_damage_image']['error']= $files['roof_damage_image']['error'][$i];
                                    $_FILES['roof_damage_image']['size']= $files['roof_damage_image']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_damage());
                                    $this->upload->do_upload('roof_damage_image');
                                    $data_damroofphoto[] = $this->upload->data();
                                }
                                        
                                if(!empty($data_damroofphoto)){
                    	        $countdamleft  =   1;
                    	            for ($r = 0; $r < $damroofp; $r++) {
                                        $data_damroof_photo1   =   array(
                                            'damage_id' => $result_id,
                                            'media'=>$data_damroofphoto[$r]['file_name'],
                                            'type' => 'roof',
                                            'car_auction_id' => $auction_id,
                                        );
                                        $result = $this->Media_model->insert_damage_photo($data_damroof_photo1);
                                    }
                                }   
                                
                        }
                        
                    }
                    
                    // ------------------------------------------------
                    // ------------------------------------------------
                    $this->session->set_flashdata('dama_success','Car Auction Damage Details Updated Successfully!');
                    redirect('admin/enter_car_auction/'.$auction_id);
                    // ------------------------------------------------
                    // ------------------------------------------------
        	    }
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }        
	}
	
	
	
	public function store_auction_car_video()
	{
        if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
            	$this->load->model('Auction_model');
            
            	if(isset($_POST["submit_entercar"])){
            	    
                    $data['brand']=$this->input->post('brand');
            		
                    $this->form_validation->set_rules('where_is_it', 'where is it', 'required|min_length[1]|max_length[100]');
                    
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/enter_car_auction';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Enter Car Auction';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	    // notification total  msg
                    	    $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                    	   
                	        $data['equipments'] = $this->Auction_model->get_equipment();
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			
                			if($this->input->post('auction_id')){
                			    $auction_id = $this->input->post('auction_id');
                			    $auction_detail = $this->Auction_model->update_auction_car_general($data, $auction_id);
                			}else{
                			    $auction_id = $this->Auction_model->store_auction_car($data);
                			}
                			
                            if($auction_id != NULL){
                                
                                $this->session->set_flashdata('success','Car Auction details Added Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The Car Auction details!');
                                redirect('admin/enter_car_auction');
                            }
                		}
                }
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
    	
	}
	
	
	public function change_status()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $auc_id = $this->uri->segment(3);
        	    $this->Auction_model->change_status($auc_id);
        	   
                $this->session->set_flashdata('success','Car Auction Published to Website Successfully!');
                redirect('admin/enter_car_auction/'.$auc_id);
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
	}
	
	
	
	public function featured_brand()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $brand_id = $this->input->post('b_id');
        	    $brand_featured_status = $this->input->post('f_status');
        
        	    $this->Auction_model->featured_brand($brand_id, $brand_featured_status);
        	    
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function featured_where_is_it()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $brand_id = $this->input->post('b_id');
        	    $brand_featured_status = $this->input->post('f_status');
        
        	    $this->Auction_model->featured_where_is_it($brand_id, $brand_featured_status);
        	    
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_auction()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $auc_id = $this->uri->segment(3);
        	    $this->Auction_model->delete_auction($auc_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_brand()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $brand_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_brand($brand_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_where_is_it()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $where_is_it_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_where_is_it($where_is_it_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_price()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $price_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_price($price_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_year()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $year_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_year($year_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_mileage()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $mileage_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_mileage($mileage_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	public function delete_body_type()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $body_type_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_body_type($body_type_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_fuel_type()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $fuel_type_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_fuel_type($fuel_type_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_transmission()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $transmission_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_transmission($transmission_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_equipment()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Dealer_model');
        	    $equipment_id = $this->uri->segment(3);
        	    $this->Dealer_model->delete_equipment($equipment_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	
	
	public function delete_auction_media()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_auction_media($media_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	
	public function delete_auction_morevideo()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_auction_video($media_id);
        
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_partpaint_media()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_partpaint_media($media_id);
        	   
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_damage_detail()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_damage_details($media_id);
        	   
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_partpaint_detail()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	    
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_partpaint_detail($media_id);
        	   
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_coupon_media()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_coupon_media($media_id);
        	   
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_technical_media()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_technical_media($media_id);
        	   
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function delete_tire_media()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Auction_model');
        	    $media_id = $this->uri->segment(3);
        	    $auction_id = $this->uri->segment(4);
        	    $this->Auction_model->delete_tire_media($media_id);
        	   
                echo json_encode(array(
        				"statusCode"=>200
        			));
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	
	public function store_technical_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                $datatech['car_auction_id'] = $this->input->post('auction_id');
                 
                $this->form_validation->set_rules('last_date_technical_inspection', 'last date technical inspection', 'required');
                $this->form_validation->set_rules('mileage_last_tech_inspection', 'mileage last tech inspection', 'required|min_length[1]|max_length[30]');
                
                // $this->form_validation->set_rules('equipment_options', 'equipment options', 'required');
               
                
                if($this->form_validation->run() == FALSE){
                    
                    $this->session->set_flashdata('error', 'Unable To Insert The Car Auction technical details!');
                    redirect('admin/enter_car_auction/'.$datatech['car_auction_id']);
            
            	}  
            	else{
                		    
            	    // --------------------technical history--------------
                    // -----------------------------------------------
                    $auction_id = $this->input->post('auction_id');
                    $technical_id = $this->input->post('technical_id');
                    $datatech['last_date_technical_inspection']=$this->input->post('last_date_technical_inspection');
            		$datatech['mileage_last_tech_inspection']=$this->input->post('mileage_last_tech_inspection');
            	
                    if(!empty($technical_id)){
                        $tech_id = $this->Auction_model->update_technicalhistory($datatech, $technical_id);
                    }else{
                        $technical_id = $this->Auction_model->insert_technicalhistory($datatech);
                    }
                    
                    if($technical_id != NULL){
                            // -------------technical photo upload-----
                            // ---------------------------------------
                            $imageName = $_FILES['technical_photo']['name'][0];
                            if(!empty($_FILES['technical_photo']['name']) && $imageName != ''){
                                $dataInfotech = array();
                                $files = $_FILES;
                                $tech = count($_FILES['technical_photo']['name']);
                                for($i=0; $i<$tech; $i++)
                                {           
                                    $_FILES['technical_photo']['name']= $files['technical_photo']['name'][$i];
                                    $_FILES['technical_photo']['type']= $files['technical_photo']['type'][$i];
                                    $_FILES['technical_photo']['tmp_name']= $files['technical_photo']['tmp_name'][$i];
                                    $_FILES['technical_photo']['error']= $files['technical_photo']['error'][$i];
                                    $_FILES['technical_photo']['size']= $files['technical_photo']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_technical());
                                    $this->upload->do_upload('technical_photo');
                                    $dataInfotech[] = $this->upload->data();
                                }
                              
                                if(!empty($dataInfotech)){
                    	        $counttech  =   1;
                    	            for ($r = 0; $r < $tech; $r++) {
                                        $data_techphoto   =   array(
                                            'technical_id' => $technical_id,
                                            'media'=>$dataInfotech[$r]['file_name'],
                                        );
                                        $result = $this->Media_model->insert_media_technical($data_techphoto);
                                    }
                                }    
                            }
                    
                            // ------------------------------------------------
                            // ------------------------------------------------
                            if($auction_id != NULL){
                                    
                                $this->session->set_flashdata('tech_success','Car Auction technical details Added Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('tech_error', 'Unable To Insert The Car Auction technical details!');
                                redirect('admin/enter_car_auction');
                            }
                    }
                    
                }   
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	public function store_coupon_auction_car(){
	   
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                $datacoupon['car_auction_id'] = $this->input->post('auction_id');
                 
                $this->form_validation->set_rules('service_booklet_details', 'service booklet details', 'required|min_length[1]|max_length[30]');
                $this->form_validation->set_rules('history_appointments', 'history appointments', 'required|min_length[1]|max_length[30]');
                $this->form_validation->set_rules('last_service_date', 'last service date', 'required');
                $this->form_validation->set_rules('mileage_last_service', 'mileage last service', 'required|min_length[1]|max_length[30]');
                // $this->form_validation->set_rules('equipment_options', 'equipment options', 'required');
               
                
                if($this->form_validation->run() == FALSE){
                    
                    $this->session->set_flashdata('error', 'Unable To Insert The Car Auction coupon details!');
                    redirect('admin/enter_car_auction/'.$datacoupon['car_auction_id']);
            
            	}  
            	else{
            	   // var_dump($_FILES['coupon_photo']['name']);die;
                // 		 $_FILES['coupon_photo']['name']; die;    
            	    // --------------------coupon history--------------
                    // -----------------------------------------------
                    $auction_id = $this->input->post('auction_id');
                    $coupon_id = $this->input->post('coupon_id');
                    $datacoupon['service_booklet_details']=$this->input->post('service_booklet_details');
            		$datacoupon['history_appointments']=$this->input->post('history_appointments');
            		$datacoupon['last_service_date']=$this->input->post('last_service_date');
            		$datacoupon['mileage_last_service']=$this->input->post('mileage_last_service');
                        
                    if(!empty($coupon_id)){
                        $coup_id = $this->Auction_model->update_couponhistory($datacoupon, $coupon_id);
                    }else{
                        $coupon_id = $this->Auction_model->store_couponhistory($datacoupon);
                    }
                    
                    
                    if($coupon_id != NULL){
                            // -------------coupon photo upload-----
                            // ---------------------------------------
                           $imageName = $_FILES['coupon_photo']['name'][0];
                        //   var_dump($imageName);
                            if(!empty($_FILES['coupon_photo']['name']) && $imageName != ''){
                                
                                $dataInfocou = array();
                                $files = $_FILES;
                                $coup = count($_FILES['coupon_photo']['name']);
                                for($i=0; $i<$coup; $i++)
                                {           
                                    $_FILES['coupon_photo']['name']= $files['coupon_photo']['name'][$i];
                                    $_FILES['coupon_photo']['type']= $files['coupon_photo']['type'][$i];
                                    $_FILES['coupon_photo']['tmp_name']= $files['coupon_photo']['tmp_name'][$i];
                                    $_FILES['coupon_photo']['error']= $files['coupon_photo']['error'][$i];
                                    $_FILES['coupon_photo']['size']= $files['coupon_photo']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_coupon());
                                    $this->upload->do_upload('coupon_photo');
                                    $dataInfocou[] = $this->upload->data();
                                }
                              
                                if(!empty($dataInfocou)){
                    	        $countcou  =   1;
                    	            for ($r = 0; $r < $coup; $r++) {
                                        $data_couphoto   =   array(
                                            'coupon_id' => $coupon_id,
                                            'media'=>$dataInfocou[$r]['file_name'],
                                        );
                                        $result = $this->Media_model->insert_media_coupon($data_couphoto);
                                    }
                                }    
                            }
                            // ------------------------------------------------
                            // ------------------------------------------------
                            if($auction_id != NULL){
                                    
                                $this->session->set_flashdata('cou_success','Car Auction coupon details Added Successfully!');
                                redirect('admin/enter_car_auction/'.$datacoupon['car_auction_id']);
                                   
                            }else{
                                $this->session->set_flashdata('cou_error', 'Unable To Insert The Car Auction coupon details!');
                                redirect('admin/enter_car_auction');
                            }
                    }
                    
                }    
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function update_exterior_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                // -------------external photo upload-----
                    // ---------------------------------------
                    
                    if(!empty($_FILES['external_photo']['name'])){
                        
                        $dataInfo = array();
                        $files = $_FILES;
                        $exp = count($_FILES['external_photo']['name']);
                        for($i=0; $i<$exp; $i++)
                        {           
                            $_FILES['external_photo']['name']= $files['external_photo']['name'][$i];
                            $_FILES['external_photo']['type']= $files['external_photo']['type'][$i];
                            $_FILES['external_photo']['tmp_name']= $files['external_photo']['tmp_name'][$i];
                            $_FILES['external_photo']['error']= $files['external_photo']['error'][$i];
                            $_FILES['external_photo']['size']= $files['external_photo']['size'][$i];    
                    
                            $this->upload->initialize($this->set_upload_options());
                            $this->upload->do_upload('external_photo');
                            $dataInfo[] = $this->upload->data();
                        }
                     
                        if(!empty($dataInfo)){
            	        $count  =   1;
            	            for ($r = 0; $r < $exp; $r++) {
                                $data_exphoto   =   array(
                                    'car_auction_id' => $auction_id,
                                    'media'=>$dataInfo[$r]['file_name'],
                                    'type' => 'exterior',
                                );
                                
                                $result = $this->Media_model->insert_media($data_exphoto);
                            }
                        }    
                    }
                    
        	    
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediaex_success','Car Auction details Updated Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
		
	public function update_interior_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                // -------------interior photo upload-----
                // ---------------------------------------
              
                if(!empty($_FILES['interior_photo']['name'])){
                    $dataInfoint = array();
                    $files = $_FILES;
                    $intp = count($_FILES['interior_photo']['name']);
                    for($i=0; $i<$intp; $i++)
                    {           
                        $_FILES['interior_photo']['name']= $files['interior_photo']['name'][$i];
                        $_FILES['interior_photo']['type']= $files['interior_photo']['type'][$i];
                        $_FILES['interior_photo']['tmp_name']= $files['interior_photo']['tmp_name'][$i];
                        $_FILES['interior_photo']['error']= $files['interior_photo']['error'][$i];
                        $_FILES['interior_photo']['size']= $files['interior_photo']['size'][$i];    
                
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('interior_photo');
                        $dataInfoint[] = $this->upload->data();
                    }
                  
                    if(!empty($dataInfoint)){
        	        $countint  =   1;
        	            for ($r = 0; $r < $intp; $r++) {
                            $data_intphoto   =   array(
                                'car_auction_id' => $auction_id,
                                'media'=>$dataInfoint[$r]['file_name'],
                                'type' => 'interior',
                            );
                            $result = $this->Media_model->insert_media($data_intphoto);
                        }
                    }    
                }
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediain_success','Car Auction details Updated Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function update_document_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                
                // -------------documents photo upload-----
                // ---------------------------------------
                
                if(!empty($_FILES['documents_photo']['name'])){
                    $dataInfodoc = array();
                    $files = $_FILES;
                    $docp = count($_FILES['documents_photo']['name']);
                    for($i=0; $i<$docp; $i++)
                    {           
                        $_FILES['documents_photo']['name']= $files['documents_photo']['name'][$i];
                        $_FILES['documents_photo']['type']= $files['documents_photo']['type'][$i];
                        $_FILES['documents_photo']['tmp_name']= $files['documents_photo']['tmp_name'][$i];
                        $_FILES['documents_photo']['error']= $files['documents_photo']['error'][$i];
                        $_FILES['documents_photo']['size']= $files['documents_photo']['size'][$i];    
                
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('documents_photo');
                        $dataInfodoc[] = $this->upload->data();
                    }
                  
                    if(!empty($dataInfodoc)){
        	        $countdoc  =   1;
        	            for ($r = 0; $r < $docp; $r++) {
                            $data_docphoto   =   array(
                                'car_auction_id' => $auction_id,
                                'media'=>$dataInfodoc[$r]['file_name'],
                                'type' => 'document',
                            );
                            $result = $this->Media_model->insert_media($data_docphoto);
                        }
                    }    
                }
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediadoc_success','Car Auction details Updated Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function update_engine_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                
                // -------------engine_photo upload-----
                // ---------------------------------------
                
                if(!empty($_FILES['engine_photo']['name'])){
                    $dataInfoeng = array();
                    $files = $_FILES;
                    $engp = count($_FILES['engine_photo']['name']);
                    for($i=0; $i<$engp; $i++)
                    {           
                        $_FILES['engine_photo']['name']= $files['engine_photo']['name'][$i];
                        $_FILES['engine_photo']['type']= $files['engine_photo']['type'][$i];
                        $_FILES['engine_photo']['tmp_name']= $files['engine_photo']['tmp_name'][$i];
                        $_FILES['engine_photo']['error']= $files['engine_photo']['error'][$i];
                        $_FILES['engine_photo']['size']= $files['engine_photo']['size'][$i];    
                
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('engine_photo');
                        $dataInfoeng[] = $this->upload->data();
                    }
                  
                    if(!empty($dataInfoeng)){
        	        $counteng  =   1;
        	            for ($r = 0; $r < $engp; $r++) {
                            $data_engphoto   =   array(
                                'car_auction_id' => $auction_id,
                                'media'=>$dataInfoeng[$r]['file_name'],
                                'type' => 'engine',
                            );
                            $result = $this->Media_model->insert_media($data_engphoto);
                        }
                    }    
                }
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediaeng_success','Car Auction details Updated Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function update_transmission_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                
                // -------------transmission photo upload-----
                // ---------------------------------------
                if(!empty($_FILES['transmission_photo']['name'])){
                    $dataInfotrans = array();
                    $files = $_FILES;
                    $transp = count($_FILES['transmission_photo']['name']);
                    for($i=0; $i<$transp; $i++)
                    {           
                        $_FILES['transmission_photo']['name']= $files['transmission_photo']['name'][$i];
                        $_FILES['transmission_photo']['type']= $files['transmission_photo']['type'][$i];
                        $_FILES['transmission_photo']['tmp_name']= $files['transmission_photo']['tmp_name'][$i];
                        $_FILES['transmission_photo']['error']= $files['transmission_photo']['error'][$i];
                        $_FILES['transmission_photo']['size']= $files['transmission_photo']['size'][$i];    
                
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('transmission_photo');
                        $dataInfotrans[] = $this->upload->data();
                    }
                  
                    if(!empty($dataInfotrans)){
        	        $counttrans  =   1;
        	            for ($r = 0; $r < $transp; $r++) {
                            $data_transphoto   =   array(
                                'car_auction_id' => $auction_id,
                                'media'=>$dataInfotrans[$r]['file_name'],
                                'type' => 'transmission',
                            );
                            $result = $this->Media_model->insert_media($data_transphoto);
                        }
                    }    
                }
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediatran_success','Car Auction details Updated Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function update_roof_auction_car(){
	    
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                
                // -------------roof_photo upload-----
                // ---------------------------------------
                
                if(!empty($_FILES['roof_photo']['name'])){
                    $data_roofphoto = array();
                    $files = $_FILES;
                    $roofp = count($_FILES['roof_photo']['name']);
                    for($i=0; $i<$roofp; $i++)
                    {           
                        $_FILES['roof_photo']['name']= $files['roof_photo']['name'][$i];
                        $_FILES['roof_photo']['type']= $files['roof_photo']['type'][$i];
                        $_FILES['roof_photo']['tmp_name']= $files['roof_photo']['tmp_name'][$i];
                        $_FILES['roof_photo']['error']= $files['roof_photo']['error'][$i];
                        $_FILES['roof_photo']['size']= $files['roof_photo']['size'][$i];    
                
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('roof_photo');
                        $dataInforoof[] = $this->upload->data();
                    }
                  
                    if(!empty($dataInforoof)){
        	        $countroof  =   1;
        	            for ($r = 0; $r < $roofp; $r++) {
                            $data_roofphoto   =   array(
                                'car_auction_id' => $auction_id,
                                'media'=>$dataInforoof[$r]['file_name'],
                                'type' => 'roof',
                            );
                            $result = $this->Media_model->insert_media($data_roofphoto);
                        }
                    }    
                }
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediaroof_success','Car Auction details Updated Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	public function update_video_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                    // -------------main video  upload-----
                    // ---------------------------------------
                        
                    if(!empty($this->input->post('main_video'))){
                        
                        $data['main_video']=$this->input->post('main_video');
                        $this->form_validation->set_rules('main_video', 'main video', 'required');
                          
                        if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/enter_car_auction';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Enter Car Auction';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	    // notification total  msg
                    	    $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                    	    
                    	    
                	        $data['equipments'] = $this->Auction_model->get_equipment();
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			   
                			$auction_detail = $this->Auction_model->update_auction_car_general($data, $auction_id);
                			
                            if($auction_id != NULL){
                                
                                $this->session->set_flashdata('mediavid_success','Car Auction details Updated Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The Car Auction details!');
                                redirect('admin/enter_car_auction');
                            }
                		} 
                    }
                    
              
        	    }
                
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
	}
	
	
	public function update_coupon_media(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                 
            	    // --------------------coupon history--------------
                    // -----------------------------------------------
                    $auction_id = $this->input->post('auction_id');
                    $coupon_id = $this->input->post('coupon_id');
                    
                        
                    if($coupon_id != NULL){
                            // -------------coupon photo upload-----
                            // ---------------------------------------
                            
                            if(!empty($_FILES['coupon_photo']['name'])){
                                $dataInfocou = array();
                                $files = $_FILES;
                                $coup = count($_FILES['coupon_photo']['name']);
                                for($i=0; $i<$coup; $i++)
                                {           
                                    $_FILES['coupon_photo']['name']= $files['coupon_photo']['name'][$i];
                                    $_FILES['coupon_photo']['type']= $files['coupon_photo']['type'][$i];
                                    $_FILES['coupon_photo']['tmp_name']= $files['coupon_photo']['tmp_name'][$i];
                                    $_FILES['coupon_photo']['error']= $files['coupon_photo']['error'][$i];
                                    $_FILES['coupon_photo']['size']= $files['coupon_photo']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_coupon());
                                    $this->upload->do_upload('coupon_photo');
                                    $dataInfocou[] = $this->upload->data();
                                }
                              
                                if(!empty($dataInfocou)){
                    	        $countcou  =   1;
                    	            for ($r = 0; $r < $coup; $r++) {
                                        $data_couphoto   =   array(
                                            'coupon_id' => $coupon_id,
                                            'media'=>$dataInfocou[$r]['file_name'],
                                        );
                                        $result = $this->Media_model->insert_media_coupon($data_couphoto);
                                    }
                                }    
                            }
                            // ------------------------------------------------
                            // ------------------------------------------------
                            if($auction_id != NULL){
                                    
                                $this->session->set_flashdata('cou_success','Car Auction coupon Media Added Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('cou_error', 'Unable To Insert The Car Auction coupon Media!');
                                redirect('admin/enter_car_auction');
                            }
                    }
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }       
                  
	}
	
	
	public function update_mainphoto_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                $datamain['car_auction_id'] = $this->input->post('auction_id');
                $mainimage_id = $this->input->post('mainimage_id');
                    
                    if($datamain['car_auction_id'] != NULL){
                            // -------------technical photo upload-----
                            // ---------------------------------------
                            
                            if(!empty($_FILES['main_image']['name'])){
                                $config['upload_path']          = './uploads/auction_car/main_image/';
                                $config['allowed_types']        = 'gif|jpg|png|';
                                $config['max_size']             = 20000;
                                // $config['max_width']            = 1524;
                                // $config['max_height']           = 768;
                                $config['file_name'] = $_FILES['main_image']['name'];
                               
                                
                                //Load upload library and initialize here configuration
                                $this->load->library('upload',$config);
                                $this->upload->initialize($config);
                                
                                if($this->upload->do_upload('main_image')){
                                    $uploadData = $this->upload->data();
                                    $datamain['media'] = $uploadData['file_name'];
                                    $datamain['type'] = "mainimage";
                                   
                                   
                                   
                                    if(!empty($mainimage_id)){
                                        $main_id = $this->Media_model->update_mainimage_media($datamain, $mainimage_id);
                                        
                                    }else{
                                        $main_id = $this->Media_model->insert_mainimage_media($datamain);
                                    }
                    
                    
                                }else{
                                    
                                    $this->session->set_flashdata('auc_main_error', 'try again with another image');
                			        redirect('admin/enter_car_auction/'.$datamain['car_auction_id']);
                                }
                            }
                    
                            // ------------------------------------------------
                            // ------------------------------------------------
                            if($datamain['car_auction_id'] != NULL){
                                    
                                $this->session->set_flashdata('auc_main_success','Car Auction media Added Successfully!');
                                redirect('admin/enter_car_auction/'.$datamain['car_auction_id']);
                                   
                            }else{
                                $this->session->set_flashdata('auc_main_error', 'Unable To Insert The Car Auction media!');
                                redirect('admin/enter_car_auction');
                            }
                    }
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }          
                      
	}
	
	public function update_morevideo_auction_car(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                $datamain['car_auction_id'] = $this->input->post('auction_id');
                
                    
                    if($datamain['car_auction_id'] != NULL){
                             // -------------more video -----
                            // ---------------------------------------
                            
                            
                                $more_video = $this->input->post('more_video');
                               
                                $countvideo = count($more_video);
                               
                                
                                if(!empty($more_video)){
                    	        
                    	            for ($r = 0; $r < $countvideo; $r++) {
                                        $morevideodata   =   array(
                                            'car_auction_id' => $datamain['car_auction_id'],
                                            'video_url ' => $more_video[$r],
                                            
                                        );
                                        $result = $this->Auction_model->insert_morevideo($morevideodata);
                                    }
                                }    
                            
                            
                            // ------------------------------------------------
                            // ------------------------------------------------
                            if($datamain['car_auction_id'] != NULL){
                                    
                                $this->session->set_flashdata('auc_morevideo_success','Car Auction Video Added Successfully!');
                                redirect('admin/enter_car_auction/'.$datamain['car_auction_id']);
                                   
                            }else{
                                $this->session->set_flashdata('auc_morevideo_error', 'Unable To Insert The Car Auction Video!');
                                redirect('admin/enter_car_auction');
                            }
                    }
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }          
                      
	}
	
    
	public function store_wheel_auction_car(){
	    
	     if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                 
            	    // --------------------tire history--------------
                    // -----------------------------------------------
                    $auction_id = $this->input->post('auction_id');
                    $tire_id = $this->input->post('tire_id');
                    $datatire['tire_type_left_front']=$this->input->post('tire_type_left_front');
            		$datatire['tire_type_right_front']=$this->input->post('tire_type_right_front');
            		$datatire['tire_type_left_rear']=$this->input->post('tire_type_left_rear');
            		$datatire['tire_type_right_rear']=$this->input->post('tire_type_right_rear');
            		
            		$datatire['profile_depth_left_front']=$this->input->post('profile_depth_left_front');
            		$datatire['profile_depth_right_front']=$this->input->post('profile_depth_right_front');
            		$datatire['profile_depth_left_rear']=$this->input->post('profile_depth_left_rear');
            		$datatire['profile_depth_right_rear']=$this->input->post('profile_depth_right_rear');
            		
            		$datatire['rim_type_left_front']=$this->input->post('rim_type_left_front');
            		$datatire['rim_type_right_front']=$this->input->post('rim_type_right_front');
            		$datatire['rim_type_left_rear']=$this->input->post('rim_type_left_rear');
            		$datatire['rim_type_right_rear']=$this->input->post('rim_type_right_rear');
            		
            		$datatire['brake_state_left_front']=$this->input->post('brake_state_left_front');
            		$datatire['brake_state_right_front']=$this->input->post('brake_state_right_front');
            		$datatire['brake_state_left_rear']=$this->input->post('brake_state_left_rear');
            		$datatire['brake_state_right_rear']=$this->input->post('brake_state_right_rear');
                
                    if(!empty($tire_id)){
                        $ti_id = $this->Auction_model->update_tirehistory($datatire, $tire_id);
                    }else{
                        $datatire['car_auction_id'] = $auction_id;
                        $tire_id = $this->Auction_model->insert_tirehistory($datatire);
                    }
                    
                    
                    if($tire_id != NULL){
                            // -------------tire photo upload-----
                            // ---------------------------------------
                            $imageName1 = $_FILES['tire_photo']['name'][0];
                            if(!empty($_FILES['tire_photo']['name']) && $imageName1 != ''){
                            
                                $dataInfotire = array();
                                $files = $_FILES;
                                $tirep = count($_FILES['tire_photo']['name']);
                                for($i=0; $i<$tirep; $i++)
                                {           
                                    $_FILES['tire_photo']['name']= $files['tire_photo']['name'][$i];
                                    $_FILES['tire_photo']['type']= $files['tire_photo']['type'][$i];
                                    $_FILES['tire_photo']['tmp_name']= $files['tire_photo']['tmp_name'][$i];
                                    $_FILES['tire_photo']['error']= $files['tire_photo']['error'][$i];
                                    $_FILES['tire_photo']['size']= $files['tire_photo']['size'][$i];    
                            
                                    $this->upload->initialize($this->set_upload_options_tire());
                                    $this->upload->do_upload('tire_photo');
                                    $dataInfotire[] = $this->upload->data();
                                }
                              
                                if(!empty($dataInfotire)){
                    	        $countcou  =   1;
                    	            for ($r = 0; $r < $tirep; $r++) {
                                        $data_tirephoto   =   array(
                                            'tire_id' => $tire_id,
                                            'media'=>$dataInfotire[$r]['file_name'],
                                            'type' => 'wheel',
                                        );
                                        $result = $this->Media_model->insert_media_tire($data_tirephoto);
                                    }
                                }    
                            }
                            // ------------------------------------------------
                            // ------------------------------------------------
                    }
                                                               
                    if($auction_id != NULL){
                            
                        $this->session->set_flashdata('auc_wheel_success','Car Auction Wheel Details Added Successfully!');
                        redirect('admin/enter_car_auction/'.$auction_id);
                           
                    }else{
                        $this->session->set_flashdata('auc_wheel_error', 'Unable To Insert The Car Auction Wheel Details!');
                        redirect('admin/enter_car_auction');
                    }           
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }         
                  
	}
	
	
	
	public function update_partpaint_media(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                
               // -------------part paint thickness photo upload-----
                // ---------------------------------------
                
                if(!empty($_FILES['paint_thickness_photo']['name'])){
                    $datapptodoc = array();
                    $files = $_FILES;
                    $pptp = count($_FILES['paint_thickness_photo']['name']);
                    for($i=0; $i<$pptp; $i++)
                    {           
                        $_FILES['paint_thickness_photo']['name']= $files['paint_thickness_photo']['name'][$i];
                        $_FILES['paint_thickness_photo']['type']= $files['paint_thickness_photo']['type'][$i];
                        $_FILES['paint_thickness_photo']['tmp_name']= $files['paint_thickness_photo']['tmp_name'][$i];
                        $_FILES['paint_thickness_photo']['error']= $files['paint_thickness_photo']['error'][$i];
                        $_FILES['paint_thickness_photo']['size']= $files['paint_thickness_photo']['size'][$i];    
                
                        $this->upload->initialize($this->set_upload_options_paint_thickness());
                        $this->upload->do_upload('paint_thickness_photo');
                        $datapptodoc[] = $this->upload->data();
                    }
                  
                    if(!empty($datapptodoc)){
        	        $countdoc  =   1;
        	            for ($r = 0; $r < $pptp; $r++) {
                            $data_pptphoto   =   array(
                                'car_auction_id' => $auction_id,
                                'media'=>$datapptodoc[$r]['file_name'],
                                
                            );
                            $result = $this->Media_model->insert_paint_thickness_media($data_pptphoto);
                        }
                    }    
                }
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('partpaint_media_success','Car Auction Part Paint Media Added Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
	}
	
	public function store_partpaint_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	    if($auction_id != NULL){
                  
                
                
               // -------------part thickness details-----
                // ---------------------------------------
                
                
                    $part_type = $this->input->post('part_type');
                    $part_thickness = $this->input->post('part_thickness');
                    $countpart = count($part_type);
                   
                    
                    if(!empty($part_thickness)){
                    
                        for ($r = 0; $r < $countpart; $r++) {
                            $parttypedata   =   array(
                                'car_auction_id' => $auction_id,
                                'part_type ' => $part_type[$r],
                                'thickness' => $part_thickness[$r],
                                  
                            );
                            $result = $this->Auction_model->insert_part_paint_thickness($parttypedata);
                        }
                    }    
                
                
                // ------------------------------------------------
                // ------------------------------------------------
              
        	    }
                $this->session->set_flashdata('partpaint_media_success','Car Auction Part Paint Details Added Successfully!');
                redirect('admin/enter_car_auction/'.$auction_id);
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
	}
	
	
	public function store_test_drive(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                 
            	    // --------------------coupon history--------------
                    // -----------------------------------------------
                    $auction_id = $this->input->post('auction_id');
                    $testdrive_id = $this->input->post('testdrive_id');
                    
                    $datatest['speedometer']=$this->input->post('speedometer');
            	    $datatest['gear']=$this->input->post('gear');
            	    $datatest['suspension']=$this->input->post('suspension');
            	    $datatest['noise_level']=$this->input->post('noise_level');
            	    $datatest['navigation']=$this->input->post('navigation');
            	    $datatest['engin']=$this->input->post('engin');
            	    $datatest['steering']=$this->input->post('steering');
            	    $datatest['brakes']=$this->input->post('brakes');
            	    $datatest['air_condition']=$this->input->post('air_condition');
            	    
            	    $datatest['speedometer_issue']=$this->input->post('speedometer_issue');
            	    $datatest['gear_issue']=$this->input->post('gear_issue');
            	    $datatest['suspension_issue']=$this->input->post('suspension_issue');
            	    $datatest['noise_level_issue']=$this->input->post('noise_level_issue');
            	    $datatest['navigation_issue']=$this->input->post('navigation_issue');
            	    $datatest['engin_issue']=$this->input->post('engin_issue');
            	    $datatest['steering_issue']=$this->input->post('steering_issue');
            	    $datatest['brakes_issue']=$this->input->post('brakes_issue');
            	    $datatest['air_condition_issue']=$this->input->post('air_condition_issue');
                    
                    
                    if(!empty($testdrive_id)){
                        $ti_id = $this->Auction_model->update_testdrive($datatest, $testdrive_id);
                    }else{
                        $datatest['car_auction_id'] = $auction_id;
                        $testdrive_id = $this->Auction_model->insert_testdrive($datatest);
                    }
                    
                            // ------------------------------------------------
                            // ------------------------------------------------
                            if($auction_id != NULL){
                                    
                                $this->session->set_flashdata('testdrive_success','Car Auction Test Drive Details Added Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('testdrive_error', 'Unable To Insert The Car Auction Test Drive Details!');
                                redirect('admin/enter_car_auction');
                            }
                    
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }            
                  
	}
	
	public function update_equip_auction_car(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
                $auction_id = $this->input->post('auction_id');
                
                // -------------equipment_options upload-----
                // ---------------------------------------
                $this->form_validation->set_rules('equipment_options[0]', 'equipment options', 'required');    
                if($this->form_validation->run() == FALSE){
               
                    $this->session->set_flashdata('equip_error','Please select Equipments!');
                    redirect('admin/enter_car_auction/'.$auction_id);
        
        		}  
        		else{   
                        if(!empty($this->input->post('equipment_options'))){
                            
                            $quip_list = $this->input->post('equipment_options');
                    		if(!empty($quip_list)){
                            $data['equipment_options'] = implode(', ', $quip_list);
                    		}
                            	   
                			$auction_detail = $this->Auction_model->update_auction_car_general($data, $auction_id);
                			
                            if($auction_id != NULL){
                                
                                $this->session->set_flashdata('equip_success','Car Auction Equipment Details Added Successfully!');
                                redirect('admin/enter_car_auction/'.$auction_id);
                                   
                            }else{
                                $this->session->set_flashdata('equip_error', 'Unable To Insert The Car Auction  Equipment Details!');
                                redirect('admin/enter_car_auction');
                            }
                    		 
                        }
        		}
        	    
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
                  
	}
	
    public function winner(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
	            $this->load->model('Auction_model');
	            
        	    // Page Specific Information
        	    $data['view']='admin/winner';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Winner';
        	    
        	    // notification count
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    $this->load->library("pagination");
        	    
        	    $config = array();
                $config["base_url"] = base_url() . "/Admin/winner/";
                $config["total_rows"] = $this->Auction_model->get_count_auctions();
                $config["per_page"] = 9;
                $config["uri_segment"] = 3;
                // $config["use_page_numbers"] = TRUE;
                
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
                $data["links"] = $this->pagination->create_links();
        
                $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                
        	   // $data['all_auctions'] = $this->Auction_model->get_auctions_publish();
        	    
        	   // foreach($data['all_auctions'] as $allauction){
        	   //    $auction_id = $allauction->id; 
        	   //    $data1['all_bids'] = $this->Auction_model->get_bids($auction_id);
        	      
        	   // }  
        	     
        	   // $data['all_data_bids'] = $data1['all_bids'] ;
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	   // var_dump($data['all_data_bids']); die;
        	  
        	    
        	    $data['all_auction_autobids'] = $this->Auction_model->get_auction_topfour_bids();
        	    // var_dump($data['all_auction_autobids']); die;
        	    $this->load->view('admin/layouts/main',$data);
	        }else{
	            
	            redirect('authenticate');
	        }
	    }else{
            
            redirect('authenticate');
        }
	}
	
	public function cash_payments(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
	            $this->load->model('Auction_model');
	            
        	    // Page Specific Information
        	    $data['view']='admin/cash_payments';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Cash Payments';
        	    
        	    // notification count
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    $data['all_awarded_auctions'] = $this->Auction_model->get_auctions_awarded_joindealer();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    
        	    $this->load->view('admin/layouts/main',$data);
	        }else{
	            
	            redirect('authenticate');
	        }
	    }else{
            
            redirect('authenticate');
        }
	}
	
	public function award_winner(){
	    
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
            	$this->load->model('Auction_model');
            	
        
                $auction_id = $this->input->post('auction_id');
                $data['dealer_id'] = $this->input->post('dealer_id');
                $data['dealer_price'] = $this->input->post('dealer_price');
                
                // -------------equipment_options upload-----
                // ---------------------------------------
                $this->form_validation->set_rules('auction_id', 'auction_id', 'required');    
                if($this->form_validation->run() == FALSE){
               
                    $this->session->set_flashdata('error','Please select any winner!');
                    redirect('admin/winner');
        
        		}  
        		else{   
                        if(!empty($this->input->post('auction_id'))){
                            
                            $data['status'] = 'awarded';
                			$auction_winner = $this->Auction_model->update_auction_winner($data, $auction_id);
                			
                			echo "success";
                            // if($auction_winner != NULL){
                                
                            //     $this->session->set_flashdata('success','Winner awarded Successfully!');
                            //     redirect('admin/cash_payments');
                                   
                            // }else{
                            //     $this->session->set_flashdata('error', 'Please select winner again!');
                            //     redirect('admin/winner');
                            // }
                    		 
                        }
        		}
        	    
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }   
                  
	}
	
	public function chat_list(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){

	            $this->load->model('Chat_model');
                $auction_id = $this->uri->segment(3);

        	    // Page Specific Information
        	    $data['view']='admin/chat_list';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Chat List';
        	    
        	     // notification count
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total msg
        	    
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
                $data['auction_chat_dealers'] = $this->Chat_model->get_auction_chat_dealers($auction_id);

        	    $this->load->view('admin/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	public function chat(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    // Page Specific Information
        	    $data['view']='admin/chat';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Chat';
        	    
        	     // notification count
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                
        	    $this->load->view('admin/layouts/main',$data);
        	    
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
	
	public function get_admin_auction_chat(){
        if(isset($_SESSION['am_logged_in'])){
            if($_SESSION['am_logged_in']){

                $this->load->model('Chat_model');
                
                // Page Specific Information
                $data['view']='admin/admin_auction_chat';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | Auction Chat List';
                
                 // notification count
                $this->load->model('Dealer_model');
                $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                
                $data['admin_auction_chat'] = $this->Chat_model->get_admin_auctions_chat();

                // notification total auction msg
                $data['chat_notification_total_auction_msg'] = $this->Chat_model->get_notification_total_auction_msg($_SESSION['am_user_id'] );
                
                // notification total direct msg
                $data['chat_notification_total_direct_msg'] = $this->Chat_model->get_notification_total_direct_msg($_SESSION['am_user_id'] );
                
                // notification total direct msg
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                
                $data['last_chatmsg'] = array();
                $data['chat_notification'] = array();
                foreach($data['admin_auction_chat'] as $auctionchat){
                    $data1['last_chatmsg'] = $this->Chat_model->get_last_chatmsg($auctionchat->chat_id);
                    array_push($data['last_chatmsg'], $data1['last_chatmsg']);

                    
                    
                     // notification auction msg
                    $data1['chat_notification'] = $this->Chat_model->get_notification($auctionchat->chat_id, $_SESSION['am_user_id'] );

                    $countnot = count($data1['chat_notification']);
                    $data1['chatnot'] = array(
                        'chat_id' => $auctionchat->chat_id,
                        'not_count' => $countnot,
                    );
                    
                    array_push($data['chat_notification'], $data1['chatnot']);

                }
                // var_dump($data['last_chatmsg']); die;

                $this->load->view('admin/layouts/main',$data);
            }else{
                $this->session->set_flashdata('error','Please Login To Continue');
                redirect('authenticate');
            }
        }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    }

    public function get_direct_dealer_chat(){
        if(isset($_SESSION['am_logged_in'])){
            if($_SESSION['am_logged_in']){

                $this->load->model('Chat_model');
                
                // Page Specific Information
                $data['view']='admin/admin_direct_dealers_chat';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | Direct Dealers Chat List';
                
                 // notification count
                $this->load->model('Dealer_model');
                $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                
                $data['auction_direct_dealers_chat'] = $this->Chat_model->get_admin_direct_dealers_chat();

                // notification total auction msg
                $data['chat_notification_total_auction_msg'] = $this->Chat_model->get_notification_total_auction_msg($_SESSION['am_user_id'] );
                
                // notification total direct msg
                $data['chat_notification_total_direct_msg'] = $this->Chat_model->get_notification_total_direct_msg($_SESSION['am_user_id'] );
                
                 // notification total msg
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                
                $data['last_chatmsg'] = array();
                $data['chat_notification'] = array();
                
                foreach($data['auction_direct_dealers_chat'] as $auctionchat){
                    $data1['last_chatmsg'] = $this->Chat_model->get_last_chatmsg($auctionchat->chat_id);
                    array_push($data['last_chatmsg'], $data1['last_chatmsg']);

                     // notification
                    $data1['chat_notification'] = $this->Chat_model->get_notification($auctionchat->chat_id, $_SESSION['am_user_id'] );

                    $countnot = count($data1['chat_notification']);
                    $data1['chatnot'] = array(
                        'chat_id' => $auctionchat->chat_id,
                        'not_count' => $countnot,
                    );
                    
                    array_push($data['chat_notification'], $data1['chatnot']);
                }
                // var_dump($data['last_chatmsg']); die;
                
                $this->load->view('admin/layouts/main',$data);
            }else{
                $this->session->set_flashdata('error','Please Login To Continue');
                redirect('authenticate');
            }
        }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
    }
    
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // --------------------------master data ---------------------
    // -----------------------------------------------------------
    
    
    // --------------------------master brand ---------------------
    // -----------------------------------------------------------
    public function get_master_data_brand(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_brand';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data Brand';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['brands'] = $this->Dealer_model->get_brands();
        	    $data['featured_brands'] = $this->Dealer_model->get_featured_brands();
        	    
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    public function edit_brand()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_brand_submit"])){
            	    
                    $data['name']=$this->input->post('brand');
            		
            	
                    $this->form_validation->set_rules('brand', 'brand', 'required|min_length[1]|max_length[40]');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_brand';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data Brand';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	        $data['brands'] = $this->Dealer_model->get_brands();
                	        $data['featured_brands'] = $this->Dealer_model->get_featured_brands();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('brand_id')){
                			    $id = $this->input->post('brand_id');
                			    $brand_detail = $this->Dealer_model->edit_brand($id, $data);
                			}else{
                			    $brand_detail = $this->Dealer_model->save_brand($data);
                			}
                			
                            if($brand_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_brand');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The Brand!');
                                redirect('admin/get_master_data_brand');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}


 
    // --------------------------master body type ---------------------
    // -----------------------------------------------------------
    
    public function get_master_data_body_type(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_body_type';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data Body Type';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	   
        	    $data['body_types'] = $this->Dealer_model->get_body_type();
        	    
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    public function edit_body_type()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_body_type_submit"])){
            	    
                    $data['name']=$this->input->post('body_type');
            		
            	
                    $this->form_validation->set_rules('body_type', 'body_type', 'required|min_length[1]|max_length[40]');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_body_type';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data Body Type';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                    	    $data['body_types'] = $this->Dealer_model->get_body_type();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('body_type_id')){
                			    $id = $this->input->post('body_type_id');
                			    $body_type_detail = $this->Dealer_model->edit_body_type($id, $data);
                			}else{
                			    $body_type_detail = $this->Dealer_model->save_body_type($data);
                			}
                			
                            if($body_type_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_body_type');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The body type!');
                                redirect('admin/get_master_data_body_type');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}


    // --------------------------master fuel type ---------------------
    // -----------------------------------------------------------
    
    public function get_master_data_fuel_type(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_fuel_type';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data fuel type';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
        	    
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    
	
	public function edit_fuel_type()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_fuel_type_submit"])){
            	    
                    $data['name']=$this->input->post('fuel_type');
            		
            	
                    $this->form_validation->set_rules('fuel_type', 'fuel_type', 'required|min_length[1]|max_length[40]');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_fuel_type';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data fuel Type';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                    	    $data['fuel_types'] = $this->Dealer_model->get_fuel_type();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('fuel_type_id')){
                			    $id = $this->input->post('fuel_type_id');
                			    $fuel_type_detail = $this->Dealer_model->edit_fuel_type($id, $data);
                			}else{
                			    $fuel_type_detail = $this->Dealer_model->save_fuel_type($data);
                			}
                			
                            if($fuel_type_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_fuel_type');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The fuel type!');
                                redirect('admin/get_master_data_fuel_type');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}


    // ----------------  master transmission ---------------------
    // -----------------------------------------------------------
    
    public function get_master_data_transmission(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_transmission';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data transmission';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['transmissions'] = $this->Dealer_model->get_transmission();
        	   
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
	public function edit_transmission()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_transmission_submit"])){
            	    
                    $data['name']=$this->input->post('transmission');
            		
            	
                    $this->form_validation->set_rules('transmission', 'transmission', 'required|min_length[1]|max_length[70]');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_transmission';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data transmission';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                    	    $data['transmissions'] = $this->Dealer_model->get_transmission();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('transmission_id')){
                			    $id = $this->input->post('transmission_id');
                			    $transmission_detail = $this->Dealer_model->edit_transmission($id, $data);
                			}else{
                			    $transmission_detail = $this->Dealer_model->save_transmission($data);
                			}
                			
                            if($transmission_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_transmission');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The transmission!');
                                redirect('admin/get_master_data_transmission');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}
    
    
    // ----------------------------equipments -------------------
    // ----------------------------------------------------------
    
    public function get_master_data_equipment(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_equipment';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data equipment';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    $data['equipments'] = $this->Dealer_model->get_equipments();
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
	public function edit_equipment()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_equipment_submit"])){
            	    
                    $data['name']=$this->input->post('equipment');
            		
            	
                    $this->form_validation->set_rules('equipment', 'equipment', 'required|min_length[1]|max_length[40]');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_equipment';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data equipment';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                    	    $data['equipments'] = $this->Dealer_model->get_equipments();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('equipment_id')){
                			    $id = $this->input->post('equipment_id');
                			    $equipment_detail = $this->Dealer_model->edit_equipment($id, $data);
                			}else{
                			    $equipment_detail = $this->Dealer_model->save_equipment($data);
                			}
                			
                            if($equipment_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_equipment');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The equipment!');
                                redirect('admin/get_master_data_equipment');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}
	
	 
	
	// --------------------master where is it ---------------------
    // -----------------------------------------------------------
    public function get_master_data_where_is_it(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_where_is_it';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data where is it';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
        	    $data['featured_where_is_its'] = $this->Dealer_model->get_featured_where_is_it();
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    public function edit_where_is_it()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_where_is_it_submit"])){
            	    
                    $data['name']=$this->input->post('where_is_it');
            		
            	
                    $this->form_validation->set_rules('where_is_it', 'where_is_it', 'required|min_length[1]|max_length[40]');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_where_is_it';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data where is it';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	        $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
                	        $data['featured_where_is_its'] = $this->Dealer_model->get_featured_where_is_it();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('where_is_it_id')){
                			    $id = $this->input->post('where_is_it_id');
                			    $where_is_it_detail = $this->Dealer_model->edit_where_is_it($id, $data);
                			}else{
                			    $where_is_it_detail = $this->Dealer_model->save_where_is_it($data);
                			}
                			
                            if($where_is_it_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_where_is_it');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The where is it!');
                                redirect('admin/get_master_data_where_is_it');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}

    
    	
	// --------------------master mileage---------------------
    // -----------------------------------------------------------
    public function get_master_data_mileage(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_mileage';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data mileage';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['mileages'] = $this->Dealer_model->get_mileage();
        	    
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    public function edit_mileage()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_mileage_submit"])){
            	    
                    $data['name']=$this->input->post('mileage');
            		
            	
                    $this->form_validation->set_rules('mileage', 'mileage', 'required');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_mileage';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data mileage';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	        $data['mileages'] = $this->Dealer_model->get_mileage();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('mileage_id')){
                			    $id = $this->input->post('mileage_id');
                			    $mileage_detail = $this->Dealer_model->edit_mileage($id, $data);
                			}else{
                			    $mileage_detail = $this->Dealer_model->save_mileage($data);
                			}
                			
                            if($mileage_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_mileage');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The mileage!');
                                redirect('admin/get_master_data_mileage');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}

    	
	// --------------------master price ---------------------
    // -----------------------------------------------------------
    public function get_master_data_price(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_price';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data price';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['prices'] = $this->Dealer_model->get_price();
        	    
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    public function edit_price()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_price_submit"])){
            	    
                    $data['name']=$this->input->post('price');
            		
            	
                    $this->form_validation->set_rules('price', 'price', 'required');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_price';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data price';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	        $data['prices'] = $this->Dealer_model->get_price();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('price_id')){
                			    $id = $this->input->post('price_id');
                			    $price_detail = $this->Dealer_model->edit_price($id, $data);
                			}else{
                			    $price_detail = $this->Dealer_model->save_price($data);
                			}
                			
                            if($price_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_price');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The where is it!');
                                redirect('admin/get_master_data_price');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}

    	
	// --------------------master year ---------------------
    // -----------------------------------------------------------
    public function get_master_data_year(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master_data_year';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data year';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	    
        	    $data['years'] = $this->Dealer_model->get_year();
        	    
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}
    
    
    public function edit_year()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	    
            	$this->load->model('Dealer_model');
            
            	if(isset($_POST["edit_year_submit"])){
            	    
                    $data['name']=$this->input->post('year');
            		
            	
                    $this->form_validation->set_rules('year', 'year', 'required');
                
                		if($this->form_validation->run() == FALSE){
               
                            // Page Specific Information
                    	    $data['view']='admin/master_data_year';
                    	    $data['page'] = 'page';
                    	    $data['title'] = 'Astermotori | Master Data year';
                    	    
                    	   // notification count
                    	    $this->load->model('Dealer_model');
                    	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
                    	    
                    	   // notification total  msg
                    	   $this->load->model('Chat_model');
                            $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
                            
                	        $data['years'] = $this->Dealer_model->get_year();
                    	   
                    	    
                    	   // Loads View
                    		$this->load->view('admin/layouts/main',$data);
                
                		}  
                		else{
                		    
                			
                			if($this->input->post('year_id')){
                			    $id = $this->input->post('year_id');
                			    $year_detail = $this->Dealer_model->edit_year($id, $data);
                			}else{
                			    $year_detail = $this->Dealer_model->save_year($data);
                			}
                			
                            if($year_detail != NULL){
                                
                                $this->session->set_flashdata('success','Added Successfully!');
                                redirect('admin/get_master_data_year');
                                   
                            }else{
                                $this->session->set_flashdata('error', 'Unable To Insert The year!');
                                redirect('admin/get_master_data_year');
                            }
                		}
                }
                
                
                
                
	        }else{
    	        redirect('authenticate');
    	    }
	    }else{
	        redirect('authenticate');
	    }    
        
    	
	}
    public function Master_data(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
	            
        	    
        	    // Page Specific Information
        	    $data['view']='admin/master-data';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Master Data';
        	   
        	   // notification count----- get new dealer
        	    $this->load->model('Dealer_model');
        	    $data['all_dealers'] = $this->Dealer_model->get_new_dealers();
        	    
        	    // notification total  msg
        	    $this->load->model('Chat_model');
                $data['chat_notification_total'] = $this->Chat_model->get_notification_total($_SESSION['am_user_id'] );
        	    
        	   // Loads View
        		$this->load->view('admin/layouts/main',$data);
	        }else{
	           // $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('authenticate');
	        }
	    }else{
            // $this->session->set_flashdata('error','Please Login To Continue');
            redirect('authenticate');
        }
	}


	public function paid_acution(){

		if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){

			$auction_id = $this->uri->segment(3);
			//load model 
			$this->load->model('Auction_model');
			
			if(!empty($auction_id)){
             //check id is not empty
             
			$status_update = array('status' => 'payment_done' );

			$paid = $this->Auction_model->updateData('auction_car', $status_update , array('id'=>$auction_id));
            
			redirect('admin/cash_payments');


			}

			}else{
				// $this->session->set_flashdata('error','Please Login To Continue');
				 redirect('authenticate');
			 }
		 }else{
			 // $this->session->set_flashdata('error','Please Login To Continue');
			 redirect('authenticate');
		 }


	}


    public function upload_document(){
		
		if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
	            
        	    $this->load->library('upload');
            	$this->load->model('Auction_model');
            	$this->load->model('Media_model');
        
        	    $auction_id = $this->input->post('auction_id');
        	   
				if($auction_id != NULL){
                  
                //four types files
				$change_of_ownership     = $_FILES['change_of_ownership']['name'];
				$autherization_documents = $_FILES['autherization_documents']['name'];
				$report_of_delivery      = $_FILES['report_of_delivery']['name'];
				$invocie                 = $_FILES['invocie']['name'];

                // -------------change_of_ownership upload-----
                // ---------------------------------------
                
                    if(!empty($change_of_ownership)){
                    
					//for 1st image
					$dataInfoeng = array();
                    $files = $_FILES;
                                           
                    $_FILES['change_of_ownership']['name']= $files['change_of_ownership']['name'];
                    $_FILES['change_of_ownership']['type']= $files['change_of_ownership']['type'];
                    $_FILES['change_of_ownership']['tmp_name']= $files['change_of_ownership']['tmp_name'];
                    $_FILES['change_of_ownership']['error']= $files['change_of_ownership']['error'];
                    $_FILES['change_of_ownership']['size']= $files['change_of_ownership']['size'];    
                
                    $this->upload->initialize($this->set_upload_invdoc());
                    $this->upload->do_upload('change_of_ownership');
                    $dataInfoeng = $this->upload->data();
        	            
                    $data_1  =  array(
                                    'change_of_ownership' => $dataInfoeng['file_name'],
                                      );
                    $result = $this->Auction_model->updateData('auction_car',$data_1 , array('id'=>$auction_id));
					//for 1st image end
					}
                    
					if(!empty($autherization_documents)){
					//for 2st image
					$dataInfoeng2 = array();
                    $files = $_FILES;
                                           
                    $_FILES['autherization_documents']['name']= $files['autherization_documents']['name'];
                    $_FILES['autherization_documents']['type']= $files['autherization_documents']['type'];
                    $_FILES['autherization_documents']['tmp_name']= $files['autherization_documents']['tmp_name'];
                    $_FILES['autherization_documents']['error']= $files['autherization_documents']['error'];
                    $_FILES['autherization_documents']['size']= $files['autherization_documents']['size'];    
                
                    $this->upload->initialize($this->set_upload_invdoc());
                    $this->upload->do_upload('autherization_documents');
                    $dataInfoeng2 = $this->upload->data();
        	            
                    $data_2  =  array(
                                    'autherization_documents' => $dataInfoeng2['file_name'],
                                      );
                    $result2 = $this->Auction_model->updateData('auction_car',$data_2 , array('id'=>$auction_id));
					//for 2st image end
					}

					if(!empty($report_of_delivery)){

					//for 3rd image
					$dataInfoeng3 = array();
                    $files = $_FILES;
                                           
                    $_FILES['report_of_delivery']['name']= $files['report_of_delivery']['name'];
                    $_FILES['report_of_delivery']['type']= $files['report_of_delivery']['type'];
                    $_FILES['report_of_delivery']['tmp_name']= $files['report_of_delivery']['tmp_name'];
                    $_FILES['report_of_delivery']['error']= $files['report_of_delivery']['error'];
                    $_FILES['report_of_delivery']['size']= $files['report_of_delivery']['size'];    
                
                    $this->upload->initialize($this->set_upload_invdoc());
                    $this->upload->do_upload('report_of_delivery');
                    $dataInfoeng3 = $this->upload->data();
        	            
                    $data_3  =  array(
                                    'report_of_delivery' => $dataInfoeng3['file_name'],
                                      );
                    $result3 = $this->Auction_model->updateData('auction_car',$data_3 , array('id'=>$auction_id));
					//for 3rd image end
				    }

					if(!empty($invocie)){

					//for 4th image
					$dataInfoeng4 = array();
                    $files = $_FILES;
                                           
                    $_FILES['invocie']['name']= $files['invocie']['name'];
                    $_FILES['invocie']['type']= $files['invocie']['type'];
                    $_FILES['invocie']['tmp_name']= $files['invocie']['tmp_name'];
                    $_FILES['invocie']['error']= $files['invocie']['error'];
                    $_FILES['invocie']['size']= $files['invocie']['size'];    
                
                    $this->upload->initialize($this->set_upload_invdoc());
                    $this->upload->do_upload('invocie');
                    $dataInfoeng4 = $this->upload->data();
        	            
                    $data_4  =  array(
                                    'invocie' => $dataInfoeng4['file_name'],
                                      );
                    $result4 = $this->Auction_model->updateData('auction_car',$data_4 , array('id'=>$auction_id));
					//for 4th image end
					}
 

                   
               
				
				
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                // ------------------------------------------------
                
              
        	    }
                $this->session->set_flashdata('mediaeng_success','Document Upload Successfully!');
                redirect('admin/cash_payments');
                // ------------------------------------------------
                // ------------------------------------------------
	        }else{
    	        redirect('admin');
    	    }
	    }else{
	        redirect('admin');
	    }
	}
	
      
    
    
	
}
