<?php require_once("connection.php"); ?>
<?php
checkLevel(2, 9, 9, 9, 9, 9, 9, 9, 9 );
	$level = mysqli_query($con, "SELECT * FROM user_level WHERE staff_id = " . $_GET["staff_id"]);
	$row_level = mysqli_fetch_assoc($level);
	
	if(isset($_POST["level"])) { 
		$admin_level = $_POST["admin_level"];
		$academic_level = $_POST["academic_level"];
		$student_level = $_POST["student_level"];
		$teacher_level = $_POST["teacher_level"];
		$staff_level = $_POST["staff_level"];
		$finance_level = $_POST["finance_level"];
		$library_level = $_POST["library_level"];
		$stock_level = $_POST["stock_level"];
		$it_level = $_POST["it_level"];
		$staff_id = $_GET["staff_id"];
		
		$result = mysqli_query($con, "UPDATE user_level SET admin_level=$admin_level, acadmic_level=$academic_level, student_level=$student_level, teacher_level=$teacher_level, staff_level=$staff_level, finance_level=$finance_level, stock_level=$stock_level, library_level=$library_level, it_level=$it_level WHERE staff_id = " . $_GET["staff_id"]);
		if($result) {
			header("location:user_level.php?set=done");
		}
		else {
			header("location:user_level_edit.php?error=notset&staff_id=".$_GET["staff_id"]);
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>تعیین صلاحیت های کارمند</h2>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 pull-left" id="user_level">

<form method="post">
	
	<br>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش مدیریت:
		</span>
		<select name="admin_level" class="form-control">
			<option <?php if($row_level["admin_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["admin_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["admin_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["admin_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["admin_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش تدریسی:
		</span>
		<select name="academic_level" class="form-control">
			<option <?php if($row_level["acadmic_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["acadmic_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["acadmic_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["acadmic_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["acadmic_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش شاگردان:
		</span>
		<select name="student_level" class="form-control">
			<option <?php if($row_level["student_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["student_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["student_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["student_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["student_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش معلمین:
		</span>
		<select name="teacher_level" class="form-control">
			<option <?php if($row_level["teacher_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["teacher_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["teacher_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["teacher_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["teacher_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش کارمندان:
		</span>
		<select name="staff_level" class="form-control">
			<option <?php if($row_level["staff_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["staff_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["staff_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["staff_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["staff_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش مالی:
		</span>
		<select name="finance_level" class="form-control">
			<option <?php if($row_level["finance_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["finance_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["finance_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["finance_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["finance_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش کتابخانه:
		</span>
		<select name="library_level" class="form-control">
			<option <?php if($row_level["library_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["library_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["library_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["library_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["library_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش گدام:
		</span>
		<select name="stock_level" class="form-control">
			<option <?php if($row_level["stock_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["stock_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["stock_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["stock_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["stock_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			صلاحیت در بخش آی تی:
		</span>
		<select name="it_level" class="form-control">
			<option <?php if($row_level["it_level"]==0) echo "selected"; ?> value="0">فاقد صلاحیت</option>
			<option <?php if($row_level["it_level"]==1) echo "selected"; ?> value="1">مشاهده</option>
			<option <?php if($row_level["it_level"]==2) echo "selected"; ?> value="2">ایجاد</option>
			<option <?php if($row_level["it_level"]==4) echo "selected"; ?> value="4">ویرایش</option>
			<option <?php if($row_level["it_level"]==8) echo "selected"; ?> value="8">حذف</option>
		</select>
	</div>
	
	<input type="hidden" name="level" value="set">
	
	<input type="submit" value="تعیین نمودن" class="btn btn-primary btn-block">
	
</form>

<br>

</div>

<?php require_once("footer.php"); ?>