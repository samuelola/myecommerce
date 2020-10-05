<?php

  $results =  myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");
  
  while ($row = mysqli_fetch_assoc($results)) {
  	 $first = $row['firstname'];
  	 $last = $row['lastname'];
  	 $username = $row['username'];
  	 $email = $row['email'];
  	 $pass = $row['password'];
  	 $address = $row['address'];
  	 $city = $row['city'];
  	 $country = $row['country'];
  	 $tel = $row['tel'];
  	 $zipcode = $row['zipcode'];
  	 
  }


// now update the account
  if(isset($_POST['update_account'])){
  	 $first = $_POST['firstname'];
   	 $last = $_POST['lastname'];
   	 $username = $_POST['username'];
   	 $email = $_POST['email'];
   	 $pass = $_POST['password'];
   	 $the_pass = password_hash($pass, PASSWORD_BCRYPT, ['cost'=>12]);
   	 $address = $_POST['address'];
   	 $city = $_POST['city'];
   	 $country = $_POST['country'];
   	 $tel = $_POST['tel'];
   	 $zipcode = $_POST['zipcode'];


  	 $sql = myQuery("UPDATE users SET firstname ='$first', lastname = '$last' , email = '$email', password = '$the_pass' , address = '$address' , city = '$city' , country = '$country' , zipcode = '$zipcode' , tel = '$tel' WHERE user_id = ".$_SESSION['user_id']."");

  	 confirm($sql);

  	 set_message("Your details has been updated!");
  }
?>


<body>
	<!-- HEADER -->
	


	
       
	<!-- section -->
	<div class="section ">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				



				<form id="checkout-form"  class="clearfix" method="post" action="" enctype="multipart/form-data">

					<div class="col-md-6">
						<div class="billing-details">
							<?php display_message() ?>
							<div class="section-title">
								<h3 class="title">Edit Account</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="firstname" placeholder="First Name" value="<?php echo $first ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text"  value="<?php echo $last ?>" name="lastname" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="text"  value="<?php echo $username ?>" name="username" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" value="<?php echo $email ?>" name="email" placeholder="Email">
							</div>

							<div class="form-group">
								<input class="input" type="password" value="<?php echo $pass ?>" name="password" placeholder="password">
							</div>

							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" value="<?php echo $address ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" value="<?php echo $city ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country" value="<?php  echo $country ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zipcode" placeholder="ZIP Code" value="<?php  echo $zipcode ?>">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone" value="<?php  echo $tel ?>">
							</div>
							<div class="form-group">
								<button type="submit" name="update_account" class="btn btn-success btn-sm">Update Account</button>
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

	
</body>