<!DOCTYPE html>
<html>
<head>
	<title>Order History | Admin</title>
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
    require 'php/adminOrderHistoryQuery.php';
  ?>
  <div id="popUpMsg" style=""><img src="Asset/Image/tick.png" width="auto" height="15" style="margin-right: 10px;">Order Confirmed</div>
	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Order - History</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Order - History</h1>
	<div id="content_container">
    <form method="get" id="sorting" name="sorting" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="margin-top: -15px;">
        <input class="contentSubmit filter_btn" type="submit" name="search" value="Search">
        <input class="contentInput filter_txt" type="text" name="isearch">
      </p>
    </form>
  </div>
  
  <div id="content_container" class="container_below" style="margin-top: -70px;">
    <table id="tableClothing">
      <th>Order ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Order Confirmed On</th>
      <th>Tracking Number</th>
      <th>Order Status</th>
      <th>Action</th>
      <?php 
                $counter=0;
                while($row = mysqli_fetch_assoc($result1)){
                switch ($row['Order_Status']){
                  case '01':
                    $status = "Processing";
                    break;
                  case '02':
                    $status = "Delivering";
                    break;
                  case '03':
                    $status = "Received";
                    break;  
                  default:
                    $status = "Unknown";
                    break;
                }
                $ConDateTime = date("Y-m-d h:iA", strtotime($row['perOrder_ConDateTime']));
                
                echo "<tr><td>#".$row['perOrder_ID']."</td><td>".$row['User_Name']."</td><td>".$row['User_Email']."</td><td>".$ConDateTime."</td><td>".$row['perOrder_TrackNo']."</td><td>".$status."</td>";

                echo "<td><a href='adminOrderHistory_View.php?uid=$row[User_ID]&oid=$row[perOrder_ID]' title='View Order' style='color: darkred;'>View Order</a>
                </td></tr>";
                 $counter+=1;
                }
              if($counter==0){
                echo "<tr><td colspan='7' style='background-color: #f2f2f2;'>No order at the moment</td></tr>";
              }

            ?>
    </table>
    <div id="paging">
      <ul class="pagination">
        <!-- link to first page -->
            <li>
              <?php 
                if (isset($_GET['isearch3'])){
                    echo "<a href='?isearch3=".$_GET['isearch3']."&pageno=1'>";
                  } else {
                    echo "<a href='?isearch3=&pageno=1'>";
                  }
              ?>
            1</a>
            </li>

        <!-- previous icon -->
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <?php 
                if ($pageno <= 1) {
                  echo "<a href='".$_SERVER['REQUEST_URI']."'>";
                } else {
                  if (isset($_GET['isearch3'])){
                    echo "<a href='?isearch3=".$_GET['isearch3']."&pageno=".($pageno - 1)."'>";
                  } else {
                    echo "<a href='?isearch3=&pageno=".($pageno - 1)."'>";
                  }
                  // echo "<a href='?pageno=".($pageno - 1)."'>";

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
                  if (isset($_GET['isearch3'])){
                    echo "<a href='?isearch3=".$_GET['isearch3']."&pageno=".($pageno + 1)."'>";
                  } else {
                    echo "<a href='?isearch3=&pageno=".($pageno + 1)."'>";
                  }
                  // echo "<a href='?pageno=".($pageno + 1)."'>";
                }
              ?>
                  <img src="Asset/Image/next.svg" width="15">
                </a>
            </li>

        <!-- link to last page -->
            <li>
              <?php 
                if (isset($_GET['isearch3'])){
                    echo "<a href='?isearch3=".$_GET['isearch3']."&pageno=".$totalPages."'>";
                  } else {
                    echo "<a href='?isearch3=&pageno=".$totalPages."'>";
                  }
                if ($totalPages > 1) echo $totalPages;
              ?>
              </a>
            </li>
        </ul>
    </div> 
      <?php
        if(isset($_GET['success'])){
          echo "<script>
            var e = document.getElementById('popUpMsg');
            e.style.display = 'flex';
          </script>";
        }
      ?>
	</div>
  <script type="text/javascript">
    setInterval(function(){
      var msg = document.getElementById('popUpMsg');
      msg.style.opacity = "0";
      msg.style.visibility = "hidden";
    }, 1000);

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