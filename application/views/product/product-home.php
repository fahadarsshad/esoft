<div class="row">
	<div class="col s12">
		<h3 class="left-align">products List</h3>
		<a href="<?php echo base_url(); ?>index.php/product/create_product" class="center-align waves-effect waves-light btn">Add New product</a>
		<a href="<?php echo base_url(); ?>index.php/dashboard/index" class="center-align waves-effect waves-light btn">Dashboard</a>
	</div>
</div>

<div class="row message">
		<?php if(isset($_GET['ms']) && !empty('$ms')){
	?>
	<h5 class="center-align"><?php if(isset($message)){ echo $message;} ?></h5>
	<?php		
		} ?>
	</div>

<table class="centered responsive-table striped">
        <thead>
          <tr>
              <th>Code</th>
              <th>Product Name</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php if(isset($all_products) && !empty($all_products)){ 
        	foreach($all_products as $product){
        ?>
          <tr>
            <td><?php echo $product['product_code']; ?></td>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo $product['shead_name']; ?></td>
            <td><?php echo $product['product_balance']; ?></td>
            <td>
            	<a href="<?php echo base_url().'index.php/product/update_product/'.$product['product_id'];?>">Edit</a>
            	/
            	<a href="<?php echo base_url().'index.php/product/delete_product/'.$product['product_id'];?>">Delete</a>
            </td>
          </tr>
          <?php
           	}
           }else{ echo "product Not Loaded or Empty"; } 
           ?>
        </tbody>
      </table>