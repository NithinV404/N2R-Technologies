<?php 
    session_start();
    if($_SESSION['logged']==1)
    {
        echo('1');
    }
    else
    echo('0');
?>