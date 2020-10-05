<?php include "resources/config.php" ?>
<?php include "addcart.php" ?> 
<?php top_cart() ?>

<?php 
   
   if(isset($_SESSION['user_id'])){
      
       $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

       confirm($result);

       while ($row = mysqli_fetch_assoc($result)) {
           
           $username = $row['username'];
       }
   }
   else{

       header('Location:login.php');
   }

 ?>

<?php include "resources/templates/front/header.php" ?>
	

<?php include "resources/templates/front/top_nav2.php" ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<?php breadcrumb() ?>
				<li class="active">My account</li>
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
				 		<div class="panel panel-danger">
				 			<div class="panel-heading">
				 				<h4>My Account</h4>
				 			</div>
				 			<div class="panel-body">
				 				<ul>
				 					<li><a href="account.php?customer_details">My Account</a></li>
				 					<li><a href="account.php?my_orders">My Orders</a></li>
				 					<li><a href="account.php?edit_account">Edit Account</a></li>
				 					<li><a href="account.php?change_pass">Change Password</a></li>
				 					<li><a href="account.php?delete_account">Delete Account</a></li>
				 				</ul>	
				 			</div>
				 			
				 		</div>
				 	</div>
				 	<div class="col-md-9">
				 		
						<div class="panel panel-danger">
							<div class="panel-body">

								<?php

								    if(isset($_GET['customer_details'])){
                                       
                                       include 'customer_account/customer_details.php';
								    }

									if(isset($_GET['my_orders'])){
                                      
                                        include 'customer_account/my_orders.php';
									}
									if(isset($_GET['edit_account'])){
                                      
                                        include 'customer_account/edit_account.php';
									}

									if(isset($_GET['change_pass'])){
                                      
                                        include 'customer_account/change_pass.php';
									}

									if(isset($_GET['delete_account'])){
                                      
                                        include 'customer_account/delete_account.php';
									}
								?>
								
							</div>
						</div>




				    </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

 <!--footer-->
   <?php include "resources/templates/front/footer.php" ?>
 