<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 9, 2, 9, 9, 9);
	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	$source = mysqli_query($con, "SELECT * FROM income_source WHERE source_id <> 1");
	$row_source = mysqli_fetch_assoc($source);
	
	
	if(isset($_POST["income_amount"])) { 
		$student_id = $_POST["student_id"];
		$source_id = $_POST["source_id"];
		$income_date = $_POST["income_date"];
		$income_amount = $_POST["income_amount"];

		$std_section = mysqli_query($con, "SELECT section_id FROM student WHERE student_id=$student_id");
		$row_std_section = mysqli_fetch_assoc($std_section);
		
		$section_id = $row_std_section["section_id"];
		
		$result = mysqli_query($con, "INSERT INTO income VALUES (NULL, $source_id, $income_amount, '$income_date', $student_id, $section_id)");
		
		if($result) {
			header("location:income_list.php?add=done");
		}
		else {
			header("location:income_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<h2>ثبت پول دریافتی جدید</h2>

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
			بابت:
		</span>
		<select name="source_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_source["source_id"]; ?>"><?php echo $row_source["source_name"]; ?></option>
			<?php } while($row_source = mysqli_fetch_assoc($source)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			مبلغ: 
		</span>
		<input type="text" name="income_amount" class="form-control">
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