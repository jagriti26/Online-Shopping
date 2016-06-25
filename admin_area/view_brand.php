<html>
<h2>Brand list</h2>
<table width="500">
<tr>
<td><h3>Brand id</h3></td>
<td><h3>Brand name</h3></td>
</tr>





<?php
include("includes/dbcon.php");
if(isset($_GET['view_brand'])){
		$view_brand="select * from brands";
		$run_brand=mysqli_query($conn,$view_brand);
		$i=0;
		while($row_brand=mysqli_fetch_array($run_brand)){
			$get_id=$row_brand['brand_id'];
			$get_title=$row_brand['brand_title'];
			?>
			<tr><td><?php echo $get_id; ?></td>
			<td><?php echo $get_title; ?></td>
			<td><a href="index.php?delete_brand=<?php echo $get_id ?>">Delete</a></td>
			</tr>
		<?php }
	}
 ?>


</table></html>
