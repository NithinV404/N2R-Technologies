<?php 
    session_start();
    include_once('../includes/config.php');
    $user = isset($_SESSION['user']);
    $str = $_POST['id'];
            if ($user!=0) {
                $cart_check = "SELECT * FROM cart WHERE prd_id=$str AND user_id=$user";
                $ccr = mysqli_query($link, $cart_check);
                if (mysqli_num_rows($ccr) == 1) {
                    mysqli_query($link, "DELETE FROM cart WHERE prd_id=$str AND user_id=$user");
                } else {
                    mysqli_query($link, "INSERT INTO cart VALUES($str,$user)");
                }
                echo 1;
            }
            else
            {
                echo 0;
            }
?>