<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';

	if(isset($_POST['register'])){
		$fname = $_POST['fname'];
		$fname = mysqli_real_escape_string($link,$fname);
		$fname = htmlentities($fname, ENT_QUOTES, "UTF-8");

		$email = $_POST['email'];

		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];

		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$phone = $phone1 . $phone2;

		$state = $_POST['state'];
		$postal = $_POST['postal'];
		$address = $_POST['address'];
		if ($pass == $cpass) {
			$passHash = password_hash($pass, PASSWORD_DEFAULT);

			$sql1 = "INSERT INTO user VALUES(null, '$fname', '$email', '$passHash', '$phone', '$address', now(), '$postal', '$state')";
			
			if ($result1 = mysqli_query($link,$sql1)){
				echo "<script>alert('Added Successfully')</script>";
			} else {
				echo "<script>alert('Email has been registered before')</script>";
			}
		} else {
			echo "<script>alert('Password does not match')</script>";
		}
		
	}

?>