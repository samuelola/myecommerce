<?php
  
 if(isset($_GET['id_edit_products'])){

    $select_query = myQuery("SELECT * FROM products WHERE product_id = ".$_GET['id_edit_products'].""); 

    confirm($select_query);
    
    while($row = mysqli_fetch_assoc($select_query)){

       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_description = $row['product_description'];
       $product_price = $row['product_price'];
       $product_category_id = $row['product_category_id'];
       $product_keywords = $row['product_keywords'];
       $product_image = $row['product_image'];

       $short_desc = $row['short_desc'];
       $product_quantity = $row['product_quantity'];

       confirm($select_query);

       
       
    } 

  


   if(isset($_POST['update'])){


       $product_title = escape_string($_POST['product_title']);
       $product_description = escape_string($_POST['product_description']);
       $product_price = escape_string($_POST['product_price']);
       $product_category_id = escape_string($_POST['product_category_id']);
       $product_keywords = escape_string($_POST['product_keywords']);
       
       $short_desc = escape_string($_POST['short_desc']);
       $product_quantity = escape_string($_POST['product_quantity']);


      $update_image = $_FILES['image']['name'];

       $image_tmp = $_FILES['image']['tmp_name'];

      
       move_uploaded_file($image_tmp, $update_image);

       if(empty($update_image)){
            

           $query_image = "SELECT * FROM products WHERE product_id = ".$_GET['id']."";

           $results = mysqli_query($conn,$query_image);

           while ($row = mysqli_fetch_array($results)) {
            
               $update_image = $row['product_image'];
           }
       }



       $query = "UPDATE products SET ";

       $query .= "product_title = '{$product_title}', ";

       $query .= "product_category_id = '{$product_category_id}', ";

       $query .= "product_price = '{$product_price}', ";

       $query .= "product_quantity = '{$product_quantity}', ";

       $query .= "product_description = '{$product_description}', ";

       $query .= "short_desc = '{$short_desc}', ";

       $query .= "product_image = '{$update_image}', ";

       $query .= "product_keywords = '{$product_keywords}' ";

       $query .= "WHERE product_id = ".$_GET['id']." ";

       $result = mysqli_query($conn,$query);


       confirm($result);

       set_message("Product has been updated");

      
     }


}
  

?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product

</h1>

<?php display_message() ?>
</div>
               


<form action="" method="post"  enctype="multipart/form-data">


<div class="col-md-8">

    <div class="form-group">
       <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $product_title ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"> <?php echo $product_description ?></textarea>
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="short_desc" id="" cols="10" rows="5" class="form-control" style="width: 648px; height: 67px"><?php echo $short_desc ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="text" name="product_price" class="form-control" size="60" value="<?php echo  $product_price ?>">
      </div>
    </div>


   



    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
      <!--  <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          
        <select name="product_category_id" id="" class="form-control">

            
            <?php 

                $result = myQuery("SELECT * FROM categories");

                while ($row = mysqli_fetch_assoc($result)) {
                    
                     $cat_id = $row['cat_id'];
                     $cat_title = $row['cat_title'];

                     if($cat_id ==  $product_category_id){
                          
                         echo "<option selected value='$cat_id'>$cat_title</option>";  
                     }
                     else{

                         echo "<option value='$cat_id'>$cat_title</option>";
                     }

                     
                }
             ?>
           
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="text" name="product_quantity" id="" class="form-control" value="<?php echo $product_quantity ?>">
            
    </div>


<!-- Product Tags -->


    <div class="form-group">
          <label for="product-title">Product Keywords</label>
         
        <input type="text" name="product_keywords" class="form-control" value="<?php echo $product_keywords ?>">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <img src="../images/<?php echo $product_image ?>" alt="" width="50">
        <input type="file" name="image" value="<?php echo $product_image ?>">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                

