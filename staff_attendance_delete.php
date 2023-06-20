<?php require_once("connection.php"); 
checkLevel(1, 9, 9, 9, 8, 9, 9, 9, 9); ?>
<?php

	$staff_id = $_GET["staff_id"];
	$year = $_GET["absent_year"];
	$month = $_GET["absent_month"];
	$day = $_GET["absent_day"];

	$result = mysqli_query($con, "DELETE FROM staff_attendance WHERE staff_id=$staff_id AND absent_year=$year AND absent_month=$month AND absent_day=$day");
	
	if($result) {
		header("location:staff_attendance_detail.php?staff_id=$staff_id&absent_year=$year&absent_month=$month&delete=done");
	}
	else {
		header("location:staff_attendance_detail.php?staff_id=" . $_GET["staff_id"] . "&absent_year=$year&absent_month=$month&error=notdelete");
	}

?>
