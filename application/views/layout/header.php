<!DOCTYPE html>
<html>
<head>
	<title>Diabuddy</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.css'); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body>
	
		
		<?php
			if($this->session->flashdata('success_msg')){
		?>
	<div class="alert alert-success">
		<?php
			echo $this->session->flashdata('success_msg');
		?>
	</div>
	<?php } ?>

	<?php
			if($this->session->flashdata('error_msg')){
		?>
	<div class="alert alert-danger">
		<?php
			echo $this->session->flashdata('error_msg');
		?>
	</div>
	<?php } ?>