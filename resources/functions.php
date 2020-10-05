<?php 


function set_message($msg){

    if(!empty($msg)){

        $_SESSION['msg'] = $msg;
    }
    else{

    	$msg = "";
    }
}

function display_message(){
   
  if(isset($_SESSION['msg'])){
    
      echo "<h4 class='text-danger text-center'>".$_SESSION['msg']."</h4>";

      unset($_SESSION['msg']);
  }
}


function confirm($the_result){

   global $conn;

      if(!$the_result){

        die("Error".mysqli_error($conn));
      }
}


function escape_string($string){

	global $conn;

	return mysqli_real_escape_string($conn,$string);
}


function myQuery($query){

  global $conn;

  return  mysqli_query($conn,$query);
}

function getAllCategories(){

	global $conn;

	$result = myQuery("SELECT * FROM categories");

	while($row = mysqli_fetch_assoc($result)){
      
$categories = <<< DELIMETER
  
  <li><a href="categories.php?cat_id={$row['cat_id']}">{$row['cat_title']}</a></li>

DELIMETER;

echo $categories;

	}

}


function getAllProducts(){

    $sql = myQuery("SELECT * FROM products");

    $rowme = mysqli_fetch_assoc($sql);

    $featured = $rowme['featured'];



    if($featured = 'featured'){
         
            $result = myQuery("SELECT * FROM products WHERE featured = '$featured'");

         $count_featured = mysqli_num_rows($result);   

            while($row = mysqli_fetch_assoc($result)){

$products = <<<DELIMETER

 <div class="product product-single">
    <div class="product-thumb">
        <a href="product-page.php?id={$row['product_id']}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
        <img src="images/{$row['product_image']}" alt="" style= 'height:350px'>
    </div>
    <div class="product-body">
        <h3 class="product-price">#{$row['product_price']}</h3>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
        </div>
        <h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
        <div class="product-btns">
            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
            <a href="addcart.php?add={$row['product_id']}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
        </div>
    </div>
 </div>

DELIMETER;

echo $products;

}
          
          if($count_featured < 1){

             echo "<h3>No products Available</h3>";
          }

          
    }


    else{

       
    }

	
}


function getSpecialProducts(){

    $result = myQuery("SELECT * FROM products WHERE product_id = 1");

    while($row = mysqli_fetch_assoc($result)){

     $sql = myQuery("SELECT * FROM reviews WHERE product_id = 1");
     
     $for_exam = mysqli_fetch_assoc($sql);

     $   

$products = <<<DELIMETER

<div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single product-hot">
        <div class="product-thumb">
            <div class="product-label">
                <span class="sale">-20%</span>
            </div>
      

           <a href="product-page?id={$row['product_id']}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
            <img src="images/{$row['product_image']}" alt="" style= 'height:350px'>

            <div class="wrapper" id=clock-wrapper>
              <ul class="flip-clock-container flip-2">
                <li class="flip-item-seconds">23</li>
                <li class="flip-item-minutes">50</li>
                <li class="flip-item-hours">12</li>
                <!-- <li class="flip-item-days">01</li> -->
              </ul>
            </div>
        </div>
        <div class="product-body">
            <h3 class="product-price">#1000 <del class="product-old-price">#2000</del></h3>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
            <div class="product-btns">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
               <a href="addcart.php?add={$row['product_id']}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</div>

DELIMETER;

echo $products;

    }
}



function getLatestProducts(){

    $result = myQuery("SELECT * FROM products");

    while($row = mysqli_fetch_assoc($result)){

$products = <<<DELIMETER
<div class="col-md-3 col-sm-6 col-xs-6">
<div class="product product-single">
    <div class="product-thumb">
        <div class="product-label">
            <span>New</span>
        </div>
        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
        <img src="images/{$row['product_image']}" alt="" style="height: 350px;">
    </div>
    <div class="product-body">
        <h3 class="product-price">#{$row['product_price']}</h3>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
        </div>
        <h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
        <div class="product-btns">
            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
        </div>
    </div>
</div>
</div>
DELIMETER;

echo $products;

    }
}


