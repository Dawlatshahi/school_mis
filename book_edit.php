<?php 
	
	require_once("connection.php");
	checkLevel(1, 9, 9, 9, 9, 9, 4, 9, 9);
	
	$book = mysqli_query($con, "SELECT * FROM lib_book WHERE book_id = " . $_GET["book_id"]);
	$row_book = mysqli_fetch_assoc($book);
	
	if(isset($_POST["book_name"])){
			$isbn = $_POST["isbn"];
			$book_name = $_POST["book_name"];
			$author = $_POST["author"];
			$category = $_POST["category"];
			$publish_year = $_POST["publish_year"];
			$publisher = $_POST["publisher"];
			$shelf = $_POST["shelf"];
			$shelf_row = $_POST["shelf_row"];
			$price  = $_POST["price"];
		
		if(mysqli_query($con, "UPDATE lib_book SET
		isbn='$isbn', book_name='$book_name', author='$author', category='$category', publish_year=$publish_year, publisher='$publisher', shelf='$shelf', shelf_row='$shelf_row', 
		price=$price WHERE book_id = " . $_GET["book_id"])) {
			header("location:book_detail.php?book_id=" . $_GET["book_id"] . "&edit=done");
		}
		else{
			header("location:book_edit.php?book_id=" . $_GET["book_id"] . "&error=notedit");
		}
	}

?>
<?php require_once("top.php"); ?> 
<a href="book_list.php?book_id=<?php echo $row_book["book_id"]; ?>" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-arrow-left"></span>
		برگشت
	</a>
	<h2>ویرایش کتاب</h2>
		
<?php if(isset($_GET["error"]))	{ ?>
	
	<div class="alert alert-danger alert-dismissable">	
		<button class="close" area-hidden="true" 
		data-dismiss="alert">&times;</button>
		عملیه ویرایش انجام نشد! لطفا دوباره کوشش کنید.
	</div>

<?php } ?>
	
		<br>
		
		<form method="post">
	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				
				<div class="input-group">
					<span class="input-group-addon">سریال نمبر: &nbsp;&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["isbn"]; ?>" type="text" class="form-control" name="isbn">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">نام کتاب: &nbsp;&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["book_name"]; ?>" type="text" class="form-control" name="book_name">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">نویسنده:</span>
					<input value="<?php echo $row_book["author"]; ?>" type="text" class="form-control" name="author">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">بخش:</span>
					<input value="<?php echo $row_book["category"]; ?>" type="text" class="form-control" name="category">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">سال نشر: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["publish_year"]; ?>" type="text" class="form-control" name="publish_year">
				</div>
				
				
			</div>	
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				
				<div class="input-group">
					<span class="input-group-addon">ناشر:&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["publisher"]; ?>" type="text" class="form-control" name="publisher">
				</div>
				
			
				<div class="input-group">
					<span class="input-group-addon">صفحه:&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["shelf"]; ?>" type="text" class="form-control" name="shelf">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">جلد:&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["shelf_row"]; ?>" type="text" class="form-control" name="shelf_row">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">قیمت کتاب:&nbsp;&nbsp;</span>
					<input value="<?php echo $row_book["price"]; ?>" type="text" class="form-control" name="price">
				</div>
				
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-dx-12">
				<input type="submit" value="ذخیره نمودن" class="btn btn-primary btn-block"> 
			</div>
		</form>
		<br>
		<br>
		<br>
		

<?php require_once("footer.php"); ?>