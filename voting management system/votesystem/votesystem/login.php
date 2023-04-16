<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];		
		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);
		$computerId = $_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT'].$_SERVER['REMOTE_ADDR'];
		
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the ID';
		}
		
		else{
			$row = $query->fetch_assoc();
			
			if(password_verify($password, $row['password'])){
				if($row['flag_login'] == 1 && (($row['unique_str']) === $computerId)){
					$_SESSION['error'] = 'Already Loggedin from another session.';
				}	
				elseif(empty($row['unique_str'])){
						$_SESSION['voter'] = $row['id'];
						$_SESSION['voters_no']=$row['voters_id'];
						$_SESSION['details']=$row;
						$sql1="UPDATE voters SET flag_login = true WHERE voters_id = '$voter'";
						$stmt = $conn->prepare($sql1);
						$stmt->execute();
						$sql2="UPDATE voters SET unique_str = '$computerId' WHERE voters_id = '$voter'";
						$stmt2 = $conn->prepare($sql2);
						$stmt2->execute();
					} elseif(($row['unique_str']) === $computerId){
						$_SESSION['voter'] = $row['id'];
						$_SESSION['voters_no']=$row['voters_id'];
						$_SESSION['details']=$row;
						$sql1="UPDATE voters SET flag_login = true WHERE voters_id = '$voter'";
						$stmt = $conn->prepare($sql1);
						$stmt->execute();
					}
					elseif(($row['unique_str']) != $computerId){
						$_SESSION['error'] = 'You were trying to Log in with a different device than the original device.';
					}
					
			}
			
			
			else{
					$_SESSION['error'] = 'Incorrect password';
			}
			
		}
		
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	header('location: index.php');

?>