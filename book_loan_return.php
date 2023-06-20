<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 2, 9, 9);
		$date = jdate("Y-m-d", "", "", "", "en");
		
		$result = mysqli_query($con, "UPDATE lib_loan SET return_date='$date' WHERE loan_id=". $_GET["loan_id"]);
		
		if($result){
				header("location:book_loan.php?return=done");
		}
		else{
				header("location:book_loan.php?error=notreturn");
		}

?>
