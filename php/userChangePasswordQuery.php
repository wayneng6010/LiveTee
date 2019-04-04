<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	

	if(isset($_POST['confirm'])){
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$conpass = $_POST['conpass'];

		if(!(password_verify($oldpass,$_SESSION['uPw']))){
			echo "<script>alert('Password incorrect');</script>";
		}
		else if($newpass != $conpass){
			echo "<script>alert('New password not match');</script>";
		}
		else{
			$sql = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
			
			if($result = mysqli_query($link,$sql)){
				$row = mysqli_fetch_assoc($result);
				$hpass = $row['User_Password'];

				if(password_verify($oldpass,$hpass)){
					$passHash = password_hash($newpass, PASSWORD_DEFAULT);
					$sql1 = "UPDATE `user` SET `User_Password` = '$passHash' WHERE `User_ID` ='$_SESSION[uID]';";
					if ($result1 = mysqli_query($link,$sql1)){
						echo "<script>alert('Password Changed')</script>";
					} else {
						echo "<script>alert('Error occur during saving')</script>";
					}
				}
				else {
					echo '<script>
						alert("Incorrect Current Password");
					</script>';
				}
			}
		}
	}

?>