function getProductsForShop(){

      

		$result = myQuery("SELECT * FROM products ");

		while($row = mysqli_fetch_assoc($result)){

	$products = <<<DELIMETER

	<div class="col-md-3 col-sm-6 col-xs-6">
		<div class="product product-single">
			<div class="product-thumb">
				<div class="product-label">
					<span>New</span>
					<span class="sale">-20%</span>
				</div>
				<a href="product-page.php?id={$row['product_id']}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
				<img src="images/{$row['product_image']}" alt="" style="height: 350px;">
			</div>
			<div class="product-body">
				<h3 class="product-price">#{$row['product_price']} <del class="product-old-price">$45.00</del></h3>
				<div class="product-rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o empty"></i>
				</div>
				<h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
				<div class="product-btns">
					<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
					<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
					<a href="cart.php?add={$row['product_id']}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
		</div>
	</div>

DELIMETER;

	echo $products;

		}

 


}






function getProCategory(){

      if(isset($_GET['cat_id'])){

        $result = myQuery("SELECT * FROM products WHERE product_category_id = ".$_GET['cat_id']."");

        while($row = mysqli_fetch_assoc($result)){

            $get_cat_name = myQuery("SELECT * FROM categories WHERE cat_id = ".$_GET['cat_id']."");

            $row1 = mysqli_fetch_assoc($get_cat_name);

            echo "<h3 class='text-center'>$row1[cat_title]</h3>";

    $products = <<<DELIMETER

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                    <span class="sale">-20%</span>
                    
                </div>
                
                <a href="product-page?id={$row['product_id']}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                <img src="images/{$row['product_image']}" alt="" style="height: 350px;">
            </div>
            <div class="product-body">
                <h3 class="product-price">#{$row['product_price']} <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <a href="cart.php?add={$row['product_id']}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </div>

DELIMETER;

    echo $products;

        }

 }


}





function getspecificProducts(){


	if(isset($_GET['id'])){


	$result = myQuery("SELECT * FROM products  WHERE product_id = ".escape_string($_GET['id'])."");

	while($row = mysqli_fetch_assoc($result)){


        $sql = myQuery("SELECT * FROM brands WHERE brand_id = ".$row['product_brand_id']."");

        $get_brand = mysqli_fetch_assoc($sql);

        $get_reviews = myQuery("SELECT * FROM reviews WHERE product_id = ".$_GET['id']."");

        $review_row  = mysqli_fetch_assoc($get_reviews);

        $count_specific_reviews = mysqli_num_rows($get_reviews);

    

       $specificProduct = <<<DELIMETER

       
        <div class="product product-details clearfix">
        	<div class="col-md-6">
        		<div >
        			<div class="product-view">
        				<img src="images/{$row['product_image']}" alt="">
        			</div>
        			
        		</div>
        		
        	</div>
        	<div class="col-md-6">
        		<div class="product-body">
        			<div class="product-label">
        				<span>New</span>
        				<span class="sale">-20%</span>
                         
        			</div>
        			<h2 class="product-name">{$row['product_title']}</h2>
        			<h3 class="product-price">#{$row['product_price']}</h3>
                    
        			<div>

        				<div class="product-rating">
        					<i class="fa fa-star"></i>
        					<i class="fa fa-star"></i>
        					<i class="fa fa-star"></i>
        					<i class="fa fa-star"></i>
        					<i class="fa fa-star-o empty"></i>
        				</div>
        				<a href="add_review.php?id={$_GET['id']}">{$count_specific_reviews} Review(s) / Add Review</a>
        			</div>
        			<p><strong>Availability:</strong> In Stock</p>
        			<p><strong>Brand: </strong>{$get_brand['brand_name']}</p>
        			<p><strong>Description: </strong>{$row['short_desc']}</p>
        			<div class="product-options">
        				
        				
        			</div>

        			<div class="product-btns">
        				
        				<a href="cart.php?add={$row['product_id']}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
        				
        			</div>
        		</div>
        	</div>
        	

        </div>
        <div class="col-md-12">
            <div class="product-tab">
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>

                    <li ><a data-toggle="tab" href="#tab2">Review</a></li>
                    
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active">
                        <p>{$row['product_description']}</p>
                    </div>

                    <div id="tab2" class="tab-pane fade in active">
                        <p>{$review_row['customer_review']}</p>
                    </div>
                    
                </div>
            </div>
        </div>
        

DELIMETER;

echo $specificProduct;

	}

   }
}



