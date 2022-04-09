<?php

class Chat_model extends CI_model{
	
	
	public function check_chat_room($dealer_id, $auction_id){
	    
	    $this->db->select('chat_id');
        $this->db->from('chat_room');
        $this->db->where('dealer_id', $dealer_id);
        $this->db->where('auction_id', $auction_id);
        $query = $this->db->get();
        return $query->row();
	}
	
	public function store_chat_room($dealer_id, $auction_id, $chat_id){
		
		$data = array(
		    'dealer_id' => $dealer_id,
		    'chat_id' => $chat_id,
		    'creater_id' => $dealer_id,
		    'auction_id' => $auction_id,
		    );
		    
		$this->db->insert('chat_room',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function store_chat_room_admin($dealer_id, $auction_id, $chat_id, $admin_id){
		
		$data = array(
		    'dealer_id' => $dealer_id,
		    'chat_id' => $chat_id,
		    'creater_id' => $admin_id,
		    'auction_id' => $auction_id,
		    );
		    
		$this->db->insert('chat_room',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	
	public function save_chat($data){
	    
		$this->db->insert('chat',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function save_chat_notification($data){
	    
		$this->db->insert('chat_notification',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function fetch_chat($chat_id){
	    
	    $this->db->select('chat.*, chat_room.auction_id as auction_id ');
        $this->db->from('chat');
        $this->db->where('chat.chat_id', $chat_id);
        $this->db->join('chat_room', 'chat_room.chat_id = chat.chat_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function fetch_chat_dates($chat_id){
	    
	    $this->db->distinct('DATE_FORMAT(created_at, "%d/%m/%Y")');
	    $this->db->select('DATE_FORMAT(created_at, "%d/%m/%Y") as urdate');
        $this->db->from('chat');
        $this->db->where('chat_id', $chat_id);
        $query = $this->db->get();
        return $query->result();

	}
	
	public function get_chatroom($dealer_id){
	    
	    $this->db->select('*');
        $this->db->from('chat_room');
        $this->db->where('dealer_id', $dealer_id);
        $query = $this->db->get();
        return $query->result();
	}
	
    
    public function get_auction_chat($dealer_id){
	    
	    $this->db->select('chat_room.*, auction_car.brand as brand, auction_car.model as model');
        $this->db->from('chat_room');
        $this->db->where('chat_room.dealer_id', $dealer_id);
        $this->db->where_not_in('chat_room.auction_id', 0);
        $this->db->join('auction_car', 'auction_car.id = chat_room.auction_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_last_chatmsg($chat_id){
	    
	    $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('chat_id', $chat_id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
	}


	public function get_auction_chat_dealers($auction_id){
	    
	    $this->db->select('chat_room.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.email as dealer_email, dealer.id as dealer_id, dealer.user_status as dealer_user_status');
        $this->db->from('chat_room');
        $this->db->where('chat_room.auction_id', $auction_id);
        $this->db->join('dealer', 'dealer.id = chat_room.dealer_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_admin_auctions_chat(){
	    
	    $this->db->select('chat_room.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.email as dealer_email, dealer.id as dealer_id, dealer.user_status as dealer_user_status, auction_car.brand as brand, auction_car.model as model');
        $this->db->from('chat_room');
        $this->db->where_not_in('chat_room.auction_id', 0);
        $this->db->join('dealer', 'dealer.id = chat_room.dealer_id', 'left');
        $this->db->join('auction_car', 'auction_car.id = chat_room.auction_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_admin_direct_dealers_chat(){
	    
	    $this->db->select('chat_room.*, dealer.name as dealer_name, dealer.surname as dealer_surname, dealer.email as dealer_email, dealer.id as dealer_id, dealer.user_status as dealer_user_status');
        $this->db->from('chat_room');
        $this->db->where('chat_room.auction_id', 0);
        $this->db->join('dealer', 'dealer.id = chat_room.dealer_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	
	public function get_notification($chat_id, $dealer_id){
	    
	    $this->db->select('*');
        $this->db->from('chat_notification');
        $this->db->where('chat_id', $chat_id);
        $this->db->where('user_id', $dealer_id);
        $this->db->where('status', 'unseen');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function chat_notification_update_seen($chat_id, $dealer_id){
	    
	    $this->db->where('user_id',$dealer_id);
	    $this->db->where('chat_id',$chat_id);
	    $data = array(
	    	'status' => 'seen',
	    );
		$result = $this->db->update('chat_notification',$data);
		return $result;
	}
	
	
	public function get_notification_total_auction_msg($dealer_id){
	    
	    $this->db->select('chat_notification.*');
        $this->db->from('chat_notification');
        $this->db->where('chat_notification.user_id', $dealer_id);
        $this->db->where('chat_notification.status', 'unseen');
        $this->db->where_not_in('chat_room.auction_id', '0');
        $this->db->join('chat_room', 'chat_room.chat_id = chat_notification.chat_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	public function get_notification_total_direct_msg($dealer_id){
	    
	    $this->db->select('chat_notification.*');
        $this->db->from('chat_notification');
        $this->db->where('chat_notification.user_id', $dealer_id);
        $this->db->where('chat_notification.status', 'unseen');
        $this->db->where('chat_room.auction_id', '0');
        $this->db->join('chat_room', 'chat_room.chat_id = chat_notification.chat_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_notification_total($dealer_id){
	    
	    $this->db->select('*');
        $this->db->from('chat_notification');
        $this->db->where('user_id', $dealer_id);
        $this->db->where('status', 'unseen');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_notification_team($dealer_id){
	    
	    $this->db->select('chat_notification.*');
        $this->db->from('chat_notification');
        $this->db->where('chat_notification.user_id', $dealer_id);
        $this->db->where('chat_notification.status', 'unseen');
        $this->db->where('chat_room.auction_id', '0');
        $this->db->join('chat_room', 'chat_room.chat_id = chat_notification.chat_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
    
    public function chat_notification_all_auction($dealer_id){
	    
	    $this->db->select('chat_notification.*');
        $this->db->from('chat_notification');
        $this->db->where('chat_notification.user_id', $dealer_id);
        $this->db->where('chat_notification.status', 'unseen');
        $this->db->where_not_in('chat_room.auction_id', '0');
        $this->db->join('chat_room', 'chat_room.chat_id = chat_notification.chat_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function delete_chat_msg($chatid){
	    
	    $this->db->where('id',$chatid);
		$result = $this->db->delete('chat');
		return $result;
	}

}

?>