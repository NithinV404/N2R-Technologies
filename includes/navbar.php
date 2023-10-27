<?php 
include_once('./includes/config.php');
session_start();
$sql =  "SELECT * FROM product_details ";
$result = mysqli_query($link, $sql);
if(isset($_SESSION['user']))
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<div class="navbar">
    <div class="logo">
        <img src="Assets/logo.png" alt="n2r logo" width="250px" height="250px" />
    </div>
    <nav>
        <ul>
            <li class="home"><a href="home.php">HOME</a></li>
            <li class="product"><a href="products.php">PRODUCTS</a></li>
            <li class="faq"><a href="about.php">ABOUT US</a></li>
            <li class="login"><a href="login.php">LOGIN</a></li>
            <li class="register"><a href="signup.php">REGISTER</a></li>
            <i class="fas fa-shopping-cart" id='cart-logo'></i>
            <hr />
        </ul>
    </nav>
    <div class="account" id="account">
        <img src="Assets/shop now 2.jpg" />
        <div class="account-content" id="account-content">
            <div class="account-card" id="account-card"><img src="Assets/shop now 2.jpg" />
                <?php
                $username = '';
                $email = '';
                $logged = 0;

                if ($_SESSION['logged'] == 1) {
                    $log_result = mysqli_query($link, "SELECT * FROM details WHERE id=$user");
                    while ($d = mysqli_fetch_assoc($log_result)) {
                        $username = $d['first_name'];
                        $email = $d['email'];
                    }
                } else {
                ?>
                    <h2>Not logged in</h2>
                    <a class='btn' id='log-in' href="../Login.php">Log in</a>
                <?php
                }
                ?>
                <!-- <h2><?php echo $user ?></h2> -->
                <h2><?php echo $username ?></h2>
                <h3><?php echo $email ?></h3>
                <?php if ($_SESSION['logged'] == 1) {
                ?>
                    <form method="post">
                        <button class="btn" name='log-out'>Log out</button>
                    </form>
                <?php
                }
                ?>
                <?php
                if (isset($_POST['log-out'])) {
                    session_destroy();
                    session_start();
                    $_SESSION['logged'] = 0;
                    $_SESSION['user'] = 0;
                    header("Refresh:0");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="itemcard-pop-holder" id='popup'>
    <div class="itemcard-pop">
    </div>
</div>
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
    <div class="border">
    </div>
</div>
<script>

    $(document).ready(function() {
        btn();
        $('#account-content').hide();
        $('#cart-card').hide();
        $('#account').click(function() {
            $('#account-content').toggle();
        })
        $('#cart-logo').click(function() {
            $('#cart-card').toggle();
        })
    })


    function btn() {
        $.ajax({
            type: "POST",
            url: "cart_details.php",
            success: function(data1) {
                if (data1 != '')
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
</script>