<?php
class Account_model extends CI_Model{
	function __construct(){
				
	}
	
	function get_all_accounts(){
		$query = $this->db->query("SELECT * FROM accounts WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_account_by_id($account_id){
		$account_id = (int) $account_id;
		var_dump($account_id);
		$query = $this->db->query("SELECT * FROM accounts INNER JOIN account_shead ON  account_shead.shead_id = accounts.account_shead INNER JOIN account_mhead ON  account_mhead.mhead_id = accounts.account_shead where accounts.account_id='$account_id' AND accounts.is_delete=0 AND accounts.is_active=1");
		
		var_dump($query->row_array());
	}
	
	function get_account_sheads(){
		$query = $this->db->query("SELECT * FROM account_shead WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_account_mheads(){
		$query = $this->db->query("SELECT * FROM account_mhead WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function insert_account($data){
		$this->db->insert('accounts',$data);
		return $this->db->insert_id();
	}
	
	function create_code($account_code,$mhead_id,$account_id){
		$this->db->where('account_id', $account_id);
		return $this->db->update('accounts',array('account_code'=>$account_code,'account_mhead'=>$mhead_id));
	}
	
	function update_account($data,$account_id){
				$this->db->where('account_id', $account_id);
		return $this->db->update('accounts',$data);
	}
	
	function delete_account($account_id){
		$this->db->where('account_id', $account_id);
		return $this->db->update('accounts',array('is_delete'=>1,'is_active'=>0));
	}
	
	function get_mhead_by_shead($shead){
			$query = $this->db->query("SELECT * FROM account_shead WHERE shead_id='$shead' AND is_delete=0 AND is_active=1 LIMIT 1");
			
			return $query->row_array();
				
	}
}
?>