<?php 
     include('config.php');
     $sql =  "SELECT * FROM product_details ";
     $result = mysqli_query($link, $sql);
     $value3 = '';
     while ($temp = mysqli_fetch_assoc($result)) {
         $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id='1'";
         $ccr = mysqli_query($link, $cart_check);

         //Counter to check how many time the button is being pressed 

                 $str = $temp['prd_id'];
                 $cart_check = "SELECT * FROM cart WHERE prd_id=$str AND user_id='1'";
                 $ccr = mysqli_query($link, $cart_check);
                 if (mysqli_num_rows($ccr) == 0) {
                     $value3 = "Add to cart";
                 } else {
                     $value3 = "Added";
                 }
                echo $str.','.$value3.',';
             }
?>