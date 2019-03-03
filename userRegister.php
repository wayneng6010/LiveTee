<!DOCTYPE html>
<html>
<head>
	<title>Register | LiveTee</title>
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
		
	</script>
</head>

<body id="userBody">
	<?php include 'php/userRegisterQuery.php'; ?>
	<?php include "html/userHeaders.html" ?>
	<br>
	<div id="regOuter">
		<p id="regLabel">Create Your LiveTee Account<a href="userLogin.php">Login Here</a></p>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft">
	            <p>
	              	<label><b>Full Name</b></label>
	              	<input class="contentInput" type="text" name="fname" placeholder="e.g. Lee Han Solo" required>
	            </p>
	            <p>
	              	<label><b>Email</b></label>
	              	<input class="contentInput" type="email" name="email" placeholder="e.g. leehansolo@gmail.com" required>
	            </p>
	            <p>
	              	<label><b>Password</b></label>
	              	<input class="contentInput" id="pass" type="password" name="pass" placeholder="At least 8 characters" onkeyup="validatePass()" required>
	              	<p id="passWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword must contains at least 8 characters</p>
	            </p>
	            <p>
	              	<label><b>Confirm Password</b></label>
	              	<input class="contentInput" id="cpass" type="password" name="cpass" placeholder="Confirm your password" onkeyup="confirmPass()" required>
	              	<p id="cpassWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword does not match</p>
	            </p>
        	</div>
			<div class="regHalf" id="regRight">
	            <p>
	              	<label><b>Phone Number</b></label>
	              	<select class="contentInput phone1" type="text" name="phone1" required>
	              		<option>010</option>
	              		<option>011</option>
	              		<option>012</option>
	              		<option>013</option>
	              		<option>014</option>
	              		<option>016</option>
	              		<option>017</option>
	              		<option>018</option>
	              		<option>019</option>
	              	</select> 
	              	<input class="contentInput phone2" id="phoneNo" type="text" name="phone2" pattern="[0-9]{7,8}" placeholder="e.g. 12345678" onkeyup="limitChar()" required>
	            </p>
	            <p>
	              	<label><b>Birthday</b></label>
	              	<input class="contentInput birthday" type="date" name="birthday" value="2000-01-01" onclick="changeColor()" required>
	            </p>
	            <p id="addressField">
	              	<label><b>Address</b></label>
	              	<textarea class="contentInput address" type="text" name="address" title="Home Address" cols="30" rows="5" required></textarea>
	            </p>
        	</div>
            <p style="vertical-align: middle;">
            	<input id="regBtn" class="contentSubmit register" type="submit" value="Register Now" name="register" disabled>
	            <p id="formWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPlease correct invalid input in the form</p>
            	<span style="font-size: 14px; float: right; padding-right: 20px; line-height: .8;">By clicking "Register Now" I agree to LiveTee Privacy Policy</span>
            </p>
    	</form>

	</div>
	<script type="text/javascript">
		var validateAll = true;

		setInterval(function(){
			var subBtn = document.getElementById("regBtn");
			if (validateAll) {
				subBtn.disabled = false;
				subBtn.style.backgroundColor = "#535151"; 
			} else {
				subBtn.disabled = true; 
				subBtn.style.backgroundColor = "lightgrey"; 
			}
		}, 10);

		

		function limitChar(){
			var max_chars = 8;
			if(event.target.value.length >= max_chars) { 
			    event.target.value = event.target.value.substr(0, max_chars);
			}
			event.target.value = event.target.value.replace(/\D/g,'');
		}

		function changeColor(){
			event.target.style.color = "black";
		}

		var firstEnterCon = true;

		function validatePass(){
			var pass = event.target.value;
			var cwarn = document.getElementById("cpassWarn");
			var cpass = document.getElementById("cpass").value;
			var warn = document.getElementById("passWarn");
			if (!firstEnterCon){
				cwarn.style.display = "block";
				validateAll = false;
				if (cpass == pass){
					cwarn.style.display = "none";
					validateAll = true;
				} else {
					cwarn.style.display = "block";
					validateAll = false;
				}
			}
			if (pass.length >= 8) {
				warn.style.display = "none";
			} else {
				warn.style.display = "block";
				validateAll = false;
			}
		}

		function confirmPass(){
			var cpass = event.target.value;
			var pass = document.getElementById("pass").value;
			var cwarn = document.getElementById("cpassWarn");
			firstEnterCon = false;
			if (cpass == pass){
				cwarn.style.display = "none";
				validateAll = true;
			} else {
				cwarn.style.display = "block";
				validateAll = false;
			}
		}
	</script>
</body>
</html>