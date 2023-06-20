<?php require_once("connection.php"); 
	checkLevel(1, 9, 9, 9, 9, 9, 9, 9, 9);
?>


<?php 
	
	if(isset($_POST["new"])) {
		$pass = $_POST["new"];
		$result = mysqli_query($con,"UPDATE users SET password =
		PASSWORD('$pass') WHERE staff_id =" . $_GET["staff_id"]);
		
		if($result) {
			
			header("location:staff_user.php?reset=done");
		}
		else{
			header("location:staff_user_reset.php?error=notupdate&staff_id=" . $_GET["staff_id"]);
		}
	}
	
?>
<?php require_once("top.php"); ?>
<a href="staff_user.php" class="pull-left btn btn-primary" style="margin-left:20px;">
	<span class="glyphicon glyphicon-arrow-left"></span>
	برگشت
</a>
<h2>تغیر رمز عبور </h2> 
<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<form method="post" id="password">
	<div class="input-group">
		<span class="input-group-addon">رمز جدید</span>
	<input type="password" id="new" name="new" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">تکرار رمز</span>
	<input type="password" id="confirm" class="form-control">
	</div>
	
	<input type="submit" value="تغییر رمز عبور" class="btn btn-primary btn-block">
	
</form>
</div>
<?php require_once("footer.php"); ?>