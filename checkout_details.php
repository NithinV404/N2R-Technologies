<?php 
     session_start();
     $user = 0;
     $user = $_SESSION['user'];
      include_once('./includes/config.php');
      $result = mysqli_query($link,"SELECT * FROM details WHERE id=$user");
      while($hl = mysqli_fetch_assoc($result))
      {
            echo "<h4>{$hl['first_name']}</h4>
                  <h5>{$hl['ph_num']}</h5>
                  <h5>{$hl['email']}</h5>
                  <h5>{$hl['address']}</h5>
            ";
      }
 ?>