<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 9, 9, 9, 9, 1, 9);
	$purchase = mysqli_query($con, "SELECT * FROM purchase INNER JOIN staff ON staff.staff_id = purchase.staff_id ORDER BY purchase_id DESC");
	$row_purchase = mysqli_fetch_assoc($purchase);
	$totalRows_purchase = mysqli_num_rows($purchase);

?>

<?php require_once("top.php"); ?>

<a href="purchase_add.php" class="btn btn-primary pull-left" style="margin-left:20px;">
	<span class="glyphicon glyphicon-plus-sign">
	</span>
	خرید جنس جدید
</a>

<h2>لیست خریداری اجناس</h2>
<br>
	<?php if($totalRows_purchase > 0) { ?>
		<table class="table table-striped">
			<tr>
				<th>شماره</th>
				<th>نام کارمند</th>
				<th>تاریخ خرید</th>
				<th>نام جنس</th>
				<th>واحد</th>
				<th>مقدار/ تعداد</th>
				<th>قیمت</th>
				<th>مجموع</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>
			
		<?php do { ?>
			<tr>
				<td><?php echo $row_purchase["purchase_id"]; ?></td>
				<td><?php echo $row_purchase["firstname"]; ?> <?php echo $row_purchase["lastname"]; ?></td>
				<td><?php echo $row_purchase["purchase_date"]; ?></td>
				<td><?php echo $row_purchase["item_name"]; ?></td>
				<td><?php echo $row_purchase["unit"]; ?></td>
				<td><?php echo $row_purchase["quantity"]; ?></td>
				<td><?php echo $row_purchase["unitprice"]; ?></td>
				<td><?php echo $row_purchase["totalprice"]; ?></td>
				
				<td>
					 <a href="purchase_edit.php?purchase_id=<?php echo $row_purchase["purchase_id"]; ?>">
					 <span class="glyphicon glyphicon-edit" style="color:blue;"><span>
					 </a>
				</td>
				<td>
					 <a href="purchase_delete.php?purchase_id=<?php echo $row_purchase["purchase_id"]; ?>">
					 <span class="glyphicon glyphicon-trash" style="color:blue;"></span>
				</td>
				</tr>
		<?php } while($row_purchase = mysqli_fetch_assoc($purchase)); ?>
		</table>
	<?php  } ?>
<?php require_once("footer.php"); ?>