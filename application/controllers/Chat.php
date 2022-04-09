<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	
    public function start_chat(){
        
	    if(isset($_SESSION['dl_logged_in'])){
    	        if($_SESSION['dl_logged_in']){
    	            
            	    // Page Specific Information
            	    $data['view']='dealer/chat';
            	    $data['page'] = 'page';
            	    $data['title'] = 'Astermotori | Chat';
            	    
            	    if(!empty($this->uri->segment(3))){
            	    		$auction_id = $this->uri->segment(3);
            	    }else{
            	    	  $auction_id = 0;
            	    }

            	    
            	    $dealer_id = $_SESSION['dl_user_id'];
            	    
            	    $this->load->model('Chat_model');
            	    $check_chat_room_id = $this->Chat_model->check_chat_room($dealer_id, $auction_id);
            	    
            	    $data['chat_all_auction_notification'] = $this->Chat_model->chat_notification_all_auction($dealer_id);
            	    
            	    if(empty($check_chat_room_id)){
            	        
            	       // store or create chat room with chat_id (unique)
            	       $chat_id   = uniqid();
            	       $chat_room = $this->Chat_model->store_chat_room($dealer_id, $auction_id, $chat_id);
            	       $data['chat_id'] = $chat_id;
            	        
            	    }else{
            	        $chat_id = $check_chat_room_id->chat_id;

            	       // fetch chat
            	        $data['chats'] = $this->Chat_model->fetch_chat($chat_id);
            	        $data['chat_dates'] = $this->Chat_model->fetch_chat_dates($chat_id);
            	        $data['chat_id'] = $chat_id;

            	        $data['chat_not_update'] = $this->Chat_model->chat_notification_update_seen($chat_id, $dealer_id);
            	    }

            	    $this->load->view('dealer/layouts/main',$data);
    	        }else{
    	            $this->session->set_flashdata('error','Please Login To Continue');
    	            redirect('website/login');
    	        }
    	        
        }else 
        
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

            	    $auction_id = $this->uri->segment(3);
            	    $dealer_id = $this->uri->segment(4);
            	    $admin_id = $_SESSION['am_user_id'];
            	    
            	    $this->load->model('Chat_model');
            	    $check_chat_room_id = $this->Chat_model->check_chat_room($dealer_id, $auction_id);
            	    
            	    if(empty($check_chat_room_id)){
            	        
            	       // store or create chat room with chat_id (unique)
            	       $chat_id   = uniqid();
            	       $chat_room = $this->Chat_model->store_chat_room($dealer_id, $auction_id, $chat_id);
            	       $data['chat_id'] = $chat_id;
            	        
            	    }else{
            	        $chat_id = $check_chat_room_id->chat_id;

            	       // fetch chat
            	        $data['chats'] = $this->Chat_model->fetch_chat($chat_id);
            	        $data['chat_dates'] = $this->Chat_model->fetch_chat_dates($chat_id);
            	        $data['chat_id'] = $chat_id;

            	        $data['chat_not_update'] = $this->Chat_model->chat_notification_update_seen($chat_id, $admin_id);
            	    }
                        // var_dump($data['chat_dates']); die;
            	    $data['dealer_id'] = $dealer_id;
            	    $this->load->view('admin/layouts/main',$data);
    	        }else{
    	            $this->session->set_flashdata('error','Please Login To Continue');
    	            redirect('authenticate');
    	        }
    	        
        }
        
        else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
        
	}
	
	
	
	
	public function do_chat(){
	    if(isset($_SESSION['dl_logged_in'])){
	        if($_SESSION['dl_logged_in']){
        	    
        	    $this->load->model('Chat_model');
        	    
        	    $fname = $_FILES['files']['name'];

					    $config['upload_path'] = 'uploads/chat/';
					    $config['allowed_types'] = 'jpg|jpeg|png|gif|webp|pdf|doc|docx';
					    $config['file_name'] = $_FILES['files']['name'];

					    //Load upload library and initialize here configuration
					    $this->load->library('upload',$config);
					    $this->upload->initialize($config);

					    if($this->upload->do_upload('files')){
					    $uploadData = $this->upload->data();
					    $files = $uploadData['file_name'];
					  	}
					    if(!empty($fname)){
					    	$data['files'] = $files;
					    }

                date_default_timezone_set("Asia/Kolkata");
                $data['created_at']  =  date("Y-m-d H:i:s");
                $data['updated_at']  =  date("Y-m-d H:i:s");
                
        	    $data['message'] = $this->input->post('msg_text');
        	    $data['sender_id'] = $_SESSION['dl_user_id'];
        	    $data['receiver_id'] = 987654321;
        	    $data['chat_id'] = $this->input->post('chat_id');
        	    
        	    $success = $this->Chat_model->save_chat($data);
	        	  if($success){
	        	  	// save in chat notification
	        	  	$data_not['user_id'] = $data['receiver_id'];
	        	  	$data_not['chat_id'] = $data['chat_id'];
	        	  	$data_not['notification'] = 'new message';

	        	  	$this->Chat_model->save_chat_notification($data_not);

	        	  	$data['chats'] = $this->Chat_model->fetch_chat($data['chat_id']);
	        	  	$data['chat_dates'] = $this->Chat_model->fetch_chat_dates($data['chat_id']);

				      	$this->load->view('dealer/show_load_chat',$data);
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

	public function do_chat_admin(){
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){
        	    
        	    $this->load->model('Chat_model');
        	    
        	    $fname = $_FILES['files']['name'];

					    $config['upload_path'] = 'uploads/chat/';
					    $config['allowed_types'] = 'jpg|jpeg|png|gif|webp|pdf|doc|docx';
					    $config['file_name'] = $_FILES['files']['name'];

					    //Load upload library and initialize here configuration
					    $this->load->library('upload',$config);
					    $this->upload->initialize($config);

					    if($this->upload->do_upload('files')){
					    $uploadData = $this->upload->data();
					    $files = $uploadData['file_name'];
					  	}
					    if(!empty($fname)){
					    	$data['files'] = $files;
					    }
				
				date_default_timezone_set("Asia/Kolkata");
                $data['created_at']  =  date("Y-m-d H:i:s");
                $data['updated_at']  =  date("Y-m-d H:i:s");
                
        	    $data['message'] = $this->input->post('msg_text');
        	    $data['sender_id'] = $_SESSION['am_user_id'];
        	    $data['receiver_id'] = $this->input->post('dealer_id');
        	    $data['chat_id'] = $this->input->post('chat_id');
        	    
        	    $success = $this->Chat_model->save_chat($data);
	        	  if($success){
	        	  	// save in chat notification
	        	  	$data_not['user_id'] = $data['receiver_id'];
	        	  	$data_not['chat_id'] = $data['chat_id'];
	        	  	$data_not['notification'] = 'new message';

	        	  	$this->Chat_model->save_chat_notification($data_not);

	        	  	$data['chats'] = $this->Chat_model->fetch_chat($data['chat_id']);
	        	  	$data['chat_dates'] = $this->Chat_model->fetch_chat_dates($data['chat_id']);
				      	$this->load->view('admin/show_load_chat',$data);
	        	  }
        	  
                // $response = array(
                //     "status" => "success",
                //     "response" => "Success!"
                //      );
    
	        }else{
	            $this->session->set_flashdata('error','Please Login To Continue');
	            redirect('website/login');
	        }
	    }else{
            $this->session->set_flashdata('error','Please Login To Continue');
            redirect('website/login');
        }
	}
	
	function show_load_chat_fun()
    {
    
      $this->load->model('Chat_model');
         
      $chat_id = $this->input->post('chat_id');
      $data['chats'] = $this->Chat_model->fetch_chat($chat_id);
      $data['chat_dates'] = $this->Chat_model->fetch_chat_dates($chat_id);

      $data['chat_not_update'] = $this->Chat_model->chat_notification_update_seen($chat_id, $_SESSION['dl_user_id']);

    //   $data['chat_id'] = $chat_id;
      
      $this->load->view('dealer/show_load_chat',$data);
    
    
    
    }

    function show_load_chat_fun_admin()
    {
    
      $this->load->model('Chat_model');
         
      $chat_id = $this->input->post('chat_id');
      $data['chats'] = $this->Chat_model->fetch_chat($chat_id);
      $data['chat_dates'] = $this->Chat_model->fetch_chat_dates($chat_id);
      $data['chat_not_update'] = $this->Chat_model->chat_notification_update_seen($chat_id, $_SESSION['am_user_id']);
    //   $data['chat_id'] = $chat_id;
      
      $this->load->view('admin/show_load_chat',$data);
    
    
    
    }
    
    public function delete_chat_msg()
	{
	    if(isset($_SESSION['am_logged_in'])){
	        if($_SESSION['am_logged_in']){ 
        	    $this->load->model('Chat_model');
        	    $chatid = $this->uri->segment(3);
        	    $this->Chat_model->delete_chat_msg($chatid);
        
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
	
}


