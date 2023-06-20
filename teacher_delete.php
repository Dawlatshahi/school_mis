<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 8, 9, 9, 9, 9, 9);
	$staff = mysqli_query($con, "SELECT * FROM teacher WHERE teacher_id = " . $_GET["teache_id"]);
	$row_teacher = mysqli_fetch_assoc($teacher);
	unlink($row_teacher["photo"]);


	$result = mysqli_query($con, "DELETE FROM teacher WHERE teacher_id = " . $_GET["teacher_id"]);
	if($result){
		header("location:teacher_list.php?delete=done");
	}
	else{
		header("location:teacher_detail.php?teacher_id=" . $_GET["teacher_id"] . "&error=notdelete");
	}
?> 