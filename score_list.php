<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 1, 1, 9, 9, 9, 9, 9, 9 );
	$student = mysqli_query($con, "SELECT student_id, reg_no, firstname, fathername FROM student ORDER BY firstname ASC, reg_no ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	$class = mysqli_query($con, "SELECT * FROM classes");
	$row_class = mysqli_fetch_assoc($class);
	$totalRows_class = mysqli_num_rows($class);
	
	if(isset($_GET["student_id"])) { 
		$student_id = $_GET["student_id"];
		$class_id = $_GET["class_id"];
		
		$score = mysqli_query($con, "SELECT * FROM score INNER JOIN subject ON subject.subject_id = score.subject_id INNER JOIN class_section ON class_section.section_id = score.section_id WHERE score.student_id = $student_id AND class_section.class_id=$class_id");
		$row_score = mysqli_fetch_assoc($score);
		$totalRows_score = mysqli_num_rows($score);
	}
	
?>
<?php require_once("top.php"); ?>

<?php if(isset($_GET["student_id"])) { ?>
<a href="score_print.php?student_id=<?php echo $_GET["student_id"]; ?>&class_id=<?php echo $_GET["class_id"]; ?>" class="btn btn-primary pull-left">
	<span class="glyphicon glyphicon-print"></span>
	چاپ نتایج
</a>
<?php } ?>

<h2>لیست نمرات و نتایج</h2>

<br>


<form method="get">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

	<div class="input-group">
		<span class="input-group-addon">
			شاگرد: 
		</span>
		<select name="student_id" class="form-control">
			<?php do { ?>
				<option <?php if(isset($_GET["student_id"]) && $_GET["student_id"] == $row_student["student_id"]) echo "selected"; ?> value="<?php echo $row_student["student_id"]; ?>">
					<?php echo $row_student["firstname"]; ?> - 
					<?php echo $row_student["fathername"];?> 
					(<?php echo $row_student["reg_no"]; ?>)
				</option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	</div>
	
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
	<div class="input-group">
		<span class="input-group-addon">
			صنف: 
		</span>
		<select name="class_id" class="form-control">
			<?php do { ?>
				<option <?php if(isset($_GET["class_id"]) && $_GET["class_id"] == $row_class["class_id"]) echo "selected"; ?> value="<?php echo $row_class["class_id"]; ?>">
					<?php echo $row_class["class_name"]; ?>
				</option>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
		</select>
		<span class="input-group-btn">
			<input type="submit" value="نمایش نمرات" class="btn btn-primary">
		</span>
	</div>
	</div>
	
</form>

<?php if(isset($_GET["student_id"])) { ?>

<?php if($totalRows_score > 0) { ?>

<?php if($totalRows_class > 0) { ?>
<div class="table-responsive">
<table class="table table-striped table-bordered">
	<tr>
		<th>نام مضمون</th>
		<th>نمره چهارونیم ماه</th>
		<th>نمره سالانه</th>
		<th>نمره مشروطی</th>
		<th>نمره نهایی</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_score["subject_name"]; ?></td>
		<td><?php echo $row_score["mid_exam"]; ?></td>
		<td><?php echo $row_score["final_exam"]; ?></td>
		<td><?php echo $row_score["second_chance"]; ?></td>
		<td><?php echo $row_score["total_mark"]; ?></td>
		
		<td>
			<a href="score_edit.php?class_id=<?php echo $_GET["class_id"]; ?>&student_id=<?php echo $row_score["student_id"]; ?>&subject_id=<?php echo $row_score["subject_id"]; ?>&exam_year=<?php echo $row_score["exam_year"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="score_delete.php?class_id=<?php echo $_GET["class_id"]; ?>&student_id=<?php echo $row_score["student_id"]; ?>&subject_id=<?php echo $row_score["subject_id"]; ?>&exam_year=<?php echo $row_score["exam_year"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
		
	</tr>
	<?php } while($row_score = mysqli_fetch_assoc($score)); ?>
	
</table>
</div>
<?php } ?>
<?php } else { ?>
	
	<br><br>
	
	<div class="panel panel-danger">
		<div class="panel-heading">
		برای شاگرد انتخاب شده در صنف مورد نظر نمرات درج نشده است!
		</div>
	</div>
	
<?php } ?>

<?php } ?>


<?php require_once("footer.php"); ?>