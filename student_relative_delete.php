<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 8, 9, 9, 9, 9, 9, 9 );

		$relative = mysqli_query($con, "SELECT * FROM student_relative WHERE relative_id=". $_GET["relative_id"]);
		$row_relative = mysqli_fetch_assoc($relative);
	
		$result = mysqli_query($con, "DELETE FROM student_relative WHERE relative_id=". $_GET["relative_id"]);
		
		if($result){
				header("location:student_relative_detail.php?delete=done&student_id=" . $row_relative["student_id"]);
		}
		else{
				header("location:student_relative_detail.php?student_id=" . $row_relative["student_id"] . "&error=notdelete");
		}

?>
