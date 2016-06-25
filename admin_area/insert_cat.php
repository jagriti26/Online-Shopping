<?php 
	include("includes/dbcon.php");
	if(isset($_POST['add_cat'])){
		$get_cat=$_POST['cat'];
		$insert_cat="insert into categories (cat_title) values('$get_cat')";
		$run_cat=mysqli_query($conn,$insert_cat);
		if($run_cat){
			echo"<script>alert('One category added')</script>";
			echo"<script>window.open('index.php?view_cat','_self')</script>";
		}
	}
?>

<html>
<div class="well">
<form method="post" action="">
<center>
<table align="center" width="500">

<tr align="center">
<td align="center"><h2>Insert new category</h2></td>
</tr>
<tr>
<td><h5>Product name</h5></td>
<td><input type="text" name="cat" required></td>
</tr>

		<td align="center"><input type="submit" name="add_cat" value="Insert"></td>
		</tr>


</table>
</html>