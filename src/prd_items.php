<?php
        session_start();
        include_once('../includes/config.php');
        $sql =  "SELECT * FROM product_details";
        $sprp = mysqli_prepare($link,$sql);
        mysqli_stmt_execute($sprp);
        $result = mysqli_stmt_get_result($sprp);
        $jsondata = json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
        echo $jsondata;
        ?>