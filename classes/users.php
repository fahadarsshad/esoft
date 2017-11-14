<?php
spl_autoload_register(function ($class){
	include '..classes/'.$class.'.php';	
});

class Users{
	public $user_id;
	public $user_name;
	public $user_type;
	public $user_pass;
	public $user_email;
	
	
	
	function __construct(){
		
	}
	
	public static function find_all_users(){
		
		return self::find_this_query("SELECT * FROM users");
	
	}
	
	public static function find_user_by_id($user_id){
		
		$the_result_array = self::find_this_query("SELECT * FROM users WHERE user_id=$user_id LIMIT 1");
		
		/*if(!empty($the_result_array)){
			
			return $first_item;
			
		}else{
			
			return false;
			
		}*/
		
		
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
		
		//return $found_user;
		
	}
	
	public static function find_this_query($sql){
		$database = new Database();
		
		$result_set = $database->query($sql);
		
		
		$the_object_array = array();
		
		while($row = mysqli_fetch_array($result_set)){	
				
			$the_object_array[] = self::instantation($row);
		
		}
		return $the_object_array;	 
	}
	
	public static function verify_user($user_name,$user_pass){
	$database = new Database();	
	
	$user_name = $database->escap_string($user_name);
	$user_pass = $database->escap_string($user_pass);
	
	$sql = "SELECT * FROM users WHERE";
	$sql .= " user_name = '{$user_name}'";
	$sql .= " AND user_pass = '{$user_pass}'";
	$sql .= " LIMIT 1";	
	
	$the_result_array = self::find_this_query($sql);
	
		return !empty($the_result_array) ? array_shift($the_result_array) : FALSE;	
		
	} 
	
	public static function instantation($the_record){
		
  		$the_object = new self;
  		
  	/*	$user_object->user_id 	 = $found_user['user_id'];
  		$user_object->user_name  = $found_user['user_name'];
  		$user_object->user_type  = $found_user['user_type'];
  		$user_object->user_pass  = $found_user['user_pass'];
  		$user_object->user_email = $found_user['user_email'];*/
  		
  		foreach($the_record as $the_attribute => $value){
  			
			
			if($the_object->has_the_attribute($the_attribute)){
				
				$the_object->$the_attribute = $value;
				
			}
			
		
			
		}
  		return $the_object;
	} 
	
	private function has_the_attribute($the_attribute){
		
		$object_properties = get_object_vars($this);
		
		return array_key_exists($the_attribute, $object_properties);
	}
}

?>