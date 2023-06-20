<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 4, 9, 9, 9, 9); 
	$staff = mysqli_query($con, "SELECT staff_id, firstname, lastname FROM staff ORDER BY firstname ASC, lastname ASC");
	$row_staff = mysqli_fetch_assoc($staff);
	
	$staff_id = $_GET["staff_id"];
	$year = $_GET["absent_year"];
	$month = $_GET["absent_month"];
	$day = $_GET["absent_day"];
	
	$attendance = mysqli_query($con, "SELECT * FROM staff_attendance WHERE staff_id=$staff_id AND absent_year=$year AND absent_month=$month AND absent_day=$day");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	if(isset($_POST["absent_date"])) {
		$staff_id = $_POST["staff_id"];
		
		$parts = explode("-", $_POST["absent_date"]);
		$absent_year = $parts[0];
		$absent_month = $parts[1];
		$absent_day = $parts[2];
		
		$staff_id = $_POST["staff_id"];
		
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "UPDATE staff_attendance SET absent_year=$absent_year, absent_month=$absent_month, absent_day=$absent_day, remark='$remark' WHERE staff_id=$staff_id AND absent_year=$year AND absent_month=$month AND absent_day=$day");
		
		if($result) {
			header("location:staff_attendance_detail.php?edit=done&staff_id=$staff_id&absent_year=$year&absent_month=$month");
		}
		else {
			header("location:staff_attendance_edit.php?error=notedit&staff_id=$staff_id&absent_year=$year&absent_month=$month&absent_day=$day");
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ویرایش غیرحاضری کارمند</h2>

<br>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			کارمند:
		</span>
		<select disabled class="form-control">
			<?php do { ?>
			<option <?php if($row_staff["staff_id"] == $row_attendance["staff_id"]) echo "selected"; ?> value="<?php echo $row_staff["staff_id"]; ?>"><?php echo $row_staff["firstname"]; ?> <?php echo $row_staff["lastname"]; ?></option>
			<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
		</select>
		
		<input type="hidden" name="staff_id" value="<?php echo $_GET["staff_id"]; ?>">
		
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