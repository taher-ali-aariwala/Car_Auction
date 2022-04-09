<?php

class Auction_model extends CI_model{
	

    public function get_auctions(){
		
		$this->db->select('auction_car.*,auction_car_media.media as media');
        $this->db->from('auction_car');
        // $this->db->where('status','new');
        $this->db->join('auction_car_media', 'auction_car.id = auction_car_media.car_auction_id', 'left');
        $this->db->order_by('id', 'desc');
	    $this->db->group_by('auction_car.id');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_all_status_auction(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        // $this->db->where('status', 'awarded');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_publish_auction(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_awarded_auction(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'awarded');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_new_auction(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'new');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	
// 	public function get_auctions_publish(){
		
// 		$this->db->select('*');
//         $this->db->from('auction_car');
//         $this->db->where('status', 'publish');
//         $this->db->order_by('end_auction_time', 'asc');
//         $query = $this->db->get();
//         return $query->result();
// 	}
	
	
	
    public function get_auctions_awarded(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
         $this->db->where('status', 'awarded');
        //  $this->db->or_where('status', 'payment_done');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auctions_payment_done(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        //  $this->db->where('status', 'awarded');
         $this->db->where('status', 'payment_done');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auctions_awarded_joindealer(){
		
		$this->db->select('auction_car.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.company_name as company_name');
        $this->db->from('auction_car');
        $this->db->where('auction_car.status', 'awarded');
        $this->db->or_where('auction_car.status', 'payment_done');
        $this->db->join('dealer', 'dealer.id = auction_car.dealer_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
	
	public function get_auctions_publish_eight(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
       
	    $this->db->order_by('id', 'desc');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();
	}
	

    public function get_auction_media($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where_not_in('type', 'mainimage');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auction_main_media($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'mainimage');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_morevideos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_morevideo');
        $this->db->where('car_auction_id', $auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	
	 public function get_morevideo($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_morevideo');
        $this->db->where('car_auction_id', $auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	
	public function get_main_image($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'mainimage');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_all_main_image(){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('type', 'mainimage');
        $query = $this->db->get();
        return $query->result();
	}
	public function get_all_main_image_eight(){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('type', 'mainimage');
        $query = $this->db->get();
        return $query->result();
	}
	
    public function get_single_auction($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('id',$auction_id);
        // $this->db->where('status','new');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_single_auction_by_id($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('id',$auction_id);
        // $this->db->where('status','new');
        $query = $this->db->get();
        return $query->row();
	}
	
	public function get_maxbid_dealer_id($maxbid, $auction_id){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $this->db->where('latest_bid',$maxbid);
        $this->db->where('car_auction_id',$auction_id);
        // $this->db->where('status','new');
        $query = $this->db->get();
        return $query->row();
	}
	
//   ------------get auction wheel details-----------
    public function get_wheel_details($auction_id){
		
		$this->db->select('*');
        $this->db->from('tire_paint_thickness');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_wheel_media($tire_id){
		
		$this->db->select('*');
        $this->db->from('tire_media');
        $this->db->where('tire_id',$tire_id);
        $query = $this->db->get();
        return $query->result();
	}
	
// 	----------get auction part paint details------
	public function get_part_paint_details($auction_id){
		
		$this->db->select('*');
        $this->db->from('parts_paint_thickness');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_part_paint_media($auction_id){
		
		$this->db->select('*');
        $this->db->from('part_paint_media');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get auction coupon details-----------
    public function get_coupon_details($auction_id){
		
		$this->db->select('*');
        $this->db->from('coupon_history');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_coupon_media($coupon_id){
		
		$this->db->select('*');
        $this->db->from('coupon_media');
        $this->db->where('coupon_id',$coupon_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get auction technical inspection details-----------
    public function get_technical_details($auction_id){
		
		$this->db->select('*');
        $this->db->from('technical_inspection');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_technical_media($technical_id){
		
		$this->db->select('*');
        $this->db->from('technical_inspection_media');
        $this->db->where('technical_id',$technical_id);
        $query = $this->db->get();
        return $query->result();
	}
	
    //   ------------get auction get_damage_defect details-----------
    public function get_front_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','front');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get auction get_damage_defect photos details-----------
    public function get_all_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get auction get_damage_defect photos details-----------
    public function get_front_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','front');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_left_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','left');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_right_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','right');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_rear_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','rear');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_interior_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','interior');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_roof_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','roof');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_engine_damage_defect_photos($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_photo');
       $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','engine');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get all get_damage_defect details-----------
    public function get_all_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get left get_damage_defect details-----------
    public function get_left_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','left');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get right get_damage_defect details-----------
    public function get_right_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','right');
        $query = $this->db->get();
        return $query->result();
	}

	//   ------------get all favorite-----------
    public function get_all_favorite($dealer_id){
		
		$this->db->select('car_auction_id');
        $this->db->from('favorite_car');
        $this->db->where('dealer_id',$dealer_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	
	//   ------------get all dealer awarded auction-----------
    public function get_all_dealer_awarded_auction($dealer_id){
		
		$this->db->select('id');
        $this->db->from('auction_car');
        $this->db->where('dealer_id',$dealer_id);
        $query = $this->db->get();
        return $query->result();
	}


	//   ------------get all dealer purchase auction-----------
    public function get_all_dealer_purchase_auction($dealer_id){
		
		$this->db->select('id');
        $this->db->from('auction_car');
        $this->db->where('dealer_id',$dealer_id);
        $this->db->where('status','payment_done');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get roof get_damage_defect details-----------
    public function get_roof_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','roof');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get rear get_damage_defect details-----------
    public function get_rear_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','rear');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get engine get_damage_defect details-----------
    public function get_engine_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','engine');
        $query = $this->db->get();
        return $query->result();
	}
	
	//   ------------get interior get_damage_defect details-----------
    public function get_interior_damage_defect($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_damage_media');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('type','interior');
        $query = $this->db->get();
        return $query->result();
	}



    // -----------------get equipment  -------
    
    public function get_equipment(){
		
	    $this->db->select('*');
        $this->db->from('car_equipment');
        $query = $this->db->get();
        return $query->result();
	}
	
	// -----------------enter car auction-------
    
    public function store_auction_car($data){
		
		$this->db->insert('auction_car',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	// -----------------equipment  auction-------
    
    public function save_equipment($dataequip){
		
		$this->db->insert('car_equipment',$dataequip);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	// -----------------coupon history  auction-------
    
    public function insert_couponhistory($datacoupon){
		
		$this->db->insert('coupon_history',$datacoupon);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	// -----------------technical history  auction-------
    
    public function insert_technicalhistory($datatechnical){
		
		$this->db->insert('technical_inspection',$datatechnical);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	// -----------------part paint thickness-------
    
    public function insert_part_paint_thickness($parttypedata){
		
		$this->db->insert('parts_paint_thickness',$parttypedata);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	// -----------------tire history  auction-------
    
    public function insert_tirehistory($datatire){
		
		$this->db->insert('tire_paint_thickness',$datatire);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	// -----------------more video auction-------
    
    public function insert_morevideo($morevideodata){
		
		$this->db->insert('auction_car_morevideo',$morevideodata);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
    // 	-------------all equipments--------------
	public function get_equipments(){
		
		$this->db->select('*');
        $this->db->from('car_equipment');
        $query = $this->db->get();
        return $query->result();
	}
	
    // ----------exterior photo----------------	
	public function get_auction_media_exterior($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'exterior');
        $query = $this->db->get();
        return $query->result();
	}
	
	 // ----------interior photo----------------	
	public function get_auction_media_interior($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'interior');
        $query = $this->db->get();
        return $query->result();
	}
	
	 // ----------document photo----------------	
	public function get_auction_media_document($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'document');
        $query = $this->db->get();
        return $query->result();
	}
	
	// ----------engine photo----------------	
	public function get_auction_media_engine($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'engine');
        $query = $this->db->get();
        return $query->result();
	}
	
	// ----------transmission photo----------------	
	public function get_auction_media_transmission($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'transmission');
        $query = $this->db->get();
        return $query->result();
	}
	
	// ----------roof photo----------------	
	public function get_auction_media_roof($auction_id){
		
		$this->db->select('*');
        $this->db->from('auction_car_media');
        $this->db->where('car_auction_id', $auction_id);
        $this->db->where('type', 'roof');
        $query = $this->db->get();
        return $query->result();
	}
	
	// ----------------update-enter car auction-------
    
	
	public function change_status($auc_id){
	    
	    $data = array(
	        'status' => 'publish',
	        );
	    $this->db->where('id',$auc_id);
		$result = $this->db->update('auction_car',$data);
		return $result;
	}
	
    public function update_auction_car_general($data, $auction_id){
	    
	    $this->db->where('id',$auction_id);
		$result = $this->db->update('auction_car',$data);
		return $result;
	}
	
	public function update_tirehistory($datatire, $tire_id){
	    
	    $this->db->where('id',$tire_id);
		$result = $this->db->update('tire_paint_thickness',$datatire);
		return $result;
	}
	
	
	
	// ----------------- store_couponhistory -------
    
    public function store_couponhistory($datacoupon){
		
		$this->db->insert('coupon_history',$datacoupon);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
    // 	------------------update coupon history -------------
	public function update_couponhistory($datacoupon, $cou_id){
	    
	    $this->db->where('id',$cou_id);
		$result = $this->db->update('coupon_history',$datacoupon);
		return $result;
	}
	
	 // 	------------------update technical history -------------
	public function update_technicalhistory($datatech, $technical_id){
	    
	    $this->db->where('id',$technical_id);
		$result = $this->db->update('technical_inspection',$datatech);
		return $result;
	}
	
	
	// 	------------------update update_testdrive history -------------
	
	public function update_testdrive($datatest, $testdrive_id){
	    
	    $this->db->where('id',$testdrive_id);
		$result = $this->db->update('test_drive',$datatest);
		return $result;
	}
	
	 public function insert_testdrive($datatest){
		
		$this->db->insert('test_drive',$datatest);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function get_test_drive_details($auction_id){
		
		$this->db->select('*');
        $this->db->from('test_drive');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
// 	-----------------------------------------
// --------------featured brand--------------

    public function featured_brand($brand_id, $brand_featured_status){
	    
	    $this->db->where('id',$brand_id);
	    if($brand_featured_status == '0'){
	        $data = array(
	            'featured' => '1',
	        );
	    }else{
	        $data = array(
	            'featured' => '0',
	        );
	    }
	    
		$result = $this->db->update('brand',$data);
		return $result;
	}
	
	public function featured_where_is_it($brand_id, $brand_featured_status){
	    
	    $this->db->where('id',$brand_id);
	    if($brand_featured_status == '0'){
	        $data = array(
	            'featured' => '1',
	        );
	    }else{
	        $data = array(
	            'featured' => '0',
	        );
	    }
	    
		$result = $this->db->update('where_is_it',$data);
		return $result;
	}
	
// 	public function unfeatured_brand($brand_id){
	    
// 	    $this->db->where('id',$brand_id);
// 	    $data = array(
// 	        'featured' => '0',
// 	        );
// 		$result = $this->db->update('brand',$data);
// 		return $result;
// 	}

//     public function select_featured_brand_status($brand_id){
		
// 		$this->db->select('featured');
//         $this->db->from('brand');
//         $this->db->where('id',$brand_id);
//         $query = $this->db->get();
//         return $query->result();
// 	}


// ----------------------------------------
// ------------- delete ---------------------



    public function delete_auction($auc_id){
	    
	    $this->db->where('id',$auc_id);
		$result = $this->db->delete('auction_car');
		return $result;
	}
	
	public function delete_auction_media($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('auction_car_media');
		return $result;
	}
	
	public function delete_auction_video($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('auction_car_morevideo');
		return $result;
	}
	
	public function delete_coupon_media($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('coupon_media');
		return $result;
	}
	
	public function delete_technical_media($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('technical_inspection_media');
		return $result;
	}
	public function delete_tire_media($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('tire_media');
		return $result;
	}
	
	public function delete_partpaint_media($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('part_paint_media');
		return $result;
	}
	
	public function delete_partpaint_detail($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('parts_paint_thickness');
		return $result;
	}
		
	public function delete_damage_details($media_id){
	    
	    $this->db->where('id',$media_id);
		$result = $this->db->delete('auction_car_damage_media');
		if($result){
		   $this->db->where('damage_id',$media_id);
		   $result1 = $this->db->delete('auction_car_damage_photo'); 
		   return $result;
		}
		
		
	}
	
    // --------------------------------------
    // -------------------------------------
    // ------ auction bid -----------------
    
    
	public function save_auction_bid($data){
		
		$this->db->insert('car_auction_bid',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
// 	--------------------again bif for same---------------
	public function save_auction_bid_again($latest_bid, $bid_id, $status){
		
		$data = array(
		        'latest_bid' =>$latest_bid,
		        'bid_id' =>$bid_id,
		        'status' =>$status,
		    );
		$this->db->insert('automatic_bid',$data);
		$insert_id = $this->db->insert_id();
		if(!empty($insert_id)){
		    
		    $data1 = array(
		            'latest_bid' =>$latest_bid, 
		        );
		    $this->db->where('id',$bid_id);
    		$result1 = $this->db->update('car_auction_bid',$data1);
    // 		return $result1;  
		}
		
		if(!empty($result1)){
		    $this->db->select('car_auction_id');
            $this->db->from('car_auction_bid');
            $this->db->where('id', $bid_id);
            $auc_id=  $this->db->get()->row()->car_auction_id;

    		    if(!empty($auc_id)){
        		    $data2 = array(
        		            'latest_bid' =>$latest_bid, 
        		        );
        		    $this->db->where('id',$auc_id);
            		$result2 = $this->db->update('auction_car',$data2);
    		    }
        
    // 		return $result2;  
		}
		
		return $insert_id;
	}
	
// 	----------automatic bid added---------
	
	public function update_auction_automatic_bid($data, $bid_id){
	   
	    $this->db->where('id',$bid_id);
		$result = $this->db->update('car_auction_bid',$data);
		return $result;
	}
	
	
	public function get_bids($auction_id){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $this->db->where('car_auction_id',$auction_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_all_auctions_bids(){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $query = $this->db->get();
        return $query->result();
	}
	
// 	get all list having automatic bid is available for auction id
	public function get_automatic_bids($auction_id){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where_not_in('automatic_bid',0);
        // $this->db->order_by('automatic_bid', 'asc');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_dealer_bid($auction_id, $dealer_id){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $this->db->where('car_auction_id',$auction_id);
        $this->db->where('dealer_id',$dealer_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	
	public function get_all_dealer_bids($dealer_id){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $this->db->where('dealer_id',$dealer_id);
        $this->db->where('status','new');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_bid_details($bid_id){
		
		$this->db->select('*');
        $this->db->from('car_auction_bid');
        $this->db->where('id',$bid_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_bid_dealer_detail($dealer_id){
		
		$this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('id',$dealer_id);
        $query = $this->db->get();
        return $query->result();
	}
	
	
	public function insert_mail_msg_check($data){
		
		$this->db->insert('mail_msg_check',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function get_mail_msg_check(){
		
		$this->db->select('*');
        $this->db->from('mail_msg_check');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auction_makeofffer(){
		
		$this->db->select('car_auction_bid.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.company_name as company_name');
        $this->db->from('car_auction_bid');
        $this->db->where('car_auction_bid.status','new');
        $this->db->join('dealer', 'dealer.id = car_auction_bid.dealer_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auction_topfour_bids(){
		
		$this->db->select('car_auction_bid.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.company_name as company_name');
        $this->db->from('car_auction_bid');
        $this->db->where('car_auction_bid.status','new');
        $this->db->order_by('car_auction_bid.latest_bid', 'desc');
        // $this->db->limit(4);
        $this->db->join('dealer', 'dealer.id = car_auction_bid.dealer_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
	 
	public function get_auction_autobids(){
		
		$this->db->select('car_auction_bid.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.company_name as company_name');
        $this->db->from('car_auction_bid');
        $this->db->where('car_auction_bid.status','new');
        $this->db->where_not_in('car_auction_bid.automatic_bid', 0);
        $this->db->join('dealer', 'dealer.id = car_auction_bid.dealer_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
    
    public function update_auction_winner($data, $auction_id){
	    
	    $this->db->where('id',$auction_id);
		$result = $this->db->update('auction_car',$data);
		return $result;
	}


	public function get_max_current_offer($auction_id){
		
		$this->db->select_max('latest_bid');
        $this->db->where('car_auction_id', $auction_id);
        $result = $this->db->get('car_auction_bid')->row();
        return $result->latest_bid;
	}
    
    public function Search_car_brand($Search_car_brand){
		
        $this->db->select('*');
        $this->db->from('auction_car');
        if($this->db->where('status', 'publish')){
            $this->db->like('brand', $Search_car_brand);
            // $this->db->or_like('model', $Search_car_brand);
            // $this->db->where('status', 'publish');
        }
       
        // $this->db->where('status', 'publish');
        $query = $this->db->get();
        return $query->result();
	}

    public function get_auctions_lowest_price(){
		
        // $this->db->select_max('latest_bid');
        // $this->db->from('car_auction_bid');
        // $this->db->where('car_auction_id', $auction_id);
        // $query = $this->db->get();
        // return $query->result_array();
        
		
        
		$this->db->select('auction_car.*, max(car_auction_bid.latest_bid)');
        $this->db->from('auction_car');
         $this->db->join('car_auction_bid', 'auction_car.id = car_auction_bid.car_auction_id', 'full');
        $this->db->where('auction_car.status', 'publish');
        $this->db->order_by('car_auction_bid.latest_bid', 'asc'); 
        $query = $this->db->get();
        return $query->result();

	}

    public function get_auctions_lowest_mileage(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
        $this->db->order_by('mileage', 'asc'); 
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auctions_ending_soon(){
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
        $this->db->order_by('end_auction_time', 'asc'); 
        $query = $this->db->get();
        return $query->result();
	}
    
//     public function search_checkbox_brand($Search_car_brand, $Search_car_bodytype, $Search_car_transmission, $Search_car_fueltype, $Search_car_whereisit, $Search_car_minyear, $Search_car_maxyear, $Search_car_minprice, $Search_car_maxprice, $Search_car_minmileage, $Search_car_maxmileage){

	
//         $this->db->select('*');
//         $this->db->from('auction_car');
        
//         if(empty($Search_car_brand) && empty($Search_car_bodytype) && empty($Search_car_transmission) && empty($Search_car_fueltype) && empty($Search_car_whereisit)){
//             $this->db->where('status', 'publish');
//         }
        
       
//         if(!empty($Search_car_brand)){
//             foreach($Search_car_brand as $b){
//                 $this->db->or_like('brand', $b);
//                 $this->db->where('status', 'publish');
//             }
//         }
        
//         if(!empty($Search_car_bodytype)){
//             foreach($Search_car_bodytype as $bt){
//                 $this->db->or_like('body_style', $bt);
//                 $this->db->where('status', 'publish');
//             }
//         }
        
//         if(!empty($Search_car_transmission)){
//             foreach($Search_car_transmission as $t){
//                 $this->db->or_like('transmission', $t);
//                 $this->db->where('status', 'publish');
//             }
//         }
        
//         if(!empty($Search_car_fueltype)){
//             foreach($Search_car_fueltype as $f){
//                 $this->db->or_like('fuel_type', $f);
//                 $this->db->where('status', 'publish');
//             }
//         }
        
//         if(!empty($Search_car_whereisit)){
//             foreach($Search_car_whereisit as $w){
//                 $this->db->or_like('where_is_it', $w);
//                 $this->db->where('status', 'publish');
//             }
//         }
        
//         if(!empty($Search_car_minyear)){
       
//             $this->db->where('YEAR(registration_date) >=', $Search_car_minyear);
            
//         }
        
//         if(!empty($Search_car_maxyear)){
//             $this->db->where('YEAR(registration_date) <=', $Search_car_maxyear);
           
//         }
        
//          if(!empty($Search_car_minprice)){
       
//             $this->db->where('base_price >=', $Search_car_minprice);
            
//         }
        
//         if(!empty($Search_car_maxprice)){
//             $this->db->where('base_price <=', $Search_car_maxprice);
           
//         }
        
//          if(!empty($Search_car_minmileage)){
       
//             $this->db->where('mileage >=', $Search_car_minmileage);
            
//         }
        
//         if(!empty($Search_car_maxyear)){
//             $this->db->where('mileage <=', $Search_car_maxmileage);
           
//         }
//         // $this->db->where('status', 'publish');
//         // $this->db->where('YEAR(registration_date) >=', 2017);
//         $query = $this->db->get();
//         return $query->result();
// 	}

    public function search_checkbox_brand($ff){
        $this->db->select('*');
        $this->db->from('auction_car');
        if (!empty($ff['carBrand'])) {
            $this->db->where_in('brand',$ff['carBrand']);            
        }
        if(!empty($ff['minRegistrationDate'])){
            $this->db->where("DATE_FORMAT(registration_date,'%Y') >=" , $ff['minRegistrationDate']); 
	    }
	    if(!empty($ff['maxRegistrationData'])){
            $this->db->where("DATE_FORMAT(registration_date,'%Y') <=", $ff['maxRegistrationData']); 
	    }
	    
	    if (!empty($ff['carBodyType'])) {
            $this->db->where_in('body_style',$ff['carBodyType']);            
        }
        if(!empty($ff['minPrice'])){
            $this->db->where("latest_bid >=" , $ff['minPrice']); 
	    }
	    if(!empty($ff['maxPrice'])){
            $this->db->where("latest_bid <=", $ff['maxPrice']); 
	    }
	    
	    if(!empty($ff['minMileage'])){
            $this->db->where("mileage >=" , $ff['minMileage']); 
	    }
	    if(!empty($ff['maxMileage'])){
            $this->db->where("mileage <=", $ff['maxMileage']); 
	    }
	    if (!empty($ff['carTransmission'])) {
            $this->db->where_in('transmission',$ff['carTransmission']);            
        }
        if (!empty($ff['carFuelType'])) {
            $this->db->where_in('fuel_type',$ff['carFuelType']);            
        }
        if (!empty($ff['carWhereisit'])) {
            $this->db->where_in('where_is_it',$ff['carWhereisit']);            
        }
        
        if (!empty($ff['sort'])) {
            if($ff['sort'] == 'endtime'){
                $this->db->order_by('end_auction_time', 'asc');
            }
            if($ff['sort'] == 'price'){
                $this->db->order_by('latest_bid', 'asc');
            }
            if($ff['sort'] == 'mileage'){
                $this->db->order_by('mileage', 'asc');
            }          
        }
        
        $this->db->where('status', 'publish');
        $query = $this->db->get();
        return $query->result();
	}


    //pay order 
    function insertData($tableName, $array_data){

        try{

			if (isset($tableName) && isset($array_data)) {
				$this->db->trans_start();
				$this->db->insert($tableName, $array_data);
				$globals_id = $this->db->insert_id();
				$this->db->trans_complete();
				return $globals_id;
			}else{

				return false;

			}

		} catch (Exception $e){

			return false;

		}

	} 



	function CountWhereRecord($tableName,$where_data)

    {

    	$query = $this->db->get_where($tableName, $where_data);

    	$count = $query->num_rows(); 

    	return $count;

    }


    function getData($tableName, $where_data=array(), $where_in = array(), $like = array()){

        try{

			if (isset($tableName) && isset($where_data)) {

				

				$this->db->trans_start();

				if(!empty($where_data)){

					$this->db->where($where_data);

				}

				if(!empty($where_in)){

					$this->db->where_in($where_in['field'],$where_in['in_array']);

				}

				if(!empty($like)){

					$this->db->like($like['field'], $like['keyword']);

				}

				$query = $this->db->get($tableName);

                               

				$this->db->trans_complete();

				if ($query->num_rows() > 0){

					$rows = $query->row();

					return $rows;

				}else{

					return false;

				} 

			}else{

				return false;

			}

		} catch (Exception $e){

			return false;

		}

	}


    function updateData($tableName, $updateData, $where){

		//echo $tableName;print_r($updateData);print_r($where);exit;

		

		$this->db->trans_start();	

		$query = $this->db->update($tableName, $updateData, $where);

		$this->db->trans_complete();



		$result = $query ? 1 : 0;

		return $result;

	}
	
	
	public function get_count_auctions() {
	    $this->db->where('status', 'publish');
        return $this->db->count_all('auction_car');
    }

   
    public function get_auctions_publish($limit, $start){
		
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
        $this->db->order_by('end_auction_time', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_auctions_publish_brands(){
		
		
		$this->db->select('brand');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function get_auctions_publish_wp(){
		
		
		$this->db->select('*');
        $this->db->from('auction_car');
        $this->db->where('status', 'publish');
        $this->db->order_by('end_auction_time', 'asc');
        $query = $this->db->get();
        return $query->result();
	}
	
	


}

?>