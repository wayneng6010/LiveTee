<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';
	
	$sql1 = "SELECT * FROM item";
	
	$result1 = mysqli_query($link,$sql1);
	$result2 = mysqli_query($link,$sql1);

	

	?>