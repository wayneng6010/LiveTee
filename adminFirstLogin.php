<?php
// include 'verficationEP.php';
	session_start();
	require_once 'conn.php';
	require 'html/adminFirstLogin.html';

	if(!isset($_SESSION['islogin'])){
		header('Location:adminLogin.php');
	} 
	if(isset($_SESSION['kickOut'])){
		echo "<script>alert('You have to change your password before you can access to the system')</script>";
	}
	if($_SESSION['firstlogin'] == 0){
		header('location: adminHome.php');
	}

	require_once 'conn.php';
	$sql = "SELECT * FROM staff WHERE Staff_ID = '$_SESSION[userID]'";
	$result = mysqli_query($link,$sql);
	$result1 = mysqli_query($link,$sql);
	$result3 = mysqli_query($link,$sql);

	if(isset($_POST['chgPW'])){
		$oldPw = $_POST['oldPw'];
		$newPw = $_POST['newPw'];
		$newPw2 = $_POST['newPw2'];

		if(!(password_verify($oldPw, $_SESSION['userPw']))){
			echo "<script>alert('Password incorrect');</script>";
		}
		else if($newPw != $newPw2){
			echo "<script>alert('New password not match');</script>";
		}
		else{
			$newHashPw = password_hash($newPw, PASSWORD_DEFAULT);
			$_SESSION['userPw'] = $newHashPw;
			$sql2 = "UPDATE staff
					SET Staff_Password ='$newHashPw', Staff_FirstLogin = 1
					WHERE Staff_ID = '$_SESSION[userID]'";
			$result2 = mysqli_query($link,$sql2);
			// echo "<script>alert('New password is set');</script>";
			// echo "<script type='text/javascript'>
   //          	var btn = document.getElementsByClassName('contentSubmit')[0]; 
   //          	var txt = document.getElementById('redirectText'); 
			// 	btn.style.display = 'none';
			// 	txt.style.display = 'inline-block';
   //          </script>";

			$_SESSION['firstlogin'] = 0;	
			// sleep(3);
			// header('location: adminHome.php');
		}
	}



?>