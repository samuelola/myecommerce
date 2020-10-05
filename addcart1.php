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

         	 header("Location:cart.php");
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
          header("Location:cart.php");
     }

     else{

     	 header("Location:cart.php");
     }
}

if(isset($_GET['delete'])){
  
   $_SESSION['product_'. $_GET['delete']] = '0';

   unset($_SESSION['item_total']);
   unset($_SESSION['item_quantity']);

   header("Location:cart.php");
	
}


function cart(){

	$total = 0;

	$item_quantity = 0;

   foreach($_SESSION as $key => $value){
       
        if($value > 0){

        	

            if(substr($key,0,8) == "product_"){

                $length = strlen($key-8);

                $id = substr($key,8,$length);

                $result1 = myQuery("SELECT * FROM products WHERE product_id = ".escape_string($id)."");

                while($row = mysqli_fetch_assoc($result1)){

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


echo $cat_product;

                }


       $_SESSION['item_total'] = $total+=$sub_total;
       $_SESSION['item_quantity'] = $item_quantity += $value;

               
            }
        }



   }

   
}









 ?>


