<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 2, 9, 9, 9, 9, 9);
		$pay_date = jdate("Y-m-d", "", "", "", "en");

		$teacher_id = $_GET["teacher_id"];
		$salary_year = $_GET["salary_year"];
		$salary_month = $_GET["salary_month"];
			
		$result = mysqli_query($con, "UPDATE teacher_salary SET pay_date='$pay_date' WHERE teacher_id=$teacher_id AND salary_year=$salary_year AND salary_month=$salary_month ");
		
		if($result){
				header("location:teacher_salary_payment.php?pay=done");
		}
		else{
				header("location:teacher_salary_payment.php?error=notpaid");
		}

?>
