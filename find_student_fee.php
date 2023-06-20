<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 1, 9, 9, 9, 9, 9, 9);
	$fee = mysqli_query($con, "SELECT fees FROM classes INNER JOIN class_section ON classes.class_id = class_section.class_id INNER JOIN student ON class_section.section_id = student.section_id WHERE student_id = ". $_POST["student_id"]);
	$row_fee = mysqli_fetch_assoc($fee);

	echo $row_fee["fees"];

?>
