<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 9, 9, 9, 9, 9, 9, 9 );
	$class = mysqli_query($con, "SELECT * FROM classes ORDER BY class_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	$totalRows_class = mysqli_num_rows($class);
?>
<?php require_once("top.php"); ?>

<a href="class_add.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-plus-sign"></span>
	ثبت صنف جدید
</a>

<h2>لیست صنف ها</h2>
<br>
<?php if(isset($_GET["edit"])) { ?>
<div class="alert alert-success alert-dismissable">
	عملیه ویرایش صنف موفقانه انجام شد.
</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف موفقانه انجام شد.
	</div>
<?php } ?>
<?php if($totalRows_class > 0) { ?>
<div class="table-responsive">
<table class="table table-striped table-bordered">
	<tr>
		<th>شماره</th>
		<th>نام صنف</th>
		<th>فیس</th>
		<th>شناسه</th>
		<th>ویرایش</th>
		<th>حذف</th>
		<th>ثبت نمره</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_class["class_id"]; ?></td>
		<td><?php echo $row_class["class_name"]; ?></td>
		<td><?php echo $row_class["fees"]; ?> افغانی</td>
		
		<td>
			<a href="class_section.php?class_id=<?php echo $row_class["class_id"]; ?>">
				<span class="glyphicon glyphicon-list-alt"></span>
			</a>
		</td>
		
		<td>
			<a href="class_edit.php?class_id=<?php echo $row_class["class_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="class_delete.php?class_id=<?php echo $row_class["class_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
				
			</a>
		</td>
		
		<td> 
			<a href="score_add.php?class_id=<?php echo $row_class["class_id"]; ?>" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus-sign"></span>
				ثبت نمره
			</a>
		</td>
		
	</tr>
	<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
	
</table>
<?php } ?>
</div>

<?php require_once("footer.php"); ?>