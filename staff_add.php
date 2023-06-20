<?php 
	
	require_once("connection.php");
	
	checkLevel(1, 9, 9, 9, 2, 9, 9, 9, 9);
	
	if(isset($_POST["firstname"])) {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$fathername = $_POST["fathername"];
		$gender = $_POST["gender"];
		$birth_year = $_POST["birth_year"];
		$nic = $_POST["nic"];
		$phone = $_POST["phone"];
		
		if($_POST["email"] == "") {
			$email = "NULL";
		}
		else {
			$email = "'" . $_POST["email"] . "'";
		}
		
		$province = $_POST["province"];
		$district = $_POST["district"];
		$village = $_POST["village"];
		$current_address = $_POST["current_address"];
		$position = $_POST["position"];
		$gross_salary = $_POST["gross_salary"];
		$status = 1;
		
		$path = "images/employee/" . time() . $_FILES["images"]["name"];
		move_uploaded_file($_FILES["images"]["tmp_name"], $path);
		
		if(mysqli_query($con, "INSERT INTO staff VALUES (NULL, '$firstname',
		'$lastname', '$fathername', $gender, $birth_year, '$path', '$nic', 
		'$phone', $email, '$province',
		'$district', '$village', '$current_address',
		'$position', $gross_salary, $status)")) {
			header("location:staff_list.php?add=done");
		}
		else{
			header("location:staff_add.php?error=notinsert");
		}
	}

?>
<?php require_once("top.php"); ?> 

	<a href="staff_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">	
		<span class="glyphicon glyphicon-list-alt"></span>
		مشاهده لیست کامندان
	</a>

	<h2>ثبت کارمند جدید</h2>

	
<?php if(isset($_GET["error"]))	{ ?>
	
	<div class="alert alert-danger alert-dismissable">	
		<button class="close" area-hidden="true" 
		data-dismiss="alert">&times;</button>
		عملیه ثبت انجام نشد! لطفا دوباره کوشش کنید.
	</div>

<?php } ?>
	
		<br>
		
		<form method="post" enctype="multipart/form-data">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">
				نام:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="firstname">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				تخلص: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="texxt" class="form-control" name="lastname">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				نام پدر: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="fathername">
			</div>	
			
			<div class="input-group"> 
				<span class="input-group-addon"> جنسیت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;
					<label><input type="radio" checked name="gender" value="0">
					مرد </label>
					&nbsp;
					<label><input type="radio" name="gender" value="1">
					زن </label>
					&nbsp;
			</div>	
			
			<div class="input-group">
				<span class="input-group-addon">
				تاریخ تولد:&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="birth_year">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نمبر تذکره:&nbsp;</span>
				<input required type="text" class="form-control" name="nic">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">شماره تماس:</span>
				<input required pattern="^07[02456789][0-9]{7}$" type="text" class="form-control" name="phone" placeholder="07X-XXXXXXX">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">ایمیل ادرس: </span>
				<input pattern="^[A-z0-9_.]{3,60}@[A-z0-9]{3,60}.[A-z]{2,5}$" type="email" class="form-control" name="email" placeholder="Example@example.com">
			</div>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">ولایت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="province">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">ولسوالی: &nbsp;&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="district">
			</div>
			
			<div class="input-group">	
				<span class="input-group-addon">قریه: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="village">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> آدرس فعلی:</span>
				<input required type="text" class="form-control" name="current_address">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> وظیفه: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
				<input required type="text" class="form-control" name="position">
			</div>

			<div class="input-group">
				<span class="input-group-addon"> معاش: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="text" class="form-control" name="gross_salary">
				<span class="input-group-addon">
					افغانی
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> عکس:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input required type="file" class="form-control" name="images">
			</div>
			
			<input type="submit" value="ثبت کارمند" class="btn btn-primary btn-block">
		</div>	
		</form>
		<br>
		<br>
		<br>
		

<?php require_once("footer.php"); ?>