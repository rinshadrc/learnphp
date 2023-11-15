<?php
include('../includes/connect.php');


?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>

      <th scope="col">Customer Name</th>
      <th scope="col">Customer Email</th>
      
    </tr>
  </thead>
  <tbody>

  <?php
    $query = "SELECT * FROM customers"; 
    $result = mysqli_query($con,$query);
    $count=1;
    while($row = mysqli_fetch_assoc($result)){
      
      echo "<tr>
      <th scope='row'>$count</th>
      <td>{$row['c_name']}</td>
      <td>{$row['c_email']}</td>
     
      
      </tr>";

      $count++;
    } 
  
  
  ?>


  
   
  </tbody>
</table>