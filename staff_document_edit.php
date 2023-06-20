<?php 
	
	require_once("connection.php");
	checkLevel(1, 9, 9, 9, 4, 9, 9, 9, 9);
	
	$document = mysqli_query($con, "SELECT * FROM staff_document WHERE document_id = " . $_GET["document_id"]);
	$row_document = mysqli_fetch_assoc($document);
	
	if(isset($_POST["document_name"])) {
		$document_name = $_POST["document_name"];
		$upload_date = $_POST["upload_date"];
		
		if($_FILES["document_file"]["name"] != "") {
			$path = "document/staff/" .time() . $_FILES["document_file"]["name"];
			move_uploaded_file($_FILES["document_file"]["tmp_name"], $path);		
		}
		else {
			$path = $row_document["document_file"];
		}
		
		
		if(mysqli_query($con, "UPDATE staff_document SET document_name='$document_name', upload_date='$upload_date', document_file='$path' WHERE document_id = " . $_GET["document_id"])) {
			header("location:staff_document.php?edit=done");
		}
		else{
			header("location:staff_document_edit.php?document_id=" . $_GET["document_id"] . "&error=notedit");
		}
	}

?>
<?php require_once("top.php"); ?> 

<a href="staff_document.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>

	<h2>ویرایش سند کارمند</h2>
	
	<?php if(isset($_GET["error"]))	{ ?>
	
	<div class="alert alert-danger alert-dismissable">	
		<button class="close" area-hidden="true" 
		data-dismiss="alert">&times;</button>
		عملیه ویرایش انجام نشد! لطفا دوباره کوشش کنید.
	</div>

<?php } ?>
	
		<br>
		
		<form method="post" enctype="multipart/form-data">
		
			<div class="input-group">
				<span class="input-group-addon">
				نام سند:</span>
				<input value="<?php echo $row_document["document_name"]; ?>" type="text" class="form-control" name="document_name">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				فایل: </span>
				<input type="file" class="form-control" name="document_file">
				<span class="input-group-addon">
					<a href="<?php echo $row_document["document_file"]; ?>" download>
						<span class="glyphicon glyphicon-download"></span>
						دانلود
					</a>
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				تاریخ: </span>
				<input value="<?php echo $row_document["upload_date"]; ?>" type="text" class="form-control" name="upload_date">
			</div>	
			
			<input style="margin-top:40px;" type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block">
		
		</form>
		
		<br>
		<br>
		<br>
		

<?php require_once("footer.php"); ?>