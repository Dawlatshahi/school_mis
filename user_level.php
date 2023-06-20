<?php require_once("connection.php"); ?>
<?php 
	checkLevel(1, 9, 9, 9, 9, 9, 9, 9, 1);

	$users = mysqli_query($con, "SELECT * FROM users INNER JOIN
	staff ON staff.staff_id = users.staff_id 
	INNER JOIN user_level ON users.staff_id = user_level.staff_id
	ORDER BY staff.staff_id DESC");
	
	$row_users = mysqli_fetch_assoc($users);
	$totalRows_users = mysqli_num_rows($users);

	
?>


<?php require_once("top.php"); ?>

<h2> تعیین صلاحیت های کارمندان </h2> 
<br>

<?php if(isset($_GET["set"])) { ?>
	
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		صلاحیت های کارمند با موفقیت ذخیره شد
	</div>
 
<?php } ?>

<?php if($totalRows_users > 0) { ?>
<div class="table-responsive">
<table class="table table-striped">
	<tr>
		<th> تصویر</th>
		<th> نام کارمند</th>
		<th> مدیریت</th>
		<th> تدریسی</th>
		<th> شاگردان</th>
		<th> معلمین</th>
		<th> کارمندان</th>
		<th> مالی</th>
		<th> کتابخانه</th>
		<th> گدام</th>
		<th> آی تی</th>
		<th> تعیین</th>
		
	</tr>
	
	<?php do { ?>
	<tr>
		<td><img src="<?php echo $row_users["photo"]; ?>" width="30" height="30" class="img-circle"></td>
		<td><?php echo $row_users["firstname"] . " " . $row_users["lastname"]; ?></td>
		<td><?php echo showLevel($row_users["admin_level"]); ?></td>
		<td><?php echo showLevel($row_users["acadmic_level"]); ?></td>
		<td><?php echo showLevel($row_users["student_level"]); ?></td>
		<td><?php echo showLevel($row_users["teacher_level"]); ?></td>
		<td><?php echo showLevel($row_users["staff_level"]); ?></td>
		<td><?php echo showLevel($row_users["finance_level"]); ?></td>
		<td><?php echo showLevel($row_users["library_level"]); ?></td>
		<td><?php echo showLevel($row_users["stock_level"]); ?></td>
		<td><?php echo showLevel($row_users["it_level"]); ?></td>
		<td>
			<a href="user_level_edit.php?staff_id=
			<?php echo $row_users["staff_id"]; ?>">
			<span class="glyphicon glyphicon-cog"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_users = mysqli_fetch_assoc($users)); ?>
</table>
</div>
<?php } ?>
<?php require_once("footer.php"); ?>