<?php
class User_model extends CI_Model{
	function __construct(){
				
	}
	
	function get_all_users(){
		$query = $this->db->query("SELECT * FROM users WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_user_by_id($user_id){
		$query = $this->db->query("SELECT * FROM users INNER JOIN user_type ON  user_type.type_id = users.user_type INNER JOIN user_role ON  user_role.role_id = users.user_type where users.user_id='$user_id' AND users.is_delete=0 AND users.is_active=1");
		
		return $query->row_array();
	}
	
	function get_user_types(){
		$query = $this->db->query("SELECT * FROM user_type WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_user_roles(){
		$query = $this->db->query("SELECT * FROM user_role WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function insert_user($data){
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}
	
	function create_code($user_code,$user_id){
		$this->db->where('user_id', $user_id);
		return $this->db->update('users',array('user_code'=>$user_code));
	}
	
	function update_user($data,$user_id){
				$this->db->where('user_id', $user_id);
		return $this->db->update('users',$data);
	}
	
	function delete_user($user_id){
		$this->db->where('user_id', $user_id);
		return $this->db->update('users',array('is_delete'=>1,'is_active'=>0));
	}
}
?>