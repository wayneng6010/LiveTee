<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';

	if($_SESSION['role']==1){
		echo "<script>
            var e = document.getElementsByClassName('addStaffbtn')[0];
            e.style.display = 'inline-block';
            </script>";
	}

	
	$sql1 = "SELECT * FROM item";

	$result1 = mysqli_query($link,$sql1);
	// $icat = $_POST['icat'];
	// $sql1 = "SELECT * FROM item WHERE `Item_Cat`='$icat'";
	// echo '<script>alert("'.$sql1.'")</script>';
	require 'html/adminClothingEdit.html';



	// $istatus = $_POST['istatus'];
	
	// if($icat != "All" || $istatus != "All"){
	// 	$sql1 .= " WHERE ";
	// }

	// if($icat != "All"){
	// 	$sql1 .= "`Item_Cat`='$icat' ";
	// }

	// if($icat != "All" && $istatus != "All"){
	// 	$sql1 .= "AND ";
	// }

	// if($istatus != "All"){
	// 	$sql1 .= "`Item_Status`='$istatus'";
	// }

	// $result1 = mysqli_query($link,$sql1);

	?>