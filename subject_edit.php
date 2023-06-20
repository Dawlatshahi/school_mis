<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 4, 9, 9, 9, 9, 9, 9, 9);
	$subject = mysqli_query($con, "SELECT * FROM subject WHERE subject_id =" . $_GET["subject_id"]);
	$row_subject = mysqli_fetch_assoc($subject);

	if(isset($_POST["subject_name"])) {
		$subject_name = $_POST["subject_name"];
	
		$result = mysqli_query($con, "UPDATE subject SET subject_name='$subject_name' WHERE subject_id= " . $_GET["subject_id"]);
		
		if($result) {
			header("location:subject_list.php?edit=done");
		}
		else {
			header("location:subject_edit.php?subject_id =" . $_GET["subject_id"] . "&error=notedit");
		}
	}
?>
<?php require_once("top.php"); ?>

<a href="subject_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
	برگشت
</a>

<h2>ویرایش مضمون</h2>

<br>

<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			نام مضمون:
		</span>
		<input value="<?php echo $row_subject["subject_name"]; ?>" type="text" name="subject_name" class="form-control">
	</div>
	
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary ">
	
</form>

<?php require_once("footer.php"); ?>