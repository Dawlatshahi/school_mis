<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 9, 9, 9, 9, 1, 9);

	if(isset($_POST["out_quantity"])) {
		$stock_id = $_POST["stock_id"];
		$out_date = $_POST["out_date"];
		$out_quantity = $_POST["out_quantity"];
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "INSERT INTO stock_out VALUES(NULL, $stock_id, '$out_date', $out_quantity, '$remark')");
		
		if($result){
				mysqli_query($con, "UPDATE stock SET quantity = quantity - $out_quantity WHERE stock_id = $stock_id");
				header("location:stock_out_list.php?insert=done");
		}
		else{
				header("location:stock_out.php?error=notinsert");
		}
	}
	
	
	$stock = mysqli_query($con, "SELECT * FROM stock WHERE stock_id ORDER BY stock_id DESC");
	$row_stock = mysqli_fetch_assoc($stock);
?>



<?php require_once("top.php"); ?>


<h2>ثبت خروج جنس از گدام</h2>
<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">
		<div class="input-group">
			<span class="input-group-addon">لیست اجناس</span>
			<select name="stock_id" class="form-control">
				<?php do { ?>
				<option value="<?php echo $row_stock["stock_id"]; ?>"><?php echo 
				$row_stock["item_name"]; ?>
				</option>
				<?php } while($row_stock = mysqli_fetch_assoc($stock)); ?>
			</select>
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">تاریخ خروج جنس</span>
					<input type="text" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" name="out_date" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">مقدار / تعداد</span>
					<input type="text" name="out_quantity" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">ملاحظات</span>
					<input type="text" name="remark" class="form-control">
		</div>
		
		<input type="submit" value="خارج نمودن جنس" class="btn btn-primary btn-block">
</form>		
</div>
<?php require_once("footer.php"); ?>