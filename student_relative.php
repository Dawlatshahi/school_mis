<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 1, 9, 9, 9, 9, 9, 9 );
	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		
		if($q == "غیررسمی" || $q == "رسمی") {
			if($q == "غیررسمی") {
				$type ="";
			}
			else if($q == "رسمی") {
				$type = $row_student["reg_no"];
			}
			$condition = " WHERE student_type = $type";
		}
		else{
		$condition = "WHERE reg_no='$q' OR firstname LIKE '%$q%' OR fathername LIKE '%$q%' OR section_name LIKE '%$q%' ";
		}
	}

	$student = mysqli_query($con, "SELECT * FROM student INNER JOIN class_section ON class_section.section_id = student.section_id $condition ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	$totalRows_student = mysqli_num_rows($student);
?>
<?php require_once("top.php"); ?>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستحو شاگرد...">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
			جستحو
		</button>
	</form>
</div>

<h2>اقارب شاگردان</h2>
	<br>
	
<?php if(isset($_GET["q"])) { ?>
		
		<div class="panel panel-info">
			<div class="panel-heading">
			تعداد نتایج به دست امده:
			<?php echo $totalRows_student; ?>
			</div>
		</div>
<?php } ?>

<?php if($totalRows_student == 0) { ?>
		<div class="alert alert-danger">
			هیچ نتیجه به دست نیامد!
		</div>
<?php } ?>

<?php if($totalRows_student > 0) { ?>
	<table class="table table-striped">

	<tr>
		<th>نمبر اساس</th>
		<th>نام</th>
		<th>نام پدر</th>
		<th>صنف</th>
		<th>اقارب</th>
	</tr>
	<?php do { ?>
	<tr>
		<td><?php echo $row_student["reg_no"] == "" ? "غیررسمی" : $row_student["reg_no"]; ?></td>
		<td><?php echo $row_student["firstname"]; ?></td>
		<td><?php echo $row_student["fathername"]; ?></td>
		<td><?php echo $row_student["section_name"]; ?></td>
		<td>
			<a href="student_relative_detail.php?student_id=<?php echo $row_student["student_id"]; ?>" class="btn btn-primary">
				<span class="glyphicon glyphicon-paperclip"></span>
				جزییات
			</a>
		</td>
	</tr>
	<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
	
	
	</table>
<?php } ?>

<?php require_once("footer.php"); ?>