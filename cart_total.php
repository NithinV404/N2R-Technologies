<?php
            session_start();
            include("config.php");
            $user_id = $_SESSION['user'];
            $prd_sql = "SELECT prd_id FROM cart WHERE user_id = $user_id";
            $prd_res = mysqli_query($link, $prd_sql);
            $total = 0;
            //Calculating the total price of items present in cart 

            while ($temp1 = mysqli_fetch_assoc($prd_res)) {
                $str1 = $temp1['prd_id'];

                $price_sql = "SELECT prd_price FROM product_details WHERE prd_id = $str1";
                $price_res = mysqli_query($link, $price_sql);

                while ($temp3 = mysqli_fetch_assoc($price_res)) {
                    $str2 = (float)$temp3['prd_price'];
                }

                $total = $total + $str2;
            }
            echo $total;
            ?>