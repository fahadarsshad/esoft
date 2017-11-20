<div class="row">
		<h1 class="center-align">
			<img class="responsive-img" src="<?php echo base_url();?>images/adduser-icon.png">
		</h1>
		<a href="<?php echo base_url(); ?>index.php/user/user_home" class="center-align waves-effect waves-light btn">User Home</a>
		<?php echo validation_errors(); ?>
	</div>
	<div class="row message">
		<?php if(isset($message) && !empty($message)){
	?>
	<h5 class="center-align"><?php if(isset($message)){ echo $message;} ?></h5>
	<?php		
		} ?>
	</div>
<div id="register" class="col s12">
		<?php
		$attributes = array('class' => 'col s12', 'id' => 'create-form');
		if(isset($user_detail) && !empty($user_detail)){
		echo form_open(base_url().'index.php/user/update_user/'.$user_detail['user_id'], $attributes);	
		}
		 ?>
			<div class="form-container">
				<h3 class="teal-text center-align">Update User</h3>
				
				<div class="row">
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
					    <select name="user_type" id="user_type">
					      <option value="" disabled selected>Choose your option</option>
					      	<?php if(isset($user_types)){
					      	foreach($user_types as $type){
					      		echo $type['type_id'];
							if($type['type_id']== $user_detail['type_id']){ ?>
							<option value="<?php echo $type['type_id']; ?>" selected ><?php echo $type['type_name']; ?></option>	
							<?php }else{?>
								<option value="<?php echo $type['type_id']; ?>"><?php echo $type['type_name']; ?></option>
							<?php }
							?>
						  <?php	
							}
					      } ?>
					    </select>
					    <label>User Type</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
					    <select name="user_role" id="user_role">
					      <option value="" disabled selected>Choose your option</option>
					      <?php if(isset($user_roles) && !empty($user_roles)){
					      	foreach($user_roles as $role){
							if($role['role_id']== $user_detail['user_role']){ ?>
							<option value="<?php echo $role['role_id']; ?>" selected ><?php echo $role['role_name']; ?></option>	
							<?php }else{?>
								<option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
							<?php }
							?>
						  <?php	
							}
					      } ?>
					    </select>
					    <label>User Role</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
						<input name="user_name" id="user_name" type="text" class="validate" value="<?php if(isset($user_detail)) { echo $user_detail['user_name']; }  ?>">
						<label for="user_name">User Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
						<input name="user_pass" id="user_pass" type="password" class="validate" value="<?php if(isset($user_detail)) { echo $user_detail['user_pass']; }  ?>">
						<label for="user_pass">Set User Password</label>
					</div>
				</div>

				<center>
					<button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
				</center>
			</div>
		</form>
	</div>