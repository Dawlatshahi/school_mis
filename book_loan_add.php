<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 9, 9, 2, 9, 9);
	$student = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student WHERE student_id IN (SELECT student_id FROM lib_member) ORDER BY firstname ASC, fathername ASC");
	$row_student = mysqli_fetch_assoc($student);
	
	$book = mysqli_query($con, "SELECT book_id, book_name FROM lib_book ORDER BY book_name ASC");
	$row_book = mysqli_fetch_assoc($book);
	
	if(isset($_POST["loan_date"])) {
		$student_id = $_POST["student_id"];
		$book_id = $_POST["book_id"];
		$loan_date = $_POST["loan_date"];
		
		$result = mysqli_query($con, "INSERT INTO lib_loan VALUES (NULL, $student_id, $book_id, '$loan_date', NULL)");
		
		if($result) {
			header("location:book_loan_add.php?add=done");
		}
		else {
			header("location:book_loan_add.php?error=notadd");
		}
	}
	
?>
<?php require_once("top.php"); ?>

<h2>ثبت امانت جدید</h2>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success">
		کتاب مورد نظر با موفقیت امانت داده شد!
	</div>
<?php } ?>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
			شاگرد:
		</span>
		<select name="student_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"]; ?>، <?php echo $row_student["fathername"]; ?> (<?php echo $row_student["student_id"]; ?>)</option>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			کتاب:
		</span>
		<select name="book_id" class="form-control">
			<?php do { ?>
				<option value="<?php echo $row_book["book_id"]; ?>"><?php echo $row_book["book_name"]; ?></option>
			<?php } while($row_book = mysqli_fetch_assoc($book)); ?>
		</select>
	</div>
	
	
	<div class="input-group">
		<span class="input-group-addon">
			تاریخ امانت دادن:
		</span>
		<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="loan_date" class="form-control">
	</div>
	
	<input type="submit" value="امانت دادن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>