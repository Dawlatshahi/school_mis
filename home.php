<?php require_once("restric.php"); ?>
<?php require_once("connection.php"); ?>
<?php
	$user = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = " . $_SESSION["login"]);
	$row_user = mysqli_fetch_assoc($user);
	
	$student = mysqli_query($con, "SELECT (SELECT COUNT(student_id) FROM student WHERE gender=0) AS total_boy, (SELECT COUNT(student_id) FROM student WHERE gender=1) AS total_girl ");
	$row_student = mysqli_fetch_assoc($student);
	
	$teacher = mysqli_query($con, "SELECT (SELECT COUNT(teacher_id) FROM teacher WHERE gender=0) AS total_boy, (SELECT COUNT(teacher_id) FROM teacher WHERE gender=1) AS total_girl ");
	$row_teacher = mysqli_fetch_assoc($teacher);
	
	$staff = mysqli_query($con, "SELECT (SELECT COUNT(staff_id) FROM staff WHERE gender=0) AS total_boy, (SELECT COUNT(staff_id) FROM staff WHERE gender=1) AS total_girl ");
	$row_staff = mysqli_fetch_assoc($staff);
	
?>
<?php require_once("top.php"); ?>
	  
<div style="padding:20px;">

<div class="panel panel-info">	  
	<div class="panel-heading">
		<h2 style="padding:0;">خوش آمدید </h2>
	</div>
	<div class="panel-body">
	<img width="100" src="<?php echo $row_user["photo"]; ?>" class="pull-left img-thumbnail">  	  
	<h1>
		<?php echo $row_user["firstname"]; ?>
		<?php echo $row_user["lastname"]; ?>
	</h1>

	<div class="clearfix"></div>
	
	<?php if(isset($_GET["authorize"])) { ?>
		<div class="alert alert-warning" style="margin-top:10px;">
			شما صلاحیت دسترسی به صفحه مورد نظر را ندارید!
		</div>
	<?php } ?>
	
	</div>
</div>	
	
<div class="panel panel-info">	  
	<div class="panel-heading">
		<h2 style="padding:0;">گزارش احصاییه</h2>
	</div>

	<div class="panel-body">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="alert-success" style="margin:0 auto;padding:10px;border-radius:8px;text-align:center;">
		تعداد شاگردان پسر: <?php echo $row_student["total_boy"]; ?> <br>
		<br>
		تعداد شاگردان دختر: <?php echo $row_student["total_girl"]; ?> <br>
		</div>
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="alert-success" style="margin:0 auto;padding:10px;border-radius:8px;text-align:center;">
		تعداد معلمین ذکور: <?php echo $row_teacher["total_boy"]; ?> <br>
		<br>
		تعداد معلمین اناث: <?php echo $row_teacher["total_girl"]; ?> <br>
		</div>
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="alert-success" style="margin:0 auto;padding:10px;border-radius:8px;text-align:center;">
		تعداد کارمندان ذکور: <?php echo $row_staff["total_boy"]; ?> <br>
		<br>
		تعداد کارمندان اناث: <?php echo $row_staff["total_girl"]; ?> <br>
		</div>
	</div>
	</div>
	
</div>	  
        
<?php require_once("footer.php"); ?>  