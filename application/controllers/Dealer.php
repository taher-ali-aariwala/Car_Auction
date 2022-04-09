<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {

	
	public function dealer_logout(){

        $this->load->model('Dealer_model');
        $dealer_id = $this->session->userdata('dl_user_id');
        $success = $this->Dealer_model->set_deactive_userstatus($dealer_id);

        if($success){
    	    $this->session->unset_userdata('dl_user_name');
    	    $this->session->unset_userdata('dl_user_id');
    	    $this->session->unset_userdata('dl_logged_in');
    	   
    	    $user_id = array(
               'name'   => 'dl_user_id',
               'value'  => $dealer_id,
               'expire' => '-36000',
            );
            $user_name = array(
               'name'   => 'dl_user_name',
               'value'  => $this->input->cookie('dl_user_name'),
               'expire' => '-36000',
            );
            $password = array(
               'name'   => 'dl_pass_key',
               'value'  => $this->input->cookie('dl_pass_key'),
               'expire' => '-36000',
            );
            
            $this->input->set_cookie($user_id);
            $this->input->set_cookie($user_name);
            $this->input->set_cookie($password);
           
           
    	    $this->session->set_flashdata('success', 'Dealer Logged Out Successfuly!');
            redirect('website/login');
        }
	}
	
	/**********************************************************************/
    /**********************************************************************/
    /**************************** LOGIN *******************************/
    /**********************************************************************/
    /**********************************************************************/
	
	public function check(){
       $this->load->model('Dealer_model');
       if($this->session->userdata('dl_logged_in')){
           
            $user_id = $this->session->userdata('dl_user_id');
            $user_data = $this->Dealer_model->dealer_login_data($user_id);
            
           // echo $this->input->cookie('pass_key');
           
           if(isset($user_data)){
               if(($user_data)){
                    $callback_url = 'dealer/index';
                    $data['view'] = $callback_url;
                    redirect($callback_url);
                
                // END if : WHEN LOGIN DATA FROM MODEL IS RETURNED  
                
                }else{
         
                    // $this->session->set_flashdata('error','Please sign-in to continue..');
                    redirect('website/login');
                
                //END else : IF NO LOGIN DATA IS RETURNED FROM MODEL           
                }
           }
           
       }else if($this->input->cookie('user_id')){
           
           $user_id = $this->input->cookie('user_id');
           $user_data = $this->Dealer_model->dealer_login_data($user_id);
           
           if(isset($user_data)){
               if(($user_data)){
                    $email = $user_data->email;
                    $password = $user_data->password;
                    
                    $pass_key = $this->input->cookie('pass_key');
                    $pw = (explode(".",$pass_key));
                    $cookie_pwd = $pw[0];
                    
                    if($cookie_pwd == $password){
                        $callback_url = 'dealer/index';
                        $data['view']=$callback_url;
                        redirect($callback_url);
                        
                      // END if : WHEN LOGIN DATA SAME AS COOKIES 
                    }else{
                        $this->session->set_flashdata('error','Please sign-in to continue..');
                        redirect('website/login');
                        // END ELSE : WHEN COOKIES DATA ARE NOT EQUAL
                    }
                    
                // END if : WHEN LOGIN DATA FROM MODEL IS RETURNED  
                }else{
                    $this->session->set_flashdata('error','Please sign-in to continue..');
                    redirect('website/login');
                
                //END else : IF NO LOGIN DATA IS RETURNED FROM MODEL           
                }
           }
           
           // END IF : COOKIES CHECK
       }else{
           
            redirect('website/login');
            // END ELSE: NO SESSION OR NO COOKIES ARE FOUND --SO REDIRECT TO LOGIN PAGE
       }
        
    }
	
	
	public function auth(){
        $this->load->model('Dealer_model');
        
        if($this->input->post('login_btn_dealer')){   
            //  form validation

            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error',validation_errors());
                redirect('website/login');
            
            // END IF : RECIEVED LOGIN DATA VALIDATION    
            }else{
                
                $data['password'] = md5($this->input->post('password'));
                $data['email'] = $this->input->post('email');
                
                $login_data = $this->Dealer_model->login($data);
                  
                if(!($login_data)){
                    $this->session->set_flashdata('error','Email and password do not match.');
                    redirect('website/login');
                
                //END IF : IF NO LOGIN DATA IS RETURNED FROM MODEL     
                }else{
                    
                    // if($login_data->varify_email == 0){
                        
                    //     $this->session->set_flashdata('error','Please verify Your email to continue..');
                    //     redirect('website/login');
                        
                    // }else{
                        if($login_data->status == 'unapproved'){
                            
                            $this->session->set_flashdata('error','Please wait till your profile is approved. we will notify you shortly through email!');
                            redirect('website/login'); 
                            
                        }else{
                            
                            $user_id = array(
                               'name'   => 'dl_user_id',
                               'value'  => $login_data->id,
                               'expire' => '36000',
                            );
                            $user_name = array(
                               'name'   => 'dl_user_name',
                               'value'  => $login_data->name,
                               'expire' => '36000',
                            );
                            $enc_pass = $data['password']."~9hdfise~7y493947~kcbgjaddd73b";
                            $password = array(
                               'name'   => 'dl_pass_key',
                               'value'  => $enc_pass,
                               'expire' => '36000',
                            );
                          
                            
                            $this->input->set_cookie($user_id);
                            $this->input->set_cookie($user_name);
                            $this->input->set_cookie($password);
                            
                            $this->session->set_userdata('dl_logged_in',TRUE);
                            $this->session->set_userdata('dl_user_name',$login_data->name);
                            $this->session->set_userdata('dl_user_id',$login_data->id);
                            
                            $user_id = $login_data->id;
                            $success = $this->Dealer_model->set_active_userstatus($user_id);
                            
                            if($success){
                                $callback_url = 'dealer/index';
                                $data['view'] = $callback_url;
                                redirect($callback_url);
                            }

                            
                            
                        }
                    // }
                    
                    
                
                // END ELSE : WHEN LOGIN DATA FROM MODEL IS RETURNED        
                }
            
            // END IF : WHERE LOGIN DATA VALIDATION GOES TRUE
            }
        
        // END IF : FOR LOGIN BUTTON CLICK    
        }else{
            $this->session->set_flashdata('error','Please Login to continue..');
            redirect('website/login');
        
        // END ELSE : WHEN DATA IS NOT POSTED VIA LOGIN PAGE     
        }
    // END METHOD AUTH
    }
    /**********************************************************************/
    /**********************************************************************/
    /**************************** DASHBOARD *******************************/
    /**********************************************************************/
    /**********************************************************************/
    
	public function index(){
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
                
        	    $data['brands'] = $this->Dealer_model->get_brands();
        	    $data['featured_brands'] = $this->Dealer_model->get_featured_brands();
        	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
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
            	    
            	    $data['brands'] = $this->Dealer_model->get_brands();
            	    $data['featured_brands'] = $this->Dealer_model->get_featured_brands();
            	    $data['where_is_its'] = $this->Dealer_model->get_where_is_it();
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
	    
	    
	    
	    
	    
	    
	    
	   // if(isset($_SESSION['dl_logged_in'])){
	   //     if($_SESSION['dl_logged_in']){
        	    
    //     	    $this->load->model('Auction_model');
        	    
    //     	   // Page Specific Information
    //     	    $data['view']='dealer/index';
    //     	    $data['page'] = 'page';
    //     	    $data['title'] = 'Astermotori | Dashboard';
                
    //             $this->load->library("pagination");
        	    
    //     	    $config = array();
    //             $config["base_url"] = base_url() . "/Dealer/index/";
    //             $config["total_rows"] = $this->Auction_model->get_count_auctions();
    //             $config["per_page"] = 9;
    //             $config["uri_segment"] = 3;
    //             // $config["use_page_numbers"] = TRUE;
                
    //             $this->pagination->initialize($config);

    //             $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
    //             $data["links"] = $this->pagination->create_links();
        
    //             $data['all_auctions'] = $this->Auction_model->get_auctions_publish($config["per_page"], $page);
                
    //             // $data['all_auctions'] = $this->Auction_model->get_auctions_publish();
    //     	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	   
    //           $data['auction_id_latestoffer'] = array();
    //             foreach($data['all_auctions'] as $auction){
    //                 $data1['max_current_offer'] = $this->Auction_model->get_max_current_offer($auction->id);
    //                 $data1['auction_id_latestoffer'] = array(
    //                     'current_offer' => $data1['max_current_offer'],
    //                     'auction_id' =>$auction->id,
    //                     );
    //                 array_push($data['auction_id_latestoffer'], $data1['auction_id_latestoffer']);
    //             }
                
    //             // var_dump($data['auction_id_latestoffer']); die;


    //     	   //  $data['all_auctions_bids'] = $this->Auction_model->get_all_auctions_bids();
        	    
    //     		$this->load->view('dealer/layouts/main',$data);
    
	   //     }else{
	   //         $this->session->set_flashdata('error','Please Login To Continue');
	   //         redirect('website/login');
	   //     }
	   // }else{
    //         $this->session->set_flashdata('error','Please Login To Continue');
    //         redirect('website/login');
    //     }
	}
	
	
	public function profile(){
	    
	    // Page Specific Information
	    $data['view']='dealer/profile';
	    $data['page'] = 'page';
	    $data['title'] = 'Astermotori | Profile';
	    
	    $this->load->view('dealer/layouts/main',$data);
	       
	}
	
	
	public function register()
	{
	    include APPPATH . 'sendgrid/sendgrid-php.php';
    
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    	$this->load->model('Dealer_model');
    	 
    	if(isset($_POST["submit"])){
    	    
                    
            $data['name']=$this->input->post('name');
    		$data['surname']=$this->input->post('surname');
    		$data['company_name']=$this->input->post('company_name');
    		$data['email']=$this->input->post('email');
    		$data['phone']=$this->input->post('phone');
    		$data['address']=$this->input->post('address');
    		$data['city']=$this->input->post('city');
    		$data['postal_code']=$this->input->post('postal_code');
    		$data['province']=$this->input->post('province');
    		$data['password']= md5($this->input->post('password'));
    		$data['vat_number']=$this->input->post('vat_number');
    		$data['privacy_policy']=$this->input->post('privacy_policy');
    		$data['terms_condition']=$this->input->post('terms_condition');
    // 		$data['registration']=$this->input->post('registration');
            		

            $this->form_validation->set_rules('name', 'name', 'required|alpha_numeric_spaces|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('surname', 'surname', 'required|alpha_numeric_spaces|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('company_name', 'company name', 'required|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[dealer.email]');
            $this->form_validation->set_rules('phone', 'phone', 'required|numeric|min_length[6]|max_length[15]');
             $this->form_validation->set_rules('address', 'address', 'required|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('city', 'city', 'required|alpha|min_length[1]|max_length[30]');
            $this->form_validation->set_rules('postal_code', 'postal code', 'required|min_length[1]|max_length[30]');
            $this->form_validation->set_rules('province', 'province', 'required|alpha_numeric_spaces|min_length[1]|max_length[30]');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
            $this->form_validation->set_rules('repeat_password', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('vat_number', 'vat number', 'required|min_length[1]|max_length[30]');
            $this->form_validation->set_rules('privacy_policy', 'privacy policy', 'required');
            $this->form_validation->set_rules('terms_condition', 'terms and conditions', 'required');
            
            if(empty($_FILES['identity_card']['name'])){
            $this->form_validation->set_rules('identity_card', 'identity card', 'required');
            }
            
            if(empty($_FILES['chamber_commerce']['name'])){
                $this->form_validation->set_rules('chamber_commerce', 'chamber of commerce registration', 'required');
            }
        		
        		if($this->form_validation->run() == FALSE){
       
                    // Page Specific Information
            	    $data['view']='website/register';
            	    $data['page'] = 'page';
            	    $data['title'] = 'Astermotori | Register';
            	    
            	   // Loads View
            		$this->load->view('website/layouts/main',$data);
        
        		}  
        		else{
        		    if(!empty($_FILES['chamber_commerce']['name'])){
                        $config['upload_path']          = './uploads/dealer/documents';
                        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
                        $config['max_size']             = 10000;
                        $config['max_width']            = 2224;
                        $config['max_height']           = 1768;
                        $config['file_name'] = $_FILES['chamber_commerce']['name'];
                       
                        
                        //Load upload library and initialize here configuration
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('chamber_commerce')){
                            $uploadData = $this->upload->data();
                            $data['chamber_commerce'] = $uploadData['file_name'];
                           
                        }else{
                            
                            $this->session->set_flashdata('error', 'Document type( gif | jpg | png | pdf | doc | docx ) can upload only, please try again with another formate!');
        			        redirect('website/register');
                        }
                    }
                    
                    if(!empty($_FILES['identity_card']['name'])){
                        $config['upload_path']          = './uploads/dealer/documents';
                        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
                        $config['max_size']             = 10000;
                        $config['max_width']            = 2224;
                        $config['max_height']           = 1768;
                        $config['file_name'] = $_FILES['identity_card']['name'];
                       
                        
                        //Load upload library and initialize here configuration
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('identity_card')){
                            $uploadData = $this->upload->data();
                            $data['identity_card'] = $uploadData['file_name'];    //'idcard/'.$uploadData['file_name'];
                        }else{
                            
                            $this->session->set_flashdata('error', 'Document type( gif | jpg | png | pdf | doc | docx ) can upload only, please try again with another formate!');
        			        redirect('website/register');
                        }
                    }
        		    
        		    
        			$dealer_id = $this->Dealer_model->save_dealer($data);
        			
        			
                    if($dealer_id != NULL){
                        
                         $user_data = $this->Dealer_model->dealer_login_data($dealer_id);       
                         //mail function 
                        $email = new \SendGrid\Mail\Mail();
                        $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                        $email->setSubject("Dealer Registration request");
                        $email->addTo('astemotoricar@gmail.com' , 'Astemotori Admin');
                        
                        $d['name'] = $user_data->name;
                        $d['surname'] = $user_data->surname;
                        $d['company_name'] = $user_data->company_name;
                        $d['phone'] = $user_data->phone;
                        $d['email'] = $user_data->email;
                        $d['vat_number'] = $user_data->vat_number;
                        $d['address'] = $user_data->address;
                        $d['city'] = $user_data->city;
                        $d['postal_code'] = $user_data->postal_code;
                        $d['province'] = $user_data->province;
                        $d['identity_card'] = $user_data->identity_card;
                        $d['chamber_commerce'] = $user_data->chamber_commerce;
                        
                        $content = $this->load->view('mail/dealer_registered',$d,true);
                        $email->addContent(
                            "text/html",$content);
                
                        $sendgrid = new \SendGrid(('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'));
                        try {
                            $response = $sendgrid->send($email);
                            if($response){
                                          
                                     //mail function 
                                    $email = new \SendGrid\Mail\Mail();
                                    $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                                    $email->setSubject("Dealer Registration request");
                                    $email->addTo($d['email'], $d['name']);
                                    
                                    
                                    $content = $this->load->view('mail/dealer_welcome',$d,true);
                                    $email->addContent(
                                        "text/html",$content);
                            
                                    $sendgrid = new \SendGrid(('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'));
                                    try {
                                        $response = $sendgrid->send($email);
                                        
                                       
                                    } catch (Exception $e) {
                                       
                                        $this->session->set_flashdata('error','Account not Registered, please try again!');
                                        redirect('website/register');
                                    }
                            }
                            $this->session->set_flashdata('success','Account Registered successfully, Please wait till verified!');
                            redirect('website/login');
                           
                        } catch (Exception $e) {
                           
                            $this->session->set_flashdata('error','Account not Registered, please try again!');
                            redirect('website/register');
                        }
                        
                    }    
        		}
        }
    	
	}


    function verify_account()
    {
        include APPPATH . 'sendgrid/sendgrid-php.php';
        $this->load->model('Dealer_model');
        $user_id = $this->uri->segment(3);
        
        if(isset($user_id)){

            
            $dealer_id = $this->Dealer_model->varify_dealer($user_id);
            if(isset($dealer_id)){
                
                $user_data = $this->Dealer_model->dealer_login_data($user_id);       
                 //mail function 
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                $email->setSubject("Dealer Registration request");
                $email->addTo('astemotoricar@gmail.com' , 'Astemotori Admin');
                
                $d['name'] = $user_data->name;
                $d['surname'] = $user_data->surname;
                $d['company_name'] = $user_data->company_name;
                $d['phone'] = $user_data->phone;
                $d['email'] = $user_data->email;
                $d['vat_number'] = $user_data->vat_number;
                $d['address'] = $user_data->address;
                $d['city'] = $user_data->city;
                $d['postal_code'] = $user_data->postal_code;
                $d['province'] = $user_data->province;
                $d['identity_card'] = $user_data->identity_card;
                $d['chamber_commerce'] = $user_data->chamber_commerce;
                
                $content = $this->load->view('mail/dealer_registered',$d,true);
                $email->addContent(
                    "text/html",$content);
        
                $sendgrid = new \SendGrid(('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'));
                try {
                    $response = $sendgrid->send($email);
                    $this->session->set_flashdata('success','Account is Successfully Verified!');
                    redirect('website/login');
                   
                } catch (Exception $e) {
                   
                    $this->session->set_flashdata('error','Account is not Verified now, please try again!');
                    redirect('website/register');
                }
                
            }    
            

            
        }

    }

    public function forget_password()
	{
	    include APPPATH . 'sendgrid/sendgrid-php.php';
    
    	$this->load->model('Dealer_model');
    	 
    	if(isset($_POST["forget_btn"])){
    	    
                    
            $email = $this->input->post('email');
    		
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
           
        		
        		if($this->form_validation->run() == FALSE){
       
                    /// Page Specific Information
            	    $data['view']='website/forget_password';
            	    $data['page'] = 'page';
            	    $data['title'] = 'Astermotori | Forget Password';
            	    
            	   // Loads View
            		$this->load->view('website/layouts/main',$data);
        
        		}  
        		else{
        		    
                    
        			$dealer = $this->Dealer_model->get_dealer_id($email);
        			
                    if($dealer != NULL){
                        
                         //mail function 
                        $email = new \SendGrid\Mail\Mail();
                        $email->setFrom("dbsharukh@gmail.com", "Astemotori");
                        $email->setSubject("Reset Password");
                        $email->addTo($dealer->email , $dealer->name);
                        
                        $getdealer = $this->Dealer_model->get_dealer($dealer->id);
                        $d['getusers'] = $getdealer;
                        $content = $this->load->view('mail/forget_password',$d,true);
                        $email->addContent(
                            "text/html",$content);
                
                        $sendgrid = new \SendGrid(('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'));
                        try {
                            $response = $sendgrid->send($email);
                            $this->session->set_flashdata('success','Please check your mail to reset password!');
                            redirect('website/forget_password');
                            // print $response->statusCode() . "\n";
                            // print_r($response->headers());
                            // print $response->body() . "\n";
                        } catch (Exception $e) {
                            // echo 'Caught exception: '. $e->getMessage() ."\n";
                            $this->session->set_flashdata('error', 'Unable To Reset dealer password!');
                            redirect('website/forget_password');
                        }
                        
                    }else{
                        $this->session->set_flashdata('error',"The email address you entered isn't connected to an account.");
                        redirect('website/forget_password');
                    }    
        		}
        }
    	
	}

	function reset_password()
    {
        $this->load->model('Dealer_model');
        $user_id = $this->uri->segment(3);
        
        if(isset($user_id)){

        //   Page Specific Information
    	    $data['view']='website/reset_password';
    	    $data['page'] = 'page';
    	    $data['title'] = 'Astermotori | Reset Password';
    	    
    	   // Loads View
    		$this->load->view('website/layouts/main',$data);

        }

    }
    
    function reset_password_save()
    {
        $this->load->model('Dealer_model');
    	 
    	if(isset($_POST["reset_btn"])){
    	    
    		$password = md5($this->input->post('password'));
    		$dealer_id = $this->input->post('dealer_id');
    		

            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
            $this->form_validation->set_rules('repeat_password', 'Password Confirmation', 'trim|required|matches[password]');
            
        		
        		if($this->form_validation->run() == FALSE){
       
                    // Page Specific Information
            	    $data['view']='website/reset_password';
            	    $data['page'] = 'page';
            	    $data['title'] = 'Astermotori | Reset Password';
            	    
            	   // Loads View
            		$this->load->view('website/layouts/main',$data);
        
        		}  
        		else{
        		    
        		    $dealer_id = $this->Dealer_model->reset_password($password, $dealer_id);
                    if($dealer_id != NULL){
                        $this->session->set_flashdata('success','Password reset Successfully, you can login now!');
                        redirect('website/login');
                    }    
        		}
        }
    	
	}
	
	public function auction_won(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Auction_model');
	            
        	    // Page Specific Information
        	    $data['view']='dealer/auction_won';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Auction Won';
        	    
        	    
        	    $data['all_awarded_auctions'] = $this->Auction_model->get_auctions_awarded();
        	    $data['all_main_images']      = $this->Auction_model->get_all_main_image();
        	    
        	    $data['all_dealer_awarded_auction'] = $this->Auction_model->get_all_dealer_awarded_auction($_SESSION['dl_user_id']);
        	    
        	    
        	    $this->load->view('dealer/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}
	public function my_bids(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Auction_model');
	            
        	    // Page Specific Information
        	    $data['view']='dealer/my_bids';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | My Bids';
        	    
        	    $this->load->library("pagination");
        	    
        	    $config = array();
                $config["base_url"] = base_url() . "/Dealer/my_bids/";
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

        	    $data['dealer_bids'] = $this->Auction_model->get_all_dealer_bids($_SESSION['dl_user_id']);
        	    
        	    $this->load->view('dealer/layouts/main',$data);
        	    
        	   
        	    
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	       
	}
	
	public function favorites(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            $this->load->model('Auction_model');
	            
        	    // Page Specific Information
        	    $data['view']='dealer/favorites';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Favorites';
        	    
        	    $this->load->library("pagination");
        	    
        	    $config = array();
                $config["base_url"] = base_url() . "/Dealer/favorites/";
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

        	    $data['all_favorite'] = $this->Auction_model->get_all_favorite($_SESSION['dl_user_id']);
        	    
        	    $this->load->view('dealer/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	       
	}
	
	
	
	public function show_cart(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Auction_model');
	            
        	    // Page Specific Information
        	    $data['view']='dealer/show_cart';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Show Cart';
        	    
        	    $data['all_awarded_auctions'] = $this->Auction_model->get_auctions_awarded();
        	    $data['all_main_images'] = $this->Auction_model->get_all_main_image();
        	    
        	    $data['all_dealer_awarded_auction'] = $this->Auction_model->get_all_dealer_awarded_auction($_SESSION['dl_user_id']);
        	    
        	    $this->load->view('dealer/layouts/main',$data);
        	    
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	       
	}
	public function my_purchases(){
	    
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    // Page Specific Information
        	    $data['view']='dealer/my_purchases';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | My Purchases'; 
        	    
                $this->load->model('Auction_model');
                $data['all_awarded_auctions'] = $this->Auction_model->get_auctions_payment_done();
                $data['all_dealer_purchase']  = $this->Auction_model->get_all_dealer_purchase_auction($_SESSION['dl_user_id']);
                $data['all_main_images']      = $this->Auction_model->get_all_main_image();

        	    $this->load->view('dealer/layouts/main',$data);

	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	       
	}
	public function my_documents(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    // Page Specific Information
        	    $data['view']='dealer/my_documents';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | My Documents';
        	    
        	    $dealer_id = $_SESSION['dl_user_id'];
        	    
        	    $this->load->model('Dealer_model');
        	    $data['dealers'] = $this->Dealer_model->get_dealer($dealer_id);
        	    
        	    $this->load->view('dealer/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}
	
	public function chat_list(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){

	            $this->load->model('Chat_model');

        	    // Page Specific Information
        	    $data['view']='dealer/chat_list';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Chat List';
        	    
                $dealer_id = $_SESSION['dl_user_id'];
                $data['auction_chat'] = $this->Chat_model->get_auction_chat($dealer_id);
                
                // notification
                $data['chat_notification_team_msg'] = $this->Chat_model->get_notification_team($dealer_id );
                    
                $data['last_chatmsg'] = array();
                $data['chat_notification'] = array();
                foreach($data['auction_chat'] as $auctionchat){
                    $data1['last_chatmsg'] = $this->Chat_model->get_last_chatmsg($auctionchat->chat_id);
                    array_push($data['last_chatmsg'], $data1['last_chatmsg']);

                    // notification
                    $data1['chat_notification'] = $this->Chat_model->get_notification($auctionchat->chat_id, $dealer_id );

                    $countnot = count($data1['chat_notification']);
                    $data1['chatnot'] = array(
                        'chat_id' => $auctionchat->chat_id,
                        'not_count' => $countnot,
                    );
                    
                    array_push($data['chat_notification'], $data1['chatnot']);

                    
                }
                // var_dump($data['chat_notification']); die;
        	    $this->load->view('dealer/layouts/main',$data);
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}
	
	public function chat(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
        	    // Page Specific Information
        	    $data['view']='dealer/chat';
        	    $data['page'] = 'page';
        	    $data['title'] = 'Astermotori | Chat';
        	    
        	    $this->load->view('dealer/layouts/main',$data);
        	    
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}
	

	public function add_to_wishlist(){ 
	    
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Dealer_model');
	            
	            $data['car_auction_id'] = $this->input->post('auc_id');
	            $data['dealer_id'] = $_SESSION['dl_user_id'];
	            
        	   	$dealer = $this->Dealer_model->insert_favorite($data);
        	   
            	   	if(!empty($dealer)){
            	   	echo json_encode(array(
            				"statusCode"=>200
            			));
            	   	}else{
            	   	    echo json_encode(array(
            				"statusCode"=>201
            			));
            	   	}
        	   	
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}
	
	
	public function delete_to_wishlist(){ 
	    
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
	            $this->load->model('Dealer_model');
	            
	            $car_auction_id = $this->input->post('auc_id');
	            $dealer_id = $_SESSION['dl_user_id'];
	            
        	   	$dealer = $this->Dealer_model->delete_favorite($car_auction_id, $dealer_id);
        	   
            	   	if(!empty($dealer)){
            	   	echo json_encode(array(
            				"statusCode"=>200
            			));
            	   	}else{
            	   	    echo json_encode(array(
            				"statusCode"=>201
            			));
            	   	}
        	   	
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}


    public function pay(){ 
	    
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
            
                // Page Specific Information
                $data['view']='dealer/payment';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | Pay';
                       
	            $this->load->model('Auction_model');
	            
	            $dealer_id = $_SESSION['dl_user_id'];
	            $order_id = uniqid();
                $date     = date('Y-m-d H:i:s');
                
                $price         = $this->input->post('price');
                $auction_id    = $this->input->post('auction_id');

                $data = array(
                        'auction_id' => $auction_id,
                        'price'      => $price,
                        'date'       => $date,
                        'user_id'    => $dealer_id,
                        'order_id'   => $order_id
                );

                $data['transaction'] = $this->Auction_model->insertData('myorder', $data);

            
        	    //$this->load->view('dealer/layouts/main',$data); 	
                redirect('Dealer/paynow/'.$order_id);
        	   	
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}

    public function paynow()
    {
        if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
                $this->load->model('Auction_model');
            
                // Page Specific Information
                $data['view']='dealer/stripe_payment';
                $data['page'] = 'page';
                $data['title'] = 'Astermotori | Proceed';
                      
	            $order_id = $this->uri->segment(3);
	            
	            
                $data['get_order'] = $this->Auction_model->getdata('myorder', array('order_id'=>$order_id));

            
        	    $this->load->view('dealer/layouts/main',$data); 	
                
        	   	
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
    }


    public function charge_deduct()
    {
        if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
	            
                $this->load->model('Auction_model');
                include(APPPATH.'views/dealer/stripe_info.php'); 


                if(isset($_POST['stripeToken'])){

                    $token     = $_POST['stripeToken'];
                    $order_id  = $_POST['order_id'];
                    
                    $order_data = $this->Auction_model->getdata('myorder', array('order_id'=>$order_id));
                    $price      = $order_data->price;
                    $order_id   = $order_data->order_id;
                    $user_id    = $order_data->user_id;
                    
            
                    
                    
                    //payment gateway integration in stripe
                    \Stripe\Stripe::setVerifySslCerts(false);
                    
                    $token=$_POST['stripeToken'];
                    
                    $charge = \Stripe\Charge::create(array(
                    
                            "amount"=> $price*100,
                    
                            "currency"=>"eur",
                    
                            "description"=>"ASTEMOTOR",
                    
                            "source"=>$token,
                    
                        ));
                    
                    $data        = array('success' => true, 'data'=> $charge);
                    $data_json   = json_encode($charge);
                    $data_array  = json_decode($data_json, true);
                    
                    //echo "<pre>";
                    $ch_id  = $data_array['id'];
                    $amount = $data_array['amount'];
                    $status = $data_array['status'];
                    
                    
                    if($status == 'succeeded'){
                    
                    //update payment status here
                    
                    $status_update = array(
                                      'status'    => 1,
                                      'token_id' => $ch_id

                                      );
                    $update = $this->Auction_model->updateData('myorder', $status_update , array('order_id'=>$order_id));
            
                    redirect('Dealer/my_purchases');

                 }
                }
        	   	
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
                
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
    }

	
}


