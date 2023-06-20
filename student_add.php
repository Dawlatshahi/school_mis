<?php

	require_once("connection.php");	
checkLevel(2, 9, 2, 9, 9, 9, 9, 9, 9);
	$section = mysqli_query($con, "SELECT * FROM class_section ORDER BY class_id ASC, section_id ASC");
	$row_section = mysqli_fetch_assoc($section);
	
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
		$status = 1;
		$section_id = $_POST["section_id"];
		
		$path = "images/student/" . time() . $_FILES["photo"]["name"];
		move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
		
		if(mysqli_query($con, "INSERT INTO student VALUES (NULL, '$reg_no', '$firstname', '$fathername', 
		'$grandfathername', $gender, $birth_year, '$province', '$district', 
		'$village', '$current_address', '$nic', '$phone', '$path',
		$status, $section_id)")) {
			header("location:student_list.php?add=done");
		}
		else{
			header("location:student_add.php?error=notinsert");
		}
	}

?>

<?php require_once("top.php"); ?>
		
		<a href="student_list.php" class="btn btn-primary pull-left" style="marging-left:20px;">
			<span class="glyphicon glyphicon-list-alt"></span>
			مشاهده لیست شاگردان
		</a>
		
		<h2>ثبت شاگرد جدید</h2>
	<?php if(isset($_GET["error"])) { ?>
	
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
				<span class="input-group-addon">نوعیت: &nbsp;&nbsp;&nbsp;</span>
				<select class="form-control" id="student_type">
					<option value="1">رسمی</option>
					<option value="0">غیررسمی</option>
				</select>
			</div>
	
			<div class="input-group" id="reg_no">
				<span class="input-group-addon">نمبر اساس: &nbsp;&nbsp;&nbsp;</span>
				<input type="text" class="form-control" name="reg_no">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نام دانش آموز:</span>
				<input type="text" class="form-control" name="firstname">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نام پدر: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" class="form-control" name="fathername">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نام پدر کلان:&nbsp;&nbsp;</span>
				<input type="text" class="form-control" name="grandfathername">
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon"> جنسیت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;
					<label><input checked type="radio" name="gender" value="0">
					پسر </label>
					&nbsp;
					<label><input type="radio" name="gender" value="1">
					دختر</label>
					&nbsp;
			</div>	
			
			<div class="input-group">
				<span class="input-group-addon">تاریخ تولد:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" placeholder="سال تولد شمسی وارد کنید" class="form-control" name="birth_year">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">ولایت:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" class="form-control" name="province" >
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"> ولسوالی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" name="district" class="form-control">
			</div>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			
			
			<div class="input-group">
				<span class="input-group-addon">قریه:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" name="village" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">آدرس فعلی:&nbsp;&nbsp;</span>
				<input type="text" class="form-control" name="current_address">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">نمبر تذکره:&nbsp;&nbsp;&nbsp;</span>
				<input type="text" class="form-control" name="nic">
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon">شماره تماس:&nbsp;</span>
				<input required pattern="^07[02456789][0-9]{7}$" type="text" class="form-control" name="phone" placeholder="07X-XXXXXXX">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">عکس:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="file" class="form-control" name="photo">
			</div>
			
			<div class="input-group"> 
				<span class="input-group-addon">صنف: </span>
				<select class="form-control" name="section_id">
					<?php do { ?>
						<option value="<?php echo $row_section["section_id"]; ?>"><?php echo $row_section["section_name"]; ?></option>
					<?php } while($row_section = mysqli_fetch_assoc($section)); ?>
				</select>
			</div>
			
			<input type="submit" value="ثبت شاگرد" class="btn btn-primary btn-block" style="margin-top:40px;">
		
			</div>
		
		</form>
		
		
		
		<br>
		<br>

<?php require_once("footer.php"); ?>