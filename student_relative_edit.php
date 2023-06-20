<?php require_once("connection.php"); ?>

<?php
		checkLevel(1, 9, 4, 9, 9, 9, 9, 9, 9 );

	$student = mysqli_query($con, "SELECT * FROM student_relative WHERE relative_id = " . $_GET["relative_id"]);
	$row_student = mysqli_fetch_assoc($student);	
	
	if(isset($_POST["relative_name"])) {
		$relative_name = $_POST["relative_name"];
		$relative_phone = $_POST["relative_phone"];
		$relative_relation = $_POST["relative_relation"];
		$relative_id = $_GET["relative_id"];
		
		$result = mysqli_query($con, "UPDATE student_relative SET relative_name='$relative_name', relative_phone='$relative_phone', relative_relation='$relative_relation' WHERE relative_id=$relative_id");
		
		if($result) {
			header("location:student_relative_detail.php?edit=done&student_id=" . $row_student["student_id"]);
		}
		else {
			header("location:student_relative_edit.php?error=notedit&relative_id=" . $_GET["relative_id"]);
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ویرایش اقارب</h2>

<br>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			نام:
		</span>
		<input value="<?php echo $row_student["relative_name"]; ?>" type="text" name="relative_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تلفن:
		</span>
		<input value="<?php echo $row_student["relative_phone"]; ?>" type="text" name="relative_phone" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نسبت:
		</span>
		<input value="<?php echo $row_student["relative_relation"]; ?>" type="text" name="relative_relation" class="form-control">
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>