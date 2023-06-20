<?php require_once("connection.php"); ?>



<?php 
	checkLevel(1, 9, 9, 9, 9, 9, 2, 9, 9);
	$student = mysqli_query($con, "SELECT * FROM student WHERE student_id NOT IN
	(SELECT student_id FROM lib_member) ");
	
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["reg_date"])) {
			$student_id = $_POST["student_id"];
			$reg_date = $_POST["reg_date"];

			$result = mysqli_query($con, "INSERT INTO lib_member VALUES ('$student_id', 
			'$reg_date ')");

			if($result){
				header("location:lib_member_list.php?create=done");
			}
			else{
				header("location:lib_member_add.php?error=failed");
			}
	}
?>
<?php require_once("top.php"); ?>

<h2>عضو جدید</h2>
<br>

 <?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		حساب جدید ساخته نشد! لطفا دوباره کوشش نمایید.
	</div>
 <?php } ?>

<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
		شاگرد:
		</span>
		<select name="student_id" class="form-control"> 
			<?php do { ?>
			<option value="<?php echo $row_student["student_id"]; ?>"><?php echo 
			$row_student["firstname"]; ?>
			</option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>

	<div class="input-group">
		<span class="input-group-addon">تاریخ:
		</span>
		
		<input type="text" name="reg_date" class="form-control"> 
	</div>
	 
	<input type="submit"  value="ساختن" class="btn btn-primary btn-block">
	
</form>
</div>
<?php require_once("footer.php"); ?>