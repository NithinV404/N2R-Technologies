<?php
        session_start();
        include('config.php');
        $sql =  "SELECT * FROM product_details ";
        $result = mysqli_query($link, $sql);

        while ($temp = mysqli_fetch_assoc($result)) {
           
            echo " <div class='item-card'>
            <img src='{$temp['prd_photo']}'/>
            <article><h2>{$temp["prd_name"]}</h2>
            <p>{$temp["prd_desc"]}</p>
            <h1>{$temp["prd_price"]}$</h1> 
            <form method='post' action='#'>
            <button class='card-btn' id='{$temp["prd_id"]}' name='{$temp["prd_id"]}' value='submit'></button>
            </form>
            </article></div>";
        }
            ?>