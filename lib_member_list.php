<?php require_once("connection.php"); 
checkLevel(1, 9, 9, 9, 9, 9, 1, 9, 9);
?>
<?php 

	$lib_member = mysqli_query($con, "SELECT * FROM lib_member INNER JOIN
	student ON student.student_id = lib_member.student_id 
	ORDER BY student.student_id DESC");
	
	$row_lib_member = mysqli_fetch_assoc($lib_member);
	$totalRows_lib_member = mysqli_num_rows($lib_member);
	
?>


<?php require_once("top.php"); ?>

<div class="pull-left"style="margin-left:20px;">
	<a href="lib_member_add.php" class="btn btn-primary" >
	<span class="glyphicon glyphicon-plus-sign"></span>
		اضافه نمودن عضو جدید
	</a>
</div>

<h2>اعضای کتابخانه </h2> 
<br>

<?php if(isset($_GET["create"])) { ?>
	
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		عضو جدید موفقانه ثبت شد.
	</div>
 
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
	<button class="close" area-hidden="true"
	data-dismiss="alert">&times;</button>
	شاگرد مورد نظر موفقانه حذف شد.
	</div>
<?php } ?>

<?php if($totalRows_lib_member >0) { ?>
<table class="table table-striped">
	<tr>
		<th> شماره</th>
		<th> نام شاگرد</th>
		<th> نام پدر</th>
		<th>نمبر اساس</th>
		<th> تصویر</th>
		<th> حذف</th>

	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_lib_member["student_id"]; ?></td>
		<td><?php echo $row_lib_member["firstname"]; ?></td>
		<td><?php echo $row_lib_member["fathername"]; ?></td>
		<td><?php echo $row_lib_member["reg_no"]; ?></td>
		<td><img src="<?php echo $row_lib_member["photo"]; ?>" width="50" height="50" class="img-circle"></td>
		<td>
			<a class="delete" href="lib_member_delete.php?student_id=
			<?php echo $row_lib_member["student_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_lib_member = mysqli_fetch_assoc($lib_member)); ?>
</table>
<?php } ?>
<?php require_once("footer.php"); ?>