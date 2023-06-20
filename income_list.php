<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 9, 1, 9, 9, 9);

// $month = $_GET["month"];
// $year = $_GET["year"];

// SELECT * FROM income INNER JOIN ... WHERE EXTRACT(YEAR FROM income_date) = $year AND EXTRACT(MONTH FROM income_date) = $month

	$income = mysqli_query($con, "SELECT * FROM income INNER JOIN income_source ON income_source.source_id = income.source_id INNER JOIN student ON student.student_id = income.student_id ORDER BY income_id DESC");
	$row_income = mysqli_fetch_assoc($income);
	$totalRows_income = mysqli_num_rows($income);
	
?>
<?php require_once("top.php"); ?>

<?php
/*<a href="income_source.php" class="btn btn-primary pull-left">
منابع درآمد
</a>*/
?>

<a href="income_add.php" class="btn btn-primary pull-left" style="margin-left:10px;">
	ثبت پول دریافتی جدید
</a>
<?php
/*<a href="other_income.php" class="btn btn-primary pull-left" style="margin-left:10px;">
	عواید متفرقه
</a>*/
?>

<h2>عواید مکتب</h2>

<br>
<?php if($totalRows_income > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>شاگرد</th>
		<th>از بابت</th>
		<th>مقدار</th>
		<th width="100">تاریخ</th>
	</tr>
	
	<?php $totalIncome=0; do { ?>
		<tr>
			<td><?php echo $row_income["income_id"]; ?></td>
			<td><?php echo $row_income["firstname"]; ?> (فرزند: <?php echo $row_income["fathername"]; ?>)</td>
			<td><?php echo $row_income["source_name"]; ?></td>
			<td><?php echo $row_income["income_amount"]; ?></td>
			<td><?php echo $row_income["income_date"]; ?></td>
			
			<?php $totalIncome += $row_income["income_amount"]; ?>
		</tr>
	<?php } while($row_income = mysqli_fetch_assoc($income)); ?>
	
</table>

<br>

<div class="panel panel-info">
	<div class="panel-heading">
		<b>مجموع عواید : 
			<?php echo number_format($totalIncome, 0); ?> افغانی
		</b>
	</div>
</div>
<?php } ?>

<?php require_once("footer.php"); ?>