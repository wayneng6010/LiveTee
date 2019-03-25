<?php
	session_start();
	require_once 'conn.php';

	if(!isset($_SESSION['sLogin'])){
		$_SESSION['kick'] = true;
		header('Location:adminLogin.php');
	} 

	// if($_SESSION['sFirstLog'] == 0){
	// 	header('location: adminHome.php');
	// }

	$sql = "SELECT * FROM staff WHERE Staff_ID = '$_SESSION[sID]'";
	$result = mysqli_query($link,$sql);
	$result1 = mysqli_query($link,$sql);
	$result3 = mysqli_query($link,$sql);

	if(isset($_POST['chgPW'])){
		$oldPw = $_POST['oldpass'];
		$newPw = $_POST['newpass'];
		$newPw2 = $_POST['conpass'];

		if(!(password_verify($oldPw, $_SESSION['sPw']))){
			echo "<script>alert('Password incorrect');</script>";
		}
		else if($newPw != $newPw2){
			echo "<script>alert('New password not match');</script>";
		}
		else{
			$newHashPw = password_hash($newPw, PASSWORD_DEFAULT);
			$_SESSION['sPw'] = $newHashPw;
			$sql2 = "UPDATE staff
					SET Staff_Password ='$newHashPw', Staff_FirstLogin = 0
					WHERE Staff_ID = '$_SESSION[sID]'";
			$result2 = mysqli_query($link,$sql2);

			$_SESSION['kick'] = "none";	
			$_SESSION['sFirstLog'] = 0;	
		}
	}



?>