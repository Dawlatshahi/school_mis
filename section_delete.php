<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 9, 9, 9);
		$result = mysqli_query($con, "DELETE FROM class_section WHERE section_id=". $_GET["section_id"]);
		
		if($result){
				header("location:class_section.php?delete=done&class_id=" . $_GET["class_id"]);
		}
		else{
				header("location:class_section.php?error=notdelete&class_id=" . $_GET["class_id"]);
		}

?>
