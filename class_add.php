<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 9, 9, 9, 9, 9, 9, 9);

	if(isset($_POST["class_name"])) {
		$class_name = $_POST["class_name"];
		$fees = $_POST["fees"];
	
		$result = mysqli_query($con, "INSERT INTO classes VALUES (NULL, '$class_name', $fees)");
		
		if($result) {
			header("location:class_list.php?add=done");
		}
		else {
			header("location:class_add.php?error=notadd");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="class_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
</a>

<h2>ثبت صنف جدید</h2>
<br>

<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			نام صنف:
		</span>
		<input type="text" name="class_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			فیس:
		</span>
		<input type="text" name="fees" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary ">
	
</form>

<?php require_once("footer.php"); ?>