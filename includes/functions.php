<?php 
$conn=mysqli_connect("localhost","root","","ecommerce");


function getcats(){
	global $conn;
	$getcats="select * from categories";
	$runcats=mysqli_query($conn,$getcats);
	while($rowcats=mysqli_fetch_array($runcats)){
		$cat_id=$rowcats['cat_id'];
		$cat_title=$rowcats['cat_title'];
		echo "<li> <a href='index.php?cat=$cat_id'> $cat_title</a></li>";
	}
}
function getbrand(){
	global $conn;
	$getbrand="select * from brands";
	$runbrand=mysqli_query($conn,$getbrand);
	while($rowbrand=mysqli_fetch_array($runbrand)){
		$brand_id=$rowbrand['brand_id'];
		$brand_title=$rowbrand['brand_title'];
		echo "<li> <a href='index.php?brand=$brand_id'> $brand_title</a></li>";
	}
}
function get_pro(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $conn;
	$getpro="select * from products order by RAND() LIMIT 0,8";
	$runpro=mysqli_query($conn,$getpro);
	while($rowpro=mysqli_fetch_array($runpro)){
		$pro_id=$rowpro['product_id'];
		$pro_cat=$rowpro['product_cat'];
		$pro_brand=$rowpro['product_brand'];
		$pro_title=$rowpro['product_title'];
		$pro_price=$rowpro['product_price'];
		$pro_image=$rowpro['product_image'];
		
		echo "
			<div class='col-sm-3'>
				<div class='well'>
					<center>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'>
					<p><b>Price:$pro_price</b></p>
					<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-danger'>Details</button></a>
					<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add to cart</button></a>
				
					</div>
				</div>";
	}
}}}

function get_cat_pro(){
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
	global $conn;
	$get_cat_pro="select * from products where product_cat='$cat_id'";
	$run_cat_pro=mysqli_query($conn,$get_cat_pro);
	$count_cat=mysqli_num_rows($run_cat_pro);
	if($count_cat==0){
			echo"<h2><center>No items are found in this category</h2>";
			return;
		}
		
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		$pro_id=$row_cat_pro['product_id'];
		$pro_cat=$row_cat_pro['product_cat'];
		$pro_brand=$row_cat_pro['product_brand'];
		$pro_title=$row_cat_pro['product_title'];
		$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_image'];
		
		echo "
			<div class='col-sm-3'>
				<div class='well'>
					<center>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'>
					<p><b>Price:$pro_price</b></p>
					<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-danger'>Details</button></a>
					<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add to cart</button></a>
				
					</div>
				</div>";
	}}
}


function get_brand_pro(){
	if(isset($_GET['brand'])){
		$brand_id=$_GET['brand'];
	global $conn;
	$get_brand_pro="select * from products where product_brand='$brand_id'";
	$run_brand_pro=mysqli_query($conn,$get_brand_pro);
	$count_brand=mysqli_num_rows($run_brand_pro);
	if($count_brand==0){
			echo"<h2><center>No items are found in this category</h2>";
			return;
		}
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
		$pro_id=$row_brand_pro['product_id'];
		$pro_cat=$row_brand_pro['product_cat'];
		$pro_brand=$row_brand_pro['product_brand'];
		$pro_title=$row_brand_pro['product_title'];
		$pro_price=$row_brand_pro['product_price'];
		$pro_image=$row_brand_pro['product_image'];
		
		echo "
			<div class='col-sm-3'>
				<div class='well'>
					<center>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'>
					<p><b>Price:$pro_price</b></p>
					<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-danger'>Details</button></a>
					<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add to cart</button></a>
				
					</div>
				</div>";
	}
}}

function get_allproducts(){
	global $conn;
	$getpro="select * from products";
	$runpro=mysqli_query($conn,$getpro);
	while($rowpro=mysqli_fetch_array($runpro)){
		$pro_id=$rowpro['product_id'];
		$pro_cat=$rowpro['product_cat'];
		$pro_brand=$rowpro['product_brand'];
		$pro_title=$rowpro['product_title'];
		$pro_price=$rowpro['product_price'];
		$pro_image=$rowpro['product_image'];
		
		echo "
			<div class='col-sm-3'>
				<div class='well'>
					<center>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'>
					<p><b>Price:$pro_price</b></p>
					<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-danger'>Details</button></a>
					<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add to cart</button></a>
				
					</div>
				</div>";
	}
	
}

function results(){
	if (isset($_GET['search'])){
	$search_option=$_GET['user_query'];
	global $conn;	
	$getpro="select * from products where product_keywords like '%$search_option%'";
	$runpro=mysqli_query($conn,$getpro);
	$count_pro=mysqli_num_rows($runpro);
	if($count_pro==0){
			echo"<h2><center>No items are found related to this search</h2>";
			return;
		}
	while($rowpro=mysqli_fetch_array($runpro)){
		$pro_id=$rowpro['product_id'];
		$pro_cat=$rowpro['product_cat'];
		$pro_brand=$rowpro['product_brand'];
		$pro_title=$rowpro['product_title'];
		$pro_price=$rowpro['product_price'];
		$pro_image=$rowpro['product_image'];
		
		echo "
			<div class='col-sm-3'>
				<div class='well'>
					<center>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'>
					<p><b>Price:$pro_price</b></p>
					<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-danger'>Details</button></a>
					<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add to cart</button></a>
				
					</div>
				</div>";
	}
}}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function add_cart(){
	if(isset($_GET['add_cart'])){
		$ip=getIp();
		$pro_id=$_GET['add_cart'];
		global $conn;
		$check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_check=mysqli_query($conn,$check_pro);
		if(mysqli_num_rows($run_check)>0){
			echo "";
		}
		else{
			
			$insert_pro="insert Into cart(p_id,ip_add) values('$pro_id','$ip')";
			mysqli_query($conn,$insert_pro);
			echo"<script>window.open('index.php','_self')</script>";
			
		}
		
	}
}


function total_item(){
	if(isset($_GET['add_cart'])){
		global $conn;
		$ip=getIp();
		$get_item="select * from cart where ip_add='$ip'";
		$run_item=mysqli_query($conn,$get_item);
		$count_item=mysqli_num_rows($run_item);
		echo "$count_item";
	}
	else{
		global $conn;
		$ip=getIp();
		$get_item="select * from cart where ip_add='$ip'";
		$run_item=mysqli_query($conn,$get_item);
		$count_item=mysqli_num_rows($run_item);
		echo "$count_item";
		
	}
}

function total_price(){
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
			$total_price=array($pr_price['product_price']);
			$values=array_sum($total_price);
			$total+=$values;
		}
	}
	echo $total;
}
 ?>