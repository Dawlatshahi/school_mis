<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 2, 9, 9, 9, 9, 9, 9 );

	if(isset($_POST["relative_name"])) {
		$name = $_POST["relative_name"];
		$phone = $_POST["relative_phone"];
		$relation = $_POST["relative_relation"];
		$student_id = $_GET["student_id"];
		
		$result = mysqli_query($con, "INSERT INTO student_relative VALUES (NULL, $student_id, '$name', '$phone', '$relation')");
		
		if($result) {
			header("location:student_relative_detail.php?add=done&student_id=" . $_GET["student_id"]);
		}
		else {
			header("location:student_relative_add.php?error=notadd&student_id=" . $_GET["student_id"]);
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ثبت اقارب شاگرد</h2>

<br>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			نام:
		</span>
		<input type="text" name="relative_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تلفن:
		</span>
		<input type="text" name="relative_phone" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نسبت:
		</span>
		<input type="text" name="relative_relation" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>