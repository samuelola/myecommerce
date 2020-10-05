<?php require_once "resources/config.php" ?>

 

<?php 

if(isset($_GET['add'])){


	$result = myQuery("SELECT * FROM products WHERE product_id = ".escape_string($_GET['add'])."");

    while($row = mysqli_fetch_assoc($result)){


         if($row['product_quantity'] != $_SESSION['product_'. $_GET['add']]){

         	 $_SESSION['product_' . $_GET['add']] +=1;
           
             header("Location:cart.php");
         }
         else{

         	 set_message("We only have " .$row['product_quantity']."  ".$row['product_title']  ." available");

         	 header("Location:/myecommerce/cart");
         }
    }

  //this is for testing
   // $_SESSION['product_'. $_GET['add']] +=1;

   // header("Location:index.php");/// echo$_SESSION['product_1'];
}


if(isset($_GET['remove'])){
   
     $_SESSION['product_'. $_GET['remove']]--;

     if($_SESSION['product_'. $_GET['remove']] < 1){
         
          unset($_SESSION['item_total']);
          unset($_SESSION['item_quantity']);
          unset($_SESSION['item_totals']);
          unset($_SESSION['item_quantitys']);
          header("Location:/myecommerce/cart");
     }

     else{

     	 header("Location:cart.php");
     }
}

if(isset($_GET['delete'])){
  
   $_SESSION['product_'. $_GET['delete']] = '0';

   unset($_SESSION['item_total']);
   unset($_SESSION['item_quantity']);
   unset($_SESSION['item_totals']);
   unset($_SESSION['item_quantitys']);
   header("Location:/myecommerce/cart");
	
}


function cart(){

	$total = 0;

	$item_quantity = 0;

  $item_name = 1;
  $item_number = 1;
  $amount = 1;
  $quantity =1;

   foreach($_SESSION as $key => $value){
       
        if($value > 0){

        	

            if(substr($key,0,8) == "product_"){

                // $length = strlen($key-8);

                $length = strlen($key);

                $id = substr($key,8,$length);

                $result1 = myQuery("SELECT * FROM products WHERE product_id = ".escape_string($id)."");

                if(!$result1){

                  echo "error".mysqli_error($conn);
                }

                while($row = mysqli_fetch_assoc($result1)){

                	// here the values are splited
                  
                 $sub_total =  $row['product_price'] * $value;




                  
$cat_product = <<< DELIMETER


                    <tr>

                  	 <td class="thumb"><img src="images/{$row['product_image']}" alt="" width="60" height="60"></td>
                  	 <td class="details"><a href="#">{$row['product_title']}</a></td>
                  	 <td class="qty price text-center"><strong>#
                  				<input class="price input " type="text" name="price" value="{$row['product_price']}"  readonly="">
                  			

                  	 </td>

                  	<td class="qty text-center"><input class="qty input " type="text" value="{$value}" name="qty"  readonly="">

                  	</td>

                  	<td class="qty total text-center"><strong class="primary-color">#
                  		<input class="total input " type="text"   value="{$sub_total}" readonly="" >
                  		</strong>
                  	</td>

                  		

                  	<td ><a class="btn btn-success" href="addcart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>  <a class="btn btn-warning" href="addcart.php?remove={$row['product_id']}"> <span class="glyphicon glyphicon-minus"></span></a> 

                    <a class="btn btn-danger" href="addcart.php?delete={$row['product_id']}"><i class="fa fa-trash"></i></a>
                  		
                  	</td>
                  	
                  	</tr> 


                    <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                    <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                    <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                    <input type="hidden" name="quantity_{$quantity}" value="{$value}">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="return" value="http://localhost/myecom1/paypal_success.php">
                    <input type="hidden" name="cancel_return" value="http://localhost/myecom1/paypal_cancel.php">
		
DELIMETER;


echo $cat_product;

$item_name++;
$item_number++;
$amount++;
$quantity++;

                }


       $_SESSION['item_total'] = $total+=$sub_total;
       $_SESSION['item_quantity'] = $item_quantity += $value;

               
            }
        }

        

        

   }
}





