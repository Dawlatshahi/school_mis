<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 9, 9, 9, 9, 9, 9, 9);
	if(isset($_POST["subject_name"])) {
		$subject_name = $_POST["subject_name"];
		$class_id = $_GET["class_id"];
		
		$result = mysqli_query($con, "INSERT INTO subject VALUES (NULL, '$subject_name', $class_id)");
		
		if($result) {
			header("location:subject_list.php?add=done&class_id=$class_id");
		}
		else {
			header("location:subject_add.php?error=notadd&class_id=$class_id");
		}
	}
?>
<?php require_once("top.php"); ?>
 
<a href="subject_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
	برگشت
</a>
 
<h2>ثبت مضمون جدید</h2>

<br>

<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			نام مضمون:
		</span>
		<input type="text" name="subject_name" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary ">
	
</form>

<?php require_once("footer.php"); ?>