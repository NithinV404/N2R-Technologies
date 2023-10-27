<?php
    session_start();
    include_once("./includes/config.php");

    if(isset($_POST['submit']))
    {
        $fname = mysqli_escape_string($link,$_POST['firstname']);
        $lname = mysqli_escape_string($link,$_POST['lastname']);
        $number = mysqli_escape_string($link,$_POST['number']);
        $email = mysqli_escape_string($link,$_POST['email']);
        $pass = mysqli_escape_string($link,$_POST['password']);
        $cn_pass = mysqli_escape_string($link,$_POST['confirm_password']);
        $addr = mysqli_escape_string($link,$_POST['address']);

        if($pass!=$cn_pass)
        {
            echo "<h3 style='text-align:center;
            border: red 2px solid;
            background-color: rgb(255, 149, 149);
            transition: ease-in 0.5s;'>Password doesn't match<h3>";
        }
        else
        {
        $check_user = "SELECT id FROM details WHERE email='$email'";
        $result = mysqli_query($link,$check_user);
        if(mysqli_num_rows($result)==1)
        {
            echo "<h3 style='text-align:center;
          border: red 2px solid;
          background-color: rgb(255, 149, 149);
          transition: ease-in 0.5s;'>User already exists<h3>";
        }
        else
        {
           $insert = "INSERT INTO details (first_name, last_name, email, pass, ph_num, address)
           VALUES ('$fname','$lname','$email','$pass','$number','$addr')";
           mysqli_query($link,$insert);
           header('location:login.php');
        }
    }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="icon" href="Assets/logo.png">
    <link href="Css/signup.css" rel="stylesheet">
    <link href="Css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once('./includes/navbar.php'); ?>
    <div class="main">
    <div class="card">
        <i class="fas fa-user-plus"></i>
        <h1 id="reg-txt">REGISTER ACCOUNT</h1>
        <form name="register" action="#" method="POST">
        <input name="firstname" type="firstname" placeholder="First Name*" required>
        <input name="lastname" type="lastname" placeholder="Last Name*" required>
        <input name="number" type="text" placeholder="Phone number*" maxlength="10" pattern="\d{10}" required>
        <input name="email" type="email" placeholder="E-mail Address*" required>
        <input name="address" type="address" placeholder="Enter your address*" required>
        <input id= "pass" name="password" type="password" placeholder="Password*" required>
        <input id="con-pass"  name="confirm_password" type="password" placeholder="Confirm Password*" required>
        <input type="checkbox" required>
       <a id="tandc" href="#">Agree to terms and conditions*</a>
       <a id="login-a"  href="Login.php">Sign in</a>
        <button href="#" name="submit" id="register" class="btn-card" >Register</button>
    </form>
</div>
</div>
</body>
</html>