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
	
	
</head>
<body>
  <?php require 'php/adminClothingEdit_EditQuery.php';?>
	<div id="header">
		<div id="flexLeft"><a href="html/adminHome.html"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Clothing - Edit</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Clothing - Edit</h1>
	<div id="content_container">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" id="editForm">
                <input class="contentInput" type="text" name="eid" title="Item Name" required value="<?php echo $_GET['eid']; ?>" style="display: none;">
            <p>
              	<label><b>Item Name</b></label>
              	<input class="contentInput" type="text" name="iname" title="Item Name" required value="<?php echo $item['Item_Name']; ?>">
            </p>
            <p>
              	<label><b>Price</b></label>
              	<b>RM</b>&nbsp<input class="contentInput" type="number" name="iprice" min="0" placeholder="0.00" step="0.01" title="Item Price" required value="<?php echo $item['Item_Price']; ?>">
            </p>
            <p>
              	<label class="fullWidth"><b>Description</b></label>
              	<textarea class="contentInput" type="text" name="idescription" title="Item Description" cols="38" rows="5" required><?php echo $item['Item_Desp']; ?></textarea>
            </p>
            <p>
              	<label><b>Available Size</b></label>

              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="XS" name="isize[]" <?php if ($XS) echo ' checked';?>>XS</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="S" name="isize[]" <?php if ($S) echo ' checked';?>>S</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="M" name="isize[]" <?php if ($M) echo ' checked';?>>M</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="L" name="isize[]" <?php if ($L) echo ' checked';?>>L</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="XL" name="isize[]" <?php if ($XL) echo ' checked';?>>XL</label>
              	<label class="cboLbl"><input class="sizeCbo" type="checkbox" value="XXL" name="isize[]" <?php if ($XXL) echo ' checked';?>>XXL</label>
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
                	<option value="Dresses" <?php if ($item['Item_Cat'] == 'Dresses') echo ' selected="selected"';?>>Dresses</option>
                	<option value="Tops" <?php if ($item['Item_Cat'] == 'Tops') echo ' selected="selected"';?>>Tops</option>
                	<option value="T-Shirts" <?php if ($item['Item_Cat'] == 'T-Shirts') echo ' selected="selected"';?>>T-Shirts</option>
                	<option value="Pants" <?php if ($item['Item_Cat'] == 'Pants') echo ' selected="selected"';?>>Pants</option>
                	<option value="Shorts" <?php if ($item['Item_Cat'] == 'Shorts') echo ' selected="selected"';?>>Shorts</option>
                	<option value="Jeans" <?php if ($item['Item_Cat'] == 'Jeans') echo ' selected="selected"';?>>Jeans</option>
            	</select>
            </p>
            <p>
              	<label><b>Image</b></label>
              	<input class="contentInput" type="file" name="iimg" accept="image/*"><br>
                <p style="margin-left: 205px; color: darkred;"><i>* Uploading a new image will replace current image.</i></p>
                <?php 
                  echo '<img class="image" src="data:image/jpeg;base64,'.base64_encode( $item['Item_Image'] ).'" width="200" style="margin-left: 205px; border: solid 1px grey;" alt="">';
                ?>

            </p>
            <p>
              	<label><b>Tag</b></label>
				      <select name="itag"  value="<?php echo $item['Item_Tag']; ?>">
                	<option disabled>Tag</option>
                	<option value="Sales" <?php if ($item['Item_Tag'] == 'Sales') echo ' selected="selected"';?>>Sales</option>
                	<option value="New" <?php if ($item['Item_Tag'] == 'New') echo ' selected="selected"';?>>New</option>
            	</select>
            </p>
            <p>
              	<label><b>Status</b></label>
              	<label class="statusLbl"><input class="statusCbo" type="radio" value="1" name="istatus" <?php if ($item['Item_Status']) echo ' checked';?>>Available</label>
              	<label class="statusLbl"><input class="statusCbo" type="radio" value="0" name="istatus" <?php if (!($item['Item_Status'])) echo ' checked';?>>Not Available</label>
            </p>
            <p>
            	<input class="contentSubmit" type="submit" value="Update" name="update">
            </p>
    </form>
	</div>
  <?php include_once 'headers/adminHeaders.html';  include 'verficationAdminRole.php';?>
  
<!--   <script type="text/javascript">
    $("#editForm").submit(function(e) {
      e.preventDefault();
    });

    function submitForm(){
      document.getElementById("editForm").submit();
    } 
  </script> -->
</body>
</html>