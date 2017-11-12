<?php
spl_autoload_register(function ($class){
	include '../classes/'.$class.'.php';	
});

class Users{
	function __construct(){
		
	}
	
	public function user_login($user_name, $user_pass){
		if(!$str = file_get_contents('../Esoft/cn.json')){
			echo "FILE ERROR::JSON FILE COULD NOT FOUND";
		}
		$json = json_decode($str);
		
		$dbtype = $json->dbtype;
		$servername = $json->servername;
		$username = $json->cnusername;
		$userpass = $json->cnuserpass;
		$dbname = $json->dbname;
		
		$db = new Database();
		
		if(!isset($db->conn)){
			$db->db_connect($dbtype,$servername = '127.0.0.1', $username = 'fhdarshad', '123456');
		}
		$stmt = $db->conn->prepare("USE $dbname");
		$stmt->execute();
		
		
		$stmt = $db->conn->prepare("SELECT user_id, user_name, user_pass FROM users"); 
    	$stmt->execute();
    	
    	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    	
    	 return $data = $stmt->fetchAll();
	}
	
	function user_logout(){
		$db = new Database();
		$db->db_disconnect();
		echo "Logout!";
	}
}
?>