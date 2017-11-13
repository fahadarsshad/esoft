<?php include 'header.php'; ?>
<div class="container" id="regcom">
 <div class="row">
 	<h3 class="center-align">Company Registration Form</h3>
 </div>
 <div class="row">
 <form class="col s12" action="../controller/regcom.php" method="POST">
 	<ul class="collapsible" data-collapsible="expandable">
    <li>
      <div class="collapsible-header">Company Infornation</div>
	      <div class="collapsible-body">
	      	<div class="row">
		        <div class="input-field col s12">
		          <input name="company_name" id="company_name" type="text" class="validate" required>
		          <label for="company_name">Company Name</label>
		        </div>
		        
		        <div class="input-field col s12">
		          <input name="company_email" id="company_email" type="email" class="validate" required>
		          <label for="company_email" data-error="wrong" data-success="valid">Company Email</label>
		        </div>
		        
		        <div class="input-field col s12">
		          <input name="company_phone" id="company_phone" type="text" class="validate" required>
		          <label for="company_phone">Company Phone</label>
		        </div>
  			</div>
	      </div>
    </li>
    <li>
      <div class="collapsible-header">User Information</div>
      <div class="collapsible-body">
      		<div class="row">
      			<div class="input-field col s12">
		          <input name="user_name" id="user_name" type="text" class="validate" required>
		          <label for="user_name">Set Your User Name</label>
		        </div>
		        
		        <div class="input-field col s12">
		          <input name="user_password" id="user_password" type="password" class="validate" required>
		          <label for="user_password">Set Your Password</label>
		        </div>
		    </div>
      </div>
    </li>
  </ul>
  <input type="submit" name="submit" id="submit" class="waves-effect waves-light btn" />
  
  </form>
 </div>	
</div>
<script>
	
</script>
<?php include 'footer.php'; ?>