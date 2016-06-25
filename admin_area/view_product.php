<?php 
	session_start();
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}
	else{

?>


<h2>View all products</h2>
<table width="800">

<tr style="background-color: skyblue;">
<td><b>S.no</b></td>
<td><h3>Title</td>
<td><h3>Image</td>
<td><h3>Price</td>
<td><h3>Edit</td>
<td><h3>Delete</td>

</tr>
<?php 
$i=0;
include('includes/dbcon.php');
$get_pro="select * from products";
$run_pro=mysqli_query($conn,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_image=$row_pro['product_image'];
	$pro_price=$row_pro['product_price'];
	$i++;
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $pro_title; ?></td>
	<td><img src="product_images/<?php echo $pro_image; ?>"width="50px" height="50px"></td>
	<td><?php echo $pro_price; ?></td>
	<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
	<td><a href="index.php?delete_pro=<?php echo $pro_id; ?>"">Delete</a></td>
	</tr>
	<?php }} ?>



</table>