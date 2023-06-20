<?php require_once("connection.php"); ?>

<?php 
		checkLevel(1, 9, 9, 9, 9, 9, 9, 9, 2);
	$staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id NOT IN 
	(SELECT staff_id FROM users)");
	
	$row_staff = mysqli_fetch_assoc($staff);
	
	if(isset($_POST["username"])) {
			$id = $_POST["staff_id"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$result = mysqli_query($con, "INSERT INTO users VALUES ($id, 
			'$username', PASSWORD('$password'))");
			
			mysqli_query($con, "INSERT INTO user_level (staff_id)
			VALUES ($id)");
			
			if($result){
				header("location:staff_user.php?create=done");
			}
			else{
				header("location:staff_user_add.php?error=notcreate");
			}
	}
?>
<?php require_once("top.php"); ?>

<h2>ساختن حساب جدید</h2>
<br>

 <?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		حساب جدید ساخته نشد! لطفا دوباره کوشش نمایید.
	</div>
 <?php } ?>

<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post" id="password">
	<div class="input-group">
		<span class="input-group-addon">
		کارمند:
		</span>
		<select name="staff_id" class="form-control"> 
			<?php do { ?>
			<option value="<?php echo $row_staff["staff_id"]; ?>"><?php echo 
			$row_staff["firstname"] . " " . $row_staff
			["lastname"]; ?>
			</option>
			<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
		</select>
	</div>

	<div class="input-group">
		<span class="input-group-addon">نام حساب:
		</span>
		
		<input type="text" name="username" class="form-control"> 
	</div>
	 
	<div class="input-group">
		<span class="input-group-addon">
			رمز جدید:
		</span>
		<input type="password" id="new" name="password" class="form-control"> 
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تکرار رمز:
		</span>
		<input type="password" id="confirm" class="form-control"> 
	</div>
	 
	<input type="submit"  value="ساختن" class="btn btn-primary btn-block">
	
</form>
</div>
<?php require_once("footer.php"); ?>