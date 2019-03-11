<?php
	// include 'verficationAdmin.php';
	// session_start();
	if (!(isset($_SESSION['uID']))){
		header('Location: userLogin.php');
	}

	require_once 'conn.php';

	$sql = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	$fullPhoneNo = $row['User_PhoneNo'];
	$phone1 = substr($fullPhoneNo, 0, 3);
	$phone2 = substr($fullPhoneNo, 3, strlen("fullPhoneNo"));

	// echo "<script>alert('".$phone2."')</script>";

	if(isset($_POST['update'])){

		$fname = $_POST['fname'];
		$fname = mysqli_real_escape_string($link,$fname);
		$fname = htmlentities($fname, ENT_QUOTES, "UTF-8");

		$email = $_POST['email'];

		$address = $_POST['address'];
		$postal = $_POST['postal'];
		$state = $_POST['state'];

		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$phone = $phone1 . $phone2;

		$sql1 = "UPDATE `user` SET `User_Name` = '$fname', `User_Email` = '$email', `User_PhoneNo` = '$phone', `User_Address` = '$address', `User_Postal` = '$postal', `User_State` = '$state' WHERE `User_ID` ='$_SESSION[uID]';";

		if ($result1 = mysqli_query($link,$sql1)){
			echo "<script>alert('Changes Saved')</script>";
			header("Refresh:0");
		} else {

			echo "<script>alert('Error occur during saving')</script>";

		}

		
	}

?>