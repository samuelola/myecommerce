<?php
 
  $results =  myQuery("SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']."");
  
  while ($row = mysqli_fetch_assoc($results)) {
  	 $first = $row['firstname'];
  	 $last = $row['lastname'];
  	 $username = $row['username'];
  	 $email = $row['email'];
  	 $pass = $row['password'];
  	 $address = $row['address'];
  	 $city = $row['city'];
  	 $country = $row['country'];
  	 $tel = $row['tel'];
  	 $zipcode = $row['zipcode'];
  	 
  }


?>


<body>
	<!-- HEADER -->
	


	
       
	<!-- section -->
	<div class="section ">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				
               <div class="col-md-6">
               	     <table class="table table-condensed table-striped">
               	     	  
               	     	   <tbody>
               	     	   	   <tr>
               	     	   	   	  <td>Firstname</td>
               	     	   	   	  <td><?php echo $first ?></td>
               	     	   	   </tr>
               	     	   	   <tr>
               	     	   	   	  <td>Lastname</td>
               	     	   	   	  <td><?php echo $last ?></td>
               	     	   	   </tr>
               	     	   	   <tr>
               	     	   	   	  <td>Email</td>
               	     	   	   	  <td><?php echo $email ?></td>
               	     	   	   </tr>
               	     	   	   <tr>
               	     	   	   	  <td>Username</td>
               	     	   	   	  <td><?php echo $username ?></td>
               	     	   	   </tr>
               	     	   	   <tr>
               	     	   	   	  <td>Address</td>
               	     	   	   	  <td><?php echo $address ?></td>
               	     	   	   </tr>
               	     	   	   <tr>
               	     	   	   	  <td>Telphone</td>
               	     	   	   	  <td><?php echo $tel ?></td>
               	     	   	   </tr>
               	     	   </tbody>
               	     </table>

               </div>
               
				

				

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	
</body>