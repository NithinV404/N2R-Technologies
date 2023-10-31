<?php 
include_once('../includes/config.php');
session_start();
$user = $_SESSION['logged'];
$id = $_POST['id'];
    if(isset($_POST['id']) )
    {
        $sql =  "SELECT * FROM cart WHERE prd_id=$id AND user_id=$user";
        $sprp = mysqli_prepare($link,$sql);
        mysqli_stmt_execute($sprp);
        $result = mysqli_stmt_get_result($sprp);
        if(mysqli_num_rows($result) == 1)
        {
            echo "Added";
        }
        else
        {
            echo "Add to cart";
        }
    }
    else
    echo "Add to cart";
    
?>