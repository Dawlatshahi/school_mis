<?php require_once("connection.php")?>

<?php 
	checkLevel(1, 9, 1, 9, 9, 9, 9, 9, 9);

	$student = mysqli_query($con, "SELECT * FROM student INNER JOIN class_section ON class_section.section_id = student.section_id WHERE student_id = " . $_GET["student_id"]);
	$row_student = mysqli_fetch_assoc($student);
?>

<?php require_once("top.php"); ?>
	
	<a href="student_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
	
	<div class="pull-left button" style="padding-top:8px; padding-left:8px; margin-left:100px;">
		<a class="delete" href="student_delete.php?student_id=<?php echo $_GET["student_id"]; ?>">حذف
			<span class="glyphicon glyphicon-trash"></span>
		</a>
		&nbsp; &nbsp; 
		<a href="student_edit.php?student_id=<?php echo $_GET["student_id"]; ?>">ویرایش
		<span class="glyphicon glyphicon-edit"></span>
		</a>
	</div>
	
	<h2>معلومات شاگردان</h2>
	<br>
	
	<?php if(isset($_GET["edit"])) { ?>
		<div class="alert alert-success alert-dismissable">
			عملیه ویرایش معلومات شاگرد موفقانه انجام شد.
		</div>
	<?php } ?>
	
	
	<img src="<?php echo $row_student["photo"]; ?>" width="150px" class="pull-left img-circle" style="margin-left:20px; margin-bottom:20px;">
	
	<table class="table table-striped" style="width:50%;">
		<tr>
		<td width="40%">شماره:</td>
		<td><?php echo $row_student["student_id"]; ?></td>
		</tr> 
		
		<tr>
		<td>نمبر اساس:</td>
		<td>
		<?php
			if($row_student["reg_no"] == "") {
				echo "غیر رسمی";
			}
			else {
				echo $row_student["reg_no"];
			}
		?>
		</td>
		</tr>
	
		<tr>
		<td>نام: </td>
		<td><?php echo $row_student["firstname"]; ?> </td>
		</tr>
		
		<td>نام پدر: </td> 
		<td><?php echo $row_student["fathername"]; ?></td>
		</tr>
		</table>
		
		<table class="table table-striped">
		
		<tr>
		<td width="20%">نام پدرکلان</td>
		<td><?php echo $row_student["grandfathername"]; ?></td>
		</tr>
		
		<tr>
		<td>جنسیت:</td>
		<td><?php echo $row_student["gender"]==0 ? "مرد" : "زن"; ?> </td>
		</tr>
		
		<tr>
		<td>سال تولد:</td>
		<td><?php echo $row_student["birth_year"]; ?> </td>
		</tr>
		
		<tr>
		<td>ولایت:</td>
		<td><?php echo $row_student["province"]; ?></td>
		</tr>
		
		<tr>
		<td>ولسوالی:</td>
		<td><?php echo $row_student["district"]; ?> </td>
		<tr>
		
		<tr> 
		<td>قریه:</td>
		<td><?php echo $row_student["village"]; ?></td>
		<tr>
		
		<tr> 
		<td>آدرس فعلی:</td>
		<td><?php echo $row_student["current_address"]; ?></td>
		<tr>
		
		<tr> 
		<td>نمبر تذکره:</td>
		<td><?php echo $row_student["nic"]; ?></td>
		<tr>
		
		<tr> 
		<td>شماره تماس:</td>
		<td><?php echo $row_student["phone"]; ?></td>
		<tr>
		
		<tr>
		<td>وضعیت:</td>
		<td>
		<?php echo $row_student["status"]==1 ? "برحال" : "غیر برحال"; ?>
		</td>
		</td>
		
		<tr> 
		<td>صنف:</td>
		<td><?php echo $row_student["section_name"]; ?></td>
		<tr>
		
	</table>
<?php require_once("footer.php"); ?>