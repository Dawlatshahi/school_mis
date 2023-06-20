<?php require_once("connection.php"); 
checkLevel(1, 9, 9, 9, 2, 9, 9, 9, 9); ?>
?>
<?php
		$pay_date = jdate("Y-m-d", "", "", "", "en");

		$staff_id = $_GET["staff_id"];
		$salary_year = $_GET["salary_year"];
		$salary_month = $_GET["salary_month"];
			
		$result = mysqli_query($con, "UPDATE staff_salary SET pay_date='$pay_date' WHERE staff_id=$staff_id AND salary_year=$salary_year AND salary_month=$salary_month ");
		
		if($result){
				header("location:staff_salary_payment.php?pay=done");
		}
		else{
				header("location:staff_salary_payment.php?error=notpaid");
		}

?>
