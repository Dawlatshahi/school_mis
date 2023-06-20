<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 4, 9, 9, 9, 9, 9);
	$teacher = mysqli_query($con, "SELECT teacher_id, firstname, lastname FROM teacher ORDER BY firstname ASC, lastname ASC");
	$row_teacher = mysqli_fetch_assoc($teacher);
	
	if(isset($_POST["absent_date"])) {
		$teacher_id = $_POST["teacher_id"];
		
		$parts = explode("-", $_POST["absent_date"]);
		$absent_year = $parts[0];
		$absent_month = $parts[1];
		$absent_day = $parts[2];
		
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "INSERT INTO teacher_attendance VALUES ($teacher_id, $absent_year, $absent_month, $absent_day, '$remark')");
		
		if($result) {
			header("location:teacher_attendance.php?add=done");
		}
		else {
			header("location:teacher_attendance_add.php?error=notadd");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="teacher_attendance.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>ثبت غیرحاضری معلم</h2>

<br>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-info alert-dismissable">
		برای معلم مورد نظر در این تاریخ قبلا غیرحاضری ثبت شده است!
	</div>
<?php } ?>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			معلم:
		</span>
		<select name="teacher_id" class="form-control">
			<?php do { ?>
			<option value="<?php echo $row_teacher["teacher_id"]; ?>"><?php echo $row_teacher["firstname"]; ?> <?php echo $row_teacher["lastname"]; ?></option>
			<?php } while($row_teacher = mysqli_fetch_assoc($teacher)); ?>
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
			توضیح:
		</span>
		<input type="text" name="remark" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>