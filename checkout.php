
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <link rel="icon" href="Assets/logo.png">


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

                <a href="home.php"> <img src="./Assets/logo.png" alt="n2r logo" width="100px" height="100px"></a>
                <h2>N2R Solutions</h2>
            </div>

        </div>
<div class="details">
  <div class="container">
    <div class="row">
      <div>
        <h1>Complete your order!</h1>

        <div>
          <h1><b>Product(s) : </b></h1>
          <table>
        <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Price</th>
        </tr>
         <?php 
        include("config.php");
        $Items = mysqli_query($link,"SELECT prd_id FROM cart WHERE user_id='1'");
        $total = 0;
        while($temp = mysqli_fetch_assoc($Items))
        {
           $id_sql = "SELECT prd_name , prd_price FROM product_details WHERE prd_id=$temp[prd_id]";
           $item_details = mysqli_query($link,$id_sql);
           while($temp2 = mysqli_fetch_assoc($item_details))
           {
            
            $str2 = (float)$temp2['prd_price'];
            
            echo "<tr>";
            echo "<td>" . $temp['prd_id'] . "</td>";
            echo "<td>" . $temp2['prd_name'] . "</td>";
            echo "<td>" . $temp2['prd_price'] . "</td>";
            echo "</tr>";
           }
           $total = $total + $str2;
        }
        ?>     
        </table>
        <br>
          <h1><b>Delivery Charge : </b>Free</h1>
          <h1><b>Total Amount Payable : <?php echo $total; ?>/-</h1>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="">
          <input type="hidden" name="grand_total" value="">
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

            <textarea name="address" class="form-control"  rows="3" cols="96"  placeholder="Enter Delivery Address Here..." required></textarea>
          </div>
          <h3 id="mode" >Select Payment Mode:</h3>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled required>-Select Payment Mode-</option>

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

  </div>

</body>

</html>