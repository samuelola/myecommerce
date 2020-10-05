<h1 class="page-header">
   All Orders

</h1>

<?php display_message() ?>

<table class="table table-hover">


    <thead>

      <tr>
           <th>S.N</th>
           <th>Order_Amount</th>
           <th>Order_Transaction</th>
           <th>Order_Status</th>
           <th>Order_Currency</th>
           <th>Order_Date</th>
           <th>Order_Time</th>
           <th>Delete</th>
      </tr>
    </thead>
    <tbody>

      <?php orders_in_admin(); ?>

  </tbody>
</table>











                
                 







   