function insert_review_form($product_id){
  
   if(isset($_POST['submit'])){
     
      if (isset($_POST['ratings'])) {

          foreach ($_POST['ratings'] as $value) {
            
          $cust_name = $_POST['cust_name'];
          $cust_email = $_POST['cust_email'];
          $cust_review = $_POST['cust_review'];
          $cust_rating = $value;

        $sql = myQuery("INSERT INTO reviews (product_id,customer_name,customer_email,customer_review,customer_rating,created_at) VALUES ('$product_id' ,'$cust_name','$cust_email','$cust_review',$cust_rating,NOW())");

         confirm($sql);

         // echo "<script>alert('Your review has been created successfull!')</script>";
         // echo "<script>window.open('add_review.php','_self')</script>";

           header("Location:add_review.php?id=$product_id");

          }
        
      }

       
   }

 

}


function get_review($product_id){

    $sql = myQuery("SELECT * FROM reviews WHERE product_id = '$product_id'");
    confirm($sql);

    while($row = mysqli_fetch_assoc($sql)){

        $date = $row['created_at'];
        date_default_timezone_set("Africa/Lagos");
        $mydate = date("j M Y / g:i A");
         

$get_review = <<< DELIMETER


       <div class="single-review">
            <div class="review-heading">
                <div><a href="#"><i class="fa fa-user-o"></i> {$row['customer_name']}</a></div>
                <div><a href="#"><i class="fa fa-clock-o"></i> 
               

                 {$mydate}
                </a>
                </div>
                <div class="review-rating pull-right">
                    
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
            </div>
            <div class="review-body">
                <p>{$row['customer_review']}</p>
            </div>
        </div>

        
  

DELIMETER;
     
echo $get_review;      
    }



}



// if(isset($_POST['getReview'])){

//     $sql = myQuery("SELECT * FROM reviews");
//     confirm($sql);

//     while($row = mysqli_fetch_assoc($sql)){

//         $date = $row['created_at'];
//         date_default_timezone_set("Africa/Lagos");
//         $mydate = date("j M Y / g:i A");


//        echo " <div class='single-review'>
//              <div class='review-heading'>
//                  <div><a href='#'><i class='fa fa-user-o'></i> ".$row['customer_name']."</a></div>
//                  <div><a href='#'><i class='fa fa-clock-o'></i> 
                

//                   $mydate
//                  </a>
//                  </div>
//                  <div class='review-rating pull-right'>

//                      <i class='fa fa-star'></i>
//                      <i class='fa fa-star'></i>
//                      <i class='fa fa-star'></i>
//                      <i class='fa fa-star'></i>
//                      <i class='fa fa-star-o empty'></i>
//                  </div>
//              </div>
//              <div class='review-body'>
//                  <p>".$row['customer_review']."</p>
//              </div>
//          </div>

//          ";
//      }   


// }





// function ratings(){

//    $sql = myQuery("SELECT * FROM rating");

//    while($row = mysqli_fetch_assoc($sql)){


// $rating = <<< DELIMETER

// <input type="radio" id="star5" name="rating[]" value="{$row['rating_value']}" /><label for="star5"></label>

// DELIMETER;

// echo $rating;

//             }





//  }

   
   





