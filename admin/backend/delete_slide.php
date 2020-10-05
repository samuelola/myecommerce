<?php include "../../resources/config.php" ?>

<?php 


if(isset($_GET['id'])){

$id = $_GET['id'];

$result = myQuery("DELETE FROM slides WHERE slide_id = '$id'");

set_message("Slide has been deleted!");

header("location:../index.php?add_slides");

}

else{

	header("location:../index.php?add_slides");
}

 ?>
