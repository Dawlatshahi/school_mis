<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 4, 4, 9, 9, 9, 9, 9, 9 );

	$transfer = mysqli_query($con, "SELECT * FROM student_transfer WHERE transfer_id = " . $_GET["transfer_id"]);
	$row_transfer = mysqli_fetch_assoc($transfer);
	
	if(isset($_POST["transfer_date"])) {
		$transfer_id = $_GET["transfer_id"];
		$transfer_date = $_POST["transfer_date"];
		$transfer_no = $_POST["transfer_no"];
		$confirm_no = $_POST["confirm_no"];
		$follow_no = $_POST["follow_no"];
		$school_name = $_POST["school_name"];
		$transfer_type = $_POST["transfer_type"];
		
		$result = mysqli_query($con, "UPDATE student_transfer SET transfer_date='$transfer_date', transfer_no='$transfer_no', confirm_no='$confirm_no', follow_no='$follow_no', school_name='$school_name', transfer_type=$transfer_type WHERE transfer_id = " . $_GET["transfer_id"]);
		
		if($result) {
			header("location:student_transfer.php?edit=done");
		}
		else {
			header("location:student_transfer_edit.php?error=notedit&transfer_id=" . $_GET["transfer_id"]);
		}
	}
?>
<?php require_once("top.php"); ?>
<a href="student_transfer.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>ویرایش سه پارچه</h2>

<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ:
		</span>
		<input value="<?php echo $row_transfer["transfer_date"]; ?>" type="text" name="transfer_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمبر مکتوب:
		</span>
		<input value="<?php echo $row_transfer["transfer_no"]; ?>" type="text" name="transfer_no" class="form-control" placeholder="0000-00-00">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمبر مکتوب اطمینانیه:
		</span>
		<input value="<?php echo $row_transfer["confirm_no"]; ?>" type="text" name="confirm_no" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمبر مکتوب تعقیبیه:
		</span>
		<input value="<?php echo $row_transfer["follow_no"]; ?>" type="text" name="follow_no" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نام مکتب:
		</span>
		<input value="<?php echo $row_transfer["school_name"]; ?>" type="text" name="school_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			سه پارچه:
		</span>
		<select name="transfer_type" class="form-control">
			<option <?php if($row_transfer["transfer_type"]==0) echo "selected"; ?> value="0">ارسال شده</option>
			<option <?php if($row_transfer["transfer_type"]==1) echo "selected"; ?> value="1">دریافت شده</option>
		</select>
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary ">
	
</form>
</div>
<?php require_once("footer.php"); ?>