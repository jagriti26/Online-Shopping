<!Doctype>
<?php 
$conn=mysqli_connect("localhost","root","","ecommerce");
?>
<?php 
session_start();
	include('functions/functions.php');
	include('includes/dbcon.php');
?>
<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="styles/style.css" media="all">
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
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="allproducts.php">All products</a></li>
	  <li><a href="#">My account</a></li>
      <li><a href="#">Sign in</a></li>
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
<span style="float:right; font-size:20px;padding:5px; line-heighy:40px;"><b>Welcome Guest</b>
<b>Total price:$<?php total_price();?></b>
<b>Total items:<?php total_item(); ?></b>
<a href="cart.php"><img src="images/addtocart.jpg" title="Add to cart"></a>
</span>
</div>
<!--Add to cart ends-->
<!--Sidebar starts-->
<div id="mySidenav" class="sidenav">
	<a href="#"class="closebtn" id="close">-</a>
	<h3 id="header">Categories</h3>
   <?php 
		getcats();
	?>
  <h3 id="header">Brands</h3>
   <?php 
		getbrand();
	?>  
</div>
<!--Sidebar ends-->
<!-- Content area starts-->
<div class="row">
<center>
	<form method="post" action="customer_register.php" enctype="multipart/form-data">
	<table align="center"class="tabspace">
	<tr>
		<td colspan="3"align="center"><h2>Create Account</h2></td>
	</tr>
	<tr class="tabspace">
		<td>Name:</td>
		<td><input type="text" name="c_name" placeholder="Enter name" required></td>
		</tr>
		<tr>
		<td>E-mail:</td>
		<td><input type="text" name="c_email" placeholder="Enter email" required></td>
		</tr>
		<tr>
		<td>Password:</td>
		<td><input type="password" name="c_pass" placeholder="Enter password" required></td>
		</tr>
		<tr>
		<td>Country:</td>
		<td><select name="c_country">
		<option>Select a country</option>
		<option>Afganistan</option>
		<option>India</option>
		<option>Japan</option>
		<option>Pakistan</option>
		<option>Nepal</option>
		<option>USA</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>City:</td>
		<td><input type="text" name="c_city" placeholder="Enter city" required></td>
		</tr>
		<tr>
		<td>Contact:</td>
		<td><input type="text" name="c_contact" placeholder="Enter contact number" required></td>
		</tr>
		<tr>
		<td>Address:</td>
		<td><input type="text" name="c_address" placeholder="Enter address" required></td>
		</tr>
		<tr>
		<td>Photo:</td>
		<td><input type="file" name="c_image" placeholder="Add image" required></td>
		</tr>
		<tr>
		<td align="center"><input type="submit" name="signup" value="Create account"></td>
		</tr>
	
	</table>
	
	
	</form>
</div>
<!-- Content area ends-->
<div id="footer">
	<h2>&copy www.shoppingCart.com</h2>
</div>
</div>


	</body>
</html>
<?php
if(isset($_POST['signup'])){
	$ip=getIp();
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	
	
	
	move_uploaded_file($c_image_tmp,"customer/customerimages/$c_image");
	
	 $insert_c="insert into customers
	(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image)
	values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	$run_cus=mysqli_query($conn,$insert_c);
	$sel_cart="select * from cart where ip_add='$ip'";
	$run_cart=mysqli_query($conn,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Your account is created')</script>";
		echo"<script>window.open('customer/myaccount.php','_self')</script>";
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Your account is created')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
	}
}
 ?>