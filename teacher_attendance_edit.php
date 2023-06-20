<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 4, 9, 9, 9, 9, 9);
	$teacher = mysqli_query($con, "SELECT teacher_id, firstname, lastname FROM teacher ORDER BY firstname ASC, lastname ASC");
	$row_teacher = mysqli_fetch_assoc($teacher);
	
	$teacher_id = $_GET["teacher_id"];
	$year = $_GET["absent_year"];
	$month = $_GET["absent_month"];
	$day = $_GET["absent_day"];
	
	$attendance = mysqli_query($con, "SELECT * FROM teacher_attendance WHERE teacher_id=$teacher_id AND absent_year=$year AND absent_month=$month AND absent_day=$day");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	if(isset($_POST["absent_date"])) {
		$teacher_id = $_POST["teacher_id"];
		
		$parts = explode("-", $_POST["absent_date"]);
		$absent_year = $parts[0];
		$absent_month = $parts[1];
		$absent_day = $parts[2];
		
		$teacher_id = $_POST["teacher_id"];
		
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "UPDATE teacher_attendance SET absent_year=$absent_year, absent_month=$absent_month, absent_day=$absent_day, remark='$remark' WHERE teacher_id=$teacher_id AND absent_year=$year AND absent_month=$month AND absent_day=$day");
		
		if($result) {
			header("location:teacher_attendance_detail.php?edit=done&teacher_id=$teacher_id&absent_year=$year&absent_month=$month");
		}
		else {
			header("location:teacher_attendance_edit.php?error=notedit&teacher_id=$teacher_id&absent_year=$year&absent_month=$month&absent_day=$day");
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ویرایش غیرحاضری معلم</h2>

<br>

	<?php if(isset($_GET["error"])) { ?>
		<div class="alert alert-danger">
			استاد انتخاب شده در تاریخ مورد نظر غیرحاضر شده است!
		</div>
	<?php } ?>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			معلم:
		</span>
		<select disabled class="form-control">
			<?php do { ?>
			<option <?php if($row_teacher["teacher_id"] == $row_attendance["teacher_id"]) echo "selected"; ?> value="<?php echo $row_teacher["teacher_id"]; ?>"><?php echo $row_teacher["firstname"]; ?> <?php echo $row_teacher["lastname"]; ?></option>
			<?php } while($row_teacher = mysqli_fetch_assoc($teacher)); ?>
		</select>
		
		<input type="hidden" name="teacher_id" value="<?php echo $_GET["teacher_id"]; ?>">
		
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ:
		</span>
		<input value="<?php echo $row_attendance["absent_year"]; ?>-<?php echo $row_attendance["absent_month"]; ?>-<?php echo $row_attendance["absent_day"]; ?>" type="text" name="absent_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			توضیح:
		</span>
		<input value="<?php echo $row_attendance["remark"]; ?>" type="text" name="remark" class="form-control">
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>