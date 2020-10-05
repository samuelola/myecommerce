<?php 

if(isset($_GET['update_notfeatured'])){

	$not_featured = $_GET['update_notfeatured'];

   $sql = myQuery("UPDATE products SET featured = 'notfeatured' WHERE product_id ='$not_featured'");

   confirm($sql);

   header("Location:index.php?view_products"); 
}


 ?>