<?php 
spl_autoload_register(function ($class){
	include '../classes/'.$class.'.php';	
});
?>
<?php	
if(isset($_REQUEST['submit'])){
$user_name = trim($_REQUEST['user_name']);
$user_pass = trim($_REQUEST['user_pass']);	
}

$user_found = Users::verify_user($user_name,$user_pass);	
if($user_found){
$session = new Session();	
$session->login($user_found);
header("Location: ../index.php");
} else {
	$error_message = "Your password or username are incorrect";
}
?>