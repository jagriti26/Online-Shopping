<?php 
	include("includes/dbcon.php");
	if(isset($_POST['add_brand'])){
		$get_brand=$_POST['brand'];
		$insert_brand="insert into brands (brand_title) values('$get_brand')";
		$run_brand=mysqli_query($conn,$insert_brand);
		if($run_brand){
			echo"<script>alert('One category added')</script>";
			echo"<script>window.open('index.php?view_brand','_self')</script>";
		}
	}
?>

<html>
<div class="well">
<form method="post" action="">
<center>
<table align="center" width="500">

<tr align="center">
<td align="center"><h2>Insert new brand</h2></td>
</tr>
<tr>
<td><h5>Brand name</h5></td>
<td><input type="text" name="brand" required></td>
</tr>

		<td align="center"><input type="submit" name="add_brand" value="Insert"></td>
		</tr>

</form>
</table>
</html>