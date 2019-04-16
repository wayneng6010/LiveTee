<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	$sql = "SELECT `Staff_LastLogin` FROM `staff` WHERE `Staff_ID` = '$_SESSION[sID]'";
	$result = mysqli_query($link,$sql);
	$item = mysqli_fetch_assoc($result);
?>