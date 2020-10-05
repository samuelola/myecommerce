
	<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form id="checkout-form" class="clearfix">
				

				<div class="col-md-8">
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
					   							     
					   							     
					   							</div>


					   						</form>

						
					</div>

				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- FOOTER -->
	

