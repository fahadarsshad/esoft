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
		} ?>
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
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
					    <select name="product_shead" id="product_shead">
					      <option value="" disabled selected>Choose your option</option>
					      	<?php if(isset($product_sheads)){
					      	foreach($product_sheads as $shead){
					      		echo $shead['shead_id'];
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
					<div class="input-field col s12 m4 offset-m4 l4 offset-l4">
						<input name="product_name" id="product_name" type="text" class="validate" value="<?php if(isset($product_detail)) { echo $product_detail['product_name']; }  ?>">
						<label for="product_name">product Name</label>
					</div>
				</div>

				<center>
					<button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
				</center>
			</div>
		</form>
	</div>