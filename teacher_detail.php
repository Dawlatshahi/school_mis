<?php require_once("connection.php")?>

<?php 
	checkLevel(1, 9, 9, 1, 9, 9, 9, 9, 9);
	$teacher = mysqli_query($con, "SELECT * FROM teacher WHERE teacher_id = " . $_GET["teacher_id"]);
	$row_teacher = mysqli_fetch_assoc($teacher);
?>

<?php require_once("top.php"); ?>
	
	<a href="teacher_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
	
	<div class="pull-left button" style="padding-top:8px; padding-left:8px; margin-left:100px;">
		<a class="delete" href="teacher_delete.php?teacher_id=<?php echo $_GET["teacher_id"]; ?>">حذف
			<span class="glyphicon glyphicon-trash"></span>
		</a>
		&nbsp; &nbsp; 
		<a href="teacher_edit.php?teacher_id=<?php echo $_GET["teacher_id"]; ?>">ویرایش
		<span class="glyphicon glyphicon-edit"></span>
		</a>
	</div>
	
	<h2>معلومات معلمین</h2>
	<br>
	
	<?php if(isset($_GET["edit"])) { ?>
		<div class="alert alert-success alert-dismissable">
			عملیه ویرایش معلومات معلم موفقانه انجام شد.
		</div>
	<?php } ?>
	
	<?php if(isset($_GET["error"])) { ?>
		<div class="alert alert-danger alert-dismissable">
		عملیه حذف معلم به دلیل گزارشات مالی صورت نگرفت.
		</div>
	<?php } ?>
	
	<img src="<?php echo $row_teacher["photo"]; ?>" width="150px" class="pull-left img-circle" style="margin-left:20px; margin-bottom:20px;">
	
	<table class="table table-striped" style="width:50%;">
		<tr>
		<td width="20%">شماره:</td>
		<td><?php echo $row_teacher["teacher_id"]; ?></td>
		</tr> 
		
		<tr>
		<td>نام:</td>
		<td><?php echo $row_teacher["firstname"]; ?> </td>
		</tr>
	
		<tr>
		<td>تخلص: </td>
		<td><?php echo $row_teacher["lastname"]; ?> </td>
		</tr>
		
		<td>نام پدر: </td> 
		<td><?php echo $row_teacher["fathername"]; ?></td>
		</tr>
		</table>
		
		<table class="table table-striped">
		<tr>
		<td width="20%">جنسیت:</td>
		<td><?php echo $row_teacher["gender"]==0 ? "مرد" : "زن"; ?> </td>
		</tr>
		
		<tr>
		<td>سال تولد:</td>
		<td><?php echo $row_teacher["birth_year"]; ?> </td>
		</tr>
		
		<tr> 
		<td>نمبر تذکره:</td>
		<td><?php echo $row_teacher["nic"]; ?> </td>
		</tr>
		
		<tr> 
		<td>شماره تماس:</td>
		<td><?php echo $row_teacher["phone"]; ?> </td>
		</tr>
		
		<tr> 
		<td>ایمیل آدرس:</td>
		<td><?php echo $row_teacher["email"]; ?></td>
		</tr>
		
		<tr>
		<td>ولایت:</td>
		<td><?php echo $row_teacher["province"]; ?></td>
		</tr>
		
		<tr>
		<td>ولسوالی:</td>
		<td><?php echo $row_teacher["district"]; ?> </td>
		<tr>
		
		<tr> 
		<td>قریه:</td>
		<td><?php echo $row_teacher["village"]; ?></td>
		<tr>
		
		<tr> 
		<td>آدرس فعلی:</td>
		<td><?php echo $row_teacher["current_address"]; ?></td>
		</tr>
		
		<tr> 
		<td>سند تحصیلی:</td>
		<td><?php echo $row_teacher["education_degree"]; ?></td>
		<tr>
		
		<tr> 
		<td>رشته تحصیلی:</td>
		<td><?php echo $row_teacher["education_field"]; ?></td>
		</tr>
		
		<tr> 
		<td>دانشگاه:</td>
		<td><?php echo $row_teacher["education_university"]; ?></td>
		<tr>
		
		<tr> 
		<td>سال فراغت:</td>
		<td><?php echo $row_teacher["graduation_year"]; ?></td>
		</tr>
		
		<tr> 
		<td>نمره کادری:</td>
		<td><?php echo $row_teacher["talent_score"]; ?></td>
		<tr>
		
		<tr> 
		<td>معاش:</td>
		<td><?php echo $row_teacher["gross_salary"]; ?> افغانی</td>
		</tr>
		
		<tr> 
		<td>امتیازرییس دیپارتمنت:</td>
		<td><?php echo $row_teacher["hod_bonus"]; ?> افغانی</td>
		<tr>
		
		<tr> 
		<td>امتیازتحصیلی:</td>
		<td><?php echo $row_teacher["talent_bonus"]; ?> افغانی</td>
		</tr>
		
		<tr> 
		<td>امتیاز اکادمی:</td>
		<td><?php echo $row_teacher["academic_bonus"]; ?> افغانی</td>
		<tr>
		
		<tr> 
		<td>پول غذا:</td>
		<td><?php echo $row_teacher["food_charge"]; ?> افغانی</td>
		</tr>
		
		<tr>
		<td>وضعیت:</td>
		<td><?php echo $row_teacher["status"]==1? "برحال" : "غیربرحال"; ?></td>
		</td>
		
	</table>
<?php require_once("footer.php"); ?>