function searchAllProdducts(){

    if(isset($_POST['submit'])){

        $search = $_POST['search'];

        $result = myQuery("SELECT * FROM categories WHERE cat_title LIKE '%$search%'");

        $cat_select = mysqli_fetch_assoc($result);

        $cat_id = $cat_select['cat_id'];

        $cat_title = $cat_select['cat_title'];

        $result2 = myQuery("SELECT * FROM products WHERE product_category_id = '$cat_id'");

        $count = mysqli_num_rows($result2);

        if($count == 0 ){

            echo "<h2 class='text-center text-danger'>No search results!</h2>";

        }
        else{
            
            while($row = mysqli_fetch_assoc($result2)){


$search_me = <<< DELIMETER


 <div class="product product-single">
    <div class="product-thumb">
        <a href="product-page?id={$row['product_id']}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
        <img src="images/{$row['product_image']}" alt="">
    </div>
    <div class="product-body">
        <h3 class="product-price">#{$row['product_price']}</h3>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
        </div>
        <h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
        <div class="product-btns">
            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
            <a href="addcart.php?add={$row['product_id']}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
        </div>
    </div>
 </div>      


DELIMETER;

            }

echo $search_me;



        }


    }
}


function username_exist($username){

    $result_query = myQuery("SELECT username FROM users WHERE username = '$username'");

    confirm($result_query);

    $countt = mysqli_num_rows($result_query);

    if($countt > 0){
       
       return true;
    }

    else{

        return false;
    }
}

function firstname_exist($firstname){

    $result_query = myQuery("SELECT firstname FROM users WHERE firstname = '$firstname'");

    confirm($result_query);

    $countt = mysqli_num_rows($result_query);

    if($countt > 0){
       
       return true;
    }

    else{

        return false;
    }
}


function lastname_exist($lastname){

    $result_query = myQuery("SELECT lastname FROM users WHERE lastname = '$lastname'");

    confirm($result_query);

    $countt = mysqli_num_rows($result_query);

    if($countt > 0){
       
       return true;
    }

    else{

        return false;
    }
}


function email_exist($email){

    $result_query = myQuery("SELECT email FROM users WHERE email = '$email'");

    confirm($result_query);

    $countt = mysqli_num_rows($result_query);

    if($countt > 0){
       
       return true;
    }

    else{

        return false;
    }
}

/* Register  new user function here*/
function register_user($username,$firstname,$lastname,$email,$password,$address,$city,$country,$zipcode,$tel){

    $username = escape_string($username);
    $firstname = escape_string($firstname);
    $lastname = escape_string($lastname);
    $address = escape_string($address);
    $city = escape_string($city);
    $email = escape_string($email);
    $password = escape_string($password);
    $hash_password = password_hash($password, PASSWORD_BCRYPT,['cost'=>12]);
    $country = escape_string($country);
    $zipcode = escape_string($zipcode);
    $tel = escape_string($tel);
    $length = 50;

    $token = bin2hex(openssl_random_pseudo_bytes($length));

    $result = myQuery("INSERT INTO users (username,email,password,token,firstname,lastname,images,address,city,country,zipcode,tel) VALUES ('$username','$email','$hash_password','$token','$firstname','$lastname','images','$address','$city','$country','$zipcode','$tel') ");

   confirm($result);

   


}


 // $result = myQuery("SELECT * FROM users INNER JOIN roles ON users.user_id = roles.role_id WHERE email = '$email'");

/* Login in user function here*/

function login_user($email,$password){

       $result = myQuery("SELECT * FROM users WHERE email = '$email'");   

       $row = mysqli_fetch_assoc($result);
            
             $pass = $row['password'];
        

        if(password_verify($password, $pass)){
            
             $result2 = myQuery("SELECT * FROM users  WHERE password = '$pass'");

             while ($row = mysqli_fetch_assoc($result2)) {
                  
                  $_SESSION['user_id'] = $row['user_id'];
                  
             }

             $result = myQuery("SELECT * FROM users INNER JOIN roles ON users.user_id = roles.role_id WHERE password = '$pass'");

             $roles = mysqli_fetch_assoc($result);

             $_SESSION['user_roles'] = $roles['user_roles'];

             header("Location:./welcome.php");
        }
        else{

              return false;
        }
        

}



