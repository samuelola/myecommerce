<?php include "resources/config.php" ?>
<?php include "addcart.php" ?>

<?php 
   
   if(isset($_POST['pay'])){

   	  $amount = $_POST['amount'];
   	  $the_amount = $amount * 100;
   	  $email = $_POST['email'];

   	  $curl = curl_init();

   	  curl_setopt_array($curl, array(
   	    CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
   	    CURLOPT_RETURNTRANSFER => true,
   	    CURLOPT_CUSTOMREQUEST => "POST",
   	    CURLOPT_POSTFIELDS => json_encode([
   	      'amount'=>$the_amount,
   	      'email'=>$email,
   	    ]),
   	    CURLOPT_HTTPHEADER => [
   	      "authorization: Bearer sk_test_bd26d3bef795b1b0896128cc607ce244af635f69", //replace this with your own test key
   	      "content-type: application/json",
   	      "cache-control: no-cache"
   	    ],
   	  ));

   	  $response = curl_exec($curl);
   	  $err = curl_error($curl);

   	  if($err){
   	    // there was an error contacting the Paystack API
   	    die('Curl returned error: ' . $err);
   	  }

   	  $tranx = json_decode($response, true);

   	  if(!$tranx->status){
   	    // there was an error from the API
   	    print_r('API returned error: ' . $tranx['message']);
   	  }

   	  // comment out this line if you want to redirect the user to the payment page
   	  // print_r($tranx);


   	  // redirect to page so User can pay
   	  // uncomment this line to allow the user redirect to the payment page
   	  header('Location: ' . $tranx['data']['authorization_url']);

   }
 ?>