<?php 
spl_autoload_register(function ($class){
	require_once 'classes/'.$class.'.php';	
});
?>
<?php include_once('views/header.php'); ?>
<?php include_once('views/too_bar.php'); ?>
<?php include_once('views/side_nav.php'); ?>
<?php 
  	$session = new Session();
	if(!$session->is_signed_in()){
		
		header("Location: views/user_login.php");
		
	}
   
?>
<?php include_once('views/footer.php'); ?>