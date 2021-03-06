<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <title>Home page</title>
        <link rel="icon" href="Assets/logo.png">
        <link rel="stylesheet" href="Css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="Assets/logo.png" alt="n2r logo" width="250px" height="250px">
            </div>
           <nav>
               <ul>
                <li class="home"><a href="">HOME</a></li>
                <li class="product"><a href="products.php">PRODUCTS</a></li>
                <li class="faq"><a href="about.php">ABOUT US</a></li>
                <li class="login"><a href="login.php">LOGIN</a></li>
                <li class="register"><a href="signup.php">REGISTER</a></li>
                <i class="fas fa-shopping-cart"></i>
                <hr/>   
            </ul>
           </nav>
           
        </div>
        <div class="row">
           <div class="col-2">
               <h1>Hardware <br>at your every need!</h1>
               <p>We genuinely believe that PCs should be a pleasure to purchase and own. <br> should help you get your work done, and not be a pain to manage. </p>
               <a id='shop-now' href="products.php" class="btn">SHOP NOW &rarr; </a> 
            </div>
           <div class="col-2">
               <img class="photo" src="Assets/shop now 2.jpg">
               
           </div>
       </div>
    </div>
</div>

</body>
<script>
    $('.fa-shopping-cart').click(()=>{
        window.location.href = 'products.php';
    })
    $('.photo').click(()=>{
        window.location.href = 'products.php';
    })
</script>
</html>