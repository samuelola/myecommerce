<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>


<?php include "resources/templates/front/top_nav2.php" ?>



	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="#">Category</a></li>
				
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
				<!-- <?php getspecificProducts(); ?> -->


                <?php 

             	if(isset($_GET['id'])){


             	   	$result = myQuery("SELECT * FROM products  WHERE product_id = ".escape_string($_GET['id'])."");

             	   	while($row = mysqli_fetch_assoc($result)){


             	           $sql = myQuery("SELECT * FROM brands WHERE brand_id = ".$row['product_brand_id']."");

             	           $get_brand = mysqli_fetch_assoc($sql);

             	           $get_reviews = myQuery("SELECT * FROM reviews WHERE product_id = ".$_GET['id']."");
             	           
                            
             	           

             	           $count_specific_reviews = mysqli_num_rows($get_reviews);



             	           ?>
             	          
             	           <div class="product product-details clearfix">
             	           	<div class="col-md-6">
             	           		<div >
             	           			<div class="product-view">
             	           				<img src="images/<?php echo $row['product_image'] ?>" alt="">
             	           			</div>
             	           			
             	           		</div>
             	           		
             	           	</div>
             	           	<div class="col-md-6">
             	           		<div class="product-body">
             	           			<div class="product-label">
             	           				<span>New</span>
             	           				<span class="sale">-20%</span>
             	                            
             	           			</div>
             	           			<h2 class="product-name"><?php echo $row['product_title'] ?></h2>
             	           			<h3 class="product-price"># <?php echo $row['product_price'] ?> </h3>
             	                      
             	           			<div>

             	           				<div class="product-rating">
             	                               <a href="add_review.php?id=<?php echo $row['product_id']?>" style="margin-bottom: 9px !important"><?php echo  $count_specific_reviews?> Review(s) / Add Review</a>

             	           					<?php 


             	           					  while($review_row  = mysqli_fetch_assoc($get_reviews)){
             	           					       

             	           					      $cust_rating = $review_row['customer_rating'];

             	           					  
             	                                  
             	                                  if($cust_rating== 5){

             	                                     echo "
                                                              <br/>
             	                                              <i class='fa fa-star'></i>
             	                                              <i class='fa fa-star'></i>
             	                                              <i class='fa fa-star'></i>
             	                                              <i class='fa fa-star'></i>
             	                                              <i class='fa fa-star'></i>
             	                                              

             	                                          ";
             	                                  }
             	                                  elseif($cust_rating== 4){

             	                                      echo "
                                                               <br/>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star-o empty'></i>

             	                                           ";

             	                                  }

             	                                  elseif($cust_rating== 3){

             	                                      echo "
             	                                               <br/>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star-o empty'></i>
             	                                               <i class='fa fa-star-o empty'></i>

             	                                           ";

             	                                  }
             	                                  elseif($cust_rating== 2){

             	                                      echo "
                                                               <br/>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star-o empty'></i>
             	                                               <i class='fa fa-star-o empty'></i>
             	                                               <i class='fa fa-star-o empty'></i>

             	                                           ";

             	                                  }

             	                                  elseif($cust_rating== 1){

             	                                      echo "
             	                                               <br/>
             	                                               <i class='fa fa-star'></i>
             	                                               <i class='fa fa-star-o empty'></i>
             	                                               <i class='fa fa-star-o empty'></i>
             	                                               <i class='fa fa-star-o empty'></i>
             	                                               <i class='fa fa-star-o empty'></i>

             	                                           ";

             	                                  }
             	                                  else{

             	                                  	echo "

             	                                  	         <i class='fa fa-star-o empty'></i>
             	                                  	         <i class='fa fa-star-o empty'></i>
             	                                  	         <i class='fa fa-star-o empty'></i>
             	                                  	         <i class='fa fa-star-o empty'></i>
             	                                  	         <i class='fa fa-star-o empty'></i>

             	                                  	     ";

             	                                  }


             	                                  ?>


             	                                  <!--blah-->


             	                                  <?php


             	                                  } //end first loop
             	           					 ?>
             	           					
             	           				</div>
             	           				
             	           			</div>
             	           			<p><strong>Availability:</strong> In Stock</p>
             	           			<p><strong>Brand: </strong><?php echo $get_brand['brand_name'] ?></p>
             	           			<p><strong>Description: </strong><?php echo $row['short_desc'] ?></p>
             	           			<div class="product-options">
             	           				
             	           				
             	           			</div>

             	           			<div class="product-btns">
             	           				
             	           				<a href="cart.php?add=<?php echo $row['product_id'] ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
             	           				
             	           			</div>
             	           		</div>
             	           	</div>
             	           	

             	           </div>
             	           <div class="col-md-12">
             	               <div class="product-tab">
             	                   <ul class="tab-nav">
             	                       <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>

             	                       
             	                   </ul>
             	                   <div class="tab-content">
             	                       <div id="tab1" class="tab-pane fade in active">
             	                           <p><?php echo $row['product_description'] ?></p>
             	                       </div>

             	                   </div>
             	               </div>
             	           </div>
             	           
             	         <?php
             	   

             	   	} // end of second loop

                }


                 ?>


			</div>
			<!-- /row -->

		
		
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->




	<?php include "resources/templates/front/footer.php" ?>
