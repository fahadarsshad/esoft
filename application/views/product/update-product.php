<div class="row">
		<h1 class="center-align">
			<img class="responsive-img" src="<?php echo base_url();?>images/addproduct-icon.png">
		</h1>
		<a href="<?php echo base_url(); ?>index.php/product/product_home" class="center-align waves-effect waves-light btn">product Home</a>
		<?php echo validation_errors(); ?>
	</div>
	<div class="row message">
		<?php if(isset($message) && !empty($message)){
	?>
	<h5 class="center-align"><?php if(isset($message)){ echo $message;} ?></h5>
	<?php		
		} 
		?>
	</div>
<div id="register" class="col s12">
		<?php
		$attributes = array('class' => 'col s12', 'id' => 'create-form');
		if(isset($product_detail) && !empty($product_detail)){
		echo form_open(base_url().'index.php/product/update_product/'.$product_detail['product_id'], $attributes);	
		}
		 ?>
			<div class="form-container">
				<h3 class="teal-text center-align">Update Product</h3>
				
				<div class="row">
					<div class="input-field col s4 m3 offset-m5 l3 offset-l5">
					    <select name="product_shead" id="product_shead">
					      <option value="" disabled selected>Choose your option</option>
					      	<?php if(isset($product_sheads)){
					      	foreach($product_sheads as $shead){
							if($shead['shead_id'] == $product_detail['shead_id']){ ?>
							<option value="<?php echo $shead['shead_id']; ?>" selected ><?php echo $shead['shead_name']; ?></option>	
							<?php }else{?>
								<option value="<?php echo $shead['shead_id']; ?>"><?php echo $shead['shead_name']; ?></option>
							<?php }
							?>
						  <?php	
							}
					      } ?>
					    </select>
					    <label>product Type</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s4 m3 offset-m5 l3 offset-l5">
						<input name="product_name" id="product_name" type="text" class="validate" value="<?php if(isset($product_detail)) { echo $product_detail['product_name']; }  ?>">
						<label for="product_name">product Name</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s4 m1 offset-m5 l1 offset-l5">
						<input name="product_cprice" id="product_cprice" type="text" class="validate" value="<?php if(isset($product_detail)) { echo $product_detail['product_cprice']; }  ?>"
>
						<label for="product_cprice">Cost Price</label>
					</div>
					
					<div class="input-field col s4 m1 l1">
						<input name="product_wprice" id="product_wprice" type="text" class="validate" value="<?php if(isset($product_detail)) { echo $product_detail['product_wprice']; }  ?>"
>
						<label for="product_wprice">W.Sale Price</label>
					</div>
					
					<div class="input-field col s4 m1 l1 ">
						<input name="product_rprice" id="product_rprice" type="text" class="validate" value="<?php if(isset($product_detail)) { echo $product_detail['product_rprice']; }  ?>"
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
					      		if($size['size_id'] == $product_detail['product_size_id']){
							?>
							<option value="<?php echo $size['size_id']; ?>" selected ><?php echo $size['size_name']; ?></option>	
							<?php }else{?>
							<option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
							<?php }
							?>
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
					      		if($color['color_id'] == $product_detail['product_color_id']){
							?>
							<option value="<?php echo $color['color_id']; ?>" selected ><?php echo $color['color_name']; ?></option>	
							<?php }else{?>
							<option value="<?php echo $color['color_id']; ?>"><?php echo $color['color_name']; ?></option>
							<?php }
							?>
						  <?php	
							}
					      } ?>
						</select>
					</div>
				</div>

				<center>
					<button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
				</center>
			</div>
		</form>
	</div>