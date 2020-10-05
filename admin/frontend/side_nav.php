<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <?php 

          if(isset($_SESSION['user_id']) && $_SESSION['user_roles'] == 'admin'){
              
              ?>

                    <li>
                        <a href="index.php?admin_dashboard"><i class="fa fa-fw fa-dashboard"></i>Admin Dashboard</a>
                    </li>

              <?php

           } 


         ?>



        <li>
            <a href="index.php?add_product"><i class="fa fa-fw fa-bar-chart-o"></i>Add Products</a>
        </li>
        <li>
            <a href="index.php?view_products"><i class="fa fa-fw fa-table"></i>View Products</a>
        </li>

        <li>
            <a href="index.php?orders"><i class="fa fa-fw fa-wrench"></i>Orders</a>
        </li>
        
        
        <li>
            <a href="index.php?categories"><i class="fa fa-fw fa-wrench"></i>Categories</a>
        </li>
         <li>
            <a href="index.php?view_users"><i class="fa fa-fw fa-wrench"></i>Users</a>
        </li>

         <li>
            <a href="index.php?view_roles"><i class="fa fa-fw fa-wrench"></i>Roles</a>
        </li>
         <li>
            <a href="index.php?view_reviews"><i class="fa fa-fw fa-wrench"></i>Reviews</a>
        </li>
         <li>
            <a href="index.php?add_slides"><i class="fa fa-fw fa-wrench"></i>Slides</a>
        </li>
      
    </ul>
</div>