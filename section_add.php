<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 2, 9, 9, 9, 9, 9, 9);
	$class = mysqli_query($con, "SELECT * FROM classes WHERE class_id =" . $_GET["class_id"]);
	$row_class = mysqli_fetch_assoc($class);

	if(isset($_POST["section_name"])) {
		$section_name = $_POST["section_name"];
		$class_id = $_GET["class_id"];
	
		$result = mysqli_query($con, "INSERT INTO class_section VALUES (NULL, '$section_name', $class_id)");
		
		if($result) {
			header("location:class_section.php?add=done&class_id=" . $_GET["class_id"]);
		}
		else {
			header("location:section_add.php?error=notadd&class_id=" . $_GET["class_id"]);
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ثبت شناسه جدید</h2>

<br>

<form method="post">
	
	<div class="input-group">
		<span class="input-group-addon">
			نام شناسه صنف:
		</span>
		<input type="text" name="section_name" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary ">
	
</form>

<?php require_once("footer.php"); ?>