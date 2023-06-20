<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 9, 8, 9);

		$stock_in = mysqli_query($con, "SELECT * FROM stock WHERE stock_id=". $_GET["stock_in_id"]);
		$row_stock_in = mysqli_fetch_assoc($stock_in);
	
		$result = mysqli_query($con, "DELETE FROM stock_in WHERE stock_in_id=". $_GET["stock_in_id"]);
		
		if($result){
				header("location:stock_in_list.php?delete=done&stock_in_id=" . $row_stock["stock_in_id"]);
		}
		else{
				header("location:stock_in_list.php?stock_in_id=" . $row_stock_in["stock_in_id"] . "&error=notdelete");
		}

?>
