<?php require_once("connection.php"); ?>
<?php
checkLevel(2, 9, 9, 9, 2, 9, 9, 9, 9);
	$condition = "";
	
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		$condition = " WHERE document_id='$q' OR document_name LIKE '%$q%' OR firstname LIKE '%$q%' OR lastname LIKE '%$q%' ";
	}

	$document = mysqli_query($con, "SELECT * FROM staff INNER JOIN staff_document ON staff.staff_id = staff_document.staff_id $condition ORDER BY document_id DESC");
	$row_document = mysqli_fetch_assoc($document);
	$totalRows_document = mysqli_num_rows($document);
	
	
?>
<?php require_once("top.php"); ?>

<div class="pull-left">
	<a href="staff_document_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span>
		ثبت سند جدید
	</a>
</div>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجوی اسناد...">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
 			جستجو
		</button>
	</form>
</div>


<h2>اسناد کارمندان</h2>
	<br>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		ثبت سند جدید موفقانه انجام شد.
	</div>
<?php } ?>
	
<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ویرایش اسناد کارمند موفقانه انجام شد.
	</div>
<?php } ?>
	
<?php if(isset($_GET["q"])) { ?>
	<div class="panel panel-info">
		<div class="panel-heading">
		<b>تعداد نتایج به دست آمده:
		<?php echo $totalRows_document; ?></b>
		</div>
	</div>
<?php } ?> 



<?php if($totalRows_document == 0) { ?>
	<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
	</div>
<?php } ?>

<?php if($totalRows_document > 0) { ?>

<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>نام کارمند</th>
		<th>عنوان سند</th>
		<th>فایل سند</th>
		<th>تاریخ ثبت</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_document["document_id"]; ?></td>
		<td><?php echo $row_document["firstname"]; ?> <?php echo $row_document["lastname"]; ?></td>
		<td><?php echo $row_document["document_name"]; ?></td>
		<td>
			<a download href="<?php echo $row_document["document_file"]; ?>">
				<span class="glyphicon glyphicon-cloud-download"></span>
				دانلود
			</a>
		</td>
		<td><?php echo $row_document["upload_date"]; ?></td>
		<td>
			<a href="staff_document_edit.php?document_id=<?php echo $row_document["document_id"]; ?>">
			<span class="glyphicon glyphicon-edit">
			</span>
			</a>
		</td>
		<td>
			<a class="delete" href="staff_document_delete.php?document_id=<?php echo $row_document["document_id"]; ?>">
			<span class="glyphicon glyphicon-trash">
			</span>
			</a>
		</td>
	</tr>
	<?php } while($row_document = mysqli_fetch_assoc($document)); ?>
	
</table>
<?php } ?>

<?php require_once("footer.php"); ?>