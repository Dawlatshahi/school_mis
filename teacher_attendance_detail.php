<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 1, 9, 9, 9, 9, 9);
	$teacher_id = $_GET["teacher_id"];
	$month = $_GET["absent_month"];
	$year = $_GET["absent_year"];

	$attendance = mysqli_query($con, "SELECT * FROM teacher_attendance WHERE teacher_id=$teacher_id AND absent_year=$year AND absent_month=$month");
	$row_attendance = mysqli_fetch_assoc($attendance);
	$totalRows_attendance = mysqli_num_rows($attendance);
?>
<?php require_once("top.php"); ?>
<a href="teacher_attendance.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
<h2>چزییات حاضری معلم</h2>
<br>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ویرایش غیرحاضری معلم موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف غیرحاضری معلم موفقانه انجام شد.
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
			<a href="teacher_attendance_edit.php?teacher_id=<?php echo $_GET["teacher_id"]; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td>
			<a class="delete" href="teacher_attendance_delete.php?teacher_id=<?php echo $_GET["teacher_id"]; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
	
</table>

<?php } else { ?>

	<div class="panel panel-warning">
		<div class="panel-heading">
			معلم مذکور در این ماه غیرحاضری ندارد!
		</div>
	</div>


<?php } ?>

<?php require_once("footer.php"); ?>