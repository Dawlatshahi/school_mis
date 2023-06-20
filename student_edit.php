<?php

	require_once("connection.php");
checkLevel(1, 9, 4, 9, 9, 9, 9, 9, 9 );

	$section = mysqli_query($con, "SELECT * FROM class_section ORDER BY class_id ASC, section_id ASC");
	$row_section = mysqli_fetch_assoc($section);
	
	$student = mysqli_query($con, "SELECT * FROM student WHERE student_id = " . $_GET["student_id"]);
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["firstname"])){
		
		$reg_no = $_POST["reg_no"];
		$firstname = $_POST["firstname"];
		$fathername = $_POST["fathername"];
		$grandfathername = $_POST["grandfathername"];
		$gender = $_POST["gender"];
		$birth_year = $_POST["birth_year"];
		$province = $_POST["province"];
		$district = $_POST["district"];
		$village = $_POST["village"];
		$current_address = $_POST["current_address"];
		$nic = $_POST["nic"];
		$phone = $_POST["phone"];
		$status = $_POST["status"];
		$section_id = $_POST["section_id"];
		
		if($_FILES["photo"]["name"] != "") {
			$path = "images/student/" . time() . $_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
		}
		else {
			$path = $row_student["photo"];
		}
		
		
		if(mysqli_query($con, "UPDATE student SET reg_no='$reg_no', firstname='$firstname', fathername='$fathername', 
		grandfathername='$grandfathername', gender=$gender, birth_year=$birth_year, province='$province', district='$district', 
		village='$village', current_address='$current_address', nic='$nic', phone='$phone', photo='$path',
		status=$status, section_id=$section_id WHERE student_id = " . $_GET["student_id"])) {
			header("location:student_detail.php?student_id=" . $_GET["student_id"] . "&edit=done");
		}
		else{
			header("location:student_edit.php?student_id=" . $_GET["student_i"] . "&error=notedit");
		}
	}

?>

<?php require_once("top.php"); ?>
	<a href="student_detail.php?student_id=<?php echo $row_student["student_id"]; ?>" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
		<h2>ویرایش مشخصات شاگرد</h2>
	<?php if(isset($_GET["error"])) { ?>
	
		<div class="alert alert-danger alert-dismissable">
			<button class="close" area-hidden="true" 
			data-dismiss="alert">&times;</button>
			عملیه ویرایش انجام نشد! لطفا دوباره کوشش کنید.
		
		</div>
	
	<?php } ?>
	
		<br>
		
		<form method="post" enctype="multipart/form-data">
	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
			<div class="input-group">
				<span class="input-group-addon">نوعیت: &nbsp;&nbsp;&nbsp;</span>
				<select class="form-control" id="student_type">
					<option value="1">رسمی</option>
					<option value="0">غیررسمی</option>
				</select>
			</div>
	
			<div class="input-group" id="reg_no">
				<span class="input-group-addon">نمبر اساس: &nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["reg_no"]; ?>" type="text" class="form-control" name="reg_no">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نام دانش آموز:</span>
				<input value="<?php echo $row_student["firstname"]; ?>" type="text" class="form-control" name="firstname">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نام پدر: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["fathername"]; ?>" type="text" class="form-control" name="fathername">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نام پدر کلان:&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["grandfathername"]; ?>" type="text" class="form-control" name="grandfathername">
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon"> جنسیت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;
					<label><input <?php if($row_student["gender"] == 0) echo "checked"; ?> type="radio" name="gender" value="0">
					مذکر </label>
					&nbsp;
					<label><input <?php if($row_student["gender"] == 1) echo "checked"; ?> type="radio" name="gender" value="1">
					مونث </label>
					&nbsp;
			</div>	
			
			<div class="input-group">
				<span class="input-group-addon">تاریخ تولد:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["birth_year"]; ?>" type="text" class="form-control" name="birth_year">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">ولایت:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["province"]; ?>" type="text" class="form-control" name="province" >
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> ولسوالی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["district"]; ?>" type="text" name="district" class="form-control">
			</div>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			
			
			<div class="input-group">
				<span class="input-group-addon">قریه:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["village"]; ?>" type="text" name="village" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">آدرس فعلی:&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["current_address"]; ?>" type="text" class="form-control" name="current_address">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نمبر تذکره:&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_student["nic"]; ?>" type="text" class="form-control" name="nic">
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon">شماره تماس:&nbsp;</span>
				<input value="<?php echo $row_student["phone"]; ?>" type="text" class="form-control" name="phone">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">عکس:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="file" class="form-control" name="photo">
				<span class="input-group-addon" style="padding:2px;">
					<img src="<?php echo $row_student["photo"]; ?>" width="25" height="25">
				</span>
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon">صنف: </span>
				<select class="form-control" name="section_id">
					<?php do { ?>
						<option value="<?php echo $row_section["section_id"]; ?>"><?php echo $row_section["section_name"]; ?></option>
					<?php } while($row_section = mysqli_fetch_assoc($section)); ?>
				</select>
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon">وضعیت: </span>
				<select class="form-control" name="status">
					<option <?php if($row_student["status"]==1) echo "selected"; ?> value="1">برحال</option>
					<option <?php if($row_student["status"]==0) echo "selected"; ?> value="0">غیربرحال</option>
				</select>
			</div>
			
			
			<input type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block" style="margin-top:40px;">
		
			</div>
		
		</form>
		
		
		
		<br>
		<br>

<?php require_once("footer.php"); ?>