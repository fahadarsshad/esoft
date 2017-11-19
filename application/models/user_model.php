<?php
class User_model extends CI_Model{
	function __construct(){
				
	}
	
	function get_all_users(){
		$query = $this->db->query("SELECT * FROM users");
		
		return $query->result_array();
	}
	
	function get_user_by_id($user_id){
		$query = $this->db->query("SELECT * FROM users WHERE user_id='$user_id'");
		
		return $query->result_array();
	}
	
	function get_user_types(){
		$query = $this->db->query("SELECT * FROM user_type");
		
		return $query->result_array();
	}
	
	function get_user_roles(){
		$query = $this->db->query("SELECT * FROM user_role");
		
		return $query->result_array();
	}
	
	function insert_user($data){
		return $this->db->insert('users',$data);
	}
}
?>