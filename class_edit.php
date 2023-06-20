<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 4, 9, 9, 9, 9, 9, 9, 9);
	$class = mysqli_query($con, "SELECT * FROM classes WHERE class_id=" . $_GET["class_id"]);
	$row_class = mysqli_fetch_assoc($class);

	
	
	if(isset($_POST["class_name"])) {
		$class_name = $_POST["class_name"];
		$fees = $_POST["fees"];
	
		$result = mysqli_query($con, "UPDATE classes SET class_name='$class_name', fees='$fees' WHERE class_id=".$_GET["class_id"]);
		
		
		
		if($result) {
			header("location:class_list.php?edit=done");
		}
		else {
			header("location:class_edit.php?class_id=" . $_GET["class_id"] . "&error=notedit");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="class_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
	برگشت
</a>

<h2>ویرایش صنف</h2>

<br>

<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			نام صنف:
		</span>
		<input value="<?php echo $row_class["class_name"]; ?>" type="text" name="class_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			فیس:
		</span>
		<input value="<?php echo $row_class["fees"]; ?> " type="text" name="fees" class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary ">
	
</form>

<?php require_once("footer.php"); ?>