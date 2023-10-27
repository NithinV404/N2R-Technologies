<?php
    include_once('./includes/config.php');
    session_start();
    $user = 0;
    $user = $_SESSION['user'];
    $sql = mysqli_query($link,"SELECT * FROM details WHERE id=$user");
    while($result = mysqli_fetch_assoc($sql))
    {
      echo "<h3>{$result['first_name']}</h2>
      <h5>{$result['email']}</h3>
      <h5>{$result['ph_num']}</h3>
      <h5>{$result['address']}</h3>
      ";
      }
?>