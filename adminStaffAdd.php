<!DOCTYPE html>
<html>
<head>
	<title>Add Staff | Admin</title>
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
		require 'php/adminStaffAddQuery.php';
	?>

	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Staff - Add</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Staff - Add</h1>
	<div id="content_container">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <p>
              	<label><b>Full Name</b></label>
              	<input class="contentInput" type="text" name="fname" required>
            </p>
            <p>
              	<label><b>Email</b></label>
              	<input class="contentInput" type="email" name="email" required>
            </p>
            <p>
              	<label><b>Role</b></label>
            	<select name="role">
                	<option value="0">Staff</option>
                	<option value="1">Admin</option>
            	</select>
            </p>
            <p>
            	<input class="contentSubmit" type="submit" name="add">
            </p>
    </form>
	</div>
  <?php include_once 'headers/adminHeaders.php';  include 'verficationAdminRole.php';?>

</body>
</html>