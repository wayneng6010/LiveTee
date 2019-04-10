<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | LiveTee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  	<link rel="icon" href="Asset/Image/icon1.png">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		// function validatePass(){
		// 	var pass = event.target.value;
		// 	var warn = document.getElementById("invalidWarn");
		// 	if (pass.length >= 8) {
		// 		warn.style.display = "none";
		// 	} else {
		// 		warn.style.display = "block";
		// 	}
		// }
	</script>
</head>

<body id="userBody">
	<?php 
		include "headers/userHeaders.php";
	?>
	<br>
	<div id="regOuter" style="height: 350px; width: 80%;">
		<p id="regLabel">Welcome to LiveTee! Please login.</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft" style="width: 100%">
	            <p>
	              	<label><b>Email</b></label>
	              	<input class="contentInput" type="email" name="email" placeholder="e.g. leehansolo@gmail.com" required style="width: 270px;">
	            </p>
	            <p>
	              	<label><b>Password</b></label>
	              	<input class="contentInput" id="pass" type="password" name="pass" placeholder="Your Password" required style="width: 270px;">
	            </p>
	            <p id="passWarn" style="margin-bottom: -20px; margin-top: 5px;"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspInvalid Email or Password</p>

            <p style="vertical-align: middle;">
            	<input class="contentSubmit login" type="submit" value="Login" name="login">
            	<p style="margin-top: -10px;"><a href="userRegister.php" style="color: black; font-size: 16px;">Not a member? <span style="text-decoration: underline;">Register Here</span></a></p>
            </p>
    	</form>
	</div>
	<?php include 'php/userLoginQuery.php'; ?>
	
</body>
</html>