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
<!--Image slider starts-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <center>
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
	<li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/l1.jpg" alt="Laptops">
      <div class="carousel-caption">
        <h3>Shopping Cart</h3>
        <p>A place for online accessories</p>
      </div>
    </div>

    <div class="item">
      <img src="images/camera.jpg" alt="Camera">
      <div class="carousel-caption">
       <h3>Shopping Cart</h3>
        <p>A place for online accessories</p>
		</div>
    </div>

    <div class="item">
      <img src="images/tablet.jpg" alt="Tablet">
      <div class="carousel-caption">
        <h3>Shopping Cart</h3>
        <p>A place for online accessories</p>
      </div>
    </div>
	<div class="item">
      <img src="images/mob.jpg" alt="Mobile">
      <div class="carousel-caption">
        <h3>Shopping Cart</h3>
        <p>A place for online accessories</p>
      </div>
    </div>
    <div class="item">
      <img src="images/tablet1.jpeg" alt="Tablet">
      <div class="carousel-caption">
        <h3>Shopping Cart</h3>
        <p>A place for online accessories</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--Image Slider ends-->
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

<?php 
	get_pro(); ?>
	<?php get_cat_pro(); ?>
	<?php get_brand_pro(); ?>
</div>
<!-- Content area ends-->
<div id="footer">
	<?php  echo $ip=getIp(); ?>
	<h2>&copy www.shoppingCart.com</h2>
</div>
</div>


	</body>
</html>