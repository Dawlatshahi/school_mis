<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 9, 8, 9);
		
		$stock = mysqli_query($con, "SELECT * FROM stock WHERE stock_id=". $_GET["stock_id"]);
		$row_stock = mysqli_fetch_assoc($stock);
	
		$result = mysqli_query($con, "DELETE FROM stock WHERE stock_id=". $_GET["stock_id"]);
		
		if($result){
				header("location:stock_list.php?delete=done&stock_id=" . $row_stock["stock_id"]);
		}
		else{
				header("location:stock_list.php?stock_id=" . $row_stock["stock_id"] . "&error=notdelete");
		}

?>
