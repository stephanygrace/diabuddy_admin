<div class="overlay"></div>	
	<div class="ftco-admin centered">
		<div class="container-head">
			<div class="login-head">
			 		<h1>Diabuddy Registered Admins</h1>
			 		<span class="alert-close"> </span>
			 	</div>
		</div>
		<div class="container">
			<div class="row align-content-center mb-0">
				<div class="col-md-12">
					<table class="table table-bordered table responsive">
						<thead>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Email</th>
							</tr>
						</thead>

						<tbody>
							<?php
								if($records){
									foreach ($records as $record) {
							?>
							<tr>
								<td><?php echo $record->id ?></td>
								<td><?php echo $record->first_name ?></td>
								<td><?php echo $record->middle_name ?></td>
								<td><?php echo $record->last_name ?></td>
								<td><?php echo $record->age ?></td>
								<td><?php echo $record->gender ?></td>
								<td><?php echo $record->email ?></td>
							<!--<td>
								<a href="<?php #echo base_url('StudentContr/editStudentRecord/'.$record->id); ?>"  class="btn btn-info">Edit</a>
								<a href="<?php #echo base_url('StudentContr/deleteStudentRecord/'.$record->id); ?>" 
								class="btn btn-danger"
								onclick="return confirm('Are you sure you want to delete this Record?');"
								>Delete</a>
							</td>-->
							</tr>
		<?php
			}
		}
		?>
	</tbody>
</table>
<a href="<?php echo base_url('RegisterContr/index'); ?>" class="btn btn-primary">Back</a>
</div>
</div>
</div>
</div>

