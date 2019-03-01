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
		function limitChar(){
			var max_chars = 8;
			if(event.target.value.length >= max_chars) { 
			    event.target.value = event.target.value.substr(0, max_chars);
			}
			event.target.value = event.target.value.replace(/\D/g,'');
		}
	</script>
</head>

<body id="userBody">
	<?php include 'php/userRegisterQuery.php'; ?>
	<?php include "html/userHeaders.html" ?>
	<br>
	<div id="regOuter">
		<p id="regLabel">Create Your LiveTee Account<a href="#">Login Here</a></p>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft">
	            <p>
	              	<label><b>Full Name</b></label>
	              	<input class="contentInput" type="text" name="name" placeholder="e.g. Lee Han Solo" required>
	            </p>
	            <p>
	              	<label><b>Email</b></label>
	              	<input class="contentInput" type="email" name="email" placeholder="e.g. leehansolo@gmail.com" required>
	            </p>
	            <p>
	              	<label><b>Password</b></label>
	              	<input class="contentInput" type="password" name="password" placeholder="At least 8 characters" required>
	            </p>
	            <p>
	              	<label><b>Confirm Password</b></label>
	              	<input class="contentInput" type="password" name="password" placeholder="Confirm your password" required>
	            </p>
        	</div>
			<div class="regHalf" id="regRight">
	            <p>
	              	<label><b>Phone Number</b></label>
	              	<select class="contentInput phone1" type="text" name="phone" required>
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
	              	<input class="contentInput phone2" id="phoneNo" type="text" name="phone" pattern="[0-9]{7,8}" placeholder="e.g. 12345678" onkeyup="limitChar()" required>
	            </p>
	            <p>
	              	<label><b>Birthday</b></label>
	              	<input class="contentInput birthday" type="date" name="birthday" value="2000-01-01" required>
	            </p>
	            <p id="addressField">
	              	<label><b>Address</b></label>
	              	<textarea class="contentInput address" type="text" name="address" title="Home Address" cols="30" rows="5" required></textarea>
	            </p>
        	</div>
            <p style="vertical-align: middle;">
            	<input class="contentSubmit register" type="submit" value="Register Now" name="register">
            	<span style="font-size: 14px; float: right; padding-right: 20px; line-height: .8;">By clicking "Register Now" I agree to LiveTee Privacy Policy</span>
            </p>
    	</form>

	</div>
	
</body>
</html>