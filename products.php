<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/logo.png">
    <link rel="stylesheet" href="Css/products.css">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once('./includes/navbar.php');
    $sql =  "SELECT * FROM product_details ";
    $result = mysqli_query($link, $sql);
    if (isset($_SESSION['user']))
        $user = $_SESSION['user'];
    while ($temp = mysqli_fetch_assoc($result)) {
    
        $str = $temp['prd_id'];
        if (isset($_POST[$str])) {
            if ($_SESSION['logged'] == 1) {
                $cart_check = "SELECT * FROM cart WHERE prd_id=$temp[prd_id] AND user_id=$user";
                $ccr = mysqli_query($link, $cart_check);
                if (mysqli_num_rows($ccr) == 1) {
                    mysqli_query($link, "DELETE FROM cart WHERE prd_id=$str AND user_id=$user");
                } else {
                    mysqli_query($link, "INSERT INTO cart(prd_id,user_id)VALUES($str,$user)");
                }
            } else {
                echo "<script>window.location.href='login.php'</script>";
            }
        }
    }
?>
    <div class="itemcard-pop-holder" id='popup'>
        <div class="itemcard-pop">
            </div>
    <div id="name" class="items-holder"> </div>
    <script>
        $(document).ready(function() {
            items();
            prd_btn();
        })
        $('.card-btn').click(function() {
            items();
            prd_btn();
        });
        $('.logo').click(()=>{
            window.location.href = 'home.php';
        })
        $('#log-in').click(()=>{
            window.location.href = 'Login.php';
        })
       function prd_btn() {
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
        
        function itemcard(id)
        {
          var id=id;
          $('.itemcard-pop').css({'display':'flex'})
          $.ajax({
            type: 'POST',
            url: 'itemcard-pop.php',
            data: {id:id},
            success: function(response) {
                $('.itemcard-pop').html(response)
        }
          })
        }
        function closepop()
        {
            $('.itemcard-pop').css({'display':'none'})
        }
    </script>
</body>
</html>