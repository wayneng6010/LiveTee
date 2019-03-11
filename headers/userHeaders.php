<div id="headerUserTopNav">
		<div id="topNavLeft">

		</div>

		<div id="topNavRight">
			<?php
				if(isset($_SESSION['uLogin'])){
					echo '<a href="userLogout.php">Logout</a>';
				} else {
					echo '<a href="userLogin.php">Login</a>';
				}
			?>
			<a href="#">Shop</a>
			<?php
				if(isset($_SESSION['uLogin'])){
					echo '<a href="#">My Order</a>
					<a href="userAccount.php">My Account</a>';
				}
			?>
		</div>
	</div>
	
	<div id="headerUser">
		<div id="flexLeft">
			<a href="userHome.php">
				<p>LIVETEE</p>
			</a>
		</div>
		<div id="flexMiddle">
			<form action="/action_page.php" method="get">
				<input type="text" name="searchTxt">
				<input type="image" src="Asset/Image/search.png" width="20" height="auto" name="searchBtn">
			</form>
		</div>
		<div id="flexRight1">
			<img src="Asset/Image/Profile.svg" width="30" height="auto">
			<?php
				$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				if (strpos($url,'userLogin.php')) {
					if (isset($_SESSION['uLogin'])){
						session_destroy();
						unset($_SESSION['uLogin']);
					}
				}

				if(isset($_SESSION['uLogin'])){
					echo '<a href="userAccount.php">'.$_SESSION['uUsername'].'</a>';
				} else {
					echo '<p><a href="userLogin.php">Login</a> / <a href="userRegister.php">Sign Up</a></p>';
				}
			?>
		</div>
		<div id="flexRight2">
			<a href="userCart.php">
				<div id="cartDiv">
					<p>
					<img src="Asset/Image/cart.svg" width="30" height="auto">
					<p>Cart</p>
					</p>
				</div>
			</a>
		</div>
	</div>