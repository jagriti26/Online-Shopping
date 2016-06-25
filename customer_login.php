<?php 
	
	include("includes/dbcon.php");
	


?>
<html>
<head>
<link rel="stylesheet" href="styles/stylelogin.css"></head>
<body>
<div class="login">
	<h1>Customer Login</h1>
    <form method="post" action="">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" name="signin" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
</body>
</html>

<?php
		if(isset($_POST['signin'])){
			$c_email=$_POST['email'];
			$c_pass=$_POST['pass'];
			$sel_c="select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
			$run_c=mysqli_query($conn,$sel_c);
			$check_c=mysqli_num_rows($run_c);
			if($check_c==0){
				echo"<script>alert('Email or password is invalid')</script>";
				exit();
			}
			$ip=getIp();
			$sel_cart="select * from cart where ip_add='$ip'";
			$run_cart=mysqli_query($conn,$sel_cart);
			$check_cart=mysqli_num_rows($run_cart);
			
			if($check_c>0 AND $check_cart>0){
				$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Successfully logged in')</script>";
		echo"<script>window.open('customer/myaccount.php','_self')</script>";
			}
			
			else{
				$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Successfully logged in')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
			}
		}
	?>

</div>


</html>