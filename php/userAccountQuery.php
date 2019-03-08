<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	
	$sql = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);

	if(isset($_POST['update'])){


		$sql = "SELECT * FROM user WHERE User_Email ='$email'";
		
		if($result = mysqli_query($link,$sql)){
			$row = mysqli_fetch_assoc($result);
		}
	}

?>