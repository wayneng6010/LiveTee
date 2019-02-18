<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';
	require 'html/adminHome.html';

	if($_SESSION['role']==1){
		echo "<script>
            var e = document.getElementsByClassName('addStaffbtn')[0];
            e.style.display = 'inline-block';
            </script>";
	}


	?>