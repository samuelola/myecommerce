<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>

<?php include "resources/templates/front/top_nav2.php" ?>

<?php 
include "Classes/Config.php";
include "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
 ?>

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
      
      if(isset($_GET['forgot'])){


          if(isset($_POST['forgot'])){
                  
             $email = escape_string($_POST['email']);

             $length = 50;

             $token = bin2hex(openssl_random_pseudo_bytes($length));

             if(email_exist($email)){

             	$update = myQuery("UPDATE users SET token = '$token' WHERE email = '$email'");

             	  $mail = new PHPMailer();

             		$mail->isSMTP();                                            // Send using SMTP
             		$mail->Host       = Config::SMTP_HOST;                    // Set the SMTP server to send through
             		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
             		$mail->Username   = Config::SMTP_USER;                     // SMTP username
             		$mail->Password   = Config::SMTP_PASSWORD;                               // SMTP password
             		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
             		$mail->Port       = Config::SMTP_PORT;                                    // TCP port to connect to 

             		 $mail->isHTML(true);

             		 $mail->Charset = 'UTF-8';

             		 $mail->setFrom('oladelesamuel48@gmail.com', 'sammywebtech'); 

             		 $mail->addAddress($email); // Add a recipient and must a registered email

             		 $mail->Subject= 'Reset link';

             		 $mail->Body = '<p>Please click to reset your password <a href="http://localhost/myecom1/reset.php?email='.$email.' & token='.$token.'">http://localhost/myecom1/reset.php?email='.$email.' & token='.$token.'</a> </p>';

             		 if($mail->send()){

             		    $emailSent = true;
             		    // set_message("Your Link has been sent!");
             		 }
             		 else{

             		 	  echo "Your Link was not sent";
             		 }  


             }
             
          }
            
      }

      else{

      	  header("Location:index.php");
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
							<?php

							   if(isset($emailSent)){

							     echo "<h2 style='color:#333; font-weight: bold;'>Please Check Your Email</h2>"; 
							   }
							   else{

                                  ?>

                                    <div class="section-title">
                                    	<h3 class="title">Forgot Password ?</h3>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                    	<input class="input" type="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : $_COOKIE['email'] = '' ?>" name="email" placeholder="Email">

                                    	
                                    </div>


                                    
                                    
                                    <div class="form-group">
                                    	<button type="submit" name="forgot" class="btn btn-success btn-sm">Reset Password</button>
                                    </div>


                                  <?php
							   }

							 ?>
							
							
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
   
	

  
