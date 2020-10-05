<?php 

if(isset($_POST['create_user'])){
   
   $username = $_POST['username'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $zipcode = $_POST['zipcode'];
   $tel = $_POST['tel'];

   
    register_user($username,$firstname,$lastname,$email,$password,$address,$city,$country,$zipcode,$tel);

    set_message("User has been added!");

} 
 ?>

<h1 class="page-header">
  Add Users

</h1>
<?php display_message() ?>


<form action="" method="post" enctype="multipart/form-data">
  
 <div class="form-group">
                <input class="input form-control" type="text" name="username" placeholder="Username" >

                
              </div>
              <div class="form-group">
                <input class="input form-control" type="text" name="firstname" placeholder="First Name">

                
              </div>
              <div class="form-group">
                <input class="input form-control" type="text" name="lastname" placeholder="Last Name">

              </div>
              <div class="form-group">
                <input class="input form-control" type="email"  name="email" placeholder="Email">

               
              </div>

              <div class="form-group">
                <input class="input form-control" type="password"  name="password" placeholder="password">

               
              </div>

              <div class="form-group">
                <input class="input form-control" type="text" name="address" placeholder="Address" >

              
              </div>
              <div class="form-group">
                <input class="input form-control" type="text" name="city" placeholder="City" >

              
              </div>
              <div class="form-group">
                <input class="input form-control" type="text" name="country" placeholder="Country">

                
              </div>
              <div class="form-group">
                <input class="input form-control" type="text" name="zipcode" placeholder="ZIP Code" >

               
              </div>
              <div class="form-group">
                <input class="input form-control" type="tel" name="tel" placeholder="Telephone" >

               
              </div>
              <div class="form-group">
                <button type="submit" name="create_user" class="btn btn-success btn-sm">Create_User</button>
              </div>


</form>