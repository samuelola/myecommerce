<?php
if(isset($_GET['id_edit_role'])){
        
        $result = myQuery("SELECT * FROM roles WHERE role_id = ".$_GET['id_edit_role']."");
        confirm($result);

        while($row = mysqli_fetch_assoc($result)){
          
            $user_role = $row['user_roles'];
            
           
        }



        if(isset($_POST['user_roles'])){

           $user_sam = $_POST['user_role_sam'];  
           

$update = myQuery("UPDATE roles SET user_roles = '$user_sam' WHERE role_id = ".$_GET['id_edit_role']."");           

confirm($update);
           set_message("User role update is successful!");     


        }



    }

  ?>  
  <h1 class="page-header">
      Edit Role
      <small>Page</small>
  </h1>
  
  <?php display_message(); ?>
<!-- <div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-5x'></span>

</div> -->




<form  action="" method="post" enctype="multipart/form-data" style="margin-left:350px;">

  <div class="col-md-6">

 
     <div class="form-group">
      <label for="password">User role</label>
      <input type="text" name="user_role_sam" value="<?php echo isset($user_role) ? $user_role :$user_role ='' ?>" class="form-control">
         
     </div>


      <div class="form-group">

     <a id="user-id" class="btn btn-info" href="index.php?view_roles">View users user role</a>
      <input type="submit" name="user_roles" class="btn btn-primary pull-right" value="Update User role" >
         
     </div>


      

  </div>



</form>





    