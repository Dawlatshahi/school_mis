<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 2, 9, 9, 9, 9, 9);
	$teacher = mysqli_query($con, "SELECT teacher_id, firstname, lastname FROM teacher ORDER BY firstname ASC, lastname ASC");
	$row_teacher = mysqli_fetch_assoc($teacher);
	
	
	if(isset($_POST["document_name"])) { 
		$teacher_id = $_POST["teacher_id"];
		$document_name = $_POST["document_name"];
		$upload_date = $_POST["upload_date"];
		
		$path = "document/teacher/" . time() . $_FILES["document_file"]["name"];
		move_uploaded_file($_FILES["document_file"]["tmp_name"], $path);
		
		$result = mysqli_query($con, "INSERT INTO teacher_document VALUES (NULL, $teacher_id, '$document_name', '$path', '$upload_date')");
		
		if($result) {
			header("location:teacher_document.php?add=done");
		}
		else {
			header("location:teacher_document_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>
<a href="teacher_document.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>ثبت سند جدید</h2>

<br>


<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<form method="post" enctype="multipart/form-data">
	
	<div class="input-group">
		<span class="input-group-addon">
			استاد: 
		</span>
		<select name="teacher_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_teacher["teacher_id"]; ?>"><?php echo $row_teacher["firstname"]; ?> <?php echo $row_teacher["lastname"]; ?></option>
			<?php } while($row_teacher = mysqli_fetch_assoc($teacher)); ?>
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