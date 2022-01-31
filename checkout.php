
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
<link rel="stylesheet" href="css/checkout.css">
</head>
<body>
  <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="./Assets/logo.png" alt="n2r logo" width="100px" height="100px">
                <h2>N2R Solutions</h2>
            </div>
           
        </div>
<div class="details">
  <div class="container">
    <div class="row">
      <div>
        <h1>Complete your order!</h1>
        <?php
        include("config.php");
        $Items = mysqli_query($link,"SELECT prd_id FROM cart WHERE user_id='1'");
        while($temp = mysqli_fetch_assoc($Items))
        {
          $id = $temp;
          while($temp1 = mysqli_fetch_assoc($Items_name))
          {
            $allItems = $temp1;
          }
        }
        ?>
        <div>
          <h1><b>Product(s) : </b><?= $allItems; ?></h1>
          <h1><b>Delivery Charge : </b>Free</h1>
          <h1><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h1>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control"  rows="3" cols="96"  placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h3>Select Payment Mode</h3>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>>

  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->

  <!-- <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script> -->
</body>

</html>