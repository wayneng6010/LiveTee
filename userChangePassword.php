<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account | LiveTee</title>
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
	<?php include 'php/userChangePasswordQuery.php'; ?>
	
	<div id="myAccNav">
		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/myAccount.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userAccount.php">My Account</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/ps.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userChangePassword.php" id="selected">Change Password</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/purchase.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userPurchase.php">My Purchase</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/review.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userReview.php">My Reviews</a>
			</div>
		</div>
			
	</div>

	<br>
	<div id="regOuter" style="height: 350px; width: 77%; margin-left: 18%;">
		<p id="regLabel">Change Password</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft" style="width: 100%">
				<p>
	              	<span class="inputLbl"><b>Current Password</b></span>
	              	<input class="contentInput profile" type="password" name="oldpass" onkeyup="validatePass1()" placeholder="Current Password" required>
	              	<p id="passWarn1"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword must contains at least 8 characters</p>
	            </p>
				<p>
	              	<span class="inputLbl"><b>New Password</b></span>
	              	<input class="contentInput profile" id="pass" type="password" name="newpass" placeholder="At least 8 characters" onkeyup="validatePass()" required>
	              	<p id="passWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword must contains at least 8 characters</p>
	            </p>
	            <p>
	              	<span class="inputLbl"><b>Confirm New Password</b></span>
	              	<input class="contentInput profile" id="cpass" type="password" name="conpass" placeholder="Confirm your password" onkeyup="confirmPass()" required>
	              	<p id="cpassWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword does not match</p>
	            </p>

            <p style="vertical-align: middle;">
            	<input class="contentSubmit login" type="submit" value="Confirm" name="confirm">
            </p>
    	</form>
	</div>

	<script type="text/javascript">
		var firstEnterCon = true;

		function validatePass(){
			var pass = event.target.value;
			var cwarn = document.getElementById("cpassWarn");
			var cpass = document.getElementById("cpass").value;
			var warn = document.getElementById("passWarn");
			if (!firstEnterCon){
				cwarn.style.display = "block";
				if (cpass == pass){
					cwarn.style.display = "none";
				} else {
					cwarn.style.display = "block";
				}
			}
			if (pass.length >= 8) {
				warn.style.display = "none";
			} else {
				warn.style.display = "block";
			}
		}

		function validatePass1(){
			var pass = event.target.value;
			var warn = document.getElementById("passWarn1");
			
			if (pass.length >= 8) {
				warn.style.display = "none";
			} else {
				warn.style.display = "block";
			}
		}

		function confirmPass(){
			var cpass = event.target.value;
			var pass = document.getElementById("pass").value;
			var cwarn = document.getElementById("cpassWarn");
			firstEnterCon = false;
			if (cpass == pass){
				cwarn.style.display = "none";
			} else {
				cwarn.style.display = "block";
			}
		}

	</script>
	
</body>
</html>