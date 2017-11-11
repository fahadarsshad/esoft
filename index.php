<?php 
spl_autoload_register(function ($class){
	include 'classes/'.$class.'.php';
	include 'config/'.$class.'.php';	
});

if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Esoft")){
	header('Location:'.'views/regcom.php');
}else{
	header('Location:'.'views/user_login.php');
}
?>