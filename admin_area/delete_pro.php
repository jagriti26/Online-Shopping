<?php 
	include("includes/dbcon.php");
	 if(isset($_GET['delete_pro'])){
		$delete_pro=$_GET['delete_pro'];
		$sel_pro="delete from products where product_id='$delete_pro'";
		$run_pro=mysqli_query($conn,$sel_pro);
		
		if($run_pro){
			echo "<script>alert('One product deleted')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
		}
		
		
	 }

?>
<?php 
	if(isset($_GET['delete_brand'])){
		$get_delbrand=$_GET['delete_brand'];
		$del_brand="delete from brands where brand_id='$get_delbrand'";
		$run_delbrand=mysqli_query($conn,$del_brand);
		if($run_delbrand){
			echo"<script>alert('One Brand deleted')</script>";
			echo"<script>window.open('index.php?view_brand','_self')</script>";
	}}
	?>
	
	<?php 
	if(isset($_GET['delete_cat'])){
		$get_delbrand=$_GET['delete_cat'];
		$del_brand="delete from categories where cat_id='$get_delbrand'";
		$run_delbrand=mysqli_query($conn,$del_brand);
		if($run_delbrand){
			echo"<script>alert('One category deleted')</script>";
			echo"<script>window.open('index.php?view_cat','_self')</script>";
	}}
	?>