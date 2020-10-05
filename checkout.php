<?php include "resources/config.php" ?>
<?php include "addcart.php" ?> 
<?php top_cart() ?>

<?php include "resources/templates/front/header.php" ?>
	

<?php include "resources/templates/front/top_nav2.php" ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<?php breadcrumb() ?>
				<li class="active">Checkout</li>
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

				<?php 
				  
				   if(isset($_SESSION['user_id'])){

				       $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

				       $count = mysqli_num_rows($result);

				       if($count > 0){

				       	?>

                             


				       	<?php

				       }
				       
				   }

				   else{

				       	  ?>

                             <form id="checkout-form" class="clearfix">
                             	<div class="col-md-6 col-md-offset-3">
                             		<div class="billing-details">
                             			<p>Already a customer ? <a href="login.php">Login</a></p>
                             			<div class="section-title">
                             				<h3 class="title">Billing Details</h3>
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="text" name="first-name" placeholder="First Name">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="text" name="last-name" placeholder="Last Name">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="email" name="email" placeholder="Email">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="text" name="address" placeholder="Address">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="text" name="city" placeholder="City">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="text" name="country" placeholder="Country">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                             			</div>
                             			<div class="form-group">
                             				<input class="input" type="tel" name="tel" placeholder="Telephone">
                             			</div>
                             			<div class="form-group">
                             				<button class='primary-btn'>Register</button>
                             			</div>
                             		</div>
                             	</div>

                             	 

                             </form>

				       	  <?php
				       }

				 ?>
				

					<div class="col-md-6">
					

						
					</div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>

					<form action="pay.php"  method="post">		
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									
									<?php cart() ?>
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>ITEMS</th>
										<th colspan="2" class="sub-total"> <?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = '0' ?></th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPPING</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total"># <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = '0' ?></th>
									</tr>
								</tfoot>
							</table>

							<?php
							if(isset($_SESSION['user_id'])){

							    $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

							   while ($row = mysqli_fetch_assoc($result)) {
							   	
							   	   $email = $row['email'];
							   	   $firstname = $row['firstname'];
							   	   $lastname = $row['lastname'];
							   }
							   
							   $total = $_SESSION['item_total'];
							   $total = $total;
							   $quantity = $_SESSION['item_quantity'];
							   

                              }

							?>

							<input type="hidden" name="amount" value="<?php echo isset($total) ? $total : $total = '0' ?>">

							<input type="hidden" name="email" value="<?php echo isset($email) ? $email : $email = '' ?>">
							  
							<div class='pull-right'>
							     <?php


							       if(isset($_SESSION['user_id']) && $total == 0){

                                           ?><a href="products.php" class="btn btn-primary">BUY NOW</a><?php
									  }
 

                                   else if(isset($_SESSION['user_id'])){

							          $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");
	
									   $count = mysqli_num_rows($result);

									   if($count > 0 ){
                                          
                                           ?><input type="submit" class="btn btn-primary" name="pay"  value="BUY NOW" ><?php

                                          
									   }



									  }

									  
									  

									  else{

									  	 ?><a href="login.php" class="btn btn-primary">BUY NOW</a><?php
									  }
							   

                              

							      ?>
							   <!-- <button class='primary-btn'>Place Order</button> -->
							     
							</div>


						</form>
	
							
						</div>

					</div>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	 <?php include "resources/templates/front/footer.php" ?>
