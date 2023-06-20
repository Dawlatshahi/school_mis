<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 8, 9, 9, 9, 9, 9);
	$teacher_id = $_GET["teacher_id"];
	$year = $_GET["absent_year"];
	$month = $_GET["absent_month"];
	$day = $_GET["absent_day"];

	$result = mysqli_query($con, "DELETE FROM teacher_attendance WHERE teacher_id=$teacher_id AND absent_year=$year AND absent_month=$month AND absent_day=$day");
	
	if($result) {
		header("location:teacher_attendance_detail.php?teacher_id=$teacher_id&absent_year=$year&absent_month=$month&delete=done");
	}
	else {
		header("location:teacher_attendance_detail.php?teacher_id=" . $_GET["teacher_id"] . "&absent_year=$year&absent_month=$month&error=notdelete");
	}

?>
