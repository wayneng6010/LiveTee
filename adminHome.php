<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="icon" href="Asset/Image/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
</head>
<body>
	<?php 
		require 'php/adminHomeQuery.php'; 
	?>

	<div id="header">
		<div id="flexLeft"><a href="html/adminHome.html"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Dashboard</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>

	<div id="dashboard">
		<div class="dashrow">
			<div class="dashitem">
				<div class="dashinner first">
					<a href="adminOrderManage.php" class="dashlink">Orders</a>
				</div>
			</div>

			<div class="dashitem">
				<div class="dashinner second">
					<a href="adminClothingEdit.php" class="dashlink">Items</a>
				</div>
			</div>
		</div>

		<div class="dashrow">
			<div class="dashitem">
				<div class="dashinner third">
					<a href="adminSales.php" class="dashlink">Sales Report</a>
				</div>
			</div>

			<div class="dashitem">
				<div class="dashinner forth">
					<a href="adminStaffView.php" class="dashlink">Staff</a>
				</div>
			</div>
		</div>

	</div>
	<?php include_once 'headers/adminHeaders.html';  include 'verficationAdminRole.php';?>
	
</body>
</html>