<?php require_once("connection.php"); ?>

<?php 
checkLevel(1, 9, 9, 9, 9, 9, 9, 1, 9);
		
	if(isset($_POST["in_quantity"])) {
		$stock_id = $_POST["stock_id"];
		$in_date = $_POST["in_date"];
		$in_quantity = $_POST["in_quantity"];
		$remark = $_POST["remark"];
		
		$result = mysqli_query($con, "INSERT INTO stock_in VALUES(NULL, $stock_id, '$in_date', $in_quantity, '$remark')");
		
		if($result){
				mysqli_query($con, "UPDATE stock SET quantity = quantity + $in_quantity WHERE stock_id = $stock_id");
				header("location:stock_in_list.php?insert=done");
		}
		else{
				header("location:stock_in.php?error=notinsert");
		}
	}
	
	
	$stock = mysqli_query($con, "SELECT * FROM stock WHERE stock_id ORDER BY stock_id DESC");
	$row_stock = mysqli_fetch_assoc($stock);
?>



<?php require_once("top.php"); ?>


<h2> ثبت ورود جنس به گدام</h2>
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
					<span class="input-group-addon">تاریخ وارد</span>
					<input type="text" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" name="in_date" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">مقدار / تعداد</span>
					<input type="text" name="in_quantity" class="form-control">
		</div>
		
		<div class="input-group"> 
					<span class="input-group-addon">ملاحظات</span>
					<input type="text" name="remark" class="form-control">
		</div>
		
		<input type="submit" value="وارد نمودن جنس" class="btn btn-primary btn-block">
</form>		
</div>
<?php require_once("footer.php"); ?>