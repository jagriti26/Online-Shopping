<h2>View all customers</h2>
<table width="800">

<tr style="background-color: skyblue;">
<td><b>S.no</b></td>
<td><h3>Customer Name</td>
<td><h3>Email id</td>
<td><h3>Password</td>
<td><h3>Country</td>
<td><h3>City</td>
<td><h3>Address</td>
<td><h3>Mobile No.</td>

</tr>
<?php 
$i=0;
include('includes/dbcon.php');
$get_pro="select * from customers";
$run_pro=mysqli_query($conn,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_name=$row_pro['customer_name'];
	$pro_email=$row_pro['customer_email'];
	$pro_pass=$row_pro['customer_pass'];
	$pro_country=$row_pro['customer_country'];
	$pro_city=$row_pro['customer_city'];
	$pro_address=$row_pro['customer_address'];
	$pro_contact=$row_pro['customer_contact'];
	$i++;
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $pro_name; ?></td>
	<td><?php echo $pro_email; ?></td>
	<td><?php echo $pro_pass; ?></td>
	<td><?php echo $pro_country; ?></td>
	<td><?php echo $pro_city; ?></td>
	<td><?php echo $pro_address; ?></td>
	<td><?php echo $pro_contact; ?></td>
	</tr>
<?php } ?>



</table>