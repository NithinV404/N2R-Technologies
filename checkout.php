
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="Assets/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
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
        session_start();
        $user = $_SESSION['user'];
        $Items = mysqli_query($link,"SELECT prd_id FROM cart WHERE user_id=$user");
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
        <div class="address-div" id="add-div">
        <div class='saved-add' id='add-card'>
          <?php 
           $sql = mysqli_query($link,"SELECT * FROM details WHERE id=$user");
           while($temp = mysqli_fetch_assoc($sql))
           {
             $result = $temp;
           }
  
          ?>
        </div>
          </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="">
          <input type="hidden" name="grand_total" value="">
          <h3 id="mode" >Select Payment Mode:</h3>
          <div class="form-group">
            <select name="pmode" class="form-control" required>
              <option value="" selected disabled required>-Select Payment Mode-</option>

              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <form method="post">
            <input type="submit" name="submit" id="submit" value="Place Order" class="btn" disabled>
            <?php 
                     if(isset($_POST['submit']))
                     {
                       header('Location:bill.php');
                     }
            ?>
            </form>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
<script src="js/checkout.js"></script>
<script>
  $(document).ready(function(){  
         $.ajax({  
         type:"POST",  
         url:"checkout_details.php",  
         success: function(data){  
            $('#add-card').html(data);
         }  
        });
      })
    let c1 = 0;

    $('#add-card').click(function(){
    c1 += 1;
    if(c1==1)
    {
    $('#add-card').css({'border':'solid 4px purple'});
    $('#submit').removeAttr('disabled');
    }
    if(c1==2)
    {
    $('#add-card').css({'border':'none'});
    $('#submit').attr('disabled');
    c1 = 0;
    }
  })
</script>
</body>
</html>