<?php

if(isset($_POST['yes'])){
   
   $id = $_SESSION['id'];
   $sql = "DELETE FROM checkout_address WHERE id= '$id'";

   $result = mysqli_query($conn,$sql);

   if($result){
     
       echo "<script>alert('Your account has been deleted !')</script>";
       echo "<script>window.open('account.php','_self')</script>";
   }
}

if(isset($_POST['no'])){

       echo "<script>alert(' Do you want to really delete your account !')</script>";
       echo "<script>window.open('account.php','_self')</script>";
}

?>

<h4>Do you want to delete your Account?</h4>

<form action="" method="POST">
	<p><br></p>
	 <input type="submit" name="yes" value="Yes" class="btn btn-sm btn-success">
	  <input type="submit" name="no" value="No" class="btn btn-sm btn-danger">
</form>