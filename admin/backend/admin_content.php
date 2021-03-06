 <!-- FIRST ROW WITH PANELS -->

 <div class="row">
     <div class="col-lg-12">
         <h1 class="page-header">
          <!--  Welcome to   Dashboard <small>Statistics Overview</small> -->
            Welcome to Dashboard 
         </h1>
       <!--   <ol class="breadcrumb">
             <li class="active">
                 <i class="fa fa-dashboard"></i> Dashboard
             </li>
         </ol> -->
     </div>
 </div>

<!-- /.row -->
<div class="row">

            <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php

                        $sql = myQuery("SELECT * FROM orders");
                       
                        $all_orders  = mysqli_num_rows($sql);

                         

                         ?>
                        <div class="huge"><?php echo $all_orders ?></div>
                        <div>New Orders!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?orders">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 

                            $sql = myQuery("SELECT * FROM products");
                       
                            $all_products = mysqli_num_rows($sql);
                         ?>
                        <div class="huge"><?php echo $all_products ?></div>
                        <div>Products!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

                            $sql = myQuery("SELECT * FROM categories");
                       
                            $all_categories_in_admin = mysqli_num_rows($sql);

                         ?>

                        <div class="huge"><?php echo $all_categories_in_admin ?></div>
                        <div>Categories!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?categories">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


</div>

<!-- /.row -->


<!-- SECOND ROW WITH TABLES-->

<div class="row">
   <div class="col-lg-12">
       <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard fa-fw"></i>Dashboard Chart</h3>
            </div>
            <div class="panel-body">
                <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],

                          <?php 

                            $element_text = ['All Orders','All Products','All Categories'];
                            $element_count = [$all_orders,$all_products,$all_categories_in_admin];

                            for($i = 0 ; $i < 3 ; $i++){
                               
                                 echo "['{$element_text[$i]}'" . " ," . "{$element_count[$i]}],";

                                
                            }

                           ?>



                          // ['Post', 1000],
                         
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                </script>

                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
         </div>
       </div>
   </div>

</div>