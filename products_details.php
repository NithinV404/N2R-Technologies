<?php 
     include('config.php');
     session_start();
     $sql =  "SELECT * FROM product_details ";
     $result = mysqli_query($link, $sql);
     $value3 = '';
     $user = $_SESSION['user'];
     while ($temp = mysqli_fetch_assoc($result)) {
         $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id=$user";
         $ccr = mysqli_query($link, $cart_check);

                 $str = $temp['prd_id'];
                 $cart_check = "SELECT * FROM cart WHERE prd_id=$str AND user_id=$user";
                 $ccr = mysqli_query($link, $cart_check);
                 if (mysqli_num_rows($ccr) == 0) {
                     $value3 = "Add to cart";
                 } else {
                     $value3 = "Added";
                 }
                echo $str.','.$value3.',';
             }
?>