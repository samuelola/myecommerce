<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>

<?php include "resources/templates/front/top_nav2.php" ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP; 

include "vendor/autoload.php";
include "Classes/Config.php";
 ?>
     
     <?php 

        $mail = new PHPMailer(true);


        if(isset($_POST['send'])){

          
           $name = escape_string($_POST['name']);
           $email = escape_string($_POST['email']);
           $subject_of_mail = escape_string($_POST['subject']);
           $body = escape_string($_POST['body']);
          
          $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
          // $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = Config::SMTP_HOST;                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = Config::SMTP_USER;                     // SMTP username
          $mail->Password   = Config::SMTP_PASSWORD;                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = Config::SMTP_PORT;                                    // TCP port to connect to 

           $mail->isHTML(true);

           $mail->Charset = 'UTF-8';

           $mail->setFrom($email, $name);

           $mail->addAddress('oladelesamuel48@gmail.com', 'samuel'); // Add a recipient and must a registered email

           $mail->Subject= $subject_of_mail;

           $mail->Body = '<p>'.$body.'
           </p>';

           if($mail->send()){

              // $emailSent = true;
              set_message("Message has been sent!");
           }
           else{

           	  echo "Your email was not sent";
           }  

             
        }



      ?>
	

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">

				<?php breadcrumb() ?>

				<li class="active">Contact</li>
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
				

				<!-- MAIN -->
				<div id="main" class="col-md-12">
					

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							

							<div class="clearfix visible-md visible-lg"></div>

							<!-- Product Single -->
							
							<!-- /Product Single -->

							<div class="clearfix visible-sm visible-xs"></div>

							

							
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
               							<h3 class="title">Send us your message</h3>
               						</div>
               						
               						
               						<div class="form-group">
               							<input class="input" type="text" name="name" placeholder="Enter Full Name">

               							<p class="text-danger"></p>
               						</div>


               						<div class="form-group">
               							<input class="input" type="text" name="email" value="" placeholder="Enter Email">

               							<p class="text-danger"></p>
               						</div>


               						<div class="form-group">
               							<input class="input" type="text" name="subject" value="" placeholder="Enter Message Title">

               							<p class="text-danger"></p>
               						</div>
               						

               						<div class="form-group">
               							<textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Enter Message" style="width: 556px; height: 113px;" spellcheck="false"></textarea>
               							<p class="text-danger"></p>
               						</div>
               						
               						
               						
               						<div class="form-group">
               							<button type="submit" name="send" class="btn btn-success btn-sm bo-rad-23 bg1 size2 m-text3">Send</button>

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

                             

							

							<div class="clearfix visible-sm visible-xs"></div>

							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
				<!-- 	<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div> -->
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	 <?php include "resources/templates/front/footer.php" ?>
