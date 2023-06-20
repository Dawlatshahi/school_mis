<?php require_once("connection.php"); ?>
<?php

// $month = $_GET["month"];
// $year = $_GET["year"];

// SELECT * FROM expense INNER JOIN ... WHERE EXTRACT(YEAR FROM expense_date) = $year AND EXTRACT(MONTH FROM expense_date) = $month

	$expense = mysqli_query($con, "SELECT * FROM expense INNER JOIN chartofaccount ON chartofaccount.account_id = expense.account_id ORDER BY expense_id DESC");
	$row_expense = mysqli_fetch_assoc($expense);
	$totalRows_expense = mysqli_num_rows($expense);
?>
<?php require_once("top.php"); ?>

<a href="chartofaccount.php" class="btn btn-primary pull-left">
	بخش های مصارف
</a>

<h2>مصارف مکتب</h2>

<br>
<?php if($totalRows_expense > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>بخش</th>
		<th>مقدار</th>
		<th width="100">تاریخ</th>
		<th>تفصیلات</th>
	</tr>
	
	<?php $totalExpense=0; do { ?>
		<tr>
			<td><?php echo $row_expense["expense_id"]; ?></td>
			<td><?php echo $row_expense["account_name"]; ?></td>
			<td><?php echo $row_expense["expense_amount"]; ?></td>
			<td><?php echo $row_expense["expense_date"]; ?></td>
			<td><?php echo $row_expense["remark"]; ?></td>
			
			<?php $totalExpense += $row_expense["expense_amount"]; ?>
		</tr>
	<?php } while($row_expense = mysqli_fetch_assoc($expense)); ?>
	
</table>
<br>

<div class="panel panel-info">
	<div class="panel-heading">
		<b>مجموع مصارف: 
			<?php echo number_format($totalExpense, 0); ?> افغانی
		</b>
	</div>
</div>
<?php } ?>

<?php require_once("footer.php"); ?>