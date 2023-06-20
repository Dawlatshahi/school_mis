<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 4, 4, 9, 9, 9, 9, 9, 9 );

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	
	if(isset($_POST["document_name"])) { 
		$student_id = $_POST["student_id"];
		$document_name = $_POST["document_name"];
		$upload_date = $_POST["upload_date"];
		
		$path = "document/student/" . time() . $_FILES["document_file"]["name"];
		move_uploaded_file($_FILES["document_file"]["tmp_name"], $path);
		
		$result = mysqli_query($con, "INSERT INTO student_document VALUES (NULL, $student_id, '$document_name', '$path', '$upload_date')");
		
		if($result) {
			header("location:student_document.php?add=done");
		}
		else {
			header("location:student_document_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>
<a href="student_document.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>ثبت سند جدید</h2>

<br>


<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<form method="post" enctype="multipart/form-data">
	
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select name="student_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?> فرزند: <?php echo $row_student["fathername"]; ?></option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			عنوان سند: 
		</span>
		<input type="text" name="document_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			فایل سند: 
		</span>
		<input type="file" name="document_file" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ ثبت: 
		</span>
		<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="upload_date" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary btn-block">
	
</form>

</div>

<?php require_once("footer.php"); ?>