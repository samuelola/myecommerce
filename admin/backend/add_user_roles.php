<?php
if(isset($_GET['add_user_roles'])){
      
      if(isset($_POST['roles'])){

         $add_user_roles = $_GET['add_user_roles'];
         $user_role = $_POST['user_role'];

         $result = myQuery("INSERT INTO roles (role_id,user_roles) VALUES (' $add_user_roles','$user_role')");

         confirm($result);

         set_message("User role has been added!");

      }  
      

     
  }



  ?>  
  <h1 class="page-header">
      Add User Roles
      <small>Page</small>
  </h1>
  
  <?php display_message(); ?>
<!-- <div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-5x'></span>

</div> -->






<form  action="" method="post" enctype="multipart/form-data" style="margin-left:350px;">




  <div class="col-md-6">

     

     <div class="form-group">
      <label for="roles">User Roles</label>
      
       <select name="user_role"  class="form-control">
          <option value="">--select role---</option>
          
             <option value="admin">Admin</option>
             <option value="subscriber">Subscriber</option>

          
       </select>

     </div>



      <div class="form-group">

     

      <input type="submit" name="roles" class="btn btn-primary pull-left" value="Add User role" >
         
     </div>


      

  </div>



</form>





    