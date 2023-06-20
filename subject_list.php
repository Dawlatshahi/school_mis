<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 9, 9, 9, 9, 9, 9, 9 );
	$class_id = 0;
	if(isset($_GET["class_id"])) {
		$class_id = $_GET["class_id"];
	}

	$subject = mysqli_query($con, "SELECT * FROM subject WHERE class_id = $class_id ORDER BY subject_id ASC");
	$row_subject = mysqli_fetch_assoc($subject);
	$totalRows_subject = mysqli_num_rows($subject);
	
	$class = mysqli_query($con, "SELECT * FROM classes ORDER BY class_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<h2>لیست مضامین</h2>

<br>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ویرایش موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
	عملیه ثبت مضمون موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف موفقانه انجام شد.
	</div>
<?php } ?>

<form method="get">
<div class="input-group">
	<span class="input-group-addon">
		صنف:
	</span>
	<select name="class_id" class="form-control">
		<?php do { ?>
			<option <?php if(isset($_GET["class_id"]) && $_GET["class_id"] == $row_class["class_id"]) echo "selected"; ?> value="<?php echo $row_class["class_id"]; ?>"><?php echo $row_class["class_name"]; ?></option>
		<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
	</select>
	<span class="input-group-btn">
		<input type="submit" value="نمایش" class="btn btn-primary">
	</span>
</div>
</form>

<?php if($totalRows_subject > 0) { ?>
<div class="table-responsive">
<table class="table table-striped table-bordered">
	<tr>
		<th>شماره</th>
		<th>نام مضمون</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_subject["subject_id"]; ?></td>
		<td><?php echo $row_subject["subject_name"]; ?></td>
		
		<td>
			<a href="subject_edit.php?subject_id=<?php echo $row_subject["subject_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="subject_delete.php?subject_id=<?php echo $row_subject["subject_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
		
	</tr>
	<?php } while($row_subject = mysqli_fetch_assoc($subject)); ?>
	
</table>
</div>
<?php } else if(isset($_GET["class_id"])) { ?>
	<br>
	<div class="alert alert-warning">
		برای صنف مورد نظر هیچ مضمونی ثبت نشده است
	</div>
<?php } ?>

<?php if(isset($_GET["class_id"])) { ?>
<a href="subject_add.php?class_id=<?php echo $_GET["class_id"]; ?>" class="btn btn-primary" style="">
	<span class="glyphicon glyphicon-plus-sign"></span>
	ثبت مضمون جدید
</a>
<?php } ?>

<?php require_once("footer.php"); ?>