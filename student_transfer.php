<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 1, 9, 9, 9, 9, 9, 9 );
	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		
		if($q == "ارسالی" || $q == "دریافتی") {
			if($q == "ارسالی") {
				$type = 0;
			}
			else if($q == "دریافتی") {
				$type = 1;
			}
			$condition = " WHERE transfer_type = $type";
		}
		else {
			$condition = "WHERE firstname LIKE '%$q%' OR transfer_no LIKE '%$q%' OR confirm_no LIKE '%$q%' OR school_name LIKE '%$q%' ";
		}
	}

	$transfer = mysqli_query($con, "SELECT * FROM student_transfer INNER JOIN student ON student.student_id = student_transfer.student_id $condition ORDER BY transfer_id DESC");
	$row_transfer = mysqli_fetch_assoc($transfer);
	$totalRows_transfer = mysqli_num_rows($transfer);
?>
<?php require_once("top.php"); ?>

<a href="student_transfer_add.php" class="btn btn-primary pull-left">
	<span class="glyphicon glyphicon-plus-sign"></span>
	ثبت سه پارچه جدید
</a>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجوی سه پارچه...">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
			جستجو
		</button>
	</form>
</div>

<h2>سه پارچه های شاگردان</h2>

<br>

<?php if(isset($_GET["q"])) { ?>
	<div class="panel panel-info">
		<div class="panel-heading">
		تعداد نتایج به دست امده :
		<?php echo $totalRows_transfer ; ?>
		</div>
	</div>

<?php } ?>

<?php if($totalRows_transfer == 0) { ?>
	<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success slert-dismissable"> 
		عملیه ویرایش سه پارچه شاگرد موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable"> 
		عملیه حذف سه پارچه شاگرد موفقانه انجام شد.
	</div>
<?php } ?> 

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ثبت سه پارچه موفقانه انجام شد.
	</div>
<?php } ?>

<?php if($totalRows_transfer > 0) { ?>
<div class="table-responsive">
<table class="table table-striped table-bordered">
	<tr>
		<th>نام شاگرد</th>
		<th>نام پدر</th>
		<th width="110">تاریخ</th>
		<th>نمبر مکتوب</th>
		<th>نمبر مکتوب اطمینانیه</th>
		<th>نمبر مکتوب تعقیبیه</th>
		<th>نام مکتب</th>
		<th>سه پارچه</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_transfer["firstname"]; ?></td>
		<td><?php echo $row_transfer["fathername"]; ?></td>
		<td><?php echo $row_transfer["transfer_date"]; ?></td>
		<td><?php echo $row_transfer["transfer_no"]; ?></td>
		<td><?php echo $row_transfer["confirm_no"]; ?></td>
		<td><?php echo $row_transfer["follow_no"]; ?></td>
 		<td><?php echo $row_transfer["school_name"]; ?></td>
		<td>
		<?php echo $row_transfer["transfer_type"] == 0 ? "ارسالی" : "دریافتی"; ?>
		</td>
		
		<td>
			<a href="student_transfer_edit.php?transfer_id=<?php echo $row_transfer["transfer_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="student_transfer_delete.php?transfer_id=<?php echo $row_transfer["transfer_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
		
	</tr>
	<?php } while($row_transfer = mysqli_fetch_assoc($transfer)); ?>
	
</table>
</div>
<?php } ?>

<?php require_once("footer.php"); ?>