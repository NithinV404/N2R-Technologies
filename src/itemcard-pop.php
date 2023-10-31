<?php
    session_start();
    include_once('../includes/config.php');
    $id = $_POST['id'];
    $user = 0;
    $user = $_SESSION['user'];
    $sql =  "SELECT * FROM product_details WHERE prd_id=$id ";
    $result = mysqli_query($link, $sql);

    while ($temp = mysqli_fetch_assoc($result)) {

        $cart_check = mysqli_query($link, "SELECT * FROM cart WHERE prd_id=$id AND user_id=$user");
        if(mysqli_num_rows($cart_check)==1)
        $cart_status = 'Added';
        else
        $cart_status = 'Add to cart';
        echo "
        <button onclick=closepop() id='close-popup'>X</button>
        <img src='{$temp['prd_photo']}'/>
        <article><h2>{$temp["prd_name"]}</h2>
        <p>{$temp["prd_desc"]}</p>
        <h1>{$temp["prd_price"]}$</h1> 
        <form method='post' action='#'>
        <button class='btn' id='{$temp["prd_id"]}_p' name='{$temp["prd_id"]}' value='submit'>{$cart_status}</button>
        </form>
        </article>";
    }
?>
