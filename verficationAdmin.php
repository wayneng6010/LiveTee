<?php 
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:adminLogin.php');
	} 

	// if($_SESSION['role']!=0){
	// 	echo "<script>alert('Access Denied. You are not authorized to access to that page.')</script>";
	// 	header("refresh:0.001;url=user.php");
	// } 

	if($_SESSION['firstlogin']==1){
		$_SESSION['kickOut'] = "kick";
		header('Location:adminFirstLogin.php');
	} 

	// if($_SESSION['role']==1){
	// 	echo "<script>
 //            var e = document.getElementsByClassName('addStaffbtn')[0];
 //            e.style.display = 'inline-block';
 //            </script>";
	// }
?>