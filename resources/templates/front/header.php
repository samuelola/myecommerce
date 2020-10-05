<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Ecommerce shop</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-right">
					<span>

                        
                        <?php 
                          
                           if(isset($_SESSION['user_id'])){

                               $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

                               $row = mysqli_fetch_assoc($result);

                               $count = mysqli_num_rows($result);

                               if($count > 0){
                                
                               	echo "Welcome to Ecommerce shop <span style='color: #F8694A'>".$row['firstname']."<span>";

                               }
                               
                           }
                           else{

                           	   echo "Welcome to Ecommerce shop!";
                           }

                          
                            ?>   

						


					</span>
				</div>
				
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="search.php" method="post">
							<input name="search" class="input" required="" type="text" placeholder="Enter your keyword">
							
							<button name="submit" type="submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>

							<?php 

                                if(isset($_SESSION['user_id'])){

                                    $result = myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");

                                    $count = mysqli_num_rows($result);

                                    if($count > 0){

                                    	?><strong><a style="color:#F8694A" href="logout.php" class="text-uppercase">Logout</a></strong><?php

                                    }
                                    
                                }

                                else{

                                    	  ?><strong style="font-size: 12px;"><a href="login.php" class="text-uppercase">Login</a></strong> / <strong style="font-size: 12px;"><a href="register.php" class="text-uppercase">Register</a></strong><?php
                                    }

							 ?>
							
							<ul class="custom-menu">
								<li><a href="account.php"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="register.php"><i class="fa fa-user-plus"></i> Create An Account</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							
							<!-- put header cart here--->

							<a href="cart.php">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty"><?php echo isset($_SESSION['item_quantitys'])  ? $_SESSION['item_quantitys'] : $_SESSION['item_quantitys'] = '0'?></span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span># <?php echo isset($_SESSION['item_totals']) ? $_SESSION['item_totals'] : $_SESSION['item_totals'] = '0' ?> </span>
							</a>


							
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->