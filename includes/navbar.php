<?php
include_once('./includes/config.php');
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<div class="navbar">
    <div class="logo">
        <img src="Assets/logo.png" alt="n2r logo" width="250px" height="250px" />
    </div>
    <nav>
        <ul>
            <li class="home"><a href="home.php" id='home'>HOME</a></li>
            <li class="product"><a href="products.php" id='product'>PRODUCTS</a></li>
            <li class="faq"><a href="about.php" id='about'>ABOUT US</a></li>
            <li class="login"><a href="login.php" id='login'>LOGIN</a></li>
            <li class="register"><a href="signup.php" id='register'>REGISTER</a></li>
            <span><i class="fas fa-shopping-cart" id='cart-logo'></i></span>
            <hr />
        </ul>
    </nav>
    <div class="account" id="account">
        <img src="Assets/shop now 2.jpg" />
        <div class="account-content" id="account-content">
            <div class="account-card" id="account-card"><img src="Assets/shop now 2.jpg" />
                <?php
                if (isset($_SESSION['user']))
                $user = $_SESSION['user'];
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
                    echo "<script>window.location.reload()</script>";
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
<script>
    $(document).ready(function() {
        switch ($('title').text().toString()) {
            case 'Home':
                $('#home').addClass('active');
                break;
            case 'Products':
                $('#product').addClass('active');
                break;
            case 'About':
                $('#about').addClass('active');
                break;
            case 'Login':
                $('#login').addClass('active');
                break;
            case 'Signup':
                $('#register').addClass('active');
                break;
        }


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