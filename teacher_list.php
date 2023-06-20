<?php require_once("connection.php"); ?>
<?php

	checkLevel(1, 9, 9, 1, 9, 9, 9, 9, 9);
	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		$condition = "WHERE teacher_id='$q' OR firstname LIKE '%$q%' OR lastname LIKE '%$q%' OR education_degree LIKE '%$q%' OR education_field LIKE '%$q%' ";
	}
	
	$teacher = mysqli_query($con, "SELECT * FROM teacher $condition ORDER BY teacher_id DESC");
	$row_teacher = mysqli_fetch_assoc($teacher);
	$totalRows_teacher = mysqli_num_rows($teacher);
?>

<?php require_once("top.php"); ?>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجوی معلم...">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"> </span>
			جستجو
		</button>
	</form>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="teacher_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span>
		ثبت معلم جدید
	</a>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="teacher_attendance.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-time"></span>
		حاظری معلمین
	</a>
</div>

<h2>لیست معلمین</h2>
	<br>
	
<?php if(isset($_GET["q"])) { ?>

	<div class="panel panel-info"> 
		<div class="panel-heading">
			<b>تعداد نتایج به دست امده:
			<?php echo $totalRows_teacher; ?><b>
		</div>
	</div>
<?php } ?>

<?php if($totalRows_teacher == 0) { ?>
		<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
		</div>
<?php } ?>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable"> 
			عملیه ثبت کارمند موفقانه انجام شد.
	</div>
<?php } ?>

<?php if($totalRows_teacher > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>نام معلم</th>
		<th>تخلص</th>
		<th>درجه تحصیل</th>
		<th>رشته</th>
		<th>عکس</th>
		<th>جزییات</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_teacher["teacher_id"]; ?></td>
		<td><?php echo $row_teacher["firstname"]; ?></td>
		<td><?php echo $row_teacher["lastname"]; ?></td>
		<td><?php echo $row_teacher["education_degree"]; ?></td>
		<td><?php echo $row_teacher["education_field"]; ?></td>
		<td><img src="<?php echo $row_teacher["photo"]; ?>" width="50" height="50" class="img-circle"></td>
		<td>
			<a href="teacher_detail.php?teacher_id=<?php echo $row_teacher["teacher_id"]; ?>">
				<span class="glyphicon glyphicon-list-alt"></span>
			</a>
		</td> 
	</tr>
	<?php } while($row_teacher = mysqli_fetch_assoc($teacher)); ?>
	
</table>

<?php } ?>

<?php require_once("footer.php"); ?>