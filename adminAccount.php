<!DOCTYPE html>
<html>
<head>
	<title>Add Staff | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="icon" href="Asset/Image/icon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>

  <script type="text/javascript">
      // setTimeout(function(){

      // $('#selectCat').on('change', function() {
        // $('#content_container').load('adminClothingEdit.php');
      // })

      // $('#selectStatus').on('change', function() {
      //   $('#content_container').load('adminClothingEdit.php');
      // })
      // },5000);



    // var t = setInterval(refresh_div,1000);
  </script>

</head>
<body>
  <?php
    require 'php/adminAccountQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>My Account</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">My Account</h1>

  <div id="content_container" class="container_below" style="margin-top: -140px;">
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
              <input class="contentSubmit login" style="background-color: #2e4f84;" type="submit" value="Confirm" name="chgPW">
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
  
  <?php include_once 'headers/adminHeaders.php';  include 'verficationAdminRole.php';?>

</body>
</html>