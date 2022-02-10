<?php
    include('config.php');
    $sql = mysqli_query($link,"SELECT * FROM details WHERE id=1");
    while($result = mysqli_fetch_assoc($sql))
    {
      echo "<h3>{$result['first_name']}</h2>
      <h5>{$result['email']}</h3>
      <h5>{$result['ph_num']}</h3>
      <h5>{$result['address']}</h3>
      ";
      }
?>