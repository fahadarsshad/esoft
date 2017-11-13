<?php
require_once('../config/database');

class Database{
	public $connection;
	
	
	function __construct(){
		$this->open_db_connection();
	}	
	
	public function open_db_connection(){
		try{
			$this->connection = new PDO(DB_TYPE.":host=".DB_HOST, DB_USER, DB_PASS);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connection Established";
		}catch(PDOException $e){
			echo $e->getMessage()."Please Install Database on Your System";
			die();
		}
	}
}
		$database = new Database();
		try{
			$stmt = $database->connection->prepare('USE esoft;SELECT user_name,user_pass FROM users LIMIT 1');
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);	
			while($row = $stmt->fetch()){
				
				}
			}catch(PDOException $e){
				echo "ERROR";
				$e->getMessage();
			}
?>