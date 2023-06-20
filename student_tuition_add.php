<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 9, 2, 9, 9, 9);

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["income_amount"])) { 
		$student_id = $_POST["student_id"];
		$student_section = mysqli_query($con, "SELECT section_id FROM student WHERE student_id=$student_id");
		$row_student_section = mysqli_fetch_assoc($student_section);
		$section_id = $row_student_section["section_id"];
		
		$source_id = "1";
		$income_date = $_POST["income_date"];
		$income_amount = $_POST["income_amount"];
		
		
		$result = mysqli_query($con, "INSERT INTO income VALUES (NULL, $source_id, $income_amount, '$income_date', $student_id, $section_id)");
		
		if($result) {
			header("location:student_tuition.php?add=done");
		}
		else {
			header("location:student_tuition_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<h2>دریافت فیس شاگرد</h2>

<br>


<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<form method="post" enctype="multipart/form-data">
	
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select name="student_id" id="student_id" class="form-control">
			<option value="0">لطفا یک شاگرد را انتخاب کنید</option>
			<?php do { ?>
				<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?> فرزند: <?php echo $row_student["fathername"]; ?></option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			فیس اصلی:
		</span>
		<input id="student_fee" type="text" readonly class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تخفیف:
		</span>
		<input id="discount" type="text" readonly class="form-control">
		<span class="input-group-addon">
			%
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			مبلغ تخفیف:
		</span>
		<input id="discount_amount" type="text" readonly class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			فیس قابل پرداخت:
		</span>
		<input name="income_amount" id="payable_fee" type="text" readonly class="form-control">
		<span class="input-group-addon">
			افغانی
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ: 
		</span>
		<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="income_date" class="form-control">
	</div>
	
	<input type="submit" value="دریافت نمودن" class="btn btn-primary btn-block">
	
</form>

</div>

<?php require_once("footer.php"); ?>