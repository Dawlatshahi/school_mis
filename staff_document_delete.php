<?php require_once("connection.php"); 
checkLevel(1, 9, 9, 9, 8, 9, 9, 9, 9);
?>
<?php 

	$document = mysqli_query($con, "SELECT * FROM staff_document WHERE document_id=" . $_GET["document_id"]);
	$row_document = mysqli_fetch_assoc($document);

	unlink($row_document["document_file"]);
	
	$result = mysqli_query($con, "DELETE FROM staff_document WHERE document_id=" . $_GET["document_id"]);
	if($result){
		header("location:staff_document.php?delete=done");
	}
	else{
		header("location:staff_document.php?error=notdelete");
	}

?>

