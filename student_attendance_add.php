<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 2, 9, 9, 9, 9, 9, 9);
	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["absent_date"])) {
		$student_id = $_POST["student_id"];
		$absent_date = $_POST["absent_date"];
		$absent_type = $_POST["absent_type"];
		
		$result = mysqli_query($con, "INSERT INTO student_attendance VALUES ($student_id, '$absent_date', $absent_type)");
		
		if($result) {
			header("location:student_attendance.php?add=done");
		}
		else {
			header("location:student_attendance_add.php?error=notadd");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="student_attendance.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>ثبت غیرحاضری شاگرد</h2>

<br>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-info alert-dismissable">
		برای شاگرد مورد دراین تاریخ قبلا غیرحاضری ثبت شده است.
	</div>
<?php } ?>


<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select name="student_id" class="form-control">
			<?php do { ?>
			<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?></option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ:
		</span>
		<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="absent_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			علت غیرحاضری:
		</span>
		<select name="absent_type" class="form-control">
			<option value="1">مریض</option>
			<option value="2">رخصت</option>
			<option value="3">غیرحاضر</option>
		</select>
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>