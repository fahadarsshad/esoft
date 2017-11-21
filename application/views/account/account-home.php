<div class="row">
	<div class="col s12">
		<h3 class="left-align">Accounts List</h3>
		<a href="<?php echo base_url(); ?>index.php/account/create_account" class="center-align waves-effect waves-light btn">Add New account</a>
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
              <th>account Name</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php if(isset($all_accounts) && !empty($all_accounts)){ 
        	foreach($all_accounts as $account){
        ?>
          <tr>
            <td><?php echo $account['account_code']; ?></td>
            <td><?php echo $account['account_name']; ?></td>
            <td><?php echo $account['account_shead']; ?></td>
            <td><?php echo $account['account_balance']; ?></td>
            <td>
            	<a href="<?php echo base_url().'index.php/account/update_account/'.$account['account_id'];?>">Edit</a>
            	/
            	<a href="<?php echo base_url().'index.php/account/delete_account/'.$account['account_id'];?>">Delete</a>
            </td>
          </tr>
          <?php
           	}
           }else{ echo "account Not Loaded or Empty"; } 
           ?>
        </tbody>
      </table>