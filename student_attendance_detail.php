<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 1, 9, 9, 9, 9, 9, 9);

	$student_id = $_GET["student_id"];
	$month = $_GET["absent_month"];
	$year = $_GET["absent_year"];

	$attendance = mysqli_query($con, "SELECT * FROM student_attendance WHERE student_id=$student_id AND EXTRACT(YEAR FROM absent_date)=$year AND EXTRACT(MONTH FROM absent_date)=$month");
	$row_attendance = mysqli_fetch_assoc($attendance);
	$totalRows_attendance = mysqli_num_rows($attendance);
?>
<?php require_once("top.php"); ?>

<a href="student_attendance.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>

<h2>جزییات غیرحاضری شاگرد</h2>
<br>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-info alert-dismissable">
		عملیه ویرایش غیرحاضرشاگرد موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف معلومات حاضری شاگرد موفقانه انجام شد.
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
		<td><?php echo $row_attendance["absent_date"]; ?>
		</td>
		<td><?php
				switch($row_attendance["absent_type"]) {
					case 1:
						echo "مریض";
					break;
					case 2:
						echo "رخصت";
					break;
					case 3:
						echo "غیرحاضر";
					break;
					
				}
			?></td>
		<td>
			<a href="student_attendance_edit.php?student_id=<?php echo $_GET["student_id"]; ?>&absent_date=<?php echo $row_attendance["absent_date"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td>
			<a class="delete" href="student_attendance_delete.php?student_id=<?php echo $_GET["student_id"]; ?>&absent_date=<?php echo $row_attendance["absent_date"]; ?>">
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