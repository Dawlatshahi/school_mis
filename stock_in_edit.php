<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 9, 9, 9, 9, 4, 9);

	if(isset($_POST["in_quantity"])) {
		$stock_id = $_POST["stock_id"];
		$in_date = $_POST["in_date"];
		$in_quantity = $_POST["in_quantity"];
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "UPDATE stock_in SET stock_id=$stock_id, in_date='$in_date', in_quantity=$in_quantity, remark='$remark' WHERE stock_in_id = " . $_GET["stock_in_id"]);
		
		if($result){
				mysqli_query($con, "UPDATE stock SET quantity = quantity + $in_quantity WHERE stock_id = $stock_id");
				header("location:stock_in_list.php?stock_id= " . $_GET["stock_id"] . "&edit=done");
		}
		else{
				header("location:stock_in_list.php?stock_id=" . $_GET["stock_id"] . "&error=notedit");
		}
	}
		
	$stock = mysqli_query($con, "SELECT * FROM stock");
	$row_stock = mysqli_fetch_assoc($stock);
	
	$stock_in = mysqli_query($con, "SELECT * FROM stock_in WHERE stock_in_id = " . $_GET["stock_in_id"]);
	$row_stock_in = mysqli_fetch_assoc($stock_in);
?>



<?php require_once("top.php"); ?>


<h2>ویرایش جنس وارده</h2>
<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">
		<div class="input-group">
			<span class="input-group-addon">جنس</span>
			<select name="stock_id" class="form-control">
				<?php do { ?>
				<option <?php if($row_stock["stock_id"] == $row_stock_in["stock_id"]) echo "selected"; ?> value="<?php echo $row_stock["stock_id"];?>">
					<?php echo $row_stock["item_name"]; ?>
				</option>
				<?php }while($row_stock = mysqli_fetch_assoc($stock)); ?>
			</select>
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">تاریخ وارد</span>
					<input type="text" value="<?php echo $row_stock_in["in_date"]; ?>" name="in_date" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">مقدار / تعداد</span>
					<input value="<?php	echo $row_stock_in["in_quantity"]; ?>" type="text" name="in_quantity" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">ملاحظات</span>
					<input value="<?php echo $row_stock_in["remark"];?>" type="text" name="remark" class="form-control">
		</div>
		
		<input type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block">
</form>		
</div>
<?php require_once("footer.php"); ?>