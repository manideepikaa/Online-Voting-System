<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['voter'])){
		$sql = "SELECT * FROM voters WHERE id = '".$_SESSION['voters_no']."'";
		$query = $conn->query($sql);
		$voter = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>