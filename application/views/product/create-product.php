<div class="row">
		<h1 class="center-align">
			<img class="responsive-img" src="<?php echo base_url();?>images/addaccount-icon.png">
		</h1>
		<a href="<?php echo base_url(); ?>index.php/product/product_home" class="center-align waves-effect waves-light btn">product Home</a>
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
		echo form_open_multipart(base_url().'index.php/product/create_product', $attributes);
		 ?>
			<div class="form-container">
				<input type="hidden" name="product_mhead" id="product_mhead" value="" />
				<div class="row">
					<div class="input-field col s12 m3 offset-m5 l3 offset-l5">
					    <select name="product_shead" id="product_shead">
					      <option value="" disabled selected>Type</option>
					      <?php if(isset($product_sheads) && !empty($product_sheads)){
					      	foreach($product_sheads as $shead){
							?>
								<option value="<?php echo $shead['shead_id']; ?>"><?php echo $shead['shead_name']; ?></option>
						  <?php	
							}
					      } ?>
					    </select>
					    <label>product shead</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12 m3 offset-m5 l3 offset-l5">
						<input name="product_name" id="product_name" type="text" class="validate"
>
						<label for="product_name">product Name</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s4 m1 offset-m5 l1 offset-l5">
						<input name="product_cprice" id="product_cprice" type="text" class="validate"
>
						<label for="product_cprice">Cost Price</label>
					</div>
					
					<div class="input-field col s4 m1 l1">
						<input name="product_wprice" id="product_wprice" type="text" class="validate"
>
						<label for="product_wprice">W.Sale Price</label>
					</div>
					
					<div class="input-field col s4 m1 l1 ">
						<input name="product_rprice" id="product_rprice" type="text" class="validate"
>
						<label for="product_rprice">Retail Price</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s4 m1 offset-m5 l1 offset-l5">
						<select name="product_size" id="product_size">
							<option value="" disabled selected>Size</option>
							<?php if(isset($product_sizes) && !empty($product_sizes)){
					      	foreach($product_sizes as $size){
							?>
								<option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
						  <?php	
							}
					      } ?>
						</select>
					</div>
					
					<div class="input-field col s4 m1 offset-m1 l1 offset-l1">
						<select name="product_color" id="product_color">
							<option value="" disabled selected>Color</option>
							<?php if(isset($product_colors) && !empty($product_colors)){
					      	foreach($product_colors as $color){
							?>
								<option value="<?php echo $color['color_id']; ?>"><?php echo $color['color_name']; ?></option>
						  <?php	
							}
					      } ?>
						</select>
					</div>
				</div>
				

				<center>
					<button class="btn waves-effect waves-light teal" shead="submit" name="action">Submit</button>
				</center>
			</div>
		</form>
	</div>