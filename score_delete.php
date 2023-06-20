<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 8, 8, 9, 9, 9, 9, 9, 9);
	$student_id = $_GET["student_id"];
	$subject_id = $_GET["subject_id"];
	$exam_year = $_GET["exam_year"];
	
	$result = mysqli_query($con, "DELETE FROM score WHERE student_id=$student_id AND subject_id=$subject_id AND exam_year=$exam_year");
	if($result){
		header("location:score_list.php?delete=done&student_id=$student_id&class_id=" . $_GET["class_id"]);
	}
	else{
		header("location:score_list.php?error=notdelete&student_id=$student_id&class_id=" . $_GET["class_id"]);
	}
		
?>

