<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 1, 9, 9, 9, 9, 9, 9);

	$student_id = $_GET["student_id"];
	$month = $_GET["absent_month"];
	$year = $_GET["absent_year"];

	$attendance = mysqli_query($con, "SELECT * FROM student_attendance WHERE student_id=$student_id AND absent_year=$year AND absent_month=$month");
	$row_attendance = mysqli_fetch_assoc($attendance);
	$totalRows_attendance = mysqli_num_rows($attendance);
?>
<?php require_once("top.php"); ?>

<h2>جزییات غیرحاضری شاگرد</h2>
<br>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ویرایش حاضری شاگرد موفقانه انجام شد.
	</div>
<?php } ?>

<?php if($totalRows_attendance > 0) { ?>

<table class="table table-striped">
	<tr>
		<th>تاریخ</th>
		<th>توضیح</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_attendance["absent_year"]; ?>/<?php echo $row_attendance["absent_month"]; ?>/<?php echo $row_attendance["absent_day"]; ?>
		</td>
		<td><?php echo $row_attendance["remark"]; ?></td>
		<td>
			<a href="student_attendance_edit.php">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td>
			<a href="student_attendance_delete.php">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
	
</table>

<?php } else { ?>

	<div class="panel panel-warning">
		<div class="panel-heading">
			شاگردمذکور غیرحاضری ندارد!
		</div>
	</div>


<?php } ?>

<?php require_once("footer.php"); ?>