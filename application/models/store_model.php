<?php
class Store_model extends CI_Model{
	function __construct(){
				
	}
	
	function get_all_stores(){
		$query = $this->db->query("select * from stores inner join store_shead on stores.store_shead = store_shead.shead_id where stores.is_delete=0 and stores.is_active=1");
		
		return $query->result_array();
	}
	
	function get_store_by_id($store_id){
		$query = $this->db->query("SELECT * FROM stores INNER JOIN store_shead ON  store_shead.shead_id = stores.store_shead INNER JOIN store_mhead ON  store_mhead.mhead_id = stores.store_shead where stores.store_id='$store_id' AND stores.is_delete=0 AND stores.is_active=1");
		
		return $query->row_array();
	}
	
	function get_store_sheads(){
		$query = $this->db->query("SELECT * FROM store_shead WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_store_mheads(){
		$query = $this->db->query("SELECT * FROM store_mhead WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function insert_store($data){
		$this->db->insert('stores',$data);
		return $this->db->insert_id();
	}
	
	function create_code($store_code,$mhead_id,$store_id){
		$this->db->where('store_id', $store_id);
		return $this->db->update('stores',array('store_code'=>$store_code,'store_mhead'=>$mhead_id));
	}
	
	function update_store($data,$store_id){
				$this->db->where('store_id', $store_id);
		return $this->db->update('stores',$data);
	}
	
	function delete_store($store_id){
		$this->db->where('store_id', $store_id);
		return $this->db->update('stores',array('is_delete'=>1,'is_active'=>0));
	}
	
	function get_mhead_by_shead($shead){
			$query = $this->db->query("SELECT * FROM store_shead WHERE shead_id='$shead' AND is_delete=0 AND is_active=1 LIMIT 1");
			
			return $query->row_array();
				
	}
}
?>