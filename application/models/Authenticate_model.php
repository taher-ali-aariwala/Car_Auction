<?php

class Authenticate_model extends CI_model{

    public function login($data)
    {
            $this->db->select('*');
    		$this->db->from('admin');
    		$this->db->where($data);
    		$query = $this->db->get();
    // 		return $query->affected_rows();
		    if($query->num_rows() > 0){
		        return $query->row();
		    }
		    else{
		        return FALSE;
		    }
    }
    
    public function admin_login_data($user_id)
    {
            $this->db->select('*');
    		$this->db->from('admin');
    		$this->db->where('id',$user_id);
    		$query = $this->db->get();
    // 		return $query->affected_rows();
		    if($query->num_rows() > 0){
		        return $query->row();
		    }
		    else{
		        return FALSE;
		    }
    }

}

?>