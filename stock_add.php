<?php 

	require_once("connection.php");
		checkLevel(2, 9, 9, 9, 9, 9, 9, 2, 9);
		
		if(isset($_POST["item_name"])){
			$item_name = $_POST["item_name"];
			$unit = $_POST["unit"];
			$quantity = $_POST["quantity"];
		
		if(mysqli_query($con, "INSERT INTO stock VALUES (NULL, '$item_name', '$unit', '$quantity')")) {
			header("location:stock_list.php?add=done");
		}
		else{
			header("location:stock_add.php?error=notinsert");
		}
	}
?>

<?php require_once("top.php"); ?>
	
<a href="stock_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
</a>	
	
	<h2>ثبت جنس جدید</h2>
	
	<?php if(isset($_GET["error"])) { ?>
	
		<div class="alert alert-danger alert-dismissable">
			<button class="close" area-hidden="true" 
			data-dismiss="alert">&times;</button>
			عملیه ثبت انجام نشد! لطفا دوباره کوشش کنید.
		
		</div>
	
	<?php } ?>
	<br>
		
		<form method="post">
	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
				<div class="input-group">
					<span class="input-group-addon">جنس: </span>
					<input type="text" class="form-control" name="item_name">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">مقدار:</span>
					<input type="text" class="form-control" name="quantity">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">واحد: </span>
					<input type="text" class="form-control" name="unit">
				</div>
				
				<input type="submit" value="ثبت جنس" class="btn btn-primary btn-block"> 
			</div>
		</form>

<?php require_once("footer.php"); ?>