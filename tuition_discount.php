<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 9, 9, 9, 9, 2, 9, 9, 9 );
	$tuition = mysqli_query($con, "SELECT * FROM tuition_discount INNER JOIN student ON student.student_id = tuition_discount.student_id INNER JOIN class_section ON class_section.section_id = tuition_discount.section_id ORDER BY discount_year DESC, tuition_discount.section_id ASC");
	$row_tuition = mysqli_fetch_assoc($tuition);
	$totalRows_tuition = mysqli_num_rows($tuition);
?>
<?php require_once("top.php"); ?>

<a href="tuition_discount_add.php" class="btn btn-primary pull-left">
	ثبت تخفیف جدید
</a>

<h2>تخفیف های داده شده</h2>

<br>

<?php if($totalRows_tuition > 0) { ?>

	<table class="table table-striped">
		<tr>
			<th>شاگرد</th>
			<th>صنف</th>
			<th>سال</th>
			<th>تخفیف</th>
			<th>نوعیت</th>
		</tr>
		
		<?php do { ?>
			<tr>
				<td><?php echo $row_tuition["firstname"]; ?> (فرزند: <?php echo $row_tuition["fathername"]; ?>)</td>
				<td><?php echo $row_tuition["section_name"]; ?></td>
				<td><?php echo $row_tuition["discount_year"]; ?></td>
				<td><?php echo $row_tuition["discount_amount"]; ?> %</td>
				<td><?php 
					if($row_tuition["discount_type"] == 0) {
						echo "صندوق";
					}
					else {
						echo "عضو فامیل";
					}
				?></td>
			</tr>
		<?php } while($row_tuition = mysqli_fetch_assoc($tuition)); ?>
	</table>

<?php } ?>

<?php require_once("footer.php"); ?>