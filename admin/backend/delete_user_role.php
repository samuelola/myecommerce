<?php 
include "../../resources/config.php";

if(isset($_GET['id'])){


$result = myQuery("DELETE FROM roles WHERE user_id = ".$_GET['id']."");

set_message("role has been deleted!");
                

header("location:../index.php?view_roles");

}

else{

	header("location:../index.php?view_roles");
}

 ?>
