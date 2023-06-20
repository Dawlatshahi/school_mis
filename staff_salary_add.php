<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 2, 9, 9, 9, 9);
	$staff_id = $_GET["staff_id"];

	$year = $_GET["salary_year"];
	$month = $_GET["salary_month"];

	$salary = mysqli_query($con, "SELECT gross_salary FROM staff WHERE staff_id = " . $_GET["staff_id"]);
	$row_salary = mysqli_fetch_assoc($salary);
	
	$taxable = $row_salary["gross_salary"];
	
	
	if($taxable > 100000) {
		$tax = ($taxable - 100000) * 0.2  + 8900;
	}
	else {
		if($taxable > 12500) {
			$tax = ($taxable - 12500) * 0.1  +  150;
		}
		else {
			if($taxable > 5000) {
				$tax = ($taxable - 5000) * 0.02;
			}
			else {
				$tax = 0;
			}
		}
	}

	$spd = $row_salary["gross_salary"] / 27;
	
	$attendance = mysqli_query($con, "SELECT COUNT(staff_id) AS total FROM staff_attendance WHERE absent_year=$year AND absent_month=$month AND staff_id = " . $_GET["staff_id"]);
	$row_attendance = mysqli_fetch_assoc($attendance);

	$total_absent = $row_attendance["total"];
	
	$absent_amount = round($total_absent * $spd, 0);
	
	
	$payable_salary = $row_salary["gross_salary"] - $tax - $absent_amount;
	
	$net_salary = $payable_salary - ($payable_salary * 13.33 / 100);


	if(isset($_POST["gross_salary"])) { 
		$tax_amount = $_POST["tax_amount"];
		$absent_amount = $_POST["absent_amount"];
		$bonus = $_POST["bonus"];
		$payable_salary = $_POST["payable_salary"];
		$guarantee = $_POST["guarantee"];
		$net_salary = $_POST["net_salary"];
		
		$result = mysqli_query($con, "INSERT INTO staff_salary VALUES ($staff_id, $year, $month, $tax_amount, $absent_amount, $bonus, $payable_salary, $guarantee, $net_salary, NULL)");
		
		if($result) {
			header("location:staff_salary.php?add=done");
		}
		else {
			header("location:staff_salary_add.php?error=notadd&staff_id=$staff_id&salary_year=$year&salary_month=$month");
		}
	}
	
?>
<?php require_once("top.php"); ?>

<a href="staff_salary.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>

<h2>محاسبه معاش کارمند</h2>

<br>

<form method="post">

	<div class="input-group">
		<span class="input-group-addon">
			معاش ثابت:
		</span>
		<input value="<?php echo $row_salary["gross_salary"]; ?>" type="text" name="gross_salary" id="gross_salary" class="form-control" readonly>
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			مالیه:
		</span>
		<input value="<?php echo $tax; ?>" type="text" name="tax_amount" id="tax_amount" class="form-control" readonly>
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			غیرحاضری:
		</span>
		<input value="<?php echo $absent_amount; ?>" type="text" name="absent_amount" id="absent_amount" class="form-control" readonly>
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			انعام:
		</span>
		<input value="0" type="text" name="bonus" id="bonus" class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	
	<div class="input-group">
		<span class="input-group-addon">
			معاش قابل پرداخت:
		</span>
		<input value="<?php echo $payable_salary; ?>" type="text" name="payable_salary" id="payable_salary" readonly class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			ضمانت:
		</span>
		<input value="13.33" type="text" name="guarantee" id="guarantee" class="form-control">
		<span class="input-group-addon">
			%
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			معاش نهایی:
		</span>
		<input value="<?php echo round($net_salary,0); ?>" type="text" name="net_salary" id="net_salary" class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>

	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>