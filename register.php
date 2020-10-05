<?php include "resources/config.php" ?>
<?php include "addcart.php" ?> 
<?php top_cart() ?>

<?php include "resources/templates/front/header.php" ?>
	

<?php include "resources/templates/front/top_nav2.php" ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Register</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
       
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
						
				</div>


<?php
 if(isset($_POST['register'])){
    
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

    $errors = [];


    if(empty($username)){
       
       $errors['username'] = "username cannot be empty";
    }

    elseif(strlen($username) < 4){
       
       $errors['username'] = "username cannot be less than 4";
    }

    elseif(username_exist($username)){

        $errors['username'] = "username exist";
    }


    if(empty($firstname)){
       
       $errors['firstname'] = "firstname cannot be empty";
    }

    elseif(strlen($firstname) < 4){
       
       $errors['firstname'] = "firstname cannot be less than 4";
    }

    elseif(firstname_exist($firstname)){

        $errors['firstname'] = "firstname exist";
    }



    if(empty($lastname)){
       
       $errors['lastname'] = "lastname cannot be empty";
    }

    elseif(strlen($lastname) < 4){
       
       $errors['lastname'] = "lastname cannot be less than 4";
    }


     elseif(lastname_exist($lastname)){

        $errors['lastname'] = "lastname exist";
    }




    if(empty($email)){

        $errors['email'] = "email cannot be empty";
    }

    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                $errors['email'] = "email is not valid";

             }

    elseif(email_exist($email)){

        $errors['email'] = "email exist";
    }




    if(empty($password)){

        $errors['password'] = "password cannot be empty";
    }


    if(empty($address)){

        $errors['address'] = "address cannot be empty";
    }


    if(empty($city)){

        $errors['city'] = "city cannot be empty";
    }

    if(empty($country)){

        $errors['country'] = "country cannot be empty";
    }

    if(empty($zipcode)){

        $errors['zipcode'] = "zipcode cannot be empty";
    }

    elseif(strlen($zipcode) < 5){

          $errors['zipcode'] = "zipcode cannot be less than 5";
    }



    if(empty($tel)){

        $errors['tel'] = "tel cannot be empty";
    }

    elseif(strlen($tel) < 11){
     
       $errors['tel'] = "tel cannot be less than 11";
    }


    if(empty($errors)){

      
    	if( register_user($username,$firstname,$lastname,$email,$password,$address,$city,$country,$zipcode,$tel)){

    		login_user($email,$password);
    	}
    	else{

    		return false;
    	}

       
    }

 } 

 ?>              
            
            
				<form   method="post" action="register.php" enctype="multipart/form-data" autocomplete="on">

					<div class="col-md-6">
						<div class="billing-details">
							<p>Already a customer ? <a href="login.php">Login</a></p>
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="username" placeholder="Username" value="<?php echo isset($username) ? $username : $username = "" ?>">

								<p class="text-danger"><?php echo isset($errors['username']) ? $errors['username'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="firstname" placeholder="First Name" value="<?php echo isset($firstname) ? $firstname : $firstname = "" ?>">

								<p class="text-danger"><?php echo isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="text"  value="<?php echo isset($lastname) ? $lastname : $lastname = "" ?>" name="lastname" placeholder="Last Name">

								<p class="text-danger"><?php echo isset($errors['lastname']) ? $errors['lastname'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="email" value="<?php echo isset($email) ? $email : $email = "" ?>" name="email" placeholder="Email">

								<p class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : '' ?></p>
							</div>

							<div class="form-group">
								<input class="input" type="password" value="<?php echo isset($password) ? $password : $password = "" ?>" name="password" placeholder="password">

								<p class="text-danger"><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
							</div>

							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" value="<?php echo isset($address) ? $address : $address = "" ?>">

								<p class="text-danger"><?php echo isset($errors['address']) ? $errors['address'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" value="<?php echo isset($city) ? $city : $city = "" ?>">

								<p class="text-danger"><?php echo isset($errors['city']) ? $errors['city'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country" value="<?php echo isset($country) ? $country : $country = "" ?>">

								<p class="text-danger"><?php echo isset($errors['country']) ? $errors['country'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zipcode" placeholder="ZIP Code" value="<?php echo isset($zipcode) ? $zipcode : $zipcode = "" ?>">

								<p class="text-danger"><?php echo isset($errors['zipcode']) ? $errors['zipcode'] : '' ?></p>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone" value="<?php echo isset($tel) ? $tel : $tel = "" ?>">

								<p class="text-danger"><?php echo isset($errors['tel']) ? $errors['tel'] : '' ?></p>
							</div>
							<div class="form-group">
								<button type="submit" name="register" class="btn btn-success btn-sm">Register</button>
							</div>
						</div>
					</div>

					
					
				</form>

				<div class="col-md-3">
						
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!--footer-->
   <?php include "resources/templates/front/footer.php" ?>