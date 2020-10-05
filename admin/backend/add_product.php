<?php add_admin_product() ?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product
   

</h1>

   <?php display_message() ?>
</div>
               


<form action="" method="post"  enctype="multipart/form-data">


<div class="col-md-8">

    <div class="form-group">
       <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>


    <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="short_desc" id="" cols="10" rows="5" class="form-control" style="width: 648px; height: 67px"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="text" name="product_price" class="form-control" size="60">
      </div>
    </div>


   



    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
      <!--  <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          
        <select name="product_category_id" id="" class="form-control">

            <option value="">Select Category</option>
           <?php 

               $result2 = myQuery("SELECT * FROM categories");



               while($row = mysqli_fetch_assoc($result2)){

                  echo " <option value=".$row['cat_id'].">".$row['cat_title']."</option>";
               }
            ?>
           
           
        </select>


    </div>

    <div class="form-group">
         <label for="product-title">Product brand</label>
          
        <select name="product_brand_id" id="" class="form-control">

            <option value="">Select Brand</option>
           <?php 

               $result2 = myQuery("SELECT * FROM brands");



               while($row = mysqli_fetch_assoc($result2)){

                  echo " <option value=".$row['brand_id'].">".$row['brand_name']."</option>";
               }
            ?>
           
           
        </select>


    </div>






    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="number" name="product_quantity" id="" class="form-control">
            
    </div>


<!-- Product Tags -->


    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="image">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                

