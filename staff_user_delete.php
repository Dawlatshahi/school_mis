<?php require_once("connection.php"); 
	checkLevel(1, 9, 9, 9, 9, 9, 9, 9, 9);
?>



<?php 

	if(isset($_GET["staff_id"])) {
		
		$id = $_GET["staff_id"];
		mysqli_query($con, "DELETE FROM users WHERE staff_id = $id");
		header("location:staff_user.php?delete=done");
	}
	else{
		header("location:staff_user.php?error=notdelete");
	}


	
?>