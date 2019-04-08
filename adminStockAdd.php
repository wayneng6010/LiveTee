<!DOCTYPE html>
<html>
<head>
	<title>Stock - Add | Admin</title>
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
    require 'php/adminStockAddQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Stock - Add</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Stock - Add</h1>
	<div id="content_container">
    <form method="post" id="sorting" name="sorting" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <p>
        <label class="filter_lbl"><b>Category</b></label>
        <select id="selectCat" name="icat">
          <option disabled>Category</option>
          <option value="All">All</option>
          <option value="Dresses">Dresses</option>
          <option value="Tops">Tops</option>
          <option value="T-Shirts">T-Shirts</option>
          <option value="Pants">Pants</option>
          <option value="Shorts">Shorts</option>
          <option value="Jeans">Jeans</option>
        </select>
      </p>
      <p>
        <label class="filter_lbl"><b>Status</b></label>
        <select id="selectStatus" name="istatus">
          <option disabled>Status</option>
          <option value="All">All</option>
          <option value="1">Available</option>
          <option value="0">Not Available</option>
        </select>
        <input class="contentSubmit filter_btn" type="submit" name="add" value="Search">
        <input class="contentInput filter_txt" type="text" name="isearch" required>
      </p>
    </form>
  </div>

  <div id="content_container" class="container_below">
    <table id="tableClothing">
      <th>Clothing ID</th>
      <th>Clothing Name</th>
      <th>Category</th>
      <th>Size Available</th>
      <th>Status</th>
      <th>Action</th>
      <?php 
                $counter=0;
                while($row = mysqli_fetch_assoc($result1)){
                (($row['Item_Status'])? $sStatus="Available":$sStatus="Unavailable");
                echo "<tr><td>".$row['Item_ID']."</td><td>".$row['Item_Name']."</td><td>".$row['Item_Cat']."</td><td>".$row['Item_Size']."</td><td>".$sStatus."</td><td>
                <a href='adminStockAdd_Add.php?iid=$row[Item_ID]' title='Add Stock' style='color: darkred;'>Add Stock</a>
                </td></tr>";
                 $counter+=1;
                }
              if($counter==0){
                echo "<tr><td colspan='5' style='background-color: #f2f2f2;'>No item found</td></tr>";
              }

            ?>
    </table>
          
	</div>
  <script type="text/javascript">

  // $('#selectCat').on('change', function(e) {
  //     document.sorting.submit();

  //     function refresh_div() {

  //       jQuery.ajax({
  //           url:'adminClothingEdit.php',
  //           type:'POST',
  //           success:function(msg) {
  //             alert("yes");

  //             $( "#tableClothing" ).load(document.URL + "#tableClothing" );
              
  //               // jQuery(".result1").html(results);
  //               // $('#content_container').fadeOut(800, function(){

  //               //             $('#content_container').html(msg).fadeIn().delay(2000);

  //               //         });
  //           }
  //       });
  //   }
  //   // var t = setInterval(refresh_div,1000);
    
  //     })
</script>
  <?php include_once 'headers/adminHeaders.php';  include 'verficationAdminRole.php';?>

</body>
</html>