<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 9, 9, 1, 9, 9, 9);
	$source = mysqli_query($con, "SELECT * FROM income_source ORDER BY source_id ASC");
	$row_source = mysqli_fetch_assoc($source);
?>
<?php require_once("top.php"); ?>

<a href="income_source_add.php" class="btn btn-primary pull-left">
	ثبت منبع جدید
</a>

<h2>منابع درآمد مکتب</h2>

<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>عنوان</th>
	</tr>
	
	<?php do { ?>
		<tr>
			<td><?php echo $row_source["source_id"]; ?></td>
			<td><?php echo $row_source["source_name"]; ?></td>
		</tr>
	<?php } while($row_source = mysqli_fetch_assoc($source)); ?>
	
</table>


<?php require_once("footer.php"); ?>