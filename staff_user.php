<?php require_once("connection.php"); ?>
<?php 

	checkLevel(1, 9, 9, 9, 9, 9, 9, 9, 1);
	
	$users = mysqli_query($con, "SELECT * FROM users INNER JOIN
	staff ON staff.staff_id = users.staff_id 
	ORDER BY staff.staff_id DESC");
	
	$row_users = mysqli_fetch_assoc($users);
	$totalRows_users = mysqli_num_rows($users);

	
?>


<?php require_once("top.php"); ?>

<div class="pull-left"style="margin-left:20px;">
	<a href="staff_user_add.php" class="btn btn-primary" >
	<span class="glyphicon glyphicon-plus-sign"></span>
		ساختن حساب جدید
	</a>
</div>

<h2> حساب کارمندان </h2> 
<br>

<?php if(isset($_GET["create"])) { ?>
	
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		حساب جدید موفقانه ساخته شد.
	</div>
 
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
	<button class="close" area-hidden="true"
	data-dismiss="alert">&times;</button>
	حساب مورد نظر موفقانه حذف شد.
	</div>
<?php } ?>

<?php if(isset($_GET["reset"])) { ?>
	
	<div class="alert alert-success alert-dismissable">
	<button class="close" area-hidden="true"
	data-dismiss="alert">&times;</button>
		رمز عبور کاربر مورد نظرموفقانه تغییر کرد.
	</div>

<?php } ?>

<?php if($totalRows_users > 0) { ?>
<table class="table table-striped">
	<tr>
		<th> شماره</th>
		<th> نام کارمند</th>
		<th> حساب</th>
		<th>وظیفه</th>
		<th> تصویر</th>
		<th> حذف</th>
		<th> تغیر رمز عبور</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_users["staff_id"]; ?></td>
		<td><?php echo $row_users["firstname"] . " " . $row_users["lastname"]; ?></td>
		<td><?php echo $row_users["username"]; ?></td>
		<td><?php echo $row_users["position"]; ?></td>
		<td><img src="<?php echo $row_users["photo"]; ?>" width="50" height="50" class="img-circle"></td>
		<td>
			<a class="delete" href="staff_user_delete.php?staff_id=
			<?php echo $row_users["staff_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
		<td>
			<a href="staff_user_reset.php?staff_id=
			<?php echo $row_users["staff_id"]; ?>">
			<span class="glyphicon glyphicon-lock"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_users = mysqli_fetch_assoc($users)); ?>
</table>
<?php } ?>
<?php require_once("footer.php"); ?>