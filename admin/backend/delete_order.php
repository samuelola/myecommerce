<?php include "../../resources/config.php" ?>

<?php 


if(isset($_GET['id'])){

$id = $_GET['id'];

$result = myQuery("DELETE FROM orders WHERE order_id = '$id'");

set_message("Order has been deleted!");

header("location:../index.php?orders");

}

else{

	header("location:../index.php?orders");
}

 ?>
