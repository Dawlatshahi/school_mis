<?php require_once("connection.php"); ?>
<?php
	
	checkLevel(1, 9, 9, 9, 1, 9, 9, 9, 9);
	
	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		$condition = "WHERE staff_id='$q' OR firstname LIKE '%$q%' OR lastname LIKE '%$q%' OR position LIKE '%$q%' ";
	}
	
	$staff = mysqli_query($con, "SELECT * FROM staff $condition ORDER BY staff_id DESC");
	$row_staff = mysqli_fetch_assoc($staff);
	$totalRows_staff = mysqli_num_rows($staff);
?>

<?php require_once("top.php"); ?>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجوی کارمند...">
		<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-search"></span>
		جستجو
		</button>
	</form>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="staff_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span>
		ثبت کارمندجدید
	</a>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="staff_attendance.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-time"></span>
		حاضری کارمندان
	</a>
</div>

<h2>لیست کارمندان</h2>
	<br>
<?php if(isset($_GET["add"])) { ?>

	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true"
		data-dismiss="alert">&times;</button>
		عملیه ثبت موفقانه انجام شد.
	</div>
	
<?php  } ?>
<?php if(isset($_GET["q"])) { ?>

	<div class="panel panel-info"> 
		<div class="panel-heading">
			<b>تعداد نتایج به دست امده:
			<?php echo $totalRows_staff; ?><b>
		</div>
	</div>
<?php } ?>

	<?php if($totalRows_staff == 0) { ?>
		<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
		</div>
	<?php } ?>

<?php if($totalRows_staff > 0) { ?>	
<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>نام</th>
		<th>تخلص</th>
		<th>وظیفه</th>
		<th>عکس</th>
		<th>جزییات</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_staff["staff_id"]; ?></td>
		<td><?php echo $row_staff["firstname"]; ?></td>
		<td><?php echo $row_staff["lastname"]; ?></td>
		<td><?php echo $row_staff["position"]; ?></td>
		<td><img src="<?php echo $row_staff["photo"]; ?>" width="50" height="50" class="img-circle"></td>
		<td>
			<a href="staff_detail.php?staff_id=<?php echo $row_staff["staff_id"]; ?>">
				<span class="glyphicon glyphicon-list-alt"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
	
</table>
<?php } ?>

<?php require_once("footer.php"); ?>