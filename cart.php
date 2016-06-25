<!Doctype>
<?php 
	session_start();
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
<div class="row">
<div class="col-sm-4">
<span style=" font-size:20px; padding:10px; line-heighy:40px;">

<?php 
	
if(isset($_SESSION['customer_email'])){
	echo "<b>Welcome</b>".$_SESSION['customer_email']."!";
}
else{
	echo "<b>Welcome Guest!</b>";
}
 ?>
 </div>
 <div class="col-sm-4 cart_opt">
<b>Total price:$<?php total_price();?></b>
<b>Total items:<?php total_item(); ?></b>
</div>
<div class="col-sm-4 cart_opt"style="float:right;">
<a href="index.php">Back to shop</a>

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
 </div>
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
<!-- Cart area starts-->
<div class="row">
<center>
	<form action="cart.php" method="post" enctype="multipart/form-data">
		<table align="center" width="700" bgcolor="gray">
			<tr align="center">
			<td colspan="5"><h2>Your Cart</h2></td>
			</tr>
			<tr align ="center">
				<td><b>Remove</td>
				<td><b>Products</td>
				<td><b>Quantity</td>
				<td><b>Total Price</td>
			</tr>
	<?php 
	
	$total=0;
	global $conn;
	$ip=getIp();
	$select_price="select * from cart where ip_add='$ip'";
	$run_price=mysqli_query($conn,$select_price);
	while($p_price=mysqli_fetch_array($run_price)){
		$pro_id=$p_price['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($conn,$pro_price);
		while($pr_price=mysqli_fetch_array($run_pro_price)){
			$product_price=array($pr_price['product_price']);
			$product_title=$pr_price['product_title'];
			$product_image=$pr_price['product_image'];
			$product_single_price=$pr_price['product_price'];
			$values=array_sum($product_price);
			$total+=$values;
	
	
	?>
	<tr align="center">
				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
				<td><?php echo $product_title; ?><br>
				
				</td>
				<td><input type="text" size="2" name="qnty" value="<?php echo $_SESSION['qnty']?>"></td>
				<?php 
					
				
				?>
				
				
				
				
				<td><b><?php echo $product_single_price;?></td>	
	
	</tr>
			<?php 	}
	}?>
	
	
	
		</table>
		<h4> Subtotal:$<?php echo $total; ?></h4>
		
		<input type="submit" name="update_cart" value="Update Cart">
		<input type="submit" name="continue" value="Continue Shopping">
		<button><a href="checkout.php" style="text-decoration:none;color:black;">Continue to pay</a></button>
	
	</form>
	
	<?php
	
		$ip=getIp();
		if (isset($_POST['update_cart'])){
			
			foreach($_POST['remove'] as $remove_id){
				$delete_pro="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
				$run_delete=mysqli_query($conn,$delete_pro);
				if($run_delete){
					echo "<script>window.open('cart.php','_self')</script>";
				}
				
			}
		
						$qty=$_POST['qnty'];
						$update_qnty="update cart set qnty='$qty'";
						$run_qnty=mysqli_query($conn,$update_qnty);
						
						$_SESSION['qnty']=$qty;
						$total=$total*$qty;
					}
	
	
		if(isset($_POST['continue'])){
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	
	?>
</div>
<!-- Cart area ends-->
<div id="footer">
	<?php  echo $ip=getIp(); ?>
	<h2>&copy www.shoppingCart.com</h2>
</div>
</div>


	</body>
</html>