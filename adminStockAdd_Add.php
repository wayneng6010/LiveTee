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
    require 'php/adminStockAdd_AddQuery.php';
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
	<h1 id="content_header">Stock - Add<a href="adminStockAdd.php" class="backLink">&#10094;&nbsp;Back</a></h1>

  <div id="content_container" class="container_below" style="margin-top: -130px; padding: 10px 40px;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" id="editForm">
      <p>
        <input class="contentInput" type="text" name="iid" title="Item Name" style="display:none;" required value="<?php echo $item['Item_ID']; ?>">
      </p>

      <p>
        <label><b>Item Name</b></label>
        <?php echo $item['Item_Name']; ?>
      </p>

      <p>
        <label><b>Size</b></label>
        <select name="isize">
        <?php
          foreach($itemSize as $i) {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
        ?>
        </select>
      </p>

      <p>
        <label><b>Quantity</b></label>
        <input class="contentInput" type="number" name="iquan" title="Quantity" style="min-width: 100px; width: 100px;" min="1" placeholder="1" required>
      </p>
      
      <p>
        <input class="contentSubmit" type="submit" value="Add Stock" name="add">
        <div id="successMsg" style="line-height: 1.5; color: darkgreen; display: none;">Stock up successful</div>
      </p>
      <?php
        if(isset($_GET['success'])){
          echo "<script>
            var e = document.getElementById('successMsg');
            e.style.display = 'block';
          </script>";
        }
      ?>
    </form>
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