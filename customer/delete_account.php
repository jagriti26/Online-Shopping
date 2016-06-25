<div class="well">
<form method="post" action="">
<center>

<h3>Are you sure you want to delete your account.</h3>
<input type="submit" name="yes" value="Yes">
<input type="submit" name="no" value="No">
</form>
</div>
<?php 
include('includes/dbcon.php');
	if(isset($_POST['yes'])){
	
		$email=$_SESSION['customer_email'];
		$delete_cus="delete from customers where customer_email='$email'";
		$run_cus=mysqli_query($conn,$delete_cus);
		echo"<script>alert('Your account is deleted')</script>";
		echo"<script>window.open('../index.php','_self')</script>";
	}	
	if(isset($_POST['no'])){
		
		echo"<script>window.open('myaccount.php','_self')</script>";
	}
?>	
	
	
</form>
</div>