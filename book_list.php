<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 1, 9, 9);
	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		$condition = "WHERE book_id='$q' OR book_name LIKE '%$q%' OR author LIKE '%$q%' OR category LIKE '%$q%' OR isbn LIKE '%$q%' ";
	}
	
	$book = mysqli_query($con, "SELECT * FROM lib_book $condition ORDER BY book_id DESC");
	$row_book = mysqli_fetch_assoc($book);
	$totalRows_book = mysqli_num_rows($book);
	
?>

<?php require_once("top.php"); ?>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجوی کتاب...">
		<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-search"></span>
		جستجو
		</button>
	</form>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="book_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span>
		ثبت کتاب جدید
	</a>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="book_loan.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-time"></span>
		کتاب های قرض داده شده...
	</a>
</div>

<h2>لیست کتابها</h2>
	<br>	

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ثبت کتاب موفقانه انجام شد.
	</div>
<?php } ?>

<?php if(isset($_GET["q"])) { ?>

	<div class="panel panel-info"> 
		<div class="panel-heading">
			<b>تعداد نتایج به دست امده:
			<?php echo $totalRows_book; ?><b>
		</div>
	</div>
<?php } ?>

	<?php if($totalRows_book == 0) { ?>
		<div class="alert alert-danger">
		هیچ نتیجه ای به دست نیامد!
		</div>
	<?php } ?>


	
<?php if($totalRows_book > 0) { ?>	
<table class="table table-striped table-bordered">
	<tr>
		<th>شماره</th>
		<th>سریال نمبر</th>
		<th>نام</th>
		<th>نویسنده</th>
		<th>بخش</th>
		<th>جزییات</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_book["book_id"]; ?></td>
		<td><?php echo $row_book["isbn"]; ?></td>
		<td><?php echo $row_book["book_name"]; ?></td>
		<td><?php echo $row_book["author"]; ?></td>
		<td><?php echo $row_book["category"]; ?></td>

		
		<td>
			<a href="book_detail.php?book_id=<?php echo $row_book["book_id"]; ?>">
				<span class="glyphicon glyphicon-list-alt"></span>
			</a>
		</td>
		
	</tr>
	<?php } while($row_book = mysqli_fetch_assoc($book)); ?>
	
</table>
<?php } ?>

<?php require_once("footer.php"); ?>