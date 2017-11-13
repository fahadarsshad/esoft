<?php
		spl_autoload_register(function ($class){
			include '../classes/'.$class.'.php';	
		});
	
		$user_name = $_REQUEST['user_name'];
		$user_pass = $_REQUEST['user_pass'];
	
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
			$db->db_connect($dbtype,$servername, $username,$user_pass);
		}
	
	
	$us = new Users();
	$data = $us->user_login($user_name, $user_pass);
	
	foreach($data as $d){
			echo $d['user_name']."/".$d['user_pass'].'<br />';
			if($d['user_name'] == 'fhdarshad' && $d['user_pass'] == '123456'){
				echo "dashboard";
			}else{
				echo "user name or password not found";
			}
		}
			
?>