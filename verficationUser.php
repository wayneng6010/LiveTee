<?php 
	session_start();
	if (isset($_SESSION['uLogin'])){
		session_destroy();
	}
?>