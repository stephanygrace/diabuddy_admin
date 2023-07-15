
<div class="overlay"></div>	
	<div class="ftco-login centered">
		<div class="container-head">
			<div class="login-head">
			 		<h1>PigMe Authentication</h1>
			 		<span class="alert-close"> </span>
			 	</div>
		</div>
		 <div class="container">
			<div class="row align-content-center mb-0">
				<div class="col-md-12">
					<?php
					if ($this->session->flashdata('message')){
						echo '
							<div class="alert alert-danger">
							'.$this->session->flashdata('message').'</div>
						';
					}
					?>
					<form action="<?php echo base_url();?>LogInContr/codeValidation"  method="post">
					<div class="form-group">
						<p>Please check your email for the Code.</p>
						<div class="input-group mb-3">
							<span><i class="fa fa-lock"></i></span>	
							<input type="text" name="code" class="form-control" placeholder="Enter Code">
						</div>	
						<div class="text-danger" style="font-size: 13px; font-weight: 500; padding-left: 2px;"><?php echo form_error('code'); ?></div>
					</div>
					<div class="form-group">
						<button type="submit" name="insert" value="ENTER" class="btn btn-primary submit-btn">ENTER</button>
						<?php echo $this->session->flashdata('error');?>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>	
