<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 8, 9, 9, 9, 9);
	$staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = " . $_GET["staff_id"]);
	$row_staff = mysqli_fetch_assoc($staff);

	unlink($row_staff["photo"]);

	$result = mysqli_query($con, "DELETE FROM staff WHERE staff_id = " . $_GET["staff_id"]);
	
	if($result) {
		header("location:staff_list.php?delete=done");
	}
	else {
		header("location:staff_detail.php?staff_id=" . $_GET["staff_id"] . "&error=notdelete");
	}

?>
