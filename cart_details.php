<?php 
session_start();
include('config.php');
 $sql =  "SELECT * FROM product_details ";
 $result = mysqli_query($link, $sql);
 $user = 0;
 if(isset($_SESSION['user']))
 $user = $_SESSION['user'];
 //Cart items displayed from database 

 while ($temp = mysqli_fetch_assoc($result)) {
     $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id=$user";
     $ccr = mysqli_query($link, $cart_check);
     if (mysqli_num_rows($ccr) == 1) {
        echo "<div class='item-card'><img src='{$temp['prd_photo']}'/>
        <article>
            <h2>{$temp["prd_name"]}</h2>
            <p>{$temp['prd_desc']}</p>
            <h1>{$temp['prd_price']} &#x20B9</h1>
            <form method='post' action='#'>
                <button name='{$temp["prd_id"]}' value='submit'>Remove</button>
            </form>
        </article></div>";
     }
    }
?>