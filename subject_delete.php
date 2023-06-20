<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 8, 9, 9, 9, 9, 9, 9, 9);
		$subject = mysqli_query($con, "SELECT * FROM subject WHERE subject_id=". $_GET["subject_id"]);
		$row_subject = mysqli_fetch_assoc($subject);
	
		$result = mysqli_query($con, "DELETE FROM subject WHERE subject_id=". $_GET["subject_id"]);
		
		if($result){
				header("location:subject_list.php?delete=done&subject_id=" . $row_subject["subject_id"]);
		}
		else{
				header("location:subject_list.php?subject_id=" . $row_subject["subject_id"] . "&error=notdelete");
		}

?>
