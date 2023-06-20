<?php 
	
	require_once("connection.php");
	checkLevel(1, 9, 9, 9, 4, 9, 9, 9, 9);
	$staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = " . $_GET["staff_id"]);
	$row_staff = mysqli_fetch_assoc($staff);
	
	if(isset($_POST["firstname"])) {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$fathername = $_POST["fathername"];
		$gender = $_POST["gender"];
		$birth_year = $_POST["birth_year"];
		$nic = $_POST["nic"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$province = $_POST["province"];
		$district = $_POST["district"];
		$village = $_POST["village"];
		$current_address = $_POST["current_address"];
		$position = $_POST["position"];
		$gross_salary = $_POST["gross_salary"];
		$status = $_POST["status"];
		
		if($_FILES["images"]["name"] != "") {
			$path = "images/employee/" .time() . $_FILES["images"]["name"];
			move_uploaded_file($_FILES["images"]["tmp_name"], $path);		
		}
		else {
			$path = $row_staff["photo"];
		}
		
		
		if(mysqli_query($con, "UPDATE staff SET firstname='$firstname',
		lastname='$lastname', fathername='$fathername', gender=$gender, birth_year=$birth_year, photo='$path', nic='$nic', 
		phone='$phone', email='$email', province='$province',
		district='$district', village='$village', current_address='$current_address',
		position='$position', gross_salary=$gross_salary, status=$status WHERE staff_id = " . $_GET["staff_id"])) {
			header("location:staff_detail.php?staff_id=" . $_GET["staff_id"] . "&edit=done");
		}
		else{
			header("location:staff_edit.php?staff_id=" . $_GET["staff_id"] . "&error=notedit");
		}
	}

?>
<?php require_once("top.php"); ?> 
<a href="staff_detail.php?staff_id=<?php echo $row_staff["staff_id"]; ?>" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
	<h2>ویرایش مشخصات کارمند</h2>
		
<?php if(isset($_GET["error"]))	{ ?>
	
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
				<span class="input-group-addon">
				نام:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["firstname"]; ?>" type="text" class="form-control" name="firstname">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				تخلص: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["lastname"]; ?>" type="texxt" class="form-control" name="lastname">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				نام پدر: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["fathername"]; ?>" type="text" class="form-control" name="fathername">
			</div>	
			
			<div class="input-group"> 
				<span class="input-group-addon"> جنسیت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;
					<label><input <?php if($row_staff["gender"]==0) echo "checked"; ?> type="radio" name="gender" value="0">
					مذکر </label>
					&nbsp;
					<label><input <?php if($row_staff["gender"]==1) echo "checked"; ?> type="radio" name="gender" value="1">
					مونث </label>
					&nbsp;
			</div>	
			
			<div class="input-group">
				<span class="input-group-addon">
				تاریخ تولد:&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["birth_year"]; ?>" type="text" class="form-control" name="birth_year">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نمبر تذکره:&nbsp;</span>
				<input value="<?php echo $row_staff["nic"]; ?>" type="text" class="form-control" name="nic">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">شماره تماس:</span>
				<input value="<?php echo $row_staff["phone"]; ?>" type="text" class="form-control" name="phone">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">ایمیل ادرس: </span>
				<input value="<?php echo $row_staff["email"]; ?>" type="email" class="form-control" name="email">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">وضعیت: </span>
				<select name="status" class="form-control">
					<option <?php if($row_staff["status"] == 1) echo "selected"; ?> value="1">برحال</option>
					<option <?php if($row_staff["status"] == 0) echo "selected"; ?> value="0">غیربرحال</option>
				</select>
			</div>
			
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">ولایت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["province"]; ?>" type="text" class="form-control" name="province">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">ولسوالی: &nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["district"]; ?>" type="text" class="form-control" name="district">
			</div>
			
			<div class="input-group">	
				<span class="input-group-addon">قریه: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["village"]; ?>" type="text" class="form-control" name="village">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> آدرس فعلی:</span>
				<input value="<?php echo $row_staff["current_address"]; ?>" type="text" class="form-control" name="current_address">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> وظیفه: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
				<input value="<?php echo $row_staff["position"]; ?>" type="text" class="form-control" name="position">
			</div>

			<div class="input-group">
				<span class="input-group-addon"> معاش: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input value="<?php echo $row_staff["gross_salary"]; ?>" type="text" class="form-control" name="gross_salary">
				<span class="input-group-addon">
					افغانی
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> عکس:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="file" class="form-control" name="images">
				<span class="input-group-addon" style="padding:2px;">
					<img src="<?php echo $row_staff["photo"]; ?>" width="25" height="25">
				</span>
			</div>
			
			
			<input style="margin-top:40px;" type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block">
		</div>	
		</form>
		<br>
		<br>
		<br>
		

<?php require_once("footer.php"); ?>