<?php  
  session_start();
  $user = $_SESSION['user'];
  include('config.php');
  $cart_result = mysqli_query($link,"SELECT * FROM cart WHERE user_id=$user");

  while($hld = mysqli_fetch_assoc($cart_result))
  {
      $item = $hld['prd_id'];
      $prd_res = mysqli_query($link,"SELECT * FROM product_details WHERE prd_id=$item");
      while($hld1 =  mysqli_fetch_assoc($prd_res))
      {

        echo "<tr>
        <td>{$item}</td>
        <td>{$hld1['prd_name']}</td>
        <td>{$hld1['prd_price']}</td>
        <td>{$hld1['prd_price']}</td>
        </tr>
        ";

        $total += $hld1['prd_price'];
    }
      
  }
  echo "<tr><td></td><td></td><td>Total:</td><td>{$total}</td>";
  
?>  