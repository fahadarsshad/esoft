<?php
spl_autoload_register(function ($class){
	include '../classes/'.$class.'.php';
	include '../config/'.$class.'.php';	
});

	//get database configuration data
		$data = array();
		$cf = '../configuration.txt';
		$hcf = fopen($cf,'r');
		if($hcf){
		 $data  = explode(',',fread($hcf,filesize($cf)));
		}else{
			echo "file not open";
		}		

		$dbtype = $data[0];
		$dbservername = $data[1];
		$dbname = $data[4];
		$dbusername = $data[2];
		$dbuserpassword = $data[3];
//get form data		
		$cnname = $_REQUEST["company_name"];
		$cnphone = $_REQUEST["company_phone"];
		$cnemail = $_REQUEST["company_email"];
		$cnusername = $_REQUEST["user_name"];
		$cnpassword = $_REQUEST["user_password"];
		
		
		
		$obj = new Database();
		$obj->db_connect($dbtype,$dbservername, $dbusername, $dbuserpassword);
		$dbuserpassword = $new_pass = 'fhd123456';
		$obj->db_query($sql = "SET PASSWORD FOR 'root'@'$dbservername' = '$new_pass'");
			

		$obj->db_query($sql="CREATE DATABASE IF NOT EXISTS $dbname;");
		
		$obj->db_query($sql = "CREATE USER '$cnusername'@'$dbservername' IDENTIFIED BY '$cnpassword';");
		
		//$obj->db_query($sql = "GRANT SELECT,INSERT,UPDATE ON *.* TO '$cnusername'@'%' identified by '$cnpassword';");
		
		$obj->db_query($sql = "USE $dbname; CREATE TABLE IF NOT EXISTS users(user_id INT(11) AUTO_INCREMENT PRIMARY KEY,user_fname VARCHAR(25),user_lname VARCHAR(25),user_type INT(11) NOT NULL,user_email VARCHAR(50),user_create DATE,user_update DATE)");


		if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Esoft")){
			mkdir($_SERVER['DOCUMENT_ROOT']."/Esoft/");
			$cn = fopen($_SERVER['DOCUMENT_ROOT']."/Esoft/cn.json","w");
			$cnarray = array(
			"dbtype"=>$dbtype,
			"dbname"=>$dbname,
			"dbusername"=>$dbusername,
			"dbuserpass"=>$dbuserpassword,
			"cnname"=>$cnname,
			"cnphone"=>$cnphone,
			"cnemail"=>$cnemail,
			"cnusername"=>$cnusername,
			"cnuserpass"=>$cnpassword
			);
			$cndata = json_encode($cnarray);
			$resultfile = fwrite($cn,$cndata);
			if(!$resultfile){
				echo "Error: Data Not write on file name: ";
				die();
			}
			fclose($cn);
		}
				
?>