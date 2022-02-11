<?php
session_start();
include('config.php');
$sql =  "SELECT * FROM product_details ";
$result = mysqli_query($link, $sql);
$user = $_SESSION['user'];
while ($temp = mysqli_fetch_assoc($result)) {

    $str = $temp['prd_id'];
    if (isset($_POST[$str])) {
        if($_SESSION['logged']==1)
        {
        $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id=$user";
        $ccr = mysqli_query($link, $cart_check);
        if (mysqli_num_rows($ccr) == 1) {
            mysqli_query($link, "DELETE FROM cart WHERE prd_id=$str AND user_id=$user");
        } else {
            mysqli_query($link, "INSERT INTO cart(prd_id,user_id)VALUES($str,$user)");
        }
    }
    else
    {
        header("Location:Login.php");
    }
    }
}
?>


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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            <img class="acc-img" src="Assets/logo.png">
            <h2>N2R Solutions</h2>
        </div>
        <div class="menus">
            <div class="cart icon" id="cart"><i id="cart-logo" class="fas fa-shopping-cart"></i></div>
            <form method="post" action="#">
                <div class="home icon"><i id="home" class="fas fa-home"></i></div>
                <h2 id="test"></h2>
            </form>
            <div class="account" id="account">
                <img src="Assets/shop now 2.jpg">
                <div class="account-content" id="account-content">
                    <div class="account-card" id="account-card"><img src="Assets/shop now 2.jpg">
                    <?php 
                    $username = '';
                    $email = '';
                    $logged = 0;
                    
                    if($_SESSION['logged']==1)
                    {
                            $log_result = mysqli_query($link,"SELECT * FROM details WHERE id=$user");
                            while($d = mysqli_fetch_assoc($log_result))
                            {
                                $username = $d['first_name'];
                                $email = $d['email'];
                            }
                        }
                    else
                    {   
                    ?>
                      <h2>Not logged in</h2>
                      <button class='btn' id='log-in'>Log in</button>
                    <?php 
                    }
                    ?>
                        <!-- <h2><?php echo $user ?></h2> -->
                        <h2><?php echo $username ?></h2>
                        <h3><?php echo $email ?></h3>
                    <?php if($_SESSION['logged']==1)
                    {
                    ?>
                        <form method="post">
                            <button class="btn" name='log-out'>Log out</button>
                        </form>
                    <?php 
                    }
                    ?>
                    <?php 
                        if(isset($_POST['log-out']))
                        {
                        session_destroy();
                        session_start();
                        $_SESSION['logged']=0;
                        $_SESSION['user']=0;
                        header("Refresh:0");
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="cart-card-holder">
        <div id="cart-card">
            <h2 class="cart-header">Cart</h2>
            <div class='item-card-holder' id="cart_card_det">
            </div>
            <div class='btm-div'>
                <h3 id='cart-total'></h3>
                <button id="checkout-btn" class="btn" disabled>Checkout -></button>
            </div>
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


    </div>
    <script src="./Js/products.js"></script>
    <script>
        $(document).ready(function() {
            items();
            btn();
        })
        $('.card-btn').click(function() {
            items();
            btn();
        });
        $('.logo').click(()=>{
            window.location.href = 'home.php';
        })
        $('#log-in').click(()=>{
            window.location.href = 'Login.php';
        })
       function btn() {
            $.ajax({
                type: "POST",
                url: "products_details.php",
                success: function(data) {
                    var dc = data.split(',');
                    var i = 0;
                    $.each(dc, e => {
                        $(`#${dc[e]}`).text(dc[e + 1]);
                    })
                }
            })
            $.ajax({
                type: "POST",
                url: "cart_details.php",
                success: function(data1) {
                    if(data1 != '')
                    $('#cart_card_det').html(data1);
                    else
                    $('#cart_card_det').html("<h2 id='no-cart-items'>No Items in Cart</h2>");
                }
            })
            $.ajax({
                type: "POST",
                url: "cart_total.php",
                success: function(data1) {
                    $('#cart-total').text('Total:' + data1);
                    if (data1 == '0')
                        $('#checkout-btn').attr('disabled')
                    else
                        $('#checkout-btn').removeAttr('disabled')
                }
            })

        }

        function items() {
            $.ajax({
                type: "POST",
                url: "prd_items.php",
                success: function(data) {
                    $('.items-holder').html(data)
                }
            })
        }
    </script>
</body>

</html>