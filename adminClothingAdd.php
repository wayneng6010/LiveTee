<!DOCTYPE html>
<html>
<head>
	<title>Add Clothing | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="Asset/Image/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
	
</head>
<body>
  <?php
    require 'php/adminClothingAddQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Clothing - Add</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Clothing - Add</h1>
	<div id="content_container">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <p>
              	<label><b>Item Name</b></label>
              	<input class="contentInput" type="text" name="iname" title="Item Name" required>
            </p>
            <p>
              	<label><b>Price</b></label>
              	<b>RM</b>&nbsp<input class="contentInput" type="number" name="iprice" min="0" placeholder="0.00" step="0.01" title="Item Price" required>
            </p>
            <p>
              	<label class="fullWidth"><b>Description</b></label>
              	<textarea class="contentInput" type="text" name="idescription" title="Item Description" cols="38" rows="5" required></textarea>
            </p>
            <p>
              	<label><b>Available Size</b></label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="XS" name="isize[]" checked>XS</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="S" name="isize[]">S</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="M" name="isize[]">M</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="L" name="isize[]">L</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="XL" name="isize[]">XL</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="XXL" name="isize[]">XXL</label>
            </p>

            <script type="text/javascript">
				setInterval(function(){
					for(var x=0; x<6; x++){
						var cboSize = document.getElementsByClassName("sizeCbo")[x];
						if (cboSize.checked == true){
							cboSize.parentElement.style.border = "1px solid black";
						}else{
							cboSize.parentElement.style.border = "1px solid lightgrey";
						}
					}
					for(var x=0; x<2; x++){
						var cboStatus = document.getElementsByClassName("statusCbo")[x];
						if (cboStatus.checked == true){
							cboStatus.parentElement.style.border = "1px solid black";
						}else{
							cboStatus.parentElement.style.border = "1px solid lightgrey";
						}
					}
				}, 10);
			</script>

            <p>
              	<label><b>Category</b></label>
              	<select name="icat">
                	<option disabled>Category</option>
                	<option value="Dresses">Dresses</option>
                	<option value="Tops">Tops</option>
                	<option value="T-Shirts">T-Shirts</option>
                	<option value="Pants">Pants</option>
                	<option value="Shorts">Shorts</option>
                	<option value="Jeans">Jeans</option>
            	</select>
            </p>
            <p>
              	<label><b>Image</b></label>
              	<input class="contentInput" type="file" name="iimg" accept="image/*" onchange="readURL(this);" required>
                <br><img id="clothingPic" src="#" alt="Chosen image" style="display: none;"/>
            </p>
            <p>
              	<label><b>Tag</b></label>
				<select name="itag">
                	<option disabled>Tag</option>
                	<option value="Sales">Sales</option>
                	<option value="New">New</option>
            	</select>
            </p>
            <p>
              	<label><b>Status</b></label>
              	<label class="statusLbl"><input class="statusCbo" type="radio" value="1" name="istatus" checked>Available</label>
              	<label class="statusLbl"><input class="statusCbo" type="radio" value="0" name="istatus">Not Available</label>
            </p>
            <p>
            	<input class="contentSubmit" type="submit" name="add">
            </p>
    </form>
	</div>
  <?php include_once 'headers/adminHeaders.php';  include 'verficationAdminRole.php';?>
  
  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#clothingPic')
                    .attr('src', e.target.result)
                    .attr('style', 'display: block')
                    .attr('style', 'margin-left: 200px')
                    .width('20%');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
      function checkboxLimit(){
        if ($('[name="isize[]"]:checked').length == 0) {
          $('.sizeCbo')[0].checked = true;
        }
      }
      setInterval(checkboxLimit,100);
    });
  </script>
</body>
</html>