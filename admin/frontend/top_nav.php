<ul class="nav navbar-right top-nav">
    <?php 
      
       if(isset($_SESSION['user_id'])){

           $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

           $count = mysqli_num_rows($result);

           if($count > 0){

             ?><li><a href="../welcome.php">Home</a></li><?php

           }
           
       }

       else{

          ?><li><a href="index.php">Home</a></li><?php
       }

     ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo isset($username) ? $username : $username = null ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>