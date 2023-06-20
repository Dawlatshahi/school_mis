<?php 

	require_once("connection.php");
		
		checkLevel(1, 9, 9, 9, 9, 9, 2, 9, 9);
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
		
		
		if(mysqli_query($con, "INSERT INTO lib_book VALUES (NULL,  '$isbn', '$book_name', '$author','$publish_year','$publisher', '$shelf', '$shelf_row', $price ,'$category')")) {
			header("location:book_list.php?add=done");
		}
		else{
			header("location:book_add.php?error=notinsert");
		}
	}
?>

<?php require_once("top.php"); ?>
	
<a href="book_list.php" class="btn btn-primary pull-left" style="margin-left:20px;">
		<span class="glyphicon glyphicon-eye-open"></span>
	مشاهده لیست کتابها
</a>	


	
	<h2>ثبت کتاب جدید</h2>
	
	<?php if(isset($_GET["error"])) { ?>
	
		<div class="alert alert-danger alert-dismissable">
			<button class="close" area-hidden="true" 
			data-dismiss="alert">&times;</button>
			عملیه ثبت انجام نشد! لطفا دوباره کوشش کنید.
		
		</div>
	
	<?php } ?>
	<br>
		
		<form method="post">
	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				
					
				<div class="input-group">
					<span class="input-group-addon">سریال نمبر: &nbsp;&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="isbn">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">نام کتاب: &nbsp;&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="book_name">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">نویسنده:</span>
					<input type="text" class="form-control" name="author">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">بخش</span>
					<input type="text" class="form-control" name="category">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">سال نشر: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="publish_year">
				</div>
				
				
				
			</div>	
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
				<div class="input-group">
					<span class="input-group-addon">ناشر:&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="publisher">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">صفحه:&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="shelf">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">جلد:&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="shelf_row">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">قیمت کتاب:&nbsp;&nbsp;</span>
					<input type="text" class="form-control" name="price">
				</div>
				
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
				<input type="submit" value="ثبت کتاب" class="btn btn-primary btn-block"> 
			</div>
		</form>

<?php require_once("footer.php"); ?>