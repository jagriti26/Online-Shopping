<!Doctype>
<?php 
	include('functions/functions.php');
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
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
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
<div id="cart_options">
<span style="float:right; font-size:20px;padding:5px; line-height:40px;"><b style="float:center">Welcome Guest</b>
Total price:
Total items:
<a href="cart.php"><img src="images/addtocart.jpg" title="Add to cart"></a>
</span>
</div>
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
<div class="row content_wrapper">
<?php 
		if(isset($_GET['pro_id'])){
			$product_id=$_GET['pro_id'];
		$getpro="select * from products where product_id='$product_id'";
	$runpro=mysqli_query($conn,$getpro);
	while($rowpro=mysqli_fetch_array($runpro)){
		$pro_id=$rowpro['product_id'];
		$pro_title=$rowpro['product_title'];
		$pro_brand=$rowpro['product_brand'];
		$pro_price=$rowpro['product_price'];
		$pro_image=$rowpro['product_image'];
		$pro_desc=$rowpro['product_desc'];
		
		echo "
				<div class='row'>
					<center>
					<h3>$pro_title</h3>
					<h3>Product id:$pro_brand</h3>
					<img src='admin_area/product_images/$pro_image'>
					<p><b>Price:$pro_price</b></p>
					<p>$pro_desc</p>
					<a href='index.php?pro_id=$pro_id'><button type='button' class='btn btn-danger'>Go back</button></a>
					<a href='index.php?pro_id=$pro_id'><button type='button' class='btn btn-primary'>Add to cart</button></a>
				
					
				</div>";
		}}
?>
</div>
<!-- Content area ends-->
<div id="footer">
	<h2>&copy www.shoppingCart.com</h2>
</div>
</div>
</body>
</html>