//////////////////////This is for admin code /////////////////////////////////

function add_admin_product(){

    if(isset($_POST['publish'])){

        $product_title = escape_string($_POST['product_title']);
        $product_description = escape_string($_POST['product_description']);
        $product_price = escape_string($_POST['product_price']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_brand_id = escape_string($_POST['product_brand_id']);
        
        
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);

        $image = $_FILES['image']['name'];

        $image_tmp = $_FILES['image']['tmp_name'];

        $target_dir = "../images/";

        $target_file = $target_dir . basename($image);

        move_uploaded_file($image_tmp, $target_file);

        $result = myQuery("INSERT INTO products (product_title,product_category_id,product_brand_id,product_price,product_quantity,product_description,short_desc,product_image) VALUES ('$product_title','$product_category_id',' $product_brand_id','$product_price','$product_quantity','$product_description','$short_desc','$image')");


        confirm($result);

        set_message("Product has been added");

    }
}


function products_in_admin(){

  $sn = 1;
 $result = myQuery("SELECT * FROM products ");

 while ($row = mysqli_fetch_assoc($result)) {

    $product_category_idd = $row['product_category_id'];

    $result2 = myQuery("SELECT * FROM categories WHERE cat_id = ".$product_category_idd."");

    $go = mysqli_fetch_assoc($result2);
   
  $products_in_admin = <<<DELIMETER
  
  <tr>
   
       <td>{$sn}</td>
       <td>{$row['product_title']} <br>
         <a href="../admin/index.php?edit_product&id={$row['product_id']}"><img src="../images/{$row['product_image']}" alt="" width="100" height="70"></a>
       </td>
       <td>{$go['cat_title']}</td>
       <td>{$row['featured']}</td>
       <td><a href="../admin/index.php?update_featured={$row['product_id']}" >Featured</a></td>
       <td><a href="../admin/index.php?update_notfeatured={$row['product_id']}" >NotFeatured</a></td>
       <td>{$row['product_price']}</td>
       <td>{$row['product_quantity']}</td>
    
   
    <td><a class="btn btn-success" href="../admin/index.php?id_edit_products={$row['product_id']}"><span class="glyphicon glyphicon-edit"></span></a></td>
    <td><a class="btn btn-danger" href="../admin/backend/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
  
  </tr>
DELIMETER;
     $sn +=1;

    echo  $products_in_admin;

       }

    }



    function orders_in_admin(){

      $sn = 1;
     $result = myQuery("SELECT order_id,order_amount,order_transaction,order_status,order_currency,date_format(order_date, '%b %e %Y at %r') as fmt_create_time FROM orders ORDER BY order_id DESC ");

     while ($row = mysqli_fetch_assoc($result)) {

       
       
      $orders_in_admin = <<<DELIMETER
      
      <tr>
       
           <td>{$sn}</td>
           
           <td>#{$row['order_amount']}</td>
           <td>{$row['order_transaction']}</td>
           <td>{$row['order_status']}</td>
           <td>{$row['order_currency']}</td>
           <td>{$row['fmt_create_time']}</td>
           <td>{$row['fmt_create_time']}</td>
           
       
        <td><a class="btn btn-danger" href="../admin/backend/delete_order.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
      
      </tr>
DELIMETER;
         $sn +=1;

        echo  $orders_in_admin;

           }

        } 



//////////////////////////////////////////////////////////////////        



    function dashboard_orders_in_admin(){

      $sn = 1;
     $result = myQuery("SELECT order_amount,order_transaction,order_status,order_currency,date_format(order_date, '%b %e %Y at %r') as fmt_create_time FROM orders ORDER BY order_id DESC ");

     while ($row = mysqli_fetch_assoc($result)) {

       
       
      $orders_in_admin = <<<DELIMETER
      
      <tr>
       
           <td>{$row['order_transaction']}</td>
           
           <td>{$row['fmt_create_time']}</td>
           <td>{$row['fmt_create_time']}</td>
           <td>#{$row['order_amount']}</td>
        
   
      
      </tr>
DELIMETER;
         $sn +=1;

        echo  $orders_in_admin;

           }

        }


