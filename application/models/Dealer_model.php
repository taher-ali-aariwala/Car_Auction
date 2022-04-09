<?php

class Dealer_model extends CI_model{
	
// 	----------------login-----------------
// ---------------------------------------
public function login($data)
    {
            $this->db->select('*');
    		$this->db->from('dealer');
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

    
    public function set_active_userstatus($user_id){
	    
	    $this->db->where('id',$user_id);
	    $this->db->where('status','approved');
	    $dataupdate['user_status'] = 'active';
		$result = $this->db->update('dealer',$dataupdate);
		return $result;
	}

	public function set_deactive_userstatus($dealer_id){
	    
	    $this->db->where('id',$dealer_id);
	    $dataupdate['user_status'] = 'deactive';
		$result = $this->db->update('dealer',$dataupdate);
		return $result;
	}

	

    public function dealer_login_data($user_id)
    {
            $this->db->select('*');
    		$this->db->from('dealer');
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


// ---------------------------------------
// ---------------------------------------
	
	
	public function save_dealer($data){
		
		$this->db->insert('dealer',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	
	
	public function get_new_dealers(){
		
		$this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('status','unapproved');
        // $this->db->where('varify_email','1');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_dealer($dealer_id){
		
		$this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('id', $dealer_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function approve_dealer($user_id){
	    
	    $this->db->where('id',$user_id);
	    $dataupdate['status'] = 'approved';
		$result = $this->db->update('dealer',$dataupdate);
		return $result;
	}
	
	public function reject_dealer($user_id){
	    
	    $this->db->where('id',$user_id);
	    $result = $this->db->delete('dealer');
		return $result;
	}
	
	public function varify_dealer($user_id){
	    
        $dataupdate['varify_email'] = '1';
	    $this->db->where('id',$user_id);
		$result = $this->db->update('dealer',$dataupdate);
		return $result;
	}
	
	public function get_registered_dealers(){
		
		$this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('status','approved');
        // $this->db->where('varify_email','1');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_online_dealers(){
		
		$this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('status','approved');
        $this->db->where('user_status','active');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function delete_dealer($user_id){
	    
	    $this->db->where('id',$user_id);
	    $result = $this->db->delete('dealer');
		return $result;
	}
    
    public function get_dealer_id($email){
		
        $this->db->select('*');
		$this->db->from('dealer');
		$this->db->where('email', $email);
		$query = $this->db->get();
	    if($query->num_rows() > 0){
	        return $query->row();
	    }
	    else{
	        return FALSE;
	    }
	}   
	
	public function reset_password($password, $dealer_id){
	    
	    $this->db->where('id',$dealer_id);
	    $dataupdate['password'] = $password;
		$result = $this->db->update('dealer',$dataupdate);
		return $result;
	}
	
// 	----------------------------------------
// -----------------favorite---------------

    public function insert_favorite($data){
		
		$this->db->insert('favorite_car',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function delete_favorite($car_auction_id, $dealer_id){
	    
	    $this->db->where('car_auction_id',$car_auction_id);
	    $this->db->where('dealer_id',$dealer_id);
	    $result = $this->db->delete('favorite_car');
		return $result;
	}
	
	public function get_brands(){
		
		$this->db->select('*');
        $this->db->from('brand');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_brands_notfeatured(){
		
		$this->db->select('*');
        $this->db->from('brand');
        $this->db->where('featured', '0');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_featured_brands(){
		
		$this->db->select('*');
        $this->db->from('brand');
        $this->db->where('featured', '1');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_where_is_it(){
		
		$this->db->select('*');
        $this->db->from('where_is_it');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_where_is_it_withoutfeature(){
		
		$this->db->select('*');
        $this->db->from('where_is_it');
        $this->db->where('featured', '0');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_featured_where_is_it(){
		
		$this->db->select('*');
        $this->db->from('where_is_it');
         $this->db->where('featured', '1');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_body_type(){
		
		$this->db->select('*');
        $this->db->from('body_type');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_fuel_type(){
		
		$this->db->select('*');
        $this->db->from('fuel_type');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_transmission(){
		
		$this->db->select('*');
        $this->db->from('transmission');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_equipments(){
		
		$this->db->select('*');
        $this->db->from('car_equipment');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_year(){
		
		$this->db->select('*');
        $this->db->from('year');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_price(){
		
		$this->db->select('*');
        $this->db->from('price');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_mileage(){
		
		$this->db->select('*');
        $this->db->from('mileage');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function delete_brand($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('brand');
		return $result;
	}
	
	public function delete_body_type($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('body_type');
		return $result;
	}
	
	public function delete_where_is_it($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('where_is_it');
		return $result;
	}
	
	public function delete_fuel_type($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('fuel_type');
		return $result;
	}
	
	public function delete_transmission($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('transmission');
		return $result;
	}
	
	public function delete_equipment($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('car_equipment');
		return $result;
	}
	
	public function delete_price($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('price');
		return $result;
	}
	
	public function delete_mileage($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('mileage');
		return $result;
	}
	
	public function delete_year($id){
	    
	    $this->db->where('id',$id);
		$result = $this->db->delete('year');
		return $result;
	}
	
	public function edit_brand($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('brand',$data);
		return $result;
	}
	
	public function edit_where_is_it($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('where_is_it',$data);
		return $result;
	}
	
	public function edit_body_type($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('body_type',$data);
		return $result;
	}
	
	public function edit_fuel_type($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('fuel_type',$data);
		return $result;
	}
	
	public function edit_transmission($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('transmission',$data);
		return $result;
	}
	
	public function edit_equipment($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('car_equipment',$data);
		return $result;
	}
	
	public function edit_year($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('year',$data);
		return $result;
	}
	
	public function edit_mileage($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('mileage',$data);
		return $result;
	}
	
	public function edit_price($id, $data){
	    
	    $this->db->where('id',$id);
		$result = $this->db->update('price',$data);
		return $result;
	}
	
	public function save_brand($data){
		
		$this->db->insert('brand',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_where_is_it($data){
		
		$this->db->insert('where_is_it',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_body_type($data){
		
		$this->db->insert('body_type',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_fuel_type($data){
		
		$this->db->insert('fuel_type',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_transmission($data){
		
		$this->db->insert('transmission',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_equipment($data){
		
		$this->db->insert('car_equipment',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_year($data){
		
		$this->db->insert('year',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_mileage($data){
		
		$this->db->insert('mileage',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function save_price($data){
		
		$this->db->insert('price',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	
}

?>