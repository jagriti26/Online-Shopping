<!Doctype>
<?php
	include("includes/dbcon.php");
	if(isset($_GET['edit_pro'])){
		$get_id=$_GET['edit_pro'];
		$get_pro="select * from products where product_id='$get_id'";
		$run_pro=mysqli_query($conn,$get_pro);
		$row_pro=mysqli_fetch_array($run_pro);
	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_image=$row_pro['product_image'];
	$pro_price=$row_pro['product_price'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];
	$pro_desc=$row_pro['product_desc'];
	$pro_keyword=$row_pro['product_keywords'];
	  
	 $get_cat="select * from categories where cat_id='$pro_cat'";
		$run_cat=mysqli_query($conn,$get_cat);
		$row_cat=mysqli_fetch_array($run_cat);
		$pro_catname=$row_cat['cat_title'];
	$get_brand="select * from brands where brand_id='$pro_brand'";
		$run_brand=mysqli_query($conn,$get_brand);
		$row_brand=mysqli_fetch_array($run_brand);
		$pro_brandname=$row_brand['brand_title'];
	}
?>
<html>
	<head>
		<title>
			Inserting Product
		</title>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body>
		<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="900" border="2" bgcolor="grey">
			<tr>
				<td colspan="7">
				<h2 align="center">Edit Product information</h2>
				</td>
			</tr>
				<tr>
					<td>Product Title</td>
					<td><input type="text" name="product_title"  value="<?php echo $pro_title; ?>"></td>
				</tr>
				<tr>
					<td>Product Category</td>
					<td><select name="product_cat" required><option><?php echo $pro_catname; ?></option>
					<?php
					$getcats="select * from categories";
					$runcats=mysqli_query($conn,$getcats);
					while($rowcats=mysqli_fetch_array($runcats)){
					$cat_id=$rowcats['cat_id'];
					$cat_title=$rowcats['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
					}
					?>
					</select></td>
				</tr>
				<tr>
					<td>Product Brand</td>
					<td><select name="product_brand" required><option><?php echo $pro_brandname;?></option>
					<?php
					$getbrand="select * from brands";
					$runbrand=mysqli_query($conn,$getbrand);
					while($rowbrand=mysqli_fetch_array($runbrand)){
					$brand_id=$rowbrand['brand_id'];
					$brand_title=$rowbrand['brand_title'];
					echo "<option value='$brand_id'>$brand_title</option>";
					}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Product Image</td>
					<td><input type="file" name="product_image" ><img src="product_images/<?php echo $pro_image;?>" width="50" height="50"></td>
				</tr>
				<tr>
					<td>Product Price</td>
					<td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"></td>
				</tr>
				<tr>
					<td>Product Description</td>
					<td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc;?></textarea></td>
				</tr>
				<tr>
					<td>Product Keywords</td>
					<td><input type="text" name="product_keywords" value="<?php echo $pro_keyword;?>"></td>
				</tr>
				<tr align="center">
					
					<td colspan="7"><input type="submit" name="update_post" value="Update"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<!--Getting data to insert in database-->
<?php
	if(isset($_POST['update_post'])){
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		//updating into table products
		$update_product="update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$pro_id'";
		
		
		$update_pro=mysqli_query($conn,$update_product);
		if($update_pro){
			echo "<script>alert('Product has been updated succesfully')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
		}
	}
 ?>