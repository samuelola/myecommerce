<?php include "resources/config.php" ?>

<?php include "resources/templates/front/header.php" ?>

<?php include "resources/templates/front/top_nav2.php" ?>

  

  <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Products</li>
      </ul>
    </div>
  </div>
  <!-- /BREADCRUMB -->

  <!-- section -->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        

        <!-- MAIN -->
        <div id="main" class="col-md-12">
          

          <!-- STORE -->
          <div id="store">
            <!-- row -->
            <div class="row">
              

              <div class="clearfix visible-md visible-lg"></div>

              <!-- Product Single -->
              
              <!-- /Product Single -->

              <div class="clearfix visible-sm visible-xs"></div>

              

              
              <!-- pay stack script -->
              

               <?php

               $curl = curl_init();
               $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
               if(!$reference){
                 die('No reference supplied');
               }

               curl_setopt_array($curl, array(
                 CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_HTTPHEADER => [
                   "accept: application/json",
                   "authorization: Bearer sk_test_bd26d3bef795b1b0896128cc607ce244af635f69",
                   "cache-control: no-cache"
                 ],
               ));

               $response = curl_exec($curl);
               $err = curl_error($curl);

               if($err){
                 // there was an error contacting the Paystack API
                 die('Curl returned error: ' . $err);
               }

               $tranx = json_decode($response);

               if(!$tranx->status){
                 // there was an error from the API
                 die('API returned error: ' . $tranx->message);
               }

               if('success' == $tranx->data->status){
                 // transaction was successful...
                 echo "<h3 class='text-center'>Thank you , your Transaction was successful<h3>";
                 // please check other things like whether you already gave value for this ref
                 // if the email matches the customer who owns the product etc
                 // Give value

                 $amount = number_format($tranx->data->amount/100);
                 $tranx_id = $tranx->data->reference;
                 $status = $tranx->data->status;
                 $currency = $tranx->data->currency;
                 
                 if($tranx_id == true){

                   $result_orders = myQuery("INSERT INTO orders (order_amount,order_transaction,order_status,order_currency,order_date) VALUES ('$amount','$tranx_id','$status','$currency',NOW()) ");

                     confirm($result_orders); 
                   }


               }

               else{
                 echo "Transaction was not successful";
               }


               ?>

              

              <div class="clearfix visible-sm visible-xs"></div>

              
            </div>
            <!-- /row -->
          </div>
          <!-- /STORE -->

          
        </div>
        <!-- /MAIN -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /section -->

 <?php include "resources/templates/front/footer.php" ?>