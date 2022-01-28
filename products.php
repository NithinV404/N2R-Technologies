<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/logo.png">
    <link rel="stylesheet" href="Css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <img class="acc-img" src="Assets/logo.png">
            <h2>N2R Solutions</h2>
        </div>
        <div class="menus">
            <div class="cart" id="cart"><i id="cart-logo" class="fas fa-shopping-bag"></i></div>
            <div class="account" id="account">
                <img src="Assets/shop now 2.jpg">
                <div class="account-content" id="account-content">
                    <div class="account-card" id="account-card"><img src="Assets/shop now 2.jpg">
                        <h2>Username</h2>
                        <h3>user@gmail.com</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="cart-card-holder">
        <div id="cart-card">
            <h2 class="cart-header">Cart</h2>
            <?php
            include("config.php");
            $prd_sql = "SELECT prd_id FROM cart WHERE user_id = '1'";
            $prd_res = mysqli_query($link, $prd_sql);
            $total = 0;
            while ($temp1 = mysqli_fetch_assoc($prd_res)) {
                $str1 = $temp1['prd_id'];

                $price_sql = "SELECT prd_price FROM product_details WHERE prd_id = $str1";
                $price_res = mysqli_query($link, $price_sql);

                while ($temp3 = mysqli_fetch_assoc($price_res)) {
                    $str2 = (float)$temp3['prd_price'];
                }

                $total = $total + $str2;
            }
            $sql =  "SELECT * FROM product_details ";
            $result = mysqli_query($link, $sql);

            while ($temp = mysqli_fetch_assoc($result)) {
                $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id='1'";
                $ccr = mysqli_query($link, $cart_check);
                if (mysqli_num_rows($ccr) == 1) {
                    echo "<div class='item-card'>
         <img src='{$temp['prd_photo']}'/>
         <article><h2>{$temp["prd_name"]}</h2>
        <p>{$temp["prd_desc"]}</p>
        <h1>{$temp["prd_price"]}$</h1> 
        <form method='post' action='#'>
        <button name='{$temp["prd_id"]}' value='submit'>Remove</button>
        </form>
        </article>
        </div>";
                }
            }
            echo "<h3 id='cart-total'>Total = $total</h3>";
            ?>
            <button class="btn">Checkout -></button>
        </div>
    </div>
    <div class="border-holder">
        <div class="border"></div>
    </div>
    <div id="name" class="items-holder">
        <!-- <div class="item-card">
     <img src="Assets/shop now 2.jpg">
     <article> <h2>Mouse</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat corporis ipsam debitis!</p>
    <h1>300$</h1>
    </article>
     </div> -->
        <?php
        $sql =  "SELECT * FROM product_details ";
        $result = mysqli_query($link, $sql);

        while ($temp = mysqli_fetch_assoc($result)) {
            $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id='1'";
            $ccr = mysqli_query($link, $cart_check);
            if (mysqli_num_rows($ccr) == 1) {
                echo "<div class='item-card'>
     <img src='{$temp['prd_photo']}'/>
     <article><h2>{$temp["prd_name"]}</h2>
    <p>{$temp["prd_desc"]}</p>
    <h1>{$temp["prd_price"]}$</h1> 
    <form method='post' action='#'>
    <button name='{$temp["prd_id"]}' value='submit'>Added &#x2713</button>
    </form>
    </article>
   </div>";
            } else {
                echo "<div class='item-card'>
     <img src='{$temp['prd_photo']}'/>
     <article><h2>{$temp["prd_name"]}</h2>
    <p>{$temp["prd_desc"]}</p>
    <h1>{$temp["prd_price"]}$</h1> 
    <form method='post' action='#'>
    <button name='{$temp["prd_id"]}' value='submit'>Add to Cart</button>
    </form>
    </article>
   </div>";
            }

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
                        header("Location:products.php");
                    }
                    else {
                        $cart_r = "DELETE FROM cart WHERE prd_id=$str AND user_id='1'";
                        mysqli_query($link, $cart_r);
                        header("Location:products.php");
                    }
                }
            }
        }

        ?>
    </div>
    <script src="./Js/products.js"></script>
</body>

</html>