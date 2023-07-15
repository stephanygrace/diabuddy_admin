
<div class="overlay"></div>	
	<div class="ftco-register centered mt-4">
		<div class="container-head">
			<div class="login-head">
			 		<h1>Diabuddy Resgitration Form</h1>
			 		<span class="alert-close"> </span>
			 	</div>
		</div>
		<div class="container">
			<div class="row align-content-center mb-0">
				<div class="col-md-12">
					<?php
					if ($this->session->flashdata('message')){
						echo '
							<div class="alert alert-success">
							'.$this->session->flashdata("message").'</div>
						';
					}
					?>
					<form action="<?php echo base_url('RegisterContr/validation'); ?>"  method="post">
						<div class="form-group">
							<div class="input-group">
								<div class="row ">
									<div class="col-md-4">
										<input type="text" name="txtFN" class="form-control" placeholder="First Name" value="<?php echo set_value('txtFN'); ?>">
										<span class="text-danger" style="font-size: 11px;"><?php echo form_error('txtFN'); ?></span>
									</div>
									<div class="col-md-4">
										<input type="Text" name="txtMN" class="form-control" placeholder="Middle Name" value="<?php echo set_value('txtMN'); ?>" >
										<span class="text-danger" style="font-size: 11px;"><?php echo form_error('txtMN'); ?></span>
									</div>
									<div class="col-md-4">
										<input type="text" name="txtLN" class="form-control" placeholder="Last Name" value="<?php echo set_value('txtLN'); ?>">
										<span class="text-danger" style="font-size: 11px;"><?php echo form_error('txtLN'); ?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-md-6 mt-3">
									<div class="input-group">
										<input type="text" name="txtAge"  class="form-control" placeholder="Age" style="width: 100%;" value="<?php echo set_value('txtAge'); ?>">
									</div>
								</div>
								<div class="col-md-6 mt-3">
									<div class="radio-group mt-2">
										<label style="margin-left: 5px;">Gender: </label>
										
										<input type="radio" name="rdoGender" value="Male" checked="true" style="margin-left: 10px;">
										<label class="radio-inline" for="rdoGender">Male</label>
										
										<input type="radio" name="rdoGender" value="Female" style="margin-left: 10px;">
										<label class="radio-inline" for="rdoGender">Female</label>
									</div>	
								</div>
							</div>							
						</div>
						<div class="form-group">
							
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<input type="text" name="txtEmail" class="form-control" placeholder="Email" style="width: 100%;" value="<?php echo set_value('txtEmail'); ?>">
								<span class="text-danger" style="font-size: 11px;"><?php echo form_error('txtEmail'); ?></span>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<input type="Password" name="txtPassword" class="form-control" placeholder="Password" style="width: 100%;" value="<?php echo set_value('txtPassword'); ?>">
								<span class="text-danger" style="font-size: 11px;"><?php echo form_error('txtPassword'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" name="register" class="btn btn-primary submit-btn mb-2">Register</button>
						</div>
						<div class="form-group text-center">
							Already have an account? <a href="<?php echo base_url('LogInContr/'); ?>"> Login</a>
						</div>
						<div class="text-center">
							<hr style="width: 100%;">
						</div>
						
						<div class="form-group text-center">
							<a href="<?php echo base_url('RegisterContr/viewAllAdminRecords'); ?>" class="btn btn-info"> View All Registered Admin</a>
							
						</div>
						
					</form>
	</div>
</div>