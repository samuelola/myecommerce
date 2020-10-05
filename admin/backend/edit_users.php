<?php
if(isset($_GET['id_edit_user'])){
        
        $result = myQuery("SELECT * FROM users WHERE user_id = ".$_GET['id_edit_user']."");
        confirm($result);

        while($row = mysqli_fetch_assoc($result)){
          
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $image = $row['images'];
            $address = $row['address'];
            $city = $row['city'];
            $country = $row['country'];
            $zipcode = $row['zipcode'];
            $tel = $row['tel'];
        }



        if(isset($_POST['update_user'])){

           $username = $_POST['username'];  
           $email = $_POST['email'];  
           $firstname = $_POST['firstname'];  
           $lastname = $_POST['lastname']; 
           $password = $_POST['password']; 
           $password_hashed = password_hash($password, PASSWORD_BCRYPT , ['cost'=>12]);
           $address = $_POST['address'];
           $city = $_POST['city'];
           $country = $_POST['country'];
           $zipcode = $_POST['zipcode'];
           $tel = $_POST['tel'];
           $image = $_POST['image'];
           // $image = $_FILES['image']['name'];
           // $image_tmp = $_FILES['image']['tmp_name'];

           // $target_folder = "../images/";

           // $target_dir = $target_folder . basename($image);

           // move_uploaded_file($image_tmp, $target_dir);


           // if(empty($image)){
              
           //     $result3 = myQuery("SELECT * FROM users WHERE user_id = ".$_GET['id']."");

           //     confirm($result3);

           //     while($row = mysqli_fetch_array($result3)){

           //         $image = $row['images'];
           //     }
           // }


           // $update = "UPDATE users SET ";

           // $update .= "username = '$username', ";   
           // $update .= "email = '$email', ";   
           // $update .= "password = '$password', ";   
           // $update .= "firstname = '$firstname', ";   
           // $update .= "lastname = '$lastname', ";   
           // $update .= "images = '$image' ";
           // $update .= "address = '$address' ";
           // $update .= "city = '$city' ";
           // $update .= "country = '$country' ";
           // $update .= "zipcode = '$zipcode' ";
           // $update .= "tel = '$tel' ";   
           // $update .= "WHERE user_id = ".$_GET['id_edit_user']." "; 


           // $user_query = mysqli_query($conn,$update); 

$update = myQuery("UPDATE users SET username = '$username', email='$email',password='$password_hashed',firstname='$firstname',lastname='$lastname',images='$image',address='$address',city='$city',country='$country',zipcode='$zipcode',tel='$tel' WHERE user_id = ".$_GET['id_edit_user']."");           

confirm($update);
           set_message("User update is successful!");     


        }



    }

  ?>  
  <h1 class="page-header">
      Edit User
      <small>Page</small>
  </h1>
  
  <?php display_message(); ?>
<!-- <div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-5x'></span>

</div> -->






<form  action="" method="post" enctype="multipart/form-data" style="margin-left:350px;">




  <div class="col-md-6">

     

     <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" value="<?php echo isset($username) ? $username : $username='' ?>" class="form-control" >
         
     </div>


      <div class="form-group">
          <label for="email">Email</label>
      <input type="text" name="email" value="<?php echo isset($email) ? $email : $email ?>" class="form-control"   >
         
     </div>


      <div class="form-group">
          <label for="first name">First Name</label>
      <input type="text" name="firstname" value="<?php echo isset($firstname) ? $firstname : $firstname='' ?>" class="form-control"   >
         
     </div>

      <div class="form-group">
          <label for="last name">Last Name</label>
      <input type="text" name="lastname" value="<?php echo isset($lastname) ? $lastname : $lastname='' ?>" class="form-control"   >
         
     </div>


      <div class="form-group">
          <label for="password">Password</label>
      <input type="password" name="password" value="<?php echo isset($password) ? $password : $password='' ?>" class="form-control"  >
         
     </div>

      <div class="form-group">
          <label for="password">address</label>
      <input type="text" name="address" value="<?php echo isset($address) ? $address : $address='' ?>" class="form-control"  >
         
     </div>

      <div class="form-group">
          <label for="password">city</label>
      <input type="text" name="city" value="<?php echo isset($city) ? $city : $city='' ?>" class="form-control"  >
         
     </div>


      <div class="form-group">
          <label for="password">country</label>
      <input type="text" name="country" value="<?php echo isset($country) ? $country : $country='' ?>" class="form-control"  >
         
     </div>


      <div class="form-group">
          <label for="password">zipcode</label>
      <input type="text" name="zipcode" value="<?php echo isset($zipcode) ? $zipcode : $zipcode='' ?>" class="form-control"  >
         
     </div>


      <div class="form-group">
          <label for="password">tel</label>
      <input type="text" name="tel" value="<?php echo isset($tel) ? $tel : $tel='' ?>" class="form-control"  >
         
     </div>



     <div class="form-group">
      <label for="password">Images</label>
      <input type="text" name="image" value="<?php echo isset($image) ? $image : $image ='' ?>" class="form-control">
         
     </div>


      <div class="form-group">

      <a id="user-id" class="btn btn-info" href="index.php?create_users">View users</a>

      <input type="submit" name="update_user" class="btn btn-primary pull-right" value="Update User" >
         
     </div>


      

  </div>



</form>





    