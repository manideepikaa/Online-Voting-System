<?php
	include 'includes/session.php';
	#endregionsession_start();
	$sql1 = "UPDATE voters SET flag_login = false WHERE voters_id = '" . $_SESSION["voters_no"] ."'";
	$stmt = $conn->prepare($sql1);
	$stmt->execute();
	echo $sql1;
	
	session_destroy();
	
	
	header('location: index.php');
?>