<?php require_once("connection.php"); ?>
<?php

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
		
	if(isset($_POST["discount_year"])) { 
	
		$student_id = $_POST["student_id"];
		$student_section = mysqli_query($con, "SELECT section_id FROM student WHERE student_id=$student_id");
		$row_student_section = mysqli_fetch_assoc($student_section);
		$section_id = $row_student_section["section_id"];
		
		$discount_year = $_POST["discount_year"];
		$discount_amount = $_POST["discount_amount"];
		$discount_type = $_POST["discount_type"];
		
		$result = mysqli_query($con, "INSERT INTO tuition_discount VALUES ($student_id, $discount_year, $section_id, $discount_amount, $discount_type)");
		
		if($result) {
			header("location:tuition_discount.php?add=done");
		}
		else {
			header("location:tuition_discount_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<h2>ثبت تخفیف جدید</h2>

<br>


<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<form method="post" enctype="multipart/form-data">
	
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select name="student_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?> فرزند: <?php echo $row_student["fathername"]; ?></option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			سال: 
		</span>
		<input type="text" value="<?php echo jdate("Y", "","","","en"); ?>" name="discount_year" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			مقدار تخفیف: 
		</span>
		<input type="text" name="discount_amount" class="form-control">
		<span class="input-group-addon">
			%
		</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نوعیت تخفیف: 
		</span>
		<select name="discount_type" class="form-control">
			<option value="0">صندوق</option>
			<option value="1">عضو فامیل</option>
		</select>
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary btn-block">
	
</form>

</div>

<?php require_once("footer.php"); ?>