<!DOCTYPE html>
<html>
<head>
	<title>Clothing - Edit | Admin</title>
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
    require 'php/adminClothingEditQuery.php';
  ?>
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
    <form method="get" id="sorting" name="sorting" action="<?php echo $_SERVER['PHP_SELF'] ?>">
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
        <input class="contentSubmit filter_btn" type="submit" name="search" value="Search">
        <input class="contentInput filter_txt" type="text" name="isearch">
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
                <a href='adminClothingEdit_Edit.php?eid=$row[Item_ID]' title='Edit'><img class='icon' src='./Asset/Image/edit.svg'></a>
                <a onclick='return confirm(".'"Are you sure you want to delete?"'.")' href='adminClothingEdit.php?did=$row[Item_ID]' title='Delete'><img class='icon' src='./Asset/Image/delete.svg'></a>
                </td></tr>";
                 $counter+=1;
                }
              if($counter==0){
                echo "<tr><td colspan='6' style='background-color: #f2f2f2;'>No item found</td></tr>";
              }

            ?>
    </table>
    <div id="paging">
      <ul class="pagination">
        <!-- link to first page -->
            <li>
              <a href="?pageno=1">1</a>
            </li>

        <!-- previous icon -->
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <?php 
                if ($pageno <= 1) {
                  echo "<a href='".$_SERVER['REQUEST_URI']."'>";
                } else {
                  if ((isset($_GET['icat']) && isset($_GET['istatus']) && isset($_GET['isearch']))){
                    echo "<a href='?icat=".$_GET['icat']."&istatus=".$_GET['istatus']."&isearch=".$_GET['isearch']."&pageno=".($pageno - 1)."'>";
                  } else {
                    echo "<a href='?icat=&istatus=&isearch=&pageno=".($pageno - 1)."'>";
                  }
                }
              ?>
                  <img src="Asset/Image/prev.svg" width="15">
                </a>
            </li>
        
        <!-- current page number -->
            <li>
              <span id="currentPg">
            <?php echo $pageno; ?>
              </span>
            </li>

        <!-- next icon -->
            <li class="<?php if($pageno >= $totalPages){ echo 'disabled'; } ?>">
              <?php 
                if ($pageno >= $totalPages) {
                  echo "<a href='".$_SERVER['REQUEST_URI']."'>";
                } else {
                  if ((isset($_GET['icat']) && isset($_GET['istatus']) && isset($_GET['isearch']))){
                    echo "<a href='?icat=".$_GET['icat']."&istatus=".$_GET['istatus']."&isearch=".$_GET['isearch']."&pageno=".($pageno + 1)."'>";
                  } else {
                    echo "<a href='?icat=&istatus=&isearch=&pageno=".($pageno + 1)."'>";
                  }
                  // echo "<a href='?pageno=".($pageno + 1)."'>";
                }
              ?>
                  <img src="Asset/Image/next.svg" width="15">
                </a>
            </li>

        <!-- link to last page -->
            <li>
              <a href="?pageno=<?php echo $totalPages; ?>"><?php if ($totalPages > 1) echo $totalPages; ?></a>
            </li>
        </ul>
    </div>  
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
  
  <?php include_once 'headers/adminHeaders.html';  include 'verficationAdminRole.php';?>

</body>
</html>