<?php require_once("connection.php"); ?>
<?php
checkLevel(8, 9, 9, 9, 9, 9, 8, 9, 9);
	
		$book = mysqli_query($con, "SELECT * FROM lib_book WHERE book_id=". $_GET["book_id"]);
		$row_book = mysqli_fetch_assoc($book);
	
		$result = mysqli_query($con, "DELETE FROM lib_book WHERE book_id=". $_GET["book_id"]);
		
		if($result){
				header("location:book_list.php?delete=done&book_id=" . $row_book["book_id"]);
		}
		else{
				header("location:book_list.php?book_id=" . $row_book["book_id"] . "&error=notdelete");
		}

?>
