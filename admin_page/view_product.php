<?php
include('../includes/connect.php');


?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Image</th>

      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Category</th>
      <th scope="col">Options</th>


      
    </tr>
  </thead>
  <tbody>

  <?php
    $query = "SELECT * FROM products p INNER JOIN categories c ON p.cat_id = c.cat_id";
    $result = mysqli_query($con,$query);
    $count=1;
    while($row = mysqli_fetch_assoc($result)){
      
      echo "<tr>
      <th scope='row'>$count</th>
      <td><img src='./product_images/{$row['p_image']}' class='card-img-top' width=20px height=70px></td>
      <td>{$row['p_name']}</td>
      <td>{$row['p_price']}</td>
      <td>{$row['p_des']}</td>
      <td>{$row['cat_name']}</td>
      <td><a href='edit.php?product_id={$row['p_id']}'><button type='submit' class='btn btn-primary'>Edit</button></a>
      <a href='delete.php?product_id={$row['p_id']}'><button type='submit' class='btn btn-danger'>Delete</button></a></td>

      
      </tr>";

      $count++;
    } 
  
  
  ?>


  
   
  </tbody>
</table>