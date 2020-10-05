<?php include "../../resources/config.php" ?>

<?php 


if(isset($_GET['id'])){

$id = $_GET['id'];

$result = myQuery("DELETE FROM products WHERE product_id = '$id'");

set_message("Products has been deleted!");

header("location:../index.php?view_products");

}

else{

	header("location:../index.php?view_products");
}

 ?>
