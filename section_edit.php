<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 4, 9, 9, 9, 9, 9, 9, 9);
	$section = mysqli_query($con, "SELECT * FROM class_section WHERE section_id =" . $_GET["section_id"]);
	$row_section = mysqli_fetch_assoc($section);

	if(isset($_POST["section_name"])) {
		$section_name = $_POST["section_name"];
		$class_id = $row_section["class_id"];
	
		$result = mysqli_query($con, "UPDATE class_section SET section_name='$section_name' WHERE section_id = " . $_GET["section_id"]);
		
		if($result) {
			header("location:class_section.php?edit=done&class_id=$class_id");
		}
		else {
			header("location:section_edit.php?error=notedit&section_id=" . $_GET["section_id"]);
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ویرایش شناسه صنف</h2>

<br>

<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			نام شناسه صنف:
		</span>
		<input type="text" value="<?php echo $row_section["section_name"]; ?>" name="section_name" class="form-control">
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary ">
	
</form>

<?php require_once("footer.php"); ?>