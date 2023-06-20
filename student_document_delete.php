<?php require_once("connection.php"); ?>
<?php 
checkLevel(1, 4, 1, 9, 9, 9, 9, 9, 9 );

	$document = mysqli_query($con, "SELECT * FROM student_document WHERE document_id=" . $_GET["document_id"]);
	$row_document = mysqli_fetch_assoc($document);

	unlink($row_document["document_file"]);
	
	$result = mysqli_query($con, "DELETE FROM student_document WHERE document_id=" . $_GET["document_id"]);
	if($result){
		header("location:student_document.php?delete=done");
	}
	else{
		header("location:student_document.php?error=notdelete");
	}

?>

