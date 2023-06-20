<?php require_once("connection.php")?>

<?php 
checkLevel(1, 9, 9, 9, 9, 9, 1, 9, 9);
	
	$book = mysqli_query($con, "SELECT * FROM lib_book WHERE book_id = " . $_GET["book_id"]);
	$row_book = mysqli_fetch_assoc($book);
?>

<?php require_once("top.php"); ?>
	
	<a href="book_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
	
	<div class="pull-left button" style="padding-top:8px; padding-left:8px; margin-left:100px;">
		<a class="delete" href="book_delete.php?book_id=<?php echo $_GET["book_id"]; ?>">حذف
			<span class="glyphicon glyphicon-trash"></span>
		</a>
		&nbsp; &nbsp; 
		<a href="book_edit.php?book_id=<?php echo $_GET["book_id"]; ?>">ویرایش
		<span class="glyphicon glyphicon-edit"></span>
		</a>
	</div>
	
	<h2>معلومات کتاب</h2>
	<br>
	
	<?php if(isset($_GET["edit"])) { ?>
		<div class="alert alert-success alert-dismissable">
			عملیه  ویرایش موفقانه انجام شد.
		</div>
	<?php } ?>
	
	<?php if(isset($_GET["delete"])) { ?>
		<div class="alert alert-danger alert-dismissable">
			عملیه حذف موفقانه انجام شد.
		</div>
	<?php } ?>
	
	<table class="table table-striped">
		<tr>
		<td width="20%">شماره:</td>
		<td><?php echo $row_book["book_id"]; ?></td>
		</tr> 
		
		<tr>
		<td>نام:</td>
		<td><?php echo $row_book["book_name"]; ?> </td>
		</tr>
	
		<tr>
		<td>نویسنده: </td>
		<td><?php echo $row_book["author"]; ?> </td>
		</tr>
		
		<tr>
		<td>بخش: </td>
		<td><?php echo $row_book["category"]; ?> </td>
		</tr>
		
		<td>سال نشز</td> 
		<td><?php echo $row_book["publish_year"]; ?></td>
		</tr>
	
		<tr>
		<td>ناشر:</td>
		<td><?php echo $row_book["publisher"]; ?> </td>
		</tr>
		
		
		<tr>
		<td>سریال نمبر:</td>
		<td><?php echo $row_book["isbn"]; ?> </td>
		</tr>
		
		<tr> 
		<td>صفحه:</td>
		<td><?php echo $row_book["shelf"]; ?> </td>
		</tr>
		
		<tr> 
		<td>جلد:</td>
		<td><?php echo $row_book["shelf_row"]; ?> </td>
		</tr>
		
		<tr> 
		<td>قیمت:</td>
		<td><?php echo $row_book["price"]; ?> </td>
		</tr>
	</table>
<?php require_once("footer.php"); ?>