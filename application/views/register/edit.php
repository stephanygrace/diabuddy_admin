<form action="<?php echo base_url('StudentContr/updateStudentRecord'); ?>"  method="post">
		<input type="hidden" name="txtID" value="<?php echo $record->id; ?>">
		Enter Your First Name:<input type="text" name="txtFN" placeholder="First Name"
		value="<?php echo $record->first_name ?>"><br>
		Enter Your Middle Name: <input type="Text" name="txtMN" placeholder="Middle Name"
		value="<?php echo $record->middle_name ?>"><br>
		Enter Your Last Name: <input type="text" name="txtLN" placeholder="Last Name"
		value="<?php echo $record->last_name ?>">
		<br>
		Gender<br>
		<?php
			if($record->gender == "Male"){
				echo "
				<input type='radio' name='rdoGender' value='Male' checked='true'>Male<br>
				<input type='radio' name='rdoGender' value='Female'>Female<br>
				";
			}else{
				echo "
				<input type='radio' name='rdoGender' value='Male'>Male<br>
				<input type='radio' name='rdoGender' value='Female'  checked='true'>Female<br>
				";
			}
		?>
		Select Your Course:
		<?php
		if ($record->course == "ITSM") {
			echo "
				<select name='cboCourse'>
					<option selected>ITSM</option>
					<option>APPDEV</option>
					<option>NETADD</option>
					<option>CS</option>
				</select><br>
				";
		}else if ($record->course == "APPDEV"){
			echo "
				<select name='cboCourse'>
					<option >ITSM</option>
					<option selected>APPDEV</option>
					<option>NETADD</option>
					<option>CS</option>
				</select><br>
				";
		}else if ($record->course == "NETADD"){
			echo "
				<select name='cboCourse'>
					<option >ITSM</option>
					<option >APPDEV</option>
					<option selected>NETADD</option>
					<option>CS</option>
				</select><br>
				";
		}else if ($record->course == "CS"){
			echo "
				<select name='cboCourse'>
					<option >ITSM</option>
					<option >APPDEV</option>
					<option >NETADD</option>
					<option selected>CS</option>
				</select><br>
				";
			}
		?>
		
		Select Your Year Level:

		<?php
		if($record->year == 1) {
			echo "
				<select name='cboYear'>
					<option selected>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select><br><br>
				";
			}else if($record->year == 2) {
			echo "
				<select name='cboYear'>
					<option >1</option>
					<option selected>2</option>
					<option>3</option>
					<option>4</option>
				</select><br><br>
				";
			}else if($record->year == 3) {
			echo "
				<select name='cboYear'>
					<option >1</option>
					<option >2</option>
					<option selected>3</option>
					<option>4</option>
				</select><br><br>
				";
			}else if($record->year == 4) {
			echo "
				<select name='cboYear'>
					<option >1</option>
					<option >2</option>
					<option >3</option>
					<option selected>4</option>
				</select><br><br>
				";
			}
		?>
		
		<button type="submit" name="submit" class="btn btn-info">Save</button>
		<a href="<?php echo base_url('StudentContr/viewAllStudentRecords'); ?>" class="btn btn-primary">Back</a>

	</form>