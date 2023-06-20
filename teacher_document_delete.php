<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 9, 9, 8, 9, 9, 9, 9, 9);
	$document = mysqli_query($con, "SELECT * FROM teacher_document WHERE document_id=" . $_GET["document_id"]);
	$row_document = mysqli_fetch_assoc($document);

	unlink($row_document["document_file"]);
	
	$result = mysqli_query($con, "DELETE FROM teacher_document WHERE document_id=" . $_GET["document_id"]);
	if($result){
		header("location:teacher_document.php?delete=done");
	}
	else{
		header("location:teacher_document.php?error=notdelete");
	}

?>

