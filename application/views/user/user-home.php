<div class="row">
	<div class="col s12">
		<h3 class="left-align">Users List</h3>
		<a href="<?php echo base_url(); ?>index.php/user/create_user" class="center-align waves-effect waves-light btn">Add New User</a>
		<a href="<?php echo base_url(); ?>index.php/dashboard/index" class="center-align waves-effect waves-light btn">Dashboard</a>
	</div>
</div>

<table class="centered responsive-table striped">
        <thead>
          <tr>
              <th>Code</th>
              <th>User Name</th>
              <th>User Password</th>
              <th>User Type</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php if(isset($all_users) && !empty($all_users)){ 
        	foreach($all_users as $user){
        ?>
          <tr>
            <td><?php echo $user['user_id']; ?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['user_pass']; ?></td>
            <td><?php echo $user['user_type']; ?></td>
            <td>
            	<a href="<?php echo base_url()?>index.php/user/update_user">Edit</a>
            	/
            	<a href="">Delete</a>
            </td>
          </tr>
          <?php
           	}
           }else{ echo "User Not Loaded or Empty"; } 
           ?>
        </tbody>
      </table>