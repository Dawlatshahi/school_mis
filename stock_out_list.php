<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 9, 9, 9, 9, 1, 9);

	$stock_out = mysqli_query($con, "SELECT * FROM stock_out INNER JOIN
	stock ON stock.stock_id = stock_out.stock_id 
	ORDER BY stock_out_id DESC");
	
	$row_stock_out = mysqli_fetch_assoc($stock_out);
	$totalRows_stock_out = mysqli_num_rows($stock_out);
	
?>


<?php require_once("top.php"); ?>

<a href="stock_out.php" class="btn btn-primary pull-left">
ثبت خروج جنس
</a>

<h2>لیست اجناس خارجه</h2> 
<br>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ویرایش موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
	<button class="close" area-hidden="true"
	data-dismiss="alert">&times;</button>
	جنس مورد نظر موفقانه حذف شد.
	</div>
<?php } ?>

<?php if($totalRows_stock_out > 0) { ?>
<table class="table table-striped">
	<tr>
		<th> شماره</th>
		<th>نام جنس</th>
		<th> تاریخ</th>
		<th>تعداد</th>
		<th> ملاحظات</th>
		<th> ویرایش</th>
		<th> حذف</th>

	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_stock_out["stock_id"]; ?></td>
		<td><?php echo $row_stock_out["item_name"]; ?></td>
		<td><?php echo $row_stock_out["out_date"]; ?></td>
		<td><?php echo $row_stock_out["out_quanttiy"]; ?></td>
		<td><?php echo $row_stock_out["remark"]; ?></td>
		
		<td>
			<a href="stock_out_edit.php?stock_out_id=
			<?php echo $row_stock_out["stock_out_id"]; ?>">
			<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="stock_out_delete.php?stock_out_id=
			<?php echo $row_stock_out["stock_out_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_stock_out = mysqli_fetch_assoc($stock_out)); ?>
</table>
<?php } ?>
<?php require_once("footer.php"); ?>