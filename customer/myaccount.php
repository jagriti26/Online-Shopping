<!Doctype>
<?php 
	session_start();
	include('includes/dbcon.php');
	include('includes/functions.php');
?>
<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="style/style.css" media="all">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/navbar.js"></script>

</head>
<body>
<div class="jumbotron">
<div class="container-fluid" id="main" >
<!--navbar starts-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
	<a class="navbar-brand" id="open" href="#"><img src="images/icon.png"></a>
 <a  class="navbar-brand" id="title" href="#">ShoppingCart.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">Home</a></li>
      <li><a href="../allproducts.php">All products</a></li>
	  <li><a href="myaccount.php">My account</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" id="form">
	<div id="form">
	<form method="get" action="results.php" enctype="multipart/form-data">
      <input type="text" name="user_query" placeholder="Search a item">
      <input type="submit" name="search" value="Search">
	  </form>
	  </div>
    </ul>
  </div>
</nav>
<!--navbar ends-->
<!--Add to cart-->
<?php add_cart(); ?>
<div id="cart_options">
<span style="float:left; font-size:20px;padding:5px; line-heighy:40px;">
<?php 
	
if(isset($_SESSION['customer_email'])){
	echo "<b>Welcome</b>".$_SESSION['customer_email']."!";
}

 ?>




<?php
if(!isset($_SESSION['customer_email'])){
	echo "<a href='checkout.php'>Sign in</a>";
}
else{
	echo "<a href='logout.php'>Sign out</a>";
}
 ?>
</span>
</div>
<!--Add to cart ends-->
<div class="row">
<marquee><h5>Hurry up!</h5></marquee></div>
<!--Sidebar starts-->
<div id="mySidenav" class="sidenav">
	<a href="#"class="closebtn" id="close">-</a>
	<h3 id="header">My account</h3>
	<?php
		$user=$_SESSION['customer_email'];
		$get_image="select * from customers where customer_email='$user'";
		$run_image=mysqli_query($conn,$get_image);
		$post_image=mysqli_fetch_array($run_image);
		$print_image=$post_image['customer_image'];
		$get_name=$post_image['customer_name'];
		echo "<li><img src='customerimages/$print_image' class='img-circle' width='150' height='150' align='center'></li>";


	?>
   <li><a href="myaccount.php?my_orders">My orders</a></li>
   <li><a href="myaccount.php?edit_account">Edit account</a></li>
   <li><a href="myaccount.php?change_pass">Change password</a></li>
   <li><a href="myaccount.php?delete_account">Delete account</a></li>
   
</div>
<!--Sidebar ends-->
<!-- Content area starts-->
<div class="row">

<h2 style="color:blue; text-align:center;">Welcome:<?php echo "$get_name" ?></h2>
<?php
if(!isset($_GET['my_orders'])){
	if(!isset($_GET['edit_account'])){
		if(!isset($_GET['change_pass'])){
			if(!isset($_GET['delete_account'])){
				echo "<h4 style='text-align:center;'><b>You can see your orders progress by clicking <a href='myaccount.php?my_orders'> here</a></b></h4>";
			}
		}
	}
}
?>
<?php 
	if(isset($_GET['edit_account'])){
		include('edit_account.php');
	}?>
	<?php
		if(isset($_GET['change_pass'])){
		include('change_pass.php');
	}
?>	
<?php
		if(isset($_GET['delete_account'])){
		include('delete_account.php');
	}
?>	
</div>
<!-- Content area ends-->
<div id="footer">
	<?php  echo $ip=getIp(); ?>
	<h2>&copy www.shoppingCart.com</h2>
</div>
</div>


	</body>
</html>