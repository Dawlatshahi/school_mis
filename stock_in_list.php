<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 9, 9, 9, 9, 1, 9);

	$stock_in = mysqli_query($con, "SELECT * FROM stock_in INNER JOIN
	stock ON stock.stock_id = stock_in.stock_id 
	ORDER BY stock_in_id DESC");
	
	$row_stock_in = mysqli_fetch_assoc($stock_in);
	$totalRows_stock_in = mysqli_num_rows($stock_in);
	
?>


<?php require_once("top.php"); ?>

<a href="stock_in.php" class="btn btn-primary pull-left">
	ثبت ورود جنس
</a>


<h2>لیست اجناس وارده</h2> 
<br>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
	عمیلیه ویرایش موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
	جنس مورد نظر موفقانه حذف شد.
	</div>
<?php } ?>

<?php if($totalRows_stock_in > 0) { ?>
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
		<td><?php echo $row_stock_in["stock_id"]; ?></td>
		<td><?php echo $row_stock_in["item_name"]; ?></td>
		<td><?php echo $row_stock_in["in_date"]; ?></td>
		<td><?php echo $row_stock_in["in_quantity"]; ?></td>
		<td><?php echo $row_stock_in["remark"]; ?></td>
		
		<td>
			<a href="stock_in_edit.php?stock_in_id=
			<?php echo $row_stock_in["stock_in_id"]; ?>">
			<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="stock_in_delete.php?stock_in_id=
			<?php echo $row_stock_in["stock_in_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_stock_in = mysqli_fetch_assoc($stock_in)); ?>
</table>
<?php } ?>

<?php require_once("footer.php"); ?>