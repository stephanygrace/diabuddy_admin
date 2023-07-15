
<div class="overlay"></div>	
	<div class="ftco-login centered">
		<div class="container-head">
			<div class="login-head">
			 		<h1>Diabuddy Login</h1>
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
							'.$this->session->flashdata('message').'</div>
						';
					}
					?>
					<form action="<?php echo base_url();?>LogInContr/login_validation"  method="post">
					<div class="form-group mb-2">
						<div class="input-group">
							<span><i class="fa fa-envelope"></i></span>
							<input type="text" name="email" class="form-control" placeholder="Email">
							
						</div>
						<div class="text-danger" style="font-size: 13px; font-weight: 500; padding-left: 2px;"><?php echo form_error('email'); ?></div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span><i class="fa fa-lock"></i></span>	
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>	
						<div class="text-danger" style="font-size: 13px; font-weight: 500; padding-left: 2px;"><?php echo form_error('password'); ?></div>
					</div>
					<div class="form-group mt-2">
						<button type="submit" name="insert" value="SIGN IN" class="btn btn-primary submit-btn">SIGN IN</button>
						<?php echo $this->session->flashdata('error');?>
					</div>
					<div class="form-group text-center mt-4">
						Create an account?<a href="<?php echo base_url('RegisterContr/'); ?>"> Sign Up</a>
						
					</div>
					
				</form>
				</div>
			</div>
		</div>
	</div>	
