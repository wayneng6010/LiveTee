<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$email = mysqli_real_escape_string($link,$email);
		$email = htmlentities($email, ENT_QUOTES, "UTF-8");

		$pass = $_POST['pass'];
		$passHash = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "SELECT * FROM user WHERE User_Email ='$email'";
		
		if($result = mysqli_query($link,$sql)){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$hpass = $row['User_Password'];

			if(password_verify($pass,$hpass)){
				$_SESSION['uLogin'] = true;
				$_SESSION['uUsername'] = $row['User_Name'];
				$_SESSION['uID'] = $row['User_ID'];
				$_SESSION['uPw'] = $row['User_Password'];
				$_SESSION['uEmail'] = $row['User_Email'];
				$_SESSION['uBirthday'] = $row['User_Birthday'];
				$_SESSION['uPhoneNo'] = $row['User_PhoneNo'];

				header('Location: userHome.php');
			}
			else{
				echo '<script>
					var warn = document.getElementById("passWarn");
					warn.style.display = "block";
				</script>';
			}
		}
	}
	}

?>