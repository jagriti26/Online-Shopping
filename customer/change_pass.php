<div class="well">
<form method="post" action="">
<center>
<table align="center" width="500">

<tr align="center">
<td align="center"><h2>Change password</h2></td>
</tr>
<tr>
<td><h5>Current password</h5></td>
<td><input type="password" name="pass" required></td>
</tr>
<tr>
<td><h5>New password</h5></td>
<td><input type="password" name="new_pass" required></td>
</tr>
<tr>
<td><h5>Confirm password</h5></td>
<td><input type="password" name="con_pass" required></td>
</tr>
<tr>
		<td align="center"><input type="submit" name="change_pass" value="Change password"></td>
		</tr>


</table>

<?php 
include('includes/dbcon.php');
	if(isset($_POST['change_pass'])){
		
		$email=$_SESSION['customer_email'];
		$pass=$_POST['pass'];
		$new_pass=$_POST['new_pass'];
		$con_pass=$_POST['con_pass'];
		
		$sel_cus="select * from customers where customer_pass='$pass' AND customer_email='$email'";
		$run_cus=mysqli_query($conn,$sel_cus);
		$get_cus=mysqli_fetch_array($run_cus);
		if($get_cus==0){
			echo"<script>alert('Current password  is wrong')</script>";
			
		}
		if($new_pass!=$con_pass){
			echo"<script>alert('New and confirm password are not matching')</script>";
		    exit();
		}
		else{
			$update_pass="update customers set customer_pass='$con_pass' where customer_email='$email'";
			$run_pass=mysqli_query($conn,$update_pass);
			echo"<script>alert('Password updated successfully')</script>";
			echo"<script>window.open('myaccount.php','_self')</script>";
			
		}
	}
?>






</form>
