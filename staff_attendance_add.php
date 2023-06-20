<?php require_once("connection.php");
checkLevel(1, 9, 9, 9, 2, 9, 9, 9, 9); ?>
<?php
	$staff = mysqli_query($con, "SELECT staff_id, firstname, lastname FROM staff ORDER BY firstname ASC, lastname ASC");
	$row_staff = mysqli_fetch_assoc($staff);
	
	if(isset($_POST["absent_date"])) {
		$staff_id = $_POST["staff_id"];
		
		$parts = explode("-", $_POST["absent_date"]);
		$absent_year = $parts[0];
		$absent_month = $parts[1];
		$absent_day = $parts[2];
		
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "INSERT INTO staff_attendance VALUES ($staff_id, $absent_year, $absent_month, $absent_day, '$remark')");
		
		if($result) {
			header("location:staff_attendance.php?add=done");
		}
		else {
			header("location:staff_attendance_add.php?error=notadd");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="staff_attendance.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>

<h2>ثبت غیرحاضری کارمند</h2>

<br>
<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		برای کارمند موردنظردر این تاریخ غیرحاضری قبلا ثبت شده است!
	</div>
<?php } ?>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			کارمند:
		</span>
		<select name="staff_id" class="form-control">
			<?php do { ?>
			<option value="<?php echo $row_staff["staff_id"]; ?>"><?php echo $row_staff["firstname"]; ?> <?php echo $row_staff["lastname"]; ?></option>
			<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
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