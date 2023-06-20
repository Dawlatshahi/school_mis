<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 2, 2, 9, 9, 9, 9, 9, 9);
	if(isset($_POST["submit"])) { 
			$indices = array_keys($_POST);
			for($x=2; $x<count($indices)-1; $x++) {
				$parts = explode("_", $indices[$x]);
				$student_id = $parts[1];
				$subject_id = $parts[2];
				$exam_year = $_POST["exam_year"];
				$student_section = mysqli_query($con, "SELECT section_id FROM student WHERE student_id=$student_id");
				$row_student_section = mysqli_fetch_assoc($student_section);
				$section_id = $row_student_section["section_id"];
				$score = $_POST[$indices[$x]];
				$exam = $_POST["exam_type"];
				
				if($exam == "mid") {
					$query = "INSERT INTO score VALUES ($student_id, $subject_id, $exam_year, $section_id, $score, NULL, NULL, NULL)";
				}
				else if($exam == "final") {
					$query = "UPDATE score SET final_exam=$score, total_mark=(mid_exam+$score) WHERE student_id=$student_id AND subject_id=$subject_id AND exam_year=$exam_year";
				}
				
				$result = mysqli_query($con, $query);

			}
	}
	

	$student = mysqli_query($con, "SELECT student_id, firstname, fathername, grandfathername, section_name FROM student INNER JOIN class_section ON class_section.section_id = student.section_id WHERE class_id = " . $_GET["class_id"]. " ORDER BY section_name ASC, firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	$totalRows_student = mysqli_num_rows($student);
	
	$subject = mysqli_query($con, "SELECT subject_id, subject_name FROM subject WHERE class_id = " . $_GET["class_id"]. " ORDER BY subject_name ASC");
	$row_subject = mysqli_fetch_assoc($subject);
	
	$class = mysqli_query($con, "SELECT * FROM classes WHERE class_id = " . $_GET["class_id"]);
	$row_class = mysqli_fetch_assoc($class);
	
	
	
		
?>
<?php require_once("top.php"); ?>

<a href="score_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
	برگشت
</a>

<h2>جدول درج نمرات صنف
	<?php echo $row_class["class_name"]; ?>
</h2>

<br>

<?php if($totalRows_student > 0) { ?>

<div class="table-responsive" width="50%">
	
	<form method="post">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">
					<b>نمرات: </b>
				</span>
				<select name="exam_type" class="form-control">
					<option value="mid">چهار و نیم ماه</option>
					<option value="final">سالانه</option>
				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">
					<b>سال: </b>
				</span>
				<input value="<?php echo jdate("Y","","","","en"); ?>" type="text" name="exam_year" class="form-control">				
			</div>			
		</div>
	
	<table class="table table-striped table-bordered">
	<tr>
			<th>شماره</th>
			<th>نام</th>
			<th>نام پدر</th>
			<?php do { ?>				
				<th><?php echo $row_subject["subject_name"]; ?></th>
			<?php } while($row_subject = mysqli_fetch_assoc($subject)); ?>
			<?php
				$subject = mysqli_query($con, "SELECT subject_id, subject_name FROM subject WHERE class_id = " . $_GET["class_id"]. " ORDER BY subject_name ASC");
				$row_subject = mysqli_fetch_assoc($subject);
			?>
	</tr>			
		
		<?php do { ?>
		<tr>
			<td><?php echo $row_student["student_id"];  ?></td>
			<td><?php echo $row_student["firstname"];  ?></td>
			<td><?php echo $row_student["fathername"];  ?></td>			
			<?php do { ?>				
				<td>
					<input name="score_<?php echo $row_student["student_id"]; ?>_<?php echo $row_subject["subject_id"]; ?>" type="text" style="width:100%;">
				</td>
			<?php } while($row_subject = mysqli_fetch_assoc($subject)); ?>
			<?php
				$subject = mysqli_query($con, "SELECT subject_id, subject_name FROM subject WHERE class_id = " . $_GET["class_id"]. " ORDER BY subject_name ASC");
				$row_subject = mysqli_fetch_assoc($subject);
			?>
		</tr>
		<?php } while($row_student = mysqli_fetch_assoc($student)); ?>	
	</table>
	
	<input type="submit" name="submit" value="ثبت نمرات" class="btn btn-primary">
	
	</form>
	
</div>

<?php } else { ?>

	<div class="alert alert-warning">
		در صنف مورد نظر هیچ شاگردی ثبت نشده است!
	</div>

<?php } ?>


<?php require_once("footer.php"); ?>