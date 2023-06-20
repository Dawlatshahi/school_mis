<?php require_once("connection.php"); 
checkLevel(8, 9, 9, 9, 9, 9, 9, 9,8);
?>
<?php require_once("backup_engine.php"); ?>
<?php
	
	if(isset($_POST["tablename"])) {
		$table = $_POST["tablename"];
		$date = jdate("Y_m_d", "", "", "Asia/Kabul", "en");
		$time = jdate("h_i_s", "", "", "Asia/Kabul", "en");
		$path = "backup/backup__" . $table . "__" . $date . "__" . $time . ".sql";
		$result = make_sql_backup($path, $table);
		if($result) {
			header("location:backup.php?backup=$path");
		}
		else {
			header("location:backup.php?backup_error=true");
		}
	}
	
	if(isset($_POST["restore"])) { 
		$path = "restore/" . $_FILES["backup_file"]["name"];
		move_uploaded_file($_FILES["backup_file"]["tmp_name"], $path);
		$result = restore_sql_backup($path);
		if($result) {
			header("location:backup.php?restore=done");
		}
		else {
			header("location:backup.php?restore_error=yes");
		}
	}
	
	
?>
<?php require_once("top.php"); ?>

<h2>پشتیبان گیری</h2>

<br>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="text-center">گرفتن پشتیبان جدید</h1>
	</div>
	
	<div class="panel-body text-center">
	
		<?php if(isset($_GET["backup"])) { ?>
			<div class="panel alert-success" style="padding:10px;">
				پشتیبان با موفقیت گرفته شد!
				
				<a download href="<?php echo $_GET["backup"]; ?>" class="btn btn-success" style="color:white;">
					<span class="glyphicon glyphicon-download-alt"></span>
					دانلود
				</a>
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["backup_error"])) { ?>
			<div class="alert alert-danger">
				عملیه گرفتن پشتیبان انجام نشد! لطفا دوباره کوشش نمایید!
			</div>
		<?php } ?>
	
		<form method="post">
			<div class="input-group">
				<span class="input-group-addon">
					از بخش:
				</span>
				<select name="tablename" class="form-control">
					<option value="all">همه بخش ها</option>
					<option value="staff">کارمندان</option>
					<option value="staff_attendance">حاضری کارمندان</option>
					<option value="staff_document">اسناد کارمندان</option>
					<option value="staff_salary">معاشات کارمندان</option>
				</select>
			</div>
			<input style="font-size:16px;font-weight:bold;" type="submit" value="شروع پروسه" class="btn btn-primary">
		</form>
	</div>
</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="text-center">بازگرداندن پشتیبان</h1>
	</div>
	
	<div class="panel-body text-center">
	
		<?php if(isset($_GET["restore"])) { ?>
			<div class="alert alert-success">
				پشتیبان مورد نظر با موفقیت بازگردانده شد!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["restore_error"])) { ?>
			<div class="alert alert-danger">
				بازگرداندن پشتیبان انجام نشد! لطفا دوباره کوشش نمایید!
			</div>
		<?php } ?>
	
		<form method="post" enctype="multipart/form-data">
			<div class="input-group">
				<span class="input-group-addon">
					فایل پشتیبان:
				</span>
				<input type="file" name="backup_file" class="form-control">
			</div>
			<input type="hidden" name="restore" value="yes">
			<input style="font-weight:bold;font-size:16px;" type="submit" value="بازگرداندن" class="btn btn-primary">
		</form>
	</div>
</div>
</div>

<?php require_once("footer.php"); ?>