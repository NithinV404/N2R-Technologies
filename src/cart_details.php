<?php 
session_start();
include_once('../includes/config.php');
 if($user = isset($_SESSION['user']))
 $user = $_SESSION['user'];

    $cart_check = "SELECT * FROM cart,product_details product WHERE user_id=? AND cart.prd_id=product.prd_id";
    $sprp = mysqli_prepare($link,$cart_check);
    mysqli_stmt_bind_param($sprp,'i',$user);
    mysqli_stmt_execute($sprp);
    $result = mysqli_stmt_get_result($sprp);
    $jsondata = json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
    echo $jsondata;
?>