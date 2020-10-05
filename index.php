<?php include "resources/config.php" ?>
<?php include "addcart.php" ?>
<?php include "resources/templates/front/header.php" ?>

<?php include "resources/templates/front/top_nav.php" ?>

<?php include "resources/templates/front/slider.php" ?>


	<!-- section -->
	
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
			      <?php 


                         
                      

                         $result = myQuery("SELECT * FROM products WHERE product_id = 1 ");

                         while($row = mysqli_fetch_assoc($result)){

                          $sql = myQuery("SELECT * FROM reviews WHERE product_id = 1");
                          
                          $for_exam = mysqli_fetch_assoc($sql);

                          $get_me = $for_exam['customer_rating'];   

                    
                      ?>
                     <div class="col-md-3 col-sm-6 col-xs-6">
                         <div class="product product-single product-hot">
                             <div class="product-thumb">
                                 <div class="product-label">
                                     <span class="sale">-20%</span>
                                      <h3 id="offer">Special Offer</h3>
                                 </div>
                           

                                <a href="product-page?id=<?php echo $row['product_id'] ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>

                                 <img src="images/<?php echo $row['product_image'] ?>" alt="" style= 'height:350px'>
                                 
                               
                                 <ul class="product-countdown">

                                 	 <div id="clockdiv"></div>
                                    
                                  <!--   <li><span id="days"></span></li> -->
									<li><span id="hours"></span></li>
									<li><span id="minutes"></span></li>
									<li><span id="seconds"></span></li>

									<li id="msg"></li>
								</ul>
                             </div>
                             <div class="product-body">
                                 <h3 class="product-price">#1000 <del class="product-old-price">#2000</del></h3>
                                 <div class="product-rating">
                                      <?php 
                                        
                                        if( $get_me == 5){
                                            
                                            echo "

                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>

                                                 ";
                                        }

                                       ?>
                                 	 
                                     
                                 </div>
                                 <h2 class="product-name"><a href="#"> <?php echo $row['product_title']?></a></h2>
                                 <div class="product-btns">
                                     <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                     <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <a href="addcart.php?add=<?php echo $row['product_id']  ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <?php

                         
                     }


			       ?>
			      
				<!-- /Product Single -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">

							<!-- Product Single -->
							
                          
							    <?php getAllProducts(); ?>
							<!-- /Product Single -->

							

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12" >
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

			
				<!-- Product Single -->
				
					<?php getLatestProducts() ?>
				
				<!-- /Product Single -->

				<!-- Product Single -->
				<!-- <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/product03.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Product Single -->

				<!-- Product Single -->
				<!-- <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/product04.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Product Single -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- banner -->
				<!-- <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="./img/banner15.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div> -->
				<!-- /banner -->

				
				
				
				
			</div>
			<!-- /row -->

			
			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<?php include "resources/templates/front/footer.php" ?>