<?php require_once("connection.php"); 
checkLevel(1, 9, 9, 9, 9, 9, 4, 9, 9);
?>
<?php require_once("top.php"); ?>


<?php 
	
	$student = mysqli_query($con, "SELECT * FROM student WHERE student_id NOT IN
	(SELECT student_id FROM lib_member) ");
	
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["reg_date"])) {
			$student_id = $_POST["student_id"];
			$reg_date = $_POST["reg_date"];

			$result = mysqli_query($con, "UPDATE lib_member SET student_id = $student_id, 
			reg_date=$reg_date WHERE student_id = " . $_GET["student_id"]);

			if($result){
				header("location:lib_member_list.php?student_id =" . $_GET["student_id"] . "edit=done");
			}
			else{
				header("location:lib_member_edit.php?student_id =" . $_GET["student_id"] . "error=notedit");
			}
	}
?>


<h2>ویرایش</h2>
<br>

 <?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		عملیه ویرایش صورت نگرفت لطفا دوباره کوشش کنید.
	</div>
 <?php } ?>

<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">

	<div class="input-group">
					<span class="input-group-addon">نام شاگرد:</span>
					<input value="<?php echo $row_student["firstname"]; ?>" type="text" class="form-control" name="student_id">
				</div>
	
	<div class="input-group">
		<span class="input-group-addon">تاریخ:
		</span>
		
		<input value="<?php echo $row_student["reg_date"]; ?>" type="date" name="reg_date" class="form-control"> 
	</div>
	 
	<input type="submit"  value="ذخیره نمودن" class="btn btn-primary btn-block">
	
</form>
</div>
<?php require_once("footer.php"); ?>