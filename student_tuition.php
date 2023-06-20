<?php require_once("connection.php"); ?>
<?php

	checkLevel(1, 9, 9, 9, 9, 1, 9, 9, 9);

	$year = jdate("Y","","","","en");


	
	$tuition = mysqli_query($con, "SELECT *, (SELECT fees FROM classes INNER JOIN class_section ON classes.class_id = class_section.class_id WHERE section_id = income.section_id) AS class_tuition, (SELECT discount_amount FROM tuition_discount WHERE student_id = income.student_id AND discount_year=$year) AS discount FROM income INNER JOIN student ON student.student_id = income.student_id WHERE source_id = 1 ORDER BY income_id DESC");
	$row_tuition = mysqli_fetch_assoc($tuition);
?>
<?php require_once("top.php"); ?>

<a href="tuition_discount.php" class="btn btn-primary pull-left">
	تخفیف در فیس
</a>
<a href="student_tuition_add.php" class="btn btn-primary pull-left" style="margin-left:10px;">
	دریافت فیس
</a>

<h2>فیس شاگردان</h2>

<br>

	<table class="table table-striped">
		<tr>
			<th>شماره</th>
			<th>شاگرد</th>
			<th>مقدار فیس</th>
			<th>تخفیف</th>
			<th>مبلغ تخفیف</th>
			<th>مبلغ دریافتی</th>
		</tr>
		
		<?php do { ?>
			<tr>
				<td><?php echo $row_tuition["income_id"]; ?></td>
				<td><?php echo $row_tuition["firstname"]; ?> (فرزند: <?php echo $row_tuition["fathername"]; ?>)</td>
				<td><?php echo $row_tuition["class_tuition"]; ?> افغانی</td>
				<td><?php echo $row_tuition["discount"]; ?> %</td>
				<td><?php echo ($row_tuition["class_tuition"] * $row_tuition["discount"] / 100); ?> افغانی</td>
				<td><?php echo $row_tuition["income_amount"]; ?> افغانی</td>
			</tr>
		<?php } while($row_tuition = mysqli_fetch_assoc($tuition)); ?>
	</table>


<?php require_once("footer.php"); ?>