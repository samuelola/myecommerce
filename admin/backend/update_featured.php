<?php 

if(isset($_GET['update_featured'])){

	$featured = $_GET['update_featured'];

   $sql = myQuery("UPDATE products SET featured = 'featured' WHERE product_id ='$featured'");

   confirm($sql);

   header("Location:index.php?view_products"); 
}


 ?>