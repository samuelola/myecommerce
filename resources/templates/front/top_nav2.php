	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				 <?php include "resources/templates/front/category_nav2.php" ?>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						
						<?php 
						  
						   if(isset($_SESSION['user_id'])){

						       $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

						       $count = mysqli_num_rows($result);

						       if($count > 0){

						       	 ?><li><a href="welcome.php">Home</a></li><?php

						       }
						       
						   }

						   else{

						   	  ?><li><a href="index.php">Home</a></li><?php
						   }

						 ?>
						
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Shop <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								
								<li><a href="products.php">Products</a></li>
								<!-- <li><a href="product-page.php">Product Details</a></li> -->
								<li><a href="cart.php">Cart</a></li>
								<li><a href="checkout.php">Checkout</a></li>
								
							</ul>
						</li>

						<li><a href="././admin/index.php">Admin</a></li>


						<?php 
						  
						   if(isset($_SESSION['user_id'])){

						       $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

						       $count = mysqli_num_rows($result);

						       if($count > 0){

						       	 ?><li><a href="account.php?customer_details">My Account</a></li><?php

						       }
						       
						   }

						   
						 ?>

						<li><a href="contact.php">Contact</a></li>

						       

					</ul>
				</div>
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->