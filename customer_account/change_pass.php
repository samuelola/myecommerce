<?php
  
  if(isset($_POST['change_pass'])){

  	$currentpass = $_POST['current_pass'];
  	$newpass = $_POST['new_pass'];
  	$newpass_hash = password_hash($newpass, PASSWORD_BCRYPT , ['cost'=>12]);
  	$newpassagain = $_POST['new_pass_again'];

  	$sql = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']." AND password = '$currentpass'");

  	confirm($sql);

    $check = mysqli_num_rows($sql);

    if($check == 0){
       
        set_message("Sorry Your password is incorrect, Try again");
    }

    if($newpass != $newpassagain ){
      
        set_message("Your  passwords does not match  , try again!");
    }

    else{
       
    	$sql =  myQuery("UPDATE users SET password = '$newpass_hash' WHERE user_id = ".$_SESSION['user_id']."");

    	confirm($sql);


    	 set_message("Your current password is updated");

    }


  }
?>

<body>
	
	

	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				


				<form id="checkout-form"  class="clearfix" method="post" action="" enctype="multipart/form-data">

					<div class="col-md-6">
						<div class="billing-details">
							<?php display_message() ?>
							<div class="section-title">
								<h3 class="title">Change Password</h3>
							</div>
							
							
							

							<div class="form-group">
								<input class="input" type="password" name="current_pass" value="" placeholder="Enter Current password" >
							</div>

							<div class="form-group">
								<input class="input" type="password" name="new_pass" value="" placeholder="Enter New password" >
							</div>

							<div class="form-group">
								<input class="input" type="password" name="new_pass_again" value="" placeholder="Enter New password Again" >
							</div>
							
							
							
							
							<div class="form-group">
								<button type="submit" name="change_pass" class="btn btn-success btn-sm">Change Password</button>
							</div>

							
						</div>
					</div>

					
					
				</form>

				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

 
