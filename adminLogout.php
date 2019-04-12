<?php
	session_start() ;
	$id = $_SESSION['sID'];
	require_once 'conn.php';
	$loginrecord = mysqli_query($link,"UPDATE staff SET `Staff_LastLogin`=NOW() WHERE `Staff_ID`='$id'");
	session_destroy() ;
	header('Location: adminLogin.php');
?>