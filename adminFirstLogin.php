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
	<script>
        $(function(){
            // $("#includedContent").load("html/adminHeaders.php");
        });
    </script>
</head>
<body>
  <?php
    require 'php/adminFirstLoginQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>First Login - Change Password</span></div>
		<div id="flexRight">
			<!-- <img src="Asset/Image/noti.svg" width="30" height="auto"> -->
			<!-- <img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto"> -->
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header" class="firstLogin">First Login - Change Password</h1>
	<div id="content_container" class="firstLogin">
      <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <p>
          <label>Old Password</label>
          <input class="contentInput" type="password" name="oldPw" onkeyup="validatePass1()" required>
          <p id="passWarn1"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword must contains at least 8 characters</p>
        </p>

        <p>
          <label>New Password</label>
          <input class="contentInput" type="password" id="pass" name="newPw" onkeyup="validatePass()" required>
          <p id="passWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword must contains at least 8 characters</p>
        </p>
        
        <p>
          <label> Confirm New Password</label>
          <input class="contentInput" type="password" id="cpass" name="newPw2" onkeyup="confirmPass()" required>
          <p id="cpassWarn"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspPassword does not match</p>
        </p>

        <p>
          <input class="contentSubmit" type="submit" name="chgPW" value="Save">
        </p>
        <a href="adminLogout.php" class="backLink">&#10094;&nbsp;Logout</a>
        <p id="redirectText">Redirecting ...</p>
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
  <?php
    if(isset($_POST['chgPW'])){
      $oldPw = $_POST['oldPw'];
      $newPw = $_POST['newPw'];
      $newPw2 = $_POST['newPw2'];
      if(password_verify($oldPw, $_SESSION['sPw']) && $newPw == $newPw2) {
        echo "<script type='text/javascript'>
          var btn = document.getElementsByClassName('contentSubmit')[0]; 
          var txt = document.getElementById('redirectText'); 
          btn.style.display = 'none';
          txt.style.display = 'inline-block';
        </script>";
      }
    }
  ?>
</body>
</html>