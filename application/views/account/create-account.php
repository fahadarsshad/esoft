<div class="row">
		<h1 class="center-align">
			<img class="responsive-img" src="<?php echo base_url();?>images/addaccount-icon.png">
		</h1>
		<a href="<?php echo base_url(); ?>index.php/account/account_home" class="center-align waves-effect waves-light btn">account Home</a>
		<?php echo validation_errors(); ?>
	</div>
	
	<div class="row message">
		<?php if(isset($message) && !empty($message)){
	?>
	<h5 class="center-align"><?php if(isset($message)){ echo $message; } ?></h5>
	<?php		
		} ?>
	</div>
<div id="register" class="col s12">
		<?php
		$attributes = array('class' => 'col s12', 'id' => 'create-form');
		echo form_open(base_url().'index.php/account/create_account', $attributes);
		 ?>
			<div class="form-container">
				<h3 class="teal-text center-align">Create New account</h3>
				<input type="hidden" name="account_mhead" id="account_mhead" value="" />
				<div class="row">
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
					    <select name="account_shead" id="account_shead">
					      <option value="" disabled selected>Choose your option</option>
					      <?php if(isset($account_sheads) && !empty($account_sheads)){
					      	foreach($account_sheads as $shead){
							?>
								<option value="<?php echo $shead['shead_id']; ?>"><?php echo $shead['shead_name']; ?></option>
						  <?php	
							}
					      } ?>
					    </select>
					    <label>account shead</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
						<input name="account_name" id="account_name" type="text" class="validate"
>
						<label for="account_name">account Name</label>
					</div>
				</div>

				<center>
					<button class="btn waves-effect waves-light teal" shead="submit" name="action">Submit</button>
				</center>
			</div>
		</form>
	</div>