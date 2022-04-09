<?php

class Custom_model extends CI_model{
	
	public function get_details(){
		$query = $this->db->get('users');
		return $query->result();
	}
	
    

}

?>