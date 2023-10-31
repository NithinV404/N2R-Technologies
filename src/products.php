<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/logo.png">
    <link rel="stylesheet" href="../Css/products.css">
    <link rel="stylesheet" href="../Css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once('../includes/navbar.php') ?>
    <div class="itemcard-pop-holder" id='popup'>
        <div class="itemcard-pop">
            </div>
    </div>
    <div id="name" class="items-holder"> </div>
    <script>
        $(document).ready(function() {
            items();
            prd_btn();
        });
        $('.card-btn').click(function() {
            items();
            prd_btn();
        });
        $('.logo').click(()=>{
            window.location.href = 'index.php';
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
                        $("#"+dc[e]).text(dc[e + 1]);
                    changestate(dc[e]);
                    })
                }
            })
        }

        function items() {
            var htmlcode = '';
            $.ajax({
                type: "GET",
                url: "prd_items.php",
                dataType: "json",
                success: function(data){
                    const value = JSON.parse(JSON.stringify(data));
                    value.forEach(items => {
                    htmlcode +=
                    `<div class="item-card">
                    <img src="${items.prd_photo}" />
                    <article>
                    <h2>${items.prd_name}</h2>
                    <p>${items.prd_desc}</p>
                    <h1> &#x20B9 ${items.prd_price} </h1>
                    <button class="card-btn" id="btn_${items.prd_id}" name="${items.prd_id}"
                    onclick=addtocart(${items.prd_id},event)></button>
                    </article>
                    </div>`
                    });
                    $('.items-holder').html(htmlcode);
                }
            })
        }
       
        
        // function itemcard(id)
        // {
        //   var id=id;
        //   $('.itemcard-pop').css({'display':'flex'})
        //   $.ajax({
        //     type: 'POST',
        //     url: 'itemcard-pop.php',
        //     data: {id:id},
        //     success: function(response) {
        //         $('.itemcard-pop').html(response)
        // }
        //   })
        // }
        // function closepop()
        // {
        //     $('.itemcard-pop').css({'display':'none'})
        // }
    </script>
</body>
</html>