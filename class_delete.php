<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 8, 9, 9, 9, 9, 9, 9, 9);
		$class = mysqli_query($con, "SELECT * FROM classes WHERE class_id=". $_GET["class_id"]);
		$row_class = mysqli_fetch_assoc($class);
	
		$result = mysqli_query($con, "DELETE FROM classes WHERE class_id=". $_GET["class_id"]);
		
		if($result){
				header("location:class_list.php?delete=done&class_id=" . $row_class["class_id"]);
		}
		else{
				header("location:class_list.php?class_id=" . $row_class["class_id"] . "&error=notdelete");
		}

?>
