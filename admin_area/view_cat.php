<html>
<h2>Category list</h2>
<table width="500">
<tr>
<td><h3>Category id</h3></td>
<td><h3>Category name</h3></td>
</tr>





<?php
include("includes/dbcon.php");
if(isset($_GET['view_cat'])){
		$view_cat="select * from categories";
		$run_cat=mysqli_query($conn,$view_cat);
		$i=0;
		while($row_cat=mysqli_fetch_array($run_cat)){
			$get_id=$row_cat['cat_id'];
			$get_title=$row_cat['cat_title'];
			?>
			<tr><td><?php echo $get_id; ?></td>
			<td><?php echo $get_title; ?></td>
			<td><a href="index.php?delete_cat=<?php echo $get_id ?>">Delete</a></td>
			</tr>
		<?php }
	}
 ?>


</table></html>
