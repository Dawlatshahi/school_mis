<?php require_once("connection.php");
checkLevel(1, 9, 9, 9, 9, 9, 9, 2, 9);
 ?>
<?php 
		
		if(isset($_POST["item_name"])) { 
		$staff_id = $_POST["staff_id"];
		$purchase_date = $_POST["purchase_date"];
		$item_name = $_POST["item_name"];
		$unit = $_POST["unit"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];
		
		if(mysqli_query($con, "INSERT INTO purchase VALUES (NULL, $staff_id, '$purchase_date', 
		'$item_name', '$unit', '$quantity', $unitprice, $totalprice)")) {
			header("location:purchase_list.php?buy=done");
		}
			else{
				header("location:purchase_list.php?error=notadd");
			}
	}
		$staff = mysqli_query($con, "SELECT * FROM staff");
		$row_staff = mysqli_fetch_assoc($staff);
?>

<?php require_once("top.php"); ?>
<h2>خریداری جدید</h2>
<br>
<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
<form method="post">
	<div class="input-group">
		<span class="input-group-addon">لیست کارمندان</span>
		<select name="staff_id" class="form-control">
			<?php do { ?>
			<option value="<?php echo $row_staff["staff_id"];?>"><?php echo $row_staff["firstname"];?></option>
			<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">تاریخ خرید</span>
		<input type="text" value="<?php echo jdate("Y-m-d","","","","en") ?>" name="purchase_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">نام جنس </span>
		<input type="text" name="item_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">واحد</span>
		<input type="float" name="unit" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">مقدار</span>
		<input id="quantity" type="int" name="quantity" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">قیمت</span>
		<input id="unitprice" type="int" name="unitprice" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">مجموع</span>
		<input readonly id="totalprice" type="text" name="totalprice" class="form-control">
	</div>
	
	<input type="submit" value="خرید" class="btn btn-primary btn-block">
</form>
</div>
<?php require_once("footer.php"); ?>