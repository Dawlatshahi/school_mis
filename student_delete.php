<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 8, 9, 9, 9, 9, 9, 9);

	$student = mysqli_query($con, "SELECT * FROM student WHERE student_id = " . $_GET["student_id"]);
	$row_student = mysqli_fetch_assoc($student);
	unlink($row_student["photo"]);


	$result = mysqli_query($con, "DELETE FROM student WHERE student_id = " . $_GET["student_id"]);
	if($result){
		header("location:student_list.php?delete=done");
	}
	else{
		header("location:student_detail.php?student_id=" . $_GET["student_id"] . "&error=notdelete");
	}
?>