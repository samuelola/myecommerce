<?php 
include "../../resources/config.php";

if(isset($_GET['id'])){

$id = $_GET['id'];

$result = myQuery("DELETE FROM users WHERE user_id = '$id'");

set_message("User has been deleted!");
                

header("location:../index.php?create_users");

}

else{

	header("location:../index.php?create_users");
}

 ?>
