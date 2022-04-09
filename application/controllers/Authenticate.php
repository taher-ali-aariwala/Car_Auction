<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {
    public function index(){
        if(isset($_SESSION['am_logged_in'])){
            if($_SESSION['am_logged_in']){
                redirect('admin');
            }else{
                $data['page_details'] = array(
                                            'page_title' => 'Login : Admin',
                                            'meta_desc' => 'Put Meta Desc Here',
                                            'meta_keywords' => 'Meta Keywords here'
                                        );
                $this->load->view('authenticate/login_page',$data);
            }
        }else{
            $data['page_details'] = array(
                                        'page_title' => 'Login : Admin',
                                        'meta_desc' => 'Put Meta Desc Here',
                                        'meta_keywords' => 'Meta Keywords here'
                                    );
            $this->load->view('authenticate/login_page',$data);
        }
    }
    
    public function check(){
       $this->load->model('Authenticate_model');
       if($this->session->userdata('am_logged_in')){
           
            $user_id = $this->session->userdata('am_user_id');
            $user_data = $this->Authenticate_model->admin_login_data($user_id);
            
           // echo $this->input->cookie('pass_key');
           
           if(isset($user_data)){
               if(($user_data)){
                    $callback_url = 'admin';
                    $data['view'] = $callback_url;
                    redirect($callback_url);
                
                // END if : WHEN LOGIN DATA FROM MODEL IS RETURNED  
                
                }else{
         
                    // $this->session->set_flashdata('error','Please sign-in to continue..');
                    redirect('authenticate');
                
                //END else : IF NO LOGIN DATA IS RETURNED FROM MODEL           
                }
           }
           
       }else if($this->input->cookie('user_id')){
           
           $user_id = $this->input->cookie('user_id');
           $user_data = $this->Authenticate_model->admin_login_data($user_id);
           
           if(isset($user_data)){
               if(($user_data)){
                    $email = $user_data->email;
                    $password = $user_data->password;
                    
                    $pass_key = $this->input->cookie('pass_key');
                    $pw = (explode(".",$pass_key));
                    $cookie_pwd = $pw[0];
                    
                    if($cookie_pwd == $password){
                        $callback_url = 'admin';
                        $data['view']=$callback_url;
                        redirect($callback_url);
                        
                      // END if : WHEN LOGIN DATA SAME AS COOKIES 
                    }else{
                        $this->session->set_flashdata('error','Please sign-in to continue..');
                        redirect('authenticate');
                        // END ELSE : WHEN COOKIES DATA ARE NOT EQUAL
                    }
                    
                // END if : WHEN LOGIN DATA FROM MODEL IS RETURNED  
                }else{
                    $this->session->set_flashdata('error','Please sign-in to continue..');
                    redirect('authenticate');
                
                //END else : IF NO LOGIN DATA IS RETURNED FROM MODEL           
                }
           }
           
           // END IF : COOKIES CHECK
       }else{
           
            redirect('authenticate');
            // END ELSE: NO SESSION OR NO COOKIES ARE FOUND --SO REDIRECT TO LOGIN PAGE
       }
        
    }
    
    public function auth(){
        $this->load->model('Authenticate_model');
        
        if($this->input->post('login_btn')){   
            //  form validation

            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error',validation_errors());
                redirect('authenticate');
            
            // END IF : RECIEVED LOGIN DATA VALIDATION    
            }else{
                $data['password'] = md5($this->input->post('password'));
                $data['email'] = $this->input->post('email');
                
        
                $login_data = $this->Authenticate_model->login($data);
                    
                if(!($login_data)){
                    $this->session->set_flashdata('error','Email and password do not match');
                    redirect('authenticate');
                
                //END IF : IF NO LOGIN DATA IS RETURNED FROM MODEL     
                }else{
                    $user_id = array(
                       'name'   => 'am_user_id',
                       'value'  => $login_data->id,
                       'expire' => '36000',
                    );
                    $user_name = array(
                       'name'   => 'am_user_name',
                       'value'  => $login_data->name,
                       'expire' => '36000',
                    );
                    $enc_pass = $data['password']."~9hdfise~7y493947~kcbgjaddd73b";
                    $password = array(
                       'name'   => 'am_pass_key',
                       'value'  => $enc_pass,
                       'expire' => '36000',
                    );
                  
                    
                    $this->input->set_cookie($user_id);
                    $this->input->set_cookie($user_name);
                    $this->input->set_cookie($password);
                    
                    $this->session->set_userdata('am_logged_in',TRUE);
                    $this->session->set_userdata('am_user_name',$login_data->name);
                    $this->session->set_userdata('am_user_id',$login_data->id);
                    
                    $callback_url = 'admin';
                    $data['view'] = $callback_url;
                    redirect($callback_url);
                
                // END ELSE : WHEN LOGIN DATA FROM MODEL IS RETURNED        
                }
            
            // END IF : WHERE LOGIN DATA VALIDATION GOES TRUE
            }
        
        // END IF : FOR LOGIN BUTTON CLICK    
        }else{
            $this->session->set_flashdata('error','Please Login to continue..');
            redirect('authenticate/login_page');
        
        // END ELSE : WHEN DATA IS NOT POSTED VIA LOGIN PAGE     
        }
    // END METHOD AUTH
    }
    
        
                
}
?>
