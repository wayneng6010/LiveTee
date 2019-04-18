<?php
	session_start();
	require_once 'conn.php';

	if(!isset($_SESSION['sLogin'])){
		$_SESSION['kick'] = true;
		header('Location:adminLogin.php');
	} 

	if(isset($_SESSION['kick'])){
		if($_SESSION['kick']=="sFirstLog"){
			echo "<script>alert('You have to change your password before you can access to the system')</script>";
		}
	}
	// if($_SESSION['sFirstLog'] == 0){
	// 	header('location: adminHome.php');
	// }

	$sql = "SELECT * FROM staff WHERE Staff_ID = '$_SESSION[sID]'";
	$result = mysqli_query($link,$sql);
	$result1 = mysqli_query($link,$sql);
	$result3 = mysqli_query($link,$sql);

	if(isset($_POST['chgPW'])){
		$oldPw = $_POST['oldPw'];
		$newPw = $_POST['newPw'];
		$newPw2 = $_POST['newPw2'];

		if(!(password_verify($oldPw, $_SESSION['sPw']))){
			echo "<script>alert('Password incorrect');</script>";
		}
		else if($newPw != $newPw2){
			echo "<script>alert('New password not match');</script>";
		} else if (password_verify($newPw, $_SESSION['sPw'])) {
			echo "<script>alert('Please enter a new password');</script>";
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

			echo "<script>alert('Password changed successful');</script>";
			// echo "<script>alert('New password is set');</script>";
			// echo "<script type='text/javascript'>
   //          	var btn = document.getElementsByClassName('contentSubmit')[0]; 
   //          	var txt = document.getElementById('redirectText'); 
			// 	btn.style.display = 'none';
			// 	txt.style.display = 'inline-block';
   //          </script>";

			sleep(1);
			header('refresh:1;url=adminHome.php');
		}
	}



?>