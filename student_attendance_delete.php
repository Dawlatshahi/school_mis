<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 8, 8, 9, 9, 9, 9, 9, 9);

	$student_id = $_GET["student_id"];
	$absent_date = $_GET["absent_date"];
	
	$result = mysqli_query($con, "DELETE FROM student_attendance WHERE student_id=$student_id AND absent_date='$absent_date'");

	$parts = explode("-", $absent_date);
	$year = $parts[0];
	$month = $parts[1];
	
	if($result) {
		header("location:student_attendance_detail.php?student_id=$student_id&absent_year=$year&absent_month=$month&delete=done");
	}
	else {
		header("location:student_attendance_detail.php?student_id=" . $_GET["student_id"] . "&absent_year=$year&absent_month=$month&error=notdelete");
	}

?>
