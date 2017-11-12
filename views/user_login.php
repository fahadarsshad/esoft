<?php include 'header.php'; ?>
<div class="container">
     <div class="row">
     	<form method="post" action="../controller/users.php">
     	<div class="col m6 s12">
	     	<div class="card-panel grey lighten-5 z-depth-1">
	 			<h4 class="center-align"><img src="../img/user_login_icon1.png" class="circle responsive-img" alt="" height="50" width="50">Login Panel</h4>
	 			
	 			<div class="form">
	 				<input type="text" name="user_name" id="user_name" required/>
	 				<input type="password" name="user_pass" id="user_pass" required/>
	 				<input type="submit" name="submit" value="SUBMIT" />
	 			</div>
	 		</div> 	
     	</div>
     	</form>
     </div>
</div>
<?php include 'footer.php'; ?>