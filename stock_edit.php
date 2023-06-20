<?php 
	
	require_once("connection.php");
	checkLevel(1, 9, 9, 9, 9, 9, 9, 4, 9);
		
	$stock = mysqli_query($con, "SELECT * FROM stock WHERE stock_id = " . $_GET["stock_id"]);
	$row_stock = mysqli_fetch_assoc($stock);
	
	if(isset($_POST["item_name"])){
			$item_name = $_POST["item_name"];
			$unit = $_POST["unit"];
			$quantity = $_POST["quantity"];
		
		if(mysqli_query($con, "UPDATE stock SET item_name='$item_name',
		unit='$unit', quantity='$quantity' WHERE stock_id = " . $_GET["stock_id"])) {
			header("location:stock_list.php?stock_id=" . $_GET["stock_id"] . "&edit=done");
		}
		else{
			header("location:stock_edit.php?stock_id=" . $_GET["stock_id"] . "&error=notedit");
		}
	}

?>
<?php require_once("top.php"); ?> 
<a href="stock_list.php?stock_id=<?php echo $row_stock["stock_id"]; ?>" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
	<h2>ویرایش جنس</h2>
		
<?php if(isset($_GET["error"]))	{ ?>
	
	<div class="alert alert-danger alert-dismissable">	
		<button class="close" area-hidden="true" 
		data-dismiss="alert">&times;</button>
		عملیه ویرایش انجام نشد! لطفا دوباره کوشش کنید.
	</div>

<?php } ?>


	
		<br>
		
		<form method="post">
	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
				<div class="input-group">
					<span class="input-group-addon">جنس: </span>
					<input value="<?php echo $row_stock["item_name"]; ?>" type="text" class="form-control" name="item_name">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">مقدار:</span>
					<input value="<?php echo $row_stock["quantity"]; ?>" type="text" class="form-control" name="quantity">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">واحد: </span>
					<input value="<?php echo $row_stock["unit"]; ?>" type="text" class="form-control" name="unit">
				</div>
				
				<input type="submit" value="ثبت جنس" class="btn btn-primary btn-block"> 
			</div>
		</form>
		<br>
		<br>
		<br>
		

<?php require_once("footer.php"); ?>