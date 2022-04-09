<?php

class Media_model extends CI_model{

    public function insert_media($data_exphoto){
		
		$this->db->insert('auction_car_media',$data_exphoto);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insert_damage_media($data_damfront_photo){
		
		$this->db->insert('auction_car_damage_media',$data_damfront_photo);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insert_damage_photo($data_damfront_photo1){
		
		$this->db->insert('auction_car_damage_photo',$data_damfront_photo1);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insert_media_coupon($data_couphoto){
		
		$this->db->insert('coupon_media',$data_couphoto);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insert_media_technical($data_techphoto){
		
		$this->db->insert('technical_inspection_media',$data_techphoto);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insert_paint_thickness_media($data_pptphoto){
		
		$this->db->insert('part_paint_media',$data_pptphoto);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insert_media_tire($data_tirephoto){
		
		$this->db->insert('tire_media',$data_tirephoto);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	
	
	public function insert_mainimage_media($datamain){
		
		$this->db->insert('auction_car_media',$datamain);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function update_mainimage_media($datamain, $mainimage_id){
	    
	    $this->db->where('id',$mainimage_id);
		$result = $this->db->update('auction_car_media',$datamain);
		return $result;
	}
}

?>