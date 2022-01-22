<?php
          include("config.php");
          if(isset($_POST['login']))
          {
          $uname = $_POST['username'];
          $pass = $_POST['password'];

          $sql =  "SELECT id FROM details WHERE email = '$uname' and pass = '$pass'";
          $result = mysqli_query($link,$sql);

          if(mysqli_num_rows($result)==1)
          {
              header("Location:home.php");
          }
          else
          {
          echo "<h3 style='text-align:center;
          border: red 2px solid;
          background-color: rgb(255, 149, 149);
          transition: ease-in 0.5s;'>username or password incorrect<h3>";

          }
          }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="Assets/logo.png">
    <link href="Css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <image class="logo" src="Assets/logo.png"></image>
        <h1 id="logo-name">N2R SOLUTIONS</h1>
    </div>
    <div class="login-holder">
        <div class="card">
            <image id="login-image" src="Assets/Artboard 1.png">
            <h1 id="login-txt">LOGIN</h1>
        <form name="login_card" action="#" method="POST">
        <input type="email" name="username" id="username" placeholder="Enter your email address" required>
        <i class="far fa-envelope"></i><br>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="far fa-eye" id="togglePassword"></i><br>
        <button name="login" id="login" class="btn" >Login</button>
        <button name="signup" id="signup" class="btn" onclick="window.location = 'signup.php';">Signup</button><br>
        <a href="#" id="forgot-pass">Forgot password</a><br>
        <a href="home.php" id="skip">Skip>>></a><br>
      </form>
    </div>
    </div>
    <script src="/Js/login.js"></script>
</body>
</html>