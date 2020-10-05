<?php 
include "../../resources/config.php";

if(isset($_GET['id'])){

$id = $_GET['id'];

$result = myQuery("DELETE FROM categories WHERE cat_id = '$id'");

set_message("Category has been deleted!");
                

header("location:../index.php?categories");

}

else{

	header("location:../index.php?categories");
}

 ?>
