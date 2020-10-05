<?php 
include "../../resources/config.php";

if(isset($_GET['id'])){


$result = myQuery("DELETE FROM reviews WHERE id = ".$_GET['id']."");

set_message("review has been deleted!");
                

header("location:../index.php?view_reviews");

}

else{

	header("location:../index.php?view_reviews");
}

 ?>
