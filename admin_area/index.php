<!Doctype>
<?php 
	session_start();
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}
	else{

?>
<html>

<head>
<link rel="stylesheet" href="styles/style.css" media="all">
<title>
Admin panel</title>
</head>
<body>
<center>
<div class="container">
<div class="jumbotron">
<div>
<img src="images/Admin.png" id="header">
</div>

<ul>
<li><h2>Manage account</h2></li>
<li><h3 style="background-color:skyblue;">Insert</h3></li>
<li><a href="index.php?insert_product">Insert new product</a></li>
<li><a href="index.php?insert_cat">Insert new category</a></li>
<li><a href="index.php?insert_brand">Insert new brand </a></li>
<li><h3 style="background-color:skyblue;">View</h3></li>
<li><a href="index.php?view_product">View all products</a></li>
<li><a href="index.php?view_cat">View all categories</a></li>
<li><a href="index.php?view_brand">View all brands</a></li>
<li><a href="index.php?view_customer">View customers</a></li>
<li><a href="index.php?view_order">View orders</a></li>
<li><a href="index.php?view_payment">View payments</a></li>
<li><a href="logout.php?logout">Logout</a></li>
</ul>
<div class="content">
<?php
	if(isset($_GET['insert_product'])){
		include('insert_product.php');
	}
	if(isset($_GET['view_product'])){
		include('view_product.php');
	}
	if(isset($_GET['edit_pro'])){
		include('edit_pro.php');
	}
	if(isset($_GET['delete_pro'])){
		include('delete_pro.php');
	}
	
	if(isset($_GET['insert_cat'])){
		include('insert_cat.php');
	}
	if(isset($_GET['view_cat'])){
		include('view_cat.php');
	}
	if(isset($_GET['insert_brand'])){
		include('insert_brand.php');
	}
	if(isset($_GET['logout'])){
		include('logout.php');
	}?>
	<?php
	if(isset($_GET['view_brand'])){
		include('view_brand.php');
	}
	if(isset($_GET['delete_brand'])){
		include('delete_pro.php');
	}
	if(isset($_GET['delete_cat'])){
		include('delete_pro.php');
	}
	if(isset($_GET['view_customer'])){
		include('view_customer.php');
	}
	?>
</div>
</div>

</body>
	<?php } ?>
</html>