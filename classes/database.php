<?php

class Database{
	public $conn;
	
	function __construct(){
			
	}/*construct dbconnection*/
	
	function db_connect($dbtype,$serverName, $userName, $userPass){
			
		try{
			$this->conn = new PDO($dbtype.":host=".$serverName, $userName, $userPass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(PDOException $e){
			echo $e->getMessage()."Please Install Database on Your System";
			die();
		}
	}
	
	function db_query($sql){
		try{
        	$this->conn->exec($sql); 
    		}
    	catch(PDOException $e){
        	die("DB ERROR: ". $e->getMessage());
    		} 		
	}
}		
?>