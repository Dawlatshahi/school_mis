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
			$condition = " WHERE reg_no = $type";
		}
		else{
		$condition = "WHERE reg_no='$q' OR firstname LIKE '%$q%' OR fathername LIKE '%$q%' OR section_name LIKE '%$q%' ";
		}
	}

	$student = mysqli_query($con, "SELECT * FROM student INNER JOIN class_section ON class_section.section_id = student.section_id $condition ORDER BY student.section_id ASC");
	$row_student = mysqli_fetch_assoc($student);
	$totalRows_student = mysqli_num_rows($student);
?>

<?php require_once("top.php"); ?>


<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>"	type="text" name="q" class="myform-control" placeholder="جستجوی شاگرد...">
		<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-search"></span>
		جستجو
		</button>
	</form>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="student_attendance.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-time"></span>
		حاظری شاگردان
	</a>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="student_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span>
		ثبت نام شاگرد
	</a>
</div>



<h2>لیست شاگردان</h2>
	<br>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ثبت شاگرد موفقانه انجام شد.
	</div>
<?php } ?>	
		
<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف معلومات شاگرد موفقانه انجام شد.
	</div>
<?php } ?>		
		
<?php if(isset($_GET["q"])) { ?>

	<div class="panel panel-info"> 
		<div class="panel-heading">
			<b>تعداد نتایج به دست امده:
			<?php echo $totalRows_student; ?><b>
		</div>
	</div>
<?php } ?>

<?php if($totalRows_student == 0) { ?>
		<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
		</div>
<?php } ?>	
<?php if($totalRows_student > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>نمبر اساس</th>
		<th>نام شاگرد</th>
		<th>نام پدر</th>
		<th>صنف</th>
		<th>نوعیت</th>
		<th>عکس</th>
		<th>جزییات</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_student["reg_no"]; ?></td>
		<td><?php echo $row_student["firstname"]; ?></td>
		<td><?php echo $row_student["fathername"]; ?></td>
		<td><?php echo $row_student["section_name"]; ?></td>
		<td>
			<?php
				if($row_student["reg_no"] == "") {
					echo "غیررسمی";
				}
				else {
					echo "رسمی";
				}
			?>
		</td>
		<td><img src="<?php echo $row_student["photo"]; ?>" width="50" height="50" class="img-circle"></td>
		<td>
			<a href="student_detail.php?student_id=<?php echo $row_student["student_id"]; ?>">
				<span class="glyphicon glyphicon-list-alt"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
	
</table>
<?php } ?>

<?php require_once("footer.php"); ?>