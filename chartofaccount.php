<?php require_once("connection.php"); ?>
<?php 
	$account = mysqli_query($con, "SELECT * FROM chartofaccount");
	$row_account = mysqli_fetch_assoc($account);
?>
<?php require_once("top.php"); ?>

<h2>بخش های مصارف</h2>

<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>عنوان</th>
	</tr>
	
	<?php do { ?>
		<tr>
			<td><?php echo $row_account["account_id"]; ?></td>
			<td><?php echo $row_account["account_name"]; ?></td>
		</tr>
	<?php } while($row_account = mysqli_fetch_assoc($account)); ?>
	
</table>


<?php require_once("footer.php"); ?>