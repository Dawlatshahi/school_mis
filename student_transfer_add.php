<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 2, 9, 9, 9, 9, 9, 9 );

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["transfer_date"])) {
		$student_id = $_POST["student_id"];
		$transfer_date = $_POST["transfer_date"];
		$transfer_no = $_POST["transfer_no"];
		$confirm_no = $_POST["confirm_no"];
		$follow_no = $_POST["follow_no"];
		$school_name = $_POST["school_name"];
		$transfer_type = $_POST["transfer_type"];
		
		$result = mysqli_query($con, "INSERT INTO student_transfer VALUES (NULL, $student_id, '$transfer_date', '$transfer_no', '$confirm_no',  '$school_name', $transfer_type, '$follow_no')");
		
		if($result) {
			header("location:student_transfer.php?add=done");
		}
		else {
			header("location:student_transfer_add.php?error=notadd");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="student_transfer.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>ثبت سه پارچه جدید</h2>

<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
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
		<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="transfer_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمبر مکتوب:
		</span>
		<input type="text" name="transfer_no" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمبر مکتوب اطمینانیه:
		</span>
		<input type="text" name="confirm_no" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمبر مکتوب تعقیبیه:
		</span>
		<input type="text" name="follow_no" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نام مکتب:
		</span>
		<input type="text" name="school_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			سه پارچه:
		</span>
		<select name="transfer_type" class="form-control">
			<option value="0">ارسال شده</option>
			<option value="1">دریافت شده</option>
		</select>
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary ">
	
</form>
</div>
<?php require_once("footer.php"); ?>