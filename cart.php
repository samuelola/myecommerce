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
				<li class="active">Cart</li>
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
				
                    <?php head_cart()?>
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<div id="cart_msg">
									<?php 
                                     
                                     if(isset($_SESSION['item_quantity'])){
                                        
                                        
                                     }
                                     else{

                                     	set_message("No products in cart!");
                                     }

									 ?>
								</div>
								<?php display_message(); ?>
								<h3 class="title">Shopping  Cart</h3>
							</div>

					 		
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th>Product Name</th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity <br>
											

										</th>
										<th class="text-center">Total</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									
                                       <?php cart(); ?>
									
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

							

							<!-- <input type="image" name="upload"
							src="paypal-button.png" width="150" height="50"
							alt="PayPal - The safer, easier way to pay online">
 -->
							<div class="pull-left">
								<a href="index.php" class="primary-btn">Continue Shopping</a>&nbsp;&nbsp;&nbsp;&nbsp;
								
							</div>


							<div class="pull-right">
								
								<a href="checkout.php" class="primary-btn">Checkout</a>
							</div>
						</div>

					</div>


					
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	
      <?php include "resources/templates/front/footer.php" ?>
        
 
	<!-- /FOOTER -->



</body>

</html>
