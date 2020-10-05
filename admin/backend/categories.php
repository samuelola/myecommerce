<h1 class="page-header">
  Product Categories

</h1>


<?php 

if(isset($_POST['add_category'])){

   $cat_title = $_POST['cat_title'];

   $result = myQuery("INSERT INTO categories (cat_title) VALUES ('$cat_title')");

   confirm($result);

   set_message("Product Categories added!");

   header("index.php?categories");

}

 ?>

<?php display_message(); ?>
<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" name="cat_title">
        </div>

        <div class="form-group">
            
            <input type="submit" name="add_category" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
       <?php create_the_category_admin() ?>
    </tbody>

        </table>

</div>



                













            