<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>

<?php include "resources/templates/front/top_nav2.php" ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Login</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<?php 
      
      if(isset($_POST['login'])){
              
         $email = escape_string($_POST['email']);
         $password = escape_string($_POST['password']);
         
         $errors = [];

         if(empty($email)){
            
            $errors['email'] = "email cannot be empty";
         }
         elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $errors['email'] = "email is not valid";

         }

           if(empty($password)){
            
            $errors['pasword'] = "password cannot be empty";
         }

         
         if(!empty($_POST['remember_me'])){
            
            setcookie("email",$email,time()+(5*365*24*60*60));
            setcookie("password",$password,time()+(5*365*24*60*60));
         }
         else{

         	 if(isset($_COOKIE['email'])){
                 
                 setcookie("email","");
         	 }

         	 if(isset($_COOKIE['password'])){
                
                setcookie("password","");
         	 }
         }

         
         login_user($email,$password);

      }

	 ?>

	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
						
				</div>


				<form  method="post" action="" enctype="multipart/form-data">

					<div class="col-md-6">
						<div class="billing-details">
							<?php display_message() ?>
							<div class="section-title">
								<h3 class="title">Login or Register to buy</h3>
							</div>
							
							
							<div class="form-group">
								<input class="input" type="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : $_COOKIE['email'] = '' ?>" name="email" placeholder="Email">

								<p class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : '' ?></p>
							</div>


							<div class="form-group">
								<input class="input" type="password" name="password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : $_COOKIE['password'] = '' ?>" placeholder="Password">

								<p class="text-danger"><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
							</div>
							
							<div class="form-group">
								<input  type="checkbox" name="remember_me" <?php isset($_COOKIE['email']) ? 'checked' : ''  ?>  > 

									<label for="">Remember me</label>

								 <a style=" position: relative; left: 330px" href="forgotpassword.php?forgot=<?php echo uniqid(true) ?>">Forgot password ?</a></p>
							</div>
							
							
							<div class="form-group">
								<button type="submit" name="login" class="btn btn-success btn-sm">Login</button>
							</div>

							<p>New ? <a href="register.php">Register</a></p>
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

 
    
	<?php include "resources/templates/front/footer.php" ?>
   
	

  
