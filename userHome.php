<!DOCTYPE html>
<html>
<head>
	<title>Home | LiveTee</title>
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
		// function loadlink(){
		// 	$('.itemOuter').load(document.URL +  ' .itemOuter');
		// 	
		// }
		// loadlink();
		// setInterval(function(){
  //   		loadlink();
		// }, 1000);
	</script>
	
</head>
<?php include 'php/userHomeQuery.php'; ?>
<body id="userBody">

	<?php include "html/userHeaders.html" ?>
	<div id="userSidebar">

		<div id="genderSidebar">
			<p>Gender</p>
			<div id="genderFlex">
				<div id="gender1"><a href="#">Women</a></div>
				<div id="gender2"><a href="#">Men</a><br></div>
			</div>
		</div>
		<hr>

		<div id="collSidebar">
			<p>Collection</p>
			<a href="#">Sales</a><br>
			<a href="#">New</a><br>
		</div>
		<hr>

		<div id="clothSidebar">
			<p>Clothing</p>
			<a href="#">Dresses</a><br>
			<a href="#">Tops</a><br>
			<a href="#">T-Shirts</a><br>
			<a href="#">Pants</a><br>
			<a href="#">Shorts</a><br>
			<a href="#">Jeans</a><br>
		</div>
		<hr>
	</div>
	
	<div id="sorting">
		<p>Sort By</p>
		<select id="sortSelect">
			<option value="Relevance">Relevance</option>
			<option value="Popularity">Popularity</option>
			<option value="Lowest Price">Lowest Price</option>
			<option value="Highest Price">Highest Price</option>
			<option value="Latest Arrival">Latest Arrival</option>
		</select>
	</div>
	
	<div id="clothing">
		<div class="itemOuter">
			<?php
				

			while($row = mysqli_fetch_assoc($result1)){
			echo '<div class="itemMiddle">
				<div class="itemInner">
				<a href="'."userProduct.php?item=".$row['Item_ID'].'">
					<div class="itemInnest">
						<div class="slideUpOuter">
							<img class="image" src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" width="100%" alt="">
							<div class="slideUpInner">
								<p>VIEW</p>
							</div>
						</div>	
						<p class="desp">'.$row['Item_Name'].'</p>
						<p class="price">RM '.$row['Item_Price'].'</p>
						<p class="sizes">'.$row['Item_Size'].'</p>
						</div>
				</a>
				</div>
			</div>';

			}
			?>
			
		</div>
			
	</div>
	<script type="text/javascript">
		var e = document.getElementById('sortSelect');
		$('#sortSelect').on('change', function() {
        	var sort = $("#sortSelect option:selected").text();
        	var new_url = document.URL.substring(0, document.URL.indexOf('?'));
        	$(location).attr('href', new_url + '?sort=' + sort);
        	counter++;
        });

	</script>
	
</body>
</html>