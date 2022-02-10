<?php 
include('config.php');

$sql =  "SELECT * FROM product_details ";
        $result = mysqli_query($link, $sql);

while ($temp = mysqli_fetch_assoc($result)) {
    $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id='1'";
    $ccr = mysqli_query($link, $cart_check);

$str = $temp['prd_id'];
$counter = 0;
if (isset($_POST[$str])) {
    $counter++;
    if ($counter == 1) {
        $cart_check = "SELECT * FROM cart WHERE prd_id=$str AND user_id='1'";
        $ccr = mysqli_query($link, $cart_check);
        if (mysqli_num_rows($ccr) == 0) {
            $cart = "INSERT INTO cart(prd_id,user_id)VALUES($str,'1')";
            mysqli_query($link, $cart);
            echo "Added";
        }
        else {
            $cart_r = "DELETE FROM cart WHERE prd_id=$str AND user_id='1'";
            mysqli_query($link, $cart_r);
            echo "Add to cart";
        }
    }
}
}
?>