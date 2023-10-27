<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <title>Home page</title>
        <link rel="icon" href="Assets/logo.png">
        <link rel="stylesheet" href="Css/home.css">
        <link rel="stylesheet" href="Css/navbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
<body>
<div class="header">
    <div class="container">
        <?php
        include_once('./includes/navbar.php');
        ?>
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
</html>