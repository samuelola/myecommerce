<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>


<?php include "resources/templates/front/top_nav2.php" ?>



	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Product Review</a></li>
				
				
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<!-- <div class="row">
				<?php getspecificProducts(); ?>
			</div> -->
			<!-- /row -->

			<?php 

                 if(isset($_GET['id'])){
                     
                     $product_id = $_GET['id'];

                     ?>
                       

               			<div class="col-md-12">
               				<div class="product-tab">
               					<ul class="tab-nav">
               						<?php 
                                         
                                          $result4 = myQuery("SELECT * FROM reviews WHERE product_id = '$product_id'");
                                          $count_review = mysqli_num_rows($result4);



               						 ?>
               						<li><a href="product-page.php?id=<?php echo $product_id  ?>">Reviews (<?php echo $count_review ?>)</a></li>
               					</ul>
               					<div class="tab-content">
               						
               						<div id="tab2" >

         							<div class="row">
         								<div class="col-md-6">
         									 <div class="product-reviews">
         									    <?php

                                              $sql = myQuery("SELECT * FROM reviews WHERE product_id = '$product_id'");
                                              confirm($sql);

                                              while($row = mysqli_fetch_assoc($sql)){

                                                  $date = $row['created_at'];
                                                  date_default_timezone_set("Africa/Lagos");
                                                  $mydate = date("j M Y / g:i A");
                                                   
                                                  $custom_re = $row['customer_rating'];
                                       
                                                 ?>

                                                 <div class="single-review">
                                                      <div class="review-heading">
                                                          <div><a href="#"><i class="fa fa-user-o"></i> <?php echo $row['customer_name'] ?></a></div>
                                                          <div><a href="#"><i class="fa fa-clock-o"></i> 
                                                         

                                                           <?php echo $mydate ?>
                                                          </a>
                                                          </div>
                                                          <div class="review-rating pull-right">
                                                              <?php 
                                                               
                                                               if($custom_re == 5){

                                                                  echo"
                                                                    <br/>
                                                                    <i class='fa fa-star'></i>
                                                                    <i class='fa fa-star'></i>
                                                                    <i class='fa fa-star'></i>
                                                                    <i class='fa fa-star'></i>
                                                                    <i class='fa fa-star'></i>


                                                                  ";
                                                               }
                                                               elseif($custom_re == 4){


                                                                 echo"
                                                                   <br/>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star-o empty'></i>


                                                                 ";  
                                                               }
                                                               elseif($custom_re == 3){


                                                                 echo"
                                                                   <br/>
                                                                   
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star-o empty'></i>


                                                                 ";  
                                                               }

                                                               elseif($custom_re == 2){


                                                                 echo"
                                                                   <br/>
                                                                   
                                                                  
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star-o empty'></i>


                                                                 ";  
                                                               }

                                                               elseif($custom_re == 1){


                                                                 echo"
                                                                   <br/>
                                                                   
                                                                   <i class='fa fa-star'></i>
                                                                   <i class='fa fa-star-o empty'></i>


                                                                 ";  
                                                               }
                                                               else{

                                                                  echo"
                                                                    
                                                                    
                                                                      <i class='fa fa-star-o empty'></i>
                                                                    <i class='fa fa-star-o empty'></i>
                                                                      <i class='fa fa-star-o empty'></i>
                                                                        <i class='fa fa-star-o empty'></i>


                                                                  ";  
                                                               }






                                                               ?>
                                                             
                                                          </div>
                                                      </div>
                                                      <div class="review-body">
                                                          <p><?php echo $row['customer_review'] ?></p>
                                                      </div>
                                                  </div>

                                                  
                                               <?php

                                             
                                              }



                                        ?>
         									
         									 </div>
         								</div>
         								<div class="col-md-6">
         									<h4 class="text-uppercase">Write Your Review</h4>
         									<p><strong>Note:</strong>Your email address will not be published.</p>
                                           
         									<?php insert_review_form($product_id) ?>
         									 
         									

         									<form class="review-form" method="post" action="">
         										 <?php display_message() ?>
         										<div class="form-group">
         											<input class="input" type="text" name="cust_name" placeholder="Your Name" />
         										</div>
         										<div class="form-group">
         											<input class="input" type="email" name="cust_email" placeholder="Email Address" />
         										</div>
         										<div class="form-group">
         											<textarea class="input" name="cust_review" placeholder="Your review"></textarea>
         										</div>
         										<div class="form-group">
         											<div class="input-rating">
         												<strong class="text-uppercase">Your Rating: </strong>
         												<div class="stars">
         													
         											     <input type="radio" id="star5" name="ratings[]" value="5" /><label for="star5"></label>
         											     <input type="radio" id="star4" name="ratings[]" value="4" /><label for="star4"></label>
         											     <input type="radio" id="star3" name="ratings[]" value="3" /><label for="star3"></label>
         											     <input type="radio" id="star2" name="ratings[]" value="2" /><label for="star2"></label>
         											     <input type="radio" id="star1" name="ratings[]" value="1" /><label for="star1"></label>
         													
         												</div>
         											</div>
         										</div>
         										<button type="submit"  name="submit" class="primary-btn">Submit</button>
         									</form>
         								</div>
         							</div>



               						</div>
               					</div>
               				</div>
               			</div>

                     <?php
                         
                 }

                 else{

                 	 header('Location:index.php');
                 }
			 ?>

			


		</div>
		<!-- /container -->
	</div>
	<!-- /section -->




	<?php include "resources/templates/front/footer.php" ?>
