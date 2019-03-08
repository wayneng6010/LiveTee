<?php 
	session_start();
?>
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
	<?php include 'php/userAccountQuery.php'; ?>
	
	<br>
	<div id="regOuter" style="height: 350px; width: 60%;">
		<p id="regLabel">My Account</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft" style="width: 100%">
				<p>
	              	<span class="inputLbl"><b>Full Name</b></span>
	              	<input class="contentInput profile" type="text" name="fname" value="<?php echo $row['User_Name']; ?>" required>
	            </p>
	            <p>
	              	<span class="inputLbl"><b>Email</b></span>
	              	<input class="contentInput profile" type="email" name="email" value="<?php echo $row['User_Email']; ?>" required>
	            </p>
	            <p>
	              	<span class="inputLbl"><b>Phone Number</b></span>
	              	<select class="contentInput phone1" style="width: 60px;" type="text" name="phone1" required>
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
	              	<input class="contentInput phone2" style="width: 185px;" id="phoneNo" type="text" name="phone2" pattern="[0-9]{7,8}" placeholder="e.g. 12345678" onkeyup="limitChar()" required>
	            </p>
	            <p id="passWarn" style="margin-bottom: -20px; margin-top: 5px;"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspInvalid Email or Password</p>

            <p style="vertical-align: middle;">
            	<input class="contentSubmit login" type="submit" value="Save" name="update">
            </p>
    	</form>
	</div>

	<script type="text/javascript">
		function limitChar(){
			var max_chars = 8;
			if(event.target.value.length >= max_chars) { 
			    event.target.value = event.target.value.substr(0, max_chars);
			}
			event.target.value = event.target.value.replace(/\D/g,'');
		}

	</script>
	
</body>
</html>