<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 4, 9, 9, 9, 9, 9, 9);

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	$student_id = $_GET["student_id"];
	
	$absent_date = $_GET["absent_date"];
	
	$year = explode("-", $absent_date)[0];
	$month = explode("-", $absent_date)[1];
	
	$attendance = mysqli_query($con, "SELECT * FROM student_attendance WHERE student_id=$student_id AND absent_date='$absent_date' ");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	if(isset($_POST["absent_date"])) {
		$student_id = $_POST["student_id"];
		$absent_date = $_POST["absent_date"];		
		$absent_type = $_POST["absent_type"];
		
		$result = mysqli_query($con, "UPDATE student_attendance SET absent_date='$absent_date', absent_type=$absent_type WHERE student_id=$student_id AND absent_date='" . $row_attendance["absent_date"]. "' ");
		
		if($result) {
			header("location:student_attendance_detail.php?edit=done&student_id=$student_id&absent_year=$year&absent_month=$month");
		}
		else {
			header("location:student_attendance_edit.php?error=notedit&student_id=$student_id&absent_date=$absent_date");
		}
	}
?>
<?php require_once("top.php"); ?>
	
<h2>ویرایش غیرحاضری شاگرد</h2>

<br>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select disabled class="form-control">
			<?php do { ?>
			<option <?php if($row_student["student_id"] == $row_attendance["student_id"]) echo "selected"; ?> value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?> فرزند: <?php echo $row_student["fathername"]; ?></option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
		
		<input type="hidden" name="student_id" value="<?php echo $_GET["student_id"]; ?>">
		
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ:
		</span>
		<input value="<?php echo $row_attendance["absent_date"]; ?>" type="text" name="absent_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			علت:
		</span>
		<select name="absent_type" class="form-control">
			<option <?php if($row_attendance["absent_type"]==1) echo "selected"; ?> value="1">مریض</option>
			<option <?php if($row_attendance["absent_type"]==2) echo "selected"; ?> value="2">رخصت</option>
			<option <?php if($row_attendance["absent_type"]==3) echo "selected"; ?> value="3">غیرحاضر</option>
		</select>
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>