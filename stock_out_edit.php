<?php require_once("connection.php"); ?>
<?php 

checkLevel(1, 9, 9, 9, 9, 9, 9, 4, 9);

	$stock_out = mysqli_query($con, "SELECT * FROM stock_out WHERE stock_out_id = " . $_GET["stock_out_id"]);
	$row_stock_out = mysqli_fetch_assoc($stock_out);

	if(isset($_POST["out_quanttiy"])) {
		$stock_id = $_POST["stock_id"];
		$out_date = $_POST["out_date"];
		$out_quanttiy = $_POST["out_quanttiy"];
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "UPDATE stock_out SET stock_id=$stock_id, out_date='$out_date', out_quanttiy=$out_quanttiy, remark='$remark' WHERE stock_out_id = " . $_GET["stock_out_id"]);
		
		if($result){
				mysqli_query($con, "UPDATE stock SET quantity = quantity + " . $row_stock_out["quantity"] . " WHERE stock_id = $stock_id");
				mysqli_query($con, "UPDATE stock SET quantity = quantity - $out_quanttiy WHERE stock_id = $stock_id");
				header("location:stock_out_list.php?stock_id= " . $_GET["stock_id"] . "&edit=done");
		}
		else{
				header("location:stock_out.php?stock_id=" . $_GET["stock_id"] . "&error=notedit");
		}
	}
		
	$stock = mysqli_query($con, "SELECT * FROM stock");
	$row_stock = mysqli_fetch_assoc($stock);
	
?>



<?php require_once("top.php"); ?>


<h2>ویرایش جنس خارجه</h2>
<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">
		<div class="input-group">
			<span class="input-group-addon">جنس</span>
			<select name="stock_id" class="form-control">
				<?php do { ?>
				<option <?php if($row_stock["stock_id"] == $row_stock_out["stock_id"]) echo "selected"; ?> value="<?php echo $row_stock["stock_id"];?>">
					<?php echo $row_stock["item_name"]; ?>
				</option>
				<?php }while($row_stock = mysqli_fetch_assoc($stock)); ?>
			</select>
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">تاریخ وارد</span>
					<input type="text" value="<?php echo $row_stock_out["out_date"]; ?>" name="out_date" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">مقدار / تعداد</span>
					<input value="<?php	echo $row_stock_out["out_quanttiy"]; ?>" type="text" name="out_quanttiy" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">ملاحظات</span>
					<input value="<?php echo $row_stock_out["remark"];?>" type="text" name="remark" class="form-control">
		</div>
		
		<input type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block">
</form>		
</div>
<?php require_once("footer.php"); ?>