///////////////////////////////////////////////////////////

     function create_the_category_admin(){
         
          global $conn;

        $sn = 1;
        $query = myQuery("SELECT * FROM categories");


    while($row = mysqli_fetch_assoc($query)){

        $cat_in_admin = <<< DELIMETER
        
        <tr>
         
             <td>{$sn}</td>
           
             <td>{$row['cat_title']}</td>
          
             <td><a class="btn btn-danger" href="../admin/backend/delete_cat.php?id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
         
        
        </tr>
DELIMETER;

    $sn+=1;

    echo  $cat_in_admin;         
       
        }
        
        
       

     }

       function show_the_users_admin(){
           
            global $conn;

          $sn = 1;
          $query = myQuery("SELECT * FROM users");


      while($row = mysqli_fetch_assoc($query)){

          $users_in_admin = <<< DELIMETER
          
          <tr>

              <td>{$sn}</td>
              
              
              <td>{$row['username']}
                   
              </td>

              <td>{$row['email']}</td>
      
              <td>{$row['firstname']}</td>
             <td>{$row['lastname']}</td>
             <td><a class="btn btn-info" href="../admin/index.php?id_edit_user={$row['user_id']}"><span class="glyphicon glyphicon-edit"></span></a> <a class="btn btn-danger" href="../admin/backend/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
             <td><a class="btn btn-info" href="../admin/index.php?add_user_roles={$row['user_id']}"><span class="glyphicon glyphicon-plus"></span></a></td>

          </tr>
DELIMETER;

      $sn+=1;

      echo  $users_in_admin;         
         
          }
          
          
         

       }



      function create_the_users_roles(){
          
           global $conn;
         $sn = 1;
         $query = myQuery("SELECT * FROM roles INNER JOIN users ON roles.role_id = users.user_id ");


     while($row = mysqli_fetch_assoc($query)){

         $users_in_admin = <<< DELIMETER
         
         <tr>

             <td>{$sn}</td>
             
             
             <td>{$row['email']}
                  
             </td>

             <td>{$row['user_roles']}</td>
     
             
            <td><a class="btn btn-info" href="../admin/index.php?id_edit_role={$row['user_id']}"><span class="glyphicon glyphicon-edit"></span></a> <a class="btn btn-danger" href="../admin/backend/delete_user_role.php?id={$row['role_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
           

         </tr>
DELIMETER;

 $sn+=1;

 echo  $users_in_admin;         
    
     }
     
     
    

  }


        function view_the_reviews(){
            
             global $conn;
           $sn = 1;
           $query = myQuery("SELECT * FROM reviews");


       while($row = mysqli_fetch_assoc($query)){

           $users_in_admin = <<< DELIMETER
           
           <tr>

               <td>{$sn}</td>
               
               
               <td>{$row['customer_name']}</td>

               <td>{$row['customer_email']}</td>
       
               <td>{$row['customer_review']}</td>
              <td> <a class="btn btn-danger" href="../admin/backend/delete_review.php?id={$row['id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
             

           </tr>
DELIMETER;

   $sn+=1;

   echo  $users_in_admin;         
      
       }
       
       
      

    }






       /////////////////////////////////Get Slides function//////////////////////////////////////////

       function add_slides(){

          if(isset($_POST['add_slide'])){
              
              $slide_title = escape_string($_POST['slide_title']);
              $slide_img = $_FILES['file']['name'];
              $slide_tmp_location = $_FILES['file']['tmp_name'];
              
              $target_folder = "../images/";

              $target_dir = $target_folder .basename($slide_img);

              if(empty($slide_title) || empty($slide_img)){

                   set_message( "<h4 class='text-center text-danger'>The fields cannot be empty!</h4>");
              }
              else{

                  move_uploaded_file($slide_tmp_location,$target_dir);

                  $sql = myQuery("INSERT INTO slides (slide_title,slide_image) VALUES ('$slide_title','$slide_img')");

                  confirm($sql);

                   set_message("<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Slide added successfully!</strong></div>");
              }
          }
       }


       function get_current_slides_in_admin(){

           $result = myQuery("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
             confirm($result);

             while ($row = mysqli_fetch_assoc($result)) {
               
         $current_slide_in_admin = <<<DELIMETER
          
             <img class="slide-image img-responsive" src="../images/{$row['slide_image']}" alt="" width='800' height='300'>
             

DELIMETER;

           echo $current_slide_in_admin;

             }


       }


       function slides_thumbnails(){
         
             $result = myQuery("SELECT * FROM slides ORDER BY slide_id ASC ");
               confirm($result);

               while ($row = mysqli_fetch_assoc($result)) {
                 
           $thumbnails_slide_in_admin = <<<DELIMETER
              
              <div class="col-xs-6 col-md-3 image_container">
                <a href="../admin/backend/delete_slide.php?id={$row['slide_id']}">
                 <img class="img-responsive slides_img" src="../images/{$row['slide_image']}" alt="" width='200' height='100'>
                </a>
                <p style='margin-left:80px;'><b>{$row['slide_title']}</b></p>
              </div> 

DELIMETER;

             echo $thumbnails_slide_in_admin;

               }


       }       


       function get_active_slide(){

           $result = myQuery("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
           confirm($result);

           while ($row = mysqli_fetch_assoc($result)) {
             
       $active_slide = <<<DELIMETER


            
             <div class="item active">
                 <img class="slide-image img-responsive" src="images/{$row['slide_image']}" alt="" width='800' height='300'>
             </div>
             
             

DELIMETER;

         echo $active_slide;

           }

       }

       function get_slides(){

         $sql_count = myQuery("SELECT * FROM slides");

         $count = mysqli_num_rows($sql_count);

         
         $result = myQuery("SELECT * FROM slides ORDER BY slide_id ASC LIMIT ".$count."");
         confirm($result);

         while ($row = mysqli_fetch_assoc($result)) {

            // $getme_cat = myQuery("SELECT * FROM categories");

            // while ($query = mysqli_fetch_assoc($getme_cat)) {
                
            //     $thequay = $query['cat_title'];

            //     echo $thequay;
            // }
            
           
       $slides = <<<DELIMETER

           <div class="banner banner-1">
            <img src="images/{$row['slide_image']}" alt="">
                <div class="banner-caption text-center">
                    <h1 style="color:#F8694A; font-size: 30px;">Item sale</h1>
                    <h3 class="white-color font-weak">Up to 50% Discount</h3>
                    <button class="primary-btn">Shop Now</button>
                </div>
           </div>
           

DELIMETER;

       echo $slides;

        

         }


       }

    

function breadcrumb(){


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

    
}


function all_orders(){

    $sql = myQuery("SELECT * FROM orders");
    confirm($sql);

    $count = mysqli_num_rows($sql);

    echo $count;
}


function all_products(){

    $sql = myQuery("SELECT * FROM products");
    confirm($sql);

    $count = mysqli_num_rows($sql);

    echo $count;
}


function all_categories_in_admin(){

    $sql = myQuery("SELECT * FROM categories");
    confirm($sql);

    $count = mysqli_num_rows($sql);

    echo $count;
}


function all_users_in_admin(){

    $sql = myQuery("SELECT * FROM users");
    confirm($sql);

    $count = mysqli_num_rows($sql);

    echo $count;
}


function count_down(){

    $countdown = myQuery("SELECT * FROM countdown_time");

       $result = mysqli_fetch_assoc($countdown);
          
       $duration = $result['time'];

       $_SESSION['duration'] = $duration;

       $_SESSION['start_time'] = date("Y-m-d H:i:s");

       $end_time = date("Y-m-d H:i:s",strtotime('+'. $_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));

       $_SESSION['end_time'] = $end_time;

       
}


      

 ?>