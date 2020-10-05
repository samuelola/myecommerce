<?php include "../resources/config.php" ?>



<?php include 'frontend/header.php' ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            
             <?php include 'frontend/top_nav.php' ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
             
             <?php include 'frontend/side_nav.php' ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                  
                
                 
                  <?php 
                     
                     if($_SERVER['REQUEST_URI'] == "/myecommerce/admin/"  || $_SERVER['REQUEST_URI'] == "/myecommerce/admin/index.php" ){

                       include "backend/admin_content.php";
                   }


                       if(isset($_GET['admin_dashboard'])){
                         
                         include "backend/admin_dashboard.php";

                      }

                      if(isset($_GET['add_product'])){
                         
                         include "backend/add_product.php";

                      }
                      if(isset($_GET['view_products'])){
                         
                         include "backend/view_products.php";
                      }

                      if(isset($_GET['categories'])){
                         
                         include "backend/categories.php";
                      }

                      if(isset($_GET['id_edit_products'])){
                           
                          include "backend/edit_product.php"; 
                      }

                      if(isset($_GET['view_users'])){
                           
                          include "backend/view_users.php"; 
                      }

                      if(isset($_GET['id_edit_user'])){
                           
                          include "backend/edit_users.php"; 
                      }

                      if(isset($_GET['add_slides'])){
                           
                          include "backend/add_slides.php"; 
                      }

                       if(isset($_GET['add_user_roles'])){
                           
                          include "backend/add_user_roles.php"; 
                      }

                      if(isset($_GET['view_roles'])){
                           
                          include "backend/view_roles.php"; 
                      }

                      if(isset($_GET['id_edit_role'])){
                           
                          include "backend/edit_role.php"; 
                      }

                      if(isset($_GET['view_reviews'])){
                           
                          include "backend/view_reviews.php"; 
                      }

                      if(isset($_GET['orders'])){
                           
                          include "backend/orders.php"; 
                      }

                      if(isset($_GET['add_user'])){
                           
                          include "backend/add_user.php"; 
                      }

                      if(isset($_GET['update_featured'])){
                           
                          include "backend/update_featured.php"; 
                      }

                      if(isset($_GET['update_notfeatured'])){
                           
                          include "backend/update_notfeatured.php"; 
                      }

                      
                   ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include'frontend/footer.php' ?>
