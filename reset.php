<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>

<?php include "resources/templates/front/top_nav2.php" ?>


	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Reset Password</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<?php 
      
      if(!$_GET['email'] && !$_GET['token']){
           
           header("Location:index.php");
      }

      $email = $_GET['email'];

      $token = $_GET['token'];

      $check_token = myQuery("SELECT * FROM users WHERE token = '$token' AND email = '$email'");

      $row = mysqli_fetch_assoc($check_token);

      $the_email = $row['email'];

      if(isset($_POST['reset'])){
         
         $password = $_POST['password'];
         $confirm_password = $_POST['confirm_password'];
         $hash_password = password_hash($password, PASSWORD_BCRYPT,array('cost'=>12));

         if($password === $confirm_password){
           $update_pass = myQuery("UPDATE users SET token = '', password = '$hash_password' WHERE email = '$the_email'");


              header("Location:login.php");
         }  

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
							<p class="text-center"><?php display_message() ?></p>
							<div class="section-title">
								<h3 class="title">Reset Password </h3>
							</div>
							
							
							<div class="form-group">
								<input class="input" type="password"  name="password" placeholder="Password">

								
							</div>


							<div class="form-group">
								<input class="input" type="password"  name="confirm_password" placeholder="Confirm Password">

								
							</div>


							
							
							<div class="form-group">
								<button type="submit" name="reset" class="btn btn-success btn-sm">Reset Password</button>
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

 
    
	<?php include "resources/templates/front/footer.php" ?>
   
	

  
