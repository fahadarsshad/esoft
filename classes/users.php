<?php
spl_autoload_register(function ($class){
	include '../classes/'.$class.'.php';	
});

class Users{
	function __construct(){
			
	}
	
	public function find_all_users(){  
	$database = new Database();
	$stmt = $database->connection->prepare('SELECT * FROM users');
	$result = $stmt->fetchAll();
	
	var_dump($result);
	}
}

$user = new Users();
$user->find_all_users();
?>