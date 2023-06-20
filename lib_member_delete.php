<?php require_once("connection.php"); ?>



<?php 
checkLevel(1, 9, 9, 9, 9, 9, 8, 9, 9);
	if(isset($_GET["student_id"])) {
		
		$id = $_GET["student_id"];
		mysqli_query($con, "DELETE FROM lib_member WHERE student_id = $id");
		header("location:lib_member_list.php?delete=done");
	}
	else{
		header("location:lib_member_list.php?error=notdelete");
	}


	
?>