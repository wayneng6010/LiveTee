<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | LiveTee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  	<link rel="icon" href="Asset/Image/icon1.png">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
	<script language="JavaScript" type="text/javascript" src="try.js"></script>

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<style>
		.mySlides {
			display:none;
		}

		a {
			color: white;
		}
		
		div, p{
			transition:all ease-out .5s 0s;
		}

		.fade-rightImg{opacity:0;position:relative;}
		.fade-paragraphContent{opacity:0;position:relative;}
		.fade-topLeftLine{opacity:0;position:relative;}
		.fade-getQuoteBtn{opacity:0;position:relative;}
		.fade-01{opacity:0;position:relative;}
		.fade-easyOrder{opacity:0;position:relative;}
		.fade-centerLine{opacity:0;position:relative;}
		.fade-centerBottomImg{opacity:0;position:relative;}

		/*Right Image*/
		.fade-up{bottom: 0px;}

		/*'01' Text*/
		.fade-left2{bottom:0%; left: 0%;}

		/*'Easy Orders and Pick Ups' Text*/
		.fade-left3{bottom:28%; left: 0%;}

		/*Center Bottom Image*/
		.fade-up2{bottom:230px;}

		/*Center Line*/
		.fade-in{width: 0%;}

		.fade-down{top:-50px;}
		.fade-left{left:0%;}
		.fade-right{right:-50px;}

		/* Top left Line*/
		.fade-left.showing{left:6%;opacity:1;}

		/*Center Line*/
		.fade-in.showing{width: 53%; opacity:1;}

		/*Right Image*/
		.fade-up.showing{bottom:0px;opacity:1;}

		/*.headerHome.showing{opacity:1;}*/
		/*'01' Text*/
		.fade-left2.showing{bottom: -0%; left: 3%; opacity:.3;}

		/*'Easy Orders and Pick Ups' Text*/
		.fade-left3.showing{bottom: 28%; left: 3%; opacity:1;}

		/*Center Bottom Image*/
		.fade-up2.showing{bottom: 280px;opacity:1;}

		.fade-down.showing{top:-0px;opacity:1;}

		.fade-right.showing{right:-0px;opacity:1;}
	</style>
</head>

