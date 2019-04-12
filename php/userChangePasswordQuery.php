<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	

	if(isset($_POST['confirm'])){
		$oldPw = $_POST['oldpass'];
		$newPw = $_POST['newpass'];
		$newPw2 = $_POST['conpass'];

		if (strlen($newPw) < 8 || strlen($oldPw) < 8 || strlen($newPw2) < 8) {
			echo "<script>alert('Password must contains at least 8 characters');</script>";
		} else {
			if(!(password_verify($oldPw, $_SESSION['uPw']))){
				echo "<script>alert('Password incorrect');</script>";
			}
			else if($newPw != $newPw2){
				echo "<script>alert('New password not match');</script>";
			}
			else{
				$newHashPw = password_hash($newPw, PASSWORD_DEFAULT);
				$_SESSION['uPw'] = $newHashPw;
				$sql2 = "UPDATE `user` SET `User_Password` = '$newHashPw' WHERE `User_ID` ='$_SESSION[uID]';";
				if ($result2 = mysqli_query($link,$sql2)) {
					echo "<script>alert('Password changed successfully');</script>";
				}
			}
		}

		// if(!(password_verify($oldpass,$_SESSION['uPw']))){
		// 	echo "<script>alert('Password incorrect');</script>";
		// }
		// else if($newpass != $conpass){
		// 	echo "<script>alert('New password not match');</script>";
		// }
		// else{
		// 	$sql = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
			
		// 	if($result = mysqli_query($link,$sql)){
		// 		$row = mysqli_fetch_assoc($result);
		// 		$hpass = $row['User_Password'];

		// 		if(password_verify($oldpass,$hpass)){
		// 			$passHash = password_hash($newpass, PASSWORD_DEFAULT);
		// 			$sql1 = "UPDATE `user` SET `User_Password` = '$passHash' WHERE `User_ID` ='$_SESSION[uID]';";
		// 			if ($result1 = mysqli_query($link,$sql1)){
		// 				$_SESSION['uPw'] = $passHash;
		// 				echo "<script>alert('Password Changed')</script>";
		// 			} else {
		// 				echo "<script>alert('Error occur during saving')</script>";
		// 			}
		// 		}
		// 		else {
		// 			echo '<script>
		// 				alert("Incorrect Current Password");
		// 			</script>';
		// 		}
		// 	}
		// }
	}

?>