<div class="row">
	<div class="col s12">
		<h3 class="left-align">Stores List</h3>
		<a href="<?php echo base_url(); ?>index.php/store/create_store" class="center-align waves-effect waves-light btn">Add New store</a>
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
              <th>store Name</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php if(isset($all_stores) && !empty($all_stores)){ 
        	foreach($all_stores as $store){
        ?>
          <tr>
            <td><?php echo $store['store_code']; ?></td>
            <td><?php echo $store['store_name']; ?></td>
            <td><?php echo $store['shead_name']; ?></td>
            <td><?php echo $store['store_balance']; ?></td>
            <td>
            	<a href="<?php echo base_url().'index.php/store/update_store/'.$store['store_id'];?>">Edit</a>
            	/
            	<a href="<?php echo base_url().'index.php/store/delete_store/'.$store['store_id'];?>">Delete</a>
            </td>
          </tr>
          <?php
           	}
           }else{ echo "store Not Loaded or Empty"; } 
           ?>
        </tbody>
      </table>