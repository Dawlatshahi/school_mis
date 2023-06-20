<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 4, 4, 9, 9, 9, 9, 9, 9);
	$student_id = $_GET["student_id"];
	$subject_id = $_GET["subject_id"];
	$exam_year = $_GET["exam_year"];

	$score = mysqli_query($con, "SELECT * FROM score WHERE student_id=$student_id AND subject_id=$subject_id AND exam_year=$exam_year");
	$row_score = mysqli_fetch_assoc($score);

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername, section_name FROM student INNER JOIN class_section ON class_section.section_id = student.section_id ORDER BY section_name ASC, firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	$subject = mysqli_query($con, "SELECT subject_id, subject_name FROM subject ORDER BY subject_name ASC");
	$row_subject = mysqli_fetch_assoc($subject);
	
	if(isset($_POST["exam_year"])) {
		
		$student_id = $_GET["student_id"];
		
		$subject_id = $_POST["subject_id"];
		$exam_year = $_POST["exam_year"];
		
		$mid_exam = $_POST["mid_exam"];
		
		$class_id = $_GET["class_id"];
		
		$final_exam = $_POST["final_exam"];
		if($final_exam == "") {
			$final_exam = "NULL";
		}
		
		$second_chance = $_POST["second_chance"];
		if($second_chance == "") {
			$second_chance = "NULL";
		}
		
		$total_mark = $_POST["total_mark"];
		if($total_mark == "") {
			$total_mark = "NULL";
		}
		
		$result = mysqli_query($con, "UPDATE score SET subject_id=$subject_id, exam_year=$exam_year, mid_exam=$mid_exam, final_exam=$final_exam, second_chance=$second_chance, total_mark=$total_mark WHERE student_id=$student_id AND subject_id=" . $_GET["subject_id"] . " AND exam_year =" . $_GET["exam_year"]);
		
		if($result) {
			header("location:score_list.php?edit=done&student_id=$student_id&class_id=$class_id");
		}
		else {
			header("location:score_edit.php?error=notedit&student_id=$student_id&class_id=$class_id&subject_id=" . $_GET["subject_id"] . "&exam_year=" . $_GET["exam_year"]);
		}
	}
?>
<?php require_once("top.php"); ?>

<h2>ویرایش یا رساندن نمره سالانه</h2>

<br>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select disabled name="student_id" class="form-control">
			<?php do { ?>
			<option <?php if($row_student["student_id"] == $row_score["student_id"]) echo "selected"; ?> value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?> - <?php echo $row_student["fathername"]; ?> (<?php echo $row_student["section_name"]; ?>)</option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			مضمون:
		</span>
		<select name="subject_id" class="form-control">
			<?php do { ?>
			<option <?php if($row_subject["subject_id"] == $row_score["subject_id"]) echo "selected"; ?> value="<?php echo $row_subject["subject_id"]; ?>"><?php echo $row_subject["subject_name"]; ?></option>
			<?php } while($row_subject = mysqli_fetch_assoc($subject)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			سال:
		</span>
		<input value="<?php echo $row_score["exam_year"]; ?>" type="text" name="exam_year" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمره چهارونیم ماه:
		</span>
		<input type="text" value="<?php echo $row_score["mid_exam"]; ?>" name="mid_exam" id="mid_exam" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمره سالانه:
		</span>
		<input value="<?php echo $row_score["final_exam"]; ?>" type="text" name="final_exam" id="final_exam" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمره مشروطی:
		</span>
		<input value="<?php echo $row_score["second_chance"]; ?>" type="text" name="second_chance" id="second_chance" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			نمره نهایی:
		</span>
		<input value="<?php echo $row_score["total_mark"]; ?>" type="text" name="total_mark" id="total_mark" class="form-control">
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>