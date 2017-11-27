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
          	  <th>Image</th>
              <th>Code</th>
              <th>Product Name</th>
              <th>Type</th>
              <th>Cost(RS)</th>
              <th>Whole(RS)</th>
              <th>Retail(RS)</th>
              <th>Size</th>
              <th>Color</th>
              <th>Qty(In Hand)</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php if(isset($all_products) && !empty($all_products)){ 
        	foreach($all_products as $product){
        ?>
          <tr>
          	<td><img src="<?php echo base_url(); ?>product_img/<?php echo $product['pimage']; ?>" width="30" height="30" /></td>
            <td><?php echo $product['pcode']; ?></td>
            <td><?php echo $product['pname']; ?></td>
            <td><?php echo $product['ptypename']; ?></td>
            <td><?php echo $product['cprice']; ?></td>
            <td><?php echo $product['wprice']; ?></td>
            <td><?php echo $product['rprice']; ?></td>
            <td><?php echo $product['psizename']; ?></td>
            <td><?php echo $product['pcolorname']; ?></td>
            <td><?php echo $product['pqtybalance']; ?></td>
            <td>
            	<a href="<?php echo base_url().'index.php/product/update_product/'.$product['pid'];?>">Edit</a>
            	/
            	<a href="<?php echo base_url().'index.php/product/delete_product/'.$product['pid'];?>">Delete</a>
            </td>
          </tr>
          <?php
           	}
           }else{ echo "product Not Loaded or Empty"; } 
           ?>
        </tbody>
      </table>