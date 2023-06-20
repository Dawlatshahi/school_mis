<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 1, 9, 9, 9, 9, 9, 9);
	$year = jdate("Y","","","","en");
	
	$discount = mysqli_query($con, "SELECT discount_amount FROM tuition_discount WHERE discount_year=$year AND student_id = ". $_POST["student_id"]);
	$row_discount = mysqli_fetch_assoc($discount);

	echo $row_discount["discount_amount"];

?>
