<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="../Assets/logo.png">
  <link href="../Css/login.css" rel="stylesheet">
  <link href="../Css/navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
</head>

<body>
  <?php include_once('../includes/navbar.php'); ?>
  <?php

  include_once("../includes/config.php");
  if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql =  "SELECT id FROM details WHERE email = '$uname' and pass = '$pass'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
      $_SESSION['logged'] = 1;
      while ($d = mysqli_fetch_assoc($result)) {
        $_SESSION['user'] = $d['id'];
      }
      echo "<script>window.location = 'index.php';</script>";
    } else {
      echo "<h3 style='text-align:center;
          border: red 2px solid;
          background-color: rgb(255, 149, 149);
          transition: ease-in 0.5s;'>username or password incorrect<h3>";
    }
  }
  ?>
  <div class="login-holder">
    <div class="card">
      <image id="login-image" src="../Assets/Artboard 1.png">
        <h1 id="login-txt">LOGIN</h1>
        <form name="login_card" id="login-form" action="#" method="POST">
          <input type="email" name="username" id="username" placeholder="Enter your email address" size="30" required>
          <i class="far fa-envelope" id="email-icon"></i><br>
          <input type="password" name="password" id="password" placeholder="Password" required>
          <i class="far fa-eye" id="togglePassword"></i><br>
          <button name="login" id="login" class="btn">Login</button>
          <button name="signup" id="signup" class="btn" onclick="window.location = 'signup.php';">Signup</button><br>
          <a href="index.php" id="skip">Skip>>></a><br>
        </form>
    </div>
  </div>
  <script>

const togglepass = $("#togglePassword");
const pass = $("#password");
const login = $("#login");

togglepass.click(function() {
  const type = pass.attr("type");
  pass.attr("type", type === "text" ? "password" : "text");
  togglepass.toggleClass("fa-eye-slash");
});
  </script>
</body>

</html>