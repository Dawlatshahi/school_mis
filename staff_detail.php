<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 1, 9, 9, 9, 9);
	$staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = " . $_GET["staff_id"]);
	$row_staff = mysqli_fetch_assoc($staff);
	
?>
<?php require_once("top.php"); ?>

	<a href="staff_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>

	<div class="pull-left button" style="padding-top:8px;padding-left:8px; margin-left:100px;">
		<a class="delete" href="staff_delete.php?staff_id=<?php echo $_GET["staff_id"]; ?>">
			حذف
			<span class="glyphicon glyphicon-trash"></span>
		</a>
		
		&nbsp; &nbsp; 
		
		<a href="staff_edit.php?staff_id=<?php echo $_GET["staff_id"]; ?>">
			ویرایش
			<span class="glyphicon glyphicon-edit"></span>
		</a>
	</div>

	<h2>معلومات کارمند</h2>

	<br>
	<?php if(isset($_GET["edit"]))	{ ?>
	<div class="alert alert-success alert-dismissable">	
		عملیه ویرایش موفقانه انجام شد.
	</div>	
<?php } ?>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف به دلیل گزارش معاشات صورت نگرفت!
	</div>
<?php   } ?>
	
	<img src="<?php echo $row_staff["photo"]; ?>" width="150" class="pull-left img-circle" style="margin-left:20px;margin-bottom:10px;">
	
	<table class="table table-striped pull-right" style="width:50%;">
		<tr>
			<td width="20%">شماره: </td>
			<td><?php echo $row_staff["staff_id"]; ?></td>
		</tr>
		
		<tr>
			<td>نام: </td>
			<td><?php echo $row_staff["firstname"]; ?></td>
		</tr>
		
		<tr>
			<td>تخلص: </td>
			<td><?php echo $row_staff["lastname"]; ?></td>
		</tr>
		
	</table>
	
	<table class="table table-striped">
		
		<tr>
			<td width="20%">نام پدر: </td>
			<td><?php echo $row_staff["fathername"]; ?></td>
		</tr>
		
		<tr>
			<td>جنسیت: </td>
			<td><?php echo $row_staff["gender"]==0 ? "مرد" : "زن";  ?></td>
		</tr>
		
		<tr>
			<td width="20%">سال تولد: </td>
			<td><?php echo $row_staff["birth_year"]; ?></td>
		</tr>
		
		<tr>
			<td>نمبر تذکره: </td>
			<td><?php echo $row_staff["nic"]; ?></td>
		</tr>
		
		<tr>
			<td>شماره تماس:</td>
			<td><?php echo $row_staff["phone"]; ?></td>
		</tr>
		
		<tr>
			<td>ایمیل آدرس: </td>
			<td><?php echo $row_staff["email"]; ?></td>
		</tr>
		
		<tr>
			<td>ولایت: </td>
			<td><?php echo $row_staff["province"]; ?></td>
		</tr>
		
		<tr>
			<td>ولسوالی:</td>
			<td><?php echo $row_staff["district"]; ?></td>
		</tr>
		
		<tr>
			<td>قریه:</td>
			<td><?php echo $row_staff["village"]; ?></td>
		</tr>
		
		<tr>
			<td>آدرس فعلی:</td>
			<td><?php echo $row_staff["current_address"]; ?></td>
		</tr>
		
		<tr>
			<td>وظیفه:</td>
			<td><?php echo $row_staff["position"]; ?></td>
		</tr>
		
		<tr>
			<td>معاش:</td>
			<td><?php echo $row_staff["gross_salary"]; ?> افغانی</td>
		</tr>
		
		<tr>
			<td>وضعیت:</td>
			<td><?php echo $row_staff["status"]==1 ? "برحال" : "غیربرحال"; ?></td>
		</tr>
		
	</table>
	

<?php require_once("footer.php"); ?>