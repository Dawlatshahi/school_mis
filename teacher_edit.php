<?php
	require_once("connection.php");
	checkLevel(1, 9, 9, 4, 9, 9, 9, 9, 9);
	
	$teacher = mysqli_query($con, "SELECT * FROM teacher WHERE teacher_id = " . $_GET["teacher_id"]);
	$row_teacher = mysqli_fetch_assoc($teacher);
	
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
		$education_degree = $_POST["education_degree"];
		$education_field = $_POST["education_field"];
		$education_university = $_POST["education_university"];
		$graduation_year = $_POST["graduation_year"];
		$talent_score = $_POST["talent_score"];
		$gross_salary = $_POST["gross_salary"];
		$hod_bonus = $_POST["hod_bonus"];
		$talent_bonus = $_POST["talent_bonus"];
		$academic_bonus = $_POST["academic_bonus"];
		$food_charge = $_POST["food_charge"];
		$status = $_POST["status"];
		
		
		if($_FILES["images"]["name"] != "") {
			$path = "images/teacher/" . time() . $_FILES["images"]["name"];
			move_uploaded_file($_FILES["images"]["tmp_name"], $path);
			
		}
		else {
			$path = $row_teacher["photo"];
		}	

		
		if(mysqli_query($con, "UPDATE teacher SET firstname='$firstname',
		lastname='$lastname', fathername='$fathername', gender=$gender, birth_year=$birth_year, photo='$path', nic='$nic', 
		phone='$phone', email='$email', province='$province',
		district='$district', village='$village', current_address='$current_address', education_degree='$education_degree',
		education_field='$education_field', education_university='$education_university', graduation_year=$graduation_year ,
		talent_score=$talent_score, gross_salary=$gross_salary, hod_bonus=$hod_bonus, talent_bonus=$talent_bonus, academic_bonus=$academic_bonus, 
		food_charge=$food_charge, status=$status WHERE teacher_id = " . $_GET["teacher_id"])) {
			header("location:teacher_detail.php?teacher_id=" . $_GET["teacher_id"] . "&edit=done");
		}
		else{
			header("location:teacher_edit.php?teacher_id=" . $_GET["teacher_id"] . "&error=notedit");
		}
		
	}
	
	
?>

<?php require_once("top.php"); ?>

	<a href="teacher_detail.php?teacher_id=<?php echo $row_teacher["teacher_id"]; ?>" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>

	<h2>ویرایش مشخصات معلم</h2>
	
<?php if(isset($_GET["error"])) { ?>
	
	<div class="alert alert-danger alert-dismissable">
	<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	عملیه ویرایش انجام نشد! لطفا دوباره کوشش کنید.
	</div>
	
<?php } ?>
	
		<br>
	
	<form method="post" enctype="multipart/form-data">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		 <div class="input-group">
			<span  class="input-group-addon">نام استاد: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["firstname"]; ?>" type="text" class="form-control" name="firstname">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">تخلص:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["lastname"]; ?>" type="text" class="form-control" name="lastname">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">نام پدر:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["fathername"]; ?>" type="text" class="form-control" name="fathername">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">جنسیت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;
			<label><input checked type="radio" name="gender" value="0"> مذکر </label> &nbsp;
			<label><input type="radio" name="gender" value="1"> مونث </label>&nbsp;
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">تاریخ تولد: &nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["birth_year"]; ?>" type="text" name="birth_year" class="form-control">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">نمبر تذکره: &nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["nic"]; ?>" type="text" class="form-control" name="nic">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">شماره تماس: &nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["phone"]; ?>" required pattern="^07[02456789][0-9]{7}$" type="text" class="form-control" name="phone">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">ایمیل آدرس: &nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["email"]; ?>" pattern="^[A-z0-9_.]{3,60}@[A-z0-9]{3,60}.[A-z]{2,5}$" type="email" class="form-control" name="email">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon"> ولایت:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["province"]; ?>" type="text" class="form-control" name="province">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">ولسوالی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["district"]; ?>" type="text" class="form-control" name="district">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">قریه:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["village"]; ?>" type="text" class="form-control" name="village">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">آدرس فعلی:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["current_address"]; ?>" type="text" class="form-control" name="current_address">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">وضعیت :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<select name="status" class="form-control">
				<option <?php if($row_teacher["status"]==1) echo "selected"; ?> value="1">برحال</option>
				<option <?php if($row_teacher["status"]==0) echo "selected"; ?> value="0">غیر برحال</option>
			</select>
		 </div>
		 
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		 <div class="input-group">
			<span class="input-group-addon">سند تحصیلی:&nbsp;&nbsp;&nbsp;</span>
			<select name="education_degree" class="form-control">
				<option>دوازده پاس</option>
				<option>چهارده پاس</option>
				<option>لسانس</option>
				<option>ماستر</option>
				<option>دوکتور</option>
			</select>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">رشته تحصیلی:&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["education_field"]; ?>" type="text" class="form-control" name="education_field">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">دانشگاه:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["education_university"]; ?>" type="text" class="form-control" name="education_university">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">سال فراغت:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["graduation_year"]; ?>" type="text" class="form-control" name="graduation_year">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">نمره کدری:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["talent_score"]; ?>" type="text" class="form-control" name="talent_score">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">معاش:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["gross_salary"]; ?>" type="text" class="form-control" name="gross_salary">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">ريیس دیپارتمنت:</span>
			<input value="<?php echo $row_teacher["hod_bonus"]; ?>" type="text" class="form-control" name="hod_bonus">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">امتیازتحصیلی:&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["talent_bonus"]; ?>" type="text" class="form-control" name="talent_bonus">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">امتیاز اکادمی:&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["academic_bonus"]; ?>" type="text" class="form-control" name="academic_bonus">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">پول غذا:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input value="<?php echo $row_teacher["food_charge"]; ?>" type="text" class="form-control" name="food_charge">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">عکس:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="file" class="form-control" name="images">
			<span class="input-group-addon" style="padding:0;">
				<img src="<?php echo $row_teacher["photo"]; ?>" width="24">
			</span>
		 </div>
		 
		 
			<input type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block">
	</div>
	</form>
	
	<div class="clearfix"></div>
	
	<br>
	<br>
	

<?php require_once("footer.php"); ?>