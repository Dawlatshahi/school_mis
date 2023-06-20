<?php
	require_once("connection.php");

	if(isset($_SESSION["login"])) { 
		header("location:home.php");
	}
	
	if(isset($_POST["username"])) { 	
		$user = getValue($_POST["username"]);
		$pass = getValue($_POST["password"]);
		
		$result = mysqli_query($con, "SELECT * FROM users INNER JOIN user_level ON users.staff_id = user_level.staff_id WHERE username='$user' AND password=PASSWORD('$pass') ");
		
		if(mysqli_num_rows($result) == 1) {
			$row_result = mysqli_fetch_assoc($result);
			$_SESSION["login"] = $row_result["staff_id"];
			
			$_SESSION["admin_level"] = $row_result["admin_level"];
			$_SESSION["academic_level"] = $row_result["acadmic_level"];
			$_SESSION["student_level"] = $row_result["student_level"];
			$_SESSION["teacher_level"] = $row_result["teacher_level"];
			$_SESSION["staff_level"] = $row_result["staff_level"];
			$_SESSION["finance_level"] = $row_result["finance_level"];
			$_SESSION["stock_level"] = $row_result["stock_level"];
			$_SESSION["library_level"] = $row_result["library_level"];
			$_SESSION["it_level"] = $row_result["it_level"];
			
			header("location:home.php");
		} 
		else {
			header("location:login.php?login=failed");
		}
	}

?>
<?php require_once("top.php"); ?>

				<a href="index.php" class="btn btn-primary pull-left col-md-3" style="margin-left:20px;">
				برگشت به ویب سایت 
				<span class="glyphicon glyphicon-arrow-left"></span>
				
				</a>
				
				
				
	<div class="pull-left text-center col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">
	  
	  
	 
	  
	  
	  
		<h1>ورود به سیستم</h1>
	<?php if(isset($_GET["login"])){ ?>
		<div class="alert alert-danger alert-dismissable">
			<button class="close" data-dismiss="alert" area-hiddent="true">&times;</button>
			نام کاربری یا رمز ورود اشتباه است!
		</div>
	<?php } ?>	
	
	<?php if(isset($_GET["logout"])){ ?>
		<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		شما با موفقانه از سیستم خارج شده اید!
		</div>
	<?php } ?>
		
	
	
	<?php if(isset($_GET["notlogin"])){ ?>
		
		<div class="alert alert-danger alert-dismissable">
			<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
			شما به سیستم داخل نشده اید!
		</div>	
	<?php } ?>
	
	
				
				<div class="clearfix">
	  
	
				<form method="post">
					
						<div class="input-group">
							<span class="input-group-addon">نام کاربر:</span>
							<input style="direction:ltr;" class="form-control" type="text" name="username">
						</div>
						
						<div class="input-group">
							<span class="input-group-addon">رمزعبور:</span>
							<input style="direction:ltr;" class="form-control" type="password" name="password">
						</div>
						
						<button class="btn btn-primary btn-block pull-right">
							<span class="glyphicon glyphicon-log-in" style="color:white;"></span>
							ورود &nbsp;
						</button>
				</form>
				
				<br>
				<br>
				<br><br>
				<br>
				<br>
				
				
				
				<br>
				<br>
				<br>
				
	</div>
        
<?php require_once("footer.php"); ?>