<?php
// include 'verficationEP.php';

session_start();
require_once 'conn.php';

$_SESSION['islogin'] = null;

if(isset($_SESSION['kickOut'])){
	// echo "<script>alert('Please login first');</script>";	
} 

if(isset($_SESSION['islogin'])){
	header('Location:adminHome.php');
} 

if(isset($_POST['sub'])){
	$email = htmlentities($_POST['uemail']);
	$password = $_POST['upassword'];
	
	$email = mysqli_real_escape_string($link,$email);
	$email = htmlentities($email, ENT_QUOTES, "UTF-8");
	$password = mysqli_real_escape_string($link,$password);
	$password = htmlentities($password, ENT_QUOTES, "UTF-8");

	$sql = "SELECT * FROM staff WHERE Staff_Email ='$email'";
	if($result = mysqli_query($link,$sql)){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$hpass = $row['Staff_Password'];

			if(password_verify($password,$hpass)){
				$_SESSION['sLogin'] = true;
				$_SESSION['sUsername'] = $row['Staff_Name'];
				$_SESSION['sID'] = $row['Staff_ID'];
				$_SESSION['sPw'] = $row['Staff_Password'];
				$_SESSION['sRole'] = $row['Staff_Role'];
				$_SESSION['sEmail'] = $row['Staff_Email'];
				$_SESSION['sFirstLog'] = $row['Staff_FirstLogin'];
				$_SESSION['sLastLog'] = date("Y-m-d h:i:sa");

				if($row['Staff_FirstLogin']){
					header("Location: adminFirstLogin.php");
				}else{
					header('Location: adminHome.php');
				}
			}
			else{
				echo "<script>alert('Invalid password please try again')</script>";
			}
		}
	}
}

?>