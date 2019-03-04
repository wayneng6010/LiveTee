<?php 
	session_start();
	if(!isset($_SESSION['sLogin'])){
		$_SESSION['kick'] = true;
		header('Location:adminLogin.php');
	} 

	if($_SESSION['sFirstLog']==1){
		$_SESSION['kick'] = "sFirstLog";
		header('Location:adminFirstLogin.php');
	} 

	// if($_SESSION['role']==1){
	// 	echo "<script>
 //            var e = document.getElementsByClassName('addStaffbtn')[0];
 //            e.style.display = 'inline-block';
 //            </script>";
	// }
?>