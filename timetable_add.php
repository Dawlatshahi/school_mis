<?php require_once("connection.php"); 
checkLevel(1, 2, 9, 9, 9, 9, 9, 9, 9 );
?>
<?php
	$teacher = mysqli_query($con, "SELECT teacher_id, CONCAT(firstname, ' ', lastname) AS teacher_name FROM teacher ORDER BY firstname ASC, lastname ASC");
	$row_teacher = mysqli_fetch_assoc($teacher);

	$section_id = $_GET["section_id"];
	$subject = mysqli_query($con, "SELECT subject_id, subject_name FROM subject INNER JOIN class_section ON class_section.class_id = subject.class_id WHERE section_id=$section_id ORDER BY subject_name ASC");
	$row_subject = mysqli_fetch_assoc($subject);
	
	if(isset($_POST["weekday"])) { 
		$weekday = $_POST["weekday"];
		$lesson_hour = $_POST["lesson_hour"];
		$teacher_id = $_POST["teacher_id"];
		$subject_id = $_POST["subject_id"];
		$section_id = $_GET["section_id"];
		
		$result = mysqli_query($con, "INSERT INTO timetable VALUES ($weekday, $lesson_hour, $teacher_id, $subject_id, $section_id)");
		
		if($result) {
			header("location:timetable_add.php?add=done&section_id=" . $_GET["section_id"]);
		}
		else {
			header("location:timetable_add.php?error=notadd&section_id=" . $_GET["section_id"] . "&weekday=" . $_POST["weekday"] . "&lesson_hour=" . $_POST["lesson_hour"]);
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<h2>ساختن تقسیم اوقات</h2>

<br>

<form method="post">

	<?php if(isset($_GET["error"])) { ?>
		<div class="alert alert-danger">
			استاد مورد نظر در روز 
			<?php
				switch($_GET["weekday"]) {
					case 0:
						echo "شنبه";
					break;
					case 1:
						echo "یکشنبه";
					break;
					case 2:
						echo "دوشنبه";
					break;
					case 3:
						echo "سه شنبه";
					break;
					case 4:
						echo "چهارشنبه";
					break;
					case 5:
						echo "پنج شنبه";
					break;
				}
			?>
			و ساعت 
			<?php switch($_GET["lesson_hour"]) {
						case 1:
							echo "اول";
						break;
						case 2:
							echo "دوم";
						break;
						case 3:
							echo "سوم";
						break;
						case 4:
							echo "چهارم";
						break;
						case 5:
							echo "پنجم";
						break;
						case 6:
							echo "ششم";
						break;
						
			} ?>
			درس دارد!
		</div>
	<?php } ?>


	<div class="input-group">
		<span class="input-group-addon">
			روز هفته:
		</span>
		<select name="weekday" class="form-control">
			<option value="0">شنبه</option>
			<option value="1">یکشنبه</option>
			<option value="2">دوشنبه</option>
			<option value="3">سه شنبه</option>
			<option value="4">چهارشنبه</option>
			<option value="5">پنج شنبه</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			ساعت درسی:
		</span>
		<select name="lesson_hour" class="form-control">
			<option value="1">اول</option>
			<option value="2">دوم</option>
			<option value="3">سوم</option>
			<option value="4">چهارم</option>
			<option value="5">پنجم</option>
			<option value="6">ششم</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			مضمون:
		</span>
		<select name="subject_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_subject["subject_id"]; ?>"><?php echo $row_subject["subject_name"]; ?></option>
			<?php } while($row_subject = mysqli_fetch_assoc($subject)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			معلم:
		</span>
		<select name="teacher_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_teacher["teacher_id"]; ?>"><?php echo $row_teacher["teacher_name"]; ?></option>
			<?php } while($row_teacher = mysqli_fetch_assoc($teacher)); ?>
		</select>
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
</form>


<?php require_once("footer.php"); ?>