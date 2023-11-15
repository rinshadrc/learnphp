<?php
include('includes/connect.php');
include('header.php');



?>
<table class="table table-success m-5 me-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Image</th>

      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Total Price</th>


      <th scope="col">Options</th>


      
    </tr>
  </thead>
  <tbody>

  <?php

    $user = $_SESSION['user'];
    $query = "SELECT * FROM cart c INNER JOIN products p ON c.p_id = p.p_id where c_email='$user'";
    $result = mysqli_query($con,$query);
    $sub_total=0;
    $count=1;
    while($row = mysqli_fetch_assoc($result)){

        $total = $row['qty']*$row['p_price'];
        $sub_total += $total;

      
      echo "<tr>
      <th scope='row'>$count</th>
      <td><img src='admin_page/product_images/{$row['p_image']}' class='card-img-top' height=100px width=70px></td>
      <td>{$row['p_name']}</td>
      <td>{$row['p_price']}</td>
      <td>{$row['qty']}</td>
      <td>$total</td>

      <td><a href='><button type='submit' class='btn btn-primary'>Edit</button></a>
      <a href=''><button type='submit' class='btn btn-danger'>Delete</button></a></td>

      

      
      </tr>";

      $count++;
    } 
    echo "<tr>
    <td colspan='4'></td>
    <td class='fw-bold'>Total:</td>
    <td class='fw-bold'>$sub_total</td>
    <td></td>
</tr>";
  
  ?>

  </tbody>
</table>