<body id="userBody">
	<?php include "headers/userHeaders.php" ?>
	<br>
	<div class="w3-content w3-display-container" style="">
		<img class="mySlides" src="Asset/Image/liveteeCover.jpg" style="width:100%">
	  	<img class="mySlides" src="https://cdn.store-assets.com/s/174255/f/2542221.jpeg" style="width:100%">
	  	<img class="mySlides" src="https://cdn.store-assets.com/s/174255/f/2542246.jpeg" style="width:100%">
	  	<img class="mySlides" src="https://cdn.store-assets.com/s/174255/f/2542229.jpeg" style="width:100%">
  		<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  		<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  		<a href="userShop.php" style="position: absolute; bottom: 0; background-color: #515151; width: 100%; padding: 5px; text-align: center; opacity: .9; height: 50px; display: flex; align-items: center; justify-content: center;">Shop Now</a>
	</div>

	<div class="headerHome" style="width: 100%; background-color: #515151; opacity: 0; height: 70px; display: flex; align-items: center; justify-content: center;">
		<p class="headerHomeTxt" style="text-align: center; font-weight: bold; font-size: 28px; color: white;">Why Choose LiveTee ?</p>
	</div>

	<div style="width: 1000px; margin: 0 auto; height: 450px; display: flex; flex-wrap: nowrap; margin-top: 50px;">

	<div style="width: 50%;">

	<!-- Top Left Line -->
	<div class="fade-left fade-topLeftLine" style="background:#515151; height: 7px; width: 20%;"></div>

	<!-- '01' Text -->
	<p class="fade-left2 fade-01" style="font-size:200px; font-family: Roboto; font-weight: bold; color: #AFAFAF; margin-top: 0px; position: relative; margin-bottom: 0;">01</p>

	<!-- 'Easy Orders and Pick Ups' Text -->
	<p class="fade-left3 fade-easyOrder" style="font-size:27px; font-family: Roboto; font-weight: bold; color: #515151; line-height: 1.2; margin-left: 20%; position: relative;">Easy Orders<br>& Pick Ups</p>

	<!-- Center Line -->
	<div class="fade-in fade-centerLine" style="background:#515151; height: 3px; float: right; margin-right: -60px; margin-top: -200px; position: relative; z-index: 1;"></div>

	<!-- Paragraph Content -->
	<p class="fade-left fade-paragraphContent" style="width: 50%; max-width: 330px; color: #95989A; line-height: 1.2; font-size: 14px; transform: translate(0,-40px);"> 
	Clear lines and reduce waiting time with easy orders and allocating order chits to your customers for seamless picks ups when their orders are done.
	</p>

	<!-- Get Quote Button -->
	<div class="fade-left fade-getQuoteBtn" style="width: 100%; max-width: 350px; color: #95989A; line-height: 1.2; z-index: 1; transform: translate(0,-40px);">
	<div class="getQuoteBtnAll" id="getQuoteBtn1" style="background: #515151; height: 37px; display: table;">
	<a href="userShop.php" style="text-align: center; vertical-align: middle; display: table-cell; color: white; font-size: 14px; width: 50%;">SHOP NOW</a>
	</div>
	</div>


	</div>


	<div style="width: 50%;">

	<!-- Right Image -->
	<div class="fade-up fade-rightImg" style="height: 400px; position: relative; transform: translate(0,-40px)">
	<div style="background: url('https://media.istockphoto.com/photos/deliveryman-with-boxes-and-clipboard-isolated-on-white-background-picture-id629942096?k=6&m=629942096&s=612x612&w=0&h=IuyFQGQeZb45KkItaa8ADmmZZmAB60y7i_F03C-1XL4='); background-repeat: no-repeat; background-size: cover; overflow: hidden; position: relative; min-height: 100%;"></div>
	</div>

	<!-- Center Bottom Image -->
	<div class="fade-up2 fade-centerBottomImg" style="height: 500px; padding-top: 100px; margin-left: -100px; position: relative;" >
	<img src="https://www.freeiconspng.com/uploads/free-shipping-car-icon-symbol-23.png" style="height: auto; width: 30%; z-index: 0;">
	</div>

	</div>


	</div>

	<div style="height: 30px;">
	</div>

	<div style="width: 1000px; margin: 0 auto; height: 450px; display: flex; flex-wrap: nowrap; overflow: hidden;">

	<div style="width: 50%;">

	<!-- Top Left Line -->
	<div class="fade-left fade-topLeftLine" style="background:#515151; height: 7px; width: 20%;"></div>

	<!-- '01' Text -->
	<p class="fade-left2 fade-01" style="font-size:200px; font-family: Roboto; font-weight: bold; color: #AFAFAF; margin-top: 0px; position: relative; margin-bottom: 0;">02</p>

	<!-- 'Easy Orders and Pick Ups' Text -->
	<p class="fade-left3 fade-easyOrder" style="font-size:27px; font-family: Roboto; font-weight: bold; color: #515151; line-height: 1.2; margin-left: 20%; position: relative;">High Quality<br>& Printing</p>

	<!-- Center Line -->
	<div class="fade-in fade-centerLine" style="background:#515151; height: 3px; float: right; margin-right: -60px; margin-top: -200px; position: relative; z-index: 1;"></div>

	<!-- Paragraph Content -->
	<p class="fade-left fade-paragraphContent" style="width: 50%; max-width: 330px; color: #95989A; line-height: 1.2; font-size: 14px; transform: translate(0,-40px);"> 
	Our customised Tee Shirts are made using the finest material and the latest printing technology and go through a rigorous quality check to provide you with a superior unmatched quality.
	</p>

	<!-- Get Quote Button -->
	<div class="fade-left fade-getQuoteBtn" style="width: 100%; max-width: 350px; color: #95989A; line-height: 1.2; z-index: 1; transform: translate(0,-40px);">
	<div class="getQuoteBtnAll" id="getQuoteBtn1" style="background: #515151; height: 37px; display: table;">
	<a href="userShop.php" style="text-align: center; vertical-align: middle; display: table-cell; color: white; font-size: 14px; width: 50%; z-index: 0;">SHOP NOW</a>
	</div>
	</div>

	</div>


	<div style="width: 50%;">

	<!-- Right Image -->
	<div class="fade-up fade-rightImg" style="height: 400px; overflow: hidden; position: relative;">
	<img src="https://www.dhresource.com/0x0s/f2-albu-g10-M00-36-19-rBVaWVwaAXOAIs0NAAS34UeBgBM115.jpg/t-shirt-priner-a4-dtg-printer-clothes-flatbed.jpg" style=" width: 100%; z-index: -1;">
	</div>

	<!-- Center Bottom Image -->
	<!-- <div class="fade-up2 fade-centerBottomImg" style="height: 500px; margin-left: -250px; position: relative;" >
	<img src="https://cdn.store-assets.com/s/174255/f/2542221.jpeg" style="height: auto; width: 63%; z-index: 0;">
	</div> -->

	</div>


	</div>
</body>
<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {
			slideIndex = 1;
		}
		if (n < 1) {
			slideIndex = x.length;
		}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		x[slideIndex-1].style.display = "block";  
	}


</script>
</html>