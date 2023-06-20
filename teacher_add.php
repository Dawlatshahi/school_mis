<?php
	require_once("connection.php");
	checkLevel(2, 9, 9, 2, 9, 9, 9, 9, 9);
	
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
		$status = 1;
		
		$path = "images/teacher/" . time() . $_FILES["images"]["name"];
		move_uploaded_file($_FILES["images"]["tmp_name"], $path);
		
		if(mysqli_query($con, "INSERT INTO teacher VALUES (NULL, '$firstname',
		'$lastname', '$fathername', $gender, $birth_year, '$path', '$nic', 
		'$phone', '$email', '$province',
		'$district', '$village', '$current_address', '$education_degree',
		'$education_field', '$education_university', $graduation_year ,
		$talent_score, $gross_salary, $hod_bonus, $talent_bonus, $academic_bonus, 
		$food_charge, $status)")) {
			header("location:teacher_list.php?add=done");
		}
		else{
			header("location:teacher_add.php?error=notinsert");
		}
		
	}
	
	
?>

<?php require_once("top.php"); ?>

	<a href="teacher_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-list-alt"></span>
		مشاهده لیست معلمین
	</a>

	<h2>ثبت معلم جدید</h2>
	
<?php if(isset($_GET["error"])) { ?>
	
	<div class="alert alert-danger alert-dismissable">
	<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	عملیه ثبت انجام نشد! لطفا دوباره کوشش کنید.
	</div>
	
<?php } ?>
	
		<br>
	
	<form method="post" enctype="multipart/form-data">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		 <div class="input-group">
			<span class="input-group-addon">نام معلم: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="firstname">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">تخلص:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="lastname">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">نام پدر:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="fathername">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">جنسیت: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;
			<label><input checked type="radio" name="gender" value="0"> مرد </label> &nbsp;
			<label><input type="radio" name="gender" value="1"> زن </label>&nbsp;
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon"> تاریخ تولد: &nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" name="birth_year" class="form-control">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">نمبر تذکره: &nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="nic">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">شماره تماس: &nbsp;&nbsp;</span>
			<input required pattern="^07[02456789][0-9]{7}$" type="text" class="form-control" name="phone" placeholder="07X-XXXXXXX">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">ایمیل آدرس: &nbsp;&nbsp;&nbsp;</span>
			<input pattern="^[A-z0-9_.]{3,60}@[A-z0-9]{3,60}.[A-z]{2,5}$" type="email" class="form-control" name="email" placeholder="Example@example.com">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon"> ولایت:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="province">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">ولسوالی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="district">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">قریه:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="village">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">آدرس فعلی:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="current_address">
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
			<input type="text" class="form-control" name="education_field" >
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">دانشگاه:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="education_university">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">سال فراغت:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="graduation_year">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">نمره کدری:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" id="talent_score" name="talent_score">
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">معاش:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="gross_salary">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">ريیس دیپارتمنت:</span>
			<input type="text" class="form-control" name="hod_bonus">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">امتیاز کادری:&nbsp;&nbsp;</span>
			<input type="text" class="form-control" id="talent_bonus" name="talent_bonus">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">امتیاز تحصیلی:&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="academic_bonus">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">پول غذا:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="text" class="form-control" name="food_charge">
			<span class="input-group-addon">
				افغانی
			</span>
		 </div>
		 
		 <div class="input-group">
			<span class="input-group-addon">عکس:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="file" class="form-control" name="images">
		 </div>
		 
		 
			<input type="submit" value="ثبت استاد" class="btn btn-primary btn-block">
	</div>
	</form>
	
	<div class="clearfix"></div>
	
	<br>
	<br>
	

<?php require_once("footer.php"); ?>