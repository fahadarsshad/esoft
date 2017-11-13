<?php 
spl_autoload_register(function ($class){
	include 'classes/'.$class.'.php';
	include 'config/'.$class.'.php';	
});
?>
<?php include_once('views/header.php'); ?>
<h1>This is Home Company Page</h1>
<?php include_once('views/footer.php'); ?>