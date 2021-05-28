<?php
	session_start();
	$_SESSION['logged'] = 'guest';
	require("functions.php");
	require("htmls.php");
	$query = mysqli_query($conn,"SELECT * FROM products WHERE status = 0") or die (mysqli_error());
	while($row = mysqli_fetch_array($query))
	{
		$datenow = date("Y-m-d");
		$duedate = $row['duedate'];
		$prodid = $row['productid'];
		if($datenow >= $duedate){
			mysqli_query($conn,"UPDATE products SET status = 1 WHERE productid = '$prodid'") or die (mysqli_error());
		}
	}
	$date = date("Y-m-d");
	headhtml();
?>
  <div id="main_content">
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        <li><a href="home.php" class="nav1">Home</a></li>
        <li class="divider" ></li>
        <li><a href="prodcateg.php" class="nav2">Products</a></li>
        <li class="divider"></li>
        <li><a href="contact.php" class="nav2">Contact Us</a></li>
        <li class="divider">
		</li>
		<?php account(); ?>
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->

    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
   	<div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
      	<?php
			categories();
		?>

      <div class="title_box">News & Updates</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Motorola 156 MX-VL</a></div>
        <div class="product_img"><a href="#"><img src="images/laptop.png" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>


    </div>
    <!-- end of left content -->
    <div class="center_content">
      <div class="center_title_bar">Products On Bid</div>
     	<?php
	  		latest();
		?>

  </div>
