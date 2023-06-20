<?php require_once("connection.php"); ?>
<?php
	checkLevel(1, 9, 9, 9, 9, 9, 9, 8, 9);

		$stock_out = mysqli_query($con, "SELECT * FROM stock WHERE stock_id=". $_GET["stock_in_id"]);
		$row_stock_out = mysqli_fetch_assoc($stock_out);
	
		$result = mysqli_query($con, "DELETE FROM stock_out WHERE stock_out_id=". $_GET["stock_out_id"]);
		
		if($result){
				header("location:stock_out_list.php?delete=done&stock_out_id=" . $row_stock["stock_out_id"]);
		}
		else{
				header("location:stock_out_list.php?stock_out_id=" . $row_stock_out["stock_out_id"] . "&error=notdelete");
		}

?>
