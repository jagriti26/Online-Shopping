
<html>
<head>
<link rel="stylesheet" href="stylelogin.css"></head>
<body>
<div class="login">
	<h1>Admin Login</h1>
    <form method="post" action="">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
</body>
</html>
<?php
	session_start();
	include("includes/dbcon.php");
	if(isset($_POST['login'])){
		$email=mysql_real_escape_string($_POST['email']);
		$pass=mysql_real_escape_string($_POST['pass']);
		$sel_user="select * from admins where user_email='$email' AND user_pass='$pass'";
		$run_user=mysqli_query($conn,$sel_user);
		$row_user=mysqli_num_rows($run_user);
		if($row_user==0){
			echo"<script>alert('Email or password is wrong')</script>";
		}
		else{
			$_SESSION['user_email']=$email;
			echo"<script>window.open('index.php','_self')</script>";
		}
		
	}
 ?>