function head_cart(){

  $total = 0;

  $item_quantity = 0;

   foreach($_SESSION as $key => $value){
       
        if($value > 0){

          

            if(substr($key,0,8) == "product_"){

                $length = strlen($key);

                $id = substr($key,8,$length);

                $result = myQuery("SELECT * FROM products WHERE product_id = ".escape_string($id)."");

                while($row = mysqli_fetch_assoc($result)){

                  // here the values are splited
                  
                 $sub_total =  $row['product_price'] * $value;


                  
$cat_product = <<< DELIMETER


                    <tr>

                     <td class="thumb"><img src="#" alt=""></td>
                     <td class="details"><a href="#"></a></td>
                     <td class="qty price text-center"><strong>#
                          <input class="price input " type="text" name="price" value="{$row['product_price']}"  readonly="">
                        

                     </td>

                    <td class="qty text-center"><input class="qty input " type="text" value="{$value}" name="qty"  readonly="">

                    </td>

                    <td class="qty total text-center"><strong class="primary-color">#
                      <input class="total input " type="text"   value="{$sub_total}" readonly="" >
                      </strong>
                    </td>

                      

                    <td ><a class="btn btn-success" href="addcart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>  <a class="btn btn-warning" href="addcart.php?remove={$row['product_id']}"> <span class="glyphicon glyphicon-minus"></span></a>  <a class="btn btn-danger" href="addcart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
                      
                    </td>
                    
                    </tr> 
    
DELIMETER;


 $cat_product;

                }


       $_SESSION['item_total'] = $total+=$sub_total;
       $_SESSION['item_quantity'] = $item_quantity += $value;
      

               
            }
        }



   }
}



function top_cart(){

  $total = 0;

  $item_quantity = 0;

   foreach($_SESSION as $key => $value){
       
        if($value > 0){

          

            if(substr($key,0,8) == "product_"){

                $length = strlen($key);

                $id = substr($key,8,$length);

                $result = myQuery("SELECT * FROM products WHERE product_id = ".escape_string($id)."");

                while($row = mysqli_fetch_assoc($result)){

                  // here the values are splited
                  
                 $sub_total =  $row['product_price'] * $value;


                  
$cat_product = <<< DELIMETER


                    <tr>

                     <td class="thumb"><img src="#" alt=""></td>
                     <td class="details"><a href="#"></a></td>
                     <td class="qty price text-center"><strong>#
                          <input class="price input " type="text" name="price" value="{$row['product_price']}"  readonly="">
                        

                     </td>

                    <td class="qty text-center"><input class="qty input " type="text" value="{$value}" name="qty"  readonly="">

                    </td>

                    <td class="qty total text-center"><strong class="primary-color">#
                      <input class="total input " type="text"   value="{$sub_total}" readonly="" >
                      </strong>
                    </td>

                      

                    <td ><a class="btn btn-success" href="addcart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>  <a class="btn btn-warning" href="addcart.php?remove={$row['product_id']}"> <span class="glyphicon glyphicon-minus"></span></a>  <a class="btn btn-danger" href="addcart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
                      
                    </td>
                    
                    </tr> 
    
DELIMETER;


 $cat_product;

                }


       $_SESSION['item_totals'] = $total+=$sub_total;
       $_SESSION['item_quantitys'] = $item_quantity += $value;
      

               
            }
        }



   }
}







function small_cart(){

  $total = 0;

  $item_quantity = 0;

   foreach($_SESSION as $key => $value){
       
        if($value > 0){

          

            if(substr($key,0,8) == "product_"){

                $length = strlen($key-8);

                $id = substr($key,8,$length);

                $result = myQuery("SELECT * FROM products WHERE product_id = ".escape_string($id)."");

                while($row = mysqli_fetch_assoc($result)){

                  // here the values are splited
                  
                 $sub_total =  $row['product_price'] * $value;


                  
$small_product = <<< DELIMETER


                    <div class="shopping-cart-list">
                      <div class="product product-widget">
                        <div class="product-thumb">
                          <img src="./img/thumb-product01.jpg" alt="">
                        </div>
                        <div class="product-body">
                          <h3 class="product-price"> <span class="qty">x{$value}</span></h3>
                          <h2 class="product-name"><a href="#">{$row['product_title']}</a></h2>
                        </div>
                        <a href="addcart.php?delete={$row['product_id']}" class="cancel-btn"><i class="fa fa-trash"></i></a>
                      </div>
                      
                    </div>
                   
    
DELIMETER;


 echo $small_product;

                }


       $_SESSION['item_total'] = $total+=$sub_total;
       $_SESSION['item_quantity'] = $item_quantity += $value;

       

               
            }
        }



   }
}


function showbutton(){

  if(isset($_SESSION['item_quantity'])){
       
       $showbutton = <<<DELIMETER

       <input type="image" name="upload"
       src="paypal-button.png" width="150" height="50"
       alt="PayPal - The safer, easier way to pay online">

DELIMETER;

       echo $showbutton;
  }

}






 ?>


 