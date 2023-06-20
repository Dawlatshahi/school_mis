<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 1, 9, 9, 9, 9, 9, 9 );

	$relative = mysqli_query($con, "SELECT * FROM student_relative WHERE student_id = " . $_GET["student_id"]);
	$row_relative = mysqli_fetch_assoc($relative);
?>
<?php require_once("top.php"); ?>

<a class="btn btn-primary pull-left" href="student_relative.php" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
	برگشت 
</a>

<a class="btn btn-primary pull-left" href="student_relative_add.php?student_id=<?php echo $_GET["student_id"]; ?>" style="margin-left:20px;">
	<span class="glyphicon glyphicon-plus-sign"></span>
	ثبت اقارب جدید
</a>

<h2>اقارب شاگرد</h2>
<br>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-info alert-dismissable">
		عملیه ثبت اقارب شاگرد مورد نظر موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ویرایش اقارب شاگرد موفقانه صورت گرفت.
	</div>	
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		 عملیه حذف اقارب شاگرد موفقانه انجام شد.
	</div>	
<?php } ?>

<table class="table table-striped">

	<tr>
		<th>نام</th>
		<th>تلفن</th>
		<th>نسبت</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	<?php do { ?>
	<tr>
		<td><?php echo $row_relative["relative_name"]; ?></td>
		<td><?php echo $row_relative["relative_phone"]; ?></td>
		<td><?php echo $row_relative["relative_relation"]; ?></td>
		<td>
			<a href="student_relative_edit.php?relative_id=<?php echo $row_relative["relative_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td>
			<a class="delete" href="student_relative_delete.php?relative_id=<?php echo $row_relative["relative_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_relative = mysqli_fetch_assoc($relative)); ?>
	
	
</table>


<?php require_once("footer.php"); ?>