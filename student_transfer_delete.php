<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 8, 9, 9, 9, 9, 9, 9 );

		$result = mysqli_query($con, "DELETE FROM student_transfer WHERE transfer_id=" . $_GET["transfer_id"]);
		if($result){
				header("location:student_transfer.php?delete=done");
		}
		else{
				header("location:student_transfer.php?error=notdelete");
		}
		
?>

