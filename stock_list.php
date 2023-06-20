<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 9, 2, 9);

	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		$condition = "WHERE stock_id='$q' OR item_name LIKE '%$q%' OR unit LIKE '%$q%' OR quantity LIKE '%$q%'";
	}
	
	$stock = mysqli_query($con, "SELECT * FROM stock $condition ORDER BY stock_id DESC");
	$row_stock = mysqli_fetch_assoc($stock);
	$totalRows_stock = mysqli_num_rows($stock);
	
?>

<?php require_once("top.php"); ?>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجو جنس ...">
		<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-search"></span>
		جستجو
		</button>
	</form>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="stock_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span>
		ثبت جنس جدید
	</a>
</div>

<h2>لیست اجناس</h2>
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
			<?php echo $totalRows_stock; ?><b>
		</div>
	</div>
<?php } ?>

	<?php if($totalRows_stock == 0) { ?>
		<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
		</div>
	<?php } ?>
	
	<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissabe">
		عملیه ویرایش موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		عملیه حذف موفقانه انجام شد.
	</div>
<?php } ?>

<?php if($totalRows_stock > 0) { ?>	
<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>نام جنس</th>
		<th>مقدار</th>
		<th>واحد</th>
		<th>ویرایش</th>
		<th>حذف</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_stock["stock_id"]; ?></td>
		<td><?php echo $row_stock["item_name"]; ?></td>
		<td><?php echo $row_stock["quantity"]; ?></td>
		<td><?php echo $row_stock["unit"]; ?></td>
		
		<td>
			<a href="stock_edit.php?stock_id=<?php echo $row_stock["stock_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		
		<td>
			<a class="delete" href="stock_delete.php?stock_id=<?php echo $row_stock["stock_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_stock = mysqli_fetch_assoc($stock)); ?>
	
</table>
<?php } ?>

<?php require_once("footer.php"); ?>