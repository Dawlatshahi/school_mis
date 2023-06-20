<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 9, 9, 9, 9, 9, 9, 9);
	$section = mysqli_query($con, "SELECT * FROM class_section WHERE class_id = " . $_GET["class_id"] . " ORDER BY section_id ASC");
	$row_section = mysqli_fetch_assoc($section);
?>
<?php require_once("top.php"); ?>

<a href="section_add.php?class_id=<?php echo $_GET["class_id"]; ?>" class="btn btn-primary pull-left">
	ثبت سکشن جدید
</a>

<h2>لیست سکشن های صنف</h2>

<br>

<div class="table-responsive">
<table class="table table-striped table-bordered">
	<tr>
		<th>شماره</th>
		<th>نام سکشن</th>
		<th>ویرایش</th>
		<th>حذف</th>
		<th>ثبت نمره</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_section["section_id"]; ?></td>
		<td><?php echo $row_section["section_name"]; ?></td>
		
		<td>
			<a href="section_edit.php?section_id=<?php echo $row_section["section_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="section_delete.php?section_id=<?php echo $row_section["section_id"]; ?>&class_id=<?php echo $_GET["class_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
		
		<td> 
			<a href="score_add.php?class_id=<?php echo $row_section["class_id"]; ?>" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus-sign"></span>
				ثبت نمره
			</a>
		</td>
		
	</tr>
	<?php } while($row_section = mysqli_fetch_assoc($section)); ?>
	
</table>
</div>

<?php require_once("footer.php"); ?>