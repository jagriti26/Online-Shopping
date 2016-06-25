<!Doctype>

<?php
		include('includes/dbcon.php');
		$user=$_SESSION['customer_email'];
		$get_customer="select * from customers where customer_email='$user'";
		$run_customer=mysqli_query($conn,$get_customer);
		$row_customer=mysqli_fetch_array($run_customer);
		$c_id=$row_customer['customer_id'];
		$name=$row_customer['customer_name'];
		$email=$row_customer['customer_email'];
		$pass=$row_customer['customer_pass'];
		$country=$row_customer['customer_country'];
		$city=$row_customer['customer_city'];
		$contact=$row_customer['customer_contact'];
		$address=$row_customer['customer_address'];
		?>
<html>
	
<!-- Content area starts-->
<div class="row">
<center>
	<form method="post" action="" enctype="multipart/form-data">
	<table align="center"class="tabspace">
	<tr>
		<td colspan="3"align="center"><h2>Edit your Account</h2></td>
	</tr>
	<tr class="tabspace">
		<td>Name:</td>
		<td><input type="text" name="c_name" placeholder="Enter name" value="<?php echo $name; ?>"required></td>
		</tr>
		<tr>
		<td>E-mail:</td>
		<td><input type="text" name="c_email" placeholder="Enter email" value="<?php echo $email; ?>" required></td>
		</tr>
		<tr>
		<td>Password:</td>
		<td><input type="password" name="c_pass" placeholder="Enter password" value="<?php echo $pass; ?>" required></td>
		</tr>
		<tr>
		<td>Country:</td>
		<td><select name="c_country" disabled>
		<option><?php echo $country; ?></option>
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
		<td><input type="text" name="c_city" placeholder="Enter city" value="<?php echo $city; ?>" required></td>
		</tr>
		<tr>
		<td>Contact:</td>
		<td><input type="text" name="c_contact" placeholder="Enter contact number" value="<?php echo $contact; ?>" required></td>
		</tr>
		<tr>
		<td>Address:</td>
		<td><input type="text" name="c_address" placeholder="Enter address" value="<?php echo $address; ?>" required></td>
		</tr>
		<tr>
		<td>Photo:</td>
		<td><input type="file" name="c_image" placeholder="Add image" ></td>
		</tr>
		<tr>
		<td align="center"><input type="submit" name="update" value="Update account"></td>
		</tr>
	
	</table>
	
	
	</form>
</div>
<!-- Content area ends-->


	</body>
</html>
<?php
if(isset($_POST['update'])){
	$ip=getIp();
	$customer_id=$c_id;
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	
	
	
	move_uploaded_file($c_image_tmp,"customerimages/$c_image");
	
	 $update_c="update customers set
	customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image'
	where customer_id='$customer_id'";

	$run_cus=mysqli_query($conn,$update_c);
	echo"<script>alert('Account is successfully updated')</script>";
	echo"<script>window.open('myaccount.php','_self')</script>";